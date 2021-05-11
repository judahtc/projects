from django.shortcuts import render
from store.serializers import  UserSerializer
from store.models import  User
# Create your views here.
from django.http import HttpResponse, JsonResponse #1
from django.views.decorators.csrf import csrf_exempt #2
from rest_framework.parsers import JSONParser #3
from rest_framework.decorators import api_view #4
from rest_framework.response import Response #5
from rest_framework.exceptions import AuthenticationFailed
from django.views.decorators.csrf import csrf_exempt
#FOR CLASS BASED VIEWS
from rest_framework.views import APIView
from rest_framework import status

#JWT AND TIME

import jwt, datetime



###AUTHENTICATION




class LoginView(APIView):
    
    def post(self,request):
        email =request.data['email']
        password =request.data['password']
        
        user=User.objects.filter(email=email).first()
        
      
        if user is None:
            raise AuthenticationFailed('User not found!')

        if user.password!=password :
            raise AuthenticationFailed("incorrect password")

        

        payload = {
            'id':user.id,
            'exp': datetime.datetime.utcnow() + datetime.timedelta(minutes=10),
            'iat': datetime.datetime.utcnow()
        }

        token = jwt.encode(payload, 'secret', algorithm='HS256')
        
        response = Response()
        response.set_cookie(key='jwt',value=token ,httponly=True)
        response.data = {
            'jwt':token
        }
        return response

class UserView(APIView):
    def get(self,request):
        token=request.COOKIES.get('jwt')
        
        if not token:
            raise AuthenticationFailed("unauthorised")
        
        try:
            payload =jwt.decode(token, 'secret', algorithms=['HS256'])
        except jwt.ExpiredSignatureError:
            raise AuthenticationFailed("session expired")

        user=User.objects.get(id=payload['id'])
        
        serializer=UserSerializer(user)
        return Response(serializer.data)

class Update(APIView):
      def get_object(self,request):
            try:
                token=request.COOKIES.get('jwt')
                
                if not token:
                    raise AuthenticationFailed("unauthorised")
                
                try:
                    payload =jwt.decode(token, 'secret', algorithms=['HS256'])
                except jwt.ExpiredSignatureError:
                    raise AuthenticationFailed("session expired")

                user=User.objects.get(id=payload['id'])
                
                return user

            except User.DoesNotExist:
                return Response("wakadhakwa",status=status.HTTP_204_NO_CONTENT)

      def get(self,request):
            obj=self.get_object(request)
            serializer=UserSerializer(obj)
            return Response(serializer.data)


      def put(self,request):
        
        obj=self.get_object(request)
        serializer=UserSerializer(obj,data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data)
        return Response("corrupted data",status=status.HTTP_204_NO_CONTENT)

      def delete(self,request):
        all=self.get_object(request)  
        all.delete()
        return Response(status=status.HTTP_204_NO_CONTENT)


    
class LogoutView(APIView):
    def post(self, request):
        response = Response()
        response.delete_cookie('jwt')
        response.data = {
            'message': 'success'
        }
        return response


class Juloh(APIView):

    def get(self,request):
        all=User.objects.all()
        serializer=UserSerializer(all ,many=True)
        return Response(serializer.data)

    def post(self ,request):
        serializer=UserSerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data,status=status.HTTP_201_CREATED)
        return Response(status=status.HTTP_204_NO_CONTENT)


class JulohUpdate(APIView):

    def get_object(self,id):
        try:
            data=User.objects.get(id=id)
            return data
        except User.DoesNotExist:
            return Response(status=status.HTTP_204_NO_CONTENT)

    def get(self,request,id):

        obj=self.get_object(id)
        serializer=UserSerializer(obj)
        return Response(serializer.data)

    def put(self,request,id):
        
        obj=self.get_object(id)
        serializer=UserSerializer(obj,data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data)
        return Response("corrupted data",status=status.HTTP_204_NO_CONTENT)

    def delete(self,request,id):
        all=self.get_object(id)  
        all.delete()
        return Response(status=status.HTTP_204_NO_CONTENT)



