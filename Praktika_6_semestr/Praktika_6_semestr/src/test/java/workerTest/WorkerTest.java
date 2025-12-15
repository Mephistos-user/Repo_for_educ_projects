package worker;

import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;
import org.mockito.Mock;
import org.mockito.Mockito;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Scanner;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertNotEquals;
import static org.mockito.Mockito.mock;

class WorkerTest {

    @Mock
    Worker testWorker1 = new Worker("testName1", "testPosition1", 110000.50, 2011);
    @Mock
    Worker testWorker2 = new Worker("testName2", "testPosition2", 120000.50, 2012);
    @Mock
    Worker testWorker3 = new Worker("testName3", "testPosition3", 130000.50, 2013);
    @Mock
    Worker testWorker4 = new Worker("testName4", "testPosition4", 140000.50, 2014);
    @Mock
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
    void createNewWorkerTest() {
        Worker expected = new Worker();
        Scanner scannerMock = mock(Scanner.class);
        Mockito.when(scannerMock.nextLine()).thenReturn("testNameNew");
        expected.setName(scannerMock.nextLine());
        Mockito.when(scannerMock.nextLine()).thenReturn("testPositionNew");
        expected.setPosition(scannerMock.nextLine());
        Mockito.when(scannerMock.nextDouble()).thenReturn(250000.50);
        expected.setSalary(scannerMock.nextDouble());
        Mockito.when(scannerMock.nextInt()).thenReturn(2020);
        expected.setYearOfAdmissionToWork(scannerMock.nextInt());

        Worker actual = new Worker("testNameNew", "testPositionNew", 250000.50, 2020);
        actual.setId(expected.getId());

        assertEquals(expected, actual);
    }


    @Test
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

        Worker actual = new Worker("updateName", "updatePosition", 350000.50, 2022);
        actual.setId(1);

        assertEquals(testWorkerList.getFirst(), actual);

    }

    @Test
    void deleteWorker() {
        int idWorker = 17;
        boolean expected = testWorkerList.contains(Worker.getWorkerById(testWorkerList, idWorker));
        Worker.deleteWorker(testWorkerList, idWorker);
        boolean actual = testWorkerList.contains(Worker.getWorkerById(testWorkerList, idWorker));

        assertNotEquals(expected, actual);
    }

    @Test
    void getWorkerById() {
        int testIdWorker = 11;
        System.out.println(testWorkerList);
        Worker expected = Worker.getWorkerById(testWorkerList, testIdWorker);

        Worker actual = new Worker("testName3", "testPosition3", 130000.50, 2013);
        actual.setId(testIdWorker);

        assertEquals(expected, actual);
    }

    @Test
    void getTopWorkersByStage() {
        ArrayList<Worker> expected = Worker.getTopWorkersByStage(testWorkerList, 2013);
        ArrayList<Worker> actual = new ArrayList<>();
        actual.add(testWorker1);
        actual.add(testWorker2);

        assertEquals(expected, actual);

    }
}
