<?php

    include('includes/dbconnection.php');
    // $aid = intval($_GET['aid']);
    $level = $_GET['level'];

        $queryss=mysqli_query($con,"select * from course_tbl where courseLevel='$level' ORDER BY courseName ASC");                        
        $countt = mysqli_num_rows($queryss);
        if($countt > 0){    
        echo '
        <select required name="courseId" class="form-control">';
        echo'<option value="">--Select Course--</option>';
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['id'].'" >'.$row['courseName'].'</option>';
        }
        echo '</select>';
        echo ' </div>
        </div>';
        }

?>