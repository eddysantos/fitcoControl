-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 02-05-2018 a las 16:13:53
-- Versión del servidor: 5.6.35
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `Fitco`
--

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
(2, '2018-04-23', '130000', 12, '15000'),
(4, '2018-04-26', '30000', 5, '5000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ct_nomina`
--
ALTER TABLE `ct_nomina`
  ADD PRIMARY KEY (`pk_nomina`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ct_nomina`
--
ALTER TABLE `ct_nomina`
  MODIFY `pk_nomina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
