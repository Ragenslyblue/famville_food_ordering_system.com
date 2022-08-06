<?php 
include('config.php');

@$stock_id2=mysqli_real_escape_string($CON, $_POST['stock_id2']);
@$product_id2=mysqli_real_escape_string($CON, $_POST['product_id2']);
@$stock_quantity=mysqli_real_escape_string($CON, $_POST['stock_quantity']);
@$quantity=mysqli_real_escape_string($CON, $_POST['quantity']);
@$btn_add=mysqli_real_escape_string($CON, $_POST['btn_add']);
@$status_id=mysqli_real_escape_string($CON, $_POST['status_id']);

/*if($btn_add=='ADD'){
    $action='Available';
}*/
if($status_id==1){
    $stats='Available';
}elseif($status_id==2){
    $stats='Not-Available';
}else{
    $stats='Available';
}

@$value_add=$stock_quantity+$quantity;

$sql_dup='SELECT * FROM `stock` WHERE stock.stock_num_id="'.$stock_id2.'"';
$qry_dup=mysqli_query($CON, $sql_dup) or die(mysqli_error($qry_dup));
if(mysqli_num_rows($qry_dup)==0){
    
$sql_ins2='INSERT INTO `stock`(`stock_num_id`, `product_id`, `stocks`, `begin_inv`) 
    VALUES ("'.$stock_id2.'", "'.$product_id2.'", "'.$stock_quantity.'", "'.$quantity.'")';
$qry_ins2=mysqli_query($CON, $sql_ins2) or die(mysqli_error($qry_ins2));
}

$sql_update='UPDATE `product` SET `quantity`="'.$value_add.'", `status_type_id`="'.$status_id.'",`availability`="'.$stats.'" 
    WHERE  product.product_id="'.$product_id2.'"';
$qry_update=mysqli_query($CON, $sql_update) or die(mysqli_error($qry_update));
?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Stock-In</h2>   
                        
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
                                            <th>Date</th>
                                            <th>Stock ID</th>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Beginning Inv.</th>
                                            <th>Availability</th>
                                            <!--<th>Status</th>-->
                                            <th>Stock-In</th>
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
                                    $sql='SELECT stock.stock_id, stock.stock_num_id, stock.product_id, product.product_num_id, product.product_name, product.price, product.quantity, product.availability, product.status_type_id, status_type.status_type, stock.stocks, stock.date_added, stock.begin_inv 
                                        FROM stock
                                        INNER JOIN product
                                        ON product.product_id=stock.product_id
                                        INNER JOIN status_type
                                        ON status_type.status_type_id=product.status_type_id';
                                    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
                                    while($row=mysqli_fetch_array($qry)){
                                        $stock_id=$row['stock_id'];
                                        $stock_num_id=$row['stock_num_id'];
                                        $product_name=$row['product_name'];
                                        $price=$row['price'];
                                        $quantity=$row['quantity'];
                                        $availability=$row['availability'];
                                        $status_type=$row['status_type'];
                                        $stocks=$row['stocks'];
                                        $product_num_id=$row['product_num_id'];
                                        $date_added=$row['date_added'];
                                        $begin_inv=$row['begin_inv'];
                                        //$_SESSION=$quantity;
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $date_added; ?></td>
                                            <td><?php echo $stock_num_id; ?></td>
                                            <td><?php echo $product_num_id; ?></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td class="center"><?php echo $price; ?></td>
                                            <td class="center"><?php echo $begin_inv; ?></td>
                                            <td class="center"><?php echo $availability; ?></td>
                                            <!--<td class="center"><?php //echo $status_type; ?></td>-->
                                            <td class="center"><?php echo $stocks; ?></td>
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
<?php
//session_destroy();
?>