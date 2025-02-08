<?php
    /**
     * 
     * Файл настроек проекта
     * 
     */
    // Константы для обращения к контроллерам
    const PATHPREFIX = '../controllers/';
    const PATHPOSTFIX = 'Controller.php';

    // Папака шаблона
    $templateFolder = 'default';

    // Пути к шаблонам
    define('TMPLTPREFIX', "../views/{$templateFolder}/");
    const TMPLTPOSTFIX = '.tpl';

    // Пути шаблонам в www
    define('TMPLTWEBPATH', "/templates/{$templateFolder}/");

    // Подключаем шаблонизатор Smarty
    require ('../library/Smarty/libs/Smarty.class.php');
    $smarty = new Smarty();

    // Настройки Smarty
    // дирректория для хранения шаблонов .tpl
    $smarty->setTemplateDir(TMPLTPREFIX);
    // дирректория для хранения скомпилированных HTML страниц
    $smarty->setCompileDir('../tmp/smarty/template_c');
    // дирректория для хранения кэшированных страниц
    $smarty->setCacheDir('../tmp/smarty/cache');
    // дирректория для хранения конфигурации smarty
    $smarty->setConfigDir('../library/Smarty/configs/');


    // Подключаем автозагрузчик классов