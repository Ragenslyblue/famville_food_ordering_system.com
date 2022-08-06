<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Open Table</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                     
                    </div>
                </div>
                <br />
                <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=open_table_click" method="post" enctype="multipart/form-data">
                <div class="input-group">
                      <input type="text" name="search_guest" placeholder="Search Guest..." class="form-control">
                      <span class="form-group input-group-btn">
                        <button type="submit" value="Search" class="btn btn-default" type="button">Search</button>
                      </span>
                </div>
                </form>
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <form action="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=open_table_2" method="post" enctype="multipart/form-data">
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

<script type="text/javascript">
function changeBackground() {
  var box = document.getElementById('box');
  var colors = document.getElementById('colors').value;
  //var textcolor = document.getElementById('textcolor').value;

  if (colors == "Occupied") {
    box.style.backgroundColor = "yellow"; // YELLOW + BLACK
    //box.style.color = "black";
  } 
</script>              

<select id="box" id="colors" name="table_number_id[]" class="image-picker" multiple>
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
          data-img-label='<?php echo $area_type.'<br>'.$table_number_capacity.'<br>'/*.$status;*/. $availability; ?>'
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
  font_awesome: true
  
})
</script>


                        </div>

                        <div class="wrapper" style="
    display:  list-item;
    margin-left: -82px;
">
                            
                            <!--<a href="<?php //echo $BASE_URL;?>index_cashier_personnel.php?page=open_table_2" class="btn btn-primary btn-lg" data-target="#myModal">Open Table</a>-->
                            <button type="submit" name="btn_open_tables" class="btn btn-primary btn-lg"  data-target="#myModal">
                                Open Table
                            </button>
                            <!--<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Move Table
                            </button>-->
                            <!--<button class="btn btn-primary btn-lg" data-target="#myModal">
                                Deny
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