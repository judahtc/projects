from django.shortcuts import render,redirect
from store.models import users
from store.models import cart_items
from store.models import cart
from store.models import TotalSales
from datetime import date
from django.db import connection, transaction
from django.core.mail import send_mail
from django.conf import settings
from django.template.loader import render_to_string
from django.utils.html import strip_tags
from store.serializers import TotalSalesSerializer
from django.http import HttpResponse, JsonResponse #1
from django.views.decorators.csrf import csrf_exempt #2
from rest_framework.parsers import JSONParser #3
from rest_framework.response import Response

# Create your views here.
from rest_framework.views import APIView
from rest_framework import status



def home(request):
    return render(request,"home.html")


def login(request):
    return render(request,"login.html")   

def portal(request):
    if request.method=='POST':
        if users.objects.filter(email=request.POST['email'],password=request.POST['password']).exists():    
            Users=users.objects.get(email=request.POST['email'])
            request.session['username']= Users.username
            request.session['email']= Users.email
            username=request.session['username']
            
            all=users.objects.get(username=request.session['username'])
            all1=cart.objects.filter(clientname=username).count()
            
            context={'data':all,'data2':all1}
            return render(request,"portal.html",context)
        else:
            context={'data':"invalid username or password"}  
            return render(request,"login.html",context)  

def mainPortal(request):
    username=request.session['username']
    all1=users.objects.get(username=username)
    conte={'data':all1}
    return render(request,"mainPortal.html",conte)   



def regItems(request):
    items=cart_items()
    items.item_id='10102'
    items.item_name='mifi'
    items.item_price='27.79'
    items.quantity=30
    items.save()

    print(items.item_id)
    

def router(request):
    username=request.session['username']
    all2=users.objects.get(username=username)
    all1=cart_items.objects.get(id=1)
    conte={'data':all2,'data1':all1 }
    return render(request,"router.html",conte) 

def mifi(request):
    username=request.session['username']
    all2=users.objects.get(username=username)
    all1=cart_items.objects.get(id=2)
    conte={'data':all2,'data1':all1 }
    return render(request,"mifi.html",conte) 




def regUser(request):
    if request.method=='POST':
        
            user=users()
            user.username=request.POST.get('username')
            user.password=request.POST.get('password')
            user.email=request.POST.get('email')
            user.contact=request.POST.get('contact')
            user.dob=request.POST.get('username')
            user.save()
            
            return render(request,"userReg.html") 

            
    else:        
        return render(request,"userReg.html")
        

def cartItems(request):
    all=cart_items.objects.all()
    contex={'data':all}
    return render(request,"items.html",contex)

def deleteItems(request,id):
    all1=cart_items.objects.get(id=id)
    all1.delete()

    all=cart_items.objects.all()
    contex={'data':all}
    return render(request,"items.html",contex)

def addRouter(request):
    username=request.session['username']
    all=cart_items.objects.get(id=1)
    all1=cart_items.objects.get(id=1)
    all2=users.objects.get(username=username)
    
    Cart=cart()
    Cart.clientname=username
    Cart.item_name=all.item_name  
    Cart.item_id=all.item_id
    

    Cart.save()

    all2=users.objects.get(username=username)
    all1=cart_items.objects.get(id=1)
    conte={'data':all2,'data1':all1,'data2':"item successfully added to cart" }
    return render(request,"router.html",conte) 


def addMifi(request):
    username=request.session['username']
    all=cart_items.objects.get(id=2)
    all1=cart_items.objects.get(id=2)
    all2=users.objects.get(username=username)
    
    Cart=cart()
    Cart.clientname=username
    Cart.item_name=all.item_name  
    Cart.item_id=all.item_id
    
    

    Cart.save()

    all2=users.objects.get(username=username)
    all1=cart_items.objects.get(id=2)
    conte={'data':all2,'data1':all1,'data2':"item successfully added to cart" }
    return render(request,"mifi.html",conte) 



def myCart(request):
    username=request.session['username']
    print(type(username))
    
    all=cart.objects.raw("SELECT * FROM cart WHERE clientname=%s ",[username])
    all1=cart_items.objects.raw("SELECT * FROM cart_items WHERE id=1 ")  
    alls=cart.objects.raw("SELECT t.id,t.item_id,t.item_name,t.clientname,ti.item_price from cart AS t join cart_items AS ti on t.item_id=ti.item_id where t.clientname=%s ",[username])
    all2=cart.objects.filter(clientname=username).count()
    all4=cart.objects.filter(clientname=username)
    conte={'data':alls,'data1':all1,'data2':all2,'data3':alls}
    return render(request,"myCart.html",conte) 
    
def delete(request,id):
    data=cart.objects.get(id=id)
    data.delete()

    username=request.session['username']
    all=cart.objects.filter(clientname=username)
    all1=cart_items.objects.get(id=1)
    alls=cart.objects.raw("SELECT t.id,t.item_id,t.item_name,t.clientname,ti.item_price from cart AS t join cart_items AS ti on t.item_id=ti.item_id where t.clientname=%s ",[username])
    all2=cart.objects.filter(clientname=username).count()
    conte={'data3':alls,'data1':all1,'data2':all2}
    return render(request,"myCart.html",conte) 
    
def purchase(request,id):
   
     all=cart.objects.raw("SELECT t.id,t.item_id,t.item_name,t.clientname,ti.item_price from cart AS t join cart_items AS ti on t.item_id=ti.item_id where t.id=%s ",[id])

   
     
     context={'data':all}
     return render(request,"purchase.html",context) 

def checkOut(request,id):
    if request.method=='POST':
        if request.POST.get('username') and request.POST.get('item_name') and request.POST.get('item_price'):

            all=cart.objects.get(id=id)
            sales=TotalSales()
            sales.item_name=request.POST.get('item_name')
            sales.item_id=all.item_id
            sales.clientname=request.POST.get('username')
            sales.price=request.POST.get('item_price')
            sales.accountNumber=request.POST.get('acc')
            sales.phone=request.POST.get('phone')
            sales.quantity=request.POST.get('quantity')
            sales.payment_method=request.POST.get('payment_method')
            sales.date=date.today()
            sales.save()
            
            all=cart.objects.raw("SELECT t.id,t.item_id,t.item_name,t.clientname,ti.item_id,ti.item_price from cart AS t join cart_items AS ti on t.item_id=ti.item_id where t.id=%s ",[id])
            all3=cart.objects.get(id=id)

            item_id=all3.item_id
            quantity=request.POST.get('quantity')
            cursor=connection.cursor()
            cursor.execute("UPDATE cart_items set quantity=quantity-%s where item_id=%s",[quantity,item_id])
            
            transaction.commit()

            data=cart.objects.get(id=id)
            data.delete()
            Var1=request.POST.get('item_name')
            Var2=request.POST.get('item_price')
            Var3=request.POST.get('quantity')
            Var4=date.today()
            context={'order_name':Var1,'order_price':Var2,'quantity':Var3,'date':Var4}

            name=request.session['email']
            username=request.session['username']

            you='Juloh'
            subject = 'Thank you for purchasing with us '+username
            html_message = render_to_string('email.html',context)
            message=strip_tags(html_message)
            email_from = settings.EMAIL_HOST_USER
            recipient_list = [name,]
            send_mail( subject, message, email_from, recipient_list , html_message=html_message)
            


            
            return render(request,"email.html",context) 

    else:
        
            return render(request,"purchase.html") 


def sales(request):
    all=TotalSales.objects.all()
    context={"data":all}
    return render(request,"sales.html",context)




    

