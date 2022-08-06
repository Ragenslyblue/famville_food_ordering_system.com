        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Monitor Ordered Items</h2>   
                        
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
                                            <th>Beginning Inv.</th>
                                            <!--<th>Stock-In</th>
                                            <th>Total Inv.</th>-->
                                            <th>Category</th>
                                            <th>Sold</th>
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
                                    $sql_monitor='SELECT stock.stock_id, stock.stock_num_id, stock.product_id, product.product_num_id, product.product_name, product.price, product.quantity, product.availability, product.status_type_id, status_type.status_type, stock.stocks, product.category_id, category.category_type
                                        FROM stock
                                        INNER JOIN product
                                        ON product.product_id=stock.product_id
                                        INNER JOIN status_type
                                        ON status_type.status_type_id=product.status_type_id
                                        INNER JOIN category
                                        ON category.category_id=product.category_id';
                                    $qry_monitor=mysqli_query($CON, $sql_monitor) or die(mysqli_error($qry_monitor));
                                    while($row=mysqli_fetch_array($qry_monitor)){
                                        $stock_id=$row['stock_id'];
                                        $stock_num_id=$row['stock_num_id'];
                                        $product_id=$row['product_id'];
                                        $product_name=$row['product_name'];
                                        $price=$row['price'];
                                        $quantity=$row['quantity'];
                                        $availability=$row['availability'];
                                        $status_type=$row['status_type'];
                                        $stocks=$row['stocks'];
                                        $category_type=$row['category_type'];
                                        $product_num_id=$row['product_num_id'];
                                        
                                        global $total;
                                        
                                        $total=$quantity+$stocks;
                                    }
                                    /*$sql_mon='SELECT order_kitchen.order_kitchen_id, order_kitchen.product_id, product.product_name, order_kitchen.order_quantity
                                        FROM order_kitchen
                                        INNER JOIN product
                                        ON product.product_id=order_kitchen.product_id
                                        WHERE order_kitchen.product_id="'.$product_id.'"';*/
                                    $sql_mon='SELECT order_kitchen.order_kitchen_id, order_kitchen.product_id, product.product_name, order_kitchen.order_quantity
                                        FROM order_kitchen
                                        INNER JOIN product
                                        ON product.product_id=order_kitchen.product_id';
                                    $qry_mon=mysqli_query($CON, $sql_mon) or die(mysqli_error($qry_mon));
                                    global $order_quantity;
                                    while($row=mysqli_fetch_array($qry_mon)){
                                        $order_kitchen_id=$row['order_kitchen_id'];
                                        $order_quantity=$row['order_quantity'];                                                                                
                                   
                                    ?>
                                        <tr class="odd gradeX">
                                            <!--<td><?php //echo $stock_num_id; ?></td>-->
                                            <td><?php echo $product_num_id; ?></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td class="center"><?php echo $price; ?></td>
                                            <td class="center"><?php echo $quantity; ?></td>
                                            <!--<td class="center"><?php //echo $stocks; ?></td>
                                            <td class="center"><?php //echo $total; ?></td>-->
                                            <td class="center"><?php echo $category_type; ?></td>
                                            <td class="center"><?php echo $order_quantity; ?></td>
                                        </tr>
                                    <?php
                                        }
                                    //}
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
