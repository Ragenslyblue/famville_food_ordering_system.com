<?php
include('config.php');

if(isset($_POST['btn_save'])){
    $username=mysqli_real_escape_string($CON, $_POST['username']);
    $password=mysqli_real_escape_string($CON, $_POST['password']);
    $first_name=mysqli_real_escape_string($CON, $_POST['first_name']);
    $last_name=mysqli_real_escape_string($CON, $_POST['last_name']);
    $user_group=mysqli_real_escape_string($CON, $_POST['user_group']);
    $email=mysqli_real_escape_string($CON, $_POST['email']);
    $cellphone_number=mysqli_real_escape_string($CON, $_POST['cellphone_number']);
    //$table_image=$_POST['table_image'];
    $status_type=mysqli_real_escape_string($CON, $_POST['status_type']);
        
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["table_image"]["name"]);
    $extension = end($temp);
    
    if (!isset($_FILES["table_image"])){ echo "null"; }
    if ((($_FILES["table_image"]["type"] == "image/gif")
    || ($_FILES["table_image"]["type"] == "image/jpeg")
    || ($_FILES["table_image"]["type"] == "image/jpg")
    || ($_FILES["table_image"]["type"] == "image/pjpeg")
    || ($_FILES["table_image"]["type"] == "image/x-png")
    || ($_FILES["table_image"]["type"] == "image/png"))
    && in_array($extension, $allowedExts)) {
      if ($_FILES["table_image"]["error"] > 0) {
        echo "Error: " . $_FILES["table_image"]["error"] . "<br>";
        die();
      } else {
        if (file_exists("./images_3/upload/" . $_FILES["table_image"]["name"])) {
          echo $_FILES["table_image"]["name"] . " already exists. ";
          die();
        } else {
          move_uploaded_file($_FILES["table_image"]["tmp_name"],
          "./images_3/upload/" . $_FILES["table_image"]["name"]);
          //echo "Stored in: " . "./image/upload/" . $_FILES["cover_picture"]["name"];
        }
      }
    } else {
        
      echo "Please select an image file.";
      die();
    }
    
    
    $table_image=$_FILES['table_image']['name'];
    if(!isset($table_image)){
    	echo "Please select cover picture.";
    	die();
    }
    
    $sql_stats_type='INSERT INTO `user`(`user_name`, `password`, `first_name`, `last_name`, `user_group_id`, `email_address`, `image`, `cellphone_number`, `status_type_id`) 
        VALUES ("'.$username.'", "'.$password.'", "'.$first_name.'", "'.$last_name.'", "'.$user_group.'", "'.$email.'", "'.$table_image.'", "'.$cellphone_number.'", "'.$status_type.'")';
    $qry_stats_type=mysqli_query($CON, $sql_stats_type) or die(mysqli_error($qry_stats_type));
    
}
?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Users</h2>   
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
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Username:</label>
                                            <input type="text" name="username" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" name="password" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>First Name:</label>
                                            <input type="text" name="first_name" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input type="text" name="last_name" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                                <label for="">User Group:</label>
                                                <select id="" name="user_group" class="form-control">
                                                    <option value="0">Please select</option>
                                                    <?php
                                                    include('config.php');
                                                    $sql='SELECT * FROM `user_groups`';
                                                    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
                                                    while($row=mysqli_fetch_array($qry)){
                                                        $user_groups_id=$row['user_groups_id'];
                                                        $user_groups=$row['user_groups'];
                                                    ?>
                                                    <option value="<?php echo $user_groups_id; ?>"><?php echo $user_groups; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address:</label>
                                            <input type="email" name="email" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Cellphone Number:</label>
                                            <input type="text" name="cellphone_number" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Image:</label>
                                            <input type="file" name="table_image"/>
                                        </div>
                                        <div class="form-group">
                                                <label for="">Status:</label>
                                                <select id="" name="status_type" class="form-control">
                                                    <option value="0">Please select</option>
                                                    <?php
                                                    include('config.php');
                                                    $sql_stats='SELECT * FROM `status_type`';
                                                    $qry_stats=mysqli_query($CON, $sql_stats) or die(mysqli_error($qry_stats));
                                                    while($row=mysqli_fetch_array($qry_stats)){
                                                        $status_type_id=$row['status_type_id'];
                                                        $status_type=$row['status_type'];
                                                    ?>
                                                    <option value="<?php echo $status_type_id; ?>"><?php echo $status_type; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                        </div>
                                        
                                        <button type="submit" name="btn_save" class="btn btn-default">SAVE</button>
                                        
                                    </form>
                                    <br/>
                                      
    </div>
                                
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Users List
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>
                                            <th>Username</th>
                                            <th>User Group</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Date Added</th>
                                            <th>Cellphone Number</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    
                                    $sql_val='SELECT user.user_id, user.user_name, user.user_group_id, user_groups.user_groups, user.image, user.status_type_id, status_type.status_type, user.date_added, user.cellphone_number
                                        FROM user
                                        INNER JOIN user_groups
                                        ON user_groups.user_groups_id=user.user_group_id
                                        INNER JOIN status_type
                                        ON status_type.status_type_id=user.status_type_id
                                        ORDER BY user.user_id ASC';
                                    $qry_val=mysqli_query($CON, $sql_val) or die(mysqli_error($qry_val));
                                    while($row=mysqli_fetch_array($qry_val)){
                                        $user_id=$row['user_id'];
                                        $user_name=$row['user_name'];
                                        $user_groups=$row['user_groups'];
                                        $image=$row['image'];
                                        $status_type=$row['status_type'];
                                        $date_added=$row['date_added'];
                                        $cellphone_number=$row['cellphone_number'];
                                    ?>
                                        <tr class="success">
                                            <td><?php echo $user_id; ?></td>
                                            <td><?php echo $user_name; ?></td>
                                            <td><?php echo $user_groups; ?></td>
                                            <td><img src="<?php echo './images_3/upload/'.$image; ?>" width="100" height="100" /></td>
                                            <td><?php echo $status_type; ?></td>
                                            <td><?php echo $date_added; ?></td>
                                            <td><?php echo $cellphone_number; ?></td>
                                            <td>
                                            <button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>
                                            <button class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>