<?php
    include('includes/dbconnection.php');
    require_once ('php-mailer/PHPMailerAutoload.php');
    //C:\xampp\php\php.exe -f C:\xampp\htdocs\websites\Lecture_Alert\cronjob.php

    date_default_timezone_set('Africa/Lagos');
    $currentTime = date("h:i A",  strtotime(date('h:i A'))); //current time of the day

    $todaysDate = date("Y-m-d");
    $today = date('l', strtotime($todaysDate)); //Current day of the week Monday, Tuesday, etc

    $que=mysqli_query($con,"SELECT lecturer_tbl.firstName, lecturer_tbl.lastName, lecturer_tbl.emailAddress, course_tbl.courseName, course_tbl.courseCode,
    timetable_tbl.id, timetable_tbl.level, timetable_tbl.dayOfWeek, timetable_tbl.classTime, timetable_tbl.dateCreated
    from timetable_tbl
    INNER JOIN lecturer_tbl ON lecturer_tbl.id = timetable_tbl.lecturerId
    INNER JOIN course_tbl ON course_tbl.id = timetable_tbl.courseId
    where dayOfWeek = '$today'");
    while ($row=mysqli_fetch_array($que)) {

        $fullName = $row['firstName'].' '.$row['lastName'];
        $courseName = $row['courseName'];
        $courseCode = $row['courseCode'];
        $emailAddress = $row['emailAddress'];

        $classTime = $row['classTime'];
        $startTime = explode(" - ",$classTime);
        $time = strtotime($startTime[0]);
        $time = $time - (5 * 60); //minus 5 minutes
        $newStartTime = date("h:i A", $time);

        if($currentTime == $newStartTime){

             //Mail code goes here!
            //The Email Configuraton Class

            $subject = 'LECTURE ALERT  -  '.$courseCode.'     '.$courseName.'';
            $body = 'Dear '.$fullName.', <br><br>';
            $body .= 'This is to notify you that you will be having a class from '.$classTime.'. Please kindly prepare ahead of time. <br><br>';
            $body .= 'Warm Regards <br><br><br>';
            $body .= 'Lecturer Alert System';
            
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPSecure='ssl';
            $mail->Host='smtp.googlemail.com';
            $mail->Port = '465';
            $mail->isHTML(true);
            $mail->Username ='sawdykdevtest@gmail.com';
            $mail->Password ='sawdykdevtest@2020';
            $mail->SetFrom('no-reply@howcode.org');
            $mail->Subject = $subject;
            $mail->WordWrap = 50;
            $mail->Body = $body;
            $mail->AddAddress($emailAddress); //delivery email Address
            //$mail->AddAddress('michealakinkuotu73@gmail.com');
            // $mail->AddAddress('michealakinkuotu73@gmail.com');
            
            if($mail->Send()) 
            {
                echo "Mail Sent Successfully!";
            } 
            else 
            {
                echo "Mail Failed to Send!";
            }
        }
        else{
            echo "No Class Yet!";
            sleep(5);
        }
    }
?>