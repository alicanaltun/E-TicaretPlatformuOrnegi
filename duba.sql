-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 11 Haz 2024, 19:07:24
-- Sunucu sürümü: 8.2.0
-- PHP Sürümü: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `duba`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anahtarlar`
--

DROP TABLE IF EXISTS `anahtarlar`;
CREATE TABLE IF NOT EXISTS `anahtarlar` (
  `anahtar_id` int NOT NULL AUTO_INCREMENT,
  `urun_id` int DEFAULT NULL,
  `urun_anahtarKodu` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `kullanilma_durumu` bit(1) DEFAULT b'0',
  PRIMARY KEY (`anahtar_id`),
  KEY `urun_id` (`urun_id`)
) ENGINE=MyISAM AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `anahtarlar`
--

INSERT INTO `anahtarlar` (`anahtar_id`, `urun_id`, `urun_anahtarKodu`, `kullanilma_durumu`) VALUES
(1, 2, '2J68-A5CD-M34T-H2M5F-FFC0', b'1'),
(2, 1, '6ZNW-C4TP-NN2X-DNNS-2UXV', b'1'),
(3, 1, 'JHZZ-KCT4-BAEX-LBA6-E245', b'1'),
(4, 2, 'BNZ5-3DB8-Q97C-P52T-OWQ3', b'1'),
(5, 2, '1JS9-DK4H-MV3G-DN9J-5K3J', b'1'),
(7, 1, 'TP6U-4TZ4-W7Z4-5FLN-3T03', b'1'),
(27, 39, 'VOLM-YVIG-VJZZ-J0YL-TN0T', b'1'),
(26, 39, '419Y-IR6A-L7Q1-ZYN5-AU7T', b'0'),
(25, 39, 'TAYX-X1O7-S68K-0CBM-2QUI', b'0'),
(24, 39, '6P5I-P1R5-GCMV-9977-J5LE', b'0'),
(28, 39, 'QPCD-N69S-D8LN-TLUT-HQ2T', b'0'),
(29, 39, '6993-GC19-3Z2M-OVFS-F89R', b'0'),
(30, 39, 'IS9A-LHFA-J91V-US5I-320W', b'0'),
(31, 39, '997X-XHQP-GM61-W2ND-X8BS', b'0'),
(32, 39, 'E4YT-FWEC-0QSK-PYGW-NRYK', b'0'),
(44, 40, 'AXPD-5WF4-QXYZ-WY4I-GCC4', b'1'),
(34, 39, '6JKD-SU11-WOYM-Q9A6-WG0V', b'0'),
(35, 39, 'EY2S-3DSY-8QUR-FRED-RTT4', b'0'),
(36, 39, 'E5JM-B64E-TZQJ-RHTY-Q3ZQ', b'0'),
(37, 39, 'O8WC-BS2Q-P3GV-GUSO-18SD', b'0'),
(38, 39, '44B3-SV0D-D5DH-XJJW-K3TO', b'0'),
(39, 39, 'DZSO-INUL-3A20-EZ2W-B025', b'0'),
(40, 39, 'CRKL-GEWJ-JKJD-DYQU-OGHK', b'0'),
(41, 39, '79PQ-X8W1-HWJV-VCGG-ZZN5', b'0'),
(42, 39, '0BFN-0TTU-MSWP-KXHZ-ART6', b'0'),
(43, 39, '6USM-IYPU-BWRZ-BG61-E5N3', b'0'),
(45, 40, 'EYA4-BIRX-DDV9-K5ZX-MG17', b'0'),
(46, 40, '5BH7-N8RG-MF31-EAK1-OFKK', b'0'),
(47, 40, 'S3QR-X5LN-3904-TH2Z-CVPY', b'0'),
(48, 40, '49HW-TDE1-5XUI-TU0W-9ZMT', b'0'),
(49, 40, 'J90O-A5DQ-J5T5-CQF8-TH5N', b'0'),
(50, 40, '0C3K-SCKI-4LB1-0LCM-GTLT', b'0'),
(51, 40, '0G34-81TA-HOTN-BOCD-PRZS', b'0'),
(52, 40, '6HFY-99D3-N62F-BHKV-ZC6O', b'0'),
(64, 1, 'AXPD-5WF4-QXYZ-WY4I-GCC3', b'0'),
(54, 40, 'JFTS-0W4V-GHR9-1PXN-QPLA', b'0'),
(55, 40, 'D7OP-R1VP-V84I-HAEG-WTEV', b'0'),
(56, 40, 'PTZY-PSMY-HVR1-0RBC-B2UY', b'0'),
(57, 40, 'KS6E-3DGO-1C7F-L8B5-XMK3', b'0'),
(58, 40, 'OE7V-MI0S-L91S-5RT8-A24N', b'0'),
(59, 40, '0S2V-WYBX-5S6B-PQ1T-HQ3Z', b'0'),
(60, 40, '7ZBG-Y2CC-RFID-6Q4W-AAI6', b'0'),
(61, 40, '92XX-VYKI-R01R-3KDD-RLGA', b'0'),
(62, 40, 'CTDF-LY4D-JHCD-IOOA-BJ9Q', b'0'),
(63, 40, 'YCUO-NKQ4-5FDE-JRDO-N8BB', b'0'),
(65, 1, 'EYA4-BIRX-DDV9-K5ZX-MG17', b'0'),
(66, 1, '5BH7-N8RG-MF31-EAK1-OFKK', b'0'),
(67, 1, 'S3QR-X5LN-3904-TH2Z-CVPY', b'0'),
(68, 1, '49HW-TDE1-5XUI-TU0W-9ZMT', b'0'),
(69, 1, 'J90O-A5DQ-J5T5-CQF8-TH5N', b'0'),
(70, 1, '0C3K-SCKI-4LB1-0LCM-GTLT', b'0'),
(71, 1, '0G34-81TA-HOTN-BOCD-PRZS', b'0'),
(72, 1, '6HFY-99D3-N62F-BHKV-ZC6O', b'0'),
(73, 1, '1MLY-C8SA-48SE-ZJBX-AH25', b'0'),
(74, 1, 'JFTS-0W4V-GHR9-1PXN-QPLA', b'0'),
(75, 1, 'D7OP-R1VP-V84I-HAEG-WTEV', b'0'),
(76, 1, 'PTZY-PSMY-HVR1-0RBC-B2UY', b'0'),
(77, 1, 'KS6E-3DGO-1C7F-L8B5-XMK3', b'0'),
(78, 1, 'OE7V-MI0S-L91S-5RT8-A24N', b'0'),
(79, 1, '0S2V-WYBX-5S6B-PQ1T-HQ3Z', b'0'),
(80, 1, '7ZBG-Y2CC-RFID-6Q4W-AAI6', b'0'),
(81, 1, '92XX-VYKI-R01R-3KDD-RLGA', b'0'),
(82, 1, 'CTDF-LY4D-JHCD-IOOA-BJ9Q', b'0'),
(83, 1, 'YCUO-NKQ4-5FDE-JRDO-N8BB', b'0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE IF NOT EXISTS `kategoriler` (
  `kategori_id` int NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_adi`) VALUES
(1, 'RYO'),
(2, 'Simülasyon'),
(3, 'Spor'),
(4, 'Aksiyon'),
(5, 'Macera'),
(6, 'Strateji'),
(7, 'Yarış'),
(8, 'Gizlilik'),
(9, 'Korku'),
(10, 'Bulmaca'),
(11, 'Arcade'),
(12, 'Platform'),
(13, 'Görsel Roman'),
(14, 'Battle Royale'),
(15, 'Point & Click'),
(16, 'Nişancı'),
(17, 'MOBA'),
(18, 'E-spor'),
(19, 'Kelime Oyunu'),
(20, 'Eğitici'),
(21, 'Sandbox');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

DROP TABLE IF EXISTS `kullanicilar`;
CREATE TABLE IF NOT EXISTS `kullanicilar` (
  `kullanici_id` int NOT NULL AUTO_INCREMENT,
  `kullanici_adi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `sifre_salt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `sifre_hash` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `ad` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `soyad` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `adres` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci,
  `kayit_tarihi` datetime NOT NULL,
  `son_oturum_tarihi` datetime DEFAULT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_adi`, `sifre_salt`, `sifre_hash`, `email`, `ad`, `soyad`, `adres`, `kayit_tarihi`, `son_oturum_tarihi`) VALUES
(7, 'ali.can.altun', 'd57829780448ee1fb3e57ffbc1e7f569544ca58652ac516a9109745a9f5abb43', '$6$d57829780448ee1f$kD465v4cqxECz6tWGjzj.BGO1/K.SWZznH9EInhreArg/g1qdThc6EvHPq1N9/LlMECF2yJ8DvZP1hOBRsQWy.', 'ali@gmail.com', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(9, '1220505015', 'ead90072712b8827f4ae3494464a6848e60cb28881040de43c3b0b01c15cdef8', '$6$ead90072712b8827$qGFGU.E8Mf3XNCZk2LLfvprOPBHjVimK5iF5KvrzxOiUzJ7kyFVGpFeb6rSZwxEnEu0p7XCJLDQxUZtTfo3uG0', 'alicanaltun61@gmail.com', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(17, 'alican', '42b80646a0c50d1934bb5d29c62a82252d0f3d7e2fc18061781b34b7763305dc', '$6$42b80646a0c50d19$gKgMv9ojESw3LLHCuFbfp31GPRbopfr/.F90b.W8Mf0uuOGPx9zx0TgmejWwEct50DNrlhXYCJsEQUkswEIcN.', 'alicanaltun61@gmail.com', NULL, NULL, NULL, '0000-00-00 00:00:00', NULL),
(25, 'alicanaltun', '82aed5b118e5ca8febaf9d66331e02901831f6a6f978a4b0d9ab3a9e900e5dc6', '$6$82aed5b118e5ca8f$Y.IhOaRzoYZI3CxMmwPUhV4hgACBN/2qWBLRqK7nWt1w/5T0ZMh3itUJ/tBifMGnq0ZT.hI3HdKSHjKQHVb031', 'ali_can@gmail.com', 'Ali Can', 'Altun', NULL, '2024-05-30 22:50:47', '2024-06-10 17:09:07'),
(27, 'ali', '99f25b78dd8926ad9644fd13ba0c0e25329e81eccf72b02723fc094e79366765', '$6$99f25b78dd8926ad$8wtUHQ89iqsD5qOKwjf6XIYfahLocK/bd8Enob4S7w22xZagy4xkbZn7lKgdtwsOa3fqGqoJJerKj34qJ5qLf.', 'alicana@gmail.com', 'Ali Can', 'Altun', 'Kırklareli', '2024-06-10 17:04:07', '2024-06-10 17:17:44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pegi`
--

DROP TABLE IF EXISTS `pegi`;
CREATE TABLE IF NOT EXISTS `pegi` (
  `pegi_id` int NOT NULL,
  `pegi_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `pegi_aciklama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`pegi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `pegi`
--

INSERT INTO `pegi` (`pegi_id`, `pegi_img`, `pegi_aciklama`) VALUES
(18, 'images/pegi/pegi-18.jpg', 'Şiddet, öldürmeye yönlendirme, cinsel içerik, kumar teşviği bulunmaktadır.'),
(3, 'images/pegi/pegi-3.jpg', 'Yayınlanan içerik tüm yaş grupları arasında uygun olarak görülür.'),
(7, 'images/pegi/pegi-7.jpg', 'Yayınlanan içerikte ses ve görüntü yardımı ile 7 yaş altı çocukları korkutabilecek öğeler bulunabili'),
(12, 'images/pegi/pegi-12.jpg', 'İçeriklerde korku ve şiddetin yanı sıra, fantastik karakterler, şiddet, gerçekçi olmayan şiddet öğel'),
(16, 'images/pegi/pegi-16.jpg', 'İçeriklerde korku, cinsel içerik ve şiddet bulunur. Sigara, alkol kullanımı da bulunabilir.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satislar`
--

DROP TABLE IF EXISTS `satislar`;
CREATE TABLE IF NOT EXISTS `satislar` (
  `satislar_id` int NOT NULL AUTO_INCREMENT,
  `kullanici_id` int DEFAULT NULL,
  `araToplam` decimal(10,2) NOT NULL,
  `indirim` decimal(10,2) NOT NULL,
  `toplam` decimal(10,2) NOT NULL,
  `satisTarihi` datetime NOT NULL,
  PRIMARY KEY (`satislar_id`),
  KEY `kullanici_id` (`kullanici_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `satislar`
--

INSERT INTO `satislar` (`satislar_id`, `kullanici_id`, `araToplam`, `indirim`, `toplam`, `satisTarihi`) VALUES
(1, 22, 1998.00, 399.60, 1598.40, '2024-05-26 15:16:56'),
(2, 22, 1199.00, 0.00, 1199.00, '2024-05-31 03:29:52'),
(3, 22, 799.00, 0.00, 799.00, '2024-05-31 15:08:22'),
(4, 22, 1199.00, 0.00, 1199.00, '2024-06-02 17:56:16'),
(5, 22, 1199.00, 0.00, 1199.00, '2024-06-03 12:14:06'),
(6, 22, 1359.99, 0.00, 1359.99, '2024-06-09 17:43:13'),
(7, 27, 799.00, 159.80, 639.20, '2024-06-10 17:05:53'),
(8, 27, 1359.59, 0.00, 1359.59, '2024-06-10 17:15:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satis_detaylari`
--

DROP TABLE IF EXISTS `satis_detaylari`;
CREATE TABLE IF NOT EXISTS `satis_detaylari` (
  `satislar_id` int DEFAULT NULL,
  `urun_id` int DEFAULT NULL,
  `platform` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `anahtar_id` int DEFAULT NULL,
  KEY `satislar_id` (`satislar_id`),
  KEY `urun_id` (`urun_id`),
  KEY `anahtar_id` (`anahtar_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `satis_detaylari`
--

INSERT INTO `satis_detaylari` (`satislar_id`, `urun_id`, `platform`, `anahtar_id`) VALUES
(1, 1, 'PS5', 2),
(1, 2, 'PS5', 1),
(2, 2, 'PS5', 1),
(3, 1, 'PS5', 3),
(4, 2, 'PS5', 4),
(5, 2, 'PS5', 5),
(6, 39, 'XBOX', 27),
(7, 1, 'XBOX', 7),
(8, 40, 'PS5', 44);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

DROP TABLE IF EXISTS `urunler`;
CREATE TABLE IF NOT EXISTS `urunler` (
  `urun_id` int NOT NULL AUTO_INCREMENT,
  `urun_adi` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_fiyat` decimal(10,2) NOT NULL,
  `urun_indirimDurumu` bit(1) DEFAULT b'0',
  `urun_indirimsizFiyat` decimal(10,2) DEFAULT NULL,
  `urun_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_gosterilmeSayisi` int NOT NULL,
  PRIMARY KEY (`urun_id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `urun_adi`, `urun_fiyat`, `urun_indirimDurumu`, `urun_indirimsizFiyat`, `urun_img`, `urun_gosterilmeSayisi`) VALUES
(1, 'Cyberpunk 2077', 799.00, b'1', 1099.00, 'images/games/Cyberpunk_2077/img.png', 0),
(2, 'EA SPORTS™ FC 24', 1199.00, b'0', NULL, 'images/games/EA_SPORTS™_FC_24/img.png', 0),
(3, 'Lords of the Fallen', 799.00, b'0', NULL, 'images/games/Lords_of_the_Fallen/img.png', 0),
(4, 'Red Dead Redemption 2', 1150.00, b'0', NULL, 'images/games/Red_Dead_Redemption_2/img.png', 0),
(5, 'The Last of Us Part I', 1099.00, b'0', NULL, 'images/games/The_Last_of_Us_Part_I/img.png', 0),
(6, 'Grand Theft Auto V', 375.00, b'1', 551.00, 'images/games/Grand_Theft_Auto_V/img.png', 0),
(7, 'Alan Wake II', 912.00, b'0', NULL, 'images/games/Alan_Wake_II/img.png', 0),
(8, 'Assassin\'s Creed Mirage', 849.00, b'0', NULL, 'images/games/Assassin\'s_Creed_Mirage/img.png', 0),
(9, 'God of War: Ragnarök', 1449.00, b'0', NULL, 'images/games/God_of_War_Ragnarök/img.png', 0),
(10, 'Mount & Blade II Bannerlord', 449.00, b'1', 732.00, 'images/games/Mount_&_Blade_II_Bannerlord/img.png', 0),
(11, 'Lethal Company', 175.00, b'1', 478.00, 'images/games/Lethal_Company/img.png', 0),
(12, 'Remnant II', 685.00, b'0', NULL, 'images/games/Remnant_II/img.png', 0),
(13, 'Hitman: World of Assassination', 419.00, b'1', 1099.00, 'images/games/Hitman_World_of_Assassination/img.png', 0),
(14, 'Uncharted Legacy of Thieves Collection', 899.00, b'0', NULL, 'images/games/Uncharted_Legacy_of_Thieves_Collection/img.png', 0),
(15, 'Marvel\'s Spider-Man 2', 1449.00, b'0', NULL, 'images/games/Marvel\'s_Spider-Man_2/img.png', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun_detaylari`
--

DROP TABLE IF EXISTS `urun_detaylari`;
CREATE TABLE IF NOT EXISTS `urun_detaylari` (
  `urun_id` int DEFAULT NULL,
  `kategori_id` int DEFAULT NULL,
  `pegi_id` int DEFAULT NULL,
  `urun_metascore` int DEFAULT NULL,
  `urun_metascore_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `platform_ps5` bit(1) DEFAULT NULL,
  `platform_xbox` bit(1) DEFAULT NULL,
  `platform_steam` bit(1) DEFAULT NULL,
  `urun_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_img1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_img2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_img3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_video1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_videothmb1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_thmb1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_thmb2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_thmb3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `urun_aciklama` text CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci,
  `urun_gelistirici` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `urun_yayinci` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `urun_cikisTarihi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  KEY `urun_id` (`urun_id`),
  KEY `kategori_id` (`kategori_id`),
  KEY `pegi_id` (`pegi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `urun_detaylari`
--

INSERT INTO `urun_detaylari` (`urun_id`, `kategori_id`, `pegi_id`, `urun_metascore`, `urun_metascore_url`, `platform_ps5`, `platform_xbox`, `platform_steam`, `urun_logo`, `urun_img1`, `urun_img2`, `urun_img3`, `urun_video1`, `urun_videothmb1`, `urun_thmb1`, `urun_thmb2`, `urun_thmb3`, `urun_aciklama`, `urun_gelistirici`, `urun_yayinci`, `urun_cikisTarihi`) VALUES
(1, 1, 18, 86, 'https://www.metacritic.com/game/cyberpunk-2077/', b'1', b'1', b'1', 'images/games/Cyberpunk_2077/logo.png', 'images/games/Cyberpunk_2077/img1.png', 'images/games/Cyberpunk_2077/img2.png', 'images/games/Cyberpunk_2077/img3.png', 'images/games/Cyberpunk_2077/video1.mp4', 'images/games/Cyberpunk_2077/videothmb1.png', 'images/games/Cyberpunk_2077/img-1-thumbnail.png', 'images/games/Cyberpunk_2077/img-2-thumbnail.png', 'images/games/Cyberpunk_2077/img-3-thumbnail.png', 'Cyberpunk 2077, hayatta kalabilmek için ölüm kalım mücadelesi veren bir siberhaydut paralı asker olarak oynadığın, Night City kümekentinde geçen bir açık dünya aksiyon macera RPG\'sidir. İyileştirmeler ve yepyeni ücretsiz ek içerikler ile görevlere çıktıkça şöhret kazanıp yeni geliştirmeler açarak karakterini ve oynanış stilini özelleştir. Kurduğun ilişkiler ve aldığın kararlar hikâyeyi ve içinde bulunduğun dünyayı şekillendirecek. Burası, efsanelerin yazıldığı yer. Peki seninki nasıl olacak?\r\n            \r\n\r\n2.1 GÜNCELLEMESİNDE KENDİNİZİ KAYBEDİN\r\n2.1 Güncellemesiyle Night City her zamankinden daha canlı! Bütünüyle işlevsel NCART metrosuna bin, şehri keşfederken Radioport ile müzik dinle, partnerinle V\'nin dairesinde takıl, tekrar oynanabilir yarışlarda yarış, yeni araçlar sür, geliştirilmiş motorlu çatışma ve sürüşün tadını çıkar, saklı sırları keşfet ve çok daha fazlasını yap!\r\n           \r\n\r\nKENDİ SİBER HAYDUDUNU YARAT \r\nSibernetik implantlarla donanmış bir kanun kaçağı ol ve Night City sokaklarında kendi efsaneni yaz.\r\n            \r\n\r\nGELECEĞİN ŞEHRİNİ KEŞFET \r\nNight City yapılacak şeylerle, görülecek yerlerle ve tanışılacak insanlarla kaynıyor. Ne zaman nereye gideceğin ve bunu nasıl yapacağın ise sana kalmış.\r\n            \r\n\r\nEFSANENİ YARAT \r\nTehlikeli maceralara atıl ve aldığın kararlarla kaderlerini belirleyeceğin unutulmaz karakterlerle ilişkiler kur.\r\n            \r\n\r\nİYİLEŞTİRMELERLE DONATILDI \r\nOynanış, ekonomi, şehir, harita kullanımı ve daha birçok alanda etkili sayısız değişiklik ve iyileştirmeler ile bambaşka bir Cyberpunk 2077 deneyimi yaşa.', 'CD PROJEKT RED', 'CD PROJEKT RED', '10 Aralık 2020'),
(4, 4, 18, 97, 'https://www.metacritic.com/game/red-dead-redemption-2/', b'1', b'1', b'1', 'images/games/Red_Dead_Redemption_2/logo.png', 'images/games/Red_Dead_Redemption_2/img1.png', 'images/games/Red_Dead_Redemption_2/img2.png', 'images/games/Red_Dead_Redemption_2/img3.png', 'images/games/Red_Dead_Redemption_2/video1.mp4', 'images/games/Red_Dead_Redemption_2/videothmb1.png', '', '', '', 'Amerika, 1899.\r\n\r\nArtur Morgan ve Van der Linde çetesi kaçıyor. Federal ajanlar ve ülkenin en iyi ödül avcılarının amansız takibi altında çete üyeleri hayatta kalabilmek için soyguna, yağmaya ve dövüşmeye devam ederek Amerika\'nın kalbindeki çetin toprakları geçmek zorunda. Bu süreçte iç çatışmaları da iyice derinleşen çete artık dağılmanın eşiğine gelirken Artur da zor bir seçimle karşı karşıya: onu yetiştiren çeteye sadık mı kalacak yoksa kendi ideallerinin peşinden mi gidecek?\r\n\r\nRed Dead Redemption 2, şimdi ayrıca ilave Hikaye Modu ve sınırsız özellikler sunan Foto Modunun yanı sıra paylaşımlı, canlı Red dead Online dünyasına da erişim sunuyor. Oyuncular bu dünyada Ödül Avcısı, Tüccar, Koleksiyoncu ve İçki Kaçakçısı rolleri ile suçluları kovalayarak, kendi işlerini kurarak, define arayarak veya kaçak içki üreterek bu vahşi topraklarda kendi kaderlerini yazabiliyorlar.\r\n\r\nRed Dead Redemption 2 PC sürümünün daha da derin ve gerçekçi bir deneyim sunan yeni grafik ve teknik geliştirmeleri bu muazzam açık dünyanın her köşesine ve her ayrıntısına canlılık kazandırmak için PC platformunun sağladığı teknik olanakları sonuna kadar kullanıyor. Bu teknik geliştirmeler arasında, gündüz ve gece ışık/gölge ve derinliğini arttıracak şekilde iyileştirilen genel ve ortam aydınlatması, tüm mesafelerde gelişmiş yansıma ve daha yüksek çözünürlüklü gölgelendirme, bitki ve hayvanlara daha yoğun bir gerçekçilik kazandıran mozaik ağaç dokuları ve gelişmiş ot ve hayvan kürkü dokuları bulunuyor.\r\n\r\nRed Dead Redemption 2 PC sürümü HDR desteği de sunuyor. Bu sayede, 4K ve üzeri ekranlarda mükemmel görüntüleme, çok ekranlı kurulum, geniş ekran yapılandırmaları ve daha yüksek çerçeve hızı mümkün hale geliyor.', 'Rockstar Games', 'Rockstar Games', '5 Aralık 2019'),
(2, 3, 3, 75, 'https://www.metacritic.com/game/ea-sports-fc-24/', b'1', b'1', b'1', 'images/games/EA_SPORTS™_FC_24/logo.png', 'images/games/EA_SPORTS™_FC_24/img1.png', 'images/games/EA_SPORTS™_FC_24/img2.png', 'images/games/EA_SPORTS™_FC_24/img3.png', 'images/games/EA_SPORTS™_FC_24/video1.mp4', 'images/games/EA_SPORTS™_FC_24/videothmb1.png', 'images/games/EA_SPORT_FC_24/img-1-thumbnail.png', 'images/games/EA_SPORT_FC_24/img-2-thumbnail.png', 'images/games/EA_SPORT_FC_24/img-3-thumbnail.png', 'EA SPORTS FC™ 24, Dünyanın Oyununun yeni çağıdır: 19.000+ tam lisanslı oyuncu, 700+ takım ve 30+ lig, bugüne kadar PC’de yaratılan en özgün futbol deneyiminde birlikte oynuyor.\r\n\r\n\r\nHer maçta benzersiz gerçekçiliğe güç veren üç modern teknolojiyle kendinizi oyuna daha yakın hissedin: HyperMotionV, Opta tarafından optimize edilen OyunTarzları ve geliştirilmiş Frostbite™ Oyun Motorunun yanı sıra PC’de canlı ve optimize edilmiş görselleri ortaya çıkaran yeni grafik ayarları.\r\n       \r\nHyperMotionV, oyunu gerçekten oynandığı şekilde yakalıyor; 180’den fazla profesyonel erkekler ve kadınlar maçından hacimsel verileri kullanarak maç içindeki hareketlerin gerçek hayattaki sahada yaşanan aksiyonu doğru şekilde yansıtmasını sağlıyor.\r\n           \r\nOyunTarzları sporcuları boyutlandırıyor; Opta ve diğer kaynaklardan alınan verileri yorumlayarak her oyuncunun gerçekçiliğini ve bireyselliğini artıran imza yeteneklere dönüştürüyor.\r\n            \r\nGeliştirilmiş Frostbite™ Oyun Motoru, Dünyanın Oyununu gerçekçi ayrıntılarla sunarak her maça yeni bir sürükleyicilik seviyesi ekliyor.\r\n           \r\n\r\nYepyeni Ultimate Team™ Geliştirmeleriyle kulüp efsanelerini yetiştirin ve oyuncularınızı geliştirin, hayalinizdeki XI’i kurarken kadın futbolcuları sahada erkek oyuncuların yanında karşılayın.\r\n            \r\nTeknik Direktör ve Oyuncu Kariyerinde kendi hikayenizi yazın, Clubs ve VOLTA FOOTBALL™’da çapraz oyun* ile sahada arkadaşlarınıza katılın.\r\n            \r\n\r\nEA SPORTS FC™ 24, futbolun daha yenilikçi geleceğinin bir sonraki bölümüdür.\r\n            \r\n        \r\nBu oyun, rastgele seçilen sanal oyun içi ögeler dahil sanal oyun içi ögeleri elde etmek için kullanılabilen, isteğe bağlı oyun içi sanal para birimi satın alımları içerir.\r\n                \r\nFC Points, Belçika\'da satılmamaktadır.', 'EA Canada & EA Romania', 'Electronic Arts', '29 Eylül 2023'),
(3, 4, 18, 75, 'https://www.metacritic.com/game/lords-of-the-fallen/', b'1', b'1', b'1', 'images/games/Lords_of_the_Fallen/logo.png', 'images/games/Lords_of_the_Fallen/img1.png', 'images/games/Lords_of_the_Fallen/img2.png', 'images/games/Lords_of_the_Fallen/img3.png', 'images/games/Lords_of_the_Fallen/video1.mp4', 'images/games/Lords_of_the_Fallen/videothmb1.png', '', '', '', 'Lords of the Fallen, ilk oyundan beş kat daha büyük, engin ve birbiriyle bağlantılı bir dünyada yepyeni bir destansı RYO macerası sunuyor.\r\n\r\nEn acımasız zulümlerin yaşandığı bir çağın ardından iblis tanrı Adyr sonunda yenildi. Ama tanrılar sonsuza dek yenik kalmazlar. Şimdi, çağlar sonra Adyr\'in dirilişi yaklaşıyor. Efsanevi Dark Crusader\'lardan biri olarak devasa boss savaşları, hızlı ve zorlu dövüşler, heyecan verici karakter karşılaşmaları ve derin, sürükleyici hikâye anlatımı içeren bu derinlemesine RYO deneyiminde, hem yaşayanların hem de ölülerin diyarlarında yolculuk et. Efsaneniz bir ışık efsanesi mi olacak, yoksa karanlık efsanesi mi?\r\nUmutlanmaktan korkma.\r\nBirbiriyle Bağlantılı Büyük Bir Dünyayı Keşfet\r\nAdyr\'i alt etmek için destansı maceranda iki büyük ve paralel dünyada yolculuğa çık. Yaşayanların diyarı kendine özgü acımasız zorluklarına sahipken, ölülerin kâbus dolu diyarında bilinmeyen tehditler pusuda bekliyor.\r\n\r\nKendi Efsaneni Tanımla\r\nDokuz karakter sınıfından birini seçmeden önce karakterinin görünümünü geniş bir yelpazeye sahip görsel seçenekler arasından tamamen özelleştir. Hangi başlangıç yolunu seçersen seç, nitelikleri, silahları, zırhları ve büyüleri yükselterek karakterini kendi oyun tarzına göre geliştir.\r\n\r\nHızlı, Zorlu ve Akıcı Taktiksel Dövüşte Ustalaş\r\nSadece derin ve taktiksel dövüşte ustalaşanlar hayatta kalmayı başarabilir. Benzersiz yüzlerce ölümcül silah arasından seçim yap ya da metalden vazgeçip büyüye yönelerek gizemli yıkıcı saldırılar gerçekleştir.\r\n\r\nÇevrimiçi Çok Oyunculu Modda Birleş ya da Savaş\r\nKapsamlı ve tek oyunculu hikâyeyi ister kendi başına deneyimle ister çok oyunculu modda diğer Işık Taşıyanlar ile iş birliği yap. Arkadaşlarınla beraber istediğin kadar yolculuk yapmakta özgürsün. Düşmanlardan cesaret (xp), silah ve teçhizat alıp onları dünyana götür. Senin kendi hikâyenin bütünlüğünün korunabilmesi için anahtar eşyalar ve görev ilerlemesi taşınmaz. Çevrim içi oynayanları uyarıyoruz, diğer diyarlardan kahramanlar işgaller yapmaya çalışabilir.\r\n\r\nİnanılmaz Güçlere Sahip Bir Aygıt Kullan\r\nFenerin dünyalar arasında geçiş yapabilen inanılmaz bir güce sahiptir. Bu karanlık sanatı unutulmuş yerlere ulaşmak, efsanevi hazineleri ortaya çıkarmak ve hatta düşmanının ruhunu yönetmek için kullan.\r\n\r\nYeniden Doğ\r\nYaşayanların dünyasında öl ve ölülerin dünyasında diril. Her türden cehennem yaratığı üzerine gelirken, hayata dönmek için son bir şansın var.', 'HEXWORKS', 'CI Games', '13 Ekim 2023'),
(5, 4, 18, 89, 'https://www.metacritic.com/game/the-last-of-us-part-i/', b'1', b'0', b'1', 'images/games/The_Last_of_Us_Part_I/logo.png', 'images/games/The_Last_of_Us_Part_I/img1.png', 'images/games/The_Last_of_Us_Part_I/img2.png', 'images/games/The_Last_of_Us_Part_I/img3.png', 'images/games/The_Last_of_Us_Part_I/video1.mp4', 'images/games/The_Last_of_Us_Part_I/videothmb1.png', '', '', '', '200\'ün üzerinde Yılın Oyunu ödülü alan The Last of Us™\'taki duygu yüklü hikâye anlatımına ve unutulmaz karakterlere tanıklık edin.\r\n\r\nHastalıklıların ve acımasız afetzedelerin dört bir yanda kol gezdiği, yıkıma uğramış bir uygarlıkta hayattan nasibini almış olan baş karakter Joel, 14 yaşındaki Ellie\'yi askerî karantina bölgesinden çıkarması için tutulur. Başta küçük bir mesele gibi görünen bu iş, ülke boyunca devam eden amansız bir yolculuğa dönüşür.\r\n\r\n\r\nThe Last of Us\'ın tek oyunculu hikâyesinin tamamını ve Ellie ile en iyi arkadaşı Riley\'nin hayatlarını sonsuza dek değiştiren olayların derinine inen meşhur ana hikâye öncesi bölümü Left Behind\'ı içerir.', 'Naughty Dog LLC, Iron Galaxy S', 'PlayStation Publishing LLC', '2 Eylül 2022'),
(6, 5, 18, 97, 'https://www.metacritic.com/game/grand-theft-auto-v/', b'1', b'1', b'1', 'images/games/Grand_Theft_Auto_V/logo.png', 'images/games/Grand_Theft_Auto_V/img1.png', 'images/games/Grand_Theft_Auto_V/img2.png', 'images/games/Grand_Theft_Auto_V/img3.png', 'images/games/Grand_Theft_Auto_V/video1.mp4', 'images/games/Grand_Theft_Auto_V/videothmb1.png', '', '', '', 'Genç bir serseri, inzivaya çekilmiş bir banka soyguncusu ve ürkütücü bir psikopat, kendilerini suç dünyasının, ABD hükümetinin ve eğlence sektörünün karışık ağlarında buluyor. Kendileri de dahil, hiç kimseye güvenemedikleri acımasız bir şehirde tehlikeli soygunlar yapmayı başarmak zorundalar.\r\n\r\nGrand Theft Auto V\'in PC sürümü, oyunculara 4k ve ötesinde çözünürlükle ve saniyede 60 kare tazeleme hızıyla Los Santos ve Blaine County dünyasını keşfetme fırsatını sunuyor.\r\n\r\nOyun, fare ve klavye kontrollerinin yanı sıra doku kalitesi, gölgelendirici, mozaikleme ve kenar yumuşatma gibi 25 farklı ayar dahil, PC\'ye özgü birçok özelleştirme tercihi sunuyor. Ayrıca araç ve yaya trafiği kontrolü için nüfus yoğunluğu belirleyebilme özelliği, iki veya üç monitör desteği, 3D uyumu ve tak-çalıştır kumandalar için destek de seçeneklere dahil.\r\n\r\nAyrıca Grand Theft Auto V\'in PC sürümüne 30 oyuncu ve 2 izleyici desteğiyle Grand Theft Auto Online da dahil. Grand Theft Auto Online\'ın PC sürümü, Soygunlar ve Rakip modları da dahil olmak üzere konsollarda çıktığı tarihten beri yayınlanan tüm mevcut geliştirmeleri ve Rockstar\'ın oluşturduğu içeriği de içeriyor.\r\n\r\nGrand Theft Auto V ile Grand Theft Auto Online, Birinci Şahıs Bakışı Moduyla son derece detaylı Los Santos ve Blaine County dünyasını bambaşka bir şekilde görme şansını veriyor.\r\n\r\nAyrıca Grand Theft Auto V\'in PC sürümünde, Grand Theft Auto V ve Grand Theft Auto Online içinden video çekmek, düzenlemek ve paylaşmak için gerekli kreatif araçlardan oluşan Rockstar Editörü de mevcut. Rockstar Edötrünün Yönetmen Modu, oyuncuların göze çarpan hikâye karakterlerini, yayaları, hatta hayvanları dahi kullanarak kendi sahnelerini de çekebilmesini sağlıyor. Oyuncular, ağır çekim, hızlı çekim ve kamera filtreleri gibi düzenleme efektleriyle ve gelişmiş kamera kullanımıyla birlikte GTAV radyo kanallarından kendi şarkılarını ekleyebilecek veya oyun müziğinin çarpıcılığını dinamik olarak kontrol edebiliyor. Hazırlanan videolar, Rockstar Editörü içinden doğrudan YouTube\'e ve Rockstar Games Social Club\'a yüklenebiliyor.\r\n\r\nThe Alchemist ve Oh No gibi sanatçılar, yeni radyo kanalı The Lab FM\'in sunucuları olarak geri dönüyor. The Lab FM, oyunun orijinal müziklerinden esinlenilen yeni ve özel şarkıları yayınlıyor. Misafir sanatçıların arasında Earl Sweatshirt, Freddie Gibbs, Little Dragon, Killer Mike, Future Islands\'dan Sam Herring ve çok daha fazlası mevcut. Oyuncular, ayrıca kendi belirledikleri şarkılardan oluşan yeni radyo kanalı Self Radio ile kendi müziklerini dinlerken Los Santos ile Blaine County\'yi gezebiliyor.', 'Rockstar North', 'Rockstar Games', '17 Eylül 2013'),
(7, 16, 18, 89, 'https://www.metacritic.com/game/alan-wake-ii/', b'1', b'1', b'1', 'images/games/Alan_Wake_II/logo.png', 'images/games/Alan_Wake_II/img1.png', 'images/games/Alan_Wake_II/img2.png', 'images/games/Alan_Wake_II/img3.png', 'images/games/Alan_Wake_II/video1.mp4', 'images/games/Alan_Wake_II/videothmb1.png', '', '', '', 'Alan Wake 2\'nin Kazandığı Ödüller: Time Dergisi Yılın Oyunu Ödülü, Washington Post\'un Yılın Oyunu Ödülü, The Game Awards Töreni\'nin En İyi Oyun Yönetmenliği, En İyi Sanat Yönetmenliği ve En İyi Hikâye Anlatımı Ödülü ve Golden Joystick Eleştirmenlerin Seçimi Ödülü.\r\n\r\nEtrafı Kuzeybatı Pasifik\'le çevrili küçük bir kasaba olan Bright Falls\'ta cinayetle sonuçlanan bir dizi ayin huzuru bozuyor. Zorlu vakaları çözmesiyle tanınan başarılı FBI ajanı Saga Anderson ise cinayetleri araştırmaya geliyor. Bulduğu bir korku hikâyesinin sayfalarında yazanlar gerçekleşmeye başlayınca Anderson\'un vakası bir kâbusa dönüyor.\r\nHayal dünyasındaki bir kâbusta sıkışıp kalan Alan Wake, yaşadığı gerçekliği şekillendirip bu tutsaklıktan kurtulmak için karanlık bir hikâye yazıyor. Wake, bu karanlık dehşet peşindeyken akıl sağlığını korumak ve kötülüğü yenmek için çabalamakta.\r\nAnderson ve Wake, iki ayrı gerçeklikte farklı şeyler yaşıyor olmalarına rağmen aslında ikisi de anlayamadıkları bir şekilde birbirilerine bağlılar; birbirlerini taklit ediyor, aynı şeyleri düşünüyor ve içinde bulundukları dünyaları etkiliyorlar.\r\nKorkunç hikâyenin sebebiyet verdiği doğaüstü karanlık Bright Falls\'u istila ederek sakinlerini yozlaştırıp Anderson ve Wake\'in sevdiklerini tehdit ediyor. Işık ise karşılaştıkları karanlığa karşı tek silahları ve sığınakları. İçinde yalnızca kurbanların ve canavarların olduğu korku hikâyesine sıkışıp kalan Anderson ve Wake, bundan kurtularak olmaları gereken kahramanlara dönüşebilecekler mi?\r\n\r\nÖlümcül Sırları Ortaya Çıkar\r\nKüçük bir kasabada işlenen cinayeti soruşturarak başladığın vaka, kâbus gibi bir serüvene dönüşüyor. Yoğun gerilim ve beklenmedik gelişmelerle dolu bu psikolojik korku hikâyesindeki doğaüstü karanlığın sırrını açığa çıkar.\r\n\r\nİki Karakter İle Oyna\r\nAlan Wake ve Saga Anderson\'ın hikâyelerini tecrübe ederek olayların gidişatına farklı açılardan tanık ol. Anderson\'ın ölüm kalım meselesini çözmesi veya Wake\'in Karanlık Dünya\'nın derinliklerinden kaçmak için gerçekliğini yeniden yazma çabaları arasında geçiş yaparak oyna.\r\n\r\nİki Dünyayı Keşfet\r\nGüzel olduğu kadar dehşete düşürücü olan, her birinde ilginç karakterler ve ölümcül olaylarla karşılaşacağın bu iki dünyayı keşfet. Kuzeybatı Pasifik\'teki Cauldron Lake\'in görkemli doğasını ve Bright Falls ile Watery\'nin sakin ve durgun kasabalarını keşfet. Aynı zamanda Karanlık Dünya\'nın kâbus misali şehrinden kaçmaya çalış.\r\n\r\nIşık ile Hayatta Kal\r\nElindeki sınırlı kaynakları kullanarak zorlu, yakın mesafe karşılaşmalarda güçlü doğaüstü düşmanlarının icabına bak. Hayatta kalmak için silahtan fazlası gerekli: Karanlığa karşı savaşta en büyük silahın ışıktır. Işık, seni zor durumda bırakan düşmanlara karşı tek sığınağın olacak.', 'Remedy Entertainment', 'Remedy Entertainment', '27 Ekim 2023'),
(8, 8, 18, 76, 'https://www.metacritic.com/game/assassins-creed-mirage/', b'1', b'1', b'1', 'images/games/Assassin\'s_Creed_Mirage/logo.png', 'images/games/Assassin\'s_Creed_Mirage/img1.png', 'images/games/Assassin\'s_Creed_Mirage/img2.png', 'images/games/Assassin\'s_Creed_Mirage/img3.png', 'images/games/Assassin\'s_Creed_Mirage/video1.mp4', 'images/games/Assassin\'s_Creed_Mirage/videothmb1.png', '', '', '', 'Bu heyecan verici, anlatı odaklı açık dünya macerasında, orijinal suikastçıların yuvasında yepyeni bir deneyim yaşayın.\r\n\r\nAssassin\'s Creed\'in macerayı yeniden tanımlamasından bu yana geçen 15 yıl sonrasında, Assassin\'s Creed Mirage ile serinin imza parkurlarını ve gizliliğini yepyeni bir şekilde deneyimleyin. \r\n\r\nBu daha küçük ölçekli, özüne dönmüş Assassin\'s oyununda, cevaplar arayan genç sokak hırsızı Basim olarak oynayacaksınız. 9. yüzyıl Bağdat\'ının zengin detaylarla dolu, etkin ve canlı sokaklarında dolaşın, geleceğinizi güvence altına almak için savaşırken geçmişin gizemlerini ortaya çıkarın.\r\n\r\nGölgelerde iz sürün. Zirvedeki suikastçı siz olun.', 'Ubisoft', 'Ubisoft', '5 Ekim 2023'),
(9, 5, 18, 94, 'https://www.metacritic.com/game/god-of-war-ragnarok/', b'1', b'0', b'1', 'images/games/God_of_War_Ragnarök/logo.png', 'images/games/God_of_War_Ragnarök/img1.png', 'images/games/God_of_War_Ragnarök/img2.png', 'images/games/God_of_War_Ragnarök/img3.png', 'images/games/God_of_War_Ragnarök/video1.mp4', 'images/games/God_of_War_Ragnarök/videothmb1.png', '', '', '', 'İSKANDİNAV DESTANI DEVAM EDİYOR\r\nGod of War Ragnarök, Santa Monica Studio ve Jetpack Interactive iş birliğiyle PC\'ye geliyor. Bu destansı ve içten serüvende Kratos ve Atreus\'un içsel mücadelelerine tanık olun.\r\n\r\nEleştirmenlerin beğenisini kazanan God of War\'un (2018) devam oyunu God of War Ragnarök, Fimbulvetr\'in başladığı noktadan devam ediyor. Kratos ve Atreus, cevap arayışında Dokuz Diyar\'ın dokuzunu da dolaşırken Odin\'in Asgard kuvvetleri, kehanete göre dünyanın sonunu getirecek savaş için hazırlanıyor.\r\n\r\nYol boyunca enfes manzaralara sahip mitolojik toprakları keşfedecek ve Kuzey tanrılarından canavarlara, pek çok korkunç düşmanla karşı karşıya gelecekler. Ragnarök tehdidi adım adım yaklaşırken Kratos ve Atreus, kendi huzurları ve diyarların huzuru arasında bir seçim yapmak zorunda kalacak.\r\n\r\nKADERE BOYUN EĞDİRENLER\r\nAtreus, \"\"Loki\"\" kehanetini ve Ragnarök\'te kendisine biçilmiş rolü anlamak adına irfan peşinde koşuyor. Kratos ise geçmişin yükünü sırtından atma ve oğluna babalık yapabilme derdinde.\r\n\r\nAKICI, CANLI SAVAŞLAR\r\nLeviathan Baltası, Kaosun Kılıçları ve Muhafız Kalkanı hem Kratos hem Atreus için bir dizi yeni kabiliyetle birlikte geri dönüyor. Ailesini korumak adına Dokuz Diyar\'da yüzleşeceği düşmanlar, Kratos\'un ölümcül hünerlerini sonuna kadar sınayacak.\r\n\r\nDİYARLARI KEŞFEDİN\r\nCevap arayışında çıkacakları bu serüvende Kratos ve Atreus ile tehlikeli ve büyüleyici toprakları keşfedin.\r\n\r\nGOD OF WAR RAGNARÖK: VALHALLA\'DA KENDİNİZE HÜKMEDİN\r\nGod of War Ragnarök\'ü satın aldığınızda, oyunun çıkışıyla beraber erişilebilir olacak God of War Ragnarök: Valhalla indirilebilir içeriğine de ekstra ücret ödemeden sahip olacaksınız!\r\n\r\nMimir eşliğinde Kratos, son derece şahsi ve içsel, onu hem aklına hem de bedenine hükmetmeye zorlayacak bir yolculuğa çıkıyor. God of War Ragnarök\'ün sevilen çatışma mekaniğini rougelite türünden ilhamla hazırlanmış yepyeni unsurlarla harmanlayan bu yeniden oynanabilir serüvende Valhalla\'nın ona sunduğu mücadelelerle yüzleşiyor.\r\n\r\nRAGNARÖK ÖYKÜSÜNÜN KAPANIŞI\r\nKratos\'un serüveni, God of War İskandinav destanının yeni mekânı Valhalla\'da devam ediyor. Geçmişinden izlerle yüzleşen Kratos, içindeki çatışmaların üstesinden gelip kendisine açılan yolda yürüyecek.\r\n\r\n\r\nÇATIŞMA MEKANİKLERİNE YENİ BİR SOLUK\r\nGod of War Ragnarök\'ün sevilen çatışma mekaniği, rougelite türünden ilhamla hazırlanmış yeni ve deneysel unsurlarla birleşiyor. Valhalla sizi Kratos\'un hünerlerinin her birinde ustalaşmaya zorlarken her denemenizde farklı düşman kombinasyonları ve sürprizler bekliyor olacak!\r\n\r\nSAVAŞIN. ÖĞRENİN. GELİŞİN.\r\nÖlüm asla bir son değil. Kratos\'un silahları, yetenekleri, kalkanları ve kabiliyetleri duruyor ama her yeni denemenizde İstatistikleri, Runik Saldırıları ve Avantajları sıfırlanacak. Kratos her denemede ilerledikçe Valhalla\'nın gizemli derinliklerine ilerlemenize yardımcı ödüller arasından seçimler yapacak, kalıcı geliştirmelerde kullanabileceğiniz kaynaklar toplayacaksınız.', 'Santa Monica Studio, Jetpack I', 'PlayStation Publishing LLC', '9 Kasım 2022'),
(10, 1, 16, 77, 'https://www.metacritic.com/game/mount-and-blade-ii-bannerlord/', b'1', b'1', b'1', 'images/games/Mount_&_Blade_II_Bannerlord/logo.png', 'images/games/Mount_&_Blade_II_Bannerlord/img1.png', 'images/games/Mount_&_Blade_II_Bannerlord/img2.png', 'images/games/Mount_&_Blade_II_Bannerlord/img3.png', 'images/games/Mount_&_Blade_II_Bannerlord/video1.mp4', 'images/games/Mount_&_Blade_II_Bannerlord/videothmb1.png', '', '', '', 'Savaş boruları ötüyor ve kuzgunlar toplanıyor. İmparatorluk iç savaşlar yüzünden bölünmüş durumda. Sınırlarının ötesinde yeni krallıklar yükseliyor. Kılıcını kuşan, zırhını giy, adamlarını topla ve atına atlayarak Kalradya’nın savaş meydanlarında zaferler kazan. Egemenliğini kur ve eskisinin küllerinden yeni bir dünya yarat.\r\n\r\nMount & Blade II: Bannerlord büyük bir başarı elde eden orta çağ savaş simülasyonu ve rol-yapma oyunu Mount & Blade: Warband’in heyecanla beklenen devam oyunudur.\r\n\r\nHiçbir oyun deneyiminin birbirinin aynı olmadığı uçsuz bucaksız bir orta çağ sandbox haritasını keşfederek fetihler gerçekleştirirken, kendi oyun tarzına uygun bir karakter yarat ve geliştir.\r\n\r\nKlanınla Kalradya’nın soyluları arasında yer edinmeye çalışırken ordular topla, politikayla ilgilen, ticaretle uğraş, silahlar yap, yoldaşlar edin ve topraklarını yönet.\r\n\r\nMount & Blade’in beceriye dayalı derin, sezgisel ve yön duyarlı dövüş sistemini kullanarak gerçek zamanlı büyük savaşlarda, ister birinci, ister üçüncü şahıs bakış açısından birliklerine önderlik et ve askerlerinle birlikte savaş.\r\n\r\nSıralamaya dayalı eşleştirmenin yanı sıra, eğlence amaçlı oyun modları da içeren çok oyunculu oyunlarda dünyanın dört bir yanından oyunculara karşı dövüş becerilerini sına ya da Mount & Blade II: Özel Sunucu dosyalarıyla kendi sunucunu aç.\r\n\r\nBambaşka bir macera deneyimlemek için Mount & Blade II: Bannerlord – Modlama Kiti’ni kullanarak oyunu isteğine göre uyarla ve yarattıklarını Steam Atölyesi aracılığıyla başkalarıyla paylaş.', 'TaleWorlds Entertainment', 'TaleWorlds Entertainment', '25 Ekim 2022'),
(11, 9, 16, 90, 'https://www.metacritic.com/game/lethal-company/', b'0', b'0', b'1', 'images/games/Lethal_Company/logo.png', 'images/games/Lethal_Company/img1.png', 'images/games/Lethal_Company/img2.png', 'images/games/Lethal_Company/img3.png', 'images/games/Lethal_Company/video1.mp4', 'images/games/Lethal_Company/videothmb1.png', '', '', '', 'Şirketin sözleşmeli çalışanısınız. Göreviniz, Şirketin kar kotasını karşılamak için terk edilmiş, sanayileşmiş uydulardan hurda toplamaktır. Kazandığınız parayı daha yüksek risk ve ödüllerle yeni aylara seyahat etmek için kullanabilir veya geminiz için şık kostümler ve dekorasyonlar satın alabilirsiniz. Bulduğunuz her yaratığı tarayıp hayvan listenize ekleyerek doğayı deneyimleyin. Harika dış mekanları keşfedin ve sahipsiz, çelik ve beton alt kısımlarını araştırın. Kotayı asla kaçırmayın.\r\n\r\nBu tehlikeler savunmasız ve yalnız kişileri hedef alıyor ve mürettebatınızın korunması tek umudunuz olabilir. Tuzakları çağırmak için radarı kullanarak ve uzaktan kilitli kapılara erişmek için gemi terminalini kullanarak mürettebat arkadaşlarınıza geminizden rehberlik edebilirsiniz veya hep birlikte içeri girebilirsiniz. Şirket mağazasında ışıklar, kürekler, telsizler, sersemletici el bombaları veya müzik çalarlar dahil olmak üzere bu iş için pek çok faydalı araç bulunmaktadır.\r\n\r\nGeceleri işler tehlikeli hale geliyor. İşler çok tehlikeli hale gelmeden tüm değerli eşyalarınızı gemiye taşımak için mürettebat arkadaşlarınızla iletişim kurun ve kimseyi geride bırakmamaya çalışın.', 'Zeekerss', 'Zeekerss', '24 Ekim 2023'),
(12, 16, 18, 80, 'https://www.metacritic.com/game/remnant-ii/', b'1', b'1', b'1', 'images/games/Remnant_II/logo.png', 'images/games/Remnant_II/img1.png', 'images/games/Remnant_II/img2.png', 'images/games/Remnant_II/img3.png', 'images/games/Remnant_II/video1.mp4', 'images/games/Remnant_II/videothmb1.png', '', '', '', 'Hayal Edilemeyen Dünyalar. Acımasız Şartlar.\r\n\r\nRemnant II®, insanlığın hayatta kalan kısmının dehşet verici dünyalarda yepyeni ölümcül yaratıklar ve yüce boss\'lar ile yüzleştiği, çok satan Remnant: From the Ashes\'ın devam oyunudur. Bilinmezliğin derinliklerini kendi başına ya da iki arkadaşınla birlikte keşfet, kadim bir kötülüğün gerçekliğin ta kendisini yok etmesine engel ol. Başarılı olmak için zorlukları aşarken ve insanlığın soyunun tükenmesini engellerken oyuncular kendilerinin ve takım arkadaşlarının becerilerine güvenmeli.\r\n\r\nYoğun Remnant savaş deneyimi\r\nNizam ve çılgınlığın bir araya geldiği menzilli/yakın dövüş savaş deneyimi, kurnaz düşmanlar ve büyük ölçekli boss karşılaşmaları ile geri dönüyor. Farklı biyomlara ve düşmanlara uyum sağlamak için özel ekipmanlar ve silahlar arasından seçim yap. En büyük ödülleri almak isteyen yüksek seviyeli oyuncular boss mücadelelerinin üstesinden gelebilmek için bir araya geliyor.\r\n\r\nKeşfedilecek yeni dünyalar\r\nOyuncular kendi başlarına ya da arkadaşlarıyla ekip olarak mitolojik yaratıklarla ve ölümcül düşmanlarla dolu, hayatta kalma mücadelesi verecekleri yeni garip dünyalara ve ötesine seyahat edecek. Farklı türde yaratıklar, silahlar ve eşyalar olan birçok dünya bulunuyor. Daha da zor mücadelelerin üstesinden gelebilmek için elde ettiğin eşyaları yükselt ve onlardan faydalan.\r\n\r\nTekrar tekrar oynanabilirlik\r\nDallanıp budaklanan görev zincirleri, geliştirmeler, üretim ve ganimet ödülleri; en tecrübeli oyuncuları bile dinamik olarak oluşturulan zindanlarda ve bölgelerde zorlayacak. Acımasız şartların üstesinden gelirken oynanış zor, çeşitli ve ödüllendirici hissettiriyor. Farklı dünyalara serpilen hikâyeler, oyuncuları keşfetmeye ve bölgeleri tekrar tekrar ziyaret etmeye itiyor.\r\n\r\nYeni arketip ilerlemesi\r\nGenişletilmiş Arketip sistemi oyunculara eşsiz pasif bonuslar ve göz alıcı güçler sunuyor. Oynarken birçok Arketip açabilir, seviye kazanabilir ve farklı oyun stilleri için farklı kombinasyonlar yaparak kullanabilirsin.', 'Gunfire Games', 'Arc Games', '25 Temmuz 2023'),
(13, 8, 18, 87, 'https://www.metacritic.com/game/hitman-3/', b'1', b'1', b'1', 'images/games/Hitman_World_of_Assassination/logo.png', 'images/games/Hitman_World_of_Assassination/img1.png', 'images/games/Hitman_World_of_Assassination/img2.png', 'images/games/Hitman_World_of_Assassination/img3.png', 'images/games/Hitman_World_of_Assassination/video1.mp4', 'images/games/Hitman_World_of_Assassination/videothmb1.png', '', '', '', 'En başarılı suikastçının dünyasına gir.\r\n\r\nAJAN 47 OL\r\nÖlümcül becerilerini kanıtlayacağın 20\'den fazla konumda heyecanlı bir casusluk macerası için takımları çek.\r\n\r\nYÖNTEM ÖZGÜRLÜĞÜ\r\nEn ölümcül silahın yaratıcılık. Yeni eşyaların kilidini aç ve yeniden oynanabilirliği yüksek görevlerde yaratıcılığını konuştur.\r\n\r\nSUİKAST DÜNYASI\r\nİlginç karakterler ve ölümcül fırsatlarla dolu bu yaşayan ve nefes alan dünyada gez.\r\n\r\nHITMAN FREELANCER\r\nKendi kurallarına göre oynayacağın, rogue-like unsurlarla derin stratejik planlamayı birleştiren, kalıcı ve sonsuz çeşitliliğe sahip bir oynanış deneyimi.\r\n\r\nHITMAN Suikast Dünyası; ana harekât, kontrat modu, gerginlik kontratları, bulunması zor hedefler ve öne çıkan çevrimiçi içerikler dahil olmak üzere HITMAN, HITMAN 2 ve HITMAN 3\'ün en iyi yönlerini buluşturuyor.', 'IO Interactive A/S', 'IO Interactive A/S', ' 20 Ocak 2022'),
(14, 10, 16, 87, 'https://www.metacritic.com/game/uncharted-legacy-of-thieves-collection/', b'1', b'0', b'1', 'images/games/Uncharted_Legacy_of_Thieves_Collection/logo.png', 'images/games/Uncharted_Legacy_of_Thieves_Collection/img1.png', 'images/games/Uncharted_Legacy_of_Thieves_Collection/img2.png', 'images/games/Uncharted_Legacy_of_Thieves_Collection/img3.png', 'images/games/Uncharted_Legacy_of_Thieves_Collection/video1.mp4', 'images/games/Uncharted_Legacy_of_Thieves_Collection/videothmb1.png', '', '', '', 'UNCHARTED 4: Bir Hırsızın Sonu\r\n\r\n150\'den fazla Yılın Oyunu Ödülü sahibi.\r\n\r\nSon macerasından yıllar sonra emekliye ayrılmış hazine avcısı Nathan Drake, hırsızların dünyasına geri dönmek zorunda kalır. Kader, cilvesiyle devreye girer ve Drake\'in ölü olduğu varsayılan kardeşi Sam, hayatını kurtarması için Drake’ten yardım ister ve Drake\'e karşı koyamayacağı bir macera teklif eder. Drake, en büyük macerasında fiziksel sınırları ile problem çözme yeteneklerini zorlayacak ve sevdiklerini kurtarmak için büyük fedakârlıkları göze alacaktır.\r\n\r\nKaptan Henry Avery’nin uzun zaman önce kaybolmuş hazinesinin peşine düşen Sam ve Drake, Madagaskar ormanlarının derinliklerindeki korsan ütopyası Libertalia\'yı bulmak için yola koyulur. Avery\'nin hazinesi arayışları, abi kardeşi orman adalarına, alabildiğine uzanan şehirlere ve karla kaplı dağlara kadar tüm dünyada geçen bir yolculuğa götürüyor.\r\n\r\n● UNCHARTED serisindeki en büyük ve en ayrıntılı ortamlara sahip olan dünya çapındaki bir maceraya çıkın.\r\n\r\n● Nathan Drake’in daha da kişiselleşen öyküsüyle Naughty Dog’un bol ödüllü hikâye anlatımı deneyimi doruğa çıkıyor.\r\n\r\n● Fırlatma kancasıyla gelen akıcı çatışma ve ilerleme mekanikleri, daha da dinamik ve heyecan dolu aksiyon sahnelerini beraberinde getiriyor.\r\n\r\n\r\nUNCHARTED: Kayıp Miras\r\n\r\nChloe Frazer, kadim bir eseri kurtarmak ve acımasız bir savaş lordundan uzak tutmak için, ünlü paralı asker Nadine Ross\'un yardımını almalı ve Ganesh\'in Altın Fildişi\'ni bulmak için Hindistan\'ın Batı Gat Dağlarına gitmeli. Chloe, şimdiye kadarki en büyük yolculuğunda geçmişiyle yüzleşmeli ve kendi mirasını yaratmak için neyi feda edeceğine karar vermeli.\r\n\r\n● Kent, orman ve antik harabe ortamlarının egzotik bir karışımına ev sahipliği yapan Hint yarımadasının benzersiz bir atmosfere sahip güneybatı sahilinde yepyeni bir maceraya açılın.\r\n\r\n● Naughty Dog ve Uncharted serisine özgü aksiyon, atmosfer ve büyüleyici hikâye sizi bekliyor.\r\n\r\n● Sinematik çatışma sahneleri, keşif deneyimi ve dudak uçuklatan ortamlarda gezinme, karmaşık bulmacalar ve çok daha fazlasıyla beğenilen UNCHARTED serisi deneyimi, pek çok güncellenmiş sistem ve iyileştirmeyle bambaşka bir boyut kazanıyor.', 'Naughty Dog LLC, Iron Galaxy S', 'PlayStation Publishing LLC', '28 Ocak 2022'),
(15, 4, 16, 90, 'https://www.metacritic.com/game/marvels-spider-man-2/', b'1', b'0', b'0', 'images/games/Marvel\'s_Spider-Man_2/logo.png', 'images/games/Marvel\'s_Spider-Man_2/img1.png', 'images/games/Marvel\'s_Spider-Man_2/img2.png', 'images/games/Marvel\'s_Spider-Man_2/img3.png', 'images/games/Marvel\'s_Spider-Man_2/video1.mp4', 'images/games/Marvel\'s_Spider-Man_2/videothmb1.png', '', '', '', 'Spider-Men, Peter Parker ve Miles Morales, Marvel’s Spider-Man\'in büyük beğeni toplayan PS5 oyunuyla yepyeni bir macera için geri dönüyor.\r\n\r\nMarvel\'ın New York\'unda gezmek için yeni Web Wings\'i kullanarak savrulun ve zıplayın, ikonik kötü karakter Venom hayatlarını, şehirlerini ve sevdiklerini yok etmekle tehdit ederken farklı hikâyeleri ve efsanevi güçleri deneyimlemek için Peter Parker ve Miles Morales arasında hızla geçiş yapın.\r\n\r\nSpider-Man hikâyesinin evrimi\r\nİnanılmaz sembiyot kuvveti; hayatlarını, arkadaşlıklarını ve yardıma ihtiyacı olanları koruma görevlerini dengelemeye çalışan Peter ve Miles\'ı hem de maskesizken benzersiz bir güç sınavıyla karşı karşıya bırakıyor.\r\n\r\nİki oynanabilir Spider-Men\'i deneyimleyin\r\nMarvel’ın genişletilmiş New York şehrini keşfederken iki Spider-Men arasında hızla geçiş yapın.\r\n\r\nİkonik Marvel Süper Kötüleriyle savaşın\r\nCanavar Venom, acımasız Kraven the Hunter, uçan Lizard ve daha fazlasıyla bir dizi yeni ve ikonik kötü karakterle savaşın!\r\n\r\nMarvel’ın genişletilmiş New York şehrine gidin\r\nMarvel\'da hiç olmadığı kadar genişleyerek iki yeni ilçe Brooklyn ve Queens\'e ek olarak Coney Island ve daha fazlasına da yer veren New York\'u keşfedin.', 'Insomniac Games', 'PlayStation Publishing LLC', '20 Ekim 2023');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yoneticiler`
--

DROP TABLE IF EXISTS `yoneticiler`;
CREATE TABLE IF NOT EXISTS `yoneticiler` (
  `yonetici_id` int NOT NULL AUTO_INCREMENT,
  `kullanici_id` int DEFAULT NULL,
  `yetki` bit(1) NOT NULL DEFAULT b'0',
  `mevki` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `tc_no` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `telefon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`yonetici_id`),
  KEY `kullanici_id` (`kullanici_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `yoneticiler`
--

INSERT INTO `yoneticiler` (`yonetici_id`, `kullanici_id`, `yetki`, `mevki`, `tc_no`, `telefon`) VALUES
(1, 25, b'1', '', '11111111111', '05123456789');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
