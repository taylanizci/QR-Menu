-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 06 Eki 2020, 13:08:35
-- Sunucu sürümü: 5.7.31
-- PHP Sürümü: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `menu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE IF NOT EXISTS `ayarlar` (
  `id` int(11) NOT NULL,
  `site_logo` varchar(250) NOT NULL,
  `site_baslik` varchar(250) NOT NULL,
  `site_aciklama` varchar(400) NOT NULL,
  `site_anahtar_kelimeler` varchar(499) NOT NULL,
  `site_sahip` varchar(300) NOT NULL,
  `yonetim_tema` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `site_logo`, `site_baslik`, `site_aciklama`, `site_anahtar_kelimeler`, `site_sahip`, `yonetim_tema`) VALUES
(1, 'images/31303229452599621994fer-logo.png', 'Men&uuml;', 'QR MEN&Uuml;', 'men&uuml;,qr men&uuml;,menu,qr', 'taylanizci', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_kategori` varchar(250) NOT NULL,
  `kat_img` varchar(250) NOT NULL,
  `kat_sira` int(11) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `menu_kategori`, `kat_img`, `kat_sira`) VALUES
(1, 'TATLILAR', 'images/31192257262401823931midye-baklava-tum-tatlilar-198-48-B.jpg', 4),
(2, 'APERATİFLER', 'images/22150249662258928845kasarli-tost-dcb9.jpg', 3),
(3, 'İÇECEKLER', '', 5),
(5, 'Salatalar', '', 2),
(10, 'Soğuk İ&Ccedil;ECEKLER', '', 6),
(19, 'Hamburgerler', 'images/25696285233095322072burger.jpg', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `kullanici_id` int(11) NOT NULL AUTO_INCREMENT,
  `kullanici_resim` varchar(250) NOT NULL,
  `kullanici_isim` varchar(250) NOT NULL,
  `kullanici_mail` varchar(250) NOT NULL,
  `kullanici_sifre` varchar(250) NOT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_resim`, `kullanici_isim`, `kullanici_mail`, `kullanici_sifre`) VALUES
(1, 'assets/img/28950257842237721580logo-test.jpg', 'demo', 'demo', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_id` int(11) NOT NULL,
  `urun_baslik` varchar(250) NOT NULL,
  `urun_detay` varchar(500) NOT NULL,
  `urun_fiyat` varchar(250) NOT NULL,
  `menu_sira` int(11) NOT NULL,
  `menu_resim` varchar(450) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `menu`
--

INSERT INTO `menu` (`menu_id`, `kategori_id`, `urun_baslik`, `urun_detay`, `urun_fiyat`, `menu_sira`, `menu_resim`) VALUES
(1, 1, 'K&uuml;nefe', 'Antep fıstığı ile s&uuml;slenmiş, eşsiz Maraş dondurması eşliğinde', '19,99', 1, 'images/31146200272095628947kunefe.jpg'),
(2, 2, 'Tost', 'Domates ve salatalık ile birlikte', '15', 3, 'images/28587259272716120590kasarli-tost-dcb9.jpg'),
(3, 1, 'Baklava', 'Dondurma ile...', '30', 2, 'images/24140293052374221276midye-baklava-tum-tatlilar-198-48-B.jpg'),
(4, 10, 'Pepsi 330 ml', 'Whopper&reg; eti, b&uuml;y&uuml;k boy susamlı sandvi&ccedil; ekmeği, salatalık turşusu, ket&ccedil;ap, mayonez, doğranmış marul, domates ve soğandan oluşan bir Burger King&reg; klasiği. Enfes patates kızartması ve i&ccedil;eceğiyle birlikte Whopper&reg; Men&uuml; keyfini istediğin gibi yaşa!', '5', 4, ''),
(5, 3, 'Su', 'Whopper&reg; eti, b&uuml;y&uuml;k boy susamlı sandvi&ccedil; ekmeği, salatalık turşusu, ket&ccedil;ap, mayonez, doğranmış marul, domates ve soğandan oluşan bir Burger King&reg; klasiği. Enfes patates kızartması ve i&ccedil;eceğiyle birlikte Whopper&reg; Men&uuml; keyfini istediğin gibi yaşa!', '3', 5, ''),
(6, 5, 'Sezar Salata', 'Domates, Salatalık Eşliğinde', '15', 6, ''),
(12, 19, 'Whopper&reg; Men&uuml;', 'Whopper&reg; eti, b&uuml;y&uuml;k boy susamlı sandvi&ccedil; ekmeği, salatalık turşusu, ket&ccedil;ap, mayonez, doğranmış marul, domates ve soğandan oluşan bir Burger King&reg; klasiği. Enfes patates kızartması ve i&ccedil;eceğiyle birlikte Whopper&reg; Men&uuml; keyfini istediğin gibi yaşa!', '30', 1, 'images/21773263652465529896'),
(13, 19, 'Chicken Royale&reg; Men&uuml;', 'Whopper&reg; eti, b&uuml;y&uuml;k boy susamlı sandvi&ccedil; ekmeği, salatalık turşusu, ket&ccedil;ap, mayonez, doğranmış marul, domates ve soğandan oluşan bir Burger King&reg; klasiği. Enfes patates kızartması ve i&ccedil;eceğiyle birlikte Whopper&reg; Men&uuml; keyfini istediğin gibi yaşa!', '20', 2, 'images/21570242823068122172'),
(14, 19, 'Kids Hamburger', 'Whopper&reg; eti, b&uuml;y&uuml;k boy susamlı sandvi&ccedil; ekmeği, salatalık turşusu, ket&ccedil;ap, mayonez, doğranmış marul, domates ve soğandan oluşan bir Burger King&reg; klasiği. Enfes patates kızartması ve i&ccedil;eceğiyle birlikte Whopper&reg; Men&uuml; keyfini istediğin gibi yaşa!', '15', 3, 'images/30580238052104528883'),
(15, 2, 'Patetes Kızartması', 'Whopper&reg; eti, b&uuml;y&uuml;k boy susamlı sandvi&ccedil; ekmeği, salatalık turşusu, ket&ccedil;ap, mayonez, doğranmış marul, domates ve soğandan oluşan bir Burger King&reg; klasiği. Enfes patates kızartması ve i&ccedil;eceğiyle birlikte Whopper&reg; Men&uuml; keyfini istediğin gibi yaşa!', '15', 4, 'images/22650246832367931887');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
