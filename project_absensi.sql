-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2016 at 11:51 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_absen`
--

CREATE TABLE IF NOT EXISTS `data_absen` (
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nid` varchar(25) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `kehadiran` enum('1','2','3','4') NOT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `data_absen`
--

INSERT INTO `data_absen` (`id_absen`, `nim`, `id_kelas`, `nid`, `kode_matkul`, `tanggal`, `jam_mulai`, `jam_akhir`, `kehadiran`) VALUES
(81, 1714010, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(80, 1714015, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(79, 1714007, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(78, 1714006, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(77, 1113024, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(76, 1714005, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(75, 1714012, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(74, 1714004, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(73, 1714009, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(72, 1714013, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(71, 1714011, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(70, 1714008, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(69, 1714014, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(68, 1714003, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(67, 1714002, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(66, 1714001, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(64, 1714015, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(65, 1714010, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(62, 1714006, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(63, 1714007, 2, '112233445566', 'ID-1015', '2015-01-12', '16:10:00', '17:10:00', '1'),
(82, 1714001, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(83, 1714002, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(84, 1714003, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(85, 1714014, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(86, 1714008, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(87, 1714011, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(88, 1714013, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(89, 1714009, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(90, 1714004, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(91, 1714012, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(92, 1714005, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1'),
(93, 1113024, 2, '112233445566', 'ID-1015', '2015-01-12', '17:10:00', '18:10:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE IF NOT EXISTS `data_admin` (
  `nip` int(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(75) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status_bagian` enum('BAAK','BAAU','Admin') NOT NULL,
  `foto` varchar(25) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_admin`
--

INSERT INTO `data_admin` (`nip`, `nama`, `jenis_kelamin`, `alamat`, `email`, `password`, `status_bagian`, `foto`) VALUES
(1, 'Yahya Fakhroji', 'Pria', 'Perum Sekar Asri G-11, Kota Pasuruan', 'mba.over@hotmail.com', 'dc5a9812b00db18ca5701f06349c6494', 'Admin', '1_Yahya Fakhroji.jpg'),
(11, 'Yudha', 'Pria', 'Pasuruan', 'yudha@gmail.com', 'd324b3289b5e602d42b9d1a4308241c4', 'BAAU', '11_Yudha.jpg'),
(18, 'Tata', 'Wanita', 'Purwosari', 'shasa_gita@yahoo.com', '49d02d55ad10973b7b9d0dc9eba7fdf0', 'BAAK', '18_Tata.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_dosen`
--

CREATE TABLE IF NOT EXISTS `data_dosen` (
  `nid` varchar(25) NOT NULL,
  `nama_dosen` varchar(75) NOT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_dosen`
--

INSERT INTO `data_dosen` (`nid`, `nama_dosen`) VALUES
('112233445566', 'Beni Krisbiantoro, MT'),
('13124535646', 'Siyamta, S.Pd, MT'),
('31245122', 'Betty');

-- --------------------------------------------------------

--
-- Table structure for table `data_dpp`
--

CREATE TABLE IF NOT EXISTS `data_dpp` (
  `id_dpp` int(11) NOT NULL AUTO_INCREMENT,
  `id_angkatan` varchar(5) NOT NULL,
  `gelombang` int(11) NOT NULL,
  `jumlah_dpp` int(25) NOT NULL,
  PRIMARY KEY (`id_dpp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `data_dpp`
--

INSERT INTO `data_dpp` (`id_dpp`, `id_angkatan`, `gelombang`, `jumlah_dpp`) VALUES
(5, '14', 2, 18000000),
(4, '14', 1, 17500000),
(6, '13', 1, 17500000);

-- --------------------------------------------------------

--
-- Table structure for table `data_jurusan`
--

CREATE TABLE IF NOT EXISTS `data_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jurusan`
--

INSERT INTO `data_jurusan` (`id_jurusan`, `jurusan`) VALUES
(11, 'Teknik Informatika'),
(12, 'Teknik Elektro'),
(13, 'Manajemen Teknik Informatika'),
(14, 'Teknik Komputer Jaringan'),
(15, 'Jeni'),
(17, 'Otomasi Industri');

-- --------------------------------------------------------

--
-- Table structure for table `data_kelas`
--

CREATE TABLE IF NOT EXISTS `data_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(15) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_kelas`
--

INSERT INTO `data_kelas` (`id_kelas`, `kelas`) VALUES
(1, 'TI 5.2'),
(2, 'OI 6.1');

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE IF NOT EXISTS `data_mahasiswa` (
  `nama` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` enum('Islam','Kristen','Katholik','Hindhu','Budha') NOT NULL,
  `asal_sma` varchar(100) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `tahun_lulus` year(4) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(25) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_angkatan` varchar(5) NOT NULL,
  `gelombang` int(11) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`nama`, `id_jurusan`, `nim`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `asal_sma`, `jurusan`, `tahun_lulus`, `alamat`, `kota`, `id_kelas`, `id_angkatan`, `gelombang`) VALUES
('Oktavian Setiawan', 17, 1714011, 'Pasuruan', '1995-10-14', 'L', 'Islam', 'SMKN 1 Singosari', 'Otomasi Industi', 2014, 'Jl. Dr. Soetomo Sukun Pandaan, Pasuruan, 67156', 'Pasuruan', 2, '14', 1),
('Reaching Dewo Saputra', 17, 1714009, 'Malang', '1995-10-15', 'L', 'Islam', 'SMKN 1 Singosari', 'Otomasi Industi', 2014, 'Dsn. Banu Rt. 10 Rw. 02 Banturejo Ngantang Malang', 'Malang', 2, '14', 1),
('Firman R. Widiastoko', 17, 1714010, 'Malang', '1996-02-20', 'L', 'Islam', 'SMK PGRI 3 Tlogomas', 'Elektronika Industri', 2014, 'Jl. Arumdalu 01/01 Songgokerto, Batu, 65315', 'Batu', 2, '14', 2),
('Syaffira Nomita Handiputri', 17, 1714012, 'Banda Aceh', '1996-07-16', 'P', 'Islam', 'SMA PGRI 1 Kota Mojokerto', 'IPA', 2014, 'Jl. Raya Surodinawan 128 Mojokerto, 61328', 'Mojokerto', 2, '14', 1),
('Nyoman Robi Setyawan', 17, 1714008, 'Malang', '1995-10-17', 'L', 'Islam', 'SMKN 8 Malang', 'Mekatronika', 2014, 'Perum. Tunjungtirto Semarak B49 Malang', 'Malang', 2, '14', 1),
('Aldila Aulia Fakhrul Syah', 17, 1714007, 'Malang', '1996-03-16', 'L', 'Islam', 'SMK Muhammadyah 1 Kepanjen', 'Teknik Otomasi Ind.', 2014, 'Jl. Sumedang No. 5 Rt. 04 Rw. 03 Kepanjen Malang', 'Malang', 2, '14', 1),
('Mohamad Pramadiansyah Bagus Purwito', 17, 1714001, 'Malang', '1996-08-22', 'L', 'Islam', 'SMKN 1 Singosari', 'Otomasi Industi', 2014, 'Jl. Perusahaan Tunjungtirto Ds. Mbodosari Rt. 03 Rw. 06 Malang', 'Malang', 2, '14', 1),
('Mohammad Jamaluddin', 17, 1714002, 'Pasir', '1996-10-02', 'L', 'Islam', 'SMKN 1 Balikpapan', 'Otomasi Industi', 2014, 'Ds. Sri Raharja Penajam, Pasir Utara', 'Pasir', 2, '14', 2),
('Muhammad Ilham Syafa''at', 17, 1714003, 'Malang', '1996-06-25', 'L', 'Islam', 'SMKN 8 Malang', 'Mekatronika', 2014, 'Jl. Mawar 1/120 Malang', 'Malang', 2, '14', 1),
('Rezkya', 17, 1714004, 'Bulu', '1995-12-18', 'P', 'Islam', 'SMKN 3 Berau', 'Teknik Otomasi Ind.', 2014, 'Tg. Batu Rt. 8 Bulalung Lestari Berau', 'Berau', 2, '14', 1),
('Titus Prakoso', 17, 1714005, 'Kediri', '1995-09-09', 'L', 'Kristen', 'SMKN 1 Kediri', 'Teknik Inst. TL', 2014, 'Jengkol, Plosokidul, Kab. Kediri', 'Kediri', 2, '14', 1),
('Aditya Amrullah Hakim', 17, 1714006, 'Surakarta', '1995-01-14', 'L', 'Islam', 'MAN 1 Bangil', 'IPA', 2013, 'Dsn. Sejo Gang Batavia No. 10 Pasuruan', 'Pasuruan', 2, '14', 2),
('Bagus Mahendra Widiananta', 17, 1714015, 'Malang', '1996-04-10', 'L', 'Islam', 'SMKN 8 Malang', 'Mekatronika', 2014, 'Jl. Bareng Raya 2N 550K Malang', 'Malang', 2, '14', 1),
('Nanang Aris Wahyudi', 17, 1714014, 'Gresik', '1996-11-19', 'L', 'Islam', 'SMK YPI Darussalam 1 Cerme', 'Teknik Permesinan', 2014, 'Karangan Cerme Gresik', 'Gresik', 2, '14', 2),
('Qurnantya Anggana Alif Sutrisno', 17, 1714013, 'Probolinggo', '1996-03-15', 'L', 'Islam', 'SMAN 1 Probolinggi', 'IPA', 2014, 'Jl. Damai No. 2 Kopian Ketapang Kademangan Probolinggo', 'Probolinggo', 2, '14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_matakuliah`
--

CREATE TABLE IF NOT EXISTS `data_matakuliah` (
  `kode_matkul` varchar(10) NOT NULL,
  `mata_kuliah` varchar(50) NOT NULL,
  `sks` tinyint(4) NOT NULL,
  PRIMARY KEY (`kode_matkul`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_matakuliah`
--

INSERT INTO `data_matakuliah` (`kode_matkul`, `mata_kuliah`, `sks`) VALUES
('ID-1010', 'Aljabar Linear & Matriks', 3),
('ID-1007', 'Kalkulus II', 3),
('ID-1015', 'Struktur Data', 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_pembayaran`
--

CREATE TABLE IF NOT EXISTS `data_pembayaran` (
  `no_transaksi` int(25) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nim` int(11) NOT NULL,
  `jenis_transaksi` varchar(25) NOT NULL,
  `status_pembayaran` enum('Beasiswa','Pribadi') NOT NULL,
  `cicilan_ke` int(11) NOT NULL,
  `jumlah_pembayaran` int(25) NOT NULL,
  `status` enum('Lunas','Belum') NOT NULL,
  `id_admin` int(25) NOT NULL,
  PRIMARY KEY (`no_transaksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pembayaran`
--

INSERT INTO `data_pembayaran` (`no_transaksi`, `tgl_transaksi`, `nim`, `jenis_transaksi`, `status_pembayaran`, `cicilan_ke`, `jumlah_pembayaran`, `status`, `id_admin`) VALUES
(11223344, '2014-12-23', 1113025, 'SPP', 'Beasiswa', 1, 210000, 'Belum', 11),
(123123123, '2014-12-29', 1114024, 'SPP', 'Beasiswa', 3, 3000000, 'Lunas', 11),
(2144132, '2014-12-29', 1114024, 'Wisuda', 'Beasiswa', 1, 30202193, 'Lunas', 11),
(12391273, '2014-12-30', 1113025, 'SPP', 'Beasiswa', 1, 3000000, 'Lunas', 11),
(2123121424, '2014-12-30', 1113026, 'SPP', 'Beasiswa', 1, 3000000, 'Lunas', 11);

-- --------------------------------------------------------

--
-- Table structure for table `data_spp_aal`
--

CREATE TABLE IF NOT EXISTS `data_spp_aal` (
  `id_spp` int(11) NOT NULL AUTO_INCREMENT,
  `id_angkatan` varchar(5) NOT NULL,
  `jumlah_aal` int(11) NOT NULL,
  `jumlah_spp` int(11) NOT NULL,
  PRIMARY KEY (`id_spp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `data_spp_aal`
--

INSERT INTO `data_spp_aal` (`id_spp`, `id_angkatan`, `jumlah_aal`, `jumlah_spp`) VALUES
(4, '14', 1500000, 3000000),
(2, '13', 1250000, 3000000),
(3, '12', 2000000, 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `dosen_matkul`
--

CREATE TABLE IF NOT EXISTS `dosen_matkul` (
  `id_dosen_matkul` int(11) NOT NULL AUTO_INCREMENT,
  `nid` varchar(25) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  PRIMARY KEY (`id_dosen_matkul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dosen_matkul`
--

INSERT INTO `dosen_matkul` (`id_dosen_matkul`, `nid`, `kode_matkul`) VALUES
(1, '112233445566', 'ID-1015'),
(4, '13124535646', 'ID-1007'),
(5, '112233445566', 'ID-1010'),
(6, '31245122', 'ID-1010');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_tambahan`
--

CREATE TABLE IF NOT EXISTS `kelas_tambahan` (
  `id_tambahan` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(11) NOT NULL,
  `kelas_asal` int(11) NOT NULL,
  `kelas_tambahan` int(11) NOT NULL,
  PRIMARY KEY (`id_tambahan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kelas_tambahan`
--

INSERT INTO `kelas_tambahan` (`id_tambahan`, `nim`, `kelas_asal`, `kelas_tambahan`) VALUES
(2, 1714001, 2, 1),
(3, 0, 0, 2147483647);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
