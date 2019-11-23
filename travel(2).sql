-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2019 at 09:17 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kode_jadwal` varchar(255) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat_penjemputan` varchar(255) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_pulang` date NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_biaya` int(11) NOT NULL,
  `status_jadwal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `kode_jadwal`, `id_kendaraan`, `id_kota`, `id_user`, `alamat_penjemputan`, `tgl_berangkat`, `tgl_pulang`, `tgl_pesan`, `total_biaya`, `status_jadwal`) VALUES
(1, 'TRV-00001', 4, 1, 3, '', '2019-11-06', '2019-11-09', '2019-11-06 13:08:29', 850000, 'Dibatalkan'),
(2, 'TRV-00002', 4, 2, 3, '', '2019-11-06', '2019-11-08', '2019-11-06 13:31:22', 600000, 'Menunggu Konfirmasi'),
(3, 'TRV-00003', 5, 1, 3, '', '2019-11-06', '2019-11-08', '2019-11-06 15:08:04', 500000, 'Menunggu Pembayaran'),
(4, 'TRV-00004', 5, 1, 3, '', '2019-11-06', '2019-11-08', '2019-11-06 15:16:59', 500000, 'Menunggu Pembayaran'),
(5, 'TRV-00005', 4, 1, 2, '', '2019-11-07', '2019-11-09', '2019-11-07 00:24:03', 600000, 'Menunggu Konfirmasi'),
(6, 'TRV-00006', 5, 2, 2, '', '2019-11-27', '2019-11-28', '2019-11-07 01:29:58', 300000, 'Dibatalkan'),
(7, 'TRV-00007', 4, 2, 2, 'Depan RS Gatoel Jl. Brawijaya', '2019-11-13', '2019-11-15', '2019-11-08 06:37:03', 600000, 'Menunggu Pembayaran'),
(8, 'TRV-00008', 4, 2, 2, 'Depan RS Gatoel Jl. Brawijaya', '2019-11-13', '2019-11-15', '2019-11-08 06:44:48', 600000, 'Menunggu Pembayaran'),
(9, 'TRV-00009', 4, 2, 2, 'Depan RS Gatoel Jl. Brawijaya', '2019-11-13', '2019-11-15', '2019-11-08 06:45:10', 600000, 'Menunggu Pembayaran'),
(10, 'TRV-00010', 5, 2, 3, 'Depan RS Gatoel Jl. Brawijaya', '2019-11-12', '2019-11-15', '2019-11-08 07:08:33', 700000, 'Selesai'),
(11, 'TRV-00011', 4, 2, 4, 'test offline', '2019-11-26', '2019-11-29', '2019-11-23 08:11:02', 850000, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Bus'),
(2, 'Elf'),
(3, 'Minibus');

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_kendaraan` varchar(255) NOT NULL,
  `warna_kendaraan` varchar(255) NOT NULL,
  `plat_kendaraan` varchar(255) NOT NULL,
  `jumlah_penumpang_kendaraan` int(11) NOT NULL,
  `harga_kendaraan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `id_kategori`, `nama_kendaraan`, `warna_kendaraan`, `plat_kendaraan`, `jumlah_penumpang_kendaraan`, `harga_kendaraan`) VALUES
(4, 3, 'Kijang Inova', 'Hitam', 'S 1956 SE', 8, 250000),
(5, 3, 'Avanza Veloz', 'Silver', 'S 3345 ER', 6, 200000),
(6, 2, 'Isuzu Elf 1', 'Silver', 'S 44543 SF', 25, 500000),
(7, 3, 'Kijang Inova', 'Putih', 'S 5657 QW', 8, 250000),
(8, 1, 'Bus 1', 'Merah', 'S 4545 LK', 50, 1500000);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(255) NOT NULL,
  `harga_kota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`, `harga_kota`) VALUES
(1, 'Surabaya', 100000),
(2, 'Malang', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tipe_notifikasi` varchar(255) NOT NULL,
  `desk_notifikasi` varchar(255) NOT NULL,
  `tgl_notifikasi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_notifikasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_user`, `tipe_notifikasi`, `desk_notifikasi`, `tgl_notifikasi`, `status_notifikasi`) VALUES
(1, 1, 'Booking', 'Ada Booking baru dengan kode \'TRV-00001\'', '2019-11-06 13:08:29', 'Tidak Aktif'),
(2, 3, 'Booking', 'Booking anda dengan kode \'TRV-00001\' telah Dibatalkan.', '2019-11-06 13:10:57', 'Tidak Aktif'),
(3, 1, 'Booking', 'Ada Booking baru dengan kode \'TRV-00002\'', '2019-11-06 13:31:22', 'Tidak Aktif'),
(4, 1, 'Booking', 'Ada Booking baru dengan kode \'Menunggu Konfirmasi\'', '2019-11-06 14:30:35', 'Aktif'),
(5, 1, 'Booking', 'Ada Booking baru dengan kode \'Menunggu Konfirmasi\'', '2019-11-06 14:31:10', 'Tidak Aktif'),
(6, 1, 'Pembayaran', 'Ada Pembayaran baru dengan kode \'BYR-00001\'', '2019-11-06 14:31:10', 'Tidak Aktif'),
(7, 1, 'Booking', 'Ada Booking baru dengan kode \'TRV-00003\'', '2019-11-06 15:08:04', 'Tidak Aktif'),
(8, 1, 'Booking', 'Ada Booking baru dengan kode \'TRV-00004\'', '2019-11-06 15:16:59', 'Tidak Aktif'),
(9, 1, 'Booking', 'Ada Booking baru dengan kode \'TRV-00005\'', '2019-11-07 00:24:03', 'Tidak Aktif'),
(10, 1, 'Booking', 'Ada Booking baru dengan kode \'Menunggu Konfirmasi\'', '2019-11-07 00:24:25', 'Tidak Aktif'),
(11, 1, 'Pembayaran', 'Ada Pembayaran baru dengan kode \'BYR-00002\'', '2019-11-07 00:24:25', 'Tidak Aktif'),
(12, 1, 'Booking', 'Ada Booking baru dengan kode \'TRV-00006\'', '2019-11-07 01:29:58', 'Tidak Aktif'),
(13, 2, 'Booking', 'Booking anda dengan kode \'TRV-00006\' telah Dibatalkan.', '2019-11-07 01:30:36', 'Tidak Aktif'),
(14, 1, 'Booking', 'Ada Booking baru dengan kode \'TRV-00007\'', '2019-11-08 06:37:03', 'Aktif'),
(15, 1, 'Booking', 'Ada Booking baru dengan kode \'TRV-00008\'', '2019-11-08 06:44:48', 'Aktif'),
(16, 1, 'Booking', 'Ada Booking baru dengan kode \'TRV-00009\'', '2019-11-08 06:45:10', 'Aktif'),
(17, 1, 'Booking', 'Ada Booking baru dengan kode \'TRV-00010\'', '2019-11-08 07:08:33', 'Aktif'),
(18, 1, 'Booking', 'Ada Booking baru dengan kode \'Menunggu Konfirmasi\'', '2019-11-08 07:10:15', 'Aktif'),
(19, 1, 'Pembayaran', 'Ada Pembayaran baru dengan kode \'BYR-00003\'', '2019-11-08 07:10:15', 'Tidak Aktif'),
(20, 3, 'Booking', 'Booking anda dengan kode \'TRV-00010\' telah Selesai.', '2019-11-08 07:12:00', 'Aktif'),
(21, 3, 'Pembayaran', 'Pembayaran anda dengan kode \'BYR-00003\' telah Diterima.', '2019-11-08 07:12:00', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_pembayaran` varchar(255) NOT NULL,
  `no_rek_user` varchar(255) NOT NULL,
  `nama_rek_user` varchar(255) NOT NULL,
  `nominal_pembayaran` int(11) NOT NULL,
  `tgl_pembayaran` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_pembayaran` varchar(255) NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_jadwal`, `id_user`, `kode_pembayaran`, `no_rek_user`, `nama_rek_user`, `nominal_pembayaran`, `tgl_pembayaran`, `status_pembayaran`, `bukti_pembayaran`) VALUES
(1, 2, 3, 'BYR-00001', '23324422', 'wahyu', 500000, '2019-11-06 14:31:10', 'Menunggu Konfirmasi', 'BYR-00001.png'),
(2, 5, 2, 'BYR-00002', '2432', 'nrk', 60000, '2019-11-07 00:24:25', 'Menunggu Konfirmasi', 'BYR-00002.png'),
(3, 10, 3, 'BYR-00003', '43534763234', 'Wahydie Edogawa', 500000, '2019-11-08 07:10:15', 'Diterima', 'BYR-00003.jpg'),
(4, 11, 4, 'BYR-00004', 'Offline', 'Offline', 850000, '2019-11-23 08:11:02', 'Diterima', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `username_user` varchar(255) DEFAULT NULL,
  `alamat_user` varchar(255) NOT NULL,
  `telp_user` varchar(25) NOT NULL,
  `foto_user` varchar(25) NOT NULL DEFAULT 'default.jpg',
  `email_user` varchar(255) DEFAULT NULL,
  `pass_user` varchar(255) DEFAULT NULL,
  `is_admin` varchar(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username_user`, `alamat_user`, `telp_user`, `foto_user`, `email_user`, `pass_user`, `is_admin`, `created_at`) VALUES
(1, 'admin', 'admin', '-', '0', 'default.jpg', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 'yes', '2019-10-23 11:22:45'),
(2, 'Nizarr', 'nizarrk', 'Malang', '098767786', '2.png', 'nizarkusworo@gmail.com', '22530df4713d6c0ac2630b5971c4fc2d', NULL, '2019-10-23 13:16:48'),
(3, 'wahyudie', 'wahyu', 'bangil', '9798956', '3.png', 'wahyu@yahao.com', '25d55ad283aa400af464c76d713c07ad', NULL, '2019-11-06 13:00:01'),
(4, 'test offline', NULL, 'test offline', '12345678', 'default.jpg', NULL, NULL, NULL, '2019-11-23 08:11:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `id_asal_kota` (`id_kota`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `jadwal_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD CONSTRAINT `kendaraan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `pembayaran_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
