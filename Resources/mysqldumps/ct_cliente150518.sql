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

 Date: 15/05/2018 18:04:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ct_cliente
-- ----------------------------
DROP TABLE IF EXISTS `ct_cliente`;
CREATE TABLE `ct_cliente` (
  `pk_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCliente` varchar(150) NOT NULL,
  `correoCliente` varchar(100) NOT NULL,
  `telefonoCliente` varchar(50) NOT NULL,
  `creditoCliente` int(11) NOT NULL,
  `fingresoCliente` date NOT NULL,
  `colorCliente` varchar(20) NOT NULL,
  `prendasCliente` int(11) NOT NULL,
  `precioPrenda` varchar(255) NOT NULL,
  `nosotrosCliente` varchar(50) NOT NULL,
  `vendedorCliente` varchar(150) NOT NULL,
  PRIMARY KEY (`pk_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_cliente
-- ----------------------------
BEGIN;
INSERT INTO `ct_cliente` VALUES (22, 'Red', 'red@', '1234567', 30, '2018-04-06', '#ff2600', 100, '1', 'Asesor de Ventas', 'Asesor de Ventas');
INSERT INTO `ct_cliente` VALUES (23, 'Privilegio', 'privilegio@', '12345678', 30, '2018-04-12', '#929000', 5000, '1', 'Asesor de Ventas', 'Asesor de Ventas');
INSERT INTO `ct_cliente` VALUES (24, 'Liberty', 'liberty@', '1345678', 20, '2018-04-09', '#73fdff', 5000, '10', 'Referido', 'Referido');
INSERT INTO `ct_cliente` VALUES (25, 'Dos Banderas', 'banderas@', '567890123', 10, '2018-04-10', '#9437ff', 1500, '1', 'Referido', 'Referido');
INSERT INTO `ct_cliente` VALUES (26, 'Carey', 'carey@', '34567890', 18, '2018-04-24', '#ff8ad8', 1234, '20', 'Medios Publicitarios', 'Medios Publicitarios');
INSERT INTO `ct_cliente` VALUES (27, 'Diseñadora', 'diseñadora ', 'dise@', 30, '2018-04-03', '#0433ff', 6000, '1', 'Asesor de Ventas', 'Asesor de Ventas');
INSERT INTO `ct_cliente` VALUES (30, 'Cliente1', 'cliente@', '456789', 80, '2018-04-10', '#fffb00', 6789, '1', 'Referido', 'Referido');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
