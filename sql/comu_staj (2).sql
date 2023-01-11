-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 11:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comu_staj`
--

-- --------------------------------------------------------

--
-- Table structure for table `bolumler`
--

CREATE TABLE `bolumler` (
  `id` int(11) NOT NULL,
  `bolum_ad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bolumler`
--

INSERT INTO `bolumler` (`id`, `bolum_ad`) VALUES
(7, 'Bilgisayar Programcılığı'),
(9, 'İnşaat Teknikerliği');

-- --------------------------------------------------------

--
-- Table structure for table `danisman_detay`
--

CREATE TABLE `danisman_detay` (
  `id` int(11) NOT NULL,
  `unvan_id` int(11) NOT NULL,
  `danisman_id` int(11) NOT NULL,
  `bolum_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `danisman_detay`
--

INSERT INTO `danisman_detay` (`id`, `unvan_id`, `danisman_id`, `bolum_id`) VALUES
(26, 2, 43, 7),
(29, 1, 48, 9),
(30, 1, 52, 7);

-- --------------------------------------------------------

--
-- Table structure for table `donemler`
--

CREATE TABLE `donemler` (
  `id` int(11) NOT NULL,
  `donem_yil` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donemler`
--

INSERT INTO `donemler` (`id`, `donem_yil`) VALUES
(1, 2022);

-- --------------------------------------------------------

--
-- Table structure for table `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `soyad` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sifreHash` varchar(255) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `ad`, `soyad`, `email`, `sifreHash`, `rol_id`) VALUES
(1, 'Ümit', 'Demir', 'müdür@comu.edu.tr', '304e19039eda30537eb597547b43f2d3', 1),
(43, 'Yelda', 'Fırat', 'yelda@comu.ogr.edu.tr', '4e6fec3630db86b46933bfef7b8f8d48', 2),
(44, 'Personel', 'Test', 'personel@comu.edu.tr', '24d5cf4a7c1c01020a4131757f1406f7', 3),
(45, 'Aytuğ', 'Tuncer', '200929029@ogr.comu.edu.tr', '475669a24cedc37ff25aedf47397aa7c', 4),
(48, 'Murat', 'Dalkırıç', 'murat@comu.ogr.edu.tr', '7b6bb36f3b0e576af4fff416d7d7a2fa', 2),
(49, 'Berke', 'Altuntaş', '200624029@ogr.comu.edu.tr', '6cc2d13dba8f8b5678bb299f55e69140', 4),
(52, 'test', 'danisman', 'testdanisman@comu.edu.tr', '5675cbeda1e9fb22910ed7ac90fb1dac', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ogrenci_detay`
--

CREATE TABLE `ogrenci_detay` (
  `id` int(11) NOT NULL,
  `ogrenci_id` int(11) NOT NULL,
  `danisman_id_fk` int(11) NOT NULL,
  `bolum_id_fk` int(11) NOT NULL,
  `ogrenci_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ogrenci_detay`
--

INSERT INTO `ogrenci_detay` (`id`, `ogrenci_id`, `danisman_id_fk`, `bolum_id_fk`, `ogrenci_no`) VALUES
(9, 45, 43, 7, 200929029),
(10, 49, 48, 9, 200624029);

-- --------------------------------------------------------

--
-- Table structure for table `roller`
--

CREATE TABLE `roller` (
  `id` int(11) NOT NULL,
  `role_ad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roller`
--

INSERT INTO `roller` (`id`, `role_ad`) VALUES
(1, 'müdür'),
(2, 'danışman'),
(3, 'personel'),
(4, 'öğrenci');

-- --------------------------------------------------------

--
-- Table structure for table `sosyal_guvence`
--

CREATE TABLE `sosyal_guvence` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sosyal_guvence`
--

INSERT INTO `sosyal_guvence` (`id`, `ad`) VALUES
(1, 'BAĞKUR’dan sağlık hizmeti alıyor'),
(2, 'SGK’dan sağlık hizmeti alıyor\r\n'),
(3, 'EMEKLİ SANDIĞI’ndan sağlık hizmeti alıyor'),
(4, 'Herhangi bir sigortam bulunmamakta');

-- --------------------------------------------------------

--
-- Table structure for table `staj_kayit`
--

CREATE TABLE `staj_kayit` (
  `id` int(11) NOT NULL,
  `ogrenci_id` int(11) NOT NULL,
  `tc` bigint(20) NOT NULL,
  `tel` bigint(20) NOT NULL,
  `staj_tarih_id` int(11) NOT NULL,
  `sigorta` int(11) NOT NULL,
  `adres` text NOT NULL,
  `mudur_onay` tinyint(1) NOT NULL DEFAULT 0,
  `danisman_onay` tinyint(1) NOT NULL DEFAULT 0,
  `k_ad` varchar(255) NOT NULL,
  `k_adres` text NOT NULL,
  `k_hizmet_alan` varchar(255) NOT NULL,
  `k_no` varchar(255) NOT NULL,
  `k_faks_no` varchar(255) NOT NULL,
  `k_eposta` varchar(255) NOT NULL,
  `k_webadres` text NOT NULL,
  `sigorta_giris_onay` tinyint(1) NOT NULL DEFAULT 0,
  `sigorta_cikis_onay` tinyint(1) NOT NULL DEFAULT 0,
  `create_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staj_kayit`
--

INSERT INTO `staj_kayit` (`id`, `ogrenci_id`, `tc`, `tel`, `staj_tarih_id`, `sigorta`, `adres`, `mudur_onay`, `danisman_onay`, `k_ad`, `k_adres`, `k_hizmet_alan`, `k_no`, `k_faks_no`, `k_eposta`, `k_webadres`, `sigorta_giris_onay`, `sigorta_cikis_onay`, `create_tarih`) VALUES
(7, 45, 33302383892, 5445678503, 12, 1, 'Çanakkale/Gelibolu', 1, 1, 'Çanakkale Belediyesi', 'İsmet Paşa Mahallesi Demircioğlu Caddesi No:132 17100 Çanakkale', 'Bilgi İşlem', '444 17 17', '0 286 212 39 91', 'canakkale.belediyesi@bel.com', 'https://www.canakkale.bel.tr/', 1, 0, '2022-05-01 15:22:47'),
(8, 49, 11111111111, 5111111111, 6, 1, 'Çanakkale/Çan', 0, 1, '300dpi', 'Çanakkale/Barbaros ', 'Yazılım', '5445689603', '2125668501', '300dpi@gmail.com', '300dpi.com', 0, 0, '2022-05-01 15:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `staj_tarih`
--

CREATE TABLE `staj_tarih` (
  `id` int(11) NOT NULL,
  `donem_id` int(11) NOT NULL,
  `haftalik_gun_sayi` int(11) NOT NULL,
  `staj_baslangic` date NOT NULL,
  `staj_bitis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staj_tarih`
--

INSERT INTO `staj_tarih` (`id`, `donem_id`, `haftalik_gun_sayi`, `staj_baslangic`, `staj_bitis`) VALUES
(6, 1, 5, '2022-05-18', '2022-05-30'),
(12, 1, 5, '2022-05-18', '2022-05-30'),
(14, 1, 6, '2022-04-22', '2022-04-02'),
(15, 1, 6, '2022-06-01', '2022-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `unvanlar`
--

CREATE TABLE `unvanlar` (
  `id` int(11) NOT NULL,
  `unvan_ad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unvanlar`
--

INSERT INTO `unvanlar` (`id`, `unvan_ad`) VALUES
(1, 'Prof. Dr.'),
(2, 'Doç. Dr.'),
(3, 'Dr. Öğr.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bolumler`
--
ALTER TABLE `bolumler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danisman_detay`
--
ALTER TABLE `danisman_detay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danisman_detay_ibfk_1` (`bolum_id`),
  ADD KEY `danisman_detay_ibfk_2` (`danisman_id`),
  ADD KEY `danisman_detay_ibfk_3` (`unvan_id`);

--
-- Indexes for table `donemler`
--
ALTER TABLE `donemler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indexes for table `ogrenci_detay`
--
ALTER TABLE `ogrenci_detay`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ogrenci_detay_ibfk_1` (`ogrenci_id`);

--
-- Indexes for table `roller`
--
ALTER TABLE `roller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sosyal_guvence`
--
ALTER TABLE `sosyal_guvence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staj_kayit`
--
ALTER TABLE `staj_kayit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staj_tarih`
--
ALTER TABLE `staj_tarih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unvanlar`
--
ALTER TABLE `unvanlar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bolumler`
--
ALTER TABLE `bolumler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `danisman_detay`
--
ALTER TABLE `danisman_detay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `donemler`
--
ALTER TABLE `donemler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `ogrenci_detay`
--
ALTER TABLE `ogrenci_detay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roller`
--
ALTER TABLE `roller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sosyal_guvence`
--
ALTER TABLE `sosyal_guvence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staj_kayit`
--
ALTER TABLE `staj_kayit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `staj_tarih`
--
ALTER TABLE `staj_tarih`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `unvanlar`
--
ALTER TABLE `unvanlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `danisman_detay`
--
ALTER TABLE `danisman_detay`
  ADD CONSTRAINT `danisman_detay_ibfk_1` FOREIGN KEY (`bolum_id`) REFERENCES `bolumler` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `danisman_detay_ibfk_2` FOREIGN KEY (`danisman_id`) REFERENCES `kullanicilar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `danisman_detay_ibfk_3` FOREIGN KEY (`unvan_id`) REFERENCES `unvanlar` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD CONSTRAINT `kullanicilar_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roller` (`id`);

--
-- Constraints for table `ogrenci_detay`
--
ALTER TABLE `ogrenci_detay`
  ADD CONSTRAINT `ogrenci_detay_ibfk_1` FOREIGN KEY (`ogrenci_id`) REFERENCES `kullanicilar` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
