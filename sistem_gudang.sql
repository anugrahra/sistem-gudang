-- MySQL dump 10.13  Distrib 5.5.62, for Linux (x86_64)
--
-- Host: localhost    Database: anugrahc_sistem_gudang
-- ------------------------------------------------------
-- Server version	5.5.62-cll

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `akun`
--

DROP TABLE IF EXISTS `akun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `akun` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akun`
--

LOCK TABLES `akun` WRITE;
/*!40000 ALTER TABLE `akun` DISABLE KEYS */;
INSERT INTO `akun` (`id`, `username`, `password`, `level`) VALUES (3,'Syarif','c36f924891fbfc1c16d036943365e0ed',2);
/*!40000 ALTER TABLE `akun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL,
  `jenis` varchar(11) NOT NULL,
  `num_kode` int(3) NOT NULL,
  `alpha_kode` varchar(2) NOT NULL,
  `kode` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` (`id`, `nama`, `stok`, `jenis`, `num_kode`, `alpha_kode`, `kode`) VALUES (1,'WATER METER',255,'AKSESORIS',32,'','KM032'),(2,'CLAMP SADLE FERULLE HDPE 2 Ã— 11/4 Inc',143,'AKSESORIS',2,'','AC002'),(3,'CLAMP SADLE FERULLE HDPE 3 Ã— 11/4 Inc',53,'AKSESORIS',3,'','AC003'),(4,'CLAMP SADLE FERULLE HDPE 4 Ã— 11/4 Inc',28,'AKSESORIS',4,'','AC004'),(5,'CLAMP SADLE  GI 4 Inc',192,'AKSESORIS',5,'','AC005'),(6,'STOP KRAN',273,'AKSESORIS',6,'','AC006'),(7,'SEAL TAPE',796,'AKSESORIS',7,'','AC007'),(8,'KNEE 1/2',508,'AKSESORIS',8,'','AC008'),(9,'TEE 1/2',168,'AKSESORIS',9,'','AC009'),(32,'tes',12,'BAHAN KIMIA',32,'','KM032'),(11,'SOCKET PVC 1/2',716,'AKSESORIS',11,'','AC011'),(12,'REDUCING 3/4 Ã— 1/2',117,'AKSESORIS',12,'','AC012'),(13,'ELBOW 1/2',74,'AKSESORIS',13,'','AC013'),(14,'UNION SOCKET 1/2',141,'AKSESORIS',14,'','AC014'),(15,'DOUBLE NIPLE',90,'AKSESORIS',15,'','AC015'),(16,'BOX METER',326,'AKSESORIS',16,'','AC016'),(17,'PIPA PE (METER) 1/2',678,'AKSESORIS',17,'','AC017'),(18,'PIPA PE (METER) 3/4',1436,'AKSESORIS',18,'','AC018'),(19,'PIPA GI (METER) 1/2',14,'AKSESORIS',19,'','AC019'),(20,'TEE GI 1/2',127,'AKSESORIS',20,'','AC020'),(21,'KNEE GI 1/2',217,'AKSESORIS',21,'','AC021'),(22,'KNEE DRAT DALAM (FEMALE) 1/2',139,'AKSESORIS',22,'','AC022'),(23,'UNION SOCKET HDPE 3/4',65,'AKSESORIS',23,'','AC023'),(24,'ATAP KRAN 1/2',92,'AKSESORIS',24,'','AC024'),(25,'DOP 1/2',132,'AKSESORIS',25,'','AC025'),(26,'LOCK CABLE VALVE 3/4 ',234,'AKSESORIS',26,'','AC026'),(27,'KNEE PE 3/4',131,'AKSESORIS',27,'','AC027'),(28,'FERULLE PE 1 1/4 Ã— 3/4',141,'AKSESORIS',28,'','AC028'),(29,'UNION SOCKET 1 INC',180,'AKSESORIS',29,'','AC029'),(30,'LOCK CABLE 1/2 INC',68,'AKSESORIS',30,'','AC030'),(31,'ac009',20,'AKSESORIS',31,'','AC031');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_barang`
--

DROP TABLE IF EXISTS `jenis_barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jenis_barang` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(20) NOT NULL,
  `alpha_kode` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_barang`
--

LOCK TABLES `jenis_barang` WRITE;
/*!40000 ALTER TABLE `jenis_barang` DISABLE KEYS */;
INSERT INTO `jenis_barang` (`id`, `jenis`, `alpha_kode`) VALUES (6,'asfa','af'),(2,'PERPIPAAN','PP'),(3,'BAHAN KIMIA','KM'),(4,'ASET','AS');
/*!40000 ALTER TABLE `jenis_barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kehilangan`
--

DROP TABLE IF EXISTS `kehilangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kehilangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `pelapor` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kehilangan`
--

LOCK TABLES `kehilangan` WRITE;
/*!40000 ALTER TABLE `kehilangan` DISABLE KEYS */;
INSERT INTO `kehilangan` (`id`, `tanggal`, `barang`, `jumlah`, `keterangan`, `pelapor`) VALUES (1,'2018-12-26','FUCK YOU',6,'ga tau','Dendy'),(2,'2019-02-07','CLAMP SADLE FERULLE HDPE 2 Ã— 11/4 Inc',12,'asdasdas','AlphaMan');
/*!40000 ALTER TABLE `kehilangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `penerimaan`
--

DROP TABLE IF EXISTS `penerimaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `penerimaan` (
  `id` tinyint(5) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `penerimaan`
--

LOCK TABLES `penerimaan` WRITE;
/*!40000 ALTER TABLE `penerimaan` DISABLE KEYS */;
INSERT INTO `penerimaan` (`id`, `no_transaksi`, `keterangan`, `tanggal`, `barang`, `jumlah`, `user`, `supplier`) VALUES (1,'12','Tes','2019-01-27','CLAMP SADLE FERULLE HDPE 3 Ã— 11/4 Inc',29,'AlphaMan','PT SUMBER MAKMUR'),(2,'1111111','11111','2019-01-28','TEE 1/2',-8,'AlphaMan','PT SUMBER MAKMUR'),(3,'adad','adadas','2019-02-06','SEAL TAPE',1,'AlphaMan','PT Decode');
/*!40000 ALTER TABLE `penerimaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengeluaran`
--

DROP TABLE IF EXISTS `pengeluaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_transaksi` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `unit` varchar(20) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `petugas` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengeluaran`
--

LOCK TABLES `pengeluaran` WRITE;
/*!40000 ALTER TABLE `pengeluaran` DISABLE KEYS */;
INSERT INTO `pengeluaran` (`id`, `no_transaksi`, `keterangan`, `tanggal`, `unit`, `barang`, `jumlah`, `petugas`) VALUES (1,'234234','NYOBA NGURANGAN','2018-12-25','PRODUKSI','FUCK YOU',3,'0'),(2,'324','BANGSAT','2018-12-25','PRODUKSI','ANJING',234,'0'),(3,'5345','TES ATUH ANJING','2018-12-25','PRODUKSI','FUCK YOU',3,'Anugrah'),(4,'123','NYOBAIN LAGI','2018-12-26','ADMINISTRASI','FUCK YOU',3,'Dendy');
/*!40000 ALTER TABLE `pengeluaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supplier`
--

DROP TABLE IF EXISTS `supplier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supplier` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_kontak` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `num_kode` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supplier`
--

LOCK TABLES `supplier` WRITE;
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT INTO `supplier` (`id`, `kode`, `nama`, `alamat`, `no_kontak`, `email`, `num_kode`) VALUES (1,'SP000','SWADAYA','','02220663678','uptam.cimahi@gmail.com',0),(2,'SM002','PT SUMBER MAKMUR','NERAKA JAHANNAM','02939405','sumbermakmur@gmail.com',2),(3,'DCD00','PT Decode','Jln Kertapura Denpasar , Bali','01827','admin@decode.id',3);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unit` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unit`
--

LOCK TABLES `unit` WRITE;
/*!40000 ALTER TABLE `unit` DISABLE KEYS */;
INSERT INTO `unit` (`id`, `nama`) VALUES (1,'PRODUKSI'),(2,'DISTRIBUSI'),(3,'ADMINISTRASI'),(4,'PELAYANAN LANGGANAN'),(5,'Tes');
/*!40000 ALTER TABLE `unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'anugrahc_sistem_gudang'
--

--
-- Dumping routines for database 'anugrahc_sistem_gudang'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-27 21:38:56
