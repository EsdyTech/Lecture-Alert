<?php
include('includes/dbconnection.php');

//assets
$que1=mysqli_query($con,"select * from admin_tbl");
$users = mysqli_num_rows($que1);

//assets
$que2=mysqli_query($con,"select * from course_tbl");
$courses = mysqli_num_rows($que2);

//assets
$que3=mysqli_query($con,"select * from lecturer_tbl");
$lecturers = mysqli_num_rows($que3);

//assets
$que4=mysqli_query($con,"select * from timetable_tbl");
$timetable = mysqli_num_rows($que4);


?>