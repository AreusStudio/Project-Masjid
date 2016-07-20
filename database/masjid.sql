-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2016 at 09:15 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `isAktif` int(1) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`, `nama`, `isAktif`) VALUES
(1, 'lisa', 'lisa', 'nicrolalisa13@gmail.com', 'lisadesy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(250) NOT NULL,
  `judul` varchar(30) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  PRIMARY KEY (`id_berita`),
  UNIQUE KEY `id_foto` (`foto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `foto`, `judul`, `tanggal`, `posted_by`, `isi_berita`) VALUES
(11, '1467444603.jpg', 'Judul Berita', '2016-07-02', 'Lisadesy', 'ini adalah berita pertama \r\n'),
(12, '1467445024.jpg', 'Judul Berita ke 2', '2016-07-02', 'Lisabella', 'Ini adalah berita ke 2 loh\r\n'),
(13, '1467943570.jpg', 'Judul Berita ke 3', '2016-07-02', 'paramita', 'Ini adalah deskripsi berita yang ke 3\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(250) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `posted_by` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `foto`, `judul`, `posted_by`, `deskripsi`) VALUES
(4, '1467941467.jpg', 'Judul Foto ke 1', 'Kristen Stewart', 'Ini deskripsi foto k\r\n'),
(5, '1467952268.jpg', 'Judul Foto 3', 'Indah Kumala', '<span style="font-family: &quot;Times New Roman&quot;,&quot;serif&quot;; font-size: 12pt; line-height: 115%">Ok jika sudah kalian siapkan\r\nmaka kita sekarang akan membuat databasenya terlebih dahulu buka phpmyadmin\r\nkalian lalu buatlah database dengan nama <strong>:\r\npagination</strong></span>\r\n'),
(6, '1467952296.jpg', 'Judul ke 3', 'Faris', 'tes\r\n'),
(7, '1467952332.jpg', 'Judul ke 4', 'Beyam', 'jhfjhdjhaj\r\n'),
(8, '1467952364.jpg', 'judul ke 5', 'Taylor', 'hsjkhjsfakjakldjfslkjfsa\r\n'),
(9, '1467952518.jpg', 'Judul Ke 6', 'paramita', 'jdajhjhsajkhajkhjdsa\r\n'),
(10, '1467952585.jpg', 'Judul ke 7', 'paramita', 'jdhjfhasdjhdsjakhjsah\r\n'),
(11, '1467952699.jpg', 'Judul ke 8', 'Hari', 'kdkajkjdkjaskljkaldj\r\n'),
(12, '1467952729.jpg', 'judul ke 9', 'Selena', ',dhfsjadjasjkhf\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kegiatan`
--

CREATE TABLE IF NOT EXISTS `jadwal_kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` text NOT NULL,
  `tanggal_kegiatan` varchar(100) NOT NULL,
  `waktu` text NOT NULL,
  PRIMARY KEY (`id_kegiatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jadwal_kegiatan`
--

INSERT INTO `jadwal_kegiatan` (`id_kegiatan`, `nama_kegiatan`, `tanggal_kegiatan`, `waktu`) VALUES
(1, 'Tadarusan', '2016-07-22', '10.00 - 12.30'),
(2, 'Ceramah', '2016-07-29', '12.00 - 13.00'),
(3, 'Muhasabah', '2016-07-04', '10.00 - 12.00'),
(4, 'Buka Bersama', '2016-08-04', '18.00 - 18.30'),
(5, 'Tarawih', '2016-07-03', '19.30 - 20.40');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_jadwal`
--

CREATE TABLE IF NOT EXISTS `jenis_jadwal` (
  `id_jenisjadwal` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_jadwal` varchar(200) NOT NULL,
  PRIMARY KEY (`id_jenisjadwal`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `jenis_jadwal`
--

INSERT INTO `jenis_jadwal` (`id_jenisjadwal`, `kategori_jadwal`) VALUES
(1, 'Jadwal Bulanan'),
(2, 'Jadwal Harian');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_kegiatan` varchar(200) NOT NULL,
  `file_kegiatan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kegiatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `Nama_kegiatan`, `file_kegiatan`) VALUES
(4, 'Laporan Kegiatan Pertama 1', '1467944105.pdf'),
(5, 'Laporan Kegiatan Kedua 2', '1467944197.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `kepengurusan`
--

CREATE TABLE IF NOT EXISTS `kepengurusan` (
  `id_pengurus` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(250) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_pengurus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kepengurusan`
--

INSERT INTO `kepengurusan` (`id_pengurus`, `foto`, `nama`, `deskripsi`) VALUES
(3, '1467448813.jpg', 'Diego Michael', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.<br />\r\n'),
(4, '1467447777.jpg', 'Michael Wilson', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste saepe et quisquam nesciunt maxime.<br />\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE IF NOT EXISTS `keuangan` (
  `id_keuangan` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_keuangan` varchar(100) NOT NULL,
  `file_keuangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_keuangan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `Nama_keuangan`, `file_keuangan`) VALUES
(4, 'Laporan Keuangan Pertama', '1467944359.pdf'),
(5, 'Laporan Keuangan Kedua', '1467944080.pdf'),
(6, 'Laporan Keuangan Ketiga', '1467944169.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `majelis`
--

CREATE TABLE IF NOT EXISTS `majelis` (
  `id_majelis` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_majelis`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `majelis`
--

INSERT INTO `majelis` (`id_majelis`, `foto`, `deskripsi`) VALUES
(1, '1467449916.jpg', '<p>\r\nMasjid Jami Baitul Muttaqin&nbsp; Salah satu agenda pengajian yang bisa diikuti adalah pengajian yang digelar Masjid Jami&#39; Baitul Muttaqin Rahtawu, Kecamatan Gebog\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\n&nbsp;\r\n</p>\r\n<p>\r\nWebsite Masjid \r\n</p>\r\n'),
(2, '1467449998.jpg', 'Masjid Jami Baitul Muttaqin&nbsp; Salah satu agenda pengajian yang bisa diikuti adalah pengajian yang digelar Masjid Jami&#39; Baitul Muttaqin Rahtawu, Kecamatan Gebog\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id_slide` int(11) NOT NULL AUTO_INCREMENT,
  `foto` varchar(250) NOT NULL,
  `posted_by` varchar(200) NOT NULL,
  PRIMARY KEY (`id_slide`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id_slide`, `foto`, `posted_by`) VALUES
(11, '1467941745.jpg', 'Paramita'),
(12, '1467941712.jpg', 'Indah Kumala'),
(13, '1467941790.jpg', 'Faris');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE IF NOT EXISTS `tb_contact` (
  `id_contact` int(11) NOT NULL AUTO_INCREMENT,
  `lokasi` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`id_contact`, `lokasi`, `telp`) VALUES
(2, 'Jl. Citanduy Raya no.190', '082183736352'),
(3, 'Jl. Cimanuk 7 no.190', '087865325444'),
(4, 'Jl. Kebahagiaan Raya', '081278765434');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) NOT NULL,
  `url_video` varchar(50) NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `judul`, `url_video`) VALUES
(1, 'Video db', 'https://www.youtube.com/embed/wncv4E_bMUc'),
(2, 'Judul Video', 'http://youtube.com/'),
(3, 'Judul Video', 'http://youtube.com/runningman');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
