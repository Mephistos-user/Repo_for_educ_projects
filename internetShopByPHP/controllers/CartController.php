<?php
    /** Контроллер страницы карзины
     */
    include_once '../models/CategoriesModel.php';
    include_once '../models/ProductModel.php';
    include_once '../models/OrdersModel.php';
    include_once '../models/PurchaseModel.php';

    /** Метод формирования страницы корзины
     *
     * @param object $smarty
     */
    function indexAction($smarty) {
        $allCategories = getAllCategories();
        $cartItems = isset($_SESSION['cart'])? $_SESSION['cart'] : array();
        $recProducts = array();
        foreach ($cartItems as $itemId) {
            $product = getProductById($itemId);
            if ($product) {
                $recProducts[] = $product;
            }
        }
        //XXX
        $totalPrice = 0;
        foreach ($recProducts as $product) {
            $totalPrice += $product['price'];
        }
        $smarty->assign('pageTitle', 'Корзина');
        $smarty->assign('allCategories', $allCategories);
        $smarty->assign('recProducts', $recProducts);
        //XXX
        $smarty->assign('totalPrice', $totalPrice);
        //XXX
        $smarty->assign('cartItems', $cartItems);
        
        loadTemplate($smarty, 'cart');
    }

    /** Добавление нового элемента в корзину
     * 
     * @param json для клиента
     */
    function addtocartAction() {
        $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
        if (! $itemId) return false;

        $resData = array();

        if(isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
            $_SESSION['cart'][] = $itemId;
            $resData['cntItems'] = count($_SESSION['cart']);
            $resData['success'] = 1;
        } else {
            $resData['success'] = 0;
        }
        //XXX
        echo json_encode($resData);
    }

    /** Удаление элемента из корзины
     * 
     * @param json для клиента
     */
    function removefromcartAction() {
        $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
        if (! $itemId) exit();

        $resData = array();
        $key = array_search($itemId, $_SESSION['cart']);
        if($key !== false) {
            unset($_SESSION['cart'][$key]); // удаляем элемент из массива $_SESSION по ключу 'cart' по id = $key
            $resData['success'] = 1;
            $resData['cntItems'] = count($_SESSION['cart']);
        } else {
            $resData['success'] = 0;
        }
        //XXX
        echo json_encode($resData);
    }
    
    /** Формирование страницы заказа
     * 
     */
    function orderAction($smarty) {
        // проверяем, что пользователь авторизован
        if (!isset($_SESSION['user'])) {
            redirect('/?controller=cart&');
            return;
        }

        // получаем массив идентификаторов товаров
        $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        if (!$itemsIds) {
            // если товаров нет, возвращаемся на страницу корзины
            redirect('/?controller=cart&');
            return;
        }

        // получаем массив продуктов по идентификаторам
        $itemsCnt = array();
        foreach ($itemsIds as $item) {
            //формируем ключ для массива POST
            $postVar = 'itemCnt_' . $item;
            // получаем количество товара из POST (если оно не пустое) и добавляем его в массив $itemsCnt
            $itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null; //$itemssCnt[3]=2; товар с ID = 3 лежит в корзине в количестве 2 шт.
            
            //XXX: отладка, удалить
            echo $postVar . ' ' . $itemsCnt[$item] . '<br>';
        }

        // список продуктов из массива корзины
        $recProducts = getProductsFromArray($itemsIds);
        // XXX: отладка, удалить
        foreach ($recProducts as $product) {
            echo 'product[id] = ' . $product['id'] . ', product[name_ru] = ' . $product['name_ru'] . '<br>';
        }

        // для каждой записи о товаре добавляем поле
        // realPrice = количество продуктов * цена 1 продукта
        // cnt = количество товара в корзине
        $i = 0;
        foreach ($recProducts as $item) {
            //XXX: отладка, удалить
            echo "itemsCnt[item[id]] = " . $itemsCnt[$item['id']] . "<br>";
            $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
            if ($item['cnt']) {
                $item['realPrice'] = $item['cnt'] * $item['price'];
                //XXX: отладка, удалить
                echo "item[realPrice] = " . $item['cnt'] . '* ' . $item['price'] . " = " . $item['realPrice'] . "<br>"; //
            } else {
                // если вдруг в корзине есть товар с количеством 0 - удаляем его из заказа
                unset($recProducts[$i]);
                // continue;
            }
            $i++;
        }
        // если товаров в корзине нет, выдаем сообщение об этом и возвращаемся на страницу корзины
        if (!$recProducts) {
            echo "Корзина пуста";
            return;
        }

        // Итоговый массив заказа отправляем в сессию
        $_SESSION['orderFromCart'] = $recProducts;

        $allCategories = getAllCategories();
        $smarty->assign('pageTitle', 'Оформление заказа');
        $smarty->assign('allCategories', $allCategories);
        $smarty->assign('recProducts', $recProducts);

        loadTemplate($smarty, 'order');
    }

    /** AJAX функция сохранения заказа
     * 
     * @param array $_SESSION['orderFromCart'] массив товаров в заказе
     * @return json информация о выполнении операции
     */
    function saveorderAction() {
        // получаем массив товаров из сессии
        $cart = isset($_SESSION['orderFromCart']) ? $_SESSION['orderFromCart'] : null;
        if (!$cart) {
            $resData['success'] = 0;
            $resData['message'] = 'Корзина пуста!';
            echo json_encode($resData);
            //XXX: другой вариант
            // echo json_encode(array('success' => 0,'message' => 'Корзина пуста!'));
            // exit();
            return;
        }
        // могут не существовать, лучше реализовать проверку
        $name = $_REQUEST['name'];
        $phone = $_REQUEST['phone'];
        $address = $_REQUEST['address'];

        // создаем новый заказ и получаем его ID
        $orderId = makeNewOrder($name, $phone, $address);

        // проверка корректности записи заказа
        if (!$orderId) {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка создания заказа!';
            echo json_encode($resData);
            //XXX: другой вариант
            // echo json_encode(array('success' => 0,'message' => 'Ошибка создания заказа!'));
            // exit();
            return;
        }

        // сохраняем товары созданного заказа
        $res = setOurchaseForOrder($orderId, $cart);

        // формируем результат сохранения в ответ клиенту
        if (!$res) {
            $resData['success'] = 1;
            $resData['message'] = 'Заказ создан';
            unset($_SESSION['orderFromCart']);
            unset($_SESSION['cart']);
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка сохранения заказа №' . $orderId;
        }
        echo json_encode($resData);

    }