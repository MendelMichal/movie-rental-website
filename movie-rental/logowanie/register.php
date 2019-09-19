<?php
session_start();
if(isset($_SESSION['user_session'])){
	header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="pl_PL">
<head>
	<title>Rejestracja</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    
    
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="post" id="register-form">
					<span class="login100-form-title p-b-26">
						Miło Cię poznać!
					</span>
					<span class="login100-form-title p-b-48">
						<img src="images/smile%20(mniejszy).png">
					</span>
					
					<div id="error"></div>

					<div class="wrap-input100 validate-input" data-validate = "Zły format. Podaj poprawny np.: ex@abc.xyz">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Podaj swój email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Podaj hasło">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Hasło"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Podaj swoje imię">
						<input class="input100" type="text" name="imie">
						<span class="focus-input100" data-placeholder="Imię"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate="Podaj swoje nazwisko">
						<input class="input100" type="text" name="nazwisko">
						<span class="focus-input100" data-placeholder="Nazwisko"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button type="submit" name="register_button" id="register_button" class="login100-form-btn">
								Zarejestruj
							</button>
						</div>
					</div>

					<div class="text-center p-t-115">
						<span class="txt1">
							Nie chcesz się logować?
						</span>

						<a class="txt2" href="../index.php">
							Powrót do strony głównej
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	
	<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
	<script src="js/register.js"></script>

</body>
</html>