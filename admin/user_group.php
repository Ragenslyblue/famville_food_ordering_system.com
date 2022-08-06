<?php
include('config.php');

if(isset($_POST['btn_save'])){
    $group_name=mysqli_real_escape_string($CON, $_POST['group_name']);
    
    $sql_dup='SELECT * FROM `user_groups` WHERE user_groups.user_groups="'.$group_name.'"';
    $qry_dup=mysqli_query($CON, $sql_dup) or die(mysqli_error($qry_dup));
    if(mysqli_num_rows($qry_dup)==0){
        
    $sql='INSERT INTO `user_groups`(`user_groups`) 
        VALUES ("'.$group_name.'")';
    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
    }
}
?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>User Groups</h2>   
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
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>User Group Name:</label>
                                            <input type="text" name="group_name" class="form-control"/>
                                        </div>
                                        
                                        
                                        <button type="submit" name="btn_save" class="btn btn-default">SAVE</button>

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
                            User Groups List
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>User Group ID</th>
                                            <th>User Group Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    $sql_select='SELECT * FROM `user_groups`';
                                    $qry_select=mysqli_query($CON, $sql_select) or die(mysqli_error($qry_select));
                                    while($row=mysqli_fetch_array($qry_select)){
                                        $user_groups_id=$row['user_groups_id'];
                                        $user_groups=$row['user_groups'];
                                    ?>
                                        <tr class="success">
                                            <td><?php echo $user_groups_id; ?></td>
                                            <td><?php echo $user_groups; ?></td>
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <!--<button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>-->
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