import common.AppView;
import common.PageLoop;
import data.data_sources.cart.CartDataSource;
import data.data_sources.cart.MockCartDataSourceImpl;
import data.data_sources.catalog.CatalogDataSource;
import data.data_sources.catalog.MockCatalogDataSourceImpl;
import data.data_sources.order.MockOrderDataSourceImpl;
import data.data_sources.order.OrderDataSource;
import data.models.Order;
import data.service.ShopService;
import view.*;

import java.util.ArrayList;

public class Main {
    public static void main(String[] args) {

        CartDataSource cartDataSource = new MockCartDataSourceImpl();
        CatalogDataSource catalogDataSource = new MockCatalogDataSourceImpl();
        OrderDataSource orderDataSource = new MockOrderDataSourceImpl();
        ShopService shopService = new ShopService(catalogDataSource, cartDataSource, orderDataSource);

        AppView addToCartView = new AddToCardView(shopService);
        ArrayList<AppView> catalogChildren = new ArrayList<>();

        catalogChildren.add(addToCartView);
        AppView catalogView = new CatalogView(shopService, catalogChildren);

        AppView cardView = new CartView(shopService);
        AppView orderView = new OrderView(shopService);

        ArrayList<AppView> mainChildren = new ArrayList<>();
        mainChildren.add(catalogView);
        mainChildren.add(cardView);
        mainChildren.add(orderView);

        AppView mainView = new MainView(mainChildren);
        new PageLoop(mainView).run();


//        System.out.println(shopService.getCatalog());
//        System.out.println(shopService.getCart());
//        System.out.println(shopService.addToCart(shopService.getCatalog().getFirst().id, 5));
//        System.out.println(shopService.addToCart("56595dhsh535", 5));
//        System.out.println(shopService.getCart());

    }
}
/*
Фичи:
    - просмотр каталога
        - добавление в корзину по id
            - сколько штук
    - просмотр корзины
    - оформить заказ
        - ввод данных

Какую фичу вы выберете?
(1) - вариант 1
(2) - вариант 2
(3) - назад

Введите данные
*свободный ввод*
 */

/*
dataSource
----------
services
--------
controllers
views
 */

// TODO: 1. Дописать под базу данных
//       2. реализовать очистку корзины
//       3. реализовать вывод чека по заказу
