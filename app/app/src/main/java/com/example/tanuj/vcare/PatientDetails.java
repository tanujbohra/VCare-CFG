package com.example.tanuj.vcare;

import android.content.DialogInterface;
import android.os.Bundle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.RadioButton;
import android.widget.RadioGroup;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;

import java.util.HashMap;
import java.util.Map;

public class PatientDetails extends AppCompatActivity {

    RadioGroup radioGroupGender;
    EditText  editTextType, editTextHospital,editTextProgramme;
    EditText editTextPatientName;
    RadioButton rbMale, rbFemale,radioButton;
    Button buttonAddPatient;
    String url="http://10.49.177.50/add_patient.php";
    AlertDialog.Builder builder;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient_details);

        radioGroupGender=(RadioGroup)findViewById(R.id.radioGroupGender);
        rbMale=(RadioButton) findViewById(R.id.rbMale);
        rbFemale=(RadioButton) findViewById(R.id.rbFemale);
        editTextPatientName=(EditText)findViewById(R.id.editTextPatientName);
        editTextType=(EditText)findViewById(R.id.editTextType);
        editTextHospital=(EditText)findViewById(R.id.editTextHospital);
        editTextProgramme=(EditText)findViewById(R.id.editTextProgramme);
        buttonAddPatient=(Button)findViewById(R.id.buttonAddPatient);

        builder=new AlertDialog.Builder(PatientDetails.this);

        buttonAddPatient.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {


                final String name,email;

                final String PatientName=editTextPatientName.getText().toString().trim();
                final String Type=editTextType.getText().toString().trim();
                final String Hospital=editTextHospital.getText().toString().trim();
                final String programme=editTextProgramme.getText().toString().trim();
                int selectedId = radioGroupGender.getCheckedRadioButtonId();

                // find the radiobutton by returned id
                radioButton = (RadioButton) findViewById(selectedId);
                final String Gender=radioButton.getText().toString();




                StringRequest stringRequest=new StringRequest(Request.Method.POST, url,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String response) {


                                builder.setTitle("Server Response");
                                builder.setMessage("Response: "+response);
                                builder.setPositiveButton("OKAY", new DialogInterface.OnClickListener() {
                                    @Override
                                    public void onClick(DialogInterface dialogInterface, int i) {
                                       editTextPatientName.setText("");
                                       editTextType.setText("");
                                       editTextHospital.setText("");
                                       editTextProgramme.setText("");
                                        return;
                                    }
                                });

                                AlertDialog alertDialog=builder.create();
                                alertDialog.show();


                            }
                        }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Toast.makeText(PatientDetails.this, "Error..", Toast.LENGTH_SHORT).show();
                        error.printStackTrace();

                    }
                }){
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {

                        Map<String,String> params=new HashMap<String, String>();


                        params.put("ID","2");
                        params.put("name",PatientName);
                        params.put("gender",Gender);
                        params.put("hospital",Hospital);
                        params.put("cancer_type",Type);
                        params.put("program_type",programme);


                        return params;

                    }
                };

                MySingleton2.getInstance(PatientDetails.this).addToRequestQueue(stringRequest);


            }
        });



    }
}


