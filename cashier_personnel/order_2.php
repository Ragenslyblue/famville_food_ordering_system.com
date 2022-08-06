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
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label style="
    margin-left: 270px;
"></label>              
                                        <?php
                                        include('../config.php');
                                        /*$sql_val='SELECT product.product_id, product.product_name, product.product_description, product.quantity, product.price, product.availability, product.category_id, category.category_type, product.image, product.status_type_id, status_type.status_type, product.set_type_id, set_type.set_type, product.tuple_class_id, tuple_class.tuple_class, product.size_class_id, size_class.inches, product.product_num_id, product.date_added
                                            FROM product
                                            LEFT JOIN category
                                            ON category.category_id=product.category_id
                                            LEFT JOIN status_type
                                            ON status_type.status_type_id=product.status_type_id
                                            LEFT JOIN set_type
                                            ON set_type.set_type_id=product.set_type_id
                                            LEFT JOIN tuple_class
                                            ON tuple_class.tuple_class_id=product.tuple_class_id
                                            LEFT JOIN size_class
                                            ON size_class.size_class_id=product.size_class_id
                                            WHERE product.product_id="'.$id.'"';*/
                                        $sql_val='SELECT product.product_id, product.product_name, product.product_description, product.quantity, product.price, product.availability, product.category_id, category.category_type, product.image, product.status_type_id, status_type.status_type,  product.product_num_id, product.date_added
                                            FROM product
                                            LEFT JOIN category
                                            ON category.category_id=product.category_id
                                            LEFT JOIN status_type
                                            ON status_type.status_type_id=product.status_type_id
                                            
                                            WHERE product.product_id="'.$id.'"';
                                        $qry_val=mysqli_query($CON, $sql_val) or die(mysqli_error($qry_val));
                                        while($row=mysqli_fetch_array($qry_val)){
                                            $product_id=$row['product_id'];
                                            $product_name=$row['product_name'];
                                            $price=$row['price'];
                                            $availability=$row['availability'];
                                            $image=$row['image'];
                                            $status_type=$row['status_type'];
                                            /*$set_type=$row['set_type'];
                                            $tuple_class=$row['tuple_class'];
                                            $inches=$row['inches'];*/
                                            $product_num_id=$row['product_num_id'];
                                            $product_description=$row['product_description'];
                                            
                                            /*if($set_type==$set_type || $tuple_class==$tuple_class || $inches==$inches){
                                                $action=$set_type.'<br>'.$tuple_class.'<br>'.$inches;
                                            }else{
                                                $action='';
                                            }*/
                                        }
                                        ?>
                                        <div class="column">
                                            <a href=""><img src="<?php echo '../images_3/upload/'.$image; ?>" alt="<?php echo $product_name; ?>" style="width: 202px; height: 200px;" height="134px"></a>
                                            <div class="image-text"><h4 style="text-align: center;"><?php echo $product_name;//.'<br>'.$action; ?></h4></div>
                                          </div>
                                         
                                          
                                          <div class="form-group" style="
    margin-left: 280px;
">
                                            <a href="<?php echo './choose_quantity.php?id='.$product_id;?>" class="btn btn-primary btn-lg">Order</a>
                                          </div>
                                          <p style="
    margin-top: 150px;
    padding: 34px;
">                                        <?php echo 'Php'.$price.'<br>'.$product_description; ?>
                                          </p>
                                            
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