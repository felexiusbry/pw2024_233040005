-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Jun 2024 pada 14.24
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `playshow2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `film`
--

CREATE TABLE `film` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL,
  `durasi` int NOT NULL,
  `rating` float NOT NULL,
  `kualitas` varchar(50) NOT NULL,
  `resolusi` varchar(50) NOT NULL,
  `kategori_id` int DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `film`
--

INSERT INTO `film` (`id`, `judul`, `durasi`, `rating`, `kualitas`, `resolusi`, `kategori_id`, `gambar`) VALUES
(14, 'Ultraman', 150, 8, 'HD', '1080P', 1, 'DbpUbTV6kKfIwTsbbIHl.jpg'),
(15, 'Kings Man', 120, 9, 'HD', '1080P', 2, 'MyTeJPsMN8ZV7wc0Knm7.png'),
(16, 'Free Guy', 135, 9, 'HD', '1080P', 3, '8Kxqrw8IjsryEQjQWf7G.png'),
(17, 'Money Heist', 120, 9, 'FHD', '1080P', 1, 'oAw1v7IDJr9GxpGycJyJ.png'),
(18, 'Moon Knight', 95, 9, 'FHD', '1080P', 1, '7wyqwzkWXaMPt3BKrTmf.png'),
(19, 'Memory', 119, 9, 'FHD', '1080P', 2, 'fMfdoLv1jjXdwYt3OJ8j.png'),
(20, 'Batman', 135, 8, 'FHD', '1080P', 1, 'po4TNRhHIiid07txbjdI.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `judul` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `judul`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Drama'),
(5, 'Horror'),
(6, 'Romance'),
(7, 'Sci-Fi'),
(8, 'Thriller'),
(9, 'Fantasy'),
(10, 'Animation');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'adminpass'),
(2, 'User1', 'user1pass'),
(3, 'User2', 'user2pass'),
(4, 'df', '$2y$10$yQwu4YfDj709dxSddxMO6O7cg1pFmXFawA6vpUmq22ZKcI3b2G.WW'),
(5, '', '$2y$10$YXAk9wVGtHkkqXdz1Fjs9.Fxt5InBxVNEjLXtBb9uCpBLEDaXQPAu'),
(6, 'user', '$2y$10$QI7BnvdPOi9eIwO/8cAYgu5bQB8f38TeOyjTs95riBBIhYp8yRJgG'),
(7, 'a', '$2y$10$X8O5axXQS1KCPWcqP6rCwOsomG.6abmpy7KNSI3355l8ZHujkx63S'),
(8, 'b', '$2y$10$wgYjXi1Uvu7kCEL1WEKn1.dDFEK3pdz52i..jqed6tbezkz9xThGa'),
(9, 'c', '$2y$10$gM5uL29qi7/cgmyO3bU6Hu4iCRRzVASxo28TbDGq6znJADpL6bY..'),
(10, 'd', '$2y$10$CglMSf7moIHFH.5iGyxJceJ9uOv0SU1u6EsbbKG53XMxHdKU8sXp2'),
(11, 'g', '$2y$10$mHWpVAzg38vqTUoKl8BZy.0i.LQhew2UosQyqrzcPsJzGZmLvfxcu'),
(12, 'h', '$2y$10$OY7qGFNmWDbKf6AaqAWUwuz/EugyDoOzZevItKSrC.IvtGyUMiFBK'),
(13, 'k', '$2y$10$LYLwy3y.xJprFFft4Zuwpes/j.movRTLbmmNTUyvbLJElUal.fWEW'),
(14, 'm', '$2y$10$HnxdaQkuFBH1VZONYB26Vuuc2KR80gao.1fAYnnUt.yj76MVcELvm'),
(15, 'p', '$2y$10$DFSDQbijZ2przruy7LFi.OLFsCEzzj2.7J9zILsLQpymy3wZbvvuO'),
(16, 'ddd', '$2y$10$YEX/Y6PqyZxIJl8RpyWyRe0..84dxfyrgGELQEIY8kBbiXWR9F6HW');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `film`
--
ALTER TABLE `film`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
