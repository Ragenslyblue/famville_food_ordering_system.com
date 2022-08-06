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
    
    $sql2='SELECT product.product_id, product.product_num_id, product.product_name, product.product_description, product.quantity, product.price, product.category_id, category.category_type, product.status_type_id, status_type.status_type
        FROM product
        INNER JOIN category
        ON category.category_id=product.category_id
        INNER JOIN status_type
        ON status_type.status_type_id=product.status_type_id
        WHERE product.product_id="'.$id.'"';
    $qry2=mysqli_query($CON, $sql2) or die(mysqli_error($qry2));
    while($row=mysqli_fetch_array($qry2)){
        $product_id3=$row['product_id'];
        $product_num_id=$row['product_num_id'];
        $product_name=$row['product_name'];
        $product_description=$row['product_description'];
        $quantity=$row['quantity'];
        $price=$row['price'];
        $category_type=$row['category_type'];
        $status_type=$row['status_type'];
    }
}

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
global $product_num_id; 
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
                                    <!--<form action="" method="post" enctype="multipart/form-data">-->
                                        <form action="../index_admin.php?page=stock_in" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Stock ID:</label>
                                            <input disabled="yes" value="<?php echo $id=$id_num+1; ?>" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Product ID:</label>
                                            <input type="text" name="product_id" value="<?php echo $product_num_id; ?>" class="form-control"/>
                                            <!--<button type="submit" style="
    float: right;
    margin-right: -58px;
    margin-top: -34px;
" name="btn_view" class="btn btn-default">View</button>-->
                                        </div>
                                        <!--</form>-->
                                        
                                       <input type="hidden" name="stock_id2" value="<?php echo $id=$id_num+1; ?>" />
                                       
                                        <div class="form-group">
                                            <label>Product Name:</label>
                                            <input disabled="yes" type="text" name="product_name" value="<?php echo $product_name; ?>" min="0" class="form-control"/>
                                            <input type="hidden" name="product_id2" value="<?php echo $product_id3; ?>" />    
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description:</label>
                                            <textarea disabled="yes" class="form-control" name="product_description" rows="3"><?php echo $product_description; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Stock Quantity:</label>
                                            <input disabled="yes" type="number" name="quantity" value="<?php echo $quantity; ?>" min="0" class="form-control"/>
                                            <input type="hidden" name="quantity" value="<?php echo $quantity; ?>" min="0" class="form-control"/>
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
                                                    include('../config.php');
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
                                        <button type="submit" name="btn_add" value="ADD" class="btn btn-default">ADD</button>
                                        
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
            <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>

<?php
include('footer.php');
?>