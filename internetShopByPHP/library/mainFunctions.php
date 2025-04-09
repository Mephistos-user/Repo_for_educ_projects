<?php
    /**
     * 
     * Главные функции проекта
     * 
     */
    /** Формирование запрашиваемой страницы
     * 
     * @param string $controllerName название контроллера
     * @param string $actionName название функции обработки страницы внутри контроллера
     */
    function loadPage($smarty, $controllerName, $actionName = 'index') {
        include_once PATHPREFIX . $controllerName . PATHPOSTFIX;
        $function = $actionName . "Action";
        $function($smarty);
    }

    /** Загрузка шаблона сайта
     * 
     * @param string $templateName название шаблона
     */
    function loadTemplate($smarty, $templateName) {
        $smarty->display($templateName . TMPLTPOSTFIX);
    }

    /** Конвертирование результата запроса в массив для Smarty
     * 
     * @param mysqli_result $record результат запроса
     * @return array $smartyRec массив для Smarty
     */
    function createSmartyRecArr($record) {
        if(!$record) return false;
        $smartyRec = array();
        while($row = mysqli_fetch_array($record)) {
            $smartyRec[] = $row;
        }
        return $smartyRec;
    }

    /** Перенаправление на другую страницу
     * 
     * @param string $url адрес страницы по умолчанию главная страница ("/")
     */
    function redirect($url = "/") {
        header("Location: {$url}"); // header - позволяет отправить http заголовок
        exit;
    }