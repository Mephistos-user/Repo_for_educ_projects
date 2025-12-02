//package tests;
//import models.Worker;
//import org.junit.jupiter.api.Test;
//import java.util.ArrayList;
//import java.util.Random;
//
//
//
//class WorkerTest {
//
//    ArrayList<Worker> testWorkersList = new ArrayList<>();
//
//
//    @Test
//    void testCreateNewWorker() {
//
//    }
//
//    @Test
//    void testUpdateWorker() {
//
//    }
//
//    @Test
//    void testDeleteWorker() {
//
//    }
//
//    @Test
//    void testGetTopWorkersByStage() {
//
//    }
//
//    public static void createTestWorkersList(ArrayList<Worker> testWorkersList) {
//        for (int i = 0; i < 10; i++) {
//            Worker testWorker = generateWorker();
//            testWorkersList.add(testWorker);
//        }
//    }
//    public static Worker generateWorker() {
//        Worker worker = new Worker();
//        int countOfId = 0; // ID
//        int idWorker = ++countOfId; // ID объекта
//        worker.setId(idWorker);
//        String name = "имя" + idWorker; // Фамилия и инициалы
//        worker.setName(name);
//        String position = "Должность" + idWorker; // должность
//        worker.setPosition(position);
//        Double salary = new Random(100000).nextDouble(); // зарплата
//        worker.setSalary(salary);
//        Integer yearOfAdmissionToWork = 1990 + new Random().nextInt(35); // год поступления на работу
//        worker.setYearOfAdmissionToWork(yearOfAdmissionToWork);
//
//        return worker;
//    }
//
//}