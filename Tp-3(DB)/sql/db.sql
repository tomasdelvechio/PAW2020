-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2020 a las 00:20:52
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_turno` int(5) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `edad` int(2) NOT NULL,
  `talla` int(2) NOT NULL,
  `altura` int(3) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `color_pelo` varchar(15) NOT NULL,
  `fecha_turno` date NOT NULL,
  `hora_turno` time NOT NULL,
  `diagnostico` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_turno`, `nombre`, `email`, `telefono`, `edad`, `talla`, `altura`, `fecha_nacimiento`, `color_pelo`, `fecha_turno`, `hora_turno`, `diagnostico`) VALUES
(1, 'Nicolas', 'nicolassciarrotta@gmail.com', '2346541804', 24, 45, 182, '1995-07-24', 'morocho', '2020-05-04', '12:00:00', ''),
(2, 'Nicolas', 'nicolassciarrotta@gmail.com', '2346541804', 24, 45, 182, '1995-07-24', 'morocho', '2020-05-04', '12:00:00', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_turno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_turno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
