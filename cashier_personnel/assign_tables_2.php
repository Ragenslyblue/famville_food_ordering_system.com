<?php
include('config.php');

$area_type_id=mysqli_real_escape_string($CON, $_POST['area_type_id']);

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
                            <div class="row">
                                <div class="col-md-6">
                                    <!--<h3>Basic Form Examples</h3>-->
                                    <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=assign_tables_3" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="area_type_id" value="<?php echo $area_type_id; ?>" />
                                        <div class="form-group">
                                            <label>Assign Server:</label>
                                            <select multiple="" name="assign_waiter[]" class="form-control">
                                                <?php
                                                include('config.php');
                                                $sql_select='SELECT user.user_id, user.first_name, user.last_name, user.user_group_id, user_groups.user_groups, user.status_type_id, status_type.status_type
                                                    FROM user
                                                    INNER JOIN user_groups
                                                    ON user_groups.user_groups_id=user.user_group_id
                                                    INNER JOIN status_type
                                                    ON status_type.status_type_id=user.status_type_id
                                                    WHERE user_groups.user_groups="waiter" AND status_type.status_type="Enabled"';
                                                $qry_select=mysqli_query($CON, $sql_select) or die(mysqli_error($qry_select));
                                                while($row=mysqli_fetch_array($qry_select)){
                                                    $user_id=$row['user_id'];
                                                    $first_name=$row['first_name'];
                                                    $last_name=$row['last_name'];
                                                ?>
                                                <option value="<?php echo $user_id; ?>"><?php echo $first_name.' '.$last_name; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        
                                        <div class="form-group" style="
    float:  right;
    margin-right: -500px;
    margin-top: -123px;
">
                                            <label>Table Numbers:</label>
                                            <select multiple="" name="table_numbers[]" class="form-control" style="
    width: 470px;
">
                                                <?php
                                                include('config.php');
                                                $sql_numbers='SELECT table_number.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, table_number.area_type_id, area_type.area_type, table_number.number_of_seats, table_number.availability, table_number.status
                                                    FROM table_number
                                                    INNER JOIN area_type
                                                    ON area_type.area_type_id=table_number.area_type_id
                                                    WHERE area_type.area_type_id="'.$area_type_id.'"';
                                                $qry_numbers=mysqli_query($CON, $sql_numbers) or die(mysqli_error($qry_numbers));
                                                while($row=mysqli_fetch_array($qry_numbers)){
                                                    $table_number_id=$row['table_number_id'];
                                                    $table_number_capacity=$row['table_number_capacity'];
                                                    $area_type_id2=$row['area_type_id'];
                                                    $status=$row['status'];
                                                    
                                                    if($status=='Assigned'){
                                                        echo '';
                                                    }else{
                                                        
                                                ?>
                                                <option value="<?php echo $table_number_id; ?>"><?php echo $table_number_capacity; ?></option>
                                                <?php    
                                                      }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" name="btn_save" value="SAVE" class="btn btn-default">SAVE</button>

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