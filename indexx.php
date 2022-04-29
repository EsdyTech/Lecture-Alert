<meta http-equiv="refresh" content="10">
<?php 

    date_default_timezone_set('Africa/Lagos');
	$now = date("Y-m-d H:i:s",  STRTOTIME(date('h:i:sa')));

    echo $now;

    //echo $currentDay  = date("D");
    $dtt = date("Y-m-d");

    $mydate = '2016-01-01';
    //echo date('l, F jS, Y', strtotime($dtt));

    //echo date('l', strtotime($dtt));
    //echo date('F', strtotime($dtt));

?>