<!DOCTYPE html>
<html lang="ru">
    <head>
        {include file = "../includes/head.tpl"}
    </head>
    <body>
        {include file = "../includes/header.tpl"}
        <div class="wrapper">
            {include file = "../includes/sidebarMenu.tpl"}
            <div id="content">
                <h5>Профиль пользователя</h5>
                <div class="col-md-7 border-right" id="profile">
                    <div class="p-2 py-1">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Email</label>
                                <label class="labels">{$arrUser['email']}</label>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Имя</label>
                                <input type="text" class="form-control" id="newName" name="newName" value={$arrUser['name']} >
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Телефон</label>
                                <input type="tel" class="form-control" id="newPhone" name="newPhone" value={$arrUser['phone']} >
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Адрес</label>
                                <input type="text" class="form-control" id="newAddress" name="newAddress" value={$arrUser['address']} >
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Введите старый пароль</label>
                                <input type="password" class="form-control" id="curPwd" name="curPwd" value="">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Новый пароль</label>
                                <input type="password" class="form-control" id="newPwd1" name="newPwd1" value="">
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Повторите пароль</label>
                                <input type="password" class="form-control" id="newPwd2" name="newPwd2" value="">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button type="button" class="btn btn-primary btn-sm" onclick=updateUserData();>Сохранить</button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        {include file = "../includes/footer.tpl"}
    </body>
    <script src="{$templateWebPath}js/assets/dist/js/bootstrap.bundle.min.js"></script>
</html>