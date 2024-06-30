package view;

import common.AppView;

import java.util.ArrayList;

public class CatalogView extends AppView {
    public CatalogView(String title, ArrayList<AppView> children) {
        super("Каталог", children);
    }
}
