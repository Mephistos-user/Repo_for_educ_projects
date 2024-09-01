# Generated by Django 5.0.7 on 2024-08-11 07:53

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Names',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=150, verbose_name='Имя пользователя')),
            ],
            options={
                'verbose_name': 'Имя',
                'verbose_name_plural': 'Имена',
            },
        ),
    ]