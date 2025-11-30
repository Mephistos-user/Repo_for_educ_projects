import controllers.Worker;
import server.Server;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        ArrayList<Worker> workersList = new ArrayList<>();

        Server server = new Server();
        server.runServer();



    }

    // ввод с клавиатуры данных класса типа WORKER;

    public Worker createNewWorker() {
        Scanner scanner = new Scanner(System.in);
        System.out.println("Введите данные нового сотрудника через пробел: ");
        System.out.println("Id?");
        int id = scanner.nextInt();
        System.out.println("Фамилия?");
        String surName = scanner.next();
        System.out.println("имя");
        String firstName = scanner.next();
        System.out.println("Отчество?");
        String secondName = scanner.next();

        System.out.print("Сотрудник " + surName + " " + firstName + " " + secondName + " создан");

        return new Worker(id, surName, firstName,secondName);
    }
    // вывод на дисплей фамилий работников, чей стаж работы в организации превышает значение, введенное с клавиатуры;
    public void getTopWorkersByStage(ArrayList<Worker> workersList, Integer year) {
        ArrayList<Worker> topWorkersByStage = new ArrayList<Worker>();
        
        for (int i = 0; i < workersList.size(); i++) {
            Worker currentWorker = workersList.get(i);
            if(currentWorker.getYearOfAdmissionToWork() > year) {
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
    // если таких работников нет, вывести соответствующее сообщение.

}