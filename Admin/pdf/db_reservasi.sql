-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Apr 2021 pada 05.17
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reservasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `password`, `level`) VALUES
(1, 'admin@gmail.com', 'a43bf14dfc05f9f704687b7b8d1cc7b7abee2182', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `edit`
--

CREATE TABLE `edit` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url_email` varchar(255) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `url_alamat` varchar(255) NOT NULL,
  `url_ig` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `edit`
--

INSERT INTO `edit` (`id`, `email`, `url_email`, `no_telepon`, `alamat`, `url_alamat`, `url_ig`) VALUES
(1, 'inovindo@gmail.com', '#', '083195210808', 'Komplek Buana Citra Ciwastra C, Jl. Batusari No.27, Buahbatu, Kec. Bojongsoang, Bandung, Jawa Barat 40287', 'https://cutt.ly/ucJ5Xqq', 'https://www.instagram.com/motivatorbisnis/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `edit_gambar`
--

CREATE TABLE `edit_gambar` (
  `id` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `edit_gambar`
--

INSERT INTO `edit_gambar` (`id`, `file`, `judul`, `tempat`) VALUES
(45, 'image01.jpg', 'Seminar Nasional Kewirausahaan \"Revolusi Industri 4.0\"', 'Bandung Creative Hub'),
(46, 'image02.jpg', 'Seminar', 'Hotel Fox Harris'),
(47, 'image03.jpg', 'Seminar Bisnis', 'Politeknik Negeri Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form`
--

CREATE TABLE `form` (
  `id_form` int(11) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `nama_pj` varchar(70) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `rentang_usia` varchar(5) NOT NULL,
  `jumlah_audiens` int(5) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `nama_pj` varchar(255) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `rentang_usia` varchar(5) NOT NULL,
  `jumlah_audiens` int(5) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `terkonfirmasi`
--

CREATE TABLE `terkonfirmasi` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `nama_pj` varchar(255) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `rentang_usia` varchar(10) NOT NULL,
  `jumlah_audiens` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `terkonfirmasi`
--

INSERT INTO `terkonfirmasi` (`id`, `nama_instansi`, `nama_pj`, `no_telepon`, `email`, `title`, `tema`, `start_event`, `end_event`, `rentang_usia`, `jumlah_audiens`, `file`) VALUES
(43, 'PT Nasa Jaya', 'Budi Fasola', '6285156201810', 'admin@gmail.com', 'jhkeuhku', 'jhkhkuhi', '2021-04-24 00:00:00', '2021-04-25 00:00:00', '0-99', 788, 'Materi Warta.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tertolak`
--

CREATE TABLE `tertolak` (
  `id` int(11) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `nama_pj` varchar(255) NOT NULL,
  `nama_event` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `rentang_usia` varchar(255) NOT NULL,
  `jumlah_audiens` int(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `edit`
--
ALTER TABLE `edit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `edit_gambar`
--
ALTER TABLE `edit_gambar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id_form`);

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `terkonfirmasi`
--
ALTER TABLE `terkonfirmasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tertolak`
--
ALTER TABLE `tertolak`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `edit`
--
ALTER TABLE `edit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `edit_gambar`
--
ALTER TABLE `edit_gambar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `form`
--
ALTER TABLE `form`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `terkonfirmasi`
--
ALTER TABLE `terkonfirmasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `tertolak`
--
ALTER TABLE `tertolak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
