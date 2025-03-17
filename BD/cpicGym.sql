-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2025 a las 22:47:40
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
-- Base de datos: `cpicgym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `nombre`, `descripcion`) VALUES
(1, 'cultura fisica', 'habitos de salud'),
(2, 'Ambiental', 'Cuidado del medio ambiente'),
(3, 'Analisis', 'Analizar patrones y hacer seguimientos'),
(4, 'Ingles', 'estructuras y habla del idioma ingles'),
(5, 'etica y comunicacion', 'Comunicacion y valores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centroformacion`
--

CREATE TABLE `centroformacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `centroformacion`
--

INSERT INTO `centroformacion` (`id`, `nombre`) VALUES
(1, 'Industriales'),
(2, 'Automatizacion'),
(3, 'Cafetera'),
(4, 'Comercio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `controlprogreso`
--

CREATE TABLE `controlprogreso` (
  `id` int(10) UNSIGNED NOT NULL,
  `fechaRealizacion` date NOT NULL,
  `peso` decimal(10,0) DEFAULT NULL,
  `estatura` decimal(10,0) DEFAULT NULL,
  `cintura` decimal(10,0) DEFAULT NULL,
  `cadera` decimal(10,0) DEFAULT NULL,
  `musloDer` decimal(10,0) DEFAULT NULL,
  `musloIzq` decimal(10,0) DEFAULT NULL,
  `brazoDer` decimal(10,0) DEFAULT NULL,
  `brazoIzq` decimal(10,0) DEFAULT NULL,
  `antebrazoDer` decimal(10,0) DEFAULT NULL,
  `antebrazoIzq` decimal(10,0) DEFAULT NULL,
  `pantorrillaDer` decimal(10,0) DEFAULT NULL,
  `pantorrillaIzq` decimal(10,0) DEFAULT NULL,
  `examenMedico` varchar(255) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `fechaExamen` date DEFAULT NULL,
  `fkidUsuario` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(10) UNSIGNED NOT NULL,
  `ficha` varchar(15) NOT NULL,
  `cantApren` tinyint(3) UNSIGNED DEFAULT NULL,
  `estado` varchar(15) NOT NULL,
  `fechaInicioLect` date DEFAULT NULL,
  `fechaFinLect` date DEFAULT NULL,
  `fkidProgramaForm` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `ficha`, `cantApren`, `estado`, `fechaInicioLect`, `fechaFinLect`, `fkidProgramaForm`) VALUES
(1, '4567890', 12, 'Activo', '2025-03-05', '2025-03-17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaformacion`
--

CREATE TABLE `programaformacion` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(15) DEFAULT NULL,
  `nombre` varchar(30) NOT NULL,
  `fkidCentroFormacion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programaformacion`
--

INSERT INTO `programaformacion` (`id`, `codigo`, `nombre`, `fkidCentroFormacion`) VALUES
(1, '1790', 'Adso', 1),
(2, '1992', 'Biomedica', 2),
(3, '1874', 'Maquinaria', 1),
(4, '1898', 'confeccion', 4),
(5, '1234', 'Talento Humano', 3),
(8, '5555', 'sociales', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroingreso`
--

CREATE TABLE `registroingreso` (
  `id` int(10) UNSIGNED NOT NULL,
  `fechaIn` datetime NOT NULL,
  `fechaOut` datetime DEFAULT NULL,
  `fkidUserGym` int(10) UNSIGNED DEFAULT NULL,
  `fkidActividad` int(10) UNSIGNED DEFAULT NULL,
  `fkidTrainer` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(2, 'cliente'),
(3, 'entrenador'),
(4, 'almacen'),
(12, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuariogym`
--

CREATE TABLE `tipousuariogym` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipousuariogym`
--

INSERT INTO `tipousuariogym` (`id`, `nombre`) VALUES
(1, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipoDoc` char(2) NOT NULL,
  `documento` varchar(20) NOT NULL,
  `fechaNac` date DEFAULT NULL,
  `email` varchar(80) NOT NULL,
  `genero` char(1) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `eps` varchar(20) DEFAULT NULL,
  `tipoSangre` char(3) DEFAULT NULL,
  `peso` decimal(10,0) DEFAULT NULL,
  `estatura` decimal(10,0) DEFAULT NULL,
  `telefonoEmer` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `fkidRol` int(10) UNSIGNED NOT NULL,
  `fkidGrupo` int(10) UNSIGNED DEFAULT NULL,
  `fkidCentroForm` int(10) UNSIGNED DEFAULT NULL,
  `fkidTipoUserGym` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `tipoDoc`, `documento`, `fechaNac`, `email`, `genero`, `estado`, `telefono`, `eps`, `tipoSangre`, `peso`, `estatura`, `telefonoEmer`, `password`, `observaciones`, `fkidRol`, `fkidGrupo`, `fkidCentroForm`, `fkidTipoUserGym`) VALUES
(1, 'mateo', 'CC', '12345678', '2025-03-17', 'matemart6688@gmail.com', 'M', 'Activo', '3205149751', 'nueva eps', 'O+', 63, 170, '3205149751', '$2y$10$92rjRnHbpO1FxqTBLS4LuOtwBY8c3/tH9WB/yJry.uTPXsSpGVIIS', 'fgfdgfh', 12, 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `centroformacion`
--
ALTER TABLE `centroformacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `controlprogreso`
--
ALTER TABLE `controlprogreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_controlProgreso_usuario1` (`fkidUsuario`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_grupo_programaFormacion1` (`fkidProgramaForm`);

--
-- Indices de la tabla `programaformacion`
--
ALTER TABLE `programaformacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkidCentroFormacion` (`fkidCentroFormacion`);

--
-- Indices de la tabla `registroingreso`
--
ALTER TABLE `registroingreso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_registroIngreso_actividad1` (`fkidActividad`),
  ADD KEY `fk_registroIngreso_usuario1` (`fkidTrainer`),
  ADD KEY `fk_registroIngreso_usuario2` (`fkidUserGym`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipousuariogym`
--
ALTER TABLE `tipousuariogym`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_rol` (`fkidRol`),
  ADD KEY `fk_usuario_grupo1` (`fkidGrupo`),
  ADD KEY `fk_usuario_centroFormacion1` (`fkidCentroForm`),
  ADD KEY `fk_usuario_tipoUsuarioGym1` (`fkidTipoUserGym`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `centroformacion`
--
ALTER TABLE `centroformacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `controlprogreso`
--
ALTER TABLE `controlprogreso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `programaformacion`
--
ALTER TABLE `programaformacion`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `registroingreso`
--
ALTER TABLE `registroingreso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tipousuariogym`
--
ALTER TABLE `tipousuariogym`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `controlprogreso`
--
ALTER TABLE `controlprogreso`
  ADD CONSTRAINT `fk_controlProgreso_usuario1` FOREIGN KEY (`fkidUsuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_grupo_programaFormacion1` FOREIGN KEY (`fkidProgramaForm`) REFERENCES `programaformacion` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `programaformacion`
--
ALTER TABLE `programaformacion`
  ADD CONSTRAINT `fkidCentroFormacion` FOREIGN KEY (`fkidCentroFormacion`) REFERENCES `centroformacion` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registroingreso`
--
ALTER TABLE `registroingreso`
  ADD CONSTRAINT `fk_registroIngreso_actividad1` FOREIGN KEY (`fkidActividad`) REFERENCES `actividad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registroIngreso_usuario1` FOREIGN KEY (`fkidTrainer`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registroIngreso_usuario2` FOREIGN KEY (`fkidUserGym`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_centroFormacion1` FOREIGN KEY (`fkidCentroForm`) REFERENCES `centroformacion` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_grupo1` FOREIGN KEY (`fkidGrupo`) REFERENCES `grupo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`fkidRol`) REFERENCES `rol` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_usuario_tipoUsuarioGym1` FOREIGN KEY (`fkidTipoUserGym`) REFERENCES `tipousuariogym` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
