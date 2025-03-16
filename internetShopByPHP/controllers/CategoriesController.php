<?php
    /**
     * Контроллер страниц подкатегорий
     */
    include_once '../models/CategoriesModel.php';
    include_once '../models/ProductModel.php';
    /**
     *
     * Метод формирования страницы подкатегорий
     *
     * @param object $smarty
     *
     */
    function indexAction($smarty) {
        $childCategoryId = isset($_GET['id']) ? $_GET['id'] : null;
        // XXX
        // var_dump($_GET); // Выводит информацию о переданных параметрах запроса
        if ($childCategoryId == null) exit();

        // Все категории, которые будут использоваться в шаблоне
        $allCategories = getAllCategories();
        // Информация о подкатегории, которую будем использовать дальше
        $recCategory = getCategoriesById($childCategoryId);
        // Информация о продуктах внутри подкатегории
        $recProducts = getProductsByCategory($childCategoryId);

        $smarty->assign('pageTitle', $recCategory['name_ru']);
        $smarty->assign('allCategories', $allCategories);
        $smarty->assign('recCategory', $recCategory);
        $smarty->assign('recProducts', $recProducts);

        loadTemplate($smarty, 'category');
    }
