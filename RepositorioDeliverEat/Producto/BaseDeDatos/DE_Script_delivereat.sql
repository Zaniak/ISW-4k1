-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-09-2018 a las 15:20:21
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `delivereat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_comercio_adherido`
--

CREATE TABLE `t_comercio_adherido` (
  `id_comercio` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `direccion` varchar(40) DEFAULT NULL,
  `imagen_url` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_comercio_adherido`
--

INSERT INTO `t_comercio_adherido` (`id_comercio`, `nombre`, `descripcion`, `direccion`, `imagen_url`) VALUES
(1, 'Que rico !', 'Comercio de Pizzas, Lomos y Empanadas', 'Av Colon 1428', 'www.fideosquerico.com.ar/facebook.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_detalles_pedido`
--

CREATE TABLE `t_detalles_pedido` (
  `id_detalle_pedido` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` float(5,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_formas_de_pago`
--

CREATE TABLE `t_formas_de_pago` (
  `id_forma_de_pago` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_formas_de_pago`
--

INSERT INTO `t_formas_de_pago` (`id_forma_de_pago`, `nombre`) VALUES
(1, 'Visa'),
(2, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_pedido`
--

CREATE TABLE `t_pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_detalle_pedido` int(11) DEFAULT NULL,
  `id_forma_de_pago` int(11) DEFAULT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `domicilio_de_entrega` varchar(40) DEFAULT NULL,
  `fecha_hora_entrega` varchar(40) DEFAULT NULL,
  `con_cuanto_paga` float(5,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_productos`
--

CREATE TABLE `t_productos` (
  `id_producto` int(11) NOT NULL,
  `id_comercio` int(11) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `precio` decimal(3,0) DEFAULT NULL,
  `peso` decimal(3,3) DEFAULT NULL,
  `imagen_url` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_productos`
--

INSERT INTO `t_productos` (`id_producto`, `id_comercio`, `descripcion`, `nombre`, `precio`, `peso`, `imagen_url`) VALUES
(1, 1, 'jamon crudo, rucula, queso, salsa de tomate, tomate cherry', 'Pizza de Rucula y Jamon Crudo', '150', '0.800', 'https://www.cucinare.tv/wp-content/uploads/2017/10/JAMON-CRUDO-Y-RUCULA-2.jpg'),
(2, 1, 'Queso muzzarela y oregano', 'Pizza de Muzzarela', '120', '0.700', 'http://locosxlapizza.com/wp-content/uploads/2015/02/pizza-mozzarella-receta-locosxlapizza-locos-x-la-pizza.jpg'),
(3, 1, 'carne picada', 'empanada de carne', '20', '0.200', 'https://comidasperuanas.net/wp-content/uploads/2016/09/Empanadas-Peruanas-de-Carne-730x430.jpg'),
(4, 1, 'jamon cocido y queso muzzarela', 'empanada de jamon y queso', '25', '0.150', 'http://ilsole.com.ar/wp-content/uploads/2016/07/empanadas-jamon-queso-sin-tacc-sin-gluten-il-sole.jpg'),
(5, 1, 'jamon cocido, queso, huevo, lechuga, tomate, lomo, mayonesa', 'Lomito', '220', '0.950', 'https://www.elliberal.com.ar/fotos/cache/notas/2016/04/18/715x402_253065_20160418122618.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_comercio_adherido`
--
ALTER TABLE `t_comercio_adherido`
  ADD PRIMARY KEY (`id_comercio`);

--
-- Indices de la tabla `t_detalles_pedido`
--
ALTER TABLE `t_detalles_pedido`
  ADD PRIMARY KEY (`id_detalle_pedido`),
  ADD KEY `fk_producto` (`id_producto`);

--
-- Indices de la tabla `t_formas_de_pago`
--
ALTER TABLE `t_formas_de_pago`
  ADD PRIMARY KEY (`id_forma_de_pago`);

--
-- Indices de la tabla `t_pedido`
--
ALTER TABLE `t_pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_detalle_pedido` (`id_detalle_pedido`),
  ADD KEY `fk_forma_de_pago` (`id_forma_de_pago`);

--
-- Indices de la tabla `t_productos`
--
ALTER TABLE `t_productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_comercio` (`id_comercio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_comercio_adherido`
--
ALTER TABLE `t_comercio_adherido`
  MODIFY `id_comercio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_detalles_pedido`
--
ALTER TABLE `t_detalles_pedido`
  MODIFY `id_detalle_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_formas_de_pago`
--
ALTER TABLE `t_formas_de_pago`
  MODIFY `id_forma_de_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_pedido`
--
ALTER TABLE `t_pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_productos`
--
ALTER TABLE `t_productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_detalles_pedido`
--
ALTER TABLE `t_detalles_pedido`
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`id_producto`) REFERENCES `t_productos` (`id_producto`);

--
-- Filtros para la tabla `t_pedido`
--
ALTER TABLE `t_pedido`
  ADD CONSTRAINT `fk_detalle_pedido` FOREIGN KEY (`id_detalle_pedido`) REFERENCES `t_detalles_pedido` (`id_detalle_pedido`),
  ADD CONSTRAINT `fk_forma_de_pago` FOREIGN KEY (`id_forma_de_pago`) REFERENCES `t_formas_de_pago` (`id_forma_de_pago`);

--
-- Filtros para la tabla `t_productos`
--
ALTER TABLE `t_productos`
  ADD CONSTRAINT `fk_comercio` FOREIGN KEY (`id_comercio`) REFERENCES `t_comercio_adherido` (`id_comercio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
