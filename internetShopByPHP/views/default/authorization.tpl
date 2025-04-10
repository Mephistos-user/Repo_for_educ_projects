<!DOCTYPE html>
<html lang="ru">
<head>
    {include file = "../includes/head.tpl"}
</head>
<body>
    <div class="wrapper">
        <div class="form" id="auth">
            <div class="vh-30">
                <div class="container h-30">
                    <div class="row d-flex justify-content-center align-items-center h-30">
                        <div class="col-lg-8">
                            <div class="card text-black" style="border-radius: 25px;">
                                <div class="card-body p-md-1">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 order-2">
                                            <p class="text-center h3 mb-3 mx-2 mx-md-4 mt-4">
                                                Авторизация
                                            </p>
                                            <form class="mx-1 mx-md-4">
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="email" id="emailLogin" class="form-control" name="emailLogin"/>
                                                        <label class="form-label" for="emailLogin">Email</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row align-items-center mb-4">
                                                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                    <div class="form-outline flex-fill mb-0">
                                                        <input type="password" id="pwdLogin" class="form-control" name="pwdLogin"/>
                                                        <label class="form-label" for="pwdLogin">Пароль</label>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-center mx-4 mb-3">
                                                    <button type="button" class="btn btn-primary" onclick="loginUser()">Войти</button>
                                                    <a href="/" type="button" class="btn btn-outline-primary me-2" style="margin-left: 15px;">Назад</a>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                            <img src="/img/registration.png" alt="Sample image" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>