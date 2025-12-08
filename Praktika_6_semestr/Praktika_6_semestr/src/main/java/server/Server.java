package server;

import worker.Worker;

import java.util.*;

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

                    workersList.add(Worker.createNewWorker(input));
                    continue;
                case 2:
                    System.out.println("Введите год, от которого считать стаж?");
                    scanner = new Scanner(System.in);
                    Integer year = scanner.nextInt();
                    // вызов метода вывода сотрудников, чей стаж больше указанного
                    System.out.println("Вывожу сотрудников, чей стаж больше указанного");
                    Worker.getTopWorkersByStage(workersList, year);
                    continue;
                case 3:
                    System.out.println("Введите ID сотрудника?");
                    scanner = new Scanner(System.in);
                    int idWorker = scanner.nextInt();
                    input = inputByUser();
                    // вызов метода обновления данных сотрудника
                    System.out.println("Обновляю данные сотрудника");
                    Worker.updateWorker(workersList, input, idWorker);
                    continue;
                case 4:
                    // вызов метода удаления сотрудника
                    System.out.println("Удаляю сотрудника");
                    Worker.deleteWorker(workersList);
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
