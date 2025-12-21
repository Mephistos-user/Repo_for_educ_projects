from django import forms

PRODUCT_QUANTITY_CHOICES = [(i, str(i)) for i in range(1, 21)]

class CartAddProductForm(forms.Form):
    '''
    Форма для добавления товара в корзину
    '''
    quantity = forms.TypedChoiceField(choices = PRODUCT_QUANTITY_CHOICES,
                                    coerce = int) # coerce=int - конвертация в целое число
    '''выбор количества от 1 до 20'''
    override = forms.BooleanField(required = False,
                                initial = False,
                                widget = forms.HiddenInput)
    ''''''