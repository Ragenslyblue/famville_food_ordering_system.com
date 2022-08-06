<?php
include('config.php');

$tbl_code=mysqli_real_escape_string($CON, $_POST['tbl_code']);
$area_type_id=mysqli_real_escape_string($CON, $_POST['area_type_id']);
$number_of_seats=mysqli_real_escape_string($CON, $_POST['number_of_seats']);
$tables_capacity=mysqli_real_escape_string($CON, $_POST['tables_capacity']);
$btn_save=mysqli_real_escape_string($CON, $_POST['btn_save']);

$sql_select='SELECT * FROM `table_number` WHERE table_number.area_type_id="'.$area_type_id.'"';
$qry_select=mysqli_query($CON, $sql_select) or die(mysqli_error($qry_select));
while($row=mysqli_fetch_array($qry_select)){
    $table_number_id=$row['table_number_id'];
    $table_code_num_id=$row['table_code_num_id'];
    $table_number_capacity=$row['table_number_capacity'];
    $number_of_seats2=$row['number_of_seats'];
}
$status='Un-Assigned';
if($btn_save=='SAVE'){
    $availability3='Available';
}elseif($btn_save=='SAVE'){
    $status='Un-Assigned';
}
$nums=mysqli_num_rows($qry_select);
for($i=1; $i<=$tables_capacity; ++$i){
    $string_table='TBL-';
    $table_num=$string_table.($i+$nums);
    $table_codes2=$tbl_code++;
    
$sql_ins='INSERT INTO `table_number`(`table_code_num_id`, `table_number_capacity`, `area_type_id`, number_of_seats, `availability`, status) 
    VALUES ("'.$table_codes2.'", "'.$table_num.'", "'.$area_type_id.'", "'.$number_of_seats.'","'.$availability3.'", "'.$status.'")';
$qry_ins=mysqli_query($CON, $sql_ins) or die(mysqli_error($qry_ins));
}

?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Manage record has heen saved Successfully...</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       <?php //echo $table_num; ?>
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