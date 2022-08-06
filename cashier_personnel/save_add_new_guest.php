<?php
include('config.php');

$guest_num_id=mysqli_real_escape_string($CON, $_POST['guest_num_id']);
$first_name=mysqli_real_escape_string($CON, $_POST['first_name']);
$last_name=mysqli_real_escape_string($CON, $_POST['last_name']);
$address=mysqli_real_escape_string($CON, $_POST['address']);

$sql='INSERT INTO `guest`(`first_name`, `last_name`, address, `guest_num_id`) 
    VALUES ("'.$first_name.'", "'.$last_name.'", "'.$address.'", "'.$guest_num_id.'")';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Guest Added Successfully...</h2><br />
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>