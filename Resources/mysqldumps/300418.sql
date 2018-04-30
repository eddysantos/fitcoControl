-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 30-04-2018 a las 21:14:01
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
  `correoCliente` varchar(100) NOT NULL,
  `telefonoCliente` varchar(50) NOT NULL,
  `creditoCliente` int(11) NOT NULL,
  `fingresoCliente` date NOT NULL,
  `colorCliente` varchar(20) NOT NULL,
  `prendasCliente` int(11) NOT NULL,
  `nosotrosCliente` varchar(50) NOT NULL,
  `vendedorCliente` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_cliente`
--

INSERT INTO `ct_cliente` (`pk_cliente`, `nombreCliente`, `correoCliente`, `telefonoCliente`, `creditoCliente`, `fingresoCliente`, `colorCliente`, `prendasCliente`, `nosotrosCliente`, `vendedorCliente`) VALUES
(22, 'Red', 'red@', '1234567', 30, '2018-04-06', '#ff2600', 100, 'Asesor de Ventas', 'Asesor de Ventas'),
(23, 'Privilegio', 'privilegio@', '12345678', 30, '2018-04-12', '#929000', 5000, 'Asesor de Ventas', 'Asesor de Ventas'),
(24, 'Liberty', 'liberty@', '1345678', 20, '2018-04-09', '#73fdff', 5000, 'Referido', 'Referido'),
(25, 'Dos Banderas', 'banderas@', '567890123', 10, '2018-04-10', '#9437ff', 1500, 'Referido', 'Referido'),
(26, 'Carey', 'carey@', '34567890', 18, '2018-04-24', '#ff8ad8', 2700, 'Medios Publicitarios', 'Medios Publicitarios'),
(27, 'Diseñadora', 'diseñadora ', 'dise@', 30, '2018-04-03', '#0433ff', 6000, 'Asesor de Ventas', 'Asesor de Ventas'),
(30, 'Cliente1', 'cliente@', '456789', 80, '2018-04-10', '#fffb00', 6789, 'Referido', 'Referido');

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
(9, 'Bordado', 'A3', '5678.00', '2018-04-05', '2018-04-03', '22'),
(22, 'Flete', 'd34', '678.00', '2018-04-11', '2018-04-10', '25'),
(26, 'Maquila', 'A12', '6789.00', '2018-04-12', '2018-04-11', '23');

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
(9, '50', '2018-04-13', '11:35:00', 'primera nota'),
(10, '72', '2018-04-18', '10:00:00', 'El personal trabajó horas extras');

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
(3, '53', 'Despacho de Laredo a Liberty', '2017-12-04', '16:00:00', 'prueba 2'),
(4, '50', 'Arribo con el Cliente', '2017-12-05', '17:56:00', 'ultima prueba del dia'),
(6, '51', 'Arribo con el Cliente', '2017-12-05', '12:11:00', 'final'),
(7, '54', 'Arribo con el Cliente', '2017-12-05', '12:11:00', 'final'),
(8, '48', 'Arribo con el Cliente', '2017-12-05', '12:11:00', 'final'),
(9, '53', 'Arribo Nuevo Laredo', '2018-02-20', '22:50:00', 'prueba'),
(10, '43', 'Despacho de Laredo a Liberty', '2018-04-05', '10:00:00', 'prueba');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_pagos`
--

CREATE TABLE `ct_pagos` (
  `pk_pagos` int(11) NOT NULL,
  `fk_cobranza` int(11) NOT NULL,
  `fechaPago` date NOT NULL,
  `importePago` int(11) NOT NULL,
  `semanaPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_pagos`
--

INSERT INTO `ct_pagos` (`pk_pagos`, `fk_cobranza`, `fechaPago`, `importePago`, `semanaPago`) VALUES
(2, 36, '2017-10-19', 400, 0),
(4, 36, '2017-10-18', 100, 0),
(5, 36, '2017-10-18', 1000, 0),
(6, 40, '2017-10-18', 1200, 0),
(7, 31, '2017-10-18', 3000, 0),
(8, 37, '2017-10-18', 32000, 0),
(9, 39, '2017-10-18', 2000, 0),
(10, 32, '2017-10-18', 7700, 0),
(11, 30, '2017-10-18', 5470, 0),
(12, 38, '2017-10-18', 1000, 0),
(13, 40, '2017-10-18', 2300, 0),
(14, 31, '2017-10-19', 1000, 0),
(15, 42, '2017-10-25', 1234, 0),
(16, 45, '2017-10-25', 1234, 0),
(17, 46, '2017-10-25', 12345, 0),
(18, 47, '2017-10-26', 890, 0),
(19, 58, '2017-10-26', 200, 0),
(20, 61, '2017-11-06', 300, 0),
(21, 62, '2017-11-06', 200, 0),
(22, 63, '2017-11-07', 460, 0),
(23, 65, '2017-11-07', 4500, 0),
(24, 62, '2017-11-07', 1034, 0),
(25, 68, '2017-11-07', 1234, 0),
(27, 73, '2017-11-23', 500, 0),
(28, 73, '2017-11-23', 500, 0),
(29, 72, '2017-12-07', 1250, 0),
(30, 74, '2018-01-18', 150, 0),
(31, 75, '2018-01-19', 300, 0),
(32, 76, '2018-01-19', 750, 0),
(34, 78, '2018-02-15', 300, 0),
(35, 73, '2018-02-20', 450000, 0),
(36, 72, '2018-02-20', 340000, 0),
(37, 78, '2018-02-20', 134000, 0),
(38, 74, '2018-02-20', 83000, 0),
(39, 75, '2018-02-20', 445000, 0),
(44, 80, '2018-02-21', 100, 0),
(45, 84, '2018-02-21', 342000, 0),
(46, 88, '2018-01-02', 100000, 0),
(49, 93, '2018-03-08', 200, 0),
(50, 94, '2018-03-07', 123400, 0),
(51, 87, '2018-03-07', 132000, 0),
(52, 87, '2018-03-07', 650, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_produccion`
--

CREATE TABLE `ct_produccion` (
  `pk_produccion` int(11) NOT NULL,
  `fk_programacion` varchar(50) NOT NULL,
  `fechaIntroduccion` date NOT NULL,
  `metaProduccion` int(11) NOT NULL,
  `cantidadProduccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_produccion`
--

INSERT INTO `ct_produccion` (`pk_produccion`, `fk_programacion`, `fechaIntroduccion`, `metaProduccion`, `cantidadProduccion`) VALUES
(14, '72', '2018-04-02', 20, 20),
(15, '72', '2018-04-02', 20, 10),
(16, '73', '2018-04-03', 25, 30),
(17, '73', '2018-04-03', 20, 20),
(18, '77', '2018-04-04', 40, 40),
(19, '1', '2018-04-10', 100, 80),
(20, '1', '2018-04-12', 100, 120),
(21, '1', '2018-04-13', 100, 100),
(22, '81', '2017-04-04', 400, 300),
(23, '81', '2017-04-04', 300, 300),
(25, '91', '2018-04-26', 50, 50),
(26, '88', '2018-04-25', 100, 120);

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
(1, '22', 'Red', '300', '#ff2600', '#FFFFFF', '2018-04-10 12:44:00', '2018-04-13 14:00:00'),
(70, '30', 'Cliente1', '100', '#fffb00', '#FFFFFF', '2018-04-07 08:00:00', '2018-04-07 18:00:00'),
(72, '25', 'Dos Banderas', '30', '#9437ff', '#FFFFFF', '2018-04-02 08:00:00', '2018-04-02 18:00:00'),
(73, '26', 'Carey', '50', '#ff8ad8', '#FFFFFF', '2018-04-03 08:00:00', '2018-04-03 18:00:00'),
(74, '22', 'Red', '30', '#ff2600', '#FFFFFF', '2018-04-06 08:00:00', '2018-04-06 18:00:00'),
(75, '24', 'Liberty', '200', '#73fdff', '#FFFFFF', '2018-04-16 08:00:00', '2018-04-16 18:00:00'),
(77, '25', 'Dos Banderas', '40', '#9437ff', '#FFFFFF', '2018-04-04 08:00:00', '2018-04-04 18:00:00'),
(80, '27', 'Diseñadora', '60', '#0433ff', '#FFFFFF', '2018-04-05 08:00:00', '2018-04-05 18:00:00'),
(82, '26', 'Carey', '100', '#ff8ad8', '#FFFFFF', '2018-04-17 08:00:00', '2018-04-17 18:00:00'),
(83, '30', 'Cliente1', '100', '#fffb00', '#FFFFFF', '2018-04-18 08:00:00', '2018-04-18 18:00:00'),
(84, '30', 'Cliente1', '100', '#fffb00', '#FFFFFF', '2018-04-17 08:00:00', '2018-04-17 18:00:00'),
(85, '27', 'Diseñadora', '50', '#0433ff', '#FFFFFF', '2018-04-19 08:00:00', '2018-04-19 18:00:00'),
(86, '22', 'Red', '50', '#ff2600', '#FFFFFF', '2018-04-20 08:00:00', '2018-04-20 18:00:00'),
(87, '22', 'Red', '50', '#ff2600', '#FFFFFF', '2018-04-24 08:00:00', '2018-04-24 18:00:00'),
(88, '23', 'Privilegio', '120', '#929000', '#FFFFFF', '2018-04-25 08:00:00', '2018-04-25 18:00:00'),
(89, '23', 'Privilegio', '100', '#929000', '#FFFFFF', '2018-04-19 08:00:00', '2018-04-19 18:00:00'),
(90, '30', 'Cliente1', '80', '#fffb00', '#FFFFFF', '2018-04-23 08:00:00', '2018-04-23 18:00:00'),
(91, '24', 'Liberty', '50', '#73fdff', '#FFFFFF', '2018-04-26 08:00:00', '2018-04-26 18:00:00');

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
  `horaEntrega` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(15, 'Carey', '2018-04-30', '08:00:00', '10:00:00', '08:20:00', '10:00:00', 'Comenzamos tarde pero terminamos a tiempo'),
(16, 'Privilegio', '2018-04-24', '08:00:00', '11:30:00', '08:00:00', '12:00:00', 'terminamos tarde'),
(17, 'Dos Banderas', '2018-04-30', '12:30:00', '13:45:00', '00:00:00', '00:00:00', '');

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
(21, 'Cliente 1', 'vendedor 1', '2018-04-11', '1970-01-01', '50', '20%', 10000);

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
  `verVentas` varchar(50) NOT NULL,
  `editarVentas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`pk_usuario`, `nombreUsuario`, `apellidosUsuario`, `correoUsuario`, `departamentoUsuario`, `puestoUsuario`, `usrUsuario`, `contraUsuario`, `privilegiosUsuario`, `cobranza_ver`, `cobranza_editar`, `produccion_ver`, `produccion_editar`, `cliente_ver`, `cliente_editar`, `verVentas`, `editarVentas`) VALUES
(26, 'Azeneth', 'Pinales Avalos', 'ae_pinales@', 'Sistemas', 'Auxiliar de sistemas', 'Estefania', '1234', 'Administrador', '0', '0', '0', '0', '0', '0', '0', '0'),
(27, 'Cliente', 'cliente', 'cliente@', 'cliente', 'cliente', 'cliente', 'cliente', 'Usuario', '0', '0', '0', '0', '1', '1', '0', '0');

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
  ADD PRIMARY KEY (`pk_ventas`);

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
  MODIFY `pk_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `ct_cobranza`
--
ALTER TABLE `ct_cobranza`
  MODIFY `pk_cobranza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `ct_corte`
--
ALTER TABLE `ct_corte`
  MODIFY `pk_corte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `ct_envios`
--
ALTER TABLE `ct_envios`
  MODIFY `pk_envios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `ct_materiales`
--
ALTER TABLE `ct_materiales`
  MODIFY `pk_material` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ct_pagos`
--
ALTER TABLE `ct_pagos`
  MODIFY `pk_pagos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `ct_produccion`
--
ALTER TABLE `ct_produccion`
  MODIFY `pk_produccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `ct_program`
--
ALTER TABLE `ct_program`
  MODIFY `pk_programacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT de la tabla `ct_programacion`
--
ALTER TABLE `ct_programacion`
  MODIFY `pk_programacion` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ct_seccionCorte`
--
ALTER TABLE `ct_seccionCorte`
  MODIFY `pk_corte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `ct_ventas`
--
ALTER TABLE `ct_ventas`
  MODIFY `pk_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `pk_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
