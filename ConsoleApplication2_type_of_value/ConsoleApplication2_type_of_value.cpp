﻿// ConsoleApplication2_type_of_value.cpp : Этот файл содержит функцию "main". Здесь начинается и заканчивается выполнение программы.
//

#include <iostream>
#include <string>

#include <iomanip>//содержит функции fixed и setprecision()

using namespace std;





int main()
{
    int x = 4, y;//переменные можно указывать через запятую
    char ch = 'd';
    bool b = true;
    float fl = 1.55;
    double dl;

    y = int(fl);//преобразоывания типов переменных (еще варианты: (int)fl - как в "С", и классика для "С++" - static_cast<int> (fl) )
    
    //вывод с определенной точностью:
    cout << fixed;
    cout << setprecision(8) << fl;//задает погрешность (количество знаков после запятой)

    cout << sizeof(y);//узнать размер типа переменной

    //модификаторы переменных:
    signed int i1;//значение со знаком + или -
    unsigned char ch1;// 1байт от 0 до 255
    unsigned int i2;// 4 байта от 0 до 4294967295
    long long i;//увеливает в два раза размера переменной типа int (8 байт)
    short int z;//укорачивает длинну символа в 2 раза (2 байта от -32768 до 32768
    unsigned short int i3;// 2 байта от 0 до 65535

    cout << ch << ' ' << int(ch);//узнать цифровой код символа

    //переменные типа "строка"
    string name = "!!!Andy!!!";
    char c = name[4];//символ из строки по номеру (начальная позиция от 0
    cout << name.size() << endl;//длинна строковой переменной
    cout << name.substr(4, 5) << endl;//вывод части строки начиная с 5й позиции (4 отсчитаное от 0), в количестве 5и символов подряд
    cout << name.insert(4, "5sdf") << endl;//вставка строки в строку

    //преобразование строк
    string name1 = "135";
    int i3;
    i3 = stoi(name1);//преобразование строки в int
    cout << i3 + 120 << endl;

    string name2 = "324215";
    int i4 = 345;
    name2 = to_string(i4);//преобразовать в строку
    cout << name2 + "Test" << endl;
    string name3 = name2 + "00";//конкатенация строк - сложение (склеивание) строк

    


}

// Запуск программы: CTRL+F5 или меню "Отладка" > "Запуск без отладки"
// Отладка программы: F5 или меню "Отладка" > "Запустить отладку"

// Советы по началу работы 
//   1. В окне обозревателя решений можно добавлять файлы и управлять ими.
//   2. В окне Team Explorer можно подключиться к системе управления версиями.
//   3. В окне "Выходные данные" можно просматривать выходные данные сборки и другие сообщения.
//   4. В окне "Список ошибок" можно просматривать ошибки.
//   5. Последовательно выберите пункты меню "Проект" > "Добавить новый элемент", чтобы создать файлы кода, или "Проект" > "Добавить существующий элемент", чтобы добавить в проект существующие файлы кода.
//   6. Чтобы снова открыть этот проект позже, выберите пункты меню "Файл" > "Открыть" > "Проект" и выберите SLN-файл.