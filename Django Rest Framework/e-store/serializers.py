from rest_framework import serializers
from store.models import User

from django.http import HttpResponse, JsonResponse #1

class UserSerializer(serializers.ModelSerializer):
    class Meta:
        model=User
        fields = "__all__"
from store.models import TotalSales
from store.models import clientss 
from django.http import HttpResponse, JsonResponse #1

class TotalSalesSerializer(serializers.ModelSerializer):
    class Meta:
        model=TotalSales
        fields = "__all__"

        
class clientssSerializer(serializers.ModelSerializer):
    class Meta:
        model=clientss
        fields = "__all__"

class clientsSerializer(serializers.ModelSerializer):
    class Meta:
        model=clientss
        fields = "__all__"

 