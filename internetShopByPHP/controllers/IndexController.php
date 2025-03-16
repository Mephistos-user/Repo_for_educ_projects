<?php
    /**
     * 
     * Контроллер главной страницы
     * 
     */
    include_once '../models/CategoriesModel.php';
    include_once '../models/ProductModel.php';
    /**
     *
     * Метод формирования главной страницы
     *
     * @param object $smarty
     * 
     */
    function indexAction($smarty) {
        $allCategories = getAllCategories();
        $lastProducts = getLastProducts(LASTPRODUCTS);
        $smarty->assign('pageTitle', 'Главная страница');
        $smarty->assign('allCategories', $allCategories);
        $smarty->assign('recCategory', null);
        $smarty->assign('recProducts', $lastProducts);
        loadTemplate($smarty, 'index');
    }