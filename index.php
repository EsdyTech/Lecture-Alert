<?php
    include('includes/dbconnection.php');
    include('index_action.php');
?>

<!DOCTYPE html>
<html class="h-100" lang="en">

<?php
    include('includes/head.php');
?>

<body class="h-100">
    
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

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                   <!-- <div style="margin-bottom:100px;">LECTURE ALERT SYSTEM</div> -->
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="#"> <h2>LECTURE ALERT SYSTEM</h2></a>
                                <a class="text-center" href="#"> <h4>Admin Login</h4></a>
                                <a class="text-center" href="#"><h5> <?php if(isset($message)){echo $message;}?></h></a>
                                <form class="mt-5 mb-5 login-input" method="post">
                                    <div class="form-group">
                                        <input type="email" class="form-control" required name="emailAddress" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" required placeholder="Password">
                                    </div>
                                    <input type="hidden" name="action" id="action" value="Login" />
                                    <input class="btn login-form__btn submit w-100" type="submit" name="action" id="action" value="Login" />
                                </form>
                                <!-- <p class="mt-5 login-form__footer">Dont have account? <a href="page-register.html" class="text-primary">Sign Up</a> now</p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--**********************************
        Scripts
    ***********************************-->
    <?php
    include('includes/scripts.php');
?>
</body>
</html>





