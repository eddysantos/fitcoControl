-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 23-10-2017 a las 21:27:51
-- Versión del servidor: 5.6.35
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `Fitco`
--

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
(13, 'Azeneth', 'Pinales Avalos', 'ae_pin@hotmai', 'Sistemas', 'Auxiliar de Sistemas', 'Estefania', '1234', 'Administrador', '0', '0', '0', '0', '0', '0'),
(18, 'cobranza', 'prueba', 'pruebacobranza@', 'cobranza', 'cobranza', 'cobranza', 'cobranza', 'Usuario', '1', '1', '0', '0', '0', '0'),
(20, 'clientes', 'prueba', 'pruebaclientes@', 'cleintes', 'clientes', 'clientes', 'clientes', 'Usuario', '0', '0', '0', '0', '1', '1'),
(21, 'produccion', 'prueba', 'pruebaproduccion@', 'produccion', 'produccion', 'produccion', 'produccion', 'Usuario', '0', '0', '1', '1', '0', '0');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`pk_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `pk_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
