<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
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
        <a class="btn btn-outline-primary me-2" href="/?controller=cart">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
          </svg>
          <span id="cartCntItems" class="badge badge-light" style="color: #000;">
            {if $cartCntItems > 0}
              {$cartCntItems}
            {else}
              0
            {/if}
          </span>
        </a>
        <button type="button" class="btn btn-outline-primary me-2">Войти</button>
        <button type="button" class="btn btn-primary">Регистрация</button>
      </div>
</header>