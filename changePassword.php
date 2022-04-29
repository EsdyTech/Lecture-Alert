<?php
include('includes/dbconnection.php');
include('includes/session.php');
include('changePassword_action.php');

?>

<!DOCTYPE html>
<html class="h-100" lang="en">

<?php
include('includes/head.php');
?>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include('includes/header-logo.php');?>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php include('includes/header.php');?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include('includes/sidebar.php');?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid mt-3">

            <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Change Password</h4>
                                <a class="text-center" href="#"><h5> <?php if(isset($message)){echo $message;}?></h></a>
                                <div class="basic-form">
                                <form class="mt-5 mb-5 login-input" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <input type="password" name="currentPassword"  required class="form-control" placeholder="Current Password">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <input type="password"  name="newPassword" required class="form-control" placeholder="New Password">                                       
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <input type="password" name="conPassword" required class="form-control" placeholder="Confirm Password">                                       
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!-- <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Check me out</label>
                                            </div> -->
                                        </div>
                                        <input type="hidden" name="action" id="action" value="updateProfile" />
                                        <input class="btn btn-dark" type="submit" name="action" id="action" value="Update" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  
                    </div>         
                    </div>                  
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <?php include('includes/footer.php');?>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <?php include('includes/scripts.php');?>

</body>

</html>