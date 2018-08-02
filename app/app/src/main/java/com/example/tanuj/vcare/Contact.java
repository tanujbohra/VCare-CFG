package com.example.tanuj.vcare;

public class Contact {

    private String Name,Email;

    public Contact(String Name, String Email){
        this.setName(Name);
        this.setEmail(Email);
    }

    public String getName() {
        return Name;
    }

    public void setName(String name) {
        Name = name;
    }

    public String getEmail() {
        return Email;
    }

    public void setEmail(String email) {
        Email = email;
    }
}
