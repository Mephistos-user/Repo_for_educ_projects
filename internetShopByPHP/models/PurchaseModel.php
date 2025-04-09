<?php
/** Модель для таблицы состава заказа (purchase)
 * 
 */
/** Внесение в БД продуктов с привязкой к заказу
 * 
 * @param integer $orderId ID заказа
 * @param array $cart массив корзины
 * @return boolean TRUE в случае успешного добавления в БД
 */
function setPurchaseForOrder($orderId, $cart) {
    $sql = "INSERT INTO purchase (`order_id`, `product_id`, `price`, `amount`) VALUES ";
    // формируем массив строк для запроса по каждому товару
    $values = array();
    foreach ($cart as $item) {
        $values[] = "('{$orderId}', '{$item[id]}', '{$item[price]}', '{$item[cnt]}')";
    }
    // преобразуем массив в строку
    $sql .= implode(', ', $values);

    $link = createConnection();
    $result = mysqli_query($link, $sql);

    return $result; // TRUE - успешно добавлено, FALSE - ошибка вставки
}