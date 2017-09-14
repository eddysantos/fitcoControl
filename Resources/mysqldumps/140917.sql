-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 14-09-2017 a las 17:32:18
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
  `nosotrosCliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_cliente`
--

INSERT INTO `ct_cliente` (`pk_cliente`, `nombreCliente`, `correoCliente`, `telefonoCliente`, `creditoCliente`, `fingresoCliente`, `colorCliente`, `prendasCliente`, `nosotrosCliente`) VALUES
(7, 'Liberty', 'Liberty@hotmail.com', '867-7134646', 30, '2017-08-28', '#408000', 3000, 'Asesor de Ventas'),
(8, 'Carey', 'Carey@gmail.com', '867-7134', 12, '2017-08-28', '#ffff00', 2000, 'Referido'),
(9, 'Privilegio', 'Privilegio@hotmail.com', '867-7134646', 20, '2017-08-28', '#0080ff', 3456, 'Medios Publicitarios'),
(10, 'Bantu', 'Bantu@hotmail.com', '867713464', 10, '2017-08-28', '#ff8000', 1400, 'Asesor de Ventas'),
(11, 'Dos Banderas', 'Dosbanderas@hotmail.com', '867-7134646', 30, '2017-08-28', '#666666', 2800, 'Asesor de Ventas'),
(12, 'Red', 'Red@hotmail.com', '867-7134646', 30, '2017-08-15', '#ff0000', 1500, 'Referido');

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
(30, '', 'A666', '6666.00', '2017-09-06', '9 '),
(31, '', 'A777', '7777.00', '2017-09-22', '10 '),
(32, '', 'A888', '8888.00', '2017-09-12', '7 '),
(36, '', 'A1010', '1010.00', '2017-09-06', '10 '),
(37, '', 'A333', '33333.00', '2017-09-08', '8 '),
(38, '', 'A111', '1111.00', '2017-09-01', '12 '),
(39, '', 'A222', '2222.00', '2017-09-02', '11 '),
(40, '', 'A1212', '3500.00', '2017-09-06', '10 ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ct_produccion`
--

CREATE TABLE `ct_produccion` (
  `pk_produccion` int(11) NOT NULL,
  `fk_programacion` varchar(50) NOT NULL,
  `fechaIntroduccion` date NOT NULL,
  `cantidadProduccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_produccion`
--

INSERT INTO `ct_produccion` (`pk_produccion`, `fk_programacion`, `fechaIntroduccion`, `cantidadProduccion`) VALUES
(1, '1', '2017-09-08', 123),
(2, '1', '2017-09-11', 80),
(3, '2', '2017-09-12', 100),
(4, '2', '2017-09-14', 399),
(5, '19', '2017-09-15', 40),
(6, '19', '2017-09-08', 300),
(7, '10', '2017-09-13', 80),
(8, '19', '2017-09-08', 30),
(9, '4', '2017-09-08', 850),
(10, '3', '2017-09-11', 369),
(11, '13', '2017-09-12', 980),
(12, '7', '2017-09-12', 1000),
(13, '20', '2017-09-12', 300),
(14, '6', '2017-09-12', 1000),
(15, '14', '2017-09-12', 100);

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
  `metaDiaria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ct_programacion`
--

INSERT INTO `ct_programacion` (`pk_programacion`, `fk_cliente`, `fechaInicio`, `fechaFinal`, `piezasRequeridas`, `metaDiaria`) VALUES
(1, '7', '2017-09-11', '2017-09-30', 2000, '43'),
(2, '11', '2017-09-13', '2017-09-27', 3000, '400'),
(3, '7', '2017-09-19', '2017-09-26', 500, '12'),
(4, '7', '2017-09-12', '2017-09-16', 850, '12'),
(6, '9', '2017-09-04', '2017-09-10', 1400, '35'),
(7, '12', '2017-09-30', '2017-10-31', 1000, '38'),
(14, '9', '2017-09-07', '2017-09-22', 1100, '50'),
(19, '10 ', '2017-09-07', '2017-09-14', 1400, '30'),
(20, '8', '2017-09-08', '2017-09-15', 300, '40');

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
  `privilegiosUsuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`pk_usuario`, `nombreUsuario`, `apellidosUsuario`, `correoUsuario`, `departamentoUsuario`, `puestoUsuario`, `usrUsuario`, `contraUsuario`, `privilegiosUsuario`) VALUES
(4, 'Eduardo', 'Santos Ancira', 'esantos@prolog-mex.com', 'Sistemas', 'Gerente de Sistemas', 'Esantos', '1234', 'Administrador'),
(13, 'Azeneth Estefania', 'Pinales Avalos', 'ae_pin@hotmail.com', 'Sistemas', 'Auxiliar de Sistemas', 'Estefania', '1234', 'Administrador');

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
  MODIFY `pk_cobranza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `ct_produccion`
--
ALTER TABLE `ct_produccion`
  MODIFY `pk_produccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `ct_programacion`
--
ALTER TABLE `ct_programacion`
  MODIFY `pk_programacion` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `pk_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
