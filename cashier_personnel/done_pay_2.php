<?php
include('config.php');

//$order_bill_out=mysqli_real_escape_string($CON, $_POST['order_bill_out']); 
$change_due=mysqli_real_escape_string($CON, $_POST['change_due']);
@$btn_done_pay=mysqli_real_escape_string($CON, $_POST['btn_done_pay']);
@$payment_1=mysqli_real_escape_string($CON, $_POST['payment_1']);
$order_num_id=mysqli_real_escape_string($CON, $_POST['order_num_id']);

if($btn_done_pay=='Done Pay'){
    $stats='Paid';
}else{
    $stats='Unpaid';
}
if($btn_done_pay=='Done Pay'){
    $availability='Available';
}

$sql_payment_type='SELECT * FROM `payment_type` 
    WHERE payment_type.payment_type="Cash"';
$qry_payment_type=mysqli_query($CON, $sql_payment_type) or die(mysqli_error($qry_payment_type));
while($row=mysqli_fetch_array($qry_payment_type)){
    $payment_type_id=$row['payment_type_id'];
    $payment_type=$row['payment_type'];
}

foreach($_POST['table_number_id'] as $table_number_id13){
    echo $table_number_id13;
    
    $sql_tables='UPDATE `table_number` SET `availability`="'.$availability.'" 
        WHERE table_number.table_number_id="'.$table_number_id13.'"';
    $qry_tables=mysqli_query($CON, $sql_tables) or die(mysqli_error($qry_tables));
}

foreach($_POST['order_bill_out'] as $order_bill_out){
    echo $order_bill_out;
    
    $sql_ins='INSERT INTO `receipt`(`order_bill_out_id`, `payment_type_id`, `change_due`, payment_amount, status) 
        VALUES ("'.$order_bill_out.'", "'.$payment_type_id.'", "'.$change_due.'", "'.$payment_1.'", "'.$stats.'")';
    $qry_ins=mysqli_query($CON, $sql_ins) or die(mysqli_error($qry_ins));
}
?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Receipt</h2>   
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>
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
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label><h3 style="color: blue;">Php <?php echo $payment_value=number_format($payment_1); ?></h3></label>&nbsp;&nbsp;
                                            <label><h3>Payment Successful</h3></label>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label><h3 style="color: red;">Php <?php echo $change_due3=number_format($change_due); ?></h3></label>&nbsp;&nbsp;
                                            <label><h3>Change Due</h3></label>
                                        </div>
                                        
<!--<button style="padding: 72px;" class="btn btn-primary btn-lg" data-target="#myModal">Print Customer Receipt</button>-->
<a href="<?php echo 'cashier_personnel/invoice_format.php?id='.$order_num_id; ?>" target="_blank" style="padding: 72px;" class="btn btn-primary btn-lg" data-target="#myModal">Print Customer Receipt</a>
<br /><br />
<!--<button style="
    margin-left: 100px;
    padding: 40px;
" class="btn btn-danger btn-lg">Done</button>-->
<a href="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=home" style="
    margin-left: 100px;
    padding: 40px;
" class="btn btn-danger btn-lg">Done</a>
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