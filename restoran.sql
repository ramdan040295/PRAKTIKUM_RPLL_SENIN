-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2015 at 07:42 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE IF NOT EXISTS `detail_penjualan` (
`nomor` int(4) NOT NULL,
  `fr_noo` int(11) NOT NULL,
  `nomor_meja` int(4) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `harga` double NOT NULL,
  `banyak` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`nomor`, `fr_noo`, `nomor_meja`, `nama`, `harga`, `banyak`, `total`) VALUES
(22, 22, 3, 'Rendang', 30000, 3, 90000),
(23, 23, 3, 'Ikan Bakar Kecap', 20000, 3, 60000),
(24, 24, 3, 'Ayam Kecap ', 35000, 1, 35000);

-- --------------------------------------------------------

--
-- Table structure for table `final`
--

CREATE TABLE IF NOT EXISTS `final` (
  `waktu` datetime DEFAULT NULL,
`nomor` int(11) NOT NULL,
  `meja` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `nominal` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final`
--

INSERT INTO `final` (`waktu`, `nomor`, `meja`, `total`, `nominal`) VALUES
('2015-12-13 09:34:34', 1, 1, 1000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `final_pesan`
--

CREATE TABLE IF NOT EXISTS `final_pesan` (
`no` int(11) NOT NULL,
  `final_meja` int(11) NOT NULL,
  `final_bayar` double NOT NULL,
  `final_bill` double NOT NULL,
  `final_kembali` double NOT NULL,
  `final_waktu` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `final_pesan`
--

INSERT INTO `final_pesan` (`no`, `final_meja`, `final_bayar`, `final_bill`, `final_kembali`, `final_waktu`) VALUES
(11, 3, 200000, 185000, 15000, '2015-12-13 11:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
  `meja` int(4) NOT NULL,
  `nama` varchar(100) NOT NULL,
`noo` int(11) NOT NULL,
  `banyak` int(11) NOT NULL,
  `harga` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`meja`, `nama`, `noo`, `banyak`, `harga`, `total`) VALUES
(3, 'Rendang', 22, 3, 30000, 90000),
(3, 'Ikan Bakar Kecap', 23, 3, 20000, 60000),
(3, 'Ayam Kecap ', 24, 1, 35000, 35000);

--
-- Triggers `keranjang`
--
DELIMITER //
CREATE TRIGGER `hapus_detail` AFTER DELETE ON `keranjang`
 FOR EACH ROW delete from detail_penjualan where fr_noo = old.noo
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `triger_tambah_detail` AFTER INSERT ON `keranjang`
 FOR EACH ROW insert into detail_penjualan values ('',new.noo,new.meja,new.nama,new.harga,new.banyak,new.total)
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE IF NOT EXISTS `konsumen` (
`no` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telepon` char(14) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`no`, `nama`, `telepon`, `alamat`) VALUES
(2, 'ilham ma', '0202324342', 'sukabumi');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE IF NOT EXISTS `makanan` (
`no` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `keterangan` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`no`, `nama`, `gambar`, `harga`, `keterangan`) VALUES
(2, 'Ayam Bakar', 'ayam_bakar.jpg', 30000, 'ini adalah cita rasa ayam bakar yang bisa membuat perut bergoyang dengan ayam pilihan yaitu ayam kampoeng'),
(3, 'Ayam Kecap ', 'ayam_kecap.jpg', 35000, ''),
(4, 'Cobek Ikan Pedas', 'cobek.jpg', 15000, ''),
(5, 'Ikan Bakar Kecap', 'ikan_bakar.png', 20000, ''),
(6, 'Kentang Daging Gurih', 'kentang_daging.jpg', 25000, ''),
(7, 'Lotek Sunda Segar dan Gurih pedas', 'lotek.jpg', 12000, ''),
(8, 'Ikan Bumbu Kacang Mantap', 'naniura.jpg', 17000, ''),
(9, 'Rendang', 'rendang.jpg', 30000, ''),
(10, 'Rendang Kambing', 'rendang_kambing.jpg', 20000, ''),
(11, 'Rendang Sapi', 'rendang-kambing.jpg', 24000, ''),
(12, 'Opor Ayam', 'resep-masakan-nusantara.jpg', 20000, ''),
(13, 'Rujak Soto', 'rujak_soto.jpg', 16000, ''),
(14, 'Sate Ayam', 'sate.jpg', 20000, ''),
(15, 'Soto Tongkar', 'soto_tongkar.jpg', 20000, ''),
(16, 'Cobek ikan', 'cobek.jpg', 20000, ''),
(17, 'Tumis kangkung', 'kangkung.jpg', 12000, 'ini dia tumis kangkung dan dengan rempah rempah nusantara'),
(18, 'Rujak Soto', 'rujak_soto.jpg', 20000, 'ini adalah cita rasa yang unik makanan yang sehat');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE IF NOT EXISTS `meja` (
`no` int(11) NOT NULL,
  `tmpmeja` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`no`, `tmpmeja`) VALUES
(7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
`no` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(75) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` char(15) NOT NULL,
  `jabatan` enum('admin','pelayan') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`no`, `nama`, `username`, `password`, `alamat`, `telepon`, `jabatan`) VALUES
(15, 'ramdan', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'cibiru', '88678676', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
 ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `final`
--
ALTER TABLE `final`
 ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `final_pesan`
--
ALTER TABLE `final_pesan`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
 ADD PRIMARY KEY (`noo`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
MODIFY `nomor` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `final`
--
ALTER TABLE `final`
MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `final_pesan`
--
ALTER TABLE `final_pesan`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
MODIFY `noo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
