package com.mesa.ehdproject;

import android.os.Bundle;
import android.app.Activity;
import android.app.ProgressDialog;
import android.view.Menu;
import android.view.Window;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

public class Location extends Activity {


	@Override 
	public void onCreate(Bundle savedInstanceState) { 
	super.onCreate(savedInstanceState); 
	this.getWindow().requestFeature(Window.FEATURE_PROGRESS); 
	setContentView(R.layout.activity_location); 
	final WebView webView = (WebView) findViewById(R.id.webView); 
	webView.getSettings().setJavaScriptEnabled(true); 
	webView.goBack();
	webView.setWebChromeClient(new WebChromeClient() { 
	}); 
	
	
	webView.setWebViewClient(new WebViewClient() 
	{ 
		ProgressDialog progressDialog; 
		
		
	@Override public void onReceivedError(WebView view, int errorCode, String description, String failingUrl) { 
		webView.loadUrl("file:///android_asset/noconnection2.html");
		Toast.makeText(getApplicationContext(), "You're not connected to the Internet. You can't use some features. Connect to the internet.", Toast.LENGTH_SHORT).show();
	} 
	
	
	public void onLoadResource(WebView view, String url){
		
	
	}
	public void onPageFinished(WebView view, String url) { 
		
		}
	
	@Override public boolean shouldOverrideUrlLoading(WebView view, String url) { 
		
		
	view.loadUrl(url); 
	return true; 
	}
	
	}); 
	webView.loadUrl("http://192.168.43.192/SCBC/mobile/mobilelocation.html"); }  
	
	
	

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.location, menu);
		return true;
	}

}
