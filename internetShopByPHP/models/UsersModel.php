<?php
    /**
     * Модель для таблицы пользователей
     */

    /**
      * Регистрация нового пользователя
      * @param string $email адрес электронной почты
      * @param string $pwHash хэш пароля пользователя
      * @param string $name имя пользователя
      * @param string $phone номер телефона пользователя
      * @param string $address адрес пользователя
      * @return array массив данных нового пользователя
      */
    function registerNewUser($email, $pwHash, $name, $phone, $address) {
        $email = htmlspecialchars($email);
        $name = htmlspecialchars($name);
        $phone = htmlspecialchars($phone);
        $address = htmlspecialchars($address);

        // Запрос к БД для добавления нового пользователя
        $link = createConnection();
        $sql = "INSERT INTO users (`email`, `pwd`, `name`, `phone`, `address`) VALUES ('{$email}', '{$pwHash}', '{$name}', '{$phone}', '{$address}')";
        $result = mysqli_query($link, $sql);

        // Обработка результата
        if ($result) {
            $sql = "SELECT * FROM users WHERE (`email` = '{$email}' AND `pwd` = '{$pwHash}') LIMIT 1";
            $result = mysqli_query($link, $sql);
            $result = createSmartyRecArr($result);

            if (isset($result[0])) {
                $result['success'] = 1;
            } else {
                $result['success'] = 0;
            }

        } else {
            $result['success'] = 0;
        }
        return $result;
    }

    /**
     * Проверка введенных параметров регистрации
     * @param string $email адрес электронной почты
     * @param string $pwd1 пароль пользователя
     * @param string $pwd2 повтор пароля пользователя
     * @return array|null $result массив с результатами проверки
     */
    function checkRegisterParams($email, $pwd1, $pwd2) {
        $result = null;

        if (!$email) {
            $result['success'] = null;
            $result['message'] = 'Введите email';
        }
        if (!$pwd1) {
            $result['success'] = null;
            $result['message'] = 'Введите пароль';
        }
        if (!$pwd2) {
            $result['success'] = null;
            $result['message'] = 'Повторите пароль';
        }
        if ($pwd1 != $pwd2) {
            $result['success'] = null;
            $result['message'] = 'Пароли не совпадают';
        }

        //TODO: добавить валидацию полей

        return $result;
    }

    /**
     * Проверка существования пользователя с указанным email (проверка наличия дубликата почты)
     * @param string $email адрес электронной почты
     * @return array|null $result массив с результатами проверки (строка из таблицы users/пустой масссив)
     */
    function checkUserEmail($email) {
        $email = htmlspecialchars($email);
        $link = createConnection();
        $sql = "SELECT id FROM users WHERE email = '" . $email . "'";
        $result = mysqli_query($link, $sql);

        return createSmartyRecArr($result);
    }

    /**
     * Авторизация пользователя
     * @param string $email адрес электронной почты
     * @param string $pwd пароль пользователя
     * @return array|null $result массив с результатами авторизации (строка из таблицы users/пустой масссив)
     */
    function loginUser($email, $pwd) {
        $email = htmlspecialchars($email);
        $link = createConnection();
        $sql = "SELECT * FROM users WHERE `email` = '{$email}' LIMIT 1";
        $result = mysqli_query($link, $sql);

        $result = createSmartyRecArr($result);
        if ((isset($result[0])) && (password_verify($pwd, $result[0]['pwd']))) {
            $result['success'] = 1;
        } else {
            $result['success'] = 0;
        }
        return $result;
    }

    /**
     * Обновление данных пользователя
     * @param string $name имя пользователя
     * @param string $phone номер телефона пользователя
     * @param string $address адрес пользователя
     * @param string $pwd1 новый пароль пользователя (если он введен)
     * @param string $pwd2 повтор нового пароля пользователя (если он введен)
     * @return bool $result true если изменения сохранены
     */
    function updateUserData($name, $phone, $address, $pwd1, $pwd2) {
        // не передаем email, так как он находится в сессионной переменной
        $email = htmlspecialchars($_SESSION['user']['email']);

        $name = htmlspecialchars($name);
        $phone = htmlspecialchars($phone);
        $address = htmlspecialchars($address);
        $pwd1 = trim($pwd1);
        $pwd2 = trim($pwd2);

        $newPwd = null;

        if ($pwd1 && ($pwd1 === $pwd2)) {
            $newPwd = password_hash($pwd1, PASSWORD_BCRYPT);
        }

        $sql = "UPDATE users SET ";
        if($newPwd) {
            $sql .= "`pwd` = '{$newPwd}', ";
        }
        //TODO: разделить поля для изменения, если поля пустые и не изменяются
        $sql .= "`name` = '{$name}', `email` = '{$email}', `phone` = '{$phone}', `address` = '{$address}'";
        $sql .= "WHERE `email` = '{$email}' LIMIT 1";
        $link = createConnection();
        $result = mysqli_query($link, $sql);

        return $result;
    }