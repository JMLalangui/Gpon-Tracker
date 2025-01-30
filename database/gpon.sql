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


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_eq`, `nombre_eq`, `modelo_eq`, `sn_eq`, `componentes_eq`, `observacion_eq`, `id_mar`, `id_ti`, `id_est`, `id_nod`) VALUES
(1, 'Olt-Ascazubi', 'ma5608t', 's/n', '2 tarjeas de 16 puertos (32 tarjetas sfp - 16 B+ slot1, 8B+ y 8C+ slot2)', 'puerto administracion de mcud1 dañado, mcud2 activo - se crea vlan de administracion', 2, 1, 2, 1),
(2, 'SRV-MK-Ascazubi', 'ccr1016', 'C4:AD:34:5F:22:CC', 's/n', 's/n', 6, 2, 1, 1),
(3, 'Olt-Cusubamba', 'ma5608t', 's/n', '2 tarjetas de 8 puertos (ambas con sfp C+)', 's/n', 2, 1, 1, 2),
(4, 'SRV-MK-Cusubamba-Fibra1', 'ccr2116-12G', 'DC:2C:6E:D2:E0:97', 's/n', 's/n', 6, 2, 1, 2),
(5, 'SRV-MK-Cusubamba-Radio', 'rb1100', '4C:5E:0C:6B:B7:97', 's/n', 's/n', 6, 2, 2, 2),
(6, 'SWITCH_CISCO-Oyambarillo', 's/n', 's/n', 's/n', 's/n', 5, 3, 1, 5),
(7, 'Olt-Oyambarillo', 'ma5608t', 's/n', '2 tarjeas de 16 puertos (32 tarjetas sfp - 16 B+ slot1, 8B+ y 8C+ slot2)', 'equipo erp - se hizo un reemplazo motivo que la anterior olt se quemo por las variacion de voltaje presentes por los cortes en el secto', 2, 1, 1, 5),
(8, 'Olt-Yaruqui', 's/n', 's/n', 'Olt vsol de una sola tarjeta', 'Implementacion de nuevo modelo de olt - pendiente obtener resultados', 3, 1, 1, 5),
(9, 'Olt-Pifo', 'ma5608t', 's/n', 'todod los componentes son erp (2 tarjetass 16 puertos - sfp c++ todos erp)', 'Se empela una olt erp - olt anterior quemada por problemas de cortes de luz - tener pendiente las alarmas y las caidas en el sector y en el equipo', 2, 1, 2, 10),
(10, 'Olt-Puembo', 'ma5608t', 's/n', 's/n', 's/n', 2, 1, 1, 10),
(11, 'Olt-Tumbaco', 'ma5808X5', 's/n', 's/n', 'Modlo nuevo de olt mas bandejas para tarjetas - tener en cuenta que este modelo inicio el conteo desde el 1 en la interfaz gpon 0/0 - corregir errores de backup', 2, 1, 1, 6),
(12, 'Olt-Puellaro', 'ma5608t', 's/n', 's/n', 's/n', 2, 1, 1, 11),
(13, 'Olt-Tanda', 's/n', 's/n', 'Olt Vsol de un solo slot - de 8 puertas tarjetas sfp integradas al hardware - tener en cuenta da errores de conexion a dude', 'pruebas de nuevo equipo para nuevo sector - de momento hay 45 clientes de pruebas - dar prioridad a soportes', 3, 1, 1, 12),
(14, 'Olt-Malchingui', 'ma5608t', 's/n', '2 tarjeas Xpon de 16 puertos (32 tarjetas sfp - 16 B+ slot1, 8B+ y 8C+ slot2)', 'tener pendiente la olt esta consumiendo una cantidad inusual de energia - cambio nuevo de tarjetar Gpon por Xpon', 2, 1, 2, 7),
(15, 'Olt-Quinche', 'ma5808X5', 's/n', 's/n', 'Cambio de olt por motivo de crecimiento en la poblacion y los cliente tener pendiente de momento posee 3 slot trabjando con tarjetas b+ solo en la primera tarjeta las demas son c++', 2, 1, 1, 3),
(16, 'Switch-Cisco-El-Quinche', 's/n', 's/n', 's/n', 's/n', 5, 3, 2, 3),
(17, 'SRV-MK-Fibra-Quinche', 'CCR1072', '2C:C8:1B:99:53:E4', 's/n', 's/n', 6, 2, 1, 3),
(18, 'SRV-MK-Radio-Quinche', 'RB1100X4', '4C:5E:0C:6B:B7:97', 's/n', 's/n', 6, 2, 1, 3),
(19, 'SRV-MK-Oyambarillo-Fibra2', 'CCR1072', '2C:C8:1B:EE:F3:57', 's/n', 's/n', 6, 2, 1, 5),
(20, 'SRV-MK-Oyambarillo-Radio', 'RB1100AHx4', '08:55:31:23:EC:22', 's/n', 's/n', 6, 2, 1, 5),
(21, 'SRV-MK-Fibra-Pifo', 'CCR1016', '48:A9:8A:3F:AF:11', 's/n', 's/n', 6, 2, 1, 10),
(22, 'SRV-MK-Fibra-Puembo', 'CCR1009', '74:4D:28:56:F8:C2', 's/n', 's/n', 6, 2, 2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

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
-- Volcado de datos para la tabla `ip`
--

INSERT INTO `ip` (`id_ip`, `ip_ip`, `id_eq`) VALUES
(1, '172.16.12.1', 1),
(2, '45.70.58.17', 2),
(3, '172.11.109.254', 3),
(4, '200.229.146.178', 4),
(5, '200.229.146.179', 5),
(6, '172.11.8.1', 6),
(7, '172.11.8.254', 7),
(8, '172.11.28.254', 8),
(9, '172.11.10.254', 9),
(10, '172.11.29.254', 10),
(11, '172.11.14.254', 11),
(12, '172.11.24.254', 12),
(13, '172.11.31.252', 13),
(14, '192.168.232.254', 14),
(15, '172.15.15.251', 15),
(16, '172.15.15.1', 16),
(17, '45.70.58.11', 17),
(18, '45.70.58.13', 18),
(19, '200.24.139.10', 19),
(20, '190.61.39.43', 20),
(21, '45.70.57.35', 21),
(22, '45.70.57.37', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
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
-- Volcado de datos para la tabla `nodo`
--

INSERT INTO `nodo` (`id_nod`, `nombre_nod`, `direccion_nod`, `coordenada_nod`, `nombre_referencia_uno_nod`, `numero_referencia_uno_nod`, `nombre_referencia_dos_nod`, `numero_referencia_dos_nod`) VALUES
(1, 'Ascazubi', 'Ascazubi, Calles Eloy Alfaro y Guayaquil, lado la cooperativa 16 de julio', '-0.08384, -78.29133', 'SUSANA PAZMIÑO', '0995322774', NULL, NULL),
(2, 'Cusubamba', 'La Y via Cayambe, subida a chaupiestancia calle Ruben Rodriguez', '-0.03990, -78.28084', 'PINEDA PINEDA LUIS ALFREDO', '0993637160', NULL, NULL),
(3, 'Quinche', 'Quinche, Calles Panamerica y Cuenca, frente al colegio Iberoamericano', '-0.11001, -78.29912', 'KLEVER JIMENEZ', '0990600909', NULL, NULL),
(4, 'Guayllabamba', 'Guayllabamba, Calle Simon Bolivar y pasaje Manabi, frente al tia ', '-0.05741, -78.3454', 'S/N', 'S/N', NULL, NULL),
(5, 'Oyambarillo', 'Oyambarillo, Calles Via ferrea y san pedro, lado las bodegas', '-0.19373, -78.33219', 'SEGUNDO FRANCISCO HARO GOMEZ', '2393534 - 0982090390', NULL, NULL),
(6, 'Tumbaco', 'Tumbaco, Calles Nobrero Salazar y Cotopaxi, en la esquina', '-0.2085, -78.39927', 'POR OBTENER', 'POR OBTENER', NULL, NULL),
(7, 'Malchingui', 'Malchingui, Calles Quito y Pedro Moncayo, lado el parque central de Malchingui', '0.0579, -78.3399', 'FLORES FLORES MANUEL MESIAS ', '2158215 - 0986949537', NULL, NULL),
(8, 'San Miguel', 'San Miguel de Oyacoto, Calle Ingapirca, lado de las canchas sinteticas', '-0.09589, -78.40785', 'POR OBTENER', 'POR OBTENER', NULL, NULL),
(9, 'Cocotog', 'Cocotog, Calle Garcia Moreno, al terminar la calle a mano derecha primera casa de 3 pisos', '-0.13892, -78.41273', 'GUALOTO LOACHAMIN LUIS ANTONIO', '2832537 - 0985200923', NULL, NULL),
(10, 'Pifo', 'Pifo, Calle gonzalo pizarro pasando el parque farmacia Don Juanito', '-0.22701, -78.33876', 'CUENCA JUAN JOSE', '0939704495 - 0998443778', NULL, NULL),
(11, 'Puellaro', 'Pinguilla, Calle Principal en la curva casa de 4 piso unica en el lugar ', '0.081, -78.40472', 'POR OBTENER', 'POR OBTENER', NULL, NULL),
(12, 'Tanda', 'Tanda, lado la floricola Family Farm', '-0.00758, -78.33624', 'POR OBTENER', 'POR OBTENER', NULL, NULL),
(13, 'Chaupiestancia', 'Chaupiestancia calle principal lado la unidad educativa Luis Cadena', '-0.03766, -78.2592', 'CARRILLO CAHUEÑAS ROSA', '0988451450', NULL, NULL),
(14, 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba', 'prueba'),
(15, 'nodo prueba ', 'nodo', 'nodo', 'nodo', 'nodo', 'nodo', 'nodo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
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
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `email`, `telefono`, `password_user`, `token`, `fh_creacion`, `fh_actualizacion`) VALUES
(9, 'Joel Lalangui', 'jlalangui@simantec.ec', '0990585750', '$2y$10$be3wkDdWCYEA8kTp6dVGZ.NIc9s4e.v6PubMw7NPJ4S8pPpluZ8hm', NULL, '2024-09-30 11:16:57', NULL),
(13, 'administrador', 'admin@simantec.ec', '0985120995', '$2y$10$h0SwLeQgJ2T6LUCYZihkQegb7.iKx30Ci7uhxjBuwbLGC7ihFbOeC', NULL, '2024-10-02 14:45:59', NULL),
(19, 'Jonathan Carrillo', 'jcarrillos@simantec.ec', '0985390924', '$2y$10$9ZEI6WxCNVU4zWyaIRLSreg9.DMHbd94.AcdQBG3Gm.tyt2o0qnnm', NULL, '2024-10-30 10:41:11', '2024-10-30 10:53:00'),
(20, 'Jonathan Carrillo', 'marcel_jl@hotmail.com', '0990585750', '$2y$10$7bF/fsfhyzqkmiFMIOkehegVAnW.bjDo/ZJZB8jhfx1JU2duRvZRK', NULL, '2024-12-21 18:37:50', NULL),
(21, 'Jonathan Carrillo 233', 'marcel_jl@hotmail.com', '0990585750', '$2y$10$dalLTSToYUr64eCxsXKtB.cid9j3j54AE5sZf.rKiZg8CRDvscw0i', NULL, '2024-12-21 18:38:04', NULL),
(22, 'Jonathan Carrillo 23323456789', 'marcel_jl@hotmail.com', '0990585750', '$2y$10$F4CVzamIzhCiK2Pjy6mDGum6.O6TGbmOoLuoraiynzKFmBOO8xgcu', NULL, '2024-12-21 18:38:14', NULL);

--
-- Índices para tablas volcadas
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
