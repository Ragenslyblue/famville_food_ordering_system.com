<?php
include('config.php');

if(isset($_POST['btn_login'])){
    $username=mysqli_real_escape_string($CON, $_POST['username']);
    $pass=mysqli_real_escape_string($CON, $_POST['pass']);
    
    $sql='SELECT user.user_id, user.user_name, user.password, user_groups.user_groups_id, user_groups.user_groups
        FROM user
        INNER JOIN user_groups
        ON user_groups.user_groups_id=user.user_group_id
        WHERE user.user_name="'.$username.'" AND user.password="'.$pass.'"';
    $qry=mysqli_query($CON, $sql) or die(mysqli_error($qry));
    while($row=mysqli_fetch_array($qry)){
        $user_id=$row['user_id'];
        $user_name=$row['user_name'];
        $password=$row['password'];
        $user_groups=$row['user_groups'];
     
        }
        if($username==$user_name && $pass==$password && $user_groups=='cashier'){
            header('Location:index_cashier_personnel.php?page=home');
        }elseif($username==$user_name && $pass==$password && $user_groups=='admin'){
            header('Location:index_admin.php?page=home');
        }elseif($username==$user_name && $pass==$password && $user_groups=='kitchen staff'){
            header('Location:index_kitchen_staff.php');
        }elseif($username==$user_name && $pass==$password && $user_groups=='administrator'){
            header('Location:index_mobile.php');
        }else{
            header('Location:'.$BASE_URL);
        }
}
?>
<?php 

?>
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
		<div class="container-login100" style="background-image: url('login/images/bg-01.jpg');">
			<div class="wrap-login100">
				<form action="" method="post" enctype="multipart/form-data" class="login100-form validate-form">
					<span class="login100-form-logo" style="
    background-color: #806afc;
">
						<!--<i class="zmdi zmdi-landscape"></i>-->
                        <img src="login/images/icons/famville_logo123.png" width="225" height="79" style="
    border-radius: 60px;
    box-shadow: 1px 0px 17px 4px #45337d;
" />
					</span>
                    

					<span class="login100-form-title p-b-34 p-t-27">
						Log in
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="btn_login" value="Login" class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div>
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