-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2024 at 04:07 AM
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
('admin-1735392857', 'japaz', 'Deva', '6efc67e68005e7503df580d11e5e7a23'),
('admin-1735465072', 'javast', 'Javas Uhuy', 'd8578edf8458ce06fbc5bb76a58c5ca4'),
('admin-1735488973', 'Username', 'Nama', 'dc647eb65e6711e155375218212b3964');

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
(10, 'Yahaha', 2000000.00, 'Baru nih', 'assets/guitar/10.-Gitar-Akustik-Ovation-420x42.jpg', 1, 'admin-1735374692', '2024-12-28 12:42:42', '2024-12-30 00:09:07'),
(15, 'Les Paul Traditional Pro V', 48600000.00, 'The Gibson Les Paul Traditional Pro V AAA Flame Top is a modern upgrade to a classic design.', 'assets/guitar/L69587000007000-00-600x600.jpg', 3, 'admin-1729315010', '2024-12-28 17:41:18', '2024-12-29 05:48:18'),
(16, 'Fender Player Stratocaster Black', 11300000.00, 'The Fender Player Limited-Edition Stratocaster an electric guitar built for a pro with an entry-level price tag. ', 'assets/guitar/L46833000001000-00-600x600.jpg', 4, 'admin-1729315010', '2024-12-28 17:42:58', '2024-12-29 14:18:22'),
(18, 'Schecter Synyster Gates Custom-7', 37200000.00, 'At long last, the next entry in the signature Synyster Gates garrison of guitars has landed: the Schecter Custom-7 TR Headless.', 'assets/guitar/Schecter_Syn.jpg', 4, 'admin-1729315010', '2024-12-29 05:35:15', '2024-12-29 07:18:05'),
(29, 'Fender Telecaster', 4000000.00, 'Fender bagus nih bos', 'assets/guitar/704087_720.png', 5, '', '2024-12-30 02:46:20', '2024-12-30 02:51:00');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
