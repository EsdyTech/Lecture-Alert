<?php
include('includes/dbconnection.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'Add')
	{
        $lecturerId = $_POST["lecturerId"];
        $level = $_POST["level"];
        $classTime = $_POST["classTime"];
        $dayOfWeek = $_POST["dayOfWeek"];
        $courseId = $_POST["courseId"];

        $que1=mysqli_query($con,"select * from timetable_tbl where lecturerId ='$lecturerId' and classTime = '$classTime' and dayOfWeek = '$dayOfWeek'");
        $ret1=mysqli_fetch_array($que1);

        $que2=mysqli_query($con,"select * from timetable_tbl where classTime = '$classTime' and dayOfWeek = '$dayOfWeek' and level = '$level'");
        $ret2=mysqli_fetch_array($que2);

        if($ret1 > 0){
            $message = '<div style="color:red">This Lecturer Already has a Lecture on "'.$dayOfWeek.'" From "'.$classTime.'" For "'.$level.'"</div>';
        }
        else if($ret2 > 0){
            $message = '<div style="color:red">A Lecturer Already has a Lecture on "'.$dayOfWeek.'" From "'.$classTime.'" For "'.$level.'" </div>';
        }
        else{

            $query=mysqli_query($con,"insert into timetable_tbl(lecturerId,courseId,level,dayOfWeek,classTime,dateCreated) 
            value('$lecturerId','$courseId','$level','$dayOfWeek','$classTime','$currentDate')");
            if ($query) {
                $message ='<div style="color:green">Added Successfully!</div>';
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
    $que=mysqli_query($con,"select * from timetable_tbl where id ='$delid'");
    $ret=mysqli_fetch_array($que);
    if($ret > 0){

        $query = mysqli_query($con,"DELETE FROM timetable_tbl WHERE id ='$delid'");
        if ($query) {
            $message ='<div style="color:green">Deleted Successfully!</div>';
        }
    }
}

//all branch

?>