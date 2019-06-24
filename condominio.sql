-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-06-2019 a las 21:04:13
-- Versión del servidor: 5.7.26-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `condominio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE `autos` (
  `id` int(11) NOT NULL,
  `num_placa` varchar(25) NOT NULL,
  `marca` varchar(150) DEFAULT NULL,
  `modelo` varchar(150) DEFAULT NULL,
  `anio` varchar(4) DEFAULT NULL,
  `color` varchar(150) DEFAULT NULL,
  `codigo` varchar(250) DEFAULT NULL,
  `personas_id` int(11) NOT NULL COMMENT 'Responsable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Inventario de autos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Entidades Bancarias';

--
-- Volcado de datos para la tabla `bancos`
--

INSERT INTO `bancos` (`id`, `nombre`) VALUES
(1, 'MERCANTIL, BANCO UNIVERSAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conceptos`
--

CREATE TABLE `conceptos` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `tipo` enum('INGRESO','EGRESO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Conceptos de Ingresos o Egresos';

--
-- Volcado de datos para la tabla `conceptos`
--

INSERT INTO `conceptos` (`id`, `descripcion`, `tipo`) VALUES
(1, 'Mensualidad de Condominio', 'INGRESO'),
(2, 'Gastos de Papeleria', 'EGRESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentavivienda`
--

CREATE TABLE `cuentavivienda` (
  `id` int(11) NOT NULL,
  `viviendas_id` int(11) NOT NULL,
  `tipoobligaciones_id` int(11) DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL,
  `mes` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `monto` decimal(20,2) NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `monto_faltante` decimal(20,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Guarda la relacion mensual de compromisos de cada vivienda';

--
-- Volcado de datos para la tabla `cuentavivienda`
--

INSERT INTO `cuentavivienda` (`id`, `viviendas_id`, `tipoobligaciones_id`, `descripcion`, `mes`, `anio`, `monto`, `fecha_vencimiento`, `monto_faltante`) VALUES
(1, 2, 1, 'Mensualidad del mes de Enero de 2019', 1, 2019, '2000.00', '2019-01-31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentavivienda_pagosvivienda`
--

CREATE TABLE `cuentavivienda_pagosvivienda` (
  `id` int(11) NOT NULL,
  `cuentavivienda_id` int(11) NOT NULL,
  `pagosvivienda_id` int(11) NOT NULL,
  `montopagado` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de vinculación de cuentas y pagos de las viviendas ';

--
-- Volcado de datos para la tabla `cuentavivienda_pagosvivienda`
--

INSERT INTO `cuentavivienda_pagosvivienda` (`id`, `cuentavivienda_id`, `pagosvivienda_id`, `montopagado`) VALUES
(4, 1, 1, '10.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directiva`
--

CREATE TABLE `directiva` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fecha_ini` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Directiva de Junta de Condominio';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `rif` varchar(10) NOT NULL,
  `razon_social` varchar(150) NOT NULL,
  `telefono` varchar(150) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `representante` varchar(255) DEFAULT NULL,
  `logo_img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de Configuracion de Empresas';

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id`, `rif`, `razon_social`, `telefono`, `direccion`, `representante`, `logo_img`) VALUES
(1, 'J-12345678', 'Empresa De Vigilancia Romor C. A.', '02512530583', 'Centro Empresarial del Este, Oficina 255, PentHouse', 'Maria Ordoñez', 'img/020816_logo_gerantor_G.png'),
(2, 'V108485759', 'Servicios Infórmaticos Web por Antonio Romero', '04163526060', 'Urbanizacion Colinas de Santa Rosa', 'Antonio Romero', NULL),
(3, 'J311845356', 'VIGILANCIA Y PROTECCIÓN MARSHALL, C.A.', '', '', 'TATY MIQUILENA', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicoobligaciones`
--

CREATE TABLE `historicoobligaciones` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipoobligaciones_id` int(11) NOT NULL,
  `monto` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Guarda el monto de las obligaciones que se han generado en el tiempo';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresosegresos`
--

CREATE TABLE `ingresosegresos` (
  `id` int(11) NOT NULL,
  `conceptos_id` int(11) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `fecha` date NOT NULL,
  `monto` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Relación de Ingresos y Egresos';

--
-- Volcado de datos para la tabla `ingresosegresos`
--

INSERT INTO `ingresosegresos` (`id`, `conceptos_id`, `descripcion`, `fecha`, `monto`) VALUES
(1, 1, 'Mensualidad', '2019-01-01', '200.00'),
(2, 1, 'Mensualidad', '2019-06-01', '200.00'),
(3, 1, 'Mensualidad', '2019-01-10', '300.00'),
(4, 1, 'Mensualidad', '2019-01-03', '400.00'),
(5, 1, 'Mensualidad', '2019-01-02', '500.00'),
(6, 1, 'Mensualidad', '2019-05-08', '300.00'),
(7, 1, 'Mensualidad', '2019-02-14', '200.00'),
(8, 2, 'Libretas', '2019-01-24', '600.00'),
(9, 2, 'Libretas', '2019-01-24', '600.00'),
(10, 2, 'Libretas', '2019-02-21', '50.00'),
(11, 2, 'Lapices', '2019-02-11', '20.00'),
(12, 2, 'Lapiceros', '2019-02-13', '10.00'),
(13, 1, 'Mes de Marzo', '2019-03-30', '80000.00'),
(14, 1, 'Mes de Abril', '2019-04-30', '85000.00'),
(15, 1, 'Mes de Febrero', '2019-02-28', '1.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juntacondominio`
--

CREATE TABLE `juntacondominio` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `urbanizacion` varchar(150) DEFAULT NULL,
  `telefono1` varchar(15) DEFAULT NULL,
  `telefono2` varchar(15) DEFAULT NULL,
  `telefono3` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Junta de Condominio';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

CREATE TABLE `miembros` (
  `id` int(11) NOT NULL,
  `cedula_identidad` varchar(15) NOT NULL,
  `nacionalidad` char(1) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `sexo` varchar(50) NOT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `telefono_local` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Habitantes de las viviendas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembrosdirectiva`
--

CREATE TABLE `miembrosdirectiva` (
  `id` int(11) NOT NULL,
  `directiva_id` int(11) NOT NULL,
  `miembros_id` int(11) NOT NULL,
  `cargos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Miembros que conforman la Junta Directiva';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1558287665),
('m140209_132017_init', 1558390218),
('m140403_174025_create_account_table', 1558390219),
('m140504_113157_update_tables', 1558390223),
('m140504_130429_create_token_table', 1558390224),
('m140830_171933_fix_ip_field', 1558390225),
('m140830_172703_change_account_table_name', 1558390225),
('m141222_110026_update_ip_field', 1558390226),
('m141222_135246_alter_username_length', 1558390227),
('m150614_103145_update_social_account_table', 1558390229),
('m150623_212711_fix_username_notnull', 1558390229),
('m151218_234654_add_timezone_to_profile', 1558390230),
('m160929_103127_add_last_login_at_to_user_table', 1558390230);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operacion`
--

CREATE TABLE `operacion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Configuración de Menu - Operacion';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagosvivienda`
--

CREATE TABLE `pagosvivienda` (
  `id` int(11) NOT NULL,
  `viviendas_id` int(11) NOT NULL,
  `monto` decimal(20,2) NOT NULL,
  `num_operacion` char(50) NOT NULL,
  `bancoemisor_id` int(11) NOT NULL,
  `bancoreceptor_id` int(11) NOT NULL,
  `num_cuenta` char(50) NOT NULL,
  `nombre_depositante` varchar(255) DEFAULT NULL,
  `cedula_depositante` varchar(25) DEFAULT NULL,
  `fecha_deposito` date NOT NULL,
  `fecha_disponible` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Pagos efectuados';

--
-- Volcado de datos para la tabla `pagosvivienda`
--

INSERT INTO `pagosvivienda` (`id`, `viviendas_id`, `monto`, `num_operacion`, `bancoemisor_id`, `bancoreceptor_id`, `num_cuenta`, `nombre_depositante`, `cedula_depositante`, `fecha_deposito`, `fecha_disponible`) VALUES
(1, 2, '50.00', '000001', 1, 1, '01020527', 'Ruperto', '11056784', '2019-01-01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `cedula_identidad` varchar(15) NOT NULL,
  `nacionalidad` char(1) DEFAULT NULL,
  `primer_apellido` varchar(50) NOT NULL,
  `segundo_apellido` varchar(50) DEFAULT NULL,
  `primer_nombre` varchar(50) NOT NULL,
  `segundo_nombre` varchar(50) DEFAULT NULL,
  `sexo` varchar(50) NOT NULL,
  `celular` varchar(50) DEFAULT NULL,
  `telefono_local` varchar(50) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `viviendas_id` int(11) NOT NULL COMMENT 'Vivienda donde habita',
  `responsable_vivienda` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Habitantes de las viviendas';

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `cedula_identidad`, `nacionalidad`, `primer_apellido`, `segundo_apellido`, `primer_nombre`, `segundo_nombre`, `sexo`, `celular`, `telefono_local`, `email`, `viviendas_id`, `responsable_vivienda`) VALUES
(1, '10848575', 'V', 'Romero', '', 'Antonio', '', 'MASCULINO', '04163526060', '', '', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `id` int(11) NOT NULL,
  `numero` char(150) NOT NULL,
  `pagosvivienda_id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Recibos de pagos del servicio';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Configuración de Menu y Usuarios - Roles';

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Usuario'),
(2, 'Admin'),
(3, 'SuperUsuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_operacion`
--

CREATE TABLE `rol_operacion` (
  `rol_id` int(11) NOT NULL,
  `operacion_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de vinculación de roles y operaciones';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldosiniciales`
--

CREATE TABLE `saldosiniciales` (
  `id` int(11) NOT NULL,
  `anio` int(4) NOT NULL,
  `monto` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Saldos al iniciar el año fiscal';

--
-- Volcado de datos para la tabla `saldosiniciales`
--

INSERT INTO `saldosiniciales` (`id`, `anio`, `monto`) VALUES
(1, 2019, '400000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldosmensuales`
--

CREATE TABLE `saldosmensuales` (
  `id` int(11) NOT NULL,
  `anio` int(4) NOT NULL,
  `mes` int(2) NOT NULL,
  `monto_ingresos` decimal(20,2) NOT NULL DEFAULT '0.00',
  `monto_egresos` decimal(20,2) NOT NULL DEFAULT '0.00',
  `saldo` decimal(20,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Saldos al finalizar cada mes';

--
-- Volcado de datos para la tabla `saldosmensuales`
--

INSERT INTO `saldosmensuales` (`id`, `anio`, `mes`, `monto_ingresos`, `monto_egresos`, `saldo`) VALUES
(1, 2019, 1, '1400.00', '1200.00', '400200.00'),
(2, 2019, 2, '201.00', '80.00', '400321.00'),
(3, 2019, 3, '80000.00', '0.00', '480321.00'),
(4, 2019, 4, '85000.00', '0.00', '565321.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoobligaciones`
--

CREATE TABLE `tipoobligaciones` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoobligaciones`
--

INSERT INTO `tipoobligaciones` (`id`, `descripcion`) VALUES
(1, 'Mensualidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(3, 'antoniojromeroc', 'antoniojromeroc@gmail.com', '$2y$12$JStaukkXWiUE/g2T7Q.7DuUH/m10rOLp0yO.JaC7GXTk6Qer3OD4S', 'B-W9DD4iODzh1iZlujTlcJNCopHja12w', 1558566627, NULL, NULL, '127.0.0.1', 1558565668, 1558565668, 0, 1561324830);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_bk`
--

CREATE TABLE `user_bk` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `rol_id` int(11) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Usuarios del sistema';

--
-- Volcado de datos para la tabla `user_bk`
--

INSERT INTO `user_bk` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `rol_id`, `created_at`, `updated_at`) VALUES
(1, 'antoniojromeroc', 'fpOfMcjV7UJvkxbOz-SgMe1mLty1ubRP', '$2y$13$WPozXVsDhBlFD6ZC9xJqUuR8gIuD7CrPIebx33jgPxP2pGW58Jb96', 'wUzJz1ZUPA5iDxqQ24T8SnOG-VIVeHGT_1557370286', 'antoniojromeroc@gmail.com', 10, 3, 1462234642, 1557370286),
(2, 'mordonez', 'm6nzO_JNwG1I8A_oLkiLxFw3LtevPsZD', '$2y$13$AQMbCr0Qh5GyB/a5cf1nA.W28Ki3JPaYVmt9m9XRbZJUdDhjmlwUG', NULL, 'mordonez@vipromarca.com.ve', 10, 1, 1464662284, 1464662284),
(3, 'aromero', 'lydpRlCZM9Poway5c7bGLytJCyQ3BltO', '$2y$13$U23vZVx6EdeZoKFbhHAvKuGUgdGsg6tXDZ8AEJ.kOHdm9NtDrH.BC', NULL, 'aromero@gmail.com', 10, 2, 1464751017, 1464751017),
(4, 'oromero', 'EIh-lNUWoKcXfYT93liloYh_F_rX5sf1', '$2y$13$ErGWe3V5trxWEcXVGU5UleFTqSj3qQuu/sGk6F9w8KjnTsVtlGiMa', NULL, 'oromero@gmail.com', 10, 1, 1464837543, 1464837543),
(5, 'ori', 'WyYfzMZLMvhjxtJMhBLiyLytIu6DuY8l', '$2y$13$bw/m/0v4g4xFvwIa2NoQk.4s8HEN4p408uQ/naoMZ07sXEUhXl6GG', NULL, 'oromero2@gmail.com', 10, 1, 1464838040, 1464838040),
(6, 'ajromeroc', 'UAMp5vJq6imU-u1ImpR8DTuZHH86P7dz', '$2y$13$6HMporflXPGucCwip1bygezpkkg6Pfas4iSaHmDal44K.GaduT7hu', NULL, 'ajromeroc@gmail.com', 10, 3, 1465005331, 1465005331),
(7, 'antonio', '5liaz4LuTqMWiMgx-pEynLbbhg9a7BH2', '$2y$13$N.vCaQ1D7j8OrkUh2ETAXeOwJPdMuQ4UDhQe78zvZ5mnrq0cL3iXq', NULL, '', 10, 1, 0, 0),
(8, 'antonio.romero', 'YB5YtJTbe0tJfYjHivGH0tEA6LFA6YVo', '$2y$13$cnu3guFsdIwCKciZ5mCkf.NUkKSt7ENwTrZkoBJxRZ17uw0OatRRy', NULL, 'antonio.romero@gmail.com', 10, 1, 1465006763, 1465006763),
(9, 'antoniojromero', 'S4z_wY-baZQsTh1i9voxwN0m61nEgzlD', '$2y$13$b/nVPpnVp93A9q3n5xkgD.ueY2y8DfgGEHtfx2in.G6El3Xj/eor2', NULL, 'antoniojromero@gmail.com', 10, 1, 1465054360, 1465054360),
(10, 'ajr', '1wgkbrDOIqLkJseFKqdDwxC6gtfH9jJl', '$2y$13$sHwgEFO8DI5STl8NEBvsle7vUivp11UkizlAEBkN9eXyueZUS51Wm', NULL, 'ajr@gmail.com', 10, 1, 1465054519, 1465054519),
(11, 'ajrc', 'RGQNiG6-rTDdInRbUwoZOBrrFTRj-lWW', '$2y$13$37dr/RlMOpy9ARjoBGBfnuLztZIle/SSUxgSRS53YtlnyeKtV80EK', NULL, 'ajrc@gmail.com', 10, 1, 1465056183, 1465056183),
(12, 'aj', 'Cf2v2YRn3ZRbWfmj8VN5TDyNbN-aIbcO', '$2y$13$C4i1wsJvdaLHaZI2VacQ8Oj6SxVa3bkKP5sI3zXlEPnEQEh0jefYO', NULL, 'aj@gmail.com', 10, 1, 1465078299, 1465078299),
(13, 'lromero', '-D-1YgPdi6Br18e9F6drNiwllrgMi_Rt', '$2y$13$Ux4BDFixwBt491qAcyuHfO.AGdA4qVIBZ.2VhZGAzqnxnOa6.Sa5i', NULL, 'lromero@gmail.com', 10, 1, 1465081245, 1465081245);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_empresa`
--

CREATE TABLE `user_empresa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `empresas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Relacion entre usuarios y empresas. Accesos Seguridad';

--
-- Volcado de datos para la tabla `user_empresa`
--

INSERT INTO `user_empresa` (`id`, `user_id`, `empresas_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viviendas`
--

CREATE TABLE `viviendas` (
  `id` int(11) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `calle` varchar(35) DEFAULT NULL,
  `carrera` varchar(35) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `personas_id` int(12) DEFAULT NULL COMMENT 'Representante',
  `codigo` varchar(150) DEFAULT NULL COMMENT 'Código asignada a cada vivienda por Administración de Condominio'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Viviendas';

--
-- Volcado de datos para la tabla `viviendas`
--

INSERT INTO `viviendas` (`id`, `numero`, `nombre`, `calle`, `carrera`, `telefono`, `personas_id`, `codigo`) VALUES
(2, '11-167', 'La Rivera', '', '13', '02512530583', NULL, '11-167');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viviendas_personas`
--

CREATE TABLE `viviendas_personas` (
  `id` int(11) NOT NULL,
  `viviendas_id` int(11) NOT NULL COMMENT 'Vivienda',
  `personas_id` int(11) NOT NULL COMMENT 'Persona'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla de vinculación de viviendas y personas';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autos`
--
ALTER TABLE `autos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_autos_personas` (`personas_id`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuentavivienda`
--
ALTER TABLE `cuentavivienda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cuentasviviendas_viviendas` (`viviendas_id`),
  ADD KEY `fk_cuentaviviendas_tipoobligaciones` (`tipoobligaciones_id`);

--
-- Indices de la tabla `cuentavivienda_pagosvivienda`
--
ALTER TABLE `cuentavivienda_pagosvivienda`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Unico` (`cuentavivienda_id`,`pagosvivienda_id`),
  ADD KEY `fk_cuentaviviendas_pagosvivienda_pv` (`pagosvivienda_id`);

--
-- Indices de la tabla `directiva`
--
ALTER TABLE `directiva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historicoobligaciones`
--
ALTER TABLE `historicoobligaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_historicoobligaciones_tipoobligaciones` (`tipoobligaciones_id`);

--
-- Indices de la tabla `ingresosegresos`
--
ALTER TABLE `ingresosegresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ingresosegresos_conceptos` (`conceptos_id`);

--
-- Indices de la tabla `juntacondominio`
--
ALTER TABLE `juntacondominio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `miembros`
--
ALTER TABLE `miembros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `miembrosdirectiva`
--
ALTER TABLE `miembrosdirectiva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_miembrosdirectiva_directiva` (`directiva_id`),
  ADD KEY `fk_miembrosdirectiva_miembros` (`miembros_id`),
  ADD KEY `fk_miembrosdirectiva_cargos` (`cargos_id`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `inombre` (`nombre`);

--
-- Indices de la tabla `pagosvivienda`
--
ALTER TABLE `pagosvivienda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pagosvivienda_viviendas` (`viviendas_id`),
  ADD KEY `fk_pagosvivienda_bancoemisor` (`bancoemisor_id`),
  ADD KEY `fk_pagosvivienda_bancoreceptor` (`bancoreceptor_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_persona_vivienda` (`viviendas_id`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_recibos_pagosvivienda` (`pagosvivienda_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol_operacion`
--
ALTER TABLE `rol_operacion`
  ADD PRIMARY KEY (`rol_id`,`operacion_id`),
  ADD KEY `fk_roloperacion_rol` (`rol_id`),
  ADD KEY `fk_roloperacion_operacion` (`operacion_id`);

--
-- Indices de la tabla `saldosiniciales`
--
ALTER TABLE `saldosiniciales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `saldosmensuales`
--
ALTER TABLE `saldosmensuales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isecunda` (`anio`,`mes`);

--
-- Indices de la tabla `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indices de la tabla `tipoobligaciones`
--
ALTER TABLE `tipoobligaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- Indices de la tabla `user_bk`
--
ALTER TABLE `user_bk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `fk_user_rol` (`rol_id`);

--
-- Indices de la tabla `user_empresa`
--
ALTER TABLE `user_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_user` (`user_id`),
  ADD KEY `fk_user_empresa` (`empresas_id`);

--
-- Indices de la tabla `viviendas`
--
ALTER TABLE `viviendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_viviendas_personas` (`personas_id`);

--
-- Indices de la tabla `viviendas_personas`
--
ALTER TABLE `viviendas_personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_viviendas-personas_personas` (`personas_id`),
  ADD KEY `fk_viviendas-personas_viviendas` (`viviendas_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autos`
--
ALTER TABLE `autos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `conceptos`
--
ALTER TABLE `conceptos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cuentavivienda`
--
ALTER TABLE `cuentavivienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cuentavivienda_pagosvivienda`
--
ALTER TABLE `cuentavivienda_pagosvivienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `directiva`
--
ALTER TABLE `directiva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `historicoobligaciones`
--
ALTER TABLE `historicoobligaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ingresosegresos`
--
ALTER TABLE `ingresosegresos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `juntacondominio`
--
ALTER TABLE `juntacondominio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `miembros`
--
ALTER TABLE `miembros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `miembrosdirectiva`
--
ALTER TABLE `miembrosdirectiva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `operacion`
--
ALTER TABLE `operacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pagosvivienda`
--
ALTER TABLE `pagosvivienda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `saldosiniciales`
--
ALTER TABLE `saldosiniciales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `saldosmensuales`
--
ALTER TABLE `saldosmensuales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipoobligaciones`
--
ALTER TABLE `tipoobligaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `user_bk`
--
ALTER TABLE `user_bk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `user_empresa`
--
ALTER TABLE `user_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `viviendas`
--
ALTER TABLE `viviendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `viviendas_personas`
--
ALTER TABLE `viviendas_personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `autos`
--
ALTER TABLE `autos`
  ADD CONSTRAINT `fk_autos_personas` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`);

--
-- Filtros para la tabla `cuentavivienda`
--
ALTER TABLE `cuentavivienda`
  ADD CONSTRAINT `fk_cuentasviviendas_viviendas` FOREIGN KEY (`viviendas_id`) REFERENCES `viviendas` (`id`),
  ADD CONSTRAINT `fk_cuentaviviendas_tipoobligaciones` FOREIGN KEY (`tipoobligaciones_id`) REFERENCES `tipoobligaciones` (`id`);

--
-- Filtros para la tabla `cuentavivienda_pagosvivienda`
--
ALTER TABLE `cuentavivienda_pagosvivienda`
  ADD CONSTRAINT `fk_cuentaviviendas_pagosvivienda_cv` FOREIGN KEY (`cuentavivienda_id`) REFERENCES `cuentavivienda` (`id`),
  ADD CONSTRAINT `fk_cuentaviviendas_pagosvivienda_pv` FOREIGN KEY (`pagosvivienda_id`) REFERENCES `pagosvivienda` (`id`);

--
-- Filtros para la tabla `historicoobligaciones`
--
ALTER TABLE `historicoobligaciones`
  ADD CONSTRAINT `fk_historicoobligaciones_tipoobligaciones` FOREIGN KEY (`tipoobligaciones_id`) REFERENCES `tipoobligaciones` (`id`);

--
-- Filtros para la tabla `ingresosegresos`
--
ALTER TABLE `ingresosegresos`
  ADD CONSTRAINT `fk_ingresosegresos_conceptos` FOREIGN KEY (`conceptos_id`) REFERENCES `conceptos` (`id`);

--
-- Filtros para la tabla `miembrosdirectiva`
--
ALTER TABLE `miembrosdirectiva`
  ADD CONSTRAINT `fk_miembrosdirectiva_cargos` FOREIGN KEY (`cargos_id`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `fk_miembrosdirectiva_directiva` FOREIGN KEY (`directiva_id`) REFERENCES `directiva` (`id`),
  ADD CONSTRAINT `fk_miembrosdirectiva_miembros` FOREIGN KEY (`miembros_id`) REFERENCES `miembros` (`id`);

--
-- Filtros para la tabla `pagosvivienda`
--
ALTER TABLE `pagosvivienda`
  ADD CONSTRAINT `fk_pagosvivienda_bancoemisor` FOREIGN KEY (`bancoemisor_id`) REFERENCES `bancos` (`id`),
  ADD CONSTRAINT `fk_pagosvivienda_bancoreceptor` FOREIGN KEY (`bancoreceptor_id`) REFERENCES `bancos` (`id`),
  ADD CONSTRAINT `fk_pagosvivienda_viviendas` FOREIGN KEY (`viviendas_id`) REFERENCES `viviendas` (`id`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_persona_vivienda` FOREIGN KEY (`viviendas_id`) REFERENCES `viviendas` (`id`);

--
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD CONSTRAINT `fk_recibos_pagosvivienda` FOREIGN KEY (`pagosvivienda_id`) REFERENCES `pagosvivienda` (`id`);

--
-- Filtros para la tabla `rol_operacion`
--
ALTER TABLE `rol_operacion`
  ADD CONSTRAINT `fk_roloperacion_operacion` FOREIGN KEY (`operacion_id`) REFERENCES `operacion` (`id`),
  ADD CONSTRAINT `fk_roloperacion_rol` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`);

--
-- Filtros para la tabla `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_bk`
--
ALTER TABLE `user_bk`
  ADD CONSTRAINT `fk_user_rol` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`id`);

--
-- Filtros para la tabla `user_empresa`
--
ALTER TABLE `user_empresa`
  ADD CONSTRAINT `fk_userempresa_empresa` FOREIGN KEY (`empresas_id`) REFERENCES `empresas` (`id`);

--
-- Filtros para la tabla `viviendas`
--
ALTER TABLE `viviendas`
  ADD CONSTRAINT `fk_viviendas_personas` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `viviendas_personas`
--
ALTER TABLE `viviendas_personas`
  ADD CONSTRAINT `fk_viviendas-personas_personas` FOREIGN KEY (`personas_id`) REFERENCES `personas` (`id`),
  ADD CONSTRAINT `fk_viviendas-personas_viviendas` FOREIGN KEY (`viviendas_id`) REFERENCES `viviendas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
