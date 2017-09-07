/*
 Navicat MySQL Data Transfer

 Source Server         : Local_Server
 Source Server Type    : MySQL
 Source Server Version : 50633
 Source Host           : localhost
 Source Database       : fitcoControl

 Target Server Type    : MySQL
 Target Server Version : 50633
 File Encoding         : utf-8

 Date: 09/07/2017 10:21:46 AM
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `ct_programacion`
-- ----------------------------
DROP TABLE IF EXISTS `ct_programacion`;
CREATE TABLE `ct_programacion` (
  `pk_programacion` int(30) NOT NULL AUTO_INCREMENT,
  `fk_cliente` varchar(30) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `metaDiaria` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`pk_programacion`,`fk_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `ct_programacion`
-- ----------------------------
BEGIN;
INSERT INTO `ct_programacion` VALUES ('1', '7', '2017-09-11', '2017-09-30', '43'), ('2', '11', '2017-09-13', '2017-09-27', '400'), ('3', '7', '2017-09-12', '2017-09-16', '12'), ('4', '7', '2017-09-12', '2017-09-16', '12'), ('5', '10', '2017-09-12', '2017-09-17', '12'), ('6', '9', '2017-09-04', '2017-09-10', '35'), ('7', '12', '2017-09-30', '2017-10-31', '38');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
