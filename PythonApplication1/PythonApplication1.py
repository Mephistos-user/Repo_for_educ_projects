# pip install aiogram
# bot - определяет команды от пользователя и ответ
# Dispatcher - отслеживает обновления
# executor - запускает все
# types - позволяет воспринимать сообщения пользователя
from aiogram import Bot, Dispatcher, executor, types
from aiogram.types import ReplyKeyboardRemove, ReplyKeyboardMarkup, KeyboardButton
TOKEN = '6225197499:AAG9qAOpIF7VlrmTPptDAEuPORcnIbv4BrE'

bot = Bot(token=TOKEN)
dp = Dispatcher(bot)

# Пишем декоратор
@dp.message_handler(commands=['start'])
async def say_hello(message: types.Message):
    list1 = [
        [
            types.KeyboardButton(text='Какой глупый бот'),
            types.KeyboardButton(text='Отдай мой голос'),
            types.KeyboardButton(text='Привет'),
            types.KeyboardButton(text='Как тебя зовут?'),

        ],
    ]
    keyboard = types.ReplyKeyboardMarkup(keyboard=list1)
    await message.reply('Привет!', reply_markup=keyboard)

@dp.message_handler()
async def echo(message: types.Message):
    await message.answer(message.text)



# reply - кнопки - нужны для шаблонов ответов
# inline - кнопки - кнопки, привязанные к сообщениям


executor.start_polling(dp, skip_updates=True)

