<?php
include('includes/dbconnection.php');
include('includes/session.php');
include('timetable_action.php');

?>

<!DOCTYPE html>
<html class="h-100" lang="en">

<?php
include('includes/head.php');
?>
<script>
function showCourses(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCall.php?level="+str,true);
        xmlhttp.send();
    }
}
</script>
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
                                <h4 class="card-title">Add Course Time</h4>
                                <a class="text-center" href="#"><h5> <?php if(isset($message)){echo $message;}?></h></a>
                                <div class="basic-form">
                                <form class="mt-5 mb-5 login-input" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                            <?php 
                                                $query=mysqli_query($con,"select * from lecturer_tbl ORDER BY firstName ASC");                        
                                                $count = mysqli_num_rows($query);
                                                if($count > 0){                       
                                                    echo '<select required name="lecturerId" class="form-control">';
                                                    echo'<option value="">--Select Lecturer--</option>';
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    echo'<option value="'.$row['id'].'" >'.$row['firstName'].' '.$row['lastName'].'</option>';
                                                        }
                                                            echo '</select>';
                                                        }
                                            ?>   
                                            </div>
                                            <div class="form-group col-md-6">
                                            <select id="inputState" name="level" onchange="showCourses(this.value)" required class="form-control">
                                                    <option selected="selected">--Select Level--</option>
                                                    <option value="ND1">ND1</option>
                                                    <option value="ND2">ND2</option>
                                                    <option value="HND1">HND1</option>
                                                    <option value="HND2">HND2</option>
                                                </select>                                                    
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                            <select id="inputState" name="classTime" required class="form-control">
                                                    <option selected="selected">--Select Time--</option>
                                                    <option value="07:00 AM - 08:00 AM">07:00 AM - 08:00 AM</option>
                                                    <option value="08:00 AM - 09:00 AM">08:00 AM - 09:00 AM</option>
                                                    <option value="09:00 AM - 10:00 AM">09:00 AM - 10:00 AM</option>
                                                    <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                                                    <option value="11:00 AM - 12:00 PM">11:00 AM - 12:00 PM</option>
                                                    <option value="12:00 PM - 01:00 PM">12:00 PM - 01:00 PM</option>
                                                    <option value="01:00 PM - 02:00 PM">01:00 PM - 02:00 PM</option>
                                                    <option value="02:00 PM - 03:00 PM">02:00 PM - 03:00 PM</option>
                                                    <option value="03:00 PM - 04:00 PM">03:00 PM - 04:00 PM</option>
                                                    <option value="04:00 PM - 05:00 PM">04:00 PM - 05:00 PM</option>
                                                    <option value="05:00 PM - 06:00 PM">05:00 PM - 06:00 PM</option>
                                                </select>      
                                            </div>
                                            <div class="form-group col-md-3">
                                            <?php 
                                                $query=mysqli_query($con,"select * from day_tbl ORDER BY id ASC");                        
                                                $count = mysqli_num_rows($query);
                                                if($count > 0){                       
                                                    echo '<select required name="dayOfWeek" class="form-control">';
                                                    echo'<option value="">--Select Day--</option>';
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    echo'<option value="'.$row['dayName'].'" >'.$row['dayName'].'</option>';
                                                    }
                                                        echo '</select>';
                                                    }
                                            ?> 
                                                </select>    
                                            </div>
                                            <div class="form-group col-md-6">
                                            <?php
                                                echo"<div id='txtHint'></div>";
                                            ?> 
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
                                <h4 class="card-title">TimeTable</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Lecturer</th>
                                                <th>Course</th>
                                                <th>Course Code</th>
                                                <th>Level</th>
                                                <th>Day</th>
                                                <th>Time</th>
                                                <th>Date Created</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $cnt = 1;
                                        $que=mysqli_query($con,"SELECT lecturer_tbl.firstName, lecturer_tbl.lastName, course_tbl.courseName, course_tbl.courseCode,
                                        timetable_tbl.id, timetable_tbl.level, timetable_tbl.dayOfWeek, timetable_tbl.classTime, timetable_tbl.dateCreated
                                        from timetable_tbl
                                        INNER JOIN lecturer_tbl ON lecturer_tbl.id = timetable_tbl.lecturerId
                                        INNER JOIN course_tbl ON course_tbl.id = timetable_tbl.courseId
                                        ");
                                        while ($row=mysqli_fetch_array($que)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $row['firstName'].' '.$row['lastName'];?></td>
                                            <td><?php echo $row['courseName'];?></td>
                                            <td><?php echo $row['courseCode'];?></td>
                                            <td><?php echo $row['level'];?></td>
                                            <td><?php echo $row['dayOfWeek'];?></td>
                                            <td><?php echo $row['classTime'];?></td>
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
                                                <th>Lecturer</th>
                                                <th>Course</th>
                                                <th>Course Code</th>
                                                <th>Level</th>
                                                <th>Day</th>
                                                <th>Time</th>
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