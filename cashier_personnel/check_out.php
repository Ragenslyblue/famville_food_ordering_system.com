<div id="page-wrapper">
            <div id="page-inner">
                <!--<div class="row">
                    <div class="col-md-12">
                     <h2>Seat Table</h2>   
                        
                    </div>
                </div>-->
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <!--<div class="panel panel-default">-->
                        <div class="panel-heading">
                            
                        </div>
                        <!--<div class="panel-body">-->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <!--<ul class="nav nav-tabs">
                                <li class="active"><a href="#home" data-toggle="tab">All Tables</a>
                                </li>
                                <li class=""><a href="#profile" data-toggle="tab">Quick View</a>
                                </li>
                            </ul>-->

                            <div class="tab-content">
                                <!--<div class="tab-pane fade active in" id="home">
                                    <h4>All Tables Tab</h4>
                                    <?php
                                   /* include('config.php');
                                    
                                    $sql_tables_tab='SELECT DISTINCT table_number.table_number_capacity, order_kitchen.table_number_id, table_number.table_number_id, table_number.availability
                                        FROM order_kitchen
                                        INNER JOIN table_number
                                        ON table_number.table_number_id=order_kitchen.table_number_id 
                                        WHERE table_number.availability="Occupied"';
                                    $qry_tables_tab=mysqli_query($CON, $sql_tables_tab) or die(mysqli_error($qry_tables_tab));
                                    while($row=mysqli_fetch_array($qry_tables_tab)){
                                        $table_number_id=$row['table_number_id'];
                                        $availability=$row['availability'];
                                        $table_number_capacity=$row['table_number_capacity'];
                                        
                                    $sql_tables='SELECT order_bill_out.order_bill_out_id, order_bill_out.order_num_id, order_bill_out.date_time, order_bill_out.order_kitchen_id, order_kitchen.order_kitchen_id, order_kitchen.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, order_kitchen.order_type_id, order_type.order_type, order_kitchen.num_guests_id, num_guests.num_guests, order_kitchen.product_id, product.product_name, order_kitchen.order_quantity, order_kitchen.user_id, user.user_name, user.first_name, user.last_name, order_bill_out.sub_total, order_bill_out.billed_amount, order_bill_out.guest_id, order_bill_out.guest_id_num, guest.guest_num_id, guest.first_name, guest.last_name, guest.guest_num_id, order_bill_out.guest_id_num, guest.guest_num_id
                                            FROM order_bill_out
                                            INNER JOIN order_kitchen
                                            ON order_kitchen.order_kitchen_id=order_bill_out.order_kitchen_id
                                            INNER JOIN table_number
                                            ON table_number.table_number_id=order_kitchen.table_number_id
                                            INNER JOIN order_type
                                            ON order_type.order_type_id=order_kitchen.order_type_id
                                            INNER JOIN num_guests
                                            ON num_guests.num_guests_id=order_kitchen.num_guests_id
                                            INNER JOIN product
                                            ON product.product_id=order_kitchen.product_id
                                            INNER JOIN user
                                            ON user.user_id=order_kitchen.user_id
                                            INNER JOIN guest
                                            ON guest.guest_id=order_bill_out.guest_id';
                                            WHERE table_number.table_number_id="'.$table_number_id3.'"';
                                        $qry_tables=mysqli_query($CON, $sql_tables) or die(mysqli_error($qry_tables));
                                        while($row=mysqli_fetch_array($qry_tables)){
                                            $order_bill_out_id=$row['order_bill_out_id'];
                                            $first_name=$row['first_name'];
                                            $last_name=$row['last_name'];
                                            $guest_id_num=$row['guest_id_num'];
                                        }*/
                                    ?>
                                    <div class="form-group">
                                            <label><h3><?php //echo $first_name.' '.$last_name; ?></h3></label>
                                            <label><a href="<?php //echo 'cashier_personnel/group_by_single_table.php?id='.$order_bill_out_id; ?>" class="btn btn-primary btn-lg" style="
    margin-left: 207px;
">Open Table</a></label>
                                    </div>
                                    <div class="form-group">
                                            <label><h3><?php //echo $table_number_capacity; ?></h3></label>
                                            <label><a href="<?php //echo $BASE_URL;?>index_cashier_personnel.php?page=group_by_single_table" class="btn btn-primary btn-lg" style="
    margin-left: 300px;
">Open Table</a></label>
                                    </div>
                                    <?php
                                    //}
                                    ?>
                                    <div class="form-group">
                                            <label><h3>TBL 6</h3></label>
                                            <label><a href="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=group_by_single_table" class="btn btn-primary btn-lg" style="
    margin-left: 300px;
">Open Table</a></label>
                                    </div>
                                    <div class="form-group">
                                            <label><h3>TBL 8</h3></label>
                                            <label><a href="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=group_by_single_table" class="btn btn-primary btn-lg" style="
    margin-left: 300px;
">Open Table</a></label>
                                    </div>
                                    
                                </div>-->
                                <!--<div class="tab-pane fade" id="profile">-->
                                    <h4>Check-out Tab</h4>
                                    <div class="panel panel-default">
<form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=check_out_2" method="post" enctype="multipart/form-data">
                        <div class="input-group" style="
    margin-left: 690px;
    margin-top: 10px;
">
                      <input type="text" name="search_table_or_guest" placeholder="Search Guest..." class="form-control">
                      <span class="form-group input-group-btn">
                        <button type="submit" value="Search" name="btn_search" class="btn btn-default" style="
    margin-right: 10px;
">Search</button>
                      </span>
                      
                </div>
</form>
                <br />
                <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=check_out_2" method="post" enctype="multipart/form-data">
                <select class="form-control" name="area_type" style="
    width: 938px;
">
                <option value="0">Please Select Area Type...</option>
                        <?php
                        include('config.php');
                        $sql_vals='SELECT * FROM `area_type`';
                        $qry_vals=mysqli_query($CON, $sql_vals) or die(mysqli_error($qry_vals));
                        while($row=mysqli_fetch_array($qry_vals)){
                            $area_type_id=$row['area_type_id'];
                            $area_type=$row['area_type'];
                        ?>
                        <option value="<?php echo $area_type_id; ?>"><?php echo $area_type; ?></option>
                        <?php
                        }
                        ?>
                </select>
                <span class="form-group input-group-btn">
                        <button type="submit" name="btn_search_2" class="btn btn-default" style="
    float: right;
    margin-top: -34px;
">Search</button>
                      </span>
                </form>
                <br />
                        <div class="panel-heading">
               <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=group_by_single_table" method="post" enctype="multipart/form-data">       
                        </div>
                        
                                               
                        <div class="row">
                        
<style type="text/css">
            .thumbnails li img{
                width: 202px;
                height: 134px;
                /*background-color: blue;*/
                /*background-color: yellow;*/
            }
            p{
                text-align: center;
            }
            .custom-class{background-color: yellow;}
            .in-use-class{background-color: blue;}
</style>              

<select name="table_number_id[]" class="image-picker" multiple>
  <optgroup label="">
  <?php
  include('config.php');
  $sql_picker='SELECT table_number.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, table_number.area_type_id, area_type.area_type, area_type.image, table_number.number_of_seats, table_number.availability
    FROM table_number
    INNER JOIN area_type
    ON area_type.area_type_id=table_number.area_type_id
    WHERE area_type.area_type="bar"';
  $qry_image=mysqli_query($CON, $sql_picker) or die(mysqli_error($qry_image));
  while($row=mysqli_fetch_array($qry_image)){
      $table_number_id=$row['table_number_id'];
      $table_number_capacity=$row['table_number_capacity'];
      $area_type_id5=$row['area_type_id'];
      $area_type=$row['area_type'];
      $number_of_seats=$row['number_of_seats'];
      $availability=$row['availability'];
      $image2=$row['image'];
      
      $status='In-Progress';
      //$status='';
      $class='';
      if($availability=='In-use'){
        $class='in-use-class';
      }elseif($availability=='Occupied'){
        $class='custom-class';
      }elseif($availability=='Occupied'){
        $status='In-Progress';
      }elseif($availability=='In-use'){
        $class='in-use-class';
      }elseif($availability='Available'){
        $status='Available';
      }
      
  ?>
  <option data-img-src="<?php echo 'images_2/upload/'.$image2; ?>"   
          data-img-label='<?php echo $table_number_capacity.'<br>'.$availability;//$status; ?>'
          data-img-class="<?php echo $class; ?>"
          data-img-alt="image alt"
          value='<?php echo $table_number_id; ?>'><?php echo $table_number_capacity; ?>
   </option>
  <?php
  }
  ?>
  </optgroup>
</select>

<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="./image-picker/image-picker.js"></script>
<script src="./image-picker/image-picker.min.js"></script>

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
  font_awesome: false
  
})
</script>

                        </div>

                        <div class="wrapper" style="
    margin-left: -4px;
    display:  inline-flex;
">
                            
                            <button style="
    padding: 10px;
    margin-right: 14px;
    margin-left: -5px;
" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Check-out
                            </button>
                            
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Deny
                            </button>
                            
                        </div>
                    </div>
                                <!--</div>-->
                                
                            </div>
                        </div>
                    </div>
                        <!--</div>-->
                    <!--</div>-->
                    </form>
                     <!-- End Form Elements -->
                </div>
            </div>
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>