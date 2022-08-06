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

if(isset($_GET['ids'])){
    $ids=$_GET['ids'];
    
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Menu</h2>   
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
                                                
                        </div>-->
                        <?php
                        include('../config.php');
                        
                        $sql_products='SELECT product.product_id, product.product_name, product.quantity, product.category_id, category.category_type, product.image, product.price, product.product_description
                            FROM product
                            INNER JOIN category
                            ON category.category_id=product.category_id
                            WHERE product.product_id="'.$ids.'"';
                        $qry_products=mysqli_query($CON, $sql_products) or die(mysqli_error($qry_products));
                        while($row=mysqli_fetch_array($qry_products)){
                            $product_id=$row['product_id'];
                            $product_name=$row['product_name'];
                            $category_type=$row['category_type'];
                            $image=$row['image'];
                            $price=$row['price'];
                            $product_description=$row['product_description'];
                        }
                        ?>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label style="
    margin-left: 100px;
    margin-top: 10px;
"></label>              
                                        <div class="column" style="
    margin-left: 20px;
">
                                            <a href=""><img src="<?php echo '../images_3/upload/'.$image; ?>" alt="" style="width: 202px; height: 200px;" height="134px"></a>
                                            <div class="image-text"><h4 style="
    text-align: center;
    margin-left: -30px;
"><?php echo $product_name; ?></h4></div>
                                          </div>
                                         
                                          
                                          <div class="form-group" style="
    /* display: table-cell; */
    text-align: center;
    margin-left: -20px;
">
                                          <p style="
    padding: 10px;
">PHP <?php echo number_format($price); ?><br />
                                          Product Description: <?php echo $product_description; ?>
                                          </p>
                                          <input type="hidden" name="product_choosen" value="<?php echo $ids; ?>" />
                                          <a href="<?php echo 'choose_quantities.php?ids_selected='.$product_id.' '.$ids; ?>" class="btn btn-primary btn-lg">Order</a>
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
<?php
include('footer.php');
?>