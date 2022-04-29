<?php
include('includes/dbconnection.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'Login')
	{
        $emailAddress = $_POST["emailAddress"];
        $password = $_POST["password"];

        $que=mysqli_query($con,"select * from admin_tbl where emailAddress ='$emailAddress' and password = '$password'");
        $ret=mysqli_fetch_array($que);
        if($ret > 0){
            session_start();
            $_SESSION['admin_id'] = $ret['id'];
            $_SESSION['admin_emailAddress'] = $ret['emailAddress'];
            $_SESSION['admin_fullname'] = $ret['firstName'].' '. $ret['lastName'];

            echo "<script type = \"text/javascript\">
            window.location = (\"dashboard.php\");
            </script>";
        }
        else{

            $message ='<div style="color:red;" class="text-center font-weight-light">Invalid Username/Password!</div>';
        }
    }
}

?>