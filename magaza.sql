-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 13 Tem 2015, 13:34:30
-- Sunucu sürümü: 5.5.43-0ubuntu0.14.04.1
-- PHP Sürümü: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `magaza`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE IF NOT EXISTS `kullanici` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `kayittarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tanitim` text COLLATE utf8_turkish_ci,
  `adres` text COLLATE utf8_turkish_ci NOT NULL,
  `adresgoster` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=13 ;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`userid`, `nick`, `sifre`, `email`, `ad`, `soyad`, `kayittarih`, `tanitim`, `adres`, `adresgoster`) VALUES
(2, 'admin', '008bd5ad93b754d500338c253d9c1770', 'emrekp@outlook.com.', 'Emre', 'Kaplan', '2015-07-13 00:49:17', 'Ben bu sitenin adminiyim.', 'YÄ±ldÄ±z Teknik', 1),
(7, 'emreokul', 'c1101c86e7b7a604ff93ba4d99017ccf', 'l5212030@std.yildiz.edu.tr', 'Emre', 'Kaplan', '2015-07-13 00:49:17', 'Bu da test hesabÄ±dÄ±r.', 'Bu da test adresi.', 1),
(10, 'erota', '8562ae5e286544710b2e7ebe9858833b', 'erko@ero.com', 'Lolo', 'Kapo', '2015-07-13 00:49:17', '', 'Bunu da görüntüleyebilirsin.', 1),
(11, 'emrecom', '008bd5ad93b754d500338c253d9c1770', 'emrekp@outlook.com', 'Emre', 'Kaplan', '2015-07-13 00:49:17', 'Merabalar', 'OsmanaÄŸa', 1),
(12, 'emrebey', '9e84a9df16b1ad5a08d25f6e5f8ec5f8', 'l5212030@std.yildiz.edu.tr', 'Emre', 'Kaplan', '2015-07-13 00:49:17', '', 'OsmanaÄŸa Mah.', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE IF NOT EXISTS `urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(100) NOT NULL,
  `fiyat` float NOT NULL,
  `detay` text NOT NULL,
  `satici` int(11) NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `resimadi` varchar(200) DEFAULT NULL,
  `yayin` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin5 AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `isim`, `fiyat`, `detay`, `satici`, `tarih`, `resimadi`, `yayin`) VALUES
(1, 'Deneme Ã¼rÃ¼nÃ¼', 237, 'Misgibi Ã¼rÃ¼nÃ¼m', 0, '2015-07-08 20:58:21', NULL, 1),
(2, 'Deneme Ã¼rÃ¼nÃ¼', 237, 'Mis gibi Ã¼rÃ¼n', 2, '2015-07-08 21:00:38', NULL, 1),
(3, 'Bir Ã¼rÃ¼n var ki', 2105, 'Ã?rÃ¼nÃ¼n detayÄ± bilmemne', 11, '2015-07-09 23:34:28', NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
