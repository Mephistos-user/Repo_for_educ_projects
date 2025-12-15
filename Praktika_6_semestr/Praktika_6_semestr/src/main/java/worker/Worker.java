package worker;

import utils.Utils;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Objects;

/**
 * Класс Worker
 */
public class Worker {
    private static int countOfId; // счетчик ID
    private int idWorker; // ID объекта
    private String name; // Фамилия и инициалы
    private String position; // должность
    private Double salary; // зарплата
    private int yearOfAdmissionToWork; // год поступления на работу

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
    public Worker(String surName, String position, Double salary, int yearOfAdmissionToWork) {
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
     * @return new Worker(name, position, salary, yearOfAdmissionToWork) новый объект типа Worker
     */
    public static Worker createNewWorker(HashMap<String, String> input) {

        System.out.println("Сотрудник " + input.get("name") + " создан");

        return new Worker(input.get("name"), input.get("position"), Double.valueOf(input.get("salary")), Integer.parseInt(input.get("year")));
    }

    /**
     * Обновляет данные о сотруднике
     *
     * @param workersList список сотрудников
     */
    public static void updateWorker(ArrayList<Worker> workersList, HashMap<String, String> input, int idWorker) {

        Worker worker = getWorkerById(workersList, idWorker);
        assert !(worker == null);

        worker.setName(input.get("name"));
        worker.setPosition(input.get("position"));
        worker.setSalary(Double.valueOf(input.get("salary")));
        worker.setYearOfAdmissionToWork(Integer.parseInt(input.get("year")));

        System.out.println("Данные обновлены");
    }

    /**
     * Поиск по ID
     *
     * @param workersList ArrayList<Worker> список сотрудников
     * @param idWorker    int id сотрудника
     * @return worker Worker сотрудник, найденный по ID
     */
    public static Worker getWorkerById(ArrayList<Worker> workersList, int idWorker) {
        Worker currentWorker = null;
        if (workersList.isEmpty()) {
            System.out.println("Список сотрудников пуст. Сначала добавьте новых сотрудников");
        }
        for (Worker worker : workersList) {

            if (worker.getId() == idWorker) {
                currentWorker = worker;

            } else {
                System.out.println("Сотрудника с таким ID не существует");
            }
        }
        return currentWorker;
    }

    /**
     * Удаляет записи о сотруднике
     *
     * @param workersList список объектов типа Worker
     */
    public static void deleteWorker(ArrayList<Worker> workersList, int idWorker) {
        Worker worker = Worker.getWorkerById(workersList, idWorker);
        if (!(worker == null)) {
            System.out.println("Сотрудник с ID = " + worker.getId() + " удален");
            workersList.remove(worker);
        }
    }

    /**
     * Выводит на дисплей фамилий работников, чей стаж работы в организации превышает значение, введенное с клавиатуры
     *
     * @param workersList ArrayList<Worker> - список объектов типа Worker
     * @param year        Integer - год, раньше которого искомые сотрудники приняты на работу
     * @return topWorkersByStage ArrayList<Worker>
     */
    public static ArrayList<Worker> getTopWorkersByStage(ArrayList<Worker> workersList, Integer year) {
        ArrayList<Worker> topWorkersByStage = new ArrayList<>();
        for (Worker currentWorker : workersList) {
            if (currentWorker.getYearOfAdmissionToWork() < year) {
                topWorkersByStage.add(currentWorker);
            }
        }
        return topWorkersByStage;
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

    public void setYearOfAdmissionToWork(int yearOfAdmissionToWork) {
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

    /**
     * Переопределение метода сравнения объектов equals()
     */
    @Override
    public boolean equals(Object o) {
        if (this == o) return true;
        if (o == null || getClass() != o.getClass()) return false;
        Worker worker = (Worker) o;
        return idWorker == worker.idWorker &&
                Objects.equals(name, worker.name) &&
                Objects.equals(position, worker.position) &&
                Objects.equals(salary, worker.salary) &&
                Objects.equals(yearOfAdmissionToWork, worker.yearOfAdmissionToWork);
    }
}
