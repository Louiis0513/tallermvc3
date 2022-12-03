-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2022 a las 17:34:17
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_taller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla1`
--

CREATE TABLE `tabla1` (
  `ID_TABLA1` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Clase` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `Salon` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tabla1`
--

INSERT INTO `tabla1` (`ID_TABLA1`, `descripcion`, `Clase`, `Salon`) VALUES
(34, 'Funciona', 'Terminando', '1458'),
(36, 'ClaseMedi', 'Modal', 'B5'),
(37, 'zxczxczx', 'sadasdas', '4'),
(38, 'nuevo', 'asdasd', '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla2`
--

CREATE TABLE `tabla2` (
  `ID` int(11) NOT NULL,
  `ID_TABLA1` int(11) NOT NULL,
  `Nombre` varchar(225) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Estado_Civil` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `cc` int(11) NOT NULL,
  `Peso` float NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tabla2`
--

INSERT INTO `tabla2` (`ID`, `ID_TABLA1`, `Nombre`, `Estado_Civil`, `fecha_registro`, `Fecha_Nacimiento`, `cc`, `Peso`, `Email`) VALUES
(23, 34, 'Isabella', 'Casada', '2022-11-11 14:02:59', '2022-11-14', 1192919, 87.3, 'alan44@.org'),
(24, 34, 'sadsad', 'Soltero', '2022-11-27 19:54:29', '2012-12-05', 1192365872, 85, 'Mañocorreo'),
(25, 34, 'Valeri', 'Divorsiada', '2022-11-30 21:32:54', '2009-02-12', 11929194, 85, 'Netflixcolombia0910.07@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tabla1`
--
ALTER TABLE `tabla1`
  ADD PRIMARY KEY (`ID_TABLA1`);

--
-- Indices de la tabla `tabla2`
--
ALTER TABLE `tabla2`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KF_ID` (`ID_TABLA1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tabla1`
--
ALTER TABLE `tabla1`
  MODIFY `ID_TABLA1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `tabla2`
--
ALTER TABLE `tabla2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tabla2`
--
ALTER TABLE `tabla2`
  ADD CONSTRAINT `tabla2_ibfk_1` FOREIGN KEY (`ID_TABLA1`) REFERENCES `tabla1` (`ID_TABLA1`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
