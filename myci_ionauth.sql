-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 26-08-2017 a las 12:56:14
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myci_ionauth`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diario`
--

CREATE TABLE `diario` (
  `id_asiento` int(11) NOT NULL,
  `idasiento` varchar(32) DEFAULT NULL,
  `numero` varchar(15) DEFAULT NULL,
  `fecha_asiento` varchar(100) DEFAULT NULL,
  `factura_emitida` varchar(100) DEFAULT NULL,
  `factura_recibida` varchar(100) DEFAULT NULL,
  `concepto` varchar(150) DEFAULT NULL,
  `importe` decimal(10,2) DEFAULT '0.00',
  `signo` varchar(1) DEFAULT NULL,
  `cuenta_debe` varchar(15) DEFAULT NULL,
  `cuenta_haber` varchar(15) DEFAULT NULL,
  `cuenta_mayor` varchar(15) DEFAULT NULL,
  `dia` varchar(2) DEFAULT NULL,
  `mes` varchar(2) DEFAULT NULL,
  `anno` varchar(4) DEFAULT NULL,
  `trimestre` varchar(2) DEFAULT NULL,
  `orden_tiempo` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `diario`
--

INSERT INTO `diario` (`id_asiento`, `idasiento`, `numero`, `fecha_asiento`, `factura_emitida`, `factura_recibida`, `concepto`, `importe`, `signo`, `cuenta_debe`, `cuenta_haber`, `cuenta_mayor`, `dia`, `mes`, `anno`, `trimestre`, `orden_tiempo`) VALUES
(1, 'eef4be62c41d62dd687e83c5cde15d95', '0000000001', '09-07-2017', '1', NULL, 'Ntra. Ftra.0000000001 de 09-07-2017', '0.00', 'D', '430000045', NULL, '430000045', '09', '07', '2017', '3', '1499551200'),
(2, 'eef4be62c41d62dd687e83c5cde15d95', '0000000001', '09-07-2017', '1', NULL, 'Ntra. Ftra.0000000001 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(3, 'e5ee9454d555aa23ba6fd1b1b46ab682', '0000000002', '09-07-2017', '2', NULL, 'Ntra. Ftra.0000000002 de 09-07-2017', '0.00', 'D', '430000045', NULL, '430000045', '09', '07', '2017', '3', '1499551200'),
(4, 'e5ee9454d555aa23ba6fd1b1b46ab682', '0000000002', '09-07-2017', '2', NULL, 'Ntra. Ftra.0000000002 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(5, '84a1002c180d400f2bf7f2d636868b01', '0000000003', '09-07-2017', '3', NULL, 'Ntra. Ftra.0000000003 de 09-07-2017', '-469.87', 'D', '430000059', NULL, '430000059', '09', '07', '2017', '3', '1499551200'),
(6, '84a1002c180d400f2bf7f2d636868b01', '0000000003', '09-07-2017', '3', NULL, 'Ntra. Ftra.0000000003 de 09-07-2017', '483.41', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(7, '84a1002c180d400f2bf7f2d636868b01', '0000000003', '09-07-2017', '3', NULL, 'Ntra. Ftra.0000000003 de 09-07-2017', '-953.28', 'H', NULL, '477000000', '477000000', '09', '07', '2017', '3', '1499551200'),
(8, '84a1002c180d400f2bf7f2d636868b01', '0000000003', '09-07-2017', NULL, '3', 'Descuadre asiento 0000000003', '953.28', '', NULL, '', NULL, '09', '07', '2017', '3', '1499551200'),
(9, '5f51d990a5a24694315e060687becfba', '0000000004', '09-07-2017', '4', NULL, 'Ntra. Ftra.0000000004 de 09-07-2017', '0.00', 'D', '430000058', NULL, '430000058', '09', '07', '2017', '3', '1499551200'),
(10, '5f51d990a5a24694315e060687becfba', '0000000004', '09-07-2017', '4', NULL, 'Ntra. Ftra.0000000004 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(11, 'fc9126d4fda9a0048a83089d68770329', '0000000005', '09-07-2017', '5', NULL, 'Ntra. Ftra.0000000005 de 09-07-2017', '0.00', 'D', '430000053', NULL, '430000053', '09', '07', '2017', '3', '1499551200'),
(12, 'fc9126d4fda9a0048a83089d68770329', '0000000005', '09-07-2017', '5', NULL, 'Ntra. Ftra.0000000005 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(13, 'd590d9043d63d48ffe61f892e4259be9', '0000000006', '09-07-2017', '1', NULL, 'Ntra. Ftra.0000000006 de 09-07-2017', '0.00', 'D', '430000057', NULL, '430000057', '09', '07', '2017', '3', '1499551200'),
(14, 'd590d9043d63d48ffe61f892e4259be9', '0000000006', '09-07-2017', '1', NULL, 'Ntra. Ftra.0000000006 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(15, 'e93af38dc27fa564185da1ae91d21831', '0000000007', '09-07-2017', '2', NULL, 'Ntra. Ftra.0000000007 de 09-07-2017', '0.00', 'D', '430000059', NULL, '430000059', '09', '07', '2017', '3', '1499551200'),
(16, 'e93af38dc27fa564185da1ae91d21831', '0000000007', '09-07-2017', '2', NULL, 'Ntra. Ftra.0000000007 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(17, 'fb197e73acc17b8f2879fc5d03fc176c', '0000000008', '09-07-2017', '3', NULL, 'Ntra. Ftra.0000000008 de 09-07-2017', '0.00', 'D', '430000056', NULL, '430000056', '09', '07', '2017', '3', '1499551200'),
(18, 'fb197e73acc17b8f2879fc5d03fc176c', '0000000008', '09-07-2017', '3', NULL, 'Ntra. Ftra.0000000008 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(19, '0094630ea7efb1ba2d02a67eaab6b64f', '0000000009', '09-07-2017', '4', NULL, 'Ntra. Ftra.0000000009 de 09-07-2017', '46846.00', 'D', '430000055', NULL, '430000055', '09', '07', '2017', '3', '1499551200'),
(20, '0094630ea7efb1ba2d02a67eaab6b64f', '0000000009', '09-07-2017', '4', NULL, 'Ntra. Ftra.0000000009 de 09-07-2017', '38293.37', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(21, '0094630ea7efb1ba2d02a67eaab6b64f', '0000000009', '09-07-2017', '4', NULL, 'Ntra. Ftra.0000000009 de 09-07-2017', '8552.63', 'H', NULL, '477000000', '477000000', '09', '07', '2017', '3', '1499551200'),
(22, '090c4636831fea09edabdac734b9381d', '0000000010', '09-07-2017', '5', NULL, 'Ntra. Ftra.0000000010 de 09-07-2017', '0.00', 'D', '430000057', NULL, '430000057', '09', '07', '2017', '3', '1499551200'),
(23, '090c4636831fea09edabdac734b9381d', '0000000010', '09-07-2017', '5', NULL, 'Ntra. Ftra.0000000010 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(24, 'e286a7b847fae14971e32b966d64a747', '0000000011', '09-07-2017', '1', NULL, 'Ntra. Ftra.0000000011 de 09-07-2017', '0.00', 'D', '430000060', NULL, '430000060', '09', '07', '2017', '3', '1499551200'),
(25, 'e286a7b847fae14971e32b966d64a747', '0000000011', '09-07-2017', '1', NULL, 'Ntra. Ftra.0000000011 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(26, '075e80c360ce30413cac80ead9f81a89', '0000000012', '09-07-2017', '2', NULL, 'Ntra. Ftra.0000000012 de 09-07-2017', '0.00', 'D', '430000060', NULL, '430000060', '09', '07', '2017', '3', '1499551200'),
(27, '075e80c360ce30413cac80ead9f81a89', '0000000012', '09-07-2017', '2', NULL, 'Ntra. Ftra.0000000012 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(28, '95d2f128e8974fec14ef36e16e100e95', '0000000013', '09-07-2017', '3', NULL, 'Ntra. Ftra.0000000013 de 09-07-2017', '0.00', 'D', '430000045', NULL, '430000045', '09', '07', '2017', '3', '1499551200'),
(29, '95d2f128e8974fec14ef36e16e100e95', '0000000013', '09-07-2017', '3', NULL, 'Ntra. Ftra.0000000013 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(30, '724fb345741ef7e880483b30407b2cba', '0000000014', '09-07-2017', '4', NULL, 'Ntra. Ftra.0000000014 de 09-07-2017', '19788.25', 'D', '430000058', NULL, '430000058', '09', '07', '2017', '3', '1499551200'),
(31, '724fb345741ef7e880483b30407b2cba', '0000000014', '09-07-2017', '4', NULL, 'Ntra. Ftra.0000000014 de 09-07-2017', '16795.59', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(32, '724fb345741ef7e880483b30407b2cba', '0000000014', '09-07-2017', '4', NULL, 'Ntra. Ftra.0000000014 de 09-07-2017', '2992.66', 'H', NULL, '477000000', '477000000', '09', '07', '2017', '3', '1499551200'),
(33, 'e8c45265474d2c4fe555dd726e295b41', '0000000015', '09-07-2017', '5', NULL, 'Ntra. Ftra.0000000015 de 09-07-2017', '7303.02', 'D', '430000055', NULL, '430000055', '09', '07', '2017', '3', '1499551200'),
(34, 'e8c45265474d2c4fe555dd726e295b41', '0000000015', '09-07-2017', '5', NULL, 'Ntra. Ftra.0000000015 de 09-07-2017', '5286.07', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(35, 'e8c45265474d2c4fe555dd726e295b41', '0000000015', '09-07-2017', '5', NULL, 'Ntra. Ftra.0000000015 de 09-07-2017', '2016.95', 'H', NULL, '477000000', '477000000', '09', '07', '2017', '3', '1499551200'),
(36, '1821ca731d7540d16610a89f62ba53c4', '0000000016', '09-07-2017', '6', NULL, 'Ntra. Ftra.0000000016 de 09-07-2017', '0.00', 'D', '430000052', NULL, '430000052', '09', '07', '2017', '3', '1499551200'),
(37, '1821ca731d7540d16610a89f62ba53c4', '0000000016', '09-07-2017', '6', NULL, 'Ntra. Ftra.0000000016 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(38, 'e06e7fc974e25c90c0d2a4f07530e66c', '0000000017', '09-07-2017', '7', NULL, 'Ntra. Ftra.0000000017 de 09-07-2017', '1702.16', 'D', '430000022', NULL, '430000022', '09', '07', '2017', '3', '1499551200'),
(39, 'e06e7fc974e25c90c0d2a4f07530e66c', '0000000017', '09-07-2017', '7', NULL, 'Ntra. Ftra.0000000017 de 09-07-2017', '1531.62', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(40, 'e06e7fc974e25c90c0d2a4f07530e66c', '0000000017', '09-07-2017', '7', NULL, 'Ntra. Ftra.0000000017 de 09-07-2017', '170.54', 'H', NULL, '477000000', '477000000', '09', '07', '2017', '3', '1499551200'),
(41, '1a40732b07f8340195654a349a4bc17a', '0000000018', '09-07-2017', '8', NULL, 'Ntra. Ftra.0000000018 de 09-07-2017', '11100.42', 'D', '430000050', NULL, '430000050', '09', '07', '2017', '3', '1499551200'),
(42, '1a40732b07f8340195654a349a4bc17a', '0000000018', '09-07-2017', '8', NULL, 'Ntra. Ftra.0000000018 de 09-07-2017', '9152.92', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(43, '1a40732b07f8340195654a349a4bc17a', '0000000018', '09-07-2017', '8', NULL, 'Ntra. Ftra.0000000018 de 09-07-2017', '1947.50', 'H', NULL, '477000000', '477000000', '09', '07', '2017', '3', '1499551200'),
(44, 'c1f06725ad4af800cb51002c1c596986', '0000000019', '09-07-2017', '13', NULL, 'Ntra. Ftra.0000000019 de 09-07-2017', '54323.49', 'D', '430000054', NULL, '430000054', '09', '07', '2017', '3', '1499551200'),
(45, 'c1f06725ad4af800cb51002c1c596986', '0000000019', '09-07-2017', '13', NULL, 'Ntra. Ftra.0000000019 de 09-07-2017', '45143.39', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(46, 'c1f06725ad4af800cb51002c1c596986', '0000000019', '09-07-2017', '13', NULL, 'Ntra. Ftra.0000000019 de 09-07-2017', '9180.10', 'H', NULL, '477000000', '477000000', '09', '07', '2017', '3', '1499551200'),
(47, 'f69c5c4684ebed6d836b1b308dd36f46', '0000000001', '09-07-2017', '1', NULL, 'Ntra. Ftra.0000000001 de 09-07-2017', '69463.22', 'D', '430000057', NULL, '430000057', '09', '07', '2017', '3', '1499551200'),
(48, 'f69c5c4684ebed6d836b1b308dd36f46', '0000000001', '09-07-2017', '1', NULL, 'Ntra. Ftra.0000000001 de 09-07-2017', '57798.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(49, 'f69c5c4684ebed6d836b1b308dd36f46', '0000000001', '09-07-2017', '1', NULL, 'Ntra. Ftra.0000000001 de 09-07-2017', '11665.22', 'H', NULL, '477000000', '477000000', '09', '07', '2017', '3', '1499551200'),
(50, '39d3d490383afa70cfedfab8c595e485', '0000000002', '09-07-2017', '1', NULL, 'Ntra. Ftra.0000000002 de 09-07-2017', '64384.21', 'D', '430000059', NULL, '430000059', '09', '07', '2017', '3', '1499551200'),
(51, '39d3d490383afa70cfedfab8c595e485', '0000000002', '09-07-2017', '1', NULL, 'Ntra. Ftra.0000000002 de 09-07-2017', '54812.19', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(52, '39d3d490383afa70cfedfab8c595e485', '0000000002', '09-07-2017', '1', NULL, 'Ntra. Ftra.0000000002 de 09-07-2017', '9572.02', 'H', NULL, '477000000', '477000000', '09', '07', '2017', '3', '1499551200'),
(53, 'ba3b131f2e5de465fd1b5528122933ff', '0000000003', '09-07-2017', '2', NULL, 'Ntra. Ftra.0000000003 de 09-07-2017', '48068.08', 'D', '430000055', NULL, '430000055', '09', '07', '2017', '3', '1499551200'),
(54, 'ba3b131f2e5de465fd1b5528122933ff', '0000000003', '09-07-2017', '2', NULL, 'Ntra. Ftra.0000000003 de 09-07-2017', '39076.24', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(55, 'ba3b131f2e5de465fd1b5528122933ff', '0000000003', '09-07-2017', '2', NULL, 'Ntra. Ftra.0000000003 de 09-07-2017', '8991.84', 'H', NULL, '477000000', '477000000', '09', '07', '2017', '3', '1499551200'),
(56, 'bcf49bdb778dd7aeaf4e061086031de7', '0000000004', '09-07-2017', '3', NULL, 'Ntra. Ftra.0000000004 de 09-07-2017', '37442.33', 'D', '430000043', NULL, '430000043', '09', '07', '2017', '3', '1499551200'),
(57, 'bcf49bdb778dd7aeaf4e061086031de7', '0000000004', '09-07-2017', '3', NULL, 'Ntra. Ftra.0000000004 de 09-07-2017', '32306.50', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200'),
(58, 'bcf49bdb778dd7aeaf4e061086031de7', '0000000004', '09-07-2017', '3', NULL, 'Ntra. Ftra.0000000004 de 09-07-2017', '5135.83', 'H', NULL, '477000000', '477000000', '09', '07', '2017', '3', '1499551200'),
(59, '666932144a4e2e1471528031fa3b378f', '0000000005', '09-07-2017', '4', NULL, 'Ntra. Ftra.0000000005 de 09-07-2017', '0.00', 'D', '430000056', NULL, '430000056', '09', '07', '2017', '3', '1499551200'),
(60, '666932144a4e2e1471528031fa3b378f', '0000000005', '09-07-2017', '4', NULL, 'Ntra. Ftra.0000000005 de 09-07-2017', '0.00', 'H', NULL, '700000000', '700000000', '09', '07', '2017', '3', '1499551200');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'contabilidad', 'Contabilidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `idmodulo` varchar(32) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  `controller` varchar(150) DEFAULT 'main',
  `descripcion` varchar(150) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `idmodulo`, `id_grupo`, `controller`, `descripcion`, `fecha_reg`) VALUES
(1, 'd3f418183e00fc31aa6df68ef8a807b8', 1, 'users', 'Usuarios', '2017-08-22 14:57:31'),
(2, '92f688c29f9bbf4e6019eb4890a9e35e', 1, 'grupos', 'Grupos', '2017-08-22 14:57:31'),
(3, 'c8ce84660820ff6cd6c280c8ae7143c9', 1, 'modulos', 'Modulos', '2017-08-22 14:57:31'),
(4, '40da4f8eff7ad8dab691a28cf07e3f27', 1, 'permisos', 'Permisos', '2017-08-22 14:58:22'),
(5, 'e6475bbd3ae573b1cbde436cc852f40b', 3, 'diario', 'Contabilidad', '2017-08-23 19:01:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `idpermiso` varchar(32) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL,
  `modulo` varchar(150) DEFAULT NULL,
  `crear` tinyint(1) DEFAULT '0',
  `ver` tinyint(1) DEFAULT '0',
  `editar` tinyint(1) DEFAULT '0',
  `borrar` tinyint(1) DEFAULT '0',
  `sololectura` tinyint(1) DEFAULT '0',
  `fecha_reg` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `idpermiso`, `id_user`, `id_group`, `modulo`, `crear`, `ver`, `editar`, `borrar`, `sololectura`, `fecha_reg`) VALUES
(1, 's0It42JG8yu8h6vCwyaN8mvlGUvXHRMC', 1, 3, 'diario', 1, 1, 1, 1, 0, '2017-08-25 18:59:54'),
(2, 'i3XxwjOb2sEAV2Z5AOcZNEAQ9d1qgJrO', 2, 3, 'diario', 0, 0, 0, 0, 1, '2017-08-25 18:59:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_registro` int(11) NOT NULL,
  `idregistro` varchar(32) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id_registro`, `idregistro`, `id_user`, `fecha_reg`) VALUES
(1, 'KEfUXq9kcQUlkdOeHDEqPEklM5CzE4yn', 1, '2017-08-25 18:59:54'),
(2, 'Layz3fC3eiCxVNFYiD1JUTEHjeGZm0rG', 2, '2017-08-25 18:59:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1503733046, 1, 'Admin', 'Administrator', 'admin', '0'),
(2, '::1', 'test@mail.com', '$2y$08$L8U691zyABCO7o.HdAnjw.76s00BRPHJxG/6d2ghVU6iv5zydCWCq', NULL, 'test@mail.com', NULL, NULL, NULL, NULL, 1503417193, 1503508262, 1, 'Test', 'Usuario Testeo', 'MyEmpresa', '123456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(13, 1, 1),
(14, 1, 2),
(15, 1, 3),
(11, 2, 2),
(12, 2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`,`ip_address`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indices de la tabla `diario`
--
ALTER TABLE `diario`
  ADD PRIMARY KEY (`id_asiento`),
  ADD KEY `idasiento` (`idasiento`),
  ADD KEY `numero` (`numero`),
  ADD KEY `numero_2` (`numero`),
  ADD KEY `orden_tiempo` (`orden_tiempo`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indices de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`),
  ADD KEY `idmodulo` (`idmodulo`),
  ADD KEY `controller` (`controller`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`),
  ADD KEY `idpermiso` (`idpermiso`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_group` (`id_group`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `idregistro` (`idregistro`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `diario`
--
ALTER TABLE `diario`
  MODIFY `id_asiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
