<?php
    // phpinfo(); // информация о конфигурации PHP и сервера
    include_once '../config/config.php';
    include_once '../library/mainFunctions.php';

    $controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index'; // если значение по ключу "controller" в запросе GET не NULL (isset) то (?) заменяем первую букву в значении полученного из запроса GET и присваиваем имя контроллера, в ином случае (:) используем имя контроллера по умолчанию 'Index'
    $actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

    // Отслеживаем имена контроллеров и функций, которые получаются при обращении по тем или иным ссылкам
    // echo 'Included file = ' . $controllerName . '<br>';
    // echo 'Included function = ' . $actionName . '<br>';

    loadPage($controllerName, $actionName);



