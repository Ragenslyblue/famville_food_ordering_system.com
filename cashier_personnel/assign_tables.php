<?php
include('config.php');
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
                                    <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=assign_tables_2" method="post" enctype="multipart/form-data">
                                       
                                        <div class="form-group">
                                                <label for="">Area Type:</label>
                                                <select id="" name="area_type_id" class="form-control" style="
    width: 205%;">
                                                    <option value="0">Please select</option>
                                                    <?php
                                                    include('config.php');
                                                    $sql='SELECT * FROM `area_type`';
                                                    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
                                                    while($row=mysqli_fetch_array($qry)){
                                                        $area_type_id=$row['area_type_id'];
                                                        $area_type=$row['area_type'];
                                                    ?>
                                                    <option value="<?php echo $area_type_id; ?>"><?php echo $area_type; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        
                                        
                                        
                                        <button type="submit" name="btn_search" class="btn btn-default">SEARCH</button>

                                    </form>
                                    <br/>
                                      
    </div>
                                
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Assigned Server
                        </div>
                        
                        <form action="" method="post" enctype="multipart/form-data">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Server Name</th>
                                            <th>Main Area</th>
                                            <th>Assigned Table No.</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            <th>Review Change</th>
                                            <!--<th>Get Data</th>-->
                                            <!--<th>Get Data</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include('config.php');

                                        $sql='SELECT assigned_tables.assigned_tables_id, assigned_tables.area_type_id, area_type.area_type, assigned_tables.user_id, user.first_name, user.last_name, assigned_tables.table_number_id, table_number.table_number_capacity, assigned_tables.action, assigned_tables.status
                                            FROM assigned_tables
                                            INNER JOIN area_type
                                            ON area_type.area_type_id=assigned_tables.area_type_id
                                            INNER JOIN user
                                            ON user.user_id=assigned_tables.user_id
                                            INNER JOIN table_number
                                            ON table_number.table_number_id=assigned_tables.table_number_id';
                                        $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
                                        while($row=mysqli_fetch_array($qry)){
                                            $assigned_tables_id=$row['assigned_tables_id'];
                                            $first_name=$row['first_name'];
                                            $last_name=$row['last_name'];
                                            $area_type=$row['area_type'];
                                            $table_number_capacity=$row['table_number_capacity'];
                                            $status=$row['status'];
                                            $action=$row['action'];
                                            
                                            global $vals;
                                            /*foreach($qry as $table_val){
                                                $tables=$table_val['table_number_capacity'];
                                                $vals=$tables.','.$vals;
                                            }*/
                                        ?>
                                        <tr class="success">
                                            <input type="hidden" name="assigned_tables_id" value="<?php echo $assigned_tables_id; ?>" />
                                            <td><?php echo $first_name.' '.$last_name; ?></td>
                                            <td><?php echo $area_type; ?></td>
                                            <td><?php echo $table_number_capacity; ?></td>
                                            <td><a href="#" class="btn btn-warning btn-xs"><?php echo $status; ?></a></td><input type="hidden" name="stats" value="<?php echo $status;?>" />
                                            <td>
                                            <!--<select class="form-control" name="user_attendee_type_id" style="
                                                width: 100px;
                                            ">
                                                <?php
                                                /*include('config.php');
                                                $sql_present='SELECT * FROM `user_attendee_type`';
                                                $qry_present=mysqli_query($CON, $sql_present) or die(mysqli_error($qry_present));
                                                while($row=mysqli_fetch_array($qry_present)){
                                                    $user_attendee_type_id=$row['user_attendee_type_id'];
                                                    $user_attendee_type=$row['user_attendee_type'];*/
                                                ?>
                                                <option value="<?php //echo $user_attendee_type_id; ?>"><?php //echo $user_attendee_type; ?></option>
                                                <?php
                                                //}
                                                ?>
                                            </select>-->
                                            <!--<button type="submit" name="btn_update" value="Update" class="btn btn-default" style="
                                            float:  right;
                                            margin-left: 60px;
                                            margin-top: -34px;
                                            width: 85px;
                                        "><i class=" fa fa-refresh "></i> Update</button>-->
                                        <!--<button type="submit" name="btn_update" value="Update" class="btn btn-default"><i class=" fa fa-refresh "></i> Update</button>-->
                                            </form>
                                            <a href="<?php echo 'cashier_personnel/update_assign_tables.php?id='.$assigned_tables_id; ?>" class="btn btn-default"><i class=" fa fa-refresh "></i>Update</a>
                                            </td>
                                        
                                            <td>
                                            <a href="#" class="btn btn-primary">Change</a>
                                            </td>
                                            <!--<td>
                                            <a href="#" class="btn btn-info">Print Data</a>
                                            </td>-->
                                        </tr>
                                        <?php
                                            //}
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>