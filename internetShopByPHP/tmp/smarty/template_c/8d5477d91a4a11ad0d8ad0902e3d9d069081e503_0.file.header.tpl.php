<?php
/* Smarty version 4.1.1, created on 2025-02-25 11:53:34
  from 'C:\OSPanel\domains\internetShopByPHP\views\includes\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.1',
  'unifunc' => 'content_67bd850e02d1d7_46142991',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8d5477d91a4a11ad0d8ad0902e3d9d069081e503' => 
    array (
      0 => 'C:\\OSPanel\\domains\\internetShopByPHP\\views\\includes\\header.tpl',
      1 => 1740473604,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67bd850e02d1d7_46142991 (Smarty_Internal_Template $_smarty_tpl) {
?><header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
      <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
          <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>
      </div>

      <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="#" class="nav-link px-2 link-secondary">Магазин</a></li>
        <li><a href="#" class="nav-link px-2">Доставка</a></li>
        <li><a href="#" class="nav-link px-2">О нас</a></li>
        <li><a href="#" class="nav-link px-2">Контакты</a></li>
      </ul>

      <div class="col-md-4 text-end">
        <a class="btn btn-outline-primary me-2 btn-sm" href="/?controller=cart">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
          </svg>
          <span id="cartCntItems" class="badge badge-light" style="color: #000;">
            <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?>
              <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>

            <?php } else { ?>
              0
            <?php }?>
          </span>
        </a>
        <?php if ((isset($_smarty_tpl->tpl_vars['arrUser']->value))) {?>
          <a href="/?controller=user&" type="button" class="btn btn-primary btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"></path>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"></path>
            </svg>
            <?php echo $_smarty_tpl->tpl_vars['arrUser']->value['displayName'];?>

          </a>
          <a href="/?controller=user&action=logout" type="button" class="btn btn-outline-primary btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"></path>
              <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"></path>
            </svg>
          </a>
        <?php } else { ?>
          <a type="button" class="btn btn-outline-primary me-2 btn-sm" href="/?controller=user&action=templateauth">Войти</a>
          <a type="button" class="btn btn-primary btn-sm" href="/?controller=user&action=templatereg">Регистрация</a>
        <?php }?>
      </div>
</header><?php }
}
