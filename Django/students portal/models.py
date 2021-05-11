from django.db import models

class Student(models.Model):
    username=models.CharField(max_length=200)
    password=models.CharField(max_length=200)
    course_id1=models.CharField(max_length=200)
    course1=models.CharField(max_length=200)
    course_id2=models.CharField(max_length=200)
    course2=models.CharField(max_length=200)
    course_id3=models.CharField(max_length=200)
    course3=models.CharField(max_length=200)


    class Meta:
        db_table="Student"
    
class Programs(models.Model):
    program_id=models.IntegerField()
    program_name=models.CharField(max_length=200)
    program_dep=models.CharField(max_length=200)
    
    class Meta:
        db_table="Programs"

# Create your models here.
