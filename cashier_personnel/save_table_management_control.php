<?php
include('config.php');

@$btn_in_use=mysqli_real_escape_string($CON, $_POST['btn_in_use']);
@$btn_reset=mysqli_real_escape_string($CON, $_POST['btn_reset']);

if($btn_in_use=='In-use'){
    $availables='In-use';
}elseif($btn_reset=='Reset'){
    $availables='Available';
}

foreach($_POST['table_number_id'] as $table_number_id3){
    echo $table_number_id3;
    
    $sql_tables='UPDATE `table_number` SET `availability`="'.$availables.'" 
        WHERE table_number.table_number_id="'.$table_number_id3.'"';
    $qry_tables=mysqli_query($CON, $sql_tables) or die(mysqli_error($qry_tables));
    //}
}

foreach($_POST['table_number_id'] as $table_number_id3){
    echo $table_number_id3;

$sql_select_in_use='SELECT table_number.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, table_number.area_type_id, area_type.area_type, table_number.availability
    FROM table_number
    INNER JOIN area_type
    ON area_type.area_type_id=table_number.area_type_id
    WHERE table_number.table_number_id="'.$table_number_id3.'"';
$qry_select_in_use=mysqli_query($CON, $sql_select_in_use) or die(mysqli_error($qry_select_in_use));
while($row=mysqli_fetch_array($qry_select_in_use)){
    $table_number_id13=$row['table_number_id'];
    $table_code_num_id=$row['table_code_num_id'];
    $table_number_capacity=$row['table_number_capacity'];
    $area_type=$row['area_type'];
    $availability=$row['availability'];
    
    
    }
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>The Selected tables has been <?php echo $availability; ?>..</h2>   
                        <!--<h5>Welcome Jhon Deo , Love to see you back. </h5>-->
                      <h3>Table Number: 
                      <?php
                      foreach($_POST['table_number_id'] as $table_number_id3){
                            //echo $table_number_id3;
                            echo '<input type="hidden" value="'.$table_number_id3.'" />';
                            
                        $sql_select_in_use='SELECT table_number.table_number_id, table_number.table_code_num_id, table_number.table_number_capacity, table_number.area_type_id, area_type.area_type, table_number.availability
                            FROM table_number
                            INNER JOIN area_type
                            ON area_type.area_type_id=table_number.area_type_id
                            WHERE table_number.table_number_id="'.$table_number_id3.'"';
                        $qry_select_in_use=mysqli_query($CON, $sql_select_in_use) or die(mysqli_error($qry_select_in_use));
                        while($row=mysqli_fetch_array($qry_select_in_use)){
                            $table_number_id13=$row['table_number_id'];
                            $table_code_num_id=$row['table_code_num_id'];
                            $table_number_capacity=$row['table_number_capacity'];
                            $area_type=$row['area_type'];
                            $availability=$row['availability'];
                         
                      ?>
                      <?php echo $table_number_capacity.','; ?>
                      <?php
                         }
                        }
                      ?>
                      </h3><br />
                      <h3>Are Type: <?php echo $area_type; ?></h3><br />
                      <h3>Status: <?php echo $availability; ?></h3>
                      
                </div>
                    </div>
                    
                </div>
                
                <br />
                
                 <!-- /. ROW  -->
                 <hr>
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    
                     <!-- End Form Elements -->
                </div>
            </div>
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>