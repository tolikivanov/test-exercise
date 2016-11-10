<html> 
<head> 
<title>управление светодиодами</title> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script>
function funcBefore () {
    $("#information1").text ("Ожидание...");
}
function funcSuccess(data) {
    $("#information1").text ("Готово!");
}
    
$(document).ready (function () {
       $("#led1").bind("click", function () {
          
                       $.ajax ({
                              url: "led1.php",
                              
                              
                              beforeSend: funcBefore,
                              success: funcSuccess
                             });
                           });
                         });
$(document).ready (function () {
       $("#led2").bind("click", function () {
          
                       $.ajax ({
                              url: "led2.php",
                              beforeSend: funcBefore,
                              success: funcSuccess
                             });
                           });
                         });
</script>
</head> 



<input type="button" id="led1" value="LED 1"/>
<input type="button" id="led2" value="LED 2"/>

<div id="information1"></div>

<body> 