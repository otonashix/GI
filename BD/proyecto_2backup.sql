-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2019 a las 23:47:30
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `km_busqueda`
--

CREATE TABLE `km_busqueda` (
  `idBusqueda` int(200) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `idUsuario` int(12) DEFAULT NULL,
  `busqueda` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `km_busqueda`
--

INSERT INTO `km_busqueda` (`idBusqueda`, `fecha`, `idUsuario`, `busqueda`) VALUES
(37, '2019-02-03 15:14:24', 1, '[K]4[K]todo[K]0[K]TODAS[K]2019-01-01[K]2022-02-28'),
(38, '2019-02-03 16:50:18', 1, '[K]2[K]34[K]0[K]TODAS[K]2019-02-01[K]2019-02-13'),
(39, '2019-02-04 07:18:47', 1, '[K]1[K]3423[K]0[K]TODAS[K]2019-01-01[K]2019-02-28'),
(40, '2019-02-04 07:31:56', 1, '[K]4[K]todo[K]1[K]TODAS[K]2019-02-03[K]2019-02-28'),
(41, '2019-03-01 08:41:44', 1, '[K]4[K]todo[K]1[K]TODAS[K]2019-02-08[K]2019-02-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `km_clientes`
--

CREATE TABLE `km_clientes` (
  `cliId` int(12) NOT NULL,
  `cliTipoid` int(1) NOT NULL,
  `cliCednit` varchar(11) NOT NULL,
  `cliNombre` varchar(66) NOT NULL,
  `cliNomcial` varchar(66) NOT NULL,
  `cliDireccion1` varchar(66) NOT NULL,
  `cliDireccion2` varchar(66) NOT NULL,
  `cliTelefono` int(10) NOT NULL,
  `cliMovil` int(10) NOT NULL,
  `cliEmail` varchar(66) NOT NULL,
  `cliCodciu` int(10) NOT NULL,
  `cliCodpais` int(10) NOT NULL,
  `cliEncargado` varchar(255) NOT NULL,
  `cliObservaciones` varchar(255) NOT NULL,
  `cliClasificacion` int(1) NOT NULL,
  `cliZona` int(1) NOT NULL,
  `cliVendedor` varchar(255) NOT NULL,
  `cliAgente` varchar(255) NOT NULL,
  `cliTransportadora` varchar(255) NOT NULL,
  `cliListprec` varchar(66) NOT NULL,
  `cliCupocartera` varchar(66) NOT NULL,
  `cliCalificacion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `km_clientes`
--

INSERT INTO `km_clientes` (`cliId`, `cliTipoid`, `cliCednit`, `cliNombre`, `cliNomcial`, `cliDireccion1`, `cliDireccion2`, `cliTelefono`, `cliMovil`, `cliEmail`, `cliCodciu`, `cliCodpais`, `cliEncargado`, `cliObservaciones`, `cliClasificacion`, `cliZona`, `cliVendedor`, `cliAgente`, `cliTransportadora`, `cliListprec`, `cliCupocartera`, `cliCalificacion`) VALUES
(12, 1, '1110577198', 'pokemon', '1', '1', '1', 1, 1, '1', 1, 1, '1', '1', 1, 1, '1', '1', '1', '1', '1', 1),
(13, 1, '1111111111', 'VACIO', 'sjdsk', 'kldkdl', 'lkdsjadjk', 111, 1, '1@2', 11, 1, '1', '1', 0, 0, '1', '1', '1', '11', '1', 1),
(14, 1, '1122222222', 'VACIO', 'sjdsk', 'kldkdl', 'lkdsjadjk', 111, 1, '1@2', 11, 1, '1', '1', 0, 0, '1', '1', '1', '11', '1', 1),
(15, 1, '1122222224', 'VACIO', 'sjdsk', 'kldkdl', 'lkdsjadjk', 111, 1, '1@2', 11, 1, '1', '1', 0, 0, '1', '1', '1', '11', '1', 1),
(16, 1, '1122222223', 'VACIO', 'sjdsk', 'kldkdl', 'lkdsjadjk', 111, 1, '1@2', 11, 1, '1', '1', 0, 0, '1', '1', '1', '11', '1', 1),
(17, 2, '90', 'weeEEwew', 'VACIO', 'wewe', 'we', 0, 0, '2@2', 0, 0, 'ewew', 'we', 0, 0, 'we', 'ewew', 'ew', 'ew', 'ew', 0),
(18, 1, '1111111134', 'gsghgsah', 'gashasg', 'aghshasgh', 'sghhags', 0, 0, 'shghashas@1', 0, 0, 'saghhags', 'shasah', 0, 0, 'asghhagsh', 'sghaash', 'shasgahs', 'asghhsg', 'asghasg', 0),
(19, 1, '2222222222', 'gsghgsah', 'gashasg', 'aghshasgh', 'sghhags', 0, 0, 'shghashas@1', 0, 0, 'saghhags', 'shasah', 0, 0, 'asghhagsh', 'sghaash', 'shasgahs', 'asghhsg', 'asghasg', 0),
(20, 1, '1110577133', 'EW', 'EW', 'EW', 'EWWE', 0, 0, 'WE@3', 0, 0, 'WE', 'WE', 0, 0, 'WQQW', 'W', 'EW', 'W', 'W', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `km_empresas`
--

CREATE TABLE `km_empresas` (
  `idEmpresa` int(12) NOT NULL,
  `NIT` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idEstado` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `km_empresas`
--

INSERT INTO `km_empresas` (`idEmpresa`, `NIT`, `nombre`, `idEstado`) VALUES
(1, '1000000', 'TEAM LEADER', 1),
(2, '111222', 'CONCRETOL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `km_facturas`
--

CREATE TABLE `km_facturas` (
  `idFactura` int(40) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `nombre1` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre2` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre3` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imagen1` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imagen2` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imagen3` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `valor` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `idEmpresa` int(12) NOT NULL,
  `idUsuario` int(12) NOT NULL,
  `notas` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `indicex` varchar(4) COLLATE utf8_spanish2_ci NOT NULL DEFAULT 'todo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `km_facturas`
--

INSERT INTO `km_facturas` (`idFactura`, `titulo`, `fecha`, `nombre1`, `nombre2`, `nombre3`, `imagen1`, `imagen2`, `imagen3`, `valor`, `idEmpresa`, `idUsuario`, `notas`, `indicex`) VALUES
(48, '3423424vMC', '2019-02-02 08:23:39', '111', '222', '333', 'http://localhost/uploads/ALL/pic05.jpg', 'http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2.jpg', 'http://localhost/uploads/ALL/85C7ED4115541E5DF141419F07B2987D098EC6C1.png', '4354555', 1, 1, 'sfdsdsfdsffdsfds\r\n								', 'todo'),
(52, '234', '2019-02-04 06:55:43', '234234', 'Factura del gas', 'Factura del auga', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '234234', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '33434', 1, 1, '...', 'todo'),
(54, '234', '2019-02-04 06:55:43', '234234', 'Factura del gas', 'Factura del auga', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '234234', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '33434', 1, 1, '...', 'todo'),
(56, '3423424vMC', '2019-02-02 08:23:39', '111', '222', '333', 'http://localhost/uploads/ALL/pic05.jpg', 'http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2.jpg', 'http://localhost/uploads/ALL/85C7ED4115541E5DF141419F07B2987D098EC6C1.png', '4354555', 1, 1, 'sfdsdsfdsffdsfds\r\n								', 'todo'),
(57, '234', '2019-02-04 06:55:43', '234234', 'Factura del gas', 'Factura del auga', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '234234', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '33434', 1, 1, '...', 'todo'),
(58, '234', '2019-02-04 06:55:43', '234234', 'Factura del gas', 'Factura del auga', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '234234', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '33434', 1, 1, '...', 'todo'),
(59, '3423424vMC', '2019-02-02 08:23:39', '111', '222', '333', 'http://localhost/uploads/ALL/pic05.jpg', 'http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2.jpg', 'http://localhost/uploads/ALL/85C7ED4115541E5DF141419F07B2987D098EC6C1.png', '4354555', 1, 1, 'sfdsdsfdsffdsfds\r\n								', 'todo'),
(60, '3423424vMC', '2019-02-02 08:23:39', '111', '222', '333', 'http://localhost/uploads/ALL/pic05.jpg', 'http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2.jpg', 'http://localhost/uploads/ALL/85C7ED4115541E5DF141419F07B2987D098EC6C1.png', '4354555', 1, 1, 'sfdsdsfdsffdsfds\r\n								', 'todo'),
(61, '234', '2019-02-04 06:55:43', '234234', 'Factura del gas', 'Factura del auga', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '234234', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '33434', 1, 1, '...', 'todo'),
(62, '234', '2019-02-04 06:55:43', '234234', 'Factura del gas', 'Factura del auga', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '234234', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '33434', 1, 1, '...', 'todo'),
(63, '3423424vMC', '2019-02-02 08:23:39', '111', '222', '333', 'http://localhost/uploads/ALL/pic05.jpg', 'http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2.jpg', 'http://localhost/uploads/ALL/85C7ED4115541E5DF141419F07B2987D098EC6C1.png', '4354555', 1, 1, 'sfdsdsfdsffdsfds\r\n								', 'todo'),
(64, '3423424vMC', '2019-02-02 08:23:39', '111', '222', '333', 'http://localhost/uploads/ALL/pic05.jpg', 'http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2.jpg', 'http://localhost/uploads/ALL/85C7ED4115541E5DF141419F07B2987D098EC6C1.png', '4354555', 1, 1, 'sfdsdsfdsffdsfds\r\n								', 'todo'),
(65, '234', '2019-02-04 06:55:43', '234234', 'Factura del gas', 'Factura del auga', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '234234', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '33434', 1, 1, '...', 'todo'),
(66, '234', '2019-02-04 06:55:43', '234234', 'Factura del gas', 'Factura del auga', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '234234', 'http://localhost/uploads/ALL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png', '33434', 1, 1, '...', 'todo'),
(68, '1234DDD', '2019-02-04 16:23:58', 'WQWE', 'QWEQWEEQ', 'QWEWQEE', 'http://192.168.1.8/uploads/CONCRETOL/CB8C1EA8EA5BE791EC3D29208DC54DDE6254219C.jpg', 'http://192.168.1.8/uploads/CONCRETOL/CB8C1EA8EA5BE791EC3D29208DC54DDE6254219C.jpg', 'http://192.168.1.8/uploads/CONCRETOL/CB8C1EA8EA5BE791EC3D29208DC54DDE6254219C.jpg', '73776376', 2, 1, '...SADSDAASD', 'todo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `km_facturas2`
--

CREATE TABLE `km_facturas2` (
  `idFac` int(40) NOT NULL,
  `tituloFac` varchar(255) NOT NULL,
  `fechaemiFac` date NOT NULL,
  `fechavenFac` date NOT NULL,
  `fechasubFac` datetime NOT NULL,
  `imagenFac` varchar(255) NOT NULL,
  `valorFac` varchar(40) NOT NULL,
  `notasFac` varchar(500) NOT NULL,
  `cliId` int(12) NOT NULL,
  `idObra` int(12) NOT NULL,
  `idUsuario` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `km_facturas2`
--

INSERT INTO `km_facturas2` (`idFac`, `tituloFac`, `fechaemiFac`, `fechavenFac`, `fechasubFac`, `imagenFac`, `valorFac`, `notasFac`, `cliId`, `idObra`, `idUsuario`) VALUES
(8, 'Juan Antonio', '2019-03-09', '2019-03-02', '2019-02-28 09:14:18', 'images/Facturas-imagenes/CEB4FC8844D47AA6291DAAC568B5E43C505B66F6.png', '10', '...hola', 12, 90, 1),
(9, 'Juan Antoniore', '2019-03-02', '2019-03-08', '2019-02-28 09:16:06', 'images/Facturas-imagenes/E6DCF9A56F05E9801CD7384E6504983A65757332.png', '1', '...dsds', 12, 90, 1),
(10, 'Juan Antoniore2', '2019-03-02', '2019-03-08', '2019-02-28 09:27:35', 'images/Facturas-imagenes/E93A93203B1BBA6241C6D97B851CCAF21257EB14.png', '1', '...dsds', 12, 90, 1),
(11, 'Juan Antoniore2e', '2019-03-02', '2019-03-08', '2019-02-28 09:28:07', 'images/Facturas-imagenes/14ED3757284C74C1B33AFBCD8C0A32B5D7FD3C69.png', '1', '...dsds', 12, 90, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `km_log`
--

CREATE TABLE `km_log` (
  `idLog` int(40) NOT NULL,
  `tipoLog` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `razonLog` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `contenidoLog` varchar(1000) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `idUsuario` int(12) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `km_log`
--

INSERT INTO `km_log` (`idLog`, `tipoLog`, `razonLog`, `contenidoLog`, `idUsuario`, `fecha`) VALUES
(1, 'factura', 'fdgd', '47[-]400 MC[-]2019-01-30 22:16:24[-]Murcielago murcielago murcielago murcielago[-]455[-]6777[-]D0984BADF6CA597FD04B165245130103E65.JPG[-]AC7970F537990DB59C36320A174188600D3.JPG[-]D410D5E90C58FF655DE544C0848DD41F53A.JPG[-]123344455[-]2[-]1[-]34444[-]todo[-]', 1, '2019-02-03 13:50:36'),
(2, 'factura', 'fdgdsdf', '47[-]400 MC[-]2019-01-30 22:16:24[-]Murcielago murcielago murcielago murcielago[-]455[-]6777[-]D0984BADF6CA597FD04B165245130103E65.JPG[-]AC7970F537990DB59C36320A174188600D3.JPG[-]D410D5E90C58FF655DE544C0848DD41F53A.JPG[-]123344455[-]2[-]1[-]34444[-]todo[-]', 1, '2019-02-03 13:54:43'),
(3, 'factura', 'No me gusta, att juan', '46[-]juan davd[-]2019-01-30 22:16:24[-]234[-]455[-]6777[-]D0984BADF6CA597FD04B165245130103E65.JPG[-]AC7970F537990DB59C36320A174188600D3.JPG[-]D410D5E90C58FF655DE544C0848DD41F53A.JPG[-]123344455[-]2[-]1[-]34444[-]todo[-]', 1, '2019-02-03 14:04:31'),
(4, 'factura', 'Poor ke si', '50[-]sadasd[-]2019-02-03 15:00:02[-]asdas[-]1233[-]4445[-]http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2%20-%20copia%20-%20copia.jpg[-]http://localhost/uploads/ALL/CFB47516275B8F79BB587FE2FFD10222B0A938B7.png[-]http://localhost/uploads/CONCRETOL/A897D47A9A1EC95F0E594C2AE8820D75D4CA684F.png[-]12333333[-]1[-]1[-]Hola ke ase\n[-]todo[-]', 1, '2019-02-03 16:41:16'),
(5, 'factura', 'Heyder\r\n', '49[-]gf[-]2019-02-02 14:42:09[-]45[-]345[-]345[-]http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2.jpg[-]http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2.jpg[-]http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2.jpg[-]345345[-]2[-]1[-]...[-]todo[-]', 1, '2019-02-03 16:50:34'),
(6, 'factura', 'hhh', '51[-]Hola4[-]2019-02-03 16:44:55[-]Factura de gas[-]Factura del agua[-]Factura de la luz[-]http://localhost/uploads/CONCRETOL/272F510AEEE10D84D031006000E3707F9DDCFFAF.jpg[-]http://localhost/uploads/ALL/40999FE96FB49D3B0F39C09058817C1340066C88.jpg[-]http://localhost/uploads/ALL/4E4D78568DE154922A70DB853034F3E81F8DFAA5.jpg[-]1123322[-]1[-]1[-]Ninguna[-]todo[-]', 1, '2019-02-04 06:54:51'),
(7, 'factura', 'Stid', '53[-]4000 MC[-]2019-02-04 07:13:19[-]111[-]222[-]3333[-]http://localhost/uploads/JUANCHOS/89A6A40109D2A579681C8BE50DB09C9E9F8B8A1B.png[-]http://localhost/uploads/CONCRETOL/85C7ED4115541E5DF141419F07B2987D098EC6C1%20-%20copia%20(2).png[-]http://localhost/uploads/JUANCHOS/F524A135792EC9CFDD24E0FB58125CEF28868CD6.jpg[-]2345555[-]1[-]1[-]stid[-]todo[-]', 1, '2019-02-04 07:17:07'),
(8, 'factura', 'POR QUE EXPIRO', '67[-]123 MC[-]2019-02-02 08:23:39[-]111[-]222[-]333[-]http://192.168.1.8/uploads/CONCRETOL/9C147B5EF6B2FB883D16CB280FFC9D62AFE43BE7.jpg[-]http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2.jpg[-]http://localhost/uploads/ALL/85C7ED4115541E5DF141419F07B2987D098EC6C1.png[-]88900[-]1[-]1[-]sfdsdsfdsffdsfds\r\n								[-]todo[-]', 1, '2019-02-04 14:27:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `km_obras`
--

CREATE TABLE `km_obras` (
  `idObra` int(12) NOT NULL,
  `codigoObra` varchar(66) NOT NULL,
  `nombreObra` varchar(66) NOT NULL,
  `direccionObra` varchar(66) NOT NULL,
  `cliId` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `km_obras`
--

INSERT INTO `km_obras` (`idObra`, `codigoObra`, `nombreObra`, `direccionObra`, `cliId`) VALUES
(89, 'ewewe', 'weew', 'weew', 12),
(90, '43', 'ee', 'ee', 12),
(91, 'qwqwq', 'wqwwq', 'wqwq', 18),
(92, 'qwqwq2', 'wqwwq', 'wqwq', 18),
(93, 'qwqwq234', 'wqwwq', 'wqwq', 18),
(94, 'qwqwq23434', 'wqwwq', 'wqwq', 18),
(95, 'qwqwq23434434', 'wqwwq', 'wqwq', 18),
(96, 'qwqwq23434434343443', 'wqwwq', 'wqwq', 18),
(97, 'ewwe', 'ewwe', 'wewe', 18),
(98, 'ewwe333', 'wewe', 'wewe', 18),
(99, 'ewwe223232', 'wewe', 'weew', 18),
(100, 'ewwewe1211212123', 'wewe', 'wewe', 18),
(101, '2323', 'wewe', 'ewe', 12),
(102, '23232', 'wewe', 'ewe', 12),
(103, '232324554', 'wewe', 'ewe', 12),
(104, '232324554ererer', 'wewe', 'ewe', 12),
(105, '32323', 'wewe', 'ewwe', 12),
(106, 'ewewewewe', 'ewweewew', 'wewe', 12),
(107, 'ererererer', 'ererer', 'ererer', 18),
(108, '22222222222222222', 'weew', 'ewwe', 12),
(109, 'erererererer3334', 'erererer', 'ererer', 12),
(110, 'erererererer3334ewew', 'erererer', 'ererer', 12),
(111, 'erererererer3334ewewew', 'erererer', 'ererer', 12),
(112, 'dsdsd', 'sdsd', 'sdsd', 0),
(113, 'weew', 'wewe', 'wewe', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `km_remisiones`
--

CREATE TABLE `km_remisiones` (
  `idRemi` int(40) NOT NULL,
  `codigoRemi` varchar(66) NOT NULL,
  `imagenRemi` varchar(255) NOT NULL,
  `cliId` int(12) NOT NULL,
  `idObra` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `km_remisiones`
--

INSERT INTO `km_remisiones` (`idRemi`, `codigoRemi`, `imagenRemi`, `cliId`, `idObra`) VALUES
(8, 'erer', 'images/Remisiones-imagenes/52602252_2061696343911535_1792132983235280896_n.png', 12, 90),
(9, '23232323', 'images/Remisiones-imagenes/52602252_2061696343911535_1792132983235280896_n.png', 12, 90),
(10, '2', 'images/Remisiones-imagenes/52602252_2061696343911535_1792132983235280896_n.png', 12, 90),
(11, '22', 'images/Remisiones-imagenes/52602252_2061696343911535_1792132983235280896_n.png', 12, 90),
(12, 'wewewe', 'images/Remisiones-imagenes/52602252_2061696343911535_1792132983235280896_n.png', 12, 90),
(13, 'porno', 'images/Remisiones-imagenes/52602252_2061696343911535_1792132983235280896_n.png', 12, 90),
(14, '12', 'images/Remisiones-imagenes/52602252_2061696343911535_1792132983235280896_n.png', 12, 90),
(15, 'joderquerico', 'images/Remisiones-imagenes/E58AB05BAF248F4715DC164E8A6489395D8BDEFC.png', 12, 90),
(16, 'ghghg', 'images/Remisiones-imagenes/82F4C1EB67406270B508282C84F23E166FE8C1E7.png', 12, 101),
(17, 'ewewe', 'images/Remisiones-imagenes/96E8FC570396988F646E40BE9323E51D0BEBF90C.png', 12, 90),
(18, 'eeee', 'images/Remisiones-imagenes/09438A394C548401FAB9D1E1B09C846F88B9C389.png', 12, 90),
(19, 'rer', 'images/Remisiones-imagenes/4E8C8A7CAB0D6E0B2D143941619BBD0FC8F205D3.png', 12, 104);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `km_roles`
--

CREATE TABLE `km_roles` (
  `idRol` int(1) NOT NULL,
  `nombreRol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `km_roles`
--

INSERT INTO `km_roles` (`idRol`, `nombreRol`) VALUES
(1, 'cliente'),
(2, 'programacion'),
(3, 'facturacion'),
(4, 'root');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `km_tipopersona`
--

CREATE TABLE `km_tipopersona` (
  `idPersona` int(12) NOT NULL,
  `tipoPersona` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `km_tipopersona`
--

INSERT INTO `km_tipopersona` (`idPersona`, `tipoPersona`) VALUES
(1, 'Natural'),
(2, 'Juridica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `km_usuarios`
--

CREATE TABLE `km_usuarios` (
  `idUsuario` int(12) NOT NULL,
  `nombreUsuario` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `nickUsuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `contraUsuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `emailUsuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `idRol` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `km_usuarios`
--

INSERT INTO `km_usuarios` (`idUsuario`, `nombreUsuario`, `nickUsuario`, `contraUsuario`, `emailUsuario`, `idRol`) VALUES
(1, 'km_root', 'root', 'cd92a26534dba48cd785cdcc0b3e6bd1', 'killer@monkey', 4),
(2, 'Gerente', 'crtadm2', '0fa6a40886f4f58bb4f0b6a56af58c38', 'admin2@admin', 4),
(3, 'Ejecutivo', 'crtadm3', '8ba5f0e77d2920716d18a6c05ae68ac0', 'admin3@admin', 4),
(4, 'Facturacion(1)', 'crtfactu1', '0cd173d56e9ff02b92931a38de495eb9', 'factu@concretol.com', 3),
(5, 'Facturacion(2)', 'crtfactu2', '7bad15309aaea4695b31fa954a322a14', 'factu2@concretol.com', 3),
(6, 'Programacion(1)', 'crtprogr1', '2123ce1067b25bb4b106e6a39919ec05', 'programacion@concretol.com', 2),
(7, 'Programacion(2)', 'crtprogr2', '696bacd4cedbcc5262ba15e7aa1301d1', 'programacion2@concretol.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_responsables`
--

CREATE TABLE `log_responsables` (
  `idLog` int(12) NOT NULL,
  `idResponsable` int(12) NOT NULL,
  `nomResponsable` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `accionResponsable` int(1) NOT NULL,
  `nomUsuario` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `idRol` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `log_responsables`
--

INSERT INTO `log_responsables` (`idLog`, `idResponsable`, `nomResponsable`, `accionResponsable`, `nomUsuario`, `idRol`) VALUES
(52, 1, 'Juan David', 1, 'heyder', 2),
(53, 1, 'Juan David', 2, 'heyderesf', 2),
(54, 1, 'Juan David', 3, 'heyderesf', 2),
(55, 1, 'Juan David', 1, 'Juanewqew', 2),
(56, 1, 'km_root', 1, '1122222223', 1),
(57, 1, 'km_root', 1, '90', 1),
(58, 1, 'km_root', 1, '2222222222', 1),
(59, 1, 'km_root', 1, '1110577133', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `km_busqueda`
--
ALTER TABLE `km_busqueda`
  ADD PRIMARY KEY (`idBusqueda`);

--
-- Indices de la tabla `km_clientes`
--
ALTER TABLE `km_clientes`
  ADD PRIMARY KEY (`cliId`);

--
-- Indices de la tabla `km_empresas`
--
ALTER TABLE `km_empresas`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `km_facturas`
--
ALTER TABLE `km_facturas`
  ADD PRIMARY KEY (`idFactura`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Indices de la tabla `km_facturas2`
--
ALTER TABLE `km_facturas2`
  ADD PRIMARY KEY (`idFac`);

--
-- Indices de la tabla `km_log`
--
ALTER TABLE `km_log`
  ADD PRIMARY KEY (`idLog`);

--
-- Indices de la tabla `km_obras`
--
ALTER TABLE `km_obras`
  ADD PRIMARY KEY (`idObra`);

--
-- Indices de la tabla `km_remisiones`
--
ALTER TABLE `km_remisiones`
  ADD PRIMARY KEY (`idRemi`);

--
-- Indices de la tabla `km_roles`
--
ALTER TABLE `km_roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `km_tipopersona`
--
ALTER TABLE `km_tipopersona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `km_usuarios`
--
ALTER TABLE `km_usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_roles` (`idRol`);

--
-- Indices de la tabla `log_responsables`
--
ALTER TABLE `log_responsables`
  ADD PRIMARY KEY (`idLog`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `km_busqueda`
--
ALTER TABLE `km_busqueda`
  MODIFY `idBusqueda` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `km_clientes`
--
ALTER TABLE `km_clientes`
  MODIFY `cliId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `km_facturas`
--
ALTER TABLE `km_facturas`
  MODIFY `idFactura` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `km_facturas2`
--
ALTER TABLE `km_facturas2`
  MODIFY `idFac` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `km_log`
--
ALTER TABLE `km_log`
  MODIFY `idLog` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `km_obras`
--
ALTER TABLE `km_obras`
  MODIFY `idObra` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `km_remisiones`
--
ALTER TABLE `km_remisiones`
  MODIFY `idRemi` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `log_responsables`
--
ALTER TABLE `log_responsables`
  MODIFY `idLog` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `km_facturas`
--
ALTER TABLE `km_facturas`
  ADD CONSTRAINT `km_facturas_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `km_empresas` (`idEmpresa`);

--
-- Filtros para la tabla `km_usuarios`
--
ALTER TABLE `km_usuarios`
  ADD CONSTRAINT `fk_roles` FOREIGN KEY (`idRol`) REFERENCES `km_roles` (`Idrol`);

--
-- Filtros para la tabla `log_responsables`
--
ALTER TABLE `log_responsables`
  ADD CONSTRAINT `log_responsables_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `km_roles` (`Idrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
