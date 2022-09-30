package com.mesa.ehdproject;

import android.os.Bundle;
import android.app.ActionBar.LayoutParams;
import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.res.Configuration;
import android.view.KeyEvent;
import android.view.Menu;
import android.view.View;
import android.view.Window;
import android.view.animation.Animation;
import android.view.animation.AnimationUtils;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.ImageView;
import android.widget.Toast;

public class Products extends Activity {
	private WebView webView;
	
	Animation animRotate;
	ImageView spinner;

	@Override 
	public void onCreate(Bundle savedInstanceState) { 
	super.onCreate(savedInstanceState); 
	this.getWindow().requestFeature(Window.FEATURE_PROGRESS); 
	setContentView(R.layout.activity_products); 
	
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
		
		
	@Override public void onReceivedError(WebView view, int errorCode, String description, String failingUrl) { 
		webView.loadUrl("file:///android_asset/noconnection.html");
		Toast.makeText(getApplicationContext(), "You're not connected to the Internet. You can't use some features. Connect to the internet.", Toast.LENGTH_SHORT).show();
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
	
	if(getResources().getDisplayMetrics().widthPixels>getResources().getDisplayMetrics().
            heightPixels) 
        {  
		Toast.makeText(this,"Screen orientation changed. Please wait, rendering for best viewing",Toast.LENGTH_SHORT).show();
			webView.loadUrl("http://192.168.43.192/SCBC/mobile/mobileprod2.php"); 
        } 
        else 
        { 
        	Toast.makeText(this,"Screen orientation changed. Please wait, rendering for best viewing",Toast.LENGTH_SHORT).show(); 
        	webView.loadUrl("http://192.168.43.192/SCBC/mobile/mobileprod.php"); 
        }
    }
	
	
	//LANDSCAPE
	
	}  

	
	
	
			

	


