-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2019 a las 15:09:33
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(40, '2019-02-04 07:31:56', 1, '[K]4[K]todo[K]1[K]TODAS[K]2019-02-03[K]2019-02-28');

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
(55, '3423424vMC', '2019-02-02 08:23:39', '111', '222', '333', 'http://localhost/uploads/ALL/pic05.jpg', 'http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2.jpg', 'http://localhost/uploads/ALL/85C7ED4115541E5DF141419F07B2987D098EC6C1.png', '4354555', 1, 1, 'sfdsdsfdsffdsfds\r\n								', 'todo'),
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
(67, '3423424vMC', '2019-02-02 08:23:39', '111', '222', '333', 'http://localhost/uploads/ALL/pic05.jpg', 'http://localhost/uploads/CONCRETOL/783CE23326442A14F8AD9C0E27D14584436C1EC2.jpg', 'http://localhost/uploads/ALL/85C7ED4115541E5DF141419F07B2987D098EC6C1.png', '4354555', 1, 1, 'sfdsdsfdsffdsfds\r\n								', 'todo');

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
(7, 'factura', 'Stid', '53[-]4000 MC[-]2019-02-04 07:13:19[-]111[-]222[-]3333[-]http://localhost/uploads/JUANCHOS/89A6A40109D2A579681C8BE50DB09C9E9F8B8A1B.png[-]http://localhost/uploads/CONCRETOL/85C7ED4115541E5DF141419F07B2987D098EC6C1%20-%20copia%20(2).png[-]http://localhost/uploads/JUANCHOS/F524A135792EC9CFDD24E0FB58125CEF28868CD6.jpg[-]2345555[-]1[-]1[-]stid[-]todo[-]', 1, '2019-02-04 07:17:07');

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
  `idEmpresa` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `km_usuarios`
--

INSERT INTO `km_usuarios` (`idUsuario`, `nombreUsuario`, `nickUsuario`, `contraUsuario`, `emailUsuario`, `idEmpresa`) VALUES
(1, 'Juan David', 'Juann', '4ba5b6fa4cb4a9f03b945168047867b7', '11', 1),
(2, 'ColJuan4', '4444444', 'miranda', '22@4.com', 1),
(5, 'Jose', 'Juanchossd', 'Juanchoss', 'Jose@hhhh.com', 1),
(8, 'Stid', 'Stidddd', 'Juanchoss1', 'Stiddd@hhhh.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_responsables`
--

CREATE TABLE `log_responsables` (
  `idLog` int(12) NOT NULL,
  `idResponsable` int(12) NOT NULL,
  `nomResponsable` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `accionResponsable` int(1) NOT NULL,
  `idUsuario` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `log_responsables`
--

INSERT INTO `log_responsables` (`idLog`, `idResponsable`, `nomResponsable`, `accionResponsable`, `idUsuario`) VALUES
(1, 1, 'Juan David', 1, 5),
(32, 1, 'Juan David', 1, 1771),
(33, 1, 'Juan David', 2, 1771),
(34, 1, 'Juan David', 3, 1771),
(35, 1, 'Juan David', 1, 8),
(36, 1, 'Juan David', 2, 7),
(37, 1, 'Juan David', 2, 7),
(38, 1, 'Juan David', 3, 6),
(39, 1, 'Juan David', 1, 9),
(40, 1, 'Juan David', 3, 0),
(41, 1, 'Juan David', 3, 0),
(42, 1, 'Juan David', 3, 0),
(43, 1, 'Juan David', 3, 9),
(44, 1, 'Juan David', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `km_busqueda`
--
ALTER TABLE `km_busqueda`
  ADD PRIMARY KEY (`idBusqueda`);

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
-- Indices de la tabla `km_log`
--
ALTER TABLE `km_log`
  ADD PRIMARY KEY (`idLog`);

--
-- Indices de la tabla `km_usuarios`
--
ALTER TABLE `km_usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idEmpresa` (`idEmpresa`);

--
-- Indices de la tabla `log_responsables`
--
ALTER TABLE `log_responsables`
  ADD PRIMARY KEY (`idLog`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `km_busqueda`
--
ALTER TABLE `km_busqueda`
  MODIFY `idBusqueda` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `km_facturas`
--
ALTER TABLE `km_facturas`
  MODIFY `idFactura` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT de la tabla `km_log`
--
ALTER TABLE `km_log`
  MODIFY `idLog` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `km_usuarios`
--
ALTER TABLE `km_usuarios`
  MODIFY `idUsuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `log_responsables`
--
ALTER TABLE `log_responsables`
  MODIFY `idLog` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
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
  ADD CONSTRAINT `km_usuarios_ibfk_1` FOREIGN KEY (`idEmpresa`) REFERENCES `km_empresas` (`idEmpresa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
