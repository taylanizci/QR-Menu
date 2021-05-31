<?php

ob_start();
session_start();
include "inc/dbconnect.php";
include "functions.php"; 

sessionkontrol2();
?>


<?php
$ayarlarquery=$db->prepare("SELECT * FROM ayarlar");
$ayarlarquery->execute(array(0));
$ayarlar=$ayarlarquery->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<title><?php echo $ayarlar['site_baslik'] ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/login/images/image.png" alt="IMG">
				</div>

				<form action="inc/process.php" method="POST"  class="login100-form validate-form">
					<span class="login100-form-title">
						Yönetici Girişi
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Geçerli Bir E-posta Gerekli: ornek@adres.uzanti">
						<input class="input100" type="text" name="kullanici_mail" placeholder="E-posta">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Şifre Gereklidir">
						<input class="input100" type="password" name="kullanici_sifre" placeholder="Şifre">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button name="login" type="submit" class="login100-form-btn">
							Giriş Yap
						</button>
					</div>

					<div class="text-center p-t-12">
						<span class="txt1">
						<?php echo $ayarlar['site_baslik'] ?>
						</span>
						<a class="txt2" href="#">
							
						</a>
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/bootstrap/js/popper.js"></script>
	<script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="assets/login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="assets/login/js/main.js"></script>

</body>
</html>