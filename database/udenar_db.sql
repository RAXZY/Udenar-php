-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2026 a las 03:33:33
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
-- Base de datos: `udenar_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `degree_program`
--

CREATE TABLE `degree_program` (
  `degree_id` varchar(5) NOT NULL,
  `degree_name` varchar(30) NOT NULL,
  `faculty` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `degree_program`
--

INSERT INTO `degree_program` (`degree_id`, `degree_name`, `faculty`) VALUES
('CIV01', 'Ingeniería Civil', 'Ingeniería'),
('DER01', 'Derecho', 'Derecho'),
('SIS01', 'Ingeniería De Sistemas', 'Ingeniería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `student`
--

CREATE TABLE `student` (
  `code` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `degree_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `student`
--

INSERT INTO `student` (`code`, `first_name`, `last_name`, `email`, `degree_id`) VALUES
('0001', 'Tilín', 'Ochoa', 'ochalin@gmail.com', 'SIS01'),
('0002', 'Francisco', 'Sierra', 'lasierra@kahoot.com', 'DER01'),
('0004', 'Luisa', 'Granadina', 'lunada@udenar.edu.co', 'CIV01'),
('0010', 'Antonio', 'Rodriguez', 'rodronio@gmail.com', 'CIV01'),
('0057', 'Olmedo', 'Vera', 'Olmera@outlook.com', 'SIS01'),
('0068', 'Gabriel', 'Mejia', 'mejibiel@gmail.com', 'DER01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `degree_program`
--
ALTER TABLE `degree_program`
  ADD PRIMARY KEY (`degree_id`);

--
-- Indices de la tabla `student`
--
ALTER TABLE `student`
  ADD KEY `degree_id` (`degree_id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`degree_id`) REFERENCES `degree_program` (`degree_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
