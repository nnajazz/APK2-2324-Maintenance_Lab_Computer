-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 02:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_maintenance_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `telepon_admin` varchar(100) DEFAULT NULL,
  `path_photo_admin` varchar(255) DEFAULT NULL,
  `id_user` varchar(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `telepon_admin`, `path_photo_admin`, `id_user`, `create_at`, `update_at`) VALUES
(3, 'User Admin 1', '0817272383', '_67bd1d97732bb.png', 'ADM0000003', '2025-02-25 01:32:07', '2025-02-25 01:32:07'),
(4, 'user admin 2', '08372367346', 'ADM0000004_67bd22255f6e5.png', 'ADM0000004', '2025-02-25 01:51:33', '2025-02-25 01:51:33'),
(5, 'User Admin', '0983983933', 'ADM0000005_67bdae8952f8c.png', 'ADM0000005', '2025-02-25 11:50:33', '2025-02-25 11:50:33');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kordinator`
--

CREATE TABLE `tbl_kordinator` (
  `id_kordinator` int(11) NOT NULL,
  `nama_kordinator` varchar(100) DEFAULT NULL,
  `telepon_kordinator` varchar(100) DEFAULT NULL,
  `jenkel` enum('L','P','','') DEFAULT NULL,
  `path_photo_kordinator` varchar(255) DEFAULT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_lab` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kordinator`
--

INSERT INTO `tbl_kordinator` (`id_kordinator`, `nama_kordinator`, `telepon_kordinator`, `jenkel`, `path_photo_kordinator`, `id_user`, `id_lab`, `create_at`, `update_at`) VALUES
(1, 'mulqi fachturahman', '0854534534', 'L', 'KDR0000001_67bde1f5b17a6.png', 'KDR0000001', 2, '2025-02-25 15:29:57', '2025-02-25 15:29:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lab`
--

CREATE TABLE `tbl_lab` (
  `id_lab` int(11) NOT NULL,
  `kode_lab` varchar(10) NOT NULL,
  `nama_lab` varchar(100) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `kapasitas` varchar(50) DEFAULT NULL,
  `jumlah_pc` varchar(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_lab`
--

INSERT INTO `tbl_lab` (`id_lab`, `kode_lab`, `nama_lab`, `lokasi`, `kapasitas`, `jumlah_pc`, `create_at`, `update_at`) VALUES
(1, 'LAB01', 'LAB-Komputer-01', 'Lantai 1, Samping Musholla', '25-30', '30', '2025-02-25 12:51:25', '2025-02-25 12:51:25'),
(2, 'LAB02', 'LAB-Komputer-02', 'Lantai 1, Samping Ruang TU', '30-40', '31', '2025-02-25 12:52:23', '2025-02-25 12:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_laborant`
--

CREATE TABLE `tbl_laborant` (
  `id_laborant` int(11) NOT NULL,
  `nama_laborant` varchar(100) DEFAULT NULL,
  `telepon_laborant` varchar(100) DEFAULT NULL,
  `jenkel` enum('L','P','','') DEFAULT NULL,
  `path_photo_laborant` varchar(255) DEFAULT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_lab` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_laborant`
--

INSERT INTO `tbl_laborant` (`id_laborant`, `nama_laborant`, `telepon_laborant`, `jenkel`, `path_photo_laborant`, `id_user`, `id_lab`, `create_at`, `update_at`) VALUES
(1, 'Pak Aang', '0845848565', 'L', 'LBR0000001_67bddd3d94ff0.png', 'LBR0000001', 1, '2025-02-25 15:09:49', '2025-02-25 15:09:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_petugas`
--

CREATE TABLE `tbl_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(100) DEFAULT NULL,
  `telepon_petugas` varchar(100) DEFAULT NULL,
  `jenkel` enum('L','P','','') DEFAULT NULL,
  `path_photo_petugas` varchar(255) DEFAULT NULL,
  `id_user` varchar(10) NOT NULL,
  `id_lab` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_petugas`
--

INSERT INTO `tbl_petugas` (`id_petugas`, `nama_petugas`, `telepon_petugas`, `jenkel`, `path_photo_petugas`, `id_user`, `id_lab`, `create_at`, `update_at`) VALUES
(1, 'inggar', '0839854554', 'L', 'PTG0000001_67bdd416d8051.png', 'PTG0000001', 1, '2025-02-25 14:30:46', '2025-02-25 14:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tipe_user`
--

CREATE TABLE `tbl_tipe_user` (
  `id_tipe_user` int(11) NOT NULL,
  `tipe_user` varchar(50) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tipe_user`
--

INSERT INTO `tbl_tipe_user` (`id_tipe_user`, `tipe_user`, `create_at`, `update_at`) VALUES
(2, 'Admin', '2025-02-24 11:08:34', '2025-02-24 11:08:34'),
(3, 'Petugas', '2025-02-24 11:08:34', '2025-02-24 11:08:34'),
(4, 'Kordinator', '2025-02-24 11:08:34', '2025-02-24 11:08:34'),
(5, 'Laborant', '2025-02-24 11:08:34', '2025-02-24 11:08:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `email`, `password`, `role`, `create_at`, `update_at`) VALUES
('ADM0000003', 'ingzyyy@gmail.com', '$2y$10$VDoUJLJxmnrXoHoxpmlfw.loaFFUP3zy10WicQJMAKEU4eFeI38iO', 2, '2025-02-25 01:32:07', '2025-02-25 01:32:07'),
('ADM0000004', 'hasnaa@gmail.com', '$2y$10$fmNwfm4q/btYs59RcnRF0OV8OOlm2.D6Mc8lLDRSsjqxhfvutkQRS', 2, '2025-02-25 01:51:33', '2025-02-25 01:51:33'),
('ADM0000005', 'admin@gmail.com', '$2y$10$J6ijUQG45PKnjdERSpo9CuQwXbZTZ3zMP351x2kvz7iDLvck.sXam', 2, '2025-02-25 11:50:33', '2025-02-25 11:50:33'),
('KDR0000001', 'mulqi@gmail.com', '$2y$10$oCxRPpZNHAv9K3OU6TKcTe78iD.NZnFgfZg97rl.HrNutthfw6qby', 4, '2025-02-25 15:29:57', '2025-02-25 15:29:57'),
('LBR0000001', 'aangmiftah@gmail.com', '$2y$10$df82oronqVlKWgaOsLTfme8.JsFuofWgG3H1U8xyBs0PWiNJcLFpa', 5, '2025-02-25 15:09:49', '2025-02-25 15:09:49'),
('PTG0000001', 'inggarpetugas@gmail.com', '$2y$10$vHpgtekyQbxogHylQZ3HregRkd5VUJ/duRUiFYqHM30zhE2NlXLt6', 3, '2025-02-25 14:30:46', '2025-02-25 14:30:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `tbl_kordinator`
--
ALTER TABLE `tbl_kordinator`
  ADD PRIMARY KEY (`id_kordinator`),
  ADD KEY `id_user` (`id_user`,`id_lab`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indexes for table `tbl_lab`
--
ALTER TABLE `tbl_lab`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indexes for table `tbl_laborant`
--
ALTER TABLE `tbl_laborant`
  ADD PRIMARY KEY (`id_laborant`),
  ADD KEY `id_user` (`id_user`,`id_lab`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indexes for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_lab` (`id_lab`),
  ADD KEY `id_lab` (`id_lab`);

--
-- Indexes for table `tbl_tipe_user`
--
ALTER TABLE `tbl_tipe_user`
  ADD PRIMARY KEY (`id_tipe_user`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_tipe` (`role`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kordinator`
--
ALTER TABLE `tbl_kordinator`
  MODIFY `id_kordinator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_lab`
--
ALTER TABLE `tbl_lab`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_laborant`
--
ALTER TABLE `tbl_laborant`
  MODIFY `id_laborant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tipe_user`
--
ALTER TABLE `tbl_tipe_user`
  MODIFY `id_tipe_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD CONSTRAINT `tbl_admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`);

--
-- Constraints for table `tbl_kordinator`
--
ALTER TABLE `tbl_kordinator`
  ADD CONSTRAINT `tbl_kordinator_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`),
  ADD CONSTRAINT `tbl_kordinator_ibfk_2` FOREIGN KEY (`id_lab`) REFERENCES `tbl_lab` (`id_lab`);

--
-- Constraints for table `tbl_laborant`
--
ALTER TABLE `tbl_laborant`
  ADD CONSTRAINT `tbl_laborant_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`),
  ADD CONSTRAINT `tbl_laborant_ibfk_2` FOREIGN KEY (`id_lab`) REFERENCES `tbl_lab` (`id_lab`);

--
-- Constraints for table `tbl_petugas`
--
ALTER TABLE `tbl_petugas`
  ADD CONSTRAINT `tbl_petugas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_users` (`id_user`),
  ADD CONSTRAINT `tbl_petugas_ibfk_2` FOREIGN KEY (`id_lab`) REFERENCES `tbl_lab` (`id_lab`);

--
-- Constraints for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `tbl_tipe_user` (`id_tipe_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
