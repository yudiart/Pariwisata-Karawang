-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 06:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loji_tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `kd_kamar` int(11) NOT NULL,
  `num_adult` int(11) NOT NULL,
  `num_kids` int(11) NOT NULL,
  `check_in` int(11) NOT NULL,
  `check_out` int(11) NOT NULL,
  `booking_status` int(1) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penginapan`
--

CREATE TABLE `penginapan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_penginapan` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penginapan`
--

INSERT INTO `penginapan` (`id`, `user_id`, `nama_penginapan`, `description`, `alamat`, `is_active`) VALUES
(24, 58, 'Villa Resto', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Jl. Rhs Saca kusuma, Kp.Lengo RT.03/14', 1),
(28, 62, 'vodonusa Villa Resort', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Jl. Rhs Saca kusuma, Kp.Lengo RT.03/14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penginapan_image`
--

CREATE TABLE `penginapan_image` (
  `id` int(11) NOT NULL,
  `penginapan_id` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `upload_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penginapan_image`
--

INSERT INTO `penginapan_image` (`id`, `penginapan_id`, `image`, `upload_at`) VALUES
(39, 28, 'penginapan-aff2987c5816.jpg', '2020-02-15'),
(40, 24, 'penginapan-2d1cca77a827.jpg', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `penginapan_kamar`
--

CREATE TABLE `penginapan_kamar` (
  `id` int(11) NOT NULL,
  `penginapan_id` int(11) DEFAULT NULL,
  `kd_kamar` varchar(255) NOT NULL,
  `nama_kamar` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `capacity` int(1) DEFAULT NULL,
  `type_id` int(1) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `upload_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penginapan_kamar`
--

INSERT INTO `penginapan_kamar` (`id`, `penginapan_id`, `kd_kamar`, `nama_kamar`, `description`, `image`, `capacity`, `type_id`, `harga`, `upload_at`) VALUES
(143, 28, 'ffda7390b786a5809f56283b6e649aa5', 'Deluxe Rooms A1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '1970974c1f18bbe1e83c01622b40342f.jpg', 2, 1, 450000, 1582578411),
(144, 28, '85e80b7d2eed63b507ea428182327945', 'Deluxe Rooms A2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'dbbcbc42dc68ce10074f4780376ceea1.jpg', 4, 1, 5000000, 1582578454),
(145, 28, '9973baf6be1721b9cbc3a12eb175cb99', 'Junior Suite Rooms A1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'ccde5ae60798e1156e194a2af9159c0d.jpg', 4, 4, 450000, 1582578561),
(146, 24, 'f0dca24d3b68c560c6119b0329ab090d', 'Standard Rooms A1', '1', '19d67a0d5694761443ed626a60815fd9.png', 2, 1, 450000, 1582578715),
(147, 28, 'cd40c7e50a7bd0fc24315f5800e02d9a', 'Kamar A1', 'test', 'bead7206574b366edc97914268f507b3.jpg', 4, 1, 450000, 1583337551);

-- --------------------------------------------------------

--
-- Table structure for table `penginapan_kamar_fasilitas`
--

CREATE TABLE `penginapan_kamar_fasilitas` (
  `id` int(11) NOT NULL,
  `kamar_id` varchar(255) DEFAULT NULL,
  `type_bed` varchar(128) NOT NULL,
  `ac` int(1) DEFAULT NULL,
  `tv` int(1) NOT NULL,
  `break_fast` int(1) NOT NULL,
  `luas_ruangan` varchar(128) NOT NULL,
  `ruang_tamu` int(1) DEFAULT NULL,
  `kamar_mandi` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penginapan_kamar_fasilitas`
--

INSERT INTO `penginapan_kamar_fasilitas` (`id`, `kamar_id`, `type_bed`, `ac`, `tv`, `break_fast`, `luas_ruangan`, `ruang_tamu`, `kamar_mandi`) VALUES
(8, 'ffda7390b786a5809f56283b6e649aa5', 'Double bed', 1, 1, 1, '5*5', 0, 1),
(9, '85e80b7d2eed63b507ea428182327945', 'Double bed', 1, 1, 1, '10*10', 1, 1),
(10, '9973baf6be1721b9cbc3a12eb175cb99', 'Double bed', 1, 1, 1, '4*4', 0, 1),
(11, 'f0dca24d3b68c560c6119b0329ab090d', 'Twin bed', 0, 1, 1, '4*4', 0, 0),
(12, 'cd40c7e50a7bd0fc24315f5800e02d9a', 'Twin bed', 1, 0, 1, '4*4', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penginapan_kamar_type`
--

CREATE TABLE `penginapan_kamar_type` (
  `id` int(11) NOT NULL,
  `type` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penginapan_kamar_type`
--

INSERT INTO `penginapan_kamar_type` (`id`, `type`) VALUES
(1, 'Premium'),
(2, 'Superior'),
(3, 'Deluxe'),
(4, 'Junior Suite'),
(5, 'Suite'),
(6, 'Presidential'),
(7, 'Standard Room'),
(8, 'Run Of House');

-- --------------------------------------------------------

--
-- Table structure for table `penginapan_ruangan`
--

CREATE TABLE `penginapan_ruangan` (
  `id` int(11) NOT NULL,
  `ruang_tamu` varchar(255) NOT NULL,
  `dapur` varchar(255) NOT NULL,
  `kamar_mandi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penginapan_transaksi`
--

CREATE TABLE `penginapan_transaksi` (
  `id` int(11) NOT NULL,
  `kd_invoice` varchar(255) NOT NULL,
  `kd_kamar` varchar(255) NOT NULL,
  `kd_makanan` varchar(255) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `lama_menginap` varchar(255) NOT NULL,
  `total_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(128) DEFAULT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `image`, `role_id`, `is_active`, `created_at`) VALUES
(58, 'vodonesia', 'id', 'vodonesia@gmail.com', '$2y$10$0pgV.phiSaLj.qJpbrPMeOwDMQPgN510jQZEF2OhS6XoMdDx1amb6', 'profile-1627f9b5c898.png', 4, 1, 1581307292),
(60, 'Herri sutiana', 'subagja', 'herriss890@gmail.com', '$2y$10$IYslMTWBlaETKLzfOjuFPO6wR0TTVyKteMdel.T7woMdrBRN2/gtW', 'profile-d2a8c2eb1abd.png', 3, 1, 1581420087),
(61, 'Mochamad', 'Yudi', 'mochamad.16141@student.unsika.ac.id', '$2y$10$W0eNmL4GYqNkAJtYbeVUFOMLtFKr.0LWrqktIMvJgSEoje0whMcK6', 'profile-694deb1e54ae.png', 1, 1, 1581435345),
(62, 'Mochamad Yudi', 'Sobari', 'moyuriashioka@gmail.com', '$2y$10$FTfj0KOHmYTkRTGtmghSrOl4LtnK6DQluzI7W0giWDe8QU3QNNBh.', 'profile-aded52f02cc5.jpg', 4, 1, 1581765946);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(5, 2, 2),
(6, 3, 2),
(7, 4, 2),
(13, 3, 3),
(14, 4, 4),
(15, 2, 3),
(16, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `jk` varchar(128) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_hp` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `user_id`, `jk`, `alamat`, `no_hp`) VALUES
(82, 58, 'Laki-Laki', 'Jl. Rhs Saca kusuma, Kp.Lengo RT.03/14', '085695190267'),
(83, 61, 'Laki-Laki', 'Jl. Rhs Saca kusuma, Kp.Lengo RT.03/14', '085695190268'),
(84, 62, 'Laki-Laki', 'TANJUNG PURA', '085695190267'),
(86, 60, 'Laki-Laki', 'Karawang', '085695190268');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'administrator'),
(2, 'user'),
(3, 'wisata'),
(4, 'penginapan');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'super admin'),
(2, 'admin'),
(3, 'karyawan'),
(4, 'pemilik'),
(5, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'Administrator/dashboard', 'mdi mdi-home menu-icon', 1),
(2, 2, 'My Profile', 'User', 'mdi mdi-face menu-icon', 1),
(6, 2, 'Edit Profile', 'user/editProfile', 'mdi mdi-settings menu-icon', 1),
(7, 2, 'Change Password', 'user/changepassword', 'mdi mdi-lock menu-icon', 1),
(8, 4, 'Dashboard', 'Penginapan/Dashboard', 'mdi mdi-palette menu-icon', 1),
(9, 3, 'Wisata', 'Wisata/', 'mdi mdi-earth menu-icon', 1),
(10, 1, 'Penginapan', 'Administrator/Penginapan', 'mdi mdi-terrain menu-icon', 1),
(11, 1, 'Pariwisata', 'Administrator/Pariwisata', 'mdi mdi-earth menu-icon', 1),
(12, 4, 'Profile Penginapan', 'Penginapan/penginapanProfile', 'mdi mdi-home menu-icon', 1),
(13, 4, 'Data kamar', 'Penginapan/kamar', 'mdi mdi-store menu-icon', 1),
(14, 4, 'Booking', 'Booking/', 'mdi mdi-chart-bar menu-icon', 1),
(15, 4, 'Data Booking', 'Booking/detail', 'mdi mdi-database menu-icon', 1),
(16, 4, 'Transaksi', 'Penginapan/Transaksi', 'mdi mdi-cash-usd menu-icon', 1),
(17, 4, 'Log Transaksi', 'Penginapan/logTransaksi', 'mdi mdi-chart-bar menu-icon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wisata`
--

CREATE TABLE `wisata` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `deskripsi` varchar(128) NOT NULL,
  `sejarah` text NOT NULL,
  `harga` int(11) NOT NULL,
  `last_update` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wisata_image`
--

CREATE TABLE `wisata_image` (
  `id` int(11) NOT NULL,
  `wisata_id` int(11) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penginapan_image`
--
ALTER TABLE `penginapan_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penginapan_kamar`
--
ALTER TABLE `penginapan_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penginapan_kamar_fasilitas`
--
ALTER TABLE `penginapan_kamar_fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penginapan_kamar_type`
--
ALTER TABLE `penginapan_kamar_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penginapan_ruangan`
--
ALTER TABLE `penginapan_ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penginapan_transaksi`
--
ALTER TABLE `penginapan_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wisata`
--
ALTER TABLE `wisata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penginapan`
--
ALTER TABLE `penginapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `penginapan_image`
--
ALTER TABLE `penginapan_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `penginapan_kamar`
--
ALTER TABLE `penginapan_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `penginapan_kamar_fasilitas`
--
ALTER TABLE `penginapan_kamar_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penginapan_kamar_type`
--
ALTER TABLE `penginapan_kamar_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penginapan_ruangan`
--
ALTER TABLE `penginapan_ruangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penginapan_transaksi`
--
ALTER TABLE `penginapan_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `wisata`
--
ALTER TABLE `wisata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
