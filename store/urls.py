from django.urls import path
from . import views
from django.contrib.auth import views as auth_views

urlpatterns = [
    
    path('', views.index, name='index'),
    path('index/', views.index, name='index'),
    path('about/', views.about, name='about'),
    path('contact/', views.contact, name='contact'),
    #path('add-to-cart/<int:id>/', views.add_to_cart, name='add_to_cart'),
    path('shop/', views.shop, name='shop'),
    path('login/', views.login_view, name='login'),
    path('logout/', auth_views.LogoutView.as_view(next_page='login'), name='logout'),
    path('register/', views.register, name='register'),
    path('cart/', views.cart_view, name='cart_view'),
    path('add-to-cart/<int:product_id>/', views.add_to_cart, name='add_to_cart'),
    path('remove-from-cart/<int:product_id>/', views.remove_from_cart, name='remove_from_cart'),
    path('update-cart/', views.update_cart, name='update_cart'),
    path('ajax-add-to-cart/', views.ajax_add_to_cart, name='ajax_add_to_cart'),
    path('checkout/', views.checkout, name='checkout'),
    path('placed/', views.placed, name='placed'),
    path('product_detail/<str:title>/', views.product_detail, name='product_detail'),
    path('vendor_dashboard/', views.vendor_dashboard, name='vendor_dashboard'),
    path('products/', views.products, name='products'),
    path('edit/<int:product_id>/', views.edit_product, name='edit_product'),
    path('delete/<int:product_id>/', views.delete_product, name='delete_product'),
    path('add_product/', views.add_product, name='add_product'),
    path('Orders/', views.Orders, name='Orders'),
    # Legacy electronics categories (kept temporarily)
    path('watch_view/', views.watch_view, name='watch_view'),
    path('speakers_view/', views.speakers_view, name='speakers_view'),
    path('laptop_view/', views.laptop_view, name='laptop_view'),
    path('headsets_view/', views.headsets_view, name='headsets_view'),
    path('tv_view/', views.tv_view, name='tv_view'),
    path('airpods_view/', views.airpods_view, name='airpods_view'),

    # New fashion categories
    path('tshirts/', views.tshirts_view, name='tshirts_view'),
    path('tops/', views.tops_view, name='tops_view'),
    path('bottom-wear/', views.bottom_wear_view, name='bottom_wear_view'),
    path('mens-tshirts/', views.mens_tshirt_view, name='mens_tshirt_view'),
    path('women-tops/', views.women_tops_view, name='women_tops_view'),
    path('polo-shirts/', views.polo_shirts_view, name='polo_shirts_view'),
    path('my-orders/', views.my_orders, name='my_orders'),
    path('forgot-password/', auth_views.PasswordResetView.as_view(template_name='store/password_reset.html'), name='password_reset'),
    path('password-reset/done/', auth_views.PasswordResetDoneView.as_view(template_name='store/password_reset_done.html'), name='password_reset_done'),
    path('reset/<uidb64>/<token>/', auth_views.PasswordResetConfirmView.as_view(template_name='store/password_reset_confirm.html'), name='password_reset_confirm'),
    path('reset/done/', auth_views.PasswordResetCompleteView.as_view(template_name='store/password_reset_complete.html'), name='password_reset_complete'),
    path('vendor/insights/',views.vendor_insights,name='vendor_insights'),
    path('api/track_interaction/', views.track_interaction, name='track_interaction'),
    path('api/track_scroll/', views.track_scroll, name='track_scroll'),
    path('user_insights/', views.user_insights, name='user_insights'),
    path('vendor/performance/', views.product_performance_insights, name='product_performance_insights'),
    path('api/track_geolocation/', views.track_geolocation, name='track_geolocation'),
    path('geographical_insights/', views.geographical_insights, name='geographical_insights'),

]

