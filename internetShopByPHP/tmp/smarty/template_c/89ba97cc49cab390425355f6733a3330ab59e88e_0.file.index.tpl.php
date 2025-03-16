<?php
/* Smarty version 4.1.1, created on 2025-02-12 01:38:04
  from 'C:\OSPanel\domains\internetShopByPHP\views\default\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_67abd14c1950c4_55011911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '89ba97cc49cab390425355f6733a3330ab59e88e' => 
    array (
      0 => 'C:\\OSPanel\\domains\\internetShopByPHP\\views\\default\\index.tpl',
      1 => 1739313155,
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
function content_67abd14c1950c4_55011911 (Smarty_Internal_Template $_smarty_tpl) {
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
                <h5>Последние поступления</h5>
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
