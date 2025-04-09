/** Коллбек для кнопки "Добавить в корзину"
 * @param {int|string} itemId - id текущего продукта
 */
function addToCart(itemId) {
    //XXX
    console.log('js-addToCart()');

    $.ajax({
        type: 'POST',
        async: false,
        url: '/?controller=cart&action=addtocart&id=' + itemId + '/',
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_' + itemId).hide();
                $('#removeFromCart_' + itemId).show();
            }
        }
    });
}

/** Коллбек для кнопки "Удалить из корзины"
 * @param {int|string} itemId - id текущего продукта
 */
function removeFromCart(itemId) {
    //XXX
    console.log("js-removeFromCart(" + itemId + ")");

    $.ajax({
        type: 'POST',
        async: false,
        url: '/?controller=cart&action=removefromcart&id=' + itemId + '/',
        dataType: 'json',
        success: function(data) {
            if (data['success']) {
                $('#cartCntItems').html(data['cntItems']);
                $('#addCart_' + itemId).show();
                $('#removeFromCart_' + itemId).hide();
            }
        }
    });
}

/** Получает данные из формы
 * @param {object} obj_form - ссылка на форму
 * @returns {object} obj_form
 */
function getData(obj_form) {
    let hData = {};
    $('input, select, textarea', obj_form).each(function() {
        if (this.name && this.name != '') {
            hData[this.name] = this.value;
            //XXX
            console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    });
    return hData;
}

/** Выполняет регистрацию нового пользователя
 */
function registerNewUser() {
    // Вызываем функцию getData с объектом (тегом), в котором есть id="reg"
    let postData = getData('#reg');
    $.ajax({
        type: 'POST',
        async: false,
        url: '/?controller=user&action=register&email=' + postData['email'] + '&pwd1=' + postData['pwd1'] + '&pwd2=' + postData['pwd2'],
        dataType: 'json',
        success: function(data) {
            alert(data['message']); // выводим сообщение от сервера в любом случае
            if(data['success']) {
                // если регистрация прошла успешно, переходим на главную страницу
                window.location.href = '/';
            }
        },
        //XXX
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

/**
 * Выполняет вход в систему
 */
function loginUser() {
    // Вызываем функцию getData с объектом (тегом), в котором есть id="auth"
    let postData = getData('#auth');
    //XXX
    console.log(postData);

    $.ajax({
        type: 'POST',
        async: false,
        url: '/?controller=user&action=login&email=' + postData['emailLogin'] + '&pwd=' + postData['pwdLogin'],
        dataType: 'json',
        success: function(data) {
            if(data['success']) {
                // если авторизация прошла успешно, переходим на главную страницу
                window.location.href = '/';
            } else {
                // выводим сообщение об ошибке авторизации
                alert(data['message']);
            }
        },
        //XXX
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}


/** Выполняет изменение данных пользователя
 */
function updateUserData() {
    let postData = getData('#profile');
    //XXX
    console.log(postData);

    $.ajax({
        type: 'POST',
        async: false,
        url: '/?controller=user&action=update&name=' + postData['newName'] + '&phone=' + postData['newPhone'] + '&address=' + postData['newAddress'] + '&pwd1=' + postData['newPwd1'] + '&pwd2=' + postData['newPwd2'] + '&curPwd=' + postData['curPwd'],
        dataType: 'json',
        success: function(data) {
            if(data['success']) {
                alert(data['message']);
            } else {
                alert(data['message']);
            }
        },
        //XXX
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

/** Выполняет добавление заказа
 */
function addOrder() {
    // let name = $('#userName').html();
    // let phone = $('#userPhone').html();
    // let address = $('#userAddress').html();
    // XXX: отладка, удалить
    // console.log(name, phone, address);
    $.ajax({
        type: 'POST',
        async: false,
        url: '/?controller=cart&action=order',
        dataType: 'json',
        success: function(data) {
            if(data['success']) {
                alert(data['message']);
                // window.location.href = '/';
            } else {
                alert(data['message']);
            }
        },
        //XXX
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}



/** Выполняет сохранение заказа
 */
function saveOrder() {
    let name = $('#userName').html();
    let phone = $('#userPhone').html();
    let address = $('#userAddress').html();
    // XXX: отладка, удалить
    console.log(name, phone, address);
    $.ajax({
        type: 'POST',
        async: false,
        url: '/?controller=cart&action=saveorder&name=' + name + '&phone=' + phone + '&address=' + address,
        dataType: 'json',
        success: function(data) {
            if(data['success']) {
                alert(data['message']);
                // window.location.href = '/';
            } else {
                alert(data['message']);
            }
        },
        //XXX
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}