<?php
include('includes/dbconnection.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'Add')
	{
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $phoneNo = $_POST["phoneNo"];
        $emailAddress = $_POST["emailAddress"];
        $password = $_POST["password"];
        $gender = $_POST["gender"];

        $que=mysqli_query($con,"select * from lecturer_tbl where emailAddress ='$emailAddress'");
        $ret=mysqli_fetch_array($que);
        if($ret > 0){
            $message = '<div style="color:red">This Lecturer with email address "'.$emailAddress.'" Already Exists!</div>';
        }
        else{

            $query=mysqli_query($con,"insert into lecturer_tbl(firstName,lastName,gender,phoneNo,emailAddress,password,dateCreated) 
            value('$firstName','$lastName','$gender','$phoneNo','$emailAddress','$password','$currentDate')");
            if ($query) {
                $message ='<div style="color:green">Lecturer Created Successfully!</div>';
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
    $que=mysqli_query($con,"select * from lecturer_tbl where id ='$delid'");
    $ret=mysqli_fetch_array($que);
    if($ret > 0){

        $query = mysqli_query($con,"DELETE FROM lecturer_tbl WHERE id ='$delid'");
        if ($query) {
            $message ='<div style="color:green">Lecturer Deleted Successfully!</div>';
        }
    }
}

//all branch

?>