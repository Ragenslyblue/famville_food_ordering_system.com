<?php
include('header.php');

$sub_total=mysqli_real_escape_string($CON, $_POST['sub_total']);
$billed_amount=mysqli_real_escape_string($CON, $_POST['billed_amount']);
$btn_place_order=mysqli_real_escape_string($CON, $_POST['btn_place_order']);
$order_num=mysqli_real_escape_string($CON, $_POST['order_num']);
$guest_id=mysqli_real_escape_string($CON, $_POST['guest_id']);
$guest_id_num=mysqli_real_escape_string($CON, $_POST['guest_id_num']);

$sql_guest='INSERT INTO `guest`(`guest_num_id`) 
    VALUES ("'.$guest_id_num.'")';
$qry_guest=mysqli_query($CON, $sql_guest) or die(mysqli_error($qry_guest));

$sql_select_guest='SELECT * FROM `guest`';
$qry_select_guest=mysqli_query($CON, $sql_select_guest) or die(mysqli_error($qry_select_guest));
while($row=mysqli_fetch_array($qry_select_guest)){
    $guest_id13=$row['guest_id'];
    $guest_num_id=$row['guest_num_id'];
}
echo $guest_id13;
echo $guest_id_num;

$action2='Un-Order';
if($btn_place_order=='Place Order'){
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
if($btn_place_order=='Place Order'){
    $unbump='unbump';
    $duration=40;

foreach($_POST['order_kitchen_id'] as $order_kitchen_id){
    echo $order_kitchen_id;

    foreach($_POST['cashier_id'] as $user_id5){
        echo $user_id5;
        
    $sql='INSERT INTO `order_bill_out`(order_num_id, user_id, `order_kitchen_id`, `sub_total`, `billed_amount`, guest_id, guest_id_num, action, duration) 
        VALUES ("'.$order_num.'", "'.$user_id5.'", "'.$order_kitchen_id.'", "'.$sub_total.'", "'.$billed_amount.'", "'.$guest_id.'", "'.$guest_id_num.'", "'.$unbump.'", "'.$duration.'")';
    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
        }
    }
}

?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">   
                        <h2>Thank you for Ordering...</h2>
                        <!--<button type="submit" name="btn_ok" value="OK" class="login100-form-btn">
							OK
						</button>-->
                        <a href="<?php echo $BASE_URL;?>index_mobile_app.php?page=area_select" class="btn btn-primary btn-lg" data-target="#myModal">Continue Order</a>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr/>
               
             <!-- /. PAGE INNER  -->
            </div>
<?php
include('footer.php');
?>