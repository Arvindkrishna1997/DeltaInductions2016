package com.example.arvind.mysecondapp;

import android.content.Intent;
import android.os.Bundle;
import android.speech.RecognizerIntent;
import android.support.v7.app.AppCompatActivity;
import android.util.DisplayMetrics;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.Toast;

import java.util.List;

public class MainActivity extends AppCompatActivity {

    private static final int SPEECH_REQUEST_CODE = 0;
    private ImageView image ;
    private RelativeLayout r;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        image=(ImageView)findViewById(R.id.imageView);
        DisplayMetrics displayMetrics = getApplicationContext().getResources().getDisplayMetrics();
        image.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                displaySpeechRecognizer();
            }
        });
    }


// Create an intent that can start the Speech Recognizer activity
        private void displaySpeechRecognizer(){
            Intent intent = new Intent(RecognizerIntent.ACTION_RECOGNIZE_SPEECH);
        intent.putExtra(RecognizerIntent.EXTRA_LANGUAGE_MODEL,
                RecognizerIntent.LANGUAGE_MODEL_FREE_FORM);
// Start the activity, the intent will be populated with the speech text
            startActivityForResult(intent, SPEECH_REQUEST_CODE);
        }

    // This callback is invoked when the Speech Recognizer returns.
// This is where you process the intent and extract the speech text from the intent.
    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        image= (ImageView) findViewById(R.id.imageView);
        if (requestCode == SPEECH_REQUEST_CODE && resultCode == RESULT_OK) {
            List<String> results = data.getStringArrayListExtra(
                    RecognizerIntent.EXTRA_RESULTS);
            String spokenText = results.get(0);
            r=(RelativeLayout)findViewById(R.id.R);
            DisplayMetrics displayMetrics = getApplicationContext().getResources().getDisplayMetrics();
            if(spokenText.equals("up"))  //if up  is spoken then this block is executed.
            { float y=image.getHeight();
                int px = Math.round(y * (displayMetrics.xdpi / DisplayMetrics.DENSITY_DEFAULT));

                int px1 = Math.round(image.getY() * (displayMetrics.xdpi / DisplayMetrics.DENSITY_DEFAULT));
                     if(px1-px<100)
                     {  ((ViewGroup.MarginLayoutParams) image.getLayoutParams()).topMargin =0;
                         image.requestLayout();
                         Toast.makeText(MainActivity.this,"reached top", Toast.LENGTH_LONG).show();
                     }
                     else{    Toast.makeText(MainActivity.this,"up", Toast.LENGTH_LONG).show();
                        ((ViewGroup.MarginLayoutParams) image.getLayoutParams()).topMargin -= 100;//to move image upwards.
                        image.requestLayout();
                     }
            }
            else if(spokenText.equals("down"))
            {
                int px = Math.round(r.getHeight() * (displayMetrics.xdpi / DisplayMetrics.DENSITY_DEFAULT));
                int px1 = Math.round(image.getHeight() * (displayMetrics.xdpi / DisplayMetrics.DENSITY_DEFAULT));
                int px2 = Math.round(image.getY() * (displayMetrics.xdpi / DisplayMetrics.DENSITY_DEFAULT));
               image.setMinimumHeight(px1);
                if(px-px2-px1<100) {
                    ((ViewGroup.MarginLayoutParams) image.getLayoutParams()).bottomMargin=0;
                Toast.makeText(MainActivity.this, "reached bottom", Toast.LENGTH_LONG).show();
                }
                else
                {
                    Toast.makeText(MainActivity.this, "down", Toast.LENGTH_LONG).show();
                    ((ViewGroup.MarginLayoutParams) image.getLayoutParams()).topMargin += 100;
                    image.requestLayout();
                }
            }
            else if(spokenText.equals("left"))
            {    float x=image.getWidth()/2;

            int px = Math.round(x * (displayMetrics.xdpi / DisplayMetrics.DENSITY_DEFAULT));

            int px1 = Math.round(image.getX() * (displayMetrics.xdpi / DisplayMetrics.DENSITY_DEFAULT));
            if(px1-px<100)
                 {
                     ((ViewGroup.MarginLayoutParams) image.getLayoutParams()).leftMargin = 0;
                     image.requestLayout();
                    Toast.makeText(MainActivity.this, "reached left", Toast.LENGTH_LONG).show();
                 }
                else {
                    Toast.makeText(MainActivity.this, "left", Toast.LENGTH_LONG).show();

                ((ViewGroup.MarginLayoutParams) image.getLayoutParams()).leftMargin -= 100;
                image.requestLayout();
                      }
            }
            else if(spokenText.equals("right")) {
                int px = Math.round(r.getWidth() * (displayMetrics.xdpi / DisplayMetrics.DENSITY_DEFAULT));
                int px1 = Math.round(image.getWidth() * (displayMetrics.xdpi / DisplayMetrics.DENSITY_DEFAULT));
                int px2 = Math.round(image.getX() * (displayMetrics.xdpi / DisplayMetrics.DENSITY_DEFAULT));
                {
                    if (px - px2 - px1 < 100) {
                        ((ViewGroup.MarginLayoutParams) image.getLayoutParams()).rightMargin = 0;
                        image.requestLayout();
                        Toast.makeText(MainActivity.this, "reached right", Toast.LENGTH_LONG).show();
                    } else {
                        Toast.makeText(MainActivity.this, "right", Toast.LENGTH_LONG).show();
                        ((ViewGroup.MarginLayoutParams) image.getLayoutParams()).leftMargin += 100;
                        image.requestLayout();
                    }
                }
            }
            else if(spokenText.equals("rectangle"))   //to change the shape to rectangle .
            {
                Toast.makeText(MainActivity.this,"rectangle", Toast.LENGTH_LONG).show();
                image.setImageResource(R.mipmap.blackrectangle);
            }
            else if(spokenText.equals("square"))    //to change the shape to square
            {
                Toast.makeText(MainActivity.this,"square", Toast.LENGTH_LONG).show();
                image.setImageResource(R.mipmap.blacksquare);
            }
            else if(spokenText.equals("circle"))    //to change the shape to circle
            {
                Toast.makeText(MainActivity.this,"circle", Toast.LENGTH_LONG).show();
                image.setImageResource(R.mipmap.blackcircle);
            }
            else if(spokenText.equals("small"))      //to reduce the size
            {
                ViewGroup.LayoutParams params = image.getLayoutParams();
                params.height = 70;
                params.width = 70;
                image.setLayoutParams(params);;
            }
            else if(spokenText.equals("medium"))    //to restore the size
            {
                ViewGroup.LayoutParams params = image.getLayoutParams();
                params.height = 100;
                params.width = 100;
                image.setLayoutParams(params);;
            }else if(spokenText.equals("large"))  //to increase the size
            {
                ViewGroup.LayoutParams params = image.getLayoutParams();
                params.height = 150;
                params.width = 150;
                image.setLayoutParams(params);;
            }
        }
        super.onActivityResult(requestCode, resultCode, data);
    }

    }

