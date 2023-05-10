-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 May 2023, 21:39:00
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `haber`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `haberbilgileri`
--

CREATE TABLE `haberbilgileri` (
  `id` bigint(20) NOT NULL,
  `haberBasligi` text NOT NULL,
  `haber` longtext NOT NULL,
  `editorname` text NOT NULL,
  `editorsurname` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `haberbilgileri`
--

INSERT INTO `haberbilgileri` (`id`, `haberBasligi`, `haber`, `editorname`, `editorsurname`, `time`) VALUES
(1, 'SİVASA YHT GELİYOR', 'HA GELDİ HA GELECEK 10 SENE OLDU AMK', 'korkusuz mehmet', 'korkusuz arslan', '2023-05-08 19:19:10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_data`
--

CREATE TABLE `user_data` (
  `id` int(99) NOT NULL,
  `user_name` text NOT NULL,
  `user_surname` text NOT NULL,
  `user_password` text NOT NULL,
  `levelname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `user_data`
--

INSERT INTO `user_data` (`id`, `user_name`, `user_surname`, `user_password`, `levelname`) VALUES
(1, 'deneme', 'deneme', '123', ''),
(2, 'deneme1', 'deneme1', '1', ''),
(4, 'admin', 'admin', '1', '');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `haberbilgileri`
--
ALTER TABLE `haberbilgileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `haberbilgileri`
--
ALTER TABLE `haberbilgileri`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
