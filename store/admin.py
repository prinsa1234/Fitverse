from django.contrib import admin

from .models import Product
from .models import CartItem
from .models import Profile
from .models import AnonymousCartItem
from .models import *


admin.site.register(Product)
admin.site.site_header = "QuickCart Admin"
admin.site.register(CartItem)
admin.site.register(Profile)
admin.site.register(AnonymousCartItem)
admin.site.register(Order)
admin.site.register(OrderItem)
admin.site.register(Review)
admin.site.register(ContactMessage)
admin.site.register(UserScrollLog)
admin.site.register(UserInteraction)
admin.site.register(UserLocationLog)

# Register your models here.