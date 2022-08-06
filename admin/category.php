<?php
include('config.php');

if(isset($_POST['btn_save'])){
    $category_type=mysqli_real_escape_string($CON, $_POST['category_type']);
    $category_description=mysqli_real_escape_string($CON, $_POST['category_description']);
    
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["category_image"]["name"]);
    $extension = end($temp);
    
    if (!isset($_FILES["category_image"])){ echo "null"; }
    if ((($_FILES["category_image"]["type"] == "image/gif")
    || ($_FILES["category_image"]["type"] == "image/jpeg")
    || ($_FILES["category_image"]["type"] == "image/jpg")
    || ($_FILES["category_image"]["type"] == "image/pjpeg")
    || ($_FILES["category_image"]["type"] == "image/x-png")
    || ($_FILES["category_image"]["type"] == "image/png"))
    && in_array($extension, $allowedExts)) {
      if ($_FILES["category_image"]["error"] > 0) {
        echo "Error: " . $_FILES["category_image"]["error"] . "<br>";
        die();
      } else {
        if (file_exists("./images_2/upload/" . $_FILES["category_image"]["name"])) {
          echo $_FILES["category_image"]["name"] . " already exists. ";
          die();
        } else {
          move_uploaded_file($_FILES["category_image"]["tmp_name"],
          "./images_2/upload/" . $_FILES["category_image"]["name"]);
          //echo "Stored in: " . "./image/upload/" . $_FILES["cover_picture"]["name"];
        }
      }
    } else {
        
      echo "Please select an image file.";
      die();
    }
    
    
    $category_image=$_FILES['category_image']['name'];
    if(!isset($category_image)){
    	echo "Please select cover picture.";
    	die();
    }
    
    $sql_dup='SELECT * FROM `category` WHERE category.category_type="'.$category_type.'" OR category.category_description="'.$category_description.'"';
    $qry_dup=mysqli_query($CON, $sql_dup) or die(mysqli_error($qry_dup));
            
    $sql='INSERT INTO `category`(`category_type`, `category_description`, `image`) 
        VALUES ("'.$category_type.'", "'.$category_description.'", "'.$category_image.'")';
    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
    
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Category</h2>   
                       
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
                                            <label><h3>Category Type:</h3></label>
                                            <input class="form-control" name="category_type" placeholder="PLease Enter Keyword">
                                        </div>
                                        <div class="form-group">
                                            <label><h3>Category Description:</h3></label>
                                            <textarea class="form-control" name="category_description" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label><h3>Image:</h3></label>
                                            <input type="file" name="category_image"/>
                                        </div>
                                        <button type="submit" name="btn_save" class="btn btn-default">SAVE</button>
                                    </form>
                                    <br>
    </div>
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
            <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            Categories
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Category ID</th>
                                            <th>Category Name</th>
                                            <th>Category Description</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include('config.php');
                                    $sql='SELECT * FROM `category`';
                                    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
                                    while($row=mysqli_fetch_array($qry)){
                                        $category_id=$row['category_id'];
                                        $category_type=$row['category_type'];
                                        $category_description=$row['category_description'];
                                        $image=$row['image'];
                                    ?>
                                        <tr class="success">
                                            <td><?php echo $category_id; ?></td>
                                            <td><?php echo $category_type; ?></td>
                                            <td><?php echo $category_description; ?></td>
                                            <td><img src="<?php echo './images_2/upload/'.$image;?>" width="100px" height="100px" /></td>
                                            <td>
                                            <a href="<?php echo 'admin/edit_category.php?id='.$category_id; ?>" class="btn btn-primary"><i class="fa fa-edit "></i> Edit</a>
                                            <!--<a href="" class="btn btn-danger"><i class="fa fa-pencil"></i> Delete</a>-->
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
                <!--<div class="row">
                    <div class="col-md-12">
                        <h3>More Customization</h3>
                         <p>
                        For more customization for this template or its components please visit official bootstrap website i.e getbootstrap.com or <a href="http://getbootstrap.com/components/" target="_blank">click here</a> . We hope you will enjoy our template. This template is easy to use, light weight and made with love by binarycart.com 
                        </p>
                    </div>
                </div>-->
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>