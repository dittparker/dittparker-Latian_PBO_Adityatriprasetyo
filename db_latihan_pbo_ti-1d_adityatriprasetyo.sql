-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2026 at 07:20 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti-1d_adityatriprasetyo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_tiket`
--

CREATE TABLE `tabel_tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(255) NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` int NOT NULL,
  `jenis_studio` enum('reguler','IMAX','Velvet') NOT NULL,
  `tipe_audio` varchar(50) DEFAULT NULL,
  `lokasi_baris` varchar(10) DEFAULT NULL,
  `kacamata_3d_id` varchar(50) DEFAULT NULL,
  `efek_gerak_fitur` varchar(100) DEFAULT NULL,
  `bantal_selimut_pack` varchar(50) DEFAULT NULL,
  `layanan_butler` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_tiket`
--

INSERT INTO `tabel_tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(1, 'Keluarga Cemara Indah', '2026-06-12 13:00:00', 50, 35000, 'reguler', 'Dolby 5.1', 'Row E', NULL, NULL, NULL, NULL),
(2, 'Tawa di Balik Jendela', '2026-06-12 15:30:00', 45, 35000, 'reguler', 'Dolby 5.1', 'Row F', NULL, NULL, NULL, NULL),
(3, 'Cinta di Akhir Pekan', '2026-06-12 18:00:00', 60, 40000, 'reguler', 'Standard Stereo', 'Row G', NULL, NULL, NULL, NULL),
(4, 'Misteri Rumah Tua', '2026-06-13 19:30:00', 40, 40000, 'reguler', 'Dolby 5.1', 'Row D', NULL, NULL, NULL, NULL),
(5, 'Komika Pencari Bakat', '2026-06-13 21:45:00', 55, 40000, 'reguler', 'Standard Stereo', 'Row H', NULL, NULL, NULL, NULL),
(6, 'Jejak Sang Petualang', '2026-06-14 10:30:00', 30, 35000, 'reguler', 'Dolby 5.1', 'Row C', NULL, NULL, NULL, NULL),
(7, 'Petualangan di Ruang Hampa', '2026-06-12 14:00:00', 120, 60000, 'IMAX', 'Dolby Atmos IMAX', 'Row A', '3D-GLS-001', 'Standard Vibrating', NULL, NULL),
(8, 'Penjelajah Waktu 2050', '2026-06-12 17:15:00', 110, 60000, 'IMAX', 'Dolby Atmos IMAX', 'Row B', '3D-GLS-002', 'Standard Vibrating', NULL, NULL),
(9, 'Operasi Senyap', '2026-06-12 20:30:00', 130, 75000, 'IMAX', 'DTS-X IMAX', 'Row C', NULL, 'Intense Motion', NULL, NULL),
(10, 'Pelarian dari Labirin', '2026-06-13 13:30:00', 95, 60000, 'IMAX', 'Dolby Atmos IMAX', 'Row B', '3D-GLS-003', 'Standard Vibrating', NULL, NULL),
(11, 'Konspirasi Tingkat Tinggi', '2026-06-13 16:45:00', 105, 60000, 'IMAX', 'DTS-X IMAX', 'Row D', NULL, 'None', NULL, NULL),
(12, 'Petualangan di Ruang Hampa', '2026-06-14 14:00:00', 120, 75000, 'IMAX', 'Dolby Atmos IMAX', 'Row A', '3D-GLS-004', 'Standard Vibrating', NULL, NULL),
(13, 'Penjelajah Waktu 2050', '2026-06-14 19:00:00', 115, 75000, 'IMAX', 'Dolby Atmos IMAX', 'Row B', '3D-GLS-005', 'Standard Vibrating', NULL, NULL),
(14, 'Misteri Bisikan Malam', '2026-06-12 16:00:00', 20, 100000, 'Velvet', NULL, 'Suite 1', NULL, NULL, 'Sutra Premium Pack', 'Personal Butler - Adi'),
(15, 'Melodi Musim Gugur', '2026-06-12 19:00:00', 18, 120000, 'Velvet', NULL, 'Suite 2', NULL, NULL, 'Sutra Premium Pack', 'Personal Butler - Fawwaz'),
(16, 'Detektif Cilik dan Kasus Hilang', '2026-06-13 11:00:00', 22, 100000, 'Velvet', NULL, 'Suite 3', NULL, NULL, 'Standard Quilt Pack', 'Call-Button Service'),
(17, 'Cinta di Akhir Pekan', '2026-06-13 14:30:00', 20, 100000, 'Velvet', NULL, 'Suite 1', NULL, NULL, 'Standard Quilt Pack', 'Call-Button Service'),
(18, 'Misteri Bisikan Malam', '2026-06-13 20:00:00', 24, 120000, 'Velvet', NULL, 'Suite 4', NULL, NULL, 'Sutra Premium Pack', 'Personal Butler - Pandu'),
(19, 'Melodi Musim Gugur', '2026-06-14 15:00:00', 16, 120000, 'Velvet', NULL, 'Suite 2', NULL, NULL, 'Sutra Premium Pack', 'Personal Butler - Fawwaz'),
(20, 'Detektif Cilik dan Kasus Hilang', '2026-06-14 18:15:00', 20, 120000, 'Velvet', NULL, 'Suite 3', NULL, NULL, 'Standard Quilt Pack', 'Personal Butler - Adi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_tiket`
--
ALTER TABLE `tabel_tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
