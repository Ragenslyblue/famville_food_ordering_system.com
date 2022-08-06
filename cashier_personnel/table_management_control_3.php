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
                /*background-color: <?php //echo $color; ?>;*/
                /*background-color: yellow;*/
            }
            p{
                text-align: center;
            }
            
</style>              

<select name="table_number_id[]" class="image-picker" multiple>
  <optgroup label="">
  <?php
  include('config.php');

$area_type_id=mysqli_real_escape_string($CON, $_POST['area_type_id']);
$search_table_or_guest=mysqli_real_escape_string($CON, $_POST['search_table_or_guest']);

  $sql_picker='SELECT guest_seated.guest_seated_id, guest_seated.guest_id, guest.first_name, guest.last_name, guest_seated.num_guest_id, num_guests.num_guests, guest_seated.table_number_id, table_number.table_number_capacity, table_number.availability, guest_seated.status, table_number.area_type_id, area_type.area_type, table_number.number_of_seats, area_type.image
    FROM guest_seated
    INNER JOIN guest
    ON guest.guest_id=guest_seated.guest_id
    INNER JOIN num_guests
    ON num_guests.num_guests_id=guest_seated.num_guest_id
    INNER JOIN table_number
    ON table_number.table_number_id
    =guest_seated.table_number_id
    INNER JOIN area_type
    ON area_type.area_type_id=table_number.area_type_id
    WHERE guest.first_name="'.$search_table_or_guest.'" OR table_number.table_number_capacity="'.$search_table_or_guest.'" OR area_type.area_type_id="'.$area_type_id.'"';
  $qry_image=mysqli_query($CON, $sql_picker) or die(mysqli_error($qry_image));
  while($row=mysqli_fetch_array($qry_image)){
      $guest_seated_id=$row['table_number_id'];
      $table_number_capacity=$row['table_number_capacity'];
      $area_type_id5=$row['area_type_id'];
      $area_type=$row['area_type'];
      $number_of_seats=$row['number_of_seats'];
      $availability=$row['availability'];
      $image2=$row['image'];
     
  ?>
  <option data-img-src="<?php echo 'images_2/upload/'.$image2; ?>"   
          data-img-label='<?php echo $table_number_capacity.'<br>'.$availability; ?>'
          data-img-class="custom-class"
          data-img-alt="image alt"
          value='<?php echo $guest_seated_id; ?>'><?php echo $table_number_capacity; ?>
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
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                In-use
                            </button>
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Damage
                            </button>
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Reset
                            </button>
                            <!--<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Fire
                            </button>-->
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