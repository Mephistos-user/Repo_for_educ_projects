import worker.Worker;
import server.Server;

import java.util.ArrayList;

public class Main {
    public static void main(String[] args) {

        ArrayList<Worker> workersList = new ArrayList<>();

        Server server = new Server();
        server.runServer(workersList);

        //TODO: отладка, удалить
        System.out.println(workersList);

    }
}