<?php
include('config.php');

@$total_bill=mysqli_real_escape_string($CON, $_POST['total_bill']);
@$money_amount_1=mysqli_real_escape_string($CON, $_POST['money_amount_1']);
//@$money_amount_2=mysqli_real_escape_string($CON, $_POST['money_amount_2']);
//@$money_amount_3=mysqli_real_escape_string($CON, $_POST['money_amount_3']);
@$order_num=mysqli_real_escape_string($CON, $_POST['order_num']);

$sql='SELECT order_bill_out.order_bill_out_id, order_bill_out.billed_amount, order_bill_out.order_kitchen_id, order_kitchen.product_id, product.product_name, product.price, order_kitchen.order_quantity, order_bill_out.sub_total, order_bill_out.order_num_id, product.image
    FROM order_bill_out
    INNER JOIN order_kitchen
    ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
    INNER JOIN product
    ON product.product_id=order_kitchen.product_id
    WHERE order_bill_out.order_num_id="'.$order_num.'"';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
while($row=mysqli_fetch_array($qry)){
    $order_bill_out_id=$row['order_bill_out_id'];
    $billed_amount=$row['billed_amount'];
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
                    <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=done_pay" method="post" enctype="multipart/form-data">
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
                        include('config.php');
                        
                        $order_num=mysqli_real_escape_string($CON, $_POST['order_num']);
                                                   
                        $sql2='SELECT order_bill_out.order_bill_out_id, order_bill_out.billed_amount, order_bill_out.order_kitchen_id, order_kitchen.product_id, product.product_name, product.price, order_kitchen.order_quantity, order_bill_out.sub_total, order_bill_out.order_num_id, product.image
                            FROM order_bill_out
                            INNER JOIN order_kitchen
                            ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
                            INNER JOIN product
                            ON product.product_id=order_kitchen.product_id
                            WHERE order_bill_out.order_num_id="'.$order_num.'"';
                        $qry2=mysqli_query($CON, $sql2) or die(mysqli_error($qry2));
                        $sub_total2=0;
                        while($row=mysqli_fetch_array($qry2)){
                            $order_bill_out_id2=$row['order_bill_out_id'];
                            $billed_amount2=$row['billed_amount'];
                            $product_name=$row['product_name'];
                            $price=$row['price'];
                            $order_quantity=$row['order_quantity'];
                            $sub_total=$row['sub_total'];
                            $order_num_id=$row['order_num_id'];
                            $image=$row['image'];
                            
                            $multiply=$price*$order_quantity;
                            $sub_total2+=$multiply;
                            $tax=$sub_total2*0.12;
                            $total=$sub_total2+$tax;
                            $amount1=$money_amount_1-$total;
                            $money_amount_2=$money_amount_1;
                        ?>
                                <tr>
                                <input type="hidden" name="order_num_id" value="<?php echo $order_num_id; ?>" />
                                <input type="hidden" name="order_bill_out[]" value="<?php echo $order_bill_out_id2; ?>" />
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
                        <?php
                        }
                        ?>        
                        </tbody>
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
                                            <label><?php echo $sub_total2; ?></label>
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
                                            <label><?php echo $amount1;?></label>
                                            <input type="hidden" name="change_due" value="<?php echo $amount1; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Payment 1:</label>
                                            <label>Php <?php echo $money_amount_2; ?></label>
                                            <input type="hidden" name="payment_1" value="<?php echo $money_amount_2; ?>" />
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