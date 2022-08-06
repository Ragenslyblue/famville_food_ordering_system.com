<?php
include('config.php');

$sql='SELECT * FROM `product_num`';
$qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
while($row=mysqli_fetch_array($qry)){
    $product_num_id=$row['product_num_id'];
    $product_num=$row['product_num'];
}
//echo $product_num;
if(mysqli_num_rows($qry)==1){
   $sql2='SELECT * FROM `product`';
   $qry2=mysqli_query($CON, $sql2) or die(mysqli_error($qry2));
   $id_num=0;
   while($row=mysqli_fetch_array($qry2)){
    $product_id=$row['product_id'];
   
    $date=date('d');
    $num_rows2=mysqli_num_rows($qry2);
    $val=$date.($num_rows2+$product_num); 
    $str_id=str_pad($val, 1, 1, STR_PAD_LEFT);
    $id_num=$str_id+1;
    }
}
//$num_rows=mysqli_num_rows($qry)==1;

?>

<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Ending Inventory</h2>   
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
                                            <label>Stock ID:</label>
                                            <input disabled="yes" value="<?php echo $id=$id_num+1; ?>" class="form-control"/>
                                            <input type="hidden" name="product_id2" value="<?php echo $id=$id_num+1; ?>" />
                                        </div>
                                        <div class="form-group">
                                            <label>Product ID:</label>
                                            <input disabled="yes" type="text" name="product_name" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Price:</label>
                                            <input disabled="yes" type="number" min="0" name="price" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Beginning Inv.:</label>
                                            <input disabled="yes" type="text" name="category" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Stock-In Inv.:</label>
                                            <input disabled="yes" type="text" name="category" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Total Inv.:</label>
                                            <input disabled="yes" type="text" name="category" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Sold Quantity:</label>
                                            <input disabled="yes" type="text" name="category" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Ending Inv.:</label>
                                            <input type="text" name="category" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Spoilage Qty:</label>
                                            <input type="text" name="category" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Spoilage Type:</label>
                                            <input type="text" name="category" class="form-control"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Variance Remarks:</label>
                                            <textarea  class="form-control" name="product_description" rows="3"></textarea>
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
            
            
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>