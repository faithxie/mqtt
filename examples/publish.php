<?php

//require("../phpMQTT.php");
require("phpMQTT.php");
$myid = $_GET['myphone'];
$callPhone = $_GET['callphone'];
//echo $myid;
//echo $callPhone;


$server = "tuisong.xxxxxxxxxxxxx.cn";     // change if necessary
$port = 1883;                     // change if necessary
$username = "";                   // set your username
$password = "";                   // set your password
//$client_id = "12"; // make sure this is unique for connecting to sever - you could use uniqid()
$client_id = $myid; // make sure this is unique for connecting to sever - you could use uniqid()

$mqtt = new phpMQTT($server, $port, $client_id);

if ($mqtt->connect(true, NULL, $username, $password)) {
	// $mqtt->publish($callPhone, $myid."call you" . date("H:i:s"), 0);

	$mqtt->publish($callPhone, $myid, 0);

	$mqtt->close();
} else {
    echo "Time out!\n";
}
