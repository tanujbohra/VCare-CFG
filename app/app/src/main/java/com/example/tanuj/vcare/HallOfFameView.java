package com.example.tanuj.vcare;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class HallOfFameView extends AppCompatActivity {

    public static final String EXTRA_URL = "imageUrl";
    public static final String EXTRA_CREATOR = "creatorName";
    private RecyclerView mRecyclerView;
    private ExampleAdapter mExampleAdapter;
    private ArrayList<HallOfFame> mExampleItemArrayList;
    private RequestQueue mRequestQueue;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_hall_of_fame_view);
        mRecyclerView = findViewById(R.id.recycler_view);
        mRecyclerView.setHasFixedSize(true);
        mRecyclerView.setLayoutManager(new LinearLayoutManager(HallOfFameView.this));
        mExampleItemArrayList = new ArrayList<>();
        mRequestQueue = Volley.newRequestQueue(HallOfFameView.this);
        parseJSON();
    }

    private void parseJSON() {
        String json_url = "http://10.49.51.222/volley/login/api.php";
        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(json_url,
                new Response.Listener<JSONArray>() {
                    @Override
                    public void onResponse(JSONArray response) {
                        Log.i("Length",String.valueOf(response.length()));
                        try{
                            for(int i=0;i< response.length();i++){
                                JSONObject hit = response.getJSONObject(i);
                                String creatorName = hit.getString("user");
                                String webformatURL = hit.getString("webformatURL");
                                int likes = hit.getInt("likes");
                                Log.i("creatorName",String.valueOf(creatorName));
                                Log.i("webformatURL",String.valueOf(webformatURL));
                                mExampleItemArrayList.add(new HallOfFame(webformatURL,creatorName,likes));
                            }
                            mExampleAdapter = new ExampleAdapter(HallOfFameView.this,mExampleItemArrayList);
                            mRecyclerView.setAdapter(mExampleAdapter);
                        }catch (JSONException je){
                            je.printStackTrace();
                        }
                    }
                }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                error.printStackTrace();
            }
        });
        mRequestQueue.add(jsonArrayRequest);
    }
}
