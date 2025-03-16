<?php
/* Smarty version 4.1.1, created on 2025-02-10 11:54:43
  from 'C:\OSPanel\domains\internetShopByPHP\views\includes\sidebarMenu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_67a9bed3a54535_29594942',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9f79bdc9e44ec8a35ef661f5d05b9433e59b702' => 
    array (
      0 => 'C:\\OSPanel\\domains\\internetShopByPHP\\views\\includes\\sidebarMenu.tpl',
      1 => 1739177478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67a9bed3a54535_29594942 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="flex-shrink-0 p-3" style="width: 280px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
      <svg class="bi pe-none me-2" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-5 fw-semibold">Категории</span>
    </a>
    <ul class="list-unstyled ps-0">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allCategories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
        <li class="mb-1">
          <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#<?php echo $_smarty_tpl->tpl_vars['item']->value['name_en'];?>
-collapse" aria-expanded="false">
            <?php echo $_smarty_tpl->tpl_vars['item']->value['name_ru'];?>

          </button>
          <?php if ((isset($_smarty_tpl->tpl_vars['item']->value['children']))) {?>
            <?php if ((isset($_smarty_tpl->tpl_vars['recCategory']->value))) {?>
              <?php if ($_smarty_tpl->tpl_vars['recCategory']->value['parent_id'] == $_smarty_tpl->tpl_vars['item']->value['id']) {?>
                <div class="collapse show" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_en'];?>
-collapse">
              <?php } else { ?>
                <div class="collapse" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_en'];?>
-collapse">
              <?php }?>
            <?php } else { ?>
              <div class="collapse" id="<?php echo $_smarty_tpl->tpl_vars['item']->value['name_en'];?>
-collapse">
            <?php }?>
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
$_smarty_tpl->tpl_vars['itemChild']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->do_else = false;
?>
                    <li>
                      <a href="/?controller=categories&id=<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
" class="link-dark d-inline-flex text-decoration-none rounded">
                        <?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name_ru'];?>

                      </a>
                    </li>
                  <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </ul>
              </div>
          <?php }?>
        </li>
      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </ul>
</div><?php }
}
