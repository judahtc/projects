from django.db import models
from django.contrib.auth.models import AbstractUser

class users(models.Model):
    username=models.CharField(max_length=200)
    password=models.CharField(max_length=200)
    email=models.CharField(max_length=200,default='0')
    contact=models.CharField(max_length=200,default='0')
    dob=models.CharField(max_length=200,default='0')


    class Meta:
        db_table='users'


class cart(models.Model):
    clientname=models.CharField(max_length=200)   
    item_name=models.CharField(max_length=200)
    item_id=models.IntegerField(default='0')

    class Meta:
        db_table='cart'  

class cart_items(models.Model):
    item_id=models.IntegerField()
    item_name=models.CharField(max_length=200)
    item_price=models.CharField(max_length=200)
    quantity=models.IntegerField(default='0')

    class Meta:
        db_table='cart_items'




class TotalSales(models.Model):
    sales_id=models.AutoField(primary_key=True)
    item_name=models.CharField(max_length=200)
    item_id=models.IntegerField()
    clientname=models.CharField(max_length=200)
    date=models.CharField(max_length=200)
    price=models.IntegerField(max_length=200,default='0')
    quantity=models.IntegerField(default='0')
    accountNumber=models.CharField(max_length=200,default='0')
    phone=models.CharField(max_length=200,default='0')
    payment_method=models.CharField(max_length=200,default='0')



    class Meta:
        db_table='TotalSales'  



