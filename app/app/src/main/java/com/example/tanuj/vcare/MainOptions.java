package com.example.tanuj.vcare;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;

public class MainOptions extends AppCompatActivity {

    Button buttonVolunteer;
    Button buttonDonor;
    Button buttonPatient;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main_options);

        buttonVolunteer =(Button)findViewById(R.id.buttonVolunteerLogin);
        buttonDonor =(Button)findViewById(R.id.buttonDonorLogin);
        buttonPatient =(Button)findViewById(R.id.buttonPatientLogin);

        buttonVolunteer.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MainOptions.this, VolunteerLoginActivity.class);
                startActivity(intent);
            }
        });

        buttonDonor.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MainOptions.this, DonorLoginActivity.class);
                startActivity(intent);
            }
        });

        buttonPatient.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MainOptions.this, PatientLoginActivity.class);
                startActivity(intent);
            }
        });
    }
}
