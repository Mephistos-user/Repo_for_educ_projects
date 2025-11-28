package controllers;

import java.util.ArrayList;

public abstract class AUser {
    protected Integer id;
    protected String surName;
    protected String firstName;
    protected String secondName;

    public AUser(Integer id, String surName, String firstName, String secondName) {
        this.id = id;
        this.surName = surName;
        this.firstName = firstName;
        this.secondName = secondName;
    }

    public abstract AUser createNewUser(Integer id, String firstName, String surName, String secondName);

    public abstract AUser updateUser(Integer id, String firstName, String surName, String secondName)

    public abstract ArrayList<AUser> getAllUsers();

    public  abstract AUser getUserById(Integer id);
}
