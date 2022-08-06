<!DOCTYPE html>
<html lang="en">
<head>
	<title>FAMVILLE</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('login/images/bg-01.jpg'); padding: 0px;">
			<div class="wrap-login100" style="
    border-radius: 0px;
">
				<form action="<?php echo $BASE_URL;?>index_mobile_app.php?page=menu_list" method="post" enctype="multipart/form-data" class="login100-form validate-form">
					<span class="login100-form-logo" style="
    background-color: #806afc;
">
						<!--<i class="zmdi zmdi-landscape"></i>-->
                        <img src="login/images/icons/famville_logo123.png" width="225" height="79" />
					</span>
                    

					<span class="login100-form-title p-b-34 p-t-27">
						Select Table Number
					</span>

					<div class="wrap-input100 validate-input">
                        <select name="select_table_num" style="background-color: #8563fb;" class="input100">
                            <option value="0">Please Select Table Number</option>
                            <?php
                            $area_type=mysqli_real_escape_string($CON, $_POST['area_type']);
                            
                            include('config.php');
                            $sql_tab='SELECT * FROM `table_number`
                                WHERE table_number.area_type_id="'.$area_type.'"';
                            $qry_tab=mysqli_query($CON, $sql_tab) or die(mysqli_error($qry_tab));
                            while($row=mysqli_fetch_array($qry_tab)){
                                $table_number_id=$row['table_number_id'];
                                $table_code_num_id=$row['table_code_num_id'];
                                $table_number_capacity=$row['table_number_capacity'];
                            ?>
                            <option value="<?php echo $table_code_num_id; ?>"><?php echo $table_number_capacity; ?></option>
                            <?php
                            }
                            ?>
                        </select>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="btn_ok" value="OK" class="login100-form-btn">
							OK
						</button>
					</div>

					<!--<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>-->
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/daterangepicker/moment.min.js"></script>
	<script src="login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>