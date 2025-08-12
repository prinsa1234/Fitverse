from .cart import Cart
from .models import *

def cart_context(request):
    cart = Cart(request)
    cart_items = list(cart)
    subtotal = cart.get_total_price()
    return {
        'cart_items': cart_items,
        'subtotal': subtotal,
        'cart_count': len(cart),
    }
def user_orders(request):
    if request.user.is_authenticated:
        orders = Order.objects.filter(user=request.user).order_by('-created_at')[:5]  # last 5 orders
        return {'user_orders': orders}
    return {}