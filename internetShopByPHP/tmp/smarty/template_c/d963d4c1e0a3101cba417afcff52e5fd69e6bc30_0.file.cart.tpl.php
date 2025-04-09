<?php
/* Smarty version 4.1.1, created on 2025-04-02 12:14:04
  from 'C:\OSPanel\domains\internetShopByPHP\views\default\cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_67ecffdcb3b433_45799791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd963d4c1e0a3101cba417afcff52e5fd69e6bc30' => 
    array (
      0 => 'C:\\OSPanel\\domains\\internetShopByPHP\\views\\default\\cart.tpl',
      1 => 1743585241,
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
function content_67ecffdcb3b433_45799791 (Smarty_Internal_Template $_smarty_tpl) {
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
                <h5>Корзина покупок</h5>
                <?php if (!((isset($_smarty_tpl->tpl_vars['arrUser']->value)))) {?>
                    <h8>* Для оформления заказа пройдите регистрацию или авторизуйтесь</h8>
                <?php }?>
                <?php if (!$_smarty_tpl->tpl_vars['recProducts']->value) {?>
                    <h8>Вы еще ничего не добавили в корзину</h8>
                <?php } else { ?>
                    <form action="/?controller=cart&action=order" method="POST">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                            <div class="col-12">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recProducts']->value, 'item', false, NULL, 'product', array (
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                                    <div class="card rounded-3 mb-4">
                                        <div class="card-body p-4">
                                            <div class="row d-flex justify-content-between align-items-center">
                                                <div class="col-md-2">
                                                    <img src="img/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_ru'];?>
" class="img-fluid rounded-3">
                                                </div>
                                                <a href="href="/?controller=product&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="col-md-4 col-lg-4 col-xl-4 nav-link active" style="color: black;"><?php echo $_smarty_tpl->tpl_vars['item']->value['name_ru'];?>
</a>
                                                <div class="col-md-2 d-flex">
                                                    <input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="number" min="1" value="1" class="form-control" aria-describedby="basic-addon1" onchange="conversPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
)">
                                                </div>
                                                <div class="col-md-2 offset-lg-1">
                                                    <h6 id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="mb-0"><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 &#8381;</h6>
                                                </div>
                                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <!-- FIXME: сделать обновление отображения/удаление контейнера после удаления продукта из корзины -->
                                                    <a id="removeFromCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="button" href="#" class="text-danger" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;">
                                                        <i class="fas">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                            </svg>
                                                        </i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <ul class="nav nav-pills order">
                                    <li class="nav-item">
                                        <a class="nav-link active order btn-sm" type="button" onClick="addOrder(); return false;" href="#">Оформить заказ</a>
                                        <h6 class="nav-link order">Товаров в корзине на <?php echo $_smarty_tpl->tpl_vars['totalPrice']->value;?>
&#8381;</h6>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                <?php }?>
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
