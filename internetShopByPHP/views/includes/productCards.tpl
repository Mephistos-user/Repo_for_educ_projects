{foreach $recProducts as $prod}
    <div class="card" style="width: 30%;">
        <img src="img/products/{$prod['image']}" class="card-img-top" alt="...">
        <div class="card-body">
            <h9 class="card-title">{$prod['name_ru']}</h9>
            <!-- <p class="card-text">{$prod['description']}</p> -->
            <h6 class="card-title">{$prod['price']}&#8381;</h6>
            <a href="/?controller=product&id={$prod['id']}" class="card-link">Подробнее</a>
        </div>
    </div>
{/foreach}