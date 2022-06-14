-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2022 at 07:58 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `id_admin` varchar(10) NOT NULL,
  `codigo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` varchar(10) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `prestamo` varchar(1) NOT NULL,
  `id_db` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calificacion`
--

CREATE TABLE `calificacion` (
  `calificacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `grupo` varchar(10) NOT NULL,
  `salon` varchar(10) NOT NULL,
  `id_alumno` varchar(10) NOT NULL,
  `id_materia` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mostrar_calificacion` varchar(1) NOT NULL,
  `id_calificacion` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `calificacion`
--

INSERT INTO `calificacion` (`calificacion`, `grupo`, `salon`, `id_alumno`, `id_materia`, `mostrar_calificacion`, `id_calificacion`) VALUES
('80', '2°', 'Aula 2', '1006', '102', '0', 14),
('100', '1°', 'Aula 1', '1006', '101', '0', 17),
('80', '1°', 'Aula 1', '1007', '101', '0', 19),
('100', '2°', 'Aula 2', '1007', '102', '0', 20);

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `nombre_evento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descripcion` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_docente` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`nombre_evento`, `descripcion`, `id_docente`, `fecha`, `hora`, `id_evento`) VALUES
('Presentación de piano', 'Presentación de nuestras habilidades aprendidas en este curso.', '1010', '2022-05-30', '00:00:00', 39),
('Presentación de piano', 'Vamos a presentar a los nuevos practicantes del instrumento de flauta en el auditorio de la escuela, ¡no faltes!', '1011', '2022-06-12', '00:00:00', 41);

-- --------------------------------------------------------

--
-- Table structure for table `instrumento`
--

CREATE TABLE `instrumento` (
  `id_instrumento` int(10) NOT NULL,
  `codigo_instrumento` varchar(10) NOT NULL,
  `id_docente` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_alumno` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nombre_instrumento` varchar(20) NOT NULL,
  `tipo_instrumento` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estatus_instrumento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `instrumento`
--

INSERT INTO `instrumento` (`id_instrumento`, `codigo_instrumento`, `id_docente`, `id_alumno`, `nombre_instrumento`, `tipo_instrumento`, `descripcion`, `estatus_instrumento`) VALUES
(36, '2001', NULL, NULL, 'Guitarra #1', 'Cuerda', 'Guitarra numero uno, de color negro.', 'activo'),
(41, '2002', NULL, NULL, 'Guitarra #2', 'Cuerda', 'Guitarra numero dos, de color negro.', 'activo'),
(42, '2003', NULL, NULL, 'Violín #1', 'Cuerda', 'Violín negro 4/4.', 'activo'),
(43, '2004', NULL, NULL, 'Flauta #1', 'Viento', 'Flauta número uno, de color blanco, leve golpe en la lengüeta. ', 'activo'),
(44, '2005', NULL, NULL, 'Bajo eléctrico #1', 'Electrico', 'Bajo eléctrico número uno, color negro, en buenas condiciones.', 'activo');

-- --------------------------------------------------------

--
-- Table structure for table `lista_evento`
--

CREATE TABLE `lista_evento` (
  `id_alumno` varchar(10) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maestro`
--

CREATE TABLE `maestro` (
  `id_materia` varchar(10) NOT NULL,
  `id_docente` varchar(10) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `evento_creado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `maestro`
--

INSERT INTO `maestro` (`id_materia`, `id_docente`, `codigo`, `evento_creado`) VALUES
('104', '1011', '1011', '1'),
('105', '1003', '1003', '0'),
('106', '1010', '1010', '1'),
('107', '1011', '1011', '1');

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `id_materia` varchar(10) NOT NULL,
  `id_docente` varchar(10) NOT NULL,
  `nombre_materia` varchar(30) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `aula` varchar(10) NOT NULL,
  `grupo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`id_materia`, `id_docente`, `nombre_materia`, `hora_inicio`, `hora_fin`, `aula`, `grupo`) VALUES
('104', '1011', 'Piano', '00:00:00', '00:00:00', 'Aula 6', '1'),
('105', '1003', 'Saxofón', '00:00:00', '00:00:00', 'Aula 1', '1'),
('106', '1010', 'Percusiones avanzadas', '00:00:00', '00:00:00', 'Aula 6', '1'),
('107', '1011', 'Piano avanzado', '00:00:00', '00:00:00', 'Aula 5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `codigo` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `genero` char(1) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `tipo_sangre` char(3) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `estatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`codigo`, `nombre`, `apellido`, `telefono`, `correo`, `genero`, `contrasena`, `tipo_sangre`, `cargo`, `estatus`) VALUES
('1000', 'André Joseph', 'López Cortez', '3231306573', 'correo@correo.com', 'M', 'andrelopez', 'O+', 'root', 'activo'),
('1001', 'Sergio Alejandro', 'Rodríguez Carrillo', '3781234567', 'correo@correo.com', 'F', 'sergiocarrillo', 'O+', 'root', 'activo'),
('1003', 'Carlos Javier', 'Cruz Franco', '3789876543', 'correoasass@correo.com', 'M', 'carlos', 'O-', 'maestro', 'activo'),
('1004', 'David Benjamín', 'Ruíz ', '3789456123', 'correodavid@correo.com', 'M', 'david', 'O+', 'admin', 'activo'),
('1006', 'Gerardo Josué', 'Franco Becerra ', '3789876543', 'correojosue@correo.com', 'M', 'josue', 'O-', 'alumno', 'activo'),
('1007', 'Edgar Alejandro', 'Martínez Esqueda ', '1234567890', 'correoedgar@correo.com', 'M', 'edgar', 'O+', 'alumno', 'activo'),
('1008', 'Jonatan', 'Ramírez Jímenez', '1234567890', 'correojona@correo.com', 'M', 'jona', 'A-', 'alumno', 'activo'),
('1009', 'Fernando', 'Cornejo Gutiérrez', '3789876543', 'correocornejo@correo.com', 'M', 'cornejo', 'A+', 'maestro', 'activo'),
('1010', 'Roberto ', 'Jiménez Plascencia ', '3781472583', 'correoroberto@correo.com', 'M', 'roberto', 'B-', 'maestro', 'activo'),
('1011', 'Miguel Ángel', 'Sanabria Valdez ', '3233692581', 'correosanabria@correo.com', 'M', 'miguel', 'O+', 'maestro', 'activo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `codigoAdmin` (`codigo`);

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_db`),
  ADD KEY `CodigoAlumno` (`codigo`);

--
-- Indexes for table `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD UNIQUE KEY `id_calificacion_3` (`id_calificacion`),
  ADD KEY `calificacion` (`calificacion`),
  ADD KEY `calificacion_2` (`calificacion`),
  ADD KEY `id_calificacion` (`id_calificacion`),
  ADD KEY `id_calificacion_2` (`id_calificacion`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `Docente` (`id_docente`);

--
-- Indexes for table `instrumento`
--
ALTER TABLE `instrumento`
  ADD PRIMARY KEY (`id_instrumento`);

--
-- Indexes for table `lista_evento`
--
ALTER TABLE `lista_evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `idAlumno` (`id_alumno`);

--
-- Indexes for table `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `Docente` (`id_docente`);

--
-- Indexes for table `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `idDocente` (`id_docente`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_db` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `instrumento`
--
ALTER TABLE `instrumento`
  MODIFY `id_instrumento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administradores`
--
ALTER TABLE `administradores`
  ADD CONSTRAINT `codigoAdmin` FOREIGN KEY (`codigo`) REFERENCES `persona` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `CodigoAlumno` FOREIGN KEY (`codigo`) REFERENCES `persona` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lista_evento`
--
ALTER TABLE `lista_evento`
  ADD CONSTRAINT `idAlumno` FOREIGN KEY (`id_alumno`) REFERENCES `persona` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `idEvento` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maestro`
--
ALTER TABLE `maestro`
  ADD CONSTRAINT `Docente` FOREIGN KEY (`id_docente`) REFERENCES `persona` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
