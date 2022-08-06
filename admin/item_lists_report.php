<script type="text/javascript">
function print_content(el){
    var restore_page=document.body.innerHTML;
    var print_content=document.getElementById(el).innerHTML;
    document.body.innerHTML=print_content;
    window.print();
    document.body.innerHTML=restore_page;
}
</script>
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
                    
                    
                        <div class="panel-body" id="page1">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <!--<th>User</th>-->
                                            <th>Date Added</th>
                                            <!--<th>Status</th>-->
                                            <!--<th>Action</th>-->
                                        </tr>
                                    </thead>
                                    <!--<button type="button" onclick="print_content('page-wrap')" class="btn btn-primary" style="
    float: right;
    margin-top: 30px;
    /* margin-left: 170px; */
    margin-right: 380px;
">Print Report</button>-->
<!--<button type="button" class="btn btn-primary" style="
    float: right;
    margin-top: 30px;
    /* margin-left: 170px; */
    margin-right: 30px;
">Print PDF</button>-->

                                    <tbody>
                                     <?php
                                    $sql_product='SELECT product.product_id, product.product_num_id, product.product_name, product.price, product.image, product.category_id, category.category_type, product.status_type_id, status_type.status_type, product.availability, product.date_added
                                        FROM product
                                        INNER JOIN category
                                        ON category.category_id=product.category_id
                                        INNER JOIN status_type
                                        ON status_type.status_type_id=product.status_type_id
                                        ORDER BY product.product_num_id DESC';
                                    $qry_product=mysqli_query($CON, $sql_product) or die(mysqli_error($qry_product));
                                    while($row=mysqli_fetch_array($qry_product)){
                                        $product_id=$row['product_id'];
                                        $product_num_id=$row['product_num_id'];
                                        $product_name=$row['product_name'];
                                        $price=$row['price'];
                                        $image=$row['image'];
                                        $category_type=$row['category_type'];
                                        $status_type=$row['status_type'];
                                        $availability=$row['availability'];
                                        $date_added=$row['date_added'];
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $product_num_id; ?></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td class="center"><?php echo $category_type; ?></td>
                                            <!--<td class="center"><?php //echo $first_name; ?></td>-->
                                            <td class="center"><?php echo $date_added; ?></td>
                                            <!--<td class="center"><?php //echo $value_stats; ?></td>-->
                                            <!--<td class="center"><a href="<?php //echo 'admin/stock_records_2.php?id='.$product_id; ?>" class="btn btn-primary">Edit</a></td>-->
                                        </tr>
                                    <?php
                                    }
                                    ?>  
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <button type="button" onclick="print_content('page1')" class="btn btn-primary" style="
    float: right;
    margin-top: -50px;
    /* margin-left: 170px; */
    margin-right: 500px;
">Print Report</button>
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