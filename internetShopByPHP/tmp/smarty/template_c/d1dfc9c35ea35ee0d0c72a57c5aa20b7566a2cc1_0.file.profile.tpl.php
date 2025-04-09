<?php
/* Smarty version 4.1.1, created on 2025-02-27 10:27:05
  from 'C:\OSPanel\domains\internetShopByPHP\views\default\profile.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_67c013c96b4758_53516374',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1dfc9c35ea35ee0d0c72a57c5aa20b7566a2cc1' => 
    array (
      0 => 'C:\\OSPanel\\domains\\internetShopByPHP\\views\\default\\profile.tpl',
      1 => 1740641223,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../includes/head.tpl' => 1,
    'file:../includes/header.tpl' => 1,
    'file:../includes/sidebarMenu.tpl' => 1,
    'file:../includes/footer.tpl' => 1,
  ),
),false)) {
function content_67c013c96b4758_53516374 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ru">
    <head>
        <?php $_smarty_tpl->_subTemplateRender("file:../includes/head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </head>
    <body>
        <?php $_smarty_tpl->_subTemplateRender("file:../includes/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <div class="wrapper">
            <?php $_smarty_tpl->_subTemplateRender("file:../includes/sidebarMenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <div id="content">
                <h5>Профиль пользователя</h5>
                <div class="col-md-7 border-right" id="profile">
                    <div class="p-2 py-1">
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Email</label>
                                <label class="labels"><?php echo $_smarty_tpl->tpl_vars['arrUser']->value['email'];?>
</label>
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Имя</label>
                                <input type="text" class="form-control" id="newName" name="newName" value=<?php echo $_smarty_tpl->tpl_vars['arrUser']->value['name'];?>
 >
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Телефон</label>
                                <input type="tel" class="form-control" id="newPhone" name="newPhone" value=<?php echo $_smarty_tpl->tpl_vars['arrUser']->value['phone'];?>
 >
                            </div>
                            <div class="col-md-12">
                                <label class="labels">Адрес</label>
                                <input type="text" class="form-control" id="newAddress" name="newAddress" value=<?php echo $_smarty_tpl->tpl_vars['arrUser']->value['address'];?>
 >
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
        <?php $_smarty_tpl->_subTemplateRender("file:../includes/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </body>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
js/assets/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
</html><?php }
}
