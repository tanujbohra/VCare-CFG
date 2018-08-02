package com.example.tanuj.vcare;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.razorpay.Checkout;
import com.razorpay.PaymentResultListener;

import org.json.JSONObject;

import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.HashMap;
import java.util.Map;

public class MakeDonation extends AppCompatActivity implements PaymentResultListener {

            TextView textViewDonorName;
            EditText editTextAmount;
            Spinner spinnerPurpose;
            Button buttonDonate;
            int key;
            String url="http://10.49.177.50/donation.php";
            String amount;
            Button buttonHistory;
            Button mHallOfFame;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_make_donation);

        spinnerPurpose=(Spinner)findViewById(R.id.spinnerPurpose);
        textViewDonorName=(TextView)findViewById(R.id.textViewDonorName);
        editTextAmount=(EditText)findViewById(R.id.editTextAmount);
        buttonDonate=(Button)findViewById(R.id.buttonDonate);
        buttonHistory=(Button)findViewById(R.id.buttonHistory);

        final ArrayList<String> preference = new ArrayList<String>();
        preference.add("General Awareness");
        preference.add("Nutritional Support");
        preference.add("Fund Treatment");
        preference.add("Child Care Support");
        preference.add("Patient Assistance Program");
        preference.add("Palliative Support");
        preference.add("Counseling");
        preference.add("No specific preference");

        mHallOfFame = (Button)findViewById(R.id.button_hall_of_fame);
        mHallOfFame.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MakeDonation.this, HallOfFameView.class);
                startActivity(intent);
            }
        });


        ArrayAdapter<String> subAdapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, preference);

        spinnerPurpose.setAdapter(subAdapter);

        spinnerPurpose.setOnItemSelectedListener(
                new AdapterView.OnItemSelectedListener() {
                    public void onItemSelected(AdapterView<?> parent, View view, int pos, long id) {

                        Object item = parent.getItemAtPosition(pos);
                        key = pos;
                    }

                    public void onNothingSelected(AdapterView<?> parent) {
                    }
                });


        buttonHistory.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startActivity(new Intent(getApplicationContext(),History.class));
            }
        });

        buttonDonate.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {


                amount=editTextAmount.getText().toString().trim();
                Calendar c = Calendar.getInstance();
                System.out.println("Current time =&gt; "+c.getTime());

                SimpleDateFormat df = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
                final String formattedDate = df.format(c.getTime());

                Toast.makeText(MakeDonation.this, formattedDate, Toast.LENGTH_SHORT).show();

                StringRequest stringRequest=new StringRequest(Request.Method.POST, url,
                        new Response.Listener<String>() {
                            @Override
                            public void onResponse(String response) {
                                //Toast.makeText(MakeDonation.this, "Thanks for your DOnation!", Toast.LENGTH_SHORT).show();
                                //startActivity(new Intent(getApplicationContext(),MyPatients.class));
                                startPayment();
                            }
                        }, new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {

                        Toast.makeText(MakeDonation.this, "Error..", Toast.LENGTH_SHORT).show();
                        error.printStackTrace();

                    }
                }){
                    @Override
                    protected Map<String, String> getParams() throws AuthFailureError {

                        Map<String,String> params=new HashMap<String, String>();


                        params.put("id","2");
                        params.put("amount",amount);
                        params.put("date",formattedDate);
                        params.put("purpose","Funding");
                        params.put("d_id","3");


                        return params;

                    }
                };

                MySingleton2.getInstance(MakeDonation.this).addToRequestQueue(stringRequest);

            }
        });

    }

    private void startPayment() {
        int amount = 10; //amount to deduce

        Checkout checkout = new Checkout();

        //set app logo here
        checkout.setImage(R.mipmap.ic_launcher);

        final Activity activity = this;


        //Pass your payment options to the Razorpay Checkout as a JSONObject
        try {
            JSONObject options = new JSONObject();

            //Use the same name fields
            options.put("name", "Merchant Name");
            options.put("description", "Order #123456");
            options.put("currency", "INR");
            options.put("amount", amount * 100);
            checkout.open(activity, options);
        } catch(Exception e) {
            Log.e("PAY", "Error in starting Razorpay Checkout", e);
        }
    }

    @Override
    public void onPaymentSuccess(String s) {
        Toast.makeText(MakeDonation.this,"Payment Successful",Toast.LENGTH_LONG).show();
    }

    @Override
    public void onPaymentError(int i, String s) {
        Toast.makeText(MakeDonation.this,"Payment Failure",Toast.LENGTH_LONG).show();

    }
}
