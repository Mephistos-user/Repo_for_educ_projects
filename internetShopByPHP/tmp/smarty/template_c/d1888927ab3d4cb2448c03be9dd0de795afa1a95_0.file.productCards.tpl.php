<?php
/* Smarty version 4.1.1, created on 2025-02-12 02:22:50
  from 'C:\OSPanel\domains\internetShopByPHP\views\includes\productCards.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_67abdbcad30924_83834647',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd1888927ab3d4cb2448c03be9dd0de795afa1a95' => 
    array (
      0 => 'C:\\OSPanel\\domains\\internetShopByPHP\\views\\includes\\productCards.tpl',
      1 => 1739316167,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67abdbcad30924_83834647 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recProducts']->value, 'prod');
$_smarty_tpl->tpl_vars['prod']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['prod']->value) {
$_smarty_tpl->tpl_vars['prod']->do_else = false;
?>
    <div class="card" style="width: 30%;">
        <img src="img/products/<?php echo $_smarty_tpl->tpl_vars['prod']->value['image'];?>
" class="card-img-top" alt="...">
        <div class="card-body">
            <h9 class="card-title"><?php echo $_smarty_tpl->tpl_vars['prod']->value['name_ru'];?>
</h9>
            <!-- <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['prod']->value['description'];?>
</p> -->
            <h6 class="card-title"><?php echo $_smarty_tpl->tpl_vars['prod']->value['price'];?>
&#8381;</h6>
            <a href="/?controller=product&id=<?php echo $_smarty_tpl->tpl_vars['prod']->value['id'];?>
" class="card-link">Подробнее</a>
        </div>
    </div>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
