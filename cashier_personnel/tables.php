<?php
include('config.php');

$guest_id=mysqli_real_escape_string($CON, $_POST['guest_id']);
$date_time=mysqli_real_escape_string($CON, $_POST['date_time']);
$guest_number_seating=mysqli_real_escape_string($CON, $_POST['guest_number_seating']);
$area_type_id=mysqli_real_escape_string($CON, $_POST['area_type_id']);


$sql_dup='SELECT * FROM `num_guests` WHERE num_guests.num_guests="'.$guest_number_seating.'"';
$qry_dup=mysqli_query($CON, $sql_dup) or die(mysqli_error($qry_dup));
if(mysqli_num_rows($qry_dup)==0){
    
$sql_ins='INSERT INTO `num_guests`(`num_guests`, `guest_id`, `date_time`, `area_type_id`) 
    VALUES ("'.$guest_number_seating.'", "'.$guest_id.'", "'.$date_time.'", "'.$area_type_id.'")';
$qry_ins=mysqli_query($CON, $sql_ins) or die(mysqli_error($qry_ins));
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Tables</h2>   
                     
                    </div>
                </div>
                <br />
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=save_tables" method="post" enctype="multipart/form-data">
                    <div class="panel panel-default">
                        <div class="form-group">
                        <?php
                        include('config.php');
                        //echo $guest_id;
                        
                        $sql_table='SELECT num_guests.num_guests_id, num_guests.num_guests, num_guests.guest_id, guest.first_name, guest.last_name, num_guests.area_type_id, area_type.area_type
                            FROM  num_guests
                            INNER JOIN guest
                            ON guest.guest_id=num_guests.guest_id
                            INNER JOIN area_type
                            ON area_type.area_type_id=num_guests.area_type_id
                            WHERE guest.guest_id="'.$guest_id.'"';
                        $qry_table=mysqli_query($CON, $sql_table) or die(mysqli_error($qry_table));
                        while($row=mysqli_fetch_array($qry_table)){
                            $num_guests_id=$row['num_guests_id'];
                            $num_guests=$row['num_guests'];
                            $first_name=$row['first_name'];
                            $last_name=$row['last_name'];
                            $area_type=$row['area_type'];
                            $area_type_id=$row['area_type_id'];
                            $guest_id=$row['guest_id'];
                            
                            /*$sql_seated='SELECT table_number.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, table_number.area_type_id, area_type.area_type, area_type.image, table_number.number_of_seats, table_number.availability
                                FROM table_number
                                INNER JOIN area_type
                                ON area_type.area_type_id=table_number.area_type_id
                                WHERE area_type.area_type="'.$area_type.'"';*/
                            $sql_seated='SELECT table_number.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, table_number.area_type_id, area_type.area_type, area_type.image, table_number.number_of_seats, table_number.availability, table_number.status
                                FROM table_number
                                INNER JOIN area_type
                                ON area_type.area_type_id=table_number.area_type_id
                                WHERE area_type.area_type="'.$area_type.'"';
                            $qry_seated=mysqli_query($CON, $sql_seated) or die(mysqli_error($qry_seated));
                            while($row=mysqli_fetch_array($qry_seated)){
                                $table_number_id=$row['table_number_id'];
                                $number_of_seats=$row['number_of_seats'];
                                $area_type=$row['area_type'];
                                
                                $tables_seated=number_format(ceil($num_guests/$number_of_seats));
                            }
                        }
                        ?>
                        <input type="hidden" name="guest_id" value="<?php echo $guest_id; ?>" />
                        <input type="hidden" name="num_guests_id" value="<?php echo $num_guests_id; ?>" />
                                            <label>Area Type:</label>
                                            <label><?php echo $area_type; ?></label>
                                            &nbsp;|
                                            <label>Guest Name:</label>
                                            <label><?php echo $first_name.' '.$last_name; ?></label>
                                            &nbsp;|
                                            <label>Table/s to be Seated:</label>
                                            <label><?php echo $tables_seated; ?></label>
                                            &nbsp;|
                                            <label>Chair each Table:</label>
                                            <label><?php echo $number_of_seats; ?></label>
                                            &nbsp;|
                                            <label>Total Chairs:</label>
                                            <label><?php echo $num_guests; ?></label>
                            </div>
                        <div class="panel-heading">
                            
                        </div>
                             
                        <div class="row">
                        
<?php
/*include('config.php');
$color='#FFFF00';
echo $color;*/
?>      

<style type="text/css">
            .thumbnails li img{
                width: 202px;
                height: 134px;
                /*background-color: <?php //echo $color; ?>;*/
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
    WHERE table_number.area_type_id="'.$area_type_id.'"';
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
      if($area_type_id5!=$area_type_id){
        echo '<h1>Invalid Area</h1>';
      }else{
  
  ?>
  <option data-img-src="<?php echo 'images_2/upload/'.$image2; ?>"   
          data-img-label='<?php echo $table_number_capacity.'<br>'.$availability.'<br>'.$number_of_seats; ?>'
          data-img-class="<?php echo $class; ?>"
          data-img-alt="image alt"
          value='<?php echo $table_number_id; ?>'><?php echo $table_number_capacity; ?>
   </option>
  <?php
    }
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

                        <div class="wrapper">
                            <button name="btn_occupied" value="Occupied" class="btn btn-primary btn-lg" data-target="#myModal">
                                Occupy
                            </button>
                            <!--<button type="reset" name="btn_deny" value="Deny" class="btn btn-primary btn-lg" data-target="#myModal">
                                Deny
                            </button>-->
                            <input type="reset" name="btn_deny" value="Deny" class="btn btn-primary btn-lg" data-target="#myModal"/>
                        </div>
                        </form>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
