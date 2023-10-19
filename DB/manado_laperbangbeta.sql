-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2023 at 07:05 AM
-- Server version: 10.3.39-MariaDB-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manado_laperbangbeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `catatan_hakim_baru`
--

CREATE TABLE `catatan_hakim_baru` (
  `id_catatan` int(11) NOT NULL,
  `id_perkara` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nm_berkas` varchar(250) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catatan_hakim_baru`
--

INSERT INTO `catatan_hakim_baru` (`id_catatan`, `id_perkara`, `id_user`, `nm_berkas`, `catatan`, `time`) VALUES
(36, 0, 22, 'c_penunjukan_pp', 'Menurut saya ini sudah bagus', '19-08-2021 06:25:12'),
(37, 0, 22, 'c_surat_gugatan', 'kurang benarmhjkl', '19-08-2021 06:29:35'),
(38, 0, 29, 'c_surat_gugatan', 'okey', '19-08-2021 06:39:14'),
(39, 0, 29, 'c_bukti_pemb_panjar', 'okey', '19-08-2021 06:41:11'),
(40, 0, 29, 'c_ba_sidang', 'perkara perdata \nharusnya perdata tertentu\nselasa...\nharusnya selasa tanggal.....', '19-08-2021 06:45:03'),
(41, 0, 30, 'c_surat_gugatan', 'cukup', '20-08-2021 00:56:19'),
(42, 0, 30, 'c_ba_sidang', 'Berita acara sidang tanggal 11 Mei 2021 telah dinyatakan sidang ditunda sampai tanggal 27 Mei 2021 untuk musyawarah majelis, kemudian pada BAS tanggal 27 Mei 2021  sebelum  putusan dibacakan, ada lagi musyawarah majelis hakim', '20-08-2021 01:42:18'),
(43, 0, 22, 'c_surat_gugatan', 'ok oce komentar dicoba oke\n', '20-08-2021 05:27:08'),
(54, 0, 34, 'c_akta_pemberitahuan_banding', 'Pembanding semula sebagai Tergugat bertempat tinggal di Jl. Soa Konora kelurahan Soa Kecamatan Ternate Utara Kota Ternate,\nPembanding bertempat tinggal diluar wilayah PA Tondano, maka Pembanding  masa bandingnya selama 4 Minggu sebagaimana ketentuan  199 ayat 3 Rbg.', '01-09-2021 00:18:56'),
(55, 0, 34, 'c_salinan_putusan_pa', 'menarik untuk dikaji amar putusan PA tersebut, Penggugat mengajukan  gugatan agar Penggugat ditetapkan sebagai hak asuh, anak...PA menolak gugatan penggugat selanjutnya dibarengi dengan amar Poin 2 dan 3, padahal amar tersebut tidak diminta oleh Penggugat dan juga Tergugat tidak mengajukan rekonpensinya agar ia ditetapkan sebagai Pengasuh anak P&T,  dengan demikian cukup sajja amar putusan, menolak gugatan penggugat, selanjutnya biaya perkara', '01-12-2021 02:19:58'),
(56, 0, 34, 'c_salinan_putusan_pa', 'amarnya menolak gugatan penggugat seluruhnya karena beberapa poin amar yang diminta', '01-12-2021 02:22:05'),
(57, 0, 34, 'c_ba_sidang', 'di BAS keterangan Tergugat, dalam putusan perceraian, Penggugat telah dibebani nafkah anak setiap bulannya Rp. 1.500.000,., maka kal au penggugat rekonpensi tidak lagi rekonpensi mengajukan gugatan nafkah anak, maka tidak perlu lagi ditetapkan nafkah secara ex officio agar tidak mengakibatkan putusan tumpang tindih dalam subyek dan obyek yang sama', '20-12-2021 01:11:43'),
(58, 0, 34, 'c_ba_sidang', '', '20-12-2021 01:27:29'),
(59, 0, 34, 'c_ba_sidang', 'Penetapan mediasi, mediator diberikan waktu untuk melaksanakan mediasi selama  30 hari, akan tetapi setelah penetapan tersebut KM menunda langsung sidang kurang dari 30 hari, hal itu bertentangan dengan penetapannya sendiri. seharusnya setelah penetapan KM menentukan sidang setelah ada laporan mediator, ...jd sidang ditentukan kemudian.', '20-12-2021 01:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `catatan_laporan`
--

CREATE TABLE `catatan_laporan` (
  `id` int(11) NOT NULL,
  `laper_id` int(11) DEFAULT NULL,
  `id_triwulan` int(11) DEFAULT NULL,
  `tgl_catatan` datetime DEFAULT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `catatan_laporan`
--

INSERT INTO `catatan_laporan` (`id`, `laper_id`, `id_triwulan`, `tgl_catatan`, `catatan`) VALUES
(13, 8, NULL, '2023-09-08 12:53:11', 'tes'),
(14, 9, NULL, '2023-10-03 09:37:09', 'oke'),
(15, NULL, 9, '2023-10-09 10:48:28', 'tes'),
(16, NULL, 10, '2023-10-09 10:48:52', 'meja informasi'),
(17, 9, NULL, '2023-10-09 10:54:55', 'tes'),
(18, 9, NULL, '2023-10-09 11:17:16', 'tes 2'),
(19, 9, NULL, '2023-10-09 11:18:35', 'tes notifikasi catatan laporan perkara'),
(20, 9, NULL, '2023-10-09 13:20:30', 'tes notif'),
(21, NULL, 9, '2023-10-09 13:20:52', 'tes keuangan'),
(22, NULL, 10, '2023-10-09 13:21:01', 'tes meja informasi'),
(23, NULL, 9, '2023-10-09 13:41:07', 'catatan laporan keuangan'),
(24, NULL, 10, '2023-10-09 13:41:35', 'catatan laporan meja informasi'),
(25, NULL, 10, '2023-10-09 13:45:26', 'test lagi meja informasi');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_perkara`
--

CREATE TABLE `kategori_perkara` (
  `id_kaper` int(11) NOT NULL,
  `jns_kaper` varchar(50) DEFAULT NULL,
  `status_kaper` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_perkara`
--

INSERT INTO `kategori_perkara` (`id_kaper`, `jns_kaper`, `status_kaper`) VALUES
(3, 'Cerai Talak', 1),
(4, 'Cerai Gugat', 1),
(5, 'Harta Bersama', 1),
(6, 'Kewarisan', 1),
(7, 'Wasiat', 1),
(8, 'Hibah', 1),
(9, 'Wakaf', 1),
(10, 'Penguasaan Anak', 1),
(11, 'Pembatalan Perkawinan', 1),
(12, 'Izin Poligami', 1),
(13, 'Pencegahan Perkawinan', 1),
(14, 'Penolakan Perk. Oleh PPN', 1),
(15, 'Kelalaian atas Kewajiban Suami/Istri', 1),
(16, 'Nafkah Anak oleh Ibu', 1),
(17, 'Hak-hak bekas Isteri', 1),
(18, 'Pengesahan Anak', 1),
(19, 'Pecabutan Kek. Orang Tua', 1),
(20, 'Perwalian', 1),
(21, 'Pencb. Kekuasaan Wali', 1),
(22, 'Penunj. Orang lain sebagai Wali', 1),
(23, 'Ganti rugi terhadap Wali', 1),
(24, 'Asal Usul Anak/Pengankatan Anak', 1),
(25, 'Pen. Kawin Campuran', 1),
(26, 'Isbat Nikah', 1),
(27, 'Izin Kawin', 1),
(28, 'Dispensasi Kawin', 1),
(29, 'Wali Adhol', 1),
(30, 'Ekonomi Syari\'ah', 1),
(31, 'Zakat/Infaq/Shodaqoh', 1),
(32, 'P3HP/Penetapan Ahli Waris', 1),
(33, 'Lain-lain', 1);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_perkara`
--

CREATE TABLE `laporan_perkara` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `periode` varchar(20) DEFAULT NULL,
  `berkas_laporan` varchar(100) DEFAULT NULL,
  `laper_pdf` varchar(100) DEFAULT NULL,
  `laper_xls` varchar(100) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `tgl_terakhir_rev` date DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_perkara`
--

INSERT INTO `laporan_perkara` (`id`, `id_user`, `periode`, `berkas_laporan`, `laper_pdf`, `laper_xls`, `tgl_upload`, `tgl_terakhir_rev`, `status`) VALUES
(8, 3, 'Jan 2022', 'Lap Per Jan 2022', 'LAP_PA_TTY_Laporan_Perkara_Januari_2022_Pengadilan_Agama_Tutuyan.pdf', '1__LI-PA__1_Lap_Keadaan_Perkara_januari_2022.xlsx', '2022-12-20', '2022-12-20', 'Validasi'),
(9, 3, 'Feb 2023', 'Lap Per Feb 2023', '2840--SURAT-LAPORAN-KONDISI-CCTV-ONLINEsignsign.pdf', 'tk1_putus.xlsx', '2023-10-03', '2023-10-03', 'Revisi'),
(10, 3, 'Jan 2023', 'Lap Per Oct 2023', '20231005_Surat_Pemberitahuan_Ukom_Stat_Prakom_November_2023.pdf', '01_tanda_terima_1700_402681_PTA_Manado_Juli_2023_(1).xlsx', '2023-11-05', NULL, 'Belum Validasi'),
(16, 3, 'Sep 2023', 'Lap Per Sep 2023', 'Faktur_an_Idrus_Hamzah3.pdf', '01_tanda_terima_1700_402681_PTA_Manado_Juli_2023_(1)2.xlsx', '2023-10-12', NULL, 'Belum Validasi');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_triwulan`
--

CREATE TABLE `laporan_triwulan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `berkas_laporan` varchar(50) DEFAULT NULL,
  `periode_triwulan` varchar(20) DEFAULT NULL,
  `periode_tahun` varchar(20) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `tgl_terakhir_revisi` date DEFAULT NULL,
  `status_laporan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_triwulan`
--

INSERT INTO `laporan_triwulan` (`id`, `id_user`, `berkas_laporan`, `periode_triwulan`, `periode_tahun`, `tgl_upload`, `tgl_terakhir_revisi`, `status_laporan`) VALUES
(5, 3, 'Triwulan I', '03', '2022', '2022-12-20', '2022-12-20', 'Belum Validasi'),
(6, 3, 'Triwulan II', '06', '2023', '2023-10-03', '2023-10-03', 'Belum Validasi'),
(7, 3, 'Triwulan III', '09', '2023', '2023-10-03', NULL, 'Belum Validasi');

-- --------------------------------------------------------

--
-- Table structure for table `lap_tri_detail`
--

CREATE TABLE `lap_tri_detail` (
  `id` int(11) NOT NULL,
  `id_lap_tri` int(11) DEFAULT NULL,
  `nm_laporan` varchar(25) DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `lap_pdf` varchar(100) DEFAULT NULL,
  `lap_xls` varchar(100) DEFAULT NULL,
  `rev_pdf` varchar(100) DEFAULT NULL,
  `rev_xls` varchar(100) DEFAULT NULL,
  `tgl_revisi` date DEFAULT NULL,
  `status_validasi` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lap_tri_detail`
--

INSERT INTO `lap_tri_detail` (`id`, `id_lap_tri`, `nm_laporan`, `tgl_kirim`, `lap_pdf`, `lap_xls`, `rev_pdf`, `rev_xls`, `tgl_revisi`, `status_validasi`) VALUES
(7, 5, 'Keuangan', '2022-12-20', 'LAP_PA_AMG_laporan_keadaan_perkara_bln_januari_202203-02-2022-162737.pdf', '1__LI-PA__1_Lap_Keadaan_Perkara_januari_2022.xlsx', NULL, NULL, NULL, 'Validasi'),
(8, 5, 'Keuangan', '2023-10-03', 'LRA_DIPA_04_September_2023.pdf', 'tk1_putus.xlsx', NULL, NULL, NULL, 'Belum Validasi'),
(9, 6, 'Keuangan', '2023-10-03', 'PENG_52_BSSN_BS_SE_02_02_10_2023_Pengumuman_Pemeliharaan_Sistem_(1).pdf', 'tk1_putus.xlsx', NULL, NULL, NULL, 'Validasi'),
(10, 6, 'Meja Informasi', '2023-10-03', 'LRA_DIPA_04_September_2023.pdf', 'tk1_masuk.xlsx', NULL, NULL, NULL, 'Validasi');

--
-- Triggers `lap_tri_detail`
--
DELIMITER $$
CREATE TRIGGER `status_laporan_triwulan` AFTER UPDATE ON `lap_tri_detail` FOR EACH ROW BEGIN
	IF new.status_validasi = 'Revisi' THEN BEGIN
    update laporan_triwulan set status_laporan = 'Revisi' where id = new.id_lap_tri;
    END; END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `status_laporan_triwulan_validasi` AFTER UPDATE ON `lap_tri_detail` FOR EACH ROW BEGIN
	IF new.status_validasi = 'Validasi' AND old.status_validasi = 'Revisi' THEN BEGIN
    update laporan_triwulan set status_laporan = 'Validasi' where id = new.id_lap_tri;
    END; END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tgl_rev_triwulan` AFTER UPDATE ON `lap_tri_detail` FOR EACH ROW BEGIN
    update laporan_triwulan set tgl_terakhir_revisi = CURDATE() where id = new.id_lap_tri;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `list_perkara`
--

CREATE TABLE `list_perkara` (
  `id_perkara` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `no_perkara` varchar(50) NOT NULL,
  `nm_pihak_penggugat` varchar(100) DEFAULT NULL,
  `no_hp_penggugat` varchar(16) DEFAULT NULL,
  `nm_pihak_tergugat` varchar(100) NOT NULL,
  `no_hp_tergugat` varchar(16) DEFAULT NULL,
  `jns_perkara` varchar(50) NOT NULL,
  `tgl_register` date NOT NULL,
  `tgl_reg_banding` date NOT NULL,
  `no_surat_pengantar` varchar(250) NOT NULL,
  `pejabat_berwenang` varchar(100) NOT NULL,
  `nm_pejabat` varchar(250) NOT NULL,
  `nip_pejabat` varchar(18) NOT NULL,
  `banyaknya` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status_perkara` varchar(50) DEFAULT NULL,
  `sp_perkara` varchar(250) DEFAULT NULL,
  `no_perkara_banding` text DEFAULT NULL,
  `putusan_banding` varchar(255) DEFAULT NULL,
  `is_nomor` int(11) DEFAULT NULL,
  `surat_gugatan` varchar(250) DEFAULT NULL,
  `sk_bundelA` varchar(250) DEFAULT NULL,
  `bukti_pemb_panjar` varchar(250) DEFAULT NULL,
  `majelis_hakim` varchar(250) DEFAULT NULL,
  `penunjukan_pp` varchar(250) DEFAULT NULL,
  `penunjukan_js` varchar(250) DEFAULT NULL,
  `penetapan_hari_sidang` varchar(250) DEFAULT NULL,
  `relaas_panggilan` varchar(250) DEFAULT NULL,
  `ba_sidang` varchar(250) DEFAULT NULL,
  `penetapan_sita` varchar(250) DEFAULT NULL,
  `ba_sita` varchar(250) DEFAULT NULL,
  `lampiran_surat` varchar(250) DEFAULT NULL,
  `surat_bukti_penggugat` varchar(250) DEFAULT NULL,
  `surat_bukti_tergugat` varchar(250) DEFAULT NULL,
  `tanggapan_bukti_tergugat` varchar(250) DEFAULT NULL,
  `tanggapan_bukti_penggugat` varchar(250) DEFAULT NULL,
  `gambar_situasi` varchar(250) DEFAULT NULL,
  `surat_lain` varchar(250) DEFAULT NULL,
  `salinan_putusan_pa` varchar(250) DEFAULT NULL,
  `salinan_putusan_pa_rtf` varchar(250) DEFAULT NULL,
  `sk_bundelb` varchar(250) DEFAULT NULL,
  `akta_banding` varchar(250) DEFAULT NULL,
  `akta_penerimaan_mb` varchar(250) DEFAULT NULL,
  `memori_banding` varchar(250) DEFAULT NULL,
  `memori_banding_rtf` varchar(250) DEFAULT NULL,
  `akta_pemberitahuan_banding` varchar(250) DEFAULT NULL,
  `pemberitahuan_penyerahan_mb` varchar(250) DEFAULT NULL,
  `akta_penerimaankontra_mb` varchar(250) DEFAULT NULL,
  `kontra_mb` varchar(250) DEFAULT NULL,
  `kontra_mb_rtf` varchar(250) DEFAULT NULL,
  `pemberitahuan_penyerahankontra_mb` varchar(250) DEFAULT NULL,
  `relaas_periksa_berkas_pb` varchar(250) DEFAULT NULL,
  `sk_khusus` varchar(250) DEFAULT NULL,
  `bukt_pengiriman_bpb` varchar(250) DEFAULT NULL,
  `bukti_setor_bp_kasnegara` varchar(250) DEFAULT NULL,
  `surat_lainnya_b` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_perkara`
--

INSERT INTO `list_perkara` (`id_perkara`, `id_user`, `no_perkara`, `nm_pihak_penggugat`, `no_hp_penggugat`, `nm_pihak_tergugat`, `no_hp_tergugat`, `jns_perkara`, `tgl_register`, `tgl_reg_banding`, `no_surat_pengantar`, `pejabat_berwenang`, `nm_pejabat`, `nip_pejabat`, `banyaknya`, `keterangan`, `status_perkara`, `sp_perkara`, `no_perkara_banding`, `putusan_banding`, `is_nomor`, `surat_gugatan`, `sk_bundelA`, `bukti_pemb_panjar`, `majelis_hakim`, `penunjukan_pp`, `penunjukan_js`, `penetapan_hari_sidang`, `relaas_panggilan`, `ba_sidang`, `penetapan_sita`, `ba_sita`, `lampiran_surat`, `surat_bukti_penggugat`, `surat_bukti_tergugat`, `tanggapan_bukti_tergugat`, `tanggapan_bukti_penggugat`, `gambar_situasi`, `surat_lain`, `salinan_putusan_pa`, `salinan_putusan_pa_rtf`, `sk_bundelb`, `akta_banding`, `akta_penerimaan_mb`, `memori_banding`, `memori_banding_rtf`, `akta_pemberitahuan_banding`, `pemberitahuan_penyerahan_mb`, `akta_penerimaankontra_mb`, `kontra_mb`, `kontra_mb_rtf`, `pemberitahuan_penyerahankontra_mb`, `relaas_periksa_berkas_pb`, `sk_khusus`, `bukt_pengiriman_bpb`, `bukti_setor_bp_kasnegara`, `surat_lainnya_b`) VALUES
(57, 9, '16/Pdt.G/2021/PA.Ktg', 'Rusmi Dewi Mochtar bin Mohammad Mochtar, dkk', NULL, 'Fauzia Mochtar', NULL, 'Kewarisan', '2021-08-11', '2021-08-24', 'W18.A2/552/HK.05/08/2021', 'Panitera', 'Dra. Sunarti Puasa', '196702231994032002', 1, '', 'Pengiriman Salinan Putusan', 'dokumen_surat_pengantar__19082021_(1).pdf', '9/Pdt.G/2021/PTA.Mdo', 'PUT_No__9__2021_waris_PA_Mdo_No_16_2021_NO_.docx', NULL, 'Surat_Gugatan4.pdf', 'Surat_Kuasa_Hukum5.pdf', 'SKUM7.pdf', 'PMH7.pdf', 'Penunjukkan_PP7.pdf', 'Penunjukkan_JS5.pdf', 'Penetapan_Hari_Sidang5.pdf', 'Relaas-relaas2.pdf', 'BAS2.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PA_Ktg_2021_Pdt_G_16_putusan_akhir2.pdf', 'PA_Ktg_2021_Pdt_G_16_putusan_akhir1.rtf', 'surat_kuasa_P_dan_T2.pdf', 'Akta_Permohonan_Banding2.pdf', 'TT_MEMO1.pdf', 'Memori_Banding_FAUZIAH_MOCHTAR_OK2.pdf', 'Memori_Banding_FAUZIAH_MOCHTAR_OK1.rtf', 'RELAAS_PBT_PERNYATAAN4.pdf', 'RELAAS_PBT_PERNYATAAN5.pdf', 'TT_KONTRA2.pdf', 'Kontra_Memori_Banding_Rusmi_Dewie_Mochtar,dkk_2.pdf', 'Kontra_Memori_Banding_Rusmi_Dewie_Mochtar,dkk_.rtf', 'PBT_Penyerahan_Kontra_kepada_pembanding2.pdf', 'relaas_pbt_memeriksa_berkas1.pdf', NULL, 'bukti_setoran2.pdf', 'PNBP2.pdf', NULL),
(58, 5, '14/Pdt.G/2021/PA.Tdo', 'Nurjanah Alimulah binti Rahmat Nur Alimulah', NULL, 'Resky F. Kamaluddin bin Nurdin Kamaluddin ', NULL, 'Cerai Gugat', '2021-08-12', '2021-08-19', 'W18.A4/393/HK.05/7/2021', 'Panitera', 'H. Sjaogil Ahmad. S.HI.,MH', '197204081992021001', 2, 'Bundel A dan Bundel B', 'Pengiriman Salinan Putusan', 'Pengantar.pdf', '8/Pdt.G/2021/PTA.Mdo', 'Ptsan_NO_8_G_21_PTAMdo_CG-Kuat.doc', NULL, 'dokumen_gugatan_1615792556_2241801.pdf', NULL, 'skum_bukti_bayar1.pdf', 'penetapan_hakim_majelis_hakim_1624420653_7321.pdf', 'penunjukan_panitera_pengganti_1624420932_7321.pdf', 'penunjukan_jurusita_jsp_1624421199_7321.pdf', 'penetapan_hari_sidang_1624421542_7321.pdf', 'relaas_Panggilan_P_dan_T1.pdf', 'Berita_acara_sidang1.pdf', NULL, NULL, NULL, 'bukti_awal_1624434740_732.pdf', NULL, NULL, NULL, NULL, 'relaas_pemberitahuan.pdf', 'salinan_putusan.pdf', 'salinan_putusan1.pdf', NULL, 'akta_banding_1623995902_237687.pdf', 'memori_banding_1625192905_732.pdf', NULL, NULL, 'akta_banding_1623995902_2376871.pdf', 'akta_banding_1623995902_2376872.pdf', NULL, NULL, NULL, NULL, 'akta_banding_1623995902_2376873.pdf', NULL, 'akta_banding_1623995902_2376874.pdf', 'Skum.pdf', NULL),
(61, 9, '96/Pdt.G/2021/PA.Ktg', 'Yudit Indriati Podutolo Binti Hi. Mul\'Alif Podutolo, SE. M.Si', NULL, 'Ninik Silfani Podutolo Binti Arsad Podutolo', NULL, 'Kewarisan', '2021-08-19', '2021-08-26', 'W18.A2/563/HK.05/08/2021', 'Panitera', 'Dra. Sunarti Puasa', '196702231994032002', 1, '', 'Pengiriman Salinan Putusan', 'dokumen_surat_pengantar__19082021_(2).pdf', '10/Pdt.G/2021/PTA.Mdo', NULL, NULL, 'GUGATAN1.pdf', 'KUASA1.pdf', 'SKUM5.pdf', 'PMH5.pdf', 'Penunjukkan_PP5.pdf', 'JS1.pdf', 'PHS1.pdf', 'RELAAS1.pdf', 'BAS.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'SALINAN_PUTUSAN.pdf', 'PA_Ktg_2021_Pdt_G_96_putusan_akhir.rtf', 'KUASA.pdf', 'AKTA_BANDING.pdf', 'TT_MEMO_BANDING.pdf', 'MEMO_BANDING.pdf', 'Memo_Banding_No_96_PTA_Mdo.rtf', 'PEMBERITAHUAN_BANDING.pdf', 'PEMBERITAHUAN_BANDING1.pdf', 'TT_KONTRA3.pdf', 'Kontra_Memori_Banding_Yudith_Arisaldi_Podutolo.pdf', 'Kontra_Memori_Banding_Yudith_Arisaldi_Podutolo.rtf', 'PBT_KONTRA.pdf', 'INZAGE.pdf', NULL, 'SETORAN.pdf', 'PNBP3.pdf', NULL),
(74, 4, '37/Pdt.G/2021/PA.Blu', 'Deki Olii alias Dekky Olii bin Abdul Hamid', NULL, 'Dahniar Sabaya binti Hasim Sabaya', NULL, 'Cerai Talak', '2021-09-02', '2021-10-18', 'W18.A8/262/HK.05/08/2021', 'Panitera', 'Maskuri, S.Ag., M.H.', '197212211998031001', 8, 'Bundel A += 1 Asli 3 Fotokopi, Bundel B = 1 Asli 3 Fotokopi', NULL, NULL, '4/Pdt.G/2021/PTA.Mdo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(76, 2, '7/Pdt.G/2021/PA.Mdo', 'Supriyadi bin Soeroso', NULL, 'Melinda Wetik binti Welly Wetik', NULL, 'Harta Bersama', '2021-09-03', '2021-10-18', 'W18.A1/416/HK.05/7/2021', 'Panitera', 'Dra. Vahria', '196908291994032003', 8, '', NULL, NULL, '6/Pdt.G/2021/PTA.Mdo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 6, '189/Pdt.G/2021/PA.Llk', 'Shintia Mamonto binti Suparman Mamonto', NULL, 'Richard Winmar Datau bin Aswinata Datau  ', NULL, 'Cerai Gugat', '2021-09-10', '2021-09-15', 'W18.A7/616/HK.05/09/2021', 'Panitera', 'Hasna B.  Nurdin Harun', '196907271998032001', 2, '-', 'Pengiriman Salinan Putusan', '189_Surat_Pengantar.pdf', '11/Pdt.G/2021/PTA.Mdo', 'Salinan_Putusan_No_11-2021.docx', NULL, '189_Bundel_A-halaman-4-5.pdf', NULL, '189_Bundel_A-halaman-6-7.pdf', '189_Bundel_A-halaman-8.pdf', '189_Bundel_A-halaman-9.pdf', '189_Bundel_A-halaman-10.pdf', '189_Bundel_A-halaman-11-12.pdf', '189_Bundel_A-halaman-13-14,17,28-29.pdf', '189_Bundel_A-halaman-15-16,18-27,30-53.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '189_Bundel_B-halaman-3-161.pdf', 'PA_Llk_2021_Pdt_G_189_putusan_akhir_(1)1.rtf', '189_Bundel_B-halaman-17-221.pdf', '189_Bundel_B-halaman-231.pdf', '189_Bundel_B-halaman-241.pdf', '189_Bundel_B-halaman-25-351.pdf', NULL, '189_Bundel_B-halaman-361.pdf', '189_Bundel_B-halaman-371.pdf', '189_Bundel_B-halaman-381.pdf', '189_Bundel_B-halaman-39-411.pdf', NULL, '189_Bundel_B-halaman-421.pdf', '189_Bundel_B-halaman-43-461.pdf', NULL, '189G_Bundel_B_all-halaman-47.pdf', '189_Bundel_B-halaman-491.pdf', NULL),
(78, 9, '178/Pdt.G/2021/PA.Ktg', 'Hensi Monoarfa Bin Noho Monoarfa Dkk', NULL, 'Djawahir Potabuga Alias Lulung Dkk', NULL, 'Kewarisan', '2021-09-17', '2021-10-06', 'W18.A2/715/HK.05/09/2021', 'Panitera', 'Dra Sunarti Puasa', '196702231994032002', 1, 'Dikirim dengan hormat untuk diperiksa - Terima kasih', 'Pengiriman Salinan Putusan', 'surat_pengantar.pdf', '12/Pdt.G/2021/PTA.Mdo', 'Baik_-_PUTUSAN_NOMOR_12_TAHUN_2021_PTA_Mdo.docx', NULL, 'gugatan.pdf', 'KUASA_P_dan_T.pdf', 'skum.pdf', 'pmh.pdf', 'pp.pdf', 'js.pdf', 'phs.pdf', 'relaas.pdf', 'BAS3.pdf', 'sita.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Cabut_Kuasa_Penggugat.pdf', 'salput-dikompresi1.pdf', 'Salinan_Putusan1.rtf', 'Surat_Kuasa_Pembanding_dan_Terbanding1.pdf', 'akta_permohonan_banding1.pdf', 'Surat_Tanda_Terima_Memori_Banding1.pdf', 'Memori_Banding1.pdf', 'Memori_Banding1.rtf', 'Relaas_Pemberitahuan_Pernyataan_Banding1.pdf', 'Relaas_Pemberitahuan_dan_Penyerahan_Memori_Banding1.pdf', 'Surat_Tanda_Terima_Kontra_Memori_Banding1.pdf', 'Kontra_Memori_Banding1.pdf', NULL, 'Surat_Pemberitahuan_dan_Penyerahan_Kontra_Memori1.pdf', 'Relaas_Pemberitahuan_Memeriksa_Berkas_Banding_Kepada_Pembanding1.pdf', NULL, 'bukti_pengiriman_biaya_proses_perkara_banding1.pdf', 'Bukti_Setor_Biaya_Pendaftaran_ke_Kas_Negara1.pdf', NULL),
(81, 2, '226/Pdt.G/2021/PA.Mdo', 'ERMAN SAMIR BIN SAMIR', NULL, 'AJENG WIGATI BINTI SOEYATNA', NULL, 'Cerai Gugat', '2021-11-03', '2021-11-05', 'W18.A1/571/HK.05/11/2021', 'Panitera', 'Dra. Vahria', '196908291994032003', 2, '', 'Pengiriman Salinan Putusan', 'Surat_Pengantar_Pengiriman_Berkas_Banding.pdf', '13/Pdt.G/2021/PTA.Mdo', 'PUT_PTA_Nomor_13.docx', NULL, 'Surat_Gugatan_2261.pdf', NULL, 'bukti_pembayaran_skum_2261.pdf', 'pmh_2261.pdf', 'penunjukan_pp_2261.pdf', 'penunjukan_js_2261.pdf', 'pmh_2262.pdf', 'relaas_2261.pdf', 'bas_2261.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'salinan_putusan_2262.pdf', 'SALINAN_PUTUSAN2.rtf', NULL, 'akta_banding_2263.pdf', 'surat_keterangan_memori_banding_2264.pdf', NULL, NULL, 'akta_banding_2264.pdf', 'surat_keterangan_memori_banding_2265.pdf', NULL, NULL, NULL, NULL, 'relaas_inzage_226_.pdf', NULL, 'bukti_pembayaran_banding_2262.pdf', 'bukti_setor_kas_negara_2262.pdf', 'surat_keterangan_tidak_inzage_2261.pdf'),
(82, 2, '245/Pdt.G/2021/PA.Mdo', 'Abdul Haris Febriansyah bin Karaeng', NULL, 'Alfi Kader binti Djafar Kader', NULL, 'Cerai Gugat', '2021-11-03', '2021-11-05', 'W18.A1/580/HK.05/11/2021', 'Panitera', 'Dra. Vahria', '196908291994032003', 2, '', 'Pengiriman Salinan Putusan', 'Surat_Pengantar_Banding_245.pdf', '14/Pdt.G/2021/PTA.Mdo', 'PUTUSAN_NOMOR_14_TAHUN_2021_PTA_Mdo_Menguatkan_1r.rtf', NULL, 'surat_gugatan_245.pdf', 'surat_kuasa_khusus_245.pdf', 'bukti_pembayaran.pdf', 'pmh_245.pdf', 'penunjukkan_pp_245.pdf', 'penunjukkan_js_245.pdf', 'phs_245.pdf', 'relaas_245.pdf', 'bas_245.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'salput_2454.pdf', 'SALINAN_P_U_T_U_S_A_N_docx1.rtf', 'surat_kuasa_2458.pdf', 'akta_banding_2454.pdf', 'tanda_terima_memori_banding_2454.pdf', 'memori_banding_2454.pdf', 'memori_banding_haris_docx1.rtf', 'relaas_pemberitahuan_banding_2454.pdf', 'relaas_pemberitahuan_penyerahan_memori_banding_2454.pdf', 'akta_penerimaan_kontra_memori_banding_2454.pdf', 'kontra_memori_banding_2454.pdf', NULL, 'relaas_pemberitahuan_kontra_banding_2454.pdf', 'relaas_inzage_banding_2454.pdf', 'surat_kuasa_2459.pdf', 'bukti_pembayaran_2454.pdf', 'setor_kas_negara_2454.pdf', 'Surat_Keterangan_Inzage_2451.pdf'),
(83, 2, '258/Pdt.G/2021/PA.Mdo', 'Agung Disaputra Hasan bin Haryanto Hasan', NULL, 'Zela Anggrayni Lasama binti Asri Lasama', NULL, 'Penguasaan Anak', '2021-11-30', '2021-12-01', 'W18.A1/627/HK.05/11/2021', 'Panitera', 'Dra. Vahria', '196908291994032003', 2, '', 'Pengiriman Salinan Putusan', '1__Surat_Pengantar_Pengiriman_Berkas_Banding(1).pdf', '15/Pdt.G/2021/PTA.Mdo', '5__BA-HADONAH_-_15-PTA_Mdo-_2021__(_Dikuatkan_dengan_tambahan_biaya_hadonah_)_-_Copy.doc', NULL, 'Surat_Gugatan_258_G.pdf', 'surat_kuasa_258_G.pdf', 'SKUM_258_G.pdf', 'PMH_258_G.pdf', 'Penunjukkan_PP_258_G.pdf', 'Penunjukkan_JS_258_G.pdf', 'PHS_258_G.pdf', 'Relaas_258_G.pdf', 'BAS_258_G_compressed.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3__Salinan_Putusan_258.pdf', '3__Salinan_Putusan_258.rtf', '4__Surat_Kuasa_Pembanding(2).pdf', '5__Akta_Permohonan_Banding(4).pdf', '7__Tanda_terima_memori_banding(2).pdf', '8__Memori_Banding(1).pdf', '8__Memori_Banding(1).rtf', '9__Relaas_Pemberitahuan_dan_Penyerahan_Memori_Banding.pdf', '9__Relaas_Pemberitahuan_dan_Penyerahan_Memori_Banding1.pdf', '10__Tanda_Terima_Kontra_Memori_Banding.pdf', '11__Kontra_Memori_Banding(1).pdf', 'Kontra_memori_banding_perkara_no_258-Pdt_G-2021-PA_Mdo.rtf', '12__Relaas_Penyerahan_Kontra_Memori_Banding.pdf', '13__Relaas_Inzage.pdf', NULL, '15__SKUM_Tanda_bukti_Setoran_panjar_biaya_banding.pdf', '17__Bukti_Pengiriman_Biaya_Banding_fix.pdf', NULL),
(84, 2, '248/Pdt.G/2021/PA.Mdo', 'Ivana Wiwiyanti binti Ario K. Yunus', NULL, 'Syarwani Yahya bin Mohamad Yahya', NULL, 'Cerai Gugat', '2021-12-07', '2021-12-08', 'W18.A1/648/HK.05/12/2021', 'Panitera', 'Dra. Vahria', '196908291994032003', 2, '', 'Pengiriman Salinan Putusan', 'Surat_Pengantar_Banding_no_248.pdf', '16/Pdt.G/2021/PTA.Mdo', '16_CG_2021___PTA_Mdo_Tolak_PA_Mdo_248_21.doc', NULL, 'Surat_Gugatan_248.pdf', 'Surat_Kuasa_248.pdf', '16__Skum_dan_bukti_bayar_panjar_biaya_banding_.pdf', 'PMH_248.pdf', 'Penunjukkan_PP_248.pdf', 'Penunjukkan_JS_248.pdf', 'PHS_248.pdf', 'Relaas_248.pdf', 'BAS_248.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Salinan_Putusan_248.pdf', 'Salinan_Putusan_248.rtf', 'Surat_Kuasa_Kedua_Pihak.pdf', '5__Akta_permohonan_banding(3).pdf', '7__Tanda_Terima_Memori_Banding(3).pdf', '8__Memori_Banding_248_2021.pdf', '8__Memori_Banding_248_2021.rtf', '9__Pemberitahuan_Memori_Banding(1).pdf', '6__Pemberitahuan_Pernyataan_Banding.pdf', '10__Tanda_terima_kontra_memori_banding(1).pdf', '11__kontra_memori_banding(2).pdf', 'Kontra_Memori_Banding_-_Syarwani_Yahya.rtf', '12__Pemberitahuan_Kontra_Memori_Banding.pdf', '13__Pemberitahuan_inzage(1).pdf', NULL, '16__Skum_dan_bukti_bayar_panjar_biaya_banding_.pdf', '19__Bukti_setoran_PNBP_menyampaian_Kontra.pdf', NULL),
(85, 9, '309/Pdt.G/2021/PA.Ktg', 'Ewin Daniel bin Suardi Daniel', NULL, 'Ralna Dompas', NULL, 'Cerai Talak', '2021-12-23', '2022-01-05', 'W18.A2/1015/HK.05/12/2021', 'Panitera', 'Dra. Sunarti Puasa', '196702231994032002', 1, 'Dikirim dengan hormat untuk diperiksa - Terima kasih', 'Pengiriman Salinan Putusan', 'surat_pengantar_fixxx.pdf', '1/Pdt.G/2022/PTA.Mdo', '1_G_22_PTAMdo_CTHad-R-Kuat-Perbaikan.doc', NULL, '1__Surat_Permohonan_Cerai_Talak1.pdf', '2__Surat_Kuasa_Khusus_Pemohon1.pdf', '3__Surat_Kuasa_Untuk_Membayar_(SKUM)1.pdf', '4__Penetapan_Majelis_Hakim_(PMH)1.pdf', '5__Penunjukan_Panitera_Pengganti1.pdf', '6__Penunjukan_Jurusita_Pengganti1.pdf', '7__Penetapan_Hari_Sidang_(PHS)1.pdf', 'relas_panggilan1.pdf', 'Perubahan_Berita_Acara_Sidang.pdf', NULL, NULL, NULL, '19__alat_bukti_pemohon1.pdf', '20__alat_bukti_termohon1.pdf', NULL, NULL, NULL, NULL, '1__Salinan_Putusan3.pdf', '1__Salinan_Putusan_(wecompress_com)3.rtf', '2__Surat_Kuasa_Pembanding_dan_Terbanding2.pdf', '3__Akta_Permohonan_Banding3.pdf', 'Tanda_Terima_Memori_Banding3.pdf', '5__Memori_Banding2.pdf', '5__Memori_Banding2.rtf', '6__Relaas_Pemberitahuan_Pernyataan_Banding.pdf', '7__Relaas_Pemberitahuan_dan_Penyerahan_Memori_Banding_Kepada_Kuasa_Hukum_Terbanding6.pdf', '8__Surat_Tanda_Terima_Kontra_Memori_Banding1.pdf', '9__Kontra_Memori_Banding1.pdf', '9_-Kontra-Memori-Banding-_wecompress_com_1.rtf', '10__Surat_Pemberitahuan_Dan_Penyerahan_Kontra_Memori_Banding_Kepada_Kuasa_Hukum_Pembanding1.pdf', 'Berita_Acara_Inzage.pdf', NULL, 'Biaya_Proses3.pdf', 'PNBP_Banding3.pdf', NULL),
(87, 6, '409/Pdt.G/2022/PA.Llk', 'Richard Winmar Datau', NULL, 'Shuntia Mamonto Binti Suparman Mamonto', NULL, 'Cerai Talak', '2022-01-13', '2022-01-19', 'W18.A7/33/HK.05/01/2022', 'Panitera', 'Maskuri, S.Ag., M.H.', '197212211998031001', 1, 'Berkas elektronik  perkara Banding Ecourt Litigasi ', 'Pengiriman Salinan Putusan', 'CamScanner_01-13-2022_14_07.pdf', '2/Pdt.G/2022/PTA.Mdo', 'PUT_NOMOR_02_thn_2022.docx', NULL, 'SURAT_GUGATAN.pdf', 'SURAT_KUASA_.pdf', 'SKUM8.pdf', 'Surat_penetapan_majelis_hakim.pdf', 'Penunjukan_Panitera.pdf', 'Penunjukan_Jurusita.pdf', 'Penetapan_Hari_Sidang6.pdf', '409G-halaman-18,21-22,37-39.pdf', '409G-digabungkan-halaman-19-20,27-36,40-118.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'salinan_putusan2.pdf', 'PA_Llk_2021_Pdt_G_409_putusan_akhir_.rtf', 'SURAT_KUASA_.pdf', 'akta_banding_1640658917_231672.pdf', 'CamScanner_01-14-2022_14_58.pdf', 'memori_banding_1641188347_231672_(1).pdf', NULL, 'PBT_BANDING_T.pdf', 'Memori_Banding2.pdf', 'CamScanner_01-14-2022_14_581.pdf', 'Kontra_Memori_Banding2.pdf', NULL, 'Kontra_Memori_Banding3.pdf', 'Inzage_P.pdf', NULL, 'biaya_banding_PTA_(1).pdf', 'PNBP_Banding_Perk_409_G.pdf', 'BA_inzage_P.pdf'),
(88, 2, '420/Pdt.G/2021/PA.Mdo', 'Dr. HJ Herlina M.Pd Binti Usman Sira', NULL, 'Prof.Dr H. Noldy Pelenkahu M.Pd Bin J.A', NULL, 'Cerai Talak', '2022-03-01', '2022-03-02', 'W18.A1/105/HK.05/02/2022', 'Panitera', 'Dra. Vahria', '196908291994032003', 2, '', 'Pengiriman Salinan Putusan', 'Surat_pengantar_banding.pdf', '3/Pdt.G/2022/PTA.Mdo', 'Putusan_NO_3_2022_CT_PA_Mdo_Eksepsi_Dikabulkan.doc', NULL, 'Surat_Gugatan_420_G.pdf', NULL, 'bukti_bayar_420_g_(skum).pdf', 'pmh_420_g.pdf', 'penunjukkan_pp_420_g.pdf', 'penunjukkan_js_420_g.pdf', 'phs_420_g.pdf', 'relaas_panggilan_420_g.pdf', 'bas_420_g.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'salput_420_g.pdf', 'Putusan_Akhir_420_OK.rtf', 'surat_kuasa_b_420_g.pdf', 'akta_banding_420_g.pdf', 'akta_penerimaan_memori_banding_420_g.pdf', 'MEMORI_BANDING_Prof_Hj__Herlina.pdf', 'MEMORI_BANDING_PROF_HERLINA.rtf', 'akta_pemberitahuan_banding_420_g.pdf', 'pemberitahuan_penyerahan_memori_banding.pdf', 'tanda_terima_memori_banding_420_g.pdf', 'kontra_memori_banding_420_g.pdf', 'kontra_memori_banding_420_g1.rtf', 'pemberitahuan_kontra_memori_banding_420_g.pdf', 'pemberitahuan_inzage_420_g.pdf', 'surat_kuasa_b_420_g1.pdf', 'bukti_biaya_banding.pdf', 'bukti_setor_biaya_banding.pdf', NULL),
(89, 2, '39/Pdt.G/2022/PA.Mdo', 'Ridwan Abdullah Rodjak bin Abdullah Rodjak', NULL, 'Risna Redji binti Redji Tambipi', NULL, 'Cerai Talak', '2022-05-27', '2022-05-31', 'W18.A1/302/HK.05/05/2022', 'Panitera', 'Dra. Vahria', '196908291994032003', 2, '', 'Pengiriman Salinan Putusan', 'surat_Pengantar_Banding_39.pdf', '4/Pdt.G/2022/PTA.Mdo', 'Putusan_Banding_Nomor_4_tahun_2022.rtf', NULL, 'Surat_Gugatan_39.pdf', 'Surat_Kuasa_Kedua_Belah_Pihak.pdf', 'SKUM9.pdf', 'PMH8.pdf', 'Penetapan_PP.pdf', 'Penetapan_JS.pdf', 'PHS2.pdf', 'Relaas.pdf', 'BAS5.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Salinan_Putusan.pdf', 'Salinan_Putusan_No_39.rtf', 'Surat_Kuasa_Kedua_Belah_Pihak.pdf', '4__Akta_Banding_39.pdf', '6__Tanda_Terima_Memori_Banding(2).pdf', '6__Memori_Banding_-_Ridwan_Abdullah_Rodjak.pdf', '6__Memori_Banding_-_Ridwan_Abdullah_Rodjak_docx.rtf', '6__Tanda_Terima_Memori_Banding(2)1.pdf', '8__PBT_Penyerahan_Memori_Banding.pdf', '9__Tanda_Terima_Kontra.pdf', '10__Kontra_Memori_Banding_Risna_Tambipi.pdf', '10__Kontra_Memori_Banding_Risna_Tambipi.rtf', '11__PBT_Kontra_Memori_Banding.pdf', 'Relaas_Inzage.pdf', NULL, 'Bukti_Penerimaan_Biaya_Banding.pdf', 'Bukti_Setor.pdf', NULL),
(90, 2, '162/Pdt.G/2022/PA.Mdo', 'Supriyadi bin Soeroso', NULL, 'Melinda Wetik binti Welly Wetik', NULL, 'Penguasaan Anak', '2022-06-10', '2022-06-14', 'W18.A1/327/HK.05/06/2022', 'Panitera', 'Dra. Vahria', '196908291994032003', 2, '', '', 'Surat_Pengantar_Berkas_Banding_Ni__162.pdf', '5/Pdt.G/2022/PTA.Mdo', 'Putusan_No_5_Th_2022.docx', NULL, '1__Surat_Gugatan.pdf', '2__Surat_Kuasa_Pengugat_dan_Tergugat.pdf', '3__SKUM_dan_Bukti_Bayar.pdf', '4__PMH.pdf', '5__Penunjukan_PP1.pdf', '6__Penunjukan_JSP.pdf', '7__Penetapan_Hari_Sidang_1_dan_2.pdf', '8__Relaas-relaas_Panggilan.pdf', '9__Berita_Acara_Sidang1.pdf', NULL, NULL, NULL, '13__Bukti_P.pdf', '14__Bukti_T.pdf', NULL, NULL, NULL, '18__Surat_Lainnya_(Replik_Duplik,_putusan_sela).pdf', '1__Salinan_putusan_162_PDF.pdf', '1__Salinan_Putusan_No_162__RTF.rtf', '2__Surat_kuasa_kedua_belah_pihak_162.pdf', '3__Akta_Banding_162.pdf', '4__Akta_Penerimaan_Memori_Banding1.pdf', '5__Memori_banding_162_PDF.pdf', '5__Memori_banding_162_RTF.rtf', '6__Akta_PBT_Pernyatan_Banding.pdf', '7__Pemberitahuan_penyerahan_memori_banding.pdf', '8__Akta_penerima_Kontra_Memori_Banding.pdf', '9__KONTRA_MEMORI_BANDING_MELINDAA.pdf', '9__KONTRA_MEMORI_BANDING_MELINDAA.rtf', '10__Pemberitahuan_penyerahan_Kontra_Memori_Banding.pdf', '11__Relaas_PBT_Inzage.pdf', '12__Surat_kuasa_kedua_belah_pihak_162_-_Copy.pdf', '13__Bukti_penerimaan_biaya_perkara_banding.pdf', '14__Bukti_setor_PNBP.pdf', '15__Bukti_pengiriman_biaya_banding.pdf'),
(91, 2, '172/Pdt.G/2022/PA.Mdo', 'Djoeariah Lucia Djoedi binti Stefanus Djoedi', NULL, 'Fatmawaty Ishak binti Yunus B. Ishak, Kepala Kantor Urusan Agama (KUA) Kecamatan Mapanget Kota Manad', NULL, 'Pembatalan Perkawinan', '2022-07-05', '2022-07-06', 'W18.A1/381/HK.05/07/2022', 'Panitera', 'Dra. Vahria', '196908291994032003', 2, '', 'Pengiriman Salinan Putusan', 'Surat_Pengantar_Berkas_Banding.pdf', '6/Pdt.G/2022/PTA.Mdo', 'Put_6_PTA_Mdo__th_2022_Pembatalan_Nikah_dikuatkan_-PA_Mdo.docx', NULL, '1__Surat_Gugatan_172.pdf', 'Surat_kuasa_Pembanding.pdf', 'SKUM_172.pdf', 'PMH_172.pdf', 'penetapan_pp1.pdf', 'penunjukkan_jurusita.pdf', 'phs_172.pdf', 'Relaas-relaas_panggilan.pdf', 'Berita_Acara_Sidang.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Salinan_Putusan1.pdf', '1__PUT_No_172_Pdt_G_2022__Pembatalan_Nikah.rtf', '2__Surat_kuasa_Pembanding.pdf', '3__Akta_Pernyataan_Banding.pdf', '4__PBT_Pernyataan_Banding.pdf', '6__Memori_Banding_-_Djoeariah_L_Djoedy.pdf', '6__Memori_Banding_-_Djoeariah_L_Djoedy.rtf', '3__Akta_Pernyataan_Banding1.pdf', '7__Relaas_Pemberitahuan_dan_penyerahan_Memori_Banding.pdf', '8__Tanda_terima_Kontra_Memori_Banding.pdf', '9__KONTRA_MEMORI_BANDING_PERKARA_NO_172_2022_PA_Mdo_docx.pdf', '9__KONTRA_MEMORI_BANDING_PERKARA_NO_172_2022_PA_Mdo_docx.rtf', '10__Relaas_Pemberitahuan_Dan_Penyerahan_Kontra_Memori_Banding.pdf', '12__Relaas_PBT_Inzage_Terbanding_dan_Turut_Terbanding.pdf', NULL, '18__Bukti_Bayar_Panjar_Biaya_Banding.pdf', '19__Bukti_setor_PNBP_ke_kas_Negara.pdf', NULL),
(92, 11, '133/Pdt.G/2022/PA.Btg', 'Juniar Hamsah Bin Jaini Hamsah', NULL, 'Dahlia Syahrir Binti Syahrir Paewa', NULL, 'Cerai Talak', '2022-08-04', '2022-08-12', 'W18.A5/674/HK.05/08/2022', 'Panitera', 'Hasna B. Nurdin Harun, S.H.', '196907271998032001', 1, 'Dikirim dengan hormat untuk bahan seperlunya.', 'Pengiriman Salinan Putusan', 'Surat_Pengantar_Banding_133----05-08-2022-151628.pdf', '8/Pdt.G/2022/PTA.Mdo', 'Putusan_Nomor_8_Pdt_G_22_PTAMdo1.doc', NULL, 'Surat_Gugatan_133---04-08-2022-164035.pdf', 'SKK_Dence_Novian_Baeruma_133---05-08-2022-084237.pdf', 'SKUM_133----05-08-2022-081831.pdf', 'Penetapan_Majelis_Hakim_133---04-08-2022-164213.pdf', 'Penunjukkan_PP8.pdf', 'Penunjukkan_Jurusita_133---04-08-2022-164329.pdf', 'Penetapan_Hari_Sidang_133---05-08-2022-090204.pdf', 'Relaas_Panggilan_133---05-08-2022-085937.pdf', 'BAS_133.pdf', NULL, NULL, NULL, 'Surat_Pemohon05-08-2022-140629.pdf', 'Surat_T_organized.pdf', NULL, NULL, NULL, 'Surat_Lain-lain05-08-2022-135146.pdf', 'Salinan_Putusan_133_Pdt_G_compressed.pdf', 'Salinan_Putusan_PA_Bitg_2022_Pdt_G_1331.rtf', 'SKK_Kedua_Belah_Pihak_133.pdf', 'Akta_Permohonan_Banding_133---04-08-2022-161858.pdf', 'Akta_Penerimaan_Memori_Banding_133---04-08-2022-161944.pdf', 'Memori_Banding_133---04-08-2022-162220.pdf', 'Memori_Banding_133_Dahlia_Syahrir.rtf', 'Akta_Pemberitahuan_Banding.pdf', 'Pemberitahuan_Penyerahan_Memori_Banding_133---04-08-2022-162340.pdf', 'Akta_Penerimaan_Kontra_Memori_Banding_133---04-08-2022-162425.pdf', 'Kontra_Memori_Banding_133---04-08-2022-162515.pdf', 'Kontra_Memori_Banding_Juniar_Hamsah.rtf', 'Pemberitahuan_Penyerahan_Kontra_Memori_Banding_133---04-08-2022-162621.pdf', 'Relaas_Inzage1.pdf', NULL, 'Bukti_Penerimaan_Biaya_Banding20220805_11160329.pdf', 'Bukti_Setor_Pendaftaran_ke_Kas_Negara_133---04-08-2022-163248.pdf', 'Tanda_Bukti_Penyetoran_BRI_Banding_133---04-08-2022-163815.pdf'),
(93, 2, '23/Pdt.G/2022/PA.Mdo', 'Idris Mamonto, S.H., M.H. Pekerjaan:Pengacara', NULL, 'Putra Akbar Saleh, S.H. Pekerjaan:Advokat/ Konsultan Hukum', NULL, 'Pembatalan Perkawinan', '2022-08-04', '2022-08-11', 'W18.A1/441/HK.05/08/2022', 'Panitera', 'Dra. Vahria', '196908291994032003', 2, '', 'Pengiriman Salinan Putusan', 'Surat_Pengantar_ke_2_Berkas_Banding_ni_23.pdf', '7/Pdt.G/2022/PTA.Mdo', 'Putusan_Perkara_No__7_Pdt_G_2022_PTA_Md2.docx', NULL, '1__Gugatan.pdf', '2__Surat_Kuasa.pdf', '3__Bukti_Pembayaran_Pajar_Biaya.pdf', '4_PMH.pdf', '5__Penunjukan_PP.pdf', '6__Penunjukan_Jurusita.pdf', '7__Penetapan_Hari_Sidang.pdf', '8__Relaas_Panggilan_PT.pdf', '9__Berita_Acara_Sidang.pdf', NULL, NULL, NULL, '13__Surat_Bukti_Penggugat.pdf', NULL, NULL, NULL, NULL, '10__Pemberitahuan_isi_ptusan.pdf', '1__SALINAN_PUT_23_G_2022.pdf', '1__SALINAN_PUT_23_G_2022.rtf', '2__Surat_Kuasa_Para_Pihak.pdf', '3__Akta_Banding_No_23.pdf', '4__Akta_Penerimaan_Memori_Banding.pdf', '5__Memori_Banding_PDF.pdf', '5__Memori_Banding_RTF.rtf', '6__Akta_Pemberitahuan_Banding.pdf', '7__Pemberitahuan_Penyerahan_Memori_Banding.pdf', '8__AKTA_PENERIMAAN_KONTRA_MEMORI_BANDING.pdf', '9__KONTRA_MEMORI_BANDING-pdf.pdf', '9__KONTRA_MEMORI_BANDING-RTF.rtf', '10__PBT_Penyerahan_Kontra_Memori.pdf', '11__Relaas_PBT_untuk_Inzage.pdf', '2__Surat_Kuasa_Para_Pihak1.pdf', '13__Bukti_Penerimaan_Biaya_Perkara_Banding.pdf', '14__Bukti_Setor_Biaya_PNBP.pdf', '15__Surat_Lain.pdf'),
(94, 3, '14/Pdt.G/2022/PA.Tty', 'Harry Lerian Simbala bin Nasarudin Simbala', NULL, 'Nasarudin Simbala bin Andot Simbala; Kepala Dinas Pendidikan Dan Kebudayan Kabupaten Bolaang Mongond', NULL, 'Hibah', '2022-08-20', '2022-08-26', 'W18.A10/557/HK.05/08/2022', 'Panitera', 'Abdul Munir Makka, S.H.I.', '196705141992021001', 1, '', 'Pengiriman Salinan Putusan', 'Surat_Pengantar_PA_Tutuyan.pdf', '9/Pdt.G/2022/PTA.Mdo', 'Put_9_PTA_Mdo__th_2022_Pembatalan_Hibah_dikuatkan_-PTA_Mdo.docx', NULL, '1__Surat_Gugatan_Lengkap1.pdf', '2__Surat_Kuasa_Lengkap1.pdf', '3__SKUM1.pdf', '4__PMH_Lengkap1.pdf', '5__Penetapan_PP_Lengkap1.pdf', '6__Penetapan_JSP_Lengkap1.pdf', '7__Penetapan_Hari_Sidang_Lengkap1.pdf', '8__Relaas_Panggilan_Lengkap1.pdf', '9__BAS_Lengkap.pdf', NULL, NULL, NULL, '13__BUKTI_TERTULIS_PENGGUGAT.pdf', '14__Bukti_Tergugat.pdf', NULL, NULL, '17_Gambar_Situasi.pdf', NULL, '1__salput_14g.pdf', '1__PUTUSAN_14_2022_Pembatalan_Hibah.rtf', '2__Surat_Kuasa_Lengkap.pdf', '3__Akta_Banding.pdf', '4__Akta_Penerimaan_Memori_Banding_1.pdf', '5__memori_banding_1659290965_80981.pdf', '5__memori_banding_1659290965_8098.rtf', '6__Relaas_Pemberitahuan_Banding.pdf', '7__Pemberitahuan_Penyerahan_Memori_Banding_1.pdf', '8__Akta_Penerimaan_Kontra_Memori_Banding.pdf', '9__kontra_memori_banding_1660847327_437384.pdf', '9__kontra_memori_banding_1660847327_437384.rtf', '10__Pemberitahuan_Penyerahan_Kotra_Memori_Banding.pdf', '11__Relaas_Inzage.pdf', '2__Surat_Kuasa_Lengkap1.pdf', '13__Bukti_Penerimaan_Biaya_Perkara_Banding1.pdf', '14__Bukti_Penerimaan_Negara.pdf', NULL),
(95, 9, '176/Pdt.G/2022/PA.Ktg', 'Haryono Potabuga', NULL, 'Nurmilah  Kamasaan', NULL, 'Cerai Talak', '2022-08-25', '2022-09-01', 'W18.A2/886/HK.05/08/2022', 'Panitera', 'Dra Sunarti Puasa', '196702231994032002', 1, '', 'Pengiriman Salinan Putusan', 'Surat_Pengantar.pdf', '10/Pdt.G/2022/PTA.Mdo', 'PUTUSAN_NO_10_TH_2022_Edit.rtf', NULL, 'Surat_Gugatan_Penggugat1.pdf', NULL, 'Surat_Kuasa_Untuk_Membayar_(SKUM)1.pdf', 'Penetapan_Majelis_Hakim_(PMH)1.pdf', 'Penetapan_Panitera_Pengganti1.pdf', 'Penetapan_Jurusita1.pdf', 'Penetapan_Hari_Sidang_(PHS)1.pdf', 'Relaas_Panggilan_Gabung1.pdf', 'Berita_Acara_Sidang_Gabung_kedua.pdf', NULL, NULL, NULL, 'Alat_Bukti_Pemohon,_P_1.pdf', 'Alat_Bukti_Termohon,_T_1_dan_T_2.pdf', NULL, NULL, NULL, NULL, 'Putusan_perkara_176-G-202219-08-2022-173151.pdf', NULL, NULL, 'Akta_Permohonan_Banding24-08-2022-185215.pdf', 'Surat_Tanda_Terima_Memori_Banding2.pdf', 'Memori_Banding24-08-2022-185413.pdf', NULL, 'Relaas_Pemberitahuan_Pernyataan_Banding_Ke_Terbanding24-08-2022-185608.pdf', 'Relaas_Pemberitahuan_dan_Penyerahan_Memori_Banding24-08-2022-185644.pdf', 'Surat_Ket_Tidak_Memasukan_Kontra_Memori_Banding24-08-2022-185742.pdf', NULL, NULL, NULL, 'Inzage_Gabung.pdf', NULL, 'Bukti_Biaya_Proses_Perkara_Banding_Bank_BRI_kedua.pdf', 'Bukti_Setor_Biaya_Pendaftaran_ke_Kas_Negara24-08-2022-190236.pdf', NULL),
(96, 8, '48/Pdt.G/2022/PA.Amg', 'Sukardin, SH', '6281323709545,62', 'Glorio Immanuel Katoppo,S.H.  dkk', '6282111127319', 'Harta Bersama', '2022-08-31', '2023-08-16', 'W18.A6/481/HK.05/08/2022', 'Panitera', 'Drs. Subardi Mooduto, M.H.', '196504211992021001', 1, '', 'Penunjukkan Panitera Pengganti', 'surat_pengantar_banding01-09-2022-130138.pdf', '2/Pdt.G/2023/PTA.Mdo', NULL, NULL, 'Scanned-image02-09-2022-170631.pdf', '2__Surat_kuasa02-09-2022-170943.pdf', '3__bukti_bayar_02-09-2022-172233.pdf', '3__PMH02-09-2022-171733.pdf', '4__PPP02-09-2022-171900.pdf', '5__PJS02-09-2022-171923.pdf', '6__PHS02-09-2022-172022.pdf', '8__relaas_panggilan02-09-2022-172305.pdf', 'combinepdf-26.pdf', NULL, NULL, NULL, 'ba_pembuktian_p_02-09-2022-175852.pdf', 'ba_pembuktian_t_02-09-2022-180329.pdf', NULL, NULL, NULL, NULL, 'salinan_putusan_48_Pdt_G_2022_PA_Amg_.pdf', 'PA_Amg__2022_Pdt_G_48_HARTA_BERSAMA1.rtf', '2__Surat_kuasa02-09-2022-1709434.pdf', 'akta_banding_1661897223_2582784.pdf', 'tanda_terima_memori_banding_07-09-2022-195441.pdf', 'memori_banding_1662429583_258278.pdf', NULL, 'Relaas_pernyataan_banding_07-09-2022-195420.pdf', 'relaas_pbt_memori_banding_07-09-2022-195458.pdf', 'Tanda_Terima_Kontra_13-09-2022-170330.pdf', 'kontra_memori_banding_1663036093_9795.pdf', NULL, 'Relaas_Pemberitahuan_Kontra_13-09-2022-170348.pdf', 'combinepdf-30.pdf', NULL, 'Biaya_Banding16-09-2022-172536.pdf', 'PNBP_Daftar_Banding15-09-2022-134200.pdf', 'susulstiawati_baranti16-09-2022-201032.pdf'),
(97, 3, '2580/Pdt.G/2022/PA.Tty', 'Andi Law', '6282111127319,62', 'San Sam Tong', '6281323709545', 'Cerai Talak', '2022-10-05', '2023-08-16', 'W18.A10/16/HK.05/10/2022', 'Panmud Hukum', 'Kim Jong Un', '197822522545454825', 1, 'Dikirim dengan Hormat', 'Pendaftaran Perkara', NULL, '1/Pdt.G/2023/PTA.Mdo', '1100_-_Izin_Replikasi_Aplikasi_AWASS_PTA_Manado.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, 3, '3/Pdt.G/2023/PA.Tty', 'Gaga', '082111127319', 'Awkarin', '081323709545', 'Harta Bersama', '2023-09-18', '2023-09-19', 'KPA.W18-A10/31/HK2.6/IX/2023', 'Panitera', 'Bambang', '199504192020121006', 1, '-', NULL, NULL, '3/Pdt.G/2023/PTA.Mdo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Triggers `list_perkara`
--
DELIMITER $$
CREATE TRIGGER `inser_id_perkara` AFTER INSERT ON `list_perkara` FOR EACH ROW BEGIN
    INSERT INTO penunjukan_pp (id_perkara)
    VALUES(NEW.id_perkara);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_id_perkara_pmh` AFTER INSERT ON `list_perkara` FOR EACH ROW BEGIN
    INSERT INTO pmh (id_perkara)
    VALUES(NEW.id_perkara);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_log_inbox` AFTER INSERT ON `list_perkara` FOR EACH ROW BEGIN
    INSERT INTO log_inbox (id_log_inbox, id_perkara, no_perkara, is_read, change_date)
    VALUES ("", new.id_perkara, new.no_perkara, 1, now());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `log_audittrail`
--

CREATE TABLE `log_audittrail` (
  `log_id` int(5) NOT NULL,
  `isi_log` text CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rekam_log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_log` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_audittrail`
--

INSERT INTO `log_audittrail` (`log_id`, `isi_log`, `rekam_log`, `nama_log`) VALUES
(61, 'User <b>Pengadilan Agama Kotamobagu</b> telah menambah data perkara', '2021-08-11 08:03:15', 'Pengadilan Agama Kotamobagu'),
(62, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-08-12 05:35:05', 'Pengadilan Agama Kotamobagu'),
(63, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload surat pengantar pada id perkara <b>57</b>', '2021-08-12 05:35:35', 'Pengadilan Agama Kotamobagu'),
(64, 'User <b>Pengadilan Agama Tondano</b> telah menambah data perkara', '2021-08-12 08:57:14', 'Pengadilan Agama Tondano'),
(65, 'User <b>Pengadilan Agama Tondano</b> telah upload surat pengantar pada id perkara <b>58</b>', '2021-08-13 02:20:57', 'Pengadilan Agama Tondano'),
(66, 'User <b>Pengadilan Agama Tondano</b> telah upload berkas bundel A pada id perkara <b>58</b>', '2021-08-13 02:27:53', 'Pengadilan Agama Tondano'),
(67, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel A pada id perkara <b>57</b>', '2021-08-13 07:47:24', 'Pengadilan Agama Kotamobagu'),
(68, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload surat pengantar pada id perkara <b>57</b>', '2021-08-15 02:31:11', 'Pengadilan Agama Kotamobagu'),
(69, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel A pada id perkara <b>57</b>', '2021-08-15 03:10:55', 'Pengadilan Agama Kotamobagu'),
(70, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-08-18 03:23:37', 'Pengadilan Agama Kotamobagu'),
(71, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>22</b>', '2021-08-18 15:36:57', 'Pengadilan Tinggi Agama Manado'),
(72, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-08-18 15:38:46', 'Pengadilan Tinggi Agama Manado'),
(73, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-08-18 15:39:19', 'Pengadilan Tinggi Agama Manado'),
(74, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-08-18 15:39:48', 'Pengadilan Tinggi Agama Manado'),
(75, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-08-18 15:41:19', 'Pengadilan Tinggi Agama Manado'),
(76, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-08-18 15:41:49', 'Pengadilan Tinggi Agama Manado'),
(77, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-08-18 15:42:43', 'Pengadilan Tinggi Agama Manado'),
(78, 'User <b>Pengadilan Agama Tutuyan</b> telah menambah data perkara', '2021-08-18 15:47:34', 'Pengadilan Agama Tutuyan'),
(79, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>29</b>', '2021-08-19 00:22:11', 'Pengadilan Tinggi Agama Manado'),
(80, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2021-08-19 00:30:58', 'Pengadilan Agama Manado'),
(81, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>22</b>', '2021-08-19 00:33:17', 'Pengadilan Tinggi Agama Manado'),
(82, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>60</b>', '2021-08-19 00:43:11', 'Pengadilan Agama Manado'),
(83, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-08-19 06:19:36', 'Pengadilan Tinggi Agama Manado'),
(84, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-08-19 06:20:14', 'Pengadilan Tinggi Agama Manado'),
(85, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>60</b>', '2021-08-19 06:23:15', 'Pengadilan Tinggi Agama Manado'),
(86, 'User <b>Drs. H. Abdul Hakim, M.HI.</b> telah memberikan catatan', '2021-08-19 06:25:12', 'Drs. H. Abdul Hakim, M.HI.'),
(87, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>60</b>', '2021-08-19 06:26:30', 'Pengadilan Tinggi Agama Manado'),
(88, 'User <b>Drs. H. Abdul Hakim, M.HI.</b> telah memberikan catatan', '2021-08-19 06:29:35', 'Drs. H. Abdul Hakim, M.HI.'),
(89, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>58</b>', '2021-08-19 06:36:12', 'Pengadilan Tinggi Agama Manado'),
(90, 'User <b>Dr. H. Barmawi, M.H.</b> telah memberikan catatan', '2021-08-19 06:39:14', 'Dr. H. Barmawi, M.H.'),
(91, 'User <b>Dr. H. Barmawi, M.H.</b> telah memberikan catatan', '2021-08-19 06:41:11', 'Dr. H. Barmawi, M.H.'),
(92, 'User <b>Dr. H. Barmawi, M.H.</b> telah memberikan catatan', '2021-08-19 06:45:03', 'Dr. H. Barmawi, M.H.'),
(93, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>60</b>', '2021-08-19 06:51:11', 'Pengadilan Tinggi Agama Manado'),
(94, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>60</b>', '2021-08-19 06:55:11', 'Pengadilan Tinggi Agama Manado'),
(95, 'User <b>Pengadilan Agama Kotamobagu</b> telah menambah data perkara', '2021-08-19 08:49:03', 'Pengadilan Agama Kotamobagu'),
(96, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload surat pengantar pada id perkara <b>57</b>', '2021-08-19 08:52:05', 'Pengadilan Agama Kotamobagu'),
(97, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload surat pengantar pada id perkara <b>61</b>', '2021-08-19 08:54:15', 'Pengadilan Agama Kotamobagu'),
(98, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-08-19 14:46:12', 'Pengadilan Tinggi Agama Manado'),
(99, 'User <b>Drs. Zainal Aripin, S.H.,M.Hum.</b> telah memberikan catatan', '2021-08-20 00:56:19', 'Drs. Zainal Aripin, S.H.,M.Hum.'),
(100, 'User <b>Drs. Zainal Aripin, S.H.,M.Hum.</b> telah memberikan catatan', '2021-08-20 01:42:18', 'Drs. Zainal Aripin, S.H.,M.Hum.'),
(101, 'User <b>Drs. H. Abdul Hakim, M.HI.</b> telah memberikan catatan', '2021-08-20 05:27:08', 'Drs. H. Abdul Hakim, M.HI.'),
(102, 'User <b>Pengadilan Agama Percobaan</b> telah menambah data perkara', '2021-08-20 05:44:14', 'Pengadilan Agama Percobaan'),
(103, 'User <b>Pengadilan Agama Tutuyan</b> telah menambah data perkara', '2021-08-20 05:50:01', 'Pengadilan Agama Tutuyan'),
(104, 'User <b>Pengadilan Agama Tutuyan</b> telah menambah data perkara', '2021-08-20 05:53:56', 'Pengadilan Agama Tutuyan'),
(105, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2021-08-20 06:36:21', 'Pengadilan Agama Manado'),
(106, 'User <b>Pengadilan Agama Manado</b> telah upload surat pengantar pada id perkara <b>65</b>', '2021-08-20 06:38:07', 'Pengadilan Agama Manado'),
(107, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>65</b>', '2021-08-20 06:48:50', 'Pengadilan Tinggi Agama Manado'),
(108, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>65</b>', '2021-08-20 06:48:50', 'Pengadilan Tinggi Agama Manado'),
(109, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>65</b>', '2021-08-20 06:50:26', 'Pengadilan Tinggi Agama Manado'),
(110, 'User <b>Pengadilan Agama Tutuyan</b> telah menambah data perkara', '2021-08-22 04:16:40', 'Pengadilan Agama Tutuyan'),
(111, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>66</b>', '2021-08-22 04:20:01', 'Pengadilan Agama Tutuyan'),
(112, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>66</b>', '2021-08-22 04:22:54', 'Pengadilan Agama Tutuyan'),
(113, 'User <b>Pengadilan Agama Percobaan</b> telah menambah data perkara', '2021-08-22 04:26:12', 'Pengadilan Agama Percobaan'),
(114, 'User <b>Pengadilan Agama Percobaan</b> telah upload berkas bundel B pada id perkara <b>67</b>', '2021-08-22 04:27:54', 'Pengadilan Agama Percobaan'),
(115, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel B pada id perkara <b>57</b>', '2021-08-22 05:12:39', 'Pengadilan Agama Kotamobagu'),
(116, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel A pada id perkara <b>61</b>', '2021-08-23 05:26:47', 'Pengadilan Agama Kotamobagu'),
(117, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel B pada id perkara <b>61</b>', '2021-08-23 06:05:36', 'Pengadilan Agama Kotamobagu'),
(118, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>57</b>', '2021-08-24 03:50:26', 'Pengadilan Tinggi Agama Manado'),
(119, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>58</b>', '2021-08-24 03:50:59', 'Pengadilan Tinggi Agama Manado'),
(120, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>57</b>', '2021-08-24 03:51:14', 'Pengadilan Tinggi Agama Manado'),
(121, 'User <b>Pengadilan Agama Tondano</b> telah upload berkas bundel B pada id perkara <b>58</b>', '2021-08-24 06:11:21', 'Pengadilan Agama Tondano'),
(122, 'User <b>Pengadilan Agama Tutuyan</b> telah menambah data perkara', '2021-08-24 06:51:16', 'Pengadilan Agama Tutuyan'),
(123, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2021-08-24 08:35:22', 'Pengadilan Agama Manado'),
(124, 'User <b>Pengadilan Agama Tutuyan</b> telah menambah data perkara', '2021-08-24 08:39:53', 'Pengadilan Agama Tutuyan'),
(125, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-08-25 01:45:07', 'Pengadilan Tinggi Agama Manado'),
(126, 'User <b>Pengadilan Agama Percobaan</b> telah menambah data perkara', '2021-08-25 07:28:59', 'Pengadilan Agama Percobaan'),
(127, 'User <b>Pengadilan Agama Tondano</b> telah upload berkas bundel A pada id perkara <b>58</b>', '2021-08-25 07:40:50', 'Pengadilan Agama Tondano'),
(128, 'User <b>Pengadilan Agama Percobaan</b> telah upload berkas bundel A pada id perkara <b>71</b>', '2021-08-25 08:41:48', 'Pengadilan Agama Percobaan'),
(129, 'User <b>Pengadilan Agama Percobaan</b> telah upload berkas bundel A pada id perkara <b>71</b>', '2021-08-25 08:57:15', 'Pengadilan Agama Percobaan'),
(130, 'User <b>Pengadilan Agama Percobaan</b> telah upload berkas bundel A pada id perkara <b>71</b>', '2021-08-26 02:02:00', 'Pengadilan Agama Percobaan'),
(131, 'User <b>Pengadilan Agama Percobaan</b> telah upload berkas bundel A pada id perkara <b>71</b>', '2021-08-26 02:04:52', 'Pengadilan Agama Percobaan'),
(132, 'User <b>Pengadilan Agama Percobaan</b> telah upload berkas bundel A pada id perkara <b>71</b>', '2021-08-26 08:34:38', 'Pengadilan Agama Percobaan'),
(133, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>61</b>', '2021-08-26 08:37:01', 'Pengadilan Tinggi Agama Manado'),
(134, 'User <b>Pengadilan Agama Percobaan</b> telah menambah data perkara', '2021-08-27 06:49:08', 'Pengadilan Agama Percobaan'),
(135, 'User <b>Pengadilan Agama Percobaan</b> telah menambah data perkara', '2021-08-27 08:14:48', 'Pengadilan Agama Percobaan'),
(136, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel A pada id perkara <b>57</b>', '2021-08-30 04:39:20', 'Pengadilan Agama Kotamobagu'),
(137, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-08-30 05:49:16', 'Pengadilan Tinggi Agama Manado'),
(138, 'User <b>Hakim Percobaan</b> telah memberikan catatan', '2021-08-30 05:51:12', 'Hakim Percobaan'),
(139, 'User <b>Hakim Percobaan</b> telah memberikan catatan', '2021-08-30 07:52:12', 'Hakim Percobaan'),
(140, 'User <b>Hakim Percobaan</b> telah memberikan catatan', '2021-08-30 08:11:19', 'Hakim Percobaan'),
(141, 'User <b>Hakim Percobaan</b> telah memberikan catatan', '2021-08-30 08:12:42', 'Hakim Percobaan'),
(142, 'User <b>Hakim Percobaan</b> telah memberikan catatan', '2021-08-30 08:14:24', 'Hakim Percobaan'),
(143, 'User <b>Hakim Percobaan</b> telah memberikan catatan', '2021-08-30 08:16:31', 'Hakim Percobaan'),
(144, 'User <b>Hakim Percobaan</b> telah memberikan catatan', '2021-08-30 08:23:07', 'Hakim Percobaan'),
(145, 'User <b>Hakim Percobaan</b> telah memberikan catatan', '2021-08-30 08:31:54', 'Hakim Percobaan'),
(146, 'User <b>Hakim Percobaan</b> telah memberikan catatan', '2021-08-30 08:40:26', 'Hakim Percobaan'),
(147, 'User <b>Hakim Percobaan</b> telah memberikan catatan', '2021-08-30 08:44:41', 'Hakim Percobaan'),
(148, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>57</b>', '2021-08-31 05:28:12', 'Pengadilan Tinggi Agama Manado'),
(149, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>61</b>', '2021-08-31 05:29:30', 'Pengadilan Tinggi Agama Manado'),
(150, 'User <b>Iskandar Paputungan</b> telah memberikan catatan', '2021-09-01 00:18:56', 'Iskandar Paputungan'),
(151, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>61</b>', '2021-09-01 04:22:28', 'Pengadilan Tinggi Agama Manado'),
(152, 'User <b>Pengadilan Agama Bolaang Uki</b> telah menambah data perkara', '2021-09-02 01:38:20', 'Pengadilan Agama Bolaang Uki'),
(153, 'User <b>Pengadilan Agama Percobaan</b> telah menambah data perkara', '2021-09-03 01:30:52', 'Pengadilan Agama Percobaan'),
(154, 'User <b>Pengadilan Agama Percobaan</b> telah upload surat pengantar pada id perkara <b>75</b>', '2021-09-03 02:54:06', 'Pengadilan Agama Percobaan'),
(155, 'User <b>Pengadilan Agama Percobaan</b> telah upload surat pengantar pada id perkara <b>75</b>', '2021-09-03 02:59:27', 'Pengadilan Agama Percobaan'),
(156, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2021-09-03 03:06:31', 'Pengadilan Agama Manado'),
(157, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>58</b>', '2021-09-06 00:53:33', 'Pengadilan Tinggi Agama Manado'),
(158, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>57</b>', '2021-09-07 02:42:17', 'Hasbiah'),
(159, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>57</b>', '2021-09-07 02:42:26', 'Hasbiah'),
(160, 'User <b>Hasbiah</b> telah upload putusan perkara banding pada id perkara <b>57</b>', '2021-09-07 02:42:46', 'Hasbiah'),
(161, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>58</b>', '2021-09-08 01:57:58', 'Pengadilan Tinggi Agama Manado'),
(162, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>58</b>', '2021-09-08 01:58:08', 'Pengadilan Tinggi Agama Manado'),
(163, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>58</b>', '2021-09-08 01:58:17', 'Pengadilan Tinggi Agama Manado'),
(164, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>58</b>', '2021-09-08 01:58:38', 'Pengadilan Tinggi Agama Manado'),
(165, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>58</b>', '2021-09-08 01:58:56', 'Pengadilan Tinggi Agama Manado'),
(166, 'User <b>Pengadilan Agama Lolak</b> telah menambah data perkara', '2021-09-10 01:43:46', 'Pengadilan Agama Lolak'),
(167, 'User <b>Pengadilan Agama Lolak</b> telah upload surat pengantar pada id perkara <b>77</b>', '2021-09-10 03:43:41', 'Pengadilan Agama Lolak'),
(168, 'User <b>Pengadilan Agama Lolak</b> telah upload berkas bundel A pada id perkara <b>77</b>', '2021-09-10 05:56:57', 'Pengadilan Agama Lolak'),
(169, 'User <b>Pengadilan Agama Lolak</b> telah upload berkas bundel B pada id perkara <b>77</b>', '2021-09-10 07:39:07', 'Pengadilan Agama Lolak'),
(170, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>61</b>', '2021-09-14 02:04:54', 'Hasbiah'),
(171, 'User <b>Pengadilan Agama Lolak</b> telah upload berkas bundel B pada id perkara <b>77</b>', '2021-09-14 03:03:40', 'Pengadilan Agama Lolak'),
(172, 'User <b>Hasbiah</b> telah input nomor perkara banding pada id perkara <b>77</b>', '2021-09-15 00:55:17', 'Hasbiah'),
(173, 'User <b>Pengadilan Agama Kotamobagu</b> telah menambah data perkara', '2021-09-17 01:08:51', 'Pengadilan Agama Kotamobagu'),
(174, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-09-17 01:10:53', 'Pengadilan Agama Kotamobagu'),
(175, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>77</b>', '2021-09-23 01:26:34', 'Pengadilan Tinggi Agama Manado'),
(176, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>61</b>', '2021-09-23 01:30:43', 'Pengadilan Tinggi Agama Manado'),
(177, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>61</b>', '2021-09-23 01:31:01', 'Pengadilan Tinggi Agama Manado'),
(178, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>77</b>', '2021-09-23 10:05:17', 'Pengadilan Tinggi Agama Manado'),
(179, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>77</b>', '2021-09-23 10:05:36', 'Pengadilan Tinggi Agama Manado'),
(180, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>77</b>', '2021-09-23 10:05:52', 'Pengadilan Tinggi Agama Manado'),
(181, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>77</b>', '2021-09-23 10:06:03', 'Pengadilan Tinggi Agama Manado'),
(182, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel A pada id perkara <b>78</b>', '2021-09-25 14:11:37', 'Pengadilan Agama Kotamobagu'),
(183, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-09-25 14:12:41', 'Pengadilan Agama Kotamobagu'),
(184, 'User <b>Pengadilan Agama Percobaan</b> telah menambah data perkara', '2021-09-27 06:06:05', 'Pengadilan Agama Percobaan'),
(185, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-09-28 01:20:25', 'Pengadilan Agama Kotamobagu'),
(186, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-09-28 01:21:33', 'Pengadilan Agama Kotamobagu'),
(187, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-09-28 06:09:03', 'Pengadilan Agama Kotamobagu'),
(188, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-09-28 06:19:33', 'Pengadilan Agama Kotamobagu'),
(189, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-09-28 06:23:59', 'Pengadilan Agama Kotamobagu'),
(190, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-09-28 07:45:19', 'Pengadilan Agama Kotamobagu'),
(191, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-09-28 07:55:37', 'Pengadilan Agama Kotamobagu'),
(192, 'User <b>Pengadilan Agama Percobaan</b> telah menambah data perkara', '2021-09-29 01:16:57', 'Pengadilan Agama Percobaan'),
(193, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel B pada id perkara <b>78</b>', '2021-09-29 03:11:25', 'Pengadilan Agama Kotamobagu'),
(194, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel B pada id perkara <b>78</b>', '2021-09-29 03:13:21', 'Pengadilan Agama Kotamobagu'),
(195, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload surat pengantar pada id perkara <b>78</b>', '2021-09-29 03:54:39', 'Pengadilan Agama Kotamobagu'),
(196, 'User <b>Hasbiah</b> telah input nomor perkara banding pada id perkara <b>78</b>', '2021-10-06 05:52:54', 'Hasbiah'),
(197, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>77</b>', '2021-10-06 05:54:18', 'Hasbiah'),
(198, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>78</b>', '2021-10-06 05:56:22', 'Hasbiah'),
(199, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>77</b>', '2021-10-11 01:18:17', 'Pengadilan Tinggi Agama Manado'),
(200, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>77</b>', '2021-10-11 01:18:56', 'Pengadilan Tinggi Agama Manado'),
(201, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>78</b>', '2021-10-11 01:19:24', 'Pengadilan Tinggi Agama Manado'),
(202, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>78</b>', '2021-10-11 03:55:35', 'Hasbiah'),
(203, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>78</b>', '2021-10-14 07:16:50', 'Pengadilan Tinggi Agama Manado'),
(204, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>78</b>', '2021-10-18 01:51:09', 'Pengadilan Tinggi Agama Manado'),
(205, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>61</b>', '2021-10-18 01:55:35', 'Pengadilan Tinggi Agama Manado'),
(206, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>76</b>', '2021-10-18 02:11:37', 'Pengadilan Tinggi Agama Manado'),
(207, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>74</b>', '2021-10-18 02:12:09', 'Pengadilan Tinggi Agama Manado'),
(208, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>78</b>', '2021-10-25 06:55:44', 'Pengadilan Tinggi Agama Manado'),
(209, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>78</b>', '2021-10-27 02:33:30', 'Pengadilan Tinggi Agama Manado'),
(210, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>78</b>', '2021-10-27 02:33:38', 'Pengadilan Tinggi Agama Manado'),
(211, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>78</b>', '2021-10-27 02:33:46', 'Pengadilan Tinggi Agama Manado'),
(212, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>78</b>', '2021-10-27 02:33:57', 'Pengadilan Tinggi Agama Manado'),
(213, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>78</b>', '2021-10-27 02:34:09', 'Pengadilan Tinggi Agama Manado'),
(214, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2021-11-03 08:29:42', 'Pengadilan Agama Manado'),
(215, 'User <b>Pengadilan Agama Manado</b> telah update data perkara', '2021-11-03 08:34:26', 'Pengadilan Agama Manado'),
(216, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2021-11-03 10:40:58', 'Pengadilan Agama Manado'),
(217, 'User <b>Pengadilan Agama Manado</b> telah upload surat pengantar pada id perkara <b>81</b>', '2021-11-03 10:42:33', 'Pengadilan Agama Manado'),
(218, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>81</b>', '2021-11-05 06:24:33', 'Pengadilan Tinggi Agama Manado'),
(219, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>82</b>', '2021-11-05 06:24:45', 'Pengadilan Tinggi Agama Manado'),
(220, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-11-05 08:29:55', 'Pengadilan Tinggi Agama Manado'),
(221, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>82</b>', '2021-11-08 09:54:08', 'Pengadilan Agama Manado'),
(222, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>81</b>', '2021-11-08 09:57:26', 'Pengadilan Agama Manado'),
(223, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>81</b>', '2021-11-08 10:15:30', 'Pengadilan Agama Manado'),
(224, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>82</b>', '2021-11-09 00:56:34', 'Pengadilan Agama Manado'),
(225, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>82</b>', '2021-11-09 01:15:48', 'Pengadilan Agama Manado'),
(226, 'User <b>Pengadilan Agama Manado</b> telah upload surat pengantar pada id perkara <b>82</b>', '2021-11-09 01:21:41', 'Pengadilan Agama Manado'),
(227, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>81</b>', '2021-11-10 04:12:31', 'Pengadilan Agama Manado'),
(228, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>82</b>', '2021-11-10 04:41:32', 'Pengadilan Agama Manado'),
(229, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>81</b>', '2021-11-10 05:26:37', 'Pengadilan Agama Manado'),
(230, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>82</b>', '2021-11-11 01:18:23', 'Pengadilan Tinggi Agama Manado'),
(231, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>81</b>', '2021-11-11 01:18:30', 'Pengadilan Tinggi Agama Manado'),
(232, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>81</b>', '2021-11-29 05:11:37', 'Pengadilan Tinggi Agama Manado'),
(233, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>82</b>', '2021-11-29 05:11:43', 'Pengadilan Tinggi Agama Manado'),
(234, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>82</b>', '2021-11-30 03:55:00', 'Pengadilan Tinggi Agama Manado'),
(235, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>81</b>', '2021-11-30 03:55:06', 'Pengadilan Tinggi Agama Manado'),
(236, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2021-11-30 05:31:37', 'Pengadilan Agama Manado'),
(237, 'User <b>Pengadilan Agama Manado</b> telah upload surat pengantar pada id perkara <b>83</b>', '2021-11-30 05:33:22', 'Pengadilan Agama Manado'),
(238, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>83</b>', '2021-11-30 08:10:36', 'Pengadilan Agama Manado'),
(239, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>83</b>', '2021-11-30 08:28:16', 'Pengadilan Agama Manado'),
(240, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>83</b>', '2021-12-01 00:38:31', 'Pengadilan Tinggi Agama Manado'),
(241, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>83</b>', '2021-12-01 00:38:48', 'Pengadilan Tinggi Agama Manado'),
(242, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>83</b>', '2021-12-01 00:38:52', 'Pengadilan Tinggi Agama Manado'),
(243, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>83</b>', '2021-12-01 00:38:57', 'Pengadilan Tinggi Agama Manado'),
(244, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>83</b>', '2021-12-01 00:39:17', 'Pengadilan Tinggi Agama Manado'),
(245, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>25</b>', '2021-12-01 02:04:19', 'Pengadilan Tinggi Agama Manado'),
(246, 'User <b>Iskandar Paputungan</b> telah memberikan catatan', '2021-12-01 02:19:58', 'Iskandar Paputungan'),
(247, 'User <b>Iskandar Paputungan</b> telah memberikan catatan', '2021-12-01 02:22:05', 'Iskandar Paputungan'),
(248, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>81</b>', '2021-12-01 02:26:37', 'Pengadilan Tinggi Agama Manado'),
(249, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>81</b>', '2021-12-01 02:27:08', 'Pengadilan Tinggi Agama Manado'),
(250, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>82</b>', '2021-12-01 03:15:59', 'Pengadilan Tinggi Agama Manado'),
(251, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>39</b>', '2021-12-02 15:43:27', 'Pengadilan Tinggi Agama Manado'),
(252, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-12-02 15:44:29', 'Pengadilan Tinggi Agama Manado'),
(253, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-12-02 15:45:39', 'Pengadilan Tinggi Agama Manado'),
(254, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-12-02 15:56:27', 'Pengadilan Tinggi Agama Manado'),
(255, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-12-02 15:59:09', 'Pengadilan Tinggi Agama Manado'),
(256, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-12-02 16:15:00', 'Pengadilan Tinggi Agama Manado'),
(257, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2021-12-02 16:19:37', 'Pengadilan Tinggi Agama Manado'),
(258, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2021-12-07 03:16:05', 'Pengadilan Agama Manado'),
(259, 'User <b>Pengadilan Agama Manado</b> telah upload surat pengantar pada id perkara <b>84</b>', '2021-12-07 03:18:35', 'Pengadilan Agama Manado'),
(260, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>84</b>', '2021-12-07 22:53:55', 'Pengadilan Agama Manado'),
(261, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>84</b>', '2021-12-08 01:28:44', 'Pengadilan Agama Manado'),
(262, 'User <b>Hasbiah</b> telah input nomor perkara banding pada id perkara <b>84</b>', '2021-12-08 03:05:41', 'Hasbiah'),
(263, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>84</b>', '2021-12-08 03:06:10', 'Hasbiah'),
(264, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>84</b>', '2021-12-08 03:06:37', 'Hasbiah'),
(265, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>84</b>', '2021-12-08 03:08:01', 'Hasbiah'),
(266, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>83</b>', '2021-12-08 07:58:08', 'Pengadilan Tinggi Agama Manado'),
(267, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>83</b>', '2021-12-08 07:58:45', 'Pengadilan Tinggi Agama Manado'),
(268, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>83</b>', '2021-12-13 00:34:13', 'Pengadilan Tinggi Agama Manado'),
(269, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>84</b>', '2021-12-13 00:34:21', 'Pengadilan Tinggi Agama Manado'),
(270, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>83</b>', '2021-12-17 01:26:26', 'Pengadilan Tinggi Agama Manado'),
(271, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>83</b>', '2021-12-17 01:26:32', 'Pengadilan Tinggi Agama Manado'),
(272, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>83</b>', '2021-12-17 01:26:44', 'Pengadilan Tinggi Agama Manado'),
(273, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>83</b>', '2021-12-17 01:26:52', 'Pengadilan Tinggi Agama Manado'),
(274, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>83</b>', '2021-12-17 01:27:24', 'Pengadilan Tinggi Agama Manado'),
(275, 'User <b>Iskandar Paputungan</b> telah memberikan catatan', '2021-12-20 01:11:43', 'Iskandar Paputungan'),
(276, 'User <b>Iskandar Paputungan</b> telah memberikan catatan', '2021-12-20 01:27:29', 'Iskandar Paputungan'),
(277, 'User <b>Iskandar Paputungan</b> telah memberikan catatan', '2021-12-20 01:52:12', 'Iskandar Paputungan'),
(278, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>84</b>', '2021-12-22 08:06:45', 'Pengadilan Tinggi Agama Manado'),
(279, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>84</b>', '2021-12-22 08:07:04', 'Pengadilan Tinggi Agama Manado'),
(280, 'User <b>Pengadilan Agama Kotamobagu</b> telah menambah data perkara', '2021-12-23 07:47:12', 'Pengadilan Agama Kotamobagu'),
(281, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel A pada id perkara <b>85</b>', '2021-12-23 07:55:57', 'Pengadilan Agama Kotamobagu'),
(282, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel B pada id perkara <b>85</b>', '2021-12-27 01:32:09', 'Pengadilan Agama Kotamobagu'),
(283, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel B pada id perkara <b>85</b>', '2021-12-27 01:43:44', 'Pengadilan Agama Kotamobagu'),
(284, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload surat pengantar pada id perkara <b>85</b>', '2021-12-27 05:41:15', 'Pengadilan Agama Kotamobagu'),
(285, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-12-27 05:44:56', 'Pengadilan Agama Kotamobagu'),
(286, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-12-27 05:46:20', 'Pengadilan Agama Kotamobagu'),
(287, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-12-27 05:47:18', 'Pengadilan Agama Kotamobagu'),
(288, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-12-27 05:48:43', 'Pengadilan Agama Kotamobagu'),
(289, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-12-27 06:03:36', 'Pengadilan Agama Kotamobagu'),
(290, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-12-27 06:05:21', 'Pengadilan Agama Kotamobagu'),
(291, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2021-12-27 06:06:03', 'Pengadilan Agama Kotamobagu'),
(292, 'User <b>Pengadilan Agama Percobaan</b> telah menambah data perkara', '2021-12-27 07:22:07', 'Pengadilan Agama Percobaan'),
(293, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload surat pengantar pada id perkara <b>85</b>', '2021-12-27 07:46:38', 'Pengadilan Agama Kotamobagu'),
(294, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel B pada id perkara <b>85</b>', '2022-01-03 08:15:18', 'Pengadilan Agama Kotamobagu'),
(295, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel B pada id perkara <b>85</b>', '2022-01-04 01:05:11', 'Pengadilan Agama Kotamobagu'),
(296, 'User <b>Hasbiah</b> telah input nomor perkara banding pada id perkara <b>85</b>', '2022-01-05 00:45:41', 'Hasbiah'),
(297, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>85</b>', '2022-01-05 00:46:24', 'Hasbiah'),
(298, 'User <b>Hasbiah</b> telah input nomor perkara banding pada id perkara <b>85</b>', '2022-01-05 00:47:13', 'Hasbiah'),
(299, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel A pada id perkara <b>85</b>', '2022-01-06 06:09:40', 'Pengadilan Agama Kotamobagu'),
(300, 'User <b>Pengadilan Agama Lolak</b> telah menambah data perkara', '2022-01-13 03:01:33', 'Pengadilan Agama Lolak'),
(301, 'User <b>Pengadilan Agama Lolak</b> telah update data perkara', '2022-01-13 04:48:16', 'Pengadilan Agama Lolak'),
(302, 'User <b>Pengadilan Agama Lolak</b> telah upload berkas bundel A pada id perkara <b>87</b>', '2022-01-13 04:56:27', 'Pengadilan Agama Lolak'),
(303, 'User <b>Pengadilan Agama Lolak</b> telah upload surat pengantar pada id perkara <b>87</b>', '2022-01-13 06:32:17', 'Pengadilan Agama Lolak'),
(304, 'User <b>Pengadilan Agama Lolak</b> telah update data perkara', '2022-01-13 09:10:16', 'Pengadilan Agama Lolak'),
(305, 'User <b>Pengadilan Agama Lolak</b> telah upload berkas bundel B pada id perkara <b>87</b>', '2022-01-14 07:20:00', 'Pengadilan Agama Lolak'),
(306, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>85</b>', '2022-01-17 01:53:37', 'Pengadilan Tinggi Agama Manado'),
(307, 'User <b>Pengadilan Agama Lolak</b> telah upload berkas bundel B pada id perkara <b>87</b>', '2022-01-17 11:47:59', 'Pengadilan Agama Lolak'),
(308, 'User <b>Hasbiah</b> telah input nomor perkara banding pada id perkara <b>87</b>', '2022-01-19 07:19:04', 'Hasbiah'),
(309, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>87</b>', '2022-01-19 07:19:26', 'Hasbiah'),
(310, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>87</b>', '2022-01-19 07:19:53', 'Hasbiah'),
(311, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>87</b>', '2022-01-19 07:20:17', 'Hasbiah'),
(312, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>87</b>', '2022-01-19 07:20:59', 'Hasbiah'),
(313, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>87</b>', '2022-01-19 07:21:08', 'Hasbiah'),
(314, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>87</b>', '2022-01-20 02:21:06', 'Hasbiah'),
(315, 'User <b>Hasbiah</b> telah memilih panitera pengganti pada perkara <b>87</b>', '2022-01-20 02:21:20', 'Hasbiah'),
(316, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>85</b>', '2022-01-20 02:21:54', 'Hasbiah'),
(317, 'User <b>Pengadilan Agama Lolak</b> telah upload berkas bundel B pada id perkara <b>87</b>', '2022-01-20 07:20:29', 'Pengadilan Agama Lolak'),
(318, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>85</b>', '2022-01-27 00:36:59', 'Pengadilan Tinggi Agama Manado'),
(319, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>85</b>', '2022-01-27 00:37:08', 'Pengadilan Tinggi Agama Manado'),
(320, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>85</b>', '2022-01-27 00:37:17', 'Pengadilan Tinggi Agama Manado'),
(321, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>87</b>', '2022-01-27 00:39:58', 'Pengadilan Tinggi Agama Manado'),
(322, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>87</b>', '2022-02-07 07:09:02', 'Pengadilan Tinggi Agama Manado'),
(323, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>87</b>', '2022-02-14 07:59:05', 'Pengadilan Tinggi Agama Manado'),
(324, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>87</b>', '2022-02-14 07:59:18', 'Pengadilan Tinggi Agama Manado'),
(325, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>87</b>', '2022-02-14 07:59:32', 'Pengadilan Tinggi Agama Manado'),
(326, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2022-03-01 00:27:07', 'Pengadilan Agama Manado'),
(327, 'User <b>Pengadilan Agama Manado</b> telah upload surat pengantar pada id perkara <b>88</b>', '2022-03-01 00:28:02', 'Pengadilan Agama Manado'),
(328, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>88</b>', '2022-03-01 07:04:53', 'Pengadilan Agama Manado'),
(329, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>88</b>', '2022-03-01 07:41:17', 'Pengadilan Agama Manado'),
(330, 'User <b>Hasbiah</b> telah input nomor perkara banding pada id perkara <b>88</b>', '2022-03-02 06:41:31', 'Hasbiah'),
(331, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>88</b>', '2022-03-02 06:41:57', 'Hasbiah'),
(332, 'User <b>Hasbiah</b> telah memilih panitera pengganti pada perkara <b>88</b>', '2022-03-02 06:42:56', 'Hasbiah'),
(333, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>88</b>', '2022-03-02 06:45:13', 'Hasbiah'),
(334, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>88</b>', '2022-03-02 06:45:33', 'Hasbiah'),
(335, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>88</b>', '2022-03-02 08:12:00', 'Pengadilan Agama Manado'),
(336, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>88</b>', '2022-03-08 23:59:36', 'Pengadilan Tinggi Agama Manado'),
(337, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>88</b>', '2022-03-17 03:58:21', 'Pengadilan Tinggi Agama Manado'),
(338, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>88</b>', '2022-03-17 03:58:28', 'Pengadilan Tinggi Agama Manado'),
(339, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>88</b>', '2022-03-17 03:58:41', 'Pengadilan Tinggi Agama Manado'),
(340, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>88</b>', '2022-03-17 04:03:36', 'Pengadilan Tinggi Agama Manado'),
(341, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>88</b>', '2022-03-17 04:04:03', 'Pengadilan Tinggi Agama Manado'),
(342, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>88</b>', '2022-03-22 02:19:19', 'Pengadilan Tinggi Agama Manado'),
(343, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2022-03-28 05:48:59', 'Pengadilan Tinggi Agama Manado'),
(344, 'User <b>Pengadilan Agama Manado</b> telah update data perkara', '2022-03-29 04:17:46', 'Pengadilan Agama Manado'),
(345, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>82</b>', '2022-03-29 05:35:33', 'Pengadilan Tinggi Agama Manado'),
(346, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>82</b>', '2022-03-29 05:35:43', 'Pengadilan Tinggi Agama Manado'),
(347, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>82</b>', '2022-03-29 05:37:36', 'Pengadilan Tinggi Agama Manado'),
(348, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>82</b>', '2022-03-29 05:41:09', 'Pengadilan Tinggi Agama Manado'),
(349, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>82</b>', '2022-03-29 05:48:53', 'Pengadilan Tinggi Agama Manado'),
(350, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>82</b>', '2022-03-29 05:48:59', 'Pengadilan Tinggi Agama Manado'),
(351, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>77</b>', '2022-03-29 05:53:53', 'Pengadilan Tinggi Agama Manado'),
(352, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>77</b>', '2022-03-29 05:57:38', 'Pengadilan Tinggi Agama Manado'),
(353, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2022-05-27 07:41:54', 'Pengadilan Agama Manado'),
(354, 'User <b>Pengadilan Agama Manado</b> telah upload surat pengantar pada id perkara <b>89</b>', '2022-05-27 07:42:46', 'Pengadilan Agama Manado'),
(355, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>89</b>', '2022-05-27 08:11:13', 'Pengadilan Agama Manado'),
(356, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>89</b>', '2022-05-27 08:50:01', 'Pengadilan Agama Manado'),
(357, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>89</b>', '2022-05-31 05:38:01', 'Pengadilan Tinggi Agama Manado'),
(358, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-05-31 05:38:22', 'Pengadilan Tinggi Agama Manado'),
(359, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-05-31 05:40:07', 'Pengadilan Tinggi Agama Manado'),
(360, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2022-05-31 05:46:47', 'Pengadilan Tinggi Agama Manado'),
(361, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>35</b>', '2022-05-31 05:50:07', 'Pengadilan Tinggi Agama Manado'),
(362, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-05-31 05:54:53', 'Hasbiah'),
(363, 'User <b>Hasbiah</b> telah memilih panitera pengganti pada perkara <b>89</b>', '2022-05-31 05:54:57', 'Hasbiah'),
(364, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-05-31 05:55:30', 'Hasbiah'),
(365, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-05-31 05:55:43', 'Hasbiah'),
(366, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-05-31 05:55:52', 'Hasbiah'),
(367, 'User <b>Hasbiah</b> telah memilih majelis hakim pada id perkara <b>89</b>', '2022-05-31 05:56:12', 'Hasbiah'),
(368, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-05-31 05:56:24', 'Hasbiah'),
(369, 'User <b>Hasbiah</b> telah memilih panitera pengganti pada perkara <b>89</b>', '2022-05-31 05:56:28', 'Hasbiah'),
(370, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-05-31 05:58:17', 'Pengadilan Tinggi Agama Manado'),
(371, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>47</b>', '2022-05-31 06:00:20', 'Pengadilan Tinggi Agama Manado'),
(372, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>89</b>', '2022-06-02 00:37:25', 'Pengadilan Agama Manado'),
(373, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-06-09 03:28:23', 'Pengadilan Tinggi Agama Manado'),
(374, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2022-06-10 07:40:15', 'Pengadilan Agama Manado'),
(375, 'User <b>Pengadilan Agama Manado</b> telah upload surat pengantar pada id perkara <b>90</b>', '2022-06-10 07:41:34', 'Pengadilan Agama Manado'),
(376, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>90</b>', '2022-06-10 07:53:40', 'Pengadilan Agama Manado'),
(377, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>90</b>', '2022-06-10 07:59:02', 'Pengadilan Agama Manado'),
(378, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>90</b>', '2022-06-10 08:15:00', 'Pengadilan Agama Manado'),
(379, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>90</b>', '2022-06-14 05:24:30', 'Pengadilan Tinggi Agama Manado'),
(380, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-14 05:24:50', 'Pengadilan Tinggi Agama Manado'),
(381, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-14 05:25:35', 'Pengadilan Tinggi Agama Manado'),
(382, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-14 05:26:11', 'Pengadilan Tinggi Agama Manado'),
(383, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-14 05:26:23', 'Pengadilan Tinggi Agama Manado'),
(384, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-14 05:47:08', 'Pengadilan Tinggi Agama Manado'),
(385, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-06-14 06:27:34', 'Pengadilan Tinggi Agama Manado'),
(386, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-06-14 06:27:57', 'Pengadilan Tinggi Agama Manado'),
(387, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-06-14 06:38:38', 'Pengadilan Tinggi Agama Manado'),
(388, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>90</b>', '2022-06-14 06:45:26', 'Pengadilan Agama Manado'),
(389, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-14 07:35:03', 'Pengadilan Tinggi Agama Manado'),
(390, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>90</b>', '2022-06-14 07:42:19', 'Pengadilan Agama Manado'),
(391, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-06-14 08:11:14', 'Pengadilan Tinggi Agama Manado'),
(392, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-06-14 08:11:28', 'Pengadilan Tinggi Agama Manado'),
(393, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-06-14 08:11:38', 'Pengadilan Tinggi Agama Manado'),
(394, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-06-14 08:11:49', 'Pengadilan Tinggi Agama Manado'),
(395, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-06-14 08:11:58', 'Pengadilan Tinggi Agama Manado'),
(396, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>89</b>', '2022-06-14 08:12:10', 'Pengadilan Tinggi Agama Manado'),
(397, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>89</b>', '2022-06-14 08:12:28', 'Pengadilan Tinggi Agama Manado'),
(398, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-14 08:12:52', 'Pengadilan Tinggi Agama Manado'),
(399, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-15 00:51:09', 'Pengadilan Tinggi Agama Manado'),
(400, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-15 00:51:33', 'Pengadilan Tinggi Agama Manado'),
(401, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-15 00:51:45', 'Pengadilan Tinggi Agama Manado');
INSERT INTO `log_audittrail` (`log_id`, `isi_log`, `rekam_log`, `nama_log`) VALUES
(402, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-15 00:51:56', 'Pengadilan Tinggi Agama Manado'),
(403, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-15 02:24:20', 'Pengadilan Tinggi Agama Manado'),
(404, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-15 05:24:14', 'Pengadilan Tinggi Agama Manado'),
(405, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-15 05:26:20', 'Pengadilan Tinggi Agama Manado'),
(406, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih panitera pengganti pada id perkara <b>90</b>', '2022-06-15 05:26:27', 'Pengadilan Tinggi Agama Manado'),
(407, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-15 05:26:37', 'Pengadilan Tinggi Agama Manado'),
(408, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih panitera pengganti pada id perkara <b>90</b>', '2022-06-15 05:26:43', 'Pengadilan Tinggi Agama Manado'),
(409, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-15 05:28:41', 'Pengadilan Tinggi Agama Manado'),
(410, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>90</b>', '2022-06-21 04:11:54', 'Pengadilan Agama Manado'),
(411, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>90</b>', '2022-06-21 04:12:48', 'Pengadilan Agama Manado'),
(412, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>90</b>', '2022-06-22 00:45:25', 'Pengadilan Agama Manado'),
(413, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-06-28 06:29:17', 'Pengadilan Tinggi Agama Manado'),
(414, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2022-07-05 07:34:18', 'Pengadilan Agama Manado'),
(415, 'User <b>Pengadilan Agama Manado</b> telah upload surat pengantar pada id perkara <b>91</b>', '2022-07-05 07:34:49', 'Pengadilan Agama Manado'),
(416, 'User <b>Pengadilan Agama Manado</b> telah update data perkara', '2022-07-05 08:01:08', 'Pengadilan Agama Manado'),
(417, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>91</b>', '2022-07-05 08:08:47', 'Pengadilan Agama Manado'),
(418, 'User <b>Pengadilan Agama Manado</b> telah update data perkara', '2022-07-05 08:10:04', 'Pengadilan Agama Manado'),
(419, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>91</b>', '2022-07-05 08:23:11', 'Pengadilan Agama Manado'),
(420, 'User <b>Pengadilan Agama Manado</b> telah update data perkara', '2022-07-05 08:34:15', 'Pengadilan Agama Manado'),
(421, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>91</b>', '2022-07-05 08:53:58', 'Pengadilan Agama Manado'),
(422, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>91</b>', '2022-07-05 08:57:12', 'Pengadilan Agama Manado'),
(423, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>91</b>', '2022-07-05 09:11:28', 'Pengadilan Agama Manado'),
(424, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>91</b>', '2022-07-05 09:40:32', 'Pengadilan Agama Manado'),
(425, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>91</b>', '2022-07-05 09:46:25', 'Pengadilan Agama Manado'),
(426, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>91</b>', '2022-07-06 00:39:09', 'Pengadilan Agama Manado'),
(427, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-06 03:16:48', 'Pengadilan Tinggi Agama Manado'),
(428, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>91</b>', '2022-07-06 03:16:57', 'Pengadilan Tinggi Agama Manado'),
(429, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-06 03:17:09', 'Pengadilan Tinggi Agama Manado'),
(430, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-06 03:17:51', 'Hasbiah'),
(431, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-06 03:20:22', 'Hasbiah'),
(432, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user majelis hakim <b>', '2022-07-06 03:21:29', 'Pengadilan Tinggi Agama Manado'),
(433, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user majelis hakim <b>', '2022-07-06 03:21:52', 'Pengadilan Tinggi Agama Manado'),
(434, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user majelis hakim <b>', '2022-07-06 03:22:11', 'Pengadilan Tinggi Agama Manado'),
(435, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-06 03:22:34', 'Pengadilan Tinggi Agama Manado'),
(436, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih majelis hakim pada id perkara <b>91</b>', '2022-07-06 03:22:38', 'Pengadilan Tinggi Agama Manado'),
(437, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-06 03:22:59', 'Pengadilan Tinggi Agama Manado'),
(438, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2022-07-06 03:24:25', 'Pengadilan Tinggi Agama Manado'),
(439, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-06 03:24:50', 'Pengadilan Tinggi Agama Manado'),
(440, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>48</b>', '2022-07-06 03:25:57', 'Pengadilan Tinggi Agama Manado'),
(441, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-06 03:26:07', 'Pengadilan Tinggi Agama Manado'),
(442, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih panitera pengganti pada id perkara <b>91</b>', '2022-07-06 03:26:12', 'Pengadilan Tinggi Agama Manado'),
(443, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>91</b>', '2022-07-06 07:43:26', 'Pengadilan Agama Manado'),
(444, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-08 08:03:43', 'Pengadilan Tinggi Agama Manado'),
(445, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-14 01:36:44', 'Pengadilan Tinggi Agama Manado'),
(446, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-20 02:53:50', 'Pengadilan Tinggi Agama Manado'),
(447, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-20 02:54:11', 'Pengadilan Tinggi Agama Manado'),
(448, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-20 02:54:21', 'Pengadilan Tinggi Agama Manado'),
(449, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>91</b>', '2022-07-20 02:54:31', 'Pengadilan Tinggi Agama Manado'),
(450, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>91</b>', '2022-07-20 02:54:47', 'Pengadilan Tinggi Agama Manado'),
(451, 'User <b>Pengadilan Agama Bitung</b> telah menambah data perkara', '2022-08-04 07:22:23', 'Pengadilan Agama Bitung'),
(452, 'User <b>Pengadilan Agama Bitung</b> telah update data perkara', '2022-08-04 07:24:07', 'Pengadilan Agama Bitung'),
(453, 'User <b>Pengadilan Agama Bitung</b> telah update data perkara', '2022-08-04 07:26:14', 'Pengadilan Agama Bitung'),
(454, 'User <b>Pengadilan Agama Bitung</b> telah update data perkara', '2022-08-04 07:28:28', 'Pengadilan Agama Bitung'),
(455, 'User <b>Pengadilan Agama Manado</b> telah menambah data perkara', '2022-08-04 08:16:22', 'Pengadilan Agama Manado'),
(456, 'User <b>Pengadilan Agama Manado</b> telah upload surat pengantar pada id perkara <b>93</b>', '2022-08-04 08:17:33', 'Pengadilan Agama Manado'),
(457, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>93</b>', '2022-08-04 08:23:13', 'Pengadilan Agama Manado'),
(458, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>93</b>', '2022-08-05 07:18:43', 'Pengadilan Agama Manado'),
(459, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>93</b>', '2022-08-05 07:24:20', 'Pengadilan Agama Manado'),
(460, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>93</b>', '2022-08-05 07:28:14', 'Pengadilan Agama Manado'),
(461, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>93</b>', '2022-08-05 07:41:01', 'Pengadilan Agama Manado'),
(462, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>93</b>', '2022-08-05 07:44:40', 'Pengadilan Agama Manado'),
(463, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>93</b>', '2022-08-05 07:46:28', 'Pengadilan Agama Manado'),
(464, 'User <b>Pengadilan Agama Bitung</b> telah upload surat pengantar pada id perkara <b>92</b>', '2022-08-05 08:06:01', 'Pengadilan Agama Bitung'),
(465, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel A pada id perkara <b>92</b>', '2022-08-05 08:09:21', 'Pengadilan Agama Bitung'),
(466, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel A pada id perkara <b>92</b>', '2022-08-05 08:09:38', 'Pengadilan Agama Bitung'),
(467, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel A pada id perkara <b>92</b>', '2022-08-05 08:10:04', 'Pengadilan Agama Bitung'),
(468, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel A pada id perkara <b>92</b>', '2022-08-05 08:10:24', 'Pengadilan Agama Bitung'),
(469, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel A pada id perkara <b>92</b>', '2022-08-05 08:11:03', 'Pengadilan Agama Bitung'),
(470, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel A pada id perkara <b>92</b>', '2022-08-05 08:12:12', 'Pengadilan Agama Bitung'),
(471, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel B pada id perkara <b>92</b>', '2022-08-05 08:15:18', 'Pengadilan Agama Bitung'),
(472, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel B pada id perkara <b>92</b>', '2022-08-05 08:16:08', 'Pengadilan Agama Bitung'),
(473, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel B pada id perkara <b>92</b>', '2022-08-05 08:17:14', 'Pengadilan Agama Bitung'),
(474, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel B pada id perkara <b>92</b>', '2022-08-05 08:21:06', 'Pengadilan Agama Bitung'),
(475, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel B pada id perkara <b>92</b>', '2022-08-05 08:22:03', 'Pengadilan Agama Bitung'),
(476, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel B pada id perkara <b>92</b>', '2022-08-05 08:24:33', 'Pengadilan Agama Bitung'),
(477, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel B pada id perkara <b>92</b>', '2022-08-05 08:25:52', 'Pengadilan Agama Bitung'),
(478, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel B pada id perkara <b>92</b>', '2022-08-05 08:27:45', 'Pengadilan Agama Bitung'),
(479, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel B pada id perkara <b>92</b>', '2022-08-05 08:28:19', 'Pengadilan Agama Bitung'),
(480, 'User <b>Pengadilan Agama Bitung</b> telah upload berkas bundel B pada id perkara <b>92</b>', '2022-08-08 00:50:49', 'Pengadilan Agama Bitung'),
(481, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>93</b>', '2022-08-08 06:20:58', 'Pengadilan Agama Manado'),
(482, 'User <b>Pengadilan Agama Manado</b> telah upload surat pengantar pada id perkara <b>93</b>', '2022-08-10 05:09:13', 'Pengadilan Agama Manado'),
(483, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>93</b>', '2022-08-10 05:12:02', 'Pengadilan Agama Manado'),
(484, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>93</b>', '2022-08-10 05:19:16', 'Pengadilan Agama Manado'),
(485, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>93</b>', '2022-08-10 05:21:01', 'Pengadilan Agama Manado'),
(486, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>93</b>', '2022-08-10 10:52:21', 'Pengadilan Agama Manado'),
(487, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>93</b>', '2022-08-11 06:25:21', 'Pengadilan Tinggi Agama Manado'),
(488, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-08-11 06:32:39', 'Pengadilan Tinggi Agama Manado'),
(489, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-08-11 06:33:29', 'Pengadilan Tinggi Agama Manado'),
(490, 'User <b>Pengadilan Agama Manado</b> telah upload surat pengantar pada id perkara <b>90</b>', '2022-08-12 00:03:42', 'Pengadilan Agama Manado'),
(491, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>90</b>', '2022-08-12 00:07:53', 'Pengadilan Agama Manado'),
(492, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel B pada id perkara <b>90</b>', '2022-08-12 00:15:11', 'Pengadilan Agama Manado'),
(493, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-08-12 00:16:26', 'Pengadilan Tinggi Agama Manado'),
(494, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user majelis hakim <b>', '2022-08-12 00:17:06', 'Pengadilan Tinggi Agama Manado'),
(495, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user majelis hakim <b>', '2022-08-12 00:17:21', 'Pengadilan Tinggi Agama Manado'),
(496, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user majelis hakim <b>', '2022-08-12 00:17:32', 'Pengadilan Tinggi Agama Manado'),
(497, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menghapus user majelis hakim <b>', '2022-08-12 00:17:40', 'Pengadilan Tinggi Agama Manado'),
(498, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user majelis hakim <b>', '2022-08-12 00:17:46', 'Pengadilan Tinggi Agama Manado'),
(499, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-08-12 00:18:00', 'Pengadilan Tinggi Agama Manado'),
(500, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih majelis hakim pada id perkara <b>93</b>', '2022-08-12 00:18:04', 'Pengadilan Tinggi Agama Manado'),
(501, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-08-12 00:25:00', 'Pengadilan Tinggi Agama Manado'),
(502, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih panitera pengganti pada id perkara <b>93</b>', '2022-08-12 00:25:37', 'Pengadilan Tinggi Agama Manado'),
(503, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-08-12 00:28:27', 'Pengadilan Tinggi Agama Manado'),
(504, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>92</b>', '2022-08-12 00:59:17', 'Pengadilan Tinggi Agama Manado'),
(505, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-08-12 03:09:09', 'Pengadilan Tinggi Agama Manado'),
(506, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-08-12 03:09:20', 'Pengadilan Tinggi Agama Manado'),
(507, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user majelis hakim <b>', '2022-08-12 03:10:03', 'Pengadilan Tinggi Agama Manado'),
(508, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user majelis hakim <b>', '2022-08-12 03:10:40', 'Pengadilan Tinggi Agama Manado'),
(509, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user majelis hakim <b>', '2022-08-12 03:10:49', 'Pengadilan Tinggi Agama Manado'),
(510, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-08-12 03:11:28', 'Pengadilan Tinggi Agama Manado'),
(511, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih majelis hakim pada id perkara <b>92</b>', '2022-08-12 03:11:31', 'Pengadilan Tinggi Agama Manado'),
(512, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-08-12 03:11:44', 'Pengadilan Tinggi Agama Manado'),
(513, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih panitera pengganti pada id perkara <b>92</b>', '2022-08-12 03:11:48', 'Pengadilan Tinggi Agama Manado'),
(514, 'User <b>Pengadilan Agama Manado</b> telah upload berkas bundel A pada id perkara <b>90</b>', '2022-08-15 00:48:08', 'Pengadilan Agama Manado'),
(515, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-08-16 01:53:32', 'Pengadilan Tinggi Agama Manado'),
(516, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2022-08-16 02:08:56', 'Pengadilan Tinggi Agama Manado'),
(517, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-08-18 05:07:12', 'Pengadilan Tinggi Agama Manado'),
(518, 'User <b>Pengadilan Agama Tutuyan</b> telah menambah data perkara', '2022-08-20 05:30:47', 'Pengadilan Agama Tutuyan'),
(519, 'User <b>Pengadilan Agama Tutuyan</b> telah update data perkara', '2022-08-20 05:31:39', 'Pengadilan Agama Tutuyan'),
(520, 'User <b>Pengadilan Agama Tutuyan</b> telah upload surat pengantar pada id perkara <b>94</b>', '2022-08-20 05:35:59', 'Pengadilan Agama Tutuyan'),
(521, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel A pada id perkara <b>94</b>', '2022-08-20 06:43:39', 'Pengadilan Agama Tutuyan'),
(522, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel A pada id perkara <b>94</b>', '2022-08-20 06:43:54', 'Pengadilan Agama Tutuyan'),
(523, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel A pada id perkara <b>94</b>', '2022-08-20 06:44:10', 'Pengadilan Agama Tutuyan'),
(524, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel A pada id perkara <b>94</b>', '2022-08-20 06:44:25', 'Pengadilan Agama Tutuyan'),
(525, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel A pada id perkara <b>94</b>', '2022-08-20 06:44:37', 'Pengadilan Agama Tutuyan'),
(526, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel A pada id perkara <b>94</b>', '2022-08-20 06:44:50', 'Pengadilan Agama Tutuyan'),
(527, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel A pada id perkara <b>94</b>', '2022-08-20 06:45:05', 'Pengadilan Agama Tutuyan'),
(528, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel A pada id perkara <b>94</b>', '2022-08-20 06:45:20', 'Pengadilan Agama Tutuyan'),
(529, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel A pada id perkara <b>94</b>', '2022-08-20 06:46:08', 'Pengadilan Agama Tutuyan'),
(530, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel A pada id perkara <b>94</b>', '2022-08-20 06:46:29', 'Pengadilan Agama Tutuyan'),
(531, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel A pada id perkara <b>94</b>', '2022-08-20 06:46:51', 'Pengadilan Agama Tutuyan'),
(532, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>94</b>', '2022-08-20 08:14:09', 'Pengadilan Agama Tutuyan'),
(533, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>94</b>', '2022-08-20 08:20:58', 'Pengadilan Agama Tutuyan'),
(534, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>94</b>', '2022-08-20 08:54:18', 'Pengadilan Agama Tutuyan'),
(535, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>94</b>', '2022-08-20 08:58:44', 'Pengadilan Agama Tutuyan'),
(536, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>94</b>', '2022-08-20 09:37:48', 'Pengadilan Agama Tutuyan'),
(537, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>94</b>', '2022-08-20 09:38:30', 'Pengadilan Agama Tutuyan'),
(538, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>94</b>', '2022-08-20 09:39:11', 'Pengadilan Agama Tutuyan'),
(539, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>94</b>', '2022-08-20 09:41:29', 'Pengadilan Agama Tutuyan'),
(540, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>94</b>', '2022-08-20 09:50:14', 'Pengadilan Agama Tutuyan'),
(541, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>94</b>', '2022-08-20 09:53:05', 'Pengadilan Agama Tutuyan'),
(542, 'User <b>Pengadilan Agama Tutuyan</b> telah upload berkas bundel B pada id perkara <b>94</b>', '2022-08-23 05:38:40', 'Pengadilan Agama Tutuyan'),
(543, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-08-24 00:13:31', 'Pengadilan Tinggi Agama Manado'),
(544, 'User <b>Pengadilan Agama Kotamobagu</b> telah menambah data perkara', '2022-08-25 03:43:43', 'Pengadilan Agama Kotamobagu'),
(545, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload surat pengantar pada id perkara <b>95</b>', '2022-08-25 06:04:07', 'Pengadilan Agama Kotamobagu'),
(546, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel A pada id perkara <b>95</b>', '2022-08-25 06:37:35', 'Pengadilan Agama Kotamobagu'),
(547, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel A pada id perkara <b>95</b>', '2022-08-25 06:39:37', 'Pengadilan Agama Kotamobagu'),
(548, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel B pada id perkara <b>95</b>', '2022-08-25 06:54:01', 'Pengadilan Agama Kotamobagu'),
(549, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel A pada id perkara <b>95</b>', '2022-08-25 06:59:47', 'Pengadilan Agama Kotamobagu'),
(550, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel B pada id perkara <b>95</b>', '2022-08-25 07:03:25', 'Pengadilan Agama Kotamobagu'),
(551, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel B pada id perkara <b>95</b>', '2022-08-25 07:41:25', 'Pengadilan Agama Kotamobagu'),
(552, 'User <b>Pengadilan Agama Kotamobagu</b> telah upload berkas bundel B pada id perkara <b>95</b>', '2022-08-25 07:44:04', 'Pengadilan Agama Kotamobagu'),
(553, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>94</b>', '2022-08-26 02:02:26', 'Pengadilan Tinggi Agama Manado'),
(554, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>94</b>', '2022-08-26 02:02:39', 'Pengadilan Tinggi Agama Manado'),
(555, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>94</b>', '2022-08-26 02:02:56', 'Pengadilan Tinggi Agama Manado'),
(556, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>94</b>', '2022-08-26 02:03:03', 'Pengadilan Tinggi Agama Manado'),
(557, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-08-26 02:03:13', 'Pengadilan Tinggi Agama Manado'),
(558, 'User <b>Pengadilan Agama Kotamobagu</b> telah update data perkara', '2022-08-26 07:04:32', 'Pengadilan Agama Kotamobagu'),
(559, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-08-28 14:31:21', 'Pengadilan Tinggi Agama Manado'),
(560, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-08-28 14:31:35', 'Pengadilan Tinggi Agama Manado'),
(561, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-08-28 14:31:44', 'Pengadilan Tinggi Agama Manado'),
(562, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>90</b>', '2022-08-28 14:32:11', 'Pengadilan Tinggi Agama Manado'),
(563, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>94</b>', '2022-08-28 14:37:42', 'Pengadilan Tinggi Agama Manado'),
(564, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menghapus user majelis hakim <b>', '2022-08-28 14:38:03', 'Pengadilan Tinggi Agama Manado'),
(565, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user majelis hakim <b>', '2022-08-28 14:38:31', 'Pengadilan Tinggi Agama Manado'),
(566, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>94</b>', '2022-08-28 14:38:50', 'Pengadilan Tinggi Agama Manado'),
(567, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih majelis hakim pada id perkara <b>94</b>', '2022-08-28 14:38:53', 'Pengadilan Tinggi Agama Manado'),
(568, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>94</b>', '2022-08-28 14:39:07', 'Pengadilan Tinggi Agama Manado'),
(569, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih panitera pengganti pada id perkara <b>94</b>', '2022-08-28 14:39:11', 'Pengadilan Tinggi Agama Manado'),
(570, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>94</b>', '2022-08-28 14:39:26', 'Pengadilan Tinggi Agama Manado'),
(571, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>28</b>', '2022-08-31 05:13:03', 'Pengadilan Tinggi Agama Manado'),
(572, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>28</b>', '2022-08-31 05:13:16', 'Pengadilan Tinggi Agama Manado'),
(573, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>29</b>', '2022-08-31 05:13:29', 'Pengadilan Tinggi Agama Manado'),
(574, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-08-31 07:24:11', 'Pengadilan Tinggi Agama Manado'),
(575, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-08-31 07:24:21', 'Pengadilan Tinggi Agama Manado'),
(576, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-08-31 07:24:29', 'Pengadilan Tinggi Agama Manado'),
(577, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-08-31 07:24:35', 'Pengadilan Tinggi Agama Manado'),
(578, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-08-31 07:24:41', 'Pengadilan Tinggi Agama Manado'),
(579, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>93</b>', '2022-08-31 07:25:10', 'Pengadilan Tinggi Agama Manado'),
(580, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-08-31 07:26:57', 'Pengadilan Tinggi Agama Manado'),
(581, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-08-31 07:27:06', 'Pengadilan Tinggi Agama Manado'),
(582, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-08-31 07:27:14', 'Pengadilan Tinggi Agama Manado'),
(583, 'User <b>naja</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-08-31 07:28:17', 'naja'),
(584, 'User <b>naja</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-08-31 07:29:43', 'naja'),
(585, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-08-31 07:31:13', 'Pengadilan Tinggi Agama Manado'),
(586, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>92</b>', '2022-08-31 07:31:28', 'Pengadilan Tinggi Agama Manado'),
(587, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2022-08-31 07:44:52', 'Pengadilan Tinggi Agama Manado'),
(588, 'User <b>Pengadilan Agama Amurang</b> telah menambah data perkara', '2022-08-31 09:38:18', 'Pengadilan Agama Amurang'),
(589, 'User <b>Pengadilan Agama Amurang</b> telah update data perkara', '2022-08-31 10:18:43', 'Pengadilan Agama Amurang'),
(590, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>95</b>', '2022-09-01 07:46:21', 'Pengadilan Tinggi Agama Manado'),
(591, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>95</b>', '2022-09-01 07:46:30', 'Pengadilan Tinggi Agama Manado'),
(592, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>95</b>', '2022-09-01 07:48:17', 'Pengadilan Tinggi Agama Manado'),
(593, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user majelis hakim <b>', '2022-09-01 07:48:52', 'Pengadilan Tinggi Agama Manado'),
(594, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>95</b>', '2022-09-01 07:49:11', 'Pengadilan Tinggi Agama Manado'),
(595, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih majelis hakim pada id perkara <b>95</b>', '2022-09-01 07:49:15', 'Pengadilan Tinggi Agama Manado'),
(596, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>95</b>', '2022-09-01 07:49:29', 'Pengadilan Tinggi Agama Manado'),
(597, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih panitera pengganti pada id perkara <b>95</b>', '2022-09-01 07:49:33', 'Pengadilan Tinggi Agama Manado'),
(598, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>95</b>', '2022-09-01 07:49:41', 'Pengadilan Tinggi Agama Manado'),
(599, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>93</b>', '2022-09-02 06:04:22', 'Pengadilan Tinggi Agama Manado'),
(600, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>93</b>', '2022-09-02 06:04:42', 'Pengadilan Tinggi Agama Manado'),
(601, 'User <b>naja</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-09-02 06:08:41', 'naja'),
(602, 'User <b>naja</b> telah upload putusan perkara banding pada id perkara <b>92</b>', '2022-09-02 06:08:57', 'naja'),
(603, 'User <b>naja</b> telah input status perkara banding pada id perkara <b>92</b>', '2022-09-02 06:09:19', 'naja'),
(604, 'User <b>naja</b> telah upload putusan perkara banding pada id perkara <b>92</b>', '2022-09-02 06:09:27', 'naja'),
(605, 'User <b>Pengadilan Agama Amurang</b> telah upload surat pengantar pada id perkara <b>96</b>', '2022-09-02 09:14:22', 'Pengadilan Agama Amurang'),
(606, 'User <b>Pengadilan Agama Amurang</b> telah upload berkas bundel A pada id perkara <b>96</b>', '2022-09-02 09:18:49', 'Pengadilan Agama Amurang'),
(607, 'User <b>Pengadilan Agama Amurang</b> telah upload berkas bundel B pada id perkara <b>96</b>', '2022-09-05 06:19:37', 'Pengadilan Agama Amurang'),
(608, 'User <b>Pengadilan Agama Amurang</b> telah upload berkas bundel B pada id perkara <b>96</b>', '2022-09-05 06:20:02', 'Pengadilan Agama Amurang'),
(609, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>94</b>', '2022-09-06 00:57:59', 'Pengadilan Tinggi Agama Manado'),
(610, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>90</b>', '2022-09-06 03:46:25', 'Hasbiah'),
(611, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>28</b>', '2022-09-06 05:46:19', 'Pengadilan Tinggi Agama Manado'),
(612, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>35</b>', '2022-09-06 05:48:28', 'Pengadilan Tinggi Agama Manado'),
(613, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>29</b>', '2022-09-06 05:50:03', 'Pengadilan Tinggi Agama Manado'),
(614, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>46</b>', '2022-09-06 05:51:06', 'Pengadilan Tinggi Agama Manado'),
(615, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>36</b>', '2022-09-06 05:53:47', 'Pengadilan Tinggi Agama Manado'),
(616, 'User <b>Pengadilan Agama Amurang</b> telah upload berkas bundel B pada id perkara <b>96</b>', '2022-09-07 00:35:49', 'Pengadilan Agama Amurang'),
(617, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>36</b>', '2022-09-07 01:19:47', 'Pengadilan Tinggi Agama Manado'),
(618, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan user <b>', '2022-09-07 01:20:51', 'Pengadilan Tinggi Agama Manado'),
(619, 'User <b>Pengadilan Agama Amurang</b> telah upload berkas bundel B pada id perkara <b>96</b>', '2022-09-07 06:55:50', 'Pengadilan Agama Amurang'),
(620, 'User <b>Pengadilan Agama Amurang</b> telah upload berkas bundel B pada id perkara <b>96</b>', '2022-09-07 08:02:13', 'Pengadilan Agama Amurang'),
(621, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>50</b>', '2022-09-13 00:02:10', 'Pengadilan Tinggi Agama Manado'),
(622, 'User <b>Pengadilan Agama Amurang</b> telah upload berkas bundel B pada id perkara <b>96</b>', '2022-09-13 05:19:02', 'Pengadilan Agama Amurang'),
(623, 'User <b>Pengadilan Agama Amurang</b> telah upload berkas bundel B pada id perkara <b>96</b>', '2022-09-15 00:49:02', 'Pengadilan Agama Amurang'),
(624, 'User <b>Pengadilan Agama Amurang</b> telah upload berkas bundel B pada id perkara <b>96</b>', '2022-09-15 01:44:40', 'Pengadilan Agama Amurang'),
(625, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>95</b>', '2022-09-15 04:30:24', 'Pengadilan Tinggi Agama Manado'),
(626, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>95</b>', '2022-09-15 04:30:41', 'Pengadilan Tinggi Agama Manado'),
(627, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>95</b>', '2022-09-15 04:30:53', 'Pengadilan Tinggi Agama Manado'),
(628, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>95</b>', '2022-09-15 04:31:00', 'Pengadilan Tinggi Agama Manado'),
(629, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>95</b>', '2022-09-15 04:31:07', 'Pengadilan Tinggi Agama Manado'),
(630, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>95</b>', '2022-09-15 04:31:24', 'Pengadilan Tinggi Agama Manado'),
(631, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>94</b>', '2022-09-15 06:52:06', 'Pengadilan Tinggi Agama Manado'),
(632, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>94</b>', '2022-09-15 06:52:13', 'Pengadilan Tinggi Agama Manado'),
(633, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>94</b>', '2022-09-15 06:52:20', 'Pengadilan Tinggi Agama Manado'),
(634, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>94</b>', '2022-09-15 06:52:27', 'Pengadilan Tinggi Agama Manado'),
(635, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>94</b>', '2022-09-15 06:52:45', 'Pengadilan Tinggi Agama Manado'),
(636, 'User <b>Pengadilan Agama Amurang</b> telah upload berkas bundel B pada id perkara <b>96</b>', '2022-09-16 05:27:28', 'Pengadilan Agama Amurang'),
(637, 'User <b>Pengadilan Agama Amurang</b> telah upload berkas bundel B pada id perkara <b>96</b>', '2022-09-16 08:26:11', 'Pengadilan Agama Amurang'),
(638, 'User <b>Pengadilan Agama Amurang</b> telah upload berkas bundel B pada id perkara <b>96</b>', '2022-09-16 08:27:00', 'Pengadilan Agama Amurang'),
(639, 'User <b>Pengadilan Agama Tutuyan</b> telah menambah data perkara', '2022-10-05 13:45:02', 'Pengadilan Agama Tutuyan'),
(640, 'User <b>Pengadilan Tinggi Agama Manado</b> telah update data user pada id <b>25</b>', '2022-10-12 12:00:01', 'Pengadilan Tinggi Agama Manado'),
(641, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan rekap laporan triwulan untuk periode <b>03</b>', '2022-12-20 06:15:51', 'Pengadilan Tinggi Agama Manado'),
(642, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan rekap laporan perkara untuk periode <b>Jan 2022</b>', '2022-12-20 06:24:25', 'Pengadilan Tinggi Agama Manado'),
(643, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan rekap laporan triwulan <b>Keuangan</b>', '2022-12-20 06:26:02', 'Pengadilan Tinggi Agama Manado'),
(644, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan rekap laporan triwulan <b>Meja Informasi</b>', '2022-12-20 06:27:21', 'Pengadilan Tinggi Agama Manado'),
(645, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan rekap laporan triwulan <b>Pengaduan</b>', '2022-12-20 06:28:26', 'Pengadilan Tinggi Agama Manado'),
(646, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan rekap laporan triwulan <b>Penilaian Banding</b>', '2022-12-20 06:30:01', 'Pengadilan Tinggi Agama Manado'),
(647, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan perkara periode <b>Jan 2022</b>', '2022-12-20 06:32:37', 'Pengadilan Agama Tutuyan'),
(648, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan revisi laporan perkara periode <b>Jan 2022</b>', '2022-12-20 06:33:40', 'Pengadilan Agama Tutuyan'),
(649, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan triwulan <b>Triwulan I</b> <b>2022</b>', '2022-12-20 06:36:07', 'Pengadilan Agama Tutuyan'),
(650, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan <b>Keuangan</b> triwulan <b>Triwulan I</b> <b>2022</b>', '2022-12-20 06:37:02', 'Pengadilan Agama Tutuyan'),
(651, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memberikan validasi pada id laporan triwulan <b>7</b>', '2022-12-20 06:52:00', 'Pengadilan Tinggi Agama Manado'),
(652, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memberikan validasi pada id laporan perkara <b>8</b>', '2022-12-20 07:12:49', 'Pengadilan Tinggi Agama Manado'),
(653, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memberikan validasi pada id laporan perkara <b>8</b>', '2022-12-20 07:12:55', 'Pengadilan Tinggi Agama Manado'),
(654, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan rekap laporan triwulan untuk periode <b>06</b>', '2022-12-28 03:28:44', 'Pengadilan Tinggi Agama Manado'),
(655, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan rekap laporan triwulan <b>Meja Informasi</b>', '2022-12-28 03:30:30', 'Pengadilan Tinggi Agama Manado'),
(656, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan rekap laporan perkara untuk periode <b>Jan 2023</b>', '2023-01-09 08:46:13', 'Pengadilan Tinggi Agama Manado'),
(657, 'User <b>Pengadilan Tinggi Agama Manado</b> telah melakukan update rekap laporan perkara untuk periode <b>Jan 2023</b>', '2023-01-09 08:46:53', 'Pengadilan Tinggi Agama Manado'),
(658, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>97</b>', '2023-08-16 02:41:11', 'Pengadilan Tinggi Agama Manado'),
(659, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih majelis hakim pada id perkara <b>97</b>', '2023-08-16 02:49:20', 'Pengadilan Tinggi Agama Manado'),
(660, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-16 05:41:33', 'Pengadilan Tinggi Agama Manado'),
(661, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>96</b>', '2023-08-16 05:59:54', 'Pengadilan Tinggi Agama Manado'),
(662, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-16 06:59:30', 'Pengadilan Tinggi Agama Manado'),
(663, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-16 07:01:55', 'Pengadilan Tinggi Agama Manado'),
(664, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-16 07:05:14', 'Pengadilan Tinggi Agama Manado'),
(665, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-16 07:10:47', 'Pengadilan Tinggi Agama Manado'),
(666, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-16 07:15:49', 'Pengadilan Tinggi Agama Manado'),
(667, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-16 07:17:32', 'Pengadilan Tinggi Agama Manado'),
(668, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-16 07:19:04', 'Pengadilan Tinggi Agama Manado'),
(669, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-16 07:22:36', 'Pengadilan Tinggi Agama Manado'),
(670, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-22 05:33:17', 'Pengadilan Tinggi Agama Manado'),
(671, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-22 07:46:29', 'Pengadilan Tinggi Agama Manado'),
(672, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-23 00:54:41', 'Pengadilan Tinggi Agama Manado'),
(673, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-23 01:02:53', 'Pengadilan Tinggi Agama Manado'),
(674, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-23 01:08:58', 'Pengadilan Tinggi Agama Manado'),
(675, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-23 01:11:58', 'Pengadilan Tinggi Agama Manado'),
(676, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-23 01:15:58', 'Pengadilan Tinggi Agama Manado'),
(677, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>96</b>', '2023-08-23 01:18:06', 'Pengadilan Tinggi Agama Manado'),
(678, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-23 01:58:10', 'Pengadilan Tinggi Agama Manado'),
(679, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-23 02:03:17', 'Pengadilan Tinggi Agama Manado'),
(680, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-23 02:09:12', 'Pengadilan Tinggi Agama Manado'),
(681, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-23 02:11:18', 'Pengadilan Tinggi Agama Manado'),
(682, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>96</b>', '2023-08-23 02:11:46', 'Pengadilan Tinggi Agama Manado'),
(683, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:35:21', 'Pengadilan Tinggi Agama Manado'),
(684, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih majelis hakim pada id perkara <b>97</b>', '2023-08-25 05:35:25', 'Pengadilan Tinggi Agama Manado'),
(685, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:38:48', 'Pengadilan Tinggi Agama Manado'),
(686, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih panitera pengganti pada id perkara <b>97</b>', '2023-08-25 05:38:51', 'Pengadilan Tinggi Agama Manado'),
(687, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:39:08', 'Pengadilan Tinggi Agama Manado'),
(688, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:39:34', 'Pengadilan Tinggi Agama Manado'),
(689, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:39:51', 'Pengadilan Tinggi Agama Manado'),
(690, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:46:34', 'Pengadilan Tinggi Agama Manado'),
(691, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:54:27', 'Pengadilan Tinggi Agama Manado'),
(692, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:54:37', 'Pengadilan Tinggi Agama Manado'),
(693, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:54:47', 'Pengadilan Tinggi Agama Manado'),
(694, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:54:56', 'Pengadilan Tinggi Agama Manado'),
(695, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:55:05', 'Pengadilan Tinggi Agama Manado'),
(696, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:55:16', 'Pengadilan Tinggi Agama Manado'),
(697, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:55:25', 'Pengadilan Tinggi Agama Manado'),
(698, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-08-25 05:55:39', 'Pengadilan Tinggi Agama Manado'),
(699, 'User <b>Pengadilan Tinggi Agama Manado</b> telah upload putusan perkara banding pada id perkara <b>97</b>', '2023-08-25 05:56:45', 'Pengadilan Tinggi Agama Manado'),
(700, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>96</b>', '2023-08-25 08:14:56', 'Pengadilan Tinggi Agama Manado'),
(701, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih majelis hakim pada id perkara <b>96</b>', '2023-08-25 08:15:00', 'Pengadilan Tinggi Agama Manado'),
(702, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>96</b>', '2023-08-25 08:30:23', 'Pengadilan Tinggi Agama Manado'),
(703, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>96</b>', '2023-08-25 08:30:34', 'Pengadilan Tinggi Agama Manado'),
(704, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih majelis hakim pada id perkara <b>96</b>', '2023-08-25 08:30:36', 'Pengadilan Tinggi Agama Manado'),
(705, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-05 02:08:00', 'Pengadilan Tinggi Agama Manado'),
(706, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-05 02:51:55', 'Pengadilan Tinggi Agama Manado'),
(707, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-05 02:54:57', 'Pengadilan Tinggi Agama Manado'),
(708, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-05 02:57:10', 'Pengadilan Tinggi Agama Manado'),
(709, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-05 02:59:17', 'Pengadilan Tinggi Agama Manado'),
(710, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-05 03:13:34', 'Pengadilan Tinggi Agama Manado'),
(711, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-05 03:17:15', 'Pengadilan Tinggi Agama Manado'),
(712, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-05 03:19:27', 'Pengadilan Tinggi Agama Manado'),
(713, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-05 03:20:29', 'Pengadilan Tinggi Agama Manado'),
(714, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-05 03:31:42', 'Pengadilan Tinggi Agama Manado'),
(715, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-05 03:44:35', 'Pengadilan Tinggi Agama Manado'),
(716, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-05 06:10:07', 'Pengadilan Tinggi Agama Manado'),
(717, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input status perkara banding pada id perkara <b>96</b>', '2023-09-05 08:48:20', 'Pengadilan Tinggi Agama Manado');
INSERT INTO `log_audittrail` (`log_id`, `isi_log`, `rekam_log`, `nama_log`) VALUES
(718, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memilih panitera pengganti pada id perkara <b>96</b>', '2023-09-05 08:48:26', 'Pengadilan Tinggi Agama Manado'),
(719, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-06 06:25:37', 'Hasbiah'),
(720, 'User <b>Hasbiah</b> telah menambahkan catatan pada id laporan perkara <b>8</b>', '2023-09-08 05:53:11', 'Hasbiah'),
(721, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memberikan validasi pada id laporan perkara <b>8</b>', '2023-09-08 06:16:33', 'Pengadilan Tinggi Agama Manado'),
(722, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memberikan validasi pada id laporan perkara <b>8</b>', '2023-09-08 06:16:39', 'Pengadilan Tinggi Agama Manado'),
(723, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan rekap laporan triwulan untuk periode <b>03</b>', '2023-09-08 06:20:17', 'Pengadilan Tinggi Agama Manado'),
(724, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan rekap laporan triwulan <b>Keuangan</b>', '2023-09-08 06:21:05', 'Pengadilan Tinggi Agama Manado'),
(725, 'User <b>Hasbiah</b> telah input status perkara banding pada id perkara <b>97</b>', '2023-09-11 08:03:48', 'Hasbiah'),
(726, 'User <b>Pengadilan Agama Tutuyan</b> telah menambah data perkara', '2023-09-18 02:05:11', 'Pengadilan Agama Tutuyan'),
(727, 'User <b>Pengadilan Tinggi Agama Manado</b> telah input nomor perkara banding pada id perkara <b>98</b>', '2023-09-19 06:14:18', 'Pengadilan Tinggi Agama Manado'),
(728, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan perkara periode <b>Feb 2023</b>', '2023-10-03 02:10:31', 'Pengadilan Agama Tutuyan'),
(729, 'User <b>Bambang Suroso</b> telah menambahkan catatan pada id laporan perkara <b>9</b>', '2023-10-03 02:37:09', 'Bambang Suroso'),
(730, 'User <b>Bambang Suroso</b> telah memberikan validasi pada id laporan perkara <b>9</b>', '2023-10-03 02:37:32', 'Bambang Suroso'),
(731, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan revisi laporan perkara periode <b>Feb 2023</b>', '2023-10-03 02:41:32', 'Pengadilan Agama Tutuyan'),
(732, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan <b>Keuangan</b> triwulan <b>Triwulan I</b> <b>2022</b>', '2023-10-03 02:53:57', 'Pengadilan Agama Tutuyan'),
(733, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan triwulan <b>Triwulan II</b> <b>2023</b>', '2023-10-03 02:54:22', 'Pengadilan Agama Tutuyan'),
(734, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan triwulan <b>Triwulan III</b> <b>2023</b>', '2023-10-03 02:54:40', 'Pengadilan Agama Tutuyan'),
(735, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan <b>Keuangan</b> triwulan <b>Triwulan II</b> <b>2023</b>', '2023-10-03 02:57:32', 'Pengadilan Agama Tutuyan'),
(736, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan <b>Meja Informasi</b> triwulan <b>Triwulan II</b> <b>2023</b>', '2023-10-03 02:58:05', 'Pengadilan Agama Tutuyan'),
(737, 'User <b>Bambang Suroso</b> telah memberikan validasi pada id laporan perkara <b>9</b>', '2023-10-03 03:05:33', 'Bambang Suroso'),
(738, 'User <b>Bambang Suroso</b> telah memberikan validasi pada id laporan perkara <b>9</b>', '2023-10-03 03:21:24', 'Bambang Suroso'),
(739, 'User <b>Bambang Suroso</b> telah memberikan validasi pada id laporan triwulan <b>9</b>', '2023-10-03 03:22:43', 'Bambang Suroso'),
(740, 'User <b>Bambang Suroso</b> telah memberikan validasi pada id laporan triwulan <b>10</b>', '2023-10-03 03:22:49', 'Bambang Suroso'),
(741, 'User <b>Bambang Suroso</b> telah memberikan validasi pada id laporan perkara <b>8</b>', '2023-10-03 03:24:07', 'Bambang Suroso'),
(742, 'User <b>Bambang Suroso</b> telah memberikan validasi pada id laporan perkara <b>9</b>', '2023-10-03 03:24:14', 'Bambang Suroso'),
(743, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memberikan validasi pada id laporan perkara <b>9</b>', '2023-10-09 03:32:24', 'Pengadilan Tinggi Agama Manado'),
(744, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan catatan pada id laporan triwulan <b>9</b>', '2023-10-09 03:48:28', 'Pengadilan Tinggi Agama Manado'),
(745, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan catatan pada id laporan triwulan <b>10</b>', '2023-10-09 03:48:52', 'Pengadilan Tinggi Agama Manado'),
(746, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memberikan validasi pada id laporan perkara <b>9</b>', '2023-10-09 03:49:42', 'Pengadilan Tinggi Agama Manado'),
(747, 'User <b>Pengadilan Tinggi Agama Manado</b> telah memberikan validasi pada id laporan perkara <b>9</b>', '2023-10-09 03:49:55', 'Pengadilan Tinggi Agama Manado'),
(748, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan catatan pada id laporan perkara <b>9</b>', '2023-10-09 03:54:55', 'Pengadilan Tinggi Agama Manado'),
(749, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan catatan pada id laporan perkara <b>9</b>', '2023-10-09 04:17:16', 'Pengadilan Tinggi Agama Manado'),
(750, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan catatan pada id laporan perkara <b>9</b>', '2023-10-09 04:18:35', 'Pengadilan Tinggi Agama Manado'),
(751, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan catatan pada id laporan perkara <b>9</b>', '2023-10-09 06:20:30', 'Pengadilan Tinggi Agama Manado'),
(752, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan catatan pada id laporan triwulan <b>9</b>', '2023-10-09 06:20:52', 'Pengadilan Tinggi Agama Manado'),
(753, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan catatan pada id laporan triwulan <b>10</b>', '2023-10-09 06:21:01', 'Pengadilan Tinggi Agama Manado'),
(754, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan catatan pada id laporan triwulan <b>9</b>', '2023-10-09 06:41:07', 'Pengadilan Tinggi Agama Manado'),
(755, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan catatan pada id laporan triwulan <b>10</b>', '2023-10-09 06:41:35', 'Pengadilan Tinggi Agama Manado'),
(756, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan catatan pada id laporan triwulan <b>10</b>', '2023-10-09 06:45:26', 'Pengadilan Tinggi Agama Manado'),
(757, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan perkara periode <b>Oct 2023</b>', '2023-10-09 07:17:25', 'Pengadilan Agama Tutuyan'),
(758, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan triwulan <b>Triwulan III</b> <b>2023</b>', '2023-10-11 01:48:28', 'Pengadilan Agama Tutuyan'),
(759, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan triwulan <b>Triwulan III</b> <b>2023</b>', '2023-10-11 03:36:45', 'Pengadilan Agama Tutuyan'),
(760, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan perkara periode <b>Oct 2023</b>', '2023-10-11 03:37:41', 'Pengadilan Agama Tutuyan'),
(761, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan perkara periode <b>Oct 2023</b>', '2023-10-11 03:38:04', 'Pengadilan Agama Tutuyan'),
(762, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan perkara periode <b>Sep 2023</b>', '2023-10-11 03:51:43', 'Pengadilan Agama Tutuyan'),
(763, 'User <b>Pengadilan Tinggi Agama Manado</b> telah menambahkan rekap laporan perkara untuk periode <b>Jan 2023</b>', '2023-10-11 04:01:49', 'Pengadilan Tinggi Agama Manado'),
(764, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan perkara periode <b>Sep 2023</b>', '2023-10-11 08:01:50', 'Pengadilan Agama Tutuyan'),
(765, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan perkara periode <b>Sep 2023</b>', '2023-10-11 08:02:12', 'Pengadilan Agama Tutuyan'),
(766, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan perkara periode <b>Sep 2023</b>', '2023-10-12 06:46:49', 'Pengadilan Agama Tutuyan'),
(767, 'User <b>Pengadilan Agama Tutuyan</b> telah menambahkan laporan perkara periode <b>Sep 2023</b>', '2023-10-12 06:47:02', 'Pengadilan Agama Tutuyan');

-- --------------------------------------------------------

--
-- Table structure for table `log_inbox`
--

CREATE TABLE `log_inbox` (
  `id_log_inbox` int(11) NOT NULL,
  `id_perkara` int(11) NOT NULL,
  `no_perkara` varchar(50) NOT NULL,
  `is_read` int(11) NOT NULL,
  `change_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_inbox`
--

INSERT INTO `log_inbox` (`id_log_inbox`, `id_perkara`, `no_perkara`, `is_read`, `change_date`) VALUES
(0, 47, '23455/Pdt.G/2021/PA.Mdo', 2, 2147483647),
(0, 48, '12345/Pdt.G/2021/PA.Blu', 2, 2147483647),
(0, 49, '123456/Pdt.G/2021/PA.Blu', 2, 2147483647),
(0, 50, '12345/Pdt.G/2021/PA.Blu', 2, 2147483647),
(0, 51, '123456/Pdt.G/2021/PA.Blu', 2, 2147483647),
(0, 52, '21432/Pdt.G/2021/PA.Mdo', 2, 2147483647),
(0, 53, '12344/Pdt.G/2021/PA.Blu', 2, 2147483647),
(0, 54, '1235/Pdt.G/2021/PA.Tty', 2, 2147483647),
(0, 55, '4343/Pdt.G/2021/PA.Tty', 2, 2147483647),
(0, 56, '344/Pdt.G/2021/PA.Tty', 2, 2147483647),
(0, 57, '16/Pdt.G/2021/PA.Ktg', 2, 2147483647),
(0, 58, '14/Pdt.G/2021/PA.Tdo', 2, 2147483647),
(0, 59, '2580/Pdt.G/2021/PA.Tty', 2, 2147483647),
(0, 60, '1234/Pdt.G/2021/PA.Mdo', 2, 2147483647),
(0, 61, '96/Pdt.G/2021/PA.Ktg', 2, 2147483647),
(0, 62, '1111/Pdt.G/2021/PA.Per', 2, 2147483647),
(0, 63, '152/Pdt.G/2021/PA.Tty', 2, 2147483647),
(0, 64, '1111/Pdt.G/2021/PA.Tty', 2, 2147483647),
(0, 65, '43/Pdt.G/2021/PA.Mdo', 2, 2147483647),
(0, 66, '454/Pdt.G/2021/PA.Tty', 2, 2147483647),
(0, 67, '0000/Pdt.G/2021/PA.Per', 2, 2147483647),
(0, 68, '152/Pdt.G/2021/PA.Tty', 2, 2147483647),
(0, 69, '51/Pdt.G/2021/PA.Mdo', 2, 2147483647),
(0, 70, '222/Pdt.G/2021/PA.Tty', 2, 2147483647),
(0, 71, '2/Pdt.G/2021/PA.Per', 2, 2147483647),
(0, 72, '4444/Pdt.G/2021/PA.Per', 2, 2147483647),
(0, 73, '222/Pdt.G/2021/PA.Per', 2, 2147483647),
(0, 74, '37/Pdt.G/2021/PA.Blu', 2, 2147483647),
(0, 75, '122/Pdt.G/2021/PA.Per', 2, 2147483647),
(0, 76, '7/Pdt.G/2021/PA.Mdo', 2, 2147483647),
(0, 77, '189/Pdt.G/2021/PA.Llk', 2, 2147483647),
(0, 78, '178/Pdt.G/2021/PA.Ktg', 2, 2147483647),
(0, 79, '111/Pdt.G/2021/PA.Per', 2, 2147483647),
(0, 80, '1111/Pdt.G/2021/PA.Per', 2, 2147483647),
(0, 81, '226/Pdt.G/2021/PA.Mdo', 2, 2147483647),
(0, 82, '245/Pdt.G/2021/PA.Mdo', 2, 2147483647),
(0, 83, '258/Pdt.G/2021/PA.Mdo', 2, 2147483647),
(0, 84, '248/Pdt.G/2021/PA.Mdo', 2, 2147483647),
(0, 85, '309/Pdt.G/2021/PA.Ktg', 2, 2147483647),
(0, 86, '000/Pdt.G/2021/PA.Per', 2, 2147483647),
(0, 87, '409/Pdt.G/2022/PA.Llk', 2, 2147483647),
(0, 88, '420/Pdt.G/2021/PA.Mdo', 2, 2147483647),
(0, 89, '39/Pdt.G/2022/PA.Mdo', 2, 2147483647),
(0, 90, '162/Pdt.G/2022/PA.Mdo', 2, 2147483647),
(0, 91, '172/Pdt.G/2022/PA.Mdo', 2, 2147483647),
(0, 92, '133/Pdt.G/2022/PA.Btg', 2, 2147483647),
(0, 93, '23/Pdt.G/2022/PA.Mdo', 2, 2147483647),
(0, 94, '14/Pdt.G/2022/PA.Tty', 2, 2147483647),
(0, 95, '176/Pdt.G/2022/PA.Ktg', 2, 2147483647),
(0, 96, '48/Pdt.G/2022/PA.Amg', 2, 2147483647),
(0, 97, '2580/Pdt.G/2022/PA.Tty', 2, 2147483647),
(0, 98, '3/Pdt.G/2023/PA.Tty', 2, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `majelis_hakim`
--

CREATE TABLE `majelis_hakim` (
  `id_mh` int(11) NOT NULL,
  `id_user_mh` int(11) DEFAULT NULL,
  `majelis` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `majelis_hakim`
--

INSERT INTO `majelis_hakim` (`id_mh`, `id_user_mh`, `majelis`) VALUES
(1, 22, 'C'),
(3, 32, 'C'),
(4, 35, 'B'),
(5, 28, 'B'),
(7, 30, 'B'),
(8, 34, 'A'),
(9, 31, 'A'),
(10, 30, 'A'),
(11, 31, 'C'),
(12, 30, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `penunjukan_pp`
--

CREATE TABLE `penunjukan_pp` (
  `id_pp` int(11) NOT NULL,
  `id_perkara` int(11) NOT NULL,
  `id_user_pp` int(11) DEFAULT NULL,
  `file_pp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penunjukan_pp`
--

INSERT INTO `penunjukan_pp` (`id_pp`, `id_perkara`, `id_user_pp`, `file_pp`) VALUES
(1, 83, 44, NULL),
(2, 84, 41, NULL),
(3, 81, 42, NULL),
(7, 85, 43, NULL),
(8, 87, 45, NULL),
(9, 88, 40, NULL),
(10, 89, 39, NULL),
(11, 90, 44, NULL),
(12, 91, 48, NULL),
(13, 92, 41, NULL),
(14, 93, 42, NULL),
(15, 94, 45, NULL),
(16, 95, 43, NULL),
(17, 96, 44, NULL),
(18, 97, 39, NULL),
(19, 98, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pmh`
--

CREATE TABLE `pmh` (
  `id_pmh` int(11) NOT NULL,
  `id_perkara` int(11) DEFAULT NULL,
  `majelis_hakim` varchar(5) DEFAULT NULL,
  `file_pmh` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pmh`
--

INSERT INTO `pmh` (`id_pmh`, `id_perkara`, `majelis_hakim`, `file_pmh`) VALUES
(1, 83, NULL, NULL),
(2, 84, NULL, NULL),
(3, 85, NULL, NULL),
(5, 87, NULL, NULL),
(6, 88, NULL, NULL),
(8, 89, 'B', NULL),
(9, 90, NULL, NULL),
(11, 91, 'C', NULL),
(14, 93, 'B', NULL),
(15, 92, 'A', NULL),
(18, 94, 'C', NULL),
(20, 95, 'C', NULL),
(22, 97, 'A', NULL),
(25, 96, 'C', NULL),
(26, 98, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rekap_laporan_perkara`
--

CREATE TABLE `rekap_laporan_perkara` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `periode` varchar(20) DEFAULT NULL,
  `rekap_pdf` varchar(100) DEFAULT NULL,
  `rekap_xls` varchar(100) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekap_laporan_perkara`
--

INSERT INTO `rekap_laporan_perkara` (`id`, `id_user`, `periode`, `rekap_pdf`, `rekap_xls`, `tgl_upload`) VALUES
(6, 1, 'Jan 2022', 'Laporan_Perkara_PTA_Manado_PA_Sewilayah_Bulan_Januari_2022.pdf', 'Laporan_Perkara_PTA_Manado_dan_PA_Sewilayah_Bulan_Januari.xlsx', '2022-12-20'),
(7, 1, 'Jan 2023', '4598__Nilai_Akhir_Penilaian_Presasi_Kinerja_Satker_Triwulan_III_-_28-10-2022.pdf', 'SSP_PPH.xls', '2023-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_triwulan`
--

CREATE TABLE `rekap_triwulan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `berkas_laporan` varchar(50) DEFAULT NULL,
  `periode_triwulan` varchar(20) DEFAULT NULL,
  `periode_tahun` varchar(20) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekap_triwulan`
--

INSERT INTO `rekap_triwulan` (`id`, `id_user`, `berkas_laporan`, `periode_triwulan`, `periode_tahun`, `tgl_upload`) VALUES
(4, 1, 'Triwulan I', '03', '2022', '2022-12-20'),
(5, 1, 'Triwulan II', '06', '2022', '2022-12-28'),
(6, 1, 'Triwulan I', '03', '2023', '2023-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_tri_detail`
--

CREATE TABLE `rekap_tri_detail` (
  `id` int(11) NOT NULL,
  `id_rekap_tri` int(11) DEFAULT NULL,
  `nm_laporan` varchar(25) DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `lap_pdf` varchar(100) DEFAULT NULL,
  `lap_xls` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekap_tri_detail`
--

INSERT INTO `rekap_tri_detail` (`id`, `id_rekap_tri`, `nm_laporan`, `tgl_kirim`, `lap_pdf`, `lap_xls`) VALUES
(10, 4, 'Keuangan', '2022-12-20', 'Laporan_Triwulan_I_Tahun_2022_Titipan_Pihak_ketiga_dari_wilayah_PTA_Manado.pdf', 'Laporan_Komdanas_tw1.xlsx'),
(11, 4, 'Meja Informasi', '2022-12-20', 'Laporan_Rekapitulasi_Meja_Informasi_Penilaian_Banding_Triwulan_I_Tahun_2022_PTA_Manado_PA_Sewilayah.', 'Laporan_Layanan_Informasi_seWilayah_PTA_Manado_-_2022.xlsx'),
(12, 4, 'Pengaduan', '2022-12-20', 'Laporan_Rekapitulasi_Layanan_Pengaduan_Triwulan_I_Tahun_2022_sewilayah_Pengadilan_Tinggi_Agama_Manad', 'Laporan_Pengaduan_seWilayah_PTA_Manado_-_2021.xlsx'),
(13, 4, 'Penilaian Banding', '2022-12-20', 'Laporan_Rekapitulasi_Meja_Informasi_Penilaian_Banding_Triwulan_I_Tahun_2022_PTA_Manado_PA_Sewilayah.', 'template_penilaian_banding-2022.xlsx'),
(14, 5, 'Keuangan', NULL, NULL, NULL),
(15, 5, 'Meja Informasi', '2022-12-28', 'SEMA_NOMOR_5_TAHUN_2021.pdf', '1__LI-PA__1_Lap_Keadaan_Perkara_januari_2022.xlsx'),
(16, 5, 'Pengaduan', NULL, NULL, NULL),
(17, 5, 'Penilaian Banding', NULL, NULL, NULL),
(18, 6, 'Keuangan', '2023-09-08', 'Lampiran_TPM_Hakim_13_Februari_2023.pdf', '01_tanda_terima_1700_402681_PTA_Manado_Juli_2023.xlsx'),
(19, 6, 'Meja Informasi', NULL, NULL, NULL),
(20, 6, 'Pengaduan', NULL, NULL, NULL),
(21, 6, 'Penilaian Banding', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `revisi_laporan`
--

CREATE TABLE `revisi_laporan` (
  `id` int(11) NOT NULL,
  `laper_id` int(11) DEFAULT NULL,
  `rev_pdf` varchar(250) DEFAULT NULL,
  `rev_xls` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `revisi_laporan`
--

INSERT INTO `revisi_laporan` (`id`, `laper_id`, `rev_pdf`, `rev_xls`) VALUES
(6, 8, 'LAP_PA_AMG_laporan_keadaan_perkara_bln_januari_202203-02-2022-162737.pdf', '7a__LIPA_7a1_Laporan_Keuangan_Perkara_Januari_2022.xlsx'),
(7, 9, '144__SK_Tim_Monitoring_dan_Evaluasi_Proses_Perkara_(1).pdf', 'tk1_putus.xlsx');

--
-- Triggers `revisi_laporan`
--
DELIMITER $$
CREATE TRIGGER `tgl_rev` AFTER INSERT ON `revisi_laporan` FOR EACH ROW BEGIN
    update laporan_perkara set tgl_terakhir_rev = CURDATE() where id = new.laper_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `kode_pa` varchar(20) NOT NULL,
  `is_active` int(11) DEFAULT NULL,
  `data_created` date DEFAULT NULL,
  `operator` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `password`, `role_id`, `kode_pa`, `is_active`, `data_created`, `operator`) VALUES
(1, 'Pengadilan Tinggi Agama Manado', '', 'pta-manado', '$2y$10$zKNxC63heZCgpGadi9mWVO9.zBp5FcUE/mjdJjMrDBj/z/6IctVue', 1, 'PTA.Mdo', 1, '2021-05-27', NULL),
(2, 'Pengadilan Agama Manado', 'pa.manado307225@gmail.com', 'pa-manado', '$2y$10$XgCSCiSV50OVnB0kCNAgFeCA7JQuKxD5HuvJ/yJGgmjdS8TXsbqVy', 2, 'PA.Mdo', 1, '2021-05-27', NULL),
(3, 'Pengadilan Agama Tutuyan', '', 'pa-tutuyan', '$2y$10$zKNxC63heZCgpGadi9mWVO9.zBp5FcUE/mjdJjMrDBj/z/6IctVue', 2, 'PA.Tty', 1, '2021-05-27', '082111127319'),
(4, 'Pengadilan Agama Bolaang Uki', 'pa.bolaanguki@gmail.com', 'pa-blu', '$2y$10$lgR9YMOK/wxME3ZgJNpon.biuAgjzwvL6TQxJ8YjfGCZdqDYarvLm', 2, 'PA.Blu', 1, '2021-05-27', NULL),
(5, 'Pengadilan Agama Tondano', 'pa.tondano@gmail.com', 'pa-tondano', '$2y$10$Jzl9b95ASJHkehkK6wrTeOBhDXPZ64A.dT3NMWsPOw3PdcsnOPFlS', 2, 'PA.Tdo', 1, '2021-05-27', NULL),
(6, 'Pengadilan Agama Lolak', 'pa.lolak.sulut@gmail.com', 'pa-lolak', '$2y$10$hhI.UlPPjUlXuhfGGVBIpeF8bz9ls.wcC3MxUWzy4EF.1uXBZjSfe', 2, 'PA.Llk', 1, '2021-05-27', NULL),
(7, 'Pengadilan Agama Boroko', '', 'pa-boroko', '$2y$10$zKNxC63heZCgpGadi9mWVO9.zBp5FcUE/mjdJjMrDBj/z/6IctVue', 2, 'PA.Brk', 1, '2021-05-27', NULL),
(8, 'Pengadilan Agama Amurang', '', 'pa-amurang', '$2y$10$MlJvFdjkTcwx0V/AFRGdSe5Ys4Ky/pgQeUXSRPxfFKiA5CyrDGoGe', 2, 'PA.Amg', 1, '2021-05-27', NULL),
(9, 'Pengadilan Agama Kotamobagu', 'pa.kotamobagu@gmail.com', 'pa-kotamobagu', '$2y$10$QrSYnuMTBbsJb3pGPfr5VeT5XoBAhQ36GJzJ8c6pXSNstGoKtz8Ei', 2, 'PA.Ktg', 1, '2021-05-27', NULL),
(10, 'Pengadilan Agama Tahuna', 'patahuna3@gmail.com', 'pa-tahuna', '$2y$10$R80xcFUpZPXovPrrZuNpi.Yz5O.w3WxIz4NP6iIri0XtQvNLveB76', 2, 'PA.Thn', 1, '2021-05-27', NULL),
(11, 'Pengadilan Agama Bitung', 'pengadilanagamabitung@yahoo.co.id', 'pa-bitung', '$2y$10$zKNxC63heZCgpGadi9mWVO9.zBp5FcUE/mjdJjMrDBj/z/6IctVue', 2, 'PA.Btg', 1, '2021-05-27', NULL),
(22, 'Drs. H. Abdul Hakim, M.HI.', '', 'ht-hakim', '$2y$10$Iqkt35Uui8ZrhmrPJPwlVOKawxfckxMdcRyQ/ybhU1VqHbsWzARR.', 3, '', 1, NULL, NULL),
(25, 'Riyan', 'riyanboyuhu@gmail.com', 'riyan', '$2y$10$JJbAKs3tBHftJ9lJ/gCpg.BXh96wB2ayg7b2C8tpHuNReQBrh.EnC', 1, '', 1, NULL, NULL),
(26, 'Dedy', 'papah.dika@gmail.com', 'dedy', '$2y$10$kvHN/pCmOg27OaahgAmrb.1d0leqCuHxUOgYjx.Rz1y8/3s25/Zr6', 1, '', 1, NULL, NULL),
(28, 'Drs. H. ABDURAHMAN, S.H., M.H.', '', 'ht-abdurahman', '$2y$10$ENcKfXLLFHoia/IcR6HjaefUm9kWFHFYqHHPgSnWu.nVVcH0Bl3dC', 3, '', 1, NULL, NULL),
(29, 'Drs. H. AHMAD HUSNI TAMRIN, M.H.', '', 'ht-husni', '$2y$10$zKNxC63heZCgpGadi9mWVO9.zBp5FcUE/mjdJjMrDBj/z/6IctVue', 3, '', 1, NULL, NULL),
(30, 'Drs. Zainal Aripin, S.H.,M.Hum.', '', 'ht-zainal', '$2y$10$Whp2JFKwyPwlHcQjmK.9u.bX/mpRNOKrXVxyy/GjXkuYy4WS22sAu', 3, '', 1, NULL, NULL),
(31, ' Drs. H. Wachid Ridwan, M.H.', '', 'ht-wachid', '$2y$10$oPHSMZQSH3kmnanurlFjKeR/5T0CQ.M1pTd5ktRlarcMVKRDRjLFa', 3, '', 1, NULL, NULL),
(32, 'Drs. Faizal Kamil,S.H.,M.H.', '', 'ht-faizal', '$2y$10$6Rb2U0acG23hoZoahMFUfuS/.h0Y2VSLQdLEE9KSOal2FGFhkpmpe', 3, '', 1, NULL, NULL),
(34, 'Iskandar Paputungan', 'iskandar@.com', 'ht-iskandar', '$2y$10$i8Jgi54G1Op9620XgoOcsOeYSC9EvFWJjCwMKs./lu361yc.7hyz6', 3, '', 1, NULL, NULL),
(35, 'Drs. H. PANDI, S.H., M.H.', '', 'wk-pandi', '$2y$10$FNdtiJQ8rGpz.qADsCMkeuiRreu9Hz7V.PauadBk.8eQp28UW0XWC', 3, '', 1, NULL, NULL),
(36, 'Pengadilan Agama Percobaan', '', 'pa-percobaan', '$2y$10$.TMocISqSYfmu801ju1sF.Zw.KKt2h/Le/00SkV.Vr.pTwnLRWpBu', 2, 'PA.Per', 1, NULL, NULL),
(37, 'Hasbiah', '', 'pm-hasbiah', '$2y$10$zKNxC63heZCgpGadi9mWVO9.zBp5FcUE/mjdJjMrDBj/z/6IctVue', 4, '', 1, NULL, NULL),
(38, 'Hakim Percobaan', '', 'ht-percobaan', '$2y$10$yN4U93XVthSP9j4.g/mocOR36k6Chvlm93eJZGresXUFRx2VTiNwi', 3, '', 1, NULL, NULL),
(39, 'Bambang Suroso', '', 'pp-bambang', '$2y$10$zKNxC63heZCgpGadi9mWVO9.zBp5FcUE/mjdJjMrDBj/z/6IctVue', 5, '', 1, NULL, NULL),
(40, 'Dra.Hj.Sa\'i Sumaila', '', 'pp-sai', '$2y$10$5VjXU0.3/meWjLSObwx4iOC5jqtHTq56rPtRnog.jn1cPsG8rKNpW', 5, '', 1, NULL, NULL),
(41, 'Musa Antu, S.H.', '', 'pp-musa', '$2y$10$IJKUdS58DCtoIL42enDqYudohdUyzjoAiHyMlAkNOnfuru8LkAqJC', 5, '', 1, NULL, NULL),
(42, 'Hj. Rusna Poli, S.H., M.H.', '', 'pp-rusna', '$2y$10$dxQFHOFaB7rZyrXMf2p.d.jXNjFGEFL2aURggzwNdYc5H/rKfNA/q', 5, '', 1, NULL, NULL),
(43, ' Masita Mayang, S.Ag.', '', 'pp-masita', '$2y$10$xsyRCZ7YDQ98AWEYsM.xbuldyaHvyFlocPi1gyFX5CnQ1CRdlP25e', 5, '', 1, NULL, NULL),
(44, 'Rosna Ali, S.Ag.', '', 'pp-rosna', '$2y$10$EdTrXbcCGDko54Q64WiSbOncXHkgRZxduHqyQszlBDtvMn8VBnntO', 5, '', 1, NULL, NULL),
(45, 'Drs. Abdul Haris Makaminan', '', 'pp-haris', '$2y$10$CpqojFYJbtcfWeUWwCodz.F/sGXFPtZ.T1LetIFeayDs3iEqnzYfa', 5, '', 1, NULL, NULL),
(46, 'Drs. SALWI, S.H.', '', 'ht-salwi', '$2y$10$EJHIM0ylC/Uv2/N/h.y9tO83Mf308BLkCO8rOQP8aGqBmI4SrsXyq', 3, '', 1, NULL, NULL),
(47, 'naja', '', 'st-naja', '$2y$10$BQyz2mPttNfhsatZVm4QbevO397HMm0ld2HSvvCzcaO630uXxssCC', 1, '', 1, NULL, NULL),
(48, 'Drs. Arisno Mertosono, S.H.', 'kepaniteraan.ptamdo@gmail.com', 'pm-arisno', '$2y$10$NMMr.Gc8L4K0Ldn4I65kge4rg8/XWtwSTAHEhWPlart0y4Ebljre.', 5, '', 1, NULL, NULL),
(49, 'Drs. Azil Makatita', 'azil.makatita@gmail.com', 'pan-azil', '$2y$10$/CWP6gsyTtpDjIu.GJhZ3uiwMhJE0pmKYkcnCnJLCyaBZ6sC34uw2', 3, '', 1, NULL, NULL),
(50, 'Dr. Masri Olii, S.Ag., S.H., M.H.', '', 'ht-masri', '$2y$10$ygM5u32zSH/3FDtK72Y.fernU1l3PBFHiDndz5mqLXmofVG6iFGSi', 3, '', 1, NULL, NULL),
(51, 'hakim tes', '', 'ht-tes', '$2y$10$eaXnxSzrJYSq8bAOpZN.Je9BKrCUyJsNrvM889o0LEysNwfRiWv/W', 3, '', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_all_perkara`
-- (See below for the actual view)
--
CREATE TABLE `v_all_perkara` (
`id_perkara` int(11)
,`id_user` int(11)
,`no_perkara` varchar(50)
,`nm_pihak_penggugat` varchar(100)
,`no_hp_penggugat` varchar(16)
,`nm_pihak_tergugat` varchar(100)
,`no_hp_tergugat` varchar(16)
,`jns_perkara` varchar(50)
,`tgl_register` date
,`tgl_reg_banding` date
,`no_surat_pengantar` varchar(250)
,`pejabat_berwenang` varchar(100)
,`nm_pejabat` varchar(250)
,`nip_pejabat` varchar(18)
,`banyaknya` int(11)
,`keterangan` text
,`status_perkara` varchar(50)
,`sp_perkara` varchar(250)
,`no_perkara_banding` text
,`putusan_banding` varchar(255)
,`is_nomor` int(11)
,`surat_gugatan` varchar(250)
,`sk_bundelA` varchar(250)
,`bukti_pemb_panjar` varchar(250)
,`majelis_hakim` varchar(250)
,`penunjukan_pp` varchar(250)
,`penunjukan_js` varchar(250)
,`penetapan_hari_sidang` varchar(250)
,`relaas_panggilan` varchar(250)
,`ba_sidang` varchar(250)
,`penetapan_sita` varchar(250)
,`ba_sita` varchar(250)
,`lampiran_surat` varchar(250)
,`surat_bukti_penggugat` varchar(250)
,`surat_bukti_tergugat` varchar(250)
,`tanggapan_bukti_tergugat` varchar(250)
,`tanggapan_bukti_penggugat` varchar(250)
,`gambar_situasi` varchar(250)
,`surat_lain` varchar(250)
,`salinan_putusan_pa` varchar(250)
,`salinan_putusan_pa_rtf` varchar(250)
,`sk_bundelb` varchar(250)
,`akta_banding` varchar(250)
,`akta_penerimaan_mb` varchar(250)
,`memori_banding` varchar(250)
,`memori_banding_rtf` varchar(250)
,`akta_pemberitahuan_banding` varchar(250)
,`pemberitahuan_penyerahan_mb` varchar(250)
,`akta_penerimaankontra_mb` varchar(250)
,`kontra_mb` varchar(250)
,`kontra_mb_rtf` varchar(250)
,`pemberitahuan_penyerahankontra_mb` varchar(250)
,`relaas_periksa_berkas_pb` varchar(250)
,`sk_khusus` varchar(250)
,`bukt_pengiriman_bpb` varchar(250)
,`bukti_setor_bp_kasnegara` varchar(250)
,`surat_lainnya_b` varchar(250)
,`nama` varchar(50)
,`id_user_pp` int(11)
,`MajelisHakim` varchar(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_berkas_hakim`
-- (See below for the actual view)
--
CREATE TABLE `v_berkas_hakim` (
`id_perkara` int(11)
,`id_user` int(11)
,`no_perkara` varchar(50)
,`nm_pihak_penggugat` varchar(100)
,`nm_pihak_tergugat` varchar(100)
,`jns_perkara` varchar(50)
,`tgl_register` date
,`tgl_reg_banding` date
,`no_surat_pengantar` varchar(250)
,`pejabat_berwenang` varchar(100)
,`nm_pejabat` varchar(250)
,`nip_pejabat` varchar(18)
,`banyaknya` int(11)
,`keterangan` text
,`status_perkara` varchar(50)
,`sp_perkara` varchar(250)
,`no_perkara_banding` text
,`putusan_banding` varchar(255)
,`is_nomor` int(11)
,`surat_gugatan` varchar(250)
,`sk_bundelA` varchar(250)
,`bukti_pemb_panjar` varchar(250)
,`majelis_hakim` varchar(250)
,`penunjukan_pp` varchar(250)
,`penunjukan_js` varchar(250)
,`penetapan_hari_sidang` varchar(250)
,`relaas_panggilan` varchar(250)
,`ba_sidang` varchar(250)
,`penetapan_sita` varchar(250)
,`ba_sita` varchar(250)
,`lampiran_surat` varchar(250)
,`surat_bukti_penggugat` varchar(250)
,`surat_bukti_tergugat` varchar(250)
,`tanggapan_bukti_tergugat` varchar(250)
,`tanggapan_bukti_penggugat` varchar(250)
,`gambar_situasi` varchar(250)
,`surat_lain` varchar(250)
,`salinan_putusan_pa` varchar(250)
,`salinan_putusan_pa_rtf` varchar(250)
,`sk_bundelb` varchar(250)
,`akta_banding` varchar(250)
,`akta_penerimaan_mb` varchar(250)
,`memori_banding` varchar(250)
,`memori_banding_rtf` varchar(250)
,`akta_pemberitahuan_banding` varchar(250)
,`pemberitahuan_penyerahan_mb` varchar(250)
,`akta_penerimaankontra_mb` varchar(250)
,`kontra_mb` varchar(250)
,`kontra_mb_rtf` varchar(250)
,`pemberitahuan_penyerahankontra_mb` varchar(250)
,`relaas_periksa_berkas_pb` varchar(250)
,`sk_khusus` varchar(250)
,`bukt_pengiriman_bpb` varchar(250)
,`bukti_setor_bp_kasnegara` varchar(250)
,`surat_lainnya_b` varchar(250)
,`nama` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_c_hakim`
-- (See below for the actual view)
--
CREATE TABLE `v_c_hakim` (
`id_catatan` int(11)
,`id_perkara` int(11)
,`id_user` int(11)
,`nm_berkas` varchar(250)
,`catatan` text
,`time` varchar(50)
,`nama` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_triwulan`
-- (See below for the actual view)
--
CREATE TABLE `v_detail_triwulan` (
`id` int(11)
,`id_user` int(11)
,`berkas_laporan` varchar(50)
,`periode_triwulan` varchar(20)
,`periode_tahun` varchar(20)
,`tgl_upload` date
,`tgl_terakhir_revisi` date
,`status_laporan` varchar(30)
,`id_triwulan` int(11)
,`nm_laporan` varchar(25)
,`tgl_kirim` date
,`lap_pdf` varchar(100)
,`lap_xls` varchar(100)
,`rev_pdf` varchar(100)
,`rev_xls` varchar(100)
,`tgl_revisi` date
,`status_validasi` varchar(25)
,`nama` varchar(50)
,`kode_pa` varchar(20)
,`operator` varchar(16)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_header_perkara`
-- (See below for the actual view)
--
CREATE TABLE `v_header_perkara` (
`id_user_pp` int(11)
,`nama` varchar(50)
,`id_perkara` int(11)
,`no_perkara_banding` text
,`nm_pihak_penggugat` varchar(100)
,`no_hp_penggugat` varchar(16)
,`nm_pihak_tergugat` varchar(100)
,`no_hp_tergugat` varchar(16)
,`majelis_hakim` varchar(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_perkara_pp`
-- (See below for the actual view)
--
CREATE TABLE `v_perkara_pp` (
`id_user_pp` int(11)
,`nama` varchar(50)
,`id_perkara` int(11)
,`id_user` int(11)
,`no_perkara` varchar(50)
,`nm_pihak_penggugat` varchar(100)
,`no_hp_penggugat` varchar(16)
,`nm_pihak_tergugat` varchar(100)
,`no_hp_tergugat` varchar(16)
,`jns_perkara` varchar(50)
,`tgl_register` date
,`tgl_reg_banding` date
,`no_surat_pengantar` varchar(250)
,`pejabat_berwenang` varchar(100)
,`nm_pejabat` varchar(250)
,`nip_pejabat` varchar(18)
,`banyaknya` int(11)
,`keterangan` text
,`status_perkara` varchar(50)
,`sp_perkara` varchar(250)
,`no_perkara_banding` text
,`putusan_banding` varchar(255)
,`is_nomor` int(11)
,`surat_gugatan` varchar(250)
,`sk_bundelA` varchar(250)
,`bukti_pemb_panjar` varchar(250)
,`majelis_hakim` varchar(250)
,`penunjukan_pp` varchar(250)
,`penunjukan_js` varchar(250)
,`penetapan_hari_sidang` varchar(250)
,`relaas_panggilan` varchar(250)
,`ba_sidang` varchar(250)
,`penetapan_sita` varchar(250)
,`ba_sita` varchar(250)
,`lampiran_surat` varchar(250)
,`surat_bukti_penggugat` varchar(250)
,`surat_bukti_tergugat` varchar(250)
,`tanggapan_bukti_tergugat` varchar(250)
,`tanggapan_bukti_penggugat` varchar(250)
,`gambar_situasi` varchar(250)
,`surat_lain` varchar(250)
,`salinan_putusan_pa` varchar(250)
,`salinan_putusan_pa_rtf` varchar(250)
,`sk_bundelb` varchar(250)
,`akta_banding` varchar(250)
,`akta_penerimaan_mb` varchar(250)
,`memori_banding` varchar(250)
,`memori_banding_rtf` varchar(250)
,`akta_pemberitahuan_banding` varchar(250)
,`pemberitahuan_penyerahan_mb` varchar(250)
,`akta_penerimaankontra_mb` varchar(250)
,`kontra_mb` varchar(250)
,`kontra_mb_rtf` varchar(250)
,`pemberitahuan_penyerahankontra_mb` varchar(250)
,`relaas_periksa_berkas_pb` varchar(250)
,`sk_khusus` varchar(250)
,`bukt_pengiriman_bpb` varchar(250)
,`bukti_setor_bp_kasnegara` varchar(250)
,`surat_lainnya_b` varchar(250)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_laporan`
-- (See below for the actual view)
--
CREATE TABLE `v_rekap_laporan` (
`id` int(11)
,`id_user` int(11)
,`periode` varchar(20)
,`rekap_pdf` varchar(100)
,`rekap_xls` varchar(100)
,`tgl_upload` date
,`nama` varchar(50)
,`kode_pa` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_rekap_triwulan`
-- (See below for the actual view)
--
CREATE TABLE `v_rekap_triwulan` (
`id` int(11)
,`id_user` int(11)
,`berkas_laporan` varchar(50)
,`periode_triwulan` varchar(20)
,`periode_tahun` varchar(20)
,`tgl_upload` date
,`id_triwulan` int(11)
,`nm_laporan` varchar(25)
,`tgl_kirim` date
,`lap_pdf` varchar(100)
,`lap_xls` varchar(100)
,`kode_pa` varchar(20)
,`nama` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_triwulan_laporan`
-- (See below for the actual view)
--
CREATE TABLE `v_triwulan_laporan` (
`id` int(11)
,`id_user` int(11)
,`berkas_laporan` varchar(50)
,`periode_triwulan` varchar(20)
,`periode_tahun` varchar(20)
,`tgl_upload` date
,`tgl_terakhir_revisi` date
,`status_laporan` varchar(30)
,`nama` varchar(50)
,`kode_pa` varchar(20)
,`operator` varchar(16)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user_hakim`
-- (See below for the actual view)
--
CREATE TABLE `v_user_hakim` (
`id` int(11)
,`nama` varchar(50)
,`email` varchar(100)
,`username` varchar(50)
,`password` varchar(255)
,`role_id` int(11)
,`kode_pa` varchar(20)
,`is_active` int(11)
,`data_created` date
,`id_mh` int(11)
,`id_user_mh` int(11)
,`majelis` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user_laporan`
-- (See below for the actual view)
--
CREATE TABLE `v_user_laporan` (
`id` int(11)
,`id_user` int(11)
,`periode` varchar(20)
,`berkas_laporan` varchar(100)
,`laper_pdf` varchar(100)
,`laper_xls` varchar(100)
,`tgl_upload` date
,`tgl_terakhir_rev` date
,`status` varchar(250)
,`user_id` int(11)
,`nama` varchar(50)
,`kode_pa` varchar(20)
,`operator` varchar(16)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user_pp`
-- (See below for the actual view)
--
CREATE TABLE `v_user_pp` (
`id` int(11)
,`nama` varchar(50)
,`email` varchar(100)
,`username` varchar(50)
,`password` varchar(255)
,`role_id` int(11)
,`kode_pa` varchar(20)
,`is_active` int(11)
,`data_created` date
);

-- --------------------------------------------------------

--
-- Structure for view `v_all_perkara`
--
DROP TABLE IF EXISTS `v_all_perkara`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manado`@`localhost` SQL SECURITY DEFINER VIEW `v_all_perkara`  AS SELECT `list_perkara`.`id_perkara` AS `id_perkara`, `list_perkara`.`id_user` AS `id_user`, `list_perkara`.`no_perkara` AS `no_perkara`, `list_perkara`.`nm_pihak_penggugat` AS `nm_pihak_penggugat`, `list_perkara`.`no_hp_penggugat` AS `no_hp_penggugat`, `list_perkara`.`nm_pihak_tergugat` AS `nm_pihak_tergugat`, `list_perkara`.`no_hp_tergugat` AS `no_hp_tergugat`, `list_perkara`.`jns_perkara` AS `jns_perkara`, `list_perkara`.`tgl_register` AS `tgl_register`, `list_perkara`.`tgl_reg_banding` AS `tgl_reg_banding`, `list_perkara`.`no_surat_pengantar` AS `no_surat_pengantar`, `list_perkara`.`pejabat_berwenang` AS `pejabat_berwenang`, `list_perkara`.`nm_pejabat` AS `nm_pejabat`, `list_perkara`.`nip_pejabat` AS `nip_pejabat`, `list_perkara`.`banyaknya` AS `banyaknya`, `list_perkara`.`keterangan` AS `keterangan`, `list_perkara`.`status_perkara` AS `status_perkara`, `list_perkara`.`sp_perkara` AS `sp_perkara`, `list_perkara`.`no_perkara_banding` AS `no_perkara_banding`, `list_perkara`.`putusan_banding` AS `putusan_banding`, `list_perkara`.`is_nomor` AS `is_nomor`, `list_perkara`.`surat_gugatan` AS `surat_gugatan`, `list_perkara`.`sk_bundelA` AS `sk_bundelA`, `list_perkara`.`bukti_pemb_panjar` AS `bukti_pemb_panjar`, `list_perkara`.`majelis_hakim` AS `majelis_hakim`, `list_perkara`.`penunjukan_pp` AS `penunjukan_pp`, `list_perkara`.`penunjukan_js` AS `penunjukan_js`, `list_perkara`.`penetapan_hari_sidang` AS `penetapan_hari_sidang`, `list_perkara`.`relaas_panggilan` AS `relaas_panggilan`, `list_perkara`.`ba_sidang` AS `ba_sidang`, `list_perkara`.`penetapan_sita` AS `penetapan_sita`, `list_perkara`.`ba_sita` AS `ba_sita`, `list_perkara`.`lampiran_surat` AS `lampiran_surat`, `list_perkara`.`surat_bukti_penggugat` AS `surat_bukti_penggugat`, `list_perkara`.`surat_bukti_tergugat` AS `surat_bukti_tergugat`, `list_perkara`.`tanggapan_bukti_tergugat` AS `tanggapan_bukti_tergugat`, `list_perkara`.`tanggapan_bukti_penggugat` AS `tanggapan_bukti_penggugat`, `list_perkara`.`gambar_situasi` AS `gambar_situasi`, `list_perkara`.`surat_lain` AS `surat_lain`, `list_perkara`.`salinan_putusan_pa` AS `salinan_putusan_pa`, `list_perkara`.`salinan_putusan_pa_rtf` AS `salinan_putusan_pa_rtf`, `list_perkara`.`sk_bundelb` AS `sk_bundelb`, `list_perkara`.`akta_banding` AS `akta_banding`, `list_perkara`.`akta_penerimaan_mb` AS `akta_penerimaan_mb`, `list_perkara`.`memori_banding` AS `memori_banding`, `list_perkara`.`memori_banding_rtf` AS `memori_banding_rtf`, `list_perkara`.`akta_pemberitahuan_banding` AS `akta_pemberitahuan_banding`, `list_perkara`.`pemberitahuan_penyerahan_mb` AS `pemberitahuan_penyerahan_mb`, `list_perkara`.`akta_penerimaankontra_mb` AS `akta_penerimaankontra_mb`, `list_perkara`.`kontra_mb` AS `kontra_mb`, `list_perkara`.`kontra_mb_rtf` AS `kontra_mb_rtf`, `list_perkara`.`pemberitahuan_penyerahankontra_mb` AS `pemberitahuan_penyerahankontra_mb`, `list_perkara`.`relaas_periksa_berkas_pb` AS `relaas_periksa_berkas_pb`, `list_perkara`.`sk_khusus` AS `sk_khusus`, `list_perkara`.`bukt_pengiriman_bpb` AS `bukt_pengiriman_bpb`, `list_perkara`.`bukti_setor_bp_kasnegara` AS `bukti_setor_bp_kasnegara`, `list_perkara`.`surat_lainnya_b` AS `surat_lainnya_b`, `users`.`nama` AS `nama`, `penunjukan_pp`.`id_user_pp` AS `id_user_pp`, `pmh`.`majelis_hakim` AS `MajelisHakim` FROM (((`list_perkara` join `users` on(`list_perkara`.`id_user` = `users`.`id`)) join `penunjukan_pp` on(`list_perkara`.`id_perkara` = `penunjukan_pp`.`id_perkara`)) join `pmh` on(`list_perkara`.`id_perkara` = `pmh`.`id_perkara`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_berkas_hakim`
--
DROP TABLE IF EXISTS `v_berkas_hakim`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manado`@`localhost` SQL SECURITY DEFINER VIEW `v_berkas_hakim`  AS SELECT `list_perkara`.`id_perkara` AS `id_perkara`, `list_perkara`.`id_user` AS `id_user`, `list_perkara`.`no_perkara` AS `no_perkara`, `list_perkara`.`nm_pihak_penggugat` AS `nm_pihak_penggugat`, `list_perkara`.`nm_pihak_tergugat` AS `nm_pihak_tergugat`, `list_perkara`.`jns_perkara` AS `jns_perkara`, `list_perkara`.`tgl_register` AS `tgl_register`, `list_perkara`.`tgl_reg_banding` AS `tgl_reg_banding`, `list_perkara`.`no_surat_pengantar` AS `no_surat_pengantar`, `list_perkara`.`pejabat_berwenang` AS `pejabat_berwenang`, `list_perkara`.`nm_pejabat` AS `nm_pejabat`, `list_perkara`.`nip_pejabat` AS `nip_pejabat`, `list_perkara`.`banyaknya` AS `banyaknya`, `list_perkara`.`keterangan` AS `keterangan`, `list_perkara`.`status_perkara` AS `status_perkara`, `list_perkara`.`sp_perkara` AS `sp_perkara`, `list_perkara`.`no_perkara_banding` AS `no_perkara_banding`, `list_perkara`.`putusan_banding` AS `putusan_banding`, `list_perkara`.`is_nomor` AS `is_nomor`, `list_perkara`.`surat_gugatan` AS `surat_gugatan`, `list_perkara`.`sk_bundelA` AS `sk_bundelA`, `list_perkara`.`bukti_pemb_panjar` AS `bukti_pemb_panjar`, `list_perkara`.`majelis_hakim` AS `majelis_hakim`, `list_perkara`.`penunjukan_pp` AS `penunjukan_pp`, `list_perkara`.`penunjukan_js` AS `penunjukan_js`, `list_perkara`.`penetapan_hari_sidang` AS `penetapan_hari_sidang`, `list_perkara`.`relaas_panggilan` AS `relaas_panggilan`, `list_perkara`.`ba_sidang` AS `ba_sidang`, `list_perkara`.`penetapan_sita` AS `penetapan_sita`, `list_perkara`.`ba_sita` AS `ba_sita`, `list_perkara`.`lampiran_surat` AS `lampiran_surat`, `list_perkara`.`surat_bukti_penggugat` AS `surat_bukti_penggugat`, `list_perkara`.`surat_bukti_tergugat` AS `surat_bukti_tergugat`, `list_perkara`.`tanggapan_bukti_tergugat` AS `tanggapan_bukti_tergugat`, `list_perkara`.`tanggapan_bukti_penggugat` AS `tanggapan_bukti_penggugat`, `list_perkara`.`gambar_situasi` AS `gambar_situasi`, `list_perkara`.`surat_lain` AS `surat_lain`, `list_perkara`.`salinan_putusan_pa` AS `salinan_putusan_pa`, `list_perkara`.`salinan_putusan_pa_rtf` AS `salinan_putusan_pa_rtf`, `list_perkara`.`sk_bundelb` AS `sk_bundelb`, `list_perkara`.`akta_banding` AS `akta_banding`, `list_perkara`.`akta_penerimaan_mb` AS `akta_penerimaan_mb`, `list_perkara`.`memori_banding` AS `memori_banding`, `list_perkara`.`memori_banding_rtf` AS `memori_banding_rtf`, `list_perkara`.`akta_pemberitahuan_banding` AS `akta_pemberitahuan_banding`, `list_perkara`.`pemberitahuan_penyerahan_mb` AS `pemberitahuan_penyerahan_mb`, `list_perkara`.`akta_penerimaankontra_mb` AS `akta_penerimaankontra_mb`, `list_perkara`.`kontra_mb` AS `kontra_mb`, `list_perkara`.`kontra_mb_rtf` AS `kontra_mb_rtf`, `list_perkara`.`pemberitahuan_penyerahankontra_mb` AS `pemberitahuan_penyerahankontra_mb`, `list_perkara`.`relaas_periksa_berkas_pb` AS `relaas_periksa_berkas_pb`, `list_perkara`.`sk_khusus` AS `sk_khusus`, `list_perkara`.`bukt_pengiriman_bpb` AS `bukt_pengiriman_bpb`, `list_perkara`.`bukti_setor_bp_kasnegara` AS `bukti_setor_bp_kasnegara`, `list_perkara`.`surat_lainnya_b` AS `surat_lainnya_b`, `users`.`nama` AS `nama` FROM (`list_perkara` join `users` on(`list_perkara`.`id_user` = `users`.`id`)) WHERE `list_perkara`.`no_perkara_banding` <> '\'' ;

-- --------------------------------------------------------

--
-- Structure for view `v_c_hakim`
--
DROP TABLE IF EXISTS `v_c_hakim`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manado`@`localhost` SQL SECURITY DEFINER VIEW `v_c_hakim`  AS SELECT `catatan_hakim_baru`.`id_catatan` AS `id_catatan`, `catatan_hakim_baru`.`id_perkara` AS `id_perkara`, `catatan_hakim_baru`.`id_user` AS `id_user`, `catatan_hakim_baru`.`nm_berkas` AS `nm_berkas`, `catatan_hakim_baru`.`catatan` AS `catatan`, `catatan_hakim_baru`.`time` AS `time`, `users`.`nama` AS `nama` FROM (`catatan_hakim_baru` join `users` on(`catatan_hakim_baru`.`id_user` = `users`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_detail_triwulan`
--
DROP TABLE IF EXISTS `v_detail_triwulan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manado`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_triwulan`  AS SELECT `laporan_triwulan`.`id` AS `id`, `laporan_triwulan`.`id_user` AS `id_user`, `laporan_triwulan`.`berkas_laporan` AS `berkas_laporan`, `laporan_triwulan`.`periode_triwulan` AS `periode_triwulan`, `laporan_triwulan`.`periode_tahun` AS `periode_tahun`, `laporan_triwulan`.`tgl_upload` AS `tgl_upload`, `laporan_triwulan`.`tgl_terakhir_revisi` AS `tgl_terakhir_revisi`, `laporan_triwulan`.`status_laporan` AS `status_laporan`, `lap_tri_detail`.`id` AS `id_triwulan`, `lap_tri_detail`.`nm_laporan` AS `nm_laporan`, `lap_tri_detail`.`tgl_kirim` AS `tgl_kirim`, `lap_tri_detail`.`lap_pdf` AS `lap_pdf`, `lap_tri_detail`.`lap_xls` AS `lap_xls`, `lap_tri_detail`.`rev_pdf` AS `rev_pdf`, `lap_tri_detail`.`rev_xls` AS `rev_xls`, `lap_tri_detail`.`tgl_revisi` AS `tgl_revisi`, `lap_tri_detail`.`status_validasi` AS `status_validasi`, `users`.`nama` AS `nama`, `users`.`kode_pa` AS `kode_pa`, `users`.`operator` AS `operator` FROM ((`laporan_triwulan` join `lap_tri_detail` on(`lap_tri_detail`.`id_lap_tri` = `laporan_triwulan`.`id`)) join `users` on(`users`.`id` = `laporan_triwulan`.`id_user`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_header_perkara`
--
DROP TABLE IF EXISTS `v_header_perkara`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manado`@`localhost` SQL SECURITY DEFINER VIEW `v_header_perkara`  AS SELECT `penunjukan_pp`.`id_user_pp` AS `id_user_pp`, `users`.`nama` AS `nama`, `list_perkara`.`id_perkara` AS `id_perkara`, `list_perkara`.`no_perkara_banding` AS `no_perkara_banding`, `list_perkara`.`nm_pihak_penggugat` AS `nm_pihak_penggugat`, `list_perkara`.`no_hp_penggugat` AS `no_hp_penggugat`, `list_perkara`.`nm_pihak_tergugat` AS `nm_pihak_tergugat`, `list_perkara`.`no_hp_tergugat` AS `no_hp_tergugat`, `pmh`.`majelis_hakim` AS `majelis_hakim` FROM (((`penunjukan_pp` join `list_perkara` on(`penunjukan_pp`.`id_perkara` = `list_perkara`.`id_perkara`)) join `users` on(`penunjukan_pp`.`id_user_pp` = `users`.`id`)) join `pmh` on(`penunjukan_pp`.`id_perkara` = `pmh`.`id_perkara`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_perkara_pp`
--
DROP TABLE IF EXISTS `v_perkara_pp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manado`@`localhost` SQL SECURITY DEFINER VIEW `v_perkara_pp`  AS SELECT `penunjukan_pp`.`id_user_pp` AS `id_user_pp`, `users`.`nama` AS `nama`, `list_perkara`.`id_perkara` AS `id_perkara`, `list_perkara`.`id_user` AS `id_user`, `list_perkara`.`no_perkara` AS `no_perkara`, `list_perkara`.`nm_pihak_penggugat` AS `nm_pihak_penggugat`, `list_perkara`.`no_hp_penggugat` AS `no_hp_penggugat`, `list_perkara`.`nm_pihak_tergugat` AS `nm_pihak_tergugat`, `list_perkara`.`no_hp_tergugat` AS `no_hp_tergugat`, `list_perkara`.`jns_perkara` AS `jns_perkara`, `list_perkara`.`tgl_register` AS `tgl_register`, `list_perkara`.`tgl_reg_banding` AS `tgl_reg_banding`, `list_perkara`.`no_surat_pengantar` AS `no_surat_pengantar`, `list_perkara`.`pejabat_berwenang` AS `pejabat_berwenang`, `list_perkara`.`nm_pejabat` AS `nm_pejabat`, `list_perkara`.`nip_pejabat` AS `nip_pejabat`, `list_perkara`.`banyaknya` AS `banyaknya`, `list_perkara`.`keterangan` AS `keterangan`, `list_perkara`.`status_perkara` AS `status_perkara`, `list_perkara`.`sp_perkara` AS `sp_perkara`, `list_perkara`.`no_perkara_banding` AS `no_perkara_banding`, `list_perkara`.`putusan_banding` AS `putusan_banding`, `list_perkara`.`is_nomor` AS `is_nomor`, `list_perkara`.`surat_gugatan` AS `surat_gugatan`, `list_perkara`.`sk_bundelA` AS `sk_bundelA`, `list_perkara`.`bukti_pemb_panjar` AS `bukti_pemb_panjar`, `list_perkara`.`majelis_hakim` AS `majelis_hakim`, `list_perkara`.`penunjukan_pp` AS `penunjukan_pp`, `list_perkara`.`penunjukan_js` AS `penunjukan_js`, `list_perkara`.`penetapan_hari_sidang` AS `penetapan_hari_sidang`, `list_perkara`.`relaas_panggilan` AS `relaas_panggilan`, `list_perkara`.`ba_sidang` AS `ba_sidang`, `list_perkara`.`penetapan_sita` AS `penetapan_sita`, `list_perkara`.`ba_sita` AS `ba_sita`, `list_perkara`.`lampiran_surat` AS `lampiran_surat`, `list_perkara`.`surat_bukti_penggugat` AS `surat_bukti_penggugat`, `list_perkara`.`surat_bukti_tergugat` AS `surat_bukti_tergugat`, `list_perkara`.`tanggapan_bukti_tergugat` AS `tanggapan_bukti_tergugat`, `list_perkara`.`tanggapan_bukti_penggugat` AS `tanggapan_bukti_penggugat`, `list_perkara`.`gambar_situasi` AS `gambar_situasi`, `list_perkara`.`surat_lain` AS `surat_lain`, `list_perkara`.`salinan_putusan_pa` AS `salinan_putusan_pa`, `list_perkara`.`salinan_putusan_pa_rtf` AS `salinan_putusan_pa_rtf`, `list_perkara`.`sk_bundelb` AS `sk_bundelb`, `list_perkara`.`akta_banding` AS `akta_banding`, `list_perkara`.`akta_penerimaan_mb` AS `akta_penerimaan_mb`, `list_perkara`.`memori_banding` AS `memori_banding`, `list_perkara`.`memori_banding_rtf` AS `memori_banding_rtf`, `list_perkara`.`akta_pemberitahuan_banding` AS `akta_pemberitahuan_banding`, `list_perkara`.`pemberitahuan_penyerahan_mb` AS `pemberitahuan_penyerahan_mb`, `list_perkara`.`akta_penerimaankontra_mb` AS `akta_penerimaankontra_mb`, `list_perkara`.`kontra_mb` AS `kontra_mb`, `list_perkara`.`kontra_mb_rtf` AS `kontra_mb_rtf`, `list_perkara`.`pemberitahuan_penyerahankontra_mb` AS `pemberitahuan_penyerahankontra_mb`, `list_perkara`.`relaas_periksa_berkas_pb` AS `relaas_periksa_berkas_pb`, `list_perkara`.`sk_khusus` AS `sk_khusus`, `list_perkara`.`bukt_pengiriman_bpb` AS `bukt_pengiriman_bpb`, `list_perkara`.`bukti_setor_bp_kasnegara` AS `bukti_setor_bp_kasnegara`, `list_perkara`.`surat_lainnya_b` AS `surat_lainnya_b` FROM ((`list_perkara` join `penunjukan_pp` on(`list_perkara`.`id_perkara` = `penunjukan_pp`.`id_perkara`)) join `users` on(`list_perkara`.`id_user` = `users`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_laporan`
--
DROP TABLE IF EXISTS `v_rekap_laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manado`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_laporan`  AS SELECT `rekap_laporan_perkara`.`id` AS `id`, `rekap_laporan_perkara`.`id_user` AS `id_user`, `rekap_laporan_perkara`.`periode` AS `periode`, `rekap_laporan_perkara`.`rekap_pdf` AS `rekap_pdf`, `rekap_laporan_perkara`.`rekap_xls` AS `rekap_xls`, `rekap_laporan_perkara`.`tgl_upload` AS `tgl_upload`, `users`.`nama` AS `nama`, `users`.`kode_pa` AS `kode_pa` FROM (`rekap_laporan_perkara` join `users` on(`rekap_laporan_perkara`.`id_user` = `users`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_rekap_triwulan`
--
DROP TABLE IF EXISTS `v_rekap_triwulan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manado`@`localhost` SQL SECURITY DEFINER VIEW `v_rekap_triwulan`  AS SELECT `rekap_triwulan`.`id` AS `id`, `rekap_triwulan`.`id_user` AS `id_user`, `rekap_triwulan`.`berkas_laporan` AS `berkas_laporan`, `rekap_triwulan`.`periode_triwulan` AS `periode_triwulan`, `rekap_triwulan`.`periode_tahun` AS `periode_tahun`, `rekap_triwulan`.`tgl_upload` AS `tgl_upload`, `rekap_tri_detail`.`id` AS `id_triwulan`, `rekap_tri_detail`.`nm_laporan` AS `nm_laporan`, `rekap_tri_detail`.`tgl_kirim` AS `tgl_kirim`, `rekap_tri_detail`.`lap_pdf` AS `lap_pdf`, `rekap_tri_detail`.`lap_xls` AS `lap_xls`, `users`.`kode_pa` AS `kode_pa`, `users`.`nama` AS `nama` FROM ((`rekap_triwulan` join `rekap_tri_detail` on(`rekap_tri_detail`.`id_rekap_tri` = `rekap_triwulan`.`id`)) join `users` on(`users`.`id` = `rekap_triwulan`.`id_user`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_triwulan_laporan`
--
DROP TABLE IF EXISTS `v_triwulan_laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manado`@`localhost` SQL SECURITY DEFINER VIEW `v_triwulan_laporan`  AS SELECT `laporan_triwulan`.`id` AS `id`, `laporan_triwulan`.`id_user` AS `id_user`, `laporan_triwulan`.`berkas_laporan` AS `berkas_laporan`, `laporan_triwulan`.`periode_triwulan` AS `periode_triwulan`, `laporan_triwulan`.`periode_tahun` AS `periode_tahun`, `laporan_triwulan`.`tgl_upload` AS `tgl_upload`, `laporan_triwulan`.`tgl_terakhir_revisi` AS `tgl_terakhir_revisi`, `laporan_triwulan`.`status_laporan` AS `status_laporan`, `users`.`nama` AS `nama`, `users`.`kode_pa` AS `kode_pa`, `users`.`operator` AS `operator` FROM (`laporan_triwulan` join `users` on(`laporan_triwulan`.`id_user` = `users`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_user_hakim`
--
DROP TABLE IF EXISTS `v_user_hakim`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manado`@`localhost` SQL SECURITY DEFINER VIEW `v_user_hakim`  AS SELECT `users`.`id` AS `id`, `users`.`nama` AS `nama`, `users`.`email` AS `email`, `users`.`username` AS `username`, `users`.`password` AS `password`, `users`.`role_id` AS `role_id`, `users`.`kode_pa` AS `kode_pa`, `users`.`is_active` AS `is_active`, `users`.`data_created` AS `data_created`, `majelis_hakim`.`id_mh` AS `id_mh`, `majelis_hakim`.`id_user_mh` AS `id_user_mh`, `majelis_hakim`.`majelis` AS `majelis` FROM (`users` join `majelis_hakim` on(`users`.`id` = `majelis_hakim`.`id_user_mh`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_user_laporan`
--
DROP TABLE IF EXISTS `v_user_laporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manado`@`localhost` SQL SECURITY DEFINER VIEW `v_user_laporan`  AS SELECT `laporan_perkara`.`id` AS `id`, `laporan_perkara`.`id_user` AS `id_user`, `laporan_perkara`.`periode` AS `periode`, `laporan_perkara`.`berkas_laporan` AS `berkas_laporan`, `laporan_perkara`.`laper_pdf` AS `laper_pdf`, `laporan_perkara`.`laper_xls` AS `laper_xls`, `laporan_perkara`.`tgl_upload` AS `tgl_upload`, `laporan_perkara`.`tgl_terakhir_rev` AS `tgl_terakhir_rev`, `laporan_perkara`.`status` AS `status`, `users`.`id` AS `user_id`, `users`.`nama` AS `nama`, `users`.`kode_pa` AS `kode_pa`, `users`.`operator` AS `operator` FROM (`laporan_perkara` join `users` on(`laporan_perkara`.`id_user` = `users`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_user_pp`
--
DROP TABLE IF EXISTS `v_user_pp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`manado`@`localhost` SQL SECURITY DEFINER VIEW `v_user_pp`  AS SELECT `users`.`id` AS `id`, `users`.`nama` AS `nama`, `users`.`email` AS `email`, `users`.`username` AS `username`, `users`.`password` AS `password`, `users`.`role_id` AS `role_id`, `users`.`kode_pa` AS `kode_pa`, `users`.`is_active` AS `is_active`, `users`.`data_created` AS `data_created` FROM `users` WHERE `users`.`role_id` = 55 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan_hakim_baru`
--
ALTER TABLE `catatan_hakim_baru`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `id_perkara` (`id_perkara`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `catatan_laporan`
--
ALTER TABLE `catatan_laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laper_id` (`laper_id`),
  ADD KEY `triwulan_id` (`id_triwulan`);

--
-- Indexes for table `kategori_perkara`
--
ALTER TABLE `kategori_perkara`
  ADD PRIMARY KEY (`id_kaper`);

--
-- Indexes for table `laporan_perkara`
--
ALTER TABLE `laporan_perkara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_triwulan`
--
ALTER TABLE `laporan_triwulan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `lap_tri_detail`
--
ALTER TABLE `lap_tri_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lap_tri` (`id_lap_tri`);

--
-- Indexes for table `list_perkara`
--
ALTER TABLE `list_perkara`
  ADD PRIMARY KEY (`id_perkara`),
  ADD KEY `idx_user` (`id_user`);

--
-- Indexes for table `log_audittrail`
--
ALTER TABLE `log_audittrail`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `majelis_hakim`
--
ALTER TABLE `majelis_hakim`
  ADD PRIMARY KEY (`id_mh`),
  ADD KEY `id_user_mh` (`id_user_mh`);

--
-- Indexes for table `penunjukan_pp`
--
ALTER TABLE `penunjukan_pp`
  ADD PRIMARY KEY (`id_pp`),
  ADD KEY `id_perkara` (`id_perkara`),
  ADD KEY `id_user_pp` (`id_user_pp`);

--
-- Indexes for table `pmh`
--
ALTER TABLE `pmh`
  ADD PRIMARY KEY (`id_pmh`),
  ADD KEY `id_perkara` (`id_perkara`);

--
-- Indexes for table `rekap_laporan_perkara`
--
ALTER TABLE `rekap_laporan_perkara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `rekap_triwulan`
--
ALTER TABLE `rekap_triwulan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `rekap_tri_detail`
--
ALTER TABLE `rekap_tri_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rekap_tri` (`id_rekap_tri`);

--
-- Indexes for table `revisi_laporan`
--
ALTER TABLE `revisi_laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laper_id` (`laper_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan_hakim_baru`
--
ALTER TABLE `catatan_hakim_baru`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `catatan_laporan`
--
ALTER TABLE `catatan_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `kategori_perkara`
--
ALTER TABLE `kategori_perkara`
  MODIFY `id_kaper` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `laporan_perkara`
--
ALTER TABLE `laporan_perkara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `laporan_triwulan`
--
ALTER TABLE `laporan_triwulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lap_tri_detail`
--
ALTER TABLE `lap_tri_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `list_perkara`
--
ALTER TABLE `list_perkara`
  MODIFY `id_perkara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `log_audittrail`
--
ALTER TABLE `log_audittrail`
  MODIFY `log_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=768;

--
-- AUTO_INCREMENT for table `majelis_hakim`
--
ALTER TABLE `majelis_hakim`
  MODIFY `id_mh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penunjukan_pp`
--
ALTER TABLE `penunjukan_pp`
  MODIFY `id_pp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pmh`
--
ALTER TABLE `pmh`
  MODIFY `id_pmh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `rekap_laporan_perkara`
--
ALTER TABLE `rekap_laporan_perkara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rekap_triwulan`
--
ALTER TABLE `rekap_triwulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rekap_tri_detail`
--
ALTER TABLE `rekap_tri_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `revisi_laporan`
--
ALTER TABLE `revisi_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan_laporan`
--
ALTER TABLE `catatan_laporan`
  ADD CONSTRAINT `catatan_laporan_ibfk_1` FOREIGN KEY (`laper_id`) REFERENCES `laporan_perkara` (`id`),
  ADD CONSTRAINT `catatan_laporan_ibfk_2` FOREIGN KEY (`id_triwulan`) REFERENCES `lap_tri_detail` (`id`);

--
-- Constraints for table `laporan_triwulan`
--
ALTER TABLE `laporan_triwulan`
  ADD CONSTRAINT `laporan_triwulan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `lap_tri_detail`
--
ALTER TABLE `lap_tri_detail`
  ADD CONSTRAINT `lap_tri_detail_ibfk_1` FOREIGN KEY (`id_lap_tri`) REFERENCES `laporan_triwulan` (`id`);

--
-- Constraints for table `majelis_hakim`
--
ALTER TABLE `majelis_hakim`
  ADD CONSTRAINT `majelis_hakim_ibfk_1` FOREIGN KEY (`id_user_mh`) REFERENCES `users` (`id`);

--
-- Constraints for table `penunjukan_pp`
--
ALTER TABLE `penunjukan_pp`
  ADD CONSTRAINT `penunjukan_pp_ibfk_1` FOREIGN KEY (`id_perkara`) REFERENCES `list_perkara` (`id_perkara`),
  ADD CONSTRAINT `penunjukan_pp_ibfk_2` FOREIGN KEY (`id_user_pp`) REFERENCES `users` (`id`);

--
-- Constraints for table `pmh`
--
ALTER TABLE `pmh`
  ADD CONSTRAINT `pmh_ibfk_1` FOREIGN KEY (`id_perkara`) REFERENCES `list_perkara` (`id_perkara`);

--
-- Constraints for table `rekap_laporan_perkara`
--
ALTER TABLE `rekap_laporan_perkara`
  ADD CONSTRAINT `rekap_laporan_perkara_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `rekap_triwulan`
--
ALTER TABLE `rekap_triwulan`
  ADD CONSTRAINT `rekap_triwulan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `rekap_tri_detail`
--
ALTER TABLE `rekap_tri_detail`
  ADD CONSTRAINT `rekap_tri_detail_ibfk_1` FOREIGN KEY (`id_rekap_tri`) REFERENCES `rekap_triwulan` (`id`);

--
-- Constraints for table `revisi_laporan`
--
ALTER TABLE `revisi_laporan`
  ADD CONSTRAINT `revisi_laporan_ibfk_1` FOREIGN KEY (`laper_id`) REFERENCES `laporan_perkara` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
