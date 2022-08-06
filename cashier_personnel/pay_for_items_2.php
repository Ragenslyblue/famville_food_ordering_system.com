<link href="./image-picker/image-picker.css" rel="stylesheet"/>

<?php
include('config.php');

/*$sub_total=mysqli_real_escape_string($CON, $_POST['sub_total']);
$billed_amount=mysqli_real_escape_string($CON, $_POST['billed_amount']);
$btnAdd_to_order=mysqli_real_escape_string($CON, $_POST['btnAdd_to_order']);
//$order_num=mysqli_real_escape_string($CON, $_POST['order_num']);
$guest_id_num=mysqli_real_escape_string($CON, $_POST['guest_id_num']);
$order_kitchen_id=mysqli_real_escape_string($CON, $_POST['order_kitchen_id']);
$amount=mysqli_real_escape_string($CON, $_POST['amount']);

$action2='Un-Order';
if($btnAdd_to_order=='Pay'){
        $action2='Un-Order';
}
echo $action2;
foreach($_POST['order_kitchen_id'] as $order_kitchen_id){
    echo $order_kitchen_id;
    
    $sql_update='UPDATE `order_kitchen` SET `action`="'.$action2.'" 
        WHERE order_kitchen.order_kitchen_id="'.$order_kitchen_id.'"';  
    $qry_update=mysqli_query($CON, $sql_update) or die(mysqli_error($qry_update));
}

$unbump='unbump';
if($btnAdd_to_order=='Pay'){
    $unbump='unbump';
    $duration=40;


    $sql='INSERT INTO `order_bill_out`(`order_kitchen_id`, `sub_total`, `billed_amount`, action, duration) 
        VALUES ("'.$order_kitchen_id.'", "'.$sub_total.'", "'.$billed_amount.'", "'.$unbump.'", "'.$duration.'")';
    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
}
*/
$guest_id_num=mysqli_real_escape_string($CON, $_POST['guest_id_num']);
$amount=mysqli_real_escape_string($CON, $_POST['amount']);
$guest_num_id=mysqli_real_escape_string($CON, $_POST['guest_num_id']);
//$order_bill_out_id=mysqli_real_escape_string($CON, $_POST['order_bill_out_id']);
//$table_number_id3=mysqli_real_escape_string($CON, $_POST['table_number_id3']);
foreach($_POST['order_bill_out_id'] as $order_bill_out_id){
    echo $order_bill_out_id;
}
foreach($_POST['table_number_id3'] as $table_number_id3){
    echo $table_number_id3;
}
?>


<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Pay</h2>   
                       
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
                                    <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=pay_cash_2" method="post" enctype="multipart/form-data">
                                        
                                        <input type="hidden" name="table_number_id3[]" value="<?php echo $table_number_id3; ?>" />
                                        <input type="hidden" name="order_bill_out_id[]" value="<?php echo $order_bill_out_id; ?>" />    
                                                     
                                        <input type="hidden" name="guest_num_id" value="<?php echo $guest_num_id; ?>"/>
                                        <div class="form-group" style="
    display:  flex;
">
                                            <label>Total Bill:</label>
                                            <input type="text" name="total_bill" value="<?php echo $amount; ?>" class="form-control" placeholder="Total Bill"/>
                                        </div>
                                        <div class="form-group" style="
    display:  contents;
">
                                            <label>Cash</label>
                                        </div>
                                        
<style type="text/css">
            .thumbnails li img{
                width: 202px;
                height: 134px;
                background-color: #0000ce;
            }
            p{
                text-align: center;
            }
            /*.custom-class{
                background-color: #0000ce;
            }*/
            
</style>              

<div class="row7" style="display: inline-flex;">
<select name="money_amount_1" class="image-picker" multiple="">
  <optgroup label="">
  <option data-img-src="./images/image_money2.jpg"   
          data-img-label='Php <?php echo $amount=$amount; ?>'
          data-img-class="custom-class"
          data-img-alt="image alt"
          value='<?php echo $amount; ?>'><?php echo $amount; ?>
   </option>
  </optgroup>
</select>

<select name="money_amount_1" class="image-picker" multiple="">
  <optgroup label="">
  <option data-img-src="./images/image_money2.jpg"   
          data-img-label='Php <?php echo $amount2=$amount+6; ?>'
          data-img-class="custom-class"
          data-img-alt="image alt"
          value='<?php echo $amount2; ?>'><?php echo $amount2; ?>
   </option>
  </optgroup>
</select>

<select name="money_amount_1" class="image-picker" multiple="">
  <optgroup label="">
  <option data-img-src="./images/image_money2.jpg"   
          data-img-label='Php <?php echo $amount3=$amount+16?>'
          data-img-class="custom-class"
          data-img-alt="image alt"
          value='<?php echo $amount3; ?>'><?php echo $amount3; ?>
   </option>
  </optgroup>
</select>
</div>

<div class="form-group" style="
    display:  flex;
">
                                            <label>Other Cash Amount:</label>
                                            <input type="text" name="money_amount_1" value="" class="form-control" placeholder="Input Cash Amount"/>
                                        </div>

<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="./image-picker/image-picker.js"></script>
<script src="./image-picker/image-picker.min.js"></script>

<script>
$(".image-picker").imagepicker({

  // show/hide the regular select box
  hide_select: true,

  // show/hide image labels
  show_label: true,

  // callback functions
  initialized: undefined,
  changed: undefined,
  clicked: undefined,
  selected: undefined,

  // set the max number of selectable options 
  limit: undefined,

  // called when the limit cap has been reached
  limit_reached: undefined,

  // using Font Awesome icons instead
  font_awesome: false
  
})
</script>
                                        
                                        <!--<button type="button" style="
    padding: 30px;
" class="btn btn-primary btn-lg" data-target="#myModal">
                                          <?php //echo 'Php '.$amount=$billed_amount+1; ?>
                                        </button>
                                        <button style="
    padding: 30px;
" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                          Php <?php //echo $amount2=$billed_amount+6; ?>
                                        </button>
                                        <button style="
    padding: 30px;
    margin-left: 110px;
    margin-top: 5px;
" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                          Php <?php //echo $amount3=$billed_amount+26;?>
                                        </button>-->
                                        
                                        <!--<a href="<?php //echo 'cashier_personnel/more_cash_amount.php?id='.$order_num; ?>" style="
    margin-left: 478px;
    margin-top: -345px;
    padding: 72px;
" class="btn btn-primary btn-lg" data-target="#myModal">More Cash Amount</a>-->
                                        
                                    <!--<a href="<?php //echo $BASE_URL;?>index_cashier_personnel.php?page=pay_cash" style="
    margin-left: 100px;
    padding: 40px;
" class="btn btn-danger btn-lg">Pay Cash</a>-->
                            <button type="submit" style="
    margin-left: 100px;
    padding: 40px;
" class="btn btn-danger btn-lg" name="btn_pay_cash" value="Pay Cash">Pay Cash</button>
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