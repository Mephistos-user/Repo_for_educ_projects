package server;

import java.util.Scanner;

public class Server {


    private boolean exit;
    private int switchVar;

    public Server() {
        this.exit = true;
        this.switchVar = 0;
    }





    public void runServer() {
        System.out.println("Сервер запущен!");

        while (this.exit) {
            System.out.println("Выберите действие:");
            System.out.println("1 - создать нового сотрудника;");
            System.out.println("2 - вывести сотрудников, чей стаж больше указанного;");
            System.out.println("0 - выйти из программы;");

            setSwitchVar();

            switch (this.switchVar) {
                case 1:
                    // вызов метода создания нового сотрудника
                    System.out.println("Cоздаю нового сотрудника;");
                    continue;
                case 2:
                    // вызов метода вывода сотрудников, чей стаж больше указанного
                    System.out.println("Вывожу сотрудников, чей стаж больше указанного;");
                    continue;
                case 0:
                    this.exit = false;
                    break;
                default:
                    System.out.println("Такой команды нет! Повторите ввод команды");

            }
        }
    }


    public void setSwitchVar() {
        Scanner scanner = new Scanner(System.in);
        this.switchVar = scanner.nextInt();
    }
}
