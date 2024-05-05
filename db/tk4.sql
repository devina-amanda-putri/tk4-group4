-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 08:54 AM
-- Server version: 8.0.34
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tk4`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `IdBarang` int NOT NULL,
  `IdSupplier` int DEFAULT NULL,
  `IdPengguna` int DEFAULT NULL,
  `NamaBarang` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Keterangan` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `Satuan` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `HargaSatuan` decimal(20,2) DEFAULT NULL,
  `Stok` int DEFAULT NULL,
  `JumlahMinimalBarang` int DEFAULT NULL,
  `JumlahMaksimalBarang` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`IdBarang`, `IdSupplier`, `IdPengguna`, `NamaBarang`, `Keterangan`, `Satuan`, `HargaSatuan`, `Stok`, `JumlahMinimalBarang`, `JumlahMaksimalBarang`) VALUES
(3, 9, NULL, 'Mouse', 'Mouse Portable', 'pcs', 15000.00, 6, 6, 9),
(5, 2, 5, 'Aqua Botol', 'Aqua Botol Gede', 'Liter', 15000.00, NULL, NULL, NULL),
(6, 2, 5, 'Sendok Makan', 'Sendok Makan', 'Lusin', 30000.00, NULL, NULL, NULL),
(7, 1, 5, 'Garpu', 'Garpu', 'Lusin', 30000.00, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `IdAkses` int NOT NULL,
  `NamaAkses` varchar(100) DEFAULT NULL,
  `Keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `hakakses`
--

INSERT INTO `hakakses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES
(1, 'SuperAdmin', 'Super Admin'),
(2, 'Admin', 'Admin'),
(3, 'Seller', 'Seller'),
(4, 'Buyer', 'Buyer'),
(5, 'Analis', 'Analis'),
(6, 'Guest', 'Guest'),
(7, 'Manager', 'Manager'),
(8, 'Warehouse', 'Warehouse'),
(9, 'Goods', 'Goods Manager'),
(10, 'Reseller', 'Reseller');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IdPelanggan` int NOT NULL,
  `NamaPelanggan` varchar(200) DEFAULT NULL,
  `AlamatPelanggan` text,
  `NoTelp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IdPelanggan`, `NamaPelanggan`, `AlamatPelanggan`, `NoTelp`) VALUES
(5, 'Amanda', 'Indonesia', '083467823674'),
(8, 'Putri', 'Indonesia', '08212121213'),
(9, 'Husna', 'Indonesia', '08212121213'),
(10, 'Kahfi', 'Indonesia', '08212121213'),
(11, 'Marry', 'Indonesia', '08212121213'),
(12, 'Gosal', 'Indonesia', '08212121213'),
(13, 'Victor', 'Indonesia', '08212121213'),
(14, 'Margo', 'Indonesia', '08212121213');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `IdPembelian` int NOT NULL,
  `IdPengguna` int DEFAULT NULL,
  `IdBarang` int DEFAULT NULL,
  `IdPelanggan` int DEFAULT NULL,
  `JumlahPembelian` int DEFAULT NULL,
  `HargaBeli` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`IdPembelian`, `IdPengguna`, `IdBarang`, `IdPelanggan`, `JumlahPembelian`, `HargaBeli`) VALUES
(19, 4, 5, 5, 100, 1600000.00),
(20, 6, 5, 5, 10, 160000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `IdPengguna` int NOT NULL,
  `IdAkses` int DEFAULT NULL,
  `NamaPengguna` varchar(200) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `NamaDepan` varchar(100) DEFAULT NULL,
  `NamaBelakang` varchar(100) DEFAULT NULL,
  `NoHp` varchar(20) DEFAULT NULL,
  `Alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IdPengguna`, `IdAkses`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`) VALUES
(1, 2, 'amanda', 'adm123', 'Amanda', 'Putri', '082178993475', 'Jakarta'),
(2, 1, 'husna', 'husna123', 'Husna', 'Kahfi', '082264789090', 'Jakarta'),
(3, 3, 'marry', 'marry123', 'Marry', 'Gosal', '081378901364', 'Jakarta'),
(4, 4, 'victor', 'victor123', 'Victorio', 'Margo', '080912673455', 'Tangerang'),
(5, 3, 'jhon', 'jhon123', 'Jhon', 'Doe', '080923674422', 'Bandung'),
(6, 4, 'karina', 'karina123', 'Karina', 'Blu', '081267428943', 'Banten');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `IdPenjualan` int NOT NULL,
  `IdPengguna` int DEFAULT NULL,
  `IdBarang` int DEFAULT NULL,
  `IdPelanggan` int DEFAULT NULL,
  `JumlahPenjualan` int DEFAULT NULL,
  `HargaJual` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`IdPenjualan`, `IdPengguna`, `IdBarang`, `IdPelanggan`, `JumlahPenjualan`, `HargaJual`) VALUES
(9, 3, 3, 5, 50, 400000.00),
(10, 5, 3, 5, 5, 40000.00),
(19, 6, 5, 5, 100, 1600000.00),
(20, 3, 5, 5, 10, 160000.00),
(21, 1, 6, 5, 100, 200000.00);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `IdSupplier` int NOT NULL,
  `NamaSupplier` varchar(200) DEFAULT NULL,
  `AlamatSupplier` text,
  `NoTelp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`IdSupplier`, `NamaSupplier`, `AlamatSupplier`, `NoTelp`) VALUES
(1, 'PT Maju', 'Jawa Timur', '082121212121'),
(2, 'CV Beli Aja Dulu', 'Jawa Tengah', '082121212122'),
(3, 'PT Sumber Makmur', 'Indonesia', '082121212123'),
(4, 'CV Berani Beda', 'Indonesia', '082121212124'),
(5, 'CV Budiman', 'Indonesia', '082121212125'),
(6, 'PT Sukses', 'Indonesia', '082121212126'),
(7, 'CV Lion', 'Indonesia', '082121212127'),
(8, 'CV Jujur', 'Indonesia', '082121212128'),
(9, 'PT Muhammadiyah Bersatu', 'Indonesia', '082121212129'),
(10, 'PT Semangat', 'Indonesia', '082121212120');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`IdBarang`),
  ADD KEY `IdSupplier` (`IdSupplier`),
  ADD KEY `IdPengguna` (`IdPengguna`) USING BTREE;

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`IdAkses`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IdPelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`IdPembelian`),
  ADD KEY `IdPengguna` (`IdPengguna`),
  ADD KEY `IdBarang` (`IdBarang`),
  ADD KEY `IdPelanggan` (`IdPelanggan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IdPengguna`),
  ADD KEY `IdAkses` (`IdAkses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`IdPenjualan`),
  ADD KEY `IdBarang` (`IdBarang`),
  ADD KEY `IdPengguna` (`IdPengguna`),
  ADD KEY `IdPelanggan` (`IdPelanggan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`IdSupplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `IdBarang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hakakses`
--
ALTER TABLE `hakakses`
  MODIFY `IdAkses` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `IdPelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `IdPembelian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `IdPengguna` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `IdPenjualan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `IdSupplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `Barang_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Barang_ibfk_2` FOREIGN KEY (`IdSupplier`) REFERENCES `supplier` (`IdSupplier`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `Pembelian_ibfk_1` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`),
  ADD CONSTRAINT `Pembelian_ibfk_2` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`),
  ADD CONSTRAINT `Pembelian_ibfk_3` FOREIGN KEY (`IdPelanggan`) REFERENCES `pelanggan` (`IdPelanggan`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `Pengguna_ibfk_1` FOREIGN KEY (`IdAkses`) REFERENCES `hakakses` (`IdAkses`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `Penjualan_ibfk_1` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`),
  ADD CONSTRAINT `Penjualan_ibfk_2` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`),
  ADD CONSTRAINT `Penjualan_ibfk_3` FOREIGN KEY (`IdPelanggan`) REFERENCES `pelanggan` (`IdPelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
