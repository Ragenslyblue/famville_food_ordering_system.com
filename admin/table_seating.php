<?php
include('config.php');

$tbl_code=mysqli_real_escape_string($CON, $_POST['tbl_code']);
$tables_capacity=mysqli_real_escape_string($CON, $_POST['tables_capacity']);
$area_type_id=mysqli_real_escape_string($CON, $_POST['area_type_id']);
$number_of_seats=mysqli_real_escape_string($CON, $_POST['number_of_seats']);
$btn_save=mysqli_real_escape_string($CON, $_POST['btn_save']);

if($btn_save=='SAVE'){
    $availability2='Available';

for($i=1; $i<=$tables_capacity; ++$i){
    $string_table='TBL-';
    $table_num=$string_table.($i);
    $table_codes2=$tbl_code++;

$sql='INSERT INTO `table_number`(`table_code_num_id`, `table_number_capacity`, `area_type_id`, `number_of_seats`, availability) 
    VALUES ("'.$table_codes2.'", "'.$table_num.'", "'.$area_type_id.'", "'.$number_of_seats.'", "'.$availability2.'")';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
    }
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Record has heen saved Successfully...</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>