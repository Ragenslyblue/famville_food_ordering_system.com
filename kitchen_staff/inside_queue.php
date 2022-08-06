<!-- BOOTSTRAP STYLES-->
<link href="../assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="../assets/css/font-awesome.css" rel="stylesheet" />
<!-- MORRIS CHART STYLES-->
<link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="../assets/css/custom.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../assets/css/css_table_image.css" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<?php
include('../config.php');
include('header.php');
include('side_bar.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    /*$sql_inc='SELECT order_bill_out.order_bill_out_id, order_bill_out.order_num_id, order_kitchen.order_kitchen_id, order_kitchen.order_type_id, order_type.order_type, order_kitchen.product_id, product.product_name, order_kitchen.order_quantity, order_kitchen.date_time, order_kitchen.user_id, user.user_group_id, user_groups.user_groups, order_kitchen.status
        FROM order_bill_out
        INNER JOIN order_kitchen
        ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
        INNER JOIN order_type
        ON order_type.order_type_id=order_kitchen.order_type_id
        INNER JOIN product
        ON product.product_id=order_kitchen.product_id
        INNER JOIN user
        ON user.user_id=order_kitchen.user_id
        INNER JOIN user_groups
        ON user_groups.user_groups_id=user.user_group_id
        WHERE order_bill_out.order_num_id="'.$id.'"';*/
    $sql_inc='SELECT order_bill_out.order_bill_out_id, order_bill_out.order_num_id, order_kitchen.order_kitchen_id, order_kitchen.order_type_id, order_type.order_type, order_kitchen.product_id, product.product_name, order_kitchen.order_quantity, order_kitchen.date_time, order_kitchen.user_id, user.user_group_id, user_groups.user_groups, order_kitchen.status, order_kitchen.table_number_id, table_number.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, table_number.area_type_id, area_type.area_type
        FROM order_bill_out
        INNER JOIN order_kitchen
        ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
        INNER JOIN order_type
        ON order_type.order_type_id=order_kitchen.order_type_id
        INNER JOIN product
        ON product.product_id=order_kitchen.product_id
        INNER JOIN user
        ON user.user_id=order_kitchen.user_id
        INNER JOIN user_groups
        ON user_groups.user_groups_id=user.user_group_id
        INNER JOIN table_number
        ON table_number.table_number_id=order_kitchen.table_number_id
        INNER JOIN area_type
        ON area_type.area_type_id=table_number.area_type_id
        WHERE order_bill_out.order_num_id="'.$id.'"';
    $qry_inc=mysqli_query($CON,$sql_inc) or die(mysqli_error($qry_inc));
    $order_type='';
    $area_type='';
    $table_number_capacity='';
    while($row=mysqli_fetch_array($qry_inc)){
        $order_bill_out_id=$row['order_bill_out_id'];
        $order_num_id=$row['order_num_id'];
        $order_kitchen_id=$row['order_kitchen_id'];
        $order_type=$row['order_type'];
        $status=$row['status'];
        $table_number_capacity=$row['table_number_capacity'];
        $area_type=$row['area_type'];
    }    
}
/*if(isset($_POST['btn_add_guest'])){
       //$id2=$_GET['order_bill_out_id'];
       $id2=mysqli_real_escape_string($CON, $_POST['order_bill_out_id']);
       
       $sql2='DELETE FROM `order_bill_out` WHERE order_bill_out.order_bill_out_id="'.$id2.'"';
       $qry2=mysqli_query($CON, $sql2) or die(mysqli_error($qry2));
}
if(isset($_POST['btn_bump_all'])){
      $order_num_id=mysqli_real_escape_string($CON, $_POST['order_num_id']);
      
      $sql3='DELETE FROM `order_bill_out` WHERE order_bill_out.order_num_id="'.$order_num_id.'"';
      $qry3=mysqli_query($CON, $sql3) or die(mysqli_error($qry3));
}*/
if(isset($_POST['btn_bump'])){
    $order_bill_out_id=mysqli_real_escape_string($CON, $_POST['order_bill_out_id']);
    $btn_bump=mysqli_real_escape_string($CON, $_POST['btn_bump']);
    
    if($btn_bump=='Bump'){
        $actions='bump';
    }
    $sql_updates='UPDATE `order_bill_out` SET `action`="'.$actions.'" WHERE order_bill_out.order_bill_out_id="'.$order_bill_out_id.'"';
    $qry_updates=mysqli_query($CON, $sql_updates) or die(mysqli_error($qry_updates));
}
if(isset($_POST['btn_bump_all'])){
    //$order_num_id=mysqli_real_escape_string($CON, $_POST['order_num_id']);
    $btn_bump_all=mysqli_real_escape_string($CON, $_POST['btn_bump_all']);
    
    if($btn_bump_all=='Bump All'){
        $action3='bump';
    }
    
    foreach($_POST['order_num_id'] as $order_num_id2){
        echo $order_num_id2;
        
        $sql_updated='UPDATE `order_bill_out` SET `action`="'.$action3.'" WHERE order_bill_out.order_num_id="'.$order_num_id2.'"';
        $qry_updated=mysqli_query($CON, $sql_updated) or die(mysqli_error($qry_updated));
        header('Location:../index_kitchen_staff.php?page=orders_queue');
    }
    
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Guest Orders(In-Progress)</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <form action="" method="post" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Guest Orders Request
                        </div>
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-default">
                                <div class="panel-body">
                                            <strong><h1><?php echo $order_type.', '.$table_number_capacity.', '.$area_type; ?></h1><br />
                                            <!--<h1><?php //echo $table_number_capacity; ?></h1><br />
                                            <h1><?php //echo $area_type; ?></h1>-->
                                            </strong>
                                            <?php
                                            include('../config.php');
                                            $sql_val='SELECT order_bill_out.order_bill_out_id, order_bill_out.order_num_id, order_kitchen.order_kitchen_id, order_kitchen.order_type_id, order_type.order_type, order_kitchen.product_id, product.product_name, order_kitchen.order_quantity, order_kitchen.date_time, order_kitchen.user_id, user.user_group_id, user_groups.user_groups, order_kitchen.status, order_bill_out.action 
                                                FROM order_bill_out
                                                INNER JOIN order_kitchen
                                                ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
                                                INNER JOIN order_type
                                                ON order_type.order_type_id=order_kitchen.order_type_id
                                                INNER JOIN product
                                                ON product.product_id=order_kitchen.product_id
                                                INNER JOIN user
                                                ON user.user_id=order_kitchen.user_id
                                                INNER JOIN user_groups
                                                ON user_groups.user_groups_id=user.user_group_id
                                                WHERE order_bill_out.order_num_id="'.$id.'"';
                                            $qry_val=mysqli_query($CON, $sql_val) or die(mysqli_error($qry_val));
                                            $user_groups='';
                                            while($row=mysqli_fetch_array($qry_val)){
                                                $order_bill_out_id=$row['order_bill_out_id'];
                                                $order_num_id=$row['order_num_id'];
                                                $product_name=$row['product_name'];
                                                $order_quantity=$row['order_quantity'];
                                                $user_groups=$row['user_groups'];
                                                $action=$row['action'];
                                                
                                                if($action=='bump'){
                                                    echo '';
                                                }else{
                                                    
                                            ?>
                                            <p>
                                            <input type="hidden" name="order_bill_out_id" value="<?php echo $order_bill_out_id; ?>" />
                                            <p><?php echo $product_name; ?>&nbsp;&nbsp;<span style="
    padding-left: 780px;
"><strong><?php echo $order_quantity; ?></strong></span>
<button type="submit" value="Bump" name="btn_bump" class="btn btn-default">Bump</button>
</p>
                                            </form> 
                                            </p>
                                            <?php
                                                }
                                            }
                                            ?>
                                            <hr style="background-color: blue;" />
                                            <!--<button class="btn btn-primary btn-lg"  data-target="#myModal">
                                Notify <?php //echo $user_groups; ?>
                            </button>-->
                            <form action="" style="
    display: -webkit-inline-box;
" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="order_num_id[]" value="<?php echo $order_num_id; ?>" />
                            <button type="submit" value="Bump All" name="btn_bump_all" class="btn btn-primary btn-lg"  data-target="#myModal">
                                Bump All
                            </button>
                            </form>
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
include('footer.php');
?>