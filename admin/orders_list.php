<?php
include('config.php');
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Orders List</h2>   
                        
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Bill No.</th>
                                            <th>Table No.</th>
                                            <th>Area</th>
                                            <th>User</th>
                                            <th>Date</th>
                                            <th>Guest ID</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <button type="button" class="btn btn-primary" style="
    float: right;
    margin-top: 30px;
    /* margin-left: 170px; */
    margin-right: 380px;
">Export Excel</button>
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    
                                    $sql='SELECT * FROM `product`';
                                    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
                                    while($row=mysqli_fetch_array($qry)){
                                        $product_id=$row['product_id'];
                                        $product_name=$row['product_name'];
                                        $product_num_id=$row['product_num_id'];
                                        $price=$row['price'];
                                        $quantity=$row['quantity'];
                                        $availability=$row['availability'];
                                        $date_added=$row['date_added'];
                                        
                                        $id='';
                                        if($quantity<=10){
                                            $id='isLess';
                                        }  
                                    ?>
                                        <tr id="<?php echo $id; ?>" class="odd gradeX">
                                            <td><a href="#" class="btn btn-warning">Open Bill ID 01</a></td>
                                            <td><?php echo $product_num_id; ?></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td class="center"><?php echo $price; ?></td>
                                            <td class="center"><?php echo $quantity; ?></td>
                                            <td class="center"><?php echo $availability; ?></td>
                                            <td class="center"><?php echo $availability; ?></td>
                                            <td class="center"><a href="<?php echo 'admin/stock_records_2.php?id='.$product_id; ?>" class="btn btn-primary">Edit</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>    
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <style type="text/css">
                    #isLess{background-color: red;}
                    </style>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
            
                <!-- /. ROW  -->
        </div>
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
