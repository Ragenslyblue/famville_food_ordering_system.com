<?php

/**
 * @author pakisab
 * @copyright 2018
 */

include('config.php');

$from_time1=date('Y-m-d H:i:s');
$to_time1=$_SESSION['end_time'];
$to_time2=$_SESSION['duration'];

$time_first=strtotime($from_time1);
$time_second=strtotime($to_time1);
$time_third=strtotime($to_time2);

$difference_inseconds=($time_second-$time_first)-1;


echo gmdate('H:i:s', $difference_inseconds);

?>