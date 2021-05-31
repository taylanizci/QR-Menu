<?php
ob_start();
session_start();


include 'dbconnect.php';
include '../functions.php';

if (empty($_POST[''])) {
  header("Location: ../index.php");
}



function securetext($x){
  $z = addslashes($x);
  $z = htmlspecialchars($z);
  $z = htmlentities($z);
  $z = strip_tags($z);
  return $z;
};

function securecontent($x){
  $z = addslashes($x);
  //$z = htmlspecialchars($z);
  //$z = htmlentities($z);
  //$z = strip_tags($z);
  return $z;
};




if (isset($_POST['login'])) {
  $kullanici_mail = $_POST['kullanici_mail'];
  $kullanici_sifre = md5($_POST['kullanici_sifre']);


  if ($kullanici_mail && $kullanici_sifre) {
      $kullanicisor=$db->prepare("SELECT * FROM kullanicilar WHERE kullanici_mail = :mail AND kullanici_sifre = :sifre");
      $kullanicisor->execute(array(
        'mail' => $kullanici_mail,
        'sifre' => $kullanici_sifre
      ));

      $say=$kullanicisor->rowCount();


      if ($say > 0) {
        $_SESSION['kullanici_mail'] = $kullanici_mail;
        header("Location: ../index.php?status=success");
      } else {
        header("Location: ../giris.php?status=error");
      }
  }
}


  

  if (isset($_POST['menuekle'])) {
    $uploads_dir = '../../images';
  @$tmp_name = $_FILES['menu_resim']["tmp_name"];
  $name = $_FILES['menu_resim']["name"];
  $benzersizsayi1=rand(20000,32000);
  $benzersizsayi2=rand(20000,32000);
  $benzersizsayi3=rand(20000,32000);
  $benzersizsayi4=rand(20000,32000);
  $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
  $imgyolm=substr($uploads_dir, 6)."/".$benzersizad.$name;
  @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $menuquery = $db->prepare("INSERT INTO menu SET
      urun_baslik = :urun_baslik,
      urun_detay = :urun_detay,
      urun_fiyat = :urun_fiyat,
      kategori_id = :kategori_id,
      menu_sira = :menu_sira,
      menu_resim = :menu_resim");
    $insert = $menuquery->execute(array(
      "urun_baslik" => securetext($_POST['urun_baslik']),
      "urun_detay" => securetext($_POST['urun_detay']),
      "urun_fiyat" => securetext($_POST['urun_fiyat']),
      "kategori_id" => securetext($_POST['kategori_id']),
      "menu_sira" => securetext($_POST['menu_sira']),
      "menu_resim" => $imgyolm
    ));
    if ( $insert ){
        header("Location: ../menu.php?status=success");
    } else {
        header("Location: ../menu.php?status=error");
    }

  }
  if (isset($_POST['katekle'])) {
    $uploads_dir = '../../images';
  @$tmp_name = $_FILES['kat_img']["tmp_name"];
  $name = $_FILES['kat_img']["name"];
  $benzersizsayi1=rand(20000,32000);
  $benzersizsayi2=rand(20000,32000);
  $benzersizsayi3=rand(20000,32000);
  $benzersizsayi4=rand(20000,32000);
  $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
  $imgyolk=substr($uploads_dir, 6)."/".$benzersizad.$name;
  @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $katquery = $db->prepare("INSERT INTO kategori SET
      menu_kategori = :menu_kategori,
      kat_sira= :kat_sira,
      kat_img = :kat_img");
    $insert = $katquery->execute(array(
      "menu_kategori" => securetext($_POST['menu_kategori']),
      "kat_sira" => securetext($_POST['kat_sira']),
      "kat_img" => $imgyolk
    ));
    if ( $insert ){
        header("Location: ../kategori.php?status=success");
    } else {
        header("Location: ../kategori.php?status=error");
    }

  }

  
  if (isset($_POST['menuduzenle'])) {

     if ($_FILES['menu_resim']["size"] > 0) {

   $uploads_dir = '../../images';
   @$tmp_name = $_FILES['menu_resim']["tmp_name"];
   $name = $_FILES['menu_resim']["name"];
   $benzersizsayi1=rand(20000,32000);
   $benzersizsayi2=rand(20000,32000);
   $benzersizsayi3=rand(20000,32000);
   $benzersizsayi4=rand(20000,32000);
   $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
   $imgyolm=substr($uploads_dir, 6)."/".$benzersizad.$name;
   @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $menuquery = $db->prepare("UPDATE menu SET
   menu_resim = :menu_resim
   WHERE menu_id={$_POST['menu_id']}");
 $insert = $menuquery->execute(array(
   "menu_resim" => $imgyolm
 ));

    $menuquery = $db->prepare("UPDATE menu SET
      urun_baslik = :urun_baslik,
      urun_detay = :urun_detay,
      urun_fiyat = :urun_fiyat,
      kategori_id = :kategori_id,
      menu_sira = :menu_sira
      WHERE menu_id={$_POST['menu_id']}");
    $insert = $menuquery->execute(array(
      "urun_baslik" => securetext($_POST['urun_baslik']),
      "urun_detay" => securetext($_POST['urun_detay']),
      "urun_fiyat" => securetext($_POST['urun_fiyat']),
      "kategori_id" => securetext($_POST['kategori_id']),
      "menu_sira" => securetext($_POST['menu_sira'])
    ));

 if ( $insert ){
     $resimsil=$_POST['menu_resim'];
      unlink("../../$resimsil");
      header("Location: ../menu.php?status=success");
    } else {
        header("Location: ../menu.php?status=error");
    }

    /* Eğer Resimde Değişiklik Yoksa Sadece Yazılar Güncellensin Diye Burası Var (Alt Taraf) */

  }else{
    $menuquery = $db->prepare("UPDATE menu SET
      urun_baslik = :urun_baslik,
      urun_detay = :urun_detay,
      urun_fiyat = :urun_fiyat,
      kategori_id = :kategori_id,
      menu_sira = :menu_sira
      WHERE menu_id={$_POST['menu_id']}");
    $insert = $menuquery->execute(array(
      "urun_baslik" => securetext($_POST['urun_baslik']),
      "urun_detay" => securetext($_POST['urun_detay']),
      "urun_fiyat" => securetext($_POST['urun_fiyat']),
      "kategori_id" => securetext($_POST['kategori_id']),
      "menu_sira" => securetext($_POST['menu_sira'])
    ));
    if ( $insert ){
        header("Location: ../menu.php?status=success");
    } else {
        header("Location: ../menu.php?status=error");
    }
  }
}


if (isset($_POST['katduzenle'])) {

     if ($_FILES['kat_img']["size"] > 0) {

   $uploads_dir = '../../images';
   @$tmp_name = $_FILES['kat_img']["tmp_name"];
   $name = $_FILES['kat_img']["name"];
   $benzersizsayi1=rand(20000,32000);
   $benzersizsayi2=rand(20000,32000);
   $benzersizsayi3=rand(20000,32000);
   $benzersizsayi4=rand(20000,32000);
   $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
   $imgyolk=substr($uploads_dir, 6)."/".$benzersizad.$name;
   @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $katquery = $db->prepare("UPDATE kategori SET
   kat_img = :kat_img
   WHERE kategori_id={$_POST['kategori_id']}");
 $insert = $katquery->execute(array(
   "kat_img" => $imgyolk
 ));

    $katquery = $db->prepare("UPDATE kategori SET
      menu_kategori = :menu_kategori,
      kat_sira= :kat_sira
      WHERE kategori_id={$_POST['kategori_id']}");
    $insert = $katquery->execute(array(
      "menu_kategori" => securetext($_POST['menu_kategori']),
      "kat_sira" => securetext($_POST['kat_sira'])
    ));

 if ( $insert ){
     $resimsil=$_POST['kat_img'];
      unlink("../../$resimsil");
      header("Location: ../kategori.php?status=success");
    } else {
        header("Location: ../kategori.php?status=error");
    }

    /* Eğer Resimde Değişiklik Yoksa Sadece Yazılar Güncellensin Diye Burası Var (Alt Taraf) */

  }else{
    $katquery = $db->prepare("UPDATE kategori SET
      menu_kategori = :menu_kategori,
      kat_sira= :kat_sira
      WHERE kategori_id={$_POST['kategori_id']}");
    $insert = $katquery->execute(array(
      "menu_kategori" => securetext($_POST['menu_kategori']),
      "kat_sira" => securetext($_POST['kat_sira'])
    ));
    if ( $insert ){
        header("Location: ../kategori.php?status=success");
    } else {
        header("Location: ../kategori.php?status=error");
    }
  }
}
 


if (isset($_POST['menusil'])) {
  $menuquery = $db->prepare("DELETE FROM menu WHERE menu_id = :id");
  $delete = $menuquery->execute(array(
     'id' => securetext($_POST['menu_id'])
  ));

  if ($delete) {
    header("Location: ../menu.php?status=success");
  } else {
    header("Location: ../menu.php?status=error");
  }

}
if (isset($_POST['katsil'])) {
  $katquery = $db->prepare("DELETE FROM kategori WHERE kategori_id = :kid");
  $delete = $katquery->execute(array(
     'kid' => securetext($_POST['kategori_id'])
  ));

  if ($delete) {
    header("Location: ../kategori.php?status=success");
  } else {
    header("Location: ../kategori.php?status=error");
  }

}



/* ********************************************************************************************************************* */


if (isset($_POST['ayarlar'])) {

  if ($_FILES['site_logo']["size"] > 0) {

    $uploads_dir = '../../images';
    @$tmp_name = $_FILES['site_logo']["tmp_name"];
    $name = $_FILES['site_logo']["name"];
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);
    $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $imgyol7=substr($uploads_dir, 6)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

    $ayarlarquery = $db->prepare("UPDATE ayarlar SET
    site_baslik = :site_baslik,
    site_aciklama = :site_aciklama,
    site_anahtar_kelimeler = :site_anahtar_kelimeler,
    site_sahip = :site_sahip,
    site_logo = :site_logo
    WHERE id=1");
  $insert = $ayarlarquery->execute(array(
    "site_baslik" => securetext($_POST['site_baslik']),
    "site_aciklama" => securetext($_POST['site_aciklama']),
    "site_anahtar_kelimeler" => securetext($_POST['site_anahtar_kelimeler']),
    "site_sahip" => securetext($_POST['site_sahip']),
    "site_logo" => $imgyol7
  ));

    if ( $insert ){

      $resimsil=$_POST['site_logo'];
      unlink("../../$resimsil");

      header("Location: ../ayarlar.php?status=success");
  } else {
      header("Location: ../ayarlar.php?status=error");
  }


  } else {

  $ayarlarquery = $db->prepare("UPDATE ayarlar SET
    site_baslik = :site_baslik,
    site_aciklama = :site_aciklama,
    site_anahtar_kelimeler = :site_anahtar_kelimeler,
    site_sahip = :site_sahip
    WHERE id=1");
  $insert = $ayarlarquery->execute(array(
    "site_baslik" => securetext($_POST['site_baslik']),
    "site_aciklama" => securetext($_POST['site_aciklama']),
    "site_anahtar_kelimeler" => securetext($_POST['site_anahtar_kelimeler']),
    "site_sahip" => securetext($_POST['site_sahip'])
  ));
  if ( $insert ){
      header("Location: ../ayarlar.php?status=success");
  } else {
      header("Location: ../ayarlar.php?status=error");
  }

  }


}





/* ************************************************************************************************************** */



if (isset($_POST['sifre'])) {

  $oldpass=securetext($_POST['oldpass']);
  $newpass1=securetext($_POST['newpass1']); 
  $newpass2=securetext($_POST['newpass2']);

  $kullanici_sifre=md5($oldpass);

  $kullanicisor=$db->prepare("SELECT * FROM kullanicilar WHERE kullanici_sifre=:sifre AND kullanici_id=:id");
  $kullanicisor->execute(array(
   'id' => securetext($_POST['kullanici_id']),
   'sifre' => $kullanici_sifre
 ));

  $say=$kullanicisor->rowCount();

  if ($say==0) {
   header("Location:../profil?status=error");
 } else {
   if ($newpass1==$newpass2) {
    if (strlen($newpass1)>=6) {
     $sifre=md5($newpass1);
     $kullanicikaydet=$db->prepare("UPDATE kullanicilar SET
      kullanici_sifre=:kullanici_sifre
      WHERE kullanici_id=:kullanici_id");

     $insert=$kullanicikaydet->execute(array(
      'kullanici_sifre' => $sifre,
      'kullanici_id'=>securetext($_POST['kullanici_id'])
    ));

     if ($insert) {
      header("Location:../profil.php?status=success");

    } else {
      header("Location:../profil.php?status=error");
    }


  } else {
   header("Location:../profil.php?status=error");
 }

} else {
header("Location:../profil?status=error");
exit;
}
}
exit;
if ($update) {
header("Location:../profil?durum=ok");

} else {
header("Location:../profil?durum=no");
}
}



/* ************************************************************************************************************* */



if (isset($_POST['profil'])) {

  if (isset($_SESSION['kullanici_mail'])) {

  if ($_FILES['kullanici_resim']["size"] > 0) {
 
    $uploads_dir = '../assets/img';
    @$tmp_name = $_FILES['kullanici_resim']["tmp_name"];
    $name = $_FILES['kullanici_resim']["name"];
    $benzersizsayi1=rand(20000,32000);
    $benzersizsayi2=rand(20000,32000);
    $benzersizsayi3=rand(20000,32000);
    $benzersizsayi4=rand(20000,32000);
    $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
    $imgyolx=substr($uploads_dir, 3)."/".$benzersizad.$name;
    @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
 
    $kullaniciquery = $db->prepare("UPDATE kullanicilar SET
    kullanici_resim = :kullanici_resim
    WHERE kullanici_id={$_POST['kullanici_id']}");
  $insert = $kullaniciquery->execute(array(
    "kullanici_resim" => $imgyolx
  ));
 
    $kullaniciquery = $db->prepare("UPDATE kullanicilar SET
    kullanici_isim = :kullanici_isim,
    kullanici_mail = :kullanici_mail
    WHERE kullanici_id={$_POST['kullanici_id']}");
  $insert = $kullaniciquery->execute(array(
    "kullanici_isim" => securetext($_POST['kullanici_isim']),
    "kullanici_mail" => securetext($_POST['kullanici_mail'])
  ));
  
  if ( $insert ){
      $resimsil=$_POST['kullanici_resim'];
       unlink("../$resimsil");
 
       session_start();
       session_destroy();
       header("Location: ../giris.php");
  } else {
      header("Location: ../profil.php?status=error");
  }
 
    
 /* Eğer Resimde Değişiklik Yoksa Sadece Yazılar Güncellensin Diye Burası Var (Alt Taraf) */
  } else {
    $kullaniciquery = $db->prepare("UPDATE kullanicilar SET
    kullanici_isim = :kullanici_isim,
    kullanici_mail = :kullanici_mail
    WHERE kullanici_id={$_POST['kullanici_id']}");
  $insert = $kullaniciquery->execute(array(
    "kullanici_isim" => securetext($_POST['kullanici_isim']),
    "kullanici_mail" => securetext($_POST['kullanici_mail'])
  ));
  if ( $insert ){
    session_start();
    session_destroy();
    header("Location: ../giris.php");
  } else {
      header("Location: ../index.php?status=error");
  }
  
 }
 
 }

 }
 


/* ************************************************************************************************************* */

// include BarcodeQR class
include "BarcodeQR.php";

if (isset($_POST['qryap'])){
$qr = new BarcodeQR();

// create URL QR code
$qr->url($_POST['qrurl']);

// display new QR code image
$qr->draw(250, "../../images/qr-kod.png");

header("Refresh:0; url=../index.php?status=success");
} 
 

?>