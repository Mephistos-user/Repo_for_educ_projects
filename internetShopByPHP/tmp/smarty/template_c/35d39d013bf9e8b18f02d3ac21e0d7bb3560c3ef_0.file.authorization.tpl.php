<?php
/* Smarty version 4.1.1, created on 2025-02-24 17:57:22
  from 'C:\OSPanel\domains\internetShopByPHP\views\default\authorization.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_67bc88d21e8e95_24416059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35d39d013bf9e8b18f02d3ac21e0d7bb3560c3ef' => 
    array (
      0 => 'C:\\OSPanel\\domains\\internetShopByPHP\\views\\default\\authorization.tpl',
      1 => 1740408670,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../includes/head.tpl' => 1,
  ),
),false)) {
function content_67bc88d21e8e95_24416059 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ru">
<head>
    <?php $_smarty_tpl->_subTemplateRender("file:../includes/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
</html><?php }
}
