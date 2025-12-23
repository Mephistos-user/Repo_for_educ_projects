from django.db import models
from shop.models import Product

class Order(models.Model):
    '''заказ'''
    first_name = models.CharField(u'Фамилия', max_length=50)
    last_name = models.CharField(u'Имя', max_length=50)
    email = models.EmailField(u'Email')
    address = models.CharField(u'Адрес', max_length=250)
    postal_code = models.CharField(u'Индекс', max_length=20)
    city = models.CharField(u'Город', max_length=100)
    created = models.DateTimeField(u'Создан', auto_now_add=True)
    updated = models.DateTimeField(u'Обновлен', auto_now=True)
    paid = models.BooleanField(u'Оплачен', default=False)

    class Meta:
        ordering = ['-created']
        indexes = [
            models.Index(fields=['-created']),
            ]
        verbose_name = 'Заказ'
        verbose_name_plural = 'Заказы'
        
    def __str__(self):
        return f'Order {self.id}'
    
    def get_total_cost(self):
        return sum(item.get_cost() for item in self.items.all())

class OrderItem(models.Model):
    order = models.ForeignKey(Order,
                            verbose_name=u"Заказ",
                            related_name='items',
                            on_delete=models.CASCADE)
    product = models.ForeignKey(Product,
                                verbose_name=u"Товар",
                                related_name='order_items',
                                on_delete=models.CASCADE)
    price = models.DecimalField(u'Цена', max_digits=10, decimal_places=2)
    quantity = models.PositiveIntegerField(u'Количество', default=1)

    def __str__(self):
        return str(self.id)
    def get_cost(self):
        return self.price * self.quantity