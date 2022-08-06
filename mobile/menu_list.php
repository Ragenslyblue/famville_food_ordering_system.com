<?php
include('header.php');

@$select_table_num=mysqli_real_escape_string($CON, $_POST['select_table_num']);
@$btn_ok=mysqli_real_escape_string($CON, $_POST['btn_ok']);

$sql_table='SELECT * FROM `table_number` 
    WHERE table_number.table_code_num_id="'.$select_table_num.'"';
$qry_table=mysqli_query($CON, $sql_table) or die(mysqli_error($qry_table));
while($row=mysqli_fetch_array($qry_table)){
    $table_number_id=$row['table_number_id'];
    $table_code_num_id=$row['table_code_num_id'];
}
if($btn_ok=='OK'){
    $status='Occupied';

$sql_insert_table='INSERT INTO `table_nums`(`table_number_id`, `status`) 
        VALUES ("'.$table_number_id.'", "'.$status.'")';
$qry_insert_table=mysqli_query($CON, $sql_insert_table) or die(mysqli_error($qry_insert_table));
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Menu Items</h2>   
                        <!--<h5>Tap Some the Category of Items to Start the Order.</h5>-->
                    </div>
                    <!--<div class="input-group" style="
    padding: 13px;
">
                      <input type="text" placeholder="Search Menu Items..." class="form-control">
                      <span class="form-group input-group-btn">
                        <button class="btn btn-default" type="button">Search</button>
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
                        include('config.php');
                        
                        $sql_cat='SELECT * FROM `category`';
                        $qry_cat=mysqli_query($CON, $sql_cat) or die(mysqli_error($qry_cat));
                        while($row=mysqli_fetch_array($qry_cat)){
                            $category_id=$row['category_id'];
                            $category_type=$row['category_type'];
                            $category_description=$row['category_description'];
                            $image=$row['image'];
                        ?>
                        <input type="hidden" name="table_numbers" value="<?php echo $select_table_num; ?>" />
                          <div class="column">
                            <a href="<?php echo 'mobile/order_product.php?id='.$category_id.' '.$select_table_num; ?>"><img src="<?php echo 'images_2/upload/'.$image; ?>" alt="<?php echo $category_type; ?>" style="width: 202px" height="134px"></a>
                            <div class="image-text"><h4 style="
    text-align: center;
    margin-left: -60px;
"><?php echo $category_type; ?></h4></div>
                          </div>
                        <?php
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