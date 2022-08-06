<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Service Waiter List</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    
                     <!-- End Form Elements -->
                </div>
            </div>
            <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Service Waiter Lists
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID No.</th>
                                            <th>Username</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Image</th>
                                            <th>Cellphone No.</th>
                                            <th>Email Address</th>
                                            <!--<th>Cellphone Number</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    
                                    $sql_waiter='SELECT user.user_id, user.user_name, user.first_name, user.last_name, user.image, user.cellphone_number, user.email_address, user.user_group_id, user_groups.user_groups
                                        FROM user
                                        INNER JOIN user_groups
                                        ON user_groups.user_groups_id=user.user_group_id
                                        WHERE user_groups.user_groups="waiter"
                                        ORDER BY user.user_id ASC';
                                    $qry_waiter=mysqli_query($CON, $sql_waiter) or die(mysqli_error($qry_waiter));
                                    while($row=mysqli_fetch_array($qry_waiter)){
                                        $user_id=$row['user_id'];
                                        $user_name=$row['user_name'];
                                        $first_name=$row['first_name'];
                                        $last_name=$row['last_name'];
                                        $image=$row['image'];
                                        $cellphone_number=$row['cellphone_number'];
                                        $email_address=$row['email_address'];
                                    ?>
                                        <tr class="success">
                                            <td><?php echo $user_id; ?></td>
                                            <td><?php echo $user_name; ?></td>
                                            <td><?php echo $first_name; ?></td>
                                            <td><?php echo $last_name; ?></td>
                                            <td><img src="<?php echo './images_3/upload/'.$image; ?>" width="100" height="100" /></td>
                                            <td><?php echo $cellphone_number; ?></td>
                                            <td><?php echo $email_address; ?></td>
                                            <!--<td><?php //echo $cellphone_number; ?></td>-->
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                    <?php
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