-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2023 at 07:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sertifikat`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sertifikat`
--

CREATE TABLE `jenis_sertifikat` (
  `id_jenis_sertifikat` int(11) NOT NULL,
  `jenis_sertifikat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_sertifikat`
--

INSERT INTO `jenis_sertifikat` (`id_jenis_sertifikat`, `jenis_sertifikat`) VALUES
(1, 'KH'),
(3, 'KT');

-- --------------------------------------------------------

--
-- Table structure for table `keluar`
--

CREATE TABLE `keluar` (
  `id_keluar` int(11) NOT NULL,
  `no_transaksi` varchar(50) NOT NULL,
  `id_permintaan` varchar(50) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `id_wilker` int(11) NOT NULL,
  `tanggal_kirim` date NOT NULL,
  `id_jenis_sertifikat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `file` varchar(50) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keluar`
--

INSERT INTO `keluar` (`id_keluar`, `no_transaksi`, `id_permintaan`, `tanggal_surat`, `id_wilker`, `tanggal_kirim`, `id_jenis_sertifikat`, `jumlah`, `file`, `id_status`) VALUES
(1, 'TR-K001', '4', '2023-01-14', 1, '2023-01-14', 1, 2, 'test.pdf', 1),
(2, 'TR-K002', '4', '2023-01-20', 1, '2023-01-27', 1, 20, 'TEST2.pdf', 1),
(3, 'TR-K003', '6', '2023-01-14', 2, '2023-01-21', 3, 4, 'Barang_keluar_Aplikasi_Inventaris_KPU.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `masuk`
--

CREATE TABLE `masuk` (
  `id_masuk` int(11) NOT NULL,
  `no_masuk` varchar(50) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `id_jenis_sertifikat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masuk`
--

INSERT INTO `masuk` (`id_masuk`, `no_masuk`, `tanggal_masuk`, `id_jenis_sertifikat`, `jumlah`, `keterangan`) VALUES
(1, 'TR-M001', '2023-01-04', 1, 3000, 'Masuk'),
(2, 'TR-M002', '2023-01-14', 1, 3700, 'Masuk'),
(3, 'TR-M003', '2023-01-14', 1, 90, 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `no_permintaan` varchar(50) NOT NULL,
  `id_wilker` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `id_jenis_sertifikat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `no_permintaan`, `id_wilker`, `tanggal`, `id_jenis_sertifikat`, `jumlah`, `id_status`) VALUES
(4, 'PMT-001', '1', '2023-01-07', 3, 7, 1),
(5, 'PMT-002', '2', '2023-01-07', 3, 90, 5),
(6, 'PMT-003', '1', '2023-01-07', 3, 45, 3);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `status`) VALUES
(1, 'Dalam Pengiriman'),
(3, 'Diterima'),
(5, 'Diverifikasi'),
(6, 'Diajukan');

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_kh`
-- (See below for the actual view)
--
CREATE TABLE `total_kh` (
`jumlah_kh` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_kt`
-- (See below for the actual view)
--
CREATE TABLE `total_kt` (
`jumlah_kt` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_wilker` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_wilker`, `nama`, `username`, `password`, `level`) VALUES
(1, 3, 'Mujiyanto', 'Muji123', '123', 'Admin'),
(3, 1, 'Wilker KP Balam', 'w1', '123', 'Kantor Pos'),
(4, 1, 'Wilker Raden Intan II', 'w2', '123', 'Kantor Pos'),
(5, 1, 'Wilker Bekauhuni II', 'w3', '123', 'Kantor Pos');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_diajukan`
-- (See below for the actual view)
--
CREATE TABLE `view_diajukan` (
`id_permintaan` int(11)
,`no_permintaan` varchar(50)
,`wilker` varchar(50)
,`tanggal` date
,`jenis_sertifikat` varchar(50)
,`jumlah` int(11)
,`status` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_permintaan`
-- (See below for the actual view)
--
CREATE TABLE `view_permintaan` (
`id_permintaan` int(11)
,`no_permintaan` varchar(50)
,`id_wilker` int(11)
,`wilker` varchar(50)
,`tanggal` date
,`jenis_sertifikat` varchar(50)
,`jumlah` int(11)
,`status` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_persediaan`
-- (See below for the actual view)
--
CREATE TABLE `view_persediaan` (
`tanggal_masuk` date
,`jenis_sertifikat` varchar(50)
,`jumlah` int(11)
,`keterangan` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `view_transaksi` (
`id_wilker` int(11)
,`wilker` varchar(50)
,`jenis_sertifikat` varchar(50)
,`status` varchar(50)
,`id_keluar` int(11)
,`tanggal_surat` date
,`jumlah` int(11)
,`tanggal_kirim` date
,`file` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_verifikasi`
-- (See below for the actual view)
--
CREATE TABLE `view_verifikasi` (
`id_permintaan` int(11)
,`no_permintaan` varchar(50)
,`id_wilker` int(11)
,`wilker` varchar(50)
,`tanggal` date
,`jenis_sertifikat` varchar(50)
,`jumlah` int(11)
,`status` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `wilker`
--

CREATE TABLE `wilker` (
  `id_wilker` int(11) NOT NULL,
  `wilker` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilker`
--

INSERT INTO `wilker` (`id_wilker`, `wilker`) VALUES
(1, 'Bekauhuni 1'),
(2, 'Bandara Raden Intan II'),
(3, 'Kantor Pusat'),
(4, 'Kantor Pos Bandar Lampung'),
(5, 'Pelabuhan Laut Panjang');

-- --------------------------------------------------------

--
-- Structure for view `total_kh`
--
DROP TABLE IF EXISTS `total_kh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_kh`  AS  select sum(`masuk`.`jumlah`) AS `jumlah_kh` from (`masuk` join `jenis_sertifikat` on(`masuk`.`id_jenis_sertifikat` = `jenis_sertifikat`.`id_jenis_sertifikat`)) where `jenis_sertifikat`.`jenis_sertifikat` = 'KH' ;

-- --------------------------------------------------------

--
-- Structure for view `total_kt`
--
DROP TABLE IF EXISTS `total_kt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_kt`  AS  select sum(`masuk`.`jumlah`) AS `jumlah_kt` from (`masuk` join `jenis_sertifikat` on(`masuk`.`id_jenis_sertifikat` = `jenis_sertifikat`.`id_jenis_sertifikat`)) where `jenis_sertifikat`.`jenis_sertifikat` = 'KT' ;

-- --------------------------------------------------------

--
-- Structure for view `view_diajukan`
--
DROP TABLE IF EXISTS `view_diajukan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_diajukan`  AS  select `view_permintaan`.`id_permintaan` AS `id_permintaan`,`view_permintaan`.`no_permintaan` AS `no_permintaan`,`view_permintaan`.`wilker` AS `wilker`,`view_permintaan`.`tanggal` AS `tanggal`,`view_permintaan`.`jenis_sertifikat` AS `jenis_sertifikat`,`view_permintaan`.`jumlah` AS `jumlah`,`view_permintaan`.`status` AS `status` from `view_permintaan` where `view_permintaan`.`status` = 'Diajukan' ;

-- --------------------------------------------------------

--
-- Structure for view `view_permintaan`
--
DROP TABLE IF EXISTS `view_permintaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_permintaan`  AS  select `permintaan`.`id_permintaan` AS `id_permintaan`,`permintaan`.`no_permintaan` AS `no_permintaan`,`wilker`.`id_wilker` AS `id_wilker`,`wilker`.`wilker` AS `wilker`,`permintaan`.`tanggal` AS `tanggal`,`jenis_sertifikat`.`jenis_sertifikat` AS `jenis_sertifikat`,`permintaan`.`jumlah` AS `jumlah`,`status`.`status` AS `status` from (((`permintaan` join `wilker` on(`wilker`.`id_wilker` = `permintaan`.`id_wilker`)) join `jenis_sertifikat` on(`jenis_sertifikat`.`id_jenis_sertifikat` = `permintaan`.`id_jenis_sertifikat`)) join `status` on(`status`.`id_status` = `permintaan`.`id_status`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_persediaan`
--
DROP TABLE IF EXISTS `view_persediaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_persediaan`  AS  select `masuk`.`tanggal_masuk` AS `tanggal_masuk`,`jenis_sertifikat`.`jenis_sertifikat` AS `jenis_sertifikat`,`masuk`.`jumlah` AS `jumlah`,`masuk`.`keterangan` AS `keterangan` from (`masuk` join `jenis_sertifikat` on(`masuk`.`id_jenis_sertifikat` = `jenis_sertifikat`.`id_jenis_sertifikat`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_transaksi`
--
DROP TABLE IF EXISTS `view_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_transaksi`  AS  select `wilker`.`id_wilker` AS `id_wilker`,`wilker`.`wilker` AS `wilker`,`jenis_sertifikat`.`jenis_sertifikat` AS `jenis_sertifikat`,`status`.`status` AS `status`,`keluar`.`id_keluar` AS `id_keluar`,`keluar`.`tanggal_surat` AS `tanggal_surat`,`keluar`.`jumlah` AS `jumlah`,`keluar`.`tanggal_kirim` AS `tanggal_kirim`,`keluar`.`file` AS `file` from (((`keluar` join `wilker` on(`wilker`.`id_wilker` = `keluar`.`id_wilker`)) join `jenis_sertifikat` on(`jenis_sertifikat`.`id_jenis_sertifikat` = `keluar`.`id_jenis_sertifikat`)) join `status` on(`status`.`id_status` = `keluar`.`id_status`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_verifikasi`
--
DROP TABLE IF EXISTS `view_verifikasi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_verifikasi`  AS  select `view_permintaan`.`id_permintaan` AS `id_permintaan`,`view_permintaan`.`no_permintaan` AS `no_permintaan`,`view_permintaan`.`id_wilker` AS `id_wilker`,`view_permintaan`.`wilker` AS `wilker`,`view_permintaan`.`tanggal` AS `tanggal`,`view_permintaan`.`jenis_sertifikat` AS `jenis_sertifikat`,`view_permintaan`.`jumlah` AS `jumlah`,`view_permintaan`.`status` AS `status` from `view_permintaan` where `view_permintaan`.`status` = 'Diverifikasi' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_sertifikat`
--
ALTER TABLE `jenis_sertifikat`
  ADD PRIMARY KEY (`id_jenis_sertifikat`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`id_keluar`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`id_masuk`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wilker`
--
ALTER TABLE `wilker`
  ADD PRIMARY KEY (`id_wilker`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_sertifikat`
--
ALTER TABLE `jenis_sertifikat`
  MODIFY `id_jenis_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `id_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wilker`
--
ALTER TABLE `wilker`
  MODIFY `id_wilker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
