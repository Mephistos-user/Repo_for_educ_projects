from django.contrib import admin

# Register your models here.
from django.db import models
from .models import Names


# from django.utils.safestring import mark_safe
from django import forms

# class Names(models.Model):
#     name = models.CharField(max_length=150, verbose_name='Имя пользователя')
    
    # category = models.ForeignKey('Category', on_delete=models.PROTECT, null=True, verbose_name='Категория')

    # def get_absolute_url(self):
    #     return reverse_lazy('View_news', kwargs={'pk': self.pk})

    # class Meta:
    #     verbose_name = 'Новость'
    #     verbose_name_plural = 'Новости'
    #     ordering = ['-create_at']

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