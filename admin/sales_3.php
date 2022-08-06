        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <form action="" method="post" enctype="multipart/form-data">
                    
                    
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Receipt No.</th>
                                            <th>Guest ID</th>
                                            <th>Date</th>
                                            <th>Order Type</th>
                                            <th>User</th>
                                            <th>Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <button type="button" class="btn btn-primary" style="
    float: right;
    margin-top: 30px;
    /* margin-left: 170px; */
    margin-right: 380px;
">Export Excel</button>
<!--<button type="button" class="btn btn-primary" style="
    float: right;
    margin-top: 30px;
    /* margin-left: 170px; */
    margin-right: 30px;
">Print PDF</button>-->

                                    <tbody>
                                    <?php
                                    include('config.php');
                                    
                                    $sql_sales='SELECT DISTINCT order_bill_out.order_num_id, order_bill_out.action, order_bill_out.guest_id, guest.guest_num_id, order_bill_out.date_time, order_kitchen.order_type_id, order_type.order_type, order_kitchen.user_id, user.first_name, user.last_name, order_bill_out.billed_amount
                                        FROM order_bill_out
                                        LEFT JOIN guest
                                        ON guest.guest_id=order_bill_out.guest_id
                                        LEFT JOIN order_kitchen
                                        ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
                                        LEFT JOIN order_type
                                        ON order_type.order_type_id=order_kitchen.order_type_id
                                        LEFT JOIN user
                                        ON user.user_id=order_kitchen.user_id
                                        WHERE order_bill_out.action="bump" 
                                        ORDER BY order_bill_out.order_num_id ASC';
                                    $qry_sales=mysqli_query($CON, $sql_sales) or die(mysqli_error($qry_sales));
                                    while($row=mysqli_fetch_array($qry_sales)){
                                        //$receipt_id=$row['receipt_id'];
                                        $guest_num_id=$row['guest_num_id'];
                                        $date_time=$row['date_time'];
                                        $order_type=$row['order_type'];
                                        $first_name=$row['first_name'];
                                        $last_name=$row['last_name'];
                                        $billed_amount=$row['billed_amount'];
                                        //$status=$row['status'];
                                        $order_num_id=$row['order_num_id'];
                                    } 
                                    /*$sql_dup='SELECT DISTINCT order_bill_out.order_num_id, order_bill_out.billed_amount, order_bill_out.action
                                        FROM order_bill_out
                                        WHERE order_bill_out.action="bump"
                                        ORDER BY order_bill_out.order_num_id ASC';*/
                                    $sql_dup='SELECT DISTINCT order_bill_out.order_num_id, order_bill_out.billed_amount, order_bill_out.action, order_bill_out.guest_id, guest.guest_num_id
                                        FROM order_bill_out
                                        LEFT JOIN guest
                                        ON guest.guest_id=order_bill_out.guest_id
                                        WHERE order_bill_out.action="bump" OR guest.guest_num_id
                                        ORDER BY guest.guest_num_id DESC';
                                    $qry_dup=mysqli_query($CON, $sql_dup) or die(mysqli_error($qry_dup));
                                    while($row=mysqli_fetch_array($qry_dup)){
                                        $order_num_id2=$row['order_num_id'];
                                        $action=$row['action'];
                                        $billed_amount2=$row['billed_amount'];
                                        $guest_id=$row['guest_id'];
                                        $guest_num_id7=$row['guest_num_id'];
                                        
                                    /*$sql_guest_num='SELECT DISTINCT guest.guest_num_id, order_bill_out.guest_id
                                            FROM order_bill_out
                                            INNER JOIN guest
                                            ON guest.guest_id=order_bill_out.guest_id
                                            WHERE guest.guest_num_id="'.$guest_num_id7.'"';
                                    $qry_guest_num=mysqli_query($CON, $sql_guest_num) or die(mysqli_error($qry_guest_num));
                                    while($row=mysqli_fetch_array($qry_guest_num)){
                                            $guest_num_id3=$row['guest_num_id'];
                                            $guest_id3=$row['guest_id'];*/
                                            
                                        if($action=='bump'){
                                            $value_stats='Completed';
                                        }else{
                                            $value_stats='Not-Completed';
                                        }
                                        /*if($guest_num_id7==0){
                                            $guest_num_id4='';
                                        }else{
                                            $guest_num_id4=$guest_num_id7;
                                        }*/
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $order_num_id2; ?></td>
                                            <td><?php echo $guest_num_id7; ?></td>
                                            <td><?php echo $date_time; ?></td>
                                            <td class="center"><?php echo $order_type; ?></td>
                                            <td class="center"><?php echo $first_name; ?></td>
                                            <td class="center"><?php echo $billed_amount2; ?></td>
                                            <td class="center"><?php echo $value_stats; ?></td>
                                            <td class="center"><a href="<?php //echo 'admin/stock_records_2.php?id='.$product_id; ?>" class="btn btn-primary">Edit</a></td>
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