from django.contrib import admin
from django.urls import path
from VehSS import views

urlpatterns = [
    path("",views.index,name='home'),
    path("about",views.about,name='about'),
    path("services",views.services,name='services'),
    path("register",views.registerPage,name='register'),
    path("contact",views.contact,name='contact'),
    path("form",views.formu,name='form'),
    path("index",views.index,name='index'),
    path("userview",views.userview,name='userview'),
    path("login",views.loginUser,name='login'),
    path("logout",views.logoutUser,name='logout'),
    path("owner",views.owner,name='owner'),
    path("traveller",views.traveller,name='traveller'),
    path("traveller_a",views.traveller_a,name='traveller_a'),
    path("traveller_v",views.traveller_v,name='traveller_v'),
    path("traveller_n",views.traveller_n,name='traveller_n'),





    
]