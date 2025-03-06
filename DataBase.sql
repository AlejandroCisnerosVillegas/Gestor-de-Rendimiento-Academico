-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-03-2025 a las 01:54:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `general`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_03_admin_login`
--

CREATE TABLE `project_03_admin_login` (
  `userid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `project_03_admin_login`
--

INSERT INTO `project_03_admin_login` (`userid`, `password`) VALUES
('admin@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_03_class`
--

CREATE TABLE `project_03_class` (
  `name` varchar(30) NOT NULL,
  `id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_03_class`
--

INSERT INTO `project_03_class` (`name`, `id`) VALUES
('Sistemas Operativos', 4345),
('Bases de Datos', 4346),
('Redes de Computadoras', 4347),
('Electrónica Digital', 4348),
('Introducción a la Inteligencia', 4349),
('Programación Estructurada', 4350),
('Estructuras de Datos y Algorit', 4351),
('Introducción a la Ingeniería d', 4352);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_03_result`
--

CREATE TABLE `project_03_result` (
  `name` varchar(30) NOT NULL,
  `rno` int(3) NOT NULL,
  `class` varchar(30) NOT NULL,
  `p1` int(3) NOT NULL,
  `p2` int(3) NOT NULL,
  `p3` int(3) NOT NULL,
  `p4` int(3) NOT NULL,
  `p5` int(3) NOT NULL,
  `marks` int(3) NOT NULL,
  `percentage` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_03_result`
--

INSERT INTO `project_03_result` (`name`, `rno`, `class`, `p1`, `p2`, `p3`, `p4`, `p5`, `marks`, `percentage`) VALUES
('Maria Garcia', 202101, 'Bases de Datos', 88, 70, 90, 78, 88, 414, 82.8),
('Juan Martinez', 202102, 'Electrónica Digital', 79, 88, 74, 90, 82, 413, 82.6),
('Laura Rodriguez', 202103, 'Estructuras de Datos y Algorit', 83, 75, 87, 69, 91, 405, 81),
('Carlos Lopez', 202104, 'Introducción a la Ingeniería d', 92, 67, 79, 86, 74, 398, 79.6),
('Ana Hernandez', 202105, 'Introducción a la Inteligencia', 88, 73, 81, 95, 68, 405, 81),
('David Perez', 202106, 'Programación Estructurada', 85, 72, 90, 68, 78, 393, 78.6),
('Andrea Gonzalez', 202107, 'Programación Estructurada', 78, 76, 84, 93, 72, 403, 80.6),
('Daniel Sanchez', 202108, 'Sistemas Operativos', 90, 90, 90, 90, 90, 450, 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_03_students`
--

CREATE TABLE `project_03_students` (
  `name` varchar(30) NOT NULL,
  `rno` int(3) NOT NULL,
  `class_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `project_03_students`
--

INSERT INTO `project_03_students` (`name`, `rno`, `class_name`) VALUES
('Maria Garcia', 202101, 'Bases de Datos'),
('Juan Martinez', 202102, 'Electrónica Digital'),
('Laura Rodriguez', 202103, 'Estructuras de Datos y Algorit'),
('Carlos Lopez', 202104, 'Introducción a la Ingeniería d'),
('Ana Hernandez', 202105, 'Introducción a la Inteligencia'),
('Andrea Gonzalez', 202107, 'Programación Estructurada'),
('David Perez', 202106, 'Programación Estructurada'),
('Daniel Sanchez', 202108, 'Sistemas Operativos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `project_03_admin_login`
--
ALTER TABLE `project_03_admin_login`
  ADD PRIMARY KEY (`userid`);

--
-- Indices de la tabla `project_03_class`
--
ALTER TABLE `project_03_class`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `project_03_result`
--
ALTER TABLE `project_03_result`
  ADD KEY `class` (`class`),
  ADD KEY `name` (`name`,`rno`);

--
-- Indices de la tabla `project_03_students`
--
ALTER TABLE `project_03_students`
  ADD PRIMARY KEY (`name`,`rno`),
  ADD KEY `class_name` (`class_name`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `project_03_result`
--
ALTER TABLE `project_03_result`
  ADD CONSTRAINT `project_03_result_ibfk_1` FOREIGN KEY (`class`) REFERENCES `project_03_class` (`name`),
  ADD CONSTRAINT `project_03_result_ibfk_2` FOREIGN KEY (`name`,`rno`) REFERENCES `project_03_students` (`name`, `rno`);

--
-- Filtros para la tabla `project_03_students`
--
ALTER TABLE `project_03_students`
  ADD CONSTRAINT `project_03_students_ibfk_1` FOREIGN KEY (`class_name`) REFERENCES `project_03_class` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
