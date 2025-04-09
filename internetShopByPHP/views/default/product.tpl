<!DOCTYPE html>
<html lang="ru">
    <head>
        {include file = "../includes/head.tpl"}
    </head>
    <body>
        {include file = "../includes/header.tpl"}
        <div class="wrapper">
            {include file = "../includes/sidebarMenu.tpl"}
            <div id="content">
                <div class="card mb-3" style="max-width: 100%; heigth: 100%">
                    <div class="row g-0">
                      <div class="col-md-6">
                        <img src="img/products/{$recProduct['image']}"  alt="..." class="card-img">
                      </div>
                      <div class="col-md-6">
                        <div class="card-body">
                          <h5 class="card-title">{$recProduct['name_ru']}</h5>
                          <p class="card-text">{$recProduct['description']}</p>
                          <p class="card-text"><small class="text-muted">Стоимость: {$recProduct['price']}&#8381;</small></p>
                          <a id="addCart_{$recProduct['id']}" {if $itemInCart}style = "display: none"{/if} onClick="addToCart({$recProduct['id']}); return false;" class="btn btn-primary order" href="#">В корзину</a>
                          <a id="removeFromCart_{$recProduct['id']}" {if !$itemInCart}style = "display: none"{/if} onClick="removeFromCart({$recProduct['id']}); return false;" class="btn btn-primary order" href="#">Удалить</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
        {include file = "../includes/footer.tpl"}
    </body>
    <script src="{$templateWebPath}js/assets/dist/js/bootstrap.bundle.min.js"></script>
</html>