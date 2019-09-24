-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 04:38 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang_uptam`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` tinyint(2) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`, `level`) VALUES
(3, 'Dendy', 'c36f924891fbfc1c16d036943365e0ed', 2),
(5, 'Administrator', 'e79016e6ca85273ab14040e9e926582a', 1),
(6, 'hendrian', 'b73044717a65c1868249999f9998bc19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `num_kode` int(3) NOT NULL,
  `alpha_kode` varchar(2) NOT NULL,
  `kode` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `stok`, `satuan`, `jenis`, `num_kode`, `alpha_kode`, `kode`) VALUES
(51, 'Gate Valve dia. 2\" / 50 mm', 2, 'bh', 'MATERIAL', 18, '', 'MT018'),
(37, 'Kaporit', 1180, 'Kg', 'BAHAN KIMIA', 4, '', 'KM004'),
(36, 'Soda Ash', 350, 'Kg', 'BAHAN KIMIA', 3, '', 'KM003'),
(34, 'Poly Alumunium Chloride (PAC) serbuk', 19850, 'Kg', 'BAHAN KIMIA', 1, '', 'KM001'),
(112, 'Clamp Sadle GI dia. 4 Inch', 192, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 78, '', 'LL078'),
(38, 'Kawat Las RD Ã¸2,6mm', 0, 'Kg', 'MATERIAL', 5, '', 'MT005'),
(39, 'Kawat Las RD Ã¸3,2mm', 0, 'Kg', 'MATERIAL', 6, '', 'MT006'),
(40, 'Dresser Joint dia. 2\" / 63 mm', 1, 'bh', 'MATERIAL', 7, '', 'MT007'),
(50, 'Dresser Joint Grip dia. 12\" / 300 mm', 0, 'bh', 'MATERIAL', 17, '', 'MT017'),
(49, 'Dresser Joint Grip dia. 10\" / 250 mm', 2, 'bh', 'MATERIAL', 16, '', 'MT016'),
(48, 'Dresser Joint Grip dia. 8\" / 200 mm', 0, 'bh', 'MATERIAL', 15, '', 'MT015'),
(47, 'Dresser Joint dia. 16\" / 400 mm', 0, 'bh', 'MATERIAL', 14, '', 'MT014'),
(46, 'Dresser Joint dia. 12\" / 300 mm', 4, 'bh', 'MATERIAL', 13, '', 'MT013'),
(45, 'Dresser Joint dia. 10\" / 250 mm', 0, 'bh', 'MATERIAL', 12, '', 'MT012'),
(44, 'Dresser Joint dia. 8\" / 200 mm', 2, 'bh', 'MATERIAL', 11, '', 'MT011'),
(43, 'Dresser Joint dia. 6\" / 150 mm', 2, 'bh', 'MATERIAL', 10, '', 'MT010'),
(42, 'Dresser Joint dia. 4\" / 110 mm', 1, 'bh', 'MATERIAL', 9, '', 'MT009'),
(41, 'Dresser Joint dia. 3\" / 90 mm', 2, 'bh', 'MATERIAL', 8, '', 'MT008'),
(35, 'Poly Alumunium Chloride (PAC) cair', 5200, 'Kg', 'BAHAN KIMIA', 2, '', 'KM002'),
(52, 'Gate Valve dia. 3\" / 75 mm', 1, 'bh', 'MATERIAL', 19, '', 'MT019'),
(53, 'Gate Valve dia. 4\" / 100 mm', 4, 'bh', 'MATERIAL', 20, '', 'MT020'),
(54, 'Valve Socket PE dia. 2 1/2 Inch', 2, 'bh', 'MATERIAL', 21, '', 'MT021'),
(55, 'Flange Adaptor dia. 4\" 100mm', 6, 'bh', 'MATERIAL', 22, '', 'MT022'),
(56, 'Flange Socket dia. 2\" / 63 mm', 4, 'bh', 'MATERIAL', 23, '', 'MT023'),
(57, 'Flange Socket PVC RRJ dia. 3\" / 90 mm', 2, 'bh', 'MATERIAL', 24, '', 'MT024'),
(58, 'Flange Socket PVC RRJ dia. 4\" / 110 mm', 2, 'bh', 'MATERIAL', 25, '', 'MT025'),
(59, 'Bend All Socket RRJ dia. 2â€ x 90â°', 2, 'bh', 'MATERIAL', 26, '', 'MT026'),
(60, 'Bend All Socket RRJ dia. 3â€ x 90â°', 1, 'bh', 'MATERIAL', 27, '', 'MT027'),
(61, 'Bend All Socket RRJ dia. 4â€ x 90â°', 1, 'bh', 'MATERIAL', 28, '', 'MT028'),
(62, 'Straight Coupler HDPE dia. 3\" / 90 mm', 4, 'bh', 'MATERIAL', 29, '', 'MT029'),
(63, 'Straight Coupler HDPE dia. 2\" / 63 mm', 2, 'bh', 'MATERIAL', 30, '', 'MT030'),
(64, 'Straight Coupler HDPE dia. 1 1/2 Inch', 3, 'bh', 'MATERIAL', 31, '', 'MT031'),
(65, 'Coupler dia.  1 1/2 Inch', 3, 'bh', 'MATERIAL', 32, '', 'MT032'),
(66, 'Coupler HDPE dia. 75Mm (2 1/2 Inch)', 2, 'bh', 'MATERIAL', 33, '', 'MT033'),
(67, 'Pipa HDPE dia. 8\" / 200 mm', 7, 'meter', 'MATERIAL', 34, '', 'MT034'),
(68, 'Pipa HDPE SDR 17 dia. 1 1/2 Inch', 45, 'meter', 'MATERIAL', 35, '', 'MT035'),
(69, 'Pipa HDPE SDR 17 dia. 2\" / 63 mm', 50, 'meter', 'MATERIAL', 36, '', 'MT036'),
(70, 'Pipa HDPE SDR 17 dia. 2 1/2 Inch', 12, 'meter', 'MATERIAL', 37, '', 'MT037'),
(71, 'Pipa HDPE SDR 17 dia. 3\" / 90 mm', 12, 'meter', 'MATERIAL', 38, '', 'MT038'),
(72, 'Pipa HDPE SDR 17 dia. 4\" / 110 mm', 12, 'meter', 'MATERIAL', 39, '', 'MT039'),
(73, 'Pipa HDPE SDR 17 dia. 6\" / 150 mm', 12, 'meter', 'MATERIAL', 40, '', 'MT040'),
(74, 'Pipa PVC SNI S 12,5 dia. 4\"', 12, 'meter', 'MATERIAL', 41, '', 'MT041'),
(75, 'Pipa PVC SNI S 12,5 RRJ dia. 3\"', 12, 'meter', 'MATERIAL', 42, '', 'MT042'),
(76, 'Pipa PVC SNI S 12,5 RRJ dia. 2\"', 11, 'meter', 'MATERIAL', 43, '', 'MT043'),
(77, 'PIPA PVC dia. 400 mm', 1, 'meter', 'MATERIAL', 44, '', 'MT044'),
(78, 'Tee All Socket PVC RRJ dia. 4x2\"', 2, 'bh', 'MATERIAL', 45, '', 'MT045'),
(79, 'Karet Packing dia. 5mm', 0, 'meter', 'MATERIAL', 46, '', 'MT046'),
(80, 'Clamp Sadle Ferulle HDPE dia. 2 Inch /63 mm — 11/4 Inch', 149, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 47, '', 'LL047'),
(81, 'Clamp Sadle Ferulle HDPE dia. 3 Inch /90 mm — 11/4 Inch', 19, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 48, '', 'LL048'),
(82, 'Clamp Sadle Ferulle HDPE dia. 4 Inch /110 mm — 11/4 Inc', 26, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 49, '', 'LL049'),
(84, 'Water Meter', 29, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 50, '', 'LL050'),
(85, 'Stop Kran', 234, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 51, '', 'LL051'),
(86, 'Seal Tape', 759, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 52, '', 'LL052'),
(87, 'Knee 1/2', 501, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 53, '', 'LL053'),
(88, 'Tee 1/2', 171, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 54, '', 'LL054'),
(89, 'Tee PE 3/4', 51, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 55, '', 'LL055'),
(90, 'Socket PVC 1/2', 713, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 56, '', 'LL056'),
(91, 'Reducing 3/4 Ã— 1/2', 114, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 57, '', 'LL057'),
(92, 'Elbow 1/2', 76, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 58, '', 'LL058'),
(93, 'Union Socket 1/2', 133, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 59, '', 'LL059'),
(94, 'Double Niple', 87, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 60, '', 'LL060'),
(95, 'Box Meter', 319, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 61, '', 'LL061'),
(96, 'Pipa PE 1/2', 645, 'meter', 'AKSESORIS SAMBUNGAN LANGGANAN', 62, '', 'LL062'),
(97, 'Pipa PE 3/4', 1375, 'meter', 'AKSESORIS SAMBUNGAN LANGGANAN', 63, '', 'LL063'),
(98, 'Pipa GI 1/2', 11, 'btg', 'AKSESORIS SAMBUNGAN LANGGANAN', 64, '', 'LL064'),
(99, 'Koupling Water Meter', 0, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 65, '', 'LL065'),
(100, 'Tee GI 1/2', 115, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 66, '', 'LL066'),
(101, 'Knee GI 1/2', 188, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 67, '', 'LL067'),
(102, 'Knee Drat Dalam (Female + Male) 1/2', 127, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 68, '', 'LL068'),
(103, 'Union Socket PE 3/4', 30, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 69, '', 'LL069'),
(104, 'Atap Kran 1/2', 59, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 70, '', 'LL070'),
(105, 'Dop 1/2', 114, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 71, '', 'LL071'),
(106, 'Lock Cable Valve 3/4 + Coupling 1/2', 0, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 72, '', 'LL072'),
(107, 'Knee PE 3/4', 115, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 73, '', 'LL073'),
(108, 'Ferulle PE 1 1/4 Ã— 3/4', 133, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 74, '', 'LL074'),
(109, 'Union Socket 1 Inch', 179, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 75, '', 'LL075'),
(110, 'Lock Cable 1/2 Inch', 0, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 76, '', 'LL076'),
(111, 'Flouting Valve + Pelampung dia 2\"', 2, 'bh', 'AKSESORIS SAMBUNGAN LANGGANAN', 77, '', 'LL077');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` tinyint(2) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `alpha_kode` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `jenis`, `alpha_kode`) VALUES
(2, 'BAHAN KIMIA', 'KM'),
(3, 'PERALATAN KERJA', 'PK'),
(4, 'PERALATAN MESIN DAN LISTRIK', 'ML'),
(7, 'BAHAN BANGUNAN', 'BN'),
(8, 'MATERIAL', 'MT'),
(9, 'AKSESORIS SAMBUNGAN LANGGANAN', 'SL');

-- --------------------------------------------------------

--
-- Table structure for table `kartu_stock`
--

CREATE TABLE `kartu_stock` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `no_bon` varchar(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `pengguna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kartu_stock`
--

INSERT INTO `kartu_stock` (`id`, `kode_barang`, `nama_barang`, `tanggal`, `no_bon`, `keterangan`, `masuk`, `keluar`, `sisa`, `pengguna`) VALUES
(1, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-07-01', '', 'Pengolahan air baku', 0, 490, 10910, 'PRODUKSI'),
(2, 'KM004', 'Kaporit', '2019-07-01', '', 'Pengolahan air baku', 0, 59, 1921, 'PRODUKSI'),
(3, 'LL061', 'Box Meter', '2019-07-06', '', 'Pemasangan SR baru', 0, 1, 319, 'DISTRIBUSI'),
(4, 'LL050', 'Water Meter', '2019-07-06', '', 'Pemasangan SR baru', 0, 1, 31, 'DISTRIBUSI'),
(5, 'LL073', 'Knee PE 3/4', '2019-07-06', '', 'Pemasangan SR baru', 0, 1, 117, 'DISTRIBUSI'),
(6, 'LL069', 'Union Socket PE 3/4', '2019-07-06', '', 'Pemasangan SR baru', 0, 1, 35, 'DISTRIBUSI'),
(7, 'LL055', 'Tee PE 3/4', '2019-07-06', '', 'Pemasangan SR baru', 0, 1, 51, 'DISTRIBUSI'),
(8, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-07-08', '', 'Pengolahan air baku', 0, 490, 10420, 'PRODUKSI'),
(9, 'KM004', 'Kaporit', '2019-07-08', '', 'Pengolahan air baku', 0, 59, 1862, 'PRODUKSI'),
(10, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-07-15', '', 'Pengolahan air baku', 0, 490, 9930, 'PRODUKSI'),
(11, 'KM004', 'Kaporit', '2019-07-15', '', 'Pengolahan air baku', 0, 59, 1803, 'PRODUKSI'),
(12, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-07-22', '', 'Pengolahan air baku', 0, 490, 9440, 'PRODUKSI'),
(13, 'KM004', 'Kaporit', '2019-07-22', '', 'Pengolahan air baku', 0, 59, 1744, 'PRODUKSI'),
(14, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-07-29', '', 'Pengolahan air baku', 0, 490, 8950, 'PRODUKSI'),
(15, 'KM004', 'Kaporit', '2019-07-29', '', 'Pengolahan air baku', 0, 59, 1685, 'PRODUKSI'),
(16, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-08-05', '', 'Pengolahan air baku', 0, 600, 8350, 'PRODUKSI'),
(17, 'KM004', 'Kaporit', '2019-08-05', '', 'Pengolahan air baku', 0, 70, 1615, 'PRODUKSI'),
(18, 'LL070', 'Atap Kran 1/2', '2019-08-05', '', 'Perbaikan SR', 0, 4, 59, 'DISTRIBUSI'),
(19, 'LL059', 'Union Socket 1/2', '2019-08-09', '', 'Pemindahan SR', 0, 2, 133, 'DISTRIBUSI'),
(20, 'LL054', 'Tee 1/2', '2019-08-09', '', 'Pemindahan SR', 0, 1, 171, 'DISTRIBUSI'),
(21, 'LL053', 'Knee 1/2', '2019-08-09', '', 'Pemindahan SR', 0, 2, 501, 'DISTRIBUSI'),
(22, 'LL062', 'Pipa PE 1/2', '2019-08-09', '', 'Pemindahan SR', 0, 8, 645, 'DISTRIBUSI'),
(23, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-08-12', '', 'Pengolahan air baku', 0, 600, 7750, 'PRODUKSI'),
(24, 'KM004', 'Kaporit', '2019-08-12', '', 'Pengolahan air baku', 0, 70, 1545, 'PRODUKSI'),
(25, 'LL069', 'Union Socket PE 3/4', '2019-08-12', '', 'Perbaikan pipa', 0, 2, 33, 'DISTRIBUSI'),
(26, 'LL063', 'Pipa PE 3/4', '2019-08-12', '', 'Perbaikan pipa', 0, 1, 1377, 'DISTRIBUSI'),
(27, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-08-19', '', 'Pengolahan air baku', 0, 600, 17150, 'PRODUKSI'),
(28, 'KM004', 'Kaporit', '2019-08-19', '', 'Pengolahan air baku', 0, 70, 1475, 'PRODUKSI'),
(29, 'LL069', 'Union Socket PE 3/4', '2019-08-22', '', 'Pemindahan SR', 0, 1, 32, 'DISTRIBUSI'),
(30, 'LL073', 'Knee PE 3/4', '2019-08-22', '', 'Pemindahan SR', 0, 1, 116, 'DISTRIBUSI'),
(31, 'LL063', 'Pipa PE 3/4', '2019-08-22', '', 'Pemindahan SR', 0, 1, 1376, 'DISTRIBUSI'),
(32, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-08-26', '', 'Pengolahan air baku', 0, 500, 16650, 'PRODUKSI'),
(33, 'KM004', 'Kaporit', '2019-08-26', '', 'Pengolahan air baku', 0, 75, 1400, 'PRODUKSI'),
(34, 'KM002', 'Poly Alumunium Chloride (PAC) cair', '2019-08-28', '', 'Pengolahan air baku', 0, 100, 5225, 'PRODUKSI'),
(35, 'KM002', 'Poly Alumunium Chloride (PAC) cair', '2019-08-30', '', 'Pengolahan air baku', 0, 25, 5200, 'PRODUKSI'),
(36, 'KM003', 'Soda Ash', '2019-09-02', '', 'Pengolahan air baku', 0, 10, 340, 'PRODUKSI'),
(37, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-09-02', '', 'Pengolahan air baku', 0, 600, 16050, 'PRODUKSI'),
(38, 'KM004', 'Kaporit', '2019-09-02', '', 'Pengolahan air baku', 0, 55, 1345, 'PRODUKSI'),
(39, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-09-09', '', 'Pengolahan air baku', 0, 400, 15650, 'PRODUKSI'),
(40, 'KM004', 'Kaporit', '2019-09-09', '', 'Pengolahan air baku', 0, 60, 1285, 'PRODUKSI'),
(41, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-09-11', '', 'Bahan Kimia', 5000, 0, 20650, ''),
(42, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-09-16', '', 'Pengolahan air baku', 0, 400, 20250, 'PRODUKSI'),
(43, 'KM004', 'Kaporit', '2019-09-16', '', 'Pengolahan air baku', 0, 50, 1235, 'PRODUKSI'),
(44, 'LL050', 'Water Meter', '2019-09-16', '', 'Penggantian meteran air', 0, 2, 29, 'DISTRIBUSI'),
(45, 'LL073', 'Knee PE 3/4', '2019-09-17', '', 'Perbaikan pipa', 0, 1, 115, 'DISTRIBUSI'),
(46, 'LL069', 'Union Socket PE 3/4', '2019-09-17', '', 'Perbaikan pipa', 0, 2, 30, 'DISTRIBUSI'),
(47, 'LL074', 'Ferulle PE 1 1/4 Ã— 3/4', '2019-09-17', '', 'Perbaikan pipa', 0, 1, 133, 'DISTRIBUSI'),
(48, 'LL063', 'Pipa PE 3/4', '2019-09-17', '', 'Perbaikan pipa', 0, 1, 1375, 'DISTRIBUSI'),
(49, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-09-23', '', 'Pengolahan air baku', 0, 400, 19850, 'PRODUKSI'),
(50, 'KM004', 'Kaporit', '2019-09-23', '', 'Pengolahan air baku', 0, 55, 1180, 'PRODUKSI'),
(51, 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', '2019-08-14', '', 'Bahan Kimia', 10000, 0, 17750, '');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `no_order` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `keterangan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` tinyint(5) NOT NULL,
  `no_transaksi` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `no_surat_jalan` varchar(20) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `no_transaksi`, `keterangan`, `tanggal`, `kode_barang`, `barang`, `jumlah`, `user`, `supplier`, `no_surat_jalan`, `satuan`) VALUES
(75, '', 'Bahan Kimia', '2019-09-11', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 5000, 'Dendy', 'CV. Maju Utama', '3180044975', 'Kg'),
(76, '', 'Bahan Kimia', '2019-08-14', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 10000, 'Dendy', 'CV. Maju Utama', '3095600643', 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `unit` varchar(20) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `no_surat_pengambilan` varchar(20) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `keterangan`, `tanggal`, `unit`, `penerima`, `kode_barang`, `barang`, `jumlah`, `no_surat_pengambilan`, `satuan`) VALUES
(48, 'Pemasangan SR baru', '2019-07-06', 'DISTRIBUSI', 'Danny', 'LL073', 'Knee PE 3/4', 1, 'issue-002/VII/2019', 'bh'),
(47, 'Pemasangan SR baru', '2019-07-06', 'DISTRIBUSI', 'Danny', 'LL050', 'Water Meter', 1, 'issue-002/VII/2019', 'bh'),
(46, 'Pemasangan SR baru', '2019-07-06', 'DISTRIBUSI', 'Danny', 'LL061', 'Box Meter', 1, 'issue-002/VII/2019', 'bh'),
(45, 'Pengolahan air baku', '2019-07-01', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 59, 'issue-001/VII/2019', 'Kg'),
(44, 'Pengolahan air baku', '2019-07-01', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 490, 'issue-001/VII/2019', 'Kg'),
(49, 'Pemasangan SR baru', '2019-07-06', 'DISTRIBUSI', 'Danny', 'LL069', 'Union Socket PE 3/4', 1, 'issue-002/VII/2019', 'bh'),
(50, 'Pemasangan SR baru', '2019-07-06', 'DISTRIBUSI', 'Danny', 'LL055', 'Tee PE 3/4', 1, 'issue-002/VII/2019', 'bh'),
(51, 'Pengolahan air baku', '2019-07-08', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 490, 'issue-003/VII/2019', 'Kg'),
(52, 'Pengolahan air baku', '2019-07-08', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 59, 'issue-003/VII/2019', 'Kg'),
(53, 'Pengolahan air baku', '2019-07-15', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 490, 'issue-004/VII/2019', 'Kg'),
(54, 'Pengolahan air baku', '2019-07-15', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 59, 'issue-004/VII/2019', 'Kg'),
(55, 'Pengolahan air baku', '2019-07-22', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 490, 'issue-005/VII/2019', 'Kg'),
(56, 'Pengolahan air baku', '2019-07-22', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 59, 'issue-005/VII/2019', 'Kg'),
(57, 'Pengolahan air baku', '2019-07-29', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 490, 'issue-006/VII/2019', 'Kg'),
(58, 'Pengolahan air baku', '2019-07-29', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 59, 'issue-006/VII/2019', 'Kg'),
(59, 'Pengolahan air baku', '2019-08-05', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 600, 'issue-001/VIII/2019', 'Kg'),
(60, 'Pengolahan air baku', '2019-08-05', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 70, 'issue-001/VIII/2019', 'Kg'),
(61, 'Perbaikan SR', '2019-08-05', 'DISTRIBUSI', 'Danny', 'LL070', 'Atap Kran 1/2', 4, 'issue-002/VIII/2019', 'bh'),
(62, 'Pemindahan SR', '2019-08-09', 'DISTRIBUSI', 'Danny', 'LL059', 'Union Socket 1/2', 2, 'issue-003/VIII/2019', 'bh'),
(63, 'Pemindahan SR', '2019-08-09', 'DISTRIBUSI', 'Danny', 'LL054', 'Tee 1/2', 1, 'issue-003/VIII/2019', 'bh'),
(64, 'Pemindahan SR', '2019-08-09', 'DISTRIBUSI', 'Danny', 'LL053', 'Knee 1/2', 2, 'issue-003/VIII/2019', 'bh'),
(65, 'Pemindahan SR', '2019-08-09', 'DISTRIBUSI', 'Danny', 'LL062', 'Pipa PE 1/2', 8, 'issue-003/VIII/2019', 'meter'),
(66, 'Pengolahan air baku', '2019-08-12', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 600, 'issue-004/VIII/2019', 'Kg'),
(67, 'Pengolahan air baku', '2019-08-12', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 70, 'issue-004/VIII/2019', 'Kg'),
(68, 'Perbaikan pipa', '2019-08-12', 'DISTRIBUSI', 'Danny', 'LL069', 'Union Socket PE 3/4', 2, 'issue-005/VIII/2019', 'bh'),
(69, 'Perbaikan pipa', '2019-08-12', 'DISTRIBUSI', 'Danny', 'LL063', 'Pipa PE 3/4', 1, 'issue-005/VIII/2019', 'meter'),
(70, 'Pengolahan air baku', '2019-08-19', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 600, 'issue-006/VIII/2019', 'Kg'),
(71, 'Pengolahan air baku', '2019-08-19', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 70, 'issue-006/VIII/2019', 'Kg'),
(72, 'Pemindahan SR', '2019-08-22', 'DISTRIBUSI', 'Danny', 'LL069', 'Union Socket PE 3/4', 1, 'issue-007/VIII/2019', 'bh'),
(73, 'Pemindahan SR', '2019-08-22', 'DISTRIBUSI', 'Danny', 'LL073', 'Knee PE 3/4', 1, 'issue-007/VIII/2019', 'bh'),
(74, 'Pemindahan SR', '2019-08-22', 'DISTRIBUSI', 'Danny', 'LL063', 'Pipa PE 3/4', 1, 'issue-007/VIII/2019', 'meter'),
(75, 'Pengolahan air baku', '2019-08-26', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 500, 'issue-008/VIII/2019', 'Kg'),
(76, 'Pengolahan air baku', '2019-08-26', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 75, 'issue-008/VIII/2019', 'Kg'),
(77, 'Pengolahan air baku', '2019-08-28', 'PRODUKSI', 'Anugrah', 'KM002', 'Poly Alumunium Chloride (PAC) cair', 100, 'issue-009/VIII/2019', 'Kg'),
(78, 'Pengolahan air baku', '2019-08-30', 'PRODUKSI', 'Anugrah', 'KM002', 'Poly Alumunium Chloride (PAC) cair', 25, 'issue-010/VIII/2019', 'Kg'),
(80, 'Pengolahan air baku', '2019-09-02', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 600, 'issue-001/IX/2019', 'Kg'),
(81, 'Pengolahan air baku', '2019-09-02', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 55, 'issue-001/IX/2019', 'Kg'),
(82, 'Pengolahan air baku', '2019-09-09', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 400, 'issue-002/IX/2019', 'Kg'),
(83, 'Pengolahan air baku', '2019-09-09', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 60, 'issue-002/IX/2019', 'Kg'),
(84, 'Pengolahan air baku', '2019-09-16', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 400, 'issue-003/IX/2019', 'Kg'),
(85, 'Pengolahan air baku', '2019-09-16', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 50, 'issue-003/IX/2019', 'Kg'),
(86, 'Penggantian meteran air', '2019-09-16', 'DISTRIBUSI', 'Danny', 'LL050', 'Water Meter', 2, 'issue-004/IX/2019', 'bh'),
(87, 'Perbaikan pipa', '2019-09-17', 'DISTRIBUSI', 'Danny', 'LL073', 'Knee PE 3/4', 1, 'issue-005/IX/2019', 'bh'),
(88, 'Perbaikan pipa', '2019-09-17', 'DISTRIBUSI', 'Danny', 'LL069', 'Union Socket PE 3/4', 2, 'issue-005/IX/2019', 'bh'),
(89, 'Perbaikan pipa', '2019-09-17', 'DISTRIBUSI', 'Danny', 'LL074', 'Ferulle PE 1 1/4 Ã— 3/4', 1, 'issue-005/IX/2019', 'bh'),
(90, 'Perbaikan pipa', '2019-09-17', 'DISTRIBUSI', 'Danny', 'LL063', 'Pipa PE 3/4', 1, 'issue-005/IX/2019', 'meter'),
(91, 'Pengolahan air baku', '2019-09-23', 'PRODUKSI', 'Anugrah', 'KM001', 'Poly Alumunium Chloride (PAC) serbuk', 400, 'issue-006/IX/2019', 'Kg'),
(92, 'Pengolahan air baku', '2019-09-23', 'PRODUKSI', 'Anugrah', 'KM004', 'Kaporit', 55, 'issue-006/IX/2019', 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `stok_opname`
--

CREATE TABLE `stok_opname` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `saldo_awal` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `saldo_akhir` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `bulan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_opname`
--

INSERT INTO `stok_opname` (`id`, `nama_barang`, `kode_barang`, `satuan`, `saldo_awal`, `masuk`, `keluar`, `saldo_akhir`, `keterangan`, `bulan`) VALUES
(1, 'Poly Alumunium Chloride (PAC) serbuk', 'KM001', 'Kg', 11400, 0, 2450, 8950, '', '2019-07-01'),
(2, 'Kaporit', 'KM004', 'Kg', 1980, 0, 295, 1685, '', '2019-07-01'),
(3, 'Box Meter', 'LL061', 'bh', 320, 0, 1, 319, '', '2019-07-06'),
(4, 'Water Meter', 'LL050', 'bh', 32, 0, 1, 31, '', '2019-07-06'),
(5, 'Knee PE 3/4', 'LL073', 'bh', 118, 0, 1, 117, '', '2019-07-06'),
(6, 'Union Socket PE 3/4', 'LL069', 'bh', 36, 0, 1, 35, '', '2019-07-06'),
(7, 'Tee PE 3/4', 'LL055', 'bh', 52, 0, 1, 51, '', '2019-07-06'),
(8, 'Poly Alumunium Chloride (PAC) serbuk', 'KM001', 'Kg', 8950, 10000, 2300, 16650, '', '2019-08-05'),
(9, 'Kaporit', 'KM004', 'Kg', 1685, 0, 285, 1400, '', '2019-08-05'),
(10, 'Atap Kran 1/2', 'LL070', 'bh', 63, 0, 4, 59, '', '2019-08-05'),
(11, 'Union Socket 1/2', 'LL059', 'bh', 135, 0, 2, 133, '', '2019-08-09'),
(12, 'Tee 1/2', 'LL054', 'bh', 172, 0, 1, 171, '', '2019-08-09'),
(13, 'Knee 1/2', 'LL053', 'bh', 503, 0, 2, 501, '', '2019-08-09'),
(14, 'Pipa PE 1/2', 'LL062', 'meter', 653, 0, 8, 645, '', '2019-08-09'),
(15, 'Union Socket PE 3/4', 'LL069', 'bh', 35, 0, 3, 32, '', '2019-08-12'),
(16, 'Pipa PE 3/4', 'LL063', 'meter', 1378, 0, 2, 1376, '', '2019-08-12'),
(17, 'Knee PE 3/4', 'LL073', 'bh', 117, 0, 1, 116, '', '2019-08-22'),
(18, 'Poly Alumunium Chloride (PAC) cair', 'KM002', 'Kg', 5325, 0, 125, 5200, '', '2019-08-28'),
(20, 'Poly Alumunium Chloride (PAC) serbuk', 'KM001', 'Kg', 16650, 5000, 1800, 19850, '', '2019-09-02'),
(21, 'Kaporit', 'KM004', 'Kg', 1400, 0, 220, 1180, '', '2019-09-02'),
(22, 'Water Meter', 'LL050', 'bh', 31, 0, 2, 29, '', '2019-09-16'),
(23, 'Knee PE 3/4', 'LL073', 'bh', 116, 0, 1, 115, '', '2019-09-17'),
(24, 'Union Socket PE 3/4', 'LL069', 'bh', 32, 0, 2, 30, '', '2019-09-17'),
(25, 'Ferulle PE 1 1/4 Ã— 3/4', 'LL074', 'bh', 134, 0, 1, 133, '', '2019-09-17'),
(26, 'Pipa PE 3/4', 'LL063', 'meter', 1376, 0, 1, 1375, '', '2019-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` tinyint(4) NOT NULL,
  `kode` varchar(5) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_kontak` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `num_kode` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kode`, `nama`, `alamat`, `no_kontak`, `email`, `num_kode`) VALUES
(5, 'SW000', 'SWADAYA', 'Jl. Raden Demang Hardjakusumah No.1, Komplek Perkantoran Pemerintah Kota Cimahi, Gedung UPTD Air Minum Kota Cimahi, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat 40132', '02220663678', 'elang.uptdam@gmail.com', 2),
(4, 'DO001', 'dekadensiotak', 'Cimahi', '098922323', 'anumaencoc@gmail.com', 1),
(6, 'MU003', 'CV. Maju Utama', 'Perumahan Gerbang Karawang Blok B No. 5 - 6', '(0267) 8456972', 'cv.maju.u@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` tinyint(2) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `nama`) VALUES
(1, 'PRODUKSI'),
(2, 'DISTRIBUSI'),
(3, 'ADMINISTRASI'),
(4, 'PELAYANAN LANGGANAN');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kartu_stock`
--
ALTER TABLE `kartu_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_opname`
--
ALTER TABLE `stok_opname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kartu_stock`
--
ALTER TABLE `kartu_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `stok_opname`
--
ALTER TABLE `stok_opname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
