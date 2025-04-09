<?php
/* Smarty version 4.1.1, created on 2025-02-18 12:05:28
  from 'C:\OSPanel\domains\internetShopByPHP\views\default\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_67b44d581a8621_66931948',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d41e7a6d61bf9b2055d503741f9193284033377' => 
    array (
      0 => 'C:\\OSPanel\\domains\\internetShopByPHP\\views\\default\\product.tpl',
      1 => 1739869524,
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
function content_67b44d581a8621_66931948 (Smarty_Internal_Template $_smarty_tpl) {
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
                <div class="card mb-3" style="max-width: 100%; heigth: 100%">
                    <div class="row g-0">
                      <div class="col-md-6">
                        <img src="img/products/<?php echo $_smarty_tpl->tpl_vars['recProduct']->value['image'];?>
"  alt="..." class="card-img">
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['recProduct']->value['name_ru'];?>
</h5>
                          <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['recProduct']->value['description'];?>
</p>
                          <p class="card-text"><small class="text-muted">Стоимость: <?php echo $_smarty_tpl->tpl_vars['recProduct']->value['price'];?>
&#8381;</small></p>
                          <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['recProduct']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?>style = "display: none"<?php }?> onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['recProduct']->value['id'];?>
); return false;" class="btn btn-primary order" href="#">В корзину</a>
                          <a id="removeFromCart_<?php echo $_smarty_tpl->tpl_vars['recProduct']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?>style = "display: none"<?php }?> onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['recProduct']->value['id'];?>
); return false;" class="btn btn-primary order" href="#">Удалить</a>
                        </div>
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
