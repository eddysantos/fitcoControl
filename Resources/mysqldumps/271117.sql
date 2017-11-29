-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 29-11-2017 a las 00:27:03
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
(10, 'Bantu', 'Bantu@hotmail.com', '867713464', 10, '2017-08-28', '#ff8000', 1400, 'Asesor de Ventas', ''),
(11, 'Dos Banderas', 'Dosbanderas@hotmail.com', '867-7134646', 30, '2017-08-28', '#666666', 2800, 'Asesor de Ventas', ''),
(12, 'Red', 'Red@hotmail.com', '867-7134646', 30, '2017-08-15', '#ff0000', 1500, 'Referido', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_cobranza`
--

CREATE TABLE `ct_cobranza` (
  `pk_cobranza` int(11) NOT NULL,
  `clienteCobranza` varchar(150) NOT NULL,
  `facturaCobranza` varchar(10) NOT NULL,
  `importeCobranza` decimal(30,2) NOT NULL,
  `vencimientoCobranza` date NOT NULL,
  `fk_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_cobranza`
--

INSERT INTO `ct_cobranza` (`pk_cobranza`, `clienteCobranza`, `facturaCobranza`, `importeCobranza`, `vencimientoCobranza`, `fk_cliente`) VALUES
(72, '', 'q123', '1234.00', '0000-00-00', '8'),
(73, '', 'A234', '1234.00', '2017-11-23', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_pagos`
--

CREATE TABLE `ct_pagos` (
  `pk_pagos` int(11) NOT NULL,
  `fk_cobranza` int(11) NOT NULL,
  `fechaPago` date NOT NULL,
  `importePago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_pagos`
--

INSERT INTO `ct_pagos` (`pk_pagos`, `fk_cobranza`, `fechaPago`, `importePago`) VALUES
(2, 36, '2017-10-19', 400),
(4, 36, '2017-10-18', 100),
(5, 36, '2017-10-18', 1000),
(6, 40, '2017-10-18', 1200),
(7, 31, '2017-10-18', 3000),
(8, 37, '2017-10-18', 32000),
(9, 39, '2017-10-18', 2000),
(10, 32, '2017-10-18', 7700),
(11, 30, '2017-10-18', 5470),
(12, 38, '2017-10-18', 1000),
(13, 40, '2017-10-18', 2300),
(14, 31, '2017-10-19', 1000),
(15, 42, '2017-10-25', 1234),
(16, 45, '2017-10-25', 1234),
(17, 46, '2017-10-25', 12345),
(18, 47, '2017-10-26', 890),
(19, 58, '2017-10-26', 200),
(20, 61, '2017-11-06', 300),
(21, 62, '2017-11-06', 200),
(22, 63, '2017-11-07', 460),
(23, 65, '2017-11-07', 4500),
(24, 62, '2017-11-07', 1034),
(25, 68, '2017-11-07', 1234),
(27, 73, '2017-11-23', 500),
(28, 73, '2017-11-23', 500);

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
(20, '36', '2017-11-24', 100, 150);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_programacion`
--

CREATE TABLE `ct_programacion` (
  `pk_programacion` int(30) NOT NULL,
  `fk_cliente` varchar(30) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `piezasRequeridas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_programacion`
--

INSERT INTO `ct_programacion` (`pk_programacion`, `fk_cliente`, `fechaInicio`, `fechaFinal`, `piezasRequeridas`) VALUES
(34, '12', '2017-11-25', '2017-11-27', 500),
(36, '8', '2017-11-24', '2017-11-28', 700),
(37, '9', '2017-11-24', '2017-11-28', 1000),
(38, '11', '2017-11-28', '2017-11-30', 800),
(39, '9', '2017-11-29', '2017-11-30', 500);

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
(3, 'Cliente 3', 'Vendedor 3', '2017-11-28', '0000-00-00', '20', '20%', 300);

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
  `cliente_editar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`pk_usuario`, `nombreUsuario`, `apellidosUsuario`, `correoUsuario`, `departamentoUsuario`, `puestoUsuario`, `usrUsuario`, `contraUsuario`, `privilegiosUsuario`, `cobranza_ver`, `cobranza_editar`, `produccion_ver`, `produccion_editar`, `cliente_ver`, `cliente_editar`) VALUES
(4, 'Eduardo', 'Santos Ancira', 'esantos@prolog-mex.com', 'Sistemas', 'Gerente de Sistemas', 'Esantos', '1234', 'Administrador', '0', '0', '0', '0', '0', '0'),
(13, 'Azeneth', 'Pinales Avalos', 'ae_pinales@hotmail.com', 'Sistemas', 'Auxiliar de Sistemas', 'Estefania', '1234', 'Administrador', '0', '0', '0', '1', '0', '1'),
(18, 'cobranza', 'prueba', 'pruebacobranza@', 'cobran', 'cobranza', 'cobranza', '1234', 'Usuario', '1', '0', '0', '0', '0', '0'),
(20, 'clientes', 'prueba', 'pruebaclientes@', 'cleintes', 'clientes', 'clientes', 'clientes', 'Usuario', '0', '0', '0', '0', '1', '0'),
(21, 'produccion', 'prueba', 'pruebaproduccion@', 'produccion', 'produccion', 'produccion', 'produccion', 'Usuario', '0', '0', '1', '1', '0', '0');

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
  MODIFY `pk_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `ct_cobranza`
--
ALTER TABLE `ct_cobranza`
  MODIFY `pk_cobranza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT de la tabla `ct_pagos`
--
ALTER TABLE `ct_pagos`
  MODIFY `pk_pagos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `ct_produccion`
--
ALTER TABLE `ct_produccion`
  MODIFY `pk_produccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `ct_programacion`
--
ALTER TABLE `ct_programacion`
  MODIFY `pk_programacion` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `ct_ventas`
--
ALTER TABLE `ct_ventas`
  MODIFY `pk_ventas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `pk_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
