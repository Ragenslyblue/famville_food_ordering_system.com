<?php

/**
 * @author pakisab
 * @copyright 2018
 */

//$txtImage=mysqli_real_escape_string($CON, $_POST['txtImage']); 

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
    
$btn_save=mysqli_real_escape_string($CON, $_POST['btn_save']);
if($btn_save=='SAVE'){
    $action='Available';

foreach($_POST['txtImage_id'] as $txtImage_id2){
    /*echo $txtImage_id2;*/ echo '<input type="hidden" value="'.$txtImage_id2.'" />';
    
$sql_ins2='INSERT INTO `table_number_image`(`table_number_area_id`, `image`, `availability`) 
    VALUES ("'.$txtImage_id2.'", "'.$table_image.'", "'.$action.'")';
$qry_ins2=mysqli_query($CON, $sql_ins2) or die(mysqli_error($qry_ins2));
    }
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                
            <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <h1 style="text-align: center; font-family: sans-serif;"><strong>Save...</strong></h1>
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