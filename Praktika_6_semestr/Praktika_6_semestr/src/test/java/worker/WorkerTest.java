package worker;

import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.DisplayName;
import org.junit.jupiter.api.Test;
import org.mockito.Mock;
import org.mockito.Mockito;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Scanner;

import static org.junit.jupiter.api.Assertions.*;
import static org.mockito.Mockito.mock;

class WorkerTest {
    @Mock
    Worker testWorker1 = new Worker("testName1", "testPosition1", 110000.50, 2011);
    Worker testWorker2 = new Worker("testName2", "testPosition2", 120000.50, 2012);
    Worker testWorker3 = new Worker("testName3", "testPosition3", 130000.50, 2013);
    Worker testWorker4 = new Worker("testName4", "testPosition4", 140000.50, 2014);
    Worker testWorker5 = new Worker("testName5", "testPosition5", 150000.50, 2015);
    @Mock
    ArrayList<Worker> testWorkerList = new ArrayList<>();

    @BeforeEach
    public void beforeEach() {
        testWorkerList.add(testWorker1);
        testWorkerList.add(testWorker2);
        testWorkerList.add(testWorker3);
        testWorkerList.add(testWorker4);
        testWorkerList.add(testWorker5);
    }

    @BeforeEach


    @Test
        // @DisplayName("Тест создания нового сотрудника")
    void createNewWorkerTest() {
        Worker testWorker = new Worker();
        Scanner scannerMock = mock(Scanner.class);
        Mockito.when(scannerMock.nextLine()).thenReturn("testNameNew");
        testWorker.setName(scannerMock.nextLine());
        Mockito.when(scannerMock.nextLine()).thenReturn("testPositionNew");
        testWorker.setPosition(scannerMock.nextLine());
        Mockito.when(scannerMock.nextDouble()).thenReturn(250000.50);
        testWorker.setSalary(scannerMock.nextDouble());
        Mockito.when(scannerMock.nextInt()).thenReturn(2020);
        testWorker.setYearOfAdmissionToWork(scannerMock.nextInt());

        Worker worker = new Worker("testNameNew", "testPositionNew", 250000.50, 2020);
        worker.setId(testWorker.getId());

        assertEquals(worker, testWorker);
    }


    @Test
        // @DisplayName("Тест обновления данных")
    void updateWorkerTest() {
        HashMap<String, String> input = new HashMap<>();
        input.put("name", "updateName");
        input.put("position", "updatePosition");
        input.put("salary", "350000.50");
        input.put("year", "2022");

        Scanner scannerMock = mock(Scanner.class);
        Mockito.when(scannerMock.nextInt()).thenReturn(1);
        int idWorker = scannerMock.nextInt();

        Worker.updateWorker(testWorkerList, input, idWorker);

        Worker worker = new Worker("updateName", "updatePosition", 350000.50, 2022);
        worker.setId(1);

        assertEquals(worker, testWorkerList.getFirst());

    }
//
//    @Test
//    void deleteWorker() {
//    }
//
//    @Test
//    void getTopWorkersByStage() {
//    }
}
