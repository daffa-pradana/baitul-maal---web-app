-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2019 at 01:51 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `no_acara` int(11) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `headline` varchar(100) NOT NULL,
  `tgl` datetime NOT NULL,
  `catatan` varchar(200) NOT NULL,
  `peserta` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`no_acara`, `tgl_buat`, `headline`, `tgl`, `catatan`, `peserta`) VALUES
(4, '2019-07-08 11:26:22', 'Rapat keputusan', '2019-07-30 10:00:00', 'bawa catatan masing masing', 'General Manager, Account Officer, Accounting Staff'),
(5, '2019-07-12 00:40:37', 'Rapat Bulanan', '2019-08-01 08:30:00', 'bawa laporan bulanan', 'General Manager, Teller, Account Officer, Komite Pembiayaan, Admin, Accounting Staff'),
(6, '2019-07-12 03:53:59', 'Kunjungan BAZNAS', '2019-09-10 15:00:00', 'siapkan profil perusahaan', 'General Manager, Komite Pembiayaan, Accounting Staff');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran`
--

CREATE TABLE `angsuran` (
  `no_a` int(11) NOT NULL,
  `kd_p` int(11) NOT NULL,
  `id_n` int(11) NOT NULL,
  `pokok` int(11) NOT NULL,
  `a1` int(11) NOT NULL,
  `a2` int(11) NOT NULL,
  `a3` int(11) NOT NULL,
  `a4` int(11) NOT NULL,
  `a5` int(11) NOT NULL,
  `a6` int(11) NOT NULL,
  `a7` int(11) NOT NULL,
  `a8` int(11) NOT NULL,
  `a9` int(11) NOT NULL,
  `a10` int(11) NOT NULL,
  `a11` int(11) NOT NULL,
  `a12` int(11) NOT NULL,
  `total_angsuran` int(11) NOT NULL,
  `total_simpanan` int(11) NOT NULL,
  `jangka_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `angsuran`
--

INSERT INTO `angsuran` (`no_a`, `kd_p`, `id_n`, `pokok`, `a1`, `a2`, `a3`, `a4`, `a5`, `a6`, `a7`, `a8`, `a9`, `a10`, `a11`, `a12`, `total_angsuran`, `total_simpanan`, `jangka_p`) VALUES
(4, 3, 5, 166667, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 2000000, 4000, 12),
(5, 12, 5, 166667, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 2000000, 4000, 12),
(6, 13, 5, 166667, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 2000000, 4000, 12),
(7, 4, 2, 166667, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 100000, 80000, 70000, 1753000, 0, 12),
(8, 5, 1, 166667, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 100000, 120000, 100000, 70000, 1726000, 0, 12),
(9, 6, 3, 166667, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 2000000, 4000, 12),
(10, 7, 4, 666667, 670000, 670000, 450000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1790000, 0, 3),
(11, 8, 6, 166667, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 2000000, 4000, 12),
(12, 9, 7, 166667, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 2000000, 4000, 12),
(13, 10, 8, 83333, 84000, 84000, 84000, 84000, 84000, 84000, 84000, 84000, 84000, 84000, 84000, 84000, 1000000, 8000, 12),
(14, 11, 9, 166667, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 167000, 2000000, 4000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `no_k` int(11) NOT NULL,
  `nama_k` varchar(255) NOT NULL,
  `email_k` varchar(255) NOT NULL,
  `pass_k` varchar(255) NOT NULL,
  `jk_k` varchar(50) NOT NULL,
  `jabatan_k` varchar(100) NOT NULL,
  `tgl_k` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nik_k` varchar(16) NOT NULL,
  `npwp_k` varchar(16) NOT NULL,
  `kk_k` varchar(16) NOT NULL,
  `hp_k` varchar(20) NOT NULL,
  `status_k` varchar(100) NOT NULL,
  `foto_k` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`no_k`, `nama_k`, `email_k`, `pass_k`, `jk_k`, `jabatan_k`, `tgl_k`, `nik_k`, `npwp_k`, `kk_k`, `hp_k`, `status_k`, `foto_k`) VALUES
(9, 'Abdul Rauf', 'abdulrauf@gmail.com', 'password', 'Pria', 'General Manager', '2019-07-14 08:42:10', '1050245708900001', '058877243015020', '3373031009800004', '081287979222', 'Aktif', 'man4.jpg'),
(10, 'Abdur Razaq', 'abdurrazaq@gmail.com', 'password', 'Pria', 'Admin', '2019-07-10 04:44:12', '1045465708900002', '057735532116020', '4573022008900008', '081230007765', 'Aktif', 'man2.jpg'),
(12, 'Fateema Daud', 'fateemadaud@gmail.com', 'password', 'Wanita', 'Accounting Staff', '2019-07-10 04:56:17', '1030365708900002', '057734243016021', '2243022008900005', '081213434333', 'Aktif', 'woman1.jpg'),
(13, 'Rachel mona', 'rachelmona@gmail.com', 'password', 'Wanita', 'Account Officer', '2019-07-16 01:16:19', '1030365708900002', '057734243016021', '2243022008900005', '081213434333', 'Aktif', 'woman4.jpg'),
(14, 'Salema hussain', 'salemahussain@gmail.com', 'password', 'Wanita', 'Account Officer', '2019-07-10 05:20:08', '1030365708900005', '057732423016022', '3443022008900006', '081232434545', 'Aktif', 'woman5.jpg'),
(15, 'Abdeen Patel', 'abdeenpatel@gmail.com', 'password', 'Pria', 'Komite Pembiayaan', '2019-07-10 05:27:04', '1020634409900007', '058877243015009', '3213022009900009', '081287979222', 'Aktif', 'man3.jpg'),
(16, 'Rachmawati', 'rachmawati@gmail.com', 'password', 'Wanita', 'Teller', '2019-07-10 05:31:00', '1040263107700009', '058899143015001', '5433122009800002', '081283133289', 'Aktif', 'woman3.jpg'),
(17, 'Nadiyya nasr', 'nadiyyanasr@gmail.com', 'password', 'Wanita', 'Teller', '2019-07-16 01:15:57', '1050263265400001', '088132423015001', '3176316007700004', '081211107845', 'Aktif', 'woman2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `monitoring`
--

CREATE TABLE `monitoring` (
  `no_m` int(11) NOT NULL,
  `kd_p` int(11) NOT NULL,
  `id_n` int(11) NOT NULL,
  `m1_o` int(11) NOT NULL,
  `m2_o` int(11) NOT NULL,
  `m3_o` int(11) NOT NULL,
  `m4_o` int(11) NOT NULL,
  `m5_o` int(11) NOT NULL,
  `m6_o` int(11) NOT NULL,
  `m7_o` int(11) NOT NULL,
  `m8_o` int(11) NOT NULL,
  `m9_o` int(11) NOT NULL,
  `m10_o` int(11) NOT NULL,
  `m11_o` int(11) NOT NULL,
  `m12_o` int(11) NOT NULL,
  `m1_p` int(11) NOT NULL,
  `m2_p` int(11) NOT NULL,
  `m3_p` int(11) NOT NULL,
  `m4_p` int(11) NOT NULL,
  `m5_p` int(11) NOT NULL,
  `m6_p` int(11) NOT NULL,
  `m7_p` int(11) NOT NULL,
  `m8_p` int(11) NOT NULL,
  `m9_p` int(11) NOT NULL,
  `m10_p` int(11) NOT NULL,
  `m11_p` int(11) NOT NULL,
  `m12_p` int(11) NOT NULL,
  `jangka_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monitoring`
--

INSERT INTO `monitoring` (`no_m`, `kd_p`, `id_n`, `m1_o`, `m2_o`, `m3_o`, `m4_o`, `m5_o`, `m6_o`, `m7_o`, `m8_o`, `m9_o`, `m10_o`, `m11_o`, `m12_o`, `m1_p`, `m2_p`, `m3_p`, `m4_p`, `m5_p`, `m6_p`, `m7_p`, `m8_p`, `m9_p`, `m10_p`, `m11_p`, `m12_p`, `jangka_p`) VALUES
(4, 3, 5, 2100000, 2100000, 2100000, 2150000, 2150000, 2000000, 2050000, 2100000, 2110000, 2140000, 2170000, 2200000, 900000, 900000, 1000000, 1100000, 1150000, 800000, 800000, 800000, 850000, 850000, 900000, 950000, 12),
(5, 12, 5, 2170000, 2200000, 2200000, 2200000, 2200000, 2300000, 2450000, 2300000, 2300000, 2450000, 2500000, 2500000, 900000, 900000, 900000, 900000, 900000, 1000000, 1000000, 900000, 950000, 1000000, 1100000, 1200000, 12),
(6, 13, 5, 2500000, 2200000, 2000000, 2700000, 2500000, 2800000, 2855000, 2890000, 3000000, 3200000, 3250000, 3400000, 1200000, 1200000, 1200000, 1700000, 1600000, 1600000, 1600000, 1600000, 1700000, 1800000, 2000000, 2000000, 12),
(7, 4, 2, 1000000, 1000000, 1000000, 1000000, 1000000, 1000000, 900000, 800000, 700000, 850000, 500000, 800000, 450000, 450000, 500000, 550000, 600000, 700000, 600000, 500000, 300000, 450000, 250000, 350000, 12),
(8, 5, 1, 1000000, 1100000, 1200000, 1250000, 1250000, 1250000, 1250000, 1250000, 900000, 950000, 650000, 600000, 500000, 500000, 500000, 500000, 500000, 800000, 900000, 900000, 400000, 400000, 300000, 250000, 12),
(9, 6, 3, 2000000, 2000000, 2000000, 2050000, 2100000, 2100000, 2000000, 2100000, 2300000, 2300000, 2300000, 2350000, 800000, 800000, 770000, 800000, 800000, 800000, 700000, 800000, 800000, 850000, 900000, 950000, 12),
(10, 7, 4, 5300000, 4100000, 3300000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1700000, 1500000, 1000000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3),
(11, 8, 6, 1000000, 1000000, 1000000, 1050000, 1100000, 900000, 950000, 1000000, 1100000, 1500000, 1700000, 1650000, 250000, 250000, 250000, 250000, 250000, 200000, 200000, 200000, 200000, 250000, 500000, 450000, 12),
(12, 9, 7, 1250000, 1250000, 1250000, 1260000, 1270000, 1300000, 1300000, 1300000, 1300000, 1400000, 1390000, 1390000, 450000, 450000, 450000, 450000, 500000, 500000, 500000, 700000, 500000, 500000, 550000, 550000, 12),
(13, 10, 8, 2750000, 2750000, 2800000, 2850000, 2950000, 3000000, 2800000, 2950000, 2950000, 3000000, 3100000, 3200000, 1250000, 1200000, 1200000, 1200000, 1300000, 1300000, 1300000, 1700000, 1700000, 1700000, 1650000, 1800000, 12),
(14, 11, 9, 4500000, 4500000, 4500000, 4500000, 4600000, 4650000, 4650000, 4650000, 4650000, 4650000, 5500000, 6000000, 2750000, 2750000, 2750000, 2800000, 2750000, 2750000, 2900000, 2750000, 3000000, 3500000, 4100000, 4000000, 12);

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_n` int(11) NOT NULL,
  `nama_n` varchar(255) NOT NULL,
  `jk_n` varchar(50) NOT NULL,
  `nik_n` varchar(16) NOT NULL,
  `kk_n` varchar(16) NOT NULL,
  `alamat_n` varchar(200) NOT NULL,
  `rt_n` varchar(10) NOT NULL,
  `rw_n` varchar(10) NOT NULL,
  `kel_n` varchar(200) NOT NULL,
  `kec_n` varchar(200) NOT NULL,
  `pos_n` varchar(5) NOT NULL,
  `agama_n` varchar(100) NOT NULL,
  `ibu_n` varchar(255) NOT NULL,
  `pendidikan_n` varchar(10) NOT NULL,
  `hp_n` varchar(20) NOT NULL,
  `is_n` varchar(255) NOT NULL,
  `pekerjaan_n` varchar(100) NOT NULL,
  `penghasilan_n` varchar(100) NOT NULL,
  `bank_n` varchar(255) NOT NULL,
  `rek_n` varchar(20) NOT NULL,
  `foto_n` varchar(300) NOT NULL,
  `ktp_n` varchar(300) NOT NULL,
  `bknikah_n` varchar(300) NOT NULL,
  `tgl_n` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_n`, `nama_n`, `jk_n`, `nik_n`, `kk_n`, `alamat_n`, `rt_n`, `rw_n`, `kel_n`, `kec_n`, `pos_n`, `agama_n`, `ibu_n`, `pendidikan_n`, `hp_n`, `is_n`, `pekerjaan_n`, `penghasilan_n`, `bank_n`, `rek_n`, `foto_n`, `ktp_n`, `bknikah_n`, `tgl_n`) VALUES
(1, 'Udin Marudin', 'Pria', '3208092606830005', '3204061603120003', 'KARANGKOYO', '004', '007', 'KARANGBOLONG', 'KARANGBOLONG', '14045', 'Islam', 'Markonah', 'SMA', '081623333221', 'Neneng Hasanah', 'Wirausaha', '< Rp.500,000', 'Bank CIMB Syariah', '5020100118009', 'boy.png', 'ktp.pdf', 'bknikah.pdf', '2019-07-29 02:02:28'),
(2, 'Iis Surilis', 'Wanita', '3208092607330005', '3104053603120003', 'CICAHEUM', '009', '006', 'CIBEREUM', 'CIBEREUM', '14055', 'Islam', 'Sulistyowati', 'SMA', '081625544221', 'Asep Sunarya', 'Wirausaha', '< Rp.500,000', 'Bank Negara Indonesia Syariah', '5020200218008', 'girl.png', 'ktp.pdf', 'bknikah.pdf', '2019-07-17 03:47:45'),
(3, 'Borkat Hasibuan', 'Pria', '3208095307230005', '3204409603120004', 'CIKARANG', '003', '003', 'CIKOLE', 'CIKOLE', '14025', 'Islam', 'Hasiholan', 'D3', '081621122711', 'Butet Hasea', 'Wirausaha', 'Rp.500,000 - Rp.1,000,000', 'Bank Central Asia', '6860150755', 'boy-1.png', 'ktp.pdf', 'bknikah.pdf', '2019-08-14 10:50:11'),
(4, 'Aji Bramantyo', 'Pria', '3109077706830004', '3204022604140003', 'CICAHEUM', '004', '001', 'CIBEREUM', 'CIBEREUM', '14055', 'Islam', 'Dewi Ayudisa', 'SMP', '081121133411', 'Ayu Anjani', 'Buruh tani', 'Rp.1,000,000 - Rp.4,000,000', 'Bank Rakyat Indonesia Syariah', '1000783215', 'man-3.png', 'ktp.pdf', 'bknikah.pdf', '2019-08-18 03:44:14'),
(5, 'Rini Cenning', 'Wanita', '3103299606830003', '3202206603120002', 'SUKMAJAYA', '001', '001', 'CILODONG', 'CILODONG', '16412', 'Islam', 'Manisi Daeng Tene', 'SD', '082895141311', 'Adi Marauleng', 'Wirausaha', 'Rp.500,000 - Rp.1,000,000', 'Bank Permata Syariah', '971006444', 'girl-1.png', 'ktp.pdf', 'bknikah.pdf', '2019-07-17 04:29:38'),
(6, 'Luthfi Abdillah', 'Pria', '3208092606832355', '3204061603120003', 'BEDAHAN', '004', '003', 'BEDAHAN', 'SAWANGAN', '16519', 'Islam', 'Siti Shafia', 'SMP', '08123459876021', 'Titin Khoirunnisa', 'Buruh tani', '< Rp.500,000', 'Tidak Punya', '', 'man-2.png', 'ktp.pdf', 'bknikah.pdf', '2019-07-27 12:10:46'),
(7, 'Fitriyani', 'Wanita', '3208092606837775', '3244441603120003', 'BEDAHAN', '004', '002', 'BEDAHAN', 'SAWANGAN', '16519', 'Islam', 'Aminah', 'SMA', '085759213987', 'Aditya', 'Buruh cuci', 'Rp.1,000,000 - Rp.4,000,000', 'Bank Rakyat Indonesia Syariah', '1333783215', 'man-4.png', 'ktp.pdf', 'bknikah.pdf', '2019-08-18 03:44:24'),
(8, 'Untung Priyadi', 'Pria', '3208092606991235', '3204409643430004', 'PENGASINAN', '002', '004', 'PENGASINAN', 'SAWANGAN', '16519', 'Islam', 'Fatimah Lestari ', 'D3', '082775141222', 'Juleha Sasmita', 'Wirausaha', 'Rp.1,000,000 - Rp.4,000,000', 'Bank Permata Syariah', '981106321', 'man.png', 'ktp.pdf', 'bknikah.pdf', '2019-08-18 03:44:45'),
(9, 'Bambang Widjaja', 'Pria', '3232192555553000', '3254321603123992', 'LEUWINANGGUNG', '011', '001', 'LEUWINANGGUNG', 'TAPOS', '16456', 'Islam', 'Kasih Mawar Kusuma', 'S1', '085979471357', 'Sri Utari Hardja ', 'Wirausaha', 'Rp.4,000,000 - Rp.6,000,000', 'Bank Negara Indonesia Syariah', '5333200224448', 'man-1.png', 'ktp.pdf', 'bknikah.pdf', '2019-08-18 03:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `pembiayaan`
--

CREATE TABLE `pembiayaan` (
  `kd_p` int(11) NOT NULL,
  `id_n` int(11) NOT NULL,
  `nominal_p` varchar(255) NOT NULL,
  `jangka_p` varchar(2) NOT NULL,
  `bentuk_u` varchar(255) NOT NULL,
  `nama_u` varchar(255) NOT NULL,
  `bidang_u` varchar(255) NOT NULL,
  `lama_u` varchar(100) NOT NULL,
  `jml_kar_u` varchar(100) NOT NULL,
  `alamat_u` varchar(255) NOT NULL,
  `stat_tmpt_u` varchar(100) NOT NULL,
  `omset_u` varchar(100) NOT NULL,
  `laba_u` varchar(100) NOT NULL,
  `stat_surv` varchar(100) NOT NULL,
  `stat_pers` varchar(100) NOT NULL,
  `stat_cair` varchar(100) NOT NULL,
  `stat_pemb` varchar(100) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembiayaan`
--

INSERT INTO `pembiayaan` (`kd_p`, `id_n`, `nominal_p`, `jangka_p`, `bentuk_u`, `nama_u`, `bidang_u`, `lama_u`, `jml_kar_u`, `alamat_u`, `stat_tmpt_u`, `omset_u`, `laba_u`, `stat_surv`, `stat_pers`, `stat_cair`, `stat_pemb`, `tgl_awal`, `tgl_akhir`) VALUES
(3, 5, '2000000', '12', 'Angkringan', 'Angkringan Daeng Tene', 'Kulinari', '< 3 Bulan', '2', 'Jl. Margonda Raya No.477B, Pondok Cina, Depok', 'Milik Sendiri', '2100000', '900000', 'sudah disurvei', 'disetujui', 'sudah dicairkan', 'selesai', '2019-08-02', '2020-08-02'),
(4, 2, '2000000', '12', 'Warung kulakan', 'Warung Iis', 'Perdagangan', '6 - 9 Bulan', '2', '	\r\nJl. Margonda Raya No.488B, Pondok Cina, Depok', 'Milik Sendiri', '1000000', '450000', 'sudah disurvei', 'disetujui', 'sudah dicairkan', 'gagal', '2020-08-01', '2021-08-01'),
(5, 1, '2000000', '12', 'Penjual nasi goreng', 'Nasgor mamang Udin', 'Kulinari', '12 - 24 Bulan', '1', 'Jl. Komjen M jasin No.9, Cimanggis, Depok', 'Sewa / Kontrak', '1000000', '500000', 'sudah disurvei', 'disetujui', 'sudah dicairkan', 'gagal', '2020-08-01', '2021-08-01'),
(6, 3, '2000000', '12', 'Warung kulakan', 'Warung bang Borkat', 'Perdagangan', '< 3 Bulan', '2', 'jl.kalilicin no.80, Sawangan, Depok', 'Milik Keluarga', '2000000', '800000', 'sudah disurvei', 'disetujui', 'sudah dicairkan', 'selesai', '2020-08-01', '2021-08-01'),
(7, 4, '2000000', '3', 'Penjual mie ayam', 'Mie ayam mas Aji', 'Kulinari', '12 - 24 Bulan', '3', 'jl.kalilicin no.12 ,Sawangan, Depok', 'Milik Keluarga', '5300000', '1700000', 'sudah disurvei', 'disetujui', 'sudah dicairkan', 'gagal', '2021-01-01', '2021-03-01'),
(8, 6, '2000000', '12', 'Keripik Pisang', 'Maknyosss', 'Produksi', '< 3 Bulan', '1', 'BEDAHAN', 'Milik Sendiri', '1000000', '250000', 'sudah disurvei', 'disetujui', 'sudah dicairkan', 'selesai', '2021-01-01', '2022-01-01'),
(9, 7, '2000000', '12', 'Laundry', 'Kenanga', 'Jasa', '< 3 Bulan', '1', 'BEDAHAN', 'Milik Sendiri', '1250000', '450000', 'sudah disurvei', 'disetujui', 'sudah dicairkan', 'selesai', '2022-01-01', '2023-01-01'),
(10, 8, '1000000', '12', 'Sate Solo', 'Berkah', 'Kulinari', '12 - 24 Bulan', '2', 'BOJONG SARI', 'Milik Sendiri', '2750000', '1250000', 'sudah disurvei', 'disetujui', 'sudah dicairkan', 'selesai', '2023-01-01', '2024-01-01'),
(11, 9, '2000000', '12', 'Toko Alat Tulis', 'Amanah', 'Perdagangan', '6 - 9 Bulan', '1', 'LEUWINANGGUNG', 'Sewa / Kontrak', '4500000', '2750000', 'sudah disurvei', 'disetujui', 'sudah dicairkan', 'selesai', '2023-01-01', '2024-01-01'),
(12, 5, '2000000', '12', 'Angkringan', 'Angkringan Daeng Tene', 'Kulinari', '12 - 24 Bulan', '2', 'Jl. Margonda Raya No.477B, Pondok Cina, Depok', 'Milik Sendiri', '2170000', '900000', 'sudah disurvei', 'disetujui', 'sudah dicairkan', 'selesai', '2021-08-21', '2022-08-21'),
(13, 5, '2000000', '12', 'Angkringan', 'Angkringan Daeng Tene', 'Kulinari', '12 - 24 Bulan', '2', 'Jl. Margonda Raya No.477B, Pondok Cina, Depok', 'Milik Sendiri', '2500000', '1200000', 'sudah disurvei', 'disetujui', 'sudah dicairkan', 'selesai', '2023-08-21', '2024-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `pencairan`
--

CREATE TABLE `pencairan` (
  `no_c` int(11) NOT NULL,
  `kd_p` int(11) NOT NULL,
  `id_n` int(11) NOT NULL,
  `jangka_p` int(11) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `pokok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pencairan`
--

INSERT INTO `pencairan` (`no_c`, `kd_p`, `id_n`, `jangka_p`, `tgl_awal`, `tgl_akhir`, `pokok`) VALUES
(4, 3, 5, 12, '2019-08-02', '2020-08-02', 166667),
(5, 12, 5, 12, '2021-08-21', '2022-08-21', 166667),
(6, 13, 5, 12, '2023-08-21', '2024-08-21', 166667),
(7, 4, 2, 12, '2020-08-01', '2021-08-01', 166667),
(8, 5, 1, 12, '2020-08-01', '2021-08-01', 166667),
(9, 6, 3, 12, '2020-08-01', '2021-08-01', 166667),
(10, 7, 4, 3, '2021-01-01', '2021-03-01', 666667),
(11, 8, 6, 12, '2021-01-01', '2022-01-01', 166667),
(12, 9, 7, 12, '2022-01-01', '2023-01-01', 166667),
(13, 10, 8, 12, '2023-01-01', '2024-01-01', 83333),
(14, 11, 9, 12, '2023-01-01', '2024-01-01', 166667);

-- --------------------------------------------------------

--
-- Table structure for table `persetujuan`
--

CREATE TABLE `persetujuan` (
  `no_pers` int(11) NOT NULL,
  `kd_p` int(11) NOT NULL,
  `survei_kondisi` varchar(100) NOT NULL,
  `survei_karakter` varchar(100) NOT NULL,
  `survei_usaha` varchar(100) NOT NULL,
  `tgl_pers` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persetujuan`
--

INSERT INTO `persetujuan` (`no_pers`, `kd_p`, `survei_kondisi`, `survei_karakter`, `survei_usaha`, `tgl_pers`) VALUES
(4, 3, 'layak', 'layak', 'layak', '2019-07-31 04:58:39'),
(5, 4, 'layak', 'layak', 'layak', '2019-08-14 12:02:27'),
(6, 5, 'layak', 'layak', 'layak', '2019-08-14 12:45:56'),
(7, 6, 'layak', 'layak', 'layak', '2019-08-14 12:46:04'),
(8, 7, 'layak', 'layak', 'layak', '2019-08-14 12:46:11'),
(9, 8, 'layak', 'layak', 'layak', '2019-08-14 12:46:19'),
(10, 9, 'layak', 'layak', 'layak', '2019-08-14 12:46:27'),
(11, 10, 'layak', 'layak', 'layak', '2019-08-14 12:46:34'),
(12, 11, 'layak', 'layak', 'layak', '2019-08-14 12:46:42'),
(13, 12, 'layak', 'layak', 'layak', '2019-08-15 10:24:43'),
(14, 13, 'layak', 'layak', 'layak', '2019-08-15 10:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `survei`
--

CREATE TABLE `survei` (
  `kd_s` int(11) NOT NULL,
  `kd_p` int(11) NOT NULL,
  `tgl_s` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_ts` varchar(255) NOT NULL,
  `ibu_ts` varchar(255) NOT NULL,
  `ayah_ts` varchar(255) NOT NULL,
  `anak1_ts` varchar(255) NOT NULL,
  `anak2_ts` varchar(255) NOT NULL,
  `anak3_ts` varchar(255) NOT NULL,
  `cucu1_ts` varchar(255) NOT NULL,
  `cucu2_ts` varchar(255) NOT NULL,
  `cucu3_ts` varchar(255) NOT NULL,
  `lokasi_rs` varchar(255) NOT NULL,
  `milik_rs` varchar(255) NOT NULL,
  `ukuran_rs` varchar(100) NOT NULL,
  `dinding_rs` varchar(100) NOT NULL,
  `lantai_rs` varchar(100) NOT NULL,
  `atap_rs` varchar(100) NOT NULL,
  `pintu_rs` varchar(100) NOT NULL,
  `jendela_rs` varchar(100) NOT NULL,
  `jamban_rs` varchar(100) NOT NULL,
  `toilet_rs` varchar(100) NOT NULL,
  `karakter1_s` varchar(10) NOT NULL,
  `karakter2_s` varchar(10) NOT NULL,
  `karakter3_s` varchar(10) NOT NULL,
  `karakter4_s` varchar(10) NOT NULL,
  `karakter5_s` varchar(10) NOT NULL,
  `karakter6_s` varchar(10) NOT NULL,
  `bidang_us` varchar(100) NOT NULL,
  `produk_us` varchar(100) NOT NULL,
  `karyawan_us` varchar(50) NOT NULL,
  `jarak_us` varchar(50) NOT NULL,
  `kondisi1_us` varchar(100) NOT NULL,
  `kondisi2_us` varchar(100) NOT NULL,
  `kelola_us` varchar(100) NOT NULL,
  `sedia_us` varchar(100) NOT NULL,
  `pemasok_us` varchar(100) NOT NULL,
  `saingan_us` varchar(100) NOT NULL,
  `pengalaman_us` varchar(100) NOT NULL,
  `rcr_us` varchar(100) NOT NULL,
  `gm_us` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `survei`
--

INSERT INTO `survei` (`kd_s`, `kd_p`, `tgl_s`, `is_ts`, `ibu_ts`, `ayah_ts`, `anak1_ts`, `anak2_ts`, `anak3_ts`, `cucu1_ts`, `cucu2_ts`, `cucu3_ts`, `lokasi_rs`, `milik_rs`, `ukuran_rs`, `dinding_rs`, `lantai_rs`, `atap_rs`, `pintu_rs`, `jendela_rs`, `jamban_rs`, `toilet_rs`, `karakter1_s`, `karakter2_s`, `karakter3_s`, `karakter4_s`, `karakter5_s`, `karakter6_s`, `bidang_us`, `produk_us`, `karyawan_us`, `jarak_us`, `kondisi1_us`, `kondisi2_us`, `kelola_us`, `sedia_us`, `pemasok_us`, `saingan_us`, `pengalaman_us`, `rcr_us`, `gm_us`) VALUES
(3, 3, '2019-07-24 09:46:50', 'Adi Marauleng', 'Manisi Daeng Tene', '', 'Andi Marauleng', '', '', '', '', '', 'Jl. Majelis No.83 Sukmajaya, Depok', 'kontrak/sewa', '3X7 m', 'batako', 'keramik', 'genteng keramik', 'kayu', 'kaca mati', 'leher angsa', 'jongkok', 'tidak', 'tidak', 'ya', 'tidak', 'tidak', 'tidak', 'kulinari', 'kebutuhan pokok', '>5 orang', '2 - 3 km', 'bangunan permanen', 'gang', 'pengelolaan sederhana', 'setiap saat', '2 - 3 pemasok', '3 - 10 usaha', '> 2 tahun', '< 25%', '> 35%'),
(4, 4, '2019-08-14 10:28:29', 'Asep Sunarya', 'Sulistyowati', '', '', '', '', '', '', '', 'CICAHEUM RT09/RW06', 'milik sendiri', '3X7 m', 'batako', 'keramik', 'genteng keramik', 'kayu', 'kaca mati', 'leher angsa', 'jongkok', 'tidak', 'tidak', 'ya', 'tidak', 'tidak', 'tidak', 'perdangan', 'kebutuhan pokok', '<2 orang', '< 1 km', 'bangunan permanen', 'gang', 'cukup baik', 'dengan pemesanan', '1 pemasok', '1 - 2 usaha', '< 1 tahun', '35% - 50%', '> 35%'),
(5, 5, '2019-08-14 10:42:54', 'Neneng Hasanah', 'Markonah', '', '', '', '', '', '', '', 'Jl. Komjen M jasin No.9, Cimanggis, Depok', 'kontrak/sewa', '3X7 m', 'batako', 'keramik', 'genteng keramik', 'kayu', 'kaca mati', 'leher angsa', 'jongkok', 'tidak', 'tidak', 'ya', 'tidak', 'tidak', 'tidak', 'kulinari', 'kebutuhan pokok', '2 - 3 orang', '< 1 km', 'bangunan permanen', 'jalan raya', 'pengelolaan sederhana', 'setiap saat', '1 pemasok', '3 - 10 usaha', '1 - 2 tahun', '25% - 35%', '> 35%'),
(6, 6, '2019-08-14 10:48:58', 'Butet Hasea', 'Hasiholan', '', '', '', '', '', '', '', 'jl.kalilicin no.80, Sawangan, Depok', 'milik sendiri', '3X7 m', 'batako', 'keramik', 'genteng keramik', 'kayu', 'kaca mati', 'leher angsa', 'jongkok', 'tidak', 'tidak', 'ya', 'tidak', 'tidak', 'tidak', 'perdangan', 'perlengkapan', '<2 orang', '1 - 2 km', 'bangunan permanen', 'gang', 'cukup baik', 'setiap saat', '2 - 3 pemasok', '3 - 10 usaha', '1 - 2 tahun', '< 25%', '> 35%'),
(7, 7, '2019-08-14 10:58:10', 'Ayu Anjani', 'Dewi Ayudisa', '', '', '', '', '', '', '', 'jl.kalilicin no.12 ,Sawangan, Depok', 'numpang', '3X7 m', 'batako', 'keramik', 'genteng keramik', 'kayu', 'kaca mati', 'leher angsa', 'jongkok', 'tidak', 'tidak', 'ya', 'tidak', 'tidak', 'tidak', 'kulinari', 'kebutuhan pokok', '2 - 3 orang', '1 - 2 km', 'bangunan permanen', 'jalan raya', 'cukup baik', 'setiap saat', '2 - 3 pemasok', '3 - 10 usaha', '1 - 2 tahun', '35% - 50%', '25% - 35%'),
(8, 8, '2019-08-14 11:42:34', 'Titin Khoirunnisa', 'Siti Shafia', '', '', '', '', '', '', '', 'BEDAHAN', 'milik sendiri', '3X7 m', 'batako', 'keramik', 'genteng keramik', 'kayu', 'kaca mati', 'leher angsa', 'jongkok', 'tidak', 'tidak', 'ya', 'tidak', 'tidak', 'tidak', 'produksi', 'kebutuhan pokok', '2 - 3 orang', '1 - 2 km', 'akses cukup baik', 'seizin lingkungan', 'cukup baik', 'musiman', '2 - 3 pemasok', '1 - 2 usaha', '< 1 tahun', '> 50%', '25% - 35%'),
(9, 9, '2019-08-14 11:48:17', 'Aditya', 'Aminah', '', '', '', '', '', '', '', 'BEDAHAN', 'milik sendiri', '3X7 m', 'batako', 'keramik', 'genteng keramik', 'kayu', 'kaca mati', 'leher angsa', 'jongkok', 'tidak', 'tidak', 'ya', 'tidak', 'tidak', 'tidak', 'jasa', 'lainyya', '<2 orang', '< 1 km', 'bangunan permanen', 'gang', 'pengelolaan sederhana', 'setiap saat', '1 pemasok', '1 - 2 usaha', '1 - 2 tahun', '35% - 50%', '> 35%'),
(10, 10, '2019-08-14 11:52:23', 'Juleha Sasmita', 'Fatimah Lestari', '', '', '', '', '', '', '', 'BOJONG SARI', 'milik sendiri', '3X7 m', 'batako', 'keramik', 'genteng keramik', 'kayu', 'kaca mati', 'leher angsa', 'jongkok', 'tidak', 'tidak', 'ya', 'tidak', 'tidak', 'tidak', 'kulinari', 'kebutuhan pokok', '2 - 3 orang', '1 - 2 km', 'bangunan permanen', 'jalan raya', 'cukup baik', 'setiap saat', '2 - 3 pemasok', '1 - 2 usaha', '1 - 2 tahun', '< 25%', '> 35%'),
(11, 11, '2019-08-14 11:58:20', 'Sri Utari Hardja ', 'Kasih Mawar Kusuma', '', '', '', '', '', '', '', 'LEUWINANGGUNG', 'kontrak/sewa', '3X7 m', 'batako', 'keramik', 'genteng keramik', 'kayu', 'kaca mati', 'leher angsa', 'jongkok', 'tidak', 'tidak', 'ya', 'tidak', 'tidak', 'tidak', 'perdangan', 'perlengkapan', '2 - 3 orang', '< 1 km', 'bangunan permanen', 'gang', 'cukup baik', 'setiap saat', '2 - 3 pemasok', '1 - 2 usaha', '< 1 tahun', '< 25%', '> 35%'),
(12, 12, '2019-08-15 10:19:28', 'Adi Marauleng', 'Manisi Daeng Tene', '', 'Andi Marauleng', '', '', '', '', '', 'Jl. Majelis No.83 Sukmajaya, Depok', 'kontrak/sewa', '3X7 m', 'batako', 'keramik', 'genteng keramik', 'kayu', 'kaca mati', 'leher angsa', 'jongkok', 'tidak', 'tidak', 'ya', 'tidak', 'tidak', 'tidak', 'kulinari', 'kebutuhan pokok', '<2 orang', '< 1 km', 'bangunan permanen', 'gang', 'pengelolaan sederhana', 'setiap saat', '2 - 3 pemasok', '1 - 2 usaha', '1 - 2 tahun', '< 25%', '> 35%'),
(13, 13, '2019-08-15 10:21:57', 'Adi Marauleng', 'Manisi Daeng Tene', '', 'Andi Marauleng', '', '', '', '', '', 'Jl. Majelis No.83 Sukmajaya, Depok', 'milik sendiri', '3X7 m', 'batako', 'keramik', 'genteng keramik', 'kayu', 'kaca mati', 'leher angsa', 'jongkok', 'tidak', 'tidak', 'ya', 'tidak', 'tidak', 'tidak', 'kulinari', 'kebutuhan pokok', '2 - 3 orang', '< 1 km', 'bangunan permanen', 'gang', 'cukup baik', 'setiap saat', '2 - 3 pemasok', '1 - 2 usaha', '> 2 tahun', '< 25%', '> 35%');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`no_acara`);

--
-- Indexes for table `angsuran`
--
ALTER TABLE `angsuran`
  ADD PRIMARY KEY (`no_a`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`no_k`);

--
-- Indexes for table `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`no_m`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_n`);

--
-- Indexes for table `pembiayaan`
--
ALTER TABLE `pembiayaan`
  ADD PRIMARY KEY (`kd_p`);

--
-- Indexes for table `pencairan`
--
ALTER TABLE `pencairan`
  ADD PRIMARY KEY (`no_c`);

--
-- Indexes for table `persetujuan`
--
ALTER TABLE `persetujuan`
  ADD PRIMARY KEY (`no_pers`);

--
-- Indexes for table `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`kd_s`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `no_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `angsuran`
--
ALTER TABLE `angsuran`
  MODIFY `no_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `no_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `no_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_n` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembiayaan`
--
ALTER TABLE `pembiayaan`
  MODIFY `kd_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pencairan`
--
ALTER TABLE `pencairan`
  MODIFY `no_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `persetujuan`
--
ALTER TABLE `persetujuan`
  MODIFY `no_pers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `survei`
--
ALTER TABLE `survei`
  MODIFY `kd_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
