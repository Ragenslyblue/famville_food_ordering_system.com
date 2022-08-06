<script type="text/javascript">
function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
}
</script>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Confirmed Orders</h2>   
                        
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <button onclick="exportTableToExcel('tblData', 'Confirmed Orders')" type="button" class="btn btn-primary" style="
    margin-left: 880px;
">Export Data</button>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                                  
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="tblData" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Date Time</th>
                                            <th>Order No.</th>
                                            <th>Order Type</th>
                                            <th>Table No.</th>
                                            <th>Items</th>
                                            <th>Quantity</th>
                                            <!--<th>Status</th>
                                            <th>Stock-In</th>-->
                                        </tr>
                                    </thead>
                      
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    /*$sql_sign='SELECT DISTINCT order_bill_out.order_num_id, order_bill_out.order_bill_out_id, order_bill_out.date_time, order_bill_out.order_num_id, order_bill_out.order_kitchen_id, order_kitchen.order_type_id, order_type.order_type, order_kitchen.table_number_id, order_kitchen.product_id, product.product_name, order_kitchen.order_quantity
                                        FROM order_bill_out
                                        INNER JOIN order_kitchen
                                        ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
                                        INNER JOIN order_type
                                        ON order_type.order_type_id=order_kitchen.order_type_id
                                        INNER JOIN product
                                        ON product.product_id=order_kitchen.product_id';*/
                                    $sql_sign='SELECT DISTINCT order_bill_out.order_num_id, order_bill_out.order_bill_out_id, order_bill_out.date_time, order_bill_out.order_num_id, order_bill_out.order_kitchen_id, order_kitchen.order_type_id, order_type.order_type, order_kitchen.table_number_id, order_kitchen.product_id, product.product_name, order_kitchen.order_quantity, table_number.table_number_id, table_number.table_number_capacity
                                        FROM order_bill_out
                                        INNER JOIN order_kitchen
                                        ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
                                        INNER JOIN order_type
                                        ON order_type.order_type_id=order_kitchen.order_type_id
                                        INNER JOIN product
                                        ON product.product_id=order_kitchen.product_id
                                        INNER JOIN table_number
                                        ON table_number.table_number_id=order_kitchen.table_number_id';
                                    $qry_sign=mysqli_query($CON, $sql_sign) or die(mysqli_error($qry_sign));
                                    $items='';
                                    while($row=mysqli_fetch_array($qry_sign)){
                                        $order_bill_out_id=$row['order_bill_out_id'];
                                        $date_time=$row['date_time'];
                                        $order_num_id=$row['order_num_id'];
                                        $order_type=$row['order_type'];
                                        $table_number_id=$row['table_number_id'];
                                        $product_name=$row['product_name'];
                                        $order_quantity=$row['order_quantity'];
                                        $table_number_capacity=$row['table_number_capacity'];
                                        
                                        global $val_orders; 
                                        foreach($qry_sign as $values_items){
                                            $val_items=$values_items['product_name'];
                                            $val_orders=$val_items.','.$val_orders;
                                        }
                                        $sql_value='SELECT DISTINCT order_bill_out.order_num_id FROM order_bill_out';
                                        $qry_value=mysqli_query($CON, $sql_value) or die(mysqli_error($qry_value));
                                        while($row=mysqli_fetch_array($qry_value)){
                                            $order_num_id2=$row['order_num_id'];
                                            
                                            /*if($table_number_id==0){
                                                $table_number_id2='Not-Seated';*/
                                         
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $date_time; ?></td>
                                            <td><?php echo $order_num_id2; ?></td>
                                            <td><?php echo $order_type; ?></td>
                                            <td class="center"><?php echo $table_number_capacity; ?></td>
                                            <td class="center"><?php echo $product_name; ?></td>
                                            <td class="center"><?php echo $order_quantity; ?></td>
                                            <!--<td class="center">X</td>
                                            <td class="center">X</td>-->
                                        </tr>
                                    <?php
                                            //}
                                        }
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
