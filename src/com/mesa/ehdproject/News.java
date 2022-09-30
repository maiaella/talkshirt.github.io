package com.mesa.ehdproject;

import android.os.Bundle;
import android.app.Activity;
import android.app.ProgressDialog;
import android.view.Menu;
import android.view.View;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ImageView;
import android.widget.Toast;

public class News extends Activity {
	
	Animation animRotate;
	ImageView spinner;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_news);
		
		spinner = (ImageView) findViewById(R.id.spinner);
		
		animRotate = AnimationUtils.loadAnimation(getApplicationContext(),
				R.animator.rotate);
		
		spinner.startAnimation(animRotate);
		
		final WebView webView = (WebView) findViewById(R.id.webview); 
		final View ownload = findViewById(R.id.ownload);
		webView.getSettings().setJavaScriptEnabled(true); 
		webView.goBack();
		webView.setWebChromeClient(new WebChromeClient() { 
		}); 

		webView.setWebViewClient(new WebViewClient() 
		{ 
			ProgressDialog progressDialog; 
			
		@Override public void onReceivedError(WebView view, int errorCode, String description, String failingUrl) { 
		// Handle the error 
			Toast.makeText(getApplicationContext(), "You're not connected to the Internet. You can't use some features. Connect to the internet.", Toast.LENGTH_SHORT).show();
			webView.loadUrl("file:///android_asset/noconnection1.html");
		} 
		
		public void onLoadResource(WebView view, String url){
			ownload.setVisibility(View.VISIBLE);
		}
		
		
		public void onPageFinished(WebView view, String url) { 
			try{ 
				if (ownload.isShown()) { 
				
				ownload.setVisibility(View.INVISIBLE); 
				} 
				}
				catch(Exception exception){ 
				exception.printStackTrace(); 
				} 
			}
		
		@Override public boolean shouldOverrideUrlLoading(WebView view, String url) { 
			
			
		view.loadUrl(url); 
		return true; 
		}
		
		}); 
		webView.loadUrl("http://192.168.43.192/SCBC/mobile/mobilenews.php"); }  
		
		
				

		

}
