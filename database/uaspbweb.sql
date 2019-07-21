-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: dev.sabinsolusi.com    Database: elearning
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dosen_teachs`
--

DROP TABLE IF EXISTS `dosen_teachs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dosen_teachs` (
  `id_dosen_teachs` int(11) NOT NULL AUTO_INCREMENT,
  `id_dosen` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  `file` varchar(100) DEFAULT NULL,
  `keterangan_file` text,
  `file_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_dosen_teachs`),
  KEY `fk_dosen_teachs_1_idx` (`id_dosen`),
  KEY `fk_dosen_teachs_id_matkul_idx` (`id_matkul`),
  CONSTRAINT `fk_dosen_teachs_id_dosen` FOREIGN KEY (`id_dosen`) REFERENCES `ms_dosen` (`id_dosen`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_dosen_teachs_id_matkul` FOREIGN KEY (`id_matkul`) REFERENCES `ms_matkul` (`id_matkul`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `mahasiswa_follows`
--

DROP TABLE IF EXISTS `mahasiswa_follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mahasiswa_follows` (
  `idmahasiswa_follows` int(11) NOT NULL,
  `id_mahasiswa` int(11) NOT NULL,
  `id_matkul` int(11) NOT NULL,
  PRIMARY KEY (`idmahasiswa_follows`),
  KEY `fk_mahasiswa_follows_id_mahasiswa_idx` (`id_mahasiswa`),
  KEY `fk_mahasiswa_follows_id_matkul_idx` (`id_matkul`),
  CONSTRAINT `fk_mahasiswa_follows_id_mahasiswa` FOREIGN KEY (`id_mahasiswa`) REFERENCES `ms_mahasiswa` (`id_mahasiswa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_mahasiswa_follows_id_matkul` FOREIGN KEY (`id_matkul`) REFERENCES `ms_matkul` (`id_matkul`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ms_dosen`
--

DROP TABLE IF EXISTS `ms_dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ms_dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `nidn` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `tgl_lhr` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dosen`),
  KEY `fk_ms_dosen_ms_pengguna1` (`id_pengguna`),
  CONSTRAINT `fk_ms_dosen_ms_pengguna1` FOREIGN KEY (`id_pengguna`) REFERENCES `ms_pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ms_mahasiswa`
--

DROP TABLE IF EXISTS `ms_mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ms_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `tgl_lhr` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_mahasiswa`),
  KEY `fk_ms_mahasiswa_ms_pengguna` (`id_pengguna`),
  CONSTRAINT `fk_ms_mahasiswa_ms_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `ms_pengguna` (`id_pengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ms_matkul`
--

DROP TABLE IF EXISTS `ms_matkul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ms_matkul` (
  `id_matkul` int(11) NOT NULL AUTO_INCREMENT,
  `nm_matkul` varchar(45) DEFAULT NULL,
  `judul` varchar(45) DEFAULT NULL,
  `deskripsi` varchar(45) DEFAULT NULL,
  `file` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_matkul`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `ms_pengguna`
--

DROP TABLE IF EXISTS `ms_pengguna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ms_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `level` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary table structure for view `v_ampu`
--

DROP TABLE IF EXISTS `v_ampu`;
/*!50001 DROP VIEW IF EXISTS `v_ampu`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `v_ampu` AS SELECT 
 1 AS `id_matkul`,
 1 AS `nm_matkul`,
 1 AS `judul`,
 1 AS `deskripsi`,
 1 AS `file`,
 1 AS `id_dosen_teachs`,
 1 AS `id_dosen`,
 1 AS `file_path`,
 1 AS `file_name`,
 1 AS `keterangan_file`,
 1 AS `status`*/;
SET character_set_client = @saved_cs_client;

--
-- Dumping routines for database 'elearning'
--

--
-- Final view structure for view `v_ampu`
--

/*!50001 DROP VIEW IF EXISTS `v_ampu`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`elearning`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `v_ampu` AS select `mm`.`id_matkul` AS `id_matkul`,`mm`.`nm_matkul` AS `nm_matkul`,`mm`.`judul` AS `judul`,`mm`.`deskripsi` AS `deskripsi`,`mm`.`file` AS `file`,`dt`.`id_dosen_teachs` AS `id_dosen_teachs`,`dt`.`id_dosen` AS `id_dosen`,`dt`.`file` AS `file_path`,`dt`.`file_name` AS `file_name`,`dt`.`keterangan_file` AS `keterangan_file`,(case when (`dt`.`id_dosen_teachs` is not null) then TRUE else FALSE end) AS `status` from (`ms_matkul` `mm` left join `dosen_teachs` `dt` on((`dt`.`id_matkul` = `mm`.`id_matkul`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-21 13:19:18
