<?php
    //XXX
    // phpinfo(); // информация о конфигурации PHP и сервера

    // начинаем сессию и если она еще не создана, создаем ее
    session_start();
    // если в сессии нет массива корзины, тогда мы его создаем
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    include_once '../config/config.php';
    include_once '../library/mainFunctions.php';

    $controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index'; // если значение по ключу "controller" в запросе GET не NULL (isset) то (?) заменяем первую букву в значении полученного из запроса GET и присваиваем имя контроллера, в ином случае (:) используем имя контроллера по умолчанию 'Index'
    $actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

    if(isset($_SESSION['user'])) {
        $smarty->assign('arrUser', $_SESSION['user']);
    }
    
    $smarty->assign('cartCntItems', count($_SESSION['cart']));
    
    //XXX
    // Отслеживаем имена контроллеров и функций, которые получаются при обращении по тем или иным ссылкам
    // echo 'Included file = ' . $controllerName . '<br>';
    // echo 'Included function = ' . $actionName . '<br>';

    loadPage($smarty, $controllerName, $actionName);



