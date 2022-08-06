<?php
include('config.php');

$sql_tbl_code='SELECT * FROM `table_code_num`';
$qry_tbl_code=mysqli_query($CON, $sql_tbl_code) or die(mysqli_error($qry_tbl_code));
while($row=mysqli_fetch_array($qry_tbl_code)){
    $table_code_num_id=$row['table_code_num_id'];
    $table_code_num=$row['table_code_num'];
}if(mysqli_num_rows($qry_tbl_code)==1){
    $sql_tbl_code2='SELECT * FROM `table_number`';
    $qry_tbl_code2=mysqli_query($CON, $sql_tbl_code2) or die(mysqli_error($qry_tbl_code2));
    $tbl_code=0;
    $table_number_capacity=0;
    while($row=mysqli_fetch_array($qry_tbl_code2)){
        $table_number_id=$row['table_number_id'];
        $table_code_num_id=$row['table_code_num_id'];
        $table_number_capacity=$row['table_number_capacity'];
        }
        $num_rows=mysqli_num_rows($qry_tbl_code2);
        $date=date('y');
        $add=$date.($num_rows+$table_code_num);
        $str=str_pad($add, 1, 3, STR_PAD_LEFT);
        $str_string='TBL-C';
        $tbl_code=$str_string.($str+1);
        //$tbl_code=$str.($table_number_capacity+1);
        
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Table Number</h2>   
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
                                    <!--<form action="<?php //echo $BASE_URL;?>index_admin.php?page=table_number_2" method="post" enctype="multipart/form-data">-->
                                    <form action="<?php echo $BASE_URL;?>index_admin.php?page=table_seating" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <!--<label>Table Code:</label>-->
                                            <input type="hidden" disabled="yes" value="<?php echo $tbl_code; ?>" class="form-control"/>
                                            <input type="hidden" name="tbl_code" value="<?php echo $tbl_code; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>No. of Tables:</label>
                                            <input type="text" name="tables_capacity" required="" class="form-control"/>
                                        </div>
                                        
                                        <div class="form-group">
                                                <label for="">Area Type:</label>
                                                <select id="" name="area_type_id" class="form-control">
                                                    <option value="0">Please select</option>
                                                    <?php
                                                    include('config.php');
                                                    $sql_areas='SELECT * FROM `area_type`';
                                                    $qry_areas=mysqli_query($CON, $sql_areas) or die(mysqli_error($qry_areas));
                                                    while($row=mysqli_fetch_array($qry_areas)){
                                                        $area_type_id=$row['area_type_id'];
                                                        $area_type=$row['area_type'];
                                                    ?>
                                                    <option value="<?php echo $area_type_id?>"><?php echo $area_type; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>No. of Seats:</label>
                                            <input type="text" name="number_of_seats" required="" class="form-control"/>
                                        </div>
                                                                              
                                        
                                        <button type="submit" name="btn_save" value="SAVE" class="btn btn-default">SAVE</button>

                                    </form>
                                    <br/>
                                      
    </div>
                                
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Table Number Lists
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Table Code</th>
                                            <th>Table No.</th>
                                            <th>Area Type</th>
                                            <th>Image</th>
                                            <th>No. of Seats</th>
                                            <th>Availability</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
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
                                        <tr class="success">
                                            <td><?php echo $table_code_num_id; ?></td>
                                            <td><?php echo $table_number_capacity; ?></td>
                                            <td><?php echo $area_type; ?></td>
                                            <td><img src="<?php echo './images_2/upload/'.$image; ?>" width="100" height="100" /></td>
                                            <td><?php echo $number_of_seats; ?></td>
                                            <td><?php echo $availability; ?></td>
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
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>