<?php
    /**
     * Модель категорий для меню
     */
    /**
     * Создание подключения к БД
     * @return mysqli|bool
     */
    function createConnection() {
        $link = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        if ($link === false) {
            // XXX
            // $err = "Ошибка подключения к базе данных: ". mysqli_connect_error();
            // return $err;
            return false;
        } else {
            // XXX
            // echo ("Соединение установленно успешно!<br>");
            mysqli_set_charset($link, 'utf8');
            return $link;
        }
    }

    /**
     * Получение категорий товаров из БД
     * @return array|bool
     */
    function getAllCategories() {
        $link = createConnection();
        $sql = "SELECT * FROM categories WHERE parent_id=0";
        $result = mysqli_query($link, $sql);
        $smartyArr = array();
        if ($result === false) {
            // XXX
            // $err = "Ошибка выполнения запроса: ". mysqli_error($link);
            // return $err;
            return false;
        } else {
            while ($row = mysqli_fetch_array($result)) {
                $recChildren = getChildren($row['id']);
                if ($recChildren) {
                    $row['children'] = $recChildren;
                }

                $smartyArr[] = $row;
            }
        }
        return $smartyArr;
    }

    /**
     * Получение дочерних категорий для указанной родительской
     * @param int $parent_id - идентификатор категорий
     * @return array|false
     */
    function getChildren($parent_id) {
        $link = createConnection();
        $sql = "SELECT * FROM categories WHERE parent_id=$parent_id";
        $result = mysqli_query($link, $sql);
        // XXX
        // $smartyArr = array();
        // if ($result === false) {
        //     $err = "Ошибка выполнения запроса: ". mysqli_error($link);
        //     return $err;
        //     // return false;
        // } else {
        //     while ($row = mysqli_fetch_array($result)) {
        //         // $recChildren = getChildren($row['id']);
        //         // if ($recChildren) {
        //         //     $row['children'] = $recChildren;
        //         // }
        //         echo $row['name_ru'];
                
        //         // $smartyArr[] = $row;
        //     }
        // }
        return createSmartyRecArr($result);
    }

    /**
     * Получение нформации о подкатегории
     * @param int $id - идентификатор категорий
     * @return array|false|null
     */
    function getCategoriesById($id) {
        $categoryId = intval($id); // защищаем от SQL-инъекций; приводит любое значение к integer
        $link = createConnection();
        $sql = "SELECT * FROM categories WHERE id = " . $categoryId;
        $result = mysqli_query($link, $sql);
        // XXX
        // if ($result === false) {
        //     // $err = "Ошибка выполнения запроса: ". mysqli_error($link);
        //     // return $err;
        //     return false;
        // }
        return mysqli_fetch_assoc($result); // возвращаем ассоциативный массив
    }

