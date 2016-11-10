boolean isExecuting = false; 
int led1Pin = 12; 
int led2Pin = 11;
int prevLED1Status = 0; 
int newLED1Status = 0; 
int prevLED2Status = 0; 
int newLED2Status = 0; 
int cmd = 0; //код выполняемой команды

void setup()
{
  Serial.begin(9600); 
  pinMode(led1Pin,OUTPUT); 
  pinMode(led2Pin,OUTPUT);
}

void loop()
{
  if (Serial.available() > 0) 
    {
      if (isExecuting == false) 
        {
          cmd = Serial.read() - '0'; 
          isExecuting = true; 
        }
      
      if (cmd == 1) //управление 1 светодиодом
       {
         newLED1Status = (int) Serial.read(); 
         if (newLED1Status != prevLED1Status) 
          {
            digitalWrite(led1Pin,newLED1Status); 
            prevLED1Status = newLED1Status;
          }
       }

if (cmd == 2) //управление 2 светодиодом
       {
         newLED2Status = (int) Serial.read(); 
         if (newLED2Status != prevLED2Status) 
          {
            digitalWrite(led2Pin,newLED2Status); 
            prevLED2Status = newLED2Status;
          }
       }


   
    }
 else 
   {
     delay(50); 
     if (Serial.available() <= 0) 
       isExecuting = false; 
   }
    
}
