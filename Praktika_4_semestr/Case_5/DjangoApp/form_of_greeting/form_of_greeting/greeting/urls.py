from django.urls import path
from greeting.views import HomePage, register, user_logout

urlpatterns = [
    path('', HomePage.as_view(), name='Home'),
    path('register/', register, name='Register'),
    path('logout/', user_logout, name='Logout'),
]
