from django import forms
from django.core.exceptions import ValidationError
from django.utils.translation import gettext_lazy as _
from .models import Names


class NameCreateForm(forms.ModelForm):
    name = forms.CharField(label='Имя пользователя', help_text='Максиммум 150 символов',
                                 widget=forms.TextInput(attrs={'class': 'form-control'}), required=True, )

    def clean_name(self):
        name = self.cleaned_data['name']

        #Проверка того, что имя не пустое
        if name == '':
            raise ValidationError(_('Имя не может быть пустым'))

        return name
    class Meta:
        model = Names
        fields = ['name', ]
        widget = {
            'name': forms.TextInput(attrs={
                        'class': 'form-control'
                    })
        }
         





