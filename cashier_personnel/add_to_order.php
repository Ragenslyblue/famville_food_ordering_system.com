<?php
include('config.php');

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

$btnAdd_to_order=mysqli_real_escape_string($CON, $_POST['btnAdd_to_order']);
$product_id=mysqli_real_escape_string($CON, $_POST['product_id']);
$order_quantity=mysqli_real_escape_string($CON, $_POST['order_quantity']);
$order_type_id3=mysqli_real_escape_string($CON, $_POST['order_type_id3']);

$sql='SELECT product.product_id, product.product_name, product.category_id, category.category_type, product.quantity, product.status_type_id, status_type.status_type, product.availability
    FROM product
    INNER JOIN category
    ON category.category_id=product.category_id
    INNER JOIN status_type
    ON status_type.status_type_id=product.status_type_id
    WHERE product.product_id="'.$product_id.'"';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
while($row=mysqli_fetch_array($qry)){
    $product_id7=$row['product_id'];
    $category_type=$row['category_type'];
    $quantity=$row['quantity'];
    $status_type_id=$row['status_type_id'];
    $status_type=$row['status_type'];
    $availability=$row['availability'];

$minus=number_format(round($quantity-$order_quantity),0);

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

$sql_cashier='SELECT user.user_id, user.user_name, user.password, user.first_name, user.last_name, user.user_group_id, user_groups.user_groups
    FROM user
    INNER JOIN user_groups
    ON user_groups.user_groups_id=user.user_group_id
    WHERE user_groups.user_groups="cashier"';
$qry_cashier=mysqli_query($CON, $sql_cashier) or die(mysqli_error($qry_cashier));
while($row=mysqli_fetch_array($qry_cashier)){
    $user_id=$row['user_id'];
    $user_groups=$row['user_groups'];
}

if($user_groups=='cashier'){
    $user_id2=$user_id;

if($btnAdd_to_order=='Add to Order'){
    $btnAdd_to_order='Order';

$sql3='INSERT INTO `order_kitchen`(`order_type_id`, `product_id`, order_quantity,`user_id`, `status`, action) 
    VALUES ("'.$order_type_id3.'", "'.$product_id.'", "'.$order_quantity.'", "'.$user_id2.'", "'.$order_status.'", "'.$btnAdd_to_order.'")';
$qry3=mysqli_query($CON, $sql3) or die(mysqli_error($qry3));
    }    
}

$sql_update='UPDATE `product` SET `quantity`="'.$number_val.'",`status_type_id`="'.$stats.'",`availability`="'.$values.'" 
    WHERE product.product_id="'.$product_id.'"';
$qry_update=mysqli_query($CON, $sql_update) or die(mysqli_error($qry_update));

?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Orders:</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=pay_for_items" method="post" style="display:  -webkit-inline-box;" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <input type="hidden" name="order_num" value="<?php echo $order_num; ?>" />
                        <input type="hidden" name="guest_id_num" value="<?php echo $guest_id_num; ?>" />
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div id="page-wrap">
                                
                    
                    <table class="table table-bordered table-responsive">
                        <thead class="bg-primary">
                            <tr><th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th></th>
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
                                    <td class="text-center"><a href=""><i class="fa fa-times-circle fa-lg text-danger removeproduct"></i></a></td>
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
                                    <td colspan="3" class="text-right"><strong>TOTAL</strong></td>
                                    <td colspan="2" class="text-danger"><strong><label><?php echo $total_sum=$total_val+$vat; ?></label></strong></td>
                                    <input type="hidden" name="billed_amount" value="<?php echo $total_sum=$total_val+$vat; ?>" />
                                </tr>
                                                   
                        </tbody>
                    </table>
                    <div class="form-group" style="
    float:  right;
">                                          
                                            <!--<button type="submit" name="btnAdd_to_order" value="Pay" class="btn btn-primary btn-lg">Send Kitchen Order</button>-->
                                            <a href="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=order" class="btn btn-primary btn-lg">Back</a>
                                            <!--<input type="submit" name="btnAdd_to_order" class="btn btn-primary btn-lg" value="Pay" />-->
                                            <button type="submit" name="btnAdd_to_order" value="Pay" class="btn btn-primary btn-lg">Send Kitchen Order</button>
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