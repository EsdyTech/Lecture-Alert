<?php
include('includes/dbconnection.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'Add')
	{
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $emailAddress = $_POST["emailAddress"];
        $password = $_POST["password"];

        $que=mysqli_query($con,"select * from admin_tbl where emailAddress ='$emailAddress'");
        $ret=mysqli_fetch_array($que);
        if($ret > 0){
            $message = '<div style="color:red">This User with Email Address "'.$emailAddress.'" Already Exists!</div>';
        }
        else{

            $query=mysqli_query($con,"insert into admin_tbl(firstName,lastName,emailAddress,password) 
            value('$firstName','$lastName','$emailAddress','$password')");
            if ($query) {
                $message ='<div style="color:green">User Created Successfully!</div>';
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
    $que=mysqli_query($con,"select * from admin_tbl where id ='$delid'");
    $ret=mysqli_fetch_array($que);
    if($ret > 0){

        $query = mysqli_query($con,"DELETE FROM admin_tbl WHERE id ='$delid'");
        if ($query) {
            $message ='<div style="color:green">User Deleted Successfully!</div>';
        }
    }
}

//all branch

?>