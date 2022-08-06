<?php
include('config.php');

//$assigned_tables_id=mysqli_real_escape_string($CON, $_POST['assigned_tables_id']);
$btn_cut_over=mysqli_real_escape_string($CON, $_POST['btn_cut_over']);

if($btn_cut_over=='Cut Over'){
    $action='Un-Assigned';

if($btn_cut_over=='Cut Over'){
    $status='In-Active';

foreach($_POST['assigned_tables_id'] as $assigned_tables_id){
    echo $assigned_tables_id;

$sql='UPDATE `assigned_tables` SET `status`="'.$status.'",`action`="'.$action.'" 
    WHERE assigned_tables.assigned_tables_id="'.$assigned_tables_id.'"';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
        }
    }
}

if($btn_cut_over=='Cut Over'){
    $action2='Un-Assigned';
    
    foreach($_POST['table_number_id2'] as $table_number_id2){
        echo $table_number_id2;
    
$sql_updates='UPDATE `table_number` SET `status`="'.$action2.'" 
    WHERE table_number.table_number_id="'.$table_number_id2.'"';
$qry_updates=mysqli_query($CON, $sql_updates) or die(mysqli_error($qry_updates));
    }
}
?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Cut Over...</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                
                </div>
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>