package com.mesa.ehdproject;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Typeface;
import android.os.Bundle;
import android.view.KeyEvent;
import android.view.Menu;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.view.animation.Animation.AnimationListener;
import android.widget.Button;
import android.widget.FrameLayout;
import android.widget.ImageView;
import android.widget.ProgressBar;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

public class Home extends Activity implements AnimationListener {

	ImageView logo, logo2;
	
	RelativeLayout layout1, layout2;
	
	// Animation
	Animation animMove, animFade, counter;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_home);
		
		logo = (ImageView) findViewById(R.id.logo);
		logo2 = (ImageView) findViewById(R.id.logo2);
		layout1 = (RelativeLayout) findViewById(R.id.layout1);
		layout2 = (RelativeLayout) findViewById(R.id.layout2);
		
		animMove = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.move_fast);
		animFade = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.fade_in);
		counter = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.counter_fast);

		// set animation listener
		animMove.setAnimationListener(this);
		animFade.setAnimationListener(this);
		counter.setAnimationListener(this);
		
		layout1.startAnimation(counter);       
		        
		        
				
	
	}
				
	@Override
	public void onAnimationEnd(Animation animation) {
		// Take any action after completing the animation
		if (animation == counter) {
			
			layout1.setVisibility(View.GONE);
			layout2.setVisibility(View.VISIBLE);
			layout2.setAnimation(animFade);
			
		}
		
					
		
	}

	@Override
	public void onAnimationStart(Animation animation) {
		// TODO Auto-generated method stub

	}
	
	public void about (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, About.class);
		
		startActivity(intent);
		
	}
	
	public void index (View view) {
	    // Do something in response to button
		Intent intent = new Intent(this, MainActivity.class);
		startActivity(intent);
		finish();
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
	               Home.this.finish();    
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
	public void onAnimationRepeat(Animation arg0) {
		// TODO Auto-generated method stub
		
	}
	
	

}
