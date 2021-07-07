/*
 Navicat MySQL Data Transfer

 Source Server         : Global
 Source Server Type    : MySQL
 Source Server Version : 50612
 Source Host           : localhost:3306
 Source Schema         : Fitco

 Target Server Type    : MySQL
 Target Server Version : 50612
 File Encoding         : 65001

 Date: 03/08/2018 10:37:22
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
) ENGINE=InnoDB AUTO_INCREMENT=965 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_CuentasxPagar
-- ----------------------------
BEGIN;
INSERT INTO `ct_CuentasxPagar` VALUES (6, 'H-House', 'Tela', 45600.00, '2018-06-06', 45600.00, 'A00123');
INSERT INTO `ct_CuentasxPagar` VALUES (7, 'Biling house', 'Botones', 10000.00, '2018-06-07', 0.00, 'A00124');
INSERT INTO `ct_CuentasxPagar` VALUES (8, 'ADT SECURITY SERVICES SA DE CV', 'SERVICIO DE ALARMA Y MONITOREO', 1219.00, '2018-06-04', 0.00, '13869160');
INSERT INTO `ct_CuentasxPagar` VALUES (9, 'ADT SECURITY SERVICES SA DE CV', 'SERVICIO DE ALARMA Y MONITOREO', 990.06, '2018-06-04', 0.00, '13870200');
INSERT INTO `ct_CuentasxPagar` VALUES (10, 'AT&T COMUNICACIONES', 'SERVICIO DE TELEFONIA ', 599.00, '2018-06-04', 0.00, '151582552');
INSERT INTO `ct_CuentasxPagar` VALUES (11, 'AT&T COMUNICACIONES', 'SERVICIO DE TELEFONIA ', 1218.00, '2018-06-04', 0.00, '151675123');
INSERT INTO `ct_CuentasxPagar` VALUES (12, 'CARTON Y PAPEL DEL HUAJUCO SA DE CV', 'PAPEL PARA TRAZO Y GRAPAS', 1868.06, '2018-06-11', 0.00, '83398');
INSERT INTO `ct_CuentasxPagar` VALUES (13, 'CARTON Y PAPEL DEL HUAJUCO SA DE CV', 'PAPEL PARA TRAZO Y GRAPAS', 1868.06, '2018-07-02', 1868.06, '84122');
INSERT INTO `ct_CuentasxPagar` VALUES (14, 'CIPA FASKOWICH', 'ARRENDAMIENTO DE INMUEBLE', 16468.26, '2018-06-04', 16468.26, '674');
INSERT INTO `ct_CuentasxPagar` VALUES (15, 'COMERCIALIZADORA Y DISTRIBUIDORA CIYD', 'HILO', 1556.26, '2018-06-11', 0.00, '787');
INSERT INTO `ct_CuentasxPagar` VALUES (16, 'COMERCIALIZADORA Y DISTRIBUIDORA CIYD', 'HILO', 3062.52, '2018-07-02', 3062.52, '915');
INSERT INTO `ct_CuentasxPagar` VALUES (17, 'GRUPO EMPRESARIAL CT SA DE CV', 'ETIQUETAS ADHESIVAS', 1143.67, '2018-06-04', 0.00, '23668');
INSERT INTO `ct_CuentasxPagar` VALUES (18, 'GRUPO EMPRESARIAL CT SA DE CV', 'ETIQUETAS ADHESIVAS', 1161.09, '2018-06-18', 0.00, '23772');
INSERT INTO `ct_CuentasxPagar` VALUES (19, 'GRUPO NYLTEX', 'TELA', 11368.00, '2018-08-06', 0.00, '46364');
INSERT INTO `ct_CuentasxPagar` VALUES (20, 'GUNTHER ALBERT ELSER SCHUSSLER', 'MANTENIMIENTO MAQUINARIA', 2569.40, '2018-06-11', 0.00, '180');
INSERT INTO `ct_CuentasxPagar` VALUES (22, 'JOSE ALVARO HINOJOSA GUIJARRO', 'CORTE DE ENTRETELA', 1740.00, '2018-06-04', 0.00, '74');
INSERT INTO `ct_CuentasxPagar` VALUES (23, 'JOSE GERARDO SEPULVEDA', 'REFACCIONES MAQUINARIA', 7564.57, '2018-06-11', 0.00, '1470');
INSERT INTO `ct_CuentasxPagar` VALUES (24, 'JOSE NICOLAS RODRIGUEZ', 'COMISIONES ', 4078.72, '2018-06-04', 0.00, '40');
INSERT INTO `ct_CuentasxPagar` VALUES (25, 'LA DISTRIBUIDORA DE CASIMIRES SA DE CV', 'TELA', 15139.16, '2018-07-02', 0.00, '313390');
INSERT INTO `ct_CuentasxPagar` VALUES (26, 'LIV MEDICAL SA DE CV', 'MEDICAMENTO PARA BOTIQUIN', 1863.59, '2018-06-18', 0.00, '9622');
INSERT INTO `ct_CuentasxPagar` VALUES (27, 'MANUEL DE JESUS CANALES VAQUERA', 'MATERIAL LIMPIEZA', 3072.55, '2018-06-11', 0.00, '455');
INSERT INTO `ct_CuentasxPagar` VALUES (28, 'MANUEL DE JESUS CANALES VAQUERA', 'MATERIAL LIMPIEZA', 3785.87, '2018-07-02', 0.00, '556');
INSERT INTO `ct_CuentasxPagar` VALUES (29, 'MAURICIO FASKOWICH', 'ARRENDAMIENTO DE INMUEBLE', 16468.83, '2018-06-04', 0.00, '2138');
INSERT INTO `ct_CuentasxPagar` VALUES (30, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-06-04', 0.00, '87901');
INSERT INTO `ct_CuentasxPagar` VALUES (31, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-06-11', 0.00, '87937');
INSERT INTO `ct_CuentasxPagar` VALUES (32, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-06-18', 0.00, '88238');
INSERT INTO `ct_CuentasxPagar` VALUES (33, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-06-25', 0.00, '88419');
INSERT INTO `ct_CuentasxPagar` VALUES (34, 'RADIO MOVIL DIPSA SA DE CV', 'SERVICIO DE TELEFONIA ', 329.00, '2018-06-04', 0.00, '57681542');
INSERT INTO `ct_CuentasxPagar` VALUES (36, 'RADIO MOVIL DIPSA SA DE CV', 'SERVICIO DE TELEFONIA ', 329.00, '2018-06-04', 0.00, '57681543');
INSERT INTO `ct_CuentasxPagar` VALUES (37, 'RADIO MOVIL DIPSA SA DE CV', 'SERVICIO DE TELEFONIA ', 329.00, '2018-06-04', 0.00, '57681544');
INSERT INTO `ct_CuentasxPagar` VALUES (38, 'RADIO MOVIL DIPSA SA DE CV', 'SERVICIO DE TELEFONIA ', 329.00, '2018-06-04', 0.00, '57681545');
INSERT INTO `ct_CuentasxPagar` VALUES (39, 'RECOLECTORA DE RESIDUOS COMERCIALES', 'RECOLECCION DE BASURA', 2946.40, '2018-06-04', 0.00, '59137');
INSERT INTO `ct_CuentasxPagar` VALUES (40, 'RECOLECTORA DE RESIDUOS COMERCIALES', 'RECOLECCION DE BASURA', 3236.40, '2018-07-02', 0.00, '60267');
INSERT INTO `ct_CuentasxPagar` VALUES (41, 'RIVERA FERRETERA', 'MANTENIMIENTO DE PLANTA', 448.53, '2018-06-04', 0.00, '30673');
INSERT INTO `ct_CuentasxPagar` VALUES (42, 'RIVERA FERRETERA', 'MANTENIMIENTO DE PLANTA', 1337.01, '2018-06-04', 0.00, '30821');
INSERT INTO `ct_CuentasxPagar` VALUES (43, 'RIVERA FERRETERA', 'MANTENIMIENTO DE PLANTA', 222.87, '2018-06-04', 0.00, '30891');
INSERT INTO `ct_CuentasxPagar` VALUES (44, 'SERVICIOS DE AGUA Y DRENAJE', 'SERVICIO DE AGUA EN PLANTA ', 4270.00, '2018-06-04', 0.00, '4062018');
INSERT INTO `ct_CuentasxPagar` VALUES (45, 'TELEFONOS DE MEXICO', 'SERVICIO DE TELEFONIA E INTERNTET', 1499.00, '2018-06-04', 0.00, '4062018');
INSERT INTO `ct_CuentasxPagar` VALUES (46, 'ZERO BICHOS SA DE CV', 'SERVICIO DE FUMIGACION PLANTA', 1160.00, '2018-06-04', 0.00, '5458');
INSERT INTO `ct_CuentasxPagar` VALUES (47, 'COMISION FEDERAL DE ELECTRICIDAD', 'SERVICIO DE ENERGIA ELECTRICA', 27235.50, '2018-06-25', 27235.50, '275354');
INSERT INTO `ct_CuentasxPagar` VALUES (48, 'COMISION FEDERAL DE ELECTRICIDAD', 'SERVICIO DE ENERGIA ELECTRICA LISBOA', 1052.00, '2018-06-04', 1052.00, '4062018');
INSERT INTO `ct_CuentasxPagar` VALUES (49, 'ABA SEGUROS SA DE CV                                                                                                            ', 'SEGUROS', 2860.63, '2018-02-16', 2860.63, '24660     ');
INSERT INTO `ct_CuentasxPagar` VALUES (50, 'ABA SEGUROS SA DE CV                                                                                                            ', 'SEGUROS', 2860.63, '2018-05-04', 2860.63, '26042018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (51, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 3239.49, '2018-01-10', 3239.49, '210044    ');
INSERT INTO `ct_CuentasxPagar` VALUES (52, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 205.32, '2018-01-10', 205.32, '210186    ');
INSERT INTO `ct_CuentasxPagar` VALUES (53, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 2405.29, '2018-02-28', 2405.29, '2370673   ');
INSERT INTO `ct_CuentasxPagar` VALUES (54, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 4147.60, '2018-04-26', 4147.60, '2376799   ');
INSERT INTO `ct_CuentasxPagar` VALUES (55, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', 1219.00, '2018-02-09', 1219.00, '13357172  ');
INSERT INTO `ct_CuentasxPagar` VALUES (56, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', 990.06, '2018-02-09', 990.06, '13358281  ');
INSERT INTO `ct_CuentasxPagar` VALUES (57, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', 990.06, '2018-03-08', 990.06, '13488907  ');
INSERT INTO `ct_CuentasxPagar` VALUES (58, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', 1219.00, '2018-03-08', 1219.00, '13487819  ');
INSERT INTO `ct_CuentasxPagar` VALUES (59, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', 1219.00, '2018-04-06', 1219.00, '13614942  ');
INSERT INTO `ct_CuentasxPagar` VALUES (60, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', 990.06, '2018-04-06', 990.06, '13616019  ');
INSERT INTO `ct_CuentasxPagar` VALUES (61, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', 1219.00, '2018-05-04', 1219.00, '13742263  ');
INSERT INTO `ct_CuentasxPagar` VALUES (62, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', 990.06, '2018-05-04', 990.06, '13743313  ');
INSERT INTO `ct_CuentasxPagar` VALUES (63, 'AHORA RESULTA SA DE CV', 'LICENCIA SERVIDOR RED', 500.00, '2018-02-14', 500.00, '48317     ');
INSERT INTO `ct_CuentasxPagar` VALUES (64, 'ALFREDO OSORIO CAMACHO', '20 SILLAS PRODUCCION', 27213.60, '2018-05-17', 27213.60, '3140      ');
INSERT INTO `ct_CuentasxPagar` VALUES (65, 'AQUA FINA SA DE CV                                                                                                              ', 'AGUA DESTILADA', 1760.00, '2018-01-25', 1760.00, '38205     ');
INSERT INTO `ct_CuentasxPagar` VALUES (66, 'AQUA FINA SA DE CV                                                                                                              ', 'AGUA DESTILADA', 1760.00, '2018-02-28', 1760.00, '38567     ');
INSERT INTO `ct_CuentasxPagar` VALUES (67, 'AQUA FINA SA DE CV                                                                                                              ', 'AGUA DESTILADA', 2041.60, '2018-04-30', 2041.60, '39040     ');
INSERT INTO `ct_CuentasxPagar` VALUES (68, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 2667.45, '2018-02-12', 2667.45, '148097491 ');
INSERT INTO `ct_CuentasxPagar` VALUES (69, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 289.42, '2018-02-27', 289.42, '149173364 ');
INSERT INTO `ct_CuentasxPagar` VALUES (70, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 2563.31, '2018-03-08', 2563.31, '149173364 ');
INSERT INTO `ct_CuentasxPagar` VALUES (71, 'AUTOTRANSPORTES DE CARGA TRES GUERRAS SA DE CV', 'FLETES', 4406.28, '2018-03-23', 4406.28, '20174959  ');
INSERT INTO `ct_CuentasxPagar` VALUES (72, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE, MASKING', 895.75, '2018-01-18', 895.75, '2127      ');
INSERT INTO `ct_CuentasxPagar` VALUES (73, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE, MASKING', 1990.10, '2018-02-09', 1990.10, '2204      ');
INSERT INTO `ct_CuentasxPagar` VALUES (74, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE, MASKING', 922.90, '2018-04-27', 922.90, '2507      ');
INSERT INTO `ct_CuentasxPagar` VALUES (75, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE, MASKING', 922.90, '2018-04-30', 922.90, '2398      ');
INSERT INTO `ct_CuentasxPagar` VALUES (76, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE, MASKING', 922.90, '2018-05-25', 922.90, '2293      ');
INSERT INTO `ct_CuentasxPagar` VALUES (77, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE, MASKING', 1845.79, '2018-05-25', 1845.79, '2475      ');
INSERT INTO `ct_CuentasxPagar` VALUES (78, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1910.52, '2018-02-09', 1910.52, '79562     ');
INSERT INTO `ct_CuentasxPagar` VALUES (79, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1889.29, '2018-03-16', 1889.29, '80519     ');
INSERT INTO `ct_CuentasxPagar` VALUES (80, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1910.52, '2018-04-27', 1910.52, '81434     ');
INSERT INTO `ct_CuentasxPagar` VALUES (81, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1684.32, '2018-05-11', 1684.32, '82292     ');
INSERT INTO `ct_CuentasxPagar` VALUES (82, 'CASA DIAZ DE MAQUINAS DE COSER, SA DE CV                                                                                        ', 'MTTO MAQUINARIA', 2502.54, '2018-02-02', 2502.54, '113278    ');
INSERT INTO `ct_CuentasxPagar` VALUES (83, 'CASA DIAZ DE MAQUINAS DE COSER, SA DE CV                                                                                        ', 'MTTO MAQUINARIA', 16159.66, '2018-03-23', 16159.66, '20032018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (84, 'CASA DIAZ DE MAQUINAS DE COSER, SA DE CV                                                                                        ', 'MTTO MAQUINARIA', 1606.72, '2018-05-31', 1606.72, '180507    ');
INSERT INTO `ct_CuentasxPagar` VALUES (85, 'CIBERNETICA Y TECNOLOGIA SA DE CV                                                                                               ', 'TIMBRES FISCALES', 2871.00, '2018-03-02', 2871.00, '7208      ');
INSERT INTO `ct_CuentasxPagar` VALUES (86, 'CIERRES AUTOMATICOS NATIONAL, SA DE CV                                                                                          ', 'CIERRES', 3060.30, '2018-04-27', 3060.30, '6978      ');
INSERT INTO `ct_CuentasxPagar` VALUES (87, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 16468.26, '2018-01-11', 16468.26, '608       ');
INSERT INTO `ct_CuentasxPagar` VALUES (88, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 16468.26, '2018-02-09', 16468.26, '622       ');
INSERT INTO `ct_CuentasxPagar` VALUES (89, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 16468.26, '2018-03-08', 16468.26, '635       ');
INSERT INTO `ct_CuentasxPagar` VALUES (90, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 16468.26, '2018-04-06', 16468.26, '648       ');
INSERT INTO `ct_CuentasxPagar` VALUES (91, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 16468.26, '2018-05-04', 16468.26, '661       ');
INSERT INTO `ct_CuentasxPagar` VALUES (92, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1421.00, '2018-01-11', 1421.00, '1353      ');
INSERT INTO `ct_CuentasxPagar` VALUES (93, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 710.50, '2018-01-11', 710.50, '1366      ');
INSERT INTO `ct_CuentasxPagar` VALUES (94, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1451.00, '2018-01-11', 1451.00, '1372      ');
INSERT INTO `ct_CuentasxPagar` VALUES (95, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 760.50, '2018-01-11', 760.50, '1378      ');
INSERT INTO `ct_CuentasxPagar` VALUES (96, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 760.50, '2018-01-25', 760.50, '1414      ');
INSERT INTO `ct_CuentasxPagar` VALUES (97, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 760.96, '2018-02-22', 760.96, '5         ');
INSERT INTO `ct_CuentasxPagar` VALUES (98, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 2181.96, '2018-02-22', 2181.96, '29        ');
INSERT INTO `ct_CuentasxPagar` VALUES (99, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1300.48, '2018-02-28', 1300.48, '83        ');
INSERT INTO `ct_CuentasxPagar` VALUES (100, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 2309.39, '2018-03-08', 2309.39, '172       ');
INSERT INTO `ct_CuentasxPagar` VALUES (101, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1500.46, '2018-03-08', 1500.46, '151       ');
INSERT INTO `ct_CuentasxPagar` VALUES (102, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 2181.50, '2018-03-22', 2181.50, '113       ');
INSERT INTO `ct_CuentasxPagar` VALUES (103, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 3062.52, '2018-04-06', 3062.52, '325       ');
INSERT INTO `ct_CuentasxPagar` VALUES (104, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 803.13, '2018-04-06', 803.13, '350       ');
INSERT INTO `ct_CuentasxPagar` VALUES (105, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 803.13, '2018-04-06', 803.13, '364       ');
INSERT INTO `ct_CuentasxPagar` VALUES (106, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1556.26, '2018-04-27', 1556.26, '410       ');
INSERT INTO `ct_CuentasxPagar` VALUES (107, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 803.13, '2018-04-30', 803.13, '443       ');
INSERT INTO `ct_CuentasxPagar` VALUES (108, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 652.50, '2018-05-11', 652.50, '576       ');
INSERT INTO `ct_CuentasxPagar` VALUES (109, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 2309.39, '2018-05-31', 2309.39, '658       ');
INSERT INTO `ct_CuentasxPagar` VALUES (110, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 2022.20, '2018-01-22', 2022.20, '292031    ');
INSERT INTO `ct_CuentasxPagar` VALUES (111, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 17213.87, '2018-01-25', 17213.87, '260373    ');
INSERT INTO `ct_CuentasxPagar` VALUES (112, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 1094.17, '2018-02-28', 1094.17, '297503    ');
INSERT INTO `ct_CuentasxPagar` VALUES (113, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 8518.00, '2018-03-12', 8518.00, '264624\r\n  ');
INSERT INTO `ct_CuentasxPagar` VALUES (114, 'CORPORATIVO RAYONERA SA DE CV', 'TELA DALI PARA COSEMEX', 44196.00, '2018-02-28', 44196.00, '23997     ');
INSERT INTO `ct_CuentasxPagar` VALUES (115, 'CORPORATIVO RAYONERA SA DE CV', 'TELA DALI PARA COSEMEX', 41779.95, '2018-03-12', 41779.95, '24076     ');
INSERT INTO `ct_CuentasxPagar` VALUES (116, 'DAMARIS ADELA CASTILLO RODRIGUEZ', 'REP PLANCHA DE BOLSA', 5220.00, '2018-03-27', 5220.00, '1802200000');
INSERT INTO `ct_CuentasxPagar` VALUES (117, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', 14979.00, '2018-01-08', 14979.00, '1893      ');
INSERT INTO `ct_CuentasxPagar` VALUES (118, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', 14979.00, '2018-02-12', 14979.00, '2101      ');
INSERT INTO `ct_CuentasxPagar` VALUES (119, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', 14979.00, '2018-03-12', 14979.00, '2377      ');
INSERT INTO `ct_CuentasxPagar` VALUES (120, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', 14979.00, '2018-04-12', 14979.00, '2595      ');
INSERT INTO `ct_CuentasxPagar` VALUES (121, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', 15039.00, '2018-05-03', 15039.00, '2978      ');
INSERT INTO `ct_CuentasxPagar` VALUES (122, 'DESPACHO ARTEAGA Y CIA SC                                                                                                       ', 'LICENCIA CONTABILIDAD', 3480.00, '2018-04-13', 3480.00, '13042018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (123, 'DISEÑOS, EQUIPOS, INGENIERIA,VALVULAS INDUSTRIALES SA DE CV', 'SECADOR DE AIRE', 17110.00, '2018-03-06', 17110.00, '11050     ');
INSERT INTO `ct_CuentasxPagar` VALUES (124, 'EMPUJE TEXTIL SA DE CV', 'CAMISAS ', 3050.80, '2018-03-08', 3050.80, '11378     ');
INSERT INTO `ct_CuentasxPagar` VALUES (125, 'ENFRIADORES DEL GUADIANA SA DE CV', 'FILTROS PARA PURIFIC DE AGUA', 7377.60, '2018-02-16', 7377.60, '14061     ');
INSERT INTO `ct_CuentasxPagar` VALUES (126, 'ESTELA GARCIA LEOS', 'MTTO PREFORMADORA PLACA', 6728.00, '2018-03-16', 6728.00, '431       ');
INSERT INTO `ct_CuentasxPagar` VALUES (127, 'FERNANDO VEGA PALACIOS                                                                                                          ', 'COMISION ', 8700.00, '2018-03-23', 8700.00, '123       ');
INSERT INTO `ct_CuentasxPagar` VALUES (128, 'FRANCISCO ALVAREZ SUSTAITA', 'BANDA INFERIOR', 3942.84, '2018-03-06', 3942.84, '123       ');
INSERT INTO `ct_CuentasxPagar` VALUES (129, 'FRANCISCO ALVAREZ SUSTAITA', 'BANDA INFERIOR', 3942.84, '2018-03-22', 3942.84, '124       ');
INSERT INTO `ct_CuentasxPagar` VALUES (130, 'GESTION Y CONSULTORIA LOPT SC', 'GARANTIA POR JUICIO', 50173.74, '2018-04-30', 50173.74, '661       ');
INSERT INTO `ct_CuentasxPagar` VALUES (131, 'GESTION Y CONSULTORIA LOPT SC', 'HONORARIOS POR JUICIO PARCIAL', 70243.24, '2018-05-11', 70243.24, '726       ');
INSERT INTO `ct_CuentasxPagar` VALUES (132, 'GRUPO DESARROLLADOR 3000 SA DE CV', 'TEL POL /ALG PLAA', 2683.78, '2018-05-28', 2683.78, '9449      ');
INSERT INTO `ct_CuentasxPagar` VALUES (133, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', 1070.49, '2018-01-18', 1070.49, '22273     ');
INSERT INTO `ct_CuentasxPagar` VALUES (134, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', 2869.91, '2018-02-02', 2869.91, '22378     ');
INSERT INTO `ct_CuentasxPagar` VALUES (135, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', 1069.24, '2018-02-23', 1069.24, '22563     ');
INSERT INTO `ct_CuentasxPagar` VALUES (136, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', 1108.66, '2018-03-22', 1108.66, '22879     ');
INSERT INTO `ct_CuentasxPagar` VALUES (137, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', 1084.91, '2018-03-28', 1084.91, '23063     ');
INSERT INTO `ct_CuentasxPagar` VALUES (138, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', 2694.80, '2018-04-30', 2694.80, '23144     ');
INSERT INTO `ct_CuentasxPagar` VALUES (139, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', 1069.51, '2018-04-30', 1069.51, '23176     ');
INSERT INTO `ct_CuentasxPagar` VALUES (140, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', 1058.23, '2018-05-11', 1058.23, '23299     ');
INSERT INTO `ct_CuentasxPagar` VALUES (141, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', 1139.21, '2018-05-25', 1139.21, '23485     ');
INSERT INTO `ct_CuentasxPagar` VALUES (142, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', 6496.00, '2018-02-02', 6496.00, '43614     ');
INSERT INTO `ct_CuentasxPagar` VALUES (143, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', 7015.68, '2018-02-02', 7015.68, '43689     ');
INSERT INTO `ct_CuentasxPagar` VALUES (144, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', 307.40, '2018-02-22', 307.40, '44278     ');
INSERT INTO `ct_CuentasxPagar` VALUES (145, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', 846.80, '2018-02-22', 846.80, '44494     ');
INSERT INTO `ct_CuentasxPagar` VALUES (146, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', 12918.92, '2018-03-16', 12918.92, '44057     ');
INSERT INTO `ct_CuentasxPagar` VALUES (147, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', 10250.46, '2018-03-28', 10250.46, '44399     ');
INSERT INTO `ct_CuentasxPagar` VALUES (148, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', 25852.92, '2018-04-30', 25852.92, '44640     ');
INSERT INTO `ct_CuentasxPagar` VALUES (149, 'GUNTHER ALBERT ELSER SCHUSSLER                                                                                                  ', 'REPARACION TARJETA', 3311.80, '2018-04-30', 3311.80, '176       ');
INSERT INTO `ct_CuentasxPagar` VALUES (150, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', 2552.00, '2018-01-25', 2552.00, '5609      ');
INSERT INTO `ct_CuentasxPagar` VALUES (151, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', 2552.00, '2018-04-06', 2552.00, '5730      ');
INSERT INTO `ct_CuentasxPagar` VALUES (152, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', 2552.00, '2018-05-31', 2552.00, '5820      ');
INSERT INTO `ct_CuentasxPagar` VALUES (153, 'INDUSTRIAS CONMAR SA DE CV                                                                                                      ', 'TELA', 9442.40, '2018-03-16', 9442.40, '8470      ');
INSERT INTO `ct_CuentasxPagar` VALUES (154, 'JLB EQUIP CONTRA INCENDIOS SA DE CV', 'EXTINGUIDORES RECARGA Y MTTO', 1984.76, '2018-02-22', 1984.76, '2379      ');
INSERT INTO `ct_CuentasxPagar` VALUES (155, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 3097.20, '2018-02-16', 3097.20, '1354      ');
INSERT INTO `ct_CuentasxPagar` VALUES (156, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 5929.92, '2018-02-16', 5929.92, '1355      ');
INSERT INTO `ct_CuentasxPagar` VALUES (157, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 3387.20, '2018-02-22', 3387.20, '1362      ');
INSERT INTO `ct_CuentasxPagar` VALUES (158, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 7240.14, '2018-03-08', 7240.14, '1381      ');
INSERT INTO `ct_CuentasxPagar` VALUES (159, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 1545.12, '2018-03-22', 1545.12, '1387      ');
INSERT INTO `ct_CuentasxPagar` VALUES (160, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 6857.92, '2018-04-06', 6857.92, '1404      ');
INSERT INTO `ct_CuentasxPagar` VALUES (161, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 1277.16, '2018-04-06', 1277.16, '1410      ');
INSERT INTO `ct_CuentasxPagar` VALUES (162, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 3712.00, '2018-04-30', 3712.00, '1416      ');
INSERT INTO `ct_CuentasxPagar` VALUES (163, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 8695.36, '2018-04-30', 8695.36, '1417      ');
INSERT INTO `ct_CuentasxPagar` VALUES (164, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 3636.60, '2018-05-11', 3636.60, '1441      ');
INSERT INTO `ct_CuentasxPagar` VALUES (165, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 2042.24, '2018-01-15', 2042.24, '002       ');
INSERT INTO `ct_CuentasxPagar` VALUES (166, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 3961.31, '2018-02-09', 3961.31, '005       ');
INSERT INTO `ct_CuentasxPagar` VALUES (167, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 1938.81, '2018-03-08', 1938.81, '029       ');
INSERT INTO `ct_CuentasxPagar` VALUES (168, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 3969.35, '2018-04-27', 3969.35, '33        ');
INSERT INTO `ct_CuentasxPagar` VALUES (169, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 3875.15, '2018-05-04', 3875.15, '36        ');
INSERT INTO `ct_CuentasxPagar` VALUES (170, 'LA DISTRIBUIDORA DE CASIMIRES                                                                                                   ', 'TELAS', 7879.65, '2018-04-27', 7879.65, '305986    ');
INSERT INTO `ct_CuentasxPagar` VALUES (171, 'LIV MEDICAL SA DE CV                                                                                                            ', 'BOTIQUIN', 3748.61, '2018-02-16', 3748.61, '8816      ');
INSERT INTO `ct_CuentasxPagar` VALUES (172, 'LIV MEDICAL SA DE CV                                                                                                            ', 'BOTIQUIN', 2045.16, '2018-04-27', 2045.16, '9221      ');
INSERT INTO `ct_CuentasxPagar` VALUES (173, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'ART ASEO Y LIMPIEZA', 4071.01, '2018-02-28', 4071.01, '167       ');
INSERT INTO `ct_CuentasxPagar` VALUES (174, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'ART ASEO Y LIMPIEZA', 3297.74, '2018-04-30', 3297.74, '300       ');
INSERT INTO `ct_CuentasxPagar` VALUES (175, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'ART ASEO Y LIMPIEZA', 4086.54, '2018-05-18', 4086.54, '424       ');
INSERT INTO `ct_CuentasxPagar` VALUES (176, 'MARIA GRISELDA CID DAVILA                                                                                                       ', 'MAQUINADO EJEMOTRIZ', 5336.00, '2018-02-14', 5336.00, '398       ');
INSERT INTO `ct_CuentasxPagar` VALUES (177, 'MARIA MADALENA JIMENEZ GONZALEZ', 'COMPONENTES CONTROL DE ACCESO', 2287.52, '2018-01-16', 2287.52, '9066      ');
INSERT INTO `ct_CuentasxPagar` VALUES (178, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2018-01-30', 19720.00, '719       ');
INSERT INTO `ct_CuentasxPagar` VALUES (179, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2018-02-26', 19720.00, '743       ');
INSERT INTO `ct_CuentasxPagar` VALUES (180, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 16468.83, '2018-01-11', 16468.83, '1956      ');
INSERT INTO `ct_CuentasxPagar` VALUES (181, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 16468.83, '2018-02-09', 16468.83, '1983      ');
INSERT INTO `ct_CuentasxPagar` VALUES (182, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 16468.83, '2018-03-08', 16468.83, '2019      ');
INSERT INTO `ct_CuentasxPagar` VALUES (183, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 16468.83, '2018-04-06', 16468.83, '2057      ');
INSERT INTO `ct_CuentasxPagar` VALUES (184, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 16468.83, '2018-05-04', 16468.83, '2100      ');
INSERT INTO `ct_CuentasxPagar` VALUES (185, 'MIGUEL ANGEL VILLAREAL MOLINA                                                                                                   ', 'MTTO AUTOMOVIL', 2204.00, '2018-05-02', 2204.00, '177       ');
INSERT INTO `ct_CuentasxPagar` VALUES (186, 'NOE GALLEGOS TINAJERO                                                                                                           ', '1 MAQUINA RECTA ', 16573.50, '2018-03-20', 16573.50, '20032018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (187, 'ON TIME SERVICIOS TERRESTRES URGENTES SA DE CV                                                                                  ', 'FLETES', 8200.12, '2018-01-25', 8200.12, '53983     ');
INSERT INTO `ct_CuentasxPagar` VALUES (188, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-01-11', 1500.00, '24247730  ');
INSERT INTO `ct_CuentasxPagar` VALUES (189, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-01-18', 1500.00, '24360483  ');
INSERT INTO `ct_CuentasxPagar` VALUES (190, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-01-25', 1500.00, '24502118  ');
INSERT INTO `ct_CuentasxPagar` VALUES (191, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-01-31', 1500.00, '24673839  ');
INSERT INTO `ct_CuentasxPagar` VALUES (192, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-02-09', 1500.00, '24899324  ');
INSERT INTO `ct_CuentasxPagar` VALUES (193, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-02-16', 1500.00, '24956504  ');
INSERT INTO `ct_CuentasxPagar` VALUES (194, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-02-22', 1500.00, '25088391  ');
INSERT INTO `ct_CuentasxPagar` VALUES (195, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-02-28', 1500.00, '25309050  ');
INSERT INTO `ct_CuentasxPagar` VALUES (196, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-03-06', 1500.00, '25434313  ');
INSERT INTO `ct_CuentasxPagar` VALUES (197, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-03-16', 1500.00, '25581268  ');
INSERT INTO `ct_CuentasxPagar` VALUES (198, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-03-22', 1500.00, '25701562  ');
INSERT INTO `ct_CuentasxPagar` VALUES (199, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-03-28', 1500.00, '28032018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (200, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-04-06', 1500.00, '06042018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (201, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-04-12', 1500.00, '12042018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (202, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-04-26', 1500.00, '260418    ');
INSERT INTO `ct_CuentasxPagar` VALUES (203, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-05-04', 1500.00, '04052018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (204, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-05-11', 1500.00, '26752269  ');
INSERT INTO `ct_CuentasxPagar` VALUES (205, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-05-21', 1500.00, '26924811  ');
INSERT INTO `ct_CuentasxPagar` VALUES (206, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-05-24', 1500.00, '24052018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (207, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', 1500.00, '2018-05-31', 1500.00, '31052018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (208, 'PATRICIA SEVILLA MARTINEZ', 'MTTO AIRE LAVADO TECHO', 6444.96, '2018-05-31', 6444.96, '94        ');
INSERT INTO `ct_CuentasxPagar` VALUES (209, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'REP TECHO LOCAL RED', 15312.00, '2018-02-13', 15312.00, '562       ');
INSERT INTO `ct_CuentasxPagar` VALUES (210, 'PROVEEDORA REMCO SA DE CV', '7 MAQUINA RECTA', 124063.16, '2018-03-16', 124063.16, '15032018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (211, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-02-02', 5040.00, '84116     ');
INSERT INTO `ct_CuentasxPagar` VALUES (212, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-02-09', 5040.00, '84343     ');
INSERT INTO `ct_CuentasxPagar` VALUES (213, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-02-16', 5040.00, '84689     ');
INSERT INTO `ct_CuentasxPagar` VALUES (214, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-02-23', 5040.00, '85166     ');
INSERT INTO `ct_CuentasxPagar` VALUES (215, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-03-16', 5040.00, '85532     ');
INSERT INTO `ct_CuentasxPagar` VALUES (216, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-03-22', 5040.00, '85823     ');
INSERT INTO `ct_CuentasxPagar` VALUES (217, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-03-28', 5040.00, '86181     ');
INSERT INTO `ct_CuentasxPagar` VALUES (218, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-04-06', 5040.00, '86182     ');
INSERT INTO `ct_CuentasxPagar` VALUES (219, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-04-27', 5040.00, '86526     ');
INSERT INTO `ct_CuentasxPagar` VALUES (220, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-04-27', 5040.00, '86549     ');
INSERT INTO `ct_CuentasxPagar` VALUES (221, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-04-27', 5040.00, '86927     ');
INSERT INTO `ct_CuentasxPagar` VALUES (222, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-05-04', 5040.00, '87091     ');
INSERT INTO `ct_CuentasxPagar` VALUES (223, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-05-25', 5040.00, '87404     ');
INSERT INTO `ct_CuentasxPagar` VALUES (224, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-05-31', 5040.00, '87514     ');
INSERT INTO `ct_CuentasxPagar` VALUES (225, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', 329.00, '2018-04-10', 329.00, '55236115\r\n');
INSERT INTO `ct_CuentasxPagar` VALUES (226, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', 329.00, '2018-04-10', 329.00, '55236118\r\n');
INSERT INTO `ct_CuentasxPagar` VALUES (227, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', 329.00, '2018-04-10', 329.00, '55236119\r\n');
INSERT INTO `ct_CuentasxPagar` VALUES (228, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', 329.00, '2018-04-10', 329.00, '55236116\r\n');
INSERT INTO `ct_CuentasxPagar` VALUES (229, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', 329.00, '2018-04-10', 329.00, '55236117\r\n');
INSERT INTO `ct_CuentasxPagar` VALUES (230, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', 328.99, '2018-05-11', 328.99, '56455588\r\n');
INSERT INTO `ct_CuentasxPagar` VALUES (231, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', 328.99, '2018-05-11', 328.99, '56455589\r\n');
INSERT INTO `ct_CuentasxPagar` VALUES (232, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', 328.99, '2018-05-11', 328.99, '56455590\r\n');
INSERT INTO `ct_CuentasxPagar` VALUES (233, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', 328.99, '2018-05-11', 328.99, '56455591\r\n');
INSERT INTO `ct_CuentasxPagar` VALUES (234, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', 328.99, '2018-05-11', 328.99, '56455592\r\n');
INSERT INTO `ct_CuentasxPagar` VALUES (235, 'RECOLECTORA DE RESIDUOS COMERCIALES SA DE CV                                                                                    ', 'RECOLECCION DE BASURA', 2946.40, '2018-01-11', 2946.40, '53442     ');
INSERT INTO `ct_CuentasxPagar` VALUES (236, 'RECOLECTORA DE RESIDUOS COMERCIALES SA DE CV                                                                                    ', 'RECOLECCION DE BASURA', 2946.40, '2018-02-09', 2946.40, '54576     ');
INSERT INTO `ct_CuentasxPagar` VALUES (237, 'RECOLECTORA DE RESIDUOS COMERCIALES SA DE CV                                                                                    ', 'RECOLECCION DE BASURA', 2946.40, '2018-03-08', 2946.40, '55739     ');
INSERT INTO `ct_CuentasxPagar` VALUES (238, 'RECOLECTORA DE RESIDUOS COMERCIALES SA DE CV                                                                                    ', 'RECOLECCION DE BASURA', 2946.40, '2018-04-06', 2946.40, '56886     ');
INSERT INTO `ct_CuentasxPagar` VALUES (239, 'RECOLECTORA DE RESIDUOS COMERCIALES SA DE CV                                                                                    ', 'RECOLECCION DE BASURA', 2946.40, '2018-05-04', 2946.40, '58014     ');
INSERT INTO `ct_CuentasxPagar` VALUES (240, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO PLANTA', 331.24, '2018-02-02', 331.24, '27807     ');
INSERT INTO `ct_CuentasxPagar` VALUES (241, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO PLANTA', 1622.99, '2018-03-08', 1622.99, '28535     ');
INSERT INTO `ct_CuentasxPagar` VALUES (242, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO PLANTA', 555.71, '2018-04-30', 555.71, '29430     ');
INSERT INTO `ct_CuentasxPagar` VALUES (243, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO PLANTA', 316.34, '2018-05-04', 316.34, '30122     ');
INSERT INTO `ct_CuentasxPagar` VALUES (244, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO PLANTA', 393.35, '2018-05-04', 393.35, '29749     ');
INSERT INTO `ct_CuentasxPagar` VALUES (245, 'ROSA MARÍA ARIAS Y SAGAON                                                                                                       ', 'BOTON', 4176.00, '2018-05-16', 4176.00, '430       ');
INSERT INTO `ct_CuentasxPagar` VALUES (246, 'SEGUETAS LENMEX SA DE CV                                                                                                        ', 'SIERRA BANDA', 1427.39, '2018-05-29', 1427.39, '90118118  ');
INSERT INTO `ct_CuentasxPagar` VALUES (247, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', 4625.00, '2018-03-08', 4625.00, '022018    ');
INSERT INTO `ct_CuentasxPagar` VALUES (248, 'SOFIA GONZALEZ LOPEZ', 'BANDA FUSIONADORA', 2320.00, '2018-05-25', 2320.00, '08052018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (249, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 1499.00, '2018-01-11', 1499.00, '23122017  ');
INSERT INTO `ct_CuentasxPagar` VALUES (250, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 1498.00, '2018-03-08', 1498.00, '22.02.2018');
INSERT INTO `ct_CuentasxPagar` VALUES (251, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 1499.00, '2018-05-11', 1499.00, '23042018  ');
INSERT INTO `ct_CuentasxPagar` VALUES (252, 'TERESA CHONG', 'BOTON', 835.20, '2018-04-06', 835.20, '1853      ');
INSERT INTO `ct_CuentasxPagar` VALUES (253, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2018-01-11', 1160.00, '2127      ');
INSERT INTO `ct_CuentasxPagar` VALUES (254, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2018-02-09', 1160.00, '4795      ');
INSERT INTO `ct_CuentasxPagar` VALUES (255, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2018-03-08', 1160.00, '4942      ');
INSERT INTO `ct_CuentasxPagar` VALUES (256, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2018-04-27', 1160.00, '5135      ');
INSERT INTO `ct_CuentasxPagar` VALUES (257, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2018-05-11', 1160.00, '5280      ');
INSERT INTO `ct_CuentasxPagar` VALUES (258, 'RADIO MOVIL DIPSA SA DE CV', 'SERVICIO DE TELEFONIA ', 329.00, '2018-06-04', 0.00, '57681546');
INSERT INTO `ct_CuentasxPagar` VALUES (259, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 329.00, '2018-03-08', 329.00, '54088772  ');
INSERT INTO `ct_CuentasxPagar` VALUES (260, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 329.00, '2018-03-08', 329.00, '54088773');
INSERT INTO `ct_CuentasxPagar` VALUES (261, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 329.00, '2018-03-08', 329.00, '54088774');
INSERT INTO `ct_CuentasxPagar` VALUES (262, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 329.00, '2018-03-08', 329.00, '54088775');
INSERT INTO `ct_CuentasxPagar` VALUES (263, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 329.00, '2018-03-08', 329.00, '54088776');
INSERT INTO `ct_CuentasxPagar` VALUES (264, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 329.00, '2018-02-12', 329.00, '52800453');
INSERT INTO `ct_CuentasxPagar` VALUES (265, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 329.00, '2018-02-12', 329.00, '52800454');
INSERT INTO `ct_CuentasxPagar` VALUES (266, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 329.00, '2018-02-12', 329.00, '52800455');
INSERT INTO `ct_CuentasxPagar` VALUES (267, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 329.00, '2018-02-12', 329.00, '52800456');
INSERT INTO `ct_CuentasxPagar` VALUES (268, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 329.00, '2018-02-12', 329.00, '52800457');
INSERT INTO `ct_CuentasxPagar` VALUES (269, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 329.00, '2018-01-12', 529.00, '51589386');
INSERT INTO `ct_CuentasxPagar` VALUES (270, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 529.00, '2018-01-12', 529.00, '51589387');
INSERT INTO `ct_CuentasxPagar` VALUES (271, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 529.00, '2018-01-12', 529.00, '51589388');
INSERT INTO `ct_CuentasxPagar` VALUES (272, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 529.00, '2018-01-12', 529.00, '51589389');
INSERT INTO `ct_CuentasxPagar` VALUES (273, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', 529.00, '2018-01-12', 529.00, '51589390');
INSERT INTO `ct_CuentasxPagar` VALUES (274, 'COMISION FEDERAL DE ELECTRICIDAD', 'LUZ', 18926.00, '2018-04-12', 18926.00, '267578');
INSERT INTO `ct_CuentasxPagar` VALUES (275, 'COMISION FEDERAL DE ELECTRICIDAD', 'LUZ', 15947.00, '2018-05-11', 15947.00, '270549');
INSERT INTO `ct_CuentasxPagar` VALUES (276, 'COMISION FEDERAL DE ELECTRICIDAD', 'LUZ', 348.00, '2018-05-25', 348.00, '303943');
INSERT INTO `ct_CuentasxPagar` VALUES (277, 'COMISION FEDERAL DE ELECTRICIDAD', 'LUZ', 22111.00, '2018-05-31', 22111.00, '272247');
INSERT INTO `ct_CuentasxPagar` VALUES (278, 'COMISION FEDERAL DE ELECTRICIDAD', 'LUZ', 1195.00, '2018-06-01', 1195.00, '305909');
INSERT INTO `ct_CuentasxPagar` VALUES (279, 'SERVICIOS DE AGUA Y DRENAJE', 'SERVICIO DE AGUA EN PLANTA', 4600.00, '2018-01-12', 4600.00, '16291082');
INSERT INTO `ct_CuentasxPagar` VALUES (280, 'SERVICIOS DE AGUA Y DRENAJE', 'SERVICIO DE AGUA EN PLANTA', 4614.00, '2018-02-12', 4614.00, '31012018');
INSERT INTO `ct_CuentasxPagar` VALUES (281, 'SERVICIOS DE AGUA Y DRENAJE', 'SERVICIO DE AGUA EN PLANTA', 4625.00, '2018-03-08', 4625.00, '28022018');
INSERT INTO `ct_CuentasxPagar` VALUES (282, 'SERVICIOS DE AGUA Y DRENAJE', 'SERVICIO DE AGUA EN PLANTA', 2554.00, '2018-04-10', 2554.00, '31032018');
INSERT INTO `ct_CuentasxPagar` VALUES (283, 'SERVICIOS DE AGUA Y DRENAJE', 'SERVICIO DE AGUA EN PLANTA', 3677.00, '2018-05-11', 3677.00, '30042018');
INSERT INTO `ct_CuentasxPagar` VALUES (284, 'AT&T COMUNICACIONES', 'NEXTEL', 2656.98, '2018-01-12', 2656.98, '146870766');
INSERT INTO `ct_CuentasxPagar` VALUES (285, 'AT&T COMUNICACIONES', 'NEXTEL', 619.00, '2018-01-16', 619.00, '146963047');
INSERT INTO `ct_CuentasxPagar` VALUES (286, 'AT&T COMUNICACIONES', 'NEXTEL', 619.00, '2018-02-13', 619.00, '147985203');
INSERT INTO `ct_CuentasxPagar` VALUES (287, 'AT&T COMUNICACIONES', 'NEXTEL', 575.77, '2018-03-14', 575.77, '149114510');
INSERT INTO `ct_CuentasxPagar` VALUES (288, 'AT&T COMUNICACIONES', 'NEXTEL', 963.15, '2018-04-17', 963.15, '149859100');
INSERT INTO `ct_CuentasxPagar` VALUES (289, 'AT&T COMUNICACIONES', 'NEXTEL', 599.00, '2018-04-17', 599.00, '149961390');
INSERT INTO `ct_CuentasxPagar` VALUES (290, 'AT&T COMUNICACIONES', 'NEXTEL', 1218.00, '2018-05-11', 1218.00, '150808166');
INSERT INTO `ct_CuentasxPagar` VALUES (291, 'AT&T COMUNICACIONES', 'NEXTEL', 597.77, '2018-05-11', 597.77, '150842957');
INSERT INTO `ct_CuentasxPagar` VALUES (292, 'ON TIME SERVICIOS TERRESTRES URGENTES SA DE CV                                                                                  ', 'FLETES', 6816.36, '2017-01-12', 6816.36, '45709');
INSERT INTO `ct_CuentasxPagar` VALUES (293, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 15443.46, '2017-01-13', 15443.46, '452');
INSERT INTO `ct_CuentasxPagar` VALUES (294, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', 2320.00, '2017-01-13', 2320.00, '4823');
INSERT INTO `ct_CuentasxPagar` VALUES (295, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2017-01-13', 1160.00, '3436');
INSERT INTO `ct_CuentasxPagar` VALUES (296, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 1036.81, '2017-01-16', 1036.81, '11696134');
INSERT INTO `ct_CuentasxPagar` VALUES (297, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 906.66, '2017-01-16', 906.66, '11697410');
INSERT INTO `ct_CuentasxPagar` VALUES (298, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 15444.00, '2017-01-16', 15444.00, '1475');
INSERT INTO `ct_CuentasxPagar` VALUES (299, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 519.00, '2017-01-16', 519.00, '37207972');
INSERT INTO `ct_CuentasxPagar` VALUES (300, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 519.00, '2017-01-16', 519.00, '37207974');
INSERT INTO `ct_CuentasxPagar` VALUES (301, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 519.00, '2017-01-16', 519.00, '37207975');
INSERT INTO `ct_CuentasxPagar` VALUES (302, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 519.00, '2017-01-16', 519.00, '37207976');
INSERT INTO `ct_CuentasxPagar` VALUES (303, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 519.00, '2017-01-16', 519.00, '37207977');
INSERT INTO `ct_CuentasxPagar` VALUES (304, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 646.13, '2017-01-16', 646.13, '376617154');
INSERT INTO `ct_CuentasxPagar` VALUES (305, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 1005.35, '2017-01-16', 1005.35, '37610825');
INSERT INTO `ct_CuentasxPagar` VALUES (306, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 678.55, '2017-01-16', 678.55, '20120');
INSERT INTO `ct_CuentasxPagar` VALUES (307, 'VICTOR HUGO PEDROZA GALVAN                                                                                                      ', 'REPARACION POINTER', 2030.00, '2017-01-16', 2030.00, '335');
INSERT INTO `ct_CuentasxPagar` VALUES (308, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 3431.28, '2017-01-17', 3431.28, '190380');
INSERT INTO `ct_CuentasxPagar` VALUES (309, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 5343.18, '2017-01-17', 5343.18, '190379');
INSERT INTO `ct_CuentasxPagar` VALUES (310, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 895.75, '2017-01-17', 895.75, '1144');
INSERT INTO `ct_CuentasxPagar` VALUES (311, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 5211.57, '2017-01-17', 5211.57, '36');
INSERT INTO `ct_CuentasxPagar` VALUES (312, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 619.00, '2017-01-18', 619.00, '133391643');
INSERT INTO `ct_CuentasxPagar` VALUES (313, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 19520.54, '2017-01-27', 19520.54, '22577531');
INSERT INTO `ct_CuentasxPagar` VALUES (314, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 10770.36, '2017-01-27', 10770.36, '36711');
INSERT INTO `ct_CuentasxPagar` VALUES (315, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 13449.62, '2017-01-27', 13449.62, '36833');
INSERT INTO `ct_CuentasxPagar` VALUES (316, 'MEDIX DEL NORTE SA DE CV                                                                                                        ', 'BOTIQUIN', 110.88, '2017-01-28', 110.88, '20868');
INSERT INTO `ct_CuentasxPagar` VALUES (317, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1454.92, '2017-01-30', 1454.92, '18551');
INSERT INTO `ct_CuentasxPagar` VALUES (318, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1379.41, '2017-01-31', 1379.41, '18564');
INSERT INTO `ct_CuentasxPagar` VALUES (319, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 939.48, '2017-02-01', 939.48, '36833');
INSERT INTO `ct_CuentasxPagar` VALUES (320, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 6236.16, '2017-02-01', 6236.16, '36865');
INSERT INTO `ct_CuentasxPagar` VALUES (321, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 6612.00, '2017-02-01', 6612.00, '36926');
INSERT INTO `ct_CuentasxPagar` VALUES (322, 'GARMENT TEXTIL SA DE CV                                                                                                         ', 'TELAS RED', 71671.88, '2017-02-03', 71671.88, '4106');
INSERT INTO `ct_CuentasxPagar` VALUES (323, 'MEDIX DEL NORTE SA DE CV                                                                                                        ', 'BOTIQUIN', 2574.46, '2017-02-03', 2574.46, '20867');
INSERT INTO `ct_CuentasxPagar` VALUES (324, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', 4345.00, '2017-02-03', 4345.00, '5290830');
INSERT INTO `ct_CuentasxPagar` VALUES (325, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 1132.18, '2017-02-07', 1132.18, '11824477');
INSERT INTO `ct_CuentasxPagar` VALUES (326, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 990.06, '2017-02-07', 990.06, '11828738');
INSERT INTO `ct_CuentasxPagar` VALUES (327, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1743.27, '2017-02-07', 1743.27, '68426');
INSERT INTO `ct_CuentasxPagar` VALUES (328, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 15443.46, '2017-02-07', 15443.46, '457');
INSERT INTO `ct_CuentasxPagar` VALUES (329, 'ELASTICOS, CIERRES Y HERRAJES LA GAMUSA SA DE CV                                                                                ', 'VARILLA', 1740.00, '2017-02-07', 1740.00, '47097');
INSERT INTO `ct_CuentasxPagar` VALUES (330, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 4075.08, '2017-02-07', 4075.08, '1019');
INSERT INTO `ct_CuentasxPagar` VALUES (331, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 5443.53, '2017-02-07', 5443.53, '39');
INSERT INTO `ct_CuentasxPagar` VALUES (332, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 15444.00, '2017-02-07', 15444.00, '1495');
INSERT INTO `ct_CuentasxPagar` VALUES (333, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 2890.00, '2017-02-07', 2890.00, '9172');
INSERT INTO `ct_CuentasxPagar` VALUES (334, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2017-02-07', 1160.00, '3534');
INSERT INTO `ct_CuentasxPagar` VALUES (335, 'VICTOR HUGO PEDROZA GALVAN                                                                                                      ', 'REPARACION POINTER', 1577.60, '2017-02-15', 1577.60, '344');
INSERT INTO `ct_CuentasxPagar` VALUES (336, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1276.19, '2017-02-17', 1276.19, '18725');
INSERT INTO `ct_CuentasxPagar` VALUES (337, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 1012.52, '2017-02-17', 1012.52, '21047');
INSERT INTO `ct_CuentasxPagar` VALUES (338, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 3758.89, '2017-02-24', 3758.89, '192511');
INSERT INTO `ct_CuentasxPagar` VALUES (339, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 3556.56, '2017-02-24', 3556.56, '192498');
INSERT INTO `ct_CuentasxPagar` VALUES (340, 'AQUA FINA SA DE CV                                                                                                              ', 'AGUA DESTILADA', 1760.00, '2017-02-24', 1760.00, '34161');
INSERT INTO `ct_CuentasxPagar` VALUES (341, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 619.00, '2017-02-24', 619.00, '1.23530795');
INSERT INTO `ct_CuentasxPagar` VALUES (342, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 889.91, '2017-02-24', 889.91, '1249');
INSERT INTO `ct_CuentasxPagar` VALUES (343, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 27338.00, '2017-02-24', 27338.00, '22857215');
INSERT INTO `ct_CuentasxPagar` VALUES (344, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 4330.05, '2017-02-24', 4330.05, '18769');
INSERT INTO `ct_CuentasxPagar` VALUES (345, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2017-02-24', 19720.00, '225');
INSERT INTO `ct_CuentasxPagar` VALUES (346, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1910.02, '2017-03-02', 1910.02, '69026');
INSERT INTO `ct_CuentasxPagar` VALUES (347, 'CASA DIAZ DE MAQUINAS DE COSER, SA DE CV                                                                                        ', 'MTTO MAQUINARIA', 445.17, '2017-03-02', 445.17, '102010');
INSERT INTO `ct_CuentasxPagar` VALUES (348, 'CASA DIAZ DE MAQUINAS DE COSER, SA DE CV                                                                                        ', 'MTTO MAQUINARIA', 890.20, '2017-03-02', 890.20, '101419');
INSERT INTO `ct_CuentasxPagar` VALUES (349, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1236.40, '2017-03-02', 1236.40, '62');
INSERT INTO `ct_CuentasxPagar` VALUES (350, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 6844.00, '2017-03-02', 6844.00, '37380');
INSERT INTO `ct_CuentasxPagar` VALUES (351, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 60292.62, '2017-03-02', 60292.62, '37526');
INSERT INTO `ct_CuentasxPagar` VALUES (352, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 27717.04, '2017-03-02', 27717.04, '37528');
INSERT INTO `ct_CuentasxPagar` VALUES (353, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'MAT DE ASEO Y LIMPIEZA', 3209.65, '2017-03-02', 3209.65, '3305');
INSERT INTO `ct_CuentasxPagar` VALUES (354, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-03-02', 1500.00, '3126');
INSERT INTO `ct_CuentasxPagar` VALUES (355, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-03-02', 5040.00, '70507');
INSERT INTO `ct_CuentasxPagar` VALUES (356, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-03-02', 5040.00, '70508');
INSERT INTO `ct_CuentasxPagar` VALUES (357, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 3007.46, '2017-03-03', 3007.46, '133471348');
INSERT INTO `ct_CuentasxPagar` VALUES (358, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 3000.48, '2017-03-03', 3000.48, '134548981');
INSERT INTO `ct_CuentasxPagar` VALUES (359, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 3000.48, '2017-03-03', 3000.48, '135881847');
INSERT INTO `ct_CuentasxPagar` VALUES (360, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-03-03', 319.00, '39590834');
INSERT INTO `ct_CuentasxPagar` VALUES (361, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-03-03', 319.00, '39590836');
INSERT INTO `ct_CuentasxPagar` VALUES (362, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-03-03', 319.00, '39590837');
INSERT INTO `ct_CuentasxPagar` VALUES (363, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-03-03', 319.00, '39590838');
INSERT INTO `ct_CuentasxPagar` VALUES (364, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-03-03', 319.00, '39590839');
INSERT INTO `ct_CuentasxPagar` VALUES (365, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', 4371.00, '2017-03-03', 4371.00, '5399539');
INSERT INTO `ct_CuentasxPagar` VALUES (366, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-03-06', 5040.00, '72214');
INSERT INTO `ct_CuentasxPagar` VALUES (367, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-03-06', 5040.00, '72215');
INSERT INTO `ct_CuentasxPagar` VALUES (368, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 990.06, '2017-03-08', 990.06, '11953646');
INSERT INTO `ct_CuentasxPagar` VALUES (369, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 1132.18, '2017-03-08', 1132.18, '11952407');
INSERT INTO `ct_CuentasxPagar` VALUES (370, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 1791.50, '2017-03-09', 1791.50, '1298');
INSERT INTO `ct_CuentasxPagar` VALUES (371, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 15444.00, '2017-03-09', 15444.00, '470');
INSERT INTO `ct_CuentasxPagar` VALUES (372, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1361.00, '2017-03-09', 1361.00, '18902');
INSERT INTO `ct_CuentasxPagar` VALUES (373, 'GRUPO INDUSTRIAL JM SA DE CV                                                                                                    ', 'ENTRETELA', 9112.96, '2017-03-09', 9112.96, '193366');
INSERT INTO `ct_CuentasxPagar` VALUES (374, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 5709.52, '2017-03-09', 5709.52, '37652');
INSERT INTO `ct_CuentasxPagar` VALUES (375, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 8704.87, '2017-03-09', 8704.87, '37653');
INSERT INTO `ct_CuentasxPagar` VALUES (376, 'HARODITE SA DE CV                                                                                                               ', 'ENTRETELA', 9575.57, '2017-03-09', 9575.57, '7149');
INSERT INTO `ct_CuentasxPagar` VALUES (377, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', 2320.00, '2017-03-09', 2320.00, '4971');
INSERT INTO `ct_CuentasxPagar` VALUES (378, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 4947.24, '2017-03-09', 4947.24, '30');
INSERT INTO `ct_CuentasxPagar` VALUES (379, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 15444.00, '2017-03-09', 15444.00, '1532');
INSERT INTO `ct_CuentasxPagar` VALUES (380, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-03-09', 1500.00, '3147');
INSERT INTO `ct_CuentasxPagar` VALUES (381, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 2890.00, '2017-03-09', 2890.00, '9175');
INSERT INTO `ct_CuentasxPagar` VALUES (382, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2017-03-09', 1160.00, '3603');
INSERT INTO `ct_CuentasxPagar` VALUES (383, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 1319.57, '2017-03-16', 1319.57, '1306');
INSERT INTO `ct_CuentasxPagar` VALUES (384, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1236.40, '2017-03-16', 1236.40, '102');
INSERT INTO `ct_CuentasxPagar` VALUES (385, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 3559.07, '2017-03-16', 3559.07, '1056');
INSERT INTO `ct_CuentasxPagar` VALUES (386, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-03-16', 1500.00, '3162');
INSERT INTO `ct_CuentasxPagar` VALUES (387, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 7540.00, '2017-03-16', 7540.00, '371');
INSERT INTO `ct_CuentasxPagar` VALUES (388, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5220.00, '2017-03-16', 5220.00, '72216');
INSERT INTO `ct_CuentasxPagar` VALUES (389, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 619.00, '2017-03-17', 619.00, '8119415780');
INSERT INTO `ct_CuentasxPagar` VALUES (390, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 4492.63, '2017-03-21', 4492.63, '1332');
INSERT INTO `ct_CuentasxPagar` VALUES (391, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1244.31, '2017-03-21', 1244.31, '19048');
INSERT INTO `ct_CuentasxPagar` VALUES (392, 'GRUPO INDUSTRIAL JM SA DE CV                                                                                                    ', 'ENTRETELA', 9112.96, '2017-03-21', 9112.96, '193429');
INSERT INTO `ct_CuentasxPagar` VALUES (393, 'JOSE ALVARO HINOJOSA GUIJARRO                                                                                                   ', 'MAQUILADO ALETILLA', 3480.00, '2017-03-21', 3480.00, '25');
INSERT INTO `ct_CuentasxPagar` VALUES (394, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 1691.86, '2017-03-21', 1691.86, '1059');
INSERT INTO `ct_CuentasxPagar` VALUES (395, 'MEDIX DEL NORTE SA DE CV                                                                                                        ', 'BOTIQUIN', 553.31, '2017-03-21', 553.31, '21851');
INSERT INTO `ct_CuentasxPagar` VALUES (396, 'MEDIX DEL NORTE SA DE CV                                                                                                        ', 'BOTIQUIN', 2770.18, '2017-03-21', 2770.18, '21852');
INSERT INTO `ct_CuentasxPagar` VALUES (397, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-03-21', 1500.00, '3171');
INSERT INTO `ct_CuentasxPagar` VALUES (398, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 28000.00, '2017-03-21', 28000.00, '373');
INSERT INTO `ct_CuentasxPagar` VALUES (399, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-03-21', 5040.00, '72217');
INSERT INTO `ct_CuentasxPagar` VALUES (400, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-03-21', 5040.00, '72830');
INSERT INTO `ct_CuentasxPagar` VALUES (401, 'COMERCIALIZADORA TDCH SA DE CV                                                                                                  ', 'MANIQUIES RED', 17168.00, '2017-03-27', 17168.00, '3977');
INSERT INTO `ct_CuentasxPagar` VALUES (402, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 28726.88, '2017-03-27', 28726.88, '23144759');
INSERT INTO `ct_CuentasxPagar` VALUES (403, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2017-03-27', 19720.00, '257');
INSERT INTO `ct_CuentasxPagar` VALUES (404, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 19720.00, '2017-03-29', 19720.00, '387');
INSERT INTO `ct_CuentasxPagar` VALUES (405, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 2431.82, '2017-03-31', 2431.82, '194396');
INSERT INTO `ct_CuentasxPagar` VALUES (406, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 3556.56, '2017-03-31', 3556.56, '194401');
INSERT INTO `ct_CuentasxPagar` VALUES (407, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 3422.00, '2017-03-31', 3422.00, '1060');
INSERT INTO `ct_CuentasxPagar` VALUES (408, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-03-31', 1500.00, '3191');
INSERT INTO `ct_CuentasxPagar` VALUES (409, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-03-31', 5040.00, '72832');
INSERT INTO `ct_CuentasxPagar` VALUES (410, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-03-31', 5040.00, '72831');
INSERT INTO `ct_CuentasxPagar` VALUES (411, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 2933.28, '2017-04-01', 2933.28, '136986356');
INSERT INTO `ct_CuentasxPagar` VALUES (412, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 15444.00, '2017-04-03', 15444.00, '485');
INSERT INTO `ct_CuentasxPagar` VALUES (413, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 37108.48, '2017-04-03', 37108.48, '389');
INSERT INTO `ct_CuentasxPagar` VALUES (414, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 1132.18, '2017-04-05', 1132.18, '12081152');
INSERT INTO `ct_CuentasxPagar` VALUES (415, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 990.06, '2017-04-05', 990.06, '12082383');
INSERT INTO `ct_CuentasxPagar` VALUES (416, 'CIBERNETICA Y TECNOLOGIA SA DE CV                                                                                               ', 'TIMBRES FISCALES', 2900.00, '2017-04-05', 2900.00, '5889');
INSERT INTO `ct_CuentasxPagar` VALUES (417, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1260.63, '2017-04-05', 1260.63, '19160');
INSERT INTO `ct_CuentasxPagar` VALUES (418, 'GRUPO INDUSTRIAL JM SA DE CV                                                                                                    ', 'ENTRETELA', 9112.96, '2017-04-05', 9112.96, '193494');
INSERT INTO `ct_CuentasxPagar` VALUES (419, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', 2320.00, '2017-04-05', 2320.00, '5045');
INSERT INTO `ct_CuentasxPagar` VALUES (420, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 6212.96, '2017-04-05', 6212.96, '1031');
INSERT INTO `ct_CuentasxPagar` VALUES (421, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 15444.00, '2017-04-05', 15444.00, '1573');
INSERT INTO `ct_CuentasxPagar` VALUES (422, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-04-05', 1500.00, '3218');
INSERT INTO `ct_CuentasxPagar` VALUES (423, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 1274.24, '2017-04-05', 1274.24, '21954');
INSERT INTO `ct_CuentasxPagar` VALUES (424, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 5009.88, '2017-04-06', 5009.88, '209');
INSERT INTO `ct_CuentasxPagar` VALUES (425, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 38000.00, '2017-04-06', 38000.00, '390');
INSERT INTO `ct_CuentasxPagar` VALUES (426, 'JAIME DE ANDA VILLAREAL                                                                                                         ', 'PLANTILLAS DE ACERO', 3190.00, '2017-04-07', 3190.00, '661');
INSERT INTO `ct_CuentasxPagar` VALUES (427, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-04-07', 319.00, '40785441');
INSERT INTO `ct_CuentasxPagar` VALUES (428, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-04-07', 319.00, '40785443');
INSERT INTO `ct_CuentasxPagar` VALUES (429, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-04-07', 319.00, '40785444');
INSERT INTO `ct_CuentasxPagar` VALUES (430, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-04-07', 319.00, '40785445');
INSERT INTO `ct_CuentasxPagar` VALUES (431, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-04-07', 319.00, '40785446');
INSERT INTO `ct_CuentasxPagar` VALUES (432, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', 4425.00, '2017-04-07', 4425.00, '5509034');
INSERT INTO `ct_CuentasxPagar` VALUES (433, 'PUBLICIDAD EN BOLSA  SA DE CV                                                                                                   ', 'PUBLICIDAD BOLSA RED', 14507.25, '2017-04-08', 14507.25, '488');
INSERT INTO `ct_CuentasxPagar` VALUES (434, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1825.13, '2017-04-11', 1825.13, '70188');
INSERT INTO `ct_CuentasxPagar` VALUES (435, 'DESPACHO ARTEAGA Y CIA SC                                                                                                       ', 'LICENCIA CONTABILIDAD', 3480.00, '2017-04-11', 3480.00, '4324');
INSERT INTO `ct_CuentasxPagar` VALUES (436, 'ELASTICOS, CIERRES Y HERRAJES LA GAMUSA SA DE CV                                                                                ', 'VARILLA', 1566.00, '2017-04-11', 1566.00, '49787');
INSERT INTO `ct_CuentasxPagar` VALUES (437, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1046.27, '2017-04-11', 1046.27, '19321');
INSERT INTO `ct_CuentasxPagar` VALUES (438, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 8801.21, '2017-04-11', 8801.21, '1075');
INSERT INTO `ct_CuentasxPagar` VALUES (439, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 4812.18, '2017-04-11', 4812.18, '34');
INSERT INTO `ct_CuentasxPagar` VALUES (440, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'MAT DE ASEO Y LIMPIEZA', 4112.13, '2017-04-11', 4112.13, '3433');
INSERT INTO `ct_CuentasxPagar` VALUES (441, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-04-11', 1500.00, '3226');
INSERT INTO `ct_CuentasxPagar` VALUES (442, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 1499.00, '2017-04-11', 1499.00, '9167');
INSERT INTO `ct_CuentasxPagar` VALUES (443, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2017-04-11', 1160.00, '3694');
INSERT INTO `ct_CuentasxPagar` VALUES (444, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 619.00, '2017-04-12', 619.00, '13562605');
INSERT INTO `ct_CuentasxPagar` VALUES (445, 'FERNANDO VEGA PALACIOS                                                                                                          ', 'COMISIONES', 8582.55, '2017-04-12', 8582.55, '68');
INSERT INTO `ct_CuentasxPagar` VALUES (446, 'MARIA TERESITA DE JESUS CHONG MUNOZ                                                                                             ', 'TEÑIDO BOTON', 765.60, '2017-04-12', 765.60, '1366');
INSERT INTO `ct_CuentasxPagar` VALUES (447, 'EDITORA EL SOL SA DE CV                                                                                                         ', 'AVISOS EL NORTE', 2008.70, '2017-04-18', 2008.70, '751844');
INSERT INTO `ct_CuentasxPagar` VALUES (448, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2017-04-20', 19720.00, '296');
INSERT INTO `ct_CuentasxPagar` VALUES (449, 'ADRIANA GUADALUPE RAMOS CANTU', 'AIRE LAVADO NEGRO ', 74702.20, '2017-04-20', 74702.20, '13');
INSERT INTO `ct_CuentasxPagar` VALUES (450, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-04-21', 1500.00, '3246');
INSERT INTO `ct_CuentasxPagar` VALUES (451, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-04-21', 5040.00, '73925');
INSERT INTO `ct_CuentasxPagar` VALUES (452, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-04-21', 5040.00, '73922');
INSERT INTO `ct_CuentasxPagar` VALUES (453, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-04-21', 5040.00, '73924');
INSERT INTO `ct_CuentasxPagar` VALUES (454, 'MIGUEL ANGEL VILLAREAL MOLINA                                                                                                   ', 'MTTO AUTOMOVIL', 2575.20, '2017-04-24', 2575.20, '11');
INSERT INTO `ct_CuentasxPagar` VALUES (455, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 34800.00, '2017-04-24', 34800.00, '399');
INSERT INTO `ct_CuentasxPagar` VALUES (456, 'AHORA RESULTA SA DE CV', 'EQ PUNTO DE VENTA RED', 11945.00, '2017-04-26', 11945.00, '31464');
INSERT INTO `ct_CuentasxPagar` VALUES (457, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 889.91, '2017-04-26', 889.91, '1402');
INSERT INTO `ct_CuentasxPagar` VALUES (458, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1451.00, '2017-04-26', 1451.00, '290');
INSERT INTO `ct_CuentasxPagar` VALUES (459, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 28538.00, '2017-04-26', 28538.00, '23421119');
INSERT INTO `ct_CuentasxPagar` VALUES (460, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 29602.97, '2017-04-26', 29602.97, '38737');
INSERT INTO `ct_CuentasxPagar` VALUES (461, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 39383.74, '2017-04-26', 39383.74, '38738');
INSERT INTO `ct_CuentasxPagar` VALUES (462, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-04-26', 1500.00, '3256');
INSERT INTO `ct_CuentasxPagar` VALUES (463, 'PUBLICIDAD EN BOLSA  SA DE CV                                                                                                   ', 'PUBLICIDAD BOLSA RED', 10531.93, '2017-04-26', 10531.93, '541');
INSERT INTO `ct_CuentasxPagar` VALUES (464, 'ROMAN TORRES LOREDO                                                                                                             ', 'TEFLON PLANCHA', 4060.00, '2017-04-26', 4060.00, '615');
INSERT INTO `ct_CuentasxPagar` VALUES (465, 'EFRAIN SOLORIO RUIZ', 'REFACCIONES PARA MAQUINARIA', 16222.60, '2017-04-27', 16222.60, '473');
INSERT INTO `ct_CuentasxPagar` VALUES (466, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 5800.00, '2017-04-28', 5800.00, '405');
INSERT INTO `ct_CuentasxPagar` VALUES (467, 'MARIA TERESITA DE JESUS CHONG MUNOZ                                                                                             ', 'BOTON TEÑIDO', 644.26, '2017-05-03', 644.26, '1403');
INSERT INTO `ct_CuentasxPagar` VALUES (468, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 1132.18, '2017-05-04', 1132.18, '12209154');
INSERT INTO `ct_CuentasxPagar` VALUES (469, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1868.06, '2017-05-04', 1868.06, '70737');
INSERT INTO `ct_CuentasxPagar` VALUES (470, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 15444.00, '2017-05-04', 15444.00, '498');
INSERT INTO `ct_CuentasxPagar` VALUES (471, 'LA DISTRIBUIDORA DE CASIMIRES                                                                                                   ', 'TELAS', 54479.40, '2017-05-04', 54479.40, '269252');
INSERT INTO `ct_CuentasxPagar` VALUES (472, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 15444.00, '2017-05-04', 15444.00, '1612');
INSERT INTO `ct_CuentasxPagar` VALUES (473, 'OFFICE DEPOT DE MEXICO SA DE CV                                                                                                 ', 'CLIP PAGO C TARJETA', 1160.00, '2017-05-04', 1160.00, '39925010');
INSERT INTO `ct_CuentasxPagar` VALUES (474, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-05-04', 1500.00, '3279');
INSERT INTO `ct_CuentasxPagar` VALUES (475, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 34800.00, '2017-05-04', 34800.00, '406');
INSERT INTO `ct_CuentasxPagar` VALUES (476, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-05-04', 5040.00, '74664');
INSERT INTO `ct_CuentasxPagar` VALUES (477, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-05-04', 5040.00, '74662');
INSERT INTO `ct_CuentasxPagar` VALUES (478, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-05-04', 5040.00, '74663');
INSERT INTO `ct_CuentasxPagar` VALUES (479, 'QUIALITAS COMPAÑIA DE SEGUROS SAB DE CV                                                                                         ', 'SEGUROS', 3070.81, '2017-05-04', 3070.81, '109445568');
INSERT INTO `ct_CuentasxPagar` VALUES (480, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 990.06, '2017-05-05', 990.06, '12210370');
INSERT INTO `ct_CuentasxPagar` VALUES (481, 'AXA SEGUROS SA DE CV                                                                                                            ', 'SEGUROS', 3048.48, '2017-05-05', 3048.48, '6243129');
INSERT INTO `ct_CuentasxPagar` VALUES (482, 'HARODITE SA DE CV                                                                                                               ', 'ENTRETELA', 35778.36, '2017-05-05', 35778.36, '7368');
INSERT INTO `ct_CuentasxPagar` VALUES (483, 'MARIA TERESITA DE JESUS CHONG MUNOZ                                                                                             ', 'TEÑIDO BOTON', 92.80, '2017-05-08', 92.80, '1374');
INSERT INTO `ct_CuentasxPagar` VALUES (484, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 80000.00, '2017-05-09', 80000.00, '409');
INSERT INTO `ct_CuentasxPagar` VALUES (485, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 10344.83, '2017-05-09', 10344.83, '410');
INSERT INTO `ct_CuentasxPagar` VALUES (486, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 1239.55, '2017-05-12', 1239.55, '196204C   ');
INSERT INTO `ct_CuentasxPagar` VALUES (487, 'AQUA FINA SA DE CV                                                                                                              ', 'AGUA DESTILADA', 1760.00, '2017-05-12', 1760.00, '35235');
INSERT INTO `ct_CuentasxPagar` VALUES (488, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 2665.11, '2017-05-12', 2665.11, '138182147');
INSERT INTO `ct_CuentasxPagar` VALUES (489, 'CAVAZOS OVIEDO Y ASOCIADOS SC', 'CERTIFICACION COM EXT', 17400.00, '2017-05-12', 17400.00, '13A       ');
INSERT INTO `ct_CuentasxPagar` VALUES (490, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 740.50, '2017-05-12', 740.50, '387');
INSERT INTO `ct_CuentasxPagar` VALUES (491, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1451.00, '2017-05-12', 1451.00, '385');
INSERT INTO `ct_CuentasxPagar` VALUES (492, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 31997.63, '2017-05-12', 31997.63, '365');
INSERT INTO `ct_CuentasxPagar` VALUES (493, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1834.19, '2017-05-12', 1834.19, '19523');
INSERT INTO `ct_CuentasxPagar` VALUES (494, 'GRUPO INDUSTRIAL JM SA DE CV                                                                                                    ', 'ENTRETELA', 10118.68, '2017-05-12', 10118.68, '193765');
INSERT INTO `ct_CuentasxPagar` VALUES (495, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 4342.73, '2017-05-12', 4342.73, '94497');
INSERT INTO `ct_CuentasxPagar` VALUES (496, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'MAT DE ASEO Y LIMPIEZA', 3456.15, '2017-05-12', 3456.15, '3570');
INSERT INTO `ct_CuentasxPagar` VALUES (497, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-05-12', 1500.00, '3296');
INSERT INTO `ct_CuentasxPagar` VALUES (498, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-05-12', 319.00, '41978707');
INSERT INTO `ct_CuentasxPagar` VALUES (499, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-05-12', 319.00, '41978708');
INSERT INTO `ct_CuentasxPagar` VALUES (500, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-05-12', 319.00, '41978706');
INSERT INTO `ct_CuentasxPagar` VALUES (501, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-05-12', 319.00, '41978705');
INSERT INTO `ct_CuentasxPagar` VALUES (502, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-05-12', 319.00, '41978703');
INSERT INTO `ct_CuentasxPagar` VALUES (503, 'SALINAS CANTU MARIA CANDELARIA', 'COMIDA 10 DE MAYO', 4680.46, '2017-05-12', 4680.46, '204');
INSERT INTO `ct_CuentasxPagar` VALUES (504, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', 4500.00, '2017-05-12', 4500.00, '5617683');
INSERT INTO `ct_CuentasxPagar` VALUES (505, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 1499.00, '2017-05-12', 1499.00, '9142');
INSERT INTO `ct_CuentasxPagar` VALUES (506, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2017-05-12', 1160.00, '3822');
INSERT INTO `ct_CuentasxPagar` VALUES (507, 'EXCELENCIA EN BOTONES SA DE CV                                                                                                  ', 'BOTONES RED', 4007.80, '2017-05-15', 4007.80, '3046');
INSERT INTO `ct_CuentasxPagar` VALUES (508, 'CASA DIAZ DE MAQUINAS DE COSER, SA DE CV                                                                                        ', 'MTTO MAQUINARIA', 2020.51, '2017-05-16', 2020.51, '104121');
INSERT INTO `ct_CuentasxPagar` VALUES (509, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-05-16', 1500.00, '3309');
INSERT INTO `ct_CuentasxPagar` VALUES (510, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-05-16', 5040.00, '75241');
INSERT INTO `ct_CuentasxPagar` VALUES (511, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-05-16', 5040.00, '75240');
INSERT INTO `ct_CuentasxPagar` VALUES (512, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 619.00, '2017-05-17', 619.00, '138153104');
INSERT INTO `ct_CuentasxPagar` VALUES (513, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1967.43, '2017-05-18', 1967.43, '402');
INSERT INTO `ct_CuentasxPagar` VALUES (514, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1113.04, '2017-05-19', 1113.04, '19569');
INSERT INTO `ct_CuentasxPagar` VALUES (515, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 17400.00, '2017-05-19', 17400.00, '417');
INSERT INTO `ct_CuentasxPagar` VALUES (516, 'DENIS MARGARITA PUENTE VELASCO', 'MANTENIMIENTO A MINISPLIT', 3828.00, '2017-05-22', 3828.00, '53');
INSERT INTO `ct_CuentasxPagar` VALUES (517, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2017-05-24', 19720.00, '341');
INSERT INTO `ct_CuentasxPagar` VALUES (518, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 889.91, '2017-05-25', 889.91, '1468');
INSERT INTO `ct_CuentasxPagar` VALUES (519, 'CIERRES AUTOMATICOS NATIONAL, SA DE CV                                                                                          ', 'CIERRES', 2428.81, '2017-05-25', 2428.81, '51582');
INSERT INTO `ct_CuentasxPagar` VALUES (520, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 29932.00, '2017-05-25', 29932.00, '23711982');
INSERT INTO `ct_CuentasxPagar` VALUES (521, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1201.16, '2017-05-25', 1201.16, '19656');
INSERT INTO `ct_CuentasxPagar` VALUES (522, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-05-25', 1500.00, '3331');
INSERT INTO `ct_CuentasxPagar` VALUES (523, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 4366.68, '2017-05-25', 4366.68, '22773');
INSERT INTO `ct_CuentasxPagar` VALUES (524, 'ARTURO GARZA GALVAN', 'TRIPTICOS Y LONA PLAA', 6472.80, '2017-05-29', 6472.80, '554');
INSERT INTO `ct_CuentasxPagar` VALUES (525, 'COMERCIALIZADORA TDCH SA DE CV                                                                                                  ', 'MAIQUIES RED', 17168.00, '2017-05-29', 17168.00, '5097');
INSERT INTO `ct_CuentasxPagar` VALUES (526, 'FRANCISCO MANUEL CASAS VELAZQUEZ', 'CERTIFICACION CFE', 3248.00, '2017-05-30', 3248.00, '171');
INSERT INTO `ct_CuentasxPagar` VALUES (527, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 34800.00, '2017-05-30', 34800.00, '422');
INSERT INTO `ct_CuentasxPagar` VALUES (528, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', 14979.00, '2017-06-01', 14979.00, '1095A     ');
INSERT INTO `ct_CuentasxPagar` VALUES (529, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 9800.00, '2017-06-02', 9800.00, '425');
INSERT INTO `ct_CuentasxPagar` VALUES (530, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-06-05', 1500.00, 'ACEFA     ');
INSERT INTO `ct_CuentasxPagar` VALUES (531, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 17400.00, '2017-06-06', 17400.00, '426');
INSERT INTO `ct_CuentasxPagar` VALUES (532, 'JOSE LUIS BALLEZA ALVARADO', 'ANUNCIO LED RED ', 11165.00, '2017-06-07', 11165.00, '1279');
INSERT INTO `ct_CuentasxPagar` VALUES (533, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 1132.18, '2017-06-08', 1132.18, '12336461');
INSERT INTO `ct_CuentasxPagar` VALUES (534, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 990.06, '2017-06-08', 990.06, '12337663');
INSERT INTO `ct_CuentasxPagar` VALUES (535, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 2161.50, '2017-06-08', 2161.50, '504');
INSERT INTO `ct_CuentasxPagar` VALUES (536, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1228.95, '2017-06-08', 1228.95, '19849');
INSERT INTO `ct_CuentasxPagar` VALUES (537, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 6291.84, '2017-06-08', 6291.84, '39313');
INSERT INTO `ct_CuentasxPagar` VALUES (538, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', 2320.00, '2017-06-08', 2320.00, '5170');
INSERT INTO `ct_CuentasxPagar` VALUES (539, 'JOSE LUIS BALLEZA ALVARADO', 'ANUNCIO LED RED ', 11165.00, '2017-06-08', 11165.00, '1279');
INSERT INTO `ct_CuentasxPagar` VALUES (540, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 4449.12, '2017-06-08', 4449.12, '20617');
INSERT INTO `ct_CuentasxPagar` VALUES (541, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-06-08', 1500.00, '31FCO     ');
INSERT INTO `ct_CuentasxPagar` VALUES (542, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-06-08', 319.00, '42598760');
INSERT INTO `ct_CuentasxPagar` VALUES (543, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-06-08', 319.00, '42598762');
INSERT INTO `ct_CuentasxPagar` VALUES (544, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-06-08', 319.00, '42598764');
INSERT INTO `ct_CuentasxPagar` VALUES (545, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-06-08', 319.00, '42598766');
INSERT INTO `ct_CuentasxPagar` VALUES (546, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 319.00, '2017-06-08', 319.00, '42598767');
INSERT INTO `ct_CuentasxPagar` VALUES (547, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 1499.00, '2017-06-08', 1499.00, '9100');
INSERT INTO `ct_CuentasxPagar` VALUES (548, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2017-06-08', 1160.00, '3914');
INSERT INTO `ct_CuentasxPagar` VALUES (549, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 2668.61, '2017-06-12', 2668.61, '139291230');
INSERT INTO `ct_CuentasxPagar` VALUES (550, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', 4560.00, '2017-06-12', 4560.00, '392');
INSERT INTO `ct_CuentasxPagar` VALUES (551, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1910.52, '2017-06-13', 1910.52, '71990');
INSERT INTO `ct_CuentasxPagar` VALUES (552, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 15443.46, '2017-06-13', 15443.46, '511');
INSERT INTO `ct_CuentasxPagar` VALUES (553, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 2164.56, '2017-06-13', 2164.56, '1128');
INSERT INTO `ct_CuentasxPagar` VALUES (554, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 15444.00, '2017-06-13', 15444.00, '1649');
INSERT INTO `ct_CuentasxPagar` VALUES (555, 'MEDIX DEL NORTE SA DE CV                                                                                                        ', 'BOTIQUIN', 895.53, '2017-06-13', 895.53, '22787');
INSERT INTO `ct_CuentasxPagar` VALUES (556, 'MEDIX DEL NORTE SA DE CV                                                                                                        ', 'BOTIQUIN', 107.37, '2017-06-13', 107.37, '22788');
INSERT INTO `ct_CuentasxPagar` VALUES (557, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-06-13', 1500.00, 'DD54E     ');
INSERT INTO `ct_CuentasxPagar` VALUES (558, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 34800.00, '2017-06-14', 34800.00, '430');
INSERT INTO `ct_CuentasxPagar` VALUES (559, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 14384.00, '2017-06-16', 14384.00, '433');
INSERT INTO `ct_CuentasxPagar` VALUES (560, 'SERVICIOS ESPECIALES MARTINEZ CHAVARRIA', 'CAMION DIA DEL SINDICATO', 8200.00, '2017-06-16', 8200.00, '13368');
INSERT INTO `ct_CuentasxPagar` VALUES (561, 'MIGUEL ANGEL VILLAREAL MOLINA                                                                                                   ', 'MTTO AUTOMOVIL', 1682.00, '2017-06-19', 1682.00, '38');
INSERT INTO `ct_CuentasxPagar` VALUES (562, 'MIGUEL ANGEL VILLAREAL MOLINA                                                                                                   ', 'MTTO AUTOMOVIL', 5916.00, '2017-06-19', 5916.00, '41');
INSERT INTO `ct_CuentasxPagar` VALUES (563, 'MIGUEL ANGEL VILLAREAL MOLINA                                                                                                   ', 'MTTO AUTOMOVIL', 3306.00, '2017-06-20', 3306.00, '36');
INSERT INTO `ct_CuentasxPagar` VALUES (564, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 619.00, '2017-06-21', 619.00, '139278988');
INSERT INTO `ct_CuentasxPagar` VALUES (565, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 889.91, '2017-06-22', 889.91, '1566');
INSERT INTO `ct_CuentasxPagar` VALUES (566, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1451.00, '2017-06-22', 1451.00, '562');
INSERT INTO `ct_CuentasxPagar` VALUES (567, 'EXCELENCIA EN BOTONES SA DE CV                                                                                                  ', 'BOTONES RED', 1740.00, '2017-06-22', 1740.00, '3326');
INSERT INTO `ct_CuentasxPagar` VALUES (568, 'EXCELENCIA EN BOTONES SA DE CV                                                                                                  ', 'BOTONES RED', 5220.00, '2017-06-22', 5220.00, '3329');
INSERT INTO `ct_CuentasxPagar` VALUES (569, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1175.45, '2017-06-22', 1175.45, '20047');
INSERT INTO `ct_CuentasxPagar` VALUES (570, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 2270.12, '2017-06-22', 2270.12, '1136');
INSERT INTO `ct_CuentasxPagar` VALUES (571, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'MAT DE ASEO Y LIMPIEZA', 3873.75, '2017-06-22', 3873.75, '3699');
INSERT INTO `ct_CuentasxPagar` VALUES (572, 'MEDIX DEL NORTE SA DE CV                                                                                                        ', 'BOTIQUIN', 1276.29, '2017-06-22', 1276.29, '22885');
INSERT INTO `ct_CuentasxPagar` VALUES (573, 'MEDIX DEL NORTE SA DE CV                                                                                                        ', 'BOTIQUIN', 70.18, '2017-06-22', 70.18, '22886');
INSERT INTO `ct_CuentasxPagar` VALUES (574, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-06-22', 1500.00, '79FOB     ');
INSERT INTO `ct_CuentasxPagar` VALUES (575, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 33757.00, '2017-06-26', 33757.00, '23994712');
INSERT INTO `ct_CuentasxPagar` VALUES (576, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 248.99, '2017-06-26', 248.99, '68212384');
INSERT INTO `ct_CuentasxPagar` VALUES (577, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 248.99, '2017-06-26', 248.99, '68212385');
INSERT INTO `ct_CuentasxPagar` VALUES (578, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 248.99, '2017-06-26', 248.99, '68212386');
INSERT INTO `ct_CuentasxPagar` VALUES (579, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 248.99, '2017-06-26', 248.99, '68212388');
INSERT INTO `ct_CuentasxPagar` VALUES (580, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 248.99, '2017-06-26', 248.99, '68212387');
INSERT INTO `ct_CuentasxPagar` VALUES (581, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 1875.71, '2017-06-27', 1875.71, '198704C   ');
INSERT INTO `ct_CuentasxPagar` VALUES (582, 'CONFECCIONES MODI S DE RL DE CV                                                                                                 ', 'MAQUINA DE BROCHES', 19140.00, '2017-06-27', 19140.00, '206');
INSERT INTO `ct_CuentasxPagar` VALUES (583, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1771.55, '2017-06-27', 1771.55, '20048');
INSERT INTO `ct_CuentasxPagar` VALUES (584, 'GRUPO INDUSTRIAL JM SA DE CV                                                                                                    ', 'ENTRETELA', 9112.96, '2017-06-27', 9112.96, '194063');
INSERT INTO `ct_CuentasxPagar` VALUES (585, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 5960.08, '2017-06-27', 5960.08, '1137');
INSERT INTO `ct_CuentasxPagar` VALUES (586, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 2888.40, '2017-06-27', 2888.40, '1138');
INSERT INTO `ct_CuentasxPagar` VALUES (587, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2017-06-27', 19720.00, '397');
INSERT INTO `ct_CuentasxPagar` VALUES (588, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-06-27', 1500.00, '05MJ6     ');
INSERT INTO `ct_CuentasxPagar` VALUES (589, 'ARTES GRAFICAS CARNEVALI S. DE R.L. M.I.                                                                                        ', 'COLGANTES NEGRO', 1566.00, '2017-06-30', 1566.00, '2703');
INSERT INTO `ct_CuentasxPagar` VALUES (590, 'ARTES GRAFICAS CARNEVALI S. DE R.L. M.I.                                                                                        ', 'PUBLICIDAD IMPRESA RED', 22533.00, '2017-06-30', 22533.00, '2699');
INSERT INTO `ct_CuentasxPagar` VALUES (591, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', 14979.00, '2017-06-30', 14979.00, '1124');
INSERT INTO `ct_CuentasxPagar` VALUES (592, 'MARIA TERESITA DE JESUS CHONG MUNOZ                                                                                             ', 'TEÑIDO BOTON', 403.68, '2017-06-30', 403.68, '1484');
INSERT INTO `ct_CuentasxPagar` VALUES (593, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 171757.56, '2017-06-30', 171757.56, '437');
INSERT INTO `ct_CuentasxPagar` VALUES (594, 'COMERCIALIZADORA GULLAX SA DE CV ', 'INSTALACION DE CAMARAS', 13340.00, '2017-07-03', 13340.00, '11777');
INSERT INTO `ct_CuentasxPagar` VALUES (595, 'NUVA WAL-MART DE MEXICO S DE RL DE CV                                                                                           ', 'PANTALLA Y SOPORTE', 6898.00, '2017-07-03', 6898.00, '118494');
INSERT INTO `ct_CuentasxPagar` VALUES (596, 'SILVIA ELIZABETH MARTINEZ MIRELES', 'PAPEL TAPIZ RED', 13630.00, '2017-07-03', 13630.00, '530');
INSERT INTO `ct_CuentasxPagar` VALUES (597, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 1132.18, '2017-07-05', 1132.18, '12464970');
INSERT INTO `ct_CuentasxPagar` VALUES (598, 'ADT PRIVATE SEGURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 990.06, '2017-07-05', 990.06, '12466159');
INSERT INTO `ct_CuentasxPagar` VALUES (599, 'CAVAZOS OVIEDO Y ASOCIADOS SC', 'RATIFICAR FIRMA CERTIFICACION COM EXT', 2900.00, '2017-07-05', 2900.00, '14');
INSERT INTO `ct_CuentasxPagar` VALUES (600, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-07-05', 1500.00, '3458');
INSERT INTO `ct_CuentasxPagar` VALUES (601, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 3399.61, '2017-07-05', 3399.61, '23695');
INSERT INTO `ct_CuentasxPagar` VALUES (602, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 2674.44, '2017-07-11', 2674.44, '140539627\r');
INSERT INTO `ct_CuentasxPagar` VALUES (603, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 15443.46, '2017-07-11', 15443.46, '524');
INSERT INTO `ct_CuentasxPagar` VALUES (604, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1451.00, '2017-07-11', 1451.00, '647');
INSERT INTO `ct_CuentasxPagar` VALUES (605, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1063.67, '2017-07-11', 1063.67, '20217');
INSERT INTO `ct_CuentasxPagar` VALUES (606, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 4486.23, '2017-07-11', 4486.23, '44');
INSERT INTO `ct_CuentasxPagar` VALUES (607, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 15444.00, '2017-07-11', 15444.00, '1689');
INSERT INTO `ct_CuentasxPagar` VALUES (608, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-07-11', 1500.00, '3479');
INSERT INTO `ct_CuentasxPagar` VALUES (609, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 786.00, '2017-07-11', 786.00, '44369651');
INSERT INTO `ct_CuentasxPagar` VALUES (610, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 786.00, '2017-07-11', 786.00, '44369650');
INSERT INTO `ct_CuentasxPagar` VALUES (611, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 786.00, '2017-07-11', 786.00, '44369652');
INSERT INTO `ct_CuentasxPagar` VALUES (612, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 786.00, '2017-07-11', 786.00, '44369653');
INSERT INTO `ct_CuentasxPagar` VALUES (613, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 786.00, '2017-07-11', 786.00, '44369654');
INSERT INTO `ct_CuentasxPagar` VALUES (614, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', 4600.00, '2017-07-11', 4600.00, '691235');
INSERT INTO `ct_CuentasxPagar` VALUES (615, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 1499.00, '2017-07-11', 1499.00, '600009052');
INSERT INTO `ct_CuentasxPagar` VALUES (616, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2017-07-11', 1160.00, '4029');
INSERT INTO `ct_CuentasxPagar` VALUES (617, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 619.00, '2017-07-18', 619.00, '140525888');
INSERT INTO `ct_CuentasxPagar` VALUES (618, 'AQUA FINA SA DE CV                                                                                                              ', 'AGUA DESTILADA', 1760.00, '2017-07-21', 1760.00, '36006');
INSERT INTO `ct_CuentasxPagar` VALUES (619, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1910.52, '2017-07-21', 1910.52, '73042');
INSERT INTO `ct_CuentasxPagar` VALUES (620, 'EMBROIDERYLAND S DE RL DE CV                                                                                                    ', 'BORDADO EN CAMISA', 4765.28, '2017-07-21', 4765.28, '573');
INSERT INTO `ct_CuentasxPagar` VALUES (621, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-07-21', 1500.00, '3508');
INSERT INTO `ct_CuentasxPagar` VALUES (622, 'ELASTICOS, CIERRES Y HERRAJES LA GAMUSA SA DE CV                                                                                ', 'VARILLA', 1879.20, '2017-07-26', 1879.20, '54342');
INSERT INTO `ct_CuentasxPagar` VALUES (623, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 889.91, '2017-07-27', 889.91, '1648');
INSERT INTO `ct_CuentasxPagar` VALUES (624, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 196.04, '2017-07-27', 196.04, '1609');
INSERT INTO `ct_CuentasxPagar` VALUES (625, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1451.00, '2017-07-27', 1451.00, '689');
INSERT INTO `ct_CuentasxPagar` VALUES (626, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 31932.00, '2017-07-27', 31932.00, '242607');
INSERT INTO `ct_CuentasxPagar` VALUES (627, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1033.28, '2017-07-27', 1033.28, '20358');
INSERT INTO `ct_CuentasxPagar` VALUES (628, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 31519.52, '2017-07-27', 31519.52, '40066');
INSERT INTO `ct_CuentasxPagar` VALUES (629, 'INDUSTRIAS CONMAR SA DE CV                                                                                                      ', 'TELA POLY', 7828.03, '2017-07-27', 7828.03, '7458');
INSERT INTO `ct_CuentasxPagar` VALUES (630, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'MAT DE ASEO Y LIMPIEZA', 3435.27, '2017-07-27', 3435.27, '3882');
INSERT INTO `ct_CuentasxPagar` VALUES (631, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-07-27', 1500.00, '2411000003');
INSERT INTO `ct_CuentasxPagar` VALUES (632, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2017-07-28', 19720.00, '461');
INSERT INTO `ct_CuentasxPagar` VALUES (633, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', 4600.00, '2017-08-01', 4600.00, '8668');
INSERT INTO `ct_CuentasxPagar` VALUES (634, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', 14979.00, '2017-08-02', 14979.00, '1267');
INSERT INTO `ct_CuentasxPagar` VALUES (635, 'ANATHEN, SA DE CV                                                                                                               ', 'PAQUETE PUBLICIDAD EXAMEDIO DE C', 38000.00, '2017-08-03', 38000.00, '50');
INSERT INTO `ct_CuentasxPagar` VALUES (636, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 990.06, '2017-08-04', 990.06, '12593837');
INSERT INTO `ct_CuentasxPagar` VALUES (637, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 1132.18, '2017-08-04', 1132.18, '125925651');
INSERT INTO `ct_CuentasxPagar` VALUES (638, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2017-08-04', 1160.00, '4132');
INSERT INTO `ct_CuentasxPagar` VALUES (639, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 3129.25, '2017-08-08', 3129.25, '201240');
INSERT INTO `ct_CuentasxPagar` VALUES (640, 'ABA SEGUROS SA DE CV                                                                                                            ', 'SEGUROS', 3803.96, '2017-08-10', 3803.96, '23399497');
INSERT INTO `ct_CuentasxPagar` VALUES (641, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 2681.42, '2017-08-10', 2681.42, '141637883');
INSERT INTO `ct_CuentasxPagar` VALUES (642, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1146.14, '2017-08-11', 1146.14, '20512');
INSERT INTO `ct_CuentasxPagar` VALUES (643, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', 2320.00, '2017-08-11', 2320.00, '5290');
INSERT INTO `ct_CuentasxPagar` VALUES (644, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 5790.72, '2017-08-11', 5790.72, '1174');
INSERT INTO `ct_CuentasxPagar` VALUES (645, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 3011.36, '2017-08-11', 3011.36, '1175');
INSERT INTO `ct_CuentasxPagar` VALUES (646, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 3979.67, '2017-08-11', 3979.67, '48');
INSERT INTO `ct_CuentasxPagar` VALUES (647, 'LA DISTRIBUIDORA DE CASIMIRES                                                                                                   ', 'TELAS', 46917.13, '2017-08-11', 46917.13, '279615');
INSERT INTO `ct_CuentasxPagar` VALUES (648, 'LA DISTRIBUIDORA DE CASIMIRES                                                                                                   ', 'TELAS', 6560.96, '2017-08-11', 6560.96, '279626');
INSERT INTO `ct_CuentasxPagar` VALUES (649, 'MARIA TERESITA DE JESUS CHONG MUNOZ                                                                                             ', 'BOTON CAMISERO', 3062.40, '2017-08-11', 3062.40, '1512');
INSERT INTO `ct_CuentasxPagar` VALUES (650, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 15444.00, '2017-08-11', 15444.00, '288869');
INSERT INTO `ct_CuentasxPagar` VALUES (651, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-08-11', 1500.00, '3557');
INSERT INTO `ct_CuentasxPagar` VALUES (652, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-08-11', 329.00, '45565661');
INSERT INTO `ct_CuentasxPagar` VALUES (653, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-08-11', 329.00, '45565658\r\n        ');
INSERT INTO `ct_CuentasxPagar` VALUES (654, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-08-11', 329.00, '45565663');
INSERT INTO `ct_CuentasxPagar` VALUES (655, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-08-11', 329.00, '45565662\r\n        ');
INSERT INTO `ct_CuentasxPagar` VALUES (656, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-08-11', 329.00, '45565660\r\n        ');
INSERT INTO `ct_CuentasxPagar` VALUES (657, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 15443.46, '2017-08-14', 15443.46, '536');
INSERT INTO `ct_CuentasxPagar` VALUES (658, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ RED', 2108.00, '2017-08-16', 2108.00, '160817');
INSERT INTO `ct_CuentasxPagar` VALUES (659, 'EMBROTEX SA DE CV                                                                                                               ', 'ETIQUETAS', 1769.00, '2017-08-16', 1769.00, '8894');
INSERT INTO `ct_CuentasxPagar` VALUES (660, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-08-18', 1500.00, '180817');
INSERT INTO `ct_CuentasxPagar` VALUES (661, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2017-08-22', 19720.00, '503');
INSERT INTO `ct_CuentasxPagar` VALUES (662, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 35311.65, '2017-08-23', 35311.65, '245721');
INSERT INTO `ct_CuentasxPagar` VALUES (663, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1077.78, '2017-08-23', 1077.78, '20715');
INSERT INTO `ct_CuentasxPagar` VALUES (664, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 3503.20, '2017-08-23', 3503.20, '1178');
INSERT INTO `ct_CuentasxPagar` VALUES (665, 'MOLDES Y EMPAQUES INDUSTRIALES JMORASA SA DE CV                                                                                 ', 'EMPAQUES TIPO U', 1595.00, '2017-08-23', 1595.00, '4193');
INSERT INTO `ct_CuentasxPagar` VALUES (666, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-08-23', 1500.00, '230817');
INSERT INTO `ct_CuentasxPagar` VALUES (667, 'ARTES GRAFICAS CARNEVALI S. DE R.L. M.I.                                                                                        ', 'PUBLICIDAD RES', 3480.00, '2017-08-30', 3480.00, '2811');
INSERT INTO `ct_CuentasxPagar` VALUES (668, 'BALDEMAR FRANCISCO MARTINEZ TIJERINA', 'ACTUALIZACION DE PLANOS', 50087.21, '2017-09-01', 50087.21, '143');
INSERT INTO `ct_CuentasxPagar` VALUES (669, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 1920.96, '2017-09-01', 1920.96, '1719');
INSERT INTO `ct_CuentasxPagar` VALUES (670, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1868.06, '2017-09-01', 1868.06, '74503');
INSERT INTO `ct_CuentasxPagar` VALUES (671, 'CASA DIAZ DE MAQUINAS DE COSER, SA DE CV                                                                                        ', 'MTTO MAQUINARIA', 3733.02, '2017-09-01', 3733.02, '108139');
INSERT INTO `ct_CuentasxPagar` VALUES (672, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1451.00, '2017-09-01', 1451.00, '831');
INSERT INTO `ct_CuentasxPagar` VALUES (673, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1450.00, '2017-09-01', 1450.00, '843');
INSERT INTO `ct_CuentasxPagar` VALUES (674, 'MARIA ISABEL GARZA CANTU', 'HULE DE SILICON', 2592.50, '2017-09-01', 2592.50, '3468');
INSERT INTO `ct_CuentasxPagar` VALUES (675, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-09-01', 1500.00, '3628');
INSERT INTO `ct_CuentasxPagar` VALUES (676, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', 14979.00, '2017-09-06', 14979.00, '1352');
INSERT INTO `ct_CuentasxPagar` VALUES (677, 'HILDA GUADALUPE CAVAZOS GARZA', 'BORDADOS', 1498.72, '2017-09-06', 1498.72, '86');
INSERT INTO `ct_CuentasxPagar` VALUES (678, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 1132.18, '2017-09-08', 1132.18, '12849314');
INSERT INTO `ct_CuentasxPagar` VALUES (679, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 990.06, '2017-09-08', 990.06, '12850459');
INSERT INTO `ct_CuentasxPagar` VALUES (680, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 15444.00, '2017-09-08', 15444.00, '552');
INSERT INTO `ct_CuentasxPagar` VALUES (681, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1741.04, '2017-09-08', 1741.04, '20737');
INSERT INTO `ct_CuentasxPagar` VALUES (682, 'LA DISTRIBUIDORA DE CASIMIRES                                                                                                   ', 'TELAS', 4672.48, '2017-09-08', 4672.48, '281915');
INSERT INTO `ct_CuentasxPagar` VALUES (683, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'MAT DE ASEO Y LIMPIEZA', 4156.20, '2017-09-08', 4156.20, '4031');
INSERT INTO `ct_CuentasxPagar` VALUES (684, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 15444.00, '2017-09-08', 15444.00, '1769');
INSERT INTO `ct_CuentasxPagar` VALUES (685, 'MOLDES Y EMPAQUES INDUSTRIALES JMORASA SA DE CV                                                                                 ', 'EMPAQUES TIPO U', 1595.00, '2017-09-08', 1595.00, '4249');
INSERT INTO `ct_CuentasxPagar` VALUES (686, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-09-08', 1500.00, '241100003');
INSERT INTO `ct_CuentasxPagar` VALUES (687, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2017-09-08', 1160.00, '4229');
INSERT INTO `ct_CuentasxPagar` VALUES (688, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-09-12', 329.00, '46768697');
INSERT INTO `ct_CuentasxPagar` VALUES (689, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-09-12', 329.00, '46768694');
INSERT INTO `ct_CuentasxPagar` VALUES (690, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-09-12', 329.00, '46768698');
INSERT INTO `ct_CuentasxPagar` VALUES (691, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-09-12', 329.00, '46768696');
INSERT INTO `ct_CuentasxPagar` VALUES (692, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-09-12', 329.00, '46768695');
INSERT INTO `ct_CuentasxPagar` VALUES (693, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', 4600.00, '2017-09-12', 4600.00, '439');
INSERT INTO `ct_CuentasxPagar` VALUES (694, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 1499.00, '2017-09-12', 1499.00, '6537');
INSERT INTO `ct_CuentasxPagar` VALUES (695, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 2674.69, '2017-09-13', 2674.69, '7767371');
INSERT INTO `ct_CuentasxPagar` VALUES (696, 'GRUPO MI PLAYERA DE MEXICO SA DE CV', 'PLAYERAS', 11677.02, '2017-09-13', 11677.02, '134565');
INSERT INTO `ct_CuentasxPagar` VALUES (697, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 922.90, '2017-09-14', 922.90, '1758');
INSERT INTO `ct_CuentasxPagar` VALUES (698, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 2872.00, '2017-09-14', 2872.00, '921');
INSERT INTO `ct_CuentasxPagar` VALUES (699, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1088.66, '2017-09-14', 1088.66, '20839');
INSERT INTO `ct_CuentasxPagar` VALUES (700, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2017-09-14', 19720.00, '540');
INSERT INTO `ct_CuentasxPagar` VALUES (701, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-09-15', 1500.00, '3662');
INSERT INTO `ct_CuentasxPagar` VALUES (702, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ RED', 2170.00, '2017-09-19', 2170.00, '190917');
INSERT INTO `ct_CuentasxPagar` VALUES (703, 'CIERRES AUTOMATICOS NATIONAL, SA DE CV                                                                                          ', 'CIERRES', 2428.81, '2017-09-21', 2428.81, '2107');
INSERT INTO `ct_CuentasxPagar` VALUES (704, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 740.50, '2017-09-21', 740.50, '967');
INSERT INTO `ct_CuentasxPagar` VALUES (705, 'EMBROTEX SA DE CV                                                                                                               ', 'ETIQUETAS', 1719.47, '2017-09-21', 1719.47, '9051');
INSERT INTO `ct_CuentasxPagar` VALUES (706, 'GRUPO INDUSTRIAL JM SA DE CV                                                                                                    ', 'ENTRETELA', 3944.00, '2017-09-21', 3944.00, '194312');
INSERT INTO `ct_CuentasxPagar` VALUES (707, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 6393.92, '2017-09-21', 6393.92, '41209');
INSERT INTO `ct_CuentasxPagar` VALUES (708, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 3016.00, '2017-09-21', 3016.00, '1198');
INSERT INTO `ct_CuentasxPagar` VALUES (709, 'LA DISTRIBUIDORA DE CASIMIRES                                                                                                   ', 'TELAS', 18159.80, '2017-09-21', 18159.80, '284086C   ');
INSERT INTO `ct_CuentasxPagar` VALUES (710, 'LIV MEDICAL SA DE CV                                                                                                            ', 'BOTIQUIN', 4960.57, '2017-09-21', 4960.57, '8105');
INSERT INTO `ct_CuentasxPagar` VALUES (711, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-09-21', 1500.00, '210917');
INSERT INTO `ct_CuentasxPagar` VALUES (712, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 2126.93, '2017-09-25', 2126.93, '204236');
INSERT INTO `ct_CuentasxPagar` VALUES (713, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 30291.00, '2017-09-25', 30291.00, '248232');
INSERT INTO `ct_CuentasxPagar` VALUES (714, 'FISCALIA GLOBAL SC                                                                                                              ', 'SUSCRIPCION ANUAL', 3097.20, '2017-09-27', 3097.20, '100');
INSERT INTO `ct_CuentasxPagar` VALUES (715, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 17748.00, '2017-09-27', 17748.00, '568');
INSERT INTO `ct_CuentasxPagar` VALUES (716, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1910.52, '2017-09-28', 1910.52, '75354');
INSERT INTO `ct_CuentasxPagar` VALUES (717, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 740.50, '2017-09-28', 740.50, '937');
INSERT INTO `ct_CuentasxPagar` VALUES (718, 'INDUSTRIAS CONMAR SA DE CV                                                                                                      ', 'TELA POLY', 8571.47, '2017-09-28', 8571.47, '7677');
INSERT INTO `ct_CuentasxPagar` VALUES (719, 'LA DISTRIBUIDORA DE CASIMIRES                                                                                                   ', 'TELAS', 5207.12, '2017-09-28', 5207.12, '285092');
INSERT INTO `ct_CuentasxPagar` VALUES (720, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-09-28', 1500.00, '280917');
INSERT INTO `ct_CuentasxPagar` VALUES (721, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 1279.96, '2017-09-28', 1279.96, '25429');
INSERT INTO `ct_CuentasxPagar` VALUES (722, 'AQUA FINA SA DE CV                                                                                                              ', 'AGUA DESTILADA', 1760.00, '2017-10-04', 1760.00, '37104');
INSERT INTO `ct_CuentasxPagar` VALUES (723, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', 14979.00, '2017-10-04', 14979.00, '1541');
INSERT INTO `ct_CuentasxPagar` VALUES (724, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 1132.18, '2017-10-05', 1132.18, '76265');
INSERT INTO `ct_CuentasxPagar` VALUES (725, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 990.06, '2017-10-05', 990.06, '77397');
INSERT INTO `ct_CuentasxPagar` VALUES (726, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 3781.51, '2017-10-05', 3781.51, '1848');
INSERT INTO `ct_CuentasxPagar` VALUES (727, 'CIBERNETICA Y TECNOLOGIA SA DE CV                                                                                               ', 'TIMBRES FISCALES', 2610.00, '2017-10-05', 2610.00, '6405');
INSERT INTO `ct_CuentasxPagar` VALUES (728, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 15443.46, '2017-10-05', 15443.46, '565');
INSERT INTO `ct_CuentasxPagar` VALUES (729, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1068.85, '2017-10-05', 1068.85, '21038');
INSERT INTO `ct_CuentasxPagar` VALUES (730, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', 2320.00, '2017-10-05', 2320.00, '5403');
INSERT INTO `ct_CuentasxPagar` VALUES (731, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 2315.36, '2017-10-05', 2315.36, '1213');
INSERT INTO `ct_CuentasxPagar` VALUES (732, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 4046.08, '2017-10-05', 4046.08, '1214');
INSERT INTO `ct_CuentasxPagar` VALUES (733, 'MIGUEL ANGEL VILLAREAL MOLINA                                                                                                   ', 'MTTO AUTOMOVIL', 2552.00, '2017-10-05', 2552.00, '8');
INSERT INTO `ct_CuentasxPagar` VALUES (734, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-10-05', 1500.00, '51017');
INSERT INTO `ct_CuentasxPagar` VALUES (735, 'PATRICIA SEVILLA MARTINEZ', 'MTTO AIRE LAVADO FRONTAL', 1102.00, '2017-10-05', 1102.00, '82');
INSERT INTO `ct_CuentasxPagar` VALUES (736, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 15444.00, '2017-10-06', 15444.00, '1810');
INSERT INTO `ct_CuentasxPagar` VALUES (737, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 2684.91, '2017-10-09', 2684.91, '53519');
INSERT INTO `ct_CuentasxPagar` VALUES (738, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-10-09', 329.00, '75095');
INSERT INTO `ct_CuentasxPagar` VALUES (739, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-10-09', 329.00, '75096');
INSERT INTO `ct_CuentasxPagar` VALUES (740, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-10-09', 329.00, '75098');
INSERT INTO `ct_CuentasxPagar` VALUES (741, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-10-09', 329.00, '75097');
INSERT INTO `ct_CuentasxPagar` VALUES (742, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-10-09', 329.00, '75094');
INSERT INTO `ct_CuentasxPagar` VALUES (743, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 619.00, '2017-10-12', 619.00, '143935967');
INSERT INTO `ct_CuentasxPagar` VALUES (744, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 712.08, '2017-10-12', 712.08, '988');
INSERT INTO `ct_CuentasxPagar` VALUES (745, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 2860.56, '2017-10-12', 2860.56, '1218');
INSERT INTO `ct_CuentasxPagar` VALUES (746, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'MAT DE ASEO Y LIMPIEZA', 4406.76, '2017-10-12', 4406.76, '4166');
INSERT INTO `ct_CuentasxPagar` VALUES (747, 'MARIA TERESITA DE JESUS CHONG MUNOZ                                                                                             ', 'BROCHE BOTON', 3990.40, '2017-10-12', 3990.40, '1617');
INSERT INTO `ct_CuentasxPagar` VALUES (748, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-10-12', 1500.00, '121017');
INSERT INTO `ct_CuentasxPagar` VALUES (749, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 1499.00, '2017-10-12', 1499.00, '121017');
INSERT INTO `ct_CuentasxPagar` VALUES (750, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2017-10-12', 1160.00, '4350');
INSERT INTO `ct_CuentasxPagar` VALUES (751, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', 4600.00, '2017-10-13', 4600.00, '9856');
INSERT INTO `ct_CuentasxPagar` VALUES (752, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ RED', 2142.00, '2017-10-17', 2142.00, '171017');
INSERT INTO `ct_CuentasxPagar` VALUES (753, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2017-10-17', 19720.00, '586');
INSERT INTO `ct_CuentasxPagar` VALUES (754, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'GASTOS DE INSTALACION RED', 6690.00, '2017-10-17', 6690.00, '494');
INSERT INTO `ct_CuentasxPagar` VALUES (755, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 2191.50, '2017-10-19', 2191.50, '1023');
INSERT INTO `ct_CuentasxPagar` VALUES (756, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 961.87, '2017-10-19', 961.87, '21241');
INSERT INTO `ct_CuentasxPagar` VALUES (757, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 4231.68, '2017-10-19', 4231.68, '41641');
INSERT INTO `ct_CuentasxPagar` VALUES (758, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-10-19', 1500.00, '191017');
INSERT INTO `ct_CuentasxPagar` VALUES (759, 'PATRICIA SEVILLA MARTINEZ', 'MTTO AIRE LAVADO FRONTAL', 4611.00, '2017-10-19', 4611.00, '83');
INSERT INTO `ct_CuentasxPagar` VALUES (760, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 29084.00, '2017-10-24', 29084.00, '251136');
INSERT INTO `ct_CuentasxPagar` VALUES (761, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1194.22, '2017-10-26', 1194.22, '21280');
INSERT INTO `ct_CuentasxPagar` VALUES (762, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 2251.07, '2017-10-26', 2251.07, '53');
INSERT INTO `ct_CuentasxPagar` VALUES (763, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 6160.91, '2017-10-26', 6160.91, '54');
INSERT INTO `ct_CuentasxPagar` VALUES (764, 'VICTOR HUGO PEDROZA GALVAN                                                                                                      ', 'REPARACION POINTER', 9280.00, '2017-10-26', 9280.00, '471');
INSERT INTO `ct_CuentasxPagar` VALUES (765, 'VICTOR HUGO PEDROZA GALVAN                                                                                                      ', 'REPARACION POINTER', 788.80, '2017-10-26', 788.80, '486');
INSERT INTO `ct_CuentasxPagar` VALUES (766, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', 1478.18, '2017-11-01', 1478.18, '206449');
INSERT INTO `ct_CuentasxPagar` VALUES (767, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 1132.18, '2017-11-01', 1132.18, '12976265');
INSERT INTO `ct_CuentasxPagar` VALUES (768, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 990.06, '2017-11-01', 990.06, '12977397');
INSERT INTO `ct_CuentasxPagar` VALUES (769, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 922.90, '2017-11-01', 922.90, '1941');
INSERT INTO `ct_CuentasxPagar` VALUES (770, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 2161.50, '2017-11-01', 2161.50, '1111');
INSERT INTO `ct_CuentasxPagar` VALUES (771, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1112.47, '2017-11-01', 1112.47, '21362');
INSERT INTO `ct_CuentasxPagar` VALUES (772, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 2329.86, '2017-11-01', 2329.86, '1235');
INSERT INTO `ct_CuentasxPagar` VALUES (773, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 6813.84, '2017-11-01', 6813.84, '1236');
INSERT INTO `ct_CuentasxPagar` VALUES (774, 'LA DISTRIBUIDORA DE CASIMIRES                                                                                                   ', 'TELAS', 36355.56, '2017-11-01', 36355.56, '288869');
INSERT INTO `ct_CuentasxPagar` VALUES (775, 'MARIA TERESITA DE JESUS CHONG MUNOZ                                                                                             ', 'TEÑIDO BOTON', 245.64, '2017-11-01', 245.64, '1638');
INSERT INTO `ct_CuentasxPagar` VALUES (776, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-11-01', 1500.00, '11117');
INSERT INTO `ct_CuentasxPagar` VALUES (777, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 427.77, '2017-11-01', 427.77, '26132');
INSERT INTO `ct_CuentasxPagar` VALUES (778, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 1645.74, '2017-11-01', 1645.74, '26174');
INSERT INTO `ct_CuentasxPagar` VALUES (779, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 224.33, '2017-11-01', 224.33, '26560');
INSERT INTO `ct_CuentasxPagar` VALUES (780, 'AXA SEGUROS SA DE CV                                                                                                            ', 'SEGUROS', 3547.68, '2017-11-03', 3547.68, '7225');
INSERT INTO `ct_CuentasxPagar` VALUES (781, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1544.42, '2017-11-03', 1544.42, '77154');
INSERT INTO `ct_CuentasxPagar` VALUES (782, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', 14979.00, '2017-11-03', 14979.00, '1655');
INSERT INTO `ct_CuentasxPagar` VALUES (783, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2017-11-03', 19720.00, '618');
INSERT INTO `ct_CuentasxPagar` VALUES (784, 'ROMAN TORRES LOREDO                                                                                                             ', 'BANDAS E INSTALACION', 6429.88, '2017-11-03', 6429.88, '677');
INSERT INTO `ct_CuentasxPagar` VALUES (785, 'RECOLECTORA DE RESIDUOS COMERCIALES SA DE CV                                                                                    ', 'RECOLECCION DE BASURA', 2946.40, '2017-11-05', 2946.40, '51102');
INSERT INTO `ct_CuentasxPagar` VALUES (786, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 2656.98, '2017-11-07', 2656.98, '144894523');
INSERT INTO `ct_CuentasxPagar` VALUES (787, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-11-07', 329.00, '49180583');
INSERT INTO `ct_CuentasxPagar` VALUES (788, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-11-07', 329.00, '49180582');
INSERT INTO `ct_CuentasxPagar` VALUES (789, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-11-07', 329.00, '49180581');
INSERT INTO `ct_CuentasxPagar` VALUES (790, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-11-07', 329.00, '49180580');
INSERT INTO `ct_CuentasxPagar` VALUES (791, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-11-07', 329.00, '49180579');
INSERT INTO `ct_CuentasxPagar` VALUES (792, 'ABA SEGUROS SA DE CV                                                                                                            ', 'SEGUROS', 2860.63, '2017-11-09', 2860.63, '58012');
INSERT INTO `ct_CuentasxPagar` VALUES (793, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1910.52, '2017-11-09', 1910.52, '76563');
INSERT INTO `ct_CuentasxPagar` VALUES (794, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 15446.46, '2017-11-09', 15446.46, '578');
INSERT INTO `ct_CuentasxPagar` VALUES (795, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 710.50, '2017-11-09', 710.50, '1137');
INSERT INTO `ct_CuentasxPagar` VALUES (796, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1451.00, '2017-11-09', 1451.00, '1192');
INSERT INTO `ct_CuentasxPagar` VALUES (797, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1085.62, '2017-11-09', 1085.62, '21524');
INSERT INTO `ct_CuentasxPagar` VALUES (798, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 4372.49, '2017-11-09', 4372.49, '53');
INSERT INTO `ct_CuentasxPagar` VALUES (799, 'MARIA GRISELDA CID DAVILA                                                                                                       ', 'MAQUINADO ESPIGA', 3596.00, '2017-11-09', 3596.00, '315');
INSERT INTO `ct_CuentasxPagar` VALUES (800, 'MARIA GRISELDA CID DAVILA                                                                                                       ', 'REPUESTO CHUMACERA', 2204.00, '2017-11-09', 2204.00, '320');
INSERT INTO `ct_CuentasxPagar` VALUES (801, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 15444.00, '2017-11-09', 15444.00, '1850');
INSERT INTO `ct_CuentasxPagar` VALUES (802, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-11-09', 1500.00, '91117');
INSERT INTO `ct_CuentasxPagar` VALUES (803, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 1499.00, '2017-11-09', 1499.00, '91117');
INSERT INTO `ct_CuentasxPagar` VALUES (804, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2017-11-09', 1160.00, '4429');
INSERT INTO `ct_CuentasxPagar` VALUES (805, 'NUVA WAL-MART DE MEXICO S DE RL DE CV                                                                                           ', 'CAJAS DE PLASTICO', 774.02, '2017-11-15', 774.02, '129517');
INSERT INTO `ct_CuentasxPagar` VALUES (806, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 619.00, '2017-11-16', 619.00, '144921283');
INSERT INTO `ct_CuentasxPagar` VALUES (807, 'ELASTICOS, CIERRES Y HERRAJES LA GAMUSA SA DE CV                                                                                ', 'VARILLA', 1879.20, '2017-11-16', 1879.20, '59195');
INSERT INTO `ct_CuentasxPagar` VALUES (808, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1862.96, '2017-11-16', 1862.96, '21555');
INSERT INTO `ct_CuentasxPagar` VALUES (809, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', 2320.00, '2017-11-16', 2320.00, '5487');
INSERT INTO `ct_CuentasxPagar` VALUES (810, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-11-16', 1500.00, '161117');
INSERT INTO `ct_CuentasxPagar` VALUES (811, 'ROMAN TORRES LOREDO                                                                                                             ', 'BANDAS E INSTALACION', 6429.88, '2017-11-16', 6429.88, '677');
INSERT INTO `ct_CuentasxPagar` VALUES (812, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ RED', 2309.64, '2017-11-17', 2309.64, '285408');
INSERT INTO `ct_CuentasxPagar` VALUES (813, 'EMBROTEX SA DE CV                                                                                                               ', 'ETIQUETAS', 3659.80, '2017-11-17', 3659.80, '9586');
INSERT INTO `ct_CuentasxPagar` VALUES (814, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 32021.00, '2017-11-23', 32021.00, '8264');
INSERT INTO `ct_CuentasxPagar` VALUES (815, 'LA DISTRIBUIDORA DE CASIMIRES                                                                                                   ', 'TELAS', 10859.92, '2017-11-23', 10859.92, '291587');
INSERT INTO `ct_CuentasxPagar` VALUES (816, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'MAT DE ASEO Y LIMPIEZA', 3872.00, '2017-11-23', 3872.00, '4328');
INSERT INTO `ct_CuentasxPagar` VALUES (817, 'MIGUEL ANGEL VILLAREAL MOLINA                                                                                                   ', 'MTTO AUTOMOVIL', 10092.00, '2017-11-23', 10092.00, '113');
INSERT INTO `ct_CuentasxPagar` VALUES (818, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-11-23', 1500.00, '231117');
INSERT INTO `ct_CuentasxPagar` VALUES (819, 'AQUA FINA SA DE CV                                                                                                              ', 'AGUA DESTILADA', 1760.00, '2017-11-24', 1760.00, '37691');
INSERT INTO `ct_CuentasxPagar` VALUES (820, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1910.52, '2017-11-30', 1910.52, '77317');
INSERT INTO `ct_CuentasxPagar` VALUES (821, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1451.00, '2017-11-30', 1451.00, '1142');
INSERT INTO `ct_CuentasxPagar` VALUES (822, 'GRUPO INDUSTRIAL JM SA DE CV                                                                                                    ', 'ENTRETELA', 1086.43, '2017-11-30', 1086.43, '195050');
INSERT INTO `ct_CuentasxPagar` VALUES (823, 'HARODITE SA DE CV                                                                                                               ', 'ENTRETELA', 19337.86, '2017-11-30', 19337.86, '8170');
INSERT INTO `ct_CuentasxPagar` VALUES (824, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-11-30', 1500.00, '84135');
INSERT INTO `ct_CuentasxPagar` VALUES (825, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 2428.81, '2017-11-30', 2428.81, '26863');
INSERT INTO `ct_CuentasxPagar` VALUES (826, 'SEGUROS AFIRME SA DE CV                                                                                                         ', 'SEGUROS', 11686.79, '2017-11-30', 11686.79, '2450386');
INSERT INTO `ct_CuentasxPagar` VALUES (827, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1086.43, '2017-12-01', 1086.43, '21684');
INSERT INTO `ct_CuentasxPagar` VALUES (828, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', 14979.00, '2017-12-04', 14979.00, '1749');
INSERT INTO `ct_CuentasxPagar` VALUES (829, 'INDUSTRIAS CONMAR SA DE CV                                                                                                      ', 'TELA POLY', 4373.20, '2017-12-04', 4373.20, '8049');
INSERT INTO `ct_CuentasxPagar` VALUES (830, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', 19720.00, '2017-12-04', 19720.00, '656');
INSERT INTO `ct_CuentasxPagar` VALUES (831, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 1132.18, '2017-12-07', 1132.18, '3534');
INSERT INTO `ct_CuentasxPagar` VALUES (832, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMA Y MONITOREO', 990.06, '2017-12-07', 990.06, '4658');
INSERT INTO `ct_CuentasxPagar` VALUES (833, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 922.90, '2017-12-07', 922.90, '2031');
INSERT INTO `ct_CuentasxPagar` VALUES (834, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', 15443.46, '2017-12-07', 15443.46, '600');
INSERT INTO `ct_CuentasxPagar` VALUES (835, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 5041.36, '2017-12-07', 5041.36, '1271');
INSERT INTO `ct_CuentasxPagar` VALUES (836, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', 4124.17, '2017-12-07', 4124.17, '1');
INSERT INTO `ct_CuentasxPagar` VALUES (837, 'LIV MEDICAL SA DE CV                                                                                                            ', 'BOTIQUIN', 4287.28, '2017-12-07', 4287.28, '8451');
INSERT INTO `ct_CuentasxPagar` VALUES (838, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', 15443.99, '2017-12-07', 15443.99, '1888');
INSERT INTO `ct_CuentasxPagar` VALUES (839, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-12-07', 1500.00, '41631');
INSERT INTO `ct_CuentasxPagar` VALUES (840, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-12-07', 5040.00, '80577');
INSERT INTO `ct_CuentasxPagar` VALUES (841, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-12-07', 5040.00, '80901');
INSERT INTO `ct_CuentasxPagar` VALUES (842, 'RECOLECTORA DE RESIDUOS COMERCIALES SA DE CV                                                                                    ', 'RECOLECCION DE BASURA', 2946.40, '2017-12-07', 2946.40, '52272');
INSERT INTO `ct_CuentasxPagar` VALUES (843, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 5833.21, '2017-12-07', 5833.21, '27013');
INSERT INTO `ct_CuentasxPagar` VALUES (844, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 1096.17, '2017-12-07', 1096.17, '27014');
INSERT INTO `ct_CuentasxPagar` VALUES (845, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', 1499.00, '2017-12-07', 1499.00, '8927');
INSERT INTO `ct_CuentasxPagar` VALUES (846, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', 1160.00, '2017-12-07', 1160.00, '4507');
INSERT INTO `ct_CuentasxPagar` VALUES (847, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 2651.88, '2017-12-08', 2651.88, '145940537');
INSERT INTO `ct_CuentasxPagar` VALUES (848, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-12-08', 329.00, '83476');
INSERT INTO `ct_CuentasxPagar` VALUES (849, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-12-08', 329.00, '83476');
INSERT INTO `ct_CuentasxPagar` VALUES (850, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-12-08', 329.00, '83474');
INSERT INTO `ct_CuentasxPagar` VALUES (851, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-12-08', 329.00, '83473');
INSERT INTO `ct_CuentasxPagar` VALUES (852, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONIA CELULAR', 329.00, '2017-12-08', 329.00, '83472');
INSERT INTO `ct_CuentasxPagar` VALUES (853, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', 4600.00, '2017-12-08', 4600.00, '81218');
INSERT INTO `ct_CuentasxPagar` VALUES (854, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', 616.23, '2017-12-13', 616.23, '145971691');
INSERT INTO `ct_CuentasxPagar` VALUES (855, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', 1910.52, '2017-12-13', 1910.52, '78284');
INSERT INTO `ct_CuentasxPagar` VALUES (856, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 2161.50, '2017-12-13', 2161.50, '1310');
INSERT INTO `ct_CuentasxPagar` VALUES (857, 'JOSE ALVARO HINOJOSA GUIJARRO                                                                                                   ', 'MAQUILADO ALETILLA', 3793.20, '2017-12-13', 3793.20, '55');
INSERT INTO `ct_CuentasxPagar` VALUES (858, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 2278.03, '2017-12-13', 2278.03, '1285');
INSERT INTO `ct_CuentasxPagar` VALUES (859, 'MARIA GRISELDA CID DAVILA                                                                                                       ', 'CHAPA MAGNETICA SOPORTE', 3236.40, '2017-12-13', 3236.40, '345');
INSERT INTO `ct_CuentasxPagar` VALUES (860, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-12-13', 1500.00, '77033');
INSERT INTO `ct_CuentasxPagar` VALUES (861, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-12-13', 5040.00, '80982');
INSERT INTO `ct_CuentasxPagar` VALUES (862, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-12-13', 5040.00, '81408');
INSERT INTO `ct_CuentasxPagar` VALUES (863, 'GVA CONSULTORIA Y CAPACITACION SC', 'CURSO DE ACTUALIZACION', 2320.00, '2017-12-15', 2320.00, '79548');
INSERT INTO `ct_CuentasxPagar` VALUES (864, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ RED', 2288.00, '2017-12-19', 2288.00, '19122017');
INSERT INTO `ct_CuentasxPagar` VALUES (865, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1073.22, '2017-12-21', 1073.22, '21976');
INSERT INTO `ct_CuentasxPagar` VALUES (866, 'GRUPO INDUSTRIAL JM SA DE CV                                                                                                    ', 'ENTRETELA', 4189.71, '2017-12-21', 4189.71, '195050');
INSERT INTO `ct_CuentasxPagar` VALUES (867, 'LA DISTRIBUIDORA DE CASIMIRES                                                                                                   ', 'TELAS', 7335.84, '2017-12-21', 7335.84, '297188');
INSERT INTO `ct_CuentasxPagar` VALUES (868, 'MARIA GRISELDA CID DAVILA                                                                                                       ', 'MAQUINADO PERFIL', 2320.00, '2017-12-21', 2320.00, '349');
INSERT INTO `ct_CuentasxPagar` VALUES (869, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-12-21', 5040.00, '82339');
INSERT INTO `ct_CuentasxPagar` VALUES (870, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-12-21', 5040.00, '81558');
INSERT INTO `ct_CuentasxPagar` VALUES (871, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 1435.23, '2017-12-21', 1435.23, '27234');
INSERT INTO `ct_CuentasxPagar` VALUES (872, 'COMERCIALIZADORA EL ASTURIANO SA DE CV', 'COBERTORES REGALO NAVIDAD', 34510.00, '2017-12-22', 34510.00, '4845');
INSERT INTO `ct_CuentasxPagar` VALUES (873, 'MARIA GRISELDA CID DAVILA                                                                                                       ', 'MAQUINADO PERFIL', 2320.00, '2017-12-26', 2320.00, '354');
INSERT INTO `ct_CuentasxPagar` VALUES (874, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE MASKING', 922.90, '2017-12-28', 922.90, '2127');
INSERT INTO `ct_CuentasxPagar` VALUES (875, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', 1451.00, '2017-12-28', 1451.00, '1325');
INSERT INTO `ct_CuentasxPagar` VALUES (876, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', 30195.00, '2017-12-28', 30195.00, '257814');
INSERT INTO `ct_CuentasxPagar` VALUES (877, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETAS', 1069.76, '2017-12-28', 1069.76, '22098');
INSERT INTO `ct_CuentasxPagar` VALUES (878, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 27261.16, '2017-12-28', 27261.16, '42905');
INSERT INTO `ct_CuentasxPagar` VALUES (879, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 10234.68, '2017-12-28', 10234.68, '4296');
INSERT INTO `ct_CuentasxPagar` VALUES (880, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 4070.44, '2017-12-28', 4070.44, '42907');
INSERT INTO `ct_CuentasxPagar` VALUES (881, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 3248.00, '2017-12-28', 3248.00, '42964');
INSERT INTO `ct_CuentasxPagar` VALUES (882, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELAS   ', 2958.00, '2017-12-28', 2958.00, '42990');
INSERT INTO `ct_CuentasxPagar` VALUES (883, 'JHAZEL EUNIZ GONZALEZ GARZA', 'HOSPEDAJE PAG WEB', 2150.00, '2017-12-28', 2150.00, '234');
INSERT INTO `ct_CuentasxPagar` VALUES (884, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 5278.00, '2017-12-28', 5278.00, '1317');
INSERT INTO `ct_CuentasxPagar` VALUES (885, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 2169.20, '2017-12-28', 2169.20, '1318');
INSERT INTO `ct_CuentasxPagar` VALUES (886, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', 2250.40, '2017-12-28', 2250.40, '1321');
INSERT INTO `ct_CuentasxPagar` VALUES (887, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'MAT DE ASEO Y LIMPIEZA', 4951.30, '2017-12-28', 4951.30, '4475');
INSERT INTO `ct_CuentasxPagar` VALUES (888, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'GASOLINA', 1500.00, '2017-12-28', 1500.00, '4864');
INSERT INTO `ct_CuentasxPagar` VALUES (889, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-12-28', 5040.00, '82877');
INSERT INTO `ct_CuentasxPagar` VALUES (890, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-12-28', 5040.00, '83023');
INSERT INTO `ct_CuentasxPagar` VALUES (891, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 380.67, '2017-12-28', 380.67, '27423');
INSERT INTO `ct_CuentasxPagar` VALUES (892, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO LOCAL', 1082.30, '2017-12-28', 1082.30, '27493');
INSERT INTO `ct_CuentasxPagar` VALUES (893, 'DESPACHO MARTINEZ ARTEAGA SC', 'LICENCIA EMITIR CFDIS', 725.00, '2017-12-29', 725.00, '4726');
INSERT INTO `ct_CuentasxPagar` VALUES (894, 'IRMA IRASEMA LICEAGA VEGA', 'PAPEL REVOLUCION', 2378.00, '2017-12-29', 2378.00, '514');
INSERT INTO `ct_CuentasxPagar` VALUES (895, 'PROYECCION LOGISTICA SA DE CV                                                                                                   ', 'FLETES', 5040.00, '2017-12-29', 5040.00, '82075');
INSERT INTO `ct_CuentasxPagar` VALUES (896, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', 4600.00, '2017-12-31', 4600.00, '16291082');
INSERT INTO `ct_CuentasxPagar` VALUES (897, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV', 'ALARMAS Y MONITOREO', 990.06, '2018-07-08', 0.00, '13998285  ');
INSERT INTO `ct_CuentasxPagar` VALUES (898, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV', 'ALARMAS Y MONITOREO', 1219.00, '2018-07-08', 0.00, '13997256  ');
INSERT INTO `ct_CuentasxPagar` VALUES (899, 'AQUA FINA SA DE CV', 'AGUA DESTILADA', 2041.60, '2018-07-08', 2041.60, '39706');
INSERT INTO `ct_CuentasxPagar` VALUES (900, 'CHONG MUNOZ MARIA TERESITA DE JESUS                                                                 ', 'BROCHES Y BOTON', 910.95, '2018-07-11', 0.00, ' 1970');
INSERT INTO `ct_CuentasxPagar` VALUES (901, 'COMERCIALIZADORA Y DISTRIBUIDORA CIYD', 'HILO', 1556.26, '2018-07-08', 0.00, '940');
INSERT INTO `ct_CuentasxPagar` VALUES (902, 'FERNANDO VEGA PALACIOS                                                                              ', 'COMISIONES ', 5800.00, '2018-06-15', 5800.00, '138');
INSERT INTO `ct_CuentasxPagar` VALUES (903, 'GRUPO EMPRESARIAL CT SA DE CV', 'ETIQUETAS ADHESIVAS', 1993.11, '2018-07-08', 0.00, '23835');
INSERT INTO `ct_CuentasxPagar` VALUES (904, 'JOSE GERARDO SEPULVEDA', 'REFACCIONES MAQUINARIA', 711.80, '2018-07-14', 0.00, '1513');
INSERT INTO `ct_CuentasxPagar` VALUES (905, 'PATRICIA SEVILLA MARTINEZ', 'MANTENIMIENTO DE PLANTA', 6728.00, '2018-07-06', 0.00, '95');
INSERT INTO `ct_CuentasxPagar` VALUES (906, 'SERVICIOS ESPECIALES MTZ CHAVARRIA', 'TRANSPORTE PERSONAL', 7600.00, '2018-06-15', 7600.00, '19940');
INSERT INTO `ct_CuentasxPagar` VALUES (907, 'SERVICIOS TELUM', 'TELEFONO', 898.00, '2018-06-14', 898.00, '2422202   ');
INSERT INTO `ct_CuentasxPagar` VALUES (908, 'ZERO BICHOS SA DE CV', 'SERVICIO DE FUMIGACION PLANTA', 1160.00, '2018-07-12', 0.00, '5674');
INSERT INTO `ct_CuentasxPagar` VALUES (909, 'DESARROLLOS INMOBILIARIOS DEL NORESTE SA DE CV.                                                 ', 'ARRENDAMIENTO', 14979.00, '2018-06-01', 0.00, '3283');
INSERT INTO `ct_CuentasxPagar` VALUES (910, 'DESARROLLOS INMOBILIARIOS DEL NORESTE SA DE CV.                                                 ', 'ARRENDAMIENTO', 1497.90, '2018-06-08', 0.00, '3448');
INSERT INTO `ct_CuentasxPagar` VALUES (911, 'ONTIME SERVICIOS TERRESTRES URGENTES SA DE CV                                                   ', 'FLETES', 9759.16, '2018-07-18', 0.00, '56734');
INSERT INTO `ct_CuentasxPagar` VALUES (912, 'COMERCIALIZADORA Y DISTRIBUIDORA CIYD', 'HILO', 1556.26, '2018-07-18', 0.00, '996');
INSERT INTO `ct_CuentasxPagar` VALUES (913, 'GRUPO EMPRESARIAL CT SA DE CV', 'ETIQUETAS ADHESIVAS', 1211.21, '2018-07-19', 0.00, '23946');
INSERT INTO `ct_CuentasxPagar` VALUES (914, 'DISEÃ‘OS,EQUIPOS,INGENIERIA,VALVULAS IND', 'MANTENIMIENTO MAQUINARIA', 4744.40, '2018-07-22', 0.00, '11477');
INSERT INTO `ct_CuentasxPagar` VALUES (915, 'BOBINA REFACCIONES SA DE CV', 'MANTENIMIENTO MAQUINARIA', 1635.60, '2018-06-22', 1635.60, '1006');
INSERT INTO `ct_CuentasxPagar` VALUES (916, 'IRMA IRASEMA LICEAGA VEGA', 'PAPEL PARA BOLSA', 2088.00, '2018-06-25', 2088.00, '2');
INSERT INTO `ct_CuentasxPagar` VALUES (917, 'TELEFONOS DE MEXICO', 'SERVICIO DE TELEFONIA ', 1499.00, '2018-07-23', 0.00, '23062018');
INSERT INTO `ct_CuentasxPagar` VALUES (918, 'CASA DIAZ DE MAQUINAS DE COSE SA DE CV', 'MANTENIMIENTO MAQUINARIA', 1606.71, '2018-05-31', 1606.71, '117097');
INSERT INTO `ct_CuentasxPagar` VALUES (919, 'CASA DIAZ DE MAQUINAS DE COSE SA DE CV', 'MANTENIMIENTO MAQUINARIA', 1606.71, '2018-05-31', 1606.71, '117097');
INSERT INTO `ct_CuentasxPagar` VALUES (920, 'COMERCIALIZADORA Y DISTRIBUIDORA CIYD', 'HILO', 2486.00, '2018-07-26', 0.00, '1059');
INSERT INTO `ct_CuentasxPagar` VALUES (921, 'RIVERA FERRETERA', 'MANTENIMIENTO DE PLANTA', 876.37, '2018-07-27', 0.00, '31497');
INSERT INTO `ct_CuentasxPagar` VALUES (922, 'COMERCIALIZADORA Y DISTRIBUIDORA CIYD', 'HILO', 862.00, '2018-07-27', 0.00, '1067');
INSERT INTO `ct_CuentasxPagar` VALUES (923, 'JUAN JOSE AUCES RAMONES', 'EQUIPO DE TRABAJO', 4872.00, '2018-06-26', 4872.00, '1935');
INSERT INTO `ct_CuentasxPagar` VALUES (924, 'RADIOMOVIL DIPSA, SA DE CV', 'TELEFONO', 329.00, '2018-07-13', 0.00, '58911815');
INSERT INTO `ct_CuentasxPagar` VALUES (925, 'RADIOMOVIL DIPSA, S.A. DE C.V.                                                                      ', 'TELEFONO', 329.00, '2018-07-13', 0.00, '58911816');
INSERT INTO `ct_CuentasxPagar` VALUES (926, 'RADIOMOVIL DIPSA, S.A. DE C.V.                                                                      ', 'TELEFONO', 329.00, '2018-07-13', 0.00, '58911817');
INSERT INTO `ct_CuentasxPagar` VALUES (927, 'RADIOMOVIL DIPSA, S.A. DE C.V.                                                                      ', 'TELEFONO', 329.00, '2018-07-13', 0.00, '58911818');
INSERT INTO `ct_CuentasxPagar` VALUES (928, 'RADIOMOVIL DIPSA, S.A. DE C.V.                                                                      ', 'TELEFONO', 329.00, '2018-07-13', 0.00, '58911819');
INSERT INTO `ct_CuentasxPagar` VALUES (929, 'MARIA GUILLERMINA DE LA ROSA LEAL', 'PUBLICIDAD', 1740.00, '2018-06-29', 0.00, '03');
INSERT INTO `ct_CuentasxPagar` VALUES (930, 'PROYECCOIN LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-07-28', 0.00, '89211');
INSERT INTO `ct_CuentasxPagar` VALUES (931, 'FERNANDO VEGA PALACIOS                                                                              ', 'COMISIONES ', 5800.00, '2018-07-02', 0.00, '142');
INSERT INTO `ct_CuentasxPagar` VALUES (932, 'DESARROLLOS INMOBILIARIOS DEL NORESTE SA DE CV.                                                 ', 'ARRENDAMIENTO', 14979.00, '2018-07-07', 0.00, '3573');
INSERT INTO `ct_CuentasxPagar` VALUES (933, 'CIPA FASKOWICH', 'ARRENDAMIENTO', 16468.26, '2018-07-07', 0.00, '688');
INSERT INTO `ct_CuentasxPagar` VALUES (934, 'MAURICIO FASKOWICH', 'ARRENDAMIENTO', 16468.83, '2018-07-07', 0.00, '2178');
INSERT INTO `ct_CuentasxPagar` VALUES (935, 'SERVICIOS TELUM', 'TELEFONO', 898.00, '2018-07-18', 898.00, '2425988');
INSERT INTO `ct_CuentasxPagar` VALUES (936, 'ABASTECEDORA DE OFICINAS SA DE CV', 'PAPELERIA', 3193.97, '2018-06-29', 3193.97, '219597');
INSERT INTO `ct_CuentasxPagar` VALUES (937, 'OXXO EXPRESS SA DE CV', 'COMBUSTIBLE ', 1500.00, '2018-07-02', 1500.00, '27877105');
INSERT INTO `ct_CuentasxPagar` VALUES (938, 'CERRAJERIA MARIN SA DE CV', 'MANTENIMIENTO DE PLANTA', 1809.60, '2018-07-03', 1809.60, '489');
INSERT INTO `ct_CuentasxPagar` VALUES (939, 'ULINE SHIPPING SUPPLIES S DE RL DE CV', 'EQUIPO DE SEGURIDAD', 1425.06, '2018-08-03', 0.00, '1139228');
INSERT INTO `ct_CuentasxPagar` VALUES (940, 'ELECTRONICA STEREN SA DE CV', 'EQUIPO DE TRABAJO', 4315.20, '2018-07-04', 4315.20, '140150');
INSERT INTO `ct_CuentasxPagar` VALUES (941, 'JUAN JOSE AUCES RAMONES', 'EQUIPO DE TRABAJO', 17226.00, '2018-07-04', 17226.00, '1951');
INSERT INTO `ct_CuentasxPagar` VALUES (943, 'GRUPO ALMAGON SA DE CV', 'TELA', 2587.73, '2018-07-05', 2587.73, '14250');
INSERT INTO `ct_CuentasxPagar` VALUES (944, 'LIV MEDICAL SA DE CV', 'BOTIQUIN', 676.94, '2018-08-04', 0.00, '9938');
INSERT INTO `ct_CuentasxPagar` VALUES (945, 'PROYECCOIN LOGISTICA SA DE CV', 'FLETES', 5040.00, '2018-08-04', 0.00, '89515');
INSERT INTO `ct_CuentasxPagar` VALUES (946, 'RECOLECTORA DE RESIDUOS COMERCIALES', 'RECOLECCION DE BASURA', 3236.40, '2018-08-05', 0.00, '61383');
INSERT INTO `ct_CuentasxPagar` VALUES (947, 'JOSE NICOLAS RODRIGUEZ', 'COMISIONES ', 4187.48, '2018-07-13', 0.00, '44');
INSERT INTO `ct_CuentasxPagar` VALUES (948, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV', 'SERVICIO DE ALARMA Y MONITOREO', 1219.00, '2018-08-08', 0.00, '14124905  ');
INSERT INTO `ct_CuentasxPagar` VALUES (949, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV', 'SERVICIO DE ALARMA Y MONITOREO', 990.06, '2018-08-08', 0.00, '14125928  ');
INSERT INTO `ct_CuentasxPagar` VALUES (950, 'GRUPO EMPRESARIAL CT SA DE CV', 'ETIQUETAS ADHESIVAS', 1038.94, '2018-08-08', 0.00, '24117');
INSERT INTO `ct_CuentasxPagar` VALUES (951, 'ID TAGGER SA DE CV', 'CLIP PLASTICO', 2552.00, '2018-08-08', 0.00, '5936');
INSERT INTO `ct_CuentasxPagar` VALUES (952, 'GESTION Y CONSULTORIA LOPT S.C.', 'HONORARIOS', 70243.24, '2018-07-13', 70243.24, '891');
INSERT INTO `ct_CuentasxPagar` VALUES (953, 'RIVERA FERRETERA', 'MANTENIMIENTO DE PLANTA', 499.65, '2018-08-09', 0.00, '31710');
INSERT INTO `ct_CuentasxPagar` VALUES (954, 'LA DISTRIBUIDORA DE CASIMIRES SA DE CV', 'TELA', 19710.72, '2018-08-12', 0.00, '322944    ');
INSERT INTO `ct_CuentasxPagar` VALUES (955, 'ZERO BICHOS SA DE CV', 'SERVICIO DE FUMIGACION PLANTA', 1160.00, '2018-08-09', 0.00, '5895');
INSERT INTO `ct_CuentasxPagar` VALUES (956, 'COMISION FEDERAL DE ELECTRICIDAD', 'LUZ', 1216.75, '2018-07-20', 1216.75, '160330');
INSERT INTO `ct_CuentasxPagar` VALUES (957, 'AQUA FINA SA DE CV', 'AGUA DESTILADA', 2041.60, '2018-08-10', 0.00, '40095');
INSERT INTO `ct_CuentasxPagar` VALUES (958, 'HARODITE, S.A DE C.V.                                                                               ', 'TELA', 15266.13, '2018-08-11', 0.00, '9092');
INSERT INTO `ct_CuentasxPagar` VALUES (959, 'ASESORES LEGALES LABORALES, S.C.                                                                    ', 'HONORARIOS', 3480.00, '2018-07-13', 3480.00, '13589');
INSERT INTO `ct_CuentasxPagar` VALUES (960, 'CARTON Y PAPEL DEL HUAJUCO SA DE CV', 'PAPEL PARA TRAZO Y GRAPAS', 1774.66, '2018-08-15', 0.00, '85401');
INSERT INTO `ct_CuentasxPagar` VALUES (961, 'MANUEL DE JESUS CANALES VAQUERA', 'MATERIAL LIMPIEZA', 3756.08, '2018-08-15', 0.00, '680');
INSERT INTO `ct_CuentasxPagar` VALUES (962, 'CIERRES AUTOMATICOS NATIONAL, S.A. DE C.V.                                                          ', 'CIERRES', 3400.33, '2018-08-16', 0.00, '10674');
INSERT INTO `ct_CuentasxPagar` VALUES (963, 'CHONG MUNOZ MARIA TERESITA DE JESUS                                                                 ', 'BOTON', 556.80, '2018-08-16', 0.00, '2020');
INSERT INTO `ct_CuentasxPagar` VALUES (964, 'COMISION FEDERAL DE ELECTRICIDAD', 'SERVICIO DE ENERGIA ELECTRICA', 27290.18, '2018-07-27', 0.00, '277933');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_cliente
-- ----------------------------
BEGIN;
INSERT INTO `ct_cliente` VALUES (23, 'Liberty Uniform Mfg. Co., Inc.', 'Karrie Carpenter', 'karrie@libertyuniform.com', '(800)-827-2441 x1006', 15, '1985-11-08', '#fffb00', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (24, 'Grupo Privileggio,S.A. de C.V.', 'Martha Rodiguez', 'grupo.privileggio@gmail.com', '81 8340.6255 y 81 8343.5688', 3, '2017-01-01', '#800080', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (25, 'Toplari SA de CV', 'Gerardo Kalifa', 'blancaesthel@hotmail.com; gkalifa@prodigy.net.mx', '81 83095252', 3, '2017-01-01', '#0433ff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (26, 'Grupo Dos Banderas, S.A. de C.V.', 'Javier Poinsot', 'mauricio.arechavaleta@dosbanderas.com  -   javier.poinsot@dosbanderas.com', '81 8356 9496', 3, '2017-01-01', '#c0c0c0', 1, '65', '1', '1');
INSERT INTO `ct_cliente` VALUES (28, 'Empuje Textil, S. de R.L. de C.V.', 'ING. ALBERTO AGUILERA ', 'alberto.carey@hotmail.com', '8344 9448;8182525126 y 8183432000   ', 3, '2017-01-01', '#941100', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (29, 'Rogelio Gonzalez Garcia  - Royulli ', 'Sr. Rogelio Gonzalez', 'rogelio-garcia@live.com  ', '81 17740273', 3, '2017-01-01', '#009051', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (31, 'Operaciones Especiales y Aereas SA de CV', 'Cap. Jorge Hernandez Garibaldi', 'garibaldi@opsesa.com.mx; garibaldicom@hotmail.com; facturacion@opsesa.com.mx ', '8112894467', 3, '2018-05-15', '#80ffff', 200, '50', 'Medios Publicitarios', '');
INSERT INTO `ct_cliente` VALUES (38, 'Confecciones Modi S de RL de CV         ', 'Moris Samar', 'conmodi@telmexmail.com; ', '81 83442075', 3, '2018-01-01', '#000000', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (39, 'Uniformes Express S de RL MI               ', 'Gerardo PeÃ±a', 'gerardo@class-uniforms.com      ', '018677145972 ', 3, '2018-01-01', '#ff0000', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (40, 'Virginia Urbina Mendez    ', 'LORENA MARTINEZ - Alexis', 'alepsi2000@hotmail.com; alexisoficina@gmail.com; facturas@policiadeacero.com ', '016564079091 ', 30, '2018-01-01', '#ff8000', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (41, 'Publicidad Coquette S de RL de CV     ', 'Roxana Jimenez', 'roxana_jimenez@hotmail.com ', '8182871207    ', 3, '2018-01-01', '#ff0080', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (42, 'RICARDO GARCIA LOZANO    ', 'RICARDO GARCIA     ', 'rgarciajollpat@prodigy.net.mx    ', '8119884930', 3, '2018-01-01', '#8000ff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (43, 'Costuras y Servicios de MÃ©xico SA de CV', 'pendiente', 'pendiente@', '1', 1, '2018-06-11', '#16b49f', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (44, 'Sierra de Bernia SA de CV', '1', '1', '1', 1, '2018-06-11', '#84b516', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (45, 'Publico en General', '1', '1', '1', 1, '2018-06-11', '#efdb25', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (46, 'Proyeccion Logistica Agencia Aduanal S.A. de C.V.', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (47, 'Fernando Vega Palacios', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (48, 'Mayela Quintanilla Gonzalez', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (49, 'Mario Alberto Gonzalez Salazar', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (50, 'Productos Bijan SA de CV ', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (51, 'Juan Carlos Davila', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (52, 'Beatriz Varela Ramirez', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (53, 'Empuje Textil S de RL de CV', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (54, 'Mireya Gonzalez Villarreal', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (55, 'Corporativo Tres Garcia SA de CV', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (56, 'Confecciones Exclusivas del Noreste SA de CV', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (57, 'Juana Acosta Lopez', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (58, 'Costuras y Servicios de Mexico SA de CV', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (59, 'Fernando Mendoza Ramirez', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (60, '10 Uniformes 11 Promociones SA de CV', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (61, 'Grupo mi  Playera de Mexico SA de CV  ', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (62, 'Mezclilla Europea SA de CV', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (63, 'Gumaro Jimenez Romero', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (64, 'Uniformes Express S de RL MI     ', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (65, 'Maria de la  Luz Gallardo Vita', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (66, 'Jose Alfredo Barraza Albitres', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (67, 'Gabriela Herrera Rojas', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (68, 'Comercializadora el Asturiano SA de CV', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (69, 'Mosago Textiles SA de CV', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (70, 'Textiles Bordados A&M SA de CV', '1', '1', '1', 1, '2018-06-12', '#fff', 1, '1', '1', '1');
INSERT INTO `ct_cliente` VALUES (71, 'Elva Jaime Saldivar', 'Vanessa Cruz', 'class.produccion.mexico@gmail.com ', '8677145972', 3, '2018-07-18', '#ff0000', 250, '70.00', 'Referido', '');
INSERT INTO `ct_cliente` VALUES (72, 'RED ', 'Dayana Camacho', 'dana.camacho@fitco.com.mx', '19576655', 3, '2018-08-02', '#ea0006', 1000, '70', 'Asesor de Ventas', 'Hector Aguirre');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=454 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_cobranza
-- ----------------------------
BEGIN;
INSERT INTO `ct_cobranza` VALUES (17, 'Maquila (Venta)', '2786', 29426.88, '2018-06-08', '2018-05-09', '40');
INSERT INTO `ct_cobranza` VALUES (18, 'Maquila (Venta)', '2787', 14097.94, '2018-06-08', '2018-05-09', '40');
INSERT INTO `ct_cobranza` VALUES (19, 'Maquila', '2788', 4896.36, '2018-05-18', '2018-05-15', '28');
INSERT INTO `ct_cobranza` VALUES (20, 'Maquila', '2789', 202644.44, '2018-06-01', '2018-05-17', '23');
INSERT INTO `ct_cobranza` VALUES (21, 'Maquila', '2790', 130365.21, '2018-06-01', '2018-05-17', '23');
INSERT INTO `ct_cobranza` VALUES (22, 'Maquila', '2791', 30599.31, '2018-06-01', '2018-05-17', '23');
INSERT INTO `ct_cobranza` VALUES (23, 'Maquila', '2792', 3382.71, '2018-06-01', '2018-05-17', '23');
INSERT INTO `ct_cobranza` VALUES (24, 'Maquila', '2793', 35072.39, '2018-06-01', '2018-05-17', '23');
INSERT INTO `ct_cobranza` VALUES (25, 'Maquila', '2785', 36940.20, '2018-05-12', '2018-05-09', '42');
INSERT INTO `ct_cobranza` VALUES (26, 'Maquila', '2784', 17141.64, '2018-05-12', '2018-05-09', '28');
INSERT INTO `ct_cobranza` VALUES (27, 'Maquila', '2783', 11546.64, '2018-05-11', '2018-05-08', '26');
INSERT INTO `ct_cobranza` VALUES (28, 'Maquila', '2782', 4959.00, '2018-05-10', '2018-05-07', '42');
INSERT INTO `ct_cobranza` VALUES (29, 'Maquila', '2781', 2460.36, '2018-05-10', '2018-05-07', '28');
INSERT INTO `ct_cobranza` VALUES (30, 'Maquila', '2780', 102287.64, '2018-05-10', '2018-05-07', '24');
INSERT INTO `ct_cobranza` VALUES (31, 'Maquila', '2779', 13340.00, '2018-05-07', '2018-05-04', '41');
INSERT INTO `ct_cobranza` VALUES (32, 'Maquila', '2778', 32433.75, '2018-05-18', '2018-05-03', '23');
INSERT INTO `ct_cobranza` VALUES (33, 'Maquila', '2777', 3212.15, '2018-05-18', '2018-05-03', '23');
INSERT INTO `ct_cobranza` VALUES (34, 'Maquila', '2776', 138825.31, '2018-05-18', '2018-05-03', '23');
INSERT INTO `ct_cobranza` VALUES (35, 'Maquila', '2775', 200793.49, '2018-05-18', '2018-05-03', '23');
INSERT INTO `ct_cobranza` VALUES (36, 'Maquila', '2794', 2931.32, '2018-05-24', '2018-05-21', '28');
INSERT INTO `ct_cobranza` VALUES (37, 'Maquila', '2795', 33805.71, '2018-05-27', '2018-05-24', '28');
INSERT INTO `ct_cobranza` VALUES (38, 'Maquila', '2796', 50033.82, '2018-05-27', '2018-05-24', '42');
INSERT INTO `ct_cobranza` VALUES (39, 'Maquila', '2797', 182473.51, '2018-05-28', '2018-05-25', '25');
INSERT INTO `ct_cobranza` VALUES (40, 'Maquila', '2798', 205746.18, '2018-06-19', '2018-06-04', '23');
INSERT INTO `ct_cobranza` VALUES (42, 'Maquila', '2800', 3775.45, '2018-06-19', '2018-06-04', '23');
INSERT INTO `ct_cobranza` VALUES (43, 'Maquila', '2801', 34215.52, '2018-06-19', '2018-06-04', '23');
INSERT INTO `ct_cobranza` VALUES (44, 'Maquila', '0034', 55119.37, '2018-06-10', '2018-06-07', '28');
INSERT INTO `ct_cobranza` VALUES (45, 'Maquila', '0035', 103530.00, '2018-06-10', '2018-06-07', '24');
INSERT INTO `ct_cobranza` VALUES (46, 'MAQUILA', '2696', 41629.85, '2018-01-13', '2018-01-10', '29');
INSERT INTO `ct_cobranza` VALUES (47, 'MAQUILA', '2697', 248663.56, '2018-02-01', '2018-01-17', '23');
INSERT INTO `ct_cobranza` VALUES (48, 'MAQUILA', '2698', 97566.31, '2018-02-01', '2018-01-17', '23');
INSERT INTO `ct_cobranza` VALUES (49, 'MAQUILA', '2699', 6893.40, '2018-02-01', '2018-01-17', '23');
INSERT INTO `ct_cobranza` VALUES (50, 'MAQUILA', '2700', 33354.69, '2018-02-01', '2018-01-17', '23');
INSERT INTO `ct_cobranza` VALUES (51, 'MAQUILA', '2701', 8021.40, '2018-01-21', '2018-01-18', '24');
INSERT INTO `ct_cobranza` VALUES (52, 'MAQUILA', '2702', 65435.83, '2018-01-25', '2018-01-22', '28');
INSERT INTO `ct_cobranza` VALUES (53, 'MAQUILA', '2703', 6368.40, '2018-01-27', '2018-01-24', '38');
INSERT INTO `ct_cobranza` VALUES (54, 'MAQUILA', '2704', 187088.09, '2018-02-13', '2018-01-29', '23');
INSERT INTO `ct_cobranza` VALUES (55, 'MAQUILA', '2705', 149665.15, '2018-02-13', '2018-01-29', '23');
INSERT INTO `ct_cobranza` VALUES (56, 'MAQUILA', '2706', 6751.86, '2018-02-13', '2018-01-29', '23');
INSERT INTO `ct_cobranza` VALUES (57, 'MAQUILA', '2707', 32483.22, '2018-02-13', '2018-01-29', '23');
INSERT INTO `ct_cobranza` VALUES (58, 'MAQUILA', '2708', 160525.44, '2018-02-03', '2018-01-31', '24');
INSERT INTO `ct_cobranza` VALUES (59, 'VENTA', '2709', 540.00, '2018-01-31', '2018-01-31', '45');
INSERT INTO `ct_cobranza` VALUES (60, 'MAQUILA', '2710', 77170.16, '2018-02-04', '2018-02-01', '24');
INSERT INTO `ct_cobranza` VALUES (61, 'MAQUILA', '2711', 79831.20, '2018-02-10', '2018-02-07', '24');
INSERT INTO `ct_cobranza` VALUES (62, 'MAQUILA', '2712', 145062.64, '2018-02-10', '2018-02-07', '24');
INSERT INTO `ct_cobranza` VALUES (63, 'MAQUILA', '2713', 61898.76, '2018-02-17', '2018-02-14', '28');
INSERT INTO `ct_cobranza` VALUES (64, 'MAQUILA', '2714', 48613.16, '2018-02-17', '2018-02-14', '28');
INSERT INTO `ct_cobranza` VALUES (65, 'MAQUILA', '2715', 38883.20, '2018-02-17', '2018-02-14', '41');
INSERT INTO `ct_cobranza` VALUES (66, 'MAQUILA', '2716', 161270.53, '2018-03-06', '2018-02-19', '23');
INSERT INTO `ct_cobranza` VALUES (67, 'MAQUILA', '2717', 153223.52, '2018-03-06', '2018-02-19', '23');
INSERT INTO `ct_cobranza` VALUES (68, 'MAQUILA', '2718', 19783.87, '2018-03-06', '2018-02-19', '23');
INSERT INTO `ct_cobranza` VALUES (69, 'MAQUILA', '2719', 7795.56, '2018-03-06', '2018-02-19', '23');
INSERT INTO `ct_cobranza` VALUES (70, 'MAQUILA', '2720', 32093.98, '2018-03-06', '2018-02-19', '23');
INSERT INTO `ct_cobranza` VALUES (71, 'OTROS', '2721', 175136.02, '2018-02-23', '2018-02-20', '44');
INSERT INTO `ct_cobranza` VALUES (72, 'MAQUILA', '2722', 103349.04, '2018-02-24', '2018-02-21', '24');
INSERT INTO `ct_cobranza` VALUES (73, 'MAQUILA', '2723', 69482.84, '2018-02-25', '2018-02-22', '26');
INSERT INTO `ct_cobranza` VALUES (74, 'MAQUILA ', '2724', 168200.00, '2018-03-01', '2018-02-22', '43');
INSERT INTO `ct_cobranza` VALUES (75, 'MAQUILA ', '2725', 100920.00, '2018-03-02', '2018-02-23', '43');
INSERT INTO `ct_cobranza` VALUES (76, 'MAQUILA', '2726', 154690.13, '2018-03-16', '2018-03-01', '23');
INSERT INTO `ct_cobranza` VALUES (77, 'MAQUILA', '2727', 150652.31, '2018-03-16', '2018-03-01', '23');
INSERT INTO `ct_cobranza` VALUES (78, 'MAQUILA', '2728', 39554.12, '2018-03-16', '2018-03-01', '23');
INSERT INTO `ct_cobranza` VALUES (79, 'MAQUILA', '2729', 3206.92, '2018-03-16', '2018-03-01', '23');
INSERT INTO `ct_cobranza` VALUES (80, 'MAQUILA', '2730', 33310.51, '2018-03-16', '2018-03-01', '23');
INSERT INTO `ct_cobranza` VALUES (81, 'MAQUILA ', '2731', 33640.00, '2018-03-08', '2018-03-01', '43');
INSERT INTO `ct_cobranza` VALUES (82, 'MAQUILA ', '2732', 33640.00, '2018-03-08', '2018-03-01', '43');
INSERT INTO `ct_cobranza` VALUES (83, 'MAQUILA', '2733', 14662.40, '2018-03-08', '2018-03-05', '41');
INSERT INTO `ct_cobranza` VALUES (84, 'MAQUILA', '2734', 5383.56, '2018-03-10', '2018-03-07', '28');
INSERT INTO `ct_cobranza` VALUES (85, 'MAQUILA', '2735', 59400.56, '2018-03-10', '2018-03-07', '28');
INSERT INTO `ct_cobranza` VALUES (86, 'MAQUILA', '2736', 191530.50, '2018-03-11', '2018-03-08', '24');
INSERT INTO `ct_cobranza` VALUES (87, 'MAQUILA', '2737', 117955.18, '2018-03-16', '2018-03-13', '24');
INSERT INTO `ct_cobranza` VALUES (88, 'MAQUILA', '2738', 54261.13, '2018-03-18', '2018-03-15', '28');
INSERT INTO `ct_cobranza` VALUES (89, 'MAQUILA', '2739', 6960.00, '2018-03-25', '2018-03-22', '41');
INSERT INTO `ct_cobranza` VALUES (90, 'MAQUILA', '2740', 5269.88, '2018-03-25', '2018-03-22', '28');
INSERT INTO `ct_cobranza` VALUES (91, 'MAQUILA', '2741', 199223.55, '2018-04-06', '2018-03-22', '23');
INSERT INTO `ct_cobranza` VALUES (92, 'MAQUILA', '2742', 99144.99, '2018-04-06', '2018-03-22', '23');
INSERT INTO `ct_cobranza` VALUES (93, 'MAQUILA', '2743', 41105.48, '2018-04-06', '2018-03-22', '23');
INSERT INTO `ct_cobranza` VALUES (94, 'MAQUILA', '2744', 3201.82, '2018-04-06', '2018-03-22', '23');
INSERT INTO `ct_cobranza` VALUES (95, 'MAQUILA', '2745', 32510.50, '2018-04-06', '2018-03-22', '23');
INSERT INTO `ct_cobranza` VALUES (96, 'VENTA', '2746', 14097.94, '2018-04-22', '2018-03-23', '40');
INSERT INTO `ct_cobranza` VALUES (97, 'VENTA', '2747', 25503.30, '2018-04-22', '2018-03-23', '40');
INSERT INTO `ct_cobranza` VALUES (98, 'VENTA', '2748', 19617.92, '2018-04-27', '2018-03-28', '40');
INSERT INTO `ct_cobranza` VALUES (99, 'VENTA', '2749', 9808.96, '2018-04-27', '2018-03-28', '40');
INSERT INTO `ct_cobranza` VALUES (100, 'MAQUILA', '2750', 4206.16, '2018-04-06', '2018-04-03', '28');
INSERT INTO `ct_cobranza` VALUES (101, 'MAQUILA', '2751', 183168.30, '2018-04-20', '2018-04-05', '23');
INSERT INTO `ct_cobranza` VALUES (102, 'MAQUILA', '2752', 149369.29, '2018-04-20', '2018-04-05', '23');
INSERT INTO `ct_cobranza` VALUES (103, 'MAQUILA', '2753', 7781.29, '2018-04-20', '2018-04-05', '23');
INSERT INTO `ct_cobranza` VALUES (104, 'MAQUILA', '2754', 23646.97, '2018-04-20', '2018-04-05', '23');
INSERT INTO `ct_cobranza` VALUES (105, 'MAQUILA', '2755', 31959.64, '2018-04-20', '2018-04-05', '23');
INSERT INTO `ct_cobranza` VALUES (106, 'MAQUILA', '2756', 10820.48, '2018-04-12', '2018-04-09', '26');
INSERT INTO `ct_cobranza` VALUES (107, 'MAQUILA', '2757', 5220.00, '2018-04-12', '2018-04-09', '41');
INSERT INTO `ct_cobranza` VALUES (108, 'VENTA', '2758', 9808.96, '2018-05-09', '2018-04-09', '40');
INSERT INTO `ct_cobranza` VALUES (109, 'MAQUILA', '2759', 6041.28, '2018-04-13', '2018-04-10', '28');
INSERT INTO `ct_cobranza` VALUES (110, 'MAQUILA', '2760', 148659.95, '2018-05-02', '2018-04-17', '23');
INSERT INTO `ct_cobranza` VALUES (111, 'MAQUILA', '2761', 137191.34, '2018-05-02', '2018-04-17', '23');
INSERT INTO `ct_cobranza` VALUES (112, 'MAQUILA', '2762', 41958.95, '2018-05-02', '2018-04-17', '23');
INSERT INTO `ct_cobranza` VALUES (113, 'MAQUILA', '2763', 3088.54, '2018-05-02', '2018-04-17', '23');
INSERT INTO `ct_cobranza` VALUES (114, 'MAQUILA', '2764', 31401.93, '2018-05-02', '2018-04-17', '23');
INSERT INTO `ct_cobranza` VALUES (115, 'MAQUILA', '2765', 0.00, '2018-04-22', '2018-04-19', '42');
INSERT INTO `ct_cobranza` VALUES (116, 'MAQUILA', '2766', 41655.60, '2018-04-22', '2018-04-19', '42');
INSERT INTO `ct_cobranza` VALUES (117, 'MAQUILA', '2767', 0.00, '2018-05-04', '2018-04-19', '23');
INSERT INTO `ct_cobranza` VALUES (118, 'MAQUILA', '2768', 24012.00, '2018-04-23', '2018-04-20', '42');
INSERT INTO `ct_cobranza` VALUES (119, 'MAQUILA', '2769', 23594.40, '2018-04-27', '2018-04-24', '42');
INSERT INTO `ct_cobranza` VALUES (120, 'MAQUILA', '2770', 3946.32, '2018-04-27', '2018-04-24', '28');
INSERT INTO `ct_cobranza` VALUES (121, 'MAQUILA', '2771', 74541.60, '2018-04-28', '2018-04-25', '24');
INSERT INTO `ct_cobranza` VALUES (122, 'MAQUILA', '2772', 73851.40, '2018-04-28', '2018-04-25', '24');
INSERT INTO `ct_cobranza` VALUES (123, 'MAQUILA', '2773', 0.00, '2018-04-29', '2018-04-26', '28');
INSERT INTO `ct_cobranza` VALUES (124, 'MAQUILA', '2774', 2216.76, '2018-04-29', '2018-04-26', '28');
INSERT INTO `ct_cobranza` VALUES (149, 'MAQUILA', '2799', 153325.42, '2018-06-19', '2018-06-04', '23');
INSERT INTO `ct_cobranza` VALUES (152, 'Maquila', '0037', 40031.60, '2018-06-16', '2018-06-13', '24');
INSERT INTO `ct_cobranza` VALUES (153, 'Maquila', '0038', 100700.18, '2018-06-16', '2018-06-13', '24');
INSERT INTO `ct_cobranza` VALUES (154, 'Maquila', '0039', 110224.94, '2018-06-16', '2018-06-13', '24');
INSERT INTO `ct_cobranza` VALUES (155, 'VENTA', '2430', 14598.60, '2017-01-17', '2017-02-16', '47');
INSERT INTO `ct_cobranza` VALUES (156, 'VENTA', '2431', 4129.60, '2017-01-17', '2017-02-16', '47');
INSERT INTO `ct_cobranza` VALUES (157, 'VENTA', '2432', 9581.60, '2017-01-17', '2017-02-16', '47');
INSERT INTO `ct_cobranza` VALUES (158, 'VENTA', '2433', 2842.00, '2017-01-17', '2017-02-16', '47');
INSERT INTO `ct_cobranza` VALUES (159, 'MAQUILA', '2434', 216905.44, '2017-01-17', '2017-02-01', '23');
INSERT INTO `ct_cobranza` VALUES (160, 'MAQUILA', '2435', 173802.12, '2017-01-17', '2017-02-01', '23');
INSERT INTO `ct_cobranza` VALUES (161, 'MAQUILA', '2436', 77624.40, '2017-01-17', '2017-02-01', '23');
INSERT INTO `ct_cobranza` VALUES (162, 'MAQUILA', '2437', 48377.66, '2017-01-17', '2017-02-01', '23');
INSERT INTO `ct_cobranza` VALUES (163, 'VENTA', '2438', 25728.80, '2017-01-23', '2017-02-22', '48');
INSERT INTO `ct_cobranza` VALUES (164, 'VENTA', '2439', 4640.00, '2017-01-23', '2017-02-22', '49');
INSERT INTO `ct_cobranza` VALUES (165, 'VENTA', '2440', 11704.40, '2017-01-23', '2017-02-22', '49');
INSERT INTO `ct_cobranza` VALUES (166, 'VENTA', '2441', 3000.00, '2017-01-23', '2017-01-23', '45');
INSERT INTO `ct_cobranza` VALUES (167, 'VENTA', '2442', 1000.00, '2017-01-23', '2017-01-23', '45');
INSERT INTO `ct_cobranza` VALUES (168, 'VENTA', '2443', 245.00, '2017-01-23', '2017-01-23', '45');
INSERT INTO `ct_cobranza` VALUES (169, 'MAQUILA', '2444', 182962.43, '2017-01-25', '2017-02-09', '23');
INSERT INTO `ct_cobranza` VALUES (170, 'MAQUILA', '2445', 176462.72, '2017-01-25', '2017-02-09', '23');
INSERT INTO `ct_cobranza` VALUES (171, 'MAQUILA', '2446', 110783.44, '2017-01-25', '2017-02-09', '23');
INSERT INTO `ct_cobranza` VALUES (172, 'MAQUILA', '2447', 48610.14, '2017-01-25', '2017-02-09', '23');
INSERT INTO `ct_cobranza` VALUES (173, 'MAQUILA', '2448', 46005.60, '2017-01-31', '2017-02-03', '38');
INSERT INTO `ct_cobranza` VALUES (174, 'VENTA', '2449', 31388.67, '2017-01-31', '2017-03-02', '40');
INSERT INTO `ct_cobranza` VALUES (175, 'VENTA', '2450', 19617.92, '2017-01-31', '2017-03-02', '40');
INSERT INTO `ct_cobranza` VALUES (176, 'MAQUILA', '2451', 36675.72, '2017-02-01', '2017-02-04', '50');
INSERT INTO `ct_cobranza` VALUES (177, 'VENTA', '2452', 5382.40, '2017-02-01', '2017-03-03', '47');
INSERT INTO `ct_cobranza` VALUES (178, 'MAQUILA', '2453', 194022.22, '2017-02-08', '2017-02-23', '23');
INSERT INTO `ct_cobranza` VALUES (179, 'MAQUILA', '2454', 186866.86, '2017-02-08', '2017-02-23', '23');
INSERT INTO `ct_cobranza` VALUES (180, 'MAQUILA', '2455', 54769.03, '2017-02-08', '2017-02-23', '23');
INSERT INTO `ct_cobranza` VALUES (181, 'MAQUILA', '2456', 44777.74, '2017-02-08', '2017-02-23', '23');
INSERT INTO `ct_cobranza` VALUES (182, 'VENTA', '2457', 44404.80, '2017-02-10', '2017-03-12', '51');
INSERT INTO `ct_cobranza` VALUES (183, 'MAQUILA', '2458', 25346.00, '2017-02-10', '2017-02-13', '31');
INSERT INTO `ct_cobranza` VALUES (184, 'VENTA', '2459', 26544.28, '2017-02-14', '2017-03-16', '52');
INSERT INTO `ct_cobranza` VALUES (185, 'OTROS', '2460', 76996.16, '2017-02-15', '2017-02-15', '46');
INSERT INTO `ct_cobranza` VALUES (186, 'MAQUILA', '2461', 57589.04, '2017-02-15', '2017-02-18', '53');
INSERT INTO `ct_cobranza` VALUES (187, 'VENTA', '2462', 5591.20, '2017-02-15', '2017-03-17', '47');
INSERT INTO `ct_cobranza` VALUES (188, 'VENTA', '2463', 5200.00, '2017-02-10', '2017-02-10', '45');
INSERT INTO `ct_cobranza` VALUES (189, 'VENTA', '2464', 310.00, '2017-02-03', '2017-02-03', '45');
INSERT INTO `ct_cobranza` VALUES (190, 'MAQUILA', '2465', 162284.00, '2017-02-22', '2017-02-25', '56');
INSERT INTO `ct_cobranza` VALUES (191, 'MAQUILA', '2466', 274825.84, '2017-02-22', '2017-03-09', '23');
INSERT INTO `ct_cobranza` VALUES (192, 'MAQUILA', '2467', 142487.87, '2017-02-22', '2017-03-09', '23');
INSERT INTO `ct_cobranza` VALUES (193, 'MAQUILA', '2468', 44500.78, '2017-02-22', '2017-03-09', '23');
INSERT INTO `ct_cobranza` VALUES (194, 'VENTA', '2469', 29426.88, '2017-02-27', '2017-03-29', '40');
INSERT INTO `ct_cobranza` VALUES (195, 'MAQUILA', '2470', 106443.34, '2017-03-02', '2017-03-05', '56');
INSERT INTO `ct_cobranza` VALUES (196, 'VENTA', '2471', 0.00, '2017-03-03', '2017-04-02', '54');
INSERT INTO `ct_cobranza` VALUES (197, 'VENTA', '2472', 19743.20, '2017-03-03', '2017-04-02', '54');
INSERT INTO `ct_cobranza` VALUES (198, 'VENTA', '2473', 4500.80, '2017-03-03', '2017-04-02', '49');
INSERT INTO `ct_cobranza` VALUES (199, 'VENTA', '2474', 11205.60, '2017-03-03', '2017-04-02', '54');
INSERT INTO `ct_cobranza` VALUES (200, 'MAQUILA', '2475', 70117.73, '2017-03-03', '2017-03-06', '25');
INSERT INTO `ct_cobranza` VALUES (201, 'VENTA', '2476', 1110.00, '2017-03-06', '2017-03-06', '45');
INSERT INTO `ct_cobranza` VALUES (202, 'MAQUILA', '2477', 113390.87, '2017-03-08', '2017-03-11', '25');
INSERT INTO `ct_cobranza` VALUES (203, 'VENTA', '2478', 14036.00, '2017-03-08', '2017-04-07', '55');
INSERT INTO `ct_cobranza` VALUES (204, 'VENTA', '2479', 12713.60, '2017-03-08', '2017-04-07', '55');
INSERT INTO `ct_cobranza` VALUES (205, 'MAQUILA', '2480', 56430.94, '2017-03-09', '2017-03-12', '53');
INSERT INTO `ct_cobranza` VALUES (206, 'VENTA', '2481', 34548.28, '2017-03-09', '2017-04-08', '55');
INSERT INTO `ct_cobranza` VALUES (207, 'MAQUILA', '2482', 13135.14, '2017-03-13', '2017-03-16', '56');
INSERT INTO `ct_cobranza` VALUES (208, 'OTROS', '2483', 76996.16, '2017-03-15', '2017-03-15', '46');
INSERT INTO `ct_cobranza` VALUES (209, 'MAQUILA', '2484', 150167.59, '2017-03-15', '2017-03-30', '23');
INSERT INTO `ct_cobranza` VALUES (210, 'MAQUILA', '2485', 246547.31, '2017-03-15', '2017-03-30', '23');
INSERT INTO `ct_cobranza` VALUES (211, 'MAQUILA', '2486', 33996.88, '2017-03-15', '2017-03-30', '23');
INSERT INTO `ct_cobranza` VALUES (212, 'MAQUILA', '2487', 44556.73, '2017-03-15', '2017-03-30', '23');
INSERT INTO `ct_cobranza` VALUES (213, 'MAQUILA', '2488', 15288.80, '2017-03-17', '2017-03-20', '57');
INSERT INTO `ct_cobranza` VALUES (214, 'MAQUILA', '2489', 7308.00, '2017-03-17', '2017-03-20', '38');
INSERT INTO `ct_cobranza` VALUES (215, 'VENTA', '2490', 24522.40, '2017-03-17', '2017-04-16', '40');
INSERT INTO `ct_cobranza` VALUES (216, 'VENTA', '2491', 11770.75, '2017-03-17', '2017-04-16', '40');
INSERT INTO `ct_cobranza` VALUES (217, 'MAQUILA', '2492', 158219.42, '2017-03-29', '2017-04-13', '23');
INSERT INTO `ct_cobranza` VALUES (218, 'MAQUILA', '2493', 240755.58, '2017-03-29', '2017-04-13', '23');
INSERT INTO `ct_cobranza` VALUES (219, 'MAQUILA', '2494', 41094.33, '2017-03-29', '2017-04-13', '23');
INSERT INTO `ct_cobranza` VALUES (220, 'MAQUILA', '2495', 10068.80, '2017-04-04', '2017-04-07', '57');
INSERT INTO `ct_cobranza` VALUES (221, 'VENTA', '2496', 66137.40, '2017-04-05', '2017-05-05', '58');
INSERT INTO `ct_cobranza` VALUES (222, 'VENTA', '2497', 1800.00, '2017-04-07', '2017-04-07', '45');
INSERT INTO `ct_cobranza` VALUES (223, 'MAQUILA', '2498', 166475.84, '2017-04-07', '2017-04-22', '23');
INSERT INTO `ct_cobranza` VALUES (224, 'MAQUILA', '2499', 139428.09, '2017-04-07', '2017-04-22', '23');
INSERT INTO `ct_cobranza` VALUES (225, 'MAQUILA', '2500', 95928.41, '2017-04-07', '2017-04-22', '23');
INSERT INTO `ct_cobranza` VALUES (226, 'MAQUILA', '2501', 41424.65, '2017-04-07', '2017-04-22', '23');
INSERT INTO `ct_cobranza` VALUES (227, 'VENTA', '2502', 7331.20, '2017-04-07', '2017-05-07', '49');
INSERT INTO `ct_cobranza` VALUES (228, 'VENTA', '2503', 6055.20, '2017-04-07', '2017-05-07', '49');
INSERT INTO `ct_cobranza` VALUES (229, 'VENTA', '2504', 2621.60, '2017-04-10', '2017-05-10', '59');
INSERT INTO `ct_cobranza` VALUES (230, 'OTROS', '2505', 76996.16, '2017-04-11', '2017-04-11', '46');
INSERT INTO `ct_cobranza` VALUES (231, 'VENTA', '2506', 66589.80, '2017-04-18', '2017-05-18', '58');
INSERT INTO `ct_cobranza` VALUES (232, 'VENTA', '2507', 10231.20, '2017-04-18', '2017-05-18', '58');
INSERT INTO `ct_cobranza` VALUES (233, 'MAQUILA', '2508', 39464.24, '2017-04-22', '2017-04-25', '50');
INSERT INTO `ct_cobranza` VALUES (234, 'MAQUILA', '2509', 224987.73, '2017-04-25', '2017-05-10', '23');
INSERT INTO `ct_cobranza` VALUES (235, 'MAQUILA', '2510', 121926.57, '2017-04-25', '2017-05-10', '23');
INSERT INTO `ct_cobranza` VALUES (236, 'MAQUILA', '2511', 35890.98, '2017-04-25', '2017-05-10', '23');
INSERT INTO `ct_cobranza` VALUES (237, 'VENTA', '2512', 1180.00, '2017-04-25', '2017-04-25', '45');
INSERT INTO `ct_cobranza` VALUES (238, 'VENTA', '2513', 600.00, '2017-04-19', '2017-04-19', '45');
INSERT INTO `ct_cobranza` VALUES (239, 'VENTA', '2514', 13732.54, '2017-04-28', '2017-05-28', '40');
INSERT INTO `ct_cobranza` VALUES (240, 'VENTA', '2515', 36096.97, '2017-04-28', '2017-05-28', '40');
INSERT INTO `ct_cobranza` VALUES (241, 'VENTA', '2516', 19617.92, '2017-04-28', '2017-05-28', '40');
INSERT INTO `ct_cobranza` VALUES (242, 'VENTA', '2517', 3526.40, '2017-04-28', '2017-05-28', '47');
INSERT INTO `ct_cobranza` VALUES (243, 'VENTA', '2518', 7482.00, '2017-04-28', '2017-05-28', '49');
INSERT INTO `ct_cobranza` VALUES (244, 'MAQUILA', '2519', 9517.37, '2017-04-28', '2017-05-01', '50');
INSERT INTO `ct_cobranza` VALUES (245, 'MAQUILA', '2520', 43007.53, '2017-04-28', '2017-05-01', '53');
INSERT INTO `ct_cobranza` VALUES (246, 'MAQUILA', '2521', 262361.68, '2017-05-09', '2017-05-24', '23');
INSERT INTO `ct_cobranza` VALUES (247, 'MAQUILA', '2522', 108635.92, '2017-05-09', '2017-05-24', '23');
INSERT INTO `ct_cobranza` VALUES (248, 'MAQUILA', '2523', 4631.74, '2017-05-09', '2017-05-24', '23');
INSERT INTO `ct_cobranza` VALUES (249, 'MAQUILA', '2524', 44007.02, '2017-05-09', '2017-05-24', '23');
INSERT INTO `ct_cobranza` VALUES (250, 'MAQUILA', '2525', 76425.16, '2017-05-12', '2017-05-15', '25');
INSERT INTO `ct_cobranza` VALUES (251, 'OTROS', '2526', 76996.16, '2017-05-15', '2017-05-15', '46');
INSERT INTO `ct_cobranza` VALUES (252, 'MAQUILA', '2527', 100119.60, '2017-05-16', '2017-05-19', '24');
INSERT INTO `ct_cobranza` VALUES (253, 'MAQUILA', '2528', 57547.60, '2017-05-18', '2017-05-21', '24');
INSERT INTO `ct_cobranza` VALUES (254, 'MAQUILA', '2529', 58585.80, '2017-05-18', '2017-05-21', '24');
INSERT INTO `ct_cobranza` VALUES (255, 'MAQUILA', '2530', 17354.16, '2017-05-22', '2017-05-25', '60');
INSERT INTO `ct_cobranza` VALUES (256, 'OTROS', '2531', 6472.80, '2017-05-25', '2017-05-25', '46');
INSERT INTO `ct_cobranza` VALUES (257, 'MAQUILA', '2532', 256497.95, '2017-05-30', '2017-06-14', '23');
INSERT INTO `ct_cobranza` VALUES (258, 'MAQUILA', '2533', 134963.43, '2017-05-30', '2017-06-14', '23');
INSERT INTO `ct_cobranza` VALUES (259, 'MAQUILA', '2534', 40348.29, '2017-05-30', '2017-06-14', '23');
INSERT INTO `ct_cobranza` VALUES (260, 'MAQUILA', '2535', 50065.60, '2017-05-30', '2017-05-30', '61');
INSERT INTO `ct_cobranza` VALUES (261, 'MAQUILA', '2536', 62361.60, '2017-06-01', '2017-06-04', '24');
INSERT INTO `ct_cobranza` VALUES (262, 'MAQUILA', '2537', 42630.00, '2017-06-01', '2017-06-04', '24');
INSERT INTO `ct_cobranza` VALUES (263, 'MAQUILA', '2538', 7557.40, '2017-06-02', '2017-06-05', '24');
INSERT INTO `ct_cobranza` VALUES (264, 'VENTA', '2539', 6171.20, '2017-06-06', '2017-07-06', '49');
INSERT INTO `ct_cobranza` VALUES (265, 'MAQUILA', '2540', 4999.60, '2017-06-06', '2017-06-09', '24');
INSERT INTO `ct_cobranza` VALUES (266, 'MAQUILA', '2541', 38085.94, '2017-06-08', '2017-06-11', '25');
INSERT INTO `ct_cobranza` VALUES (267, 'VENTA', '2542', 500.02, '2017-06-12', '2017-06-12', '45');
INSERT INTO `ct_cobranza` VALUES (268, 'OTROS', '2543', 76996.16, '2017-06-12', '2017-06-12', '46');
INSERT INTO `ct_cobranza` VALUES (269, 'MAQUILA', '2544', 223256.49, '2017-06-14', '2017-06-29', '23');
INSERT INTO `ct_cobranza` VALUES (270, 'MAQUILA', '2545', 142211.34, '2017-06-14', '2017-06-29', '23');
INSERT INTO `ct_cobranza` VALUES (271, 'MAQUILA', '2546', 27335.75, '2017-06-14', '2017-06-29', '23');
INSERT INTO `ct_cobranza` VALUES (272, 'MAQUILA', '2547', 41034.17, '2017-06-14', '2017-06-29', '23');
INSERT INTO `ct_cobranza` VALUES (273, 'MAQUILA', '2548', 66455.61, '2017-06-16', '2017-06-19', '53');
INSERT INTO `ct_cobranza` VALUES (274, 'MAQUILA', '2549', 26540.80, '2017-06-21', '2017-06-24', '62');
INSERT INTO `ct_cobranza` VALUES (275, 'MAQUILA', '2550', 6890.40, '2017-06-22', '2017-06-25', '38');
INSERT INTO `ct_cobranza` VALUES (276, 'MAQUILA', '2551', 10825.91, '2017-06-22', '2017-06-25', '56');
INSERT INTO `ct_cobranza` VALUES (277, 'MAQUILA', '2552', 168710.68, '2017-06-28', '2017-07-13', '23');
INSERT INTO `ct_cobranza` VALUES (278, 'MAQUILA', '2553', 195076.42, '2017-06-28', '2017-07-13', '23');
INSERT INTO `ct_cobranza` VALUES (279, 'MAQUILA', '2554', 16896.38, '2017-06-28', '2017-07-13', '23');
INSERT INTO `ct_cobranza` VALUES (280, 'MAQUILA', '2555', 39575.42, '2017-06-28', '2017-07-13', '23');
INSERT INTO `ct_cobranza` VALUES (281, 'VENTA', '2556', 7052.80, '2017-06-28', '2017-06-28', '45');
INSERT INTO `ct_cobranza` VALUES (282, 'VENTA', '2557', 2227.20, '2017-06-28', '2017-06-28', '45');
INSERT INTO `ct_cobranza` VALUES (283, 'VENTA', '2558', 7052.80, '2017-06-28', '2017-06-28', '45');
INSERT INTO `ct_cobranza` VALUES (284, 'VENTA', '2559', 2800.00, '2017-06-30', '2017-06-30', '45');
INSERT INTO `ct_cobranza` VALUES (285, 'VENTA', '2560', 1252.80, '2017-06-30', '2017-07-30', '47');
INSERT INTO `ct_cobranza` VALUES (286, 'VENTA', '2561', 2880.05, '2017-06-30', '2017-07-30', '49');
INSERT INTO `ct_cobranza` VALUES (287, 'VENTA', '2562', 1320.02, '2017-06-30', '2017-07-30', '49');
INSERT INTO `ct_cobranza` VALUES (288, 'VENTA', '2563', 19617.92, '2017-06-30', '2017-07-30', '40');
INSERT INTO `ct_cobranza` VALUES (289, 'VENTA', '2564', 20627.12, '2017-07-04', '2017-08-03', '63');
INSERT INTO `ct_cobranza` VALUES (290, 'MAQUILA', '2565', 63800.00, '2017-07-04', '2017-07-07', '24');
INSERT INTO `ct_cobranza` VALUES (291, 'MAQUILA', '2566', 57420.00, '2017-07-05', '2017-07-08', '24');
INSERT INTO `ct_cobranza` VALUES (292, 'MAQUILA', '2567', 164777.40, '2017-07-14', '2017-07-29', '23');
INSERT INTO `ct_cobranza` VALUES (293, 'MAQUILA', '2568', 183590.70, '2017-07-14', '2017-07-29', '23');
INSERT INTO `ct_cobranza` VALUES (294, 'MAQUILA', '2569', 36890.01, '2017-07-14', '2017-07-29', '23');
INSERT INTO `ct_cobranza` VALUES (295, 'OTROS', '2570', 0.00, '2017-07-14', '2017-07-14', '46');
INSERT INTO `ct_cobranza` VALUES (296, 'MAQUILA', '2571', 87817.80, '2017-07-19', '2017-07-22', '24');
INSERT INTO `ct_cobranza` VALUES (297, 'MAQUILA', '2572', 66352.00, '2017-07-20', '2017-07-23', '24');
INSERT INTO `ct_cobranza` VALUES (298, 'MAQUILA', '2573', 0.00, '2017-07-20', '2017-07-23', '64');
INSERT INTO `ct_cobranza` VALUES (299, 'MAQUILA', '2574', 0.00, '2017-07-24', '2017-07-27', '65');
INSERT INTO `ct_cobranza` VALUES (300, 'MAQUILA', '2575', 55364.48, '2017-07-25', '2017-07-28', '29');
INSERT INTO `ct_cobranza` VALUES (301, 'MAQUILA', '2576', 0.00, '2017-07-25', '2017-07-28', '65');
INSERT INTO `ct_cobranza` VALUES (302, 'VENTA', '2577', 23541.50, '2017-07-31', '2017-08-30', '40');
INSERT INTO `ct_cobranza` VALUES (303, 'VENTA', '2578', 11770.75, '2017-07-31', '2017-08-30', '40');
INSERT INTO `ct_cobranza` VALUES (304, 'VENTA', '2579', 24522.40, '2017-07-31', '2017-08-30', '40');
INSERT INTO `ct_cobranza` VALUES (305, 'MAQUILA', '2580', 29638.58, '2017-07-31', '2017-08-03', '65');
INSERT INTO `ct_cobranza` VALUES (306, 'MAQUILA', '2581', 185239.62, '2017-07-31', '2017-08-15', '23');
INSERT INTO `ct_cobranza` VALUES (307, 'MAQUILA', '2582', 152542.95, '2017-07-31', '2017-08-15', '23');
INSERT INTO `ct_cobranza` VALUES (308, 'MAQUILA', '2583', 35348.37, '2017-07-31', '2017-08-15', '23');
INSERT INTO `ct_cobranza` VALUES (309, 'MAQUILA', '2584', 4181.80, '2017-08-02', '2017-08-05', '24');
INSERT INTO `ct_cobranza` VALUES (310, 'MAQUILA', '2585', 29638.58, '2017-08-02', '2017-08-05', '65');
INSERT INTO `ct_cobranza` VALUES (311, 'VENTA', '2586', 3828.00, '2017-08-03', '2017-08-03', '45');
INSERT INTO `ct_cobranza` VALUES (312, 'MAQUILA', '2587', 98353.50, '2017-08-04', '2017-08-07', '24');
INSERT INTO `ct_cobranza` VALUES (313, 'MAQUILA', '2588', 8526.00, '2017-08-04', '2017-08-07', '24');
INSERT INTO `ct_cobranza` VALUES (314, 'MAQUILA', '2589', 92080.80, '2017-08-08', '2017-08-11', '24');
INSERT INTO `ct_cobranza` VALUES (315, 'VENTA', '2590', 500.01, '2017-08-11', '2017-08-11', '45');
INSERT INTO `ct_cobranza` VALUES (316, 'MAQUILA', '2591', 144892.65, '2017-08-15', '2017-08-30', '23');
INSERT INTO `ct_cobranza` VALUES (317, 'MAQUILA', '2592', 145490.17, '2017-08-15', '2017-08-30', '23');
INSERT INTO `ct_cobranza` VALUES (318, 'MAQUILA', '2593', 97733.74, '2017-08-15', '2017-08-30', '23');
INSERT INTO `ct_cobranza` VALUES (319, 'MAQUILA', '2594', 45893.56, '2017-08-15', '2017-08-30', '23');
INSERT INTO `ct_cobranza` VALUES (320, 'MAQUILA', '2595', 75394.20, '2017-08-17', '2017-08-20', '24');
INSERT INTO `ct_cobranza` VALUES (321, 'MAQUILA', '2596', 4384.80, '2017-08-18', '2017-08-21', '24');
INSERT INTO `ct_cobranza` VALUES (322, 'MAQUILA', '2597', 4683.50, '2017-08-18', '2017-08-21', '24');
INSERT INTO `ct_cobranza` VALUES (323, 'VENTA', '2598', 3100.00, '2017-08-18', '2017-09-17', '49');
INSERT INTO `ct_cobranza` VALUES (324, 'VENTA', '2599', 2000.00, '2017-08-18', '2017-09-17', '49');
INSERT INTO `ct_cobranza` VALUES (325, 'MAQUILA', '2600', 68147.10, '2017-08-21', '2017-08-24', '24');
INSERT INTO `ct_cobranza` VALUES (326, 'VENTA', '2601', 2800.00, '2017-08-22', '2017-09-21', '49');
INSERT INTO `ct_cobranza` VALUES (327, 'MAQUILA', '2602', 73749.90, '2017-08-23', '2017-08-26', '24');
INSERT INTO `ct_cobranza` VALUES (328, 'MAQUILA', '2603', 9270.72, '2017-08-23', '2017-08-26', '57');
INSERT INTO `ct_cobranza` VALUES (329, 'MAQUILA', '2604', 10347.20, '2017-08-24', '2017-08-27', '24');
INSERT INTO `ct_cobranza` VALUES (330, 'MAQUILA', '2605', 10825.12, '2017-08-25', '2017-08-28', '26');
INSERT INTO `ct_cobranza` VALUES (331, 'VENTA', '2606', 2505.60, '2017-08-30', '2017-09-29', '66');
INSERT INTO `ct_cobranza` VALUES (332, 'VENTA', '2607', 17886.64, '2017-08-30', '2017-09-29', '40');
INSERT INTO `ct_cobranza` VALUES (333, 'VENTA', '2608', 16111.94, '2017-08-30', '2017-09-29', '40');
INSERT INTO `ct_cobranza` VALUES (334, 'VENTA', '2609', 12751.65, '2017-08-30', '2017-09-29', '40');
INSERT INTO `ct_cobranza` VALUES (335, 'VENTA', '2610', 19617.92, '2017-08-30', '2017-09-29', '40');
INSERT INTO `ct_cobranza` VALUES (336, 'VENTA', '2611', 180.00, '2017-08-31', '2017-08-31', '45');
INSERT INTO `ct_cobranza` VALUES (337, 'VENTA', '2612', 2000.07, '2017-08-31', '2017-08-31', '45');
INSERT INTO `ct_cobranza` VALUES (338, 'MAQUILA', '2613', 159179.94, '2017-09-01', '2017-09-16', '23');
INSERT INTO `ct_cobranza` VALUES (339, 'MAQUILA', '2614', 197039.20, '2017-09-01', '2017-09-16', '23');
INSERT INTO `ct_cobranza` VALUES (340, 'MAQUILA', '2615', 41245.27, '2017-09-01', '2017-09-16', '23');
INSERT INTO `ct_cobranza` VALUES (341, 'MAQUILA', '2616', 14563.80, '2017-09-05', '2017-09-08', '38');
INSERT INTO `ct_cobranza` VALUES (342, 'MAQUILA', '2617', 67853.99, '2017-09-07', '2017-09-10', '53');
INSERT INTO `ct_cobranza` VALUES (343, 'MAQUILA', '2618', 156758.01, '2017-09-14', '2017-09-29', '23');
INSERT INTO `ct_cobranza` VALUES (344, 'MAQUILA', '2619', 151065.24, '2017-09-14', '2017-09-29', '23');
INSERT INTO `ct_cobranza` VALUES (345, 'MAQUILA', '2620', 46705.00, '2017-09-14', '2017-09-29', '23');
INSERT INTO `ct_cobranza` VALUES (346, 'MAQUILA', '2621', 41559.00, '2017-09-14', '2017-09-29', '23');
INSERT INTO `ct_cobranza` VALUES (347, 'MAQUILA', '2622', 29536.50, '2017-09-14', '2017-09-17', '24');
INSERT INTO `ct_cobranza` VALUES (348, 'MAQUILA', '2623', 9716.74, '2017-09-22', '2017-09-25', '65');
INSERT INTO `ct_cobranza` VALUES (349, 'MAQUILA', '2624', 1406.50, '2017-09-22', '2017-09-25', '24');
INSERT INTO `ct_cobranza` VALUES (350, 'MAQUILA', '2625', 126006.16, '2017-09-22', '2017-09-25', '67');
INSERT INTO `ct_cobranza` VALUES (351, 'VENTA', '2626', 180008.80, '2017-09-22', '2017-10-22', '68');
INSERT INTO `ct_cobranza` VALUES (352, 'MAQUILA', '2627', 49967.77, '2017-09-27', '2017-09-30', '50');
INSERT INTO `ct_cobranza` VALUES (353, 'MAQUILA', '2628', 5359.20, '2017-09-27', '2017-09-30', '62');
INSERT INTO `ct_cobranza` VALUES (354, 'MAQUILA', '2629', 167448.05, '2017-09-27', '2017-10-12', '23');
INSERT INTO `ct_cobranza` VALUES (355, 'MAQUILA', '2630', 147153.59, '2017-09-27', '2017-10-12', '23');
INSERT INTO `ct_cobranza` VALUES (356, 'MAQUILA', '2631', 36876.38, '2017-09-27', '2017-10-12', '23');
INSERT INTO `ct_cobranza` VALUES (357, 'MAQUILA', '2632', 41346.98, '2017-09-27', '2017-10-12', '23');
INSERT INTO `ct_cobranza` VALUES (358, 'VENTA', '2633', 509.99, '2017-09-29', '2017-09-29', '45');
INSERT INTO `ct_cobranza` VALUES (359, 'VENTA', '2634', 2273.59, '2017-09-29', '2017-09-29', '45');
INSERT INTO `ct_cobranza` VALUES (360, 'MAQUILA', '2635', 119886.00, '2017-10-05', '2017-10-08', '69');
INSERT INTO `ct_cobranza` VALUES (361, 'VENTA', '2636', 12528.00, '2017-10-06', '2017-11-05', '52');
INSERT INTO `ct_cobranza` VALUES (362, 'MAQUILA', '2637', 5324.40, '2017-10-06', '2017-10-09', '70');
INSERT INTO `ct_cobranza` VALUES (363, 'VENTA', '2638', 555.20, '2017-10-06', '2017-10-06', '45');
INSERT INTO `ct_cobranza` VALUES (364, 'MAQUILA', '2639', 55683.45, '2017-10-12', '2017-10-27', '23');
INSERT INTO `ct_cobranza` VALUES (365, 'MAQUILA', '2640', 111238.34, '2017-10-12', '2017-10-27', '23');
INSERT INTO `ct_cobranza` VALUES (366, 'MAQUILA', '2641', 214794.04, '2017-10-12', '2017-10-27', '23');
INSERT INTO `ct_cobranza` VALUES (367, 'MAQUILA', '2642', 44683.08, '2017-10-12', '2017-10-27', '23');
INSERT INTO `ct_cobranza` VALUES (368, 'VENTA', '2643', 16912.80, '2017-10-13', '2017-11-12', '52');
INSERT INTO `ct_cobranza` VALUES (369, 'VENTA', '2644', 26876.55, '2017-10-16', '2017-11-15', '40');
INSERT INTO `ct_cobranza` VALUES (370, 'MAQUILA', '2645', 84842.40, '2017-10-18', '2017-10-21', '24');
INSERT INTO `ct_cobranza` VALUES (371, 'MAQUILA', '2646', 14869.43, '2017-10-18', '2017-10-21', '69');
INSERT INTO `ct_cobranza` VALUES (372, 'MAQUILA', '2647', 63365.00, '2017-10-18', '2017-10-21', '24');
INSERT INTO `ct_cobranza` VALUES (373, 'MAQUILA', '2648', 78729.20, '2017-10-19', '2017-10-22', '26');
INSERT INTO `ct_cobranza` VALUES (374, 'VENTA', '2649', 1879.20, '2017-10-23', '2017-10-23', '45');
INSERT INTO `ct_cobranza` VALUES (375, 'MAQUILA', '2650', 190545.12, '2017-10-26', '2017-11-10', '23');
INSERT INTO `ct_cobranza` VALUES (376, 'MAQUILA', '2651', 139548.30, '2017-10-26', '2017-11-10', '23');
INSERT INTO `ct_cobranza` VALUES (377, 'MAQUILA', '2652', 42068.40, '2017-10-26', '2017-11-10', '23');
INSERT INTO `ct_cobranza` VALUES (378, 'MAQUILA', '2653', 43769.41, '2017-10-26', '2017-11-10', '23');
INSERT INTO `ct_cobranza` VALUES (379, 'MAQUILA', '2654', 83946.51, '2017-11-01', '2017-11-04', '53');
INSERT INTO `ct_cobranza` VALUES (380, 'MAQUILA', '2655', 11598.84, '2017-11-02', '2017-11-05', '24');
INSERT INTO `ct_cobranza` VALUES (381, 'MAQUILA', '2656', 56271.60, '2017-11-02', '2017-11-05', '24');
INSERT INTO `ct_cobranza` VALUES (382, 'MAQUILA', '2657', 38280.00, '2017-11-02', '2017-11-05', '24');
INSERT INTO `ct_cobranza` VALUES (383, 'MAQUILA', '2658', 22011.00, '2017-11-02', '2017-11-05', '26');
INSERT INTO `ct_cobranza` VALUES (384, 'VENTA', '2659', 12528.00, '2017-11-04', '2017-12-04', '66');
INSERT INTO `ct_cobranza` VALUES (385, 'VENTA', '2660', 8769.60, '2017-11-04', '2017-12-04', '52');
INSERT INTO `ct_cobranza` VALUES (386, 'MAQUILA', '2661', 205159.81, '2017-11-09', '2017-11-24', '23');
INSERT INTO `ct_cobranza` VALUES (387, 'MAQUILA', '2662', 157782.56, '2017-11-09', '2017-11-24', '23');
INSERT INTO `ct_cobranza` VALUES (388, 'MAQUILA', '2663', 42440.83, '2017-11-09', '2017-11-24', '23');
INSERT INTO `ct_cobranza` VALUES (389, 'VENTA', '2664', 1587.00, '2017-11-10', '2017-11-10', '45');
INSERT INTO `ct_cobranza` VALUES (390, 'MAQUILA', '2665', 36540.00, '2017-11-14', '2017-11-17', '24');
INSERT INTO `ct_cobranza` VALUES (391, 'MAQUILA', '2666', 13763.40, '2017-11-14', '2017-11-17', '24');
INSERT INTO `ct_cobranza` VALUES (392, 'MAQUILA', '2667', 93493.03, '2017-11-16', '2017-11-19', '25');
INSERT INTO `ct_cobranza` VALUES (393, 'MAQUILA', '2668', 118320.00, '2017-11-16', '2017-11-19', '25');
INSERT INTO `ct_cobranza` VALUES (394, 'MAQUILA', '2669', 199398.85, '2017-11-24', '2017-12-09', '23');
INSERT INTO `ct_cobranza` VALUES (395, 'MAQUILA', '2670', 148723.26, '2017-11-24', '2017-12-09', '23');
INSERT INTO `ct_cobranza` VALUES (396, 'MAQUILA', '2671', 40980.63, '2017-11-24', '2017-12-09', '23');
INSERT INTO `ct_cobranza` VALUES (397, 'VENTA', '2672', 13154.40, '2017-11-27', '2017-12-27', '52');
INSERT INTO `ct_cobranza` VALUES (398, 'VENTA', '2673', 799.99, '2017-11-27', '2017-11-27', '45');
INSERT INTO `ct_cobranza` VALUES (399, 'VENTA', '2674', 270.00, '2017-11-27', '2017-11-27', '45');
INSERT INTO `ct_cobranza` VALUES (400, 'VENTA', '2675', 4071.60, '2017-11-28', '2017-12-28', '59');
INSERT INTO `ct_cobranza` VALUES (401, 'MAQUILA', '2676', 122393.84, '2017-11-28', '2017-12-01', '26');
INSERT INTO `ct_cobranza` VALUES (402, 'MAQUILA', '2677', 0.00, '2017-11-30', '2017-12-03', '24');
INSERT INTO `ct_cobranza` VALUES (403, 'MAQUILA', '2678', 123545.80, '2017-12-01', '2017-12-04', '24');
INSERT INTO `ct_cobranza` VALUES (404, 'MAQUILA', '2679', 39997.17, '2017-12-07', '2017-12-10', '53');
INSERT INTO `ct_cobranza` VALUES (405, 'MAQUILA', '2680', 40846.23, '2017-12-07', '2017-12-10', '53');
INSERT INTO `ct_cobranza` VALUES (406, 'MAQUILA', '2681', 154328.72, '2017-12-07', '2017-12-10', '24');
INSERT INTO `ct_cobranza` VALUES (407, 'MAQUILA', '2682', 110432.00, '2017-12-12', '2017-12-15', '24');
INSERT INTO `ct_cobranza` VALUES (408, 'MAQUILA', '2683', 5191.00, '2017-12-12', '2017-12-15', '24');
INSERT INTO `ct_cobranza` VALUES (409, 'MAQUILA', '2684', 35971.96, '2017-12-15', '2017-12-18', '60');
INSERT INTO `ct_cobranza` VALUES (410, 'MAQUILA', '2685', 60412.80, '2017-12-15', '2017-12-18', '24');
INSERT INTO `ct_cobranza` VALUES (411, 'MAQUILA', '2686', 157478.29, '2017-12-19', '2018-01-03', '23');
INSERT INTO `ct_cobranza` VALUES (412, 'MAQUILA', '2687', 125723.93, '2017-12-19', '2018-01-03', '23');
INSERT INTO `ct_cobranza` VALUES (413, 'MAQUILA', '2688', 68907.65, '2017-12-19', '2018-01-03', '23');
INSERT INTO `ct_cobranza` VALUES (414, 'MAQUILA', '2689', 42355.40, '2017-12-19', '2018-01-03', '23');
INSERT INTO `ct_cobranza` VALUES (415, 'MAQUILA', '2690', 49165.30, '2017-12-26', '2017-12-29', '53');
INSERT INTO `ct_cobranza` VALUES (416, 'VENTA', '2691', 27465.09, '2017-12-26', '2018-01-25', '40');
INSERT INTO `ct_cobranza` VALUES (417, 'VENTA', '2692', 11076.96, '2017-12-26', '2018-01-25', '40');
INSERT INTO `ct_cobranza` VALUES (418, 'VENTA', '2693', 23541.50, '2017-12-26', '2018-01-25', '40');
INSERT INTO `ct_cobranza` VALUES (419, 'VENTA', '2694', 7847.17, '2017-12-26', '2018-01-25', '40');
INSERT INTO `ct_cobranza` VALUES (420, 'OTROS', '2429', 76996.16, '2017-01-16', '2017-01-16', '46');
INSERT INTO `ct_cobranza` VALUES (421, 'Maquila', '2695', 41019.34, '2018-01-13', '2018-01-10', '31');
INSERT INTO `ct_cobranza` VALUES (422, 'Maquila', '2807', 28643.30, '2018-06-23', '2018-06-20', '24');
INSERT INTO `ct_cobranza` VALUES (423, 'Maquila', '2808', 143334.18, '2018-07-11', '2018-06-26', '23');
INSERT INTO `ct_cobranza` VALUES (424, 'Maquila', '2809', 135314.62, '2018-07-11', '2018-06-26', '23');
INSERT INTO `ct_cobranza` VALUES (425, 'Maquila', '2810', 84260.38, '2018-07-11', '2018-06-26', '23');
INSERT INTO `ct_cobranza` VALUES (426, 'Maquila', '2811', 3440.00, '2018-07-11', '2018-06-26', '23');
INSERT INTO `ct_cobranza` VALUES (427, 'Maquila', '2812', 34617.81, '2018-07-11', '2018-06-26', '23');
INSERT INTO `ct_cobranza` VALUES (428, 'Maquila', '0044', 154121.66, '2018-06-30', '2018-06-27', '24');
INSERT INTO `ct_cobranza` VALUES (429, 'Maquila', '0045', 58667.00, '2018-07-01', '2018-06-28', '24');
INSERT INTO `ct_cobranza` VALUES (430, 'Maquila', '0046', 70055.30, '2018-07-06', '2018-07-03', '24');
INSERT INTO `ct_cobranza` VALUES (431, 'Maquila', '0047', 120163.82, '2018-07-06', '2018-07-03', '24');
INSERT INTO `ct_cobranza` VALUES (432, 'Maquila', '0048', 3735.20, '2018-07-08', '2018-07-05', '28');
INSERT INTO `ct_cobranza` VALUES (433, 'Maquila', '0049', 3451.00, '2018-07-08', '2018-07-05', '28');
INSERT INTO `ct_cobranza` VALUES (434, 'Maquila', '0050', 2444.12, '2018-07-08', '2018-07-05', '28');
INSERT INTO `ct_cobranza` VALUES (435, 'Maquila', '0051', 31842.99, '2018-07-08', '2018-07-05', '28');
INSERT INTO `ct_cobranza` VALUES (437, 'Maquila', '0052', 7871.76, '2018-07-09', '2018-07-06', '42');
INSERT INTO `ct_cobranza` VALUES (438, 'Maquila', '0053', 1774.80, '2018-07-09', '2018-07-06', '42');
INSERT INTO `ct_cobranza` VALUES (439, 'Maquila', '0054', 19126.08, '2018-07-09', '2018-07-06', '42');
INSERT INTO `ct_cobranza` VALUES (440, 'Maquila', '0057', 102886.20, '2018-07-15', '2018-07-12', '26');
INSERT INTO `ct_cobranza` VALUES (441, 'Maquila', '2825', 3222.23, '2018-08-01', '2018-07-17', '23');
INSERT INTO `ct_cobranza` VALUES (442, 'Maquila', '2826', 32627.93, '2018-08-01', '2018-07-17', '23');
INSERT INTO `ct_cobranza` VALUES (443, 'Maquila', '2827', 187928.62, '2018-08-01', '2018-07-17', '23');
INSERT INTO `ct_cobranza` VALUES (444, 'Maquila', '2828', 119569.51, '2018-08-01', '2018-07-17', '23');
INSERT INTO `ct_cobranza` VALUES (445, 'Maquila', '2829', 33534.43, '2018-08-01', '2018-07-17', '23');
INSERT INTO `ct_cobranza` VALUES (446, 'Venta', '0060', 241280.00, '2018-07-27', '2018-07-24', '46');
INSERT INTO `ct_cobranza` VALUES (447, 'Maquila', '0058', 122250.95, '2018-07-28', '2018-07-25', '71');
INSERT INTO `ct_cobranza` VALUES (448, 'Maquila', '2835', 157556.76, '2018-08-09', '2018-07-25', '23');
INSERT INTO `ct_cobranza` VALUES (449, 'Maquila', '2835', 189780.68, '2018-08-09', '2018-07-25', '23');
INSERT INTO `ct_cobranza` VALUES (450, 'Maquila', '2836', 3257.05, '2018-08-09', '2018-07-25', '23');
INSERT INTO `ct_cobranza` VALUES (451, 'Maquila', '2837', 33369.44, '2018-08-09', '2018-07-25', '23');
INSERT INTO `ct_cobranza` VALUES (452, 'Venta', '2840', 30407.78, '2018-08-27', '2018-07-27', '40');
INSERT INTO `ct_cobranza` VALUES (453, 'Maquila', '0061', 44541.68, '2018-08-02', '2018-07-30', '26');
COMMIT;

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
-- Records of ct_corte
-- ----------------------------
BEGIN;
INSERT INTO `ct_corte` VALUES (8, '78', '2018-04-15', '10:30:00', 'finalizado en tiempo');
COMMIT;

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
-- Records of ct_envios
-- ----------------------------
BEGIN;
INSERT INTO `ct_envios` VALUES (1, '23', 'Salida de Fitco', '2017-12-04', '08:10:00', 'Salida en tiempo');
INSERT INTO `ct_envios` VALUES (2, '53', 'Arribo Nuevo Laredo', '2017-12-04', '15:10:00', 'prueba1');
INSERT INTO `ct_envios` VALUES (3, '53', 'Despacho de Laredo a Liberty', '2017-12-04', '16:00:00', 'prueba 2');
INSERT INTO `ct_envios` VALUES (4, '50', 'Arribo con el Cliente', '2017-12-05', '17:56:00', 'ultima prueba del dia');
INSERT INTO `ct_envios` VALUES (5, '23', 'Arribo con el Cliente', '2017-12-05', '10:30:00', 'se debe mostrar este registro en pantalla');
INSERT INTO `ct_envios` VALUES (6, '74', 'Salida de Fitco', '2018-04-24', '10:00:00', 'Salida 10 min tarde');
INSERT INTO `ct_envios` VALUES (7, '74', 'Arribo Nuevo Laredo', '2018-04-24', '12:40:00', 'A tiempo');
INSERT INTO `ct_envios` VALUES (8, '74', 'Arribo con el Cliente', '2018-04-25', '09:00:00', 'NingÃºn problema');
INSERT INTO `ct_envios` VALUES (9, '75', 'Salida de Fitco', '2018-04-24', '16:40:00', 'Salio tarde');
INSERT INTO `ct_envios` VALUES (10, '75', 'Arribo a Laredo', '2018-04-25', '08:00:00', 'En tiempo');
COMMIT;

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
  `meta` int(11) unsigned zerofill NOT NULL,
  `prod1` int(11) unsigned zerofill NOT NULL,
  `prod2` int(11) DEFAULT NULL,
  `prod3` int(11) DEFAULT NULL,
  `prod4` int(11) DEFAULT NULL,
  `prod5` int(11) DEFAULT NULL,
  `prod6` int(11) DEFAULT NULL,
  `prod7` int(11) DEFAULT NULL,
  `prod8` int(11) DEFAULT NULL,
  `prod9` int(11) DEFAULT NULL,
  `prod10` int(11) DEFAULT NULL,
  PRIMARY KEY (`pk_linea`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_linea
-- ----------------------------
BEGIN;
INSERT INTO `ct_linea` VALUES (13, 'Linea 1', 'Pegar puÃ±o', 'MAYRA GUADALUPE PIZARRO HOYUELA', '2018-07-23', 00000000800, 00000000078, 80, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ct_linea` VALUES (14, 'Linea 2', 'Pegar puÃ±o', 'EULALIA PARRA MORENO', '2018-07-23', 00000000750, 00000000078, 80, 0, 0, 0, 0, 0, 0, 0, 0);
INSERT INTO `ct_linea` VALUES (15, 'Linea 1', 'Pegar puÃ±o', 'IRMA TERESA CORPUS MARTINEZ', '2018-08-01', 00000000300, 00000000030, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
COMMIT;

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
-- Records of ct_materiales
-- ----------------------------
BEGIN;
INSERT INTO `ct_materiales` VALUES (14, 'Registro 1', '2018-03-13', '1234', 'Usuario 1', '2018-03-14', 'Nuevo 1', '15000');
INSERT INTO `ct_materiales` VALUES (15, 'Registro 2', '2018-03-15', '5678ASD', 'Usuario 2', '2018-03-16', 'Nuevo 2', '18000');
INSERT INTO `ct_materiales` VALUES (16, 'Registro 3', '2018-03-20', 'TRY456', 'Usuario 3', '2018-03-24', 'Nuevo 3', '45000');
COMMIT;

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
-- Records of ct_nomina
-- ----------------------------
BEGIN;
INSERT INTO `ct_nomina` VALUES (6, '2018-04-30', '100000', 8, '5000');
INSERT INTO `ct_nomina` VALUES (8, '2018-04-20', '35000', 3, '1000');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=427 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_pagos
-- ----------------------------
BEGIN;
INSERT INTO `ct_pagos` VALUES (8, 1, '2018-03-06', 20900.00);
INSERT INTO `ct_pagos` VALUES (9, 3, '2018-03-06', 600000.00);
INSERT INTO `ct_pagos` VALUES (12, 10, '2018-03-07', 128000.00);
INSERT INTO `ct_pagos` VALUES (18, 7, '2018-03-07', 500000.00);
INSERT INTO `ct_pagos` VALUES (20, 14, '2018-05-16', 105000.00);
INSERT INTO `ct_pagos` VALUES (24, 19, '2018-05-17', 4896.36);
INSERT INTO `ct_pagos` VALUES (25, 25, '2018-05-10', 36940.20);
INSERT INTO `ct_pagos` VALUES (26, 26, '2018-05-10', 17141.64);
INSERT INTO `ct_pagos` VALUES (27, 27, '2018-05-09', 11546.64);
INSERT INTO `ct_pagos` VALUES (28, 29, '2018-05-10', 2460.36);
INSERT INTO `ct_pagos` VALUES (29, 30, '2018-05-11', 102287.64);
INSERT INTO `ct_pagos` VALUES (30, 31, '2018-05-08', 13340.00);
INSERT INTO `ct_pagos` VALUES (31, 28, '2018-05-18', 4959.00);
INSERT INTO `ct_pagos` VALUES (33, 37, '2018-05-25', 33805.71);
INSERT INTO `ct_pagos` VALUES (34, 38, '2018-05-25', 50033.82);
INSERT INTO `ct_pagos` VALUES (35, 36, '2018-05-23', 2931.32);
INSERT INTO `ct_pagos` VALUES (36, 32, '2018-05-24', 32433.75);
INSERT INTO `ct_pagos` VALUES (37, 33, '2018-05-24', 3212.15);
INSERT INTO `ct_pagos` VALUES (38, 34, '2018-05-24', 138825.31);
INSERT INTO `ct_pagos` VALUES (39, 35, '2018-05-24', 200793.49);
INSERT INTO `ct_pagos` VALUES (41, 18, '2018-05-31', 14097.94);
INSERT INTO `ct_pagos` VALUES (42, 44, '2018-06-08', 55119.37);
INSERT INTO `ct_pagos` VALUES (43, 45, '2018-06-08', 103530.00);
INSERT INTO `ct_pagos` VALUES (44, 24, '2018-06-08', 35072.39);
INSERT INTO `ct_pagos` VALUES (45, 23, '2018-06-08', 3382.71);
INSERT INTO `ct_pagos` VALUES (46, 22, '2018-06-08', 30599.31);
INSERT INTO `ct_pagos` VALUES (47, 21, '2018-06-08', 130365.21);
INSERT INTO `ct_pagos` VALUES (48, 20, '2018-06-08', 202644.44);
INSERT INTO `ct_pagos` VALUES (49, 152, '2018-06-14', 40031.60);
INSERT INTO `ct_pagos` VALUES (50, 153, '2018-06-14', 100700.18);
INSERT INTO `ct_pagos` VALUES (51, 155, '2017-02-16', 14598.60);
INSERT INTO `ct_pagos` VALUES (52, 156, '2017-02-16', 4129.60);
INSERT INTO `ct_pagos` VALUES (53, 157, '2017-02-16', 9581.60);
INSERT INTO `ct_pagos` VALUES (54, 158, '2017-02-16', 2842.00);
INSERT INTO `ct_pagos` VALUES (55, 159, '2017-02-01', 216905.44);
INSERT INTO `ct_pagos` VALUES (56, 160, '2017-02-01', 173802.12);
INSERT INTO `ct_pagos` VALUES (57, 161, '2017-02-01', 77624.40);
INSERT INTO `ct_pagos` VALUES (58, 162, '2017-02-01', 48377.66);
INSERT INTO `ct_pagos` VALUES (59, 163, '2017-02-22', 25728.80);
INSERT INTO `ct_pagos` VALUES (60, 164, '2017-02-22', 4640.00);
INSERT INTO `ct_pagos` VALUES (61, 165, '2017-02-22', 11704.40);
INSERT INTO `ct_pagos` VALUES (62, 166, '2017-01-23', 3000.00);
INSERT INTO `ct_pagos` VALUES (63, 167, '2017-01-23', 1000.00);
INSERT INTO `ct_pagos` VALUES (64, 168, '2017-01-23', 245.00);
INSERT INTO `ct_pagos` VALUES (65, 169, '2017-02-09', 182962.43);
INSERT INTO `ct_pagos` VALUES (66, 170, '2017-02-09', 176462.72);
INSERT INTO `ct_pagos` VALUES (67, 171, '2017-02-09', 110783.44);
INSERT INTO `ct_pagos` VALUES (68, 172, '2017-02-09', 48610.14);
INSERT INTO `ct_pagos` VALUES (69, 173, '2017-02-03', 46005.60);
INSERT INTO `ct_pagos` VALUES (70, 174, '2017-03-02', 31388.67);
INSERT INTO `ct_pagos` VALUES (71, 175, '2017-03-02', 19617.92);
INSERT INTO `ct_pagos` VALUES (72, 176, '2017-02-04', 36675.72);
INSERT INTO `ct_pagos` VALUES (73, 177, '2017-03-03', 5382.40);
INSERT INTO `ct_pagos` VALUES (74, 178, '2017-02-23', 194022.22);
INSERT INTO `ct_pagos` VALUES (75, 179, '2017-02-23', 186866.86);
INSERT INTO `ct_pagos` VALUES (76, 180, '2017-02-23', 54769.03);
INSERT INTO `ct_pagos` VALUES (77, 181, '2017-02-23', 44777.74);
INSERT INTO `ct_pagos` VALUES (78, 182, '2017-03-12', 44404.80);
INSERT INTO `ct_pagos` VALUES (79, 183, '2017-02-13', 25346.00);
INSERT INTO `ct_pagos` VALUES (80, 184, '2017-03-16', 26544.28);
INSERT INTO `ct_pagos` VALUES (81, 185, '2017-02-15', 76996.16);
INSERT INTO `ct_pagos` VALUES (82, 186, '2017-02-18', 57589.04);
INSERT INTO `ct_pagos` VALUES (83, 187, '2017-03-17', 5591.20);
INSERT INTO `ct_pagos` VALUES (84, 188, '2017-02-10', 5200.00);
INSERT INTO `ct_pagos` VALUES (85, 189, '2017-02-03', 310.00);
INSERT INTO `ct_pagos` VALUES (86, 190, '2017-02-25', 162284.00);
INSERT INTO `ct_pagos` VALUES (87, 191, '2017-03-09', 274825.84);
INSERT INTO `ct_pagos` VALUES (88, 192, '2017-03-09', 142487.87);
INSERT INTO `ct_pagos` VALUES (89, 193, '2017-03-09', 44500.78);
INSERT INTO `ct_pagos` VALUES (90, 194, '2017-03-29', 29426.88);
INSERT INTO `ct_pagos` VALUES (91, 195, '2017-03-05', 106443.34);
INSERT INTO `ct_pagos` VALUES (92, 196, '2017-04-02', 0.00);
INSERT INTO `ct_pagos` VALUES (93, 197, '2017-04-02', 19743.20);
INSERT INTO `ct_pagos` VALUES (94, 198, '2017-04-02', 4500.80);
INSERT INTO `ct_pagos` VALUES (95, 199, '2017-04-02', 11205.60);
INSERT INTO `ct_pagos` VALUES (96, 200, '2017-03-06', 70117.73);
INSERT INTO `ct_pagos` VALUES (97, 201, '2017-03-06', 1110.00);
INSERT INTO `ct_pagos` VALUES (98, 202, '2017-03-11', 113390.87);
INSERT INTO `ct_pagos` VALUES (99, 203, '2017-04-07', 14036.00);
INSERT INTO `ct_pagos` VALUES (100, 204, '2017-04-07', 12713.60);
INSERT INTO `ct_pagos` VALUES (101, 205, '2017-03-12', 56430.94);
INSERT INTO `ct_pagos` VALUES (102, 206, '2017-04-08', 34548.28);
INSERT INTO `ct_pagos` VALUES (103, 207, '2017-03-16', 13135.14);
INSERT INTO `ct_pagos` VALUES (104, 208, '2017-03-15', 76996.16);
INSERT INTO `ct_pagos` VALUES (105, 209, '2017-03-30', 150167.59);
INSERT INTO `ct_pagos` VALUES (106, 210, '2017-03-30', 246547.31);
INSERT INTO `ct_pagos` VALUES (107, 211, '2017-03-30', 33996.88);
INSERT INTO `ct_pagos` VALUES (108, 212, '2017-03-30', 44556.73);
INSERT INTO `ct_pagos` VALUES (109, 213, '2017-03-20', 15288.80);
INSERT INTO `ct_pagos` VALUES (110, 214, '2017-03-20', 7308.00);
INSERT INTO `ct_pagos` VALUES (111, 215, '2017-04-16', 24522.40);
INSERT INTO `ct_pagos` VALUES (112, 216, '2017-04-16', 11770.75);
INSERT INTO `ct_pagos` VALUES (113, 217, '2017-04-13', 158219.42);
INSERT INTO `ct_pagos` VALUES (114, 218, '2017-04-13', 240755.58);
INSERT INTO `ct_pagos` VALUES (115, 219, '2017-04-13', 41094.33);
INSERT INTO `ct_pagos` VALUES (116, 220, '2017-04-07', 10068.80);
INSERT INTO `ct_pagos` VALUES (117, 221, '2017-05-05', 66137.40);
INSERT INTO `ct_pagos` VALUES (118, 222, '2017-04-07', 1800.00);
INSERT INTO `ct_pagos` VALUES (119, 223, '2017-04-22', 166475.84);
INSERT INTO `ct_pagos` VALUES (120, 224, '2017-04-22', 139428.09);
INSERT INTO `ct_pagos` VALUES (121, 225, '2017-04-22', 95928.41);
INSERT INTO `ct_pagos` VALUES (122, 226, '2017-04-22', 41424.65);
INSERT INTO `ct_pagos` VALUES (123, 227, '2017-05-07', 7331.20);
INSERT INTO `ct_pagos` VALUES (124, 228, '2017-05-07', 6055.20);
INSERT INTO `ct_pagos` VALUES (125, 229, '2017-05-10', 2621.60);
INSERT INTO `ct_pagos` VALUES (126, 230, '2017-04-11', 76996.16);
INSERT INTO `ct_pagos` VALUES (127, 231, '2017-05-18', 66589.80);
INSERT INTO `ct_pagos` VALUES (128, 232, '2017-05-18', 10231.20);
INSERT INTO `ct_pagos` VALUES (129, 233, '2017-04-25', 39464.24);
INSERT INTO `ct_pagos` VALUES (130, 234, '2017-05-10', 224987.73);
INSERT INTO `ct_pagos` VALUES (131, 235, '2017-05-10', 121926.57);
INSERT INTO `ct_pagos` VALUES (132, 236, '2017-05-10', 35890.98);
INSERT INTO `ct_pagos` VALUES (133, 237, '2017-04-25', 1180.00);
INSERT INTO `ct_pagos` VALUES (134, 238, '2017-04-19', 600.00);
INSERT INTO `ct_pagos` VALUES (135, 239, '2017-05-28', 13732.54);
INSERT INTO `ct_pagos` VALUES (136, 240, '2017-05-28', 36096.97);
INSERT INTO `ct_pagos` VALUES (137, 241, '2017-05-28', 19617.92);
INSERT INTO `ct_pagos` VALUES (138, 242, '2017-05-28', 3526.40);
INSERT INTO `ct_pagos` VALUES (139, 243, '2017-05-28', 7482.00);
INSERT INTO `ct_pagos` VALUES (140, 244, '2017-05-01', 9517.37);
INSERT INTO `ct_pagos` VALUES (141, 245, '2017-05-01', 43007.53);
INSERT INTO `ct_pagos` VALUES (142, 246, '2017-05-24', 262361.68);
INSERT INTO `ct_pagos` VALUES (143, 247, '2017-05-24', 108635.92);
INSERT INTO `ct_pagos` VALUES (144, 248, '2017-05-24', 4631.74);
INSERT INTO `ct_pagos` VALUES (145, 249, '2017-05-24', 44007.02);
INSERT INTO `ct_pagos` VALUES (146, 250, '2017-05-15', 76425.16);
INSERT INTO `ct_pagos` VALUES (147, 251, '2017-05-15', 76996.16);
INSERT INTO `ct_pagos` VALUES (148, 252, '2017-05-19', 100119.60);
INSERT INTO `ct_pagos` VALUES (149, 253, '2017-05-21', 57547.60);
INSERT INTO `ct_pagos` VALUES (150, 254, '2017-05-21', 58585.80);
INSERT INTO `ct_pagos` VALUES (151, 255, '2017-05-25', 17354.16);
INSERT INTO `ct_pagos` VALUES (152, 256, '2017-05-25', 6472.80);
INSERT INTO `ct_pagos` VALUES (153, 257, '2017-06-14', 256497.95);
INSERT INTO `ct_pagos` VALUES (154, 258, '2017-06-14', 134963.43);
INSERT INTO `ct_pagos` VALUES (155, 259, '2017-06-14', 40348.29);
INSERT INTO `ct_pagos` VALUES (156, 260, '2017-05-30', 50065.60);
INSERT INTO `ct_pagos` VALUES (157, 261, '2017-06-04', 62361.60);
INSERT INTO `ct_pagos` VALUES (158, 262, '2017-06-04', 42630.00);
INSERT INTO `ct_pagos` VALUES (159, 263, '2017-06-05', 7557.40);
INSERT INTO `ct_pagos` VALUES (160, 264, '2017-07-06', 6171.20);
INSERT INTO `ct_pagos` VALUES (161, 265, '2017-06-09', 4999.60);
INSERT INTO `ct_pagos` VALUES (162, 266, '2017-06-11', 38085.94);
INSERT INTO `ct_pagos` VALUES (163, 267, '2017-06-12', 500.02);
INSERT INTO `ct_pagos` VALUES (164, 268, '2017-06-12', 76996.16);
INSERT INTO `ct_pagos` VALUES (165, 269, '2017-06-29', 223256.49);
INSERT INTO `ct_pagos` VALUES (166, 270, '2017-06-29', 142211.34);
INSERT INTO `ct_pagos` VALUES (167, 271, '2017-06-29', 27335.75);
INSERT INTO `ct_pagos` VALUES (168, 272, '2017-06-29', 41034.17);
INSERT INTO `ct_pagos` VALUES (169, 273, '2017-06-19', 66455.61);
INSERT INTO `ct_pagos` VALUES (170, 274, '2017-06-24', 26540.80);
INSERT INTO `ct_pagos` VALUES (171, 275, '2017-06-25', 6890.40);
INSERT INTO `ct_pagos` VALUES (172, 276, '2017-06-25', 10825.91);
INSERT INTO `ct_pagos` VALUES (173, 277, '2017-07-13', 168710.68);
INSERT INTO `ct_pagos` VALUES (174, 278, '2017-07-13', 195076.42);
INSERT INTO `ct_pagos` VALUES (175, 279, '2017-07-13', 16896.38);
INSERT INTO `ct_pagos` VALUES (176, 280, '2017-07-13', 39575.42);
INSERT INTO `ct_pagos` VALUES (177, 281, '2017-06-28', 7052.80);
INSERT INTO `ct_pagos` VALUES (178, 282, '2017-06-28', 2227.20);
INSERT INTO `ct_pagos` VALUES (179, 283, '2017-06-28', 7052.80);
INSERT INTO `ct_pagos` VALUES (180, 284, '2017-06-30', 2800.00);
INSERT INTO `ct_pagos` VALUES (181, 285, '2017-07-30', 1252.80);
INSERT INTO `ct_pagos` VALUES (182, 286, '2017-07-30', 2880.05);
INSERT INTO `ct_pagos` VALUES (183, 287, '2017-07-30', 1320.02);
INSERT INTO `ct_pagos` VALUES (184, 288, '2017-07-30', 19617.92);
INSERT INTO `ct_pagos` VALUES (185, 289, '2017-08-03', 20627.12);
INSERT INTO `ct_pagos` VALUES (186, 290, '2017-07-07', 63800.00);
INSERT INTO `ct_pagos` VALUES (187, 291, '2017-07-08', 57420.00);
INSERT INTO `ct_pagos` VALUES (188, 292, '2017-07-29', 164777.40);
INSERT INTO `ct_pagos` VALUES (189, 293, '2017-07-29', 183590.70);
INSERT INTO `ct_pagos` VALUES (190, 294, '2017-07-29', 36890.01);
INSERT INTO `ct_pagos` VALUES (191, 295, '2017-07-14', 0.00);
INSERT INTO `ct_pagos` VALUES (192, 296, '2017-07-22', 87817.80);
INSERT INTO `ct_pagos` VALUES (193, 297, '2017-07-23', 66352.00);
INSERT INTO `ct_pagos` VALUES (194, 298, '2017-07-23', 0.00);
INSERT INTO `ct_pagos` VALUES (195, 299, '2017-07-27', 0.00);
INSERT INTO `ct_pagos` VALUES (196, 300, '2017-07-28', 55364.48);
INSERT INTO `ct_pagos` VALUES (197, 301, '2017-07-28', 0.00);
INSERT INTO `ct_pagos` VALUES (198, 302, '2017-08-30', 23541.50);
INSERT INTO `ct_pagos` VALUES (199, 303, '2017-08-30', 11770.75);
INSERT INTO `ct_pagos` VALUES (200, 304, '2017-08-30', 24522.40);
INSERT INTO `ct_pagos` VALUES (201, 305, '2017-08-03', 29638.58);
INSERT INTO `ct_pagos` VALUES (202, 306, '2017-08-15', 185239.62);
INSERT INTO `ct_pagos` VALUES (203, 307, '2017-08-15', 152542.95);
INSERT INTO `ct_pagos` VALUES (204, 308, '2017-08-15', 35348.37);
INSERT INTO `ct_pagos` VALUES (205, 309, '2017-08-05', 4181.80);
INSERT INTO `ct_pagos` VALUES (206, 310, '2017-08-05', 29638.58);
INSERT INTO `ct_pagos` VALUES (207, 311, '2017-08-03', 3828.00);
INSERT INTO `ct_pagos` VALUES (208, 312, '2017-08-07', 98353.50);
INSERT INTO `ct_pagos` VALUES (209, 313, '2017-08-07', 8526.00);
INSERT INTO `ct_pagos` VALUES (210, 314, '2017-08-11', 92080.80);
INSERT INTO `ct_pagos` VALUES (211, 315, '2017-08-11', 500.01);
INSERT INTO `ct_pagos` VALUES (212, 316, '2017-08-30', 144892.65);
INSERT INTO `ct_pagos` VALUES (213, 317, '2017-08-30', 145490.17);
INSERT INTO `ct_pagos` VALUES (214, 318, '2017-08-30', 97733.74);
INSERT INTO `ct_pagos` VALUES (215, 319, '2017-08-30', 45893.56);
INSERT INTO `ct_pagos` VALUES (216, 320, '2017-08-20', 75394.20);
INSERT INTO `ct_pagos` VALUES (217, 321, '2017-08-21', 4384.80);
INSERT INTO `ct_pagos` VALUES (218, 322, '2017-08-21', 4683.50);
INSERT INTO `ct_pagos` VALUES (219, 323, '2017-09-17', 3100.00);
INSERT INTO `ct_pagos` VALUES (220, 324, '2017-09-17', 2000.00);
INSERT INTO `ct_pagos` VALUES (221, 325, '2017-08-24', 68147.10);
INSERT INTO `ct_pagos` VALUES (222, 326, '2017-09-21', 2800.00);
INSERT INTO `ct_pagos` VALUES (223, 327, '2017-08-26', 73749.90);
INSERT INTO `ct_pagos` VALUES (224, 328, '2017-08-26', 9270.72);
INSERT INTO `ct_pagos` VALUES (225, 329, '2017-08-27', 10347.20);
INSERT INTO `ct_pagos` VALUES (226, 330, '2017-08-28', 10825.12);
INSERT INTO `ct_pagos` VALUES (227, 331, '2017-09-29', 2505.60);
INSERT INTO `ct_pagos` VALUES (228, 332, '2017-09-29', 17886.64);
INSERT INTO `ct_pagos` VALUES (229, 333, '2017-09-29', 16111.94);
INSERT INTO `ct_pagos` VALUES (230, 334, '2017-09-29', 12751.65);
INSERT INTO `ct_pagos` VALUES (231, 335, '2017-09-29', 19617.92);
INSERT INTO `ct_pagos` VALUES (232, 336, '2017-08-31', 180.00);
INSERT INTO `ct_pagos` VALUES (233, 337, '2017-08-31', 2000.07);
INSERT INTO `ct_pagos` VALUES (234, 338, '2017-09-16', 159179.94);
INSERT INTO `ct_pagos` VALUES (235, 339, '2017-09-16', 197039.20);
INSERT INTO `ct_pagos` VALUES (236, 340, '2017-09-16', 41245.27);
INSERT INTO `ct_pagos` VALUES (237, 341, '2017-09-08', 14563.80);
INSERT INTO `ct_pagos` VALUES (238, 342, '2017-09-10', 67853.99);
INSERT INTO `ct_pagos` VALUES (239, 343, '2017-09-29', 156758.01);
INSERT INTO `ct_pagos` VALUES (240, 344, '2017-09-29', 151065.24);
INSERT INTO `ct_pagos` VALUES (241, 345, '2017-09-29', 46705.00);
INSERT INTO `ct_pagos` VALUES (242, 346, '2017-09-29', 41559.00);
INSERT INTO `ct_pagos` VALUES (243, 347, '2017-09-17', 29536.50);
INSERT INTO `ct_pagos` VALUES (244, 348, '2017-09-25', 9716.74);
INSERT INTO `ct_pagos` VALUES (245, 349, '2017-09-25', 1406.50);
INSERT INTO `ct_pagos` VALUES (246, 350, '2017-09-25', 126006.16);
INSERT INTO `ct_pagos` VALUES (247, 351, '2017-10-22', 180008.80);
INSERT INTO `ct_pagos` VALUES (248, 352, '2017-09-30', 49967.77);
INSERT INTO `ct_pagos` VALUES (249, 353, '2017-09-30', 5359.20);
INSERT INTO `ct_pagos` VALUES (250, 354, '2017-10-12', 167448.05);
INSERT INTO `ct_pagos` VALUES (251, 355, '2017-10-12', 147153.59);
INSERT INTO `ct_pagos` VALUES (252, 356, '2017-10-12', 36876.38);
INSERT INTO `ct_pagos` VALUES (253, 357, '2017-10-12', 41346.98);
INSERT INTO `ct_pagos` VALUES (254, 358, '2017-09-29', 509.99);
INSERT INTO `ct_pagos` VALUES (255, 359, '2017-09-29', 2273.59);
INSERT INTO `ct_pagos` VALUES (256, 360, '2017-10-08', 119886.00);
INSERT INTO `ct_pagos` VALUES (257, 361, '2017-11-05', 12528.00);
INSERT INTO `ct_pagos` VALUES (258, 362, '2017-10-09', 5324.40);
INSERT INTO `ct_pagos` VALUES (259, 363, '2017-10-06', 555.20);
INSERT INTO `ct_pagos` VALUES (260, 364, '2017-10-27', 55683.45);
INSERT INTO `ct_pagos` VALUES (261, 365, '2017-10-27', 111238.34);
INSERT INTO `ct_pagos` VALUES (262, 366, '2017-10-27', 214794.04);
INSERT INTO `ct_pagos` VALUES (263, 367, '2017-10-27', 44683.08);
INSERT INTO `ct_pagos` VALUES (264, 368, '2017-11-12', 16912.80);
INSERT INTO `ct_pagos` VALUES (265, 369, '2017-11-15', 26876.55);
INSERT INTO `ct_pagos` VALUES (266, 370, '2017-10-21', 84842.40);
INSERT INTO `ct_pagos` VALUES (267, 371, '2017-10-21', 14869.43);
INSERT INTO `ct_pagos` VALUES (268, 372, '2017-10-21', 63365.00);
INSERT INTO `ct_pagos` VALUES (269, 373, '2017-10-22', 78729.20);
INSERT INTO `ct_pagos` VALUES (270, 374, '2017-10-23', 1879.20);
INSERT INTO `ct_pagos` VALUES (271, 375, '2017-11-10', 190545.12);
INSERT INTO `ct_pagos` VALUES (272, 376, '2017-11-10', 139548.30);
INSERT INTO `ct_pagos` VALUES (273, 377, '2017-11-10', 42068.40);
INSERT INTO `ct_pagos` VALUES (274, 378, '2017-11-10', 43769.41);
INSERT INTO `ct_pagos` VALUES (275, 379, '2017-11-04', 83946.51);
INSERT INTO `ct_pagos` VALUES (276, 380, '2017-11-05', 11598.84);
INSERT INTO `ct_pagos` VALUES (277, 381, '2017-11-05', 56271.60);
INSERT INTO `ct_pagos` VALUES (278, 382, '2017-11-05', 38280.00);
INSERT INTO `ct_pagos` VALUES (279, 383, '2017-11-05', 22011.00);
INSERT INTO `ct_pagos` VALUES (280, 384, '2017-12-04', 12528.00);
INSERT INTO `ct_pagos` VALUES (281, 385, '2017-12-04', 8769.60);
INSERT INTO `ct_pagos` VALUES (282, 386, '2017-11-24', 205159.81);
INSERT INTO `ct_pagos` VALUES (283, 387, '2017-11-24', 157782.56);
INSERT INTO `ct_pagos` VALUES (284, 388, '2017-11-24', 42440.83);
INSERT INTO `ct_pagos` VALUES (285, 389, '2017-11-10', 1587.00);
INSERT INTO `ct_pagos` VALUES (286, 390, '2017-11-17', 36540.00);
INSERT INTO `ct_pagos` VALUES (287, 391, '2017-11-17', 13763.40);
INSERT INTO `ct_pagos` VALUES (288, 392, '2017-11-19', 93493.03);
INSERT INTO `ct_pagos` VALUES (289, 393, '2017-11-19', 118320.00);
INSERT INTO `ct_pagos` VALUES (290, 394, '2017-12-09', 199398.85);
INSERT INTO `ct_pagos` VALUES (291, 395, '2017-12-09', 148723.26);
INSERT INTO `ct_pagos` VALUES (292, 396, '2017-12-09', 40980.63);
INSERT INTO `ct_pagos` VALUES (293, 397, '2017-12-27', 13154.40);
INSERT INTO `ct_pagos` VALUES (294, 398, '2017-11-27', 799.99);
INSERT INTO `ct_pagos` VALUES (295, 399, '2017-11-27', 270.00);
INSERT INTO `ct_pagos` VALUES (296, 400, '2017-12-28', 4071.60);
INSERT INTO `ct_pagos` VALUES (297, 401, '2017-12-01', 122393.84);
INSERT INTO `ct_pagos` VALUES (298, 402, '2017-12-03', 0.00);
INSERT INTO `ct_pagos` VALUES (299, 403, '2017-12-04', 123545.80);
INSERT INTO `ct_pagos` VALUES (300, 404, '2017-12-10', 39997.17);
INSERT INTO `ct_pagos` VALUES (301, 405, '2017-12-10', 40846.23);
INSERT INTO `ct_pagos` VALUES (302, 406, '2017-12-10', 154328.72);
INSERT INTO `ct_pagos` VALUES (303, 407, '2017-12-15', 110432.00);
INSERT INTO `ct_pagos` VALUES (304, 408, '2017-12-15', 5191.00);
INSERT INTO `ct_pagos` VALUES (305, 409, '2017-12-18', 35971.96);
INSERT INTO `ct_pagos` VALUES (306, 410, '2017-12-18', 60412.80);
INSERT INTO `ct_pagos` VALUES (307, 411, '2018-01-03', 157478.29);
INSERT INTO `ct_pagos` VALUES (308, 412, '2018-01-03', 125723.93);
INSERT INTO `ct_pagos` VALUES (309, 413, '2018-01-03', 68907.65);
INSERT INTO `ct_pagos` VALUES (310, 414, '2018-01-03', 42355.40);
INSERT INTO `ct_pagos` VALUES (311, 415, '2017-12-29', 49165.30);
INSERT INTO `ct_pagos` VALUES (312, 416, '2018-01-25', 27465.09);
INSERT INTO `ct_pagos` VALUES (313, 417, '2018-01-25', 11076.96);
INSERT INTO `ct_pagos` VALUES (314, 418, '2018-01-25', 23541.50);
INSERT INTO `ct_pagos` VALUES (315, 419, '2018-01-25', 7847.17);
INSERT INTO `ct_pagos` VALUES (316, 420, '2017-01-16', 76996.16);
INSERT INTO `ct_pagos` VALUES (317, 421, '2018-01-13', 41019.34);
INSERT INTO `ct_pagos` VALUES (318, 46, '2018-01-13', 41629.85);
INSERT INTO `ct_pagos` VALUES (319, 47, '2018-02-01', 248663.56);
INSERT INTO `ct_pagos` VALUES (320, 48, '2018-02-01', 97566.31);
INSERT INTO `ct_pagos` VALUES (321, 49, '2018-02-01', 6893.40);
INSERT INTO `ct_pagos` VALUES (322, 50, '2018-02-01', 33354.69);
INSERT INTO `ct_pagos` VALUES (323, 51, '2018-01-21', 8021.40);
INSERT INTO `ct_pagos` VALUES (324, 52, '2018-01-25', 65435.83);
INSERT INTO `ct_pagos` VALUES (325, 53, '2018-01-27', 6368.40);
INSERT INTO `ct_pagos` VALUES (326, 54, '2018-02-13', 187088.09);
INSERT INTO `ct_pagos` VALUES (327, 55, '2018-02-13', 149665.15);
INSERT INTO `ct_pagos` VALUES (328, 56, '2018-02-13', 6751.86);
INSERT INTO `ct_pagos` VALUES (329, 57, '2018-02-13', 32483.22);
INSERT INTO `ct_pagos` VALUES (330, 58, '2018-02-03', 160525.44);
INSERT INTO `ct_pagos` VALUES (331, 59, '2018-01-31', 540.00);
INSERT INTO `ct_pagos` VALUES (332, 60, '2018-02-04', 77170.16);
INSERT INTO `ct_pagos` VALUES (333, 61, '2018-02-10', 79831.20);
INSERT INTO `ct_pagos` VALUES (334, 62, '2018-02-10', 145062.64);
INSERT INTO `ct_pagos` VALUES (335, 63, '2018-02-17', 61898.76);
INSERT INTO `ct_pagos` VALUES (336, 64, '2018-02-17', 48613.16);
INSERT INTO `ct_pagos` VALUES (337, 65, '2018-02-17', 38883.20);
INSERT INTO `ct_pagos` VALUES (338, 66, '2018-03-06', 161270.53);
INSERT INTO `ct_pagos` VALUES (339, 67, '2018-03-06', 153223.52);
INSERT INTO `ct_pagos` VALUES (340, 68, '2018-03-06', 19783.87);
INSERT INTO `ct_pagos` VALUES (341, 69, '2018-03-06', 7795.56);
INSERT INTO `ct_pagos` VALUES (342, 70, '2018-03-06', 32093.98);
INSERT INTO `ct_pagos` VALUES (343, 71, '2018-02-23', 175136.02);
INSERT INTO `ct_pagos` VALUES (344, 72, '2018-02-24', 103349.04);
INSERT INTO `ct_pagos` VALUES (345, 73, '2018-02-25', 69482.84);
INSERT INTO `ct_pagos` VALUES (346, 74, '2018-03-01', 168200.00);
INSERT INTO `ct_pagos` VALUES (347, 75, '2018-03-02', 100920.00);
INSERT INTO `ct_pagos` VALUES (348, 76, '2018-03-16', 154690.13);
INSERT INTO `ct_pagos` VALUES (349, 77, '2018-03-16', 150652.31);
INSERT INTO `ct_pagos` VALUES (350, 78, '2018-03-16', 39554.12);
INSERT INTO `ct_pagos` VALUES (351, 79, '2018-03-16', 3206.92);
INSERT INTO `ct_pagos` VALUES (352, 80, '2018-03-16', 33310.51);
INSERT INTO `ct_pagos` VALUES (353, 81, '2018-03-08', 33640.00);
INSERT INTO `ct_pagos` VALUES (354, 82, '2018-03-08', 33640.00);
INSERT INTO `ct_pagos` VALUES (355, 83, '2018-03-08', 14662.40);
INSERT INTO `ct_pagos` VALUES (356, 84, '2018-03-10', 5383.56);
INSERT INTO `ct_pagos` VALUES (357, 85, '2018-03-10', 59400.56);
INSERT INTO `ct_pagos` VALUES (358, 86, '2018-03-11', 191530.50);
INSERT INTO `ct_pagos` VALUES (359, 87, '2018-03-16', 117955.18);
INSERT INTO `ct_pagos` VALUES (360, 88, '2018-03-18', 54261.13);
INSERT INTO `ct_pagos` VALUES (361, 89, '2018-03-25', 6960.00);
INSERT INTO `ct_pagos` VALUES (362, 90, '2018-03-25', 5269.88);
INSERT INTO `ct_pagos` VALUES (363, 91, '2018-04-06', 199223.55);
INSERT INTO `ct_pagos` VALUES (364, 92, '2018-04-06', 99144.99);
INSERT INTO `ct_pagos` VALUES (365, 93, '2018-04-06', 41105.48);
INSERT INTO `ct_pagos` VALUES (366, 94, '2018-04-06', 3201.82);
INSERT INTO `ct_pagos` VALUES (367, 95, '2018-04-06', 32510.50);
INSERT INTO `ct_pagos` VALUES (368, 96, '2018-04-22', 14097.94);
INSERT INTO `ct_pagos` VALUES (369, 97, '2018-04-22', 25503.30);
INSERT INTO `ct_pagos` VALUES (370, 98, '2018-04-27', 19617.92);
INSERT INTO `ct_pagos` VALUES (371, 99, '2018-04-27', 9808.96);
INSERT INTO `ct_pagos` VALUES (372, 100, '2018-04-06', 4206.16);
INSERT INTO `ct_pagos` VALUES (373, 101, '2018-04-20', 183168.30);
INSERT INTO `ct_pagos` VALUES (374, 102, '2018-04-20', 149369.29);
INSERT INTO `ct_pagos` VALUES (375, 103, '2018-04-20', 7781.29);
INSERT INTO `ct_pagos` VALUES (376, 104, '2018-04-20', 23646.97);
INSERT INTO `ct_pagos` VALUES (377, 105, '2018-04-20', 31959.64);
INSERT INTO `ct_pagos` VALUES (378, 106, '2018-04-12', 10820.48);
INSERT INTO `ct_pagos` VALUES (379, 107, '2018-04-12', 5220.00);
INSERT INTO `ct_pagos` VALUES (380, 108, '2018-05-09', 9808.96);
INSERT INTO `ct_pagos` VALUES (381, 109, '2018-04-13', 6041.28);
INSERT INTO `ct_pagos` VALUES (382, 110, '2018-05-02', 148659.95);
INSERT INTO `ct_pagos` VALUES (383, 111, '2018-05-02', 137191.34);
INSERT INTO `ct_pagos` VALUES (384, 112, '2018-05-02', 41958.95);
INSERT INTO `ct_pagos` VALUES (385, 113, '2018-05-02', 3088.54);
INSERT INTO `ct_pagos` VALUES (386, 114, '2018-05-02', 31401.93);
INSERT INTO `ct_pagos` VALUES (387, 115, '2018-04-22', 0.00);
INSERT INTO `ct_pagos` VALUES (388, 116, '2018-04-22', 41655.60);
INSERT INTO `ct_pagos` VALUES (389, 117, '2018-05-04', 0.00);
INSERT INTO `ct_pagos` VALUES (390, 118, '2018-04-23', 24012.00);
INSERT INTO `ct_pagos` VALUES (391, 119, '2018-04-27', 23594.40);
INSERT INTO `ct_pagos` VALUES (392, 120, '2018-04-27', 3946.32);
INSERT INTO `ct_pagos` VALUES (393, 121, '2018-04-28', 74541.60);
INSERT INTO `ct_pagos` VALUES (394, 122, '2018-04-28', 73851.40);
INSERT INTO `ct_pagos` VALUES (395, 123, '2018-04-29', 0.00);
INSERT INTO `ct_pagos` VALUES (396, 124, '2018-04-29', 2216.76);
INSERT INTO `ct_pagos` VALUES (397, 39, '2018-05-25', 120000.00);
INSERT INTO `ct_pagos` VALUES (399, 39, '2018-05-31', 62473.51);
INSERT INTO `ct_pagos` VALUES (400, 154, '2018-06-20', 110224.94);
INSERT INTO `ct_pagos` VALUES (401, 422, '2018-06-22', 28643.30);
INSERT INTO `ct_pagos` VALUES (402, 43, '2018-06-26', 34215.52);
INSERT INTO `ct_pagos` VALUES (403, 42, '2018-06-26', 3775.45);
INSERT INTO `ct_pagos` VALUES (404, 149, '2018-06-26', 153325.42);
INSERT INTO `ct_pagos` VALUES (405, 40, '2018-06-26', 205746.18);
INSERT INTO `ct_pagos` VALUES (406, 428, '2018-06-28', 154121.66);
INSERT INTO `ct_pagos` VALUES (407, 430, '2018-07-09', 70055.30);
INSERT INTO `ct_pagos` VALUES (408, 432, '2018-07-12', 3735.20);
INSERT INTO `ct_pagos` VALUES (409, 433, '2018-07-12', 3451.00);
INSERT INTO `ct_pagos` VALUES (410, 434, '2018-07-12', 2444.12);
INSERT INTO `ct_pagos` VALUES (411, 435, '2018-07-12', 31842.99);
INSERT INTO `ct_pagos` VALUES (412, 429, '2018-07-10', 58667.00);
INSERT INTO `ct_pagos` VALUES (413, 431, '2018-07-13', 120163.82);
INSERT INTO `ct_pagos` VALUES (414, 440, '2018-07-13', 102886.20);
INSERT INTO `ct_pagos` VALUES (415, 437, '2018-07-20', 7871.76);
INSERT INTO `ct_pagos` VALUES (416, 438, '2018-07-19', 1774.80);
INSERT INTO `ct_pagos` VALUES (417, 439, '2018-07-20', 19126.08);
INSERT INTO `ct_pagos` VALUES (418, 427, '2018-07-17', 34617.81);
INSERT INTO `ct_pagos` VALUES (419, 426, '2018-07-17', 3440.00);
INSERT INTO `ct_pagos` VALUES (420, 425, '2018-07-17', 84260.38);
INSERT INTO `ct_pagos` VALUES (421, 424, '2018-07-17', 135314.62);
INSERT INTO `ct_pagos` VALUES (422, 423, '2018-07-17', 143334.18);
INSERT INTO `ct_pagos` VALUES (423, 17, '2018-07-20', 20000.00);
INSERT INTO `ct_pagos` VALUES (424, 447, '2018-07-26', 122250.95);
INSERT INTO `ct_pagos` VALUES (425, 446, '2018-07-25', 241280.00);
INSERT INTO `ct_pagos` VALUES (426, 17, '2018-07-27', 9426.88);
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_produccion
-- ----------------------------
BEGIN;
INSERT INTO `ct_produccion` VALUES (1, '1', '2017-10-25', 50, 40, '');
INSERT INTO `ct_produccion` VALUES (2, '1', '2017-10-25', 30, 30, '');
INSERT INTO `ct_produccion` VALUES (3, '2', '2017-10-26', 40, 50, '');
INSERT INTO `ct_produccion` VALUES (4, '3', '2017-10-26', 50, 50, '');
INSERT INTO `ct_produccion` VALUES (5, '10', '2017-11-02', 1000, 1000, '');
INSERT INTO `ct_produccion` VALUES (6, '10', '2017-11-08', 1000, 1000, '');
INSERT INTO `ct_produccion` VALUES (7, '10', '2017-11-03', 1000, 1000, '');
INSERT INTO `ct_produccion` VALUES (8, '10', '2017-11-06', 1000, 1000, '');
INSERT INTO `ct_produccion` VALUES (9, '10', '2017-11-07', 1000, 1000, '');
INSERT INTO `ct_produccion` VALUES (10, '10', '2017-11-09', 800, 800, '');
INSERT INTO `ct_produccion` VALUES (12, '10', '2017-11-03', 1000, 850, '');
INSERT INTO `ct_produccion` VALUES (13, '16', '2018-02-15', 50, 40, '');
INSERT INTO `ct_produccion` VALUES (35, '79', '2018-04-04', 350, 350, '');
INSERT INTO `ct_produccion` VALUES (36, '78', '2018-04-13', 1000, 900, '');
INSERT INTO `ct_produccion` VALUES (37, '78', '2018-04-14', 900, 900, '');
INSERT INTO `ct_produccion` VALUES (38, '75', '2018-04-14', 100, 120, '');
INSERT INTO `ct_produccion` VALUES (39, '99', '2018-05-28', 556, 574, '');
INSERT INTO `ct_produccion` VALUES (40, '99', '2018-05-29', 1000, 1000, '');
INSERT INTO `ct_produccion` VALUES (41, '99', '2018-05-30', 1000, 900, '');
INSERT INTO `ct_produccion` VALUES (42, '99', '2018-05-31', 1000, 1000, '');
INSERT INTO `ct_produccion` VALUES (43, '99', '2018-06-01', 1000, 1000, '');
INSERT INTO `ct_produccion` VALUES (44, '99', '2018-06-04', 1000, 520, '');
INSERT INTO `ct_produccion` VALUES (50, '100', '2018-06-06', 850, 285, '');
INSERT INTO `ct_produccion` VALUES (51, '100', '2018-06-05', 850, 650, '');
INSERT INTO `ct_produccion` VALUES (52, '104', '2018-06-06', 850, 365, 'Deshebrado');
INSERT INTO `ct_produccion` VALUES (53, '104', '2018-06-07', 850, 95, '');
INSERT INTO `ct_produccion` VALUES (54, '102', '2018-06-07', 850, 78, '');
INSERT INTO `ct_produccion` VALUES (55, '107', '2018-06-07', 850, 250, '');
INSERT INTO `ct_produccion` VALUES (56, '105', '2018-06-07', 1000, 63, '');
INSERT INTO `ct_produccion` VALUES (57, '106', '2018-06-07', 850, 78, '');
INSERT INTO `ct_produccion` VALUES (63, '107', '2018-06-08', 850, 750, '');
INSERT INTO `ct_produccion` VALUES (64, '107', '2018-06-09', 850, 200, '');
INSERT INTO `ct_produccion` VALUES (65, '107', '2018-06-11', 850, 900, '');
INSERT INTO `ct_produccion` VALUES (66, '107', '2018-06-12', 850, 900, '');
INSERT INTO `ct_produccion` VALUES (67, '107', '2018-06-13', 850, 950, '');
INSERT INTO `ct_produccion` VALUES (68, '107', '2018-06-14', 850, 950, '');
INSERT INTO `ct_produccion` VALUES (69, '107', '2018-06-15', 850, 651, '');
INSERT INTO `ct_produccion` VALUES (71, '103', '2018-06-19', 1000, 1000, '');
INSERT INTO `ct_produccion` VALUES (72, '103', '2018-06-20', 1000, 1000, '');
INSERT INTO `ct_produccion` VALUES (73, '103', '2018-06-21', 1000, 1050, '');
INSERT INTO `ct_produccion` VALUES (74, '103', '2018-06-22', 1000, 1000, '');
INSERT INTO `ct_produccion` VALUES (75, '103', '2018-06-25', 1000, 960, '');
INSERT INTO `ct_produccion` VALUES (76, '109', '2018-06-26', 850, 866, '');
INSERT INTO `ct_produccion` VALUES (77, '110', '2018-06-26', 850, 34, '');
INSERT INTO `ct_produccion` VALUES (78, '109', '2018-06-27', 850, 950, '');
INSERT INTO `ct_produccion` VALUES (80, '109', '2018-06-28', 850, 1000, '');
INSERT INTO `ct_produccion` VALUES (81, '109', '2018-06-29', 850, 500, 'Real');
INSERT INTO `ct_produccion` VALUES (82, '109', '2018-06-30', 425, 200, '');
INSERT INTO `ct_produccion` VALUES (83, '109', '2018-07-02', 850, 850, 'real');
INSERT INTO `ct_produccion` VALUES (84, '109', '2018-07-03', 850, 1000, 'REAL');
INSERT INTO `ct_produccion` VALUES (85, '109', '2018-07-03', 70, 70, 'TIEMPO EXTRA');
INSERT INTO `ct_produccion` VALUES (86, '110', '2018-07-04', 229, 229, 'REAL');
INSERT INTO `ct_produccion` VALUES (87, '109', '2018-07-04', 403, 403, 'REAL');
INSERT INTO `ct_produccion` VALUES (88, '111', '2018-07-04', 600, 252, 'REAL');
INSERT INTO `ct_produccion` VALUES (89, '111', '2018-07-05', 283, 283, 'REAL');
INSERT INTO `ct_produccion` VALUES (90, '108', '2018-07-05', 612, 612, 'REAL');
INSERT INTO `ct_produccion` VALUES (91, '108', '2018-07-06', 1000, 700, 'real');
INSERT INTO `ct_produccion` VALUES (92, '108', '2018-07-09', 1000, 692, 'real cambio de modelo Dos Banderas');
INSERT INTO `ct_produccion` VALUES (93, '112', '2018-07-09', 108, 108, 'cambio de modelo Liberty a  Dos Banderas');
INSERT INTO `ct_produccion` VALUES (94, '112', '2018-07-10', 850, 700, '');
INSERT INTO `ct_produccion` VALUES (95, '112', '2018-07-11', 407, 407, '');
INSERT INTO `ct_produccion` VALUES (97, '114', '2018-07-11', 193, 193, '');
INSERT INTO `ct_produccion` VALUES (98, '114', '2018-07-12', 1000, 1000, 'real');
INSERT INTO `ct_produccion` VALUES (99, '114', '2018-07-13', 1000, 1000, 'real');
INSERT INTO `ct_produccion` VALUES (100, '114', '2018-07-16', 807, 807, 'real');
INSERT INTO `ct_produccion` VALUES (101, '113', '2018-07-16', 193, 193, 'real');
INSERT INTO `ct_produccion` VALUES (102, '113', '2018-07-17', 1000, 885, 'real falta de personal');
INSERT INTO `ct_produccion` VALUES (103, '113', '2018-07-19', 1000, 1200, 'se reviso y plancho 535 Carey mezclilla lavada');
INSERT INTO `ct_produccion` VALUES (104, '113', '2018-07-20', 1000, 900, 'falla de maquinaria las 3 preformadoras y maquinas de ojal');
INSERT INTO `ct_produccion` VALUES (105, '113', '2018-07-23', 1000, 850, 'real maquinaria descompuesta preformadoras las 3');
INSERT INTO `ct_produccion` VALUES (106, '113', '2018-07-24', 1000, 963, 'real faltyaron camisas por tela maquinaria descompuesta preformadoras las 3');
INSERT INTO `ct_produccion` VALUES (107, '101', '2018-07-25', 850, 820, 'REAL MOLDES MAL HECHOS POR CLASS');
INSERT INTO `ct_produccion` VALUES (108, '101', '2018-07-26', 850, 655, 'REAL MOLDES MAL HECHOS POR CLASS');
INSERT INTO `ct_produccion` VALUES (109, '115', '2018-07-27', 155, 155, 'faltante de tela');
INSERT INTO `ct_produccion` VALUES (110, '116', '2018-07-27', 850, 526, 'faltante de tela');
INSERT INTO `ct_produccion` VALUES (111, '117', '2018-07-30', 1000, 850, 'real maquina universal y preformadoras fallando');
INSERT INTO `ct_produccion` VALUES (112, '117', '2018-07-31', 1000, 800, 'real preformadoras fallando falta de costureras');
INSERT INTO `ct_produccion` VALUES (113, '117', '2018-08-01', 1000, 800, 'falla en maquinaria y falta de personal');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of ct_program
-- ----------------------------
BEGIN;
INSERT INTO `ct_program` VALUES (74, '25', 'Toplari', '1000', '#0433ff', '#FFFFFF', '2018-03-28 08:00:00', '2018-03-28 18:00:00');
INSERT INTO `ct_program` VALUES (75, '29', 'Royuli Seguridad', '1200', '#009051', '#FFFFFF', '2018-04-06 08:00:00', '2018-04-06 18:00:00');
INSERT INTO `ct_program` VALUES (78, '29', 'Cap.Garibaldi', '1800', '#9437ff', '#FFFFFF', '2018-04-13 10:30:00', '2018-04-15 16:00:00');
INSERT INTO `ct_program` VALUES (79, '24', 'Privilegio', '350', '#ff9300', '#FFFFFF', '2018-04-04 08:00:00', '2018-04-04 18:00:00');
INSERT INTO `ct_program` VALUES (80, '28', 'Carey', '1300', '#941100', '#FFFFFF', '2018-04-27 12:00:00', '2018-04-29 16:00:00');
INSERT INTO `ct_program` VALUES (81, '24', 'Privilegio', '400', '#ff9300', '#FFFFFF', '2018-04-27 08:00:00', '2018-04-27 12:00:00');
INSERT INTO `ct_program` VALUES (98, '28', 'Empuje Textil, S. de R.L. de C.V.', '605', '#941100', '#FFFFFF', '2018-05-21 08:00:00', '2018-05-21 18:00:00');
INSERT INTO `ct_program` VALUES (99, '23', 'Liberty Uniform Mfg. Co., Inc.', '5004', '#fffb00', '#FFFFFF', '2018-05-28 11:00:00', '2018-06-04 14:00:00');
INSERT INTO `ct_program` VALUES (100, '28', 'Empuje Textil, S. de R.L. de C.V.', '935', '#941100', '#FFFFFF', '2018-06-05 08:00:00', '2018-06-06 12:00:00');
INSERT INTO `ct_program` VALUES (101, '39', 'Uniformes Express S de RL MI               ', '1475', '#ff0000', '#FFFFFF', '2018-07-25 11:00:00', '2018-07-27 12:00:00');
INSERT INTO `ct_program` VALUES (103, '23', 'Liberty Uniform Mfg. Co., Inc.', '5022', '#fffb00', '#FFFFFF', '2018-06-19 09:00:00', '2018-06-26 12:00:00');
INSERT INTO `ct_program` VALUES (104, '28', 'Empuje Textil, S. de R.L. de C.V.', '460(Deshebrado)', '#941100', '#FFFFFF', '2018-06-06 08:00:00', '2018-06-07 18:00:00');
INSERT INTO `ct_program` VALUES (105, '38', 'Confecciones Modi S de RL de CV         ', '63', '#000000', '#FFFFFF', '2018-06-06 12:00:00', '2018-06-06 16:00:00');
INSERT INTO `ct_program` VALUES (106, '42', 'RICARDO GARCIA LOZANO    ', '78', '#8000ff', '#FFFFFF', '2018-06-06 16:00:00', '2018-06-07 10:00:00');
INSERT INTO `ct_program` VALUES (107, '24', 'Grupo Privileggio,S.A. de C.V.', '5551', '#800080', '#FFFFFF', '2018-06-07 10:00:00', '2018-06-19 09:00:00');
INSERT INTO `ct_program` VALUES (108, '23', 'Liberty Uniform Mfg. Co., Inc.', '2004', '#fffb00', '#FFFFFF', '2018-07-06 13:00:00', '2018-07-10 16:00:00');
INSERT INTO `ct_program` VALUES (109, '24', 'Grupo Privileggio,S.A. de C.V.', '5839', '#800080', '#FFFFFF', '2018-06-26 12:00:00', '2018-07-04 18:00:00');
INSERT INTO `ct_program` VALUES (110, '42', 'RICARDO GARCIA LOZANO    ', '213', '#8000ff', '#FFFFFF', '2018-07-05 08:00:00', '2018-07-05 13:00:00');
INSERT INTO `ct_program` VALUES (111, '28', 'Empuje Textil, S. de R.L. de C.V.', '535', '#941100', '#FFFFFF', '2018-07-05 13:00:00', '2018-07-06 13:00:00');
INSERT INTO `ct_program` VALUES (112, '26', 'Grupo Dos Banderas, S.A. de C.V.', '1215', '#c0c0c0', '#FFFFFF', '2018-07-10 16:00:00', '2018-07-12 14:00:00');
INSERT INTO `ct_program` VALUES (113, '23', 'Liberty Uniform Mfg. Co., Inc.', '5004', '#fffb00', '#FFFFFF', '2018-07-18 08:00:00', '2018-07-25 11:00:00');
INSERT INTO `ct_program` VALUES (114, '23', 'Liberty Uniform Mfg. Co., Inc.', '3000', '#fffb00', '#FFFFFF', '2018-07-12 14:00:00', '2018-07-17 14:00:00');
INSERT INTO `ct_program` VALUES (115, '40', 'Virginia Urbina Mendez    ', '160', '#ff8000', '#FFFFFF', '2018-07-27 12:00:00', '2018-07-27 16:00:00');
INSERT INTO `ct_program` VALUES (116, '26', 'Grupo Dos Banderas, S.A. de C.V.', '264', '#c0c0c0', '#FFFFFF', '2018-07-30 10:00:00', '2018-07-30 16:00:00');
INSERT INTO `ct_program` VALUES (117, '23', 'Liberty Uniform Mfg. Co., Inc.', '4971', '#fffb00', '#FFFFFF', '2018-07-30 16:00:00', '2018-08-06 18:00:00');
INSERT INTO `ct_program` VALUES (118, '28', 'Empuje Textil, S. de R.L. de C.V.', '470', '#941100', '#FFFFFF', '2018-08-07 08:00:00', '2018-08-07 17:00:00');
INSERT INTO `ct_program` VALUES (119, '72', 'RED ', '450', '#ea0006', '#FFFFFF', '2018-08-07 17:00:00', '2018-08-08 17:00:00');
INSERT INTO `ct_program` VALUES (120, '31', 'Operaciones Especiales y Aereas SA de CV', '400', '#80ffff', '#FFFFFF', '2018-08-08 17:00:00', '2018-08-09 14:00:00');
INSERT INTO `ct_program` VALUES (121, '23', 'Liberty Uniform Mfg. Co., Inc.', '5004', '#fffb00', '#FFFFFF', '2018-08-09 14:00:00', '2018-08-16 17:00:00');
INSERT INTO `ct_program` VALUES (122, '72', 'RED ', '270', '#ea0006', '#FFFFFF', '2018-08-16 17:00:00', '2018-08-17 14:00:00');
COMMIT;

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
-- Records of ct_programacion
-- ----------------------------
BEGIN;
INSERT INTO `ct_programacion` VALUES (11, '24', '2017-11-10', '2017-11-10', 600, '18:00:00');
INSERT INTO `ct_programacion` VALUES (12, '25', '2017-11-13', '2017-11-15', 1700, '18:00:00');
INSERT INTO `ct_programacion` VALUES (13, '23', '2017-11-16', '2017-11-23', 5800, '18:00:00');
INSERT INTO `ct_programacion` VALUES (14, '25', '2017-11-24', '2017-11-24', 550, '18:00:00');
INSERT INTO `ct_programacion` VALUES (15, '26', '2017-11-24', '2017-11-27', 1300, '18:00:00');
INSERT INTO `ct_programacion` VALUES (16, '27', '2017-11-28', '2017-11-28', 700, '18:00:00');
INSERT INTO `ct_programacion` VALUES (17, '28', '2017-11-29', '2017-11-30', 1400, '18:00:00');
INSERT INTO `ct_programacion` VALUES (18, '23', '2017-12-01', '2017-12-07', 5800, '18:00:00');
INSERT INTO `ct_programacion` VALUES (19, '24', '2017-12-08', '2017-12-08', 700, '18:00:00');
INSERT INTO `ct_programacion` VALUES (20, '29', '2017-12-11', '2017-12-11', 800, '18:00:00');
INSERT INTO `ct_programacion` VALUES (21, '29', '2017-12-11', '2017-12-11', 800, '18:00:00');
INSERT INTO `ct_programacion` VALUES (22, '24', '2017-12-12', '2017-12-12', 800, '18:00:00');
INSERT INTO `ct_programacion` VALUES (23, '23', '2017-12-13', '2017-12-20', 5800, '18:00:00');
COMMIT;

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
-- Records of ct_seccionCorte
-- ----------------------------
BEGIN;
INSERT INTO `ct_seccionCorte` VALUES (5, 'Carey', '2018-04-28', '08:00:00', '18:00:00', '00:00:00', '00:00:00', '');
INSERT INTO `ct_seccionCorte` VALUES (6, 'Dos Banderas', '2018-04-30', '12:30:00', '13:50:00', '00:00:00', '00:00:00', '');
INSERT INTO `ct_seccionCorte` VALUES (7, 'Privilegio', '2018-04-30', '16:00:00', '18:00:00', '16:00:00', '18:30:00', 'atraso por junta');
COMMIT;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ct_ventas
-- ----------------------------
BEGIN;
INSERT INTO `ct_ventas` VALUES (8, 'cliente 1', 'Vendedor 1', '2018-03-13', '2018-03-13', '10', '10%', 1000);
INSERT INTO `ct_ventas` VALUES (11, 'PLAA', 'Mariela ', '2018-07-18', '1969-12-31', '400', 'Anticipo 100%', 520);
COMMIT;

-- ----------------------------
-- Table structure for empleados
-- ----------------------------
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados` (
  `pk_empleado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `numeroEmpleado` varchar(50) NOT NULL,
  `area` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of empleados
-- ----------------------------
BEGIN;
INSERT INTO `empleados` VALUES (11, 'EULALIA', 'PARRA MORENO', '48', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (12, 'JUANA MARIA', 'MARTINEZ MENDOZA', '57', 'CORTE');
INSERT INTO `empleados` VALUES (13, 'MARIA DE LA LUZ', 'FLORES JIMENEZ', '78', 'TERMINADO');
INSERT INTO `empleados` VALUES (14, 'MARIA', 'GONZALEZ RODRIGUEZ', '92', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (15, 'MARIA DORA', 'GARCIA ALCANTAR', '106', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (16, 'NINFA', 'CAMARILLO MOGON ', '128', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (17, 'NORMA LETICIA', 'RODRIGUEZ MORALES', '276', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (18, 'IRMA', 'DIAZ OLVERA ', '412', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (19, 'ANA ELENA', 'CONSTANTINO BALTAZAR', '457', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (20, 'ANITA', 'VAZQUEZ RANGEL', '582', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (21, 'GUADALUPE', 'GARCIA MAYA YESENIA', '1006', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (22, 'GLORIA ISABEL', 'GARCIA PRADO', '1047', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (23, 'MAYRA GUADALUPE', 'PIZARRO HOYUELA', '1051', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (24, 'FRANCISCA YADIRA', 'JIMENEZ GONZALEZ', '1181', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (25, 'SANDRA', 'CUELLAR RODRIGUEZ', '1206', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (26, 'ASALIA FLOR MARCELINA', 'GALINDO RAMIREZ', '1533', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (27, 'MA. ISELA', 'VAZQUEZ HUERAMO', '1535', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (28, 'ROSA ISELA', 'CASTILLO MELENDEZ', '1541', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (29, 'LAURA ALEJANDRA', 'LEDEZMA GONZALEZ', '1542', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (30, 'MARIA DEL CARMEN', 'VAZQUEZ VAZQUEZ', '1543', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (31, 'FIDELA ROSIO', 'ELORZA CRUZ', '1550', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (32, 'MARTHA IDALIA', 'HERNANDEZ CASTILLO', '1551', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (33, 'REYNA GUADALUPE', 'CONTRERAS GUZMAN', '1562', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (34, 'ANTONIO', 'RUIZ PANTOJA', '1567', 'CORTE');
INSERT INTO `empleados` VALUES (35, 'ALMA LETICIA', 'RODRIGUEZ GALLEGOS', '1568', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (36, 'XIMENA IVETT', 'ORTEGA RUBIO', '1569', 'TERMINADO');
INSERT INTO `empleados` VALUES (37, 'MARCELA', 'HERNANDEZ CORTES', '1572', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (38, 'BLANCA YEZMIN', 'MEZA FUENTES', '1576', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (39, 'JUAN ROBERTO DANTE', 'DIAZ SANCHEZ', '1580', 'CORTE');
INSERT INTO `empleados` VALUES (40, 'MARIA ELVIRA', 'SANCHEZ PELAGIO', '1596', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (41, 'LETICIA', 'ORTIZ HERNANDEZ', '1632', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (42, 'MARICELA', 'GONZALEZ MONSIVAIS', '1637', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (43, 'MARIA DE JESUS', 'ARANDA MORENO', '1646', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (44, 'OLGA ALICIA', 'HERNANDEZ DEL ANGEL', '1647', 'CORTE');
INSERT INTO `empleados` VALUES (45, 'TANIA RUBI', 'GARCIA MARTINEZ', '1649', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (46, 'SONIA', 'ELORZA CRUZ', '1650', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (47, 'LEONOR MIREYA', 'OLGUIN CARRILLO', '1651', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (48, 'IRMA TERESA', 'CORPUS MARTINEZ', '1654', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (49, 'LAURA ALICIA', 'NIETO MARTINEZ', '1655', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (50, 'ALMA GUADALUPE', 'DURON DELGADO', '1657', 'TERMINADO');
INSERT INTO `empleados` VALUES (51, 'MAGDALENA', 'IBARRA CALDERON', '1664', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (52, 'MARIA DE JESUS', 'MENDOZA CAMPOS', '1665', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (53, 'MARIA DE LOURDES', 'BORDA AGUILAR ', '1674', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (54, 'MARIA FELIX', 'SALAZAR ROBLEDO', '1680', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (55, 'MARIA GUADALUPE', 'REBOLLOSO SANCHEZ', '1681', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (56, 'NORMA BEATRIZ', 'MUÑIZ VELAZQUEZ', '1682', 'TERMINADO');
INSERT INTO `empleados` VALUES (57, 'SILVIA MARICELA', 'AGUILAR CARRILLO', '1683', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (58, 'TORRES LETICIA', 'MONTOYA', '1684', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (59, 'VERONICA', 'GONZALEZ CASTRO', '1691', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (60, 'GRISELDA', 'CRUZ MAR', '1701', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (61, 'DORA LILIA', 'SENA BAUTISTA', '1722', 'TERMINADO');
INSERT INTO `empleados` VALUES (62, 'MARIA LETICIA', 'GARZA MARTINEZ', '1730', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (63, 'ALEJANDRA', 'GOMEZ MEZA', '1739', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (64, 'BLAS', 'CRUZ ZUÑIGA', '1741', 'CORTE');
INSERT INTO `empleados` VALUES (65, 'JAZMIN JANETH', 'FERNANDEZ ROMERO', '1744', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (66, 'ZENAIDA', 'MEDINA HERNANDEZ', '1746', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (67, 'FIDEL', 'CRUZ ZUÑIGA', '1748', 'CORTE');
INSERT INTO `empleados` VALUES (68, 'DIANA KAREN', 'SERNA PEREZ', '1752', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (69, 'BRIGIDA ', 'MAGAÑA MARTINEZ', '1754', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (70, 'PRISCILA GUADALUPE', 'GARCIA HERRERA', '1756', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (71, 'YOLANDA ', 'HERNANDEZ GONZALEZ', '1758', 'ENSAMBLE');
INSERT INTO `empleados` VALUES (72, 'FLOR MARITZA ', 'CASTAÑEDA HERNANDEZ', '1760', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (73, 'JOHAN AZAEL', 'HERRERA CRUZ', '1762', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (74, 'VIRGINIA', 'HERNANBDEZ SANTIAGO', '1764', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (75, 'JACQUELINE', 'FLORES HERNANDEZ', '1765', 'SUBENSAMBLE');
INSERT INTO `empleados` VALUES (76, 'VALERIA', 'GARCIA MENDEZ', '1766', 'SUBENSAMBLE');
COMMIT;

-- ----------------------------
-- Table structure for operacion
-- ----------------------------
DROP TABLE IF EXISTS `operacion`;
CREATE TABLE `operacion` (
  `pk_operacion` int(11) NOT NULL AUTO_INCREMENT,
  `operacion` varchar(250) NOT NULL,
  PRIMARY KEY (`pk_operacion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of operacion
-- ----------------------------
BEGIN;
INSERT INTO `operacion` VALUES (10, 'Pegar puÃ±o');
COMMIT;

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
-- Records of usuarios
-- ----------------------------
BEGIN;
INSERT INTO `usuarios` VALUES (1, 'Mariela', 'Villaverde Mejia', 'mariela@villaverde.com', 'DirecciÃƒÂ³n', 'Directora', 'mvillaverde', 'mars1010', 'Administrador', '1', '1', '1', '1', '1', '1', '0', '0');
INSERT INTO `usuarios` VALUES (2, 'Eduardo', 'Santos', 'esantos@prolog-mex.com', 'Sistemas', 'Gerente de Sistemas', 'esantos', 'esantos', 'Administrador', '1', '1', '1', '1', '1', '1', '0', '0');
INSERT INTO `usuarios` VALUES (3, 'Estefania', 'Pinales Avalos', 'epinales@prolog-mex.com', 'Sistemas', 'Analista de Sistemas', 'epinales', 'epinales', 'Administrador', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `usuarios` VALUES (4, 'Hector', 'Aguirre', 'hector.aguirre@fitco.com.mx', 'Sobre Oficina Completa', 'Gerente General', 'haguirre', 'fitco123', 'Administrador', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `usuarios` VALUES (8, 'Segio ', 'Reyna', 'Sergio.reyna@fitco.com.mx', 'Contabilidad', 'Ejecutivo de Produccion', 'Sreyna', 'Fitco123', 'Usuario', '1', '1', '1', '1', '1', '1', '0', '0');
INSERT INTO `usuarios` VALUES (9, 'Dana', 'Camacho', 'dana.camacho@fitco.com.mx', 'Coordinacion', 'DiseÃ±adora, Jefe de Limpieza, Jefe de Inventarios', 'dcamacho', 'fitco123', 'Usuario', '0', '0', '1', '1', '1', '1', '0', '0');
INSERT INTO `usuarios` VALUES (14, 'Juan', 'Hernandez', 'juan.hernandez@fitco.com.mx', 'Tesoreria', 'Jefe de Cuentas por Pagar', 'jhernandez', 'fitco123', 'Usuario', '1', '1', '0', '0', '0', '0', '0', '0');
INSERT INTO `usuarios` VALUES (20, 'Juan ', 'Valenciano', 'juan.valenciano@fitco.com.mx', '(4) Produccion', 'Coordinador de Produccion', 'jvalenciano', 'fitco123', 'Usuario', '0', '0', '1', '1', '1', '0', '1', '0');
INSERT INTO `usuarios` VALUES (21, 'Jose Rodolfo', 'Villaverde', 'jrodolfo@villaverde.com', 'Executivo', 'Fundador', 'jrodolfo', 'jrvv2020', 'Administrador', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `usuarios` VALUES (22, 'Diana', 'Luna', 'diana.luna@fitco.com.mx', 'Comunicaciones y Tesoreria', 'Recepcionista, Facturacion', 'dluna', 'fitco123', 'Usuario', '1', '1', '0', '0', '1', '1', '0', '0');
COMMIT;

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

SET FOREIGN_KEY_CHECKS = 1;
