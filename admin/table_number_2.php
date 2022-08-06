<?php
include('config.php');

$tbl_code=mysqli_real_escape_string($CON, $_POST['tbl_code']);
$tables_capacity=mysqli_real_escape_string($CON, $_POST['tables_capacity']);

$sql_dup='SELECT * FROM `table_number` WHERE table_number.table_number_capacity="'.$tables_capacity.'"';
$qry_dup=mysqli_query($CON, $sql_dup) or die(mysqli_error($qry_dup));
if(mysqli_num_rows($qry_dup)==0){
    
$sql='INSERT INTO `table_number`(`table_code_num_id`, `table_number_capacity`) 
    VALUES ("'.$tbl_code.'", "'.$tables_capacity.'")';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
}
?>
<script language="JavaScript">
	function selectAll(source) {
		checkboxes = document.getElementsByName('select_one[]');
        for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
	}
    function selectAll2(source){
        checkboxes2 = document.getElementsByName('select_two[]');
        for(var z in checkboxes2)
			checkboxes2[z].checked = source.checked;
    }
    
    
</script>

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
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        
                        
                        
                        <div class="panel-body">
                        
                        <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Table Number Lists
                        </div>
                        <form action="<?php echo $BASE_URL;?>index_admin.php?page=save_table_number_2" method="post" enctype="multipart/form-data">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Table Code</th>
                                            <!--<th>Action <input type="checkbox" id="selectall" onClick="selectAll(this)" name="select_all" />--></th>
                                            <th>Table No.</th>
                                            <!--<th>Action<input type="checkbox" id="selectall2" onClick="selectAll2(this)" name="select_all" />--></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    $sql_table='SELECT * FROM `table_number`';
                                    $qry_table=mysqli_query($CON, $sql_table) or die(mysqli_error($qry_table));
                                    while($row=mysqli_fetch_array($qry_table)){
                                        $table_number_id=$row['table_number_id'];
                                        $table_code_num_id=$row['table_code_num_id'];
                                        $table_number_capacity=$row['table_number_capacity'];
                                        }
                                        for($i=1; $i<=$table_number_capacity; ++$i){
                                             $string_table='TBL-';
                                             $table_num=$string_table.($i);
                                             
                                             $table_codes=$table_code_num_id++;
                                             //$cap=++$table_number_capacity;
                                               
                                    ?>
                                        <tr class="success">
                                            <input type="hidden" name="table_number_id" value="<?php echo $table_number_id; ?>" />
                                            <td><?php echo $table_codes; ?></td>
                                            <!--<td><input type="text" name="select_two[]" value="<?php echo $table_codes; ?>" /></td>-->
                                            <td><?php echo $table_num; ?></td>
                                            <!--<td>
                                            <input type="text" name="select_one[]" value="<?php echo $table_num; ?>" />
                                            </td>-->
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                                    include('config.php');
                                    $sql_table='SELECT * FROM `table_number`';
                                    $qry_table=mysqli_query($CON, $sql_table) or die(mysqli_error($qry_table));
                                    while($row=mysqli_fetch_array($qry_table)){
                                        $table_number_id=$row['table_number_id'];
                                        $table_code_num_id=$row['table_code_num_id'];
                                        $table_number_capacity=$row['table_number_capacity'];
                                        }
                                        for($i=1; $i<=$table_number_capacity; ++$i){
                                             $string_table='TBL-';
                                             $table_num=$string_table.($i);
                                             
                                             $table_codes=++$table_code_num_id;
                                             //$cap=++$table_number_capacity;
                                               
                                    ?>
                                    <input type="hidden" name="select_two[]" value="<?php echo $table_codes; ?>" />
                                    <input type="hidden" name="select_one[]" value="<?php echo $table_num; ?>" />
                                    <?php
                                    }
                                    ?>
                        
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                                <label for="">Area Type:</label>
                                                <select id="" name="area_type_id" class="form-control">
                                                    <option value="0">Please select</option>
                                                    <?php
                                                    include('config.php');
                                                    $sql_areas='SELECT * FROM `area_type`';
                                                    $qry_areas=mysqli_query($CON, $sql_areas) or die(mysqli_error($qry_areas));
                                                    while($row=mysqli_fetch_array($qry_areas)){
                                                        $area_type_id=$row['area_type_id'];
                                                        $area_type=$row['area_type'];
                                                    ?>
                                                    <option value="<?php echo $area_type_id?>"><?php echo $area_type; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        
                                        <!--<div class="form-group">
                                            <label>Table Type Image (Select Only .png file):</label>
                                            <input type="file" name="table_image"/>
                                        </div>-->
                                        
                                        
                                        <button type="submit" value="SAVE" name="btn_save" class="btn btn-default">SAVE</button>

                                    </form>
                                    <br/>
                                      
    </div>
                                
                                
                            </div>
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