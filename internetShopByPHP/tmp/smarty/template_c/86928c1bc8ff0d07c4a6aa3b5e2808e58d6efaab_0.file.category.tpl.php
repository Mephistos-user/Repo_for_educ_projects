<?php
/* Smarty version 4.1.1, created on 2025-02-12 01:38:11
  from 'C:\OSPanel\domains\internetShopByPHP\views\default\category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_67abd1538e3900_09903870',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '86928c1bc8ff0d07c4a6aa3b5e2808e58d6efaab' => 
    array (
      0 => 'C:\\OSPanel\\domains\\internetShopByPHP\\views\\default\\category.tpl',
      1 => 1739313165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../includes/head.tpl' => 1,
    'file:../includes/header.tpl' => 1,
    'file:../includes/sidebarMenu.tpl' => 1,
    'file:../includes/productCards.tpl' => 1,
    'file:../includes/footer.tpl' => 1,
  ),
),false)) {
function content_67abd1538e3900_09903870 (Smarty_Internal_Template $_smarty_tpl) {
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
                <h5>Товары категории <?php echo $_smarty_tpl->tpl_vars['recCategory']->value['name_ru'];?>
</h5>
                <?php $_smarty_tpl->_subTemplateRender("file:../includes/productCards.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
