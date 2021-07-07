-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 06-03-2018 a las 18:50:10
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
(7, 'Liberty', 'Liberty@hotmail.com', '867-7134646', 30, '2017-08-28', '#408000', 3000, 'Asesor de Ventas', ''),
(8, 'Carey', 'Carey@gmail.com', '867-7134', 12, '2017-08-28', '#ffff00', 2000, 'Referido', ''),
(9, 'Privilegio', 'Privilegio@hotmail.com', '867-7134646', 20, '2017-08-28', '#0080ff', 3456, 'Medios Publicitarios', ''),
(10, 'Bantu', 'Bantu@hotmail.com', '867713464', 10, '2017-08-28', '#ff8000', 1400, 'Asesor de Ventas', 'Vendedor 1'),
(11, 'Dos Banderas', 'Dosbanderas@hotmail.com', '867-7134646', 30, '2017-08-28', '#666666', 2800, 'Asesor de Ventas', ''),
(12, 'Red', 'Red@hotmail.com', '867-7134646', 30, '2017-08-15', '#ff0000', 1500, 'Referido', ''),
(13, 'Diseñadora', 'áfdkjshfkwje', 'jkdhkjsh', 0, '2018-02-13', '#00fdff', 1, '1', '1');

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
(86, 'Bordado', 'A2', '232500.00', '2018-02-07', '2018-02-05', '9'),
(87, 'Bordado', 'A3', '132650.00', '2018-03-02', '2018-03-01', '12'),
(88, 'Flete', 'A4', '153850.00', '2018-02-01', '2018-02-27', '8'),
(89, 'Flete', 'A5', '321000.00', '2018-02-22', '2018-02-20', '11'),
(90, 'Maquila', 'A6', '322500.00', '2018-02-12', '2018-02-10', '13');

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
(5, '51', '2017-12-01', '14:00:00', 'Termino de Liberty'),
(6, '48', '2017-12-04', '12:00:00', 'prueba'),
(7, '54', '2017-12-13', '15:51:00', 'notas ');

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
(9, '53', 'Arribo Nuevo Laredo', '2018-02-20', '22:50:00', 'prueba');

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
(1, 'Coputadora ñ', '2017-12-08', 'M123456789', '2300', '2017-12-11', 'Nueva', '2300'),
(3, 'hola', '2017-12-08', '576576', '10020', '2017-12-12', 'nuevo', 'estefania');

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
(46, 88, '2018-01-02', 100000, 0);

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
(14, '26', '2017-11-09', 80, 50),
(17, '26', '2017-11-09', 80, 10),
(19, '27', '2017-11-09', 300, 300),
(20, '36', '2017-11-24', 100, 150),
(21, '38', '2017-11-30', 800, 800),
(22, '53', '2017-12-06', 100, 1500);

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

--
-- Volcado de datos para la tabla `ct_programacion`
--

INSERT INTO `ct_programacion` (`pk_programacion`, `fk_cliente`, `fechaInicio`, `fechaFinal`, `piezasRequeridas`, `horaEntrega`) VALUES
(43, '12', '2017-12-11', '2017-12-15', 1500, '14:20:00'),
(48, '9', '2017-12-01', '2017-12-05', 1400, '13:00:00'),
(50, '11', '2017-12-21', '2017-12-23', 4500, '17:40:00'),
(51, '7', '2017-12-01', '2017-12-01', 500, '15:00:00'),
(53, '8', '2017-12-01', '2017-12-03', 1500, '08:01:00'),
(54, '7', '2017-12-01', '2017-12-03', 1300, '08:00:00');

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
(6, 'Cliente2', 'Juan Quinteroñ', '2018-02-14', '0000-00-00', '40', '30%', 100),
(7, 'Cliente3', 'Fany Avalos', '2018-03-13', '0000-00-00', '40', '20%', 500),
(8, 'Cliente1', 'Estefania', '2018-01-16', '0000-00-00', '10', '10%', 300),
(9, 'Cliente4', 'Jesus', '2018-01-25', '0000-00-00', '40', '10%', 360),
(10, 'cliente5', 'Vendedor 1', '2018-04-19', '0000-00-00', '10', '100%', 220);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

CREATE TABLE `meses` (
  `id` int(11) NOT NULL,
  `mes` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id`, `mes`) VALUES
(1, 'Enero'),
(2, 'Febrero'),
(3, 'Marzo'),
(4, 'Abril'),
(5, 'Mayo'),
(6, 'Junio'),
(7, 'Julio'),
(8, 'Agosto'),
(9, 'Septiembre'),
(10, 'Octubre'),
(11, 'Noviembre'),
(12, 'Diciembre');

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
(13, 'Estefania', 'Pinales Avalos', 'ae_pinales@hotmail.com', 'Sistemas', 'Sistemas', 'Estefania', '1234', 'Administrador', '0', '0', '0', '1', '0', '1', '0', '0'),
(21, 'produccionñ', 'prueba', 'pruebaproduccion@', 'produccion', 'produccion', 'produccion', 'produccion', 'Usuario', '0', '0', '1', '0', '0', '0', '0', '0'),
(22, 'Ventas', 'Ventas', 'ventas@', 'ventas', 'ventas', 'ventas', 'ventas', 'Usuario', '0', '0', '0', '0', '0', '0', '', '');

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
-- Indices de la tabla `ct_programacion`
--
ALTER TABLE `ct_programacion`
  ADD PRIMARY KEY (`pk_programacion`,`fk_cliente`);

--
-- Indices de la tabla `ct_ventas`
--
ALTER TABLE `ct_ventas`
  ADD PRIMARY KEY (`pk_ventas`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `pk_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `ct_cobranza`
--
ALTER TABLE `ct_cobranza`
  MODIFY `pk_cobranza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT de la tabla `ct_corte`
--
ALTER TABLE `ct_corte`
  MODIFY `pk_corte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ct_envios`
--
ALTER TABLE `ct_envios`
  MODIFY `pk_envios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `ct_materiales`
--
ALTER TABLE `ct_materiales`
  MODIFY `pk_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ct_pagos`
--
ALTER TABLE `ct_pagos`
  MODIFY `pk_pagos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `ct_produccion`
--
ALTER TABLE `ct_produccion`
  MODIFY `pk_produccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `ct_programacion`
--
ALTER TABLE `ct_programacion`
  MODIFY `pk_programacion` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT de la tabla `ct_ventas`
--
ALTER TABLE `ct_ventas`
  MODIFY `pk_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `pk_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
