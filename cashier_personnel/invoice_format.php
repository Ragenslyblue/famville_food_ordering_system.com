<?php
include('../config.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    /*$sql_select='SELECT receipt.receipt_id, receipt.order_bill_out_id, order_bill_out.order_bill_out_id, order_bill_out.order_num_id, order_bill_out.date_time,  order_bill_out.order_kitchen_id, order_kitchen.order_kitchen_id, order_kitchen.user_id, user.first_name, user.last_name, 
        order_kitchen.table_number_id, order_kitchen.product_id, product.product_name, product.product_description, product.price, order_kitchen.order_quantity, order_bill_out.date_time, order_bill_out.sub_total, order_bill_out.billed_amount, receipt.payment_type_id, payment_type.payment_type, order_kitchen.order_type_id, order_type.order_type
        FROM receipt
        LEFT JOIN order_bill_out
        ON order_bill_out.order_bill_out_id=receipt.order_bill_out_id
        LEFT JOIN order_kitchen
        ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
        LEFT JOIN user
        ON user.user_id=order_kitchen.user_id
        LEFT JOIN table_number
        ON table_number.table_number_id=order_kitchen.table_number_id
        LEFT JOIN order_type
        ON order_type.order_type_id=order_kitchen.order_type_id
        LEFT JOIN product
        ON product.product_id=order_kitchen.product_id
        LEFT JOIN payment_type
        ON payment_type.payment_type_id=receipt.payment_type_id
        WHERE order_bill_out.order_num_id="'.$id.'"';*/
    $sql_select='SELECT receipt.receipt_id, receipt.order_bill_out_id, order_bill_out.order_bill_out_id, order_bill_out.order_num_id, order_bill_out.date_time,  order_bill_out.order_kitchen_id, order_kitchen.order_kitchen_id, order_kitchen.user_id, user.first_name, user.last_name, 
        order_kitchen.table_number_id, order_kitchen.product_id, product.product_name, product.product_description, product.price, order_kitchen.order_quantity, order_bill_out.date_time, order_bill_out.sub_total, order_bill_out.billed_amount, receipt.payment_type_id, payment_type.payment_type, order_kitchen.order_type_id, order_type.order_type, user.user_group_id, user_groups.user_groups
        FROM receipt
        LEFT JOIN order_bill_out
        ON order_bill_out.order_bill_out_id=receipt.order_bill_out_id
        LEFT JOIN order_kitchen
        ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
        LEFT JOIN user
        ON user.user_id=order_kitchen.user_id
        LEFT JOIN table_number
        ON table_number.table_number_id=order_kitchen.table_number_id
        LEFT JOIN order_type
        ON order_type.order_type_id=order_kitchen.order_type_id
        LEFT JOIN product
        ON product.product_id=order_kitchen.product_id
        LEFT JOIN payment_type
        ON payment_type.payment_type_id=receipt.payment_type_id
        LEFT JOIN user_groups
        ON user_groups.user_groups_id=user.user_group_id
        WHERE order_bill_out.order_num_id="'.$id.'"';
    $qry_select=mysqli_query($CON, $sql_select) or die(mysqli_error($qry_select));
    while($row=mysqli_fetch_array($qry_select)){
        $receipt_id=$row['receipt_id'];
        $order_num_id=$row['order_num_id'];
        $date_time=$row['date_time'];
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $table_number_id=$row['table_number_id'];
        $product_name=$row['product_name'];
        $product_description=$row['product_description'];
        $price=$row['price'];
        $order_quantity=$row['order_quantity'];
        $sub_total=$row['sub_total'];
        $billed_amount=$row['billed_amount'];
        $payment_type=$row['payment_type'];
        $order_type=$row['order_type'];
        $user_groups=$row['user_groups'];
        
        global $table_nums;
        
        foreach($qry_select as $tables){
            $var_tables=$tables['table_number_id'];
            $table_nums=$var_tables.','.$table_nums;
        }        
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Famville Bowling, KTV and RestoBar</title>
	
	<link rel='stylesheet' type='text/css' href='../css_invoice/css/style.css' />
	<link rel='stylesheet' type='text/css' href='../css_invoice/css/print.css' media="print" />
	<script type='text/javascript' src='../css_invoice/js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='../css_invoice/js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">Order Slip</textarea>
		
		<div id="identity">
		    
            <textarea id="address">
            EMR, Morales St., Koronadal City
            </textarea>
            
            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src="../css_invoice/images/famville_logo123.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <textarea id="customer-title">Famville
             Food and Music Village
            </textarea>

            <table id="meta">
                <tr>
                    <td class="meta-head">Order Slip No.</td>
                    <td><textarea><?php echo $order_num_id; ?></textarea></td>
                </tr>
                <?php
                include('../config.php');
                if($user_groups=='cashier'){
                    $user_group123='Cashier';
                    $first_name123=$first_name;
                    $last_name123=$last_name;
                }elseif($user_groups=='waiter'){
                    $user_group123='Waiter';
                    $first_name123=$first_name;
                    $last_name123=$last_name;
                }
                ?>
                <tr>
                    <td class="meta-head"><?php echo $user_group123; ?></td>
                    <td><textarea><?php echo $first_name123.' '.$last_name123; ?></textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Date and Time</td>
                    <td><div class="due"><?php echo $date_time; ?></div></td>
                </tr>
                <tr>
                    <td class="meta-head">TR. Type</td>
                    <td><div class="due"><?php echo $order_type; ?></div></td>
                </tr>
                <?php
                include('../config.php');
                if($order_type=='Take-Out'){
                    echo '';
                }else{
                ?>
                <tr>
                    <td class="meta-head">Table No.</td>
                    <td><div class="due"><?php echo $table_nums; ?></div></td>
                </tr>
                <?php
                }
                ?>
            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Total</th>
		  </tr>
		  <?php
         $sql_select='SELECT receipt.receipt_id, receipt.order_bill_out_id, order_bill_out.order_bill_out_id, order_bill_out.order_num_id, order_bill_out.date_time,  order_bill_out.order_kitchen_id, order_kitchen.order_kitchen_id, order_kitchen.user_id, user.first_name, user.last_name, 
            order_kitchen.table_number_id, order_kitchen.product_id, product.product_name, product.product_description, product.price, order_kitchen.order_quantity, order_bill_out.date_time, order_bill_out.sub_total, order_bill_out.billed_amount, receipt.payment_type_id, payment_type.payment_type, order_kitchen.order_type_id, order_type.order_type, receipt.payment_amount, receipt.change_due
            FROM receipt
            LEFT JOIN order_bill_out
            ON order_bill_out.order_bill_out_id=receipt.order_bill_out_id
            LEFT JOIN order_kitchen
            ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
            LEFT JOIN user
            ON user.user_id=order_kitchen.user_id
            LEFT JOIN table_number
            ON table_number.table_number_id=order_kitchen.table_number_id
            LEFT JOIN order_type
            ON order_type.order_type_id=order_kitchen.order_type_id
            LEFT JOIN product
            ON product.product_id=order_kitchen.product_id
            LEFT JOIN payment_type
            ON payment_type.payment_type_id=receipt.payment_type_id
            WHERE order_bill_out.order_num_id="'.$id.'"';
        $qry_select=mysqli_query($CON, $sql_select) or die(mysqli_error($qry_select));
        while($row=mysqli_fetch_array($qry_select)){
            $receipt_id=$row['receipt_id'];
            $order_num_id=$row['order_num_id'];
            $date_time=$row['date_time'];
            $first_name=$row['first_name'];
            $last_name=$row['last_name'];
            $table_number_id=$row['table_number_id'];
            $product_name=$row['product_name'];
            $product_description=$row['product_description'];
            $price=$row['price'];
            $order_quantity=$row['order_quantity'];
            $sub_total=$row['sub_total'];
            $billed_amount=$row['billed_amount'];
            $payment_type=$row['payment_type'];
            $order_type=$row['order_type'];
            $payment_amount=$row['payment_amount'];
            $change_due=$row['change_due'];
            
            global $num_rows;
            $totals=$order_quantity*$price;
            $num_rows+=$order_quantity;
            $vat=$sub_total*0.12;      
                  
          ?>
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea><?php echo $product_name; ?></textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description"><textarea><?php echo $product_description; ?></textarea></td>
		      <td><textarea class="cost"><?php echo $price; ?></textarea></td>
		      <td><textarea class="qty"><?php echo $order_quantity; ?></textarea></td>
		      <td><span class="price"><?php echo $totals; ?></span></td>
		  </tr>
		  <?php
          }
          ?>
		  <!--<tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea>SSL Renewals</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>

		      <td class="description"><textarea>Yearly renewals of SSL certificates on main domain and several subdomains</textarea></td>
		      <td><textarea class="cost">$75.00</textarea></td>
		      <td><textarea class="qty">3</textarea></td>
		      <td><span class="price">$225.00</span></td>
		  </tr>-->
		  
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">No. of Items</td>
		      <td class="total-value"><div id="subtotal"><?php echo $num_rows; ?></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal Amt.</td>
		      <td class="total-value"><div id="subtotal"><?php echo $sub_total; ?></div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Billed Amount</td>
		      <td class="total-value"><div id="total"><?php echo $billed_amount; ?></div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Less Payment : <?php echo $payment_type; ?></td>

		      <td class="total-value"><textarea id="paid"><?php echo $payment_amount; ?></textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Change Due</td>
		      <td class="total-value balance"><div class="due"><?php echo $change_due; ?></div></td>
		  </tr>
          <!--<tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Vatable</td>
		      <td class="total-value balance"><div class="due">$875.00</div></td>
		  </tr>-->
          <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Includes Vat of 12%</td>
		      <td class="total-value balance"><div class="due"><?php echo $vat; ?></div></td>
		  </tr>
          <!--<tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Non Vat</td>
		      <td class="total-value balance"><div class="due">$875.00</div></td>
		  </tr>
          <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Vat Zero-Rated</td>
		      <td class="total-value balance"><div class="due">$875.00</div></td>
		  </tr>
          <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Vat-Exempt</td>
		      <td class="total-value balance"><div class="due">$875.00</div></td>
		  </tr>-->
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>This Serves As Your Official Receipt.
          Thank You and Come Again
          </textarea>
		</div>
	
	</div>
    
    <button onclick="print_content('page-wrap')">Print Here</button>

	
</body>

</html>