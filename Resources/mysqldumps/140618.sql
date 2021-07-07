-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 14-06-2018 a las 22:45:12
-- Versión del servidor: 5.6.35
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `Fitco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_cliente`
--

CREATE TABLE `ct_cliente` (
  `pk_cliente` int(11) NOT NULL,
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
  `vendedorCliente` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_cliente`
--

INSERT INTO `ct_cliente` (`pk_cliente`, `nombreCliente`, `nombreContacto`, `correoCliente`, `telefonoCliente`, `creditoCliente`, `fingresoCliente`, `colorCliente`, `prendasCliente`, `precioPrenda`, `nosotrosCliente`, `vendedorCliente`) VALUES
(23, 'Liberty Uniform Mfg. Co., Inc.', 'Karrie Carpenter', 'karrie@libertyuniform.com', '(800)-827-2441 x1006', 15, '1985-11-08', '#fffb00', 1, '1', '1', '1'),
(24, 'Grupo Privileggio,S.A. de C.V.', 'Martha Rodiguez', 'grupo.privileggio@gmail.com', '81 8340.6255 y 81 8343.5688', 3, '2017-01-01', '#800080', 1, '1', '1', '1'),
(25, 'Toplari SA de CV', 'Gerardo Kalifa', 'blancaesthel@hotmail.com; gkalifa@prodigy.net.mx', '81 83095252', 3, '2017-01-01', '#0433ff', 1, '1', '1', '1'),
(26, 'Grupo Dos Banderas, S.A. de C.V.', 'Javier Poinsot', 'mauricio.arechavaleta@dosbanderas.com  -   javier.poinsot@dosbanderas.com', '81 8356 9496', 3, '2017-01-01', '#c0c0c0', 1, '1', '1', '1'),
(28, 'Empuje Textil, S. de R.L. de C.V.', 'ING. ALBERTO AGUILERA ', 'alberto.carey@hotmail.com', '8344 9448;8182525126 y 8183432000   ', 3, '2017-01-01', '#941100', 1, '1', '1', '1'),
(29, 'Rogelio Gonzalez Garcia  - Royulli ', 'Sr. Rogelio Gonzalez', 'rogelio-garcia@live.com  ', '81 17740273', 3, '2017-01-01', '#009051', 1, '1', '1', '1'),
(31, 'Operaciones Especiales y Aereas SA de CV', 'Cap. Jorge Hernandez Garibaldi', 'garibaldi@opsesa.com.mx; garibaldicom@hotmail.com; facturacion@opsesa.com.mx ', '8112894467', 3, '2018-05-15', '#80ffff', 200, '50', 'Medios Publicitarios', ''),
(38, 'Confecciones Modi S de RL de CV         ', 'Moris Samar', 'conmodi@telmexmail.com; ', '81 83442075', 3, '2018-01-01', '#000000', 1, '1', '1', '1'),
(39, 'Uniformes Express S de RL MI               ', 'Gerardo PeÃ±a', 'gerardo@class-uniforms.com      ', '018677145972 ', 3, '2018-01-01', '#ff0000', 1, '1', '1', '1'),
(40, 'Virginia Urbina Mendez    ', 'LORENA MARTINEZ - Alexis', 'alepsi2000@hotmail.com; alexisoficina@gmail.com; facturas@policiadeacero.com ', '016564079091 ', 30, '2018-01-01', '#ff8000', 1, '1', '1', '1'),
(41, 'Publicidad Coquette S de RL de CV     ', 'Roxana Jimenez', 'roxana_jimenez@hotmail.com ', '8182871207    ', 3, '2018-01-01', '#ff0080', 1, '1', '1', '1'),
(42, 'RICARDO GARCIA LOZANO    ', 'RICARDO GARCIA     ', 'rgarciajollpat@prodigy.net.mx    ', '8119884930', 3, '2018-01-01', '#8000ff', 1, '1', '1', '1'),
(43, 'Costuras y Servicios de MÃ©xico SA de CV', 'pendiente', 'pendiente@', '1', 1, '2018-06-11', '#16b49f', 1, '1', '1', '1'),
(44, 'Sierra de Bernia SA de CV', '1', '1', '1', 1, '2018-06-11', '#84b516', 1, '1', '1', '1'),
(45, 'Publico en General', '1', '1', '1', 1, '2018-06-11', '#efdb25', 1, '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_cobranza`
--

CREATE TABLE `ct_cobranza` (
  `pk_cobranza` int(11) NOT NULL,
  `conceptoPago` varchar(150) NOT NULL,
  `facturaCobranza` varchar(10) NOT NULL,
  `importeCobranza` decimal(30,2) NOT NULL,
  `vencimientoCobranza` date NOT NULL,
  `fechaEntrega` date NOT NULL,
  `fk_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_cobranza`
--

INSERT INTO `ct_cobranza` (`pk_cobranza`, `conceptoPago`, `facturaCobranza`, `importeCobranza`, `vencimientoCobranza`, `fechaEntrega`, `fk_cliente`) VALUES
(17, 'Maquila (Venta)', '2786', '29426.88', '2018-06-08', '2018-05-09', '40'),
(18, 'Maquila (Venta)', '2787', '14097.94', '2018-06-08', '2018-05-09', '40'),
(19, 'Maquila', '2788', '4896.36', '2018-05-18', '2018-05-15', '28'),
(20, 'Maquila', '2789', '202644.44', '2018-06-01', '2018-05-17', '23'),
(21, 'Maquila', '2790', '130365.21', '2018-06-01', '2018-05-17', '23'),
(22, 'Maquila', '2791', '30599.31', '2018-06-01', '2018-05-17', '23'),
(23, 'Maquila', '2792', '3382.71', '2018-06-01', '2018-05-17', '23'),
(24, 'Maquila', '2793', '35072.39', '2018-06-01', '2018-05-17', '23'),
(25, 'Maquila', '2785', '36940.20', '2018-05-12', '2018-05-09', '42'),
(26, 'Maquila', '2784', '17141.64', '2018-05-12', '2018-05-09', '28'),
(27, 'Maquila', '2783', '11546.64', '2018-05-11', '2018-05-08', '26'),
(28, 'Maquila', '2782', '4959.00', '2018-05-10', '2018-05-07', '42'),
(29, 'Maquila', '2781', '2460.36', '2018-05-10', '2018-05-07', '28'),
(30, 'Maquila', '2780', '102287.64', '2018-05-10', '2018-05-07', '24'),
(31, 'Maquila', '2779', '13340.00', '2018-05-07', '2018-05-04', '41'),
(32, 'Maquila', '2778', '32433.75', '2018-05-18', '2018-05-03', '23'),
(33, 'Maquila', '2777', '3212.15', '2018-05-18', '2018-05-03', '23'),
(34, 'Maquila', '2776', '138825.31', '2018-05-18', '2018-05-03', '23'),
(35, 'Maquila', '2775', '200793.49', '2018-05-18', '2018-05-03', '23'),
(36, 'Maquila', '2794', '2931.32', '2018-05-24', '2018-05-21', '28'),
(37, 'Maquila', '2795', '33805.71', '2018-05-27', '2018-05-24', '28'),
(38, 'Maquila', '2796', '50033.82', '2018-05-27', '2018-05-24', '42'),
(39, 'Maquila', '2797', '182473.51', '2018-05-28', '2018-05-25', '25'),
(40, 'Maquila', '2798', '205746.18', '2018-06-19', '2018-06-04', '23'),
(42, 'Maquila', '2800', '3775.45', '2018-06-19', '2018-06-04', '23'),
(43, 'Maquila', '2801', '34215.52', '2018-06-19', '2018-06-04', '23'),
(44, 'Maquila', '0034', '55119.37', '2018-06-10', '2018-06-07', '28'),
(45, 'Maquila', '0035', '103530.00', '2018-06-10', '2018-06-07', '24'),
(46, 'MAQUILA', '2696', '41629.85', '2018-01-13', '2018-01-10', '29'),
(47, 'MAQUILA', '2697', '248663.56', '2018-02-01', '2018-01-17', '23'),
(48, 'MAQUILA', '2698', '97566.31', '2018-02-01', '2018-01-17', '23'),
(49, 'MAQUILA', '2699', '6893.40', '2018-02-01', '2018-01-17', '23'),
(50, 'MAQUILA', '2700', '33354.69', '2018-02-01', '2018-01-17', '23'),
(51, 'MAQUILA', '2701', '8021.40', '2018-01-21', '2018-01-18', '24'),
(52, 'MAQUILA', '2702', '65435.83', '2018-01-25', '2018-01-22', '28'),
(53, 'MAQUILA', '2703', '6368.40', '2018-01-27', '2018-01-24', '38'),
(54, 'MAQUILA', '2704', '187088.09', '2018-02-13', '2018-01-29', '23'),
(55, 'MAQUILA', '2705', '149665.15', '2018-02-13', '2018-01-29', '23'),
(56, 'MAQUILA', '2706', '6751.86', '2018-02-13', '2018-01-29', '23'),
(57, 'MAQUILA', '2707', '32483.22', '2018-02-13', '2018-01-29', '23'),
(58, 'MAQUILA', '2708', '160525.44', '2018-02-03', '2018-01-31', '24'),
(59, 'VENTA', '2709', '540.00', '0000-00-00', '2018-01-31', '45'),
(60, 'MAQUILA', '2710', '77170.16', '2018-02-04', '2018-02-01', '24'),
(61, 'MAQUILA', '2711', '79831.20', '2018-02-10', '2018-02-07', '24'),
(62, 'MAQUILA', '2712', '145062.64', '2018-02-10', '2018-02-07', '24'),
(63, 'MAQUILA', '2713', '61898.76', '2018-02-17', '2018-02-14', '28'),
(64, 'MAQUILA', '2714', '48613.16', '2018-02-17', '2018-02-14', '28'),
(65, 'MAQUILA', '2715', '38883.20', '2018-02-17', '2018-02-14', '41'),
(66, 'MAQUILA', '2716', '161270.53', '2018-03-06', '2018-02-19', '23'),
(67, 'MAQUILA', '2717', '153223.52', '2018-03-06', '2018-02-19', '23'),
(68, 'MAQUILA', '2718', '19783.87', '2018-03-06', '2018-02-19', '23'),
(69, 'MAQUILA', '2719', '7795.56', '2018-03-06', '2018-02-19', '23'),
(70, 'MAQUILA', '2720', '32093.98', '2018-03-06', '2018-02-19', '23'),
(71, 'OTROS', '2721', '175136.02', '2018-02-23', '2018-02-20', '44'),
(72, 'MAQUILA', '2722', '103349.04', '2018-02-24', '2018-02-21', '24'),
(73, 'MAQUILA', '2723', '69482.84', '2018-02-25', '2018-02-22', '26'),
(74, 'MAQUILA ', '2724', '168200.00', '2018-03-01', '2018-02-22', '43'),
(75, 'MAQUILA ', '2725', '100920.00', '2018-03-02', '2018-02-23', '43'),
(76, 'MAQUILA', '2726', '154690.13', '2018-03-16', '2018-03-01', '23'),
(77, 'MAQUILA', '2727', '150652.31', '2018-03-16', '2018-03-01', '23'),
(78, 'MAQUILA', '2728', '39554.12', '2018-03-16', '2018-03-01', '23'),
(79, 'MAQUILA', '2729', '3206.92', '2018-03-16', '2018-03-01', '23'),
(80, 'MAQUILA', '2730', '33310.51', '2018-03-16', '2018-03-01', '23'),
(81, 'MAQUILA ', '2731', '33640.00', '2018-03-08', '2018-03-01', '43'),
(82, 'MAQUILA ', '2732', '33640.00', '2018-03-08', '2018-03-01', '43'),
(83, 'MAQUILA', '2733', '14662.40', '2018-03-08', '2018-03-05', '41'),
(84, 'MAQUILA', '2734', '5383.56', '2018-03-10', '2018-03-07', '28'),
(85, 'MAQUILA', '2735', '59400.56', '2018-03-10', '2018-03-07', '28'),
(86, 'MAQUILA', '2736', '191530.50', '2018-03-11', '2018-03-08', '24'),
(87, 'MAQUILA', '2737', '117955.18', '2018-03-16', '2018-03-13', '24'),
(88, 'MAQUILA', '2738', '54261.13', '2018-03-18', '2018-03-15', '28'),
(89, 'MAQUILA', '2739', '6960.00', '2018-03-25', '2018-03-22', '41'),
(90, 'MAQUILA', '2740', '5269.88', '2018-03-25', '2018-03-22', '28'),
(91, 'MAQUILA', '2741', '199223.55', '2018-04-06', '2018-03-22', '23'),
(92, 'MAQUILA', '2742', '99144.99', '2018-04-06', '2018-03-22', '23'),
(93, 'MAQUILA', '2743', '41105.48', '2018-04-06', '2018-03-22', '23'),
(94, 'MAQUILA', '2744', '3201.82', '2018-04-06', '2018-03-22', '23'),
(95, 'MAQUILA', '2745', '32510.50', '2018-04-06', '2018-03-22', '23'),
(96, 'VENTA', '2746', '14097.94', '2018-04-22', '2018-03-23', '40'),
(97, 'VENTA', '2747', '25503.30', '2018-04-22', '2018-03-23', '40'),
(98, 'VENTA', '2748', '19617.92', '2018-04-27', '2018-03-28', '40'),
(99, 'VENTA', '2749', '9808.96', '2018-04-27', '2018-03-28', '40'),
(100, 'MAQUILA', '2750', '4206.16', '2018-04-06', '2018-04-03', '28'),
(101, 'MAQUILA', '2751', '183168.30', '2018-04-20', '2018-04-05', '23'),
(102, 'MAQUILA', '2752', '149369.29', '2018-04-20', '2018-04-05', '23'),
(103, 'MAQUILA', '2753', '7781.29', '2018-04-20', '2018-04-05', '23'),
(104, 'MAQUILA', '2754', '23646.97', '2018-04-20', '2018-04-05', '23'),
(105, 'MAQUILA', '2755', '31959.64', '2018-04-20', '2018-04-05', '23'),
(106, 'MAQUILA', '2756', '10820.48', '2018-04-12', '2018-04-09', '26'),
(107, 'MAQUILA', '2757', '5220.00', '2018-04-12', '2018-04-09', '41'),
(108, 'VENTA', '2758', '9808.96', '2018-05-09', '2018-04-09', '40'),
(109, 'MAQUILA', '2759', '6041.28', '2018-04-13', '2018-04-10', '28'),
(110, 'MAQUILA', '2760', '148659.95', '2018-05-02', '2018-04-17', '23'),
(111, 'MAQUILA', '2761', '137191.34', '2018-05-02', '2018-04-17', '23'),
(112, 'MAQUILA', '2762', '41958.95', '2018-05-02', '2018-04-17', '23'),
(113, 'MAQUILA', '2763', '3088.54', '2018-05-02', '2018-04-17', '23'),
(114, 'MAQUILA', '2764', '31401.93', '2018-05-02', '2018-04-17', '23'),
(115, 'MAQUILA', '2765', '0.00', '2018-04-22', '2018-04-19', '42'),
(116, 'MAQUILA', '2766', '41655.60', '2018-04-22', '2018-04-19', '42'),
(117, 'MAQUILA', '2767', '0.00', '2018-05-04', '2018-04-19', '23'),
(118, 'MAQUILA', '2768', '24012.00', '2018-04-23', '2018-04-20', '42'),
(119, 'MAQUILA', '2769', '23594.40', '2018-04-27', '2018-04-24', '42'),
(120, 'MAQUILA', '2770', '3946.32', '2018-04-27', '2018-04-24', '28'),
(121, 'MAQUILA', '2771', '74541.60', '2018-04-28', '2018-04-25', '24'),
(122, 'MAQUILA', '2772', '73851.40', '2018-04-28', '2018-04-25', '24'),
(123, 'MAQUILA', '2773', '0.00', '2018-04-29', '2018-04-26', '28'),
(124, 'MAQUILA', '2774', '2216.76', '2018-04-29', '2018-04-26', '28'),
(149, 'MAQUILA', '2799', '153325.42', '2018-06-19', '2018-06-04', '23'),
(152, 'Maquila', '0037', '40031.60', '2018-06-16', '2018-06-13', '24'),
(153, 'Maquila', '0038', '100700.18', '2018-06-16', '2018-06-13', '24'),
(154, 'Maquila', '0039', '110224.94', '2018-06-16', '2018-06-13', '24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_corte`
--

CREATE TABLE `ct_corte` (
  `pk_corte` int(11) NOT NULL,
  `fk_programacion` varchar(250) NOT NULL,
  `tiempoActual` date NOT NULL,
  `horaActual` time NOT NULL,
  `Notas` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_corte`
--

INSERT INTO `ct_corte` (`pk_corte`, `fk_programacion`, `tiempoActual`, `horaActual`, `Notas`) VALUES
(8, '78', '2018-04-15', '10:30:00', 'finalizado en tiempo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_CuentasxPagar`
--

CREATE TABLE `ct_CuentasxPagar` (
  `pk_cuentasPagar` int(11) NOT NULL,
  `proveedor` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `montoPago` decimal(30,2) NOT NULL,
  `fechaVencimiento` date NOT NULL,
  `pagado` decimal(30,2) NOT NULL,
  `factura` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_CuentasxPagar`
--

INSERT INTO `ct_CuentasxPagar` (`pk_cuentasPagar`, `proveedor`, `descripcion`, `montoPago`, `fechaVencimiento`, `pagado`, `factura`) VALUES
(6, 'H-House', 'Tela', '45600.00', '2018-06-06', '45600.00', 'A00123'),
(7, 'Biling house', 'Botones', '10000.00', '2018-06-07', '0.00', 'A00124'),
(8, 'ADT SECURITY SERVICES SA DE CV', 'SERVICIO DE ALARMA Y MONITOREO', '1219.00', '2018-06-04', '0.00', '13869160'),
(9, 'ADT SECURITY SERVICES SA DE CV', 'SERVICIO DE ALARMA Y MONITOREO', '990.06', '2018-06-04', '0.00', '13870200'),
(10, 'AT&T COMUNICACIONES', 'SERVICIO DE TELEFONIA ', '599.00', '2018-06-04', '0.00', '151582552'),
(11, 'AT&T COMUNICACIONES', 'SERVICIO DE TELEFONIA ', '1218.00', '2018-06-04', '0.00', '151675123'),
(12, 'CARTON Y PAPEL DEL HUAJUCO SA DE CV', 'PAPEL PARA TRAZO Y GRAPAS', '1868.06', '2018-06-11', '0.00', '83398'),
(13, 'CARTON Y PAPEL DEL HUAJUCO SA DE CV', 'PAPEL PARA TRAZO Y GRAPAS', '1868.06', '2018-07-02', '0.00', '84122'),
(14, 'CIPA FASKOWICH', 'ARRENDAMIENTO DE INMUEBLE', '16468.26', '2018-06-04', '0.00', '674'),
(15, 'COMERCIALIZADORA Y DISTRIBUIDORA CIYD', 'HILO', '1556.26', '2018-06-11', '0.00', '787'),
(16, 'COMERCIALIZADORA Y DISTRIBUIDORA CIYD', 'HILO', '3062.52', '2018-07-02', '0.00', '915'),
(17, 'GRUPO EMPRESARIAL CT SA DE CV', 'ETIQUETAS ADHESIVAS', '1143.67', '2018-06-04', '0.00', '23668'),
(18, 'GRUPO EMPRESARIAL CT SA DE CV', 'ETIQUETAS ADHESIVAS', '1161.09', '2018-06-18', '0.00', '23772'),
(19, 'GRUPO NYLTEX', 'TELA', '11368.00', '2018-08-06', '0.00', '46364'),
(20, 'GUNTHER ALBERT ELSER SCHUSSLER', 'MANTENIMIENTO MAQUINARIA', '2569.40', '2018-06-11', '0.00', '180'),
(22, 'JOSE ALVARO HINOJOSA GUIJARRO', 'CORTE DE ENTRETELA', '1740.00', '2018-06-04', '0.00', '74'),
(23, 'JOSE GERARDO SEPULVEDA', 'REFACCIONES MAQUINARIA', '7564.57', '2018-06-11', '0.00', '1470'),
(24, 'JOSE NICOLAS RODRIGUEZ', 'COMISIONES ', '4078.72', '2018-06-04', '0.00', '40'),
(25, 'LA DISTRIBUIDORA DE CASIMIRES SA DE CV', 'TELA', '15139.16', '2018-07-02', '0.00', '313390'),
(26, 'LIV MEDICAL SA DE CV', 'MEDICAMENTO PARA BOTIQUIN', '1863.59', '2018-06-18', '0.00', '9622'),
(27, 'MANUEL DE JESUS CANALES VAQUERA', 'MATERIAL LIMPIEZA', '3072.55', '2018-06-11', '0.00', '455'),
(28, 'MANUEL DE JESUS CANALES VAQUERA', 'MATERIAL LIMPIEZA', '3785.87', '2018-07-02', '0.00', '556'),
(29, 'MAURICIO FASKOWICH', 'ARRENDAMIENTO DE INMUEBLE', '16468.83', '2018-06-04', '0.00', '2138'),
(30, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-06-04', '0.00', '87901'),
(31, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-06-11', '0.00', '87937'),
(32, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-06-18', '0.00', '88238'),
(33, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-06-25', '0.00', '88419'),
(34, 'RADIO MOVIL DIPSA SA DE CV', 'SERVICIO DE TELEFONIA ', '329.00', '2018-06-04', '0.00', '57681542'),
(36, 'RADIO MOVIL DIPSA SA DE CV', 'SERVICIO DE TELEFONIA ', '329.00', '2018-06-04', '0.00', '57681543'),
(37, 'RADIO MOVIL DIPSA SA DE CV', 'SERVICIO DE TELEFONIA ', '329.00', '2018-06-04', '0.00', '57681544'),
(38, 'RADIO MOVIL DIPSA SA DE CV', 'SERVICIO DE TELEFONIA ', '329.00', '2018-06-04', '0.00', '57681545'),
(39, 'RECOLECTORA DE RESIDUOS COMERCIALES', 'RECOLECCION DE BASURA', '2946.40', '2018-06-04', '0.00', '59137'),
(40, 'RECOLECTORA DE RESIDUOS COMERCIALES', 'RECOLECCION DE BASURA', '3236.40', '2018-07-02', '0.00', '60267'),
(41, 'RIVERA FERRETERA', 'MANTENIMIENTO DE PLANTA', '448.53', '2018-06-04', '0.00', '30673'),
(42, 'RIVERA FERRETERA', 'MANTENIMIENTO DE PLANTA', '1337.01', '2018-06-04', '0.00', '30821'),
(43, 'RIVERA FERRETERA', 'MANTENIMIENTO DE PLANTA', '222.87', '2018-06-04', '0.00', '30891'),
(44, 'SERVICIOS DE AGUA Y DRENAJE', 'SERVICIO DE AGUA EN PLANTA ', '4270.00', '2018-06-04', '0.00', '4062018'),
(45, 'TELEFONOS DE MEXICO', 'SERVICIO DE TELEFONIA E INTERNTET', '1499.00', '2018-06-04', '0.00', '4062018'),
(46, 'ZERO BICHOS SA DE CV', 'SERVICIO DE FUMIGACION PLANTA', '1160.00', '2018-06-04', '0.00', '5458'),
(47, 'COMISION FEDERAL DE ELECTRICIDAD', 'SERVICIO DE ENERGIA ELECTRICA', '28000.00', '2018-06-25', '0.00', '25062018-1'),
(48, 'COMISION FEDERAL DE ELECTRICIDAD', 'SERVICIO DE ENERGIA ELECTRICA', '1052.00', '2018-06-04', '0.00', '4062018'),
(49, 'ABA SEGUROS SA DE CV                                                                                                            ', 'SEGUROS', '2860.63', '2018-02-16', '2860.63', '24660     '),
(50, 'ABA SEGUROS SA DE CV                                                                                                            ', 'SEGUROS', '2860.63', '2018-05-04', '2860.63', '26042018  '),
(51, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', '3239.49', '2018-01-10', '3239.49', '210044    '),
(52, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', '205.32', '2018-01-10', '205.32', '210186    '),
(53, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', '2405.29', '2018-02-28', '2405.29', '2370673   '),
(54, 'ABASTECEDORA DE OFICINAS SA DE CV                                                                                               ', 'PAPELERIA', '4147.60', '2018-04-26', '4147.60', '2376799   '),
(55, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', '1219.00', '2018-02-09', '1219.00', '13357172  '),
(56, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', '990.06', '2018-02-09', '990.06', '13358281  '),
(57, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', '990.06', '2018-03-08', '990.06', '13488907  '),
(58, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', '1219.00', '2018-03-08', '1219.00', '13487819  '),
(59, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', '1219.00', '2018-04-06', '1219.00', '13614942  '),
(60, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', '990.06', '2018-04-06', '990.06', '13616019  '),
(61, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', '1219.00', '2018-05-04', '1219.00', '13742263  '),
(62, 'ADT PRIVATE SECURITY SERVICES DE MEXICO SA DE CV                                                                                ', 'ALARMAS Y MONITOREO', '990.06', '2018-05-04', '990.06', '13743313  '),
(63, 'AHORA RESULTA SA DE CV', 'LICENCIA SERVIDOR RED', '500.00', '2018-02-14', '500.00', '48317     '),
(64, 'ALFREDO OSORIO CAMACHO', '20 SILLAS PRODUCCION', '27213.60', '2018-05-17', '27213.60', '3140      '),
(65, 'AQUA FINA SA DE CV                                                                                                              ', 'AGUA DESTILADA', '1760.00', '2018-01-25', '1760.00', '38205     '),
(66, 'AQUA FINA SA DE CV                                                                                                              ', 'AGUA DESTILADA', '1760.00', '2018-02-28', '1760.00', '38567     '),
(67, 'AQUA FINA SA DE CV                                                                                                              ', 'AGUA DESTILADA', '2041.60', '2018-04-30', '2041.60', '39040     '),
(68, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', '2667.45', '2018-02-12', '2667.45', '148097491 '),
(69, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', '289.42', '2018-02-27', '289.42', '149173364 '),
(70, 'AT&T COMUNICACIONES DIGITALES S DE RL DE CV                                                                                     ', 'NEXTEL', '2563.31', '2018-03-08', '2563.31', '149173364 '),
(71, 'AUTOTRANSPORTES DE CARGA TRES GUERRAS SA DE CV', 'FLETES', '4406.28', '2018-03-23', '4406.28', '20174959  '),
(72, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE, MASKING', '895.75', '2018-01-18', '895.75', '2127      '),
(73, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE, MASKING', '1990.10', '2018-02-09', '1990.10', '2204      '),
(74, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE, MASKING', '922.90', '2018-04-27', '922.90', '2507      '),
(75, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE, MASKING', '922.90', '2018-04-30', '922.90', '2398      '),
(76, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE, MASKING', '922.90', '2018-05-25', '922.90', '2293      '),
(77, 'CARTFLE SA DE CV                                                                                                                ', 'CINTA TRANSPARENTE, MASKING', '1845.79', '2018-05-25', '1845.79', '2475      '),
(78, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', '1910.52', '2018-02-09', '1910.52', '79562     '),
(79, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', '1889.29', '2018-03-16', '1889.29', '80519     '),
(80, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', '1910.52', '2018-04-27', '1910.52', '81434     '),
(81, 'CARTON Y PAPEL DEL HUAJUCO, SA DE CV                                                                                            ', 'PAPEL TRAZO', '1684.32', '2018-05-11', '1684.32', '82292     '),
(82, 'CASA DIAZ DE MAQUINAS DE COSER, SA DE CV                                                                                        ', 'MTTO MAQUINARIA', '2502.54', '2018-02-02', '2502.54', '113278    '),
(83, 'CASA DIAZ DE MAQUINAS DE COSER, SA DE CV                                                                                        ', 'MTTO MAQUINARIA', '16159.66', '2018-03-23', '16159.66', '20032018  '),
(84, 'CASA DIAZ DE MAQUINAS DE COSER, SA DE CV                                                                                        ', 'MTTO MAQUINARIA', '1606.72', '2018-05-31', '1606.72', '180507    '),
(85, 'CIBERNETICA Y TECNOLOGIA SA DE CV                                                                                               ', 'TIMBRES FISCALES', '2871.00', '2018-03-02', '2871.00', '7208      '),
(86, 'CIERRES AUTOMATICOS NATIONAL, SA DE CV                                                                                          ', 'CIERRES', '3060.30', '2018-04-27', '3060.30', '6978      '),
(87, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', '16468.26', '2018-01-11', '16468.26', '608       '),
(88, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', '16468.26', '2018-02-09', '16468.26', '622       '),
(89, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', '16468.26', '2018-03-08', '16468.26', '635       '),
(90, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', '16468.26', '2018-04-06', '16468.26', '648       '),
(91, 'CIPA FASKOWICH SHEINBERG                                                                                                        ', 'ARRENDAMIENTO', '16468.26', '2018-05-04', '16468.26', '661       '),
(92, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '1421.00', '2018-01-11', '1421.00', '1353      '),
(93, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '710.50', '2018-01-11', '710.50', '1366      '),
(94, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '1451.00', '2018-01-11', '1451.00', '1372      '),
(95, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '760.50', '2018-01-11', '760.50', '1378      '),
(96, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '760.50', '2018-01-25', '760.50', '1414      '),
(97, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '760.96', '2018-02-22', '760.96', '5         '),
(98, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '2181.96', '2018-02-22', '2181.96', '29        '),
(99, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '1300.48', '2018-02-28', '1300.48', '83        '),
(100, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '2309.39', '2018-03-08', '2309.39', '172       '),
(101, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '1500.46', '2018-03-08', '1500.46', '151       '),
(102, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '2181.50', '2018-03-22', '2181.50', '113       '),
(103, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '3062.52', '2018-04-06', '3062.52', '325       '),
(104, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '803.13', '2018-04-06', '803.13', '350       '),
(105, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '803.13', '2018-04-06', '803.13', '364       '),
(106, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '1556.26', '2018-04-27', '1556.26', '410       '),
(107, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '803.13', '2018-04-30', '803.13', '443       '),
(108, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '652.50', '2018-05-11', '652.50', '576       '),
(109, 'COMERCIALIZADORA Y DISTRIBUIDORA SIYD SA DE CV                                                                                  ', 'HILO', '2309.39', '2018-05-31', '2309.39', '658       '),
(110, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', '2022.20', '2018-01-22', '2022.20', '292031    '),
(111, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', '17213.87', '2018-01-25', '17213.87', '260373    '),
(112, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', '1094.17', '2018-02-28', '1094.17', '297503    '),
(113, 'COMISION FEDERAL DE ELECTRICIDAD                                                                                                ', 'LUZ', '8518.00', '2018-03-12', '8518.00', '264624\r\n  '),
(114, 'CORPORATIVO RAYONERA SA DE CV', 'TELA DALI PARA COSEMEX', '44196.00', '2018-02-28', '44196.00', '23997     '),
(115, 'CORPORATIVO RAYONERA SA DE CV', 'TELA DALI PARA COSEMEX', '41779.95', '2018-03-12', '41779.95', '24076     '),
(116, 'DAMARIS ADELA CASTILLO RODRIGUEZ', 'REP PLANCHA DE BOLSA', '5220.00', '2018-03-27', '5220.00', '1802200000'),
(117, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', '14979.00', '2018-01-08', '14979.00', '1893      '),
(118, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', '14979.00', '2018-02-12', '14979.00', '2101      '),
(119, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', '14979.00', '2018-03-12', '14979.00', '2377      '),
(120, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', '14979.00', '2018-04-12', '14979.00', '2595      '),
(121, 'DESARROLLOS INMOBILIARIOS DEL NORESTE, S.A. DE C.V.                                                                             ', 'ARRENDAMIENTO', '15039.00', '2018-05-03', '15039.00', '2978      '),
(122, 'DESPACHO ARTEAGA Y CIA SC                                                                                                       ', 'LICENCIA CONTABILIDAD', '3480.00', '2018-04-13', '3480.00', '13042018  '),
(123, 'DISEÑOS, EQUIPOS, INGENIERIA,VALVULAS INDUSTRIALES SA DE CV', 'SECADOR DE AIRE', '17110.00', '2018-03-06', '17110.00', '11050     '),
(124, 'EMPUJE TEXTIL SA DE CV', 'CAMISAS ', '3050.80', '2018-03-08', '3050.80', '11378     '),
(125, 'ENFRIADORES DEL GUADIANA SA DE CV', 'FILTROS PARA PURIFIC DE AGUA', '7377.60', '2018-02-16', '7377.60', '14061     '),
(126, 'ESTELA GARCIA LEOS', 'MTTO PREFORMADORA PLACA', '6728.00', '2018-03-16', '6728.00', '431       '),
(127, 'FERNANDO VEGA PALACIOS                                                                                                          ', 'COMISION ', '8700.00', '2018-03-23', '8700.00', '123       '),
(128, 'FRANCISCO ALVAREZ SUSTAITA', 'BANDA INFERIOR', '3942.84', '2018-03-06', '3942.84', '123       '),
(129, 'FRANCISCO ALVAREZ SUSTAITA', 'BANDA INFERIOR', '3942.84', '2018-03-22', '3942.84', '124       '),
(130, 'GESTION Y CONSULTORIA LOPT SC', 'GARANTIA POR JUICIO', '50173.74', '2018-04-30', '50173.74', '661       '),
(131, 'GESTION Y CONSULTORIA LOPT SC', 'HONORARIOS POR JUICIO PARCIAL', '70243.24', '2018-05-11', '70243.24', '726       '),
(132, 'GRUPO DESARROLLADOR 3000 SA DE CV', 'TEL POL /ALG PLAA', '2683.78', '2018-05-28', '2683.78', '9449      '),
(133, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', '1070.49', '2018-01-18', '1070.49', '22273     '),
(134, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', '2869.91', '2018-02-02', '2869.91', '22378     '),
(135, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', '1069.24', '2018-02-23', '1069.24', '22563     '),
(136, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', '1108.66', '2018-03-22', '1108.66', '22879     '),
(137, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', '1084.91', '2018-03-28', '1084.91', '23063     '),
(138, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', '2694.80', '2018-04-30', '2694.80', '23144     '),
(139, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', '1069.51', '2018-04-30', '1069.51', '23176     '),
(140, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', '1058.23', '2018-05-11', '1058.23', '23299     '),
(141, 'GRUPO EMPRESARIAL CT SA DE CV                                                                                                   ', 'ETIQUETA IMPRESA', '1139.21', '2018-05-25', '1139.21', '23485     '),
(142, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', '6496.00', '2018-02-02', '6496.00', '43614     '),
(143, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', '7015.68', '2018-02-02', '7015.68', '43689     '),
(144, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', '307.40', '2018-02-22', '307.40', '44278     '),
(145, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', '846.80', '2018-02-22', '846.80', '44494     '),
(146, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', '12918.92', '2018-03-16', '12918.92', '44057     '),
(147, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', '10250.46', '2018-03-28', '10250.46', '44399     '),
(148, 'GRUPO NYLTEX SA DE CV                                                                                                           ', 'TELA ALGODON', '25852.92', '2018-04-30', '25852.92', '44640     '),
(149, 'GUNTHER ALBERT ELSER SCHUSSLER                                                                                                  ', 'REPARACION TARJETA', '3311.80', '2018-04-30', '3311.80', '176       '),
(150, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', '2552.00', '2018-01-25', '2552.00', '5609      '),
(151, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', '2552.00', '2018-04-06', '2552.00', '5730      '),
(152, 'ID TAGGER SA DE CV                                                                                                              ', 'CLIP PLASTICO', '2552.00', '2018-05-31', '2552.00', '5820      '),
(153, 'INDUSTRIAS CONMAR SA DE CV                                                                                                      ', 'TELA', '9442.40', '2018-03-16', '9442.40', '8470      '),
(154, 'JLB EQUIP CONTRA INCENDIOS SA DE CV', 'EXTINGUIDORES RECARGA Y MTTO', '1984.76', '2018-02-22', '1984.76', '2379      '),
(155, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', '3097.20', '2018-02-16', '3097.20', '1354      '),
(156, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', '5929.92', '2018-02-16', '5929.92', '1355      '),
(157, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', '3387.20', '2018-02-22', '3387.20', '1362      '),
(158, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', '7240.14', '2018-03-08', '7240.14', '1381      '),
(159, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', '1545.12', '2018-03-22', '1545.12', '1387      '),
(160, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', '6857.92', '2018-04-06', '6857.92', '1404      '),
(161, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', '1277.16', '2018-04-06', '1277.16', '1410      '),
(162, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', '3712.00', '2018-04-30', '3712.00', '1416      '),
(163, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', '8695.36', '2018-04-30', '8695.36', '1417      '),
(164, 'JOSE G. SEPULVEDA REYNA                                                                                                         ', 'MTTO MAQUINARIA', '3636.60', '2018-05-11', '3636.60', '1441      '),
(165, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', '2042.24', '2018-01-15', '2042.24', '002       '),
(166, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', '3961.31', '2018-02-09', '3961.31', '005       '),
(167, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', '1938.81', '2018-03-08', '1938.81', '029       '),
(168, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', '3969.35', '2018-04-27', '3969.35', '33        '),
(169, 'JOSE NICOLAS RODRIGUEZ FLORES                                                                                                   ', 'COMISIONES SR RAMOS', '3875.15', '2018-05-04', '3875.15', '36        '),
(170, 'LA DISTRIBUIDORA DE CASIMIRES                                                                                                   ', 'TELAS', '7879.65', '2018-04-27', '7879.65', '305986    '),
(171, 'LIV MEDICAL SA DE CV                                                                                                            ', 'BOTIQUIN', '3748.61', '2018-02-16', '3748.61', '8816      '),
(172, 'LIV MEDICAL SA DE CV                                                                                                            ', 'BOTIQUIN', '2045.16', '2018-04-27', '2045.16', '9221      '),
(173, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'ART ASEO Y LIMPIEZA', '4071.01', '2018-02-28', '4071.01', '167       '),
(174, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'ART ASEO Y LIMPIEZA', '3297.74', '2018-04-30', '3297.74', '300       '),
(175, 'MANUEL DE JESUS CANALE VAQUERA                                                                                                  ', 'ART ASEO Y LIMPIEZA', '4086.54', '2018-05-18', '4086.54', '424       '),
(176, 'MARIA GRISELDA CID DAVILA                                                                                                       ', 'MAQUINADO EJEMOTRIZ', '5336.00', '2018-02-14', '5336.00', '398       '),
(177, 'MARIA MADALENA JIMENEZ GONZALEZ', 'COMPONENTES CONTROL DE ACCESO', '2287.52', '2018-01-16', '2287.52', '9066      '),
(178, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', '19720.00', '2018-01-30', '19720.00', '719       '),
(179, 'MARTINEZ GOMEZ MIAJA SA DE CV                                                                                                   ', 'PUBLICIDAD EN REDES RED', '19720.00', '2018-02-26', '19720.00', '743       '),
(180, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', '16468.83', '2018-01-11', '16468.83', '1956      '),
(181, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', '16468.83', '2018-02-09', '16468.83', '1983      '),
(182, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', '16468.83', '2018-03-08', '16468.83', '2019      '),
(183, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', '16468.83', '2018-04-06', '16468.83', '2057      '),
(184, 'MAURICIO FASCOWICH  PREJACHY                                                                                                    ', 'ARRENDAMIENTO', '16468.83', '2018-05-04', '16468.83', '2100      '),
(185, 'MIGUEL ANGEL VILLAREAL MOLINA                                                                                                   ', 'MTTO AUTOMOVIL', '2204.00', '2018-05-02', '2204.00', '177       '),
(186, 'NOE GALLEGOS TINAJERO                                                                                                           ', '1 MAQUINA RECTA ', '16573.50', '2018-03-20', '16573.50', '20032018  '),
(187, 'ON TIME SERVICIOS TERRESTRES URGENTES SA DE CV                                                                                  ', 'FLETES', '8200.12', '2018-01-25', '8200.12', '53983     '),
(188, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-01-11', '1500.00', '24247730  '),
(189, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-01-18', '1500.00', '24360483  '),
(190, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-01-25', '1500.00', '24502118  '),
(191, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-01-31', '1500.00', '24673839  '),
(192, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-02-09', '1500.00', '24899324  '),
(193, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-02-16', '1500.00', '24956504  '),
(194, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-02-22', '1500.00', '25088391  '),
(195, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-02-28', '1500.00', '25309050  '),
(196, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-03-06', '1500.00', '25434313  '),
(197, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-03-16', '1500.00', '25581268  '),
(198, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-03-22', '1500.00', '25701562  '),
(199, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-03-28', '1500.00', '28032018  '),
(200, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-04-06', '1500.00', '06042018  '),
(201, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-04-12', '1500.00', '12042018  '),
(202, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-04-26', '1500.00', '260418    '),
(203, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-05-04', '1500.00', '04052018  '),
(204, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-05-11', '1500.00', '26752269  '),
(205, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-05-21', '1500.00', '26924811  '),
(206, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-05-24', '1500.00', '24052018  '),
(207, 'OXXO EXPRESS SA DE CV                                                                                                           ', 'VALES DE GASOLINA', '1500.00', '2018-05-31', '1500.00', '31052018  '),
(208, 'PATRICIA SEVILLA MARTINEZ', 'MTTO AIRE LAVADO TECHO', '6444.96', '2018-05-31', '6444.96', '94        '),
(209, 'POOK SOLUCIONES CONSTRUCTIVAS SA DE CV                                                                                          ', 'REP TECHO LOCAL RED', '15312.00', '2018-02-13', '15312.00', '562       '),
(210, 'PROVEEDORA REMCO SA DE CV', '7 MAQUINA RECTA', '124063.16', '2018-03-16', '124063.16', '15032018  '),
(211, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-02-02', '5040.00', '84116     '),
(212, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-02-09', '5040.00', '84343     '),
(213, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-02-16', '5040.00', '84689     '),
(214, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-02-23', '5040.00', '85166     '),
(215, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-03-16', '5040.00', '85532     '),
(216, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-03-22', '5040.00', '85823     '),
(217, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-03-28', '5040.00', '86181     '),
(218, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-04-06', '5040.00', '86182     '),
(219, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-04-27', '5040.00', '86526     '),
(220, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-04-27', '5040.00', '86549     '),
(221, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-04-27', '5040.00', '86927     '),
(222, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-05-04', '5040.00', '87091     '),
(223, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-05-25', '5040.00', '87404     '),
(224, 'PROYECCION LOGISTICA SA DE CV', 'FLETES', '5040.00', '2018-05-31', '5040.00', '87514     '),
(225, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', '329.00', '2018-04-10', '329.00', '55236115\r\n'),
(226, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', '329.00', '2018-04-10', '329.00', '55236118\r\n'),
(227, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', '329.00', '2018-04-10', '329.00', '55236119\r\n'),
(228, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', '329.00', '2018-04-10', '329.00', '55236116\r\n'),
(229, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', '329.00', '2018-04-10', '329.00', '55236117\r\n'),
(230, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', '328.99', '2018-05-11', '328.99', '56455588\r\n'),
(231, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', '328.99', '2018-05-11', '328.99', '56455589\r\n'),
(232, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', '328.99', '2018-05-11', '328.99', '56455590\r\n'),
(233, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', '328.99', '2018-05-11', '328.99', '56455591\r\n'),
(234, 'RADIOMOVIL DIPSA, SA DE CV                                                                                                      ', 'TELEFONO', '328.99', '2018-05-11', '328.99', '56455592\r\n'),
(235, 'RECOLECTORA DE RESIDUOS COMERCIALES SA DE CV                                                                                    ', 'RECOLECCION DE BASURA', '2946.40', '2018-01-11', '2946.40', '53442     '),
(236, 'RECOLECTORA DE RESIDUOS COMERCIALES SA DE CV                                                                                    ', 'RECOLECCION DE BASURA', '2946.40', '2018-02-09', '2946.40', '54576     '),
(237, 'RECOLECTORA DE RESIDUOS COMERCIALES SA DE CV                                                                                    ', 'RECOLECCION DE BASURA', '2946.40', '2018-03-08', '2946.40', '55739     '),
(238, 'RECOLECTORA DE RESIDUOS COMERCIALES SA DE CV                                                                                    ', 'RECOLECCION DE BASURA', '2946.40', '2018-04-06', '2946.40', '56886     '),
(239, 'RECOLECTORA DE RESIDUOS COMERCIALES SA DE CV                                                                                    ', 'RECOLECCION DE BASURA', '2946.40', '2018-05-04', '2946.40', '58014     '),
(240, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO PLANTA', '331.24', '2018-02-02', '331.24', '27807     '),
(241, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO PLANTA', '1622.99', '2018-03-08', '1622.99', '28535     '),
(242, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO PLANTA', '555.71', '2018-04-30', '555.71', '29430     '),
(243, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO PLANTA', '316.34', '2018-05-04', '316.34', '30122     '),
(244, 'RIVERA FERRETERA SA DE CV                                                                                                       ', 'MTTO PLANTA', '393.35', '2018-05-04', '393.35', '29749     '),
(245, 'ROSA MARÍA ARIAS Y SAGAON                                                                                                       ', 'BOTON', '4176.00', '2018-05-16', '4176.00', '430       '),
(246, 'SEGUETAS LENMEX SA DE CV                                                                                                        ', 'SIERRA BANDA', '1427.39', '2018-05-29', '1427.39', '90118118  '),
(247, 'SEVICIOS DE AGUA Y DRENAJE DE MONTERREY I.P.D                                                                                   ', 'AGUA Y DRENAJE', '4625.00', '2018-03-08', '4625.00', '022018    '),
(248, 'SOFIA GONZALEZ LOPEZ', 'BANDA FUSIONADORA', '2320.00', '2018-05-25', '2320.00', '08052018  '),
(249, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', '1499.00', '2018-01-11', '1499.00', '23122017  '),
(250, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', '1498.00', '2018-03-08', '1498.00', '22.02.2018'),
(251, 'TELMEX SA DE CV                                                                                                                 ', 'TELEFONO', '1499.00', '2018-05-11', '1499.00', '23042018  '),
(252, 'TERESA CHONG', 'BOTON', '835.20', '2018-04-06', '835.20', '1853      '),
(253, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', '1160.00', '2018-01-11', '1160.00', '2127      '),
(254, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', '1160.00', '2018-02-09', '1160.00', '4795      '),
(255, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', '1160.00', '2018-03-08', '1160.00', '4942      '),
(256, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', '1160.00', '2018-04-27', '1160.00', '5135      '),
(257, 'ZEROBICHOS SA DE CV                                                                                                             ', 'FUMIGACION', '1160.00', '2018-05-11', '1160.00', '5280      '),
(258, 'RADIO MOVIL DIPSA SA DE CV', 'SERVICIO DE TELEFONIA ', '329.00', '2018-06-04', '0.00', '57681546'),
(259, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '329.00', '2018-03-08', '329.00', '54088772  '),
(260, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '329.00', '2018-03-08', '329.00', '54088773'),
(261, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '329.00', '2018-03-08', '329.00', '54088774'),
(262, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '329.00', '2018-03-08', '329.00', '54088775'),
(263, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '329.00', '2018-03-08', '329.00', '54088776'),
(264, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '329.00', '2018-02-12', '329.00', '52800453'),
(265, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '329.00', '2018-02-12', '329.00', '52800454'),
(266, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '329.00', '2018-02-12', '329.00', '52800455'),
(267, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '329.00', '2018-02-12', '329.00', '52800456'),
(268, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '329.00', '2018-02-12', '329.00', '52800457'),
(269, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '329.00', '2018-01-12', '529.00', '51589386'),
(270, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '529.00', '2018-01-12', '529.00', '51589387'),
(271, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '529.00', '2018-01-12', '529.00', '51589388'),
(272, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '529.00', '2018-01-12', '529.00', '51589389'),
(273, 'RADIO MOVIL DIPSA SA DE CV', 'TELEFONO', '529.00', '2018-01-12', '529.00', '51589390'),
(274, 'COMISION FEDERAL DE ELECTRICIDAD', 'LUZ', '18926.00', '2018-04-12', '18926.00', '267578'),
(275, 'COMISION FEDERAL DE ELECTRICIDAD', 'LUZ', '15947.00', '2018-05-11', '15947.00', '270549'),
(276, 'COMISION FEDERAL DE ELECTRICIDAD', 'LUZ', '348.00', '2018-05-25', '348.00', '303943'),
(277, 'COMISION FEDERAL DE ELECTRICIDAD', 'LUZ', '22111.00', '2018-05-31', '22111.00', '272247'),
(278, 'COMISION FEDERAL DE ELECTRICIDAD', 'LUZ', '1195.00', '2018-06-01', '1195.00', '305909'),
(279, 'SERVICIOS DE AGUA Y DRENAJE', 'SERVICIO DE AGUA EN PLANTA', '4600.00', '2018-01-12', '4600.00', '16291082'),
(280, 'SERVICIOS DE AGUA Y DRENAJE', 'SERVICIO DE AGUA EN PLANTA', '4614.00', '2018-02-12', '4614.00', '31012018'),
(281, 'SERVICIOS DE AGUA Y DRENAJE', 'SERVICIO DE AGUA EN PLANTA', '4625.00', '2018-03-08', '4625.00', '28022018'),
(282, 'SERVICIOS DE AGUA Y DRENAJE', 'SERVICIO DE AGUA EN PLANTA', '2554.00', '2018-04-10', '2554.00', '31032018'),
(283, 'SERVICIOS DE AGUA Y DRENAJE', 'SERVICIO DE AGUA EN PLANTA', '3677.00', '2018-05-11', '3677.00', '30042018'),
(284, 'AT&T COMUNICACIONES', 'NEXTEL', '2656.98', '2018-01-12', '2656.98', '146870766'),
(285, 'AT&T COMUNICACIONES', 'NEXTEL', '619.00', '2018-01-16', '619.00', '146963047'),
(286, 'AT&T COMUNICACIONES', 'NEXTEL', '619.00', '2018-02-13', '619.00', '147985203'),
(287, 'AT&T COMUNICACIONES', 'NEXTEL', '575.77', '2018-03-14', '575.77', '149114510'),
(288, 'AT&T COMUNICACIONES', 'NEXTEL', '963.15', '2018-04-17', '963.15', '149859100'),
(289, 'AT&T COMUNICACIONES', 'NEXTEL', '599.00', '2018-04-17', '599.00', '149961390'),
(290, 'AT&T COMUNICACIONES', 'NEXTEL', '1218.00', '2018-05-11', '1218.00', '150808166'),
(291, 'AT&T COMUNICACIONES', 'NEXTEL', '597.77', '2018-05-11', '597.77', '150842957');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_envios`
--

CREATE TABLE `ct_envios` (
  `pk_envios` int(11) NOT NULL,
  `fk_programacion` varchar(250) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fechaEnvio` date NOT NULL,
  `horaEnvio` time NOT NULL,
  `notas` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_envios`
--

INSERT INTO `ct_envios` (`pk_envios`, `fk_programacion`, `descripcion`, `fechaEnvio`, `horaEnvio`, `notas`) VALUES
(1, '23', 'Salida de Fitco', '2017-12-04', '08:10:00', 'Salida en tiempo'),
(2, '53', 'Arribo Nuevo Laredo', '2017-12-04', '15:10:00', 'prueba1'),
(3, '53', 'Despacho de Laredo a Liberty', '2017-12-04', '16:00:00', 'prueba 2'),
(4, '50', 'Arribo con el Cliente', '2017-12-05', '17:56:00', 'ultima prueba del dia'),
(5, '23', 'Arribo con el Cliente', '2017-12-05', '10:30:00', 'se debe mostrar este registro en pantalla'),
(6, '74', 'Salida de Fitco', '2018-04-24', '10:00:00', 'Salida 10 min tarde'),
(7, '74', 'Arribo Nuevo Laredo', '2018-04-24', '12:40:00', 'A tiempo'),
(8, '74', 'Arribo con el Cliente', '2018-04-25', '09:00:00', 'NingÃºn problema'),
(9, '75', 'Salida de Fitco', '2018-04-24', '16:40:00', 'Salio tarde'),
(10, '75', 'Arribo a Laredo', '2018-04-25', '08:00:00', 'En tiempo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_materiales`
--

CREATE TABLE `ct_materiales` (
  `pk_material` int(11) NOT NULL,
  `material` varchar(100) NOT NULL,
  `fechaCompra` date NOT NULL,
  `numeroSerie` varchar(50) NOT NULL,
  `personaEntrega` varchar(100) NOT NULL,
  `fechaEntrega` date NOT NULL,
  `condicionEntrega` varchar(250) NOT NULL,
  `precioMaterial` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_materiales`
--

INSERT INTO `ct_materiales` (`pk_material`, `material`, `fechaCompra`, `numeroSerie`, `personaEntrega`, `fechaEntrega`, `condicionEntrega`, `precioMaterial`) VALUES
(14, 'Registro 1', '2018-03-13', '1234', 'Usuario 1', '2018-03-14', 'Nuevo 1', '15000'),
(15, 'Registro 2', '2018-03-15', '5678ASD', 'Usuario 2', '2018-03-16', 'Nuevo 2', '18000'),
(16, 'Registro 3', '2018-03-20', 'TRY456', 'Usuario 3', '2018-03-24', 'Nuevo 3', '45000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_nomina`
--

CREATE TABLE `ct_nomina` (
  `pk_nomina` int(11) NOT NULL,
  `fechaNomina` date NOT NULL,
  `dineroNomina` varchar(255) NOT NULL,
  `horasExtras` int(11) NOT NULL,
  `dineroHoras` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_nomina`
--

INSERT INTO `ct_nomina` (`pk_nomina`, `fechaNomina`, `dineroNomina`, `horasExtras`, `dineroHoras`) VALUES
(6, '2018-04-30', '100000', 8, '5000'),
(8, '2018-04-20', '35000', 3, '1000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_pagos`
--

CREATE TABLE `ct_pagos` (
  `pk_pagos` int(11) NOT NULL,
  `fk_cobranza` int(11) NOT NULL,
  `fechaPago` date NOT NULL,
  `importePago` decimal(30,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_pagos`
--

INSERT INTO `ct_pagos` (`pk_pagos`, `fk_cobranza`, `fechaPago`, `importePago`) VALUES
(7, 88, '2018-03-06', '10000.00'),
(8, 1, '2018-03-06', '20900.00'),
(9, 3, '2018-03-06', '600000.00'),
(12, 10, '2018-03-07', '128000.00'),
(18, 7, '2018-03-07', '500000.00'),
(20, 14, '2018-05-16', '105000.00'),
(24, 19, '2018-05-17', '4896.36'),
(25, 25, '2018-05-10', '36940.20'),
(26, 26, '2018-05-10', '17141.64'),
(27, 27, '2018-05-09', '11546.64'),
(28, 29, '2018-05-10', '2460.36'),
(29, 30, '2018-05-11', '102287.64'),
(30, 31, '2018-05-08', '13340.00'),
(31, 28, '2018-05-18', '4959.00'),
(32, 39, '2018-05-25', '120000.00'),
(33, 37, '2018-05-25', '33805.71'),
(34, 38, '2018-05-25', '50033.82'),
(35, 36, '2018-05-23', '2931.32'),
(36, 32, '2018-05-24', '32433.75'),
(37, 33, '2018-05-24', '3212.15'),
(38, 34, '2018-05-24', '138825.31'),
(39, 35, '2018-05-24', '200793.49'),
(40, 39, '2018-05-31', '62473.51'),
(41, 18, '2018-05-31', '14097.94'),
(42, 44, '2018-06-08', '55119.37'),
(43, 45, '2018-06-08', '103530.00'),
(44, 24, '2018-06-08', '35072.39'),
(45, 23, '2018-06-08', '3382.71'),
(46, 22, '2018-06-08', '30599.31'),
(47, 21, '2018-06-08', '130365.21'),
(48, 20, '2018-06-08', '202644.44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_produccion`
--

CREATE TABLE `ct_produccion` (
  `pk_produccion` int(11) NOT NULL,
  `fk_programacion` varchar(50) NOT NULL,
  `fechaIntroduccion` date NOT NULL,
  `metaProduccion` int(11) NOT NULL,
  `cantidadProduccion` int(11) NOT NULL,
  `notas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_produccion`
--

INSERT INTO `ct_produccion` (`pk_produccion`, `fk_programacion`, `fechaIntroduccion`, `metaProduccion`, `cantidadProduccion`, `notas`) VALUES
(1, '1', '2017-10-25', 50, 40, ''),
(2, '1', '2017-10-25', 30, 30, ''),
(3, '2', '2017-10-26', 40, 50, ''),
(4, '3', '2017-10-26', 50, 50, ''),
(5, '10', '2017-11-02', 1000, 1000, ''),
(6, '10', '2017-11-08', 1000, 1000, ''),
(7, '10', '2017-11-03', 1000, 1000, ''),
(8, '10', '2017-11-06', 1000, 1000, ''),
(9, '10', '2017-11-07', 1000, 1000, ''),
(10, '10', '2017-11-09', 800, 800, ''),
(12, '10', '2017-11-03', 1000, 850, ''),
(13, '16', '2018-02-15', 50, 40, ''),
(35, '79', '2018-04-04', 350, 350, ''),
(36, '78', '2018-04-13', 1000, 900, ''),
(37, '78', '2018-04-14', 900, 900, ''),
(38, '75', '2018-04-14', 100, 120, ''),
(39, '99', '2018-05-28', 556, 574, ''),
(40, '99', '2018-05-29', 1000, 1000, ''),
(41, '99', '2018-05-30', 1000, 900, ''),
(42, '99', '2018-05-31', 1000, 1000, ''),
(43, '99', '2018-06-01', 1000, 1000, ''),
(44, '99', '2018-06-04', 1000, 520, ''),
(50, '100', '2018-06-06', 850, 285, ''),
(51, '100', '2018-06-05', 850, 650, ''),
(52, '104', '2018-06-06', 850, 365, 'Deshebrado'),
(53, '104', '2018-06-07', 850, 95, ''),
(54, '102', '2018-06-07', 850, 78, ''),
(55, '107', '2018-06-07', 850, 250, ''),
(56, '105', '2018-06-07', 1000, 63, ''),
(57, '106', '2018-06-07', 850, 78, ''),
(63, '107', '2018-06-08', 850, 750, ''),
(64, '107', '2018-06-09', 850, 200, ''),
(65, '107', '2018-06-11', 850, 900, ''),
(66, '107', '2018-06-12', 850, 900, ''),
(67, '107', '2018-06-13', 850, 950, ''),
(68, '98', '2018-06-14', 100, 100, ''),
(69, '80', '2018-06-15', 100, 100, ''),
(70, '81', '2018-06-16', 100, 100, ''),
(71, '103', '2018-06-02', 200, 180, ''),
(72, '101', '2018-06-03', 520, 500, ''),
(73, '101', '2018-06-17', 300, 350, ''),
(74, '101', '2018-06-18', 450, 450, ''),
(75, '103', '2018-06-19', 450, 450, ''),
(76, '103', '2018-06-20', 450, 450, ''),
(77, '109', '2018-06-21', 950, 1050, ''),
(78, '110', '2018-06-22', 150, 150, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_program`
--

CREATE TABLE `ct_program` (
  `pk_programacion` int(11) NOT NULL,
  `fk_cliente` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `piezasRequeridas` text NOT NULL,
  `color` varchar(255) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `ct_program`
--

INSERT INTO `ct_program` (`pk_programacion`, `fk_cliente`, `title`, `piezasRequeridas`, `color`, `textColor`, `start`, `end`) VALUES
(74, '25', 'Toplari', '1000', '#0433ff', '#FFFFFF', '2018-03-28 08:00:00', '2018-03-28 18:00:00'),
(75, '29', 'Royuli Seguridad', '1200', '#009051', '#FFFFFF', '2018-04-06 08:00:00', '2018-04-06 18:00:00'),
(78, '29', 'Cap.Garibaldi', '1800', '#9437ff', '#FFFFFF', '2018-04-13 10:30:00', '2018-04-15 16:00:00'),
(79, '24', 'Privilegio', '350', '#ff9300', '#FFFFFF', '2018-04-04 08:00:00', '2018-04-04 18:00:00'),
(80, '28', 'Carey', '1300', '#941100', '#FFFFFF', '2018-04-27 12:00:00', '2018-04-29 16:00:00'),
(81, '24', 'Privilegio', '400', '#ff9300', '#FFFFFF', '2018-04-27 08:00:00', '2018-04-27 12:00:00'),
(98, '28', 'Empuje Textil, S. de R.L. de C.V.', '605', '#941100', '#FFFFFF', '2018-05-21 08:00:00', '2018-05-21 18:00:00'),
(99, '23', 'Liberty Uniform Mfg. Co., Inc.', '5004', '#fffb00', '#FFFFFF', '2018-05-28 11:00:00', '2018-06-04 14:00:00'),
(100, '28', 'Empuje Textil, S. de R.L. de C.V.', '935', '#941100', '#FFFFFF', '2018-06-05 08:00:00', '2018-06-06 12:00:00'),
(101, '39', 'Uniformes Express S de RL MI               ', '1475', '#ff0000', '#FFFFFF', '2018-06-26 12:00:00', '2018-06-28 13:00:00'),
(103, '23', 'Liberty Uniform Mfg. Co., Inc.', '5022', '#fffb00', '#FFFFFF', '2018-06-19 09:00:00', '2018-06-26 12:00:00'),
(104, '28', 'Empuje Textil, S. de R.L. de C.V.', '460', '#941100', '#FFFFFF', '2018-06-06 08:00:00', '2018-06-07 18:00:00'),
(105, '38', 'Confecciones Modi S de RL de CV         ', '63', '#000000', '#FFFFFF', '2018-06-06 12:00:00', '2018-06-06 16:00:00'),
(106, '42', 'RICARDO GARCIA LOZANO    ', '78', '#8000ff', '#FFFFFF', '2018-06-06 16:00:00', '2018-06-07 10:00:00'),
(107, '24', 'Grupo Privileggio,S.A. de C.V.', '5551', '#800080', '#FFFFFF', '2018-06-07 10:00:00', '2018-06-19 09:00:00'),
(108, '23', 'Liberty Uniform Mfg. Co., Inc.', '5004', '#fffb00', '#FFFFFF', '2018-07-09 13:00:00', '2018-07-16 16:00:00'),
(109, '24', 'Grupo Privileggio,S.A. de C.V.', '5288', '#800080', '#FFFFFF', '2018-06-28 13:00:00', '2018-07-06 18:00:00'),
(110, '42', 'RICARDO GARCIA LOZANO    ', '158', '#8000ff', '#FFFFFF', '2018-07-09 08:00:00', '2018-07-09 13:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_programacion`
--

CREATE TABLE `ct_programacion` (
  `pk_programacion` int(30) NOT NULL,
  `fk_cliente` varchar(30) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `piezasRequeridas` int(11) NOT NULL,
  `horaEntrega` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_programacion`
--

INSERT INTO `ct_programacion` (`pk_programacion`, `fk_cliente`, `fechaInicio`, `fechaFinal`, `piezasRequeridas`, `horaEntrega`) VALUES
(11, '24', '2017-11-10', '2017-11-10', 600, '18:00:00'),
(12, '25', '2017-11-13', '2017-11-15', 1700, '18:00:00'),
(13, '23', '2017-11-16', '2017-11-23', 5800, '18:00:00'),
(14, '25', '2017-11-24', '2017-11-24', 550, '18:00:00'),
(15, '26', '2017-11-24', '2017-11-27', 1300, '18:00:00'),
(16, '27', '2017-11-28', '2017-11-28', 700, '18:00:00'),
(17, '28', '2017-11-29', '2017-11-30', 1400, '18:00:00'),
(18, '23', '2017-12-01', '2017-12-07', 5800, '18:00:00'),
(19, '24', '2017-12-08', '2017-12-08', 700, '18:00:00'),
(20, '29', '2017-12-11', '2017-12-11', 800, '18:00:00'),
(21, '29', '2017-12-11', '2017-12-11', 800, '18:00:00'),
(22, '24', '2017-12-12', '2017-12-12', 800, '18:00:00'),
(23, '23', '2017-12-13', '2017-12-20', 5800, '18:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_seccionCorte`
--

CREATE TABLE `ct_seccionCorte` (
  `pk_corte` int(11) NOT NULL,
  `clienteCorte` varchar(255) NOT NULL,
  `fechaCorte` date NOT NULL,
  `fhinicio_prog` time NOT NULL,
  `fhfinal_prog` time NOT NULL,
  `fhinicio_real` time NOT NULL,
  `fhfinal_real` time NOT NULL,
  `Notas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_seccionCorte`
--

INSERT INTO `ct_seccionCorte` (`pk_corte`, `clienteCorte`, `fechaCorte`, `fhinicio_prog`, `fhfinal_prog`, `fhinicio_real`, `fhfinal_real`, `Notas`) VALUES
(5, 'Carey', '2018-04-28', '08:00:00', '18:00:00', '00:00:00', '00:00:00', ''),
(6, 'Dos Banderas', '2018-04-30', '12:30:00', '13:50:00', '00:00:00', '00:00:00', ''),
(7, 'Privilegio', '2018-04-30', '16:00:00', '18:00:00', '16:00:00', '18:30:00', 'atraso por junta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_ventas`
--

CREATE TABLE `ct_ventas` (
  `pk_ventas` int(11) NOT NULL,
  `nombreCliente` varchar(250) NOT NULL,
  `nombreVendedor` varchar(250) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaBaja` date NOT NULL,
  `precioXprenda` varchar(250) NOT NULL,
  `acuerdoPago` varchar(250) NOT NULL,
  `numeroPrendas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_ventas`
--

INSERT INTO `ct_ventas` (`pk_ventas`, `nombreCliente`, `nombreVendedor`, `fechaIngreso`, `fechaBaja`, `precioXprenda`, `acuerdoPago`, `numeroPrendas`) VALUES
(8, 'cliente 1', 'Vendedor 1', '2018-03-13', '2018-03-13', '10', '10%', 1000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `pk_usuario` int(11) NOT NULL,
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
  `editarVentas` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`pk_usuario`, `nombreUsuario`, `apellidosUsuario`, `correoUsuario`, `departamentoUsuario`, `puestoUsuario`, `usrUsuario`, `contraUsuario`, `privilegiosUsuario`, `cobranza_ver`, `cobranza_editar`, `produccion_ver`, `produccion_editar`, `cliente_ver`, `cliente_editar`, `verVentas`, `editarVentas`) VALUES
(1, 'Mariela', 'Villaverde Mejia', 'mariela@villaverde.com', 'DirecciÃƒÂ³n', 'Directora', 'mvillaverde', 'mars1010', 'Administrador', '1', '1', '1', '1', '1', '1', '0', '0'),
(2, 'Eduardo', 'Santos', 'esantos@prolog-mex.com', 'Sistemas', 'Gerente de Sistemas', 'esantos', 'esantos', 'Administrador', '1', '1', '1', '1', '1', '1', '0', '0'),
(3, 'Estefania', 'Pinales Avalos', 'epinales@prolog-mex.com', 'Sistemas', 'Analista de Sistemas', 'epinales', 'epinales', 'Administrador', '1', '1', '1', '1', '1', '1', '0', '0'),
(4, 'Hector', 'Aguirre', 'hector.aguirre@fitco.com.mx', 'Sobre Oficina Completa', 'Gerente General', 'haguirre', 'fitco123', 'Administrador', '1', '1', '1', '1', '1', '1', '1', '1'),
(8, 'Segio ', 'Reyna', 'Sergio.reyna@fitco.com.mx', 'Contabilidad', 'Ejecutivo de Produccion', 'Sreyna', 'Fitco123', 'Usuario', '1', '1', '1', '1', '1', '1', '0', '0'),
(9, 'Dana', 'Camacho', 'dana.camacho@fitco.com.mx', 'Coordinacion', 'DiseÃ±adora, Jefe de Limpieza, Jefe de Inventarios', 'dcamacho', 'fitco123', 'Usuario', '0', '0', '1', '1', '1', '1', '0', '0'),
(14, 'Juan', 'Hernandez', 'juan.hernandez@fitco.com.mx', 'Tesoreria', 'Jefe de Cuentas por Pagar', 'jhernandez', 'fitco123', 'Usuario', '1', '1', '0', '0', '0', '0', '0', '0'),
(20, 'Juan ', 'Valenciano', 'juan.valenciano@fitco.com.mx', '(4) Produccion', 'Coordinador de Produccion', 'jvalenciano', 'fitco123', 'Usuario', '0', '0', '1', '1', '1', '0', '1', '0'),
(21, 'Jose Rodolfo', 'Villaverde', 'jrodolfo@villaverde.com', 'Executivo', 'Fundador', 'jrodolfo', 'jrvv2020', 'Administrador', '0', '0', '0', '0', '0', '0', '0', '0'),
(22, 'Diana', 'Luna', 'diana.luna@fitco.com.mx', 'Comunicaciones y Tesoreria', 'Recepcionista, Facturacion', 'dluna', 'fitco123', 'Usuario', '1', '1', '0', '0', '1', '1', '0', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ct_cliente`
--
ALTER TABLE `ct_cliente`
  ADD PRIMARY KEY (`pk_cliente`);

--
-- Indices de la tabla `ct_cobranza`
--
ALTER TABLE `ct_cobranza`
  ADD PRIMARY KEY (`pk_cobranza`);

--
-- Indices de la tabla `ct_corte`
--
ALTER TABLE `ct_corte`
  ADD PRIMARY KEY (`pk_corte`);

--
-- Indices de la tabla `ct_CuentasxPagar`
--
ALTER TABLE `ct_CuentasxPagar`
  ADD PRIMARY KEY (`pk_cuentasPagar`);

--
-- Indices de la tabla `ct_envios`
--
ALTER TABLE `ct_envios`
  ADD PRIMARY KEY (`pk_envios`);

--
-- Indices de la tabla `ct_materiales`
--
ALTER TABLE `ct_materiales`
  ADD PRIMARY KEY (`pk_material`);

--
-- Indices de la tabla `ct_nomina`
--
ALTER TABLE `ct_nomina`
  ADD PRIMARY KEY (`pk_nomina`);

--
-- Indices de la tabla `ct_pagos`
--
ALTER TABLE `ct_pagos`
  ADD PRIMARY KEY (`pk_pagos`);

--
-- Indices de la tabla `ct_produccion`
--
ALTER TABLE `ct_produccion`
  ADD PRIMARY KEY (`pk_produccion`);

--
-- Indices de la tabla `ct_program`
--
ALTER TABLE `ct_program`
  ADD PRIMARY KEY (`pk_programacion`);

--
-- Indices de la tabla `ct_programacion`
--
ALTER TABLE `ct_programacion`
  ADD PRIMARY KEY (`pk_programacion`,`fk_cliente`);

--
-- Indices de la tabla `ct_seccionCorte`
--
ALTER TABLE `ct_seccionCorte`
  ADD PRIMARY KEY (`pk_corte`);

--
-- Indices de la tabla `ct_ventas`
--
ALTER TABLE `ct_ventas`
  ADD PRIMARY KEY (`pk_ventas`),
  ADD UNIQUE KEY `idx_ct_ventas_pk_ventas` (`pk_ventas`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`pk_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ct_cliente`
--
ALTER TABLE `ct_cliente`
  MODIFY `pk_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `ct_cobranza`
--
ALTER TABLE `ct_cobranza`
  MODIFY `pk_cobranza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
--
-- AUTO_INCREMENT de la tabla `ct_corte`
--
ALTER TABLE `ct_corte`
  MODIFY `pk_corte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ct_CuentasxPagar`
--
ALTER TABLE `ct_CuentasxPagar`
  MODIFY `pk_cuentasPagar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;
--
-- AUTO_INCREMENT de la tabla `ct_envios`
--
ALTER TABLE `ct_envios`
  MODIFY `pk_envios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `ct_materiales`
--
ALTER TABLE `ct_materiales`
  MODIFY `pk_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `ct_nomina`
--
ALTER TABLE `ct_nomina`
  MODIFY `pk_nomina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `ct_pagos`
--
ALTER TABLE `ct_pagos`
  MODIFY `pk_pagos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT de la tabla `ct_produccion`
--
ALTER TABLE `ct_produccion`
  MODIFY `pk_produccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT de la tabla `ct_program`
--
ALTER TABLE `ct_program`
  MODIFY `pk_programacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT de la tabla `ct_programacion`
--
ALTER TABLE `ct_programacion`
  MODIFY `pk_programacion` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `ct_seccionCorte`
--
ALTER TABLE `ct_seccionCorte`
  MODIFY `pk_corte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ct_ventas`
--
ALTER TABLE `ct_ventas`
  MODIFY `pk_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `pk_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
