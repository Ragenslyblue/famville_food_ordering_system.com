<?php
include('config.php');

$waiter_name=mysqli_real_escape_string($CON, $_POST['waiter_name']);

/*$sql='SELECT assigned_tables.assigned_tables_id, assigned_tables.user_id, user.first_name, user.last_name, assigned_tables.table_number_area_id, table_number_area.table_numbers, assigned_tables.area_type_id, area_type.area_type, assigned_tables.status, assigned_tables.action
    FROM assigned_tables
    INNER JOIN user
    ON user.user_id=assigned_tables.user_id
    INNER JOIN table_number_area
    ON table_number_area.table_number_area_id=assigned_tables.table_number_area_id
    INNER JOIN area_type
    ON area_type.area_type_id=assigned_tables.area_type_id
    WHERE user.first_name="'.$waiter_name.'" OR user.last_name="'.$waiter_name.'"';*/
$sql='SELECT assigned_tables.assigned_tables_id, assigned_tables.area_type_id, area_type.area_type, assigned_tables.user_id, user.first_name, user.last_name, assigned_tables.table_number_id, table_number.table_number_capacity, assigned_tables.action, assigned_tables.status
    FROM assigned_tables
    INNER JOIN area_type
    ON area_type.area_type_id=assigned_tables.area_type_id
    INNER JOIN user
    ON user.user_id=assigned_tables.user_id
    INNER JOIN table_number
    ON table_number.table_number_id=assigned_tables.table_number_id
    WHERE user.first_name="'.$waiter_name.'" AND user.last_name="'.$waiter_name.'"';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
$last_name='';
while($row=mysqli_fetch_array($qry)){
    $assigned_tables_id=$row['assigned_tables_id'];
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $status=$row['status'];
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Server Details</h2>   
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
<?php
include('config.php');

if($waiter_name!=$last_name){
    echo '<h1 style="text-align: center;">Not Found...</h1>';
}else if($status=='In-Active'){
    echo '<h1 style="text-align: center;">In-Active Individual...</h1>';
}else{
?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=waiter_details_3" method="post" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label><h3>Server Name:</h3></label>
                                            <label><h3><?php echo $first_name.' '.$last_name; ?></h3></label>
                                        </div>
                                        <div class="form-group">
                                            <label><h3>Currently Assigned:</h3></label>
                                            <?php
                                            /*$sql5='SELECT assigned_tables.assigned_tables_id, assigned_tables.user_id, user.first_name, user.last_name, assigned_tables.table_number_area_id, table_number_area.table_numbers, assigned_tables.area_type_id, area_type.area_type, assigned_tables.status, assigned_tables.action
                                                FROM assigned_tables
                                                INNER JOIN user
                                                ON user.user_id=assigned_tables.user_id
                                                INNER JOIN table_number_area
                                                ON table_number_area.table_number_area_id=assigned_tables.table_number_area_id
                                                INNER JOIN area_type
                                                ON area_type.area_type_id=assigned_tables.area_type_id
                                                WHERE user.first_name="'.$waiter_name.'" OR user.last_name="'.$waiter_name.'"';*/
                                            $sql5='SELECT assigned_tables.assigned_tables_id, assigned_tables.area_type_id, area_type.area_type, assigned_tables.user_id, user.first_name, user.last_name, assigned_tables.table_number_id, table_number.table_number_capacity, assigned_tables.action, assigned_tables.status
                                                FROM assigned_tables
                                                INNER JOIN area_type
                                                ON area_type.area_type_id=assigned_tables.area_type_id
                                                INNER JOIN user
                                                ON user.user_id=assigned_tables.user_id
                                                INNER JOIN table_number
                                                ON table_number.table_number_id=assigned_tables.table_number_id
                                                WHERE user.first_name="'.$waiter_name.'" AND user.last_name="'.$waiter_name.'"';
                                            $qry5=mysqli_query($CON, $sql5) or die(mysqli_error($qry5));
                                            while($row=mysqli_fetch_array($qry5)){
                                                $assigned_tables_id=$row['assigned_tables_id'];
                                                $table_number_capacity=$row['table_number_capacity'];
                                                $area_type=$row['area_type'];
                                                $status=$row['status'];
                                                $table_number_id=$row['table_number_id'];
                                                
                                                if($status=='In-Active'){
                                                    $value='';
                                                }else{
                                            ?>
                                            <label><h3><?php echo $table_number_capacity; ?>,</h3></label><input type="hidden" name="assigned_tables_id[]" value="<?php echo $assigned_tables_id; ?>" />
                                            <input type="hidden" name="table_number_id2[]" value="<?php echo $table_number_id; ?>" />
                                            <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label><h3>Area Type:</h3></label>
                                            <label><h3><?php echo $area_type; ?></h3></label>
                                        </div>
                                        
                                        <button type="submit" name="btn_cut_over" value="Cut Over" class="btn btn-primary btn-lg" data-target="#myModal">
                                          Cut Over
                                        </button>

                                    </form>
                                    <br/>
                                      
    </div>
                                
                                
                            </div>
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
<?php
}
?>