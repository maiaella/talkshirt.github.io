package com.mesa.ehdproject;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.view.animation.Animation.AnimationListener;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.RelativeLayout;


public class Splash extends Activity implements AnimationListener {
	
	 private static int SPLASH_TIME_OUT = 5000;
	
		ImageView logo;
		
		RelativeLayout layout1, buttons, loader;

		// Animation
		Animation animFadeIn, animFadeIn2, animFadeOut, animMove, counter, zoomIn, zoomInLoad, zoomOutLoad;

		@Override
		protected void onCreate(Bundle savedInstanceState) {
			// TODO Auto-generated method stub
			super.onCreate(savedInstanceState);
			setContentView(R.layout.activity_splash);
			
			logo = (ImageView) findViewById(R.id.logo);
			loader = (RelativeLayout) findViewById(R.id.loader);
			layout1 = (RelativeLayout) findViewById(R.id.layout1);
			buttons = (RelativeLayout) findViewById(R.id.buttons);
			
			// load animations
			animFadeIn = AnimationUtils.loadAnimation(getApplicationContext(),
					R.animator.fade_in);
			
			animFadeIn2 = AnimationUtils.loadAnimation(getApplicationContext(),
					R.animator.fade_in);
			
			counter = AnimationUtils.loadAnimation(getApplicationContext(),
					R.animator.counter);
			
			animFadeOut = AnimationUtils.loadAnimation(getApplicationContext(),
					R.animator.fade_out);
			
			zoomIn = AnimationUtils.loadAnimation(getApplicationContext(),
					R.animator.zoom_in_main);
			
			zoomInLoad = AnimationUtils.loadAnimation(getApplicationContext(),
					R.animator.zoom_in_load);
			
			zoomOutLoad = AnimationUtils.loadAnimation(getApplicationContext(),
					R.animator.zoom_out_load);
			
			// set animation listeners
			animFadeIn.setAnimationListener(this);
			animFadeIn2.setAnimationListener(this);
			counter.setAnimationListener(this);
			
			animMove = AnimationUtils.loadAnimation(getApplicationContext(),
					R.animator.move);

			// set animation listener
			animMove.setAnimationListener(this);
			counter.setAnimationListener(this);
			
					// start fade in animation
					logo.setVisibility(View.VISIBLE);
					loader.setVisibility(View.VISIBLE);
			        logo.startAnimation(zoomIn);
			        loader.startAnimation(animFadeIn);
			        
			    new Handler().postDelayed(new Runnable() {             
			          
			         @Override           
			          public void run() {                
			               
			       Intent intent = new Intent(Splash.this, Home.class);
			       intent.addFlags(Intent.FLAG_ACTIVITY_NO_ANIMATION);
			       startActivity(intent); 
			       finish();
			       overridePendingTransition(0, 0);
			             
			       }        
			     }, SPLASH_TIME_OUT);    
			        
					
		
		}
					
		@Override
		public void onAnimationEnd(Animation animation) {
			// Take any action after completing the animation

				if (animation == animFadeIn) {
					
					logo.setAnimation(counter);
					
				}
				
				if (animation == counter) {
					loader.startAnimation(zoomOutLoad);
					loader.setVisibility(View.GONE);
					logo.startAnimation(animMove);
					buttons.setVisibility(View.VISIBLE);
					buttons.startAnimation(zoomIn);
			
					}
			
			
		}

		@Override
		public void onAnimationStart(Animation animation) {
			// TODO Auto-generated method stub5

		}

		@Override
		public void onAnimationRepeat(Animation arg0) {
			// TODO Auto-generated method stub
			
		}
}
