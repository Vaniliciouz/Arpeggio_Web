-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2024 at 02:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_pemweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `nama`, `password`) VALUES
('admin-1717748921', 'acil', 'raul', '827ccb0eea8a706c4c34a16891f84e7b'),
('admin-1717749467', 'abrahamdj_', 'abraham', '248706c023957db08d14f39749879207'),
('admin-1717757076', 'nabil', 'muhammad nabil', '827ccb0eea8a706c4c34a16891f84e7b'),
('admin-1729315010', 'javas', 'javas', '827ccb0eea8a706c4c34a16891f84e7b'),
('admin-1735374692', 'daoa', 'Jorge Martin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` varchar(255) NOT NULL,
  `admin_id` varchar(255) DEFAULT NULL,
  `aktivitas` text DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `admin_id`, `aktivitas`, `waktu`) VALUES
('history-1717748921', 'admin-1717748921', 'Admin baru acil telah dibuat', '2024-06-07 08:28:41'),
('history-1717749015', 'admin-1717748921', 'Telah melakukan login', '2024-06-07 08:30:15'),
('history-1717749100', 'admin-1717748921', 'Menambahkan menu baru', '2024-06-07 08:31:40'),
('history-1717749131', 'admin-1717748921', 'Menambahkan menu baru', '2024-06-07 08:32:11'),
('history-1717749162', 'admin-1717748921', 'Menambahkan menu baru', '2024-06-07 08:32:42'),
('history-1717749206', 'admin-1717748921', 'Menambahkan menu baru', '2024-06-07 08:33:26'),
('history-1717749253', 'admin-1717748921', 'Menambahkan menu baru', '2024-06-07 08:34:13'),
('history-1717749295', 'admin-1717748921', 'Menambahkan menu baru', '2024-06-07 08:34:55'),
('history-1717749394', 'admin-1717748921', 'Menambahkan menu baru', '2024-06-07 08:36:34'),
('history-1717749445', 'admin-1717748921', 'Menambahkan menu baru', '2024-06-07 08:37:25'),
('history-1717749467', 'admin-1717749467', 'Admin baru abrahamdj_ telah dibuat', '2024-06-07 08:37:47'),
('history-1717749475', 'admin-1717749467', 'Telah melakukan login', '2024-06-07 08:37:55'),
('history-1717749509', 'admin-1717748921', 'Telah mengupdate menu Es Teh', '2024-06-07 08:38:29'),
('history-1717749514', 'admin-1717748921', 'Telah mengupdate menu Es Jeruk', '2024-06-07 08:38:34'),
('history-1717749520', 'admin-1717748921', 'Telah mengupdate menu STMJ', '2024-06-07 08:38:40'),
('history-1717749525', 'admin-1717748921', 'Telah mengupdate menu Kopi Tubruk', '2024-06-07 08:38:45'),
('history-1717749531', 'admin-1717748921', 'Telah mengupdate menu Jus Alpukat', '2024-06-07 08:38:51'),
('history-1717749537', 'admin-1717748921', 'Telah mengupdate menu Es Teler', '2024-06-07 08:38:57'),
('history-1717750936', 'admin-1717749467', 'Menambahkan menu baru', '2024-06-07 09:02:16'),
('history-1717750987', 'admin-1717749467', 'Menambahkan menu baru', '2024-06-07 09:03:07'),
('history-1717751075', 'admin-1717749467', 'Menambahkan menu baru', '2024-06-07 09:04:35'),
('history-1717751148', 'admin-1717749467', 'Menambahkan menu baru', '2024-06-07 09:05:48'),
('history-1717751221', 'admin-1717749467', 'Menambahkan menu baru', '2024-06-07 09:07:01'),
('history-1717751276', 'admin-1717749467', 'Menambahkan menu baru', '2024-06-07 09:07:56'),
('history-1717751332', 'admin-1717749467', 'Menambahkan menu baru', '2024-06-07 09:08:52'),
('history-1717751372', 'admin-1717749467', 'Menambahkan menu baru', '2024-06-07 09:09:32'),
('history-1717751421', 'admin-1717749467', 'Menambahkan menu baru', '2024-06-07 09:10:21'),
('history-1717751469', 'admin-1717749467', 'Menambahkan menu baru', '2024-06-07 09:11:09'),
('history-1717757076', 'admin-1717757076', 'Admin baru nabil telah dibuat', '2024-06-07 10:44:36'),
('history-1717757100', 'admin-1717757076', 'Telah melakukan login', '2024-06-07 10:45:00'),
('history-1717757142', 'admin-1717757076', 'Telah mengupdate menu Es Teh', '2024-06-07 10:45:42'),
('history-1717757167', 'admin-1717757076', 'Telah mengupdate menu Es Teh', '2024-06-07 10:46:07'),
('history-1717757187', 'admin-1717757076', 'Hapus menu: Es Teh', '2024-06-07 10:46:27'),
('history-1717757407', 'admin-1717757076', 'Menambahkan menu baru', '2024-06-07 10:50:07'),
('history-1717757673', 'admin-1717757076', 'Mengupdate status review', '2024-06-07 10:54:33'),
('history-1717757676', 'admin-1717757076', 'Mengupdate status review', '2024-06-07 10:54:36'),
('history-1718010865', 'admin-1717749467', 'Telah melakukan login', '2024-06-10 09:14:25'),
('history-1718010949', 'admin-1717749467', 'Hapus menu: Tahu Gejrot', '2024-06-10 09:15:49'),
('history-1729315010', 'admin-1729315010', 'Admin baru javas telah dibuat', '2024-10-19 05:16:50'),
('history-1729315020', 'admin-1729315010', 'Telah melakukan login', '2024-10-19 05:17:00'),
('history-1729315048', 'admin-1729315010', 'Telah mengupdate menu Es Jeruk', '2024-10-19 05:17:28'),
('history-1729315060', 'admin-1729315010', 'Telah mengupdate menu Es Jeruk', '2024-10-19 05:17:40'),
('history-1735374692', 'admin-1735374692', 'Admin baru daoa telah dibuat', '2024-12-28 08:31:32'),
('history-1735374758', 'admin-1735374692', 'Telah melakukan login', '2024-12-28 08:32:38'),
('history-1735379524', 'admin-1735374692', 'Logout', '2024-12-28 09:52:04'),
('history-1735379546', 'admin-1735374692', 'Telah melakukan login', '2024-12-28 09:52:26'),
('history-1735379653', 'admin-1735374692', 'Logout', '2024-12-28 09:54:13'),
('history-1735379826', 'admin-1735374692', 'Telah melakukan login', '2024-12-28 09:57:06'),
('history-1735383677', 'admin-1735374692', 'Logout', '2024-12-28 11:01:17'),
('history-1735385454', 'admin-1735374692', 'Telah melakukan login', '2024-12-28 11:30:54'),
('history-1735385965', 'admin-1735374692', 'Menambahkan gitar baru', '2024-12-28 11:39:25'),
('history-1735388698', 'admin-1735374692', 'Logout', '2024-12-28 12:24:58'),
('history-1735389157', 'admin-1735374692', 'Telah melakukan login', '2024-12-28 12:32:37'),
('history-1735389762', 'admin-1735374692', 'Menambahkan produk baru', '2024-12-28 12:42:42'),
('history-1735390553', 'admin-1735374692', 'Logout', '2024-12-28 12:55:53'),
('history-1735390568', 'admin-1729315010', 'Telah melakukan login', '2024-12-28 12:56:08'),
('history-1735390601', 'admin-1729315010', 'Menambahkan produk baru', '2024-12-28 12:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `produk_gitar`
--

CREATE TABLE `produk_gitar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `admin_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk_gitar`
--

INSERT INTO `produk_gitar` (`id`, `nama`, `harga`, `deskripsi`, `image_url`, `stok`, `admin_id`, `created_at`, `updated_at`) VALUES
(8, 'jbbm30', 5000000.00, 'adnatba arthasrtjar jasrtjsj', 'assets/guitar/p_region_JBBM30_BKF_1P_01.png', 5, 'admin-1735387084', '2024-12-28 12:01:42', '2024-12-28 12:01:42'),
(9, 'JBBM30', 20000000.00, 'rthrtasrms rtjsrtjsrys srykstykstyk', 'assets/guitar/p_region_JBBM30_BKF_1P_01.png', 10, 'admin-1735387084', '2024-12-28 12:07:56', '2024-12-28 12:07:56'),
(10, 'Gitar Ovation', 2750000.00, 'Bejirr', 'assets/guitar/10.-Gitar-Akustik-Ovation-420x42.jpg', 3, 'admin-1735374692', '2024-12-28 12:42:42', '2024-12-28 13:13:16'),
(11, 'Gitar', 1000000.00, 'Tes', 'assets/guitar/704087_720.png', 1, 'admin-1729315010', '2024-12-28 12:56:41', '2024-12-28 12:56:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `produk_gitar`
--
ALTER TABLE `produk_gitar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk_gitar`
--
ALTER TABLE `produk_gitar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
