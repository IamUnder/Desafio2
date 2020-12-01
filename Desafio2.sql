-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-12-2020 a las 16:12:00
-- Versión del servidor: 8.0.22-0ubuntu0.20.04.2
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Desafio2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE `asignacion` (
  `dni` varchar(10) NOT NULL,
  `id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`dni`, `id`) VALUES
('00000000X', 2),
('333333333X', 1),
('333333333X', 1),
('222222222X', 0),
('00000000V', 2),
('333333333V', 2),
('333333333Z', 2),
('11111111X', 1),
('33333333K', 2),
('00000000P', 1),
('05982239P', 0),
('05998877I', 2),
('05982239P', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `id` int NOT NULL,
  `id_Profesor` varchar(10) NOT NULL,
  `fecha_Inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_Fin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`id`, `id_Profesor`, `fecha_Inicio`, `fecha_Fin`, `estado`, `titulo`, `descripcion`) VALUES
(31, '00000000X', '2020-12-01 10:04:16', '2020-12-01 10:04:16', 2, 'Examen sola una opción', 'Probando'),
(32, '00000000X', '2020-12-01 10:05:10', '2020-12-01 10:05:10', 0, 'Examen de prueba larga', 'Que pasa chavales'),
(33, '00000000X', '2020-12-01 10:08:25', '2020-12-01 10:08:25', 0, 'Año de la segunda guerra mundial', 'Que pasa pollos'),
(34, '00000000X', '2020-12-01 10:53:42', '2020-12-01 10:53:42', 0, 'Examen nombre', 'Poner tu nombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenAlumno`
--

CREATE TABLE `examenAlumno` (
  `id_Examen` int NOT NULL,
  `id_Alumno` varchar(10) NOT NULL,
  `nota` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `examenAlumno`
--

INSERT INTO `examenAlumno` (`id_Examen`, `id_Alumno`, `nota`) VALUES
(31, '05982239P', '2/2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `idPregunta` int NOT NULL,
  `idExamen` int NOT NULL,
  `pregunta` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`idPregunta`, `idExamen`, `pregunta`) VALUES
(1, 1, 'Ejemplo1'),
(2, 1, 'Ejemplo numerica'),
(3, 1, 'Ejemplo seleccion 1'),
(4, 1, 'Ejemplo varias selecciones'),
(5, 1, 'ejemplo numerico 2'),
(6, 1, 'Ejemplo3'),
(7, 1, 'ejemplo 4'),
(8, 1, ''),
(9, -1, 'Cuanto es 2+2'),
(10, -1, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa'),
(11, -1, 'Marcas alemanas de coches'),
(12, -1, '¿Cuantos años tengo?'),
(13, -1, '¿Marcas italianas de coches?'),
(14, -1, '¿Marcas inglesas de coches?'),
(15, 32, 'Prueba larga. AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'),
(16, -1, '1+1'),
(17, 10, '3+3'),
(18, -1, '9x9'),
(19, 12, '¿Cuantos son 4x4?'),
(20, 13, '¿Como te llamas?'),
(21, 14, 'Nombre de tu padre'),
(22, 15, '4+4'),
(23, 16, '0+0'),
(24, -1, '10x10'),
(26, 31, '¿Cuantos años?'),
(27, -1, '¿Cuánto es 2+2?'),
(28, -1, '¿En que consiste la segunda guerra mundial?'),
(29, 20, '¿Cuanto es 9x9?'),
(30, -1, '¿Cuanto es 1x1?'),
(31, -1, '¿Cuanto es 5x5?'),
(32, -1, '¿Cuanto es 6x6?'),
(33, -1, '¿Cuanto es 7x2?'),
(34, -1, '¿Cuanto es 5x4?'),
(35, 31, '¿Marcas de coches más barata del mundo?'),
(36, 34, '¿Dime tu nombre?'),
(37, 33, '¿Año de la segunda guerra mundial?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestasAlumnos`
--

CREATE TABLE `respuestasAlumnos` (
  `id_Examen` int NOT NULL,
  `id_Alumno` varchar(20) NOT NULL,
  `id_Pregunta` int NOT NULL,
  `respuesta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `respuestasAlumnos`
--

INSERT INTO `respuestasAlumnos` (`id_Examen`, `id_Alumno`, `id_Pregunta`, `respuesta`) VALUES
(5, '00000000X', 10, '2'),
(5, '00000000X', 11, 'Opel###BMW###'),
(5, '00000000X', 12, '20 años'),
(5, '05982239P', 10, '12'),
(5, '05982239P', 11, 'Opel###BMW###'),
(5, '05982239P', 12, '20 años'),
(10, '05982239P', 17, '6'),
(28, '05982239P', 11, 'Opel###BMW###'),
(28, '05982239P', 12, '20 años'),
(28, '05982239P', 27, NULL),
(31, '05982239P', 26, ' 20 '),
(31, '05982239P', 35, ' Dacia ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestasCorrectas`
--

CREATE TABLE `respuestasCorrectas` (
  `idPregunta` int NOT NULL,
  `tipo` varchar(40) DEFAULT NULL,
  `respuesta1` varchar(2000) DEFAULT NULL,
  `respuesta2` varchar(2000) NOT NULL,
  `respuesta3` varchar(2000) NOT NULL,
  `respuesta4` varchar(2000) NOT NULL,
  `respuestaCorrecta` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `respuestasCorrectas`
--

INSERT INTO `respuestasCorrectas` (`idPregunta`, `tipo`, `respuesta1`, `respuesta2`, `respuesta3`, `respuesta4`, `respuestaCorrecta`) VALUES
(1, 'texto', 'Ejemplo', '', '', '', 'Ejemplo'),
(2, 'numerico', '', '', '', '', ''),
(3, 'unaOpcion', '1', '2', '3', '4', '3'),
(4, 'variasOpciones', '1', '2', '3', '4', '3###4###'),
(5, 'numerico', '', '', '', '', ''),
(6, 'numerico', '', '', '', '', ''),
(7, 'numerico', '88', '', '', '', '88'),
(8, 'numerico', '4', '', '', '', '4'),
(9, 'numerico', '4', '', '', '', '4'),
(10, 'numerico', '4', '', '', '', '4'),
(11, 'variasOpciones', 'Opel', 'BMW', 'Nissan', 'Alfa Romeo', 'Opel###BMW###'),
(12, 'unaOpcion', '18 años', '19 años', '20 años', '21 años', '20 años'),
(13, 'variasOpciones', 'Land Rover', 'Peugeot', 'Maserati', 'Alfa Romeo', 'Maserati###Alfa Romeo###'),
(14, 'variasOpciones', 'Land Rover', 'TVR', 'Seat', 'Audi', 'Land Rover###TVR###'),
(15, 'variasOpciones', 'Hola_A', 'Hola_B', 'Hola_B', 'Hola_C', 'Hola_A###Hola_C###'),
(16, 'unaOpcion', '2', '3', '4', '5', '2'),
(17, 'unaOpcion', '3', '9', '6', '1', '6'),
(18, 'unaOpcion', '81', '90', '100', '200', '81'),
(19, 'numerico', '16', '', '', '', '16'),
(20, 'texto', 'Me llamo Pedro', '', '', '', 'Me llamo Pedro'),
(21, 'texto', 'Paco', '', '', '', 'Paco'),
(22, 'numerico', '8', '', '', '', '8'),
(23, 'numerico', '0', '', '', '', '0'),
(24, 'numerico', '100', '', '', '', '100'),
(25, 'texto', '', '', '', '', ''),
(26, 'unaOpcion', '20', '21', '22', '23', '20'),
(27, 'numerico', '4', '', '', '', '4'),
(28, 'texto', 'La segunda guerra mundial es una guerra muy larga', '', '', '', 'La segunda guerra mundial es una guerra muy larga'),
(29, 'numerico', '81', '', '', '', '81'),
(30, 'numerico', '1', '', '', '', '1'),
(31, 'numerico', '25', '', '', '', '25'),
(32, 'numerico', '36', '', '', '', '36'),
(33, 'numerico', '14', '', '', '', '14'),
(34, 'numerico', '20', '', '', '', '20'),
(35, 'unaOpcion', 'Dacia', 'Seat', 'Fiat', 'Nissan', 'Dacia'),
(36, 'texto', 'Me llamo lo que sea', '', '', '', 'Me llamo lo que sea'),
(37, 'numerico', '1000', '', '', '', '1000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` tinyint(1) NOT NULL,
  `des` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `des`) VALUES
(0, 'alumno'),
(1, 'profesor'),
(2, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` varchar(10) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `activado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `mail`, `pass`, `nombre`, `apellido`, `activado`) VALUES
('00000000P', 'admin1@admin.com', '$2y$10$IyqpnVjNSBcirpDIMP.3Z.gRrPdOLm7vWpjb0q5xNGMUKHQYT45ii', 'Andrea', 'Fernandez', 1),
('00000000X', 'admin@admin.com', '$2y$10$xeSIQdzgxQFFtmyfnrRsp.d4wksF20UcpGJ.8gBfqSXt8aHkD4Hl2', 'Under', 'Admin', 1),
('05998877I', 'inma@gmail.com', '$2y$10$5./imRmTuMFJnOdOv/bGZutgcHacJnMoLlwKjsewBVWMcP9d05r8e', 'Inma', 'Gijon', 1),
('11111111X', 'Andrea@gmail.com', 'Admin17', 'Andrea', 'Fernandez', 1),
('222222222X', 'ejemplo@ejemplo.com', '$2y$10$Zg8uc.ZITyAmfTDls3QF2eapbiAOHI4UeUVersdrbjhAeB3ErNHb.', 'Ejemplo', 'Perez', 0),
('333333333Z', 'Jorgeolmo.I@gmail.com', 'Admin1234', 'Jorge', 'Olmo', 1),
('33333333K', 'Fernando@gmail.com', '$2y$10$CkLJDlkg4RTqmAkSQYxEweun3RaFnsCT6MEFwXCflSI3ta6KKCw4C', 'Fernando', 'Profe', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`,`id_Profesor`);

--
-- Indices de la tabla `examenAlumno`
--
ALTER TABLE `examenAlumno`
  ADD PRIMARY KEY (`id_Examen`,`id_Alumno`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`idPregunta`,`idExamen`);

--
-- Indices de la tabla `respuestasAlumnos`
--
ALTER TABLE `respuestasAlumnos`
  ADD PRIMARY KEY (`id_Examen`,`id_Alumno`,`id_Pregunta`);

--
-- Indices de la tabla `respuestasCorrectas`
--
ALTER TABLE `respuestasCorrectas`
  ADD PRIMARY KEY (`idPregunta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `idPregunta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
