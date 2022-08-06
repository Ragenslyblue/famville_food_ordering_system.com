<?php
//include('header.php');

/*$sub_total=mysqli_real_escape_string($CON, $_POST['sub_total']);
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
*/
?>
<?php
//session_start();
include('config.php');
include('header.php');

$sql_order_num='SELECT * FROM `order_num`';
$qry_order_num=mysqli_query($CON, $sql_order_num) or die(mysqli_error($qry_order_num));
while($row=mysqli_fetch_array($qry_order_num)){
    $order_num_id=$row['order_num_id'];
    $order_num=$row['order_num'];
}if(mysqli_num_rows($qry_order_num)==1){
    $sql_order_num='SELECT * FROM `order_bill_out`';
    $qry_order_num=mysqli_query($CON, $sql_order_num) or die(mysqli_error($qry_order_num));
    
    $num_rows3=mysqli_num_rows($qry_order_num);
    $date=date('y');
    $adds=$date.($num_rows3+$order_num);
    $str_id=str_pad($adds, 1, 1, STR_PAD_LEFT);
    $order_num=$str_id+1;
}

@$btnAdd_to_order=mysqli_real_escape_string($CON, $_POST['btnAdd_to_order']);
@$id_nums=mysqli_real_escape_string($CON, $_POST['id_nums']);
@$product_id=mysqli_real_escape_string($CON, $_POST['product_id']);
@$order_quantity=mysqli_real_escape_string($CON, $_POST['order_quantity']);
@$order_type=mysqli_real_escape_string($CON, $_POST['order_type']);

/*$sql_tabs='SELECT * FROM `table_number`';
$qry_tabs=mysqli_query($CON, $sql_tabs) or die(mysqli_error($qry_tabs));
while($row=mysqli_fetch_array($qry_tabs)){
    $table_number_id=$row['table_number_id'];
    $table_code_num_id=$row['table_code_num_id'];*/
    
    /*$sql_val_tables='SELECT table_nums.table_nums_id, table_nums.table_number_id, table_number.table_code_num_id, table_nums.status
        FROM table_nums
        INNER JOIN table_number
        ON table_number.table_number_id=table_nums.table_number_id
        WHERE table_number.table_code_num_id="'.$table_code_num_id.'" AND table_nums.status="Occupied"';*/
    
    $sql_val_tables='SELECT table_nums.table_nums_id, table_nums.table_number_id, table_number.table_code_num_id, table_nums.status
        FROM table_nums
        INNER JOIN table_number
        ON table_number.table_number_id=table_nums.table_number_id
        WHERE table_nums.status="Occupied"';
    $qry_val_tables=mysqli_query($CON, $sql_val_tables) or die(mysqli_error($qry_val_tables));
    while($row=mysqli_fetch_array($qry_val_tables)){
        $table_number_id2=$row['table_number_id'];
        $table_code_num_id2=$row['table_code_num_id'];
        $status2=$row['status'];
        
        $num_guests=mysqli_num_rows($qry_val_tables);
        if($status2=='Occupied'){
            $value_num_guests=$num_guests;
        }
        
        $sql_guest_seated='SELECT guest_seated.guest_seated_id, guest_seated.guest_id, guest.guest_num_id, guest.first_name, guest.last_name, guest.address, guest.date_added, guest_seated.num_guest_id, num_guests.num_guests, guest_seated.table_number_id, table_number.table_number_id, table_number.table_code_num_id, guest_seated.date_seated, guest_seated.status, guest_seated.action
            FROM guest_seated
            INNER JOIN guest
            ON guest.guest_id=guest_seated.guest_id
            INNER JOIN num_guests
            ON num_guests.num_guests_id=guest_seated.num_guest_id
            INNER JOIN table_number
            ON table_number.table_number_id=guest_seated.table_number_id
            WHERE table_number.table_code_num_id="'.$table_code_num_id2.'"';
        $qry_guest_seated=mysqli_query($CON, $sql_guest_seated) or die(mysqli_error($qry_guest_seated));
        while($row=mysqli_fetch_array($qry_guest_seated)){
            $guest_seated_id=$row['guest_seated_id'];
            $guest_id=$row['guest_id'];
            $guest_num_id=$row['guest_num_id'];
            $first_name=$row['first_name'];
            $last_name=$row['last_name'];
            $num_guest_id=$row['num_guest_id'];
            $table_number_id3=$row['table_number_id'];
            $table_code_num_id3=$row['table_code_num_id'];
            
            $sql_user='SELECT assigned_tables.assigned_tables_id, assigned_tables.area_type_id, area_type.area_type, assigned_tables.user_id, user.user_name, user.first_name, user.last_name, assigned_tables.table_number_id, table_number.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, table_number.status, assigned_tables.status
                FROM assigned_tables
                INNER JOIN area_type
                ON area_type.area_type_id=assigned_tables.area_type_id
                INNER JOIN user
                ON user.user_id=assigned_tables.user_id
                INNER JOIN table_number
                ON table_number.table_number_id=assigned_tables.table_number_id
                WHERE table_number.table_code_num_id="'.$table_code_num_id3.'"';
            $qry_user=mysqli_query($CON, $sql_user) or die(mysqli_error($qry_user));
            while($row=mysqli_fetch_array($qry_user)){
                $assigned_tables_id=$row['assigned_tables_id'];
                $user_id=$row['user_id'];
                $table_number_capacity=$row['table_number_capacity'];
                $status=$row['status'];
                $first_name=$row['first_name'];
                $last_name=$row['last_name'];
                $user_name=$row['user_name'];
            }
        }
    }
//}
echo $guest_num_id;
echo $guest_id;
echo $user_id;
echo $table_number_id2;

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
    $guest_id_num=$str+1;
}

$sql_prod='SELECT product.product_id, product.product_name, product.category_id, category.category_type, product.quantity, product.status_type_id, status_type.status_type, product.availability
    FROM product
    INNER JOIN category
    ON category.category_id=product.category_id
    INNER JOIN status_type
    ON status_type.status_type_id=product.status_type_id
    WHERE product.product_id="'.$product_id.'"';
$qry_prod=mysqli_query($CON, $sql_prod) or die(mysqli_error($qry_prod));
$number_val='';
$stats='';
$values='';
$product_id2='';
while($row=mysqli_fetch_array($qry_prod)){
    $product_id2=$row['product_id'];
    $product_name=$row['product_name'];
    $category_type=$row['category_type'];
    $quantity=$row['quantity'];
    $status_type=$row['status_type'];
    $availability=$row['availability'];
    
    $minus=number_format(round($quantity-$order_quantity),0);

//global $number_val;

if($minus<0){
    $number_val=0;
}elseif($minus>0){
    $number_val=$minus;
}
echo $minus;

if($minus<0 || $minus==0){
    $values='Not-Available';
}elseif($minus>0){
    $values='Available';
}

if($minus<0 || $minus==0){
    $stats=2;
}elseif($minus>0){
    $stats=1;
}

    
if($category_type=='Drinks' || $category_type=='drinks'){
    $order_status='Drinks';
}elseif($category_type!='Drinks' || $category_type!='drinks'){
    $order_status='Foods';
}else{
    $order_status='Null';
}

}

if($btnAdd_to_order=='Add to Order'){
    $btnAdd_to_order2='Order';

$sql_order_kitchen='INSERT INTO `order_kitchen`(`order_type_id`, `table_number_id`, `num_guests_id`, `product_id`, `order_quantity`, `user_id`, `status`, `action`) 
    VALUES ("'.$order_type.'", "'.$table_number_id2.'", "'.$num_guest_id.'", "'.$product_id2.'", "'.$order_quantity.'", "'.$user_id.'", "'.$order_status.'", "'.$btnAdd_to_order2.'")';
$qry_order_kitchen=mysqli_query($CON, $sql_order_kitchen) or die(mysqli_error($qry_order_kitchen));
}

$sql_update='UPDATE `product` SET `quantity`="'.$number_val.'",`status_type_id`="'.$stats.'",`availability`="'.$values.'" 
    WHERE product.product_id="'.$product_id2.'"';
$qry_update=mysqli_query($CON, $sql_update) or die(mysqli_error($qry_update));


$sql_cashier='SELECT user.user_id, user.user_name, user.password, user.first_name, user.last_name, user.user_group_id, user_groups.user_groups
    FROM user
    INNER JOIN user_groups
    ON user_groups.user_groups_id=user.user_group_id
    WHERE user_groups.user_groups="cashier"';
$qry_cashier=mysqli_query($CON, $sql_cashier) or die(mysqli_error($qry_cashier));
while($row=mysqli_fetch_array($qry_cashier)){
    $user_id7=$row['user_id'];
    $user_groups=$row['user_groups'];
    $first_name2=$row['first_name'];
    $last_name2=$row['last_name'];
}
if($user_groups=='cashier'){
    $user_id4=$user_id7;
}

?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Review Your Orders</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       <?php //echo $first_name.' '.$last_name;?>
                       <?php //echo $first_name2.' '.$last_name2; ?>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <form action="<?php echo $BASE_URL;?>index_mobile_app.php?page=thank_you_action" method="post" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">
                        </div>-->
                        
                        <input type="hidden" name="order_num" value="<?php echo $order_num; ?>" />
                        <input type="hidden" name="guest_id" value="<?php echo $guest_id; ?>" />
                        <input type="hidden" name="cashier_id[]" value="<?php echo $user_id4; ?>" />
                        <input type="hidden" name="guest_id_num" value="<?php echo $guest_id_num; ?>" />
                        
                        <div class="panel-body">
                            <div class="row">
                                <div id="page-wrap">
                                
                    
                    <table class="table table-bordered table-responsive">
                        <thead class="bg-primary">
                            <tr><th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr></thead>
                        <tbody>
                        <?php
                        include('config.php');
                        $sql_orders='SELECT order_kitchen.order_kitchen_id, order_kitchen.product_id, product.product_name, product.price, order_kitchen.order_quantity, order_kitchen.action
                                    FROM order_kitchen
                                    INNER JOIN product
                                    ON product.product_id=order_kitchen.product_id
                                    WHERE order_kitchen.action="Order"';
                                $qry_orders=mysqli_query($CON, $sql_orders) or die(mysqli_error($qry_orders));
                                $total_val=0;
                                while($row=mysqli_fetch_array($qry_orders)){
                                    $order_kitchen_id=$row['order_kitchen_id'];
                                    $product_id=$row['product_id'];
                                    $product_name=$row['product_name'];
                                    $price=$row['price'];
                                    $order_quantity=$row['order_quantity'];
                                    $action=$row['action'];
                                    
                                    $total=$price*$order_quantity;
                                    $total_val+=$total;
                                    
                                    if($action=='Un-Order'){
                                        echo '';
                                    }else{
                        ?>
                                <input type="hidden" name="order_kitchen_id[]" value="<?php echo $order_kitchen_id; ?>" />
                                <tr>
                                    <td class="text-center"><strong><?php echo $product_name; ?></strong></td>
                                    <td class="text-center"><?php echo $price; ?></td>
                                    <td class="text-center"><?php echo $order_quantity; ?></td>
                                    <td class="text-center"><font class="itotal"><?php echo $total; ?></font></td>
                                    <td class="text-center"><a href="<?php echo 'mobile/delete_add_to_orders.php?id='.$order_kitchen_id; ?>"><i class="fa fa-times-circle fa-lg text-danger removeproduct"></i></a></td>
                                </tr>
                                <?php
                                }
                        }
                         ?>
                                
                                <tr>
                                    <td colspan="3" class="text-right"><strong>SUBTOTAL</strong></td>
                                    <td colspan="2" class="text-danger"><strong><label><?php echo $total_val; ?></label></strong></td>
                                    <input type="hidden" name="sub_total" value="<?php echo $total_val; ?>" />
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>VAT</strong></td>
                                    <td colspan="2" class="text-danger">
                                    <strong>
                                        <label><?php echo $vat=$total_val*0.12;?></label>
                                    </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>TOTAL AMOUNT</strong></td>
                                    <td colspan="2" class="text-danger"><strong><label><?php echo $total_sum=$total_val+$vat; ?></label></strong></td>
                                    <input type="hidden" name="billed_amount" value="<?php echo $total_sum=$total_val+$vat; ?>" />
                                </tr>
                                                   
                        </tbody>
                    </table>
                    <div class="form-group" style="
    margin-left: 35px;
">                                          
                                            <a href="<?php echo $BASE_URL;?>index_mobile_app.php?page=menu_list" class="btn btn-primary btn-lg">Add Another</a>
                                            <button type="submit" name="btn_place_order" value="Place Order" class="btn btn-primary btn-lg">Finish Order</button>
                                          </div>

</div>
                        </div>
                    </div>
                    </form>
                                            
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