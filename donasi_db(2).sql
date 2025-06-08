-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2025 at 11:31 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donasi_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `donasi_kampanye`
--

CREATE TABLE `donasi_kampanye` (
  `id` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi_singkat` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `target_donasi` bigint NOT NULL,
  `terkumpul` decimal(10,2) DEFAULT NULL,
  `deadline` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `dibuat_pada` datetime DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donasi_kampanye`
--

INSERT INTO `donasi_kampanye` (`id`, `judul`, `deskripsi_singkat`, `deskripsi`, `target_donasi`, `terkumpul`, `deadline`, `gambar`, `dibuat_pada`, `kategori`) VALUES
(1, 'Bantu Korban Banjir Jakarta', 'Penggalangan dana untuk membantu korban banjir di Jakarta dengan menyediakan makanan, pakaian, dan tempat tinggal sementara.', 'Banjir besar melanda beberapa wilayah Jakarta pada awal April 2025, menyebabkan ribuan keluarga kehilangan tempat tinggal dan akses terhadap kebutuhan dasar. Dana yang terkumpul akan digunakan untuk: \r\n1. Paket sembako untuk 1000 keluarga\r\n2. Perlengkapan kebersihan dan kesehatan\r\n3. Bantuan sewa tempat tinggal sementara\r\n4. Perbaikan rumah-rumah yang rusak\r\n5. Program pemulihan psikologis untuk anak-anak ', 50000000, '5000000.00', '2025-05-30', 'banjir.jpg', '2025-04-20 10:00:00', 'sosial'),
(2, 'Pembangunan Sekolah di Pedesaan', 'Membangun sekolah dasar di daerah terpencil untuk memberikan akses pendidikan yang layak bagi anak-anak.', 'Proyek ini bertujuan membangun sekolah dasar dengan 6 ruang kelas di Desa Terpencil, Kabupaten Sumba Barat Daya. Fasilitas yang akan dibangun:\r\n1. Bangunan sekolah permanen\r\n2. Perpustakaan mini\r\n3. Fasilitas sanitasi (toilet dan wastafel)\r\n4. Lapangan bermain\r\n5. Perlengkapan belajar (meja, kursi, papan tulis)\r\nSekolah ini akan melayani 120 anak dari 3 dusun terdekat yang saat ini harus berjalan 5-7 km ke sekolah terdekat.', 75000000, '500000.00', '2025-06-15', 'sekolah.jpg', '2025-04-18 14:30:00', 'pendidikan'),
(3, 'Bantuan Medis untuk Lansia', 'Menyediakan layanan kesehatan gratis dan obat-obatan untuk lansia yang tidak mampu.', 'Program ini menyediakan layanan kesehatan komprehensif untuk lansia tidak mampu di 5 kabupaten:\r\n1. Pemeriksaan kesehatan gratis bulanan\r\n2. Penyediaan obat-obatan dasar\r\n3. Kacamata baca dan alat bantu dengar\r\n4. Terapi fisik untuk lansia dengan mobilitas terbatas\r\n5. Pendampingan nutrisi dan pola hidup sehat\r\nTarget kami adalah membantu 500 lansia selama 6 bulan ke depan.', 30000000, '500000.00', '2025-05-20', 'lansia.jpg', '2025-04-15 09:15:00', 'sosial'),
(4, 'Penghijauan Kota', 'Program penanaman 1000 pohon di area perkotaan untuk mengurangi polusi udara.', 'Inisiatif penghijauan ini akan dilakukan di 5 titik utama kota dengan penanaman:\r\n1. 500 pohon peneduh (trembesi, angsana)\r\n2. 300 pohon buah (mangga, jambu)\r\n3. 200 tanaman hias (kembang sepatu, bougenville)\r\nSetiap pohon akan dilengkapi dengan:\r\n- Sistem penyiraman otomatis\r\n- Pemantauan pertumbuhan\r\n- Edukasi masyarakat sekitar\r\nKami juga akan melibatkan 200 relawan dan siswa sekolah dalam program ini.', 25000000, '500000.00', '2025-07-10', 'penghijauan.jpg', '2025-04-10 11:45:00', 'lingkungan'),
(5, 'Bantuan Hewan Terlantar', 'Menyelamatkan dan merawat hewan-hewan terlantar di jalanan.', 'Program ini fokus pada:\r\n1. Rescue hewan terlantar (kucing, anjing) di area perkotaan\r\n2. Sterilisasi dan vaksinasi\r\n3. Perawatan medis untuk hewan sakit/luka\r\n4. Program adopsi bertanggung jawab\r\n5. Penyediaan shelter sementara dengan kapasitas 50 hewan\r\nDana akan digunakan untuk:\r\n- Biaya operasional klinik mobile\r\n- Makanan dan obat-obatan\r\n- Pembangunan kandang yang layak\r\n- Edukasi masyarakat tentang kesejahteraan hewan', 15000000, '500000.00', '2025-05-05', 'hewan.jpg', '2025-04-05 16:20:00', NULL),
(6, 'Donasi Kucing', 'Donasi untuk kucing jalanan', 'Program khusus untuk kucing jalanan dengan kegiatan:\r\n1. Sterilisasi massal 100 kucing\r\n2. Vaksinasi rabies dan penyakit umum\r\n3. Pengobatan kucing sakit\r\n4. Penyediaan tempat makan/minum umum di 10 titik\r\n5. Program foster care untuk kucing yang membutuhkan perawatan khusus\r\nSetiap donatur akan mendapatkan laporan bulanan tentang penggunaan dana dan perkembangan kucing yang ditangani.', 1000000, '500000.00', '2025-10-10', '1745508790_d6ce12d789e8e80cda4a.jpg', '2025-04-24 00:00:00', 'sosial');

-- --------------------------------------------------------

--
-- Table structure for table `donasi_transaksi`
--

CREATE TABLE `donasi_transaksi` (
  `id` int NOT NULL,
  `kampanye_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `nominal` bigint NOT NULL,
  `pesan` text,
  `dibuat_pada` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donasi_transaksi`
--

INSERT INTO `donasi_transaksi` (`id`, `kampanye_id`, `user_id`, `nominal`, `pesan`, `dibuat_pada`) VALUES
(1, 1, 2, 500000, 'Semoga bermanfaat untuk korban banjir', '2025-04-21 01:30:00'),
(2, 1, 3, 750000, 'Semoga cepat pulih ya', '2025-04-21 03:15:00'),
(3, 2, 4, 1000000, 'Pendidikan adalah hak semua anak', '2025-04-19 07:00:00'),
(4, 3, 5, 300000, 'Semoga lansia bisa lebih sehat', '2025-04-16 04:20:00'),
(5, 5, 2, 250000, 'Sayangi hewan-hewan terlantar', '2025-04-06 02:45:00'),
(6, 2, 2, 1000000, 'semoga membantu', NULL),
(7, 2, 2, 1000000, 'Semoga membantu!', '2025-06-04 00:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`, `foto`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin123', 'admin', 'user.jpg'),
(2, 'Arifin', 'arifin@gmail.com', 'arifin123', 'user', '1748770615_696196adf0caad4af5fb.jpg'),
(3, 'Jane Smith', 'jane@example.com', 'jane123', 'user', 'user.jpg'),
(4, 'Michael Johnson', 'michael@example.com', 'michael123', 'user', 'user.jpg'),
(5, 'Sarah Williams wkwk', 'sarah@example.com', 'sarah123', 'user', 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donasi_kampanye`
--
ALTER TABLE `donasi_kampanye`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donasi_transaksi`
--
ALTER TABLE `donasi_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dt_dk` (`kampanye_id`),
  ADD KEY `fk_dt_users` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donasi_kampanye`
--
ALTER TABLE `donasi_kampanye`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donasi_transaksi`
--
ALTER TABLE `donasi_transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donasi_transaksi`
--
ALTER TABLE `donasi_transaksi`
  ADD CONSTRAINT `fk_dt_dk` FOREIGN KEY (`kampanye_id`) REFERENCES `donasi_kampanye` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_dt_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
