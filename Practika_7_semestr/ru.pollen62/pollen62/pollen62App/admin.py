from django.contrib import admin
from .models import Category, Product

@admin.register(Category)
class CategoryAdmin(admin.ModelAdmin):
    list_display = ['name', 'slug']
    prepopulated_fields = {'slug': ('name',)}
    '''указывает поля, значение которых устанавливается автоматически
      с использованием значения других полей'''

@admin.register(Product)
class ProductAdmin(admin.ModelAdmin):
    list_display = ['name', 'slug', 'price', 'available', 'created', 'updated']
    list_filter = ['available', 'created', 'updated']
    '''фильтрация по полям'''
    list_editable = ['price', 'available']
    '''задает поля, которые можно редактировать, находясь на странице отобра-
    жения списка на сайте администрирования'''
    prepopulated_fields = {'slug': ('name',)}