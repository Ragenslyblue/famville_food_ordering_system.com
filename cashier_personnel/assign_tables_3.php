<?php
include('config.php');

$btn_save=mysqli_real_escape_string($CON, $_POST['btn_save']);
$area_type_id=mysqli_real_escape_string($CON, $_POST['area_type_id']);
//$assign_waiter=mysqli_real_escape_string($CON, $_POST['assign_waiter']);
//$table_numbers=mysqli_real_escape_string($CON, $_POST['table_numbers']);

if($btn_save=='SAVE'){
    $action='Assigned';
    $status='Active';

foreach($_POST['table_numbers'] as $table_numbers){
    echo $table_numbers;
    
    foreach($_POST['assign_waiter'] as $assign_waiter){
        echo $assign_waiter;
    
$sql_assign='INSERT INTO `assigned_tables`(`area_type_id`, `user_id`, table_number_id, `status`, `action`) 
    VALUES ("'.$area_type_id.'", "'.$assign_waiter.'", "'.$table_numbers.'","'.$status.'", "'.$action.'")';
$qry_assign=mysqli_query($CON, $sql_assign) or die(mysqli_error($qry_assign));
        }
    }
}

if($btn_save=='SAVE'){
    $status2='Assigned';
    
    foreach($_POST['table_numbers'] as $table_numbers2){
        echo $table_numbers2;
    
$sql_update='UPDATE `table_number` SET `status`="'.$status2.'" 
    WHERE table_number.table_number_id="'.$table_numbers2.'"';
$qry_update=mysqli_query($CON, $sql_update) or die(mysqli_error($qry_update));
    }
}    
?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Assign Tables</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <h1 style="text-align: center;">Save...</h1>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>