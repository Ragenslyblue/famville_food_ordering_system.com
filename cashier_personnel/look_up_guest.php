        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Look-Up Guest</h2>   
                        
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
                                            <th>Guest ID</th>
                                            <th>Date</th>
                                            <th>Guest First Name</th>
                                            <th>Guest Last Name</th>
                                            <th>Guest Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    $sql='SELECT * FROM `guest`';
                                    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
                                    while($row=mysqli_fetch_array($qry)){
                                        $guest_id=$row['guest_id'];
                                        $first_name=$row['first_name'];
                                        $last_name=$row['last_name'];
                                        $address=$row['address'];
                                        $guest_num_id=$row['guest_num_id'];
                                        $date_added=$row['date_added'];
                                    
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $guest_num_id; ?></td>
                                            <td><?php echo $date_added; ?></td>
                                            <td><?php echo $first_name; ?></td>
                                            <td class="center"><?php echo $last_name; ?></td>
                                            <td class="center"><?php echo $address; ?></td>
                                            <td class="center">
                                            <?php
                                            $sql_guest='SELECT guest_seated.guest_seated_id, guest_seated.table_number_id, table_number.table_number_capacity, guest_seated.num_guest_id, num_guests.num_guests, guest_seated.guest_id, guest.guest_num_id, guest.first_name, guest.last_name, guest.address, guest.date_added
                                                FROM guest_seated
                                                INNER JOIN table_number
                                                ON table_number.table_number_id=guest_seated.table_number_id
                                                INNER JOIN num_guests
                                                ON num_guests.num_guests_id=guest_seated.num_guest_id
                                                INNER JOIN guest
                                                ON guest.guest_id=guest_seated.guest_id
                                                WHERE guest.guest_num_id="'.$guest_num_id.'"';
                                            $qry_guest=mysqli_query($CON, $sql_guest) or die(mysqli_error($qry_guest));
                                            while($row=mysqli_fetch_array($qry_guest)){
                                                $guest_seated_id=$row['guest_seated_id'];
                                                $table_number_capacity=$row['table_number_capacity'];
                                                
                                                }
                                            
                                                include('config.php');
                                                
                                                if(mysqli_num_rows($qry_guest)==0){
                                                    echo '';
                                                }else{
                                            ?>
                                            <a href="<?php echo 'cashier_personnel/look_up_guest_seat_table.php?id='.$guest_num_id; ?>" class="btn btn-primary">Select</a>
                                            <?php
                                            }
                                            ?>    
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
    <script src="./assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="./assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="./assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="./assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="./assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="./assets/js/custom.js"></script>
    
   
</body>
</html>
