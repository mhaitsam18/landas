-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2022 at 05:46 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id` int(11) NOT NULL,
  `agama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id`, `agama`) VALUES
(1, 'Islam'),
(2, 'Kristen Protestan'),
(3, 'Kristen Katholik'),
(4, 'Hindu'),
(5, 'Buddha'),
(6, 'Konghuchu');

-- --------------------------------------------------------

--
-- Table structure for table `dbi`
--

CREATE TABLE `dbi` (
  `id` int(11) NOT NULL,
  `isidbi` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbi`
--

INSERT INTO `dbi` (`id`, `isidbi`) VALUES
(1, 'Dihimbau kepada seluruh warga, terhitung dari tanggal 28 Juni 2021, Lurah Kuta Gambir akan melakukan lockdown. Demi kepentingan bersama, dimohon kerjasamanya.'),
(3, 'Diinformasikan, bahwa pada tanggal 09 Juli 2021 akan dilaksanakan vaksinasi dan swab untuk warga. Pendaftaran dilakukan pada 29 Juni - 08 Juli 2021.');

-- --------------------------------------------------------

--
-- Table structure for table `file_persyaratan`
--

CREATE TABLE `file_persyaratan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inputsurat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_file` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `file_persyaratan`
--

INSERT INTO `file_persyaratan` (`id`, `inputsurat_id`, `nama_file`, `file`, `created_at`, `updated_at`) VALUES
(5, 18, 'fotokopi KTP', 'file-uploadsfile6323e7a4d8b8e.pdf', '2022-09-16 03:04:04', '2022-09-16 03:04:04'),
(6, 18, 'Kartu Keluarga', 'file-uploadsfile6323e7a4db37f.pdf', '2022-09-16 03:04:04', '2022-09-16 03:04:04');

-- --------------------------------------------------------

--
-- Table structure for table `inputsurat`
--

CREATE TABLE `inputsurat` (
  `id` int(11) NOT NULL,
  `resi` varchar(10) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `tanggalinput` date NOT NULL,
  `jenissurat` int(11) NOT NULL,
  `status` varchar(128) NOT NULL,
  `status_kependudukan` varchar(20) NOT NULL,
  `setuju` char(1) NOT NULL DEFAULT '0',
  `file_upload` varchar(128) NOT NULL,
  `tanda_tangan` varchar(255) DEFAULT NULL,
  `hasil_surat` varchar(250) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `file_surat_selesai` varchar(200) DEFAULT NULL,
  `rating` char(1) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inputsurat`
--

INSERT INTO `inputsurat` (`id`, `resi`, `nama`, `nik`, `alamat`, `nohp`, `email`, `tanggalinput`, `jenissurat`, `status`, `status_kependudukan`, `setuju`, `file_upload`, `tanda_tangan`, `hasil_surat`, `id_user`, `file_surat_selesai`, `rating`, `keterangan`) VALUES
(1, 'ercmpcsc81', 'Gina Natasya Maharaja', '3215151802990002', 'Jl. Telekomunikasi, Sukapura', '0895604771137', 'maharajagina@gmail.com', '2022-09-01', 2, '3', 'Tetap', '1', 'file-uploadsall_files63108bad05186.rar', NULL, NULL, 19, 'surat-selesai-file_surat_selesai63108d6ae0482.pdf', '5', NULL),
(2, 'kyh8imp0v2', 'Gina Natasya Maharaja', '3215151802990002', 'Jl. Telekomunikasi, Sukapura', '0895604771137', 'maharajagina@gmail.com', '2022-09-01', 5, '2', 'Tetap', '0', 'file-uploadsall_files6310c4ec8c51a.rar', NULL, NULL, 19, NULL, NULL, NULL),
(3, '9wjdxoq7hv', 'Gina Natasya Maharaja', '3215151802990002', 'Jl. Telekomunikasi, Sukapura', '0895604771137', 'maharajagina@gmail.com', '2022-09-01', 1, '4', 'Tetap', '0', 'file-uploadsall_files6310c601c9600.rar', NULL, NULL, 19, NULL, NULL, '                                                                                    Data Kurang Lengkap                            '),
(4, 'g5815qv401', 'Gina Natasya Maharaja', '3215151802990002', 'Jl. Telekomunikasi, Sukapura', '0895604771137', 'maharajagina@gmail.com', '2022-09-02', 6, '2', 'Tetap', '0', 'file-uploadsall_files6311399d29379.rar', NULL, NULL, 19, NULL, NULL, NULL),
(6, 'hsv8iyck8i', 'Pak Patrick Adolf Telnoni', '3215151802990002', 'Jl. Telekomunikasi, Sukapura', '082219287517', 'maharajagina@gmail.com', '2022-09-02', 6, '1', 'Tetap', '0', 'file-uploadsall_files631139ea19520.rar', NULL, NULL, 19, NULL, NULL, NULL),
(7, 'ti02i6cw1y', 'Fathya Ariyani', '3215151802990002', 'Jl. Telekomunikasi, Sukapura', '0895604771137', 'fathyaariyanii@gmail.com', '2022-09-02', 2, '1', 'Tetap', '0', 'file-uploadsall_files631149f404c75.rar', NULL, NULL, 33, NULL, NULL, NULL),
(8, '6n25i7zh2i', 'Zeha Anindira', '3215151802990002', 'Jl. Telekomunikasi, Sukapura', '0895604771137', 'zehandira@Gmail.com', '2022-09-02', 7, '1', 'Musiman', '0', 'file-uploadsall_files63114a559bdd6.rar', 'signature_033115.png', NULL, 30, NULL, NULL, NULL),
(9, '605ekb508n', 'Fabian Dewangga', '3215151802990002', 'Jl. Telekomunikasi, Sukapura', '0895604771137', 'fabian@gmail.com', '2022-09-02', 5, '1', 'Tetap', '0', 'file-uploadsall_files63114a990b90b.rar', 'signature_081826.png', NULL, 34, NULL, NULL, NULL),
(10, 'mfhcj223xt', 'Gina Natasya Maharaja', '3215151802990002', 'Jl. Telekomunikasi, Sukapura', '0895604771137', 'maharajagina@gmail.com', '2022-09-02', 7, '3', 'Tetap', '0', 'file-uploadsall_files631165c7356aa.rar', 'signature_030010.png', NULL, 19, NULL, NULL, '                                                        asdfghjkl'),
(11, 'ubcdryqhv9', 'Gina Natasya Maharaja', '3215151802990002', 'Jl. Aman Sidikalang', '0895604771137', 'maharajagina@gmail.com', '2022-09-02', 5, '3', 'Tetap', '1', 'file-uploadsall_files63117d5ae1182.rar', 'signature_081855.png', NULL, 38, 'surat-selesai-file_surat_selesai63117ea52f349.pdf', '4', NULL),
(18, 'pixyo5m0ec', 'Gina Natasya Maharaja', '6701194075231201', 'Jl. Aman Sidikalang', '082117503125', 'maharajagina@gmail.com', '2022-09-15', 6, '1', 'Tetap', '0', '', NULL, NULL, 38, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE `jenis_surat` (
  `id` int(11) NOT NULL,
  `nama_surat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`id`, `nama_surat`) VALUES
(1, 'Surat Keterangan Usaha'),
(2, 'Surat Keterangan Belum Menikah'),
(3, 'Surat Keterangan Kurang Mampu'),
(4, 'Surat Pengantar Nikah'),
(5, 'Surat Keterangan Domisili'),
(6, 'Surat Pengantar Berkelakuan Baik'),
(7, 'Surat Keterangan KK Hilang');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_demografi`
--

CREATE TABLE `kondisi_demografi` (
  `id` int(200) NOT NULL,
  `jumlah_penduduk` int(250) NOT NULL,
  `jumlah_kk` int(250) NOT NULL,
  `jumlah_laki` int(250) NOT NULL,
  `jumlah_perempuan` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondisi_demografi`
--

INSERT INTO `kondisi_demografi` (`id`, `jumlah_penduduk`, `jumlah_kk`, `jumlah_laki`, `jumlah_perempuan`) VALUES
(1, 2168, 702, 1262, 1355);

-- --------------------------------------------------------

--
-- Table structure for table `kondisi_geografis`
--

CREATE TABLE `kondisi_geografis` (
  `id` int(20) NOT NULL,
  `sebelah_utara` varchar(250) NOT NULL,
  `sebelah_timur` varchar(250) NOT NULL,
  `sebelah_barat` varchar(250) NOT NULL,
  `sebelah_selatan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kondisi_geografis`
--

INSERT INTO `kondisi_geografis` (`id`, `sebelah_utara`, `sebelah_timur`, `sebelah_barat`, `sebelah_selatan`) VALUES
(1, 'Kelurahan Kuta Rakyat', 'Kelurahan Karing Kec. Berampu', 'Kelurahan Belang Malum', 'Kelurahan Karing Kec. Berampu');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `inputsurat_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `inputsurat_id`, `isi`, `user_id`) VALUES
(1, 42, 'Ini untuk Gina', 35),
(2, 43, 'Permohonan oleh  telah masuk', 26),
(3, 44, 'Permohonan oleh  telah masuk', 26),
(4, 45, 'Permohonan oleh  telah masuk', 26),
(5, 46, 'INi untuk bagian umum', 13),
(6, 1, 'Berkas anda telah sesuai dan lengkap!', 36),
(7, 47, 'Permohonan oleh  telah masuk', 26),
(8, 48, 'Permohonan oleh  telah masuk', 26),
(9, 49, 'Permohonan oleh  telah masuk', 26),
(10, 50, 'Permohonan oleh  telah masuk', 26),
(11, 51, 'Permohonan oleh  telah masuk', 26),
(12, 52, 'Permohonan oleh  telah masuk', 26),
(13, 53, 'Permohonan oleh  telah masuk', 26),
(14, 54, 'Permohonan oleh  telah masuk', 26),
(15, 55, 'Permohonan oleh  telah masuk', 26),
(16, 56, 'Permohonan oleh  telah masuk', 26),
(17, 57, 'Permohonan oleh  telah masuk', 57),
(18, 58, 'Permohonan oleh  telah masuk', 26),
(19, 1, 'Permohonan oleh  telah masuk', 26),
(20, 2, 'Permohonan oleh  telah masuk', 26),
(21, 3, 'Permohonan oleh  telah masuk', 26),
(22, 4, 'Permohonan oleh  telah masuk', 26),
(23, 5, 'Permohonan oleh  telah masuk', 26),
(24, 6, 'Permohonan oleh  telah masuk', 26),
(25, 7, 'Permohonan oleh  telah masuk', 26),
(26, 8, 'Permohonan oleh  telah masuk', 26),
(27, 9, 'Permohonan oleh  telah masuk', 26),
(28, 10, 'Permohonan oleh  telah masuk', 26),
(29, 11, 'Permohonan oleh  telah masuk', 26),
(30, 17, 'Permohonan oleh  telah masuk', 26),
(31, 18, 'Permohonan oleh  telah masuk', 26);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `nomor_hp` varchar(18) NOT NULL,
  `foto` text NOT NULL,
  `tanggal_lahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `jabatan`, `nomor_hp`, `foto`, `tanggal_lahir`) VALUES
(1, '196504251986021001', 'April Ujung', 'Lurah Kelurahan Kuta Gambir', '0864545363447', '', '2022-08-01'),
(2, '75286358623586258', 'Marudut M. Tinambunan', 'Sekretaris Lurah', '085875875875', '', '1978-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL,
  `deskripsi_kelurahan` text NOT NULL,
  `foto_kelurahan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `nama_kelurahan`, `deskripsi_kelurahan`, `foto_kelurahan`) VALUES
(1, 'Kelurahan Kuta Gambir ', 'Kuta Gambir merupakan salah satu kelurahan yang ada di kecamatan Sidikalang, Kabupaten Dairi, provinsi Sumatra Utara, Indonesia. Cobaaa', 'kelurahan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rek_a`
--

CREATE TABLE `rek_a` (
  `id` int(11) NOT NULL,
  `kelompok_a` varchar(250) NOT NULL,
  `jumlah_a` varchar(200) NOT NULL,
  `persentase_a` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rek_a`
--

INSERT INTO `rek_a` (`id`, `kelompok_a`, `jumlah_a`, `persentase_a`) VALUES
(1, 'Islam', '702', '26,81 %'),
(2, 'Protestan', '1617', '61,76 %'),
(3, 'Katolik', '176', '6,72 %'),
(4, 'Budha', '0', '0 '),
(5, 'Hindu', '0', '0'),
(6, 'Konghuchu', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `rek_jk`
--

CREATE TABLE `rek_jk` (
  `id` int(11) NOT NULL,
  `kelompok_j` varchar(250) NOT NULL,
  `jumlah_j` varchar(250) NOT NULL,
  `persentase` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rek_jk`
--

INSERT INTO `rek_jk` (`id`, `kelompok_j`, `jumlah_j`, `persentase`) VALUES
(1, 'Laki-laki', '1263', '48,24 %'),
(2, 'Perempuan', '1355', '51,76 %');

-- --------------------------------------------------------

--
-- Table structure for table `rek_p`
--

CREATE TABLE `rek_p` (
  `id` int(11) NOT NULL,
  `kelompok_p` varchar(250) NOT NULL,
  `jumlah_p` varchar(200) NOT NULL,
  `persentase_p` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rek_p`
--

INSERT INTO `rek_p` (`id`, `kelompok_p`, `jumlah_p`, `persentase_p`) VALUES
(1, 'Petani', '396', '15,13 %'),
(2, 'Pedagang', '232', '8,86 %'),
(3, 'PNS', '92', '3,51'),
(4, 'Wiraswasta', '182', '6,95 %'),
(5, 'Dll', '1188', '45,38 %');

-- --------------------------------------------------------

--
-- Table structure for table `rek_s`
--

CREATE TABLE `rek_s` (
  `id` int(11) NOT NULL,
  `kelompok_s` varchar(250) NOT NULL,
  `jumlah_s` varchar(200) NOT NULL,
  `persentase_s` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rek_s`
--

INSERT INTO `rek_s` (`id`, `kelompok_s`, `jumlah_s`, `persentase_s`) VALUES
(1, 'SD', '416', '15,89 %'),
(2, 'SMP', '497', '18,98 %'),
(3, 'SMA', '869', '33,19 %'),
(4, 'D1', '0', '0'),
(5, 'D2', '0', '0'),
(6, 'D3', '16', '0,61 %'),
(7, 'S1', '235', '8,98 %'),
(8, 'Putus Sekolah', '243', '9,28 %'),
(9, 'Dll', '1188', '45,38 %');

-- --------------------------------------------------------

--
-- Table structure for table `saranak`
--

CREATE TABLE `saranak` (
  `id` int(11) NOT NULL,
  `sarana_k` varchar(250) NOT NULL,
  `jumlah_sk` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saranak`
--

INSERT INTO `saranak` (`id`, `sarana_k`, `jumlah_sk`) VALUES
(1, 'Puskesmas', '0'),
(2, 'Pustu', '1'),
(3, 'Posyandu/Polindes', '4');

-- --------------------------------------------------------

--
-- Table structure for table `saranap`
--

CREATE TABLE `saranap` (
  `id` int(11) NOT NULL,
  `sarana_p` varchar(250) NOT NULL,
  `jumlah_sp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saranap`
--

INSERT INTO `saranap` (`id`, `sarana_p`, `jumlah_sp`) VALUES
(1, 'TK', '1'),
(2, 'SD', '2'),
(3, 'SMP', '1'),
(4, 'SMA', '0');

-- --------------------------------------------------------

--
-- Table structure for table `saranari`
--

CREATE TABLE `saranari` (
  `id` int(11) NOT NULL,
  `sarana_ri` varchar(250) NOT NULL,
  `jumlah_ri` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saranari`
--

INSERT INTO `saranari` (`id`, `sarana_ri`, `jumlah_ri`) VALUES
(1, 'Mesjid/mushola', 2),
(2, 'Gereja', 5),
(3, 'Gereja Katolik', 0),
(4, 'Kelenteng', 0),
(5, 'Vihara', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Tetap'),
(2, 'Musiman');

-- --------------------------------------------------------

--
-- Table structure for table `suratket`
--

CREATE TABLE `suratket` (
  `id` int(11) NOT NULL,
  `id_sk` int(11) NOT NULL,
  `nomor` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `ttl` varchar(250) NOT NULL,
  `jenisk` varchar(200) NOT NULL,
  `agama` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `inputsurat_id` int(11) NOT NULL,
  `tanda_tangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suratket`
--

INSERT INTO `suratket` (`id`, `id_sk`, `nomor`, `nama`, `ttl`, `jenisk`, `agama`, `status`, `pekerjaan`, `nik`, `alamat`, `tanggal`, `id_user`, `inputsurat_id`, `tanda_tangan`) VALUES
(1, 2, '85895', 'Gina Natasya Maharaja', 'Sidikalang, 23 Desember 2001', 'Perempuan', 'Kristen Protestan', 'Musiman', 'Mahasiswa', '1767011940752312', 'Jl. Telekomunikasi, Sukapura', '2022-09-01', 19, 1, NULL),
(2, 5, '470/08/2022', 'Gina Natasya Maharaja', 'Sidikalang, 23 Desember 2001', 'Perempuan', 'Kristen Protestan', 'Belum Kawin', 'Mahasiswa', '1767011940752312', 'Jl. Telekomunikasi, Sukapura', '2022-09-01', 19, 2, NULL),
(3, 5, '470/08/2022', 'Gina Natasya Maharaja', 'Sidikalang, 23 Desember 2001', 'Perempuan', 'Kristen Protestan', 'Kawin', 'Mahasiswa', '1767011940752312', 'Jl. Telekomunikasi, Sukapura', '2022-09-01', 19, 6, NULL),
(4, 1, '470/08/2022', 'Gina Natasya Maharaja', 'Sidikalang, 23 Desember 2001', 'Perempuan', 'Kristen Protestan', 'Belum Kawin', 'Mahasiswa', '1767011940752312', 'Jl. Telekomunikasi, Sukapura', '2022-09-01', 19, 3, NULL),
(5, 6, '470/08/2022', 'Gina Natasya Maharaja', 'Sidikalang, 23 Desember 2001', 'Perempuan', 'Kristen Protestan', 'Kawin', 'Mahasiswa', '1767011940752312', 'Jl. Telekomunikasi, Sukapura', '2022-09-02', 19, 4, NULL),
(6, 6, '470/08/2022', 'Gina Natasya Maharaja', 'Sidikalang, 23 Desember 2001', 'Perempuan', 'Kristen Protestan', 'Belum Kawin', 'Mahasiswa', '1767011940752312', 'Jl. Telekomunikasi, Sukapura', '2022-09-02', 19, 9, NULL),
(7, 7, '1111', 'Gina Natasya Maharaja', 'Sidikalang, 23 Desember 2001', 'Perempuan', 'Kristen Protestan', 'Musiman', 'Mahasiswa', '1767011940752312', 'Jl. Telekomunikasi, Sukapura', '2022-09-02', 19, 10, 'signature_030010.png'),
(8, 5, '1111', 'Gina Natasya Maharaja', 'Sidikalang, 23 Desember 2022', 'Perempuan', 'Kristen Protestan', 'Tetap', 'Mahasiswa', '6701194075231201', 'Jl. Aman Sidikalang', '2022-09-02', 38, 11, 'signature_081855.png');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `perihal` varchar(128) NOT NULL,
  `pengirim` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `keyword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `tanggal`, `no_surat`, `perihal`, `pengirim`, `gambar`, `keyword`) VALUES
(0, '2022-04-14', 'SuratYY/003', 'Undangan Kelurahan', 'Kantor Kelurahan', 'Contoh-Surat-Undangan-Rapat-Desa.jpg', ''),
(6, '2022-08-31', 'SuratYY/001', 'Undangan Rapat', 'Kantor Kabupaten Dairi', 'Capture.PNG', ''),
(7, '2022-08-31', 'SuratYY/003', 'Undangan Rapat', 'Kantor Kabupaten', 'Contoh-Surat-Undangan-Rapat-Desa.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `perihal` varchar(256) NOT NULL,
  `pengirim` varchar(128) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `keyword` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `tanggal`, `no_surat`, `perihal`, `pengirim`, `gambar`, `keyword`) VALUES
(0, '2021-06-25', 'SuratXX/002', 'Undangan Kelurahan', 'Kantor Kecamatan', 'Contoh-Surat-Undangan-Rapat-Desa.jpg', ''),
(16, '2022-04-15', 'SuratXX/005', 'Undangan Rapat', 'Kantor Kecamatan ', 'Contoh-Surat-Undangan-Rapat-Desa.jpg', ''),
(18, '2022-09-01', 'SuratXX/01', 'Undangan Rapat', 'Kantor Kecamatan', 'Contoh-Surat-Undangan-Rapat-Desa.jpg', ''),
(19, '2022-09-01', 'SuratXX/003', 'Surat Rekomendasi', 'Kantor Kabupaten', 'Surat_Rekomendasi_Untuk_Perawat_Desa_Bidan_Desa.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_kki`
--

CREATE TABLE `syarat_kki` (
  `id` int(11) NOT NULL,
  `syarat_kki` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syarat_kki`
--

INSERT INTO `syarat_kki` (`id`, `syarat_kki`) VALUES
(1, 'Surat keterangan hilang dari kepolisian'),
(2, 'Fotokopi KK yang hilang (jika ada)'),
(3, 'Fotokopi dokumen kependudukan dari salah satu anggota keluarga'),
(4, 'KTP');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_skb`
--

CREATE TABLE `syarat_skb` (
  `id` int(11) NOT NULL,
  `syarat_kb` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syarat_skb`
--

INSERT INTO `syarat_skb` (`id`, `syarat_kb`) VALUES
(1, 'Fotokopi Kartu Tanda Penduduk (KTP) dengan menunjukkan aslinya'),
(2, 'Fotokopi Kartu Keluarga (KK)'),
(3, 'Surat Pengantar dari RT dan RW setempat'),
(4, 'Surat Permohonan bermaterai Rp10.000');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_skbn`
--

CREATE TABLE `syarat_skbn` (
  `id` int(11) NOT NULL,
  `syarat_kbn` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syarat_skbn`
--

INSERT INTO `syarat_skbn` (`id`, `syarat_kbn`) VALUES
(1, 'Surat pengantar dari RT/RW setempat'),
(2, 'Fotocopy KTP elektronik pemohon'),
(3, 'Fotocopy Kartu Keluarga pemohon'),
(4, 'Fotocopy KTP elektronik dua orang saksi'),
(5, 'Surat Pernyataan Belum Menikah dari orangtua/wali yang diketahui RT/RW setempat dan dua orang saksi di atas materai 10.000');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_skd`
--

CREATE TABLE `syarat_skd` (
  `id` int(11) NOT NULL,
  `syarat_kd` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syarat_skd`
--

INSERT INTO `syarat_skd` (`id`, `syarat_kd`) VALUES
(1, 'Berusia 17 tahun dan sudah memiliki KTP'),
(2, 'Surat Pengantar dari RT dan RW'),
(3, 'Lampirkan fotokopi KTP dan Kartu Keluarga'),
(4, 'Surat permohonan dokumen dan data'),
(5, 'Materai 10.000'),
(6, 'Pas foto 3x4 sebanyak 1 lembar'),
(7, 'Surat kuasa jika pengurus diwakilkan dan lengkapi dengan materai 10.000');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_sket`
--

CREATE TABLE `syarat_sket` (
  `id` int(11) NOT NULL,
  `syarat_ske` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syarat_sket`
--

INSERT INTO `syarat_sket` (`id`, `syarat_ske`) VALUES
(1, 'Pengisian Surat Pernyataan ( unduh ) dengan materai Rp. 10.000;'),
(2, 'Fotocopy KTP'),
(3, 'Fotocopy KK'),
(4, 'Fotocopy Ijazah Terakhir legalisir'),
(6, 'Fotocopy SKCK Legalisir');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_skkm`
--

CREATE TABLE `syarat_skkm` (
  `id` int(11) NOT NULL,
  `syarat_kkm` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syarat_skkm`
--

INSERT INTO `syarat_skkm` (`id`, `syarat_kkm`) VALUES
(1, 'Surat pengantar dan keterangan RT hingga dukuh setempat;'),
(2, 'Surat pernyataan belum terekam pada DTKS (Data Terpadu Kesejahteraan Sosial);'),
(3, 'Rincian pembiayaan biaya pendidikan atau biaya rumah sakit;'),
(4, 'Fotokopi Kartu Keluarga dan menunjukkan yang asli;'),
(5, 'Fotokopi dan e-KTP asli;'),
(6, 'Beberapa daerah akan diminta membuat surat pernyataan tidak mampu yang diketahui RT dan 2 orang saksi;'),
(7, 'Tanda lunas Pajak Bumi dan Bangunan (PBB);'),
(8, 'Pas foto rumah yang bersangkutan dari posisi depan dan samping rumah masing-masing ukuran 5R.');

-- --------------------------------------------------------

--
-- Table structure for table `syarat_spn`
--

CREATE TABLE `syarat_spn` (
  `id` int(11) NOT NULL,
  `syarat_pn` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `syarat_spn`
--

INSERT INTO `syarat_spn` (`id`, `syarat_pn`) VALUES
(1, 'Surat Pengantar dari RT/RW.'),
(2, 'Surat keterangan dari kelurahan dan pengantar N1 s/d N4 .'),
(3, 'Fotocopy Akta kelahiran/Ijazah Terakhir calon mempelai (2 lembar).'),
(4, 'Fotocopy KTP-el dan Kartu Keluarga (KK) calon Mempelai dan orang tua (2 lembar).'),
(5, 'Fotocopy Akta Cerai / Akta Kematian sesuai dengan statusnya (2 lembar).'),
(6, 'Fotocopy Surat Nikah orang tua calon mempelai.'),
(7, 'Surat pernyataan status perkawinan bermaterai 10.000.'),
(8, 'Surat rekomendasi nikah calon mempelai pria.'),
(9, 'Foto 2 x 3 berwarna calon mempelai sebanyak 4 lembar.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `katasandi` varchar(256) NOT NULL,
  `tempatlahir` varchar(128) NOT NULL,
  `tanggallahir` date NOT NULL,
  `pekerjaan` varchar(200) NOT NULL,
  `agama` int(11) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `scanktp` varchar(128) NOT NULL,
  `scankk` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nik`, `email`, `image`, `katasandi`, `tempatlahir`, `tanggallahir`, `pekerjaan`, `agama`, `jenis_kelamin`, `alamat`, `status`, `scanktp`, `scankk`, `role_id`, `is_active`) VALUES
(0, 'Natalia Devyyyy', '1767011940212012', 'nataliadeviyanti@gmail.com', 'default.jpg', '$2y$10$dLl8VoJoUdgNngjeyX/pjOKWrvh35XlPwPQiSVLVxXsusxvLIVBzy', 'Bekasi', '2001-12-20', '', 3, '', 'Jl. Radio No.15, Sukapura, Kabupaten Bandung ', 2, 'ktp-yes.jpg', '1597570904-20200954.jpg', 2, 1),
(13, 'Elsa Yunita', '1767011930891366', 'elsayunita@gmail.com', 'Dairi_Regency_Emblem.png', '$2y$10$n/W2qKDqCn0x7Zy0bKxZmunvEfhI4NvO/bBe.NgFObSYza.7Ureey', 'Bandung', '2001-05-10', '', 1, '', 'Bandung', 3, '318131.jpg', '1597570904-20200954.jpg', 1, 1),
(15, 'Juan Angkasa', '1767011947770997', 'juangkasa@gmail.com', 'default.jpg', '$2y$10$9yc3.qe9mh89rhJaY2Dl1.NKT8jiVHyIaHXu8TyZcbGjbrP1rwRYG', 'Bali', '1997-09-01', '', 5, '', 'Jl. Telekomunikasi, Sukapura', 1, 'contoh-ktp.jpg', '1597570904-20200954.jpg', 2, 1),
(16, 'Nindya Rifka Annisa', '1767011930891367', 'nindyelzy@gmail.com', 'default.jpg', '$2y$10$WoBSXoDdhKNfKVTU3M9l9u8iwzdLM3zV3y8PhY/F0AhMsdDcix/PW', 'Watampone', '2001-05-10', '', 1, '', 'Jl. Babakan Radio, Sukapura', 2, '318131.jpg', '1597570904-20200954.jpg', 2, 1),
(18, 'Muh. Farel Diazaka', '1767011949941209', 'diazakafarel@gmail.com', 'default.jpg', '$2y$10$X8tbc2QXC0NVvoYmd4Nxq.0HutuP3oi1ReDTSslv36cZMukJekiMG', 'Bandung', '1994-09-12', '', 1, '', 'Jl. Mengger Hilir, Sukapura', 1, 'KTP-1544523262.jpg', '1597570904-20200954.jpg', 2, 1),
(20, 'Fathya Ariyani', '1767011930891377', 'fathyariyani@gmail.com', 'default.jpg', '$2y$10$W9pV7W7Wa/pIKHejs/Ovd.Zzabbmv/YXX0fAlX080LG7JPB4FSPaq', 'Sumedang', '2001-08-24', '', 1, '', 'Jl. Mengger, Sukapura', 1, '318131.jpg', '1597570904-20200954.jpg', 2, 1),
(22, 'Hardianti Eka Lestari', '1767011947770921', 'hardiantieka@gmail.com', 'default.jpg', '$2y$10$qGv9inV6nj2RCqCmQHBAZOZvqPT/YQ7PA2.WGjcbGllt0Q7yud0ZG', 'Selayar', '2001-05-02', '', 1, '', 'Jl. Mengger, Sukapura', 1, '318131.jpg', '1597570904-20200954.jpg', 2, 0),
(23, 'Fiagra Juaka', '1767011947770900', 'fijuka@gmail.com', 'default.jpg', '$2y$10$GkXFgU.PxCQc8ITG06hJFeBE4cGVWF4ySisRVraR6LiVsWmKjX2Ca', 'Flores', '1993-03-09', '', 6, '', 'Jl. Radio, Sukapura', 2, 'main-qimg-ed78642676e9c984739a8698e29b940c.jpg', '1597570904-20200954.jpg', 2, 1),
(28, 'Giandra Nareswara', '1767011947121995', 'nareswaragian@gmail.com', 'default.jpg', '$2y$10$7eqJRE1CpPpAME05dEOJ6uEacxfUiX4gHa0Qqy7KYtATuqcFYZKm6', 'Jakarta', '1995-12-30', '', 2, '', 'Jl. Tebet Raya, Tebet, Jakarta Selatan', 2, 'e834ba464b2e986da28cbf2e42a519b1.jpg', '1597570904-20200954.jpg', 2, 0),
(29, 'Lurah', '1767011947777991', 'paklurah@gmail.com', 'lurah.jpg', '$2y$10$ogO1LE5n7nHd7S0BRqwXE.MvoW6BLbtsNJeURnGAIM8icKkPK2xGa', 'Bandung', '1981-01-10', '', 1, '', 'Jl. Radio, Sukapura', 3, 'KTP-1544523262.jpg', '1597570904-20200954.jpg', 3, 1),
(30, 'Zeha Anindira', '1767011930990906', 'zehandira@Gmail.com', 'default.jpg', '$2y$10$iD5fp4dqe2Dq9qywsvVVqe6bvyWcmKsQ1.KsAYFqYAh8mIXouZI3y', 'Bali', '1996-09-11', '', 1, '', 'Jl. Telekomunikasi, Sukapura', 1, 'ktp-yes.jpg', '1597570904-20200954.jpg', 2, 1),
(31, 'Nindya Rifka Annisa', '1767011930891137', 'nindyrifka@gmail.com', 'default.jpg', '$2y$10$OVEoUtOgfHlLgMskYrugXOFauLs1N18U5h96uSPevtr2dCcPvg0nu', 'Makassar', '2001-04-01', '', 1, '', 'Jl. Telekomunikasi, Sukapura', 1, '318131.jpg', '1597570904-20200954.jpg', 2, 0),
(32, 'Erlina', '1767011930891369', 'erlinabagi@gmail.com', 'default.jpg', '$2y$10$XKmwHOyuxRv84LeaKTAGP.C5QLCnZZv9LDahSQN7lmHEgIe32IMUS', 'Bandung', '1986-05-16', '', 1, '', 'Jl. Makmur', 3, '318131.jpg', '1597570904-20200954.jpg', 2, 1),
(33, 'Fathya Ariyani', '1767011930891378', 'fathyaariyanii@gmail.com', 'default.jpg', '$2y$10$cz9RtsIqMr73N.ILngAXd.arTWOztqtMpoSqaDMJYdof6rqYTyU/m', 'Sumedang', '2022-08-24', '', 1, '', 'Jl. Telekomunikasi, Sukapura', 1, '318131.jpg', '1597570904-20200954.jpg', 2, 1),
(34, 'Fabian Dewangga', '1767011930891360', 'fabian@gmail.com', 'default.jpg', '$2y$10$L/oN.kc262Q5iUurg1x8ReHVxkFfBZHUpyDBJrUi3gsUlhGxBqbjW', 'Bali', '2001-06-21', '', 1, '', 'Jl. Telekomunikasi, Sukapura', 1, 'contoh-ktp.jpg', '1597570904-20200954.jpg', 2, 1),
(35, 'Ferdi Dizwar', '1767011947770991', 'ferdidizwari@gmail.com', 'default.jpg', '$2y$10$IEd9thvKq/SIrG5UFpCt9eFArkrpvR.Jlom4A8l32Kuc1.X6z3yB6', 'Sidikalang', '1991-07-30', '', 1, '', 'Jl. Makmur', 3, 'KTP-1544523262.jpg', '1597570904-20200954.jpg', 1, 1),
(37, 'sdhgsdcvhk', '1234567890123456', 'dvscvhs@gmail.com', 'default.jpg', '$2y$10$a0FKsHvp1YJ0i00qvSq29eYUoXsDfUjNffJIRqxlj0l3znLH3nCoq', 'dscbsdvbk', '2022-09-01', 'khdsvckhsdbvk', 2, 'Laki-laki', 'jhgsdhkcjhv', 1, 'natasya.jpg', 'lurah.jpg', 2, 1),
(38, 'Gina Natasya Maharaja', '6701194075231201', 'maharajagina@gmail.com', 'gina.jpg.jpg', '$2y$10$.P6te9cwsQp0UiroQiKheu1wqGEPHQduDt.WwCHrTGcIPeCqR5K4e', 'Sidikalang', '2022-12-23', 'Mahasiswa', 2, 'Perempuan', 'Jl. Aman Sidikalang', 1, 'KTP.jpeg', 'KK.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Penduduk'),
(3, 'Ketua RT / RW');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_dua`
-- (See below for the actual view)
--
CREATE TABLE `v_dua` (
`id` int(11)
,`image` varchar(128)
,`nik` varchar(128)
,`nama` varchar(128)
,`email` varchar(128)
,`tempatlahir` varchar(128)
,`tanggallahir` date
,`agama` varchar(17)
,`alamat` varchar(128)
,`status` varchar(7)
,`scanktp` varchar(128)
,`scankk` varchar(128)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_satu`
-- (See below for the actual view)
--
CREATE TABLE `v_satu` (
`image` varchar(128)
,`nik` varchar(128)
,`nama` varchar(128)
,`email` varchar(128)
,`Status` varchar(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_dua`
--
DROP TABLE IF EXISTS `v_dua`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_dua`  AS SELECT `user`.`id` AS `id`, `user`.`image` AS `image`, `user`.`nik` AS `nik`, `user`.`nama` AS `nama`, `user`.`email` AS `email`, `user`.`tempatlahir` AS `tempatlahir`, `user`.`tanggallahir` AS `tanggallahir`, CASE WHEN `user`.`agama` = 1 THEN 'Islam' WHEN `user`.`agama` = 2 THEN 'Kristen Protestan' WHEN `user`.`agama` = 3 THEN 'Kristen Katholik' WHEN `user`.`agama` = 4 THEN 'Hindu' WHEN `user`.`agama` = 5 THEN 'Buddha' ELSE 'Konghuchu' END AS `agama`, `user`.`alamat` AS `alamat`, CASE WHEN `user`.`status` = 1 THEN 'Tetap' WHEN `user`.`status` = 2 THEN 'Musiman' ELSE 'Unknown' END AS `status`, `user`.`scanktp` AS `scanktp`, `user`.`scankk` AS `scankk` FROM `user` WHERE `user`.`role_id` = '2' ORDER BY `user`.`nama` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `v_satu`
--
DROP TABLE IF EXISTS `v_satu`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_satu`  AS SELECT `user`.`image` AS `image`, `user`.`nik` AS `nik`, `user`.`nama` AS `nama`, `user`.`email` AS `email`, coalesce(nullif(`user`.`status`,'2'),'Musiman') AS `Status` FROM `user` WHERE `user`.`status` = '2''2'  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbi`
--
ALTER TABLE `dbi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_persyaratan`
--
ALTER TABLE `file_persyaratan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inputsurat`
--
ALTER TABLE `inputsurat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kondisi_demografi`
--
ALTER TABLE `kondisi_demografi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kondisi_geografis`
--
ALTER TABLE `kondisi_geografis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rek_a`
--
ALTER TABLE `rek_a`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rek_jk`
--
ALTER TABLE `rek_jk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rek_p`
--
ALTER TABLE `rek_p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rek_s`
--
ALTER TABLE `rek_s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saranak`
--
ALTER TABLE `saranak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saranap`
--
ALTER TABLE `saranap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saranari`
--
ALTER TABLE `saranari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratket`
--
ALTER TABLE `suratket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarat_kki`
--
ALTER TABLE `syarat_kki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarat_skb`
--
ALTER TABLE `syarat_skb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarat_skbn`
--
ALTER TABLE `syarat_skbn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarat_skd`
--
ALTER TABLE `syarat_skd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarat_sket`
--
ALTER TABLE `syarat_sket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarat_skkm`
--
ALTER TABLE `syarat_skkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `syarat_spn`
--
ALTER TABLE `syarat_spn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agm` (`agama`),
  ADD KEY `stat` (`status`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dbi`
--
ALTER TABLE `dbi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `file_persyaratan`
--
ALTER TABLE `file_persyaratan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inputsurat`
--
ALTER TABLE `inputsurat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kondisi_demografi`
--
ALTER TABLE `kondisi_demografi`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kondisi_geografis`
--
ALTER TABLE `kondisi_geografis`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rek_a`
--
ALTER TABLE `rek_a`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rek_jk`
--
ALTER TABLE `rek_jk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rek_p`
--
ALTER TABLE `rek_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rek_s`
--
ALTER TABLE `rek_s`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `saranak`
--
ALTER TABLE `saranak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `saranap`
--
ALTER TABLE `saranap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `saranari`
--
ALTER TABLE `saranari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `suratket`
--
ALTER TABLE `suratket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `syarat_kki`
--
ALTER TABLE `syarat_kki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `syarat_skb`
--
ALTER TABLE `syarat_skb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `syarat_skbn`
--
ALTER TABLE `syarat_skbn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `syarat_skd`
--
ALTER TABLE `syarat_skd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `syarat_sket`
--
ALTER TABLE `syarat_sket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `syarat_skkm`
--
ALTER TABLE `syarat_skkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `syarat_spn`
--
ALTER TABLE `syarat_spn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
