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

<!--Image Picker-->
<!--<link href="./image-picker/image-picker.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery.min.js"></script>-->

<link href="./image-picker/image-picker.css" rel="stylesheet"/>

<?php
include('../config.php');
include('header.php');
include('side_bar.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];

$sql_prod='SELECT product.product_id, product.product_name, product.quantity, product.price, product.availability, product.category_id, category.category_type, product.image
                            FROM product
                            INNER JOIN category
                            ON category.category_id=product.category_id
                            WHERE category.category_id="'.$id.'"
                            ORDER BY product.product_name ASC';
                        $qry_prod=mysqli_query($CON, $sql_prod) or die(mysqli_error($qry_prod));
                        $category_type='';
                        while($row=mysqli_fetch_array($qry_prod)){
                            $product_id=$row['product_id'];
                            $product_name=$row['product_name'];
                            $price=$row['price'];
                            $availability=$row['availability'];
                            $image=$row['image'];
                            $category_type=$row['category_type'];
                            }
                        
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php echo $category_type; ?></h2>   
                        <h5>Tap Some the Menu of Items to Start the Order.</h5>
                    </div>
                    <div class="input-group" style="
    margin-left: 690px;
    margin-top: 10px;
">
                      <input type="text" name="search_table_or_guest" placeholder="Search Menu items..." class="form-control">
                      <span class="form-group input-group-btn">
                        <button type="submit" value="Search" name="btn_search" class="btn btn-default" style="
    margin-right: 10px;
">Search</button>
                      </span>
                      
                </div>
                </div>
                
                <br />
                
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">
                               
                        </div>
                                               
                        <div class="row">
                        <?php
                        include('../config.php');
                        /*$sql_prod='SELECT product.product_id, product.product_name, product.quantity, product.price, product.availability, product.category_id, category.category_type, product.image, product.set_type_id, set_type.set_type, product.tuple_class_id, tuple_class.tuple_class, product.size_class_id, size_class.inches
                            FROM product
                            INNER JOIN category
                            ON category.category_id=product.category_id
                            LEFT JOIN set_type
                            ON set_type.set_type_id=product.set_type_id
                            LEFT JOIN tuple_class
                            ON tuple_class.tuple_class_id=product.tuple_class_id
                            LEFT JOIN size_class
                            ON size_class.size_class_id=product.size_class_id
                            WHERE category.category_id="'.$id.'"
                            ORDER BY product.product_name ASC';*/
                        $sql_prod='SELECT product.product_id, product.product_name, product.quantity, product.price, product.availability, product.category_id, category.category_type, product.image

                            FROM product
                            INNER JOIN category
                            ON category.category_id=product.category_id
                            
                            WHERE category.category_id="'.$id.'"
                            ORDER BY product.product_name ASC';
                        $qry_prod=mysqli_query($CON, $sql_prod) or die(mysqli_error($qry_prod));
                        while($row=mysqli_fetch_array($qry_prod)){
                            $product_id=$row['product_id'];
                            $product_name=$row['product_name'];
                            $price=$row['price'];
                            $availability=$row['availability'];
                            $image=$row['image'];
                            /*$set_type=$row['set_type'];
                            $tuple_class=$row['tuple_class'];
                            $inches=$row['inches'];*/
                            
                            /*if($set_type==$set_type || $tuple_class==$tuple_class || $inches==$inches){
                                $action=$set_type.'<br>'.$tuple_class.'<br>'.$inches;
                            }else{
                                $action='';
                            }*/
                            if($availability=='Not-Available'){
                                $val='';
                            }else{
                        ?>
                          <div class="column">
                            <a href="<?php echo './order_2.php?id='.$product_id; ?>"><img src="<?php echo '../images_3/upload/'.$image; ?>" alt="<?php echo $product_name; ?>" style="width: 202px" height="134px"></a>
                            <div class="image-text"><h4 style="text-align: center;"><?php echo $product_name; //.'<br>'.$action; ?></h4></div>
                          </div>
                         <?php
                            }   
                         }
                         ?>
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