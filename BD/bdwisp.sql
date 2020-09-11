-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2020 a las 02:30:42
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdwisp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antena`
--

CREATE TABLE `antena` (
  `idAntena` int(11) NOT NULL,
  `nombreAntena` varchar(45) NOT NULL,
  `modeloAntena` varchar(45) DEFAULT NULL,
  `modoAntena` varchar(45) DEFAULT NULL,
  `ipAntena` varchar(20) NOT NULL,
  `usuarioAntena` varchar(45) DEFAULT NULL,
  `claveAntena` varchar(45) DEFAULT NULL,
  `macAntena` varchar(17) DEFAULT NULL,
  `lugarAntena` varchar(45) DEFAULT NULL,
  `cliente_idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombreCliente` varchar(45) NOT NULL,
  `telefonoCliente` int(9) DEFAULT NULL,
  `direccionCliente` varchar(45) DEFAULT NULL,
  `fechInicPerioCliente` date DEFAULT NULL,
  `fechFinPerioCliente` date DEFAULT NULL,
  `apCliente` varchar(45) DEFAULT NULL,
  `tarifa_idTarifa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobante`
--

CREATE TABLE `comprobante` (
  `idCom` int(11) NOT NULL,
  `fechaCom` datetime NOT NULL,
  `periodoCom` varchar(45) DEFAULT NULL,
  `montoCom` decimal(7,2) DEFAULT NULL,
  `saldoCom` decimal(7,2) DEFAULT NULL,
  `usuario_idUsuario` int(11) NOT NULL,
  `cliente_idCliente` int(11) NOT NULL,
  `usuario_idUsuario1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `pais`, `edad`) VALUES
(1, 'Maria', 'Colombia', 52),
(2, 'Wilfredo', 'Colombia', 52),
(3, 'Juan', 'Peru', 30),
(6, 'Yeni', 'Chile', 24),
(7, 'Guido', 'Argentina', 29),
(8, 'Luis', 'Panama', 32),
(9, 'Diego', 'Ecuador', 19),
(10, 'Carlos', 'Bolivia', 28),
(11, 'Ricardo', 'Uruguay', 45),
(12, 'Gabriel', 'Colombia', 35),
(13, 'Jose', 'Panama', 38),
(14, 'Gerardo', 'Guatemala', 41),
(15, 'Nilo', 'Honduras', 25),
(16, 'Vanesa', 'UU. EE', 25),
(17, 'Jhunior', 'Brasil', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `idTarifa` int(11) NOT NULL,
  `nombreTarifa` varchar(45) NOT NULL,
  `descargarTarifa` varchar(45) DEFAULT NULL,
  `subidaTarifa` varchar(45) DEFAULT NULL,
  `precioTarifa` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`idTarifa`, `nombreTarifa`, `descargarTarifa`, `subidaTarifa`, `precioTarifa`) VALUES
(6, 'Plan Basico', '2MB', '1MB', '20.00'),
(7, 'Plan Hogar', '4MB', '2MB', '40.00'),
(8, 'Plan Negocios', '6MB', '4MB', '60.00'),
(9, 'Plan Premiun', '20MB', '5MB', '100.00'),
(10, 'Plan Dedicado', '20MB', '15MB', '150.00'),
(11, 'Plan Gamer', '50MB', '50MB', '200.00'),
(12, 'hdg', 'gfhfg', 'gfhgf', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuarioUsuario` varchar(45) NOT NULL,
  `claveUsuario` varchar(45) NOT NULL,
  `nombreUsuario` varchar(45) NOT NULL,
  `telefonoUsuario` int(9) DEFAULT NULL,
  `cargoUsuario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuarioUsuario`, `claveUsuario`, `nombreUsuario`, `telefonoUsuario`, `cargoUsuario`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Wilfredo Andia Salazar', 961562673, 'Administrador'),
(2, 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'Diego Rivera Hurtado', 968562875, 'Vendedor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `antena`
--
ALTER TABLE `antena`
  ADD PRIMARY KEY (`idAntena`),
  ADD UNIQUE KEY `idAntena_UNIQUE` (`idAntena`),
  ADD KEY `fk_antena_cliente_idx` (`cliente_idCliente`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_cliente_tarifa1_idx` (`tarifa_idTarifa`);

--
-- Indices de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD PRIMARY KEY (`idCom`),
  ADD KEY `fk_comprobante_cliente1_idx` (`cliente_idCliente`),
  ADD KEY `fk_comprobante_usuario1_idx` (`usuario_idUsuario1`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`idTarifa`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `antena`
--
ALTER TABLE `antena`
  MODIFY `idAntena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comprobante`
--
ALTER TABLE `comprobante`
  MODIFY `idCom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idTarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `antena`
--
ALTER TABLE `antena`
  ADD CONSTRAINT `fk_antena_cliente` FOREIGN KEY (`cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_tarifa1` FOREIGN KEY (`tarifa_idTarifa`) REFERENCES `tarifa` (`idTarifa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comprobante`
--
ALTER TABLE `comprobante`
  ADD CONSTRAINT `fk_comprobante_cliente1` FOREIGN KEY (`cliente_idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comprobante_usuario1` FOREIGN KEY (`usuario_idUsuario1`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
