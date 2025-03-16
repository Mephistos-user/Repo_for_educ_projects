<?php
    /**
     * Получение списка товаров для главной страницы
     * @param int $limit - лимит отображения товаров на странице
     * @return array|false
     */
    function getLastProducts($limit = null) {
        $link = createConnection();
        $sql = "SELECT * FROM products ORDER BY id DESC"; // сортировка в обратном порядке

        if($limit) {
            $sql.= " LIMIT $limit"; // ограничение количества выводимых продуктов
        }
        $result = mysqli_query($link, $sql);
        //XXX
        // if($result === false) {
        //     echo "Error" . mysqli_error($link);
        // }
        return createSmartyRecArr($result);
    }
    /**
     * Получение списка товаров для страницы подкатегории
     * @param int $id - идентефикатор подкатегории товаров
     * @return array|false
     */
    function getProductsByCategory($id) {
        $itemId = intval($id); // защищаем от SQL-инъекций; приводит любое значение к integer
        $link = createConnection();
        $sql = "SELECT * FROM products WHERE category_id = ". $itemId;
        $result = mysqli_query($link, $sql);
        //XXX
        // if ($result === false) {
        //     // $err = "Ошибка выполнения запроса: ". mysqli_error($link);
        //     // return $err;
        //     return false;
        // }
        return createSmartyRecArr($result);
    }
    /**
     * Получение информации о конкретном товаре
     * @param int $id - идентификатор товара
     * @return array|false
     */
    function getProductById($id) {
        $itemId = intval($id);
        $link = createConnection();
        $sql = "SELECT * FROM products WHERE id = ". $itemId;
        $result = mysqli_query($link, $sql);
        //XXX
        // if ($result === false) {
        //     // $err = "Ошибка выполнения запроса: ". mysqli_error($link);
        //     // return $err;
        //     return false;
        // }
        return mysqli_fetch_assoc($result);
    }