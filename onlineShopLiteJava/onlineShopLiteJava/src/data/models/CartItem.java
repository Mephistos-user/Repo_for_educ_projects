package data.models;

public class CartItem {

    // CartItem - Product, count

    public final Product product;
    public final int count;

    public CartItem(Product product, int count) {
        this.product = product;
        this.count = count;
    }
}
