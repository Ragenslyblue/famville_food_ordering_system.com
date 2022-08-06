<?php
include('config.php');

$sql='SELECT * FROM `stock_num`';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
while($row=mysqli_fetch_array($qry)){
    $stock_num_id=$row['stock_num_id'];
    $stock_num=$row['stock_num'];
}
//echo $product_num;
if(mysqli_num_rows($qry)==1){
   $sql='SELECT * FROM `stock`';
   $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
   $id_num=0;
   while($row=mysqli_fetch_array($qry)){
    $stock_id=$row['stock_id'];
   
    $date=date('d');
    $num_rows2=mysqli_num_rows($qry);
    $val=$date.($num_rows2+$stock_num); 
    $str_id=str_pad($val, 1, 1, STR_PAD_LEFT);
    $id_num=$str_id+1;
    }
}

   if(isset($_POST['btn_view'])){
                                    $product_id=mysqli_real_escape_string($CON, $_POST['product_id']);
                                    
                                    $sql_stock='SELECT product.product_id, product.product_name, product.product_description, product.quantity, product.price, product.category_id, category.category_type, product.status_type_id, status_type.status_type
                                        FROM product
                                        INNER JOIN category
                                        ON category.category_id=product.category_id
                                        INNER JOIN status_type
                                        ON status_type.status_type_id=product.status_type_id
                                        WHERE product.product_num_id="'.$product_id.'"';
                                    $qry_stock=mysqli_query($CON, $sql_stock) or die(mysqli_error($qry_stock));
                                    while($row=mysqli_fetch_array($qry_stock)){
                                        $product_id2=$row['product_id'];
                                        $product_name=$row['product_name'];
                                        $product_description=$row['product_description'];
                                        $quantity=$row['quantity'];
                                        $price=$row['price'];
                                        $category_type=$row['category_type'];
                                        $status_type=$row['status_type'];
                                        $status_type_id=$row['status_type_id'];
                                    }
                                }
                                global $category_type;
                                global $product_name;
                                global $product_description;
?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Stock Entry</h2>   
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
                            <div class="row">
                                <div class="col-md-6">
                                    <!--<h3>Basic Form Examples</h3>-->
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                        <?php //echo mysqli_num_rows($qry); ?>
                                            <label>Stock ID:</label>
                                            <input disabled="yes" value="<?php echo $id=$id_num+1; ?>" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Product ID:</label>
                                            <input type="text" name="product_id" value="" class="form-control"/>
                                            <button type="submit" style="
    float: right;
    margin-right: -58px;
    margin-top: -34px;
" name="btn_view" class="btn btn-default">View</button>
                                        </div>
                                        </form>
                                        <form action="<?php echo $BASE_URL;?>index_admin.php?page=save_stock_entry" method="post" enctype="multipart/form-data">
                                       
                                       <input type="hidden" name="stock_id2" value="<?php echo $id=$id_num+1; ?>" />
                                       
                                        <div class="form-group">
                                            <label>Product Name:</label>
                                            <input disabled="yes" type="text" name="product_name" value="<?php echo $product_name; ?>" min="0" class="form-control"/>
                                            <input type="hidden" name="product_id2" value="<?php echo $product_id2; ?>" />    
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description:</label>
                                            <textarea disabled="yes" class="form-control" name="product_description" rows="3"><?php echo $product_description; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Low Stock:</label>
                                            <input disabled="yes" type="number" name="low_stock" value="<?php echo $quantity; ?>" min="0" class="form-control"/>
                                            <input type="hidden" name="begin_inv" value="<?php echo $quantity; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Price:</label>
                                            <input disabled="yes" value="<?php echo $price; ?>" type="number" min="0" name="price" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Category:</label>
                                            <input disabled="yes" value="<?php echo $category_type; ?>" type="text" name="category" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                                <label for="">Status</label>
                                                <select id="" name="status_id" class="form-control">
                                                    <?php
                                                    include('config.php');
                                                    $sql_stat='SELECT * FROM `status_type`';
                                                    $qry_stat=mysqli_query($CON, $sql_stat) or die(mysqli_error($qry_stat));
                                                    while($row=mysqli_fetch_array($qry_stat)){
                                                        $status_type_id=$row['status_type_id'];
                                                        $status_type=$row['status_type'];
                                                    ?>
                                                    <option value="<?php echo $status_type_id; ?>"><?php echo $status_type; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Add Quantity:</label>
                                            <input type="number" min="0" name="stock_quantity" class="form-control"/>
                                        </div>
                                        <button type="submit" name="btn_add" class="btn btn-default">ADD</button>
                                        
                                    </form>
                                    <br/>
                                      
    </div>
                                
                                
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