/*
 Navicat Premium Data Transfer

 Source Server         : Desafio2
 Source Server Type    : MariaDB
 Source Server Version : 100309
 Source Host           : localhost:7007
 Source Schema         : Desafio2

 Target Server Type    : MariaDB
 Target Server Version : 100309
 File Encoding         : 65001

 Date: 18/11/2020 09:28:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for asignacion
-- ----------------------------
DROP TABLE IF EXISTS `asignacion`;
CREATE TABLE `asignacion` (
  `dni` varchar(10) NOT NULL,
  `id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of asignacion
-- ----------------------------
BEGIN;
INSERT INTO `asignacion` VALUES ('00000000X', 2);
COMMIT;

-- ----------------------------
-- Table structure for rol
-- ----------------------------
DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id` tinyint(1) NOT NULL,
  `des` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of rol
-- ----------------------------
BEGIN;
INSERT INTO `rol` VALUES (0, 'alumno');
INSERT INTO `rol` VALUES (1, 'profesor');
INSERT INTO `rol` VALUES (2, 'administrador');
COMMIT;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `dni` varchar(10) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `Activado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
BEGIN;
INSERT INTO `usuarios` VALUES ('00000000X', 'admin@admin.com', 'Admin1234', 'nombre', 'apellido', 1);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
