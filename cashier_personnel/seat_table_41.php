<?php
include('config.php');

$sql='SELECT * FROM `guest_num`';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
while($row=mysqli_fetch_array($qry)){
    $guest_num_id=$row['guest_num_id'];
    $guest_num=$row['guest_num'];
}if(mysqli_num_rows($qry)==1){
    $sql2='SELECT * FROM `guest`';
    $qry2=mysqli_query($CON, $sql2) or die(mysqli_error($qry2));
    
    $num_rows=mysqli_num_rows($qry2);
    $date=date('y');
    $add=$date.($num_rows+$guest_num);
    $str=str_pad($add, 1, 4, STR_PAD_LEFT);
    $id=$str+1;
}

?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Seat Table</h2>   
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
                                    <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=tables" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Guest ID:</label>
                                            <label><?php echo $id; ?></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Guest Name:</label>
                                            <label><?php echo $first_name.' '.$last_name; ?></label>
                                            <input type="text" name="guest_name" value="" />
                                            <input type="hidden" name="guest_id" value="<?php echo $guest_id; ?>" />
                                        </div>
                                        <?php
                                        $hourdiff=-9;
                                        $site=date('l,  F d,  Y g:i a', time()+($hourdiff * 3600));
                                        //echo $site;
                                        
                                        ?>
                                        <div class="form-group">
                                            <label>Date & Time:</label>
                                            <label><?php echo $site; ?></label>
                                            <input type="hidden" name="date_time" value="<?php echo $site; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Guests Number Seating:</label>
                                            <input type="number" name="guest_number_seating" min="0" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label>Area Type</label>
                                            <select name="area_type_id" class="form-control">
                                                <option value="0">Please Select Area</option>
                                                <?php
                                                include('config.php');
                                                $sql_area='SELECT * FROM `area_type`';
                                                $qry_area=mysqli_query($CON, $sql_area);
                                                while($row=mysqli_fetch_array($qry_area)){
                                                    $area_type_id=$row['area_type_id'];
                                                    $area_type=$row['area_type'];
                                               ?>
                                                <option value="<?php echo $area_type_id; ?>"><?php echo $area_type; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        
                                        <button type="submit" name="btn_go" value="GO" class="btn btn-default">GO</button>
                                        
                                    </form>
                                      
    </div>
                                
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>