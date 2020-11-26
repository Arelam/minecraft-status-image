<?php
/**
 * Implements a simple file cache to only ping server after 5 minutes
 * Code is result of low resource availability and few dependencies
 * 
 * For maximum website performance: this script should execute autonomously
 * in a cron job to lower wait time on image load.
 * 
 * Originates from studioare.net
 * Used between July 2011 - January 2014
 */
$serverip = "studioare.com"; // IP or domain name
$port = 25565; // Default minecraft port
$timeout = 8;
$filecache = "cache/statuscache.html";

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
//Check server every 5 minutes - 300 sek

$resulted = file_get_contents($filecache);
?>
