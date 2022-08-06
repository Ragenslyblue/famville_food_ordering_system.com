<?php
include('config.php');

$guest_num_id=mysqli_real_escape_string($CON, $_POST['guest_num_id']);
$money_amount_1=mysqli_real_escape_string($CON, $_POST['money_amount_1']);

foreach($_POST['table_number_id3'] as $tables){
    echo $tables;
}
foreach($_POST['order_bill_out_id'] as $order_bill_out_id23){
    echo $order_bill_out_id23; 
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Pay For This Order:</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=done_pay_2" method="post" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <!--<h3>Basic Form Examples</h3>-->
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Current Order:</label>
                                            <div id="page-wrap">
                    <table class="table table-bordered table-responsive">
                        <thead class="bg-primary">
                            <tr><th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Amount</th>
                            <!--<th></th>-->
                        </tr></thead>
                        <tbody>
                        <?php
                        $sql_selection='SELECT order_bill_out.order_bill_out_id, order_bill_out.order_num_id, order_bill_out.date_time, order_bill_out.order_kitchen_id, order_kitchen.order_kitchen_id, order_kitchen.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, order_kitchen.order_type_id, order_type.order_type, order_kitchen.num_guests_id, num_guests.num_guests, order_kitchen.product_id, product.product_name, order_kitchen.order_quantity, order_kitchen.user_id, user.user_name, user.first_name, user.last_name, order_bill_out.sub_total, order_bill_out.billed_amount, order_bill_out.guest_id, order_bill_out.guest_id_num, guest.guest_num_id, guest.first_name, guest.last_name, guest.guest_num_id, order_bill_out.guest_id_num, guest.guest_num_id, product.price, product.image, order_kitchen.order_quantity
                            FROM order_bill_out
                            INNER JOIN order_kitchen
                            ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
                            INNER JOIN table_number
                            ON table_number.table_number_id=order_kitchen.table_number_id
                            INNER JOIN order_type
                            ON order_type.order_type_id=order_kitchen.order_type_id
                            INNER JOIN num_guests
                            ON num_guests.num_guests_id=order_kitchen.num_guests_id
                            INNER JOIN product
                            ON product.product_id=order_kitchen.product_id
                            INNER JOIN user
                            ON user.user_id=order_kitchen.user_id
                            INNER JOIN guest
                            ON guest.guest_id=order_bill_out.guest_id
                            WHERE table_number.table_number_id="'.$tables.'" AND guest.guest_num_id="'.$guest_num_id.'"';
                        $qry_selection=mysqli_query($CON, $sql_selection) or die(mysqli_error($qry_selection));
                        $sub_totals='';
                        while($row=mysqli_fetch_array($qry_selection)){
                            $order_bill_out_id=$row['order_bill_out_id'];
                            $order_num_id=$row['order_num_id'];
                            $product_id=$row['product_id'];
                            $product_name=$row['product_name'];
                            $image=$row['image'];
                            $price=$row['price'];
                            $order_quantity=$row['order_quantity'];
                            $table_number_id=$row['table_number_id'];
                            
                            $sub_totals+=$price;
                            $tax=$sub_totals*0.12;
                            $total=$sub_totals+$tax;
                            $amount_remaining=$money_amount_1-$total;
                            $multiply=$price*$order_quantity;
                        ?>
                                <tr>
                                <input type="hidden" name="table_number_id[]" value="<?php echo $table_number_id; ?>" />
                                <input type="hidden" name="order_num_id" value="<?php echo $order_num_id; ?>" />
                                <input type="hidden" name="order_bill_out[]" value="<?php echo $order_bill_out_id23; ?>" />
                                    <td class="text-center">
                                    <strong>
                                    <img src="<?php echo './images_3/upload/'.$image; ?>" width="100" height="100" />
                                    <div class="form-group">
                                            <label><?php echo $product_name; ?></label>
                                    </div>
                                    </strong></td>
                                    <td class="text-center"><?php echo $price; ?></td>
                                    <td class="text-center">
                                    <?php echo $order_quantity; ?>    
                                    </td>
                                    <td class="text-center"><font class="itotal"><?php echo $multiply; ?></font></td>
                                    
                                </tr>
                        </tbody>
                        <?php
                        }
                        ?>
                    </table>

</div>
                                        </div>
                                        
                                    </form>
                                    <br/>
                                        <!--<div class="form-group">
                                            <label>Total:</label>
                                            <label>123</label>
                                        </div>-->
                                        <div class="form-group">
                                            <label>SubTotal:</label>
                                            <label><?php echo $sub_totals; ?></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Tax:</label>
                                            <button type="submit" style="background-color: blue; color: white;" class="btn btn-default">Remove Tax</button>
                                            <label><?php echo $tax; ?></label>
                                        </div>
                                        <!--<div class="form-group">
                                            <label>Another Order:</label>
                                            <a href="<?php //echo $BASE_URL;?>index_cashier_personnel.php?page=order" style="background-color: blue; color: white;" class="btn btn-default">Add</a>
                                        </div>-->
                                        <div class="form-group">
                                            <label>Total:</label>
                                            <label><?php echo $total; ?></label>
                                        </div>
                                        <div class="form-group">
                                            <label>Amount Remaining:</label>
                                            <label><?php echo $amount_remaining;?></label>
                                            <input type="hidden" name="change_due" value="<?php echo $amount_remaining; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Payment 1:</label>
                                            <label>Php <?php echo $total; ?></label>
                                            <input type="hidden" name="payment_1" value="<?php echo $total; ?>" />
                                        </div>
                                        
                                        
                                        <button type="submit" name="btn_done_pay" value="Done Pay" class="btn btn-default">Done Pay</button>
                                    
                                      
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