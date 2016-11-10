import processing.serial.*; 
import de.bezier.data.sql.*; 

Serial port;
MySQL dbconnection;
int prevLED1State = 0; 
int prevLED2State = 0;

void setup()
{
  port = new Serial(this, "COM7", 9600); 
  port.bufferUntil('\n');
  
  String user     = "u0256578_default";
  String pass     = "n9ip21!L";
  String database = "u0256578_default";

  dbconnection = new MySQL( this, "frizzz.ru", database, user, pass ); 
  dbconnection.connect();
}

void draw()
{
 
  dbconnection.query( "SELECT * FROM led1 WHERE id = '1'" ); 
  while (dbconnection.next()) 
   {
    int n = dbconnection.getInt("status"); 
    if (n != prevLED1State) 
        {
          prevLED1State = n;
          port.write('1'); 
          port.write(n);
        }
   }
  
  dbconnection.query( "SELECT * FROM led2 WHERE id = '1'" ); 
  while (dbconnection.next()) 
   {
    int m = dbconnection.getInt("status"); 
    if (m != prevLED2State) 
        {
          prevLED2State = m;
          port.write('2'); 
          port.write(m);
        }
   }
  
 
  delay(50); 
}
