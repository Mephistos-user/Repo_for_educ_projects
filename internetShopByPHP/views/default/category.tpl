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
                <h5>Товары категории {$recCategory['name_ru']}</h5>
                {include file = "../includes/productCards.tpl"}
            </div>
        </div>
        {include file = "../includes/footer.tpl"}
    </body>
    <script src="{$templateWebPath}js/assets/dist/js/bootstrap.bundle.min.js"></script>
</html>