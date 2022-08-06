<?php
include('config.php');

$btn_save=mysqli_real_escape_string($CON, $_POST['btn_save']);
$table_number_id=mysqli_real_escape_string($CON, $_POST['table_number_id']);
$area_type_id=mysqli_real_escape_string($CON, $_POST['area_type_id']);

if($btn_save=='SAVE'){
    $action_added='Added';

foreach($_POST['select_two'] as $table_codes){
     echo '<input type="hidden" value="'.$table_codes.'" />';
        
foreach($_POST['select_one'] as $table_num){
     echo '<input type="hidden" value="'.$table_num.'" />';
         
$sql_dup2='SELECT * FROM `table_number_area` WHERE table_number_area.table_code_num_id="'.$table_codes.'" OR table_number_area.table_numbers="'.$table_num.'"';
$qry_dup2=mysqli_query($CON, $sql_dup2) or die(mysqli_error($qry_dup2));
if(mysqli_num_rows($qry_dup2)==0){

/*$sql_dup2='SELECT * FROM `table_number_area` WHERE table_number_area.table_code_num_id="'.$table_codes.'" AND table_number_area.status="Added" AND table_number_area.table_numbers="'.$table_num.'"';
$qry_dup2=mysqli_query($CON, $sql_dup2) or die(mysqli_error($qry_dup2));
if(mysqli_num_rows($qry_dup2)==0){*/
    
/*$sql_dup2='SELECT DISTINCT table_number_area.table_code_num_id
    FROM table_number_area';
$qry_dup2=mysqli_query($CON, $sql_dup2) or die(mysqli_error($qry_dup2));
if(mysqli_num_rows($qry_dup2)==0){*/
    
$sql='INSERT INTO `table_number_area`(table_number_id, `area_type_id`, `table_code_num_id`, `table_numbers`, `status`) 
    VALUES ("'.$table_number_id.'", "'.$area_type_id.'", "'.$table_codes.'", "'.$table_num.'", "'.$action_added.'")';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
            }
        }
    }
}

?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Table Number</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr>
            <form action="<?php echo $BASE_URL;?>index_admin.php?page=save_table_number_3" method="post" enctype="multipart/form-data">
            
            <div class="panel-body">
                            <div class="table-responsive">
                            <?php
                            include('config.php');
                            
                            $sql_images_id='SELECT * FROM `table_number_area`';
                            $qry_images_id=mysqli_query($CON, $sql_images_id) or die(mysqli_error($qry_images_id));
                            while($row=mysqli_fetch_array($qry_images_id)){
                                $table_number_area_id=$row['table_number_area_id'];
                            ?>
                            <input type="hidden" name="txtImage_id[]" value="<?php echo $table_number_area_id; ?>" />
                            <?php
                            }
                            ?>
                               
                            </div>
                        </div>
            
            <div class="panel panel-default">
                       
                        <div class="form-group">
                            <label>Table Type Image (Select Only .png file):</label>
                            <input type="file" name="table_image"/>
                        </div>
           </div>
           
           <button type="submit" name="btn_save" value="SAVE" class="btn btn-default">SAVE</button>
           
           </form>
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>