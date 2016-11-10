<?php
$hostname = "localhost";
$username = "u0256578_default";
$password = "n9ip21!L";
$database = "u0256578_default";
$connect_DB = mysql_connect($hostname, $username, $password); 
if (!$connect_DB) { 
    exit;        
}
mysql_select_db($database); 
changeLED(); 
mysql_close($connect_DB); 
function changeLED() 
{
  $query = "SELECT `status` FROM led2 WHERE `id` = '1'"; 
  $result = mysql_query($query);
  while ($_row = mysql_fetch_array($result,MYSQL_NUM)) 
  {
    
    $st = (int)$_row[0];
    if ($st == 0)
      $st = 1;
    else
      $st = 0;
  }
  $query = "UPDATE led2 SET `status` = '$st' WHERE `id` = '1'"; 
  $result = mysql_query($query);
}
?>