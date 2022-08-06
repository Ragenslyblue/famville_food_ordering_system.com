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
                     <h2>Add New Guest</h2>   
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
                                    <!--<h3>Basic Form Examples</h3>-->
                                    <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=save_add_new_guest" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="guest_num_id" value="<?php echo $id; ?>" />
                                         <div class="form-group">
                                            <label>Guest ID:</label>
                                            <input type="text" disabled="yes" value="<?php echo $id; ?>" class="form-control" placeholder="Guest First Name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" name="first_name" class="form-control" placeholder="Guest First Name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="text" name="last_name" class="form-control" placeholder="Guest Last Name"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <input type="text" name="address" class="form-control" placeholder="Guest Address"/>
                                        </div>
                                        
                                        <button type="submit" value="Add Guest" name="btn_add_guest" class="btn btn-default">Add Guest</button>

                                    </form>
                                    <br/>
                                      
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