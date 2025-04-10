<?php
    include_once '../models/CategoriesModel.php';
    include_once '../models/ProductModel.php';

    function indexAction($smarty) {
        $itemId = isset($_GET['id']) ? $_GET['id'] : null;
        if ($itemId == null) exit();

        $allCategories = getAllCategories();
        // Получаем данные продукта
        $recProduct = getProductById($itemId);
        // Получаем данные категории
        $recCategory = getCategoriesById($recProduct['category_id']);

        // флаг - был ли товар добавлен ранее в корзину или нет
        $smarty->assign('itemInCart', 0);
        if(in_array($itemId, $_SESSION['cart'])) {
            $smarty->assign('itemInCart', 1);
        }

        $smarty->assign('pageTitle', $recProduct['name_ru']);
        $smarty->assign('allCategories', $allCategories);
        $smarty->assign('recCategory', $recCategory);
        $smarty->assign('recProduct', $recProduct);
        
        loadTemplate($smarty, 'product');
    }