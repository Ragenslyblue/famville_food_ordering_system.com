        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Stock Out Inventory</h2>   
                        
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
                                            <!--<th>Stock ID</th>-->
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Availability</th>
                                            <!--<th>Status</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    $sql='SELECT product.product_id, product.product_name, product.price, product.quantity, product.availability, product.product_num_id
                                        FROM product
                                        WHERE product.quantity<=0';
                                    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
                                    while($row=mysqli_fetch_array($qry)){
                                        $product_id=$row['product_id'];
                                        $product_name=$row['product_name'];
                                        $price=$row['price'];
                                        $quantity=$row['quantity'];
                                        $product_num_id=$row['product_num_id'];
                                        $availability=$row['availability'];
                                    ?>
                                        <tr class="odd gradeX">
                                            <!--<td><?php //echo $stock_num_id;?></td>-->
                                            <td><?php echo $product_num_id; ?></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td class="center"><?php echo $price; ?></td>
                                            <td class="center"><?php echo $quantity; ?></td>
                                            <td class="center"><?php echo $availability; ?></td>
                                            <!--<td class="center"><?php //echo $status_type; ?></td>-->
                                            <td class="center"><a href="<?php echo 'admin/stock_records_2.php?id='.$product_id; ?>" class="btn btn-primary">Update</a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>    
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
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
