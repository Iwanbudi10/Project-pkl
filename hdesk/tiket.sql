/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.6-MariaDB : Database - tiketdesk
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tiketdesk` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `tiketdesk`;

/*Table structure for table `tiket` */

DROP TABLE IF EXISTS `tiket`;

CREATE TABLE `tiket` (
  `idtiket` varchar(200) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `problem` varchar(100) NOT NULL,
  `status` enum('Open','Closed') NOT NULL DEFAULT 'Open',
  `date` date NOT NULL,
  `createdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_user` int(10) NOT NULL,
  `updatedate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updateuser` int(10) NOT NULL,
  `attachment` varchar(200) NOT NULL,
  `priority` varchar(100) NOT NULL,
  `solveby` int(10) NOT NULL,
  PRIMARY KEY (`idtiket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tiket` */

insert  into `tiket`(`idtiket`,`departemen`,`nama`,`email`,`problem`,`status`,`date`,`createdate`,`id_user`,`updatedate`,`updateuser`,`attachment`,`priority`,`solveby`) values 
('TKT-2020-000001','Accounting','Rudi Diandra','rudi@gmail.com','LAN NETWORK DISCONNECT','Closed','0000-00-00','2020-08-24 11:39:48',2,'2020-08-24 11:39:48',268,'','High',0),
('TKT-2020-000002','Accounting','Rudi Diandra','rudi@gmail.com','Catridge Tinta Printer Kosong / Habis','Closed','0000-00-00','2020-08-24 11:40:25',2,'2020-08-24 11:40:25',268,'','MEDIUM',0),
('TKT-2020-000003','Sales','Sari Utami','sari@gmail.com','MS.Office Crash','Closed','0000-00-00','2020-08-24 11:41:15',270,'2020-08-24 11:41:15',267,'','STANDART',0),
('TKT-2020-000004','Sales','Sari Utami','sari@gmail.com','Tidak Bisa Ngeprint. Printer Not Found','Closed','0000-00-00','2020-08-24 11:41:49',270,'2020-08-24 11:41:49',268,'','MEDIUM',0),
('TKT-2020-000005','HRD','Dewi Sartini','dewi@gmail.com','Email Account Disconnecting','Open','0000-00-00','2020-08-24 11:42:35',269,'2020-08-24 11:42:35',269,'','High',0),
('TKT-2020-000006','HRD','Dewi Sartini','dewi@gmail.com','Antivirus Expired','Open','0000-00-00','2020-08-24 11:43:01',269,'2020-08-24 11:43:01',269,'','MEDIUM',0),
('TKT-2020-000007','Accounting','Rudi Diandra','rudi@gmail.com','PC Blank Screen','Open','0000-00-00','2020-08-24 11:44:56',2,'2020-08-24 11:44:56',2,'','High',0),
('TKT-2020-000008','Accounting','Rudi Diandra','rudi@gmail.com','Lan Cable Putus','Closed','0000-00-00','2020-08-24 11:45:21',2,'2020-08-24 11:45:21',268,'','MEDIUM',0);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `departemen` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `hak_akses` enum('Super Admin','STAFF','HELPDESK') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_user`),
  KEY `level` (`hak_akses`)
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`nama_user`,`password`,`departemen`,`email`,`telepon`,`hak_akses`,`status`,`created_at`,`updated_at`) values 
(1,'Arka','Danish Arka','2c3cb75a68b27a2b89523ff20f2a5127','IT','arka@gmail.com','999999','Super Admin','aktif','2016-05-01 15:42:53','2020-10-13 12:42:15'),
(2,'rudi','Rudi Diandra','bfcd3eee9746714ca4fcba684344bbc0','Accounting','rudi@gmail.com','09999999','STAFF','aktif','2020-08-21 09:03:50','2020-10-13 12:42:19'),
(266,'doni','Doni Irawan','f9330f242ff516494a21d3fd94f0807f','IT','','','HELPDESK','aktif','2020-08-22 19:23:47','2020-08-22 19:26:34'),
(267,'erik','Erik Pratama','f12537e9605b2b1bf3122bb12a0e24f7','IT','','','HELPDESK','aktif','2020-08-22 19:24:30','2020-08-22 19:30:25'),
(268,'joni','Joni Jono','1c0ac25b077a885dc53d91b05b14544e','IT','','','HELPDESK','aktif','2020-08-22 19:24:56','2020-08-22 19:26:41'),
(269,'dewi','Dewi Sartini','fde0b737496c53bb85d07b31a02985a3','HRD','dewi@gmail.com','','STAFF','aktif','2020-08-22 19:27:16','2020-08-22 19:28:48'),
(270,'sari','Sari Utami','e9ee75b57bb1303190c8869621cad05b','Sales','sari@gmail.com','','STAFF','aktif','2020-08-22 19:27:38','2020-08-22 19:28:52');

/*Table structure for table `grap` */

DROP TABLE IF EXISTS `grap`;

/*!50001 DROP VIEW IF EXISTS `grap` */;
/*!50001 DROP TABLE IF EXISTS `grap` */;

/*!50001 CREATE TABLE  `grap`(
 `departemen` varchar(100) ,
 `total` bigint(21) 
)*/;

/*Table structure for table `grap2` */

DROP TABLE IF EXISTS `grap2`;

/*!50001 DROP VIEW IF EXISTS `grap2` */;
/*!50001 DROP TABLE IF EXISTS `grap2` */;

/*!50001 CREATE TABLE  `grap2`(
 `departemen` varchar(100) ,
 `total` bigint(21) 
)*/;

/*View structure for view grap */

/*!50001 DROP TABLE IF EXISTS `grap` */;
/*!50001 DROP VIEW IF EXISTS `grap` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grap` AS (select `a`.`departemen` AS `departemen`,count(`a`.`status`) AS `total` from `tiket` `a` where `a`.`status` = 'Open' group by 1) */;

/*View structure for view grap2 */

/*!50001 DROP TABLE IF EXISTS `grap2` */;
/*!50001 DROP VIEW IF EXISTS `grap2` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grap2` AS (select `a`.`departemen` AS `departemen`,count(`a`.`status`) AS `total` from `tiket` `a` where `a`.`status` = 'Closed' group by 1) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
