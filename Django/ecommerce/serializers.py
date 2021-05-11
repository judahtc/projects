from rest_framework import serializers 
from store.models import TotalSales

class TotalSalesSerializer(serializers.ModelSerializer):
    class Meta:
        model=TotalSales
        fields = "__all__"