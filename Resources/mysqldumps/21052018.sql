/*
 Navicat MySQL Data Transfer

 Source Server         : Local Server
 Source Server Type    : MySQL
 Source Server Version : 50635
 Source Host           : localhost:8889
 Source Schema         : Fitco

 Target Server Type    : MySQL
 Target Server Version : 50635
 File Encoding         : 65001

 Date: 21/05/2018 14:43:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ct_CuentasxPagar
-- ----------------------------
DROP TABLE IF EXISTS `ct_CuentasxPagar`;
CREATE TABLE `ct_CuentasxPagar` (
  `pk_cuentasPagar` int(11) NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `montoPago` decimal(30,2) NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `pagado` decimal(30,2) NOT NULL,
  `factura` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_cuentasPagar`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_CuentasxPagar
-- ----------------------------
BEGIN;
INSERT INTO `ct_CuentasxPagar` VALUES (1, 'proveedor nuevo', 'ejemplo', 1236.50, '2018-05-18', 1000.00, 'A450');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
