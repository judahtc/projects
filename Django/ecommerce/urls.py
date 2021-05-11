
from django.contrib import admin
from django.urls import path,include
from . import views

urlpatterns = [
    path('',views.home,name="home"),
    path('login',views.login,name="login"),
    path('portal',views.portal,name="portal"),
    path('mainPortal',views.mainPortal,name="mainPortal"),
    path('router',views.router,name="router"),
    path('mifi',views.mifi,name="mifi"),
    path('regUser',views.regUser,name="regUser"),
    path('items',views.cartItems,name="items"),
    path('addRouter',views.addRouter,name="addRouter"),
    path('addMifi',views.addMifi,name="addMifi"),
    path('myCart',views.myCart,name="myCart"),
    path('sales',views.sales,name="sales"),

    path('delete/<int:id>',views.delete,name="delete"),
    
    path('deleteItems/<int:id>',views.deleteItems,name="deleteItems"),
    path('purchase/<int:id>',views.purchase,name="purchase"),
    path('checkOut/<int:id>',views.checkOut,name="checkOut"),




    

]