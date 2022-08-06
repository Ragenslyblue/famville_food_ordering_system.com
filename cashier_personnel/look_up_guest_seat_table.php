<!-- BOOTSTRAP STYLES-->
<link href="../assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="../assets/css/font-awesome.css" rel="stylesheet" />
<!-- MORRIS CHART STYLES-->
<link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="../assets/css/custom.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../assets/css/css_table_image.css" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<?php
include('../config.php');
include('./header.php');
include('./side_bar.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
}

//$guest_name=mysqli_real_escape_string($CON, $_POST['guest_name']);

$sql='SELECT * FROM `guest` WHERE guest.first_name="'.$id.'" OR guest.last_name="'.$id.'" OR guest.guest_num_id="'.$id.'"';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
$first_name='';
$last_name='';
while($row=mysqli_fetch_array($qry)){
    $guest_id=$row['guest_id'];
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $guest_num_id=$row['guest_num_id'];
    $date_added=$row['date_added'];
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
<?php
/*include('config.php');
if($guest_name!=$first_name && $guest_name!=$last_name){
    echo '<h1 style="text-align: center;">Invalid...</h1>';
}else{*/

?>
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
                                    <form action="../index_cashier_personnel.php?page=tables" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Guest ID:</label>
                                            <label><?php echo $guest_num_id; ?></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Guest Name:</label>
                                            <label><?php echo $first_name.' '.$last_name; ?></label>
                                            <input type="hidden" name="guest_id" value="<?php echo $guest_id; ?>" />
                                        </div>
                                        <?php
                                        $hourdiff=-9;
                                        $site=date('l,  F d,  Y g:i a', time()+($hourdiff * 3600));
                                        //echo $site;
                                        
                                        ?>
                                        <div class="form-group">
                                            <label>Date & Time:</label>
                                            <label><?php echo $date_added; ?></label>
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
<?php
include('footer.php');
?>