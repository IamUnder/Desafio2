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

 Date: 23/11/2020 10:23:22
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
-- Table structure for preguntas
-- ----------------------------
DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE `preguntas` (
  `idPregunta` int(255) NOT NULL AUTO_INCREMENT,
  `idExamen` int(255) NOT NULL,
  `pregunta` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`idPregunta`,`idExamen`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of preguntas
-- ----------------------------
BEGIN;
INSERT INTO `preguntas` VALUES (1, -1, 'Ejemplo1');
INSERT INTO `preguntas` VALUES (2, -1, 'Ejemplo numerica');
INSERT INTO `preguntas` VALUES (3, -1, 'Ejemplo seleccion 1');
INSERT INTO `preguntas` VALUES (4, -1, 'Ejemplo varias selecciones');
INSERT INTO `preguntas` VALUES (5, -1, 'ejemplo numerico 2');
INSERT INTO `preguntas` VALUES (6, -1, 'Ejemplo3');
INSERT INTO `preguntas` VALUES (7, -1, 'ejemplo 4');
COMMIT;

-- ----------------------------
-- Table structure for respuestasCorrectas
-- ----------------------------
DROP TABLE IF EXISTS `respuestasCorrectas`;
CREATE TABLE `respuestasCorrectas` (
  `idPregunta` int(255) NOT NULL,
  `tipo` varchar(40) DEFAULT NULL,
  `respuesta1` varchar(2000) DEFAULT NULL,
  `respuesta2` varchar(2000) NOT NULL,
  `respuesta3` varchar(2000) NOT NULL,
  `respuesta4` varchar(2000) NOT NULL,
  `respuestaCorrecta` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`idPregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of respuestasCorrectas
-- ----------------------------
BEGIN;
INSERT INTO `respuestasCorrectas` VALUES (1, 'texto', 'Ejemplo', '', '', '', 'Ejemplo');
INSERT INTO `respuestasCorrectas` VALUES (2, 'numerico', '', '', '', '', '');
INSERT INTO `respuestasCorrectas` VALUES (3, 'unaOpcion', '1', '2', '3', '4', '3');
INSERT INTO `respuestasCorrectas` VALUES (4, 'variasOpciones', '1', '2', '3', '4', '3###4###');
INSERT INTO `respuestasCorrectas` VALUES (5, 'numerico', '', '', '', '', '');
INSERT INTO `respuestasCorrectas` VALUES (6, 'numerico', '', '', '', '', '');
INSERT INTO `respuestasCorrectas` VALUES (7, 'numerico', '88', '', '', '', '88');
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
