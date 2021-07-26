/*
 Navicat Premium Data Transfer

 Source Server         : MariaDB
 Source Server Type    : MySQL
 Source Server Version : 100129
 Source Host           : localhost:3306
 Source Schema         : db_eppa

 Target Server Type    : MySQL
 Target Server Version : 100129
 File Encoding         : 65001

 Date: 19/05/2021 14:46:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `id_user` varchar(16) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_akses` int NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nip` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `last_login` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  INDEX `username`(`username`) USING BTREE,
  INDEX `id_akses`(`id_akses`) USING BTREE,
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `tbl_akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('kfOB4iuP5lE01nab', 1, 'Admin', 'e10adc3949ba59abbe56e057f20f883e', 'Admin PN Tamiang Layang', NULL, 'simpel@simpel.com', '2020-08-21 00:00:00', NULL, '2021-01-27 04:54:22');
INSERT INTO `admin` VALUES ('kSaCrD4AVZpy3zJP', 2, 'AdminEppa', 'e10adc3949ba59abbe56e057f20f883e', 'Dede Almustaqim', '1962042019980310001', 'simpel@simpel.com', '2020-08-21 00:00:00', '2021-01-06 09:28:49', '2021-05-19 09:19:35');

-- ----------------------------
-- Table structure for tbl_akses
-- ----------------------------
DROP TABLE IF EXISTS `tbl_akses`;
CREATE TABLE `tbl_akses`  (
  `id_akses` int NOT NULL AUTO_INCREMENT,
  `hak_akses` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_akses`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_akses
-- ----------------------------
INSERT INTO `tbl_akses` VALUES (1, 'Superadmin');
INSERT INTO `tbl_akses` VALUES (2, 'Adminstrator');
INSERT INTO `tbl_akses` VALUES (3, 'Verifikator');
INSERT INTO `tbl_akses` VALUES (4, 'Operator');
INSERT INTO `tbl_akses` VALUES (5, 'Kejaksaan');

-- ----------------------------
-- Table structure for tbl_bln
-- ----------------------------
DROP TABLE IF EXISTS `tbl_bln`;
CREATE TABLE `tbl_bln`  (
  `id_bln` int NOT NULL AUTO_INCREMENT,
  `nm_bln` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_awal` datetime(0) NULL DEFAULT NULL,
  `tgl_akhir` datetime(0) NULL DEFAULT NULL,
  `tgl_awal_verif` datetime(0) NULL DEFAULT NULL,
  `tgl_akhir_verif` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_bln`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_bln
-- ----------------------------
INSERT INTO `tbl_bln` VALUES (1, 'Januari', '2021-05-18 01:00:00', '2021-05-20 02:00:00', '2021-05-10 14:00:21', '2021-05-20 15:00:00');
INSERT INTO `tbl_bln` VALUES (2, 'Februari', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_bln` VALUES (3, 'Maret', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_bln` VALUES (4, 'April', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_bln` VALUES (5, 'Mei', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_bln` VALUES (6, 'Juni', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_bln` VALUES (7, 'Juli', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_bln` VALUES (8, 'Agustus', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_bln` VALUES (9, 'September', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_bln` VALUES (10, 'Oktober', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_bln` VALUES (11, 'November', NULL, NULL, NULL, NULL);
INSERT INTO `tbl_bln` VALUES (12, 'Desember', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tbl_indikator
-- ----------------------------
DROP TABLE IF EXISTS `tbl_indikator`;
CREATE TABLE `tbl_indikator`  (
  `id_indikator` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_pkp` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `indikator` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai` decimal(4, 2) NULL DEFAULT 0.00,
  `tahun` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `urut` int NOT NULL AUTO_INCREMENT,
  `stts_indikator` int NULL DEFAULT 0,
  `jmlh_keg` int NULL DEFAULT 0,
  PRIMARY KEY (`urut`) USING BTREE,
  INDEX `id_bln`(`id_indikator`) USING BTREE,
  INDEX `id_pkp`(`id_pkp`) USING BTREE,
  CONSTRAINT `id_pkp` FOREIGN KEY (`id_pkp`) REFERENCES `tbl_pkp` (`id_pkp`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_indikator
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jabatan`;
CREATE TABLE `tbl_jabatan`  (
  `id_jbt` int NOT NULL AUTO_INCREMENT,
  `nm_jbt` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_urut_jbt` int NULL DEFAULT NULL,
  `level_jbt` int NULL DEFAULT NULL,
  INDEX `id_jbt`(`id_jbt`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_jabatan
-- ----------------------------
INSERT INTO `tbl_jabatan` VALUES (1, 'Ketua ', 1, 1);
INSERT INTO `tbl_jabatan` VALUES (2, 'Wakil Ketua', 2, 2);
INSERT INTO `tbl_jabatan` VALUES (3, 'Hakim', 3, 3);
INSERT INTO `tbl_jabatan` VALUES (4, 'Panitera', 4, 4);
INSERT INTO `tbl_jabatan` VALUES (5, 'Sekretaris', 5, 5);
INSERT INTO `tbl_jabatan` VALUES (6, 'Panitera Muda Perdata', 6, 6);
INSERT INTO `tbl_jabatan` VALUES (7, 'Panitera Muda Pidana', 7, 7);
INSERT INTO `tbl_jabatan` VALUES (8, 'Panitera Muda Hukum', 8, 8);
INSERT INTO `tbl_jabatan` VALUES (9, 'Kasubbag Umum dan keuanagan', 9, 9);
INSERT INTO `tbl_jabatan` VALUES (10, 'Kasubbag Kepegawaian, Organisasi dan Tata Laksana', 10, 10);
INSERT INTO `tbl_jabatan` VALUES (11, 'Kasubbag Perencanaan, TI dan Pelaporan', 11, 11);
INSERT INTO `tbl_jabatan` VALUES (12, 'Panitera Pengganti', 12, 12);
INSERT INTO `tbl_jabatan` VALUES (13, 'Staf Pelaksana/PTT', 13, 13);

-- ----------------------------
-- Table structure for tbl_keg
-- ----------------------------
DROP TABLE IF EXISTS `tbl_keg`;
CREATE TABLE `tbl_keg`  (
  `id_pkp` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_keg` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_indikator` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tahun` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keg` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ak_target` decimal(5, 2) NULL DEFAULT NULL,
  `output_target` decimal(5, 2) NULL DEFAULT NULL,
  `satuan_target` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mutu_target` decimal(5, 2) NULL DEFAULT NULL,
  `ak_real` decimal(5, 2) NULL DEFAULT NULL,
  `output_real` decimal(5, 2) NULL DEFAULT NULL,
  `satuan_real` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `mutu_real` decimal(5, 2) NULL DEFAULT NULL,
  `mutu_kuant_kual` decimal(5, 2) NULL DEFAULT NULL,
  `nilai_kin_keg` decimal(5, 2) NULL DEFAULT NULL,
  `urut_keg` int NOT NULL AUTO_INCREMENT,
  `stts_keg` int NULL DEFAULT 0,
  `id_bln` int NULL DEFAULT NULL,
  PRIMARY KEY (`urut_keg`) USING BTREE,
  INDEX `tbl_keg_ibfk_1`(`id_indikator`) USING BTREE,
  INDEX `id_pkp`(`id_pkp`) USING BTREE,
  CONSTRAINT `tbl_keg_ibfk_1` FOREIGN KEY (`id_indikator`) REFERENCES `tbl_indikator` (`id_indikator`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_keg_ibfk_2` FOREIGN KEY (`id_pkp`) REFERENCES `tbl_pkp` (`id_pkp`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_keg
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_nilai_pkp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_nilai_pkp`;
CREATE TABLE `tbl_nilai_pkp`  (
  `id_nilai_pkp` int NOT NULL AUTO_INCREMENT,
  `id_user` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jan` decimal(4, 2) NULL DEFAULT 0.00,
  `feb` decimal(4, 2) NULL DEFAULT 0.00,
  `mar` decimal(4, 2) NULL DEFAULT 0.00,
  `apr` decimal(4, 2) NULL DEFAULT 0.00,
  `mei` decimal(4, 2) NULL DEFAULT 0.00,
  `jun` decimal(4, 2) NULL DEFAULT 0.00,
  `jul` decimal(4, 2) NULL DEFAULT 0.00,
  `ags` decimal(4, 2) NULL DEFAULT 0.00,
  `sep` decimal(4, 2) NULL DEFAULT 0.00,
  `okt` decimal(4, 2) NULL DEFAULT 0.00,
  `nov` decimal(4, 2) NULL DEFAULT 0.00,
  `des` decimal(4, 2) NULL DEFAULT 0.00,
  `tahun` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_nilai_pkp`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 112 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_nilai_pkp
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_pkp
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pkp`;
CREATE TABLE `tbl_pkp`  (
  `id_pkp` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_bln` int NULL DEFAULT NULL,
  `id_user` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nilai_pkp` decimal(5, 2) NULL DEFAULT 0.00,
  `tahun` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `stts_pkp` int NULL DEFAULT 0,
  INDEX `id_bln`(`id_bln`) USING BTREE,
  INDEX `id_pkp`(`id_pkp`) USING BTREE,
  CONSTRAINT `tbl_pkp_ibfk_1` FOREIGN KEY (`id_bln`) REFERENCES `tbl_bln` (`id_bln`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_pkp
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_user` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_akses` int NOT NULL,
  `username` varchar(18) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `last_login` timestamp(0) NULL DEFAULT NULL,
  `urut_user` int NOT NULL AUTO_INCREMENT,
  `id_penilai` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_jbt` int NULL DEFAULT NULL,
  `penilai` int NOT NULL DEFAULT 0,
  `img` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pangkat_gol` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`urut_user`, `id_user`) USING BTREE,
  INDEX `username`(`username`) USING BTREE,
  INDEX `id_akses`(`id_akses`) USING BTREE,
  INDEX `id_user`(`id_user`) USING BTREE,
  INDEX `id_jbt`(`id_jbt`) USING BTREE,
  CONSTRAINT `tbl_user_ibfk_1` FOREIGN KEY (`id_jbt`) REFERENCES `tbl_jabatan` (`id_jbt`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------

-- ----------------------------
-- Triggers structure for table tbl_keg
-- ----------------------------
DROP TRIGGER IF EXISTS `insert`;
delimiter ;;
CREATE TRIGGER `insert` AFTER INSERT ON `tbl_keg` FOR EACH ROW BEGIN
update tbl_indikator set jmlh_keg = jmlh_keg + 1
WHERE id_indikator = New.id_indikator;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tbl_keg
-- ----------------------------
DROP TRIGGER IF EXISTS `delete`;
delimiter ;;
CREATE TRIGGER `delete` AFTER DELETE ON `tbl_keg` FOR EACH ROW BEGIN
update tbl_indikator set jmlh_keg = jmlh_keg - 1
WHERE id_indikator = Old.id_indikator;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
