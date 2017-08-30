-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 30-08-2017 a las 16:49:54
-- Versión del servidor: 5.6.35
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `Fitco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Clientes`
--

CREATE TABLE `Clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `credito` int(11) NOT NULL,
  `f_ingreso` date NOT NULL,
  `color` varchar(20) NOT NULL,
  `prendas` int(11) NOT NULL,
  `nosotros` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Clientes`
--

INSERT INTO `Clientes` (`id`, `nombre`, `contacto`, `credito`, `f_ingreso`, `color`, `prendas`, `nosotros`) VALUES
(7, 'Liberty', 'Liberty@hotmail.com', 30, '2017-08-28', '#408000', 3000, 'Asesor de Ventas'),
(8, 'Carey', 'Carey@hotmail.com', 15, '2017-08-28', '#ffff00', 2000, 'Referido'),
(9, 'Privilegio', 'Privilegio@hotmail.com', 20, '2017-08-28', '#0080ff', 3456, 'Medios Publicitarios'),
(10, 'Bantu', 'Bantu@hotmail.com', 40, '2017-08-28', '#ff8000', 1400, 'Referido'),
(11, 'Dos Banderas', 'Dosbanderas@hotmail.com', 30, '2017-08-28', '#cccccc', 2800, 'Asesor de Ventas'),
(12, 'Red', 'Red@hotmail.com', 30, '2017-08-15', '#ff0000', 1500, 'Referido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cobranza`
--

CREATE TABLE `Cobranza` (
  `id` int(11) NOT NULL,
  `cliente` varchar(150) NOT NULL,
  `factura` varchar(10) NOT NULL,
  `importe` decimal(30,2) NOT NULL,
  `dia_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Cobranza`
--

INSERT INTO `Cobranza` (`id`, `cliente`, `factura`, `importe`, `dia_vencimiento`) VALUES
(1, 'Liberty', 'A0001', '1500.00', '2017-08-27'),
(2, 'Privilegio ', 'A0002', '3500.00', '2017-08-23'),
(3, 'Dos Banderas ', 'A0000', '34000.00', '2017-07-26'),
(4, 'Red ', 'A0005', '23450.00', '2017-08-29');

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
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contra` varchar(50) NOT NULL,
  `privilegios` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `correo`, `departamento`, `puesto`, `usuario`, `contra`, `privilegios`) VALUES
(2, 'Eduardo', 'Santos', 'esantos@prolog-mex-com', 'Sistemas', 'Gerente Sistemas', 'Esantos', '1234', 'Administrador'),
(3, 'Azeneth Estefania', 'Pinales Avalos', 'ae_pinales@hotmail.com', 'Sistemas', 'Auxiliar de Sistemas', 'Estefania', '1234', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Cobranza`
--
ALTER TABLE `Cobranza`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `meses`
--
ALTER TABLE `meses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Clientes`
--
ALTER TABLE `Clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `Cobranza`
--
ALTER TABLE `Cobranza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `meses`
--
ALTER TABLE `meses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
