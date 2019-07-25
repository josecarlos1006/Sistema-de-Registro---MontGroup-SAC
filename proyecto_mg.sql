-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-07-2019 a las 18:51:18
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_mg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre_p` varchar(80) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_cp` date NOT NULL,
  `hora_cp` time NOT NULL,
  `fecha_mp` date NOT NULL,
  `hora_mp` time NOT NULL,
  `descripcion_p` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre_p`, `precio`, `cantidad`, `fecha_cp`, `hora_cp`, `fecha_mp`, `hora_mp`, `descripcion_p`) VALUES
(130049, 'Lapiz', '11', 10, '2019-07-25', '04:19:37', '2019-07-25', '04:19:37', 'Lapiz 2B'),
(130051, 'Teclados', '60', 23, '2019-07-25', '07:08:47', '2019-07-25', '10:04:33', 'Teclados Gamer con luces led'),
(130052, 'Lapiz', '2', 5, '2019-07-25', '09:55:04', '2019-07-25', '09:55:04', 'Lapiz 2B'),
(130053, 'Teclados', '60', 10, '2019-07-25', '09:57:44', '2019-07-25', '09:57:44', 'Teclados Gamer con luces led');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `nombre_s` varchar(80) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `fecha_cs` date NOT NULL,
  `hora_cs` time NOT NULL,
  `fecha_ms` date NOT NULL,
  `hora_ms` time NOT NULL,
  `descripcion_s` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `nombre_s`, `precio`, `fecha_cs`, `hora_cs`, `fecha_ms`, `hora_ms`, `descripcion_s`) VALUES
(140011, 'Limpieza de CPU', '120', '2019-07-25', '07:04:18', '2019-07-25', '07:04:18', 'Se realiza limpieza profunda al CPU y sus componentes'),
(140012, 'Cambio de Pantalla', '120', '2019-07-25', '09:58:36', '2019-07-25', '09:58:36', 'Se recibe pantalla rota y se cambia por una nueva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipousuario` int(11) NOT NULL,
  `tipousuario` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipousuario`, `tipousuario`) VALUES
(110001, 'Gerente'),
(110002, 'SubGerente'),
(110004, 'Supervisor'),
(110005, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `id_tipousuario` int(11) NOT NULL,
  `nombre_u` varchar(80) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `clave` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_tipousuario`, `nombre_u`, `usuario`, `clave`) VALUES
(120001, 110001, 'Ricardo Perez Martinez', 'ricardo123', 'gerente001'),
(120002, 110002, 'Maria Lopez Mendoza', 'maria123', 'subgerente123'),
(120004, 110005, 'Juan Manuel Rodriguez Palomino', 'juan123', 'admin123'),
(120005, 110004, 'Romina Pacheco Mendoza', 'romina123', 'supervisor123');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipousuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `id_tipousuario` (`id_tipousuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130055;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140014;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110006;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120006;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipousuario`) REFERENCES `tipo_usuario` (`id_tipousuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
