<?php
include('config.php');

@$area_type_id=mysqli_real_escape_string($CON, $_POST['area_type_id']);
@$search_table_or_guest=mysqli_real_escape_string($CON, $_POST['search_table_or_guest']);
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Table Management Control</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                      
                        <div class="input-group" style="
    margin-left: 690px;
    margin-top: -40px;
    
">
                      <span class="form-group input-group-btn">
                        
                      </span>
                </div>
                    </div>
                    
                </div>
                
                <br />
                
                <span class="form-group input-group-btn">
                        
                      </span>
                
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        
                        <div class="panel-heading">
                               
                        </div>
                                               
                        <div class="row">
                       
<style type="text/css">
            .thumbnails li img{
                width: 202px;
                height: 134px;
            }
            p{
                text-align: center;
            }
            .custom-class{background-color: yellow;}
            .in-use-class{background-color: blue;}
</style>              

<form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=save_table_management_control" method="post" enctype="multipart/form-data">

<select name="table_number_id[]" class="image-picker" multiple>
  <optgroup label="">
  <?php
  include('config.php');

$area_type_id=mysqli_real_escape_string($CON, $_POST['area_type_id']);
$search_table_or_guest=mysqli_real_escape_string($CON, $_POST['search_table_or_guest']);
  
  $sql_picker='SELECT table_number.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, table_number.area_type_id, area_type.area_type, area_type.image, table_number.number_of_seats, table_number.availability
    FROM table_number
    INNER JOIN area_type
    ON area_type.area_type_id=table_number.area_type_id
    WHERE area_type.area_type_id="'.$area_type_id.'"';
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
          data-img-label='<?php echo $area_type.'<br>'.$table_number_capacity.'<br>'./*$status;*/ $availability; ?>'
          data-img-class="<?php echo $class; ?>"
          data-img-alt="<?php echo $table_number_capacity; ?>"
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
    margin-left: -38px;
">
                            <button class="btn btn-primary btn-lg" name="btn_in_use" value="In-use" data-target="#myModal">
                                In-use
                            </button>
                            <!--<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Damage
                            </button>-->
                            <button class="btn btn-primary btn-lg" name="btn_reset" value="Reset" data-target="#myModal">
                                Reset
                            </button>
                            <!--<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Fire
                            </button>-->
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