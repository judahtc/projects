from django.shortcuts import render
from app1.models import Student
from app1.forms import StudentForms

# Create your views here.

def login(request):
    return render(request,"login.html")


def homepage(request):
    if request.method=='POST':
        if Student.objects.filter(id=request.POST['username'],password=request.POST['password']).exists():
             all=Student.objects.get(id=request.POST['username'])
             request.session['username']=request.POST['username']
             return render(request,"homepage.html",{ 'all':all})
             
        else:
             context={'msg':'invalid username or password'} 
             return render(request,"login.html",context)

def sidebar(request):
    return render(request,"sidebar.html")

    
def portal(request):
    alll=request.session['username']
    all=Student.objects.get(id=alll)
    return render(request,"portal.html",{'all':all})

def registration(request):
    alll=request.session['username']
    reg=Student.objects.get(id=alll)
    return render(request,"registration.html",{ 'reg':reg})

def register(request):
    if request.method=='POST':
        if request.POST.get('username') and request.POST.get('password') and request.POST.get('course_id1') and request.POST.get('course1') and request.POST.get('course_id2') and request.POST.get('course2') and request.POST.get('course_id3') and request.POST.get('course3'):
            Studen=Student()
            Studen.username=request.POST.get('username')
            Studen.password=request.POST.get('password')
            Studen.course_id1=request.POST.get('course_id1')
            Studen.course1=request.POST.get('course1')
            Studen.course_id2=request.POST.get('course_id2')
            Studen.course2=request.POST.get('course2')
            Studen.course_id3=request.POST.get('course_id3')
            Studen.course3=request.POST.get('course3')
            Studen.save()

            return render(request,"register.html")
        
    else:        
            return render(request,"register.html")
        
def edit(request,id):
    data=Student.objects.get(id=request.session['username']) 
    context={'data':data}
    return render(request,"edit.html",context)

def edit1(request,id):
    data=Student.objects.get(id=id) 
    context={'data':data}
    return render(request,"edit.html",context)
    
        
def table(request):           
    data=Student.objects.get(id=request.session['username']) 
    context={'data':data}
    return render(request,"table.html",context)


def update(request,id):
    data=Student.objects.get(id=id) 
    form=StudentForms(request.POST,instance=data)
    if form.is_valid():
        form.save()

        context={'data':data,'msg1':'updated successfully'}
        return render(request,"edit.html",context)

    else:
        
        
        data=Student.objects.get(id=request.session['username']) 
        context={'msg':'invalid input','data':data} 
        
        return render(request,"edit.html",context)

def StudentsList(request):
    
   data=Student.objects.all()
   
   context={'data':data}
   return render(request,"StudentsList.html",context)     


def search(request):
   if Student.objects.filter(id=request.POST['search']).exists(): 
        data=Student.objects.all()
        search=Student.objects.get(id=request.POST['search'])
        context={'data1':search}
        return render(request,"search.html",context)
   else:
        context={'data':'Search results not found!!!'}
        return render(request,"search.html",context)




def delete(request,id):
   data=Student.objects.get(id=id)
   data1=Student.objects.all()
   data.delete()
   context={'deleteMessage':'record successfully deleted','data':data1}
   return render(request,"StudentsList.html",context)     

   