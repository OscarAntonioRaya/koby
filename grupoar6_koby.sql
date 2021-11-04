-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-10-2021 a las 16:19:30
-- Versión del servidor: 5.6.41-84.1
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupoar6_koby`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `msgStatus`
--

CREATE TABLE `msgStatus` (
  `id` int(11) NOT NULL,
  `msg` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `estilo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `msgStatus`
--

INSERT INTO `msgStatus` (`id`, `msg`, `estilo`, `descripcion`, `mensaje`) VALUES
(1, 'ylog', 'warning', 'Usuario que entra al login pero ya inició sesión', 'Ya has iniciado sesión.'),
(2, 'all', 'danger', 'Registro en blanco', 'Por favor llena el formulario.'),
(3, 'nombre', 'danger', 'Registro sin proporcionar su nombre.', 'Proporciona tu nombre.'),
(4, 'noemail', 'danger', 'Correo electrónico inválido', 'El correo no es válido, ingresa uno diferente.'),
(5, 'ups', 'warning', 'Error general intenta de nuevo', 'Ah ocurrido un error inesperado, por favor intenta de nuevo.'),
(6, 'rlim', 'danger', 'Limite general', 'Por favor contacta a un administrador.'),
(7, 'mailex', 'danger', 'Alguien se intenta registrar con un correo existente.', 'El correo que proporcionaste ya está en uso.'),
(11, 'bienvenido', 'success', 'Bienvenida a un ususario que se ha logeado.', '¡Bienvenido!'),
(12, 'inv', 'danger', 'Al inciar sesión. Cuando el usuario no existe o contraseña incorrecta', 'Acceso inválido, intenta de nuevo.'),
(13, 'bye', 'success', 'Al cerrar sesion', 'Haz cerrado sesión correctamente. ¡Nos vemos pronto!'),
(14, 'log', 'warning', 'Necesitas iniciar sesión', 'Necesitas iniciar sesión.'),
(15, 'sad', 'danger', 'Alguien intenta acceder sin permisos.', 'Solo un Administrador puede acceder a estas funciones.'),
(20, 'fnvz', 'danger', 'Suben foto muy pesada.', 'Por saguridad solo puedes subir fotos de máximo 1 MB.'),
(32, 'contok', 'success', 'Mensaje de contacto correcto', '¡Resibimos tu mensaje!'),
(33, 'err', 'danger', 'Error general', 'Ups! Algo salió mal, por favor intenta de nuevo.'),
(34, 'mant', 'success', 'Acceso restringido por manteniemiento', '¡Estamos mejorando la Oficina Virtual! Por favor intenta más tarde.'),
(35, 'acept', 'warning', 'Registro sin acpetar condiciones', 'Necesitas aceptar nuestros términos y condiciones para unirte.'),
(45, 'actper', 'success', '', 'Actualizaste tu perfil correctamente.'),
(46, 'fnv', 'danger', '', 'Formato inválido, sube una fotografía JPG.'),
(47, 'modif', 'danger', '', '¡No puedes manimular información encriptada!'),
(48, 'impdel', 'danger', '', 'Imposible de eliminar.'),
(50, 'nadael', 'warning', '', 'No hay nada que eliminar.'),
(59, 'msgel', 'success', 'Admin elimina un mensaje de estatus', 'Mensaje de estado eliminado correctamente.'),
(62, 'mnsok', 'success', 'Super usuario agregó un nuevo mensaje de estatus', 'Mensaje de estatus agregado!'),
(97, 'rcok', 'success', 'Registro de usuario correcto', 'Te has registrado correctamente'),
(99, 'emailver', 'warning', 'Doble verificación de correo no coincide', 'Tu correo no coincide, intenta de nuevo.'),
(102, 'ovacep', 'warning', 'Usuario no acepta', 'Es necesario aceptar este aviso para poder continuar.'),
(103, 'pedabnoen', 'warning', 'Pedido no encontrado', 'Pedido no encontrado'),
(104, 'pagok', 'success', 'Pagado!', 'Pagado!'),
(109, 'tariok', 'success', 'Tarifa dada de alta', 'Has dado de alta una nueva tarifa.'),
(111, 'fenova', 'warning', 'Fecha no Válida', 'La fecha no es válida.'),
(116, 'noaccsar', 'warning', 'No tienes acceso a esta area', 'Esta es tu area designada.'),
(117, 'denperm', 'success', 'Permisos denegados correctamente', 'Permisos denegados correctamente'),
(118, 'userup', 'success', 'Usuario actualizado!', 'Usuario actualizado!'),
(119, 'usernoval', 'danger', 'Usuario no encontrado.', 'Usuario no encontrado.'),
(120, 'usercamb', 'success', 'Cambiar de usuario logeado', 'Has cambiado de usuario'),
(122, 'statup', 'success', 'Tipo de pago actualizado', 'Tipo de pago actualizado'),
(125, 'pedup', 'success', 'Pedido actualizado', 'Pedido actualizado.'),
(130, 'pednoen', 'danger', 'Pedido no encontrado', 'Pedido no encontrado'),
(140, 'descnoval', 'warning', 'Descuento no es válido.', 'Descuento no es válido.'),
(141, 'descok', 'success', 'Descuento aplicado', 'Descuento aplicado correctamente.'),
(142, 'pedcerok', 'success', 'Pedido cerrado correctamente.', 'Recibo cerrado correctamente.'),
(143, 'pedelok', 'success', 'Pedido eliminado correctamente.', 'Pedido eliminado correctamente.'),
(148, 'textu', 'warning', 'No cargaron la textura del material dado de alta.', 'La textura dle material es obligatoria.'),
(149, 'matok', 'success', 'Material agregado correctamente.', 'Material agregado correctamente.'),
(150, 'matdel', 'success', 'Material eliminado correctamente.', 'Material eliminado correctamente.'),
(151, 'matnoen', 'warning', 'Material no encontrado.', 'Material no encontrado.'),
(152, 'matup', 'success', 'Material actualizado correctamente.', 'Material actualizado correctamente.'),
(153, 'tmedok', 'success', 'Tipo de medida agregado correctamente.', 'Tipo de medida agregado correctamente.'),
(154, 'tmeddel', 'success', 'Tipo de medida eliminado correctamente.', 'Tipo de medida eliminado correctamente.'),
(155, 'formdel', 'success', 'Forma eliminada correctamente.', 'Forma eliminada correctamente.'),
(156, 'taridel', 'success', 'Tarifa eliminada correctamente.', 'Tarifa eliminada correctamente.'),
(157, 'tarnoval', 'warning', 'Tarifa no encontrada.', 'Tarifa no encontrada.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pbFormas`
--

CREATE TABLE `pbFormas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `forma` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `fr` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pbFormas`
--

INSERT INTO `pbFormas` (`id`, `nombre`, `forma`, `admin`, `fr`) VALUES
(7, 'Circulo', 'PSZEFTU9Y1', 1, '2021-09-23 19:57:35'),
(8, 'Exágono', '2YAMVYK5HT', 1, '2021-09-23 19:57:47'),
(9, 'Corazón', 'L4E1B78GH7', 1, '2021-09-23 19:58:02'),
(10, 'Cuadrado', 'YUQ88VCD94', 1, '2021-09-23 19:58:11'),
(11, 'Rectángulo horizontal', 'ILSQHOO9IA', 1, '2021-09-23 19:58:33'),
(12, 'Rectángulo vertical', 'JBDSA41452', 1, '2021-09-23 19:58:56'),
(13, 'Cuadro holandés', 'EWHR5056RN', 1, '2021-09-23 19:59:28'),
(14, 'Rectángulo horizontal holandés', 'U2VIZHMT8A', 1, '2021-09-23 19:59:45'),
(15, 'Rectángulo vertical holandés', '25FSALK7AZ', 1, '2021-09-23 19:59:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pbMateriales`
--

CREATE TABLE `pbMateriales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `textura` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fr` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fa` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pbMateriales`
--

INSERT INTO `pbMateriales` (`id`, `nombre`, `descripcion`, `textura`, `fr`, `fa`) VALUES
(4, 'Madera', '<p><strong>Madera de pino natural</strong>, cada unidad es diferente en los tonos y formas de la madera que contiene la transparencia de la madera, depende del peso de la imagen y sus matices. Puede haber marcas de madera visibles en la imagen. Los tonos de la imagen var&iacute;an con el pigmento de la madera. Es parte de la <strong>belleza de la madera</strong>.</p>', '0X1YI8VR1R', '2021-09-22 19:42:19', '2021-09-23 19:50:45'),
(5, 'Aluminio', '<p>El aluminio es un material ligero, con un<strong> aspecto especial y lujoso</strong>.Consta de un bloque de aluminio hueco, con lados de madera OSB. La impresi&oacute;n de una imagen en aluminio le da un tono y un aspecto met&aacute;lico &uacute;nicos. Una imagen que se ve bien para ti.</strong></p>', '6ZWZ0HX9ES', '2021-09-23 19:47:55', '0000-00-00 00:00:00'),
(6, 'OBS', '<p>OSB <strong>Bloque industrializado, duradero y resistente</strong>, hecho de virutas de madera y resina. Cada unidad es diferente en tonos y formas de astillas de madera. La transparencia del material depende del peso de la imagen y sus matices. Puede haber marcas de madera visibles en la imagen, abolladuras y agujeros del material. Los tonos de la imagen var&iacute;an con el pigmento de la madera. Nuestra recomendaci&oacute;n para imprimir en PrintBlock OSB es utilizar im&aacute;genes con una gran superficie, sin detalles peque&ntilde;os o delicados.</p>', 'KOSW2LGKZ1', '2021-09-23 19:57:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pbTarifas`
--

CREATE TABLE `pbTarifas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `material` int(8) NOT NULL,
  `forma` int(8) NOT NULL,
  `tipoMedida` int(8) NOT NULL,
  `base` decimal(11,2) NOT NULL,
  `altura` decimal(11,2) NOT NULL,
  `grosor` decimal(11,2) NOT NULL,
  `fr` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fa` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin` int(8) NOT NULL,
  `precio` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pbTarifas`
--

INSERT INTO `pbTarifas` (`id`, `nombre`, `material`, `forma`, `tipoMedida`, `base`, `altura`, `grosor`, `fr`, `fa`, `admin`, `precio`) VALUES
(2, 'Pino cuadrado', 4, 10, 10, 9.00, 9.00, 40.00, '2021-09-23 20:01:22', '0000-00-00 00:00:00', 1, 200.00),
(3, 'Pino cuadrado', 4, 10, 2, 14.00, 14.00, 40.00, '2021-09-23 20:06:57', '0000-00-00 00:00:00', 1, 300.00),
(4, 'Pino cuadrado', 4, 10, 3, 19.00, 19.00, 40.00, '2021-09-23 20:07:20', '0000-00-00 00:00:00', 1, 400.00),
(5, 'Pino rectangular', 4, 11, 10, 9.00, 14.00, 40.00, '2021-09-23 20:17:07', '0000-00-00 00:00:00', 1, 250.00),
(6, 'Pino rectangular', 4, 11, 2, 14.00, 21.00, 40.00, '2021-09-23 20:17:34', '0000-00-00 00:00:00', 1, 350.00),
(7, 'Pino rectangular', 4, 11, 3, 19.00, 29.00, 40.00, '2021-09-23 20:18:02', '0000-00-00 00:00:00', 1, 450.00),
(8, 'Pino rectangular', 4, 12, 10, 9.00, 14.00, 40.00, '2021-09-23 20:18:28', '0000-00-00 00:00:00', 1, 250.00),
(9, 'Pino rectangular', 4, 12, 2, 14.00, 21.00, 40.00, '2021-09-23 20:18:51', '0000-00-00 00:00:00', 1, 350.00),
(10, 'Pino rectangular', 4, 12, 3, 19.00, 29.00, 40.00, '2021-09-23 20:19:13', '0000-00-00 00:00:00', 1, 450.00),
(11, 'Pino hexágono', 4, 8, 10, 13.00, 0.00, 30.00, '2021-09-23 20:20:41', '2021-09-24 15:46:40', 1, 250.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pbTiposMedidas`
--

CREATE TABLE `pbTiposMedidas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `admin` int(11) NOT NULL,
  `fr` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `pbTiposMedidas`
--

INSERT INTO `pbTiposMedidas` (`id`, `nombre`, `admin`, `fr`) VALUES
(2, 'Mediano', 1, '2021-09-23 16:08:17'),
(3, 'Grande', 1, '2021-09-23 16:08:23'),
(4, 'Cuadrado chico', 1, '2021-09-23 16:09:13'),
(5, 'Rectángulo chico', 1, '2021-09-23 16:09:20'),
(6, 'Rectángulo mediano', 1, '2021-09-23 16:09:26'),
(7, 'Rectángulo grande', 1, '2021-09-23 16:09:43'),
(8, 'Cuadrado mediano', 1, '2021-09-23 16:10:09'),
(9, 'Cuadrado grande', 1, '2021-09-23 16:10:14'),
(10, 'Chico', 1, '2021-09-23 16:17:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(1) NOT NULL,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'SuperUsuario'),
(2, 'Administrador'),
(3, 'Manager'),
(4, 'Editor'),
(5, 'Viewer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `apeidos` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `fPerfil` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `rol` int(2) NOT NULL,
  `fr` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fa` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fl` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apeidos`, `email`, `fPerfil`, `pass`, `rol`, `fr`, `fa`, `fl`) VALUES
(1, '    Antonio', 'García', 'jantonioga90@gmail.com', '5RHS8C0IX1', 'ppzbgriw-22', 1, '2021-08-16 18:19:25', '2021-09-22 22:29:52', '2021-09-25 00:29:45'),
(2, 'Antonio', 'García', 'jantonioga90@hotmail.com', '', 'ppzbgriw-22', 1, '2021-08-16 18:19:25', '0000-00-00 00:00:00', '2021-09-16 00:17:27'),
(12, 'PruebaA', 'prueba', 'jantoniogaAS90@gmail.com', '', '654', 3, '2021-09-22 23:32:15', '2021-09-23 02:22:27', '0000-00-00 00:00:00'),
(13, 'Koby', 'PrintBlock', 'koby@gmail.com', '', 'PrintBlock', 2, '2021-09-25 00:30:14', '0000-00-00 00:00:00', '2021-09-26 15:53:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `msgStatus`
--
ALTER TABLE `msgStatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pbFormas`
--
ALTER TABLE `pbFormas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pbMateriales`
--
ALTER TABLE `pbMateriales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pbTarifas`
--
ALTER TABLE `pbTarifas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pbTiposMedidas`
--
ALTER TABLE `pbTiposMedidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `msgStatus`
--
ALTER TABLE `msgStatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `pbFormas`
--
ALTER TABLE `pbFormas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pbMateriales`
--
ALTER TABLE `pbMateriales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pbTarifas`
--
ALTER TABLE `pbTarifas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pbTiposMedidas`
--
ALTER TABLE `pbTiposMedidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
