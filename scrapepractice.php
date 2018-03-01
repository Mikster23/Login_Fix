<?php
$url = 'http://192.168.1.39/default/en_US/tools.html?type=sms_inbox';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
echo $output;
?>
