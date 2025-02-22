-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table layanan desa.adminprofil
CREATE TABLE IF NOT EXISTS `adminprofil` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) DEFAULT '0',
  `id_jadwal` int(11) DEFAULT '0',
  `jenis` varchar(50) DEFAULT NULL,
  `usia` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_admin`),
  KEY `FK__user` (`id`),
  KEY `FK_adminprofil_jadwal` (`id_jadwal`),
  CONSTRAINT `FK__user` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  CONSTRAINT `FK_adminprofil_jadwal` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.adminprofil: ~2 rows (approximately)
/*!40000 ALTER TABLE `adminprofil` DISABLE KEYS */;
INSERT INTO `adminprofil` (`id_admin`, `id`, `id_jadwal`, `jenis`, `usia`, `alamat`) VALUES
	(1, 9, 1, 'Laki-laki', '21', 'malang'),
	(2, 12, 2, 'Perempuan', '24', 'Blitar');
/*!40000 ALTER TABLE `adminprofil` ENABLE KEYS */;

-- Dumping structure for table layanan desa.data
CREATE TABLE IF NOT EXISTS `data` (
  `id_data` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `nik` varchar(50) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `temp` varchar(50) DEFAULT NULL,
  `tgl` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `kewarganegaraan` varchar(50) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_data`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table layanan desa.data: ~3 rows (approximately)
/*!40000 ALTER TABLE `data` DISABLE KEYS */;
INSERT INTO `data` (`id_data`, `nama`, `nik`, `jenis`, `temp`, `tgl`, `status`, `kewarganegaraan`, `agama`, `pekerjaan`, `alamat`) VALUES
	(1, 'Muhamad Aziz', '330006051110232', '', 'Blitar', '1996-07-25', 'Menikah', 'Indonesia', 'Islam', 'Wirausaha', 'Blitar'),
	(2, 'Ridho Ilahi', '35005021313123', 'Laki-laki', 'Blitar', '2002-04-20', 'Belum Menikah', 'Indonesia', 'Islam', 'Mahasiswa', 'Jl. Wijaya kusuma no 10 Jatitengah'),
	(3, 'Kkeysha', '35005200153', 'Perempuan', 'Malang', '1998-07-15', 'Belum Kawin', 'Indonesia', 'Islam', 'Buruh tani', 'Jl. Wijaya kusuma no 7 Jatitengah');
/*!40000 ALTER TABLE `data` ENABLE KEYS */;

-- Dumping structure for table layanan desa.detail_guru
CREATE TABLE IF NOT EXISTS `detail_guru` (
  `kode_guru` int(15) NOT NULL AUTO_INCREMENT,
  `nip` int(15) NOT NULL,
  `kode_matpel` int(15) NOT NULL,
  PRIMARY KEY (`kode_guru`),
  KEY `nip` (`nip`),
  KEY `kode_matpel` (`kode_matpel`),
  CONSTRAINT `detail_guru_ibfk_1` FOREIGN KEY (`nip`) REFERENCES `guru` (`nip`),
  CONSTRAINT `detail_guru_ibfk_2` FOREIGN KEY (`kode_matpel`) REFERENCES `matpel` (`kode_matpel`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.detail_guru: ~10 rows (approximately)
/*!40000 ALTER TABLE `detail_guru` DISABLE KEYS */;
INSERT INTO `detail_guru` (`kode_guru`, `nip`, `kode_matpel`) VALUES
	(201, 20001, 301),
	(202, 20002, 302),
	(203, 20003, 303),
	(204, 20004, 304),
	(205, 20005, 305),
	(206, 20006, 306),
	(207, 20007, 307),
	(208, 20008, 308),
	(209, 20009, 309),
	(210, 20010, 310);
/*!40000 ALTER TABLE `detail_guru` ENABLE KEYS */;

-- Dumping structure for table layanan desa.detail_siswa
CREATE TABLE IF NOT EXISTS `detail_siswa` (
  `kode_siswa` int(15) NOT NULL AUTO_INCREMENT,
  `nis` int(15) NOT NULL,
  `kode_wali` int(15) NOT NULL,
  `kode_kelas` int(15) NOT NULL,
  `kode_ekstra` int(15) NOT NULL,
  PRIMARY KEY (`kode_siswa`),
  KEY `nis` (`nis`),
  KEY `kode_wali` (`kode_wali`),
  KEY `kode_kelas` (`kode_kelas`),
  KEY `kode_ekstra` (`kode_ekstra`),
  CONSTRAINT `detail_siswa_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  CONSTRAINT `detail_siswa_ibfk_2` FOREIGN KEY (`kode_wali`) REFERENCES `wali_siswa` (`kode_wali`),
  CONSTRAINT `detail_siswa_ibfk_3` FOREIGN KEY (`kode_kelas`) REFERENCES `kelas` (`kode_kelas`),
  CONSTRAINT `detail_siswa_ibfk_4` FOREIGN KEY (`kode_ekstra`) REFERENCES `ekstra` (`kode_ekstra`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.detail_siswa: ~10 rows (approximately)
/*!40000 ALTER TABLE `detail_siswa` DISABLE KEYS */;
INSERT INTO `detail_siswa` (`kode_siswa`, `nis`, `kode_wali`, `kode_kelas`, `kode_ekstra`) VALUES
	(101, 10001, 30001, 501, 408),
	(102, 10002, 30002, 503, 401),
	(103, 10003, 30003, 501, 407),
	(104, 10004, 30004, 502, 407),
	(105, 10005, 30005, 503, 401),
	(106, 10006, 30006, 503, 403),
	(107, 10007, 30007, 501, 402),
	(108, 10008, 30008, 501, 404),
	(109, 10009, 30009, 502, 408),
	(110, 10010, 30010, 503, 408);
/*!40000 ALTER TABLE `detail_siswa` ENABLE KEYS */;

-- Dumping structure for table layanan desa.ekstra
CREATE TABLE IF NOT EXISTS `ekstra` (
  `kode_ekstra` int(15) NOT NULL AUTO_INCREMENT,
  `nama_ekstra` varchar(25) NOT NULL,
  PRIMARY KEY (`kode_ekstra`)
) ENGINE=InnoDB AUTO_INCREMENT=411 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.ekstra: ~10 rows (approximately)
/*!40000 ALTER TABLE `ekstra` DISABLE KEYS */;
INSERT INTO `ekstra` (`kode_ekstra`, `nama_ekstra`) VALUES
	(401, 'Futsal'),
	(402, 'Basket'),
	(403, 'Volly'),
	(404, 'Tenis Meja'),
	(405, 'Bulu Tangkis'),
	(406, 'Karate'),
	(407, 'PMR'),
	(408, 'Drum Band'),
	(409, 'Karawitan'),
	(410, 'Banjari');
/*!40000 ALTER TABLE `ekstra` ENABLE KEYS */;

-- Dumping structure for table layanan desa.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.files: ~0 rows (approximately)
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` (`id`, `name`, `size`, `downloads`) VALUES
	(1, 'sik.pdf', 213860, 0),
	(2, 'cetak_skck.pdf', 232421, 3);
/*!40000 ALTER TABLE `files` ENABLE KEYS */;

-- Dumping structure for table layanan desa.guru
CREATE TABLE IF NOT EXISTS `guru` (
  `nip` int(15) NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=20011 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.guru: ~10 rows (approximately)
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` (`nip`, `nama_guru`, `alamat`, `jenis_kelamin`, `no_hp`) VALUES
	(20001, 'Hadi Mulyadi', 'Jl. Cempaka Timur 25', 'L', '081245678912'),
	(20002, 'Rani Maharani', 'Jl. Arjuno 78', 'P', '082174573421'),
	(20003, 'Nur Rahmat', 'Jl. Welirang 56', 'L', '08567914591'),
	(20004, 'Sugeng Cahyanto', 'Jl. Kawi Atas 13', 'L', '08717439871'),
	(20005, 'Sri Utami', 'Jl. Panglima Sudirman 34', 'P', '0341836090'),
	(20006, 'Nurul Ilmi', 'Jl. Semeru 47', 'P', '08123301032'),
	(20007, 'Eko Kurniawan', 'Jl. Panderman 2', 'L', '087333457123'),
	(20008, 'Maya Lestari', 'Jl. Wilis 7', 'P', '08137264119'),
	(20009, 'Lukmanul Hakim', 'Jl. Anjasmoro 45', 'L', '082139555576'),
	(20010, 'Siti Fatimah', 'Jl. Kelud 65', 'P', '0341597851');
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;

-- Dumping structure for table layanan desa.jadwal
CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `waktu_mulai` varchar(50) DEFAULT NULL,
  `waktu_akhir` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table layanan desa.jadwal: ~2 rows (approximately)
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` (`id_jadwal`, `waktu_mulai`, `waktu_akhir`) VALUES
	(1, '08:00', '16:00'),
	(2, '10:54', '16:54');
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;

-- Dumping structure for table layanan desa.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `kode_kelas` int(15) NOT NULL AUTO_INCREMENT,
  `kelas` varchar(25) NOT NULL,
  PRIMARY KEY (`kode_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=504 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.kelas: ~3 rows (approximately)
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` (`kode_kelas`, `kelas`) VALUES
	(501, 'A'),
	(502, 'B'),
	(503, 'C');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;

-- Dumping structure for table layanan desa.matpel
CREATE TABLE IF NOT EXISTS `matpel` (
  `kode_matpel` int(15) NOT NULL AUTO_INCREMENT,
  `matpel` varchar(225) NOT NULL,
  `kkm` int(15) NOT NULL,
  PRIMARY KEY (`kode_matpel`)
) ENGINE=InnoDB AUTO_INCREMENT=311 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.matpel: ~10 rows (approximately)
/*!40000 ALTER TABLE `matpel` DISABLE KEYS */;
INSERT INTO `matpel` (`kode_matpel`, `matpel`, `kkm`) VALUES
	(301, 'IPA', 76),
	(302, 'IPS', 76),
	(303, 'Bahasa Indonesia', 78),
	(304, 'PPKn', 78),
	(305, 'Matematika', 75),
	(306, 'Aqidah Akhlak', 76),
	(307, 'Fiqih', 76),
	(308, 'Quran Hadist', 76),
	(309, 'Bahasa Arab', 76),
	(310, 'Seni Budaya', 76);
/*!40000 ALTER TABLE `matpel` ENABLE KEYS */;

-- Dumping structure for table layanan desa.nilai
CREATE TABLE IF NOT EXISTS `nilai` (
  `kode_nilai` int(15) NOT NULL AUTO_INCREMENT,
  `kode_siswa` int(15) NOT NULL,
  `kode_guru` int(15) NOT NULL,
  `nilai_tugas` int(50) NOT NULL,
  `nilai_uts` int(50) NOT NULL,
  `nilai_uas` int(50) NOT NULL,
  PRIMARY KEY (`kode_nilai`),
  KEY `kode_siswa` (`kode_siswa`),
  KEY `kode_guru` (`kode_guru`),
  CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`kode_guru`) REFERENCES `detail_guru` (`kode_guru`),
  CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kode_siswa`) REFERENCES `detail_siswa` (`kode_siswa`)
) ENGINE=InnoDB AUTO_INCREMENT=11085 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.nilai: ~46 rows (approximately)
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` (`kode_nilai`, `kode_siswa`, `kode_guru`, `nilai_tugas`, `nilai_uts`, `nilai_uas`) VALUES
	(11006, 102, 201, 100, 87, 97),
	(11007, 102, 202, 98, 90, 98),
	(11008, 102, 203, 100, 88, 100),
	(11009, 102, 204, 96, 82, 79),
	(11010, 102, 207, 100, 90, 94),
	(11011, 102, 209, 94, 99, 96),
	(11018, 104, 201, 100, 97, 99),
	(11019, 104, 203, 98, 92, 97),
	(11020, 104, 206, 100, 88, 92),
	(11021, 104, 208, 98, 97, 95),
	(11022, 104, 209, 100, 89, 98),
	(11023, 104, 210, 100, 88, 100),
	(11036, 107, 203, 100, 87, 90),
	(11037, 107, 203, 100, 97, 100),
	(11038, 107, 203, 98, 92, 100),
	(11039, 107, 203, 100, 93, 96),
	(11040, 107, 203, 99, 95, 98),
	(11041, 107, 203, 100, 89, 95),
	(11043, 108, 204, 98, 96, 100),
	(11044, 108, 205, 96, 91, 92),
	(11045, 108, 208, 95, 92, 100),
	(11046, 108, 209, 100, 99, 99),
	(11047, 108, 210, 98, 98, 98),
	(11048, 109, 202, 98, 95, 100),
	(11049, 109, 205, 100, 98, 92),
	(11050, 109, 207, 90, 100, 91),
	(11051, 109, 209, 100, 95, 100),
	(11052, 109, 210, 91, 98, 99),
	(11059, 102, 205, 90, 89, 100),
	(11060, 102, 206, 98, 89, 100),
	(11061, 102, 208, 98, 89, 100),
	(11062, 102, 210, 98, 89, 100),
	(11064, 108, 202, 89, 78, 100),
	(11065, 102, 202, 98, 100, 98),
	(11066, 109, 202, 98, 95, 185),
	(11067, 109, 202, 98, 95, 100),
	(11073, 101, 201, 50, 54, 69),
	(11074, 106, 201, 100, 100, 79),
	(11077, 101, 203, 100, 100, 100),
	(11078, 101, 204, 100, 100, 100),
	(11079, 101, 205, 100, 100, 100),
	(11080, 101, 206, 100, 100, 100),
	(11081, 101, 207, 100, 100, 100),
	(11082, 101, 208, 100, 100, 100),
	(11083, 101, 209, 100, 100, 100),
	(11084, 101, 210, 100, 100, 100);
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;

-- Dumping structure for table layanan desa.nilai_ekstra
CREATE TABLE IF NOT EXISTS `nilai_ekstra` (
  `kode_siswa` int(15) NOT NULL,
  `kode_ekstra` int(15) NOT NULL,
  `nilai_ekstra` enum('A','B','C','D') NOT NULL,
  KEY `kode_siswa` (`kode_siswa`),
  KEY `kode_ekstra` (`kode_ekstra`),
  KEY `nilai_ekstra` (`nilai_ekstra`),
  CONSTRAINT `nilai_ekstra_ibfk_1` FOREIGN KEY (`kode_siswa`) REFERENCES `detail_siswa` (`kode_siswa`),
  CONSTRAINT `nilai_ekstra_ibfk_2` FOREIGN KEY (`kode_ekstra`) REFERENCES `detail_siswa` (`kode_ekstra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.nilai_ekstra: ~10 rows (approximately)
/*!40000 ALTER TABLE `nilai_ekstra` DISABLE KEYS */;
INSERT INTO `nilai_ekstra` (`kode_siswa`, `kode_ekstra`, `nilai_ekstra`) VALUES
	(101, 408, 'A'),
	(102, 401, 'A'),
	(103, 407, 'B'),
	(104, 407, 'B'),
	(105, 401, 'B'),
	(106, 403, 'A'),
	(107, 402, 'B'),
	(108, 404, 'A'),
	(109, 408, 'A'),
	(110, 408, 'B');
/*!40000 ALTER TABLE `nilai_ekstra` ENABLE KEYS */;

-- Dumping structure for table layanan desa.sik
CREATE TABLE IF NOT EXISTS `sik` (
  `id_sik` int(11) NOT NULL AUTO_INCREMENT,
  `id_data` int(11) NOT NULL DEFAULT '0',
  `acara` varchar(50) DEFAULT NULL,
  `tempp` varchar(50) DEFAULT NULL,
  `tgll` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_sik`),
  KEY `FK_sik_data` (`id_data`),
  CONSTRAINT `FK_sik_data` FOREIGN KEY (`id_data`) REFERENCES `data` (`id_data`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.sik: ~1 rows (approximately)
/*!40000 ALTER TABLE `sik` DISABLE KEYS */;
INSERT INTO `sik` (`id_sik`, `id_data`, `acara`, `tempp`, `tgll`) VALUES
	(1, 1, 'Peresmian', 'Balai Desa Jatitengah', '2023-06-27'),
	(2, 2, 'Makan Malam', 'Balai Desa Jatitengah', '2023-06-30');
/*!40000 ALTER TABLE `sik` ENABLE KEYS */;

-- Dumping structure for table layanan desa.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` int(15) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB AUTO_INCREMENT=10011 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.siswa: ~10 rows (approximately)
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`nis`, `nama_siswa`, `alamat`, `jenis_kelamin`, `no_hp`) VALUES
	(10001, 'Ahmad Yusuf', 'Jl. Dewi Sartika 14', 'L', '08216702288'),
	(10002, 'Muhammad Farhan', 'Jl. Wilis 12', 'L', '0856789312'),
	(10003, 'Elok Puspita', 'Jl. Gajah Mada 1', 'P', '0812345876'),
	(10004, 'Dewi Muthmainah', 'Jl. Dewi Sartika 25', 'P', '0876789312'),
	(10005, 'Ahmad Jauhari', 'Jl. Hamid Rusdi 41', 'L', '08785142369'),
	(10006, 'Mentari Ayunda', 'Jl. Patimura 10', 'P', '081330010166'),
	(10007, 'Dita Hapsari', 'Jl. Cendana 98', 'P', '089675839108'),
	(10008, 'Aulian Irawan', 'Jl. Gajah Mada 31', 'L', '08996906443'),
	(10009, 'Muhammad Haziq Thahir', 'Jl. Bejo 67', 'L', '083843069913'),
	(10010, 'Putri Kencana Dewi', 'Jl. Agus Salim 17', 'P', '082118325367');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- Dumping structure for table layanan desa.skck
CREATE TABLE IF NOT EXISTS `skck` (
  `id_skck` int(11) NOT NULL AUTO_INCREMENT,
  `id_data` int(11) DEFAULT '0',
  PRIMARY KEY (`id_skck`) USING BTREE,
  KEY `FK__data` (`id_data`),
  CONSTRAINT `FK__data` FOREIGN KEY (`id_data`) REFERENCES `data` (`id_data`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.skck: ~2 rows (approximately)
/*!40000 ALTER TABLE `skck` DISABLE KEYS */;
INSERT INTO `skck` (`id_skck`, `id_data`) VALUES
	(1, 3),
	(2, 3);
/*!40000 ALTER TABLE `skck` ENABLE KEYS */;

-- Dumping structure for table layanan desa.skd
CREATE TABLE IF NOT EXISTS `skd` (
  `id_skd` int(11) NOT NULL AUTO_INCREMENT,
  `id_data` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_skd`),
  KEY `FK_skd_data` (`id_data`),
  CONSTRAINT `FK_skd_data` FOREIGN KEY (`id_data`) REFERENCES `data` (`id_data`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.skd: ~1 rows (approximately)
/*!40000 ALTER TABLE `skd` DISABLE KEYS */;
INSERT INTO `skd` (`id_skd`, `id_data`) VALUES
	(1, 2);
/*!40000 ALTER TABLE `skd` ENABLE KEYS */;

-- Dumping structure for table layanan desa.sktm
CREATE TABLE IF NOT EXISTS `sktm` (
  `id_sktm` int(11) NOT NULL AUTO_INCREMENT,
  `id_data` int(11) NOT NULL DEFAULT '0',
  `namaa` varchar(50) NOT NULL DEFAULT '0',
  `nis` varchar(50) NOT NULL DEFAULT '0',
  `sekolah` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sktm`),
  KEY `FK_sktm_data` (`id_data`),
  CONSTRAINT `FK_sktm_data` FOREIGN KEY (`id_data`) REFERENCES `data` (`id_data`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.sktm: ~1 rows (approximately)
/*!40000 ALTER TABLE `sktm` DISABLE KEYS */;
INSERT INTO `sktm` (`id_sktm`, `id_data`, `namaa`, `nis`, `sekolah`) VALUES
	(1, 2, 'Roudlotus Solikhin', '26000230231', 'SDN Jatitengah 01');
/*!40000 ALTER TABLE `sktm` ENABLE KEYS */;

-- Dumping structure for table layanan desa.usaha
CREATE TABLE IF NOT EXISTS `usaha` (
  `id_usaha` int(11) NOT NULL AUTO_INCREMENT,
  `id_data` int(11) NOT NULL DEFAULT '0',
  `usaha` varchar(50) DEFAULT '0',
  `deskripsi` varchar(50) DEFAULT '0',
  `sejak` varchar(50) DEFAULT '0',
  `al` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id_usaha`),
  KEY `FK_usaha_data` (`id_data`),
  CONSTRAINT `FK_usaha_data` FOREIGN KEY (`id_data`) REFERENCES `data` (`id_data`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.usaha: ~1 rows (approximately)
/*!40000 ALTER TABLE `usaha` DISABLE KEYS */;
INSERT INTO `usaha` (`id_usaha`, `id_data`, `usaha`, `deskripsi`, `sejak`, `al`) VALUES
	(1, 2, 'Foto Copy', 'Menyediakan jasa foto copy ', '10 Tahun', 'Desa Jatitengah');
/*!40000 ALTER TABLE `usaha` ENABLE KEYS */;

-- Dumping structure for table layanan desa.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
	(1, 'rizal amirudin', 'rizal', '1', 'warga'),
	(9, 'ronaldo', 'ronal', '1', 'admin'),
	(10, 'haha', 'haha', '1', 'warga'),
	(11, 'Muhamad Aziz', 'aziz', '1', 'warga'),
	(12, 'rahel', 'rahel', '1', 'admin'),
	(13, 'a', 'a', 'a', 'warga'),
	(14, 'a', 'a', 'a', 'warga');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table layanan desa.wali_siswa
CREATE TABLE IF NOT EXISTS `wali_siswa` (
  `kode_wali` int(15) NOT NULL AUTO_INCREMENT,
  `nama_wali` varchar(225) NOT NULL,
  `alamat_wali` varchar(225) NOT NULL,
  `no_hp_wali` bigint(50) NOT NULL,
  PRIMARY KEY (`kode_wali`)
) ENGINE=InnoDB AUTO_INCREMENT=30011 DEFAULT CHARSET=latin1;

-- Dumping data for table layanan desa.wali_siswa: ~10 rows (approximately)
/*!40000 ALTER TABLE `wali_siswa` DISABLE KEYS */;
INSERT INTO `wali_siswa` (`kode_wali`, `nama_wali`, `alamat_wali`, `no_hp_wali`) VALUES
	(30001, 'Mahfud Al-Katiri', 'Jl. Dewi Sartika 14', 81222691989),
	(30002, 'Agus Joko Susilo', 'Jl. Wilis 12', 82177775741),
	(30003, 'Wahyu Nugroho', 'Jl. Gajah Mada 1', 83133616363),
	(30004, 'Pujianto', 'Jl. Dewi Sartika 25', 87700940944),
	(30005, 'Muhammad Ruyat', 'Jl. Hamid Rusdi 41', 82258842067),
	(30006, 'Aris Budianto', 'Jl. Patimura 10', 85399953277),
	(30007, 'Abdullah', 'Jl. Cendana 98', 82393145965),
	(30008, 'Sutrisno', 'Jl. Gajah Mada 31', 85640681456),
	(30009, 'Imam Rifai', 'Jl. Bejo 67', 83133057625),
	(30010, 'Ahmad Hidayat', 'Jl. Agus Salim 17', 87748464637);
/*!40000 ALTER TABLE `wali_siswa` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
