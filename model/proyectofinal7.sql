-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2018 a las 11:58:50
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

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
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `Id_cliente` int(11) NOT NULL,
  `Nombre` varchar(355) NOT NULL,
  `Direccion` varchar(355) NOT NULL,
  `Telefono` varchar(355) NOT NULL,
  `Email` varchar(355) NOT NULL,
  `NIF` varchar(50) NOT NULL,
  `Poblacion` varchar(255) NOT NULL,
  `Provincia` varchar(80) NOT NULL,
  `Codigopostal` int(10) NOT NULL,
  `Fax` int(11) NOT NULL,
  `Web` varchar(100) NOT NULL,
  `Fecha_alta` date NOT NULL,
  `Activo` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_cliente`, `Nombre`, `Direccion`, `Telefono`, `Email`, `NIF`, `Poblacion`, `Provincia`, `Codigopostal`, `Fax`, `Web`, `Fecha_alta`, `Activo`) VALUES
(1, 'cliente a', 'direccion a', '123123123', 'sdfsd@gmail.com', '123123123', 'vva bcn', 'bcn', 8800, 322343, 'www.asasd.com', '2018-06-21', ''),
(2, 'cliente a', 'direccion a', '123123123', 'sdfsd@gmail.com', '123123123', 'vva bcn', 'bcn', 8800, 322343, 'www.asasd.com', '2018-06-21', ''),
(3, 'Palillos de madera S.L.', 'Bosques de Tarragona, 5', '5559966', 'palillos@gmail.com', '55555123', 'Tarragona', 'Tarragona', 3010, 555123456, 'www.palillosdemadera.com', '2018-06-13', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_contacto`
--

DROP TABLE IF EXISTS `cliente_contacto`;
CREATE TABLE `cliente_contacto` (
  `Id_cc` int(11) NOT NULL,
  `fid_cliente` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Cargo` varchar(100) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente_contacto`
--

INSERT INTO `cliente_contacto` (`Id_cc`, `fid_cliente`, `Nombre`, `Cargo`, `Telefono`, `Email`) VALUES
(1, 1, 'clientea', 'encargado', 666333333, 'clientea@empresaa.com'),
(2, 1, 'clienteb', 'CMO', 666222222, 'clienteb@empresab.com'),
(3, 1, 'clientec', 'encargado', 666322233, 'clientec@empresac.com'),
(4, 1, 'cliented', 'CMO', 666221122, 'cliented@empresad.com'),
(5, 3, 'Antonio Felipe de Miguel Collado', 'Encargado de riego por manguera', 555123789, 'palillomanguera@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_factura`
--

DROP TABLE IF EXISTS `cliente_factura`;
CREATE TABLE `cliente_factura` (
  `Id_factura` int(11) NOT NULL,
  `fid_cliente` int(11) NOT NULL,
  `fid_lineaventa` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Importe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente_factura`
--

INSERT INTO `cliente_factura` (`Id_factura`, `fid_cliente`, `fid_lineaventa`, `Fecha`, `Importe`) VALUES
(1, 1, 2, '2018-06-20', 100),
(2, 2, 4, '2018-06-20', 60),
(3, 1, 2, '2018-05-01', 3456),
(4, 3, 1, '2018-06-20', 200),
(5, 1, 2, '2018-06-22', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_lineaventa`
--

DROP TABLE IF EXISTS `cliente_lineaventa`;
CREATE TABLE `cliente_lineaventa` (
  `Id_lineapedido` int(11) NOT NULL,
  `Fid_venta` int(11) NOT NULL,
  `articulo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente_lineaventa`
--

INSERT INTO `cliente_lineaventa` (`Id_lineapedido`, `Fid_venta`, `articulo`) VALUES
(1, 1, ''),
(2, 1, ''),
(3, 3, ''),
(4, 4, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_venta`
--

DROP TABLE IF EXISTS `cliente_venta`;
CREATE TABLE `cliente_venta` (
  `Id_venta` int(11) NOT NULL,
  `Fid_cliente` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Articulo` varchar(355) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Importe` int(11) NOT NULL,
  `Fichero` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente_venta`
--

INSERT INTO `cliente_venta` (`Id_venta`, `Fid_cliente`, `Fecha`, `Articulo`, `Cantidad`, `Importe`, `Fichero`) VALUES
(1, 2, '2018-06-20', 'webminator', 1, 600, 'pepi_nillo.txt'),
(2, 1, '2018-06-11', 'hostingator', 2, 400, 'Gri_llo.doc'),
(3, 3, '2018-06-13', 'paletaminator', 23, 2334, ''),
(4, 3, '2018-06-13', 'pizarrator', 23, 30, 'pizarra.img');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

DROP TABLE IF EXISTS `formulario`;
CREATE TABLE `formulario` (
  `Id_formulario` int(11) NOT NULL,
  `Fid_clientes` int(11) NOT NULL,
  `Fecha_envio` date NOT NULL,
  `Fecha_respuesta` date DEFAULT NULL,
  `Comentario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`Id_formulario`, `Fid_clientes`, `Fecha_envio`, `Fecha_respuesta`, `Comentario`) VALUES
(1, 3, '2018-06-22', NULL, 'comentario ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_preguntas`
--

DROP TABLE IF EXISTS `formulario_preguntas`;
CREATE TABLE `formulario_preguntas` (
  `Id_preguntas` int(11) NOT NULL,
  `Fid_formulario` int(11) NOT NULL,
  `Pregunta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `formulario_preguntas`
--

INSERT INTO `formulario_preguntas` (`Id_preguntas`, `Fid_formulario`, `Pregunta`) VALUES
(1, 1, 'Grado satisfaccion?'),
(2, 1, 'Donde vive?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario_respuestas`
--

DROP TABLE IF EXISTS `formulario_respuestas`;
CREATE TABLE `formulario_respuestas` (
  `Id_respuestas` int(11) NOT NULL,
  `Fid_formulario` int(11) NOT NULL,
  `Fid_pregunta` int(11) NOT NULL,
  `Respuesta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `formulario_respuestas`
--

INSERT INTO `formulario_respuestas` (`Id_respuestas`, `Fid_formulario`, `Fid_pregunta`, `Respuesta`) VALUES
(1, 1, 2, 'en mi casa'),
(2, 1, 1, 'Toy bien');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `Id_proveedor` int(11) NOT NULL,
  `Nombre` varchar(355) NOT NULL,
  `Direccion_p` varchar(355) NOT NULL,
  `Telefono_p` int(50) NOT NULL,
  `Email_p` varchar(355) NOT NULL,
  `NIF` int(15) NOT NULL,
  `Poblacion_p` varchar(100) NOT NULL,
  `Provincia_p` varchar(100) NOT NULL,
  `Codigopostal_p` int(10) NOT NULL,
  `Fax` int(15) NOT NULL,
  `Web` varchar(100) NOT NULL,
  `Fechaalta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Id_proveedor`, `Nombre`, `Direccion_p`, `Telefono_p`, `Email_p`, `NIF`, `Poblacion_p`, `Provincia_p`, `Codigopostal_p`, `Fax`, `Web`, `Fechaalta`) VALUES
(1, 'empresa1', 'calle empresa1, vng', 666456987, 'info@empresa1.com', 34453321, 'vng', 'bcn', 8800, 938154433, 'www.empresa1.com', '2018-06-01'),
(2, 'empresa2', 'calle empresa2, vng', 666436987, 'info@empresa2.com', 34411321, 'vng', 'bcn', 8800, 938158833, 'www.empresa2.com', '2018-06-03'),
(3, 'perico de los palotes', 'calle empresa2, vng', 666432287, 'info@empresa3.com', 34419921, 'vng', 'bcn', 8800, 938100833, 'www.empresa3.com', '2018-06-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_albaran`
--

DROP TABLE IF EXISTS `proveedor_albaran`;
CREATE TABLE `proveedor_albaran` (
  `Id_albaran` int(11) NOT NULL,
  `Fid_factura` int(11) NOT NULL,
  `Fecha_alb` date NOT NULL,
  `cantidad_alb` int(30) NOT NULL,
  `Comentario_alb` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor_albaran`
--

INSERT INTO `proveedor_albaran` (`Id_albaran`, `Fid_factura`, `Fecha_alb`, `cantidad_alb`, `Comentario_alb`) VALUES
(1, 1, '2018-06-13', 100, 'lapices'),
(2, 2, '2018-06-11', 200, 'gomas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_compra`
--

DROP TABLE IF EXISTS `proveedor_compra`;
CREATE TABLE `proveedor_compra` (
  `Id_pedido` int(11) NOT NULL,
  `Fid_proveedor` int(11) NOT NULL,
  `Fid_usuario` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Comentario` varchar(255) NOT NULL,
  `Firma` varchar(100) NOT NULL,
  `Estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor_compra`
--

INSERT INTO `proveedor_compra` (`Id_pedido`, `Fid_proveedor`, `Fid_usuario`, `Fecha`, `Comentario`, `Firma`, `Estado`) VALUES
(1, 1, 12, '2018-06-12', 'pedido 1', 'lolilla', 'fin'),
(2, 3, 12, '2018-06-03', 'pedido 2', 'lolo', 'archivada'),
(3, 1, 11, '2018-05-07', 'otro mas al bote', 'pe pito', 'falta material'),
(4, 3, 13, '2018-06-07', 'ni fu ni fa', 'fu fu', 'tramitada'),
(5, 3, 11, '2018-06-07', 'comentario', 'fimado', 'tramitada'),
(6, 1, 13, '2018-05-01', 'Airbus 900 4e', 'aireado', 'falta material'),
(7, 2, 11, '2018-06-01', 'varcha', 'varcharte', 'en tramite'),
(10, 3, 14, '2018-06-13', 'hola Mark como estas', 'Groucho Mark', 'en tramite');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_contacto`
--

DROP TABLE IF EXISTS `proveedor_contacto`;
CREATE TABLE `proveedor_contacto` (
  `Id_cp` int(11) NOT NULL,
  `Fid_proveedor` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Cargo` varchar(100) NOT NULL,
  `Telefono` int(15) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor_contacto`
--

INSERT INTO `proveedor_contacto` (`Id_cp`, `Fid_proveedor`, `Nombre`, `Cargo`, `Telefono`, `Email`) VALUES
(1, 1, 'proveedor1', 'encargado', 666123123, 'proveedor1@empresa1.com'),
(2, 2, 'proveedor2', 'CFO', 666545699, 'proveedor2@empresa2.com'),
(3, 1, 'proveedor3', 'encargado', 666123123, 'proveedor3@empresa3.com'),
(4, 3, 'proveedor4', 'CFO', 666545699, 'proveedor4@empresa4.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_factura`
--

DROP TABLE IF EXISTS `proveedor_factura`;
CREATE TABLE `proveedor_factura` (
  `Id_factura` int(11) NOT NULL,
  `Fid_pedido` int(11) NOT NULL,
  `Fecha_fra` date NOT NULL,
  `Cantidad_fra` int(11) NOT NULL,
  `Importetotal` int(11) NOT NULL,
  `Codepartidaeco` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor_factura`
--

INSERT INTO `proveedor_factura` (`Id_factura`, `Fid_pedido`, `Fecha_fra`, `Cantidad_fra`, `Importetotal`, `Codepartidaeco`) VALUES
(1, 5, '2018-05-01', 0, 100, 'Partida estadistica 1'),
(2, 6, '2018-06-03', 0, 200, 'partida estadistica 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor_lineapedido`
--

DROP TABLE IF EXISTS `proveedor_lineapedido`;
CREATE TABLE `proveedor_lineapedido` (
  `Id_lineapedido` int(11) NOT NULL,
  `Fid_compra` int(11) NOT NULL,
  `Articulo` varchar(200) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Referencia` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor_lineapedido`
--

INSERT INTO `proveedor_lineapedido` (`Id_lineapedido`, `Fid_compra`, `Articulo`, `Cantidad`, `Referencia`, `Descripcion`) VALUES
(1, 5, 'art 1 ', 1, 'asdfgsadfasdf', 'lorem ipsum'),
(2, 5, 'art 2', 23, 'vsvzxcvxzcv', 'lorem ipsuma'),
(3, 4, 'other more 1', 67, 'fdgdfhfdh', 'lorem ipsum B'),
(4, 3, 'other more 2', 65, 'sfddfghfgh', 'lorem impsum C'),
(5, 10, 'Articulo 2', 1, 'Ref patatpum', 'San juan'),
(6, 10, 'Articulo 2', 2, 'Ref 2 de articulo 2', 'San Miguel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `Id_usuario` int(11) NOT NULL,
  `User` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Nombre` varchar(9) NOT NULL,
  `Apellidos` varchar(355) NOT NULL,
  `Telefono` int(25) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Direccion` varchar(355) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `User`, `Password`, `Nombre`, `Apellidos`, `Telefono`, `Email`, `Direccion`) VALUES
(11, 'pepito', '81dc9bdb52d04dc20036dbd8313ed055', 'Pepito', 'Grillo', 666666666, 'pepito@proyectofinal.com', 'calle pepito, vng'),
(12, 'loli', '81dc9bdb52d04dc20036dbd8313ed055', 'Loli', 'Flores', 666555555, 'loli@proyectofinal.com', 'calle loli, vng'),
(13, 'fulanito', '81dc9bdb52d04dc20036dbd8313ed055', 'Fulanito', 'funeral', 655444444, 'fulanito@proyectofinal.com', 'calle fulanito, vng'),
(14, 'Mark', '81dc9bdb52d04dc20036dbd8313ed055', 'Marco', 'Antonio', 5559345, 'marco@proyectofinal.com', 'Calle Sarti. vilanova. BCN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_home`
--

DROP TABLE IF EXISTS `usuario_home`;
CREATE TABLE `usuario_home` (
  `Id_home` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Contenidor` varchar(355) NOT NULL,
  `Fid_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_home`
--

INSERT INTO `usuario_home` (`Id_home`, `Fecha`, `Contenidor`, `Fid_usuario`) VALUES
(1, '2018-06-20', 'pirmera home', 13),
(2, '2018-06-21', 'segunda home', 11),
(3, '2018-06-03', 'Home principal de nuestra empresa', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_navbar`
--

DROP TABLE IF EXISTS `usuario_navbar`;
CREATE TABLE `usuario_navbar` (
  `Id_navbar` int(11) NOT NULL,
  `seccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_navbar`
--

INSERT INTO `usuario_navbar` (`Id_navbar`, `seccion`) VALUES
(1, 'Home'),
(2, 'Ventas'),
(3, 'Compras'),
(4, 'Formularios'),
(5, 'Usuaris'),
(6, 'Clientes'),
(7, 'Proveidors');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol`
--

DROP TABLE IF EXISTS `usuario_rol`;
CREATE TABLE `usuario_rol` (
  `Id_rol` int(11) NOT NULL,
  `Fid_usuario` int(11) NOT NULL,
  `Fid_navbar` int(11) NOT NULL,
  `Fid_data_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_rol`
--

INSERT INTO `usuario_rol` (`Id_rol`, `Fid_usuario`, `Fid_navbar`, `Fid_data_rol`) VALUES
(1, 13, 2, 1),
(2, 13, 4, 1),
(3, 12, 2, 2),
(4, 12, 3, 2),
(5, 11, 5, 1),
(6, 11, 4, 2),
(7, 14, 1, 1),
(8, 14, 2, 1),
(9, 14, 3, 1),
(10, 14, 4, 1),
(11, 14, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_rol_data`
--

DROP TABLE IF EXISTS `usuario_rol_data`;
CREATE TABLE `usuario_rol_data` (
  `Id_rol` int(11) NOT NULL,
  `Rol` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario_rol_data`
--

INSERT INTO `usuario_rol_data` (`Id_rol`, `Rol`) VALUES
(1, 'R'),
(2, 'W');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_cliente`),
  ADD KEY `Id_cliente` (`Id_cliente`);

--
-- Indices de la tabla `cliente_contacto`
--
ALTER TABLE `cliente_contacto`
  ADD PRIMARY KEY (`Id_cc`),
  ADD KEY `Id_cc` (`Id_cc`),
  ADD KEY `fid_cliente` (`fid_cliente`);

--
-- Indices de la tabla `cliente_factura`
--
ALTER TABLE `cliente_factura`
  ADD PRIMARY KEY (`Id_factura`),
  ADD KEY `Id_factura` (`Id_factura`),
  ADD KEY `fid_cliente` (`fid_cliente`),
  ADD KEY `fid_lineaventa` (`fid_lineaventa`);

--
-- Indices de la tabla `cliente_lineaventa`
--
ALTER TABLE `cliente_lineaventa`
  ADD PRIMARY KEY (`Id_lineapedido`),
  ADD KEY `Id_lineapedido` (`Id_lineapedido`),
  ADD KEY `Fid_venta` (`Fid_venta`);

--
-- Indices de la tabla `cliente_venta`
--
ALTER TABLE `cliente_venta`
  ADD PRIMARY KEY (`Id_venta`),
  ADD KEY `Id_compra` (`Id_venta`),
  ADD KEY `Fid_proveedor` (`Fid_cliente`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD PRIMARY KEY (`Id_formulario`),
  ADD KEY `Id_formulario` (`Id_formulario`),
  ADD KEY `Fid_clientes` (`Fid_clientes`);

--
-- Indices de la tabla `formulario_preguntas`
--
ALTER TABLE `formulario_preguntas`
  ADD PRIMARY KEY (`Id_preguntas`),
  ADD KEY `Fid_formulario` (`Fid_formulario`);

--
-- Indices de la tabla `formulario_respuestas`
--
ALTER TABLE `formulario_respuestas`
  ADD PRIMARY KEY (`Id_respuestas`),
  ADD KEY `Fid_formulario` (`Fid_formulario`),
  ADD KEY `fid_preguntas` (`Fid_pregunta`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Id_proveedor`),
  ADD KEY `Id_proveedor` (`Id_proveedor`);

--
-- Indices de la tabla `proveedor_albaran`
--
ALTER TABLE `proveedor_albaran`
  ADD PRIMARY KEY (`Id_albaran`),
  ADD KEY `Fid_factura` (`Fid_factura`),
  ADD KEY `Id_albaran` (`Id_albaran`);

--
-- Indices de la tabla `proveedor_compra`
--
ALTER TABLE `proveedor_compra`
  ADD PRIMARY KEY (`Id_pedido`),
  ADD KEY `Id_compra` (`Id_pedido`),
  ADD KEY `Fid_proveedor` (`Fid_proveedor`),
  ADD KEY `Fid_user` (`Fid_usuario`);

--
-- Indices de la tabla `proveedor_contacto`
--
ALTER TABLE `proveedor_contacto`
  ADD PRIMARY KEY (`Id_cp`),
  ADD KEY `Id_cp` (`Id_cp`),
  ADD KEY `Fid_proveedor` (`Fid_proveedor`);

--
-- Indices de la tabla `proveedor_factura`
--
ALTER TABLE `proveedor_factura`
  ADD PRIMARY KEY (`Id_factura`),
  ADD KEY `Id_factura` (`Id_factura`),
  ADD KEY `Fid_pedido` (`Fid_pedido`);

--
-- Indices de la tabla `proveedor_lineapedido`
--
ALTER TABLE `proveedor_lineapedido`
  ADD PRIMARY KEY (`Id_lineapedido`),
  ADD KEY `Id_lineapedido` (`Id_lineapedido`),
  ADD KEY `Fid_pedido` (`Fid_compra`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD KEY `Id_usuario` (`Id_usuario`);

--
-- Indices de la tabla `usuario_home`
--
ALTER TABLE `usuario_home`
  ADD PRIMARY KEY (`Id_home`),
  ADD KEY `Id_home` (`Id_home`),
  ADD KEY `Fid_usuario` (`Fid_usuario`);

--
-- Indices de la tabla `usuario_navbar`
--
ALTER TABLE `usuario_navbar`
  ADD PRIMARY KEY (`Id_navbar`),
  ADD KEY `Id_navbar` (`Id_navbar`);

--
-- Indices de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`Id_rol`),
  ADD KEY `Fid_usuario` (`Fid_usuario`),
  ADD KEY `Fid_nabvar` (`Fid_navbar`),
  ADD KEY `Id_rol` (`Id_rol`),
  ADD KEY `fid_data_rol` (`Fid_data_rol`);

--
-- Indices de la tabla `usuario_rol_data`
--
ALTER TABLE `usuario_rol_data`
  ADD PRIMARY KEY (`Id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cliente_contacto`
--
ALTER TABLE `cliente_contacto`
  MODIFY `Id_cc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente_factura`
--
ALTER TABLE `cliente_factura`
  MODIFY `Id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cliente_lineaventa`
--
ALTER TABLE `cliente_lineaventa`
  MODIFY `Id_lineapedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente_venta`
--
ALTER TABLE `cliente_venta`
  MODIFY `Id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `formulario`
--
ALTER TABLE `formulario`
  MODIFY `Id_formulario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `formulario_preguntas`
--
ALTER TABLE `formulario_preguntas`
  MODIFY `Id_preguntas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `formulario_respuestas`
--
ALTER TABLE `formulario_respuestas`
  MODIFY `Id_respuestas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `Id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor_albaran`
--
ALTER TABLE `proveedor_albaran`
  MODIFY `Id_albaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor_compra`
--
ALTER TABLE `proveedor_compra`
  MODIFY `Id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedor_contacto`
--
ALTER TABLE `proveedor_contacto`
  MODIFY `Id_cp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proveedor_factura`
--
ALTER TABLE `proveedor_factura`
  MODIFY `Id_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor_lineapedido`
--
ALTER TABLE `proveedor_lineapedido`
  MODIFY `Id_lineapedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuario_home`
--
ALTER TABLE `usuario_home`
  MODIFY `Id_home` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario_navbar`
--
ALTER TABLE `usuario_navbar`
  MODIFY `Id_navbar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  MODIFY `Id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuario_rol_data`
--
ALTER TABLE `usuario_rol_data`
  MODIFY `Id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente_contacto`
--
ALTER TABLE `cliente_contacto`
  ADD CONSTRAINT `cliente_contacto_ibfk_1` FOREIGN KEY (`fid_cliente`) REFERENCES `cliente` (`Id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente_factura`
--
ALTER TABLE `cliente_factura`
  ADD CONSTRAINT `cliente_factura_ibfk_1` FOREIGN KEY (`fid_cliente`) REFERENCES `cliente` (`Id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cliente_factura_ibfk_2` FOREIGN KEY (`fid_lineaventa`) REFERENCES `cliente_lineaventa` (`Id_lineapedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente_lineaventa`
--
ALTER TABLE `cliente_lineaventa`
  ADD CONSTRAINT `cliente_lineaventa_ibfk_2` FOREIGN KEY (`Fid_venta`) REFERENCES `cliente_venta` (`Id_venta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cliente_venta`
--
ALTER TABLE `cliente_venta`
  ADD CONSTRAINT `cliente_venta_ibfk_1` FOREIGN KEY (`Fid_cliente`) REFERENCES `cliente` (`Id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formulario`
--
ALTER TABLE `formulario`
  ADD CONSTRAINT `formulario_ibfk_1` FOREIGN KEY (`Fid_clientes`) REFERENCES `cliente` (`Id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formulario_preguntas`
--
ALTER TABLE `formulario_preguntas`
  ADD CONSTRAINT `formulario_preguntas_ibfk_1` FOREIGN KEY (`Fid_formulario`) REFERENCES `formulario` (`Id_formulario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `formulario_respuestas`
--
ALTER TABLE `formulario_respuestas`
  ADD CONSTRAINT `formulario_respuestas_ibfk_1` FOREIGN KEY (`Fid_formulario`) REFERENCES `formulario` (`Id_formulario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `formulario_respuestas_ibfk_2` FOREIGN KEY (`Fid_pregunta`) REFERENCES `formulario_preguntas` (`Id_preguntas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor_albaran`
--
ALTER TABLE `proveedor_albaran`
  ADD CONSTRAINT `proveedor_albaran_ibfk_1` FOREIGN KEY (`Fid_factura`) REFERENCES `proveedor_factura` (`Id_factura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor_compra`
--
ALTER TABLE `proveedor_compra`
  ADD CONSTRAINT `proveedor_compra_ibfk_1` FOREIGN KEY (`Fid_proveedor`) REFERENCES `proveedor` (`Id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proveedor_compra_ibfk_2` FOREIGN KEY (`Fid_usuario`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor_contacto`
--
ALTER TABLE `proveedor_contacto`
  ADD CONSTRAINT `proveedor_contacto_ibfk_1` FOREIGN KEY (`Fid_proveedor`) REFERENCES `proveedor` (`Id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor_factura`
--
ALTER TABLE `proveedor_factura`
  ADD CONSTRAINT `proveedor_factura_ibfk_2` FOREIGN KEY (`Fid_pedido`) REFERENCES `proveedor_lineapedido` (`Id_lineapedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proveedor_lineapedido`
--
ALTER TABLE `proveedor_lineapedido`
  ADD CONSTRAINT `proveedor_lineapedido_ibfk_1` FOREIGN KEY (`Fid_compra`) REFERENCES `proveedor_compra` (`Id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_home`
--
ALTER TABLE `usuario_home`
  ADD CONSTRAINT `usuario_home_ibfk_1` FOREIGN KEY (`Fid_usuario`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `usuario_rol_ibfk_1` FOREIGN KEY (`Fid_usuario`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_rol_ibfk_2` FOREIGN KEY (`Fid_navbar`) REFERENCES `usuario_navbar` (`Id_navbar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_rol_ibfk_3` FOREIGN KEY (`Fid_data_rol`) REFERENCES `usuario_rol_data` (`Id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
