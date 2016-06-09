package com.example.arvind.mysecondapp;

import android.content.Intent;
import android.os.Bundle;
import android.speech.RecognizerIntent;
import android.support.v7.app.AppCompatActivity;
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
            if(spokenText.equals("up"))  //if up  is spoken then this block is executed.
            {

                     if(image.getY()-image.getHeight()/2<100)
                     { float y=image.getHeight()/2;
                         image.setY(y);
                         Toast.makeText(MainActivity.this,"reached top", Toast.LENGTH_LONG).show();
                     }
                     else{    Toast.makeText(MainActivity.this,"up", Toast.LENGTH_LONG).show();
                        ((ViewGroup.MarginLayoutParams) image.getLayoutParams()).topMargin -= 100;//to move image upwards.
                        image.requestLayout();
                     }
            }
            else if(spokenText.equals("down"))
            {
                if(r.getHeight()-image.getY()-image.getHeight()/2<100) {
                float y=r.getHeight()-image.getHeight()/2;
                image.setY(y);
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
            {     if(image.getX()-image.getWidth()/2<=100)
                 {
                    float x;
                    x=(image.getWidth()/2);
                    image.setX(x);
                    Toast.makeText(MainActivity.this, "reached left", Toast.LENGTH_LONG).show();
                 }
                else {
                    Toast.makeText(MainActivity.this, "left", Toast.LENGTH_LONG).show();
                    float x = image.getX();
                    x = x - 100;
                    image.setX(x);
                      }
            }
            else if(spokenText.equals("right"))
            {   if(r.getMeasuredWidth()-image.getX()-image.getWidth()<100)
                {
                    float x=r.getMeasuredWidth()-image.getWidth()/2;
                    image.setX(x);
                    Toast.makeText(MainActivity.this, "reached right", Toast.LENGTH_LONG).show();
                }
                else {
                Toast.makeText(MainActivity.this, "right"+image.getX(), Toast.LENGTH_LONG).show();
                float x = image.getX();
                x = x + 100;
                image.setX(x);
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

