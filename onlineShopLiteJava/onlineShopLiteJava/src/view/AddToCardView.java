package view;

import common.AppView;
import data.service.ShopService;

import java.util.ArrayList;
import java.util.Scanner;

public class AddToCardView extends AppView {
    public AddToCardView(ShopService shopService) {
        super("Добавить товар", new ArrayList<>());
        this.shopService = shopService;
    }

    final ShopService shopService;

    @Override
    public void action() {
        Scanner in = new Scanner(System.in);
        System.out.println("Введите id продукта");
        String productId = in.nextLine();
        if (productId == null) return;
        System.out.println("Введите количество");
        int count = in.nextInt();
        final boolean respons = shopService.addToCart(productId, count);
        if (respons) {
            System.out.println("Товар добавлен");
        } else {
            System.out.println("Не удалось добавить товар");
        }
    }
}
