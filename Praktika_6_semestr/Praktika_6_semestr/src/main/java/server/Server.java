package server;

import worker.Worker;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Scanner;

import static utils.Utils.inputByUser;

/**
 * Класс сервер
 */
public class Server {

    private boolean exit;
    private int switchVar;

    public Server() {
        this.exit = true; // переключатель остановки сервера
        this.switchVar = 0; // переключатель выбора действия
    }

    /**
     * Запускает сервер
     *
     * @param workersList - список объектов типа Worker
     */
    public void runServer(ArrayList<Worker> workersList) {
        System.out.println("Сервер запущен!");
        Scanner scanner;
        HashMap<String, String> input;
        int idWorker;

        while (this.exit) {
            System.out.println("Выберите действие:");
            System.out.println("1 - создать нового сотрудника;");
            System.out.println("2 - вывести сотрудников, чей стаж больше указанного;");
            System.out.println("3 - обновления данных сотрудника;");
            System.out.println("4 - удаление сотрудника;");
            System.out.println("0 - выйти из программы;");

            // вызов метода установки переключателя выбора действия
            setSwitchVar();

            switch (this.switchVar) {
                case 1:
                    // вызов метода создания нового сотрудника
                    System.out.println("Cоздаю нового сотрудника");
                    input = inputByUser();
                    Worker newWorker = Worker.createNewWorker(input);
                    workersList.add(newWorker);
                    continue;
                case 2:
                    System.out.println("Введите год, от которого считать стаж?");
                    scanner = new Scanner(System.in);
                    Integer year = scanner.nextInt();
                    // вызов метода получения сотрудников, чей стаж больше указанного
                    ArrayList<Worker> topWorkersByStage = Worker.getTopWorkersByStage(workersList, year);
                    if (!topWorkersByStage.isEmpty()) {
                        System.out.println("Вывожу сотрудников, чей стаж больше указанного");
                        for (Worker worker : topWorkersByStage) {
                            System.out.println(worker);
                        }
                    } else {
                        System.out.println("Сотрудников со стажем больше " + year + " нет");
                    }
                    continue;
                case 3:
                    System.out.println("Введите ID сотрудника?");
                    scanner = new Scanner(System.in);
                    idWorker = scanner.nextInt();
                    input = inputByUser();
                    // вызов метода обновления данных сотрудника
                    System.out.println("Обновляю данные сотрудника");
                    Worker.updateWorker(workersList, input, idWorker);
                    continue;
                case 4:
                    // вызов метода удаления сотрудника
                    System.out.println("Удаляю сотрудника");
                    scanner = new Scanner(System.in);
                    idWorker = scanner.nextInt();
                    Worker.deleteWorker(workersList, idWorker);
                    continue;
                case 0:
                    // выход из программы (остановка сервера)
                    this.exit = false;
                    break;
                default:
                    System.out.println("Такой команды нет! Повторите ввод команды");

            }
        }
    }

    /**
     * Устанавливает переключателя выбора действия
     */
    public void setSwitchVar() {
        Scanner scanner = new Scanner(System.in);
        this.switchVar = scanner.nextInt();
    }
}
