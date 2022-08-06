<!-- BOOTSTRAP STYLES-->
<link href="../assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="../assets/css/font-awesome.css" rel="stylesheet" />
<!-- MORRIS CHART STYLES-->
<link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="../assets/css/custom.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../assets/css/css_table_image.css" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<?php
include('../config.php');

include('header.php');
include('side_bar.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    /*$sql_waiter='SELECT assigned_tables.assigned_tables_id, assigned_tables.area_type_id, area_type.area_type, assigned_tables.user_id, user.first_name, user.last_name, assigned_tables.table_number_area_id, table_number_area.table_numbers, assigned_tables.status, assigned_tables.action
                                            FROM assigned_tables
                                            INNER JOIN area_type
                                            ON area_type.area_type_id=assigned_tables.area_type_id
                                            INNER JOIN user
                                            ON user.user_id=assigned_tables.user_id
                                            INNER JOIN table_number_area
                                            ON table_number_area.table_number_area_id=assigned_tables.table_number_area_id
                                            WHERE assigned_tables.assigned_tables_id="'.$id.'"';*/
    $sql_waiter='SELECT assigned_tables.assigned_tables_id, assigned_tables.area_type_id, area_type.area_type, assigned_tables.user_id, user.first_name, user.last_name, assigned_tables.table_number_id, table_number.table_number_capacity, assigned_tables.action, assigned_tables.status
        FROM assigned_tables
        INNER JOIN area_type
        ON area_type.area_type_id=assigned_tables.area_type_id
        INNER JOIN user
        ON user.user_id=assigned_tables.user_id
        INNER JOIN table_number
        ON table_number.table_number_id=assigned_tables.table_number_id
        WHERE assigned_tables.assigned_tables_id="'.$id.'"';
    $qry_waiter=mysqli_query($CON, $sql_waiter) or die(mysqli_error($qry_waiter));
    while($row=mysqli_fetch_array($qry_waiter)){
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        $status=$row['status'];
        $action=$row['action'];
    }
}
if(isset($_POST['btn_update'])){
    $user_attendee_type_id=mysqli_real_escape_string($CON, $_POST['user_attendee_type_id']);    
    $status=mysqli_real_escape_string($CON, $_POST['status']);
    $action=mysqli_real_escape_string($CON, $_POST['action']);
    
    if($user_attendee_type_id==2){
        $action2='In-Active';
    }elseif($user_attendee_type_id==1){
        $action2='Active';
    }else{
        $action2='Remove';
    }
    if($user_attendee_type_id==2){
        $action_stat='Un-Assigned';
    }else{
        $action_stat='Assigned';
    }
    
    $sql_update='UPDATE `assigned_tables` SET `status`="'.$action2.'",`action`="'.$action_stat.'" 
        WHERE assigned_tables.assigned_tables_id="'.$id.'"';
    $qry_update=mysqli_query($CON, $sql_update) or die(mysqli_error($qry_update));
    if($qry_update){
        echo '<h1>Successfully Updated!!!</h1>';
        die();
    }
}
?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Assign Tables</h2>   
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
                            <div class="row">
                                <div class="col-md-6">
                                    <!--<h3>Basic Form Examples</h3>-->
                                    <form action="" method="post" enctype="multipart/form-data">
                                    
                                    <div class="form-group">
                                            <label><h3>Waiter Name:</h3></label>
                                            <input type="text" value="<?php echo $first_name.' '.$last_name; ?>" name="waiter_name" class="form-control"/>
                                        </div>
                                        
                                        <input type="hidden" name="status" value="<?php echo $status; ?>" />
                                        <input type="hidden" name="action" value="<?php echo $action; ?>" />
                                       
                                        <div class="form-group">
                                                <label for="">Action:</label>
                                                <select id="" name="user_attendee_type_id" class="form-control" style="
    width: 205%;">
                                                    <option value="0">Please select</option>
                                                    <?php
                                                    include('config.php');
                                                    $sql_present='SELECT * FROM `user_attendee_type`';
                                                    $qry_present=mysqli_query($CON, $sql_present) or die(mysqli_error($qry_present));
                                                    while($row=mysqli_fetch_array($qry_present)){
                                                        $user_attendee_type_id=$row['user_attendee_type_id'];
                                                        $user_attendee_type=$row['user_attendee_type'];
                                                    ?>
                                                    <option value="<?php echo $user_attendee_type_id; ?>"><?php echo $user_attendee_type; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        
                                        
                                        
                                        <button type="submit" name="btn_update" class="btn btn-default">UPDATE</button>

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
<?php
include('footer.php');
?>