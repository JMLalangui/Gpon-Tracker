-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2025 a las 22:53:49
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `gpon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_eq` int(11) NOT NULL,
  `nombre_eq` varchar(70) DEFAULT NULL,
  `modelo_eq` varchar(20) DEFAULT NULL,
  `sn_eq` varchar(40) DEFAULT NULL,
  `componentes_eq` varchar(200) DEFAULT NULL,
  `observacion_eq` varchar(200) DEFAULT NULL,
  `id_mar` int(11) DEFAULT NULL,
  `id_ti` int(11) DEFAULT NULL,
  `id_est` int(11) DEFAULT NULL,
  `id_nod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `estado` (
  `id_est` int(11) NOT NULL,
  `estado_est` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_est`, `estado_est`) VALUES
(1, 'NUEVO'),
(2, 'ERP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ip`
--

CREATE TABLE `ip` (
  `id_ip` int(11) NOT NULL,
  `ip_ip` varchar(80) DEFAULT NULL,
  `id_eq` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
--

CREATE TABLE `marca` (
  `id_mar` int(11) NOT NULL,
  `marca_mar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_mar`, `marca_mar`) VALUES
(1, 'TP LINK'),
(2, 'HUAWEI'),
(3, 'V-SOL'),
(4, 'HP'),
(5, 'CISCO'),
(6, 'MIKROTIK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nodo`
--

CREATE TABLE `nodo` (
  `id_nod` int(11) NOT NULL,
  `nombre_nod` varchar(150) DEFAULT NULL,
  `direccion_nod` varchar(300) DEFAULT NULL,
  `coordenada_nod` varchar(50) DEFAULT NULL,
  `nombre_referencia_uno_nod` varchar(90) DEFAULT NULL,
  `numero_referencia_uno_nod` varchar(50) DEFAULT NULL,
  `nombre_referencia_dos_nod` varchar(90) DEFAULT NULL,
  `numero_referencia_dos_nod` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
--

CREATE TABLE `tipo` (
  `id_ti` int(11) NOT NULL,
  `tipo_ti` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_ti`, `tipo_ti`) VALUES
(1, 'OLT'),
(2, 'SERVIDOR'),
(3, 'SWITCH'),
(4, 'ROUTER'),
(5, 'VIP'),
(6, 'BACKUP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombres` varchar(150) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `password_user` text DEFAULT NULL,
  `token` text DEFAULT NULL,
  `fh_creacion` datetime DEFAULT NULL,
  `fh_actualizacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
--

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_eq`),
  ADD KEY `R_12` (`id_mar`),
  ADD KEY `R_13` (`id_ti`),
  ADD KEY `R_14` (`id_est`),
  ADD KEY `R_16` (`id_nod`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_est`);

--
-- Indices de la tabla `ip`
--
ALTER TABLE `ip`
  ADD PRIMARY KEY (`id_ip`),
  ADD KEY `R_15` (`id_eq`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_mar`);

--
-- Indices de la tabla `nodo`
--
ALTER TABLE `nodo`
  ADD PRIMARY KEY (`id_nod`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_ti`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_eq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ip`
--
ALTER TABLE `ip`
  MODIFY `id_ip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_mar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `nodo`
--
ALTER TABLE `nodo`
  MODIFY `id_nod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id_ti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `R_12` FOREIGN KEY (`id_mar`) REFERENCES `marca` (`id_mar`),
  ADD CONSTRAINT `R_13` FOREIGN KEY (`id_ti`) REFERENCES `tipo` (`id_ti`),
  ADD CONSTRAINT `R_14` FOREIGN KEY (`id_est`) REFERENCES `estado` (`id_est`),
  ADD CONSTRAINT `R_16` FOREIGN KEY (`id_nod`) REFERENCES `nodo` (`id_nod`);

--
-- Filtros para la tabla `ip`
--
ALTER TABLE `ip`
  ADD CONSTRAINT `R_15` FOREIGN KEY (`id_eq`) REFERENCES `equipo` (`id_eq`);
COMMIT;
