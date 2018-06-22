-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-06-2018 a las 10:49:38
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albaran`
--

DROP TABLE IF EXISTS `albaran`;
CREATE TABLE IF NOT EXISTS `albaran` (
  `Id_albaran` int(11) NOT NULL AUTO_INCREMENT,
  `Fid_factura` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Comentario` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_albaran`),
  KEY `Fid_factura` (`Fid_factura`),
  KEY `Id_albaran` (`Id_albaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `Id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(355) CHARACTER SET latin1 NOT NULL,
  `Direccion` varchar(355) CHARACTER SET latin1 NOT NULL,
  `Telefono` varchar(355) CHARACTER SET latin1 NOT NULL,
  `Email` varchar(355) CHARACTER SET latin1 NOT NULL,
  `NIF` varchar(50) CHARACTER SET latin1 NOT NULL,
  `Poblacion` varchar(255) CHARACTER SET latin1 NOT NULL,
  `Provincia` varchar(80) CHARACTER SET latin1 NOT NULL,
  `Codigopostal` int(10) NOT NULL,
  `Fax` int(11) NOT NULL,
  `Web` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Fecha_alta` date NOT NULL,
  `Estado` varchar(3) NOT NULL,
  PRIMARY KEY (`Id_cliente`),
  KEY `Id_cliente` (`Id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactocliente`
--

DROP TABLE IF EXISTS `contactocliente`;
CREATE TABLE IF NOT EXISTS `contactocliente` (
  `Id_cc` int(11) NOT NULL AUTO_INCREMENT,
  `fid_cliente` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Cargo` varchar(100) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_cc`),
  KEY `Id_cc` (`Id_cc`),
  KEY `fid_cliente` (`fid_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactocliente`
--

INSERT INTO `contactocliente` (`Id_cc`, `fid_cliente`, `Nombre`, `Cargo`, `Telefono`, `Email`) VALUES
(1, 0, 'clientea', 'encargado', 666333333, 'clientea@empresaa.com'),
(2, 0, 'clienteb', 'CMO', 666222222, 'clienteb@empresab.com'),
(3, 0, 'clientec', 'encargado', 666322233, 'clientec@empresac.com'),
(4, 0, 'cliented', 'CMO', 666221122, 'cliented@empresad.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactoproveedor`
--

DROP TABLE IF EXISTS `contactoproveedor`;
CREATE TABLE IF NOT EXISTS `contactoproveedor` (
  `Id_cp` int(11) NOT NULL AUTO_INCREMENT,
  `Fid_proveedor` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Cargo` varchar(100) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_cp`),
  KEY `Id_cp` (`Id_cp`),
  KEY `Fid_proveedor` (`Fid_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactoproveedor`
--

INSERT INTO `contactoproveedor` (`Id_cp`, `Fid_proveedor`, `Nombre`, `Cargo`, `Telefono`, `Email`) VALUES
(1, 0, 'proveedor1', 'encargado', 666123123, 'proveedor1@empresa1.com'),
(2, 0, 'proveedor2', 'CFO', 666545699, 'proveedor2@empresa2.com'),
(3, 0, 'proveedor3', 'encargado', 666123123, 'proveedor3@empresa3.com'),
(4, 0, 'proveedor4', 'CFO', 666545699, 'proveedor4@empresa4.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturaemitida`
--

DROP TABLE IF EXISTS `facturaemitida`;
CREATE TABLE IF NOT EXISTS `facturaemitida` (
  `Id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `Fid_venta` int(11) NOT NULL,
  `Fecha` int(11) NOT NULL,
  `Importe` int(11) NOT NULL,
  PRIMARY KEY (`Id_factura`),
  KEY `Id_factura` (`Id_factura`),
  KEY `Fid_proyecto` (`Fid_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturarecibida`
--

DROP TABLE IF EXISTS `facturarecibida`;
CREATE TABLE IF NOT EXISTS `facturarecibida` (
  `Id_factura` int(11) NOT NULL AUTO_INCREMENT,
  `Fid_pedido` int(11) NOT NULL,
  `Fid_albaran` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Importetotal` int(11) NOT NULL,
  `Codepartidaeco` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_factura`),
  KEY `Id_factura` (`Id_factura`),
  KEY `Fid_pedido` (`Fid_pedido`),
  KEY `Fid_albaran` (`Fid_albaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulariopreguntas`
--

DROP TABLE IF EXISTS `formulariopreguntas`;
CREATE TABLE IF NOT EXISTS `formulariopreguntas` (
  `Id_formulario` int(11) NOT NULL AUTO_INCREMENT,
  `Fid_formulario` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Pregunta1` varchar(255) NOT NULL,
  `Pregunta2` int(255) NOT NULL,
  `Pregunta3` varchar(255) NOT NULL,
  `Pregunta4` varchar(255) NOT NULL,
  `Pregunta5` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_formulario`),
  KEY `Id_formulario` (`Id_formulario`),
  KEY `Fid_formulario` (`Fid_formulario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulariorespuestas`
--

DROP TABLE IF EXISTS `formulariorespuestas`;
CREATE TABLE IF NOT EXISTS `formulariorespuestas` (
  `Id_form_resp` int(11) NOT NULL AUTO_INCREMENT,
  `Fid_clientes` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Respuesta1` varchar(255) NOT NULL,
  `Respuesta2` int(255) NOT NULL,
  `Respuesta3` varchar(255) NOT NULL,
  `Respuesta4` varchar(255) NOT NULL,
  `Respuesta5` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_form_resp`),
  KEY `Id_formulario` (`Id_form_resp`),
  KEY `Fid_clientes` (`Fid_clientes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `home`
--

DROP TABLE IF EXISTS `home`;
CREATE TABLE IF NOT EXISTS `home` (
  `Id_home` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Texto` varchar(355) NOT NULL,
  `Imagen` varchar(355) NOT NULL,
  `Fid_usuario` int(11) NOT NULL,
  PRIMARY KEY (`Id_home`),
  KEY `Id_home` (`Id_home`),
  KEY `Fid_usuario` (`Fid_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineapedido`
--

DROP TABLE IF EXISTS `lineapedido`;
CREATE TABLE IF NOT EXISTS `lineapedido` (
  `Id_lineapedido` int(11) NOT NULL AUTO_INCREMENT,
  `Fid_pedido` int(11) NOT NULL,
  `Artículo` varchar(200) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Referencia` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Estado` varchar(150) NOT NULL,
  PRIMARY KEY (`Id_lineapedido`),
  KEY `Id_lineapedido` (`Id_lineapedido`),
  KEY `Fid_pedido` (`Fid_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `navbar`
--

DROP TABLE IF EXISTS `navbar`;
CREATE TABLE IF NOT EXISTS `navbar` (
  `Id_navbar` int(11) NOT NULL AUTO_INCREMENT,
  `seccion` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_navbar`),
  KEY `Id_navbar` (`Id_navbar`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `navbar`
--

INSERT INTO `navbar` (`Id_navbar`, `seccion`) VALUES
(1, 'Home'),
(2, 'Ventas'),
(3, 'Compras'),
(4, 'Formularios'),
(5, 'HHRR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `Id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `Fid_proveedor` int(11) NOT NULL,
  `Fid_usuario` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Comentario` varchar(255) NOT NULL,
  `Firma` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_pedido`),
  KEY `Id_compra` (`Id_pedido`),
  KEY `Fid_proveedor` (`Fid_proveedor`),
  KEY `Fid_user` (`Fid_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE IF NOT EXISTS `proveedor` (
  `Id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(355) NOT NULL,
  `Direccion` varchar(355) NOT NULL,
  `Telefono` int(50) NOT NULL,
  `Email` varchar(355) NOT NULL,
  `NIF` int(15) NOT NULL,
  `Poblacion` varchar(100) NOT NULL,
  `Provincia` varchar(100) NOT NULL,
  `Codigopostal` int(10) NOT NULL,
  `Fax` int(15) NOT NULL,
  `Web` varchar(100) NOT NULL,
  `Fechaalta` date NOT NULL,
  PRIMARY KEY (`Id_proveedor`),
  KEY `Id_proveedor` (`Id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Id_proveedor`, `Nombre`, `Direccion`, `Telefono`, `Email`, `NIF`, `Poblacion`, `Provincia`, `Codigopostal`, `Fax`, `Web`, `Fechaalta`) VALUES
(1, 'empresa1', 'calle empresa1, vng', 666456987, 'info@empresa1.com', 34453321, 'vng', 'bcn', 8800, 938154433, 'www.empresa1.com', '2018-06-01'),
(2, 'empresa2', 'calle empresa2, vng', 666436987, 'info@empresa2.com', 34411321, 'vng', 'bcn', 8800, 938158833, 'www.empresa2.com', '2018-06-03'),
(3, 'empresa3', 'calle empresa2, vng', 666432287, 'info@empresa3.com', 34419921, 'vng', 'bcn', 8800, 938100833, 'www.empresa3.com', '2018-06-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `Id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `Fid_usuario` int(11) NOT NULL,
  `Fid_navbar` int(11) NOT NULL,
  PRIMARY KEY (`Id_rol`),
  KEY `Fid_usuario` (`Fid_usuario`),
  KEY `Fid_nabvar` (`Fid_navbar`),
  KEY `Id_rol` (`Id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`Id_rol`, `Fid_usuario`, `Fid_navbar`) VALUES
(1, 13, 2),
(2, 13, 4),
(3, 12, 2),
(4, 12, 3),
(5, 11, 5),
(6, 11, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `Id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `User` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Nombre` varchar(9) NOT NULL,
  `Apellidos` varchar(355) NOT NULL,
  `Telefono` int(25) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Direccion` varchar(355) NOT NULL,
  PRIMARY KEY (`Id_usuario`),
  KEY `Id_usuario` (`Id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `User`, `Password`, `Nombre`, `Apellidos`, `Telefono`, `Email`, `Direccion`) VALUES
(11, 'pepito', '81dc9bdb52d04dc20036dbd8313ed055', 'Pepito', 'Grillo', 666666666, 'pepito@proyectofinal.com', 'calle pepito, vng'),
(12, 'loli', '81dc9bdb52d04dc20036dbd8313ed055', 'Loli', 'Flores', 666555555, 'loli@proyectofinal.com', 'calle loli, vng'),
(13, 'fulanito', '81dc9bdb52d04dc20036dbd8313ed055', 'Fulanito', 'funeral', 655444444, 'fulanito@proyectofinal.com', 'calle fulanito, vng');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

DROP TABLE IF EXISTS `venta`;
CREATE TABLE IF NOT EXISTS `venta` (
  `Id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `Fid_cliente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Articulo` varchar(355) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Importe` int(11) NOT NULL,
  `Fichero` varchar(150) NOT NULL,
  PRIMARY KEY (`Id_venta`),
  KEY `Id_compra` (`Id_venta`),
  KEY `Fid_proveedor` (`Fid_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturaemitida`
--
ALTER TABLE `facturaemitida`
  ADD CONSTRAINT `facturaemitida_ibfk_1` FOREIGN KEY (`Fid_venta`) REFERENCES `venta` (`Id_venta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturarecibida`
--
ALTER TABLE `facturarecibida`
  ADD CONSTRAINT `facturarecibida_ibfk_1` FOREIGN KEY (`Fid_albaran`) REFERENCES `albaran` (`Id_albaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `facturarecibida_ibfk_2` FOREIGN KEY (`Fid_pedido`) REFERENCES `lineapedido` (`Id_lineapedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formulariopreguntas`
--
ALTER TABLE `formulariopreguntas`
  ADD CONSTRAINT `formulariopreguntas_ibfk_1` FOREIGN KEY (`Fid_formulario`) REFERENCES `formulariorespuestas` (`Id_form_resp`);

--
-- Filtros para la tabla `formulariorespuestas`
--
ALTER TABLE `formulariorespuestas`
  ADD CONSTRAINT `formulariorespuestas_ibfk_1` FOREIGN KEY (`Fid_clientes`) REFERENCES `cliente` (`Id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `home`
--
ALTER TABLE `home`
  ADD CONSTRAINT `home_ibfk_1` FOREIGN KEY (`Fid_usuario`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lineapedido`
--
ALTER TABLE `lineapedido`
  ADD CONSTRAINT `lineapedido_ibfk_1` FOREIGN KEY (`Fid_pedido`) REFERENCES `pedido` (`Id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`Fid_proveedor`) REFERENCES `proveedor` (`Id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_ibfk_1` FOREIGN KEY (`Fid_usuario`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_ibfk_2` FOREIGN KEY (`Fid_navbar`) REFERENCES `navbar` (`Id_navbar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`Fid_cliente`) REFERENCES `cliente` (`Id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
