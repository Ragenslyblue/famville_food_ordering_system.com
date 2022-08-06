<?php
include('config.php');

//$product_id=mysqli_real_escape_string($CON, $_POST['product_id']);
@$btn_enable=mysqli_real_escape_string($CON, $_POST['btn_enable']);
@$btn_disable=mysqli_real_escape_string($CON, $_POST['btn_disable']);


foreach($_POST['product_id'] as $product_id){
    //echo $product_id;
    echo '<input type="hidden" value="'.$product_id.'" />';

$sql_stats='SELECT product.product_id, product.product_name, product.status_type_id, status_type.status_type, product.category_id, category.category_type
    FROM product
    INNER JOIN status_type
    ON status_type.status_type_id=product.status_type_id
    INNER JOIN category
    ON category.category_id=product.category_id
    WHERE product.product_id="'.$product_id.'"';
$qry_stats=mysqli_query($CON, $sql_stats) or die(mysqli_error($qry_stats));
while($row=mysqli_fetch_array($qry_stats)){
    $product_id3=$row['product_id'];
    $status_type_id=$row['status_type_id'];
    $status_type=$row['status_type'];
    $product_name=$row['product_name'];
}

/*if($status_type=='Enabled'){
    $stats=$status_type_id;
}elseif($status_type=='Disabled'){
    $stats=$status_type_id;
}*/


if($btn_enable=='Enable'){
    $availability='Available';
    $stats=1;
}elseif($btn_disable=='Disable'){
    $availability='Not-Available';
    $stats=2;
}

$sql_update='UPDATE `product` SET `status_type_id`="'.$stats.'",`availability`="'.$availability.'"
    WHERE product.product_id="'.$product_id.'"';
$qry_update=mysqli_query($CON, $sql_update) or die(mysqli_error($qry_update));

}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <h2>The Product
                    <?php
                    include('config.php');
                    
                    foreach($_POST['product_id'] as $product_id){
                        //echo $product_id;
                        echo '<input type="hidden" value="'.$product_id.'" />';
                    
                    $sql_stats='SELECT product.product_id, product.product_name, product.status_type_id, status_type.status_type, product.category_id, category.category_type
                        FROM product
                        INNER JOIN status_type
                        ON status_type.status_type_id=product.status_type_id
                        INNER JOIN category
                        ON category.category_id=product.category_id
                        WHERE product.product_id="'.$product_id.'"';
                    $qry_stats=mysqli_query($CON, $sql_stats) or die(mysqli_error($qry_stats));
                    while($row=mysqli_fetch_array($qry_stats)){
                        $product_id3=$row['product_id'];
                        $status_type_id=$row['status_type_id'];
                        $status_type=$row['status_type'];
                        $product_name=$row['product_name'];
                    
                    ?>
                     (<?php echo $product_name; ?>), 
                    <?php
                        }
                    }
                    ?> 
                     has been <?php echo $status_type; ?></h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">
                            Pending Orders Request
                        </div>-->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">
                           
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        
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