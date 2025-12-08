package utils;

import worker.Worker;

import java.util.HashMap;
import java.util.Scanner;

/**
 * Класс утилит
 */
public class Utils {
    /**
     * автоинкремент ID для объектов класса Worker
     *
     * @return - currentId возвращает ID для объектов увеличенный на единицу относительно базового класса Worker
     */
    public static int autoIncrementId() {
        int currentId = Worker.getCountOfId();
        currentId++;
        Worker.setCountOfId(currentId);
        return currentId;
    }

    /**
     * Обрабатывает пользовательский ввод данных
     *
     * @return input HashMap коллекция с данными сотрудника
     */
    public static HashMap<String, String> inputByUser() {
        HashMap<String, String> inputMap = HashMap.newHashMap(4);

        Scanner scanner = new Scanner(System.in);
        System.out.println("Введите данные: ");
        System.out.println("Фамилия и инициалы?");
        String name = scanner.nextLine();
        System.out.println("Должность?");
        String position = scanner.nextLine();
        System.out.println("Зарплата в формате 100,05 (обязательно через запятую)?");
        Double salary = scanner.nextDouble();
        System.out.println("Год принятия на работу?");
        int yearOfAdmissionToWork = scanner.nextInt();
        inputMap.put("name", name);
        inputMap.put("position", position);
        inputMap.put("salary", String.valueOf(salary));
        inputMap.put("year", String.valueOf(yearOfAdmissionToWork));

        return inputMap;
    }
}