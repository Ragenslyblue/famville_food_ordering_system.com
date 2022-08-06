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
<link href="../image-picker/image-picker.css" rel="stylesheet"/>
<?php
include('../config.php');
include('header.php');
include('side_bar.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    $sql_select='SELECT * FROM `order_bill_out` 
        WHERE order_bill_out.order_num_id="'.$id.'"';
    $qry_select=mysqli_query($CON, $sql_select) or die(mysqli_error($qry_select));
    while($row=mysqli_fetch_array($qry_select)){
        $order_bill_out_id=$row['order_bill_out_id'];
        $billed_amount=$row['billed_amount'];
    }
}
?>
<div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>More Cash Amount</h2>   
                       
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
                                        <div class="form-group" style="
    display:  flex;
">
                                            <label>Amount Received:</label>
                                            <input type="text" class="form-control" placeholder="Amount Received"/>
                                        </div>
                                        <div class="form-group" style="
    display:  contents;
">
                                            <label>Cash</label>
                                        </div>
<style type="text/css">
            .thumbnails li img{
                width: 202px;
                height: 134px;
                background-color: #0000ce;
            }
            p{
                text-align: center;
            }
</style>              

<div class="row7" style="display: inline-flex;">
<select name="money_amount_1" class="image-picker" multiple="">
  <optgroup label="">
  <option data-img-src="../images/image_money2.jpg"   
          data-img-label='Php <?php echo $amount=$billed_amount; ?>'
          data-img-class="custom-class"
          data-img-alt="image alt"
          value='<?php echo $amount; ?>'><?php echo $amount; ?>
   </option>
  </optgroup>
</select>

<select name="money_amount_2" class="image-picker" multiple="">
  <optgroup label="">
  <option data-img-src="../images/image_money2.jpg"   
          data-img-label='Php <?php echo $amount2=$billed_amount+6; ?>'
          data-img-class="custom-class"
          data-img-alt="image alt"
          value='<?php echo $amount2; ?>'><?php echo $amount2; ?>
   </option>
  </optgroup>
</select>

<select name="money_amount_3" class="image-picker" multiple="">
  <optgroup label="">
  <option data-img-src="../images/image_money2.jpg"   
          data-img-label='Php <?php echo $amount3=$billed_amount+16?>'
          data-img-class="custom-class"
          data-img-alt="image alt"
          value='<?php echo $amount3; ?>'><?php echo $amount3; ?>
   </option>
  </optgroup>
</select>
</div>

<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="../image-picker/image-picker.js"></script>
<script src="../image-picker/image-picker.min.js"></script>

<script>
$(".image-picker").imagepicker({

  // show/hide the regular select box
  hide_select: true,

  // show/hide image labels
  show_label: true,

  // callback functions
  initialized: undefined,
  changed: undefined,
  clicked: undefined,
  selected: undefined,

  // set the max number of selectable options 
  limit: undefined,

  // called when the limit cap has been reached
  limit_reached: undefined,

  // using Font Awesome icons instead
  font_awesome: false
  
})
</script>

                                        <!--<button style="
    padding: 30px;
" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                          Php 20.00
                                        </button>
                                        <button style="
    padding: 30px;
" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                          Php 25.00
                                        </button>
                                        <button style="
    padding: 30px;
    margin-left: 110px;
    margin-top: 5px;
" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                          Php 30.00
                                        </button>-->
                                        
<br /><br />
                                    <a href="<?php echo $BASE_URL;?>index_cashier_personnel.php?page=pay_cash" style="
    margin-left: 100px;
    padding: 40px;
" class="btn btn-danger btn-lg">Continue</a>
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