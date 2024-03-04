-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 04:43 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2021-04-novita`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('pustakawan','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `role`) VALUES
(18, 'Novita Septiani', 'mvi', 'mvi', 'admin'),
(19, 'Pipit Patimah', 'pipit', 'pipit', 'pustakawan');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `penulis_id` int(11) NOT NULL,
  `penerbit_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `tahun_terbit` year(4) NOT NULL,
  `sinopsis` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `foto_sampul` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `isbn`, `judul`, `penulis_id`, `penerbit_id`, `kategori_id`, `tahun_terbit`, `sinopsis`, `jumlah`, `foto_sampul`) VALUES
(7, '9786239067113', 'TABI', 1, 1, 2, '2001', 'Katanya manusia jatuh cinta tiga kali sepanjang hidupnya. Tabi dalam bahasa Jepang berarti perjalanan. Tabi sibuk penuhi ekspektasi raga lain selama hidupnya. Sampai tiba pada sebuah keraguan yang membuatnya memutuskan untuk memulai perjalanan sendirian ke Jepang, sesuai doa dalam namanya. Perjalanan yang membawanya menyusun ulang senang dan luka yang acak di memorinya. Membuat ia memutuskan untuk menulis perjalanan cinta yang hampir tidak pernah dibicarakan. Semua tersimpan jadi potongan-potongan pelajaran yang membawa Tabi ke dalam wahana yang tidak terduga.', 50, '001.png'),
(8, '9786026647979', 'PENAKLUK CAHAYA', 2, 2, 2, '2002', 'Selain kisah Dhaval, terdapat 25 cerita apik lainnya yang bisa kalian baca di buku ini. Kalian bisa berkenalan dengan para tokoh cerita yang unik dan istimewa. Ada Nia yang telinganya bisa menyala. Gilang, yang masih semangat berlari di tengah serangan sindrom Tourette. Juga Lea, begitu Piawai bermain piano dengan jarinya yang mengalami sindrom capit lobster Tokoh-tokoh lainnya dalam kumpulan cerita ini akan mengajakmu dalam petualangan rasa. Semuanya menyenangkan sampai tak sadar hatimu telah menghangat.', 48, '003.jpg'),
(9, '9786239877113', 'TENANG SAJA, NANTI JUGA TERLEWATI', 3, 3, 2, '2003', 'Luka akan sembuh, kecewa akan pulih, sakit hati akan terobati, derita berganti bahagia, dan segala musibah akan berubah menjadi hikmah dan anugerah. Seberat apa pun fase hidup yang sedang kita hadapi, tetaplah optimis dan yakin, tiada badai yang abadi dan tiada malam yang tak berganti pagi. Mungkin ada saat-saat kita merasa lelah dan ingin menyerah. Wajar, namanya juga manusia.', 50, '004.jpg'),
(10, '9786239877123', 'CAHAYA MENTARI PAGI', 4, 4, 2, '2006', 'Kunti yakin bahwa percintaannya dengan Hari akan berjalan mulus. Nyatanya, harus kandas di tengah jalan. Bahkan, Kunti terpaksa meninggalkan kuliahnya di fakultas kedokteran. Semua dilakukannya demi Hari, kekasih yang amat sangat dicintainya. Keduanya terpaksa menempuh hidup masing-masing, menikah dengan pasangan yang menjadi jodoh mereka. Namun, rupanya mereka sama-sama tak bahagia dalam ikatan itu. Kunti dikhianati suaminya saat ia tengah mengandung, sementara Hari “terjebak” menjadi suami dari perempuan yang obsesif dan menguasainya. Dengan membawa luka, Hari dan Kunti dipertemukan kembali oleh semesta. Mereka masih saling mencintai, tetapi keadaan sudah telanjur pelik. Mereka ragu apakah cinta itu dapat menjadi satu dalam pernikahan.', 50, '005.jpg'),
(11, '9986239877113', 'SILENT DEMON', 5, 5, 2, '2000', 'Novel ini diterbitkan pada bulan September 2021 oleh penerbit Elex Media Komputindo. Novel Silent Demon mengangkat tentang penyelidikan kasus pembunuhan yang dilakukan oleh seorang detektif bernama Sugi. Detektif Sugi tidak mengira sama sekali kalau pembunuhan seorang wanita bule di stasiun MRT Jakarta mengarah kepada situasi yang sangat berbahaya. Ibu kota ternyata terancam oleh wabah virus yang mematikan. Bersama detektif Laura, detektif Sugi harus berkejaran dengan waktu untuk menangkap pelaku yang sulit ditangkap itu, atau malapetaka besar tak akan bisa dihindari.', 49, '006.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_peminjaman_detail` int(11) NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Cerpen');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_harus_kembali` date NOT NULL,
  `admin_id` int(11) NOT NULL,
  `status_pinjam` enum('pinjam','kembali') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(20) NOT NULL,
  `nama_penerbit` varchar(200) NOT NULL,
  `kota` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `kota`) VALUES
(1, 'Gramedia Pustaka Utama', 'Bandung'),
(2, 'Mizan Publishing', 'Jakarta'),
(3, 'Penerbit Erlangga', 'Malang'),
(4, 'Kepustakaan Populer Gramedia (KPG)', 'Surabaya'),
(5, 'Bentang Pustaka', 'Bali');

-- --------------------------------------------------------

--
-- Table structure for table `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` varchar(6) NOT NULL,
  `tgl_pengadaan` date NOT NULL,
  `id_buku` varchar(5) NOT NULL,
  `asal_buku` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` int(11) NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `admin_id` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(20) NOT NULL,
  `nama_penulis` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`) VALUES
(1, 'Andrea Hirata'),
(2, 'Haidar Musyafa'),
(3, 'Raditya Dika'),
(4, 'Eka Kurniawan'),
(5, 'Budi Darma');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto_siswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nisn`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_hp`, `foto_siswa`) VALUES
(2, '0061556339', 'INDAH KHAIRINNEZA', 'P', 'bandung barat', '0000-00-00', 'cibedug', '09876', 'siswa-001.png'),
(3, '0059796816', 'AURA SONIA PUTRI', 'L', 'DUMAI', '0000-00-00', 'cibedug', '09876', 'siswa-005.png'),
(4, '0065139198', 'AFSA MIFZAL ZARARGHIRFAR', 'L', 'Cimahi', '2024-02-26', 'Lewigajah', '09876', 'siswa-002.png'),
(5, '0059793416', 'DZAKY NUR RAHMAN', 'L', 'Sukabumi', '2024-02-26', 'Sukabumi', '09876', 'siswa-003.png'),
(6, '0985139198', 'RICKY ADI NOVIANTO', 'L', 'Purwakarta', '2024-02-27', 'Cimapag', '09876', 'siswa-006.png');

-- --------------------------------------------------------

--
-- Table structure for table `temp_peminjaman`
--

CREATE TABLE `temp_peminjaman` (
  `id_temp` int(11) NOT NULL,
  `id_buku` varchar(5) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `temp_peminjaman`
--
ALTER TABLE `temp_peminjaman`
  ADD PRIMARY KEY (`id_temp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_peminjaman_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
