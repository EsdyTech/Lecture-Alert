<?php
include('includes/dbconnection.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'Add')
	{
        $courseName = $_POST["courseName"];
        $courseCode = $_POST["courseCode"];
        $courseLevel = $_POST["courseLevel"];
        $courseUnit = $_POST["courseUnit"];

        $que=mysqli_query($con,"select * from course_tbl where courseName ='$courseName' and courseCode = '$courseCode'");
        $ret=mysqli_fetch_array($que);
        if($ret > 0){
            $message = '<div style="color:red">This Course with name "'.$courseName.'" and Code "'.$courseCode.'" Already Exists!</div>';
        }
        else{

            $query=mysqli_query($con,"insert into course_tbl(courseName,courseCode,courseLevel,courseUnit,dateCreated) 
            value('$courseName','$courseCode','$courseLevel','$courseUnit','$currentDate')");
            if ($query) {
                $message ='<div style="color:green">Course Created Successfully!</div>';
            }
            else
            {
                $message = '<div style="color:red">An Error Occured!</div>';
            }
        }
    }
}

if(isset($_GET["delid"]))
{
	$delid = $_GET['delid'];
    $que=mysqli_query($con,"select * from course_tbl where id ='$delid'");
    $ret=mysqli_fetch_array($que);
    if($ret > 0){

        $query = mysqli_query($con,"DELETE FROM course_tbl WHERE id ='$delid'");
        if ($query) {
            $message ='<div style="color:green">Course Deleted Successfully!</div>';
        }
    }
}

//all branch

?>