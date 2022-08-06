<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome to Admin Dashboard </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                <div class="row">
            <!--<div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">120 New</p>
                    <p class="text-muted">Messages</p>
                </div>
             </div>
		     </div>-->
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Total Orders</p>
                    <?php
                       $sql_sales='SELECT DISTINCT order_bill_out.order_num_id, order_bill_out.action, order_bill_out.guest_id, guest.guest_num_id, order_bill_out.date_time, order_kitchen.order_type_id, order_type.order_type, order_kitchen.user_id, user.first_name, user.last_name, order_bill_out.billed_amount, order_bill_out.order_bill_out_id
                                        FROM order_bill_out
                                        LEFT JOIN guest
                                        ON guest.guest_id=order_bill_out.guest_id
                                        LEFT JOIN order_kitchen
                                        ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
                                        LEFT JOIN order_type
                                        ON order_type.order_type_id=order_kitchen.order_type_id
                                        LEFT JOIN user
                                        ON user.user_id=order_kitchen.user_id
                                        WHERE order_bill_out.action="bump" OR guest.guest_num_id
                                        ORDER BY order_bill_out.order_num_id ASC';
                                    $qry_sales=mysqli_query($CON, $sql_sales) or die(mysqli_error($qry_sales));
                                    while($row=mysqli_fetch_array($qry_sales)){
                                        $order_bill_out_id=$row['order_bill_out_id'];
                                        $guest_id=$row['guest_id'];
                                        $guest_num_id=$row['guest_num_id'];
                                        $date_time=$row['date_time'];
                                        $order_type=$row['order_type'];
                                        $first_name=$row['first_name'];
                                        $last_name=$row['last_name'];
                                        $billed_amount=$row['billed_amount'];
                                        //$status=$row['status'];
                                        $order_num_id=$row['order_num_id'];
                                        
                                    } 
                                    /*$sql_dup='SELECT DISTINCT order_bill_out.order_num_id, order_bill_out.billed_amount, order_bill_out.action
                                        FROM order_bill_out
                                        WHERE order_bill_out.action="bump"
                                        ORDER BY order_bill_out.order_num_id ASC';*/
                                    $sql_dup='SELECT DISTINCT order_bill_out.order_num_id, order_bill_out.billed_amount, order_bill_out.action, order_bill_out.guest_id, guest.guest_num_id
                                        FROM order_bill_out
                                        LEFT JOIN guest
                                        ON guest.guest_id=order_bill_out.guest_id
                                        WHERE order_bill_out.action="bump" OR guest.guest_num_id
                                        ORDER BY guest.guest_num_id DESC';
                                    $qry_dup=mysqli_query($CON, $sql_dup) or die(mysqli_error($qry_dup));
                                    while($row=mysqli_fetch_array($qry_dup)){
                                        $order_num_id2=$row['order_num_id'];
                                        $action=$row['action'];
                                        $billed_amount2=$row['billed_amount'];
                                        $guest_id=$row['guest_id'];
                                        $guest_num_id7=$row['guest_num_id'];
                                        
                                    /*$sql_guest_num='SELECT DISTINCT guest.guest_num_id, order_bill_out.guest_id
                                            FROM order_bill_out
                                            INNER JOIN guest
                                            ON guest.guest_id=order_bill_out.guest_id
                                            WHERE guest.guest_num_id="'.$guest_num_id7.'"';
                                    $qry_guest_num=mysqli_query($CON, $sql_guest_num) or die(mysqli_error($qry_guest_num));
                                    while($row=mysqli_fetch_array($qry_guest_num)){
                                            $guest_num_id3=$row['guest_num_id'];
                                            $guest_id3=$row['guest_id'];*/
                                            
                                        if($action=='bump'){
                                            $value_stats='Completed';
                                        }else{
                                            $value_stats='Not-Completed';
                                        }
                                        /*if($guest_num_id7==0){
                                            $guest_num_id4='';
                                        }else{
                                            $guest_num_id4=$guest_num_id7;
                                        }*/
                                        global $total_sales;
                                        $num_orders=mysqli_num_rows($qry_dup);
                                        $total_sales+=$billed_amount2;
                                        $total_guests=mysqli_num_rows($qry_dup);
                    }
                    ?>
                    <p class="text-muted"><?php echo $num_orders; ?></p>
                    <p class="text-muted"><a href="<?php echo $BASE_URL;?>index_admin.php?page=orders">View</a></p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Total Sales</p>
                    <p class="text-muted"><?php echo $total_sales; ?></p>
                    <p class="text-muted"><a href="<?php echo $BASE_URL;?>index_admin.php?page=sales_3">View</a></p>
                </div>
             </div>
		     </div>
                    <div class="col-md-3 col-sm-6 col-xs-6">           
			<!--<div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box" >
                    <p class="main-text">Total Guests</p>
                    <p class="text-muted"><?php //echo $total_guests; ?></p>
                    <p class="text-muted"><a href="<?php //echo $BASE_URL;?>index_admin.php?page=orders">View</a></p>
                </div>
             </div>-->
		     </div>
			</div>
                 <!-- /. ROW  -->
                <hr />                
                <div class="row">
                    
                    
                    
                    
                    
                        
        </div>
                 <!-- /. ROW  -->
                <div class="row"> 
                    
                      
                               <div class="col-md-9 col-sm-12 col-xs-12">                     
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Important Shortcuts
                        </div>
                        <div class="panel-body">
                            <!--<div id="morris-bar-chart"></div>-->
                        <div class="display-inline" style="display: inline-flex;padding: -60px;">
                        <div class="panel panel-primary text-center no-boder bg-color-blue" style="margin-right: 20px;">
                        <div class="panel-body">
                            <i class="fa fa-edit fa-5x"></i>
                            <h3><a href="<?php echo $BASE_URL;?>index_admin.php?page=products" style="color: white;">Add New Item</a></h3>
                        </div>
                        <?php
                        include('config.php');
                        
                        $sql_prod='SELECT * FROM `product`';
                        $qry_prod=mysqli_query($CON, $sql_prod) or die(mysqli_error($qry_prod));
                        $total_prod=0;
                        while($row=mysqli_fetch_array($qry_prod)){
                            $product_id=$row['product_id'];
                            $quantity=$row['quantity'];
                            //global $total_prod;
                            $total_prod+=$quantity;
                        }
                        ?>
                        <div class="panel-footer back-footer-red">
                            Total Items:<?php echo $total_prod; ?>
                            
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder bg-color-green" style="margin-right: 20px;">
                        <div class="panel-body">
                            <i class="fa fa-edit fa-5x"></i>
                            <h3><a href="<?php echo $BASE_URL;?>index_admin.php?page=users" style="color: white;">Add User</a></h3>
                        </div>
                        <?php
                        include('config.php');
                        $sql_user='SELECT * FROM `user`';
                        $qry_user=mysqli_query($CON, $sql_user) or die(mysqli_error($qry_user));
                        while($row=mysqli_fetch_array($qry_user)){
                            $user_id=$row['user_id'];
                            $user_name=$row['user_name'];
                            
                            $num_user=mysqli_num_rows($qry_user);
                        }
                        ?>
                        <div class="panel-footer back-footer-red">
                            Total Users: <?php echo $num_user; ?>
                            
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder bg-color-green" style="margin-right: 20px;">
                        <div class="panel-body">
                            <i class="fa fa-edit fa-5x"></i>
                            <h3><a href="<?php echo $BASE_URL;?>index_admin.php?page=manage_tables" style="color: white;">Add Tables</a></h3>
                        </div>
                        <?php
                        include('config.php');
                        $sql_tables='SELECT * FROM `table_number`';
                        $qry_tables=mysqli_query($CON, $sql_tables) or die(mysqli_error($qry_tables));
                        while($row=mysqli_fetch_array($qry_tables)){
                            $table_number_id=$row['table_number_id'];
                            $table_number_capacity=$row['table_number_capacity'];
                            
                            $num_tables=mysqli_num_rows($qry_tables);
                        }
                        ?>
                        <div class="panel-footer back-footer-red">
                            Total Tables: <?php echo $num_tables; ?>
                            
                        </div>
                    </div>
                    <div class="panel panel-primary text-center no-boder bg-color-red" style="margin-right: 20px;">
                        <div class="panel-body">
                            <i class="fa fa-edit fa-5x"></i>
                            <h3><a href="<?php echo $BASE_URL;?>index_admin.php?page=category" style="color: white;">Add Category</a></h3>
                        </div>
                        <?php
                        include('config.php');
                        $sql_cat='SELECT * FROM `category`';
                        $qry_cat=mysqli_query($CON, $sql_cat) or die(mysqli_error($qry_cat));
                        while($row=mysqli_fetch_array($qry_cat)){
                            $category_id=$row['category_id'];
                            $category_type=$row['category_type'];
                            
                            $num_cat=mysqli_num_rows($qry_cat);
                        }
                        ?>
                        <div class="panel-footer back-footer-red">
                            Total Categories: <?php echo $num_cat; ?>
                            
                        </div>
                    </div>
                    
                    </div>
                        </div>
                    </div>            
                </div>
                    
                
           </div>
                 <!-- /. ROW  -->
                <div class="row" >
                    <style type="text/css">
                    #isLess{background-color: red;}
                    </style>
                    <div class="col-md-9 col-sm-12 col-xs-12">
               
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Product Alerts (Less Than 10 Quantity)
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Product Cost</th>
                                             <!--<th>User No.</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    
                                    $sql='SELECT product.product_id, product.category_id, category.category_type, product.product_name, product.quantity, product.price
                                        FROM product
                                        INNER JOIN category
                                        ON category.category_id=product.category_id';
                                    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
                                    while($row=mysqli_fetch_array($qry)){
                                        $product_id=$row['product_id'];
                                        $product_name=$row['product_name'];
                                        //$product_num_id=$row['product_num_id'];
                                        $price=$row['price'];
                                        $quantity=$row['quantity'];
                                        //$availability=$row['availability'];
                                        //$date_added=$row['date_added'];
                                        $category_type=$row['category_type'];
                                        
                                        $id='';
                                        if($quantity<=10){
                                            $id='isLess';
                                        }  

                                    ?>
                                        <tr id="<?php echo $id; ?>">
                                            <td><?php echo $category_type; ?></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td><?php echo $quantity; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <!--<td>100090</td>-->
                                        </tr>
                                     <?php
                                     }
                                     ?>   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <!--<div class="panel panel-default">
                        <div class="panel-heading">
                           Latest Orders
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Order No.</th>
                                            <th>Table</th>
                                            <th>Order Type</th>
                                            <th>Date</th>
                                             <th>Total</th>
                                             <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#" class="btn btn-primary">Open Bill ID 01</a></td>
                                            <td>Not Seated</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>100090</td>
                                            <td>Open/Closed</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>-->
                    
                    </div>
                </div>
                 <!-- /. ROW  -->
                     
                 <!-- /. ROW  -->           
    </div>
             <!-- /. PAGE INNER  -->
            </div>