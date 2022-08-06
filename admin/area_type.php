<?php
include('config.php');

if(isset($_POST['btn_save'])){
    $area_type=mysqli_real_escape_string($CON, $_POST['area_type']);
    //$number_of_chair=mysqli_real_escape_string($CON, $_POST['number_of_chair']);
    //$area_image=mysqli_real_escape_string($CON, $_POST['area_image']);
    
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["area_image"]["name"]);
    $extension = end($temp);
    
    if (!isset($_FILES["area_image"])){ echo "null"; }
    if ((($_FILES["area_image"]["type"] == "image/gif")
    || ($_FILES["area_image"]["type"] == "image/jpeg")
    || ($_FILES["area_image"]["type"] == "image/jpg")
    || ($_FILES["area_image"]["type"] == "image/pjpeg")
    || ($_FILES["area_image"]["type"] == "image/x-png")
    || ($_FILES["area_image"]["type"] == "image/png"))
    && in_array($extension, $allowedExts)) {
      if ($_FILES["area_image"]["error"] > 0) {
        echo "Error: " . $_FILES["area_image"]["error"] . "<br>";
        die();
      } else {
        if (file_exists("./images_2/upload/" . $_FILES["area_image"]["name"])) {
          echo $_FILES["area_image"]["name"] . " already exists. ";
          die();
        } else {
          move_uploaded_file($_FILES["area_image"]["tmp_name"],
          "./images_2/upload/" . $_FILES["area_image"]["name"]);
          //echo "Stored in: " . "./image/upload/" . $_FILES["cover_picture"]["name"];
        }
      }
    } else {
        
      echo "Please select an image file.";
      die();
    }
    
    
    $area_image=$_FILES['area_image']['name'];
    if(!isset($area_image)){
    	echo "Please select cover picture.";
    	die();
    }

    
    $description=mysqli_real_escape_string($CON, $_POST['description']);
    
    $sql='INSERT INTO `area_type`(`area_type`, `image`, `description`) 
        VALUES ("'.$area_type.'", "'.$area_image.'", "'.$description.'")';
    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Area Type</h2>   
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
                                            <label>Area Type:</label>
                                            <input type="text" name="area_type" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Image:</label>
                                            <input type="file" name="area_image"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Description:</label>
                                            <textarea name="description" class="form-control" rows="3"></textarea>
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
                            Area Type List
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Area ID</th>
                                            <th>Area Type</th>
                                            <!--<th>Number of Chair</th>-->
                                            <!--<th>Image</th>-->
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    
                                    $sql_area='SELECT area_type.area_type_id, area_type.area_type, area_type.image, area_type.description
                                        FROM area_type
                                        ORDER BY area_type.area_type_id DESC';
                                    $qry_area=mysqli_query($CON, $sql_area) or die(mysqli_error($qry_area));
                                    while($row=mysqli_fetch_array($qry_area)){
                                        $area_type_id=$row['area_type_id'];
                                        $area_type=$row['area_type'];
                                        //$chair_number_capacity=$row['chair_number_capacity'];
                                        $image=$row['image'];
                                        $description=$row['description'];
                                    
                                    ?>
                                        <tr class="success">
                                            <td><?php echo $area_type_id; ?></td>
                                            <td><?php echo $area_type; ?></td>
                                            <!--<td><?php //echo $chair_number_capacity; ?></td>-->
                                            <!--<td><img src="<?php echo './images_2/upload/'.$image;?>" width="100" height="100" /></td>-->
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