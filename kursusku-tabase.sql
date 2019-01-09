-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 10:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursus`
--

-- --------------------------------------------------------

--
-- Table structure for table `matpel`
--

CREATE TABLE `matpel` (
  `kode_mapel` varchar(5) NOT NULL,
  `nama_mapel` varchar(25) DEFAULT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `jam` varchar(5) DEFAULT NULL,
  `paket` varchar(1) DEFAULT NULL,
  `nomor_matpel` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matpel`
--

INSERT INTO `matpel` (`kode_mapel`, `nama_mapel`, `hari`, `jam`, `paket`, `nomor_matpel`) VALUES
('T01A', 'Bahasa Indonesia', 'Senin', '15:00', 'A', 5),
('T01B', 'Bahasa Indonesia', 'Selasa', '15:00', 'B', 11),
('T02A', 'Bahasa Inggris', 'Senin', '17:00', 'A', 6),
('T02B', 'Bahasa Inggris', 'Selasa', '17:00', 'B', 12),
('T03A', 'Matematika', 'Selasa', '15:00', 'A', 7),
('T03B', 'Matematika', 'Senin', '15:00', 'B', 13),
('T04A', 'Kimia', 'Selasa', '17:00', 'A', 8),
('T04B', 'Ekonomi', 'Senin', '17:00', 'B', 14),
('T05A', 'Fisika', 'Rabu', '15:00', 'A', 9),
('T05B', 'Sosiologi', 'Rabu', '15:00', 'B', 15),
('T06A', 'Biologi', 'Rabu', '17:00', 'A', 10),
('T06B', 'Geografi', 'Rabu', '17:00', 'B', 16);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `tgl_daftar` datetime DEFAULT NULL,
  `email_pengajar` varchar(30) NOT NULL,
  `nama_pengajar` varchar(30) NOT NULL,
  `password_pengajar` varchar(8) DEFAULT NULL,
  `jenis_kelamin_pengajar` varchar(1) DEFAULT NULL,
  `alamat_pengajar` text,
  `tgl_lahir_pengajar` date DEFAULT NULL,
  `no_telp_pengajar` varchar(13) DEFAULT NULL,
  `nama_mapel` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`tgl_daftar`, `email_pengajar`, `nama_pengajar`, `password_pengajar`, `jenis_kelamin_pengajar`, `alamat_pengajar`, `tgl_lahir_pengajar`, `no_telp_pengajar`, `nama_mapel`) VALUES
('2019-01-03 15:25:18', 'kdkchy@gmail.com', 'Pande Kadek Cahya Wisnu Murti', '123', 'L', 'Puri Kanoman, Sorowajan, Banguntapan', '2019-01-26', '081', 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `tgl_daftar` datetime DEFAULT NULL,
  `email_siswa` varchar(30) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `password_siswa` varchar(8) DEFAULT NULL,
  `jenis_kelamin_siswa` varchar(1) DEFAULT NULL,
  `alamat_siswa` text,
  `tgl_lahir_siswa` date DEFAULT NULL,
  `no_telp_siswa` varchar(13) DEFAULT NULL,
  `asal_sekolah` varchar(20) DEFAULT NULL,
  `nama_wali` varchar(30) DEFAULT NULL,
  `paket` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`tgl_daftar`, `email_siswa`, `nama_siswa`, `password_siswa`, `jenis_kelamin_siswa`, `alamat_siswa`, `tgl_lahir_siswa`, `no_telp_siswa`, `asal_sekolah`, `nama_wali`, `paket`) VALUES
('2019-01-03 20:11:01', 'agusdoang@gmail.com', 'Agus', '12345678', 'L', 'berbah', '1989-08-09', '0812345678', 'sma putusibau', 'aby', 'B'),
('2019-01-05 22:33:31', 'bima@prabawa.com', 'Bima Prabawa', '123', 'L', 'Sleman', '2019-01-01', '081', 'SMA Negeri 1 Badung', 'Kadek Cahya', 'A'),
('2019-01-03 19:37:04', 'dikdik@maulana.com', 'Dikdik Maulana', '123', 'P', 'Jalan Sarkem Janda Muda', '2019-01-01', '0981', 'SMA Negeri 1 Badung', 'Kadek Cahya', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matpel`
--
ALTER TABLE `matpel`
  ADD PRIMARY KEY (`kode_mapel`),
  ADD KEY `nomor_matpel` (`nomor_matpel`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`email_pengajar`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`email_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matpel`
--
ALTER TABLE `matpel`
  MODIFY `nomor_matpel` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
