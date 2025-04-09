<?php
    /** Модель для таблицы заказов (orders)
     * 
     */

    /** Создание заказа
     * 
    * @param string $name
    * @param string $phone
    * @param string $address
    * @return integer ID нового заказа
    *
    */
    function makeNewOrder($name, $phone, $address) {
        // инициализируем переменные
        $userId = $_SESSION['user']['id'];
        $comment = "id пользователя: {$userId}<br/>
                    Имя: {$name}<br/>
                    Телефон: {$phone}<br/>
                    Адрес: {$address}";
        $dateCreated = data('Y.m.d H:i:s');
        $userIp = $_SERVER['REMOTE_ADDR'];

        $sql = "INSERT INTO orders (`user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`) VALUES ('{$userId}', '{$dateCreated}', null, 0, '{$comment}', '{$userIp}')";
        $link = createConnection();
        $result = mysqli_query($link, $sql);

        // Получим id созданной записи
        if ($result) {
            $sql = "SELECT `id` FROM orders ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($link, $sql);
            $result = createSmartyRecArr($result);

            if (isset($result[0])) {
                return $result[0]['id'];
            }
        }
        return false;
    }