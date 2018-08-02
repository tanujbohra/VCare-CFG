package com.example.tanuj.vcare;

import android.content.Context;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.widget.Toast;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class History extends AppCompatActivity {

    Context context=History.this;

    RecyclerView recyclerView;
    RecyclerView.Adapter adapter;
    RecyclerView.LayoutManager layoutManager;
    ArrayList<Contact> arrayList=new ArrayList<>();
    String url="http://10.49.177.50/history.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_history);

        recyclerView=(RecyclerView)findViewById(R.id.recyclerView);
        layoutManager=new LinearLayoutManager(this);
        recyclerView.setLayoutManager(layoutManager);
        recyclerView.setHasFixedSize(true);

       /* BackgroundTask backgroundTask=new BackgroundTask(DisplayList.this);
        arrayList=backgroundTask.getList();
        adapter=new RecyclerAdapter(arrayList);
        recyclerView.setAdapter(adapter);
        */
        JsonArrayRequest jsonArrayRequest=new JsonArrayRequest(url,
                new Response.Listener<JSONArray>() {
                    @Override
                    public void onResponse(JSONArray response) {

                        JSONObject jsonObject;
                        Contact user;
                        int i=0;
                        while(i<response.length()){
                            try {

                                jsonObject=response.getJSONObject(i);
                                String amount2=jsonObject.get("Amount").toString();
                                String id2=jsonObject.get("Donor Id: ").toString();

                                user=new Contact(id2,amount2);
                                Log.d("__","affectation");
                                arrayList.add(user);
                                i++;

                            } catch (JSONException e) {
                                e.printStackTrace();
                            }

                        }
                        Log.d("__", "get"+String.valueOf(arrayList.size()));

                        adapter=new RecyclerAdapter(arrayList);
                        recyclerView.setAdapter(adapter);

                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(History.this, "Error occured..", Toast.LENGTH_SHORT).show();
                error.printStackTrace();


            }
        });


        MySingleton2.getInstance(context).addToRequestQueue(jsonArrayRequest);

    }
}
