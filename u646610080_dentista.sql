-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-05-2023 a las 01:40:54
-- Versión del servidor: 10.5.19-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u646610080_dentista`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id_album` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `path_name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id_album`, `nombre`, `path_name`, `created_at`, `fk_paciente`) VALUES
(1, 'efgdfg', '6f5cab19da022e19da702a8e9c999526', '2023-02-14 00:23:44', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album_imagen`
--

CREATE TABLE `album_imagen` (
  `id_imagen` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `path` text NOT NULL,
  `fk_album` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo_ortodoncia`
--

CREATE TABLE `archivo_ortodoncia` (
  `id_archivo` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `path` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id` int(11) NOT NULL,
  `odontologo` text NOT NULL,
  `paciente` text NOT NULL,
  `concepto` text NOT NULL,
  `monto` text NOT NULL,
  `tipo_pago` text NOT NULL,
  `comprobante` text NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id`, `odontologo`, `paciente`, `concepto`, `monto`, `tipo_pago`, `comprobante`, `comentario`) VALUES
(1, '1J23B4KJ32423', '5', 'Prueba concepto', '500', 'Efectivo', 'Recibo', 'Prueba numeor 1'),
(2, '1J23B4KJ32423', '4', 'pruebona1', '516', 'Efectivo', 'Recibo', ''),
(3, ' ', ' ', '', '', 'Efectivo', 'Recibo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `paciente` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `color` varchar(255) NOT NULL,
  `textColor` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `id_doctor` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL,
  `correo` text NOT NULL,
  `especialidad` text NOT NULL,
  `cedula_profesional` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`id_doctor`, `nombre`, `edad`, `direccion`, `telefono`, `correo`, `especialidad`, `cedula_profesional`) VALUES
(10, 'doctor ', 25, '', '6181234567', '', '1', '12345'),
(11, 'doctor2', 25, '', '6187894561', '', 'dasd', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evolucion`
--

CREATE TABLE `evolucion` (
  `id_evolucion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `evolucion` varchar(128) NOT NULL,
  `fk_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evolucion`
--

INSERT INTO `evolucion` (`id_evolucion`, `fecha`, `evolucion`, `fk_paciente`) VALUES
(2, '2023-05-01', 'ya quedo', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fraccionamiento`
--

CREATE TABLE `fraccionamiento` (
  `id_fraccionamiento` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `direccion` text NOT NULL,
  `correo` text NOT NULL,
  `telefono` text NOT NULL,
  `celular` text NOT NULL,
  `url_sitio` text NOT NULL,
  `num_guardias` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fraccionamiento`
--

INSERT INTO `fraccionamiento` (`id_fraccionamiento`, `nombre`, `direccion`, `correo`, `telefono`, `celular`, `url_sitio`, `num_guardias`) VALUES
(1, 'Quintas Residencial', '', '', '618-123-0000', '000000', 'www.quintasresidencial.com', 2),
(2, 'Cotto', '', '', '618-123-0222', '222222222222', 'cottoasturias.com', 1),
(3, 'Pinos', '', '', '618-123-0222', '123231231231', 'pinosres.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardias`
--

CREATE TABLE `guardias` (
  `id_guardia` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` text NOT NULL,
  `antecedentes` text NOT NULL,
  `fk_fraccionamiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `guardias`
--

INSERT INTO `guardias` (`id_guardia`, `nombre`, `direccion`, `telefono`, `antecedentes`, `fk_fraccionamiento`) VALUES
(1, 'Guardia uno', 'calle #1212', '2312312', '', 1),
(2, 'Guardia dos', 'Test #211', '123123', '', 1),
(3, 'Guardia uno', 'calle #1212', '123123222222', 'Nada', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiaclinica`
--

CREATE TABLE `historiaclinica` (
  `id` int(11) NOT NULL,
  `lugar` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `odontologo` text DEFAULT NULL,
  `matricula` text DEFAULT NULL,
  `paciente` text DEFAULT NULL,
  `afil` text DEFAULT NULL,
  `o_social` text DEFAULT NULL,
  `f_nac` text DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `edad` text DEFAULT NULL,
  `estado_civil` text DEFAULT NULL,
  `nacionalidad` text DEFAULT NULL,
  `n_doc` text DEFAULT NULL,
  `celular` text DEFAULT NULL,
  `calle` text DEFAULT NULL,
  `numero` text DEFAULT NULL,
  `colonia` text DEFAULT NULL,
  `localidad` text DEFAULT NULL,
  `profecion` text DEFAULT NULL,
  `titular` text DEFAULT NULL,
  `lugar_trabajo` text DEFAULT NULL,
  `jerarquia` text DEFAULT NULL,
  `padre_vida` tinyint(1) DEFAULT NULL,
  `enfermedad_padre` text DEFAULT NULL,
  `madre_vida` tinyint(1) DEFAULT NULL,
  `enfermedad_madre` text DEFAULT NULL,
  `hermanos` tinyint(1) DEFAULT NULL,
  `hermanos_sanos` text DEFAULT NULL,
  `enfermedad` text DEFAULT NULL,
  `enfermedad_cual` text DEFAULT NULL,
  `tratamiento_medico` tinyint(1) DEFAULT NULL,
  `tratamiento_cual` text DEFAULT NULL,
  `medicamentos_habituales` text DEFAULT NULL,
  `medicamentos_anos` text DEFAULT NULL,
  `deporte` tinyint(1) DEFAULT NULL,
  `molestia_deporte` tinyint(1) DEFAULT NULL,
  `alergico` text DEFAULT NULL,
  `alergico_otro` text DEFAULT NULL,
  `cicatriza` tinyint(1) DEFAULT NULL,
  `sangra` text DEFAULT NULL,
  `problema_colageno` tinyint(1) DEFAULT NULL,
  `fiebre_reumatica` tinyint(1) DEFAULT NULL,
  `alguna_medicacion` tinyint(1) DEFAULT NULL,
  `diabetico` tinyint(1) DEFAULT NULL,
  `diabetes_con` text DEFAULT NULL,
  `problema_cardiaco` tinyint(1) DEFAULT NULL,
  `cardiaco_cual` text DEFAULT NULL,
  `toma_aspirina` tinyint(1) DEFAULT NULL,
  `frecuencia_aspirina` text DEFAULT NULL,
  `presion_alta` tinyint(1) DEFAULT NULL,
  `chagas` tinyint(1) DEFAULT NULL,
  `tratamiento_chagas` text DEFAULT NULL,
  `problemas_renales` tinyint(1) DEFAULT NULL,
  `ulcera_gastrica` tinyint(1) DEFAULT NULL,
  `hepatitis` tinyint(1) DEFAULT NULL,
  `tipo_hepatitis` text DEFAULT NULL,
  `problema_hepatico` tinyint(1) DEFAULT NULL,
  `problema_hepatico_cual` text DEFAULT NULL,
  `convulsiones` tinyint(1) DEFAULT NULL,
  `epileptico` tinyint(1) DEFAULT NULL,
  `epileptico_medicacion` text DEFAULT NULL,
  `sifilis_gonorrea` tinyint(1) DEFAULT NULL,
  `infecto_contagiosa` tinyint(1) DEFAULT NULL,
  `transfusiones` tinyint(1) DEFAULT NULL,
  `operado` tinyint(1) DEFAULT NULL,
  `operacion` text DEFAULT NULL,
  `cuando_operacion` text DEFAULT NULL,
  `problema_respiratorio` tinyint(1) DEFAULT NULL,
  `respiratorio_cual` text DEFAULT NULL,
  `fuma` tinyint(1) DEFAULT NULL,
  `embarazo` tinyint(1) DEFAULT NULL,
  `meses_embarazo` text DEFAULT NULL,
  `recomendacion_medica` tinyint(1) DEFAULT NULL,
  `recomendacion_medica_cual` text DEFAULT NULL,
  `tratamiento_extra` text DEFAULT NULL,
  `medico_clinico` text DEFAULT NULL,
  `clinica` text DEFAULT NULL,
  `stamps` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `asunto` text NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `asunto`, `mensaje`) VALUES
(17, 'Prueba de mensaje', ''),
(19, 'Hola mensaje', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa_directiva`
--

CREATE TABLE `mesa_directiva` (
  `id_mesadirectiva` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `puesto` text NOT NULL,
  `telefono` text NOT NULL,
  `fk_fraccionamiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mesa_directiva`
--

INSERT INTO `mesa_directiva` (`id_mesadirectiva`, `nombre`, `puesto`, `telefono`, `fk_fraccionamiento`) VALUES
(1, '', 'Presidente', '', 1),
(2, '', 'Secretario', '', 1),
(3, '', 'Tesorero', '', 1),
(4, '', 'Administrador', '', 1),
(5, '', 'Presidente', '', 2),
(6, '', 'Secretario', '', 2),
(7, '', 'Tesorero', '', 2),
(8, '', 'Administrador', '', 2),
(9, '', 'Presidente', '', 3),
(10, '', 'Secretario', '', 3),
(11, '', 'Tesorero', '', 3),
(12, '', 'Administrador', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `subtitulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `imagen_path` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odontograma`
--

CREATE TABLE `odontograma` (
  `id_odontograma` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `path` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `fk_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `odontograma`
--

INSERT INTO `odontograma` (`id_odontograma`, `nombre`, `path`, `created_at`, `fk_paciente`) VALUES
(4, 'dvbb', 'upload/odontogramas/dvbb_077585bd594783d9549eae9553b03896.png', '2023-02-15 23:41:36', 20),
(7, 'Ernesto', 'upload/odontogramas/Ernesto_bc3d99dbf01c570baccce04f7a27f5a7.pdf', '2023-05-16 04:38:31', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ortodoncia`
--

CREATE TABLE `ortodoncia` (
  `id_ortodoncia` int(11) NOT NULL,
  `id_doctor` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `diagnostico` varchar(250) NOT NULL,
  `anclaje_superior` varchar(250) NOT NULL,
  `anclaje_inferior` varchar(250) NOT NULL,
  `nota` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ortodoncia`
--

INSERT INTO `ortodoncia` (`id_ortodoncia`, `id_doctor`, `id_paciente`, `fecha_inicio`, `fecha_final`, `diagnostico`, `anclaje_superior`, `anclaje_inferior`, `nota`) VALUES
(1, 1, 1, '2023-05-15', '2023-05-17', 'el diagnostico fue malo', '32 puntos', '2 puntos', 'no hay notas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `direccion` text NOT NULL,
  `edad` text NOT NULL,
  `correo` text NOT NULL,
  `telefono` text NOT NULL,
  `fk_doctor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `nombre`, `direccion`, `edad`, `correo`, `telefono`, `fk_doctor`) VALUES
(5, 'Juan Perez Huerta', 'Revolucion #104', '16', 'juan@juan.com', '6184568923', 0),
(31, 'paciente1', '13', 'calle1', 'admin@admin.com', '6181234567', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id_reporte` int(11) NOT NULL,
  `fraccionamiento` text NOT NULL,
  `guardia` text NOT NULL,
  `clave_guardia` text NOT NULL,
  `horario` text NOT NULL,
  `incidente` text NOT NULL,
  `rondin` text NOT NULL,
  `fk_fraccionamiento` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id_reporte`, `fraccionamiento`, `guardia`, `clave_guardia`, `horario`, `incidente`, `rondin`, `fk_fraccionamiento`, `created_at`) VALUES
(4, 'Fracc', 'Guardia', '3424234', 'Mañana', 'Nada', '', 1, '2022-12-08 06:57:56'),
(5, 'Fracc', 'Guardia', '1234', 'Mañana', 'Nada', '', 1, '2022-12-08 07:00:26'),
(6, 'Fracc', 'Guardia', '34242342', 'Mañana', 'Nada', '', 1, '2022-12-08 07:01:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `nombre` text NOT NULL,
  `rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `password`, `nombre`, `rol`) VALUES
(1, 'admin@admin.com', '1234', 'Administrador Uno', 'admin'),
(2, 'admin@admin.com', 'Seguridad2100!', 'Administrador Dos', 'caja');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id_album`);

--
-- Indices de la tabla `album_imagen`
--
ALTER TABLE `album_imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `archivo_ortodoncia`
--
ALTER TABLE `archivo_ortodoncia`
  ADD PRIMARY KEY (`id_archivo`);

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indices de la tabla `evolucion`
--
ALTER TABLE `evolucion`
  ADD PRIMARY KEY (`id_evolucion`);

--
-- Indices de la tabla `fraccionamiento`
--
ALTER TABLE `fraccionamiento`
  ADD PRIMARY KEY (`id_fraccionamiento`);

--
-- Indices de la tabla `guardias`
--
ALTER TABLE `guardias`
  ADD PRIMARY KEY (`id_guardia`),
  ADD KEY `fk_fraccionamiento` (`fk_fraccionamiento`);

--
-- Indices de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mesa_directiva`
--
ALTER TABLE `mesa_directiva`
  ADD PRIMARY KEY (`id_mesadirectiva`),
  ADD KEY `fk_fraccionamiento` (`fk_fraccionamiento`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  ADD PRIMARY KEY (`id_odontograma`);

--
-- Indices de la tabla `ortodoncia`
--
ALTER TABLE `ortodoncia`
  ADD PRIMARY KEY (`id_ortodoncia`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `fk_fraccionamiento` (`fk_fraccionamiento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `album_imagen`
--
ALTER TABLE `album_imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `archivo_ortodoncia`
--
ALTER TABLE `archivo_ortodoncia`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id_doctor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `evolucion`
--
ALTER TABLE `evolucion`
  MODIFY `id_evolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fraccionamiento`
--
ALTER TABLE `fraccionamiento`
  MODIFY `id_fraccionamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `guardias`
--
ALTER TABLE `guardias`
  MODIFY `id_guardia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `historiaclinica`
--
ALTER TABLE `historiaclinica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `mesa_directiva`
--
ALTER TABLE `mesa_directiva`
  MODIFY `id_mesadirectiva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `odontograma`
--
ALTER TABLE `odontograma`
  MODIFY `id_odontograma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `ortodoncia`
--
ALTER TABLE `ortodoncia`
  MODIFY `id_ortodoncia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `guardias`
--
ALTER TABLE `guardias`
  ADD CONSTRAINT `guardias_ibfk_1` FOREIGN KEY (`fk_fraccionamiento`) REFERENCES `fraccionamiento` (`id_fraccionamiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mesa_directiva`
--
ALTER TABLE `mesa_directiva`
  ADD CONSTRAINT `mesa_directiva_ibfk_1` FOREIGN KEY (`fk_fraccionamiento`) REFERENCES `fraccionamiento` (`id_fraccionamiento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
