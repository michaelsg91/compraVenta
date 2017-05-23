-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2017 at 03:29 PM
-- Server version: 10.0.29-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compraVenta`
--

-- --------------------------------------------------------

--
-- Table structure for table `abonoCredito`
--

CREATE TABLE `abonoCredito` (
  `idAbonoCredito` int(11) NOT NULL,
  `fechaAbono` date NOT NULL,
  `valor` double(18,2) NOT NULL,
  `idCredito` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abonoCredito`
--

INSERT INTO `abonoCredito` (`idAbonoCredito`, `fechaAbono`, `valor`, `idCredito`, `idUsuario`) VALUES
(1, '2017-05-19', 200000.00, 1, 1),
(2, '2017-05-21', 250000.00, 1, 4),
(3, '2017-05-22', 250000.00, 1, 4),
(4, '2017-05-22', 80000.00, 2, 3),
(5, '2017-05-23', 200000.00, 3, 1),
(6, '2017-05-23', 200000.00, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `abonoEmpeno`
--

CREATE TABLE `abonoEmpeno` (
  `idAbonoEmpeno` int(11) NOT NULL,
  `fechaAbono` date NOT NULL,
  `valorAbono` double(18,2) NOT NULL,
  `idEmpeno` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abonoEmpeno`
--

INSERT INTO `abonoEmpeno` (`idAbonoEmpeno`, `fechaAbono`, `valorAbono`, `idEmpeno`, `idUsuario`) VALUES
(1, '2017-05-19', 50000.00, 1, 1),
(2, '2017-05-21', 50000.00, 1, 4),
(3, '2017-05-22', 50000.00, 1, 4),
(4, '2017-05-23', 100000.00, 12, 3),
(5, '2017-05-23', 120000.00, 14, 3),
(6, '2017-05-23', 300000.00, 13, 1),
(7, '2017-05-23', 100000.00, 18, 1);

-- --------------------------------------------------------

--
-- Table structure for table `articulo`
--

CREATE TABLE `articulo` (
  `idArticulo` int(11) NOT NULL,
  `peso` double(18,2) DEFAULT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `idTipoArticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articulo`
--

INSERT INTO `articulo` (`idArticulo`, `peso`, `fecha`, `nombre`, `idTipoArticulo`) VALUES
(1, 95.00, '2017-05-16', 'Cadena', 1),
(2, NULL, '2017-04-12', 'Televisor', 3),
(3, 30.00, '2017-03-24', 'Anillo', 1),
(4, 12.00, '2017-05-12', 'Manilla', 2),
(5, NULL, '2017-03-23', 'Celular', 3),
(6, NULL, '2017-05-16', 'Equipo', 3),
(7, NULL, '2017-05-12', 'Computador', 3),
(8, NULL, '2017-02-02', 'Portatil', 3),
(9, 35.00, '2017-05-13', 'Cadena', 2),
(10, NULL, '2017-05-16', 'Celular', 3),
(11, 95.00, '2017-05-11', 'Cadena', 1),
(12, NULL, '2017-04-18', 'Televisor', 3),
(13, 30.00, '2017-03-06', 'Anillo', 1),
(14, 12.00, '2017-05-01', 'Manilla', 2),
(15, NULL, '2017-03-22', 'Celular', 3),
(16, NULL, '2017-05-02', 'Equipo', 3),
(17, NULL, '2017-05-12', 'Computador', 3),
(18, NULL, '2017-02-23', 'Portatil', 3),
(19, 35.00, '2017-05-04', 'Cadena', 2),
(20, NULL, '2017-05-11', 'Celular', 3),
(21, 95.00, '2017-05-09', 'Cadena', 1),
(22, NULL, '2017-04-08', 'Televisor', 3),
(23, 30.00, '2017-03-08', 'Anillo', 1),
(24, 12.00, '2017-05-08', 'Manilla', 2),
(25, NULL, '2017-03-02', 'Celular', 3),
(26, NULL, '2017-05-01', 'Equipo', 3),
(27, NULL, '2017-05-10', 'Computador', 3),
(28, NULL, '2017-02-10', 'Portatil', 3),
(29, 35.00, '2017-05-04', 'Cadena', 2),
(30, NULL, '2017-05-04', 'Celular', 3),
(31, 23.00, '2017-05-19', 'Reloj', 1),
(32, 100.00, '2017-05-22', 'Portatol Toshiba', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ciudad`
--

CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ciudad`
--

INSERT INTO `ciudad` (`idCiudad`, `nombre`) VALUES
(1, 'Bogotá'),
(2, 'Medellín'),
(3, 'Cali'),
(4, 'Bucaramanga'),
(5, 'Barranquilla'),
(6, 'Cartagena');

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `cedula` int(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `idCiudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`idCliente`, `cedula`, `nombre`, `apellido`, `telefono`, `idCiudad`) VALUES
(1, 1122929233, 'Andres', 'Perez', 2289998, 1),
(2, 1122334455, 'Maria', 'Garzon', 2235421, 2),
(3, 1133224433, 'Cristian', 'Rojas', 3344444, 3),
(4, 1122949455, 'Ligia', 'Martinez', 2449375, 4),
(5, 1122030399, 'Nelson', 'Perdomo', 3442323, 5),
(6, 1184737499, 'Antonia', 'Zapata', 2385739, 1);

-- --------------------------------------------------------

--
-- Table structure for table `credito`
--

CREATE TABLE `credito` (
  `idCredito` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idInventario` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `valor` double(18,2) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credito`
--

INSERT INTO `credito` (`idCredito`, `idCliente`, `idUsuario`, `idInventario`, `fechaInicio`, `fechaFin`, `valor`, `estado`) VALUES
(1, 2, 1, 2, '2017-05-19', '2017-08-19', 700000.00, 'finalizado'),
(2, 3, 4, 4, '2017-05-22', '2017-05-23', 150000.00, 'vencido'),
(3, 2, 3, 10, '2017-05-22', '2017-07-21', 300000.00, 'credito'),
(4, 3, 1, 8, '2017-05-23', '2017-07-21', 550000.00, 'credito');

-- --------------------------------------------------------

--
-- Table structure for table `detalleVenta`
--

CREATE TABLE `detalleVenta` (
  `idDetalleVenta` int(11) NOT NULL,
  `idVenta` int(11) DEFAULT NULL,
  `idInventario` int(11) NOT NULL,
  `idCredito` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detalleVenta`
--

INSERT INTO `detalleVenta` (`idDetalleVenta`, `idVenta`, `idInventario`, `idCredito`) VALUES
(1, 1, 1, NULL),
(2, NULL, 2, 1),
(3, 2, 15, NULL),
(4, NULL, 4, 2),
(5, NULL, 10, 3),
(6, 3, 5, NULL),
(7, 4, 7, NULL),
(8, NULL, 8, 4),
(9, 5, 14, NULL),
(10, 6, 6, NULL),
(11, 7, 23, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `empenos`
--

CREATE TABLE `empenos` (
  `idEmpeno` int(11) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `fechaRetiro` date NOT NULL,
  `valorEmpeno` double(18,2) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idArticulo` int(11) NOT NULL,
  `valorRecibir` double(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empenos`
--

INSERT INTO `empenos` (`idEmpeno`, `fechaIngreso`, `fechaRetiro`, `valorEmpeno`, `estado`, `idUsuario`, `idCliente`, `idArticulo`, `valorRecibir`) VALUES
(1, '2017-05-19', '2017-07-13', 100000.00, 'finalizado', 1, 4, 21, 150000.00),
(12, '2017-05-21', '2017-07-20', 120000.00, 'empeno', 4, 1, 23, 200000.00),
(13, '2017-05-21', '2017-06-16', 400000.00, 'empeno', 4, 4, 22, 550000.00),
(14, '2017-05-21', '2017-07-21', 260000.00, 'empeno', 4, 5, 25, 340000.00),
(15, '2017-05-22', '2017-05-23', 300000.00, 'vencido', 4, 6, 26, 400000.00),
(16, '2017-05-22', '2017-05-21', 300000.00, 'vencido', 4, 1, 27, 400000.00),
(17, '2017-05-22', '2017-05-20', 250000.00, 'vencido', 4, 1, 32, 350000.00),
(18, '2017-05-22', '2017-05-31', 100000.00, 'empeno', 3, 2, 30, 200000.00),
(19, '2017-05-23', '2017-07-22', 300000.00, 'empeno', 1, 2, 28, 450000.00);

-- --------------------------------------------------------

--
-- Table structure for table `inventario`
--

CREATE TABLE `inventario` (
  `idInventario` int(11) NOT NULL,
  `fechaCompra` date NOT NULL,
  `valorCompra` double(18,2) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `idArticulo` int(11) NOT NULL,
  `valorVender` double(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventario`
--

INSERT INTO `inventario` (`idInventario`, `fechaCompra`, `valorCompra`, `estado`, `idArticulo`, `valorVender`) VALUES
(1, '2017-05-16', 50000.00, 'venta', 1, 800000.00),
(2, '2017-04-12', 500000.00, 'credito', 2, 700000.00),
(3, '2017-03-24', 120000.00, 'inventario', 3, 300000.00),
(4, '2017-05-12', 70000.00, 'credito', 4, 150000.00),
(5, '2017-03-23', 400000.00, 'venta', 5, 600000.00),
(6, '2017-05-16', 250000.00, 'venta', 6, 400000.00),
(7, '2017-05-12', 500000.00, 'venta', 7, 800000.00),
(8, '2017-02-02', 340000.00, 'credito', 8, 450000.00),
(9, '2017-05-13', 450000.00, 'inventario', 9, 750000.00),
(10, '2017-05-16', 200000.00, 'credito', 10, 300000.00),
(11, '2017-05-11', 80000.00, 'inventario', 11, 150000.00),
(12, '2017-04-18', 350000.00, 'inventario', 12, 500000.00),
(13, '2017-03-06', 200000.00, 'inventario', 13, 340000.00),
(14, '2017-05-01', 40000.00, 'venta', 14, 110000.00),
(15, '2017-03-22', 150000.00, 'venta', 15, 210000.00),
(16, '2017-05-02', 180000.00, 'inventario', 16, 250000.00),
(17, '2017-05-12', 430000.00, 'inventario', 17, 720000.00),
(18, '2017-02-23', 210000.00, 'inventario', 18, 370000.00),
(19, '2017-05-04', 340000.00, 'inventario', 19, 520000.00),
(20, '2017-05-11', 120000.00, 'inventario', 20, 280000.00),
(22, '2017-05-21', 50000.00, 'inventario', 24, 100000.00),
(23, '2017-05-22', 300000.00, 'venta', 27, 400000.00);

-- --------------------------------------------------------

--
-- Table structure for table `saldos`
--

CREATE TABLE `saldos` (
  `idSaldos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `valor` double(18,2) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saldos`
--

INSERT INTO `saldos` (`idSaldos`, `fecha`, `valor`, `tipo`) VALUES
(1, '2017-05-18', 800000.00, 'venta'),
(2, '2017-05-19', 200000.00, 'abonoCredito'),
(3, '2017-05-19', 100000.00, 'empeno'),
(4, '2017-05-19', 50000.00, 'abonoEmpeno'),
(5, '2017-05-21', 250000.00, 'abonoCredito'),
(6, '2017-05-21', 120000.00, 'empeno'),
(7, '2017-05-21', 400000.00, 'empeno'),
(8, '2017-05-21', 50000.00, 'abonoEmpeno'),
(9, '2017-05-21', 260000.00, 'empeno'),
(10, '2017-05-22', 210000.00, 'venta'),
(11, '2017-05-22', 250000.00, 'abonoCredito'),
(12, '2017-05-22', 300000.00, 'empeno'),
(13, '2017-05-22', 50000.00, 'abonoEmpeno'),
(14, '2017-05-22', 300000.00, 'empeno'),
(15, '2017-05-22', 250000.00, 'empeno'),
(16, '2017-05-22', 100000.00, 'empeno'),
(17, '2017-05-22', 80000.00, 'abonoCredito'),
(18, '2017-05-23', 100000.00, 'abonoEmpeno'),
(19, '2017-05-23', 120000.00, 'abonoEmpeno'),
(20, '2017-05-23', 300000.00, 'abonoEmpeno'),
(21, '2017-05-23', 600000.00, 'venta'),
(22, '2017-05-23', 800000.00, 'venta'),
(23, '2017-05-23', 100000.00, 'abonoEmpeno'),
(24, '2017-05-23', 300000.00, 'empeno'),
(25, '2017-05-23', 110000.00, 'venta'),
(26, '2017-05-23', 400000.00, 'venta'),
(27, '2017-05-23', 400000.00, 'venta'),
(28, '2017-05-23', 200000.00, 'abonoCredito'),
(29, '2017-05-23', 200000.00, 'abonoCredito');

-- --------------------------------------------------------

--
-- Table structure for table `tipoArticulo`
--

CREATE TABLE `tipoArticulo` (
  `idTipoArticulo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipoArticulo`
--

INSERT INTO `tipoArticulo` (`idTipoArticulo`, `nombre`) VALUES
(1, 'Oro'),
(2, 'Chatarra'),
(3, 'Varios');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `cedula` int(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fechaCreado` date NOT NULL,
  `fechaRetiro` date DEFAULT NULL,
  `activo` tinyint(4) NOT NULL,
  `online` tinyint(4) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `cedula`, `password`, `fechaCreado`, `fechaRetiro`, `activo`, `online`, `usuario`, `nombre`, `apellido`) VALUES
(1, 1122848433, '$2y$12$vJjPX1MSZt8SxQl4ttOPMOkh9/NHhCBMT9QpBm5B2WR1Pucrn9W3.', '2017-05-18', NULL, 1, 1, 'administrador', 'Michael', 'Saldarriaga'),
(2, 1122848422, '$2y$12$jySJvS54QwOAAH4MfnNBBubXis0v4kWuO7R.ibBAWzO19wb.ItnTa', '2017-05-18', NULL, 1, 0, 'angelo', 'Angelo', 'Garzon'),
(3, 1122844477, '$2y$12$YYYI0bYJiLkRZzAD63juRulq.6zhkToH1j997dLb.BQeO0ST.BJ/.', '2017-05-18', NULL, 1, 0, 'ivan', 'Ivan', 'Manuyama'),
(4, 1122842345, '$2y$12$WvfFQvPj6Rs3kihuyQ94HesfBp04ydRwMRFHLo7AKWWgtUt9eMqSm', '2017-05-18', NULL, 1, 0, 'maria', 'Maria', 'Rojas'),
(5, 1133848344, '$2y$12$TegkIeriDtj0HrVs5z5/R.HIiycGcejhpu4Wpruk0iOYI6tK/m/gW', '2017-05-23', NULL, 1, 0, 'andres', 'Andres', 'Muñoz');

-- --------------------------------------------------------

--
-- Table structure for table `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `valor` double(18,2) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idInventario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `venta`
--

INSERT INTO `venta` (`idVenta`, `fecha`, `valor`, `idCliente`, `idUsuario`, `idInventario`) VALUES
(1, '2017-05-18', 800000.00, 1, 1, 1),
(2, '2017-05-22', 210000.00, 6, 4, 15),
(3, '2017-05-23', 600000.00, 3, 1, 5),
(4, '2017-05-23', 800000.00, 3, 1, 7),
(5, '2017-05-23', 110000.00, 2, 1, 14),
(6, '2017-05-23', 400000.00, 2, 1, 6),
(7, '2017-05-23', 400000.00, 2, 1, 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abonoCredito`
--
ALTER TABLE `abonoCredito`
  ADD PRIMARY KEY (`idAbonoCredito`),
  ADD KEY `idCredito` (`idCredito`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `abonoEmpeno`
--
ALTER TABLE `abonoEmpeno`
  ADD PRIMARY KEY (`idAbonoEmpeno`),
  ADD KEY `idEmpeno` (`idEmpeno`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idArticulo`),
  ADD KEY `idTipoArticulo` (`idTipoArticulo`);

--
-- Indexes for table `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idCiudad`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD KEY `idCiudad` (`idCiudad`);

--
-- Indexes for table `credito`
--
ALTER TABLE `credito`
  ADD PRIMARY KEY (`idCredito`),
  ADD UNIQUE KEY `idInventario` (`idInventario`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indexes for table `detalleVenta`
--
ALTER TABLE `detalleVenta`
  ADD PRIMARY KEY (`idDetalleVenta`),
  ADD UNIQUE KEY `idInventario` (`idInventario`),
  ADD UNIQUE KEY `idVenta` (`idVenta`),
  ADD UNIQUE KEY `idCredito` (`idCredito`);

--
-- Indexes for table `empenos`
--
ALTER TABLE `empenos`
  ADD PRIMARY KEY (`idEmpeno`),
  ADD UNIQUE KEY `idArticulo` (`idArticulo`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idCliente` (`idCliente`);

--
-- Indexes for table `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`),
  ADD UNIQUE KEY `idArticulo` (`idArticulo`);

--
-- Indexes for table `saldos`
--
ALTER TABLE `saldos`
  ADD PRIMARY KEY (`idSaldos`);

--
-- Indexes for table `tipoArticulo`
--
ALTER TABLE `tipoArticulo`
  ADD PRIMARY KEY (`idTipoArticulo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indexes for table `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`),
  ADD UNIQUE KEY `idInventario` (`idInventario`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abonoCredito`
--
ALTER TABLE `abonoCredito`
  MODIFY `idAbonoCredito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `abonoEmpeno`
--
ALTER TABLE `abonoEmpeno`
  MODIFY `idAbonoEmpeno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `idCiudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `credito`
--
ALTER TABLE `credito`
  MODIFY `idCredito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `detalleVenta`
--
ALTER TABLE `detalleVenta`
  MODIFY `idDetalleVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `empenos`
--
ALTER TABLE `empenos`
  MODIFY `idEmpeno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `saldos`
--
ALTER TABLE `saldos`
  MODIFY `idSaldos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tipoArticulo`
--
ALTER TABLE `tipoArticulo`
  MODIFY `idTipoArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `abonoCredito`
--
ALTER TABLE `abonoCredito`
  ADD CONSTRAINT `abonoCredito_ibfk_1` FOREIGN KEY (`idCredito`) REFERENCES `credito` (`idCredito`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abonoCredito_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `abonoEmpeno`
--
ALTER TABLE `abonoEmpeno`
  ADD CONSTRAINT `abonoEmpeno_ibfk_1` FOREIGN KEY (`idEmpeno`) REFERENCES `empenos` (`idEmpeno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `abonoEmpeno_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`idTipoArticulo`) REFERENCES `tipoArticulo` (`idTipoArticulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idCiudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credito`
--
ALTER TABLE `credito`
  ADD CONSTRAINT `credito_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credito_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credito_ibfk_3` FOREIGN KEY (`idInventario`) REFERENCES `inventario` (`idInventario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detalleVenta`
--
ALTER TABLE `detalleVenta`
  ADD CONSTRAINT `detalleVenta_ibfk_1` FOREIGN KEY (`idVenta`) REFERENCES `venta` (`idVenta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleVenta_ibfk_2` FOREIGN KEY (`idInventario`) REFERENCES `inventario` (`idInventario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalleVenta_ibfk_3` FOREIGN KEY (`idCredito`) REFERENCES `credito` (`idCredito`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `empenos`
--
ALTER TABLE `empenos`
  ADD CONSTRAINT `empenos_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `articulo` (`idArticulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empenos_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empenos_ibfk_3` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`idArticulo`) REFERENCES `articulo` (`idArticulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`idInventario`) REFERENCES `inventario` (`idInventario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
