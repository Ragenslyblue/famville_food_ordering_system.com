<?php
include('config.php');

foreach($_POST['table_number_id'] as $table_number_id5){
    echo $table_number_id5;
    
    $sql_table_select13='SELECT table_number.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, table_number.area_type_id, area_type.area_type, table_number.availability
        FROM table_number
        INNER JOIN area_type
        ON area_type.area_type_id=table_number.area_type_id
        WHERE table_number.table_number_id="'.$table_number_id5.'" AND table_number.availability="Occupied"';
    $qry_table_select13=mysqli_query($CON, $sql_table_select13) or die(mysqli_error($qry_table_select13));
    while($row=mysqli_fetch_array($qry_table_select13)){
        $table_number_id=$row['table_number_id'];
        $table_number_capacity=$row['table_number_capacity'];
        $availability=$row['availability'];
        
        if($availability=='In-use' && $availability=='Available'){
           echo '<h2>The Guest has already Check-out</h2>';
        }else{
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php //echo $action; ?></h2>   
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
                        
                        <?php
                        include('config.php');
                        
                        foreach($_POST['table_number_id'] as $table_number_id3){
                            //echo $table_number_id3;
                            echo '<input type="hidden" value="'.$table_number_id3.'" />';
                            
                            /*$sql_table_selected='SELECT DISTINCT table_number.table_number_capacity, order_kitchen.table_number_id, table_number.table_number_id
                                FROM order_kitchen
                                INNER JOIN table_number
                                ON table_number.table_number_id=order_kitchen.table_number_id
                                WHERE table_number.table_number_id="'.$table_number_id3.'"';*/
                            $sql_table_selected='SELECT DISTINCT table_number.table_number_capacity, order_kitchen.table_number_id, table_number.table_number_id, table_number.availability
                                FROM order_kitchen
                                INNER JOIN table_number
                                ON table_number.table_number_id=order_kitchen.table_number_id
                                WHERE table_number.table_number_id="'.$table_number_id3.'"';
                            $qry_table_selected=mysqli_query($CON, $sql_table_selected) or die(mysqli_error($qry_table_selected));
                            while($row=mysqli_fetch_array($qry_table_selected)){
                                $table_number_id7=$row['table_number_id'];
                                $table_number_capacity=$row['table_number_capacity'];
                                $availability=$row['availability'];
                                    
                        ?>
                        
                            <div class="row">
                                <div class="col-md-6">
                                    <!--<h3>Basic Form Examples</h3>-->
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label><h3><?php echo $table_number_capacity; ?></h3></label>
                                        </div>
                                        <?php
                                        $sql_tables='SELECT order_bill_out.order_bill_out_id, order_bill_out.order_num_id, order_bill_out.date_time, order_bill_out.order_kitchen_id, order_kitchen.order_kitchen_id, order_kitchen.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, order_kitchen.order_type_id, order_type.order_type, order_kitchen.num_guests_id, num_guests.num_guests, order_kitchen.product_id, product.product_name, order_kitchen.order_quantity, order_kitchen.user_id, user.user_name, user.first_name, user.last_name, order_bill_out.sub_total, order_bill_out.billed_amount, order_bill_out.guest_id, order_bill_out.guest_id_num, guest.guest_num_id, guest.first_name, guest.last_name, guest.guest_num_id, order_bill_out.guest_id_num, guest.guest_num_id
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
                                            ON guest.guest_id=order_bill_out.guest_id';
                                            /*WHERE table_number.table_number_id="'.$table_number_id3.'"';*/
                                        $qry_tables=mysqli_query($CON, $sql_tables) or die(mysqli_error($qry_tables));
                                        while($row=mysqli_fetch_array($qry_tables)){
                                            $first_name=$row['first_name'];
                                            $last_name=$row['last_name'];
                                            $guest_id_num=$row['guest_id_num'];
                                            $guest_num_id=$row['guest_num_id'];
                                        }
                                        ?>
                                        <div class="form-group">
                                            <label><h4>Whole Table:</h4></label>
                                            <label><h4><strong><?php echo $first_name.' '.$last_name; ?></strong></h4></label>
                                        </div>
                                        
                                    </form>
                                    <br/>
                                    <div class="col-sm-12">


<div id="page-wrap">
                    <table class="table table-bordered table-responsive">
                        <thead class="bg-primary">
                            <tr><th>Guest ID</th>
                            <th>Items</th>
                            <th>Amounts</th>
                            <!--<th>Actions</th>-->
                        </tr></thead>
                        <tbody>
                        <?php
                        include('config.php');
                        
                        $sql_selects='SELECT order_bill_out.order_bill_out_id, order_bill_out.order_num_id, order_bill_out.date_time, order_bill_out.order_kitchen_id, order_kitchen.order_kitchen_id, order_kitchen.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, order_kitchen.order_type_id, order_type.order_type, order_kitchen.num_guests_id, num_guests.num_guests, order_kitchen.product_id, product.product_name, order_kitchen.order_quantity, order_kitchen.user_id, user.user_name, user.first_name, user.last_name, order_bill_out.sub_total, order_bill_out.billed_amount, order_bill_out.guest_id, order_bill_out.guest_id_num, guest.guest_num_id, guest.first_name, guest.last_name, guest.guest_num_id, order_bill_out.guest_id_num, guest.guest_num_id, product.price
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
                            WHERE table_number.table_number_id="'.$table_number_id3.'" AND order_bill_out.guest_id_num="'.$guest_id_num.'"';
                        $qry_selects=mysqli_query($CON, $sql_selects) or die(mysqli_error($qry_selects));
                        $totals='';
                        $value_prods2='';
                        $val_price='';
                        $totals2='';
                        while($row=mysqli_fetch_array($qry_selects)){
                            $order_bill_out_id=$row['order_bill_out_id'];
                            $guest_id_num=$row['guest_id_num'];
                            $product_name=$row['product_name'];
                            $price=$row['price'];
                            $guest_num_id=$row['guest_num_id'];
                            
                            $totals+=$price;
                                                        
                            $num_rows=mysqli_num_rows($qry_selects);
                            for($i=1; $i<=$num_rows; ++$i){
                                //echo $i;
                                echo '<input type="hidden" value="'.$i.'" />';
                            }
                            foreach($qry_selects as $product_name2){
                                $val_prod=$product_name2['product_name'];
                                $value_prods2=$val_prod.','.$value_prods2;
                            }
                            foreach($qry_selects as $amount){
                                $val_amount=$amount['price'];
                                $val_price=$val_amount.','.$val_price;
                                
                                $totals2+=$val_price;
                            }
                        ?>
                                <tr>
                                    <td class="text-center"><strong>Guest <?php echo $guest_num_id; ?></strong></td>
                                    <td class="text-center"><?php echo $value_prods2; ?></td>
                                    <td class="text-center"><?php echo $val_price; ?></td>
                                    <!--<td class="text-center">
                                    <font class="itotal" style="
    display:  flex;
">
                                    
                                    <a href="<?php //echo $BASE_URL;?>index_cashier_personnel.php?page=move_items" class="btn btn-primary btn-lg" data-target="#myModal">Move Items</a>
                                    <a href="<?php //echo $BASE_URL;?>index_cashier_personnel.php?page=move_table" class="btn btn-primary btn-lg" data-target="#myModal">Move Table</a>
                                    </font>
                                    </td>-->
                                </tr>
                        <?php
                        }
                        ?>
                                  
                                 <!--<tr>
                                    <td class="text-center"><strong>Guest 2</strong></td>
                                    <td class="text-center">Pay.5</td>
                                    <td class="text-center">
                                        
                                    </td>
                                    <td class="text-center">
                                    <font class="itotal" style="
    display:  flex;
">
                                    
                                    <a href="<?php //echo $BASE_URL;?>index_cashier_personnel.php?page=move_items" class="btn btn-primary btn-lg" data-target="#myModal">Move Items</a>
                                    
                                    <a href="<?php //echo $BASE_URL;?>index_cashier_personnel.php?page=move_table" class="btn btn-primary btn-lg" data-target="#myModal">Move Table</a>
                                    
                                    </font>
                                    </td>
                                    
                                </tr>-->
                                                   
                        </tbody>
                    </table>
<div style="text-align: center;margin-left: -110px;">Totals: <?php echo $totals2; ?></div>
</div>

                    
                    				</div>
                                      
    </div>
    
    
    
    
                                
                                
                            </div>
                            <?php
                                //}
                            }
                        }
                            ?>
                            
                        
                        <h3 style="
    margin-left: 745px;
">Actions:</h3>
                        <div class="pull-right" style="
    display:  inline-grid;
    margin-right: 100px;
">
                            
                            <button type="submit" onclick="print_content('page-wrap')" class="btn btn-danger btn-lg">Clear Table</button>
                            <!--<a href="<?php //echo $BASE_URL;?>index_cashier_personnel.php?page=move_table" class="btn btn-danger btn-lg">Move Table</a>-->
                            <!--<a href="<?php //echo $BASE_URL;?>index_cashier_personnel.php?page=leave_table" class="btn btn-danger btn-lg">Leave Table</a>-->
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
<?php

        }
    }
}

?>