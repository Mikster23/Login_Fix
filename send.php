<!DOCTYPE html><html lang="en" class="no-js">
    <head>
    </head>
    <body>



<?php
session_start();
$number = $_SESSION["txtnum"];
$mg = $_SESSION["txtmsg"];
/*
 * Usage: pass parameters through line command like example below
 * example:
 *    php send.php 0121212123 "Hello World!"
 * @parameters receiver message
 * @author Iivo Raitahila
 * @author Eduardo Fontinelle
 * This project was perfectly written by Iivo Raitahila and forked and adapted to my use. Enjoy!
 */

$debug = true;
error_reporting(E_ALL);
if ($debug) {
    ini_set('display_errors', 1);
} else {
    ini_set('display_errors', 0);
}

/*
if (count($argv) != 3) {
    exit("
...................................................................
* * Wrong use * *
  Example how to use this script:

$ php send.php <phone number> <message>

................................................................... \n");
}*/

require_once dirname(__FILE__).'/models/message.php';
require_once dirname(__FILE__).'/classes/goip.php';
$settings = require dirname(__FILE__).'/settings.php';

////echo $argv[2];


//echo $testnum;
// arg[1] number arg[2] message

$number = trim($number);
$mg = trim($mg);
$mg = "$mg";
$number ="$number";

//$message = new FSG\MessageVO(rand(1000, 9999), $argv[1], $argv[2]);
$txt = $_POST["txt"];
$num = $_POST["num"];
$num = trim($num);

$message = new FSG\MessageVO(rand(1000, 9999), "$num", "$txt");
$goip = new FSG\Goip($settings['goipAddress'], $settings['goipPort'], $settings['goipPassword']);

$flag = 0 ;
if($flag==0){
  $flag+=1;
$result = $goip->sendSMS($message);
}

if($result === true) {
  $goip->close();
    echo $message;
    echo 1;
} else {
    echo $result;
}

$goip->close(); ?>

<script src = "js/chat.js"></script>
</body>
</html>
