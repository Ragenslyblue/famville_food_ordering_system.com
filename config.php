<?php

/**
 * @author pakisab
 * @copyright 2018
 */

global $BASE_URL;
global $CON;
//$BASE_URL="http://localhost/famville_food_ordering_system/";


$host= 'localhost';
$user = 'root';
$pass = '';
$database='famville_food_ordering_system';

//connect to mysql server
$CON=mysqli_connect($host, $user, $pass, $database);

// Check connection
if (!$CON){
  die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>