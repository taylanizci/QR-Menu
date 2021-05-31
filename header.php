<?php
include "yonetim/inc/dbconnect.php";
?>
<?php
$ayarlarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarlarsor->execute(array(0));
$ayarlar=$ayarlarsor->fetch(PDO::FETCH_ASSOC);
?>


<!doctype html>


<html lang="tr" class="no-js">
<head><title><?php echo $ayarlar['site_baslik']; ?></title>

	<meta charset="utf-8">

	
	<meta content="<?php echo $ayarlar['site_anahtar_kelimeler']; ?>" name="keywords">
	<meta content="<?php echo $ayarlar['site_aciklama']; ?>" name="description">

	<link rel="stylesheet" href="css/restory-assets.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script src="js/restory-assets.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</head>
<body>

	<div class="container" style="background-color: #1e1f21;
	width: auto;">
	
		

			<div class="row">
				
				<a href="index.php"style=" display: block;
    margin: 0 auto;height: 120px;"><img src="<?php echo $ayarlar['site_logo']; ?>"style=" display: block;
    margin: 0 auto;height: 120px;"></img></a>
				
			</div>

		
	
	</div><!-- /.container -->

	
		<!-- End Header -->