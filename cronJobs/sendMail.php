<?php
include('includes/dbconnection.php');
require_once ('php-mailer/PHPMailerAutoload.php');

 //The Subject and the body of the Mail
 $subject = "CRON JOB";
 $body = "Testing PHP Cron jobs!";

$que=mysqli_query($con,"SELECT * from course_tbl");
while ($row=mysqli_fetch_array($que)) {

    $body .= $row['courseName']."<br>";
}

 //The Email Configuraton Class
 $mail = new PHPMailer();
 $mail->isSMTP();
 $mail->SMTPAuth = true;
 $mail->SMTPSecure='ssl';
 $mail->Host='smtp.googlemail.com';
 $mail->Port = '465';
 $mail->isHTML();
 $mail->Username ='sawdykdevtest@gmail.com';
 $mail->Password ='sawdykdevtest@2020';
 $mail->SetFrom('no-reply@howcode.org');
 $mail->Subject = $subject;
 $mail->Body = $body;
 $mail->AddAddress('Ahmedsodiq7@gmail.com'); //delivery email Address
 
//log file
 $fp = fopen('log.txt', 'a');
 if($mail->Send()) 
 {
    fwrite($fp, 'Mail Sent Successfully!'.PHP_EOL);
 } 
 else 
 {
    fwrite($fp, 'Failed to Send Mail'.PHP_EOL);
 }
 //fclose($fp);
 fclose($fp);


?>