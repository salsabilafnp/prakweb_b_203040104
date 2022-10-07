-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 03:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakweb_2022_b_203040104`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(5) NOT NULL,
  `judul_buku` varchar(150) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `gambar` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul_buku`, `genre`, `pengarang`, `penerbit`, `tahun_terbit`, `gambar`) VALUES
(2, 'Bumi', 'Fiksi', 'Tere Liye', 'Gramedia Pustaka Utama', 2014, 'bumi.jpg'),
(3, 'Bulan', 'Fiksi', 'Tere Liye', 'Gramedia Pustaka Utama', 2015, 'bulan.jpg'),
(4, 'Matahari', 'Fiksi', 'Tere Liye', 'Gramedia Pustaka Utama', 2016, 'matahari.jpg'),
(5, 'Bintang', 'Fiksi', 'Tere Liye', 'Gramedia Pustaka Utama', 2017, 'bintang.jpg'),
(6, 'Ceros dan Batozar', 'Fiksi', 'Tere Liye', 'Gramedia Pustaka Utama', 2018, 'ceros batozar.jpg'),
(7, 'Komet', 'Fiksi', 'Tere Liye', 'Gramedia Pustaka Utama', 2018, 'komet.jpg'),
(8, 'Komet Minor', 'Fiksi', 'Tere Liye', 'Gramedia Pustaka Utama', 2019, 'komet minor.jpg'),
(9, 'Selena', 'Fiksi', 'Tere Liye', 'Gramedia Pustaka Utama', 2020, 'selena.jpg'),
(10, 'Nebula', 'Fiksi', 'Tere Liye', 'Gramedia Pustaka Utama', 2020, 'nebula.jpg'),
(11, 'Si Putih', 'Fiksi', 'Tere Liye', 'Gramedia Pustaka Utama', 2021, 'si putih.jpg'),
(16, 'tes isi', 'a', 'unknown', 'GPU', 2022, '63402b99a79c9.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
