-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2023 a las 07:31:56
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mr_potato`
--
CREATE DATABASE IF NOT EXISTS `mr_potato` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mr_potato`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(1) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Bebidas', 'Son bebidas', 1),
(21, 'comida', 'Es comida', 1),
(29, 'prueba', 'sdf', 0),
(31, 'prueba', '123', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detalle` int(1) NOT NULL,
  `id_venta` int(1) NOT NULL,
  `id_product` int(1) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`id_detalle`, `id_venta`, `id_product`, `cantidad`) VALUES
(7, 8, 31, 1),
(10, 9, 34, 3),
(11, 10, 31, 2),
(12, 10, 34, 2),
(15, 12, 32, 5),
(16, 12, 31, 5),
(17, 13, 32, 1),
(18, 15, 31, 1),
(22, 18, 34, 1),
(25, 19, 32, 3),
(26, 20, 31, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(1) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `area_trabajo` varchar(25) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `contrasena` varchar(150) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `nombres`, `apellidos`, `area_trabajo`, `usuario`, `contrasena`, `estado`) VALUES
(8, 'Jerson', 'Mejia', 'Gerencia', 'jerson', '/AaY1nrZCgoTbs1ZwFoNVg==', 1),
(9, 'Angelica', 'Perez', 'Atencion', 'angelica', '/AaY1nrZCgoTbs1ZwFoNVg==', 1),
(10, 'Daniel', 'Martínez', 'Administracion', 'daniel', '/AaY1nrZCgoTbs1ZwFoNVg==', 1),
(11, 'prueba', 'prueba', 'Gerencia', 'abc', '+Hnn1Uty660Vt7910znZQg==', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(1) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stok` int(5) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `id_categoria` int(1) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `precio`, `stok`, `imagen`, `id_categoria`, `estado`) VALUES
(31, 'Limonada', '1.50', 100, 'sandia.jpg', 1, 1),
(32, 'Hamburguesa', '8.00', 50, 'radish.jpg', 21, 1),
(34, 'Papas', '3.80', 25, 'papita.jpeg', 21, 1),
(35, 'gfbrf', '15.00', 1, 'img5.jpg', 1, 0),
(36, 'prueba', '15.00', 10, 'img5.jpg', 31, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(1) NOT NULL,
  `fecha` datetime NOT NULL,
  `nom_cliente` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL,
  `id_emple` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `fecha`, `nom_cliente`, `estado`, `id_emple`) VALUES
(8, '2023-06-12 23:25:36', 'Daniel', 0, 8),
(9, '2023-06-13 00:28:55', 'Orlando', 3, 8),
(10, '2023-06-13 00:50:57', 'Sofia', 3, 8),
(11, '2023-06-13 00:52:59', 'Nicolas', 0, 8),
(12, '2023-06-13 00:57:52', 'Margarita', 3, 8),
(13, '2023-06-13 01:23:22', 'Camilo', 1, 8),
(14, '2023-06-13 01:23:33', 'Camilo', 1, 8),
(15, '2023-06-13 01:28:04', 'a', 1, 8),
(16, '2023-06-13 01:29:02', 'Miguel', 1, 8),
(17, '2023-06-13 01:31:19', 'Pedro', 1, 8),
(18, '2023-06-13 01:33:50', 'Ronald', 1, 8),
(19, '2023-06-13 01:35:43', 'Daniel', 1, 8),
(20, '2023-06-18 16:48:46', 'Daniel M', 1, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `prod_detalle` (`id_product`),
  ADD KEY `vent_detalle` (`id_venta`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `cat_prod` (`id_categoria`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `emp_vent` (`id_emple`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `id_detalle` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `prod_detalle` FOREIGN KEY (`id_product`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vent_detalle` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `cat_prod` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `emp_vent` FOREIGN KEY (`id_emple`) REFERENCES `empleado` (`id_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
