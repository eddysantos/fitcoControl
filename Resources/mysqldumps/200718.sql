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

 Date: 20/07/2018 15:32:08
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
) ENGINE=InnoDB AUTO_INCREMENT=897 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ct_cliente
-- ----------------------------
DROP TABLE IF EXISTS `ct_cliente`;
CREATE TABLE `ct_cliente` (
  `pk_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCliente` varchar(150) NOT NULL,
  `nombreContacto` varchar(255) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ct_cobranza
-- ----------------------------
DROP TABLE IF EXISTS `ct_cobranza`;
CREATE TABLE `ct_cobranza` (
  `pk_cobranza` int(11) NOT NULL AUTO_INCREMENT,
  `conceptoPago` varchar(150) NOT NULL,
  `facturaCobranza` varchar(10) NOT NULL,
  `importeCobranza` decimal(30,2) NOT NULL,
  `vencimientoCobranza` date NOT NULL,
  `fechaEntrega` date NOT NULL,
  `fk_cliente` varchar(50) NOT NULL,
  PRIMARY KEY (`pk_cobranza`)
) ENGINE=InnoDB AUTO_INCREMENT=424 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ct_corte
-- ----------------------------
DROP TABLE IF EXISTS `ct_corte`;
CREATE TABLE `ct_corte` (
  `pk_corte` int(11) NOT NULL AUTO_INCREMENT,
  `fk_programacion` varchar(250) NOT NULL,
  `tiempoActual` date NOT NULL,
  `horaActual` time NOT NULL,
  `Notas` varchar(250) NOT NULL,
  PRIMARY KEY (`pk_corte`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ct_envios
-- ----------------------------
DROP TABLE IF EXISTS `ct_envios`;
CREATE TABLE `ct_envios` (
  `pk_envios` int(11) NOT NULL AUTO_INCREMENT,
  `fk_programacion` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fechaEnvio` date NOT NULL,
  `horaEnvio` time NOT NULL,
  `notas` varchar(250) NOT NULL,
  PRIMARY KEY (`pk_envios`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ct_linea
-- ----------------------------
DROP TABLE IF EXISTS `ct_linea`;
CREATE TABLE `ct_linea` (
  `pk_linea` int(11) NOT NULL AUTO_INCREMENT,
  `linea` varchar(50) NOT NULL,
  `operacion` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `avance` decimal(11,0) NOT NULL,
  `eficiencia` int(11) NOT NULL,
  `meta` int(11) NOT NULL,
  `prod1` int(11) NOT NULL,
  `prod2` int(11) NOT NULL,
  `prod3` int(11) NOT NULL,
  `prod4` int(11) NOT NULL,
  `prod5` int(11) NOT NULL,
  `prod6` int(11) NOT NULL,
  `prod7` int(11) NOT NULL,
  `prod8` int(11) NOT NULL,
  `prod9` int(11) NOT NULL,
  `prod10` int(11) NOT NULL,
  PRIMARY KEY (`pk_linea`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ct_materiales
-- ----------------------------
DROP TABLE IF EXISTS `ct_materiales`;
CREATE TABLE `ct_materiales` (
  `pk_material` int(11) NOT NULL AUTO_INCREMENT,
  `material` varchar(100) NOT NULL,
  `fechaCompra` date NOT NULL,
  `numeroSerie` varchar(50) NOT NULL,
  `personaEntrega` varchar(100) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `condicionEntrega` varchar(250) NOT NULL,
  `precioMaterial` varchar(100) NOT NULL,
  PRIMARY KEY (`pk_material`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ct_nomina
-- ----------------------------
DROP TABLE IF EXISTS `ct_nomina`;
CREATE TABLE `ct_nomina` (
  `pk_nomina` int(11) NOT NULL AUTO_INCREMENT,
  `fechaNomina` date NOT NULL,
  `dineroNomina` varchar(255) NOT NULL,
  `horasExtras` int(11) NOT NULL,
  `dineroHoras` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_nomina`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ct_pagos
-- ----------------------------
DROP TABLE IF EXISTS `ct_pagos`;
CREATE TABLE `ct_pagos` (
  `pk_pagos` int(11) NOT NULL AUTO_INCREMENT,
  `fk_cobranza` int(11) NOT NULL,
  `fechaPago` date NOT NULL,
  `importePago` decimal(30,2) NOT NULL,
  PRIMARY KEY (`pk_pagos`)
) ENGINE=InnoDB AUTO_INCREMENT=401 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ct_produccion
-- ----------------------------
DROP TABLE IF EXISTS `ct_produccion`;
CREATE TABLE `ct_produccion` (
  `pk_produccion` int(11) NOT NULL AUTO_INCREMENT,
  `fk_programacion` varchar(50) NOT NULL,
  `fechaIntroduccion` date NOT NULL,
  `metaProduccion` int(11) NOT NULL,
  `cantidadProduccion` int(11) NOT NULL,
  `notas` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_produccion`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ct_program
-- ----------------------------
DROP TABLE IF EXISTS `ct_program`;
CREATE TABLE `ct_program` (
  `pk_programacion` int(11) NOT NULL AUTO_INCREMENT,
  `fk_cliente` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `piezasRequeridas` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  PRIMARY KEY (`pk_programacion`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for ct_programacion
-- ----------------------------
DROP TABLE IF EXISTS `ct_programacion`;
CREATE TABLE `ct_programacion` (
  `pk_programacion` int(30) NOT NULL AUTO_INCREMENT,
  `fk_cliente` varchar(30) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `piezasRequeridas` int(11) NOT NULL,
  `horaEntrega` time DEFAULT NULL,
  PRIMARY KEY (`pk_programacion`,`fk_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ct_seccionCorte
-- ----------------------------
DROP TABLE IF EXISTS `ct_seccionCorte`;
CREATE TABLE `ct_seccionCorte` (
  `pk_corte` int(11) NOT NULL AUTO_INCREMENT,
  `clienteCorte` varchar(255) NOT NULL,
  `fechaCorte` date NOT NULL,
  `fhinicio_prog` time NOT NULL,
  `fhfinal_prog` time NOT NULL,
  `fhinicio_real` time NOT NULL,
  `fhfinal_real` time NOT NULL,
  `Notas` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_corte`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for ct_ventas
-- ----------------------------
DROP TABLE IF EXISTS `ct_ventas`;
CREATE TABLE `ct_ventas` (
  `pk_ventas` int(11) NOT NULL AUTO_INCREMENT,
  `nombreCliente` varchar(250) NOT NULL,
  `nombreVendedor` varchar(250) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaBaja` date NOT NULL,
  `precioXprenda` varchar(250) NOT NULL,
  `acuerdoPago` varchar(250) NOT NULL,
  `numeroPrendas` int(11) NOT NULL,
  PRIMARY KEY (`pk_ventas`),
  UNIQUE KEY `idx_ct_ventas_pk_ventas` (`pk_ventas`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for empleados
-- ----------------------------
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados` (
  `pk_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `fk_linea` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `numeroEmpleado` varchar(50) NOT NULL,
  PRIMARY KEY (`pk_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for operacion
-- ----------------------------
DROP TABLE IF EXISTS `operacion`;
CREATE TABLE `operacion` (
  `pk_operacion` int(11) NOT NULL AUTO_INCREMENT,
  `operacion` varchar(250) NOT NULL,
  PRIMARY KEY (`pk_operacion`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `pk_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(50) NOT NULL,
  `apellidosUsuario` varchar(50) NOT NULL,
  `correoUsuario` varchar(50) NOT NULL,
  `departamentoUsuario` varchar(50) NOT NULL,
  `puestoUsuario` varchar(50) NOT NULL,
  `usrUsuario` varchar(50) NOT NULL,
  `contraUsuario` varchar(50) NOT NULL,
  `privilegiosUsuario` varchar(50) NOT NULL,
  `cobranza_ver` varchar(50) NOT NULL,
  `cobranza_editar` varchar(50) NOT NULL,
  `produccion_ver` varchar(50) NOT NULL,
  `produccion_editar` varchar(50) NOT NULL,
  `cliente_ver` varchar(50) NOT NULL,
  `cliente_editar` varchar(50) NOT NULL,
  `verVentas` varchar(45) NOT NULL,
  `editarVentas` varchar(45) NOT NULL,
  PRIMARY KEY (`pk_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Procedure structure for pruebaEnvios
-- ----------------------------
DROP PROCEDURE IF EXISTS `pruebaEnvios`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `pruebaEnvios`(v_texto VARCHAR(45))
BEGIN
  DROP TEMPORARY TABLE IF EXISTS tmp_programacion;
	CREATE TEMPORARY TABLE tmp_programacion AS (
	
	SELECT

		p.pk_programacion idEnvio,
		p.piezasRequeridas piezas,

		c.nombreCliente cliente,
		c.colorCliente color,

		(
			SELECT CONCAT(DATE_FORMAT(fechaEnvio,'%d-%m-%Y'),'&nbsp&nbsp',env.horaEnvio)
			FROM ct_envios env
			WHERE p.pk_programacion = env.fk_programacion
			ORDER BY env.fechaEnvio DESC, env.horaEnvio DESC
			LIMIT 1
		) AS Ultimo_Envio,

		(
			SELECT env.descripcion
			FROM ct_envios env
			WHERE p.pk_programacion = env.fk_programacion
			ORDER BY env.fechaEnvio DESC, env.horaEnvio DESC
			LIMIT 1
		) AS status_envio,

		(
			SELECT env.notas
			FROM ct_envios env
			WHERE p.pk_programacion = env.fk_programacion
			ORDER BY env.fechaEnvio DESC, env.horaEnvio DESC
			LIMIT 1
		) AS notas
		FROM ct_program p

		LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
	
);
	
SELECT 
	* 
FROM tmp_programacion 

WHERE

			cliente LIKE concat('%', v_texto, '%')
OR		piezas LIKE concat('%', v_texto, '%')
OR		status_envio LIKE concat('%', v_texto, '%')
OR		Ultimo_Envio LIKE concat('%', v_texto, '%')
OR		notas LIKE concat('%', v_texto, '%');
	
END;
;;
delimiter ;

-- ----------------------------
-- Procedure structure for tablaEnvios
-- ----------------------------
DROP PROCEDURE IF EXISTS `tablaEnvios`;
delimiter ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tablaEnvios`(v_texto VARCHAR(45))
BEGIN
  DROP TEMPORARY TABLE IF EXISTS tmp_program;
	CREATE TEMPORARY TABLE tmp_program AS (
	
	SELECT

		p.pk_programacion idEnvio,
		p.piezasRequeridas piezas,

		c.nombreCliente cliente,
		c.colorCliente color,

		(
			SELECT CONCAT(DATE_FORMAT(fechaEnvio,'%d-%m-%Y'),'&nbsp&nbsp',env.horaEnvio)
			FROM ct_envios env
			WHERE p.pk_programacion = env.fk_programacion
			ORDER BY env.fechaEnvio DESC, env.horaEnvio DESC
			LIMIT 1
		) AS Ultimo_Envio,

		(
			SELECT env.descripcion
			FROM ct_envios env
			WHERE p.pk_programacion = env.fk_programacion
			ORDER BY env.fechaEnvio DESC, env.horaEnvio DESC
			LIMIT 1
		) AS status_envio,

		(
			SELECT env.notas
			FROM ct_envios env
			WHERE p.pk_programacion = env.fk_programacion
			ORDER BY env.fechaEnvio DESC, env.horaEnvio DESC
			LIMIT 1
		) AS notas
		FROM ct_program p

		LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
	
);
	
SELECT 
	* 
FROM tmp_program

WHERE

			cliente = v_texto
OR		piezas = v_texto
OR		status_envio = v_texto
OR		Ultimo_Envio = v_texto
OR		notas = v_texto;
	
END;
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
