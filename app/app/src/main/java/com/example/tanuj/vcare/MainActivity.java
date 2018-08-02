package com.example.tanuj.vcare;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.Menu;
import android.view.MenuInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.Toast;

import com.razorpay.Checkout;
import com.razorpay.PaymentResultListener;

import org.json.JSONObject;

public class MainActivity extends AppCompatActivity implements PaymentResultListener {

    Button mPayButton;
    Button mHallOfFame;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        User user = new User(MainActivity.this);
        Log.i("username",user.getName());
        if(user.getName().equals("")){
            Intent intent = new Intent(MainActivity.this, MainOptions.class);
            startActivity(intent);
        }
        mPayButton = (Button)findViewById(R.id.button_pay);
        mPayButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                startPayment();
            }
        });
        mHallOfFame = (Button)findViewById(R.id.button_hall_of_fame);
        mHallOfFame.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(MainActivity.this, HallOfFameView.class);
                startActivity(intent);
            }
        });

    }
    public void onSignOut(){
        new User(MainActivity.this).removeUser();
        Intent i = new Intent(MainActivity.this,MainOptions.class);
        startActivity(i);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        MenuInflater inflater = getMenuInflater();
        inflater.inflate(R.menu.main_menu, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        switch (item.getItemId()){
            case R.id.sign_out_menu:
                onSignOut();
                return true;
            default:
                return super.onOptionsItemSelected(item);
        }
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
        Toast.makeText(MainActivity.this,"Payment Successful",Toast.LENGTH_LONG).show();
    }

    @Override
    public void onPaymentError(int i, String s) {
        Toast.makeText(MainActivity.this,"Payment Failure",Toast.LENGTH_LONG).show();

    }
}