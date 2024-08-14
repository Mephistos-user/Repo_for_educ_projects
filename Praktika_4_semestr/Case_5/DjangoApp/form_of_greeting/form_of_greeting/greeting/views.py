from django.views.generic import CreateView
from django.contrib import messages
from django.shortcuts import render, redirect
from django.contrib.auth import logout

from .models import Names
from .forms import NameCreateForm

def register(request):
    if request.method == 'POST':
        form = NameCreateForm(request.POST)
        if form.is_valid():
            form.save()
            messages.success(request, 'Регистрация прошла успешно')
            return redirect('Home')
        else:
            messages.error(request, 'Ошибка регистрации')
    else:
        form = NameCreateForm()
    return render(request, 'register.html', {'form': form})

def user_logout(request):
    logout(request)
    return redirect('Register')

class HomePage(CreateView):
    model = Names
    form_class = NameCreateForm

    context_object_name = 'name'
    template_name = 'index.html'

    def get_context_data(self, *args, object_list=None, **kwargs):
        context = super().get_context_data(**kwargs)

        last_name_object = Names.objects.last()
        # last_name_object_by_id = Names.objects.filter(id=last_name_object.id)
        context['name'] = last_name_object.name
        # context['name'] = last_name_object_by_id.first().name
        # context['name'] = None
        return context

