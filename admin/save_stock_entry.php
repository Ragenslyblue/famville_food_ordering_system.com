<?php
include('config.php');

    $stock_id2=mysqli_real_escape_string($CON, $_POST['stock_id2']);
    $product_id2=mysqli_real_escape_string($CON, $_POST['product_id2']);
    $stock_quantity=mysqli_real_escape_string($CON, $_POST['stock_quantity']);
    $begin_inv=mysqli_real_escape_string($CON, $_POST['begin_inv']);
    
    $sql_vals='SELECT product.product_id, product.product_name, product.product_description, product.quantity, product.price, product.category_id, category.category_type, product.status_type_id, status_type.status_type
                                        FROM product
                                        INNER JOIN category
                                        ON category.category_id=product.category_id
                                        INNER JOIN status_type
                                        ON status_type.status_type_id=product.status_type_id
                                        WHERE product.product_id="'.$product_id2.'"';
    $qry_vals=mysqli_query($CON, $sql_vals) or die(mysqli_error($qry_vals));
    while($row=mysqli_fetch_array($qry_vals)){
        $product_id3=$row['product_id'];
        $quantity=$row['quantity'];
    }
    global $add_stocks;
    
    //$add_stocks=$quantity+$stock_quantity;
    
    $sql='INSERT INTO `stock`(`stock_num_id`, `product_id`, `stocks`, begin_inv) 
        VALUES ("'.$stock_id2.'", "'.$product_id2.'", "'.$stock_quantity.'", "'.$begin_inv.'")';
    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));

    /*$sql_update_stock='UPDATE `product` SET `quantity`="'.$add_stocks.'"
        WHERE product.product_id="'.$product_id2.'"';
    $qr_update_stock=mysqli_query($CON, $sql_update_stock) or die(mysqli_error($qr_update_stock));*/

?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Successfully Added Stock...</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       <?php //echo $table_num; ?>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>