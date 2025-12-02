package utils;

import model.Worker;

//** Класс утилит /*/
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
}