-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2022 pada 11.18
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `crane`
--

CREATE TABLE `crane` (
  `id_crane` int(11) NOT NULL,
  `crane` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `crane`
--

INSERT INTO `crane` (`id_crane`, `crane`) VALUES
(1, 'A01'),
(2, 'A02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_part`
--

CREATE TABLE `data_part` (
  `id` int(10) NOT NULL,
  `kode_part` varchar(15) NOT NULL,
  `nama_part` varchar(100) NOT NULL,
  `lokasi` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_part` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `data_part`
--

INSERT INTO `data_part` (`id`, `kode_part`, `nama_part`, `lokasi`, `jumlah`, `status_part`) VALUES
(2, '123123', 'qweqw', '1', 1, 'wqe');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(10) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `divisi`) VALUES
(1, 'Mechanic Electrical'),
(2, 'Automation');

-- --------------------------------------------------------

--
-- Struktur dari tabel `grup`
--

CREATE TABLE `grup` (
  `id` int(10) NOT NULL,
  `grup` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `shift` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `grup`
--

INSERT INTO `grup` (`id`, `grup`, `tanggal`, `shift`) VALUES
(1, 'A', '2022-09-01', '1'),
(2, 'B', '2022-09-02', '2'),
(3, 'C', '2022-09-03', '3'),
(4, 'D', '2022-09-04', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gudang`
--

CREATE TABLE `gudang` (
  `id` int(10) NOT NULL,
  `crane` varchar(10) NOT NULL,
  `id_part` int(20) NOT NULL,
  `nama_part` varchar(50) NOT NULL,
  `keterangan_part` text NOT NULL,
  `id_grup` int(10) NOT NULL,
  `konfirmasi` varchar(20) NOT NULL,
  `keterangan_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Junior Technician'),
(2, 'Senior Technician');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `lokasi`) VALUES
(1, 'RAK A1'),
(2, 'RAK A2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mekanik`
--

CREATE TABLE `mekanik` (
  `id` int(10) NOT NULL,
  `id_part` int(10) NOT NULL,
  `nama_part` varchar(50) NOT NULL,
  `status` int(10) NOT NULL,
  `keterangan_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(10) NOT NULL,
  `id_part` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `id_crane` int(11) NOT NULL,
  `id_grup` int(10) NOT NULL,
  `id_users` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `riwayat`
--

INSERT INTO `riwayat` (`id`, `id_part`, `tanggal`, `tanggal_selesai`, `id_crane`, `id_grup`, `id_users`, `keterangan`, `status`) VALUES
(1, 2, '2022-09-01', '0000-00-00', 2, 2, 1, 'Trouble', 'Antrian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_jabatan` int(10) NOT NULL,
  `id_divisi` int(10) NOT NULL,
  `role` varchar(50) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `register_by` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nik`, `nama`, `id_jabatan`, `id_divisi`, `role`, `create_at`, `update_at`, `register_by`) VALUES
(1, 'Eko Aji', '81dc9bdb52d04dc20036dbd8313ed055', '1633423443234', 'Eko Aji', 1, 2, 'admin', '2022-09-14 14:25:39', '2022-11-04 03:25:24', NULL),
(5, 'uuuu', 'werwerwerewr', '1092340921830', 'Fajar', 1, 1, 'admin', '2022-11-04 03:56:07', '2022-11-04 03:56:07', ''),
(6, 'werweir', '0394oihjfewi908', '09238402348', 'Jarrr', 2, 2, 'admin', '2022-11-04 03:56:37', '2022-11-04 03:56:37', ''),
(7, 'ijok', '980u9ewcdo8', '023984', 'Ulin Nuha', 1, 2, 'admin', '2022-11-04 03:57:02', '2022-11-04 03:57:02', ''),
(8, 'test', '$2y$10$1/Lm6JhWLWouT1YwOf.d6OQmp1rJXgaVsY6pMqs34uR41xSWjJv9q', '0932i4023', 'faja', 1, 2, 'admin', '2022-11-04 04:28:55', '2022-11-04 04:28:55', ''),
(9, 'aaaaaaa', '$2y$10$DImf1Sr2cyZtFUSruJpj1eTqWN.6HsAO6hURqBMkW3raSC50e0FIG', '111', '111', 1, 1, '1', '2022-11-04 04:29:18', '2022-11-04 04:29:18', ''),
(10, '12345', '$2y$10$hHJSzvKyNEoaJR1dAckWGewq3U4gdVtTgD73oiJa0cMzUWUXj87xG', '12345', '12345', 1, 1, 'admin', '2022-11-04 11:34:16', '2022-11-04 11:34:16', ''),
(11, '1234', '1234', '1232131232133', '1234', 1, 1, '1', '2022-11-23 02:31:25', '2022-11-23 02:31:25', ''),
(12, '111111', '11', '16332432143211', 'Ulin Nuha1', 2, 2, '1', '2022-11-23 02:42:25', '2022-11-23 02:42:56', NULL),
(13, 'asdsadasd', '$2y$10$B8FBVV64lYSWmxPvMy92teLmuP0EGJQg9Rr.v4PMPwgDlxfWSCfA.', '16332432143212', 'asdasdsad', 2, 2, '1', '2022-11-23 04:47:01', '2022-11-23 04:47:01', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `crane`
--
ALTER TABLE `crane`
  ADD PRIMARY KEY (`id_crane`);

--
-- Indeks untuk tabel `data_part`
--
ALTER TABLE `data_part`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indeks untuk tabel `grup`
--
ALTER TABLE `grup`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_crane` (`crane`),
  ADD KEY `id_part` (`id_part`),
  ADD KEY `id_grup` (`id_grup`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_part` (`id_part`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_part` (`id_part`),
  ADD KEY `id_crane` (`id_crane`),
  ADD KEY `id_grup` (`id_grup`),
  ADD KEY `user` (`id_users`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `crane`
--
ALTER TABLE `crane`
  MODIFY `id_crane` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `data_part`
--
ALTER TABLE `data_part`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `grup`
--
ALTER TABLE `grup`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `gudang`
--
ALTER TABLE `gudang`
  ADD CONSTRAINT `gudang_ibfk_1` FOREIGN KEY (`id_grup`) REFERENCES `grup` (`id`);

--
-- Ketidakleluasaan untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_3` FOREIGN KEY (`id_crane`) REFERENCES `crane` (`id_crane`),
  ADD CONSTRAINT `riwayat_ibfk_6` FOREIGN KEY (`id_grup`) REFERENCES `grup` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
