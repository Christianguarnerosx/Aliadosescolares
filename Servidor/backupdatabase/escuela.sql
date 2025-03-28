-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 09:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escuela`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividades`
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
-- Table structure for table `alumnos`
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
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `id_usuario`, `id_grado`, `id_grupo`, `id_padre`, `id_docente`) VALUES
(1, 12, 1, 1, 1, 1),
(2, 13, 1, 1, 2, 1),
(3, 14, 1, 2, 1, 1),
(4, 15, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `asignar_psicologo_usuarios`
--

CREATE TABLE `asignar_psicologo_usuarios` (
  `id_asignar_psicologo_usuarios` int(11) NOT NULL,
  `id_usuario_psicologo` int(11) NOT NULL,
  `id_usuario_canalizado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asignar_psicologo_usuarios`
--

INSERT INTO `asignar_psicologo_usuarios` (`id_asignar_psicologo_usuarios`, `id_usuario_psicologo`, `id_usuario_canalizado`) VALUES
(1, 16, 15),
(2, 16, 12),
(3, 16, 13);

-- --------------------------------------------------------

--
-- Table structure for table `calificaciones`
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
-- Dumping data for table `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificacion`, `id_alumno`, `id_grado`, `id_periodo`, `id_materia`, `calificacion`) VALUES
(13, 1, 1, 1, 1, 8),
(14, 1, 1, 1, 3, 8.5),
(15, 1, 1, 1, 2, 8.5),
(16, 1, 1, 1, 4, 9),
(17, 1, 1, 1, 5, 9.5);

-- --------------------------------------------------------

--
-- Table structure for table `citas_psicologo_usuarios`
--

CREATE TABLE `citas_psicologo_usuarios` (
  `id_citas_psicologo_usuario` int(11) NOT NULL,
  `id_usuario_psicologo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `anotaciones_psicologo` text NOT NULL,
  `anotaciones_usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consejos`
--

CREATE TABLE `consejos` (
  `id_consejo` int(11) NOT NULL,
  `titulo` varchar(30) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `id_docente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `docentes`
--

CREATE TABLE `docentes` (
  `id_docente` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_grado` int(11) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `docentes`
--

INSERT INTO `docentes` (`id_docente`, `id_usuario`, `id_grado`, `id_grupo`) VALUES
(1, 2, 1, 1),
(2, 3, 2, 1),
(3, 4, 3, 3),
(5, 6, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `grados`
--

CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL,
  `nombre_grado` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `grados`
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
-- Table structure for table `grupos`
--

CREATE TABLE `grupos` (
  `id_grupo` int(11) NOT NULL,
  `nombre_grupo` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nombre_grupo`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`) VALUES
(1, 'Matematicas'),
(2, 'Español'),
(3, 'Ciencias'),
(4, 'Fisica'),
(5, 'Humanidades');

-- --------------------------------------------------------

--
-- Table structure for table `padres`
--

CREATE TABLE `padres` (
  `id_padre` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_grado` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `padres`
--

INSERT INTO `padres` (`id_padre`, `id_usuario`, `id_grado`, `id_grupo`) VALUES
(1, 9, 3, 2),
(2, 10, 3, 3),
(3, 11, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `periodos`
--

CREATE TABLE `periodos` (
  `id_periodo` int(11) NOT NULL,
  `nombre_periodo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `periodos`
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
-- Table structure for table `peticiones`
--

CREATE TABLE `peticiones` (
  `id_peticion` int(11) NOT NULL,
  `id_tipo_ia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `consulta` text NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peticiones`
--

INSERT INTO `peticiones` (`id_peticion`, `id_tipo_ia`, `id_usuario`, `consulta`, `fecha`) VALUES
(51, 1, 12, 'Bien como puedes ayudarme', '2024-04-16 06:07:10'),
(52, 2, 12, 'Que ondaaaa', '2024-04-16 06:07:40'),
(53, 2, 12, 'Hola como andas', '2024-04-16 06:08:04'),
(54, 2, 12, 'Como andas', '2024-04-16 06:08:14'),
(122, 1, 13, 'Hola', '2024-04-22 01:15:15'),
(123, 3, 13, 'hoalalalal', '2024-04-22 01:49:35'),
(124, 4, 14, 'Como bajar de peso', '2024-04-22 05:12:32'),
(125, 1, 1, 'Hola como andas', '2024-05-01 04:30:23'),
(126, 1, 9, 'Como puedo ayudar a mi hijo', '2024-05-01 04:32:44'),
(127, 1, 9, 'Como superó ansiedad', '2024-05-01 05:17:01'),
(128, 1, 1, 'Hola', '2024-05-01 09:00:44'),
(129, 1, 1, 'Como puedo aprender ecuaciones', '2024-05-01 09:00:57'),
(130, 1, 1, 'Como puedes ayudarme', '2024-05-01 09:01:10'),
(131, 2, 2, 'Hola como estas', '2024-05-01 09:26:09'),
(132, 1, 1, 'Como me puedes ayudar', '2024-05-01 09:34:33'),
(133, 4, 12, 'Hola que puedo comer en recreo para no tener mucha grasa', '2024-05-01 09:47:35'),
(134, 2, 12, 'Como puedes ayudarme', '2024-05-01 22:48:21'),
(135, 1, 1, 'Hola, como puedes ayudarme', '2024-05-02 01:30:33'),
(136, 1, 1, 'Como podría hacer conexión con otros directores', '2024-05-02 01:30:54'),
(137, 4, 12, 'Hola, que puedo comer el dia de hoy', '2024-05-02 02:48:30'),
(138, 4, 12, 'Que puedo comer en recreo', '2024-05-02 02:48:43'),
(139, 4, 12, 'Como puedo bajar de peso', '2024-05-02 02:49:24'),
(140, 4, 12, 'Como puedo mantenerme más en forma', '2024-05-02 02:49:35'),
(141, 4, 12, 'Con nutricion', '2024-05-02 02:49:45'),
(142, 4, 12, 'Que puedo comer en la semana de recreo ', '2024-05-02 02:50:02'),
(143, 4, 12, 'Martes?', '2024-05-02 02:50:12'),
(144, 2, 2, 'Hola', '2024-05-03 02:16:31'),
(145, 2, 2, 'Como puedo hacer que mis ninos puedan tener mas contacto entre ellos y conmigo', '2024-05-03 02:16:56'),
(146, 1, 1, 'Hola como estas', '2024-05-03 03:35:35'),
(147, 4, 1, 'hola', '2025-03-22 22:52:01'),
(148, 2, 1, 'Hola', '2025-03-22 22:54:31'),
(149, 2, 1, 'hola', '2025-03-22 23:01:41'),
(150, 2, 1, 'sd', '2025-03-22 23:05:36'),
(151, 2, 1, 'd', '2025-03-22 23:14:47'),
(152, 4, 1, 'ds', '2025-03-22 23:15:16'),
(153, 2, 1, 'f', '2025-03-22 23:17:34'),
(154, 2, 1, 'c', '2025-03-22 23:22:12'),
(155, 2, 1, 'h', '2025-03-22 23:24:07'),
(156, 3, 1, 'd', '2025-03-22 23:24:28'),
(157, 2, 1, 'ae', '2025-03-22 23:36:48'),
(158, 2, 1, 'a', '2025-03-22 23:43:01'),
(159, 2, 1, '', '2025-03-22 23:43:43'),
(160, 1, 1, 'Hola', '2025-03-22 23:45:14'),
(161, 2, 2, 'holaaaa', '2025-03-23 07:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `proyectos`
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
-- Table structure for table `reportes`
--

CREATE TABLE `reportes` (
  `id_reporte` int(11) NOT NULL,
  `id_tipo_reporte` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_usuario_reportado` int(11) DEFAULT NULL,
  `fecha_reporte` datetime DEFAULT NULL,
  `id_sensacion` int(11) NOT NULL,
  `texto_reporte` text DEFAULT NULL,
  `audio_reporte` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reportes`
--

INSERT INTO `reportes` (`id_reporte`, `id_tipo_reporte`, `id_usuario`, `id_usuario_reportado`, `fecha_reporte`, `id_sensacion`, `texto_reporte`, `audio_reporte`) VALUES
(3, 1, 1, 13, '2024-03-18 00:00:00', 4, NULL, NULL),
(107, 1, 12, 9, '2024-03-31 17:47:55', 3, NULL, NULL),
(108, 1, 12, 15, '2024-03-31 18:11:27', 3, NULL, NULL),
(109, 1, 12, 14, '2024-04-05 15:05:41', 4, NULL, NULL),
(110, 2, 12, 15, '2024-04-05 15:06:01', 2, 'Le pego a un niño en silla de ruedas', NULL),
(112, 2, 12, 14, '2024-04-08 01:23:38', 2, 'Me cae mal', NULL),
(113, 2, 12, 2, '2024-04-08 01:57:48', 2, 'Me dijo que soy su hijo y no soy su hijo ', NULL),
(139, 1, 13, 14, '2024-04-20 21:21:28', 1, NULL, NULL),
(140, 1, 9, 14, '2024-04-20 21:23:48', 5, NULL, NULL),
(142, 2, 14, 14, '2024-04-20 21:37:20', 4, 'Me cae mal y lo quiero golpear', NULL),
(143, 1, 2, 12, '2024-04-21 06:52:53', 2, NULL, NULL),
(144, 1, 12, 2, '2024-04-21 23:53:19', 1, NULL, NULL),
(145, 1, 12, 2, '2024-04-21 23:53:19', 1, NULL, NULL),
(146, 1, 12, 2, '2024-04-21 23:53:34', 4, NULL, NULL),
(147, 1, 12, 2, '2024-04-21 23:53:34', 4, NULL, NULL),
(150, 1, 2, 12, '2024-05-01 03:57:00', 1, NULL, NULL),
(151, 2, 2, 12, '2024-05-01 04:01:27', 2, 'me cae mal\n', NULL),
(152, 1, 12, 13, '2024-05-01 04:09:34', 1, NULL, NULL),
(153, 1, 1, 12, '2024-05-01 06:22:12', 5, NULL, NULL),
(154, 1, 2, 12, '2024-05-01 08:25:18', 2, NULL, NULL),
(155, 1, 1, 13, '2024-05-01 09:16:22', 2, NULL, NULL),
(156, 2, 1, 13, '2024-05-01 09:33:31', 2, 'Dhaaaa', NULL),
(157, 1, 12, 13, '2024-05-01 21:28:25', 1, NULL, NULL),
(158, 2, 1, 12, '2024-05-02 01:33:21', 2, 'Me pego el muy... malo', NULL),
(159, 2, 12, 2, '2024-05-02 01:37:45', 2, 'No me dijo que me engaño', NULL),
(160, 1, 1, 12, '2024-05-03 02:14:46', 1, NULL, NULL),
(161, 1, 1, 12, '2024-05-03 04:09:12', 1, NULL, NULL),
(162, 2, 1, 12, '2024-05-03 04:09:25', 2, 'Hola', NULL),
(163, 3, 1, 2, '2025-03-23 01:10:48', 2, NULL, '../../Cliente/sonidos/reportes/Reporte_de_1_el_2025-03-23 01_10_48.mp3'),
(164, 3, 2, 13, '2025-03-23 07:40:47', 2, NULL, '../../Cliente/sonidos/reportes/Reporte_de_2_el_2025-03-23 07_40_47.mp3');

-- --------------------------------------------------------

--
-- Table structure for table `sensaciones`
--

CREATE TABLE `sensaciones` (
  `id_sensacion` int(11) NOT NULL,
  `nombre_sensacion` varchar(15) NOT NULL,
  `imagen_sensacion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sensaciones`
--

INSERT INTO `sensaciones` (`id_sensacion`, `nombre_sensacion`, `imagen_sensacion`) VALUES
(1, 'Miedo', 'miedo.png'),
(2, 'Incomodidad', 'incomodidad.png'),
(3, 'Tristeza', 'tristeza.png'),
(4, 'Enfado', 'enfado.png'),
(5, 'Vergüenza', 'verguenza.png');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_estatus`
--

CREATE TABLE `tipo_estatus` (
  `id_estatus` int(11) NOT NULL,
  `nombre_estatus` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_estatus`
--

INSERT INTO `tipo_estatus` (`id_estatus`, `nombre_estatus`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_ia`
--

CREATE TABLE `tipo_ia` (
  `id_tipo_ia` int(11) NOT NULL,
  `nombre_ia` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_ia`
--

INSERT INTO `tipo_ia` (`id_tipo_ia`, `nombre_ia`) VALUES
(1, 'Tutor'),
(2, 'Psicologo'),
(3, 'Entrenador'),
(4, 'Nutriologo');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_reportes`
--

CREATE TABLE `tipo_reportes` (
  `id_tipo_reporte` int(11) NOT NULL,
  `nombre_tipo_reporte` varchar(10) NOT NULL,
  `imagen_tipo_reporte` varchar(60) NOT NULL,
  `descripcion_reporte` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_reportes`
--

INSERT INTO `tipo_reportes` (`id_tipo_reporte`, `nombre_tipo_reporte`, `imagen_tipo_reporte`, `descripcion_reporte`) VALUES
(1, 'Imagen', '../imagenes/iconos/reportes/visualblanco.png', 'Crea tus reportes solo seleccionando una imagen descriptiva'),
(2, 'Escrito', '../imagenes/iconos/reportes/documentoblanco.png', 'Crea tus reportes escribiendo lo sucedido'),
(3, 'Audio', '../imagenes/iconos/reportes/audioblanco.png', 'Crea tus reportes relatando en un audio lo sucedido');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_usuarios`
--

CREATE TABLE `tipo_usuarios` (
  `id_tipo_usuario` int(11) NOT NULL,
  `nombre_tipo_usuario` varchar(13) NOT NULL,
  `imagen_tipo_usuario` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_usuarios`
--

INSERT INTO `tipo_usuarios` (`id_tipo_usuario`, `nombre_tipo_usuario`, `imagen_tipo_usuario`) VALUES
(1, 'Administrador', '../imagenes/iconos/usuarios/adminblanco.png'),
(2, 'Docente', '../imagenes/iconos/usuarios/docentesblanco.png'),
(3, 'Padre', '../imagenes/iconos/usuarios/padresblanco.png'),
(4, 'Alumno', '../imagenes/iconos/usuarios/alumnosblanco.png'),
(6, 'Psicólogo', '../imagenes/iconos/usuarios/docentesblanco.png');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
  `fondo` varchar(60) NOT NULL,
  `canalizado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidop`, `apellidom`, `correo`, `telefono`, `contraseña`, `id_estatus`, `id_tipo_usuario`, `avatar`, `fondo`, `canalizado`) VALUES
(1, 'Christian', 'Reyes', 'Guarneros', 'cris.guarners.joker777@gmail.com', '2481714022', '12345678', 1, 1, '../imagenes/avatares/avatar-finn.gif', '', 0),
(2, 'Vianney', 'Morales', 'Zamora', 'Vianney@gmail.com', '2225847475', '12345678', 1, 2, '../imagenes/avatares/avatar-gato.gif', '', 0),
(3, 'Ivan', 'Sanchez', 'Juarez', 'Ivan@gmail.com', '2461234588', '12345678', 2, 2, '', '', 0),
(4, 'Maria Petra', 'Paredes', 'Xochihua', 'Petra@gmail.com', '2461472535', '12345678', 1, 2, '../imagenes/avatares/avatar-gato.gif', '', 0),
(6, 'Raymundo', 'Montiel', 'Lira', 'ray@gmail.com', '2467854849', '12345678', 2, 2, '', '', 0),
(9, 'Cecilia', 'Guarneros', 'Ramirez', 'Ceciliaguarneros1983@gmail.com', '2481332000', '12345678', 1, 3, '../imagenes/avatares/avatar-dulceprincesa.gif', '../imagenes/fondos/fondorosadulceprincesa.gif', 0),
(10, 'Rocio', 'Roldan', 'Rodriguez', 'Rocio@gmail.com', '2461234545', '12345678', 1, 3, '../imagenes/avatares/avatar-dulceprincesa.gif', '', 0),
(11, 'Moises', 'Guarneros', 'Ramirez', 'moi@gmail.com', '2481754645', '12345678', 2, 3, '', '', 0),
(12, 'Christian', 'Reyes', 'Guarneros', 'cris.guarners.joker777@gmail.com', '2481714022', '123456789', 1, 4, '../imagenes/avatares/avatar-jakfin.gif', '', 1),
(13, 'Dayra', 'Coraza', 'Roldan', 'dayraroldan1@gmail.com', '2461858586', '12345678', 1, 4, '../imagenes/avatares/avatar-gato.gif', '', 1),
(14, 'Daniel', 'Guarneros', 'Martinez', 'guar98953@gmail.com', '2441875082', 'tetenegra', 1, 4, '', '', 0),
(15, 'Uriel', 'Cabello', 'Sosa', 'urisosa@gmail.com', '2485084578', '12345678', 1, 4, '', '', 1),
(16, 'Norma', 'Velasquez', 'Zamora', 'norma.zamora@gmail.com', '5561486352', '12345678', 1, 6, '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD UNIQUE KEY `id_actividad` (`id_actividad`);

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_grupo` (`id_grupo`),
  ADD KEY `id_padre` (`id_padre`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indexes for table `asignar_psicologo_usuarios`
--
ALTER TABLE `asignar_psicologo_usuarios`
  ADD PRIMARY KEY (`id_asignar_psicologo_usuarios`);

--
-- Indexes for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `boleta_alumno` (`id_alumno`),
  ADD KEY `boleta_periodo` (`id_periodo`),
  ADD KEY `boleta_materias` (`id_materia`),
  ADD KEY `boleta_grado` (`id_grado`);

--
-- Indexes for table `citas_psicologo_usuarios`
--
ALTER TABLE `citas_psicologo_usuarios`
  ADD PRIMARY KEY (`id_citas_psicologo_usuario`);

--
-- Indexes for table `consejos`
--
ALTER TABLE `consejos`
  ADD PRIMARY KEY (`id_consejo`),
  ADD UNIQUE KEY `id_consejo` (`id_consejo`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indexes for table `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indexes for table `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id_grado`),
  ADD UNIQUE KEY `id_grado` (`id_grado`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id_grupo`),
  ADD UNIQUE KEY `id_grupo` (`id_grupo`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indexes for table `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`id_padre`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `padres_ibfk_2` (`id_grado`),
  ADD KEY `padres_ibfk_3` (`id_grupo`);

--
-- Indexes for table `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`id_periodo`);

--
-- Indexes for table `peticiones`
--
ALTER TABLE `peticiones`
  ADD PRIMARY KEY (`id_peticion`),
  ADD KEY `peticion_usuario` (`id_usuario`),
  ADD KEY `peticion_tipoia` (`id_tipo_ia`);

--
-- Indexes for table `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD UNIQUE KEY `id_proyecto` (`id_proyecto`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indexes for table `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id_reporte`),
  ADD UNIQUE KEY `id_reporte` (`id_reporte`),
  ADD KEY `id_alumno` (`id_usuario`),
  ADD KEY `id_alumno_reportado` (`id_usuario_reportado`),
  ADD KEY `id_tipo_reporte` (`id_tipo_reporte`),
  ADD KEY `id_sensacion` (`id_sensacion`);

--
-- Indexes for table `sensaciones`
--
ALTER TABLE `sensaciones`
  ADD PRIMARY KEY (`id_sensacion`);

--
-- Indexes for table `tipo_estatus`
--
ALTER TABLE `tipo_estatus`
  ADD PRIMARY KEY (`id_estatus`);

--
-- Indexes for table `tipo_ia`
--
ALTER TABLE `tipo_ia`
  ADD PRIMARY KEY (`id_tipo_ia`);

--
-- Indexes for table `tipo_reportes`
--
ALTER TABLE `tipo_reportes`
  ADD PRIMARY KEY (`id_tipo_reporte`);

--
-- Indexes for table `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`),
  ADD KEY `id_estatus` (`id_estatus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `asignar_psicologo_usuarios`
--
ALTER TABLE `asignar_psicologo_usuarios`
  MODIFY `id_asignar_psicologo_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `citas_psicologo_usuarios`
--
ALTER TABLE `citas_psicologo_usuarios`
  MODIFY `id_citas_psicologo_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consejos`
--
ALTER TABLE `consejos`
  MODIFY `id_consejo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `padres`
--
ALTER TABLE `padres`
  MODIFY `id_padre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `periodos`
--
ALTER TABLE `periodos`
  MODIFY `id_periodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peticiones`
--
ALTER TABLE `peticiones`
  MODIFY `id_peticion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `sensaciones`
--
ALTER TABLE `sensaciones`
  MODIFY `id_sensacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tipo_estatus`
--
ALTER TABLE `tipo_estatus`
  MODIFY `id_estatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tipo_ia`
--
ALTER TABLE `tipo_ia`
  MODIFY `id_tipo_ia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipo_reportes`
--
ALTER TABLE `tipo_reportes`
  MODIFY `id_tipo_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_usuarios`
--
ALTER TABLE `tipo_usuarios`
  MODIFY `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`),
  ADD CONSTRAINT `alumnos_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`),
  ADD CONSTRAINT `alumnos_ibfk_4` FOREIGN KEY (`id_padre`) REFERENCES `padres` (`id_padre`),
  ADD CONSTRAINT `alumnos_ibfk_5` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`);

--
-- Constraints for table `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `boleta_alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`),
  ADD CONSTRAINT `boleta_grado` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`),
  ADD CONSTRAINT `boleta_materias` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`),
  ADD CONSTRAINT `boleta_periodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodos` (`id_periodo`);

--
-- Constraints for table `consejos`
--
ALTER TABLE `consejos`
  ADD CONSTRAINT `consejos_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`);

--
-- Constraints for table `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `docentes_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`),
  ADD CONSTRAINT `docentes_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`);

--
-- Constraints for table `padres`
--
ALTER TABLE `padres`
  ADD CONSTRAINT `padres_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `padres_ibfk_2` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`),
  ADD CONSTRAINT `padres_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id_grupo`);

--
-- Constraints for table `peticiones`
--
ALTER TABLE `peticiones`
  ADD CONSTRAINT `peticion_tipoia` FOREIGN KEY (`id_tipo_ia`) REFERENCES `tipo_ia` (`id_tipo_ia`),
  ADD CONSTRAINT `peticion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`);

--
-- Constraints for table `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `id_sensacion` FOREIGN KEY (`id_sensacion`) REFERENCES `sensaciones` (`id_sensacion`),
  ADD CONSTRAINT `id_tipo_reporte` FOREIGN KEY (`id_tipo_reporte`) REFERENCES `tipo_reportes` (`id_tipo_reporte`),
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `id_usuario_reportado` FOREIGN KEY (`id_usuario_reportado`) REFERENCES `usuarios` (`id_usuario`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `id_estatus` FOREIGN KEY (`id_estatus`) REFERENCES `tipo_estatus` (`id_estatus`),
  ADD CONSTRAINT `id_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuarios` (`id_tipo_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
