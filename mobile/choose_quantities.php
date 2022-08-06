<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!--<link rel="stylesheet" type="text/css" href="assets/css/css_table_image.css" />-->
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <!-- TABLE STYLES-->
    <link href="../assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

<?php
include('../config.php');
include('header.php');

if(isset($_GET['ids_selected'])){
    $ids_selected=$_GET['ids_selected'];
    
    $sql_prod='SELECT product.product_id, product.product_name, product.quantity, product.category_id, category.category_type, product.image, product.price, product.product_description
                            FROM product
                            INNER JOIN category
                            ON category.category_id=product.category_id
                            WHERE product.product_id="'.$ids_selected.'"';
    $qry_prod=mysqli_query($CON, $sql_prod) or die(mysqli_error($qry_prod));
    while($row=mysqli_fetch_array($qry_prod)){
        $product_id=$row['product_id'];
        $product_name=$row['product_name'];
        $quantity=$row['quantity'];
        $category_type=$row['category_type'];
        $image=$row['image'];
        $price=$row['price'];
        $product_description=$row['product_description'];
    }
}

$sql_order_types='SELECT * FROM `order_type`
    WHERE order_type.order_type="Dine-In"';
$qry_order_types=mysqli_query($CON, $sql_order_types) or die(mysqli_error($qry_order_types));
while($row=mysqli_fetch_array($qry_order_types)){
    $order_type_id=$row['order_type_id'];
    $order_type=$row['order_type'];
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Choose Quantity</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements --><!--mobile/add_to_orders-->
                    <form action="../index_mobile_app.php?page=add_to_orders" method="post" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <!--<div class="panel-heading">
                        
                        </div>-->
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>" />
                            <input type="hidden" name="id_nums" value="<?php echo $ids_selected; ?>" />
                            <input type="hidden" name="order_type" value="<?php echo $order_type_id; ?>" />
                        <div class="panel-body">
                            <div class="row" style="
    margin-left: 3px;
    margin-top: 10px;
">
                                <div class="col-md-6">
                                        <div class="column">
                                            <a href=""><img src="<?php echo '../images_3/upload/'.$image; ?>" alt="Mountains" style="width: 202px; height: 200px;" height="134px"></a>
                                            <div class="image-text"><h4 style="
    text-align: center;
    margin-left: -15px;
"><?php echo $product_name; ?></h4></div>
                                          </div>
                                          <p style="
    text-align: center;
    margin-right: 10px;
    padding: 5px;
">                                          
                                          Product Description: <?php echo $product_description; ?> 
                                          </p>
                                            
                                          <div class="form-group" style="
    margin-left: 30px;
    /* margin-top: 0px; */
    display:  flex;
">
<style type="text/css">
::placeholder{
    color: white;
}
</style>

                                          <!--<button class="btn btn-primary btn-lg">-</button>-->
                                          <input type="number" placeholder="Qty." class="btn btn-primary btn-lg" required="" name="order_quantity" min="0" style="
    width: 100px;
    margin-left: 18px;
" />
                                          <!--<button class="btn btn-primary btn-lg">+</button>-->
                                          </div>
                                            
                                          <div class="form-group" style="
    display: flex;
    margin-left: 30px;
">
                                            <!--<a href="<?php //echo $BASE_URL;?>index_mobile_app.php?page=menu_list" class="btn btn-primary btn-lg">Main Page</a>-->  
                                            <input type="submit" name="btnAdd_to_order" class="btn btn-primary btn-lg" value="Add to Order" />
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
<?php
include('footer.php');
?>