-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2022 at 05:39 PM
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

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `codigo`, `prestamo`, `id_db`) VALUES
('1020', '1020', '0', 9),
('1021', '1021', '0', 10),
('1022', '1022', '0', 11),
('1023', '1023', '0', 12),
('1024', '1024', '0', 13);

-- --------------------------------------------------------

--
-- Table structure for table `calificacion`
--

CREATE TABLE `calificacion` (
  `calificacion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_docente` varchar(10) NOT NULL,
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

INSERT INTO `calificacion` (`calificacion`, `id_docente`, `grupo`, `salon`, `id_alumno`, `id_materia`, `mostrar_calificacion`, `id_calificacion`) VALUES
('100', ' 1011', '1', 'Aula 1', '1020', '101', '1', 28);

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `nombre_evento` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descripcion` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_docente` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(5) NOT NULL,
  `id_evento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`nombre_evento`, `descripcion`, `id_docente`, `fecha`, `hora`, `id_evento`) VALUES
('Concierto guitarra', 'Concierto para todos los estudiantes/practicantes de guitarra.', '1011', '2022-08-07', '20:00', 47);

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
(45, '2001', NULL, NULL, 'Guitarra #1', 'Cuerda', 'Guitarra de color negro, leve golpe en la parte de abajo', 'activo'),
(46, '2002', NULL, NULL, 'Flauta #1', 'Viento', 'Flauta de color blanco, en perfectas condiciones de uso.', 'activo');

-- --------------------------------------------------------

--
-- Table structure for table `lista_evento`
--

CREATE TABLE `lista_evento` (
  `id_alumno` varchar(10) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `id_docente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maestro`
--

CREATE TABLE `maestro` (
  `id_docente_db` int(11) NOT NULL,
  `id_docente` varchar(10) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `evento_creado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `maestro`
--

INSERT INTO `maestro` (`id_docente_db`, `id_docente`, `codigo`, `evento_creado`) VALUES
(6, '1011', '1011', '0'),
(7, '1013', '1013', '0'),
(8, '1014', '1014', '0'),
(9, '1015', '1015', '0');

-- --------------------------------------------------------

--
-- Table structure for table `materia`
--

CREATE TABLE `materia` (
  `id_materia` varchar(10) NOT NULL,
  `id_docente` varchar(10) NOT NULL,
  `nombre_materia` varchar(30) NOT NULL,
  `hora_inicio` varchar(5) NOT NULL,
  `hora_fin` varchar(5) NOT NULL,
  `aula` varchar(10) NOT NULL,
  `grupo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `materia`
--

INSERT INTO `materia` (`id_materia`, `id_docente`, `nombre_materia`, `hora_inicio`, `hora_fin`, `aula`, `grupo`) VALUES
('101', '1011', 'Guitarra ', '12:00', '14:00', 'Aula 1', '1');

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
  `contrasena` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
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
('1004', 'David Benjamín ', 'Ruíz Avalos', '3692581470', 'correodavid@correo.com', 'M', 'fc56228704a4e815c5cd9829bf2e7414390169119931300ac90447ddc0999483', 'O+', 'admin', 'activo'),
('1005', 'André Joseph ', 'López Cortez', '3231306573', 'andrejlc777@gmail.com', 'M', 'bfb9e1090c9f2d38adf5fbdc0aabcd27f1180b9a03172c7c85763c8afd4d229e', 'O+', 'admin', 'activo'),
('1011', 'Carlos Javier', 'Cruz Franco', '1472583690', 'correocarlos@correo.com', 'M', '54e81770fa74dd37dc5d633a5fdabc57d6728e2f1ee8142566b4f3ccf71f998a', 'O+', 'maestro', 'activo'),
('1013', 'Fernando', 'Cornejo Gutiérrez', '7894561230', 'correocornejo@correo.com', 'M', '6e112ac295d5c1b4899826eff00ae2645f7bc9b9d010b6243371a0ec9562e2bc', 'A+', 'maestro', 'activo'),
('1014', 'Roberto', 'Jiménez Plascencia', '1234557989', 'correoroberto@correo.com', 'M', '852cedcff75350060f965435efc0a747bf3e1ff6aadd6596ffc4ff61100f1a06', 'AB+', 'maestro', 'activo'),
('1015', 'Miguel Ángel ', 'Sanabria Valdez', '7894561230', 'correomiguel@correo.com', 'M', '519805e01e2671f03498e7b08ca07cd2ac858696f6b05439f567ea35bc48e0e1', 'A+', 'maestro', 'activo'),
('1020', 'Gerardo Josué', 'Franco Becerra ', '3781234567', 'correojosue@correo.com', 'M', 'd416f45b942e2de2cb7606bf256c3c5c453ea9ee67fcd5868155a68df3c358e0', 'O+', 'alumno', 'activo'),
('1021', 'Edgar Alejandro', 'Martínez Esqueda', '3781593577', 'correoedgar@correo.com', 'M', '6a4cd025cc4c6984804b4519740df288826defa629ccea0c9a76dcc5174e61aa', 'A+', 'alumno', 'activo'),
('1022', 'Jonatan', 'Ramírez Jiménez', '3789876543', 'correojonatan@correo.com', 'M', '12e6b565701365c4beb76d3d5bebea523baa801c81d5a4b30729611ad39187c7', 'O+', 'alumno', 'activo'),
('1023', 'Fernando', 'Barajas Gómez', '3781593577', 'correofernando@correo.com', 'M', '6e112ac295d5c1b4899826eff00ae2645f7bc9b9d010b6243371a0ec9562e2bc', 'O+', 'alumno', 'activo'),
('1024', 'Marco', 'Servín De La Torre', '3781234567', 'correomarco@correo.com', 'M', '589c105235602f2b995e3051b97a23c2fbc42529fb24b156f8acd7b9951094f9', 'B+', 'alumno', 'activo');

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
  ADD KEY `id_calificacion_2` (`id_calificacion`),
  ADD KEY `idCalificacion` (`id_materia`);

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
  ADD KEY `idAlumno` (`id_alumno`),
  ADD KEY `idEvento` (`id_evento`);

--
-- Indexes for table `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`id_docente_db`),
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
  MODIFY `id_db` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `id_calificacion` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `instrumento`
--
ALTER TABLE `instrumento`
  MODIFY `id_instrumento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `maestro`
--
ALTER TABLE `maestro`
  MODIFY `id_docente_db` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- Constraints for table `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `idCalificacion` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE;

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
