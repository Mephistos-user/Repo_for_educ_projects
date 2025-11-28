import controllers.Worker;

import java.util.ArrayList;
import java.util.HashMap;

public class Main {
    public static void main(String[] args) {
        ArrayList<Worker> workersList = new ArrayList<>();

        boolean exit = false;
        String var = "";

        HashMap varValues = new HashMap<Integer, String>();
        varValues.put(1, "createNewWorker");
        varValues.put(2, "updateWorker");
        varValues.put(3, "createNewWorker");
        varValues.put(4, "createNewWorker");
        varValues.put(5, "createNewWorker");
        varValues.put(6, "createNewWorker");
        varValues.put(7, "createNewWorker");
        varValues.put(8, "createNewWorker");
        varValues.put(9, "exit");



        while (true) {
            if (exit) {
                break;
            }
            switch (var) {
                case "a":
                    return;
                case "a":
                    return;
                case "a":
                    return;
                case "a":
                    return;
                case "a":
                    return;

            }
        }



    }
}