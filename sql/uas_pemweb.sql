-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 05:52 AM
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
('admin-1735374692', 'daoa', 'Jorge Martin', '21232f297a57a5a743894a0e4a801fc3'),
('admin-1735392857', 'japaz', 'Deva', '6efc67e68005e7503df580d11e5e7a23');

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
(10, 'Gitar Ovation', 2750000.00, 'Bejirr', '../assets/guitar/10.-Gitar-Akustik-Ovation-420x42.jpg', 3, 'admin-1735374692', '2024-12-28 12:42:42', '2024-12-28 17:54:09'),
(11, 'Gitar', 1000000.00, 'Tes', '../assets/guitar/704087_720.png', 3, 'admin-1729315010', '2024-12-28 12:56:41', '2024-12-28 17:54:19'),
(14, 'PIA3761', 56800000.00, 'Designed in collaboration with Steve Vai, the Ibanez Steve Vai PIA3761 is a sonically versatile, high-performance solidbody electric guitar. ', '..assets/guitar/p_region_PIA3761_SLW_00_02_sub_1.jpg', 5, 'admin-1729315010', '2024-12-28 17:28:45', '2024-12-28 17:28:45'),
(15, 'Les Paul Traditional Pro V', 48600000.00, 'The Gibson Les Paul Traditional Pro V AAA Flame Top is a modern upgrade to a classic design.', '..assets/guitar/L69587000007000-00-600x600.jpg', 3, 'admin-1729315010', '2024-12-28 17:41:18', '2024-12-28 17:41:18'),
(16, 'Fender Player Stratocaster', 11300000.00, 'The Fender Player Limited-Edition Stratocaster an electric guitar built for a pro with an entry-level price tag. ', '..assets/guitar/L46833000001000-00-600x600.jpg', 10, 'admin-1729315010', '2024-12-28 17:42:58', '2024-12-28 17:42:58');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
