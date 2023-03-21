from django.shortcuts import render, redirect
from django.contrib.auth.models import User
from django.contrib.auth import authenticate,login
from django.contrib.auth import logout
from django.http import HttpResponseRedirect
from django.contrib.auth.forms import UserCreationForm
from django.core.mail import send_mail
# from .models import VehSS
from .forms import OwnerForm
# from .forms import TravellerForm
from VehSS.models import Owner
# from VehSS.models import Manager


# def manager(request):
#     # submitted=False
#     if request.method=="POST":
#         name = request.POST.get('name')
#         email_address = request.POST.get('email_address')
#         location = request.POST.get('location')
#         carname = request.POST.get('carname')
#         seats = request.POST.get('seats')
#         phone = request.POST.get('phone')
#         date_time = request.POST.get('date_time')
#         image = request.POST.get('image')
#         en=Owner(name=name,email_address=email_address,location=location,carname=carname,seats=seats,phone=phone,date_time=date_time,image=image)
#         en.save()
#     return render(request,'owner.html')

def owner(request):
    # submitted=False
    # from django.core.mail import send_mail

    send_mail(
    'Testing mail',
    'Here is the message.',
    'info.vss163@gmail.com',
    ['21cs053@charusat.edu.in'],
    fail_silently=False,
    )
    if request.method=="POST":
        name = request.POST.get('name')
        email = request.POST.get('email')
        # email_address = request.POST.get('email_address')
        location = request.POST.get('location')
        carname = request.POST.get('carname')
        seats = request.POST.get('seats')
        phone = request.POST.get('phone')
        date_time = request.POST.get('date_time')
        image = request.FILES['image']
        en=Owner(name=name,email=email,location=location,carname=carname,seats=seats,phone=phone,date_time=date_time,image=image)
        en.save()
        # messages.success(request,"Owner registered succesfully")
    return render(request,'owner.html')
    # else:
    #     form=OwnerForm
    #     if 'submitted' in request.GET:
    #         submitted=True
    

def traveller_v(request):
    # submitted=False
    # if request.method=="POST":
    #     form = TravellerForm(request.POST)
    #     if form.is_valid():
    #         form.save()
    #         return HttpResponseRedirect('/traveller?submitted=True')
    # else:
    #     form=OwnerForm
    #     if 'submitted' in request.GET:
    #         submitted=True
    ownerData=Owner.objects.all()
    data={
        'ownerData' : ownerData
    }
    
    return render(request,'traveller_v.html',data)

def traveller_a(request):
    ownerData=Owner.objects.all()
    data={
        'ownerData' : ownerData
    }
    
    return render(request,'traveller_a.html',data)

def traveller_n(request):
    ownerData=Owner.objects.all()
    data={
        'ownerData' : ownerData
    }
    
    return render(request,'traveller_n.html',data)

# Create your views here.
# from .forms import OrderForm,CreateUserForm

def registerPage(request):
    form=UserCreationForm()

    if request.method=='POST':
        form=UserCreationForm(request.POST)
        if form.is_valid():
            form.save()
    context={'form':form}
    return render(request,'register.html',context)


def index(request):
    if request.user.is_anonymous:
        return redirect("/login")
    return render(request, 'index.html')


def traveller(request):
    return render(request, 'traveller.html')


def about(request):
    return render(request, 'about.html')

def formu(request):
    return render(request, 'form.html')


def services(request):
    return render(request, 'services.html')

def userview(request):
    ownerData=Owner.objects.all()
    data={
        'ownerData' : ownerData
    }
    return render(request, 'userview.html',data)


def contact(request):
    return render(request, 'contact.html')


def loginUser(request):
    if request.method == "POST":
        username = request.POST.get('username')
        password = request.POST.get('password')

        user = authenticate(username=username, password=password)
        if user is not None:
          # A backend authenticated the credentials
          login(request,user)
          return redirect("/")
        else:
          # No backend authenticated the credentials
          return redirect(request, 'login.html')
    return render(request, 'login.html')


def logoutUser(request):
    logout(request)
    return redirect("/login")
