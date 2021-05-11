from django.urls import path,include

from . import views

urlpatterns = [
    path('',views.login,name="login"),
    path('homepage',views.homepage,name="homepage"),
    path('sidebar',views.sidebar,name="sidebar"),
    path('portal',views.portal,name="portal"),
    path('registration',views.registration,name="registration"),
    path('register',views.register,name="register"),
    path('edit/<int:id>',views.edit,name="edit"),
    path('edit1/<int:id>',views.edit1,name="edit1"),
    path('update/<int:id>',views.update,name="update"),
    path('StudentsList',views.StudentsList,name="StudentsList"),
    path('delete/<int:id>',views.delete,name="delete"),
    path('search',views.search,name="search"),


    
    path('table',views.table,name="table"),
    

]