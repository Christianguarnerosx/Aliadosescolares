-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3310
-- Tiempo de generación: 05-04-2024 a las 20:55:19
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
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `responsable` varchar(50) DEFAULT NULL,
  `nombre_actividad` varchar(30) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_grado` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `id_padre` int(11) DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `id_usuario`, `id_grado`, `id_grupo`, `id_padre`, `id_docente`) VALUES
(1, 12, 1, 1, 1, 1),
(2, 13, 1, 1, 2, 1),
(3, 14, 1, 1, 1, 1),
(4, 15, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificacion` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_grado` int(11) NOT NULL,
  `id_periodo` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `calificacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificacion`, `id_alumno`, `id_grado`, `id_periodo`, `id_materia`, `calificacion`) VALUES
(13, 1, 1, 1, 1, 7.5),
(14, 1, 1, 2, 1, 8.5),
(15, 1, 1, 3, 1, 8),
(16, 1, 1, 4, 1, 9),
(17, 1, 1, 5, 1, 9.5),
(18, 1, 1, 6, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consejos`
--

CREATE TABLE `consejos` (
  `id_consejo` int(11) NOT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_docente` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_grado` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `id_usuario`, `id_grado`, `id_grupo`) VALUES
(1, 2, 1, 1),
(2, 3, 2, 1),
(3, 4, 3, 3),
(5, 6, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL,
  `nombre_grado` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `nombre_grado`) VALUES
(1, 'Primero'),
(2, 'Segundo'),
(3, 'Tercero'),
(4, 'Cuarto'),
(5, 'Quinto'),
(6, 'Sexto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `nombre_grupo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nombre_grupo`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`) VALUES
(1, 'Matematicas'),
(2, 'Español'),
(3, 'Ciencias'),
(4, 'Fisica'),
(5, 'Humanidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE `padres` (
  `id_padre` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_grado` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `padres`
--

INSERT INTO `padres` (`id_padre`, `id_usuario`, `id_grado`, `id_grupo`) VALUES
(1, 9, 3, 2),
(2, 10, 3, 3),
(3, 11, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `id_periodo` int(11) NOT NULL,
  `nombre_periodo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`id_periodo`, `nombre_periodo`) VALUES
(1, 'primero'),
(2, 'segundo'),
(3, 'tercero'),
(4, 'cuarto'),
(5, 'quinto'),
(6, 'sexto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peticiones`
--

CREATE TABLE `peticiones` (
  `id_peticion` int(11) NOT NULL,
  `id_tipo_ia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `consulta` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peticiones`
--

INSERT INTO `peticiones` (`id_peticion`, `id_tipo_ia`, `id_usuario`, `consulta`, `fecha`) VALUES
(2, 1, 12, 'Que tal viejo', '2024-04-04 20:28:52'),
(3, 1, 12, 'Que pasa hermano', '2024-04-04 20:40:29'),
(4, 1, 12, 'Que ondaaa', '2024-04-04 20:40:54'),
(5, 2, 12, 'Que pasa mai', '2024-04-04 20:41:19'),
(6, 2, 12, 'Que hubole', '2024-04-04 20:41:46'),
(7, 2, 12, 'Nunca se olvida de lo real', '2024-04-04 20:42:02'),
(8, 4, 12, 'La favorita de dios fui shooo', '2024-04-04 20:42:29'),
(9, 3, 12, 'Por que personas como ella ya no quedan', '2024-04-04 20:42:58'),
(10, 3, 12, 'Nunca se olvida de lo real', '2024-04-04 20:43:20'),
(11, 4, 12, 'Todos quieren plata otros quiren fama', '2024-04-04 20:44:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id_proyecto` int(11) NOT NULL,
  `id_docente` int(11) DEFAULT NULL,
  `nombre_proyecto` varchar(30) DEFAULT NULL,
  `descripcion_proyecto` text DEFAULT NULL,
  `ejemplo` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id_reporte` int(11) NOT NULL,
  `id_tipo_reporte` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_usuario_reportado` int(11) DEFAULT NULL,
  `fecha_reporte` datetime DEFAULT NULL,
  `id_sensacion` int(11) NOT NULL,
  `texto_reporte` text DEFAULT NULL,
  `audio_reporte` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id_reporte`, `id_tipo_reporte`, `id_usuario`, `id_usuario_reportado`, `fecha_reporte`, `id_sensacion`, `texto_reporte`, `audio_reporte`) VALUES
(3, 1, 1, 13, '2024-03-18 00:00:00', 4, NULL, NULL),
(107, 1, 12, 9, '2024-03-31 17:47:55', 3, NULL, NULL),
(108, 1, 12, 15, '2024-03-31 18:11:27', 3, NULL, NULL),
(109, 1, 12, 13, '2024-04-05 15:05:41', 4, NULL, NULL),
(110, 2, 12, 15, '2024-04-05 15:06:01', 2, 'Le pego a un niño en silla de ruedas', NULL),
(111, 3, 12, 13, '2024-04-05 15:06:46', 2, NULL, '../../Cliente/sonidos/reportes/Reporte_de_12_el_2024-04-05 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sensaciones`
--

CREATE TABLE `sensaciones` (
  `id_sensacion` int(11) NOT NULL,
  `nombre_sensacion` varchar(15) NOT NULL,
  `imagen_sensacion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sensaciones`
--

INSERT INTO `sensaciones` (`id_sensacion`, `nombre_sensacion`, `imagen_sensacion`) VALUES
(1, 'Miedo', '../imagenes/iconos/emojis/miedo.png'),
(2, 'Incomodidad', '../imagenes/iconos/emojis/incomodidad.png'),
(3, 'Tristeza', '../imagenes/iconos/emojis/tristeza.png'),
(4, 'Enfado', '../imagenes/iconos/emojis/enfado.png'),
(5, 'Vergüenza', '../imagenes/iconos/emojis/verguenza.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estatus`
--

CREATE TABLE `tipo_estatus` (
  `id_estatus` int(11) NOT NULL,
  `nombre_estatus` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_estatus`
--

INSERT INTO `tipo_estatus` (`id_estatus`, `nombre_estatus`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ia`
--

CREATE TABLE `tipo_ia` (
  `id_tipo_ia` int(11) NOT NULL,
  `nombre_ia` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_ia`
--

INSERT INTO `tipo_ia` (`id_tipo_ia`, `nombre_ia`) VALUES
(1, 'Tutor'),
(2, 'Psicologo'),
(3, 'Entrenador'),
(4, 'Nutriologo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_reportes`
--

CREATE TABLE `tipo_reportes` (
  `id_tipo_reporte` int(11) NOT NULL,
  `nombre_tipo_reporte` varchar(10) NOT NULL,
  `imagen_tipo_reporte` varchar(60) NOT NULL,
  `descripcion_reporte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_reportes`
--

INSERT INTO `tipo_reportes` (`id_tipo_reporte`, `nombre_tipo_reporte`, `imagen_tipo_reporte`, `descripcion_reporte`) VALUES
(1, 'Imagen', '../imagenes/iconos/reportes/visualblanco.png', 'Crea tus reportes solo seleccionando una imagen descriptiva'),
(2, 'Escrito', '../imagenes/iconos/reportes/documentoblanco.png', 'Crea tus reportes escribiendo lo sucedido'),
(3, 'Audio', '../imagenes/iconos/reportes/audioblanco.png', 'Crea tus reportes relatando en un audio lo sucedido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre_tipo_usuario` varchar(13) NOT NULL,
  `imagen_tipo_usuario` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id_tipo_usuario`, `nombre_tipo_usuario`, `imagen_tipo_usuario`) VALUES
(1, 'Administrador', '../imagenes/iconos/usuarios/adminblanco.png'),
(2, 'Docente', '../imagenes/iconos/usuarios/docentesblanco.png'),
(3, 'Padre', '../imagenes/iconos/usuarios/padresblanco.png'),
(4, 'Alumno', '../imagenes/iconos/usuarios/alumnosblanco.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidop` varchar(40) NOT NULL,
  `apellidom` varchar(40) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `avatar` varchar(55) NOT NULL,
  `fondo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `correo`, `telefono`, `contraseña`, `id_estatus`, `id_tipo_usuario`, `avatar`, `fondo`) VALUES
(1, 'Christian', 'Reyes', 'Guarneros', 'cris.guarners.joker777@gmail.com', '2481714022', '12345678', 1, 1, '../imagenes/avatares/avatar-gatoblanco.gif', '../imagenes/fondos/fondo-gusano.gif'),
(2, 'Vianney', 'Morales', 'Zamora', 'Vianney@gmail.com', '2225847475', '12345678', 1, 2, '', ''),
(3, 'Ivan', 'Sanchez', 'Juarez', 'Ivan@gmail.com', '2461234588', '12345678', 2, 2, '', ''),
(4, 'Maria Petra', 'Paredes', 'Xochihua', 'Petra@gmail.com', '2461472535', '12345678', 1, 2, '', ''),
(6, 'Raymundo', 'Montiel', 'Lira', 'ray@gmail.com', '2467854849', '12345678', 2, 2, '', ''),
(9, 'Cecilia', 'Guarneros', 'Ramirez', 'Ceciliaguarneros1983@gmail.com', '2481332000', '12345678', 1, 3, '../imagenes/avatares/avatar-dulceprincesa.gif', '../imagenes/fondos/fondo-bmobaraba.gif'),
(10, 'Rocio', 'Roldan', 'Rodriguez', 'Rocio@gmail.com', '2461234545', '12345678', 1, 3, '../imagenes/avatares/avatar-gato.gif', ''),
(11, 'Moises', 'Guarneros', 'Ramirez', 'moi@gmail.com', '2481754645', '12345678', 2, 3, '', ''),
(12, 'Christian', 'Reyes', 'Guarneros', 'cris.guarners.joker777@gmail.com', '2481714022', '12345678', 1, 4, '../imagenes/avatares/avatar-gatoblanco.gif', '../imagenes/fondos/fondo-gusano.gif'),
(13, 'Dayra', 'Coraza', 'Roldan', 'dayraroldan1@gmail.com', '2461858586', '12345678', 1, 4, '../imagenes/avatares/avatar-gato.gif', '../imagenes/fondos/fondo-bmobaraba.gif'),
(14, 'Daniel', 'Guarneros', 'Martinez', 'guar98953@gmail.com', '2441875082', 'tetenegra', 1, 4, '', ''),
(15, 'Uriel', 'Cabello', 'Sosa', 'urisosa@gmail.com', '2485084578', '12345678', 1, 4, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD UNIQUE KEY `id_actividad` (`id_actividad`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_padre` (`id_padre`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `boleta_alumno` (`id_alumno`),
  ADD KEY `boleta_periodo` (`id_periodo`),
  ADD KEY `boleta_materias` (`id_materia`),
  ADD KEY `boleta_grado` (`id_grado`);

--
-- Indices de la tabla `consejos`
--
ALTER TABLE `consejos`
  ADD PRIMARY KEY (`id_consejo`),
  ADD UNIQUE KEY `id_consejo` (`id_consejo`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id_grado`),
  ADD UNIQUE KEY `id_grado` (`id_grado`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`),
  ADD UNIQUE KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`id_padre`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `padres_ibfk_2` (`id_grado`),
  ADD KEY `padres_ibfk_3` (`id_grupo`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indices de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`id_peticion`),
  ADD KEY `peticion_usuario` (`id_usuario`),
  ADD KEY `peticion_tipoia` (`id_tipo_ia`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD UNIQUE KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id_reporte`),
  ADD UNIQUE KEY `id_reporte` (`id_reporte`),
  ADD KEY `id_alumno` (`id_usuario`),
  ADD KEY `id_alumno_reportado` (`id_usuario_reportado`),
  ADD KEY `id_tipo_reporte` (`id_tipo_reporte`),
  ADD KEY `id_sensacion` (`id_sensacion`);

--
-- Indices de la tabla `sensaciones`
--
ALTER TABLE `sensaciones`
  ADD PRIMARY KEY (`id_sensacion`);

--
-- Indices de la tabla `tipo_estatus`
--
ALTER TABLE `tipo_estatus`
  ADD PRIMARY KEY (`id_estatus`);

--
-- Indices de la tabla `tipo_ia`
--
ALTER TABLE `tipo_ia`
  ADD PRIMARY KEY (`id_tipo_ia`);

--
-- Indices de la tabla `tipo_reportes`
--
ALTER TABLE `tipo_reportes`
  ADD PRIMARY KEY (`id_tipo_reporte`);

--
-- Indices de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`),
  ADD KEY `id_estatus` (`id_estatus`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `consejos`
--
ALTER TABLE `consejos`
  MODIFY `id_consejo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `id_padre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `id_peticion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `sensaciones`
--
ALTER TABLE `sensaciones`
  MODIFY `id_sensacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_estatus`
--
ALTER TABLE `tipo_estatus`
  MODIFY `id_estatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_ia`
--
ALTER TABLE `tipo_ia`
  MODIFY `id_tipo_ia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_reportes`
--
ALTER TABLE `tipo_reportes`
  MODIFY `id_tipo_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`),
  ADD CONSTRAINT `alumnos_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`),
  ADD CONSTRAINT `alumnos_ibfk_4` FOREIGN KEY (`id_padre`) REFERENCES `padres` (`id_padre`),
  ADD CONSTRAINT `alumnos_ibfk_5` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`);

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `boleta_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`),
  ADD CONSTRAINT `boleta_grado` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`),
  ADD CONSTRAINT `boleta_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `boleta_periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodos` (`id_periodo`);

--
-- Filtros para la tabla `consejos`
--
ALTER TABLE `consejos`
  ADD CONSTRAINT `consejos_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`);

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `docentes_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`),
  ADD CONSTRAINT `docentes_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`);

--
-- Filtros para la tabla `padres`
--
ALTER TABLE `padres`
  ADD CONSTRAINT `padres_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `padres_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`),
  ADD CONSTRAINT `padres_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`);

--
-- Filtros para la tabla `peticiones`
--
ALTER TABLE `peticiones`
  ADD CONSTRAINT `peticion_tipoia` FOREIGN KEY (`id_tipo_ia`) REFERENCES `tipo_ia` (`id_tipo_ia`),
  ADD CONSTRAINT `peticion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `id_sensacion` FOREIGN KEY (`id_sensacion`) REFERENCES `sensaciones` (`id_sensacion`),
  ADD CONSTRAINT `id_tipo_reporte` FOREIGN KEY (`id_tipo_reporte`) REFERENCES `tipo_reportes` (`id_tipo_reporte`),
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `id_usuario_reportado` FOREIGN KEY (`id_usuario_reportado`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `id_estatus` FOREIGN KEY (`id_estatus`) REFERENCES `tipo_estatus` (`id_estatus`),
  ADD CONSTRAINT `id_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuarios` (`id_tipo_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
