/* The true ESP32 chip ID is essentially its MAC address.
This sketch provides an alternate chip ID that matches 
the output of the ESP.getChipId() function on ESP8266 
(i.e. a 32-bit integer matching the last 3 bytes of 
the MAC address. This is less unique than the 
MAC address chip ID, but is helpful when you need 
an identifier that can be no more than a 32-bit integer 
(like for switch...case).

created 2020-06-07 by cweinhofer
with help from Cicicok */
#include <WiFi.h>	

const char* ssid     = "Haxor"; // Change this to your WiFi SSID
const char* password = "wbbe2586";
const char* host = "192.168.130.252";
const int port = 80;

const int sensor_pin = 34;



void setup() {
  // setting the bits per second(transmission rate)
	Serial.begin(115200);
  // enabling pin on the board
  pinMode(sensor_pin,INPUT);
  
  Serial.println("******************************************************");
  Serial.print("Connecting to ");
  Serial.println(ssid);

  //Connecting to a wifi network
  WiFi.begin(ssid,password);

  while (WiFi.status() != WL_CONNECTED) {
        delay(500);
        Serial.print(".");
    }

    Serial.println("");
    Serial.println("WiFi connected");
    Serial.println("IP address: ");
    Serial.println(WiFi.localIP());
}




void responseFromServer(WiFiClient *client){
  //Checking if there is a timeout
  unsigned long timeout = millis();
  while(client->available() == 0){
    if(millis() - timeout > 5000){
      Serial.println(">>> Client Timeout !");
      client->stop();
      return;
    }
  }
  
   while(client->available()) {
    String line = client->readStringUntil('\r');
    Serial.println(line);
  }

  Serial.println("\nClosing connection\n\n");  
}


void loop() {
  int sensor_data = analogRead(sensor_pin);
  int percentage = 100-((sensor_data/4095) * 100);  
  String url = "/xampp/iot/index.php";
  //String  moisture = "61"; 
  //This function sends the data from sensor to remote server
	WiFiClient client;
     String footer = String(" HTTP/1.1\r\n") + "Host: " + String(host) + "\r\n" + "Connection: close\r\n\r\n";
     
     //If connection to the server fails
      if (!client.connect(host, port)) {
            Serial.println("Not able to connect to server :(");
            return;
      }
      
     url += "?moisture=" + String(sensor_data);    
     client.println("GET " + url + " HTTP/1.1");
     client.print("Host: ");
     client.println(host);
     client.println("User-Agent: ESP8266/1.0");
     client.println("Connection: close\r\n\r\n");
    
    responseFromServer(&client);
              // -------------------------------------------------------------------------------------------------

      delay(10000);

}
