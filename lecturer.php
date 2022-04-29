<?php
include('includes/dbconnection.php');
include('includes/session.php');
include('lecturer_action.php');

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
                                <h4 class="card-title">Add Lecturer</h4>
                                <a class="text-center" href="#"><h5> <?php if(isset($message)){echo $message;}?></h></a>
                                <div class="basic-form">
                                <form class="mt-5 mb-5 login-input" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <input type="text" name="firstName" required class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text"  name="lastName" required class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <input type="text"  name="phoneNo" required class="form-control" placeholder="Phone Number">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="email" name="emailAddress" required class="form-control" placeholder="Email Address">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <input type="password"  name="password" required class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <select id="inputState" name="gender" required class="form-control">
                                                    <option selected="selected">--Select Gender--</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!-- <div class="form-check">
                                                <input class="form-check-input" type="checkbox">
                                                <label class="form-check-label">Check me out</label>
                                            </div> -->
                                        </div>
                                        <input type="hidden" name="action" id="action" value="Add" />
                                        <input class="btn btn-dark" type="submit" name="action" id="action" value="Add" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Lecturers</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>FirstName</th>
                                                <th>LastName</th>
                                                <th>PhoneNo</th>
                                                <th>Gender</th>
                                                <th>EmailAddress</th>
                                                <th>Password</th>
                                                <th>Date Created</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $cnt = 1;
                                        $que=mysqli_query($con,"SELECT * from lecturer_tbl");
                                        while ($row=mysqli_fetch_array($que)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $row['firstName'];?></td>
                                            <td><?php echo $row['lastName'];?></td>
                                            <td><?php echo $row['phoneNo'];?></td>
                                            <td><?php echo $row['gender'];?></td>
                                            <td><?php echo $row['emailAddress'];?></td>
                                            <td><?php echo $row['password'];?></td>
                                            <td><?php echo $row['dateCreated'];?></td>
                                            <td><a href="?delid=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        <?php
                                            $cnt=$cnt+1;
                                        }
                                    ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                            <th>S/N</th>
                                            <th>FirstName</th>
                                            <th>LastName</th>
                                            <th>PhoneNo</th>
                                            <th>Gender</th>
                                            <th>EmailAddress</th>
                                            <th>Password</th>
                                            <th>Date Created</th>
                                            <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
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