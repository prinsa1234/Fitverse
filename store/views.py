import requests
from store.forms import UserRegistrationForm
from .models import CartItem, Order, OrderItem, Product, Profile, Review
from .cart import Cart, merge_cart 
from django.db.models import Q
from django.shortcuts import get_object_or_404, render, redirect 
from django.contrib.auth.forms import AuthenticationForm
from django.contrib import messages
from django.contrib.auth import login as auth_login, logout as auth_logout
from django.http import BadHeaderError, JsonResponse
from django.contrib.auth.decorators import login_required
from .models import ContactMessage
from django.core.mail import send_mail
from django.conf import settings
from store.cart import Cart
from django.db import transaction
from django.db.models import Prefetch
from .models import UserScrollLog
from django.db.models import *
from django.views.decorators.csrf import csrf_exempt
from django.http import JsonResponse
import json
from .models import *

# Home page view
def index(request):
    products = Product.objects.all()
    return render(request, 'store/index.html', {'products': products})

def login_view(request):
    # Save redirect URL
    next_param = request.GET.get('next')
    if next_param:
        request.session['redirect_after_auth'] = next_param

    if request.method == 'POST':
        form = AuthenticationForm(data=request.POST)
        if form.is_valid():
            # Instantiate cart BEFORE login (to read session cart)
            cart = Cart(request)
            session_cart_items = cart.get_session_cart_items()

            user = form.get_user()
            username = form.cleaned_data.get('username')
            password = form.cleaned_data.get('password')

        
            auth_login(request, user)  # Log user in

             # ✅ Check for hardcoded admin credentials
            if username == 'admin' and password == 'dhari@2006':
                return redirect('vendor_dashboard')
            
            # Merge session cart items into DB cart
            if session_cart_items:
                merge_cart(session_cart_items, user)
                cart.clear_session_cart()

            # Redirect after login
            next_url = request.session.pop('redirect_after_auth', None)
            if next_url:
                return redirect(next_url)
            return redirect('index')
    else:
        form = AuthenticationForm()

    return render(request, 'store/login.html', {'form': form})
def register(request):
    # Save redirect URL if present in GET (e.g. ?next=checkout)
    next_param = request.GET.get('next')
    if next_param:
        request.session['redirect_after_auth'] = next_param

    if request.method == 'POST':
        form = UserRegistrationForm(request.POST)
        if form.is_valid():
            cart = Cart(request)
            session_cart_items = cart.get_session_cart_items()

            user = form.save(commit=False)
            user.first_name = form.cleaned_data['first_name']
            user.last_name = form.cleaned_data['last_name']
            user.email = form.cleaned_data['email']
            user.save()

            # Save user profile address
            address = form.cleaned_data['address']
            user.profile.address = address
            user.profile.save()

            auth_login(request, user)

            if session_cart_items:
                merge_cart(session_cart_items, user)
                cart.clear_session_cart()  # Clear session cart after merging

            # DEBUG: Print DB cart after merge
            db_cart_items = CartItem.objects.filter(user=user)
            print(f"[DEBUG] DB cart items count after register for {user.username}: {db_cart_items.count()}")
            for item in db_cart_items:
                print(f"  - {item.product.Title} x{item.quantity}")

            messages.success(request, 'Account created and logged in!')

            # Use the stored redirect URL or default to index
            next_url = request.session.pop('redirect_after_auth', None)
            if next_url:
                return redirect(next_url)
            return redirect('index')
    else:
        form = UserRegistrationForm()

    return render(request, 'store/register.html', {'form': form})

def logout_view(request):
    auth_logout(request)
    return redirect('login')

def vendor_dashboard(request):
    
    orders = Order.objects.all()
    context = {
        'orders': orders,
        # no need to pass orderitems separately if you access via order.items.all in template
    }
    return render(request, 'store/vendor_dashboard.html', context)

def about(request):
    return render(request, 'store/about.html')


def shop(request):
    products = Product.objects.all()

    if request.method == 'POST':
        price_filters = []
        if 'hundred' in request.POST:
            price_filters.append((99, 999))
        if 'twohundred' in request.POST:
            price_filters.append((1000, 4000))
        if 'fourhundredabove' in request.POST:
            products = products.filter(Price__gt=4000)
        elif price_filters:
            q = Q()
            for p_min, p_max in price_filters:
                q |= Q(Price__gte=p_min, Price__lte=p_max)
            products = products.filter(q)

    return render(request, 'store/shop.html', {'products': products})
def cart_view(request):
    cart = Cart(request)
    cart_items = list(cart)
    subtotal = cart.get_total_price()

    print(f"[DEBUG] cart_view called for user: {request.user}")
    print(f"[DEBUG] Number of cart items: {len(cart_items)}")
    for item in cart_items:
        print(f" - {item['product'].Title} x {item['quantity']} = {item['total_price']}")

    return render(request, 'store/cart.html', {
        'cart_items': cart_items,
        'subtotal': subtotal,
    })


# Add to cart
def add_to_cart(request, product_id):
    if request.method == 'POST':
        product = get_object_or_404(Product, id=product_id)
        try:
            quantity = int(request.POST.get('quantity', 1))
            if quantity < 1:
                quantity = 1
        except ValueError:
            quantity = 1

        cart = Cart(request)
        # Set quantity exactly as requested instead of incrementing:
        cart.add(product, quantity, update_quantity=True)

    next_url = request.META.get('HTTP_REFERER')
    return redirect(next_url if next_url else 'cart_view')


# Remove from cart
def remove_from_cart(request, product_id):
    product = get_object_or_404(Product, id=product_id)
    cart = Cart(request)
    cart.remove(product)
    return redirect('cart_view')

# Update cart quantities
def update_cart(request):
    if request.method == 'POST':
        cart = Cart(request)

        for key, value in request.POST.items():
            if key.startswith('quantity_'):
                product_id = key.split('_')[1]
                try:
                    quantity = int(value)
                    product = Product.objects.get(id=product_id)
                    if quantity > 0:
                        cart.add(product, quantity=quantity, update_quantity=True)
                    else:
                        cart.remove(product)
                except (ValueError, Product.DoesNotExist):
                    pass

        if 'checkout' in request.POST:
            return redirect('checkout')  # Create this view

    return redirect('cart_view')

def get_cart_items_from_session(session):
    cart = session.get('cart', {})
    items = []
    for product_id, qty in cart.items():
        try:
            product = Product.objects.get(id=product_id)
            items.append({'product': product, 'quantity': qty})
        except Product.DoesNotExist:
            continue
    return items


def merge_session_cart_to_db(user, session):
    session_cart = session.get('cart', {})
    for product_id, qty in session_cart.items():
        product = Product.objects.get(id=product_id)
        cart_item, created = CartItem.objects.get_or_create(user=user, product=product)
        if not created:
            cart_item.quantity += qty
        else:
            cart_item.quantity = qty
        cart_item.save()
    session['cart'] = {}
    session.modified = True
# views.py


def ajax_add_to_cart(request):
    if request.method == "POST":
        product_id = request.POST.get("product_id")
        quantity = int(request.POST.get("quantity", 1))

        try:
            product = Product.objects.get(id=product_id)
        except Product.DoesNotExist:
            return JsonResponse({'success': False, 'message': 'Product not found.'})

        cart = Cart(request)

        # Get current quantity in the cart
        current_quantity = cart.get_quantity(product)

        # Check total desired quantity
        if current_quantity + quantity > product.stock:
            return JsonResponse({
                'success': False,
                'message': f'Only {product.stock - current_quantity} more can be added. Total stock: {product.stock}'
            })

        # Safe to add
        cart.add(product=product, quantity=quantity)

        return JsonResponse({
            'success': True,
            'cartItemCount': len(cart),
            'subtotal': cart.get_total_price(),
        })

    return JsonResponse({'success': False, 'message': 'Invalid request'})

@login_required
@transaction.atomic  # Ensures atomic transaction
def checkout(request):
    user = request.user
    cart_items = CartItem.objects.filter(user=user)

    # Fetch user profile (for address)
    try:
        profile = Profile.objects.get(user=user)
    except Profile.DoesNotExist:
        messages.error(request, "Profile not found. Please complete your profile before checking out.")
        return redirect('cart')

    if request.method == 'POST':
        # Check stock availability
        for item in cart_items:
            if item.product.stock < item.quantity:
                messages.error(request, f"Insufficient stock for {item.product.Title}.")
                return redirect('cart')

        # Calculate total price
        total_price = sum(item.product.dp * item.quantity for item in cart_items)

        # Create order
        order = Order.objects.create(user=user, total=total_price)

        for item in cart_items:
            product = item.product

            # Create order item
            OrderItem.objects.create(
                order=order,
                product_title=product.Title,
                price=product.dp,
                quantity=item.quantity,
            )

            # Reduce stock
            product.stock -= item.quantity
            product.save()

        # Clear the cart
        cart_items.delete()

        messages.success(request, f"Order #{order.id} placed successfully!")
        return redirect('placed')

    # For GET request: show checkout page
    total_price = sum(item.product.dp * item.quantity for item in cart_items)

    return render(request, 'store/pay.html', {
        'cart_items': cart_items,
        'total_price': total_price,
        'first_name': user.first_name,
        'last_name': user.last_name,
        'email': user.email,
        'address': profile.address,
    })

def placed(request):
    return render(request,'store/placed.html')


from django.contrib import messages
from django.shortcuts import render, redirect, get_object_or_404
from .models import Product, CartItem, Review
def product_detail(request, title):
    product = get_object_or_404(Product, Title=title)
    quantity = int(request.POST.get('quantity', 1))
    reviews = Review.objects.filter(product=product).order_by('-id')


    if request.method == 'POST':
        if 'buy' in request.POST or 'cart' in request.POST:
            if request.user.is_authenticated:
                cart_item, created = CartItem.objects.get_or_create(
                    user=request.user,
                    product=product,
                    defaults={'quantity': quantity}
                )

                if not created:
                    new_quantity = cart_item.quantity + quantity
                    if new_quantity > product.stock:
                        messages.error(request, f"Cannot add {quantity} item(s). Only {product.stock - cart_item.quantity} left in stock.")
                    else:
                        cart_item.quantity = new_quantity
                        cart_item.save()
                        return redirect('cart_view')
                else:
                    if quantity > product.stock:
                        messages.error(request, "Out of stock")
                    else:
                        return redirect('cart_view')
            else:
                messages.error(request, "You must log in to add items to cart.")
                return redirect('login')

        elif 'submit' in request.POST:
            Review.objects.create(
                name=request.POST['name'],
                email=request.POST['email'],
                product=product,
                review=request.POST['reviews']
            )
            messages.success(request, "Review submitted!")

    if request.user.is_authenticated:
        cart_items = CartItem.objects.filter(user=request.user).order_by('-id')[:3]
    else:
        cart_items = []

    return render(request, 'store/product_page.html', {
        'product': product,
        'cart_items': cart_items,
        'reviews': reviews
    })
from django.conf import settings
from django.core.mail import send_mail, BadHeaderError
from django.contrib import messages
from django.shortcuts import render, redirect
from .models import ContactMessage

def contact(request):
    if request.method == 'POST':
        name = request.POST.get('name', '').strip()
        email = request.POST.get('email', '').strip()
        message = request.POST.get('msg', '').strip()
        phone = request.POST.get('phone', '').strip()
        subject = request.POST.get('subject', '').strip()

        # Basic validation
        if not name or not email or not message:
            messages.error(request, "Please fill in all required fields.")
            return render(request, 'store/contact.html', {
                'name': name, 'email': email, 'message': message,
                'phone': phone, 'subject': subject
            })

        try:
            # Save message in the database
            contact_instance = ContactMessage.objects.create(
                name=name, email=email, message=message,
                phone=phone, subject=subject
            )

            # Send email to admin
            admin_subject = f"New contact message from {name}"
            admin_message = f"""
New contact message:

Name: {name}
Email: {email}
Phone: {phone}
Subject: {subject}

Message:
{message}
"""
            send_mail(
                admin_subject,
                admin_message,
                settings.EMAIL_HOST_USER,  # sender
                ['d24dcs163@charusat.edu.in'],  # recipient (you)
                fail_silently=False
            )

            # Send confirmation email to the user
            confirmation_subject = "We've received your message!"
            confirmation_message = f"""
Hi {name},

Thank you for contacting FitVerse! We’ve received your message and will get back to you as soon as possible.

Your message:
{message}

— Team FitVerse
"""
            send_mail(
                confirmation_subject,
                confirmation_message,
                settings.EMAIL_HOST_USER,  # sender
                [email],  # recipient (user)
                fail_silently=False
            )

            messages.success(request, "Thank you for your message. We will get back to you soon.")
            return redirect('contact')  # Prevent resubmission on refresh

        except BadHeaderError:
            messages.error(request, "Invalid header found.")
        except Exception as e:
            messages.error(request, f"An error occurred: {e}")

        # If something fails, show form again with previous inputs
        return render(request, 'store/contact.html', {
            'name': name, 'email': email, 'message': message,
            'phone': phone, 'subject': subject
        })

    else:
        return render(request, 'store/contact.html')
   

def products(request):
    products = Product.objects.all()
    return render(request, 'store/products.html', {'products': products})

def edit_product(request, product_id):
    product = get_object_or_404(Product, id=product_id)

    if request.method == 'POST':
        product.Title = request.POST.get('title')
        product.Price = request.POST.get('price')
        product.dp = request.POST.get('dp')
        product.description = request.POST.get('description')
        product.stock = request.POST.get('stock')
        
        # Optional: check if a new image was uploaded
        if request.FILES.get('image'):
            product.image = request.FILES['image']
        
        product.save()
        return redirect('products')

    return render(request, 'store/edit_product.html', {'product': product})

def delete_product(request, product_id):
    product = get_object_or_404(Product, id=product_id)
    product.delete()
    return redirect('products')

def add_product(request):
    if request.method == 'POST':
        title = request.POST.get('title')
        price = request.POST.get('price')
        dp = request.POST.get('dp')
        description = request.POST.get('description')
        stock = request.POST.get('quantity')
        cd = request.POST.get('cd')
        image = request.FILES.get('ui')

        Product.objects.create(
            Title=title,
            Price=price,
            dp=dp,
            description=description,
            stock=stock,
            cd=cd,
            image=image
        )
        return redirect('products')  # replace with your product listing route name

    return render(request, 'store/add_product.html')

def Orders(request):
    if request.method == 'POST':
        order_id = request.POST.get('order_id')
        new_status = request.POST.get('status')
        try:
            order = Order.objects.get(id=order_id)
            order.status = new_status
            order.save()
            messages.success(request, f"Order #{order.id} status updated to {new_status}.")
        except Order.DoesNotExist:
            messages.error(request, "Order not found.")

        return redirect('Orders')

    # ✅ Show all orders to admin/staff, only user’s orders to customers
    if request.user.is_staff:
        orders = Order.objects.all().prefetch_related('items')
    else:
        orders = Order.objects.filter(user=request.user).prefetch_related('items')

    status_choices = Order.STATUS_CHOICES
    return render(request, 'store/orders.html', {
        'orders': orders,
        'status_choices': status_choices,
    })
def watch_view(request):
    products = Product.objects.filter(Title__icontains='Watch')
    price_filters = request.GET.getlist('price')
    

    if price_filters:
        q = Q()
        if '100' in price_filters:
            q |= Q(Price__gte=10, Price__lte=200)
        if '200' in price_filters:
            q |= Q(Price__gt=200, Price__lte=400)
        if '400' in price_filters:
            q |= Q(Price__gt=400)

        products = products.filter(q)

    return render(request, 'store/watch.html', {'products': products , 'prices': price_filters})

def airpods_view(request):
    products = Product.objects.filter(Title__icontains='Airpods')
    price_filters = request.GET.getlist('price')
    

    if price_filters:
        q = Q()
        if '100' in price_filters:
            q |= Q(Price__gte=10, Price__lte=200)
        if '200' in price_filters:
            q |= Q(Price__gt=200, Price__lte=400)
        if '400' in price_filters:
            q |= Q(Price__gt=400)

        products = products.filter(q)

    return render(request, 'store/airpods.html', {'products': products , 'prices': price_filters})

def headsets_view(request):
    products = Product.objects.filter(Title__icontains='Headsets')
    price_filters = request.GET.getlist('price')
    

    if price_filters:
        q = Q()
        if '100' in price_filters:
            q |= Q(Price__gte=10, Price__lte=200)
        if '200' in price_filters:
            q |= Q(Price__gt=200, Price__lte=400)
        if '400' in price_filters:
            q |= Q(Price__gt=400)

        products = products.filter(q)

    return render(request, 'store/headsets.html', {'products': products , 'prices': price_filters})


def speakers_view(request):
    products = Product.objects.filter(Title__icontains='Speaker')
    price_filters = request.GET.getlist('price')
    

    if price_filters:
        q = Q()
        if '100' in price_filters:
            q |= Q(Price__gte=10, Price__lte=200)
        if '200' in price_filters:
            q |= Q(Price__gt=200, Price__lte=400)
        if '400' in price_filters:
            q |= Q(Price__gt=400)

        products = products.filter(q)

    return render(request, 'store/speaker.html', {'products': products , 'prices': price_filters})

def tv_view(request):
    products = Product.objects.filter(Title__icontains='TV')
    price_filters = request.GET.getlist('price')
    

    if price_filters:
        q = Q()
        if '100' in price_filters:
            q |= Q(Price__gte=10, Price__lte=200)
        if '200' in price_filters:
            q |= Q(Price__gt=200, Price__lte=400)
        if '400' in price_filters:
            q |= Q(Price__gt=400)

        products = products.filter(q)

    return render(request, 'store/tv.html', {'products': products , 'prices': price_filters})

def laptop_view(request):
    products = Product.objects.filter(Title__icontains='Laptop')
    price_filters = request.GET.getlist('price')
    

    if price_filters:
        q = Q()
        if '100' in price_filters:
            q |= Q(Price__gte=10, Price__lte=200)
        if '200' in price_filters:
            q |= Q(Price__gt=200, Price__lte=400)
        if '400' in price_filters:
            q |= Q(Price__gt=400)

        products = products.filter(q)

    return render(request, 'store/laptop.html', {'products': products , 'prices': price_filters})

@login_required
def my_orders(request):
    orders = Order.objects.filter(user=request.user).prefetch_related('items')
    return render(request, 'store/my_orders.html', {
        'orders': orders
    })
from urllib.parse import unquote

def get_insight_data():
    scroll_logs = UserScrollLog.objects.filter(page__startswith="/product_detail/")
    scroll_insights = scroll_logs.values('page').annotate(
        total_scroll_time=Sum('scroll_time_seconds'),
        avg_scroll_time=Avg('scroll_time_seconds'),
        views=Count('id')
    ).order_by('-total_scroll_time')

    for insight in scroll_insights:
        slug = insight['page'].split('/product_detail/')[-1]
        insight['product_title'] = unquote(slug)

    interaction_data = (
        UserInteraction.objects.values('product__id', 'product__Title')
        .annotate(
            total_page_views=Count('id', filter=Q(event_type='page_view')),
            total_add_to_cart=Count('id', filter=Q(event_type='add_to_cart')),
            avg_time_spent=Avg('time_spent_ms', filter=Q(event_type='time_spent')),
            bounce_count=Count('id', filter=Q(event_type='time_spent', bounce=True)),
            total_time_events=Count('id', filter=Q(event_type='time_spent'))
        )
    )

    for data in interaction_data:
        if data['total_time_events']:
            data['bounce_rate'] = round((data['bounce_count'] / data['total_time_events']) * 100, 2)
        else:
            data['bounce_rate'] = 0

        if data['avg_time_spent']:
            data['avg_time_spent'] = round(data['avg_time_spent'] / 1000, 2)
        else:
            data['avg_time_spent'] = 0

    return scroll_insights, interaction_data
def vendor_insights(request):
    scroll_insights, interaction_data = get_insight_data()
    return render(request, 'store/vendor_insights.html', {
        'scroll_insights': scroll_insights,
        'interaction_data': interaction_data,
    })


def user_insights(request):
    scroll_insights, interaction_data = get_insight_data()
    return render(request, 'store/user_insights.html', {
        'scroll_insights': scroll_insights,
        'interaction_data': interaction_data,
    })

@csrf_exempt
def track_scroll(request):
    if request.method == "POST":
        data = json.loads(request.body)
        page = data.get('page')
        scroll_time_ms = data.get('scroll_time_ms', 0)
        scroll_time_seconds = scroll_time_ms / 1000

        UserScrollLog.objects.create(
            user=request.user if request.user.is_authenticated else None,
            page=page,
            scroll_time_seconds=scroll_time_seconds
        )
        return JsonResponse({'status': 'success'})
    return JsonResponse({'status': 'invalid'}, status=400)


@csrf_exempt
def track_interaction(request):
    if request.method == "POST":
        try:
            # Handle both fetch and sendBeacon
            body_unicode = request.body.decode('utf-8')
            data = json.loads(body_unicode)

            event = data.get('event')
            product_id = data.get('product_id')
            user = request.user if request.user.is_authenticated else None
            product = Product.objects.get(id=product_id)

            if event == 'page_view':
                UserInteraction.objects.create(
                    user=user,
                    product=product,
                    event_type='page_view'
                )
            elif event == 'add_to_cart':
                UserInteraction.objects.create(
                    user=user,
                    product=product,
                    event_type='add_to_cart'
                )
            elif event == 'time_spent':
                time_spent = data.get('time_spent_ms', 0)
                bounce = data.get('bounce', False)
                UserInteraction.objects.create(
                    product=product,
                    user=user,
                    event_type='time_spent',
                    time_spent_ms=int(time_spent),
                    bounce=bounce
                )
            else:
                return JsonResponse({'status': 'error', 'message': 'Unknown event'}, status=400)

            return JsonResponse({'status': 'success'})
        except Exception as e:
            return JsonResponse({'status': 'error', 'message': str(e)}, status=400)
    return JsonResponse({'status': 'invalid'}, status=405)

def user_interaction_insights(request):
        vendor = request.user  # assuming user is vendor
        products = Product.objects.filter(vendor=vendor)

        interaction_data = (
            UserInteraction.objects.filter(product__in=products)
            .values('product__id', 'product__title')
            .annotate(
                total_page_views=Count('id', filter=Q(event_type='page_view')),
                total_add_to_cart=Count('id', filter=Q(event_type='add_to_cart')),
                avg_time_spent=Avg('time_spent_ms', filter=Q(event_type='time_spent')),
                bounce_count=Count('id', filter=Q(event_type='time_spent', bounce=True)),
                total_time_events=Count('id', filter=Q(event_type='time_spent'))
            )
        )

        for data in interaction_data:
            if data['total_time_events']:
                data['bounce_rate'] = round((data['bounce_count'] / data['total_time_events']) * 100, 2)
            else:
                data['bounce_rate'] = 0

            # Convert ms to seconds for avg_time_spent
            if data['avg_time_spent']:
                data['avg_time_spent'] = round(data['avg_time_spent'] / 1000, 2)
            else:
                data['avg_time_spent'] = 0

        context = {
            'interaction_data': interaction_data,
        }
        return render(request, 'store/vendor_insights.html', context)


def product_performance_insights(request):
    products = Product.objects.annotate(
        total_views=Count('userinteraction', filter=Q(userinteraction__event_type='page_view')),
        total_add_to_cart=Count('userinteraction', filter=Q(userinteraction__event_type='add_to_cart')),
    )

    # Aggregate order counts by product title
    order_counts = {
        item['product_title']: item['total_orders']
        for item in OrderItem.objects.values('product_title').annotate(total_orders=Count('id'))
    }

    for p in products:
        p.total_orders = order_counts.get(p.Title, 0)
        if p.total_views:
            p.conversion_rate = round((p.total_orders / p.total_views) * 100, 2)
        else:
            p.conversion_rate = 0

    return render(request, 'store/performance_insights.html', {
        'products': products
    })

@csrf_exempt
def track_geolocation(request):
    if request.method == "POST":
        try:
            data = json.loads(request.body)
            product_id = data.get("product_id")
            latitude = data.get("latitude")
            longitude = data.get("longitude")
            accuracy = data.get("accuracy")

            product = Product.objects.get(id=product_id)
            user = request.user if request.user.is_authenticated else None

            ip = request.META.get('HTTP_X_FORWARDED_FOR')
            if ip:
                ip = ip.split(',')[0]
            else:
                ip = request.META.get('REMOTE_ADDR')

            # Use IP geolocation API
            # Reverse Geocode using lat/lon
            city, address = None, None
            try:
                response = requests.get(
                    'https://nominatim.openstreetmap.org/reverse',
                    params={'lat': latitude, 'lon': longitude, 'format': 'json'},
                    headers={'User-Agent': 'GeoTracker/1.0'}
                )
                if response.status_code == 200:
                    geo_data = response.json()
                    city = geo_data.get('address', {}).get('city') or geo_data.get('address', {}).get('town')
                    address = geo_data.get('display_name')
            except Exception as e:
                print("Geo lookup failed:", str(e))

            print("CITY:", city, "IP:", ip, "USERNAME:", user , "Address:", address)
            UserLocationLog.objects.create(
                user=user,
                product=product,
                latitude=latitude,
                longitude=longitude,
                accuracy=accuracy,
                ip_address=ip,
                city=city,
                address=address
            )
            return JsonResponse({"status": "success"})
        except Product.DoesNotExist:
            return JsonResponse({"status": "error", "message": "Product not found"}, status=404)
        except Exception as e:
            return JsonResponse({"status": "error", "message": str(e)}, status=400)
    else:
        return JsonResponse({"status": "invalid method"}, status=405)
    

def geographical_insights(request):
    location_logs = UserLocationLog.objects.all().order_by('-timestamp')
    return render(request, 'store/geographical_insights.html', {
        'location_logs': location_logs,
    })
