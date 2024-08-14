from django.db import models
from django.urls import reverse_lazy

class Names(models.Model):
    name = models.CharField(max_length=150, verbose_name='Имя пользователя')

    def get_absolute_url(self):
        return reverse_lazy('Home', kwargs={'name': self.name})
    
    class Meta:
        verbose_name = 'Имя'
        verbose_name_plural = 'Имена'
