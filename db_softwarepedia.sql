-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 06:26 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_softwarepedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama_admin` varchar(20) NOT NULL,
  `password_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `kategori_artikel` varchar(20) NOT NULL,
  `judul_artikel` varchar(50) NOT NULL,
  `isi_artikel` text NOT NULL,
  `tanggal_input` date NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `id_user`, `kategori_artikel`, `judul_artikel`, `isi_artikel`, `tanggal_input`, `gambar`, `status`) VALUES
(1, '2', 'windows', 'Buku Kas', '<p>Di zaman serba digital ini, pertumbuhan UMKM sebagai sektor penting yang menopang pertumbuhan ekonomi nasional dinilai belum optimal, sehingga dilakukan berbagai upaya oleh pemerintah dan pemangku kepentingan lainnya. Salah satu upayanya adalah mendorong para pelaku UMKM ini untuk bisa go online dengan memanfaatkan internet, termasuk penggunaan aplikasi digital, untuk mengembangkan bisnis mereka. Pandangan optimis dari banyak pihak meyakini bahwa produk-produk UMKM lokal bisa berjaya di pasar global. Tetapi, jumlah UMKM yang sudah go online saat ini masih relatif sedikit dibandingkan dengan jumlah keseluruhannya. Berdasarkan data terbaru dari Kementerian Komunikasi dan Informatika, dari total sekitar 60 juta UMKM yang ada di Indonesia, baru sekitar 9.4 juta UMKM yang sudah go online. Kementerian Koperasi dan UKM serta Kementerian Kominfo, telah menargetkan untuk meng-online-kan 8 juta UMKM sampai dengan tahun 2020 ini.</p>\r\n', '2021-05-29', '1728706815_IMG_0003 (2).JPG', 'verified'),
(2, '2', 'windows', 'TEST', '<p>qweqweqweqeq</p>\r\n', '2021-06-01', '1635762316_20180210_172528.jpg', 'verified'),
(7, '2', 'ios', 'TEST', 'asdasdasdddddasdasdasdasdasdasd', '2021-06-01', '', 'verified'),
(9, '2', 'windows', 'asdasdas', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour', '2021-06-01', '', 'verified'),
(11, '2', 'lainnya', 'sds', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', '2021-06-01', '', 'verified'),
(12, '2', 'windows', 'werwerwerwerwerewrw', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n', '2021-06-01', '', 'verified'),
(13, '2', 'android', 'TEST', '<p>asdasdasdasd</p>\r\n', '2021-06-01', NULL, 'pending'),
(14, '2', 'ios', 'asd', '<p>hjkhkjhljhlhjlhj</p>\r\n', '2021-06-01', '466147662_IMG_0003 (2).JPG', 'pending'),
(15, '2', 'android', 'asd', '<p>asdasdasdasd</p>\r\n', '2021-06-01', '2060024596_20180210_172528.jpg', 'verified'),
(16, '3', 'ios', 'fdgnm,', '<p><em>jhj</em></p>\r\n', '2021-06-01', '193590157_20180210_172528.jpg', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `id_rating` int(10) NOT NULL,
  `id_artikel` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`id_rating`, `id_artikel`, `id_user`, `rating`) VALUES
(6, '1', '1', '1'),
(7, '1', '2', '1'),
(8, '2', '2', '1'),
(9, '7', '2', '1'),
(10, '9', '2', '1'),
(11, '15', '2', '2'),
(12, '12', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `role`, `username`, `password`) VALUES
(1, 'ringg0@gmail.com', 'admin', 'ringgo', 'ringgo123'),
(2, 'sella@gmail.com', 'user', 'sella', 'sella123'),
(3, 'ringgoyanwr@gmail.com', 'user', 'ringgo11', 'ringgo123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id_rating` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
