/*  DOOR SENSOR IOT */

   
//----------------LIBRARIES----------------
    #include <ESP8266WiFi.h>
    #include <ESP8266HTTPClient.h> 
//-----------------------------------------

const char* ssid = "xxxxxx"; //Silakan isi dengan nama SSID
const char* password = "xxxxxx"; //Siakan isi dengan password

// Buat object http
 HTTPClient http;

//sesuaikan dgn ip dan direktori penyimpanan file php anda
String url = "http://192.xxx.x.x/door-monitoring/getdata.php?";
String payload;


const int pinDoor = D2;
String doorState;

void setup () {

  Serial.begin(9600);
  WiFi.begin(ssid, password);

    pinMode(pinDoor, INPUT_PULLUP);
    
    while (WiFi.status() != WL_CONNECTED) {
        Serial.println("Connecting...");
        delay(1000);
     }
  
 if(WiFi.status() == WL_CONNECTED) {
    Serial.println("Connected...!!!");
 }
  
}

void loop() {

  int door = digitalRead(pinDoor);
  if(door == 1){
    doorState = "Pintu Terbuka";
  }
  else{
    doorState = "Pintu Tertutup";
  }
 
  if (WiFi.status() == WL_CONNECTED) {

        http.begin(url + "door=" + String(door));
        int httpCode = http.GET();

        if (httpCode > 0){
          Serial.print("HTTP Response= ");
          Serial.println(httpCode);
          Serial.println(doorState);
          Serial.println("---------------------------");
        }
        else{
          Serial.println("Failed Connect to Server");
        }
   }
  else {
    Serial.println("Disconnected!!!");
  }
}
