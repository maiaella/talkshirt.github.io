package com.mesa.ehdproject;

import android.os.Bundle;
import android.view.KeyEvent;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.Animation.AnimationListener;
import android.view.animation.AnimationUtils;
import android.widget.ImageButton;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;

public class MainActivity extends Activity implements AnimationListener {
	
	ImageView logo;
	
	RelativeLayout but1, but2, but3, but4, but5;

	Animation animFadeIn, zoomIn1, zoomIn2, zoomIn3, zoomIn4, zoomIn5, counter;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_main);
		
		but1 = (RelativeLayout) findViewById(R.id.but1);
		but2 = (RelativeLayout) findViewById(R.id.but2);
		but3 = (RelativeLayout) findViewById(R.id.but3);
		logo = (ImageView) findViewById(R.id.logo);
	
		
		zoomIn1 = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.zoom_in);
		
		zoomIn2 = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.zoom_in);
		
		zoomIn3 = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.zoom_in);
		
		zoomIn4 = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.zoom_in);
		
		zoomIn5 = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.zoom_in);
		
		counter = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.counter_fast);
		
		zoomIn1.setAnimationListener(this);
		zoomIn2.setAnimationListener(this);
		zoomIn3.setAnimationListener(this);
		zoomIn4.setAnimationListener(this);
		zoomIn5.setAnimationListener(this);
		counter.setAnimationListener(this);
		
		logo.startAnimation(counter);
		
		
	}
	
	
	@Override
	public void onAnimationEnd(Animation animation) {
		// Take any action after completing the animation
			
			if (animation == counter) {
				but1.setVisibility(View.VISIBLE);
				but1.startAnimation(zoomIn1);
			}
			
			if (animation == zoomIn1) {
				but2.setVisibility(View.VISIBLE);
				but2.startAnimation(zoomIn2);
			}
			if (animation == zoomIn2) {
				but3.setVisibility(View.VISIBLE);
				but3.startAnimation(zoomIn3);
			}
			
			
			
		
	}
	
	
	public void about (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, About.class);
		
		startActivity(intent);
	}
	
	public void about2 (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, About.class);
		
		startActivity(intent);
	}
		
	public void product (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, Products.class);

	       startActivity(intent);
	  	
	}
	

	public void contact (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, Contact.class);
		
		startActivity(intent);
	}
	
	public void project (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, Project.class);
		
		startActivity(intent);
	}

	public void news (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, News.class);
		
		startActivity(intent);
	}
	
	@Override
	public boolean onKeyDown(int keyCode, KeyEvent event) {
	    //Handle the back button
	    if(keyCode == KeyEvent.KEYCODE_BACK) {
	        //Ask the user if they want to quit
	        new AlertDialog.Builder(this)
	        .setIcon(android.R.drawable.ic_dialog_alert)
	        .setTitle("SCBC")
	        .setMessage("Do you want to exit?")
	        .setPositiveButton("Yes", new DialogInterface.OnClickListener() {

	          @Override
	           public void onClick(DialogInterface dialog, int which) {

                //Stop the activity
	        	  MainActivity.this.finish();
	            }

	        })
	        .setNegativeButton("No", null)
	        .show();

	        return true;
	    }
	    else {
	      return super.onKeyDown(keyCode, event);
	    }

	}


	@Override
	public void onAnimationStart(Animation arg0) {
		// TODO Auto-generated method stub
		
	}


	@Override
	public void onAnimationRepeat(Animation arg0) {
		// TODO Auto-generated method stub
		
	}

}
