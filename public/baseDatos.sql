-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3386
-- Tiempo de generación: 15-08-2024 a las 10:21:12
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `conferenciasealvarado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistentes`
--

CREATE TABLE `asistentes` (
  `id_asistente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Personas asistentes a la conferencia';

--
-- Volcado de datos para la tabla `asistentes`
--

INSERT INTO `asistentes` (`id_asistente`, `nombre`, `apellido`, `email`, `telefono`) VALUES
(1, 'Julio', 'Andrade', 'jandrade@uniandes.edu.ec', ' 0981245327'),
(2, 'Carlos', 'Cuesta', 'ccuesta@uniandes.edu.ec', ' 0981234567'),
(4, 'Eduardo', 'Alvarado', 'ealvarado@uniandes.edu.ec', ' 0987654321'),
(5, 'Maria', 'Perez', 'mperez@uniandes.edu.ec', ' 0987654321'),
(6, 'Juana', 'Arcos', 'jarcos@uniandes.edu.ec', ' 0987654321');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `charlas`
--

CREATE TABLE `charlas` (
  `id_charla` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `duracion` int(11) NOT NULL COMMENT 'en minutos',
  `id_conferencia` int(11) NOT NULL,
  `id_tema` int(11) NOT NULL,
  `id_expositor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Informacion de la charla a exponerse';

--
-- Volcado de datos para la tabla `charlas`
--

INSERT INTO `charlas` (`id_charla`, `fecha`, `hora_inicio`, `duracion`, `id_conferencia`, `id_tema`, `id_expositor`) VALUES
(2, '2023-09-19', '11:30:35', 120, 1, 1, 1),
(4, '2025-09-19', '21:30:30', 130, 1, 1, 1),
(5, '2024-08-18', '20:00:00', 30, 2, 3, 2),
(8, '2023-01-14', '07:33:52', 67, 2, 3, 5),
(9, '2024-08-25', '21:00:00', 45, 2, 6, 5),
(10, '2024-08-25', '21:00:00', 45, 2, 6, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conferencias`
--

CREATE TABLE `conferencias` (
  `id_conferencia` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `ubicacion` varchar(100) NOT NULL COMMENT 'local donde se realiza',
  `descripcion` varchar(300) NOT NULL,
  `organizador` varchar(200) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `estado` int(11) NOT NULL COMMENT '0 programado, 1 activo, 2 finalizado, 3 cancelado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Conferencias registradas';

--
-- Volcado de datos para la tabla `conferencias`
--

INSERT INTO `conferencias` (`id_conferencia`, `nombre`, `fecha_inicio`, `ubicacion`, `descripcion`, `organizador`, `costo`, `estado`) VALUES
(1, 'Salud Mental', '2024-08-18', 'Sala de Conferencias de la Universidad de los Andes Sede Ambato', 'Ciclo de Conferencias Internacionales sobre  Salud Mental ', 'Escuela de Medicina de UNIANDES', 20.00, 0),
(2, 'Promocion y Empleo', '2017-10-08', 'Auditorio FIEC', 'Recomendaciones para elaborar una hoja de vida eficaz', 'Escuela de Medicina de UNIANDES', 20.00, 0),
(3, 'Ciclo de Conferencias Virtuales Internacionales', '2024-09-21', 'Auditorio de la Facultad de Ingeniería en Electricidad y Computación', 'Adentrate en la vanguardia educativa con nuestro Ciclo de Conferencias Virtuales Internacionales', 'Comision de MicroCredenciales', 53.84, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expositores`
--

CREATE TABLE `expositores` (
  `id_expositor` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `titulo` varchar(10) NOT NULL COMMENT 'Ing, Dr, Mgs, Phd',
  `cargo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Expositores de los temas de la conferencia';

--
-- Volcado de datos para la tabla `expositores`
--

INSERT INTO `expositores` (`id_expositor`, `nombre`, `titulo`, `cargo`) VALUES
(1, 'Wilma Cordero', 'Lcda.', 'Lider de Crecimiento.'),
(2, 'Jaime Delgadillo', 'Msc.', 'Investigador del Centro de Ayuda pSicosocial.'),
(3, 'Michael Barkhan', 'Msc.', 'Director del Centro de Investigacion de Servicios psicologicos'),
(5, 'Lena Verdeli', 'Dra.', 'Profesora asociada en Psicologia Clinica de la Universidad de Columbia.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id_registro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` int(11) NOT NULL COMMENT '0 registrado, 1 confirmado, 2 asistiodo, 3 cancelado',
  `id_asistente` int(11) NOT NULL,
  `id_conferencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Registros a la conferencia';

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id_registro`, `fecha`, `estado`, `id_asistente`, `id_conferencia`) VALUES
(2, '2024-08-14', 1, 5, 1),
(3, '2024-08-15', 1, 4, 1),
(5, '2024-08-14', 0, 4, 1),
(6, '2024-08-14', 0, 5, 1),
(7, '2024-08-14', 0, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id_tema` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL COMMENT 'Tema de la charla'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Temas a ser tratados en las conferencias';

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id_tema`, `descripcion`) VALUES
(1, 'Nuevas tendencias y desafios en la salud mental global'),
(3, 'Formas de Vestirse para una entrevista de trabajo'),
(4, 'Credenciales Alternativas en Educacion Continua'),
(5, 'Como ampliar la oferta academica de manera pertinente y con calidad'),
(6, 'Recomendaciones para elaborar una hoja de vida eficaz');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  ADD PRIMARY KEY (`id_asistente`);

--
-- Indices de la tabla `charlas`
--
ALTER TABLE `charlas`
  ADD PRIMARY KEY (`id_charla`),
  ADD KEY `id_temaIndex` (`id_tema`),
  ADD KEY `id_conferenciaIndex` (`id_conferencia`) USING BTREE,
  ADD KEY `id_expositorIndex` (`id_expositor`);

--
-- Indices de la tabla `conferencias`
--
ALTER TABLE `conferencias`
  ADD PRIMARY KEY (`id_conferencia`);

--
-- Indices de la tabla `expositores`
--
ALTER TABLE `expositores`
  ADD PRIMARY KEY (`id_expositor`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `id_asistenteIndex` (`id_asistente`),
  ADD KEY `id_conferenciaIndex` (`id_conferencia`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id_tema`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  MODIFY `id_asistente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `charlas`
--
ALTER TABLE `charlas`
  MODIFY `id_charla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `conferencias`
--
ALTER TABLE `conferencias`
  MODIFY `id_conferencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `expositores`
--
ALTER TABLE `expositores`
  MODIFY `id_expositor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `charlas`
--
ALTER TABLE `charlas`
  ADD CONSTRAINT `charla_ibfk_1` FOREIGN KEY (`id_tema`) REFERENCES `temas` (`id_tema`),
  ADD CONSTRAINT `charla_ibfk_2` FOREIGN KEY (`id_expositor`) REFERENCES `expositores` (`id_expositor`),
  ADD CONSTRAINT `charla_ibfk_3` FOREIGN KEY (`id_conferencia`) REFERENCES `conferencias` (`id_conferencia`);

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`id_asistente`) REFERENCES `asistentes` (`id_asistente`),
  ADD CONSTRAINT `registros_ibfk_2` FOREIGN KEY (`id_conferencia`) REFERENCES `conferencias` (`id_conferencia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
