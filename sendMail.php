<?php
include('sendChamp.php');
include('sendChamp2.php');

$toEmail = "Ahmedsodiq7@gmail.com";
//$toEmail = "teepensam@gmail.com";

$subject = 'LECTURE ALERT NOTIFICATION';
$body = 'Dear {Staff Name}, <br><br>';
$body .= 'This is to notify you that you will be having a class from {Date goes here}. Please kindly prepare ahead of time. <br><br>';
$body .= 'Warm Regards <br><br><br>';
$body .= 'Lecture Alert System';

$message = "This is to notify you that you will be having a class from {Date goes here}. Please kindly prepare ahead of time";
$to = "2347065903222";
//$to = "2347038254610";

sendEmail($toEmail, $body, $subject);
sendSMS($message, $to);
sleep(5);
?>
