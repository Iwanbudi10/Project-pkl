-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2021 at 09:04 AM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 5.6.40-38+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `grap`
--
CREATE TABLE `grap` (
`departemen` varchar(100)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `grap2`
--
CREATE TABLE `grap2` (
`departemen` varchar(100)
,`total` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `idtiket` varchar(200) NOT NULL,
  `departemen` varchar(100) DEFAULT 'HELPDESK',
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `client` varchar(100) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `status` enum('Open','Closed') NOT NULL DEFAULT 'Open',
  `action` varchar(100) NOT NULL,
  `hasil` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `starttime` time(6) NOT NULL,
  `endtime` time(6) NOT NULL,
  `id_user` int(10) NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateuser` int(10) NOT NULL,
  `attachment` blob,
  `priority` varchar(100) NOT NULL,
  `solveby` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`idtiket`, `departemen`, `nama`, `email`, `client`, `problem`, `status`, `action`, `hasil`, `date`, `createdate`, `starttime`, `endtime`, `id_user`, `updatedate`, `updateuser`, `attachment`, `priority`, `solveby`) VALUES
('TKT-050221-0001', 'HELPDESK', '', '', 'Noormans Hotel', 'Request BOD', 'Closed', 'Set BOD sesuai request', 'Clear', '2021-02-05', '2021-02-05 07:44:58', '08:15:00.000000', '08:19:00.000000', 266, '2021-02-05 07:44:58', 1, NULL, '', NULL),
('TKT-050221-0002', 'HELPDESK', '', '', 'Hino Pudakpayung', 'Link PTP arah Hino Genuk Drop dan router sisi Genuk sudah waktunya upgrade hardware', 'Open', 'Tunning Frekuensi dan koordinasi dengan team teknis', 'butuh onsite maintenance oleh team teknis', '2021-02-05', '2021-02-05 07:46:28', '09:51:00.000000', '10:49:00.000000', 266, '2021-02-05 07:46:28', 266, NULL, '', NULL),
('TKT-050221-0003', 'HELPDESK', '', '', 'Jaskin Terboyo', 'koneksi lemot terindikasi ethernet radio sisi client 10mbps saja', 'Closed', 'reboot radio tersebut', 'Clear sudah kembali 100mbps full duplex', '2021-02-05', '2021-02-05 07:47:27', '11:08:00.000000', '11:27:00.000000', 266, '2021-02-05 07:47:27', 1, NULL, '', NULL),
('TKT-050221-0004', 'HELPDESK', '', '', 'Puri Garden', 'beberpa AP tidak bisa optimal koneksinya', 'Open', 'Kordinasi dengan PIC di lokasi untuk restart adaptor', 'Butuh kunjungan lokasi oleh team teknis (request by PIC juga)', '2021-02-05', '2021-02-05 08:19:20', '12:19:00.000000', '15:29:00.000000', 266, '2021-02-05 08:19:20', 1, NULL, '', NULL),
('TKT-050221-0005', 'HELPDESK', '', '', 'Lazada Malang', 'Koneksi Down', 'Closed', 'koordinasi dengan rekan Crossnet', 'Sudah terpantau nyala kembali', '2021-02-05', '2021-02-05 08:20:46', '13:10:00.000000', '14:25:00.000000', 266, '2021-02-05 08:20:46', 1, NULL, '', NULL),
('TKT-050221-0006', 'HELPDESK', '', '', 'Translindo Semarang', 'Komplain Koneksi tidak bisa digunakan', 'Open', 'Koordinasi dengan client dan cek koneksi masih terpantau stabil', 'On Monitoring, menunggu konfirmasi dari client', '2021-02-05', '2021-02-05 08:23:42', '14:49:00.000000', '14:59:00.000000', 266, '2021-02-05 08:23:42', 1, NULL, '', NULL),
('TKT-050221-0007', 'HELPDESK', '', '', 'Data Utama Semarang', 'Koneksi INT Drop', 'Open', 'koordinasi dengan Data Utama Pusat (Upstream link LA ke HE Bermasalah)', 'Clear , link sudah kembali normal', '2021-02-05', '2021-02-05 10:04:06', '15:39:00.000000', '17:00:00.000000', 266, '2021-02-05 10:04:06', 1, NULL, '', NULL),
('TKT-060221-0008', 'HELPDESK', '', '', 'Rumah Bapak Ronny', 'Koneksi terasa Lambat', 'Open', 'Cek Koneksi sampai AP aman , indikasi bandwith 10Mbps full dan AP tidak mumpuni untuk device 8-10', 'Clear', '2021-02-06', '2021-02-05 23:28:01', '20:43:00.000000', '20:53:00.000000', 266, '2021-02-05 23:28:01', 266, NULL, '', NULL),
('TKT-060221-0009', 'HELPDESK', '', '', 'Lazada Malang', 'Koneksi Terpantau Down', 'Open', 'Koordinasi dengan penyedia backbone [CrossNet] ,indikasi sementara ada masalah PoE di radio sisi BTS', 'Clear', '2021-02-06', '2021-02-05 23:30:33', '21:54:00.000000', '22:11:00.000000', 266, '2021-02-05 23:30:33', 266, NULL, '', NULL),
('TKT-060221-0010', 'HELPDESK', '', '', 'BTS Ungaran', 'Alarm BTS Down', 'Open', 'Telfon PLN dan kordinasi dengan Bapak Tono', 'Clear', '2021-02-06', '2021-02-05 23:32:36', '03:03:00.000000', '04:33:00.000000', 266, '2021-02-05 23:32:36', 266, NULL, '', NULL),
('TKT-060221-0011', 'HELPDESK', '', '', 'LA<>MSM', 'Link arah CRS Down', 'Open', 'Cek router CRS MSM , indikasi router hang atau masalah cabling', 'Clear', '2021-02-06', '2021-02-05 23:35:23', '05:16:00.000000', '05:42:00.000000', 266, '2021-02-05 23:35:23', 266, NULL, '', NULL),
('TKT-060221-0012', 'HELPDESK', '', '', 'F&B Inn', 'Koneksi Down', 'Open', 'Cek routing (Link bacbone LA<>MSM Down)', 'Clear', '2021-02-06', '2021-02-05 23:39:48', '05:40:00.000000', '05:57:00.000000', 266, '2021-02-05 23:39:48', 266, NULL, '', NULL),
('TKT-060221-0013', 'HELPDESK', '', '', 'BTS Hubdam<>Ucia', 'Radio Sisi BTS down', 'Open', 'cek neighbour di router BTS', 'Radio tidak terneighbour di router BTS ,Butuh pengecekan ke lokasi oleh team teknis', '2021-02-06', '2021-02-06 00:50:10', '03:00:00.000000', '08:00:00.000000', 266, '2021-02-06 00:50:10', 266, NULL, '', NULL),
('TKT-060221-0014', 'HELPDESK', '', '', 'BTS Manyaran', 'Alarm BTS down', 'Open', 'Kordinasi dengan Pak Cuncun untuk cover genset', 'progress Up by Genset', '2021-02-06', '2021-02-06 00:51:11', '07:31:00.000000', '08:00:00.000000', 266, '2021-02-06 00:51:11', 1, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` smallint(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `hak_akses` enum('Super Admin','STAFF','HELPDESK') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_user`, `password`, `departemen`, `email`, `telepon`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'f7ef486a5f2f1c84f12806d45a6fe300', 'NOC', 'helpdesk_smg@datautama.net.id', '', 'Super Admin', 'aktif', '2016-05-01 08:42:53', '2021-01-04 07:57:21'),
(266, 'thoyib', 'thoyib', '9be43c0c654950ca5c0c7d38d559d873', 'helpdesk', '', '', 'STAFF', 'aktif', '2021-01-04 12:23:47', '2021-02-05 07:43:02'),
(267, 'bahtiar', 'bahtiar', 'a97aec5ff1ddc68ef0f422a488af87d0', 'helpdesk', '', '', 'HELPDESK', 'aktif', '2021-01-04 12:24:30', '2021-01-14 03:50:27'),
(268, 'dodo', 'dodo', '3bdaaf90ac86584be1655fa87dff79f5', 'helpdesk', '', '', 'STAFF', 'aktif', '2021-01-04 12:24:56', '2021-02-05 10:08:46'),
(271, 'andika', 'andika', '61b57a79f7f7ef2c73c1c69e72206160', 'HELPDESK', 'andika@datautama.net.id', '', 'STAFF', 'aktif', '2016-05-01 08:42:53', '2021-01-04 08:00:25');

-- --------------------------------------------------------

--
-- Structure for view `grap`
--
DROP TABLE IF EXISTS `grap`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grap`  AS  (select `a`.`departemen` AS `departemen`,count(`a`.`status`) AS `total` from `tiketdesk`.`tiket` `a` where (`a`.`status` = 'Open') group by `a`.`departemen`) ;

-- --------------------------------------------------------

--
-- Structure for view `grap2`
--
DROP TABLE IF EXISTS `grap2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grap2`  AS  (select `a`.`departemen` AS `departemen`,count(`a`.`status`) AS `total` from `tiketdesk`.`tiket` `a` where (`a`.`status` = 'Closed') group by `a`.`departemen`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`idtiket`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=272;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
