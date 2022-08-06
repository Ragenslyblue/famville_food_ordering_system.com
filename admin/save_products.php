<?php

/**
 * @author pakisab
 * @copyright 2018
 */

    $product_id2=mysqli_real_escape_string($CON, $_POST['product_id2']);
    $product_name=mysqli_real_escape_string($CON, $_POST['product_name']);
    $product_description=mysqli_real_escape_string($CON, $_POST['product_description']);
    $quantity=mysqli_real_escape_string($CON, $_POST['quantity']);
    $price=mysqli_real_escape_string($CON, $_POST['price']);
    $category_id=mysqli_real_escape_string($CON, $_POST['category_id']);
    //$product_image=$_FILES['product_image'];
    
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["product_image"]["name"]);
    $extension = end($temp);
    
    if (!isset($_FILES["product_image"])){ echo "null"; }
    if ((($_FILES["product_image"]["type"] == "image/gif")
    || ($_FILES["product_image"]["type"] == "image/jpeg")
    || ($_FILES["product_image"]["type"] == "image/jpg")
    || ($_FILES["product_image"]["type"] == "image/pjpeg")
    || ($_FILES["product_image"]["type"] == "image/x-png")
    || ($_FILES["product_image"]["type"] == "image/png"))
    && in_array($extension, $allowedExts)) {
      if ($_FILES["product_image"]["error"] > 0) {
        echo "Error: " . $_FILES["product_image"]["error"] . "<br>";
        die();
      } else {
        if (file_exists("./images_3/upload/" . $_FILES["product_image"]["name"])) {
          echo $_FILES["product_image"]["name"] . " already exists. ";
          die();
        } else {
          move_uploaded_file($_FILES["product_image"]["tmp_name"],
          "./images_3/upload/" . $_FILES["product_image"]["name"]);
          //echo "Stored in: " . "./image/upload/" . $_FILES["cover_picture"]["name"];
        }
      }
    } else {
        
      echo "Please select an image file.";
      die();
    }
    
    
    $product_image=$_FILES['product_image']['name'];
    if(!isset($product_image)){
    	echo "Please select cover picture.";
    	die();
    }
    
//    $set_id=mysqli_real_escape_string($CON, $_POST['set_id']);
//    $tuple_id=mysqli_real_escape_string($CON, $_POST['tuple_id']);
//    $size=mysqli_real_escape_string($CON, $_POST['size']);
    //$date_start=mysqli_real_escape_string($CON, $_POST['date_start']);
    //$date_end=mysqli_real_escape_string($CON, $_POST['date_end']);
    $status=mysqli_real_escape_string($CON, $_POST['status_id']);
    
    if($status==1){
        $action='Available';
    }else if($status==2){
        $action='Not-Available';
    }else{
        $action='In-progress';
    }
    
    
/*    $sql_ins='INSERT INTO `product`(`product_name`, `product_description`, `quantity`, `price`, `status_type_id`, `availability`, `category_id`, `image`, `set_type_id`, `tuple_class_id`, `size_class_id`, `product_num_id`) 
        VALUES ("'.$product_name.'", "'.$product_description.'", "'.$quantity.'", "'.$price.'", "'.$status.'", "'.$action.'", "'.$category_id.'", "'.$product_image.'", "'.$set_id.'", "'.$tuple_id.'", "'.$size.'", "'.$product_id2.'")';
    $qry_ins=mysqli_query($CON, $sql_ins) or die(mysqli_error($qry_ins));    
*/
    $sql_ins='INSERT INTO `product`(`product_name`, `product_description`, `quantity`, `price`, `status_type_id`, `availability`, `category_id`, `image`, `product_num_id`) 
        VALUES ("'.$product_name.'", "'.$product_description.'", "'.$quantity.'", "'.$price.'", "'.$status.'", "'.$action.'", "'.$category_id.'", "'.$product_image.'", "'.$product_id2.'")';
    $qry_ins=mysqli_query($CON, $sql_ins) or die(mysqli_error($qry_ins));
?>
<div id="page-wrapper">
            <div id="page-inner">
                
            <div class="panel panel-default">
                       
                        <div class="panel-heading">
                            
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <h1 style="text-align: center; font-family: sans-serif;"><strong>Product Added...</strong></h1>
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