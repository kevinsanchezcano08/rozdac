-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2021 a las 05:26:50
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rozdac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `Id` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(750) COLLATE utf8_spanish_ci NOT NULL,
  `photoLogo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `mision` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `vision` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`Id`, `name`, `descripcion`, `photoLogo`, `mision`, `vision`, `user`) VALUES
('cat', 'Cat Negocio', 'tiendita 1', 'default.jpg', 'Aun no sé ha agregado ninguna misión', 'Aun no sé ha agregado ninguna visión', 'Pacumn19'),
('CDB', 'Colegio Don Bosco', 'Colecturia colegio Don Bosco', 'default.jpg', 'Aun no sé ha agregado ninguna misión', 'Aun no sé ha agregado ninguna visión', 'Pacumn19'),
('RZDC', 'Rozdak', 'Es un negocio que busca innovar negocios', 'logotipoRZDC.jpeg', 'Innovar negocios', 'Ser los mejores innovando', 'Pacumn19'),
('SPR', 'Spro Frozen', 'Es una tienda de Frozen', 'logotipoSPR.jpeg', 'Vender Frozen', 'Ser la mejor', 'Pacumn19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `Id` int(11) NOT NULL,
  `user` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `producto` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fechaPedido` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  `photoProduct` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `negocio` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id`, `rol`) VALUES
(1, 'Cliente'),
(2, 'Administrador'),
(3, 'SuperAdministrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `user` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user`, `name`, `fechaNac`, `email`, `password`, `rol`, `telefono`, `direccion`) VALUES
('admin_664', 'Kevin Cano', '2003-01-06', 'kevin.sanchezcano2002@gmail.com', '$2y$10$7DZpU5EpcSXiPL.mUZAd7eft9MXqO5bss0PkAYk8/sLQyG4TZRJXu', 2, '76253266', 'Cerca del lago, Sonzacate, Sonsonate'),
('Pacumn19', 'Jeffry Franco', '2003-02-19', 'jeffryenrique@gmail.com', '$2y$10$VqvWurV4IaVAmNBfEK.8CeZTdtaTKnJWOmz0QurlCz.G3aX1nf8Xe', 1, '12345678', ''),
('superadmin_546', 'JoseGuzman', '2021-08-10', 'joseG@outlook.com', '$2y$10$1P2T/Bklqv0nrpvC0BpjAOziELjt.jY1/yJHyfHlm/s7WTnXqhjbu', 3, '56789086', 'cerca del volcan, Santa Elena, Usulután'),
('user1', 'marco colocho', '2004-09-09', 'marco@outlook.com', '$2y$10$iBgHWDaYdAvGcoJuy2vpYOixkhUug3JvbpplPAiER3YD8.1Zyscdm', 1, '45678902', 'calle al mirador #34, Candelaria, Cuscatlán');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user` (`user`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `user` (`user`),
  ADD KEY `producto` (`producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `negocio` (`negocio`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD CONSTRAINT `negocio_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`user`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`user`) REFERENCES `user` (`user`),
  ADD CONSTRAINT `pedidos_ibfk_4` FOREIGN KEY (`producto`) REFERENCES `productos` (`Id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`negocio`) REFERENCES `negocio` (`Id`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
