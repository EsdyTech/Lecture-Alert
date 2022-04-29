<?php
$input = '02:30 PM';
$time = strtotime($input);

$time = $time - (5 * 60);
$date = date("h:i A", $time);

echo $date;

echo "<br>";

date_default_timezone_set('Africa/Lagos');
$now = date("h:i A",  strtotime(date('h:i A')));

echo $now;
echo "<br><br>";

$dtt = date("Y-m-d");

    echo date('l', strtotime($dtt));
    echo date('F', strtotime($dtt));

// $newTime = strtotime('-15 minutes');
// echo date('Y-m-d H:i:s', $newTime);

// if($cdate == $now){
// echo "Okay!";
// }


// $a = '09:00AM';

// if (strpos($a, 'AM') !== false) {
//     echo 'true';
//     echo "<br>";

//     echo str_replace("AM","",$a);

// }

// include('includes/dbconnection.php');
// $que=mysqli_query($con,"SELECT * from course_tbl");
// while ($row=mysqli_fetch_array($que)) {

//     if($row['courseLevel'] == 'ND1'){


//         echo 'jhhd';
//     }
//     //echo $row['courseName'];
//     echo "<br>";

// }

?>