-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2021 at 08:00 PM
-- Server version: 5.7.34-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k6672259_dijkstraspklu`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id_aplikasi` int(11) NOT NULL,
  `nama_aplikasi` varchar(100) NOT NULL,
  `tentang_kami` text NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `alamat_pemilik` varchar(100) NOT NULL,
  `koordinat_pemilik` varchar(100) NOT NULL,
  `notelp_pemilik` varchar(20) NOT NULL,
  `email_pemilik` varchar(100) NOT NULL,
  `logo_aplikasi` varchar(100) NOT NULL,
  `icon_aplikasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aplikasi`
--

INSERT INTO `aplikasi` (`id_aplikasi`, `nama_aplikasi`, `tentang_kami`, `nama_pemilik`, `alamat_pemilik`, `koordinat_pemilik`, `notelp_pemilik`, `email_pemilik`, `logo_aplikasi`, `icon_aplikasi`) VALUES
(1, 'LOKASI SPKLU DKI JAKARTA', '<p style=\"text-align: justify;\">Dinas Perhubungan merupakan unsur pelaksana otonomi daerah di bidang perhubungan yang berkedudukan di bawah dan bertanggung jawab kepada Gubernur melalui SEKDA. Dinas Perhubungan mempunyai tugas pokok melaksanakan urusan pemerintahan daerah bidang perhubungan berdasarkan asas otonomi daerah dan tugas pembantuan. Dinas Perhubungan dalam melaksanakan tugasnya menyelenggarakan fungsi Perumusan dan pelaksanaan kebijakan Bidang Lalu Lintas Jalan, Angkutan Jalan, Jaringan Transportasi dan Perkeretaapian, dan Pelayaran.</p>', 'Dinas Pehubungan Provinsi DKI Jakarta', 'Jl. Taman Jati Baru No.1, RT.17/RW.1, Cideng, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ib', '-6.193308469107628, 106.7940809939985', '+62213501349', 'dishubdkijakarta@gmail.com', '656063xxxx.png', '871579logo22.png');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(23) NOT NULL,
  `tgl_buat` date NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `foto_berita` varchar(100) NOT NULL,
  `jml_dibaca` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `tgl_buat`, `judul_berita`, `isi_berita`, `foto_berita`, `jml_dibaca`) VALUES
(1, '2021-07-21', 'Pengguna Kendaraan Listrik Wajib Tahu Bedanya SPKLU dan SPBKLU', 'Jakarta: Pemerintah tengah mendorong penggunaan <a href=\"https://www.medcom.id/tag/15108/kendaraan-listrik\">Kendaraan Bermotor Listrik</a> Berbasis Baterai (KBLBB) lebih masif. Bila kendaraan konvensional mengisi bahan bakar di Stasiun Pengisian Bahan bakar Umum (SPBU) atau pom bensin, bagaimana dengan KBLBB?<br />&nbsp;<br /> Para pengguna <a href=\"https://www.medcom.id/tag/2682/motor-listrik\">kendaraan listrik</a> bisa mengisi daya di SPKLU dan SPBKLU. Apa beda dari kedua fasilitas tersebut?<br />&nbsp;<br /> SPKLU merupakan kepanjangan dari Stasiun Pengisian <a href=\"https://www.medcom.id/tag/1706/mobil-listrik\">Kendaraan Listrik</a> Umum, yakni tempat untuk mengisi daya (<em>charge</em>) listrik sebagai bahan bakar kendaraan listrik. Ibarat sebuah telepon genggam, kendaraan listrik juga butuh di-<em>charge</em>.<br /><br />Sedangkan SPBKLU adalah Stasiun Penukaran Baterai Kendaraan Listrik Umum. Dalam kendaraan listrik, terdapat baterai sebagai tempat penyimpanan daya listrik. Baterai yang ada di kendaraan bisa ditukarkan di SPBKLU.<br />&nbsp;<br /> \"SPKLU merupakan tempat pengisian ulang baterai kendaraan bermotor listrik. SPBKLU merupakan tempat penukaran baterai kendaraan bermotor listrik,\" kata Direktur Teknik dan Lingkungan Ketenagalistrikan Kementerian Energi dan Sumber Daya Mineral (ESDM) Wanhar, Jumat, 5 Februari 2021.<br />&nbsp;<br /> Wanhar menjelaskan terdapat perbedaan waktu untuk mengisi ulang daya dan menukarkan baterai pada masing-masing fasilitas tersebut. Ia bilang, untuk mengisi daya baterai di SPKLU, pengguna kendaraan membutuhkan waktu selama 30-90 menit. Sementara untuk penukaran baterai hanya menghabiskan waktu 3-5 menit.<br />&nbsp;<br /> Saat ini secara total, terdapat 102 unit SPKLU. Jumlah tersebut berada di 73 lokasi di Indonesia. Sedangkan untuk SPBKLU terdapat 13 unit yang berada di 12 lokasi di Indonesia.<br />&nbsp;<br /> Wanhar menjelaskan pemerintah telah mengeluarkan Peraturan Presiden Nomor 55 Tahun 2019 tentang percepaan program KBLBB untuk transportasi jalan. Perpres tersebut juga ditindaklanjuti oleh aturan turunan dalam bentuk Peraturan Menteri Energi dan Sumber Daya Mineral (ESDM) Nomor 13 Tahun 2020 yang salah satunya mengatur mengenai infrastruktur pengisian daya KBLBB.<br />&nbsp;<br /> Dalam beleid tersebut menyatakan penyediaan infrastruktur pengisian listrik untuk KBLBB dapat dilaksanakan oleh Badan Usaha Milik Negara (BUMN) bidang energi maupun badan usaha lainnya. Namun untuk pertama kali, penugasan diberikan pada PT PLN (Persero). Ke depannya PLN dapat bekerja sama dengan badan usaha lainnya untuk membangun SPKLU.<br />&nbsp;<br /> \"Dimungkinkan PLN bekerja sama dengan SPBU Pertamina, SPBU swasta, pihak pengelola parkir, pihak pengelola <em>rest area </em>jalan tol, pusat perbelanjaan, pengelola bandara, pengelola apartemen, bahkan kantor-kantor pemerintahan dengan layanan normal <em>charging, fast charging</em>, atau <em>ultrafast charging </em>yang disesuaikan dengan kebutuhan konsumen pengguna kendaraan bermotor listrik,\" jelas Wanhar.', '76582689SB57FEHN.jpeg', 0),
(2, '2021-07-21', 'SPKLU di Jakarta Selatan Mulai Dioperasikan, Ini Dia Lokasinya', '<p><strong class=\"style\">OTOSIA.COM</strong> - Pertamina mulai mengoperasikan Stasiun Pengisian Kendaraan Listrik Umum (SPKLU) di SPBU Fatmawati, Jakarta Selatan.</p>\r\n<p>SPKLU yang terpasang di SPBU Fatmawati ini merupakan Stasiun Pengisian Daya Fast Charging 50 kW yang mendukung pengisian daya dari berbagai type gun <a href=\"https://www.otosia.com/berita/mobil-listrik-buatan-india-diklaim-sekuat-tank-dan-punya-rating-keselamatan-5-bintang.html\" target=\"_blank\">mobil listrik</a> di Indonesia.</p>\r\n<p>\"SPKLU tersebut dilengkapi oleh beberapa tipe gun atau alat pengisian daya ke kendaraan yang sesuai dengan standar Eropa maupun Jepang,\" ujar Fajriyah, Vice President Corporate Communication Pertamina.<br /><br /></p>\r\n<p>Seperti gun CCS2 (Europe standard), Chademo (Japanese standard) dan 65 kW AC berupa 43k W plug AC Type 2 dan 22 kW inlet AC type 2 yang digunakan oleh <a href=\"https://www.otosia.com/berita/uji-mobil-listrik-hyundai-kona-dapat-5-bintang-skor-toyota-c-hr-lebih-baik-ketimbang-honda-cr-v.html\" target=\"_blank\">mobil listrik</a> di Indonesia saat ini dan bisa dipakai pada saat yang bersamaan.</p>\r\n<p>Selain itu, SPKLU ini memiliki fasilitas yang dapat mengisi dua kendaraan sekaligus (2 in 1) dengan metode fast charging. Dengan demikian pemilik kendaraan listrik tidak perlu menunggu terlalu lama selama masa pengisian.<br /><br /></p>\r\n<p>Lokasi SPBU Fatmawati pun dipilih dengan berbagai pertimbangan. Selain wilayah ini termasuk memiliki pasar yang potensial, lokasi tersebut juga memiliki fasilitas tempat tunggu baik restaurant ataupun gerai kopi yang dapat digunakan konsumen menunggu pengisian daya berlangsung.</p>\r\n<p>\"<a href=\"https://www.otosia.com/berita/ini-janji-dan-kendala-nissan-pasarkan-mobil-listik-di-indonesia.html\" target=\"_blank\">Mobil listrik</a> diprediksi akan menjadi trend di masa depan. Karena itu Pertamina mulai mempersiapkan diri sejak saat ini untuk mengantisipasi transisi energi yang akan terjadi,\" tutup Fajriyah.</p>', '8214330000479564.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(50) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) DEFAULT NULL,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('27619ec798f4b2450dcc17afc187161c', '123.253.235.217', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 1626889808, ''),
('3530143e8911d312555e73938faa860b', '51.15.191.81', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:58.0) G', 1626942514, ''),
('5e193974399dad00e2eb2b0c21b3e1c1', '115.178.249.129', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:52.0) ', 1626981356, ''),
('70be7c9dbb934d49d0dd11bd4675ee07', '195.154.61.206', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:58.0) G', 1626944590, ''),
('7f22c1ed5983d8feef589f1504650f1f', '123.253.235.217', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 1626891442, 'a:7:{s:9:\"user_data\";s:0:\"\";s:8:\"username\";s:5:\"admin\";s:11:\"namalengkap\";s:14:\"Admin Su Admin\";s:4:\"foto\";s:15:\"159301admin.png\";s:8:\"id_login\";s:23:\"190380494360f85ed80e275\";s:2:\"id\";s:1:\"1\";s:13:\"hasildijkstra\";s:29:\"O-11,11-5, 5-4, 4-1, 1-0, 0-D\";}'),
('c9319471173d7412dc3e123449cb8bfa', '51.15.191.81', 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:58.0) G', 1626942978, ''),
('f01d30ed432496eb112e64ca2c91dd1f', '180.252.249.63', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', 1626919206, 'a:2:{s:9:\"user_data\";s:0:\"\";s:13:\"hasildijkstra\";s:19:\"O-10,10-9, 9-8, 8-D\";}');

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `file_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`id_foto`, `id_tempat`, `file_foto`) VALUES
(1, 1, '78299aa0f0673-c2c5-4479-ac70-65df08869ad6_169.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `jalur`
--

CREATE TABLE `jalur` (
  `id_jalur` int(11) NOT NULL,
  `titik_awal` int(11) NOT NULL,
  `titik_akhir` int(11) NOT NULL,
  `jarak` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jalur`
--

INSERT INTO `jalur` (`id_jalur`, `titik_awal`, `titik_akhir`, `jarak`) VALUES
(1, 10, 6, 1373.18),
(2, 6, 11, 1308.54),
(3, 11, 5, 2171.07),
(4, 5, 4, 1525.11),
(5, 4, 1, 1987.77),
(6, 5, 3, 1539.72),
(7, 3, 5, 1553.73),
(8, 11, 8, 2856.12),
(9, 10, 6, 1373.18),
(10, 11, 6, 1300.93),
(11, 6, 10, 1401.41),
(12, 5, 11, 2174.06),
(13, 4, 5, 1534.55),
(14, 1, 4, 1987.77),
(15, 8, 9, 1654.62),
(16, 9, 8, 1654.62),
(17, 8, 7, 2727.9),
(18, 7, 8, 2736.81),
(19, 3, 19, 2259.93),
(20, 19, 3, 2259.93),
(21, 3, 1, 2433.17),
(22, 1, 3, 2433.17),
(23, 1, 2, 1706),
(24, 2, 1, 1706),
(25, 2, 19, 1777.42),
(26, 19, 2, 1777.42),
(27, 2, 12, 2138.12),
(28, 12, 2, 2138.12),
(29, 19, 7, 1104.17),
(31, 1, 0, 1775.72),
(32, 0, 1, 1775.72),
(33, 7, 20, 4059.43),
(34, 20, 7, 4059.43),
(35, 9, 10, 2071.67),
(36, 10, 9, 2071.67),
(37, 8, 13, 4155.44),
(38, 13, 8, 4155.44),
(39, 23, 4, 650.935);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(7) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
('3101010', 'KEPULAUAN SERIBU SELATAN'),
('3101020', 'KEPULAUAN SERIBU UTARA'),
('3171010', 'JAGAKARSA'),
('3171020', 'PASAR MINGGU'),
('3171030', 'CILANDAK'),
('3171040', 'PESANGGRAHAN'),
('3171050', 'KEBAYORAN LAMA'),
('3171060', 'KEBAYORAN BARU'),
('3171070', 'MAMPANG PRAPATAN'),
('3171080', 'PANCORAN'),
('3171090', 'TEBET'),
('3171100', 'SETIA BUDI'),
('3172010', 'PASAR REBO'),
('3172020', 'CIRACAS'),
('3172030', 'CIPAYUNG'),
('3172040', 'MAKASAR'),
('3172050', 'KRAMAT JATI'),
('3172060', 'JATINEGARA'),
('3172070', 'DUREN SAWIT'),
('3172080', 'CAKUNG'),
('3172090', 'PULO GADUNG'),
('3172100', 'MATRAMAN'),
('3173010', 'TANAH ABANG'),
('3173020', 'MENTENG'),
('3173030', 'SENEN'),
('3173040', 'JOHAR BARU'),
('3173050', 'CEMPAKA PUTIH'),
('3173060', 'KEMAYORAN'),
('3173070', 'SAWAH BESAR'),
('3173080', 'GAMBIR'),
('3174010', 'KEMBANGAN'),
('3174020', 'KEBON JERUK'),
('3174030', 'PALMERAH'),
('3174040', 'GROGOL PETAMBURAN'),
('3174050', 'TAMBORA'),
('3174060', 'TAMAN SARI'),
('3174070', 'CENGKARENG'),
('3174080', 'KALI DERES'),
('3175010', 'PENJARINGAN'),
('3175020', 'PADEMANGAN'),
('3175030', 'TANJUNG PRIOK'),
('3175040', 'KOJA'),
('3175050', 'KELAPA GADING'),
('3175060', 'CILINCING');

-- --------------------------------------------------------

--
-- Table structure for table `kontakkami`
--

CREATE TABLE `kontakkami` (
  `id_kontakkami` int(11) NOT NULL,
  `nama_pengirim` varchar(100) NOT NULL,
  `email_pengirim` varchar(100) NOT NULL,
  `tgl_buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `judul_pesan` varchar(100) NOT NULL,
  `isi_pesan` text NOT NULL,
  `jawaban` text NOT NULL,
  `tgl_jawab` date NOT NULL,
  `status_kontakkami` varchar(20) NOT NULL DEFAULT 'Baru'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(23) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `no_telepon` varchar(25) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `username` varchar(23) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_lengkap`, `jenis_kelamin`, `no_telepon`, `foto`, `username`, `password`) VALUES
(1, 'Admin Su Admin', 'Laki-laki', '08888272711', '159301admin.png', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `id_tempat` int(4) NOT NULL,
  `id_kecamatan` varchar(7) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `deskripsi_tempat` text NOT NULL,
  `alamat_tempat` varchar(100) NOT NULL,
  `notelp_tempat` varchar(20) NOT NULL,
  `koordinat_tempat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `id_kecamatan`, `nama_tempat`, `deskripsi_tempat`, `alamat_tempat`, `notelp_tempat`, `koordinat_tempat`) VALUES
(1, '3173080', 'SPKLU PLN', '-', 'Jl. M.I. Ridwan Rais No.2-4, RT.7/RW.1, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus ', '-', '-6.180676027191859,106.83277092924035'),
(2, '3171060', 'SPKLU PLN UP3 Bulungan', 'Terletak di PLN UP3 Bulungan Kebayoran Baru', 'Jl. Sisingamangaraja No.1', '+62217244754', '-6.2392653286837625, 106.79805202598895');

-- --------------------------------------------------------

--
-- Table structure for table `temp_carirute`
--

CREATE TABLE `temp_carirute` (
  `rute` text NOT NULL,
  `jarak` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `titik`
--

CREATE TABLE `titik` (
  `id_titik` int(11) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `nama_titik` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `titik`
--

INSERT INTO `titik` (`id_titik`, `latitude`, `longitude`, `nama_titik`) VALUES
(0, '-6.239963302557083', '106.8252964232178', 'Jl. Kuningan Barat Raya No.4, RT.1/RW.3, Kuningan Bar., Kec. Mampang Prpt., Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12710, Indonesia'),
(1, '-6.225799630167089', '106.83267786242678', 'Jl. Amsar, RT.7/RW.2, Kuningan, Kuningan Tim., Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12950, Indonesia'),
(2, '-6.223751838679018', '106.8479557249756', 'Jl. HOS. Cokroaminoto, Daerah Khusus Ibukota Jakarta, Indonesia'),
(3, '-6.204297421822454', '106.82872965075686', 'Jl. Latuharhary No.12a, RT.12/RW.4, Menteng, Kec. Menteng, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10310, Indonesia'),
(4, '-6.216456516654139', '106.81718542315676', 'Plaza Sentral, Karet Semanggi, Kecamatan Setiabudi, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta, Indonesia'),
(5, '-6.201396262988687', '106.8149967406006', 'Jl. Penjernihan 1, Karet Tengsin, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10250, Indonesia'),
(6, '-6.17170113255078', '106.82237817980959', 'Jl. Medan Merdeka Barat No.1, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10110, Indonesia'),
(7, '-6.199348376554012', '106.85404970385744', 'Flyover Matraman, Palmeriam, Kec. Matraman, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia'),
(8, '-6.1785277469287125', '106.8421192381592', 'Jl. Pasar Senen, Kec. Senen, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10410, Indonesia'),
(9, '-6.16009568630302', '106.83765604235842', 'Jl. Gn. Sahari No.51A, RT.1/RW.1, Gn. Sahari Sel., Kec. Kemayoran, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10610, Indonesia'),
(10, '-6.159583675474388', '106.81894495227053', 'Jl. Gajah Mada No.33, RT.5/RW.7, Krukut, Kec. Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11140, Indonesia'),
(11, '-6.181941021104648', '106.81671335437014', '19 Jl. Taman Kb. Sirih, Jakarta Pusat 10250'),
(12, '-6.224011414076582', '106.86727486600793', 'No.102 Jl. Jatinegara Timur, Jakarta Timur 13310'),
(13, '-6.165304703114235', '106.87723122587121', 'Itc cempaka mas office tower lantai 12, RW.8, Sumur Batu, Kec. Kemayoran, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10640, Indonesia'),
(14, '-6.137482597196511', '106.81697845458984', 'Jalan Mangga Dua, Tamansari, RT.2/RW.4, Pinangsia, Kec. Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11110, Indonesia'),
(15, '-6.1451431718349045', '106.83397255887903', 'Halte Gambir Expo Pintu 3, Benyamien Suaib, Pademangan Tim., Kec. Pademangan, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14410, Indonesia'),
(16, '-6.142753716537057', '106.848735437297', 'Halte Gambir Expo Pintu 3, Benyamien Suaib, Pademangan Tim., Kec. Pademangan, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14410, Indonesia'),
(17, '-6.2577766748834645', '106.86384163846887', 'Jl. Dewi Sartika No.6, RT.6/RW.13, Cawang, Kec. Kramat jati, Daerah Khusus Ibukota Jakarta 13630, Indonesia'),
(18, '-6.176910035329734', '106.89508400907434', 'Jl. Perintis Kemerdekaan Blok 4 No.6, RT.8/RW.8, Pulo Gadung, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13260, Indonesia'),
(19, '-6.207809414948569', '106.84884272565759', 'Jl. Manggarai Utara 1, Manggarai, Kec. Tebet, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta, Indonesia'),
(20, '-6.193634919417943', '106.89027749051965', 'Jl. Pemuda No.2, RT.2/RW.7, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220, Indonesia'),
(21, '-6.214113647631299', '106.8875309084884', 'Jl. Cipinang Jaya Raya Blok B No.02, RT.12/RW.14, Pisangan Tim., Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13410, Indonesia'),
(22, '-6.182371280137743', '106.93525277128137', 'Pasar Cakung, Cakung Bar., Kec. Cakung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta, Indonesia'),
(23, '-6.219839196476012', '106.81238748183168', 'Jl. Gatot Subroto, RT.5/RW.3, Senayan, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12190, Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id_aplikasi`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `jalur`
--
ALTER TABLE `jalur`
  ADD PRIMARY KEY (`id_jalur`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kontakkami`
--
ALTER TABLE `kontakkami`
  ADD PRIMARY KEY (`id_kontakkami`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `titik`
--
ALTER TABLE `titik`
  ADD PRIMARY KEY (`id_titik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `id_aplikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jalur`
--
ALTER TABLE `jalur`
  MODIFY `id_jalur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `kontakkami`
--
ALTER TABLE `kontakkami`
  MODIFY `id_kontakkami` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(23) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id_tempat` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
