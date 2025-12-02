package model;

import utils.Utils;

import java.util.ArrayList;
import java.util.Scanner;

/**
 * Класс Worker
 */
public class Worker {
    private static int countOfId = 0; // счетчик ID
    private int idWorker; // ID объекта
    private String name; // Фамилия и инициалы
    private String position; // должность
    private Double salary; // зарплата
    private Integer yearOfAdmissionToWork; // год поступления на работу

    // конструктор по умолчанию
    public Worker() {
        // устанавливаем ID объекта с помощью метода автоинкремента
        setId(Utils.autoIncrementId());
        this.name = "Фамилия и инициалы";
        this.position = "Должность";
        this.salary = 0.0;
        this.yearOfAdmissionToWork = 1900;
    }

    // конструктор с параметрами
    public Worker(String surName, String position, Double salary, Integer yearOfAdmissionToWork) {
        // устанавливаем ID объекта с помощью метода автоинкремента
        setId(Utils.autoIncrementId());
        this.name = surName;
        this.position = position;
        this.salary = salary;
        this.yearOfAdmissionToWork = yearOfAdmissionToWork;
    }

    /**
     * Создает нового сотрудника
     *
     * @return - new Worker(name, position, salary, yearOfAdmissionToWork) новый объект типа Worker
     */
    public static Worker createNewWorker() {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Введите данные нового сотрудника: ");
        System.out.println("Фамилия и инициалы?");
        String name = scanner.nextLine();
        System.out.println("Должность?");
        String position = scanner.nextLine();
        System.out.println("Зарплата в формате 100,05 (обязательно через запятую)?");
        Double salary = scanner.nextDouble();
        System.out.println("Год принятия на работу?");
        Integer yearOfAdmissionToWork = scanner.nextInt();

        System.out.println("Сотрудник " + name + " создан");

        return new Worker(name, position, salary, yearOfAdmissionToWork);
    }

    /**
     * Обновляет данные о сотруднике
     *
     * @param workersList - список объектов типа Worker
     */
    public static void updateWorker(ArrayList<Worker> workersList) {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Введите ID сотрудника: ");
        int idWorker = scanner.nextInt();
        if (workersList.isEmpty()) {
            System.out.println("Список сотрудников пуст. Добавьте новых сотрудников");
        }
        for (Worker worker : workersList) {

            //TODO: отладка удалить
            System.out.println(worker);

            if (worker.getId() == idWorker) {
                System.out.println("Введите обновленные данные сотрудника: ");
                System.out.println("Фамилия и инициалы?");
                worker.setName(scanner.nextLine());
                System.out.println("Должность?");
                worker.setPosition(scanner.nextLine());
                System.out.println("Зарплата в формате 100,05?");
                worker.setSalary(scanner.nextDouble());
                System.out.println("Год принятия на работу?");
                worker.setYearOfAdmissionToWork(scanner.nextInt());

                System.out.println("Данные обновлены");

            } else {
                System.out.println("Сотрудника с таким ID не существует");
            }
            return;
        }
    }

    /**
     * Удаляет записи о сотруднике
     *
     * @param workersList ArrayList<Worker> - список объектов типа Worker
     */
    public static void deleteWorker(ArrayList<Worker> workersList) {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Введите ID сотрудника для удаления: ");
        int idWorker = scanner.nextInt(); // ввод ID искомого сотрудника
        // Поиск сотрудника в списке по ID
        for (Worker worker : workersList) {
            int currentId = worker.getId();
            if (currentId == idWorker) {
                workersList.remove(currentId);
            } else {
                System.out.println("Сотрудника с таким ID не существует");
                return;
            }
        }
        System.out.println("Сотрудник с ID = " + idWorker + " удален");
    }

    /**
     * Выводит на дисплей фамилий работников, чей стаж работы в организации превышает значение, введенное с клавиатуры
     *
     * @param workersList ArrayList<Worker> - список объектов типа Worker
     * @param year        Integer - год, раньше которого искомые сотрудники приняты на работу
     */
    public static void getTopWorkersByStage(ArrayList<Worker> workersList, Integer year) {
        ArrayList<Worker> topWorkersByStage = new ArrayList<>();
        for (Worker currentWorker : workersList) {
            if (currentWorker.getYearOfAdmissionToWork() < year) {
                topWorkersByStage.add(currentWorker);
            }
        }
        if (!topWorkersByStage.isEmpty()) {
            for (int i = 0; i < topWorkersByStage.size(); i++) {
                System.out.println(topWorkersByStage.get(i));
            }
        } else {
            System.out.println("Сотрудников со стажем больше " + year + " нет");
        }
    }

    public static int getCountOfId() {
        return countOfId;
    }

    public static void setCountOfId(int countOfId) {
        Worker.countOfId = countOfId;
    }

    public int getId() {
        return idWorker;
    }

    public void setId(int id) {
        this.idWorker = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getPosition() {
        return position;
    }

    public void setPosition(String position) {
        this.position = position;
    }

    public Double getSalary() {
        return salary;
    }

    public void setSalary(Double salary) {
        this.salary = salary;
    }

    public Integer getYearOfAdmissionToWork() {
        return yearOfAdmissionToWork;
    }

    public void setYearOfAdmissionToWork(Integer yearOfAdmissionToWork) {
        this.yearOfAdmissionToWork = yearOfAdmissionToWork;
    }

    /**
     * Переопределение метода toString() для объектов класса Worker
     */
    @Override
    public String toString() {
        return "Сотрудник ID=" + idWorker +
                " {Фамилия и инициалы = '" + name + '\'' +
                ", Должность = '" + position + '\'' +
                ", Зарплата = " + salary +
                ", Стаж работы с = " + yearOfAdmissionToWork + " года" +
                '}';
    }
}
