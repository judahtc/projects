from . import views
from django.urls import path,include
urlpatterns = [
    
    path('',views.Juloh.as_view(),name='juloh'),
    path('JulohUpdate/<int:id>',views.JulohUpdate.as_view()),
    path('login',views.LoginView.as_view()),
    path('portal',views.UserView.as_view()),
    path('logout',views.LogoutView.as_view()),
    path('update',views.Update.as_view()),
   
]


