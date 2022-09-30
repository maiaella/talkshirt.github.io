package com.mesa.ehdproject;

import android.os.Bundle;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Typeface;
import android.view.KeyEvent;
import android.view.Menu;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;

public class About extends Activity {

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_about);
	
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.about, menu);
		return true;
	}
	
	
	
	
	public void aboutehd (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, Aboutehd.class);
		
		startActivity(intent);
	}
	
	public void legal (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, Legal.class);
		
		startActivity(intent);
	}
	
	public void developers (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, Developer.class);
		
		startActivity(intent);
	}
	
	public void terms (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, Terms.class);
		
		startActivity(intent);
		
		
	}
	
	public void contact (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, Contact.class);
		
		startActivity(intent);
		
		
	}
	
	
	
	

}
