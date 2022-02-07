-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 09:41 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `apoteker`
--

CREATE TABLE `apoteker` (
  `id_apoteker` int(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `id_user` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apoteker`
--

INSERT INTO `apoteker` (`id_apoteker`, `nama`, `alamat`, `id_user`) VALUES
(1, 'Afnil Dwi Oktanto', 'Sungailiat', 17);

-- --------------------------------------------------------

--
-- Table structure for table `berobat`
--

CREATE TABLE `berobat` (
  `id_berobat` int(30) NOT NULL,
  `id_pasien` int(30) NOT NULL,
  `id_poli` int(30) NOT NULL,
  `no_berobat` varchar(255) NOT NULL,
  `tanggal_berobat` date DEFAULT NULL,
  `antrian` int(50) NOT NULL,
  `keluhan` longtext NOT NULL,
  `status` enum('-','Proses','Transaksi','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berobat`
--

INSERT INTO `berobat` (`id_berobat`, `id_pasien`, `id_poli`, `no_berobat`, `tanggal_berobat`, `antrian`, `keluhan`, `status`) VALUES
(1, 15, 1, 'KDB-40721', '2021-12-05', 14, 'sadsadsad', 'Proses'),
(2, 16, 1, 'KDB-83204', '2021-12-05', 2, 'adsadsad', 'Proses'),
(3, 17, 1, 'KDB-74439', '2021-12-09', 1, 'asdsad', 'Transaksi'),
(5, 19, 1, 'KDB-43759', '2021-12-06', 1, 'dsadsad', 'Proses'),
(7, 24, 1, 'KDB-68500', '2021-12-05', 3, 'dfghgfh', 'Proses'),
(8, 25, 1, 'KDB-69152', '2021-12-15', 1, 'fdgfdg', 'Proses'),
(9, 26, 2, 'KDB-50405', '2021-12-05', 4, 'hfhfghgf', 'Proses'),
(10, 27, 1, 'KDB-75350', '2021-12-05', 5, 'etye', 'Proses'),
(11, 28, 2, 'KDB-52335', '2021-12-05', 6, 'sdfadsf', 'Proses'),
(12, 29, 1, 'KDB-34423', '2021-12-05', 7, 'dsfsdfsdf', 'Proses'),
(13, 30, 2, 'KDB-47782', '2021-12-05', 8, 'sdfsdfdsfsdf', 'Proses'),
(14, 31, 2, 'KDB-99445', '2021-12-05', 9, 'dfsdf', 'Proses'),
(15, 33, 2, 'KDB-26228', '2021-12-05', 10, 'dfgfgdf', 'Proses'),
(16, 34, 2, 'KDB-69016', '2021-12-05', 11, 'fgdhfgh', 'Proses'),
(17, 35, 1, 'KDB-95939', '2021-12-05', 12, 'ghgfhgfh', 'Proses'),
(18, 36, 1, 'KDB-18980', '2021-12-05', 13, 'asjkdsjadgj', 'Proses'),
(19, 37, 1, 'KDB-53345', '2021-12-31', 1, 'sdfadfdfdsfa', 'Proses'),
(20, 38, 2, 'KDB-23412', '2021-12-10', 1, 'Stres pak mikir pkl', 'Transaksi'),
(21, 15, 1, 'KDB-41469', '2021-12-12', 1, 'asasas', 'Proses'),
(22, 36, 2, 'KDB-68229', '2021-12-12', 2, 'kgjj', 'Proses'),
(23, 36, 1, 'KDB-49302', '2022-01-27', 1, 'sdadasd', 'Proses'),
(24, 42, 2, 'KDB-25114', '2021-02-02', 1, 'Sakit hati dibohongi', 'Transaksi'),
(25, 43, 2, 'KDB-38557', '2022-02-02', 1, 'sakit jiwa aja', 'Transaksi'),
(26, 44, 1, 'KDB-19746', '2022-02-02', 1, 'sdasdasd', 'Proses'),
(27, 45, 1, 'KDB-17448', '2022-02-02', 2, 'asdasd', 'Proses'),
(28, 46, 2, 'KDB-98301', '2022-02-02', 1, 'asdasd', 'Selesai'),
(29, 47, 2, 'KDB-37641', '2022-02-02', 2, 'dafasd', 'Transaksi'),
(30, 48, 2, 'KDB-31030', '2022-02-02', 3, 'asdsadsad', 'Proses'),
(31, 49, 1, 'KDB-40975', '2022-02-02', 3, 'asdsad', 'Proses'),
(32, 50, 2, 'KDB-72218', '2022-02-03', 1, 'asdasd', 'Selesai'),
(33, 43, 2, 'KDB-73074', '2022-02-03', 1, 'sakit kaki', 'Proses'),
(34, 52, 1, 'KDB-99899', '2022-02-03', 1, 'sakit tangan', 'Proses'),
(35, 53, 2, 'KDB-11306', '2022-02-03', 2, 'asdeff', 'Proses'),
(36, 54, 2, 'KDB-78761', '2022-02-03', 3, 'sdcjgdsj', 'Selesai'),
(37, 55, 1, 'KDB-53132', '2022-02-03', 2, 'shdjks', 'Proses');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kel` varchar(30) NOT NULL,
  `spesialisasi` varchar(50) NOT NULL,
  `id_poli` int(30) NOT NULL,
  `id_user` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jenis_kel`, `spesialisasi`, `id_poli`, `id_user`) VALUES
(1, 'Tasya', 'Jl.Sambu 1 Air Ruai', 'Sungailiat', '2021-12-03', 'perempuan', 'Anak', 2, 13),
(2, 'Afnil Dwi Oktanto', 'Jl.Sambu 1 Air Ruai', 'Sungailiat', '2021-12-04', 'laki-laki', 'Mata', 1, 14),
(3, 'Dokter 3', 'Sungailiat', 'Sungailiat', '2021-12-09', 'perempuan', 'Anak', 1, 15),
(4, 'Dokter 4', 'Jl.Sambu 1 Air Ruai', 'Sungailiat', '2021-12-08', 'laki-laki', 'Anak', 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(11) NOT NULL,
  `tanggal_info` date DEFAULT NULL,
  `judul_info` varchar(255) NOT NULL,
  `isi_info` text NOT NULL,
  `gambar_info` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `tanggal_info`, `judul_info`, `isi_info`, `gambar_info`) VALUES
(2, '2021-12-12', 'PEMBERITAHUAN', 'asdfsadfsfdwsafsadfsaluik jkasgdbfasipdufgksau io;gafujadgksad', 'default.jpg'),
(3, '2021-12-12', 'PEMBERITAHUAN', 'sfgassdfzxvbdbaerfsadfcvzxvdsgzsxfdgvrsdgtsdgvf', 'ASas.png');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `stok_obat` int(30) NOT NULL,
  `harga_jual` int(255) DEFAULT NULL,
  `satuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `keterangan`, `stok_obat`, `harga_jual`, `satuan`) VALUES
(3, 'sdsadss3', 'hjhgjhg5', 74, 9000, 'Botol'),
(4, 'dfgfdg', 'fdgfdgdfgdf', 95, 8000, 'Strip'),
(5, 'fgfdgsdfg', 'ghjhhgj', 63, 10000, 'Strip'),
(6, 'sdfdsfd', 'gfhgfhgf', 86, 13000, 'Lembar'),
(7, 'hjgjhh', 'jhkhjkhjk', 302, 11000, 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(250) NOT NULL,
  `alamat_pasien` varchar(250) NOT NULL,
  `status_bpjs` enum('-','Ada','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat_pasien`, `status_bpjs`) VALUES
(15, 'Afnil Dwi Oktanto', 'Sungailiat', 'Ada'),
(16, 'Tasya', 'Sungailiat', 'Ada'),
(17, 'Coba 26', 'Sungailiat', 'Tidak'),
(18, 'cobaaa', 'Sungailiat', 'Ada'),
(19, 'Simpa-PolmanBabel', 'Sungailiat', 'Tidak'),
(20, 'gg', 'Sungailiat', 'Tidak'),
(21, 'sasadsad', 'sadsad', 'Tidak'),
(22, 'safsdfsdf', 'sdfsdfsdf', 'Tidak'),
(23, 'ghfhgdf', 'ghdfhd', 'Ada'),
(24, 'ghghfgh', 'gfhdfhg', 'Tidak'),
(25, 'dfgdfg', 'fdgdfg', 'Tidak'),
(26, 'utiuti', 'Sungailiat', 'Tidak'),
(27, 'mhhmhg', 'Sungailiat', 'Tidak'),
(28, 'ssadffdsaf', 'sdfsdf', 'Tidak'),
(29, 'ldfhisdfhjdhf', 'sklhdjsfhjlsdf', 'Ada'),
(30, 'sdsadsadfdfdsf', 'sadadfsafsaf', 'Tidak'),
(31, 'dfsdfdsf', 'dfsdfdsf', 'Tidak'),
(32, 'tr\\y\\tr\\ytr\\y', 'try\\rt\\y', 'Tidak'),
(33, 'dfgfgy', 'fgdfg', 'Tidak'),
(34, 'gfdhfgdh', 'gfhgfh', 'Tidak'),
(35, 'ghjgfhjj', 'ghgfhgfh', 'Tidak'),
(36, 'Taca', 'Pepabri', 'Tidak'),
(37, 'Ratri', 'Sungailiat', 'Tidak'),
(38, 'Jul', 'Sungailiat', 'Tidak'),
(39, 'Afnil Dwi Oktanto', 'Sungailiat', 'Tidak'),
(40, 'Taca', 'Pepabri', 'Ada'),
(41, 'Taca', 'Sungailiat', 'Tidak'),
(42, 'terserahhhh', 'gatau', 'Tidak'),
(43, 'Siapa', 'DImana', 'Tidak'),
(44, 'tes 1', 'asdsad', 'Tidak'),
(45, 'tes 3', 'asdasdas', 'Tidak'),
(46, 'tes 4', 'sadasdasd', 'Tidak'),
(47, 'ngtes 4', 'asdsada', 'Tidak'),
(48, 'asdsdsadsad', 'sadsadsadsad', 'Tidak'),
(49, 'asdadsa', 'dsdsadsadsa', 'Tidak'),
(50, 'tes baru', 'adasdas', 'Tidak'),
(51, 'siapa', 'yang tahu', 'Tidak'),
(52, 'aku', 'siapa', 'Tidak'),
(53, 'mutri', 'gatau', 'Ada'),
(54, 'novi', 'DImana', 'Ada'),
(55, 'ena', 'Sungailiat', 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`id_poli`, `nama_poli`) VALUES
(1, 'Poli Gigi'),
(2, 'Poli Umum');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(30) NOT NULL,
  `id_berobat` int(30) NOT NULL,
  `id_obat` int(30) NOT NULL,
  `keterangan_pakai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`id_resep`, `id_berobat`, `id_obat`, `keterangan_pakai`) VALUES
(1, 3, 8, '26 x 3 sehari'),
(2, 3, 5, '3 x 1 sehari'),
(3, 20, 7, '3 x 1'),
(4, 20, 3, '2 x 10'),
(5, 23, 3, '2 x 3'),
(8, 25, 5, 'asdsadsads'),
(9, 25, 6, 'sadsadasd'),
(10, 28, 3, '2 x 3'),
(11, 28, 5, '3 x 2'),
(12, 29, 3, '3 x3 '),
(13, 32, 4, '3 x 4'),
(14, 32, 7, '2 x 1'),
(15, 36, 7, 'frgjkrm'),
(16, 36, 4, 'ygfvb');

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

CREATE TABLE `stok_masuk` (
  `id_stok_masuk` int(30) NOT NULL,
  `id_obat` int(30) NOT NULL,
  `stok_masuk` int(30) NOT NULL,
  `tanggal_masuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`id_stok_masuk`, `id_obat`, `stok_masuk`, `tanggal_masuk`) VALUES
(1, 7, 30, '2021-12-12'),
(2, 7, 20, '2021-12-12');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_obat` int(30) NOT NULL,
  `id_berobat` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `sub_total` int(30) NOT NULL,
  `total` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_obat`, `id_berobat`, `qty`, `sub_total`, `total`) VALUES
(39, 8, 3, 2, 30000, 70000),
(40, 5, 3, 4, 40000, 70000),
(45, 7, 20, 5, 55000, 100000),
(46, 3, 20, 5, 45000, 100000),
(47, 5, 25, 2, 20000, 59000),
(48, 6, 25, 3, 39000, 59000),
(49, 3, 28, 4, 36000, 86000),
(50, 5, 28, 5, 50000, 86000),
(51, 4, 32, 1, 8000, 19000),
(52, 7, 32, 1, 11000, 19000),
(53, 7, 36, 1, 11000, 0),
(54, 4, 36, 2, 16000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `img` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `img`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(4, 'yumi aja', 'kimj6370@gmail.com', 'default.jpg', '$2y$10$cptuqb.r.3kimyT7qQ13w.M4RrqycKnpjHF9z8NS9boeYuN465pzC', 1, 1, 1638281950),
(5, 'cumi', 'cumicokr01@gmail.com', 'pic4.jpg', '$2y$10$dswzBcHI750NbWAclMDDCOsIGNCvS9UbDEMghjaWpqz8moZG1ArAG', 2, 1, 1638282264),
(13, 'Tasya', 'tasya@gmail.com', 'default.jpg', '$2y$10$BCLqnOd2W88rDoWdxsuHDuwBFIp9ccl0Ey9K0Qgl03eCQrxXtoa4W', 3, 1, 3),
(14, 'Afnil', 'afnildwioktanto09@gmail.com', 'default.jpg', '$2y$10$zRSs21eFoNXIrM1/pgS1FOVTttYGK803B6XxZ2BzNCN9hcCm4HNie', 3, 1, 3),
(15, 'Dokter 3', 'dokter3@gmail.com', 'default.jpg', '$2y$10$MHyDfC9KzjjmanO3CCXJp.Sky95.F9gjRoPNRDbtENVglPB2H9/ji', 3, 1, 8),
(16, 'Dokter 4', 'dokter4@gmail.com', 'default.jpg', '$2y$10$O76/XHkIkezW5EI72tZioOtj4Q96cQicXKHmp/2jNMjFB6HaHdFTO', 3, 1, 8),
(17, 'Afnil Dwi Oktanto', 'apoteker@gmail.com', 'default.jpg', '$2y$10$R0xnmpsFqUn0.SNc.O3VW.ZCp2O7s3qCfDMgEGU7lTENqwaeoRHg2', 4, 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(19, 2, 2),
(20, 1, 3),
(23, 1, 2),
(40, 4, 2),
(41, 1, 12),
(42, 1, 13),
(43, 1, 14),
(44, 1, 15),
(45, 1, 16),
(46, 1, 17),
(47, 1, 18),
(50, 3, 2),
(51, 3, 17),
(52, 4, 17),
(53, 4, 18),
(54, 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(12, 'Poliklinik'),
(13, 'Dokter'),
(14, 'Apoteker'),
(15, 'Obat'),
(16, 'Stok'),
(17, 'Berobat'),
(18, 'Transaksi'),
(19, 'Info');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Dokter'),
(4, 'Apoteker');

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
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Cieeee', 'coba/coba', 'fas fa-fw fa-user-secret', 1),
(17, 13, 'Data Dokter', 'dokter/data_dokter', 'fas fa-user-md', 1),
(18, 12, 'Poliklinik', 'poliklinik', 'fas fa-notes-medical', 1),
(19, 14, 'Apoteker', 'apoteker/data_apoteker', 'fas fa-id-card-alt', 1),
(20, 15, 'Data Obat', 'obat', 'fas fa-tablets', 1),
(21, 16, 'Stok Masuk', 'stok/stok_masuk', 'fas fa-arrow-down', 1),
(22, 16, 'Stok Keluar', 'stok/stok_keluar', 'fas fa-arrow-up', 1),
(23, 17, 'Berobat', 'berobat', 'fas fa-hospital-user', 1),
(24, 18, 'Transaksi ', 'transaksi/transaksi_masuk', 'fas fa-cash-register', 1),
(25, 19, 'Info Terbaru', 'info/info_terbaru', 'fas fa-bullhorn', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_nilai`
-- (See below for the actual view)
--
CREATE TABLE `v_rekap_nilai` (
`id` int(11)
,`id_obat` int(30)
,`id_berobat` int(30)
,`qty` int(30)
,`sub_total` int(30)
,`total` int(30)
);

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_nilai`
--
DROP TABLE IF EXISTS `v_rekap_nilai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_nilai`  AS SELECT `transaksi`.`id` AS `id`, `transaksi`.`id_obat` AS `id_obat`, `transaksi`.`id_berobat` AS `id_berobat`, `transaksi`.`qty` AS `qty`, `transaksi`.`sub_total` AS `sub_total`, `transaksi`.`total` AS `total` FROM (`transaksi` join `berobat` on(`berobat`.`id_berobat` = `transaksi`.`id_berobat`)) GROUP BY `transaksi`.`id_berobat` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apoteker`
--
ALTER TABLE `apoteker`
  ADD PRIMARY KEY (`id_apoteker`);

--
-- Indexes for table `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`id_berobat`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- Indexes for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  ADD PRIMARY KEY (`id_stok_masuk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apoteker`
--
ALTER TABLE `apoteker`
  MODIFY `id_apoteker` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berobat`
--
ALTER TABLE `berobat`
  MODIFY `id_berobat` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  MODIFY `id_stok_masuk` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
