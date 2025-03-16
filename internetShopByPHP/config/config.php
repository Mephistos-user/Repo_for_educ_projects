<?php
    /**
     * 
     * Файл настроек проекта
     * 
     */
    // Константы для обращения к контроллерам
    const PATHPREFIX = '../controllers/';
    const PATHPOSTFIX = 'Controller.php';

    // Константы для обращения к моделям (подключения к БД)
    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'internetshopbyphp';

    // Количество последних продуктов отображаемых на главной странице
    const LASTPRODUCTS = 12;
    
    // Папка шаблона
    $templateFolder = 'default';

    // Пути к шаблонам
    define('TMPLTPREFIX', "../views/{$templateFolder}/");
    const TMPLTPOSTFIX = '.tpl';

    // Пути шаблонам в www
    define('TMPLTWEBPATH', "/templates/{$templateFolder}/");

    // Подключаем шаблонизатор Smarty
    require ('../library/Smarty/libs/Smarty.class.php');
    $smarty = new Smarty();

    // Настройки Smarty (Конфигурация объекта smarty)
    // дирректория для хранения шаблонов .tpl
    $smarty->setTemplateDir(TMPLTPREFIX);
    // дирректория для хранения скомпилированных HTML страниц
    $smarty->setCompileDir('../tmp/smarty/template_c');
    // дирректория для хранения кэшированных страниц
    $smarty->setCacheDir('../tmp/smarty/cache');
    // дирректория для хранения конфигурации smarty
    $smarty->setConfigDir('../library/Smarty/configs/');

    // Создаем smarty переменную (шаблон) ('templateWebPath' - имя переменной, TMPLTWEBPATH - значение переменной)
    $smarty->assign('templateWebPath', TMPLTWEBPATH);