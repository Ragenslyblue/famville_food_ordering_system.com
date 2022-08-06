<?php
include('config.php');

if(isset($_POST['btn_save'])){
    $seating_number=mysqli_real_escape_string($CON, $_POST['seating_number']);
    
    $sql_dup='SELECT * FROM `chair` WHERE chair.chair_number_capacity="'.$seating_number.'"';
    $qry_dup=mysqli_query($CON, $sql_dup) or die(mysqli_error($qry_dup));
    
    if(mysqli_num_rows($qry_dup)==0){
    
    $sql='INSERT INTO `chair`(`chair_number_capacity`) 
        VALUES ("'.$seating_number.'")';
    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
    }
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Chair(Seats)</h2>   
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
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label><h3>Seating Number(Capacity):</h3></label>
                                            <input type="number" min="0" max="7" name="seating_number" class="form-control" placeholder="PLease Enter Keyword">
                                        </div>
                                    
                                        
                                        <button type="submit" name="btn_save" class="btn btn-default">SAVE</button>

                                    </form>
                                    <br>
                                      
                                 
    </div>
                                
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Chairs(Seats) List
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Seat ID</th>
                                            <th>Seat No.</th>
                                            <!--<th>Last Name</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    $sql='SELECT * FROM `chair`';
                                    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
                                    while($row=mysqli_fetch_array($qry)){
                                        $chair_id=$row['chair_id'];
                                        $chair_number_capacity=$row['chair_number_capacity'];
                                    ?>
                                        <tr class="success">
                                            <td><?php echo $chair_id; ?></td>
                                            <td><?php echo $chair_number_capacity; ?></td>
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
                <!--<div class="row">
                    <div class="col-md-12">
                        <h3>More Customization</h3>
                         <p>
                        For more customization for this template or its components please visit official bootstrap website i.e getbootstrap.com or <a href="http://getbootstrap.com/components/" target="_blank">click here</a> . We hope you will enjoy our template. This template is easy to use, light weight and made with love by binarycart.com 
                        </p>
                    </div>
                </div>-->
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>