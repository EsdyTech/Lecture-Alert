<?php
include('includes/dbconnection.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == 'Update')
	{
        $firstName=$_POST['firstName'];
        $lastName=$_POST['lastName'];
    
        $querys=mysqli_query($con,"select * from admin_tbl where id='$admin_id'");
        $row=mysqli_fetch_array($querys);
        if($row > 0){

            $rett=mysqli_query($con,"update admin_tbl set firstName='$firstName',lastName='$lastName' where id='$admin_id'");
            if($rett){
                $message = '<div style="color:green">Profile Updated Successfully!</div>';
            }
            else{
                $message = '<div style="color:red">An Error Occured!</div>';
            }
        }
        else{
            $message = '<div style="color:red">An Error Occured!</div>';
        }
      
    }
}
$ques=mysqli_query($con,"select * from admin_tbl where id ='$admin_id'");
$rets=mysqli_fetch_array($ques);

?>