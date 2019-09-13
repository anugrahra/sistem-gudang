-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 04:56 PM
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
  `jenis` varchar(11) NOT NULL,
  `num_kode` int(3) NOT NULL,
  `alpha_kode` varchar(2) NOT NULL,
  `kode` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `stok`, `satuan`, `jenis`, `num_kode`, `alpha_kode`, `kode`) VALUES
(34, 'Poly Alumunium Chloride (PAC) serbuk', 10150, 'Kg', 'BAHAN KIMIA', 6, '', 'KM006'),
(5, 'CLAMP SADLE  GI 4 Inc', 123686, 'pcs', 'AKSESORIS', 5, '', 'AC005');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` tinyint(2) NOT NULL,
  `jenis` varchar(30) NOT NULL,
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
(97, 'KM006', 'Poly Alumunium Chloride (PAC) serbuk', '2019-09-13', '', 'Bahan Kimia', 100, 0, 10100, ''),
(98, 'KM006', 'Poly Alumunium Chloride (PAC) serbuk', '2019-09-13', '', 'Pengolahan air baku', 0, 50, 10050, 'PRODUKSI'),
(99, 'KM006', 'Poly Alumunium Chloride (PAC) serbuk', '2019-09-13', '', 'Bahan Kimia', 100, 0, 10150, ''),
(100, 'KM006', 'Poly Alumunium Chloride (PAC) serbuk', '2019-09-13', '', 'Pengolahan air baku', 0, 50, 10100, 'PRODUKSI'),
(101, 'KM006', 'Poly Alumunium Chloride (PAC) serbuk', '2019-09-13', '', 'Bahan Kimia', 100, 0, 10200, ''),
(102, 'KM006', 'Poly Alumunium Chloride (PAC) serbuk', '2019-09-13', '', 'Pengolahan air baku', 0, 50, 10150, 'PRODUKSI');

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
(68, '', 'Bahan Kimia', '2019-09-13', 'KM006', 'Poly Alumunium Chloride (PAC) serbuk', 100, 'Anugrah', 'CV. Maju Utama', '1', 'Kg'),
(70, '', 'Bahan Kimia', '2019-09-13', 'KM006', 'Poly Alumunium Chloride (PAC) serbuk', 100, 'Dendy', 'CV. Maju Utama', '3', 'Kg'),
(69, '', 'Bahan Kimia', '2019-09-13', 'KM006', 'Poly Alumunium Chloride (PAC) serbuk', 100, 'Anugrah', 'CV. Maju Utama', '2', 'Kg');

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
(40, 'Pengolahan air baku', '2019-09-13', 'PRODUKSI', 'Anugrah', 'KM006', 'Poly Alumunium Chloride (PAC) serbuk', 50, '3', 'Kg'),
(39, 'Pengolahan air baku', '2019-09-13', 'PRODUKSI', 'Anugrah', 'KM006', 'Poly Alumunium Chloride (PAC) serbuk', 50, '2', 'Kg'),
(38, 'Pengolahan air baku', '2019-09-13', 'PRODUKSI', 'Anugrah', 'KM006', 'Poly Alumunium Chloride (PAC) serbuk', 50, '1', 'Kg');

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
(24, 'Poly Alumunium Chloride (PAC) serbuk', 'KM006', 'Kg', 0, 300, 150, 10150, 'Bahan Kimia', '2019-09-13');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kartu_stock`
--
ALTER TABLE `kartu_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` tinyint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `stok_opname`
--
ALTER TABLE `stok_opname`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
