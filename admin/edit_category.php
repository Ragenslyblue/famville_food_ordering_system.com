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
    
    $sql_select='SELECT * FROM `category` WHERE category.category_id="'.$id.'"';
    $qry_select=mysqli_query($CON, $sql_select) or die(mysqli_error($qry_select));
    while($row=mysqli_fetch_array($qry_select)){
        $category_id=$row['category_id'];
        $category_type=$row['category_type'];
        $category_description=$row['category_description'];
        $image=$row['image'];
    }
}
if(isset($_POST['btn_update'])){
    $category_type2=mysqli_real_escape_string($CON, $_POST['category_type']);
    $category_description=mysqli_real_escape_string($CON, $_POST['category_description']);
    
    $sql_updates='UPDATE `category` SET `category_type`="'.$category_type2.'",`category_description`="'.$category_description.'" 
        WHERE category.category_id="'.$id.'"';
    $qry_updates=mysqli_query($CON, $sql_updates) or die(mysqli_error($qry_updates));
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
                                            <input class="form-control" value="<?php echo $category_type; ?>" name="category_type" placeholder="PLease Enter Keyword">
                                        </div>
                                        <div class="form-group">
                                            <label><h3>Category Description:</h3></label>
                                            <textarea class="form-control" name="category_description" rows="3"><?php echo $category_description; ?></textarea>
                                        </div>
                                        
                                        <button type="submit" value="UPDATE" name="btn_update" class="btn btn-default">UPDATE</button>
                                    </form>
                                    <br>
    </div>
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
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

<!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>


<?php
include('footer.php');
?>