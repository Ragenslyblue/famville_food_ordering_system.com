<?php
include('config.php');

$search_guest=mysqli_real_escape_string($CON, $_POST['search_guest']);

/*$sql='SELECT guest_seated.guest_seated_id, guest_seated.guest_id, guest.first_name, guest.last_name, guest_seated.num_guest_id, num_guests.num_guests, guest_seated.table_number_id, table_number.table_number_capacity, table_number.availability, guest_seated.status, table_number.area_type_id, area_type.area_type, table_number.number_of_seats
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
    WHERE guest.first_name="'.$search_guest.'" AND guest.last_name="'.$search_guest.'" AND table_number.availability="Occupied" AND guest_seated.status="In-Progress"';*/
$sql='SELECT guest_seated.guest_seated_id, guest_seated.guest_id, guest.first_name, guest.last_name, guest_seated.num_guest_id, num_guests.num_guests, guest_seated.table_number_id, table_number.table_number_capacity, table_number.availability, guest_seated.status, table_number.area_type_id, area_type.area_type, table_number.number_of_seats, guest.guest_num_id
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
    WHERE guest.guest_num_id="'.$search_guest.'" AND guest.first_name="'.$search_guest.'" AND table_number.availability="Occupied"';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
while($row=mysqli_fetch_array($qry)){
    $guest_seated_id=$row['guest_seated_id'];
    $guest_id=$row['guest_id'];
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $area_type=$row['area_type'];
    $number_of_seats=$row['number_of_seats'];
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                    <?php
                    include('config.php');
                    
                    if(mysqli_num_rows($qry)==0){
                        echo '<h1>Not Found...</h1>';  
                    }else{
                        
                    ?>
                     <h2>Open Table</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                     
                    </div>
                </div>
                <br />
                <!--<form action="" method="post" enctype="multipart/form-data">
                <div class="input-group">
                      <input type="text" placeholder="Search Guest..." class="form-control">
                      <span class="form-group input-group-btn">
                        <button class="btn btn-default" type="button">Search</button>
                      </span>
                </div>
                </form>-->
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="form-group">
                                            <label>Guest Name:</label>
                                            <label><?php echo $first_name.' '.$last_name; ?></label>
                                            &nbsp;|
                                            <label>Area Type:</label>
                                            <label><?php echo $area_type; ?></label>
                                            &nbsp;|
                                            <label>Chair each Table:</label>
                                            <label><?php echo $number_of_seats; ?></label>
                                            &nbsp;|
                                            <label>Total Chairs:</label>
                                            <label><?php echo $number_of_seats; ?></label>
                            </div>
                        <div class="panel-heading">
                            
                        </div>
                        
                                               
                        <div class="row">
                          <!--<div class="column">
                            <img src="images/ragen_bar.png" alt="Snow" style="width: 202px; background-color: yellow;"  height="134px">
                            <div class="image-text"><h4 style="text-align: center;">Some text in here</h4></div>
                          </div>
                          <div class="column">
                            <img src="images/ragen_bar.png" alt="Forest" style="width: 202px; background-color: blue;" height="134px">
                            <div class="image-text"><h4 style="text-align: center;">Some text in here</h4></div>
                          </div>
                          <div class="column">
                            <img src="images/ragen_bar.png" alt="Mountains" style="width: 202px; background-color: red;" height="134px">
                            <div class="image-text"><h4 style="text-align: center;">Some text in here</h4></div>
                          </div>-->
                          
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
            .custom-class{background-color: yellow;}
</style>              

<select name="table_number_id[]" class="image-picker" multiple>
  <optgroup label="">
  <?php
  include('config.php');
  /*$sql='SELECT guest_seated.guest_seated_id, guest_seated.guest_id, guest.first_name, guest.last_name, guest_seated.num_guest_id, num_guests.num_guests, guest_seated.table_number_id, table_number.table_number_capacity, table_number.availability, guest_seated.status, table_number.area_type_id, area_type.area_type, table_number.number_of_seats, area_type.image
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
    WHERE guest.first_name="'.$search_guest.'" AND guest.last_name="'.$search_guest.'" AND table_number.availability="Occupied" AND guest_seated.status="In-Progress"';*/
$sql='SELECT guest_seated.guest_seated_id, guest_seated.guest_id, guest.first_name, guest.last_name, guest_seated.num_guest_id, num_guests.num_guests, guest_seated.table_number_id, table_number.table_number_capacity, table_number.availability, guest_seated.status, table_number.area_type_id, area_type.area_type, table_number.number_of_seats, guest.guest_num_id
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
    WHERE guest.guest_num_id="'.$search_guest.'" AND guest.first_name="'.$search_guest.'" AND table_number.availability="Occupied"';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
while($row=mysqli_fetch_array($qry)){
    $guest_seated_id=$row['guest_seated_id'];
    $guest_id=$row['guest_id'];
    $first_name=$row['first_name'];
    $last_name=$row['last_name'];
    $area_type=$row['area_type'];
    $number_of_seats=$row['number_of_seats'];
    $image2=$row['image']; 
    $table_number_capacity=$row['table_number_capacity']; 
    $availability=$row['availability'];
    
    $class='';
    if($availability=='Occupied'){
        $class='custom-class';
    }
  ?>
  <option data-img-src="<?php echo 'images_2/upload/'.$image2; ?>"   
          data-img-label='<?php echo $area_type.'<br>'.$table_number_capacity.'<br>'.$availability; ?>'
          data-img-class="<?php echo $class; ?>"
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
  
});
</script>


                        </div>

                        <div class="wrapper" style="
    display:  list-item;
    margin-left: -82px;
">
                            
                            <a href="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=open_table_2" class="btn btn-primary btn-lg" data-target="#myModal">Open Table</a>
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Move Table
                            </button>
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Deny
                            </button>
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
}
?>