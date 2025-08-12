from .models import CartItem
from store.models import Product


class Cart:
    def __init__(self, request):
        self.session = request.session
        self.request = request
        cart = self.session.get('cart')
        if not cart:
            cart = self.session['cart'] = {}
        self.cart = cart

    def add(self, product, quantity=1, update_quantity=False):
        if quantity < 1:
            return  # Safety check

        max_allowed = product.stock
        if self.request.user.is_authenticated:
            cart_item, created = CartItem.objects.get_or_create(user=self.request.user, product=product)
            current_quantity = 0 if created else cart_item.quantity

            if update_quantity:
                if quantity > max_allowed:
                    quantity = max_allowed
                cart_item.quantity = quantity
            else:
                if current_quantity + quantity > max_allowed:
                    quantity = max_allowed - current_quantity
                cart_item.quantity += quantity

            cart_item.save()
        else:
            product_id = str(product.id)
            current_quantity = self.cart.get(product_id, {}).get('quantity', 0)

            if update_quantity:
                quantity = min(quantity, max_allowed)
                self.cart[product_id] = {'quantity': quantity, 'price': str(product.dp)}
            else:
                if current_quantity + quantity > max_allowed:
                    quantity = max_allowed - current_quantity
                if product_id not in self.cart:
                    self.cart[product_id] = {'quantity': quantity, 'price': str(product.dp)}
                else:
                    self.cart[product_id]['quantity'] += quantity

            self.save()

    def save(self):
        self.session.modified = True

    def remove(self, product):
        if self.request.user.is_authenticated:
            CartItem.objects.filter(user=self.request.user, product=product).delete()
        else:
            product_id = str(product.id)
            if product_id in self.cart:
                del self.cart[product_id]
                self.save()



    def __iter__(self):
        if self.request.user.is_authenticated:
            cart_items = CartItem.objects.filter(user=self.request.user)
            for item in cart_items:
                yield {
                    'product': item.product,
                    'quantity': item.quantity,
                    'total_price': item.quantity * item.product.dp,
                }
        else:
            product_ids = self.cart.keys()
            products = Product.objects.filter(id__in=product_ids)
            for product in products:
                item = self.cart[str(product.id)]
                yield {
                    'product': product,
                    'quantity': item['quantity'],
                    'total_price': item['quantity'] * float(item['price']),
                }

    def __len__(self):
        if self.request.user.is_authenticated:
            return sum(item.quantity for item in CartItem.objects.filter(user=self.request.user))
        return sum(item['quantity'] for item in self.cart.values())

    def get_total_price(self):
        if self.request.user.is_authenticated:
            return sum(item.quantity * item.product.dp for item in CartItem.objects.filter(user=self.request.user))
        return sum(float(item['price']) * item['quantity'] for item in self.cart.values())

    # NEW: Convert session cart dict to list of dicts for merging
    def get_session_cart_items(self):
            # Return list of dicts with product and quantity from session cart
            items = []
            product_ids = self.cart.keys()
            products = Product.objects.filter(id__in=product_ids)
            for product in products:
                pid = str(product.id)
                if pid in self.cart:
                    quantity = self.cart[pid]['quantity']
                    items.append({'product': product, 'quantity': quantity})
            return items


    # NEW: Clear session cart
    def clear_session_cart(self):
        if 'cart' in self.session:
            del self.session['cart']
            self.session.modified = True

    def clear(self):
        # Clear DB cart if authenticated, else clear session cart
        if self.request.user.is_authenticated:
            CartItem.objects.filter(user=self.request.user).delete()
        else:
            self.session['cart'] = {}
            self.session.modified = True
    def get_quantity(self, product):
        if self.request.user.is_authenticated:
            try:
                cart_item = CartItem.objects.get(user=self.request.user, product=product)
                return cart_item.quantity
            except CartItem.DoesNotExist:
                return 0
        else:
            product_id = str(product.id)
            return self.cart.get(product_id, {}).get('quantity', 0)


# Function to merge session cart into DB cart on login (can stay in utils.py or cart.py)
def merge_cart(session_cart_items, user):
    for item in session_cart_items:
        product = item['product']
        quantity = item['quantity']
        cart_item, created = CartItem.objects.get_or_create(user=user, product=product)
        if not created:
            cart_item.quantity += quantity
        else:
            cart_item.quantity = quantity
        cart_item.save()

    

