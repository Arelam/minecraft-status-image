<?php
/*
 *
 */
$serverip = "studioare.com";
$port = 25565;
$timeout = 8;
$filecache = "/srv/studioare.com/public_html/mc/cache/statuscache.html";

function mcstatus($servercon)
{if($servercon){return "Online";}else{return "Offline";}}//End function

function ServerCheck($ip, $port, $time, $cache) {
	$fp = @fsockopen($ip, $port, $errno, $errstr, $time);
	//check if port responds
	//response or fail
	$cachefile = fopen($cache,"w+");
	$filecontent = mcstatus($fp);
	fwrite($cachefile,$filecontent);
	fclose($cachefile);
	fclose($fp);
	//write to file
}//End function

$filestat = stat($filecache);
//look up information about the file
if ($filestat['mtime'] < time()-300) ServerCheck($serverip, $port, $timeout, $filecache);
//over 5 minutes - 300 sek
//readfile ("cache/resultcache.html");
//include the file into the page
$resulted = file_get_contents($filecache);
//file_get_contents("cache/cacheserver.html");
?>
