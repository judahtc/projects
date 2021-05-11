from django.db import models
from django.contrib.auth.models import AbstractUser

# Create your models here.
class User(AbstractUser):
    name = models.CharField(max_length=255)
    email = models.CharField(max_length=255,unique=True)
    password = models.CharField(max_length=255)
    username = None

    USERNAME_FIELD = 'email'
    REQUIRED_FIELDS = []


    

# Create your models here.
class TotalSales(models.Model):
    sales_id=models.AutoField(primary_key=True)
    item_name=models.CharField(max_length=200)
    item_id=models.IntegerField()
    clientname=models.CharField(max_length=200)
    date=models.CharField(max_length=200)
    price=models.IntegerField(default='0')
    quantity=models.IntegerField(default='0')
    accountNumber=models.CharField(max_length=200,default='0')
    phone=models.CharField(max_length=200,default='0')
    payment_method=models.CharField(max_length=200,default='0')



    class Meta:
        db_table='TotalSales'  


class clients(models.Model):
    username=models.CharField(max_length=200)
    password=models.CharField(max_length=200)
    email=models.CharField(max_length=200,default='0')
    contact=models.CharField(max_length=200,default='0')
    dob=models.CharField(max_length=200,default='0')


    class Meta:
        db_table='clients'

class clientss(models.Model):
    username=models.CharField(max_length=200)
    password=models.CharField(max_length=200)
    email=models.CharField(max_length=200,default='0')
    contact=models.CharField(max_length=200,default='0')
    dob=models.CharField(max_length=200,default='0')


    class Meta:
        db_table='clientss'

