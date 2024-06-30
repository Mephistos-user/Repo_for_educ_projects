package view;

import common.AppView;

import java.util.ArrayList;

public class MainView extends AppView {
    public MainView(ArrayList<AppView> children) {
        super("Магазин", children);
    }

    @Override
    public void action() {
//        System.out.println("MainView method override by AppView");
    }
}
