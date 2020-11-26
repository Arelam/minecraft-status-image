<?php
/**
 * Shows image based on server online status
 * Originates from studioare.net
 * Used between July 2011 - January 2014
 * 
 * Web archine July 2011
 * https://web.archive.org/web/20110709205619/http://studioare.net:80/
 */
include("server-check.php");
// Locally hosted images, use your own
$online = "online.png";
$offline = "offline.png";

header('content-type: image/png');
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1

if($resulted=="Online"){
   echo file_get_contents($online);
}else{
   echo file_get_contents($offline);
}
?>
