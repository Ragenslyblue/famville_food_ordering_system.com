<?php
include('config.php');

$guest_id=mysqli_real_escape_string($CON, $_POST['guest_id']);
$num_guests_id=mysqli_real_escape_string($CON, $_POST['num_guests_id']);
$btn_occupied=mysqli_real_escape_string($CON, $_POST['btn_occupied']);

if($btn_occupied=='Occupied'){
    $availability2='Occupied';
    $status='In-Progress';
    $action2='In';

foreach($_POST['table_number_id'] as $table_number_id){
    echo $table_number_id;

$sql='INSERT INTO `guest_seated`(`guest_id`, `num_guest_id`, `table_number_id`, `status`, `action`) 
    VALUES ("'.$guest_id.'", "'.$num_guests_id.'", "'.$table_number_id.'", "'.$status.'", "'.$action2.'")';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));

$sql_updated='UPDATE `table_number` SET `availability`="'.$availability2.'" 
    WHERE table_number.table_number_id="'.$table_number_id.'"';
$qry_updated=mysqli_query($CON, $sql_updated) or die(mysqli_error($qry_updated));
    }
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>The Customer Will Be Seated To:</h2><br /> 
           
<h2>Table Number: 

<?php
include('config.php');

$sql_select='SELECT guest_seated.guest_seated_id, guest_seated.table_number_id, table_number.table_number_capacity, guest_seated.guest_id, table_number.area_type_id, area_type.area_type
    FROM guest_seated
    INNER JOIN table_number
    ON table_number.table_number_id=guest_seated.table_number_id
    INNER JOIN area_type
    ON area_type.area_type_id=table_number.area_type_id
    WHERE guest_seated.guest_id="'.$guest_id.'" AND guest_seated.status="In-Progress"';
$qry_select=mysqli_query($CON, $sql_select) or die(mysqli_error($qry_select));
while($row=mysqli_fetch_array($qry_select)){
    $guest_seated_id=$row['guest_seated_id'];
    $table_number_capacity=$row['table_number_capacity'];
    $area_type=$row['area_type'];
?> 
<label><?php echo $table_number_capacity; ?>,</label>
<?php
}
?>
<br />
<div>Area Type:&nbsp;&nbsp;<label><?php echo $area_type; ?></label></div>
</h2>

                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>