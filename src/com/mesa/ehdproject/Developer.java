package com.mesa.ehdproject;

import android.os.Bundle;
import android.app.Activity;
import android.view.Menu;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.view.animation.Animation.AnimationListener;
import android.widget.FrameLayout;
import android.widget.RelativeLayout;
import android.widget.ScrollView;

public class Developer extends Activity implements AnimationListener {
	
	RelativeLayout logoRMC, logoEPC;
	ScrollView scrollView;

	Animation animFadeIn, animFadeOut, animFadeOut2, zoomIn, zoomIn2;
	

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_developer);
		
		zoomIn = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.zoom_in_logo);
		
		zoomIn2 = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.zoom_in_logo);
		
		logoRMC = (RelativeLayout) findViewById(R.id.logoRMC);
		logoEPC = (RelativeLayout) findViewById(R.id.logoEPC);
		scrollView = (ScrollView) findViewById(R.id.scrollView);
		
		
		animFadeIn = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.fade_in);
		
		animFadeOut = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.fade_out);
		
		animFadeOut2 = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.fade_out);
		
		zoomIn.setAnimationListener(this);
		zoomIn2.setAnimationListener(this);
		animFadeIn.setAnimationListener(this);
		animFadeOut.setAnimationListener(this);
		animFadeOut2.setAnimationListener(this);
		
		logoRMC.setVisibility(View.VISIBLE);
        logoRMC.startAnimation(zoomIn);
		
	}
	
	@Override
	public void onAnimationEnd(Animation animation) {
		// Take any action after completing the animation

				if(animation == zoomIn){
					logoRMC.startAnimation(animFadeOut);
					logoRMC.setVisibility(View.GONE);
					
				}
				
				if(animation == animFadeOut){
					logoEPC.setVisibility(View.VISIBLE);
					logoEPC.startAnimation(zoomIn2);
				}
				
				if(animation == zoomIn2){
					logoEPC.startAnimation(animFadeOut2);
				}
				
				if(animation == animFadeOut2){
					logoEPC.setVisibility(View.GONE);
					scrollView.setVisibility(View.VISIBLE);
					scrollView.startAnimation(animFadeIn);
					
				}
		
	}
	
	@Override
	public void onAnimationRepeat(Animation animation) {
		// TODO Auto-generated method stub
		
	}

	@Override
	public void onAnimationStart(Animation animation) {
		// TODO Auto-generated method stub
		
	}


	

}
