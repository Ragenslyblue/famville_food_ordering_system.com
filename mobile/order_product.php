<?php
session_start();
?>
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

if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    
    /*$sql_select='SELECT product.product_id, product.product_name, product.quantity, product.category_id, category.category_type, product.image
                            FROM product
                            INNER JOIN category
                            ON category.category_id=product.category_id
                            WHERE product.category_id="'.$id.'"';
                        $qry_select=mysqli_query($CON, $sql_select) or die(mysqli_error($qry_select));
                        while($row=mysqli_fetch_array($qry_select)){
                            $product_id=$row['product_id'];
                            $product_name=$row['product_name'];
                            $category_type=$row['category_type'];
                            $image=$row['image'];
                            $quantity=$row['quantity'];
                            
                          }*/
    
}
?>
<div id="page-wrapper">
            <div id="page-inner"> 
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php //echo $category_type; ?></h2>   
                        <!--<h5>Tap Some the Menu of Items to Start the Order.</h5>-->
                    </div>
                    <!--<div class="input-group" style="
    padding: 13px;
">
                      <input type="text" name="search_table_or_guest" placeholder="Search Menu items..." class="form-control">
                      <span class="form-group input-group-btn">
                        <button type="submit" value="Search" name="btn_search" class="btn btn-default">Search</button>
                      </span>
                      
                </div>-->
                </div>
                
                <br />
                
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <!--<div class="panel panel-default">-->
                        <!--<div class="panel-heading">
                            
                        </div>-->
                                               
                        <div class="row" style="
    margin-left: 30px;
    margin-top: 10px;
">
                          <?php
                          $sql_select='SELECT product.product_id, product.product_name, product.quantity, product.category_id, category.category_type, product.image
                            FROM product
                            INNER JOIN category
                            ON category.category_id=product.category_id
                            WHERE product.category_id="'.$id.'"';
                        $qry_select=mysqli_query($CON, $sql_select) or die(mysqli_error($qry_select));
                        while($row=mysqli_fetch_array($qry_select)){
                            $product_id=$row['product_id'];
                            $product_name=$row['product_name'];
                            $category_type=$row['category_type'];
                            $image=$row['image'];
                            $quantity=$row['quantity'];
                            
                            if($quantity<=0){
                                echo '';
                            }else{
                                
                          ?>
                          <input type="hidden" name="table_number" value="<?php echo $id; ?>" />
                          <div class="column">
                            <a href="<?php echo 'order_product_2.php?ids='.$product_id.' '.$id;?>"><img src="<?php echo '../images_3/upload/'.$image; ?>" alt="" style="width: 202px" height="134px"></a>
                            <div class="image-text"><h4 style="
    text-align: center;
    margin-left: -60px;
"><?php echo $product_name; ?></h4></div>
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