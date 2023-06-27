-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 05:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cctv_babel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cctv`
--

CREATE TABLE `cctv` (
  `id_cctv` int(11) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kelurahan` int(11) NOT NULL,
  `nama_cctv` varchar(50) NOT NULL,
  `url_cctv` text NOT NULL,
  `alamat_cctv` text NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `deskripsi_cctv` text NOT NULL,
  `frame_cctv` varchar(255) NOT NULL,
  `tgl_cctv` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cctv`
--

INSERT INTO `cctv` (`id_cctv`, `id_kecamatan`, `id_kelurahan`, `nama_cctv`, `url_cctv`, `alamat_cctv`, `latitude`, `longitude`, `deskripsi_cctv`, `frame_cctv`, `tgl_cctv`) VALUES
(5, 1, 3, 'Sriwijaya', 'https://www.youtube.com/embed/wdbF3WjnDbI', 'Gandaria 1a', '-2.1609510004230263', '106.11009772509279', 'lorem ipsum', 'frame-1.jpeg', '2023-03-14 10:42:31'),
(6, 1, 1, 'Pasar Pagi', 'https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FMuhammadRamadhan1501%2Fvideos%2F4037385116327754%2F&show_text=false&width=560&t=0', 'Jalan Pasar Pagi', '-2.13411558511828', '106.1045869790789', 'lorem ipsum', 'frame-2.jpg', '2023-03-14 10:42:31'),
(7, 7, 42, 'Pangkal Balam', 'https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2FMuhammadRamadhan1501%2Fvideos%2F1903783153021305%2F&show_text=false&width=560&t=0', 'Jalan PT Timah', '-2.125474116887101', '106.08187883624045', 'lorem ipsum', 'frame-1.jpeg', '2023-03-14 10:42:31'),
(9, 5, 29, 'Girimaya', 'https://www.youtube.com/embed/GCNJTx5Ij3w', 'Jalan GreenLand No.23', '-2.097646331629288', '106.10508799552919', 'lorem ipsum', 'frame-2.jpg', '2023-03-14 10:42:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cctv`
--
ALTER TABLE `cctv`
  ADD PRIMARY KEY (`id_cctv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cctv`
--
ALTER TABLE `cctv`
  MODIFY `id_cctv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
