from django.db import models
from django.urls import reverse

class Category(models.Model):
    '''
    Модель категорий продукции
    '''
    name = models.CharField(u'Название', max_length=200)
    slug = models.SlugField(u'Слуг', max_length=200, unique=True)

    class Meta:
        ordering = ['name']
        indexes = [
            models.Index(fields=['name']),
        ]
        verbose_name = 'Категория'
        verbose_name_plural = 'Категории'

    def __str__(self):
        return self.name
    
    def get_absolute_url(self):
        '''получение URL-адреса объекта Category'''
        return reverse('shop:product_list_by_category', args=[self.slug])

class Product(models.Model):
    '''
    Модель товара
    '''
    category = models.ForeignKey(Category,
                                verbose_name=u"Категория",
                                related_name='products',
                                on_delete=models.CASCADE)
    name = models.CharField(u'Название', max_length=200)
    slug = models.SlugField(u'Слуг', max_length=200)
    image = models.ImageField(u'Фото', upload_to='products/%Y/%m/%d', blank=True)
    description = models.TextField(u'Описание', blank=True)
    price = models.DecimalField(u'Цена', max_digits=10, decimal_places=2)
    available = models.BooleanField(u'Доступность', default=True)
    created = models.DateTimeField(u'Создано', auto_now_add=True)
    updated = models.DateTimeField(u'Обновлено', auto_now=True)


    class Meta:
        ordering = ['name']
        indexes = [
            models.Index(fields=['id', 'slug']),
            models.Index(fields=['name']),
            models.Index(fields=['-created']),
        ]
        verbose_name = 'Товар'
        verbose_name_plural = 'Товары'

    def __str__(self):
        return self.name
    
    def get_absolute_url(self):
        '''получение URL-адреса объекта Product'''
        # TODO: добавить поле ID в Product
        return reverse('shop:product_detail', args=[self.id, self.slug])
