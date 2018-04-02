-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2018 at 05:51 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `telepon`, `alamat`, `username`, `password`, `role`) VALUES
(1, 'Mark Zuckerberg', '081553844697', 'Bulak Banteng', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `logo` varchar(100) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`logo`, `catatan`) VALUES
('logo.jpg', 'lorem ipsum dolor');

-- --------------------------------------------------------

--
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `idlayanan` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`idlayanan`, `nama`, `harga`, `satuan`) VALUES
(1, 'Cuci Kering', 10000, 'kg'),
(21, 'Cuci Kering', 12000, 'bijian'),
(37, 'Cuci Basah', 7000, 'kg'),
(65, 'Cuci Basah', 8000, 'bijian'),
(12, 'Cuci Setrika', 14000, 'kg'),
(5, 'Cuci Setrika', 15000, 'bijian');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `idlayanan` int(11) NOT NULL,
  `idadmin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `qty` int(5) NOT NULL,
  `status` varchar(25) NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `harga` int(15) NOT NULL,
  `bayar` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `idlayanan`, `idadmin`, `nama`, `telepon`, `alamat`, `tgl_masuk`, `qty`, `status`, `catatan`, `harga`, `bayar`) VALUES
(12413, 12, 4681, 'Riyan Satria', '081252298190', 'di rumah', '2018-03-23', 5, 'Belum diambil', 'gak ada', 70000, 50000),
(15443, 12, 4681, 'Jokondokondo', '081252298190', 'di rumah', '2018-03-23', 5, 'Belum diambil', 'gak ada', 70000, 50000),
(26067, 5, 4681, 'Brian Immanuels', '085321450680', 'di rumah', '2018-03-23', 15, 'Sudah diambil', 'gak ada', 150000, 20000),
(44602, 12, 0, 'Riyan Satria', '081252298190', 'di rumah', '2018-03-23', 3, 'Belum diambil', 'gak ada', 42000, 25000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
