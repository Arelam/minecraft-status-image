<?php
   include("/srv/studioare.com/public_html/mc/mcservercheck-sm.php");
   $online = "http://i.stdior.com/sa/bnr/minecraftonlinev003c.png";
   $offline = "http://i.stdior.com/sa/bnr/minecraftofflinev003c.png";
   
   header('content-type: image/png');
   header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
   
   if($resulted=="Online"){
      echo file_get_contents($online);
   }else{
      echo file_get_contents($offline);   
   }
?>
