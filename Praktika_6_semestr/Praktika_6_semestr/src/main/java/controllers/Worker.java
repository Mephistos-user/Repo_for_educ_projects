package controllers;

import java.util.ArrayList;

public class Worker extends AUser {

    private String position = "";
    private Double salary = 0.0;
    private Integer yearOfAdmissionToWork = 1900;

    public Worker(Integer id, String surName, String firstName, String secondName) {
        super(id, surName, firstName, secondName);
    }

    public Worker(Integer id, String surName, String firstName, String secondName, Double salary, String position, Integer yearOfAdmissionToWork) {
        super(id, surName, firstName, secondName);
        this.salary = salary;
        this.position = position;
        this.yearOfAdmissionToWork = yearOfAdmissionToWork;
    }

    @Override
    public AUser createNewUser(Integer id, String firstName, String surName, String secondName) {
        return new Worker(id, surName, firstName, secondName, salary, position, yearOfAdmissionToWork);
    }

    @Override
    public AUser updateUser(Integer id, String firstName, String surName, String secondName) {
        return new Worker(id, surName, firstName, secondName, salary, position, yearOfAdmissionToWork);
    }

    @Override
    public ArrayList<AUser> getAllUsers() {
        return null;
    }

    @Override
    public AUser getUserById(Integer id) {
        return null;
    }

    public String getPosition() {
        return position;
    }

    public void setPosition(String position) {
        this.position = position;
    }

    public Double getSalary() {
        return salary;
    }

    public void setSalary(Double salary) {
        this.salary = salary;
    }

    public Integer getYearOfAdmissionToWork() {
        return yearOfAdmissionToWork;
    }

    public void setYearOfAdmissionToWork(Integer yearOfAdmissionToWork) {
        this.yearOfAdmissionToWork = yearOfAdmissionToWork;
    }


}
