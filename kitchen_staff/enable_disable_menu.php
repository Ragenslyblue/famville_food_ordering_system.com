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
<link href="../image-picker/image-picker.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery.min.js"></script>

<link href="../image-picker/image-picker.css" rel="stylesheet"/>

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
                    <form action="../index_kitchen_staff.php?page=save_enable_disable_menu" method="post" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">
                               
                        </div>
                                               
                        <div class="row">
                        
                        </div>
                        
<style type="text/css">
            .thumbnails li img{
                width: 202px;
                height: 134px;
            }
            p{
                text-align: center;
            }
            /*.custom-class{background-color: yellow;}*/
</style>

<select id="box" id="colors" onChange="changeBackground()" name="product_id[]" class="image-picker" multiple>
  <optgroup label="">
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
                        $sql_prod='SELECT product.product_id, product.product_name, product.quantity, product.price, product.availability, product.category_id, category.category_type, product.image, product.set_type_id 
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
                            //$set_type=$row['set_type'];
                            //$tuple_class=$row['tuple_class'];
                            //$inches=$row['inches'];
                            
                            $sql_stat='SELECT product.product_id, product.product_name, product.status_type_id, status_type.status_type, product.category_id, category.category_type
                                FROM product
                                INNER JOIN status_type
                                ON status_type.status_type_id=product.status_type_id
                                INNER JOIN category
                                ON category.category_id=product.category_id
                                WHERE category.category_id="'.$id.'"';
                            $qry_stat=mysqli_query($CON, $sql_stat) or die(mysqli_error($qry_stat));
                            while($row=mysqli_fetch_array($qry_stat)){
                                $product_id2=$row['product_id'];
                                $product_name2=$row['product_name'];
                                $status_type_id=$row['status_type_id'];
                                $status_type=$row['status_type'];
                            }
                            
                            /*if($set_type==$set_type || $tuple_class==$tuple_class || $inches==$inches){
                                $action=$set_type.'<br>'.$tuple_class.'<br>'.$inches;
                            }else{
                                $action='';
                            }*/
                            /*if($status_type=='Disabled'){
                                $val='disabled';
                            }else{*/
        ?>
  <option data-img-src="<?php echo '../images_3/upload/'.$image; ?>"   
          data-img-label='<?php echo $product_name.'<br>'.$status_type; ?>'
          data-img-class="custom-class"
          data-img-alt="<?php echo $product_name; ?>"
          value='<?php echo $product_id; ?>'><?php echo $product_name.'<br>'.$status_type;//'.'<br>'.$action; ?>
   </option>
                        <?php
                                //}   
                            //}
                         }
                         ?>
  </optgroup>
</select>

<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="../image-picker/image-picker.js"></script>
<script src="../image-picker/image-picker.min.js"></script>

<script>
$(".image-picker").imagepicker({

  // show/hide the regular select box
  hide_select: true,

  // show/hide image labels
  show_label: true,

  // callback functions
  initialized: undefined,
  changed: undefined,
  clicked: undefined,
  selected: undefined,

  // set the max number of selectable options 
  limit: undefined,

  // called when the limit cap has been reached
  limit_reached: undefined,

  // using Font Awesome icons instead
  font_awesome: true
  
})
</script>



                        <div class="wrapper" style="
    display:  list-item;
    margin-left: -10px;
">
                            
                            
                            <button type="submit" name="btn_enable" value="Enable" class="btn btn-primary btn-lg"  data-target="#myModal">
                                Enable
                            </button>
                            <button type="submit" name="btn_disable" value="Disable" class="btn btn-primary btn-lg"  data-target="#myModal">
                                Disable
                            </button>
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