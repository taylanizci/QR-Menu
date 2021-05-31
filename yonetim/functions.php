<?php

function sessionkontrol() {
	if (empty($_SESSION['kullanici_mail'])) {
        header("Location: giris.php");
        exit();
	}
}
function sessionkontrol2() {
	if (isset($_SESSION['kullanici_mail'])) {
        header("Location: index.php");
        exit();
	}
}


?>