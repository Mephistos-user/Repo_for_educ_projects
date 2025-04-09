<?php
/** Контроллер функций пользователя
 */
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';

/** Формирование профиля пользователя
 * 
 * @param object $smarty
 */
function indexAction($smarty) {
    $allCategories = getAllCategories();

    $smarty->assign('pageTitle', 'Профиль');
    $smarty->assign('allCategories', $allCategories);
    $smarty->assign('recCategories', null);

    loadTemplate($smarty, 'profile');
}

/** Формирование страницы регистрации
 * 
 * @param object $smarty
 */
function templateregAction($smarty) {
    loadTemplate($smarty, 'registration');
}

/** Формирование страницы авторизации
 * 
 * @param object $smarty
 */
function templateauthAction($smarty) {
    loadTemplate($smarty, 'authorization');
}

/** AJAX регистрация пользователя
 * Инициализация сессионной переменной ($_SESSION['user'])
 * @return json массив данных нового пользователя
 */
function registerAction() {

    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);

    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : null;
    $name = isset($_REQUEST['name'])? $_REQUEST['name'] : null;
    $name = trim($name);

    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);

    if (!$resData && checkUserEmail($email)) {
        $resData['success'] = 0;
        $resData['message'] = "Пользователь с таким email ('{$email}') уже зарегистрирован!";
    }

    if (!$resData) {
        $pwHash = password_hash($pwd1, PASSWORD_BCRYPT);

        $userData = registerNewUser($email, $pwHash, $name, $phone, $address);
        if ($userData['success']) {
            $resData['message'] = 'Пользователь успешно зарегистрирован';
            $resData['success'] = 1;

            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ?: $userData['email'];
            $resData['userEmail'] = $email;

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ?: $userData['email'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'При регистрации произошла ошибка!';
        }
    }
    echo json_encode($resData);
}


/** AJAX выход из аккаунта
 */
function logoutAction() {
    if(isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
    redirect('/');
}

/** AJAX авторизация пользователя
 * 
 * @return json массив данных авторизованного пользователя
 */
function loginAction() {
    $email = isset($_REQUEST['email'])? $_REQUEST['email'] : null;
    $email = trim($email);

    $pwd = isset($_REQUEST['pwd'])? $_REQUEST['pwd'] : null;
    $pwd = trim($pwd);

    $userData = loginUser($email, $pwd);

    if ($userData['success']) {
        $userData = $userData[0]; // сразу сохраняем 0-й элемент, чтобы не ссылаться на него дальше

        // Инициализируем сессионной переменной
        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $userData['name']?: $userData['email'];

        $resData['userName'] = $_SESSION['user'];
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Неправильный email или пароль!';
    }
    echo json_encode($resData); // данные для js
}

/** Обновление данных пользователя
 * 
 * @return json результат выполнения операции
 */
function updateAction() {
    if(!isset($_SESSION['user'])) {
        redirect('/');
    }
    $resData = array();
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $address = isset($_REQUEST['address']) ? $_REQUEST['address'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $pwd1 = isset($_SESSION['pwd1']) ? $_SESSION['pwd1'] : null;
    $pwd2 = isset($_SESSION['pwd2'])? $_SESSION['pwd2'] : null;
    $curPwd = isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd'] : null;

    if(!$curPwd || !(password_verify($curPwd, $_SESSION['user']['pwd']))) {
        $resData['success'] = 0;
        $resData['message'] = 'Неправильный текущий пароль!';
        echo json_encode($resData);
        return false;
    }

    $res = updateUserData($name, $phone, $address, $pwd1, $pwd2);
    if($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Данные успешно изменены!';
        $_SESSION['userName'] = $name;

        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['address'] = $address;

        $newPwd = $_SESSION['user']['pwd']; // сначала сохраняем текущий пароль из сессии, чтобы не затереть старый пароль, если он не менялся
        if($pwd1 && $pwd2 && ($pwd1 === $pwd2)) {
            $newPwd = password_hash(trim($pwd1), PASSWORD_BCRYPT);
        }
        $_SESSION['user']['pwd'] = $newPwd;

        // $_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];
        $_SESSION['user']['displayName'] = $name ? : $_SESSION['user']['email'];
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'При изменении данных произошла ошибка!';
    }
    echo json_encode($resData);
}