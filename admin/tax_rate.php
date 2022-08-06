<?php
include('config.php');

if(isset($_POST['btn_save'])){
    $tax_name=mysqli_real_escape_string($CON, $_POST['tax_name']);
    $tax_rate=mysqli_real_escape_string($CON, $_POST['tax_rate']);
    $tax_type=mysqli_real_escape_string($CON, $_POST['tax_type']);
    
    $sql_dup='SELECT * FROM `tax_rate` WHERE tax_rate.tax_rate="'.$tax_rate.'"';
    $qry_dup=mysqli_query($CON, $sql_dup) or die(mysqli_error($qry_dup));
    if(mysqli_num_rows($qry_dup)==0){
        
    $sql_values='INSERT INTO `tax_rate`(`tax_name`, `tax_rate`, `tax_type_id`) 
        VALUES ("'.$tax_name.'", "'.$tax_rate.'", "'.$tax_type.'")';
    $qry_values=mysqli_query($CON, $sql_values) or die(mysqli_error($qry_values));
    }
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Tax Rate</h2>   
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
                                            <label>Tax Name:</label>
                                            <input type="text" name="tax_name" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Tax Rate:</label>
                                            <input type="text" name="tax_rate" class="form-control"/>
                                        </div>
                                        
                                        <div class="form-group">
                                                <label for="">Tax Type:</label>
                                                <select id="" name="tax_type" class="form-control">
                                                    <option value="0">Please select</option>
                                                    <?php
                                                    include('config.php');
                                                    $sql_tax='SELECT * FROM `tax_type`';
                                                    $qry_tax=mysqli_query($CON, $sql_tax) or die(mysqli_error($qry_tax));
                                                    while($row=mysqli_fetch_array($qry_tax)){
                                                        $tax_type_id=$row['tax_type_id'];
                                                        $tax_type=$row['tax_type'];
                                                    ?>
                                                    <option value="<?php echo $tax_type_id; ?>"><?php echo $tax_type; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
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
                            Users List
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tax ID</th>
                                            <th>Tax Name</th>
                                            <th>Tax Rate</th>
                                            <th>Tax Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    $sql_con='SELECT tax_rate.tax_rate_id, tax_rate.tax_name, tax_rate.tax_rate, tax_type.tax_type_id, tax_type.tax_type
                                        FROM tax_rate
                                        INNER JOIN tax_type
                                        ON tax_type.tax_type_id=tax_rate.tax_type_id';
                                    $qry_con=mysqli_query($CON, $sql_con) or die(mysqli_error($qry_con));
                                    while($row=mysqli_fetch_array($qry_con)){
                                        $tax_rate_id=$row['tax_rate_id'];
                                        $tax_name=$row['tax_name'];
                                        $tax_rate=$row['tax_rate'];
                                        $tax_type=$row['tax_type'];
                                    ?>
                                        <tr class="success">
                                            <td><?php echo $tax_rate_id; ?></td>
                                            <td><?php echo $tax_name; ?></td>
                                            <td><?php echo $tax_rate; ?></td>
                                            <td><?php echo $tax_type; ?></td>
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