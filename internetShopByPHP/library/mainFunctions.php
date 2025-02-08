<?php
    /**
     * 
     * Главные функции проекта
     * 
     */
    /**
     * 
     * Формирование запрашиваемой страницы
     * 
     * @param string $controllerName название контроллера
     * @param string $actionName название функции обработки страницы внутри контроллера
     */
    function loadPage($controllerName, $actionName) {
        include_once PATHPREFIX . $controllerName . PATHPOSTFIX;
        $function = $actionName . "Action";
        $function();
    }