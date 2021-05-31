<?php


/* Veritabanına Bağlanma Kodu */
$host="localhost";  // Host Adresi
$db_name="menu";  // Veritabanı Adı
$db_user="root";    // Veritabanına Yetkisi Olan Kullanıcı Adı
$pass="";    // Şifre

try {
    $db = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $db_user, $pass);
    //echo 'İşlem Başarılı' . '<br>';
}

catch (PDOExpception $e) {
    echo $e->getMessage();
}

/* Veritabanına Bağlanma Kodu Bitiş */

?>