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
                    
                    
                        <div class="panel-body" id="page">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Table Code</th>
                                            <th>Table No.</th>
                                            <th>Area Type</th>
                                            <th>No. of Seats</th>
                                            <!--<th>User</th>-->
                                            <th>Status</th>
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
                                    include('config.php');
                                    
                                    $sql_list='SELECT table_number.table_number_id, table_number.table_number_capacity, table_number.area_type_id, area_type.area_type, area_type.image, table_number.availability, table_number.table_code_num_id, table_number.number_of_seats
                                        FROM table_number
                                        INNER JOIN area_type
                                        ON area_type.area_type_id=table_number.area_type_id';
                                    $qry_list=mysqli_query($CON, $sql_list) or die(mysqli_error($qry_list));
                                    while($row=mysqli_fetch_array($qry_list)){
                                        $table_number_id=$row['table_number_id'];
                                        $table_number_capacity=$row['table_number_capacity'];
                                        $area_type_id=$row['area_type_id'];
                                        $area_type=$row['area_type'];
                                        $image=$row['image'];
                                        $availability=$row['availability'];
                                        $table_code_num_id=$row['table_code_num_id'];
                                        $number_of_seats=$row['number_of_seats'];
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $table_code_num_id; ?></td>
                                            <td><?php echo $table_number_capacity; ?></td>
                                            <td><?php echo $area_type; ?></td>
                                            <td class="center"><?php echo $number_of_seats?></td>
                                            <!--<td class="center"><?php //echo $first_name; ?></td>-->
                                            <td class="center"><?php echo $availability; ?></td>
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
                        <button type="button" onclick="print_content('page')" class="btn btn-primary" style="
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