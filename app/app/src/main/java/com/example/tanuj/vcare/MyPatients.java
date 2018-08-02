package com.example.tanuj.vcare;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ListView;
import android.widget.Spinner;
import android.widget.Toast;

import java.util.ArrayList;

public class MyPatients extends AppCompatActivity {

    ListView listView;
    Spinner spinnerOptions;
    Button buttonGotoDetails;
    int key;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_my_patients);

        spinnerOptions = (Spinner) findViewById(R.id.spinnerOptions);
        buttonGotoDetails = (Button) findViewById(R.id.buttonGotoDetails);

        final ArrayList<String> options = new ArrayList<String>();
        options.add("Add new patient");
        options.add("Inventory Distribution");
        options.add("Task assigned");


        ArrayAdapter<String> subAdapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, options);

        spinnerOptions.setAdapter(subAdapter);

        spinnerOptions.setOnItemSelectedListener(
                new AdapterView.OnItemSelectedListener() {
                    public void onItemSelected(AdapterView<?> parent, View view, int pos, long id) {

                        Object item = parent.getItemAtPosition(pos);
                        key = pos;
                    }

                    public void onNothingSelected(AdapterView<?> parent) {
                    }
                });

        buttonGotoDetails.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                if(key==0) {
                    startActivity(new Intent(getApplicationContext(), PatientDetails.class));
                }
                else if(key==1)
                {
                 startActivity(new Intent(getApplicationContext(),InventoryDetails.class));
                }
                else if(key==2)
                {
                    startActivity(new Intent(getApplicationContext(),Task.class));
                }
            }
        });
    }


}
