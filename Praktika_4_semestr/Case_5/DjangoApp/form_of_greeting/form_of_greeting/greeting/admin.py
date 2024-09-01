from django.contrib import admin

# Register your models here.
from django.db import models
from .models import Names


# from django.utils.safestring import mark_safe
from django import forms

class NamesAdminForm(forms.ModelForm):

    class Meta:
        model = Names
        fields = '__all__'

class NamesAdmin(admin.ModelAdmin):
    list_display = ('id', 'name')
    list_display_links = ('id', 'name')
    search_fields = ('name',)
    fields = ('name',)
    form = NamesAdminForm

admin.site.register(Names, NamesAdmin)

admin.site.site_title = 'Страница администратора имен'
admin.site.site_header = 'Страница администратора имен'