<?php
include('config.php');

$sql='SELECT * FROM `product_num`';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
while($row=mysqli_fetch_array($qry)){
    $product_num_id=$row['product_num_id'];
    $product_num=$row['product_num'];
}
//echo $product_num;
if(mysqli_num_rows($qry)==1){
   $sql2='SELECT * FROM `product`';
   $qry2=mysqli_query($CON, $sql2) or die(mysqli_error($qry2));
   $id_num=0;
   while($row=mysqli_fetch_array($qry2)){
    $product_id=$row['product_id'];
   
    $date=date('d');
    $num_rows2=mysqli_num_rows($qry2);
    $val=$date.($num_rows2+$product_num); 
    $str_id=str_pad($val, 1, 1, STR_PAD_LEFT);
    $id_num=$str_id+1;
    }
}
//$num_rows=mysqli_num_rows($qry)==1;

?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Products</h2>   
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
                                    <form action="<?php echo $BASE_URL;?>index_admin.php?page=save_products" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Product ID:</label>
                                            <input disabled="yes" value="<?php echo $id=$id_num+1; ?>" class="form-control"/>
                                            <input type="hidden" name="product_id2" value="<?php echo $id=$id_num+1; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Product Name:</label>
                                            <input type="text" name="product_name" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description:</label>
                                            <textarea class="form-control" name="product_description" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Quantity:</label>
                                            <input type="number" name="quantity" value="" min="0" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Price:</label>
                                            <input type="number" min="0" name="price" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                                <label for="">Category:</label>
                                                <select id="" name="category_id" class="form-control">
                                                    <option value="0">Please select</option>
                                                    <?php
                                                    include('config.php');
                                                    $sql_cat_id='SELECT * FROM `category`';
                                                    $qry_cat_id=mysqli_query($CON, $sql_cat_id) or die(mysqli_error($qry_cat_id));
                                                    while($row=mysqli_fetch_array($qry_cat_id)){
                                                        $category_id=$row['category_id'];
                                                        $category_type=$row['category_type'];
                                                    
                                                    ?>
                                                    <option value="<?php echo $category_id; ?>"><?php echo $category_type; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Image:</label>
                                            <input type="file" name="product_image"/>
                                        </div>
                                        <!--<div class="form-group">
                                                <label for="">Set:</label>
                                                <select id="" name="set_id" class="form-control">
                                                    <option value="0">Please select</option>
                                                    <?php
                                                    /*include('config.php');
                                                    $sql_set='SELECT * FROM `set_type`';
                                                    $qry_set=mysqli_query($CON, $sql_set) or die(mysqli_error($qry_set));
                                                    while($row=mysqli_fetch_array($qry_set)){
                                                        $set_type_id=$row['set_type_id'];
                                                        $set_type=$row['set_type'];*/
                                                    ?>
                                                    <option value="<?php // echo $set_type_id; ?>"><?php //echo $set_type; ?></option>
                                                    <?php
                                                   // }
                                                    ?>
                                                </select>
                                        </div>-->
                                        <!--<div class="form-group">
                                                <label for="">Tuple Class:</label>
                                                <select id="" name="tuple_id" class="form-control">
                                                    <option value="0">Please select</option>
                                                    <?php 
                                                    /*include('config.php');
                                                    $sql_tup='SELECT * FROM `tuple_class`';
                                                    $qry_tup=mysqli_query($CON, $sql_tup) or die(mysqli_error($qry_tup));
                                                    while($row=mysqli_fetch_array($qry_tup)){
                                                        $pasta_type_id=$row['tuple_class_id'];
                                                        $pasta_type=$row['tuple_class'];*/
                                                    ?>
                                                    <option value="<?php //echo $pasta_type_id?>"><?php //echo $pasta_type; ?></option>
                                                    <?php
                                                   // }
                                                    ?>
                                                </select>
                                        </div>-->
                                        
                                        <!--<div class="form-group">
                                                <label for="">Size Class:</label>
                                                <select id="" name="size" class="form-control">
                                                    <option value="0">Please select</option>
                                                    <?php
                                                    /*include('config.php');
                                                    $sql_size='SELECT * FROM `size_class`';
                                                    $qry_size=mysqli_query($CON, $sql_size) or die(mysqli_error($qry_size));
                                                    while($row=mysqli_fetch_array($qry_size)){
                                                        $pizza_inches_id=$row['size_class_id'];
                                                        $inches=$row['inches'];*/
                                                    ?>
                                                    <option value="<?php //echo $pizza_inches_id; ?>"><?php //echo $inches; ?></option>
                                                    <?php
                                                   // }
                                                    ?>
                                                </select>
                                        </div>-->
                                        
                                        <div class="form-group">
                                                <label for="">Status</label>
                                                <select id="" name="status_id" class="form-control">
                                                    <option value="0">Please select</option>
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
                                        
                                        <button type="submit" name="btn_save" class="btn btn-default">SAVE</button>
                                        <!--<button type="reset" class="btn btn-primary">Reset Button</button>-->

                                    </form>
                                    <br/>
                                      
    </div>
                                
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Product Lists
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Category</th>
                                            <!--<th>Status</th>-->
                                            <th>Availability</th>
                                            <th>Date Added</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql_product='SELECT product.product_id, product.product_num_id, product.product_name, product.price, product.image, product.category_id, category.category_type, product.status_type_id, status_type.status_type, product.availability, product.date_added
                                        FROM product
                                        INNER JOIN category
                                        ON category.category_id=product.category_id
                                        INNER JOIN status_type
                                        ON status_type.status_type_id=product.status_type_id
                                        ORDER BY product.product_num_id DESC';
                                    $qry_product=mysqli_query($CON, $sql_product) or die(mysqli_error($qry_product));
                                    while($row=mysqli_fetch_array($qry_product)){
                                        $product_id=$row['product_id'];
                                        $product_num_id=$row['product_num_id'];
                                        $product_name=$row['product_name'];
                                        $price=$row['price'];
                                        $image=$row['image'];
                                        $category_type=$row['category_type'];
                                        $status_type=$row['status_type'];
                                        $availability=$row['availability'];
                                        $date_added=$row['date_added'];
                                    ?>
                                        <tr class="success">
                                            <td><?php echo $product_num_id; ?></td>
                                            <td><?php echo $product_name; ?></td>
                                            <td><?php echo $price; ?></td>
                                            <td><img src="<?php echo './images_3/upload/'.$image; ?>" width="100px" height="100px" /></td>
                                            <td><?php echo $category_type; ?></td>
                                            <!--<td><?php //echo $status_type; ?></td>-->
                                            <td><?php echo $availability; ?></td>
                                            <td><?php echo $date_added; ?></td>
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>