#  pip install requests, pip install beautifulsoup4, telebot

import requests
import telebot
from bs4 import BeautifulSoup as b

URL = 'https://habr.com/ru/all/'
TOKEN ='6225197499:AAG9qAOpIF7VlrmTPptDAEuPORcnIbv4BrE'
def parser(URL):
    r = requests.get(URL)
#print(r.status_code)
#print(r.text)

    soup = b(r.text, 'html.parser')
    news = soup.find_all('span', class_='tm-icon-counter tm-data-icons__item')
#news2 = [c.text for c in news]
#print(news2)
    return [c.text for c in news]

list1 = parser(URL)

bot = telebot.TeleBot(TOKEN)
@bot.message_handler(commands=['начать'])

def hello(message):
    bot.send_message(message.chat.id, 'Привет')


@bot.message_handler(content_types=['text'])
def txt(message):
    bot.send_message(message.chat.id, list1)

bot.polling(non_stop=True,interval=0)