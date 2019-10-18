-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2019 a las 12:50:44
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `autovalv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE `contenidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `elim` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`id`, `section`, `content`, `elim`, `created_at`, `updated_at`) VALUES
(1, 'terminos', '{\"title\":\"T\\u00e9rminos y Condiciones de Uso\",\"text\":\"<p><strong>INFORMACI&Oacute;N RELEVANTE<\\/strong><\\/p>\\n\\n<p>Es requisito necesario para la adquisici&oacute;n de los productos que se ofrecen en este sitio, que lea y acepte los siguientes T&eacute;rminos y Condiciones que a continuaci&oacute;n se redactan. El uso de nuestros servicios as&iacute; como la compra de nuestros productos implicar&aacute; que usted ha le&iacute;do y aceptado los T&eacute;rminos y Condiciones de Uso en el presente documento. Todas los productos &nbsp;que son ofrecidos por nuestro sitio web pudieran ser creadas, cobradas, enviadas o presentadas por una p&aacute;gina web tercera y en tal caso estar&iacute;an sujetas a sus propios T&eacute;rminos y Condiciones. En algunos casos, para adquirir un producto, ser&aacute; necesario el registro por parte del usuario, con ingreso de datos personales fidedignos y definici&oacute;n de una contrase&ntilde;a.<\\/p>\\n\\n<p>El usuario puede elegir y cambiar la clave para su acceso de administraci&oacute;n de la cuenta en cualquier momento, en caso de que se haya registrado y que sea necesario para la compra de alguno de nuestros productos. http:\\/\\/www.autovalv.com.ar\\/ no asume la responsabilidad en caso de que entregue dicha clave a terceros.<\\/p>\\n\\n<p>Todas las compras y transacciones que se lleven a cabo por medio de este sitio web, est&aacute;n sujetas a un proceso de confirmaci&oacute;n y verificaci&oacute;n, el cual podr&iacute;a incluir la verificaci&oacute;n del stock y disponibilidad de producto, validaci&oacute;n de la forma de pago, validaci&oacute;n de la factura (en caso de existir) y el cumplimiento de las condiciones requeridas por el medio de pago seleccionado. En algunos casos puede que se requiera una verificaci&oacute;n por medio de correo electr&oacute;nico.<\\/p>\\n\\n<p>Los precios de los productos ofrecidos en esta Tienda Online es v&aacute;lido solamente en las compras realizadas en este sitio web.<\\/p>\\n\\n<p><strong>LICENCIA<\\/strong><\\/p>\\n\\n<p>Autovalv S.A.&nbsp; a trav&eacute;s de su sitio web concede una licencia para que los usuarios utilicen&nbsp; los productos que son vendidos en este sitio web de acuerdo a los T&eacute;rminos y Condiciones que se describen en este documento.<\\/p>\\n\\n<p><strong>USO NO AUTORIZADO<\\/strong><\\/p>\\n\\n<p>En caso de que aplique (para venta de software, templetes, u otro producto de dise&ntilde;o y programaci&oacute;n) usted no puede colocar uno de nuestros productos, modificado o sin modificar, en un CD, sitio web o ning&uacute;n otro medio y ofrecerlos para la redistribuci&oacute;n o la reventa de ning&uacute;n tipo.<\\/p>\\n\\n<p><strong>PROPIEDAD<\\/strong><\\/p>\\n\\n<p>Usted no puede declarar propiedad intelectual o exclusiva a ninguno de nuestros productos, modificado o sin modificar. Todos los productos son propiedad &nbsp;de los proveedores del contenido. En caso de que no se especifique lo contrario, nuestros productos se proporcionan&nbsp; sin ning&uacute;n tipo de garant&iacute;a, expresa o impl&iacute;cita. En ning&uacute;n esta compa&ntilde;&iacute;a ser&aacute; &nbsp;responsables de ning&uacute;n da&ntilde;o incluyendo, pero no limitado a, da&ntilde;os directos, indirectos, especiales, fortuitos o consecuentes u otras p&eacute;rdidas resultantes del uso o de la imposibilidad de utilizar nuestros productos.<\\/p>\\n\\n<p><strong>POL&Iacute;TICA DE REEMBOLSO Y GARANT&Iacute;A<\\/strong><\\/p>\\n\\n<p>En el caso de productos que sean&nbsp; mercanc&iacute;as irrevocables no-tangibles, no realizamos reembolsos despu&eacute;s de que se env&iacute;e el producto, usted tiene la responsabilidad de entender antes de comprarlo. &nbsp;Le pedimos que lea cuidadosamente antes de comprarlo. Hacemos solamente excepciones con esta regla cuando la descripci&oacute;n no se ajusta al producto. Hay algunos productos que pudieran tener garant&iacute;a y posibilidad de reembolso pero este ser&aacute; especificado al comprar el producto. En tales casos la garant&iacute;a solo cubrir&aacute; fallas de f&aacute;brica y s&oacute;lo se har&aacute; efectiva cuando el producto se haya usado correctamente. La garant&iacute;a no cubre aver&iacute;as o da&ntilde;os ocasionados por uso indebido. Los t&eacute;rminos de la garant&iacute;a est&aacute;n asociados a fallas de fabricaci&oacute;n y funcionamiento en condiciones normales de los productos y s&oacute;lo se har&aacute;n efectivos estos t&eacute;rminos si el equipo ha sido usado correctamente. Esto incluye:<\\/p>\\n\\n<p>&ndash; De acuerdo a las especificaciones t&eacute;cnicas indicadas para cada producto.<br \\/>\\n&ndash; En condiciones ambientales acorde con las especificaciones indicadas por el fabricante.<br \\/>\\n&ndash; En uso espec&iacute;fico para la funci&oacute;n con que fue dise&ntilde;ado de f&aacute;brica.<br \\/>\\n&ndash; En condiciones de operaci&oacute;n el&eacute;ctricas acorde con las especificaciones y tolerancias indicadas.<\\/p>\\n\\n<p><strong>COMPROBACI&Oacute;N ANTIFRAUDE<\\/strong><\\/p>\\n\\n<p>La compra del cliente puede ser aplazada para la comprobaci&oacute;n antifraude. Tambi&eacute;n puede ser suspendida por m&aacute;s tiempo para una investigaci&oacute;n m&aacute;s rigurosa, para evitar transacciones fraudulentas.<\\/p>\\n\\n<p><strong>PRIVACIDAD<\\/strong><\\/p>\\n\\n<p>Este <a href=\\\" http:\\/\\/www.autovalv.com.ar\\/\\\" target=\\\"_blank\\\">http:\\/\\/www.autovalv.com.ar\\/<\\/a> garantiza que la informaci&oacute;n personal que usted env&iacute;a cuenta con la seguridad necesaria. Los datos ingresados por usuario o en el caso de requerir una validaci&oacute;n de los pedidos no ser&aacute;n entregados a terceros, salvo que deba ser revelada en cumplimiento a una orden judicial o requerimientos legales.<\\/p>\\n\\n<p>La suscripci&oacute;n a boletines de correos electr&oacute;nicos publicitarios es voluntaria y podr&iacute;a ser seleccionada al momento de crear su cuenta.<\\/p>\\n\\n<p>Autovalv S.A. reserva los derechos de cambiar o de modificar estos t&eacute;rminos sin previo aviso.<\\/p>\",\"frase\":\"<p>Al apretar el bot&oacute;n enviar estoy aceptando los <strong><a href=\\\"http:\\/\\/localhost:8000\\/terminos\\\">T&eacute;rminos y Condiciones<\\/a><\\/strong>. Autovalv S.A. no compartir&aacute; bajo ninguna circunstancia, con ninguna otra empresa, instituci&oacute;n y\\/u organizaci&oacute;n la informaci&oacute;n ingresada. El &uacute;nico y exclusivo prop&oacute;sito de la misma, de car&aacute;cter confidencial, es para la mejora de nuestro servicio al cliente.<\\/p>\"}', 0, '2019-10-07 16:34:52', '2019-10-17 14:54:34'),
(2, 'home', '{\"icon\":[{\"lim\":null,\"icon\":{\"i\":\"images\\/icons\\/1570458219_icon_0_0.png\",\"e\":\"png\",\"n\":\"1570458219_icon_0_0\",\"d\":{\"0\":54,\"1\":54,\"2\":3,\"3\":\"width=\\\"54\\\" height=\\\"54\\\"\",\"bits\":8,\"mime\":\"image\\/png\"}},\"text\":\"<p>M&aacute;s de 40 A&ntilde;os<br \\/>\\nde Trayectoria<\\/p>\"},{\"lim\":null,\"icon\":{\"i\":\"images\\/icons\\/1570458219_icon_0_1.png\",\"e\":\"png\",\"n\":\"1570458219_icon_0_1\",\"d\":{\"0\":54,\"1\":54,\"2\":3,\"3\":\"width=\\\"54\\\" height=\\\"54\\\"\",\"bits\":8,\"mime\":\"image\\/png\"}},\"text\":\"<p>Servicio de Post-Venta<\\/p>\"},{\"lim\":null,\"icon\":{\"i\":\"images\\/icons\\/1570458219_icon_0_2.png\",\"e\":\"png\",\"n\":\"1570458219_icon_0_2\",\"d\":{\"0\":54,\"1\":54,\"2\":3,\"3\":\"width=\\\"54\\\" height=\\\"54\\\"\",\"bits\":8,\"mime\":\"image\\/png\"}},\"text\":\"<p>Asesoramiento T&eacute;cnico<\\/p>\"}]}', 0, '2019-10-07 17:17:25', '2019-10-16 16:54:32'),
(3, 'empresa', '{\"image\":{\"i\":\"images\\/contenido_empresa\\/1570459940_image.jpg\",\"e\":\"jpg\",\"n\":\"1570459940_image\",\"d\":{\"0\":534,\"1\":405,\"2\":2,\"3\":\"width=\\\"534\\\" height=\\\"405\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}},\"text1\":\"<p>Hace <span style=\\\"color:#1352ac\\\">m&aacute;s de 30 a&ntilde;os<\\/span> y con una reconocida trayectoria como fabricante de la marca&nbsp;<strong>OCSA &reg;<\\/strong>,&nbsp;<strong>AUTOVALV S.A.&nbsp;<\\/strong>ofrece una <span style=\\\"color:#1352ac\\\">amplia gama de productos<\\/span> para satisfacer todas las necesidades de la industria.<\\/p>\\n\\n<p>Actualmente, contamos con m&aacute;s de 2000 productos dentro de los cuales encontramos V&aacute;lvulas a Solenoide, Controles de Nivel Magn&eacute;ticos y V&aacute;lvulas de Control tanto Neum&aacute;ticas como El&eacute;ctricas, con se&ntilde;ales On-Off y Modulantes, ampliando e innovando nuestra l&iacute;nea constantemente. Estos productos est&aacute;n dise&ntilde;ados para cumplir con las exigencias de distintos tipos de servicios, ofreciendo con los mismos, soluciones para el control de fluidos.<\\/p>\",\"phrase1\":\"<p>EXPERIENCIA DE FUTURO<\\/p>\\n\\n<p>Y PODER TECNOL&Oacute;GICO EN<\\/p>\\n\\n<p>ELEMENTOS DE CONTROL DE FLUIDOS<\\/p>\",\"phrase2\":\"<p>AUTOVALV S.A. UNA EMPRESA QUE SE ADAPTA A SU NECESIDAD.<\\/p>\",\"text2\":\"<p>Nuestra <span style=\\\"color:#1352ac\\\"><strong>Pol&iacute;tica de Ventas Personalizada<\\/strong><\\/span>&nbsp;garantiza a nuestros clientes el asesoramiento t&eacute;cnico necesario para poder realizar la correcta selecci&oacute;n del producto en el momento de la compra, analizando cada situaci&oacute;n en forma particular y encontrando la soluci&oacute;n m&aacute;s acorde para la misma.<\\/p>\\n\\n<p>El compromiso con nuestros clientes se extiende mucho m&aacute;s all&aacute; del momento de la venta. A trav&eacute;s de nuestro <span style=\\\"color:#1352ac\\\"><strong>Servicio de Post-Venta<\\/strong><\\/span>, los acompa&ntilde;amos ofreci&eacute;ndole la asistencia t&eacute;cnica necesaria tanto como para la instalaci&oacute;n y puesta en marcha, como as&iacute; tambi&eacute;n para el mantenimiento y reparaci&oacute;n de nuestros productos. Nos distingue nuestra velocidad de respuesta, brind&aacute;ndoles de esta forma a nuestros clientes la <span style=\\\"color:#1352ac\\\">tranquilidad y seguridad<\\/span>, que ante la detecci&oacute;n de una supuesta falla, la soluci&oacute;n es inmediata, acortando al m&iacute;nimo posible, las paradas de planta y de equipos.<\\/p>\\n\\n<p>El exhaustivo control de calidad empleando normas y mecanismos que superan las condiciones de servicio y la selecci&oacute;n de los mejores materiales, otorga a sus productos una larga vida &uacute;til. Los mismos, de Industria Argentina y de provisi&oacute;n asegurada, ofrecen un funcionamiento efectivo, eficiente y confiable, y se caracterizan por su sencillez, robustez y la mejor relaci&oacute;n calidad - precio.<\\/p>\"}', 0, '2019-10-07 17:43:56', '2019-10-07 18:09:20'),
(4, 'cotizacion', '{\"title\":\"COTIZACI\\u00d3N ONLINE\",\"text\":\"<p>Para obtener propuestas comerciales, le sugerimos que complete los campos que son de su conocimiento que se encuentran a continuaci&oacute;n. Luego ingrese sus datos personales y env&iacute;e la solicitud. Nosotros nos comunicaremos con usted a la brevedad para asesorarlo en lo que precise.<\\/p>\",\"frase\":null}', 0, '2019-10-07 19:08:11', '2019-10-15 15:09:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentaciones`
--

CREATE TABLE `documentaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elim` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documentaciones`
--

INSERT INTO `documentaciones` (`id`, `order`, `cover`, `file`, `title`, `elim`, `created_at`, `updated_at`) VALUES
(1, 'aa', '{\"i\":\"images\\/cover\\/1570462889_cover.jpg\",\"e\":\"jpg\",\"n\":\"1570462889_cover\",\"d\":{\"0\":200,\"1\":180,\"2\":2,\"3\":\"width=\\\"200\\\" height=\\\"180\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', '{\"i\":\"files\\/documentacion\\/pdf-prueba.pdf\",\"e\":\"pdf\",\"n\":\"pdf-prueba\",\"d\":null}', 'Documentación Técnica', 0, '2019-10-07 18:41:29', '2019-10-07 18:42:01'),
(2, 'bb', '{\"i\":\"images\\/cover\\/1570463216_cover.jpg\",\"e\":\"jpg\",\"n\":\"1570463216_cover\",\"d\":{\"0\":200,\"1\":180,\"2\":2,\"3\":\"width=\\\"200\\\" height=\\\"180\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', '{\"i\":\"files\\/documentacion\\/pdf-prueba.pdf\",\"e\":\"pdf\",\"n\":\"pdf-prueba\",\"d\":null}', 'Recomendaciones de instalación', 0, '2019-10-07 18:46:56', '2019-10-07 18:46:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `phone` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `domicile` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `social_networks` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `metadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `form` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `schedule` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `sections` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `footer` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `email`, `phone`, `domicile`, `social_networks`, `images`, `metadata`, `form`, `schedule`, `sections`, `footer`, `created_at`, `updated_at`) VALUES
(1, '[\"info@autovalv.com.ar\"]', '[{\"telefono\":null,\"tipo\":\"tel\",\"visible\":\"(54 11 ) 4553-5012 \\/ 5019\",\"is_link\":null},{\"telefono\":\"+541145535024\",\"tipo\":\"tel\",\"visible\":\"(54 11) 4553-5024\",\"is_link\":{\"TP_CHECK\":\"1\"}},{\"telefono\":\"+541153321336\",\"tipo\":\"wha\",\"visible\":\"(54) 11-5332-1336\",\"is_link\":{\"TP_CHECK\":\"1\"}}]', '{\"calle\":\"Palpa\",\"altura\":\"3851\",\"localidad\":\"Chacarita\",\"provincia\":\"Buenos Aires\",\"pais\":\"Argentina\",\"cp\":\"C1427EGB\",\"mapa\":\"<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d3284.8255523979306!2d-58.45815698489393!3d-34.58328036392378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb5e697e61f59%3A0x2a7fa49969613a55!2sAutovalv%20S.A.!5e0!3m2!1ses!2sar!4v1570453219485!5m2!1ses!2sar\\\" frameborder=\\\"0\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\"><\\/iframe>\",\"link\":\"https:\\/\\/goo.gl\\/maps\\/KzeAi2TaMua6zY9eA\"}', '[]', '{\"logo\":{\"i\":\"images\\/empresa_images\\/1570453592_logo.png\",\"e\":\"png\",\"n\":\"1570453592_logo\"},\"logoFooter\":{\"i\":\"images\\/empresa_images\\/1570453592_logoFooter.png\",\"e\":\"png\",\"n\":\"1570453592_logoFooter\"},\"favicon\":{\"i\":\"images\\/empresa_images\\/1570625316_favicon.png\",\"e\":\"png\",\"n\":\"1570625316_favicon\",\"d\":{\"0\":32,\"1\":32,\"2\":3,\"3\":\"width=\\\"32\\\" height=\\\"32\\\"\",\"bits\":8,\"mime\":\"image\\/png\"}},\"icon\":{\"i\":\"images\\/empresa_images\\/1570465011_icon.png\",\"e\":\"png\",\"n\":\"1570465011_icon\",\"d\":{\"0\":119,\"1\":75,\"2\":3,\"3\":\"width=\\\"119\\\" height=\\\"75\\\"\",\"bits\":8,\"mime\":\"image\\/png\"}},\"industria\":{\"i\":\"images\\/empresa_images\\/1571246849_industria.png\",\"e\":\"png\",\"n\":\"1571246849_industria\",\"d\":{\"0\":75,\"1\":68,\"2\":3,\"3\":\"width=\\\"75\\\" height=\\\"68\\\"\",\"bits\":8,\"mime\":\"image\\/png\"}},\"header\":{\"i\":\"images\\/empresa_images\\/1570465011_header.jpg\",\"e\":\"jpg\",\"n\":\"1570465011_header\",\"d\":{\"0\":1350,\"1\":119,\"2\":2,\"3\":\"width=\\\"1350\\\" height=\\\"119\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}}', '{\"index\":{\"section\":\"index\",\"keywords\":\"Home, inicio\",\"description\":\"Home inicio\"},\"empresa\":{\"description\":null,\"keywords\":null},\"productos\":{\"description\":null,\"keywords\":null},\"documentacion\":{\"description\":null,\"keywords\":null},\"dimensionamiento\":{\"description\":null,\"keywords\":null},\"cotizacion\":{\"description\":null,\"keywords\":null},\"contacto\":{\"description\":null,\"keywords\":null}}', '{\"contacto\":\"corzo.pabloariel@gmail.com\",\"cotizacion\":\"corzo.pabloariel@gmail.com\"}', '{\"publico\":\"Lunes a Viernes de 8:00 a 12:00  y de 14:00 a 18:00 hs\",\"mercaderia\":\"Lunes a Viernes de 9:00 a 12:00  y de 14:00 a 17:00 hs\"}', '[]', '{\"text\":\"<p>Experiencia de Futuro y Poder Tecnol&oacute;gico en Elementos de Control de Fluidos<\\/p>\"}', '2019-10-07 15:36:32', '2019-10-18 05:37:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familias`
--

CREATE TABLE `familias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elim` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `familias`
--

INSERT INTO `familias` (`id`, `order`, `image`, `title`, `elim`, `created_at`, `updated_at`) VALUES
(1, 'aa', '{\"i\":\"images\\/familias\\/1570638644_image.jpg\",\"e\":\"jpg\",\"n\":\"1570638644_image\",\"d\":{\"0\":275,\"1\":275,\"2\":2,\"3\":\"width=\\\"275\\\" height=\\\"275\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', '<p>V&Aacute;LVULAS A SOLENOIDE PARA USO GENERAL</p>', 0, '2019-10-09 19:30:44', '2019-10-17 17:30:32'),
(2, 'bb', '{\"i\":\"images\\/familias\\/1570638668_image.png\",\"e\":\"png\",\"n\":\"1570638668_image\",\"d\":{\"0\":283,\"1\":283,\"2\":3,\"3\":\"width=\\\"283\\\" height=\\\"283\\\"\",\"bits\":8,\"mime\":\"image\\/png\"}}', 'VÁLVULAS A SOLENOIDE  PARA COMBUSTIÓN', 0, '2019-10-09 19:31:08', '2019-10-09 19:31:08'),
(3, 'cc', '{\"i\":\"images\\/familias\\/1570638687_image.jpg\",\"e\":\"jpg\",\"n\":\"1570638687_image\",\"d\":{\"0\":283,\"1\":283,\"2\":2,\"3\":\"width=\\\"283\\\" height=\\\"283\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 'NEUMÁTICA E HIDRÁULICA', 0, '2019-10-09 19:31:27', '2019-10-09 19:31:27'),
(4, 'dd', '{\"i\":\"images\\/familias\\/1570638707_image.jpg\",\"e\":\"jpg\",\"n\":\"1570638707_image\",\"d\":{\"0\":283,\"1\":283,\"2\":2,\"3\":\"width=\\\"283\\\" height=\\\"283\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 'VÁLVULAS A SOLENOIDE  PARA ALTA PRESIÓN', 0, '2019-10-09 19:31:47', '2019-10-09 19:31:47'),
(5, 'ee', NULL, 'VÁLVULAS A SOLENOIDE ESPECIALES', 0, '2019-10-17 15:08:19', '2019-10-17 15:08:19'),
(6, 'FF', NULL, 'CONTROL DE NIVEL MAGNÉTICO', 0, '2019-10-17 15:08:50', '2019-10-17 15:08:50'),
(7, 'GG', NULL, 'VÁLVULAS DE CONTROL', 0, '2019-10-17 15:09:11', '2019-10-17 15:09:11'),
(8, 'HH', NULL, 'AUTOMATIZACIÓN ON-OFF Y MODULANTES', 0, '2019-10-17 15:09:42', '2019-10-17 15:09:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_07_123223_create_empresa_table', 2),
(4, '2019_10_07_133243_create_contenidos_table', 3),
(5, '2019_10_07_134721_create_sliders_table', 4),
(6, '2019_10_07_153221_create_documentaciones_table', 5),
(10, '2019_10_09_152806_create_familias_table', 6),
(11, '2019_10_09_162150_create_productos_table', 6),
(12, '2019_10_09_174230_create_productoimages_table', 7),
(13, '2019_10_15_111120_create_imagenes_table', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoimages`
--

CREATE TABLE `productoimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `elim` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productoimages`
--

INSERT INTO `productoimages` (`id`, `producto_id`, `order`, `image`, `elim`, `created_at`, `updated_at`) VALUES
(1, 1, 'aa', '{\"i\":\"images\\/familias\\/1570644017_image.jpg\",\"e\":\"jpg\",\"n\":\"1570644017_image\",\"d\":{\"0\":321,\"1\":369,\"2\":2,\"3\":\"width=\\\"321\\\" height=\\\"369\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 0, '2019-10-09 21:00:17', '2019-10-17 19:35:04'),
(2, 4, 'aa', '{\"i\":\"images\\/familias\\/1571316775_image.jpg\",\"e\":\"jpg\",\"n\":\"1571316775_image\",\"d\":{\"0\":156,\"1\":177,\"2\":2,\"3\":\"width=\\\"156\\\" height=\\\"177\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 0, '2019-10-17 15:52:55', '2019-10-17 15:52:55'),
(3, 5, 'aa', '{\"i\":\"images\\/familias\\/1571316873_image.jpg\",\"e\":\"jpg\",\"n\":\"1571316873_image\",\"d\":{\"0\":118,\"1\":177,\"2\":2,\"3\":\"width=\\\"118\\\" height=\\\"177\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 0, '2019-10-17 15:54:33', '2019-10-17 15:54:33'),
(4, 6, 'aa', '{\"i\":\"images\\/familias\\/1571316918_image.jpg\",\"e\":\"jpg\",\"n\":\"1571316918_image\",\"d\":{\"0\":118,\"1\":177,\"2\":2,\"3\":\"width=\\\"118\\\" height=\\\"177\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 0, '2019-10-17 15:55:18', '2019-10-17 15:55:18'),
(5, 7, 'aa', '{\"i\":\"images\\/familias\\/1571316965_image.jpg\",\"e\":\"jpg\",\"n\":\"1571316965_image\",\"d\":{\"0\":118,\"1\":177,\"2\":2,\"3\":\"width=\\\"118\\\" height=\\\"177\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 0, '2019-10-17 15:56:05', '2019-10-17 15:56:05'),
(6, 8, NULL, '{\"i\":\"images\\/familias\\/1571317003_image.jpg\",\"e\":\"jpg\",\"n\":\"1571317003_image\",\"d\":{\"0\":118,\"1\":177,\"2\":2,\"3\":\"width=\\\"118\\\" height=\\\"177\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 0, '2019-10-17 15:56:43', '2019-10-17 15:56:43'),
(7, 9, 'aa', '{\"i\":\"images\\/familias\\/1571318052_image.jpg\",\"e\":\"jpg\",\"n\":\"1571318052_image\",\"d\":{\"0\":118,\"1\":177,\"2\":2,\"3\":\"width=\\\"118\\\" height=\\\"177\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 0, '2019-10-17 16:14:12', '2019-10-17 16:14:12'),
(8, 10, NULL, '{\"i\":\"images\\/familias\\/1571318096_image.jpg\",\"e\":\"jpg\",\"n\":\"1571318096_image\",\"d\":{\"0\":118,\"1\":177,\"2\":2,\"3\":\"width=\\\"118\\\" height=\\\"177\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 0, '2019-10-17 16:14:56', '2019-10-17 16:14:56'),
(9, 11, 'aa', '{\"i\":\"images\\/familias\\/1571318134_image.jpg\",\"e\":\"jpg\",\"n\":\"1571318134_image\",\"d\":{\"0\":118,\"1\":177,\"2\":2,\"3\":\"width=\\\"118\\\" height=\\\"177\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 0, '2019-10-17 16:15:34', '2019-10-17 16:15:34'),
(10, 12, 'aa', '{\"i\":\"images\\/familias\\/1571318170_image.jpg\",\"e\":\"jpg\",\"n\":\"1571318170_image\",\"d\":{\"0\":118,\"1\":177,\"2\":2,\"3\":\"width=\\\"118\\\" height=\\\"177\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 0, '2019-10-17 16:16:10', '2019-10-17 16:16:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `familia_id` bigint(20) UNSIGNED DEFAULT NULL,
  `destacado` tinyint(1) DEFAULT NULL,
  `argentina` tinyint(1) DEFAULT NULL,
  `order` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metadata` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `elim` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `familia_id`, `destacado`, `argentina`, `order`, `file`, `content`, `details`, `title`, `metadata`, `elim`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'aa', NULL, '\"<p>Hace m&aacute;s de 30 a&ntilde;os y con una reconocida trayectoria como fabricante de la marca OCSA &reg;, AUTOVALV S.A. ofrece una amplia gama de productos para satisfacer todas las necesidades de la industria.<\\/p>\\n\\n<p>Nuestra &ldquo;Pol&iacute;tica de Ventas Personalizada&rdquo; garantiza a nuestros clientes el asesoramiento t&eacute;cnico necesario para poder realizar la correcta selecci&oacute;n del producto en el momento de la compra, analizando cada situaci&oacute;n en forma particular y encontrando la soluci&oacute;n m&aacute;s acorde para la misma.<\\/p>\"', '[{\"key\":\"Conexi\\u00f3n\",\"value\":\"3\\/8\\u201d a 3\\/4\\u201d Roscada BSP (NPT Opcional)\"},{\"key\":\"Orificio de Pasaje\",\"value\":\"13 a 19 mm\"},{\"key\":\"Presi\\u00f3n M\\u00e1xima\",\"value\":\"0,02 a 10 bar\"},{\"key\":\"Temperatura M\\u00e1xima\",\"value\":\"80\\u00baC\"},{\"key\":\"Cuerpo\",\"value\":\"Lat\\u00f3n Forjado\"},{\"key\":\"Accionamiento\",\"value\":\"2 V\\u00edas a Diafragma - Normal Cerrada \\u00f3 Abierta\"},{\"key\":\"Aplicaci\\u00f3n\",\"value\":\"Gas Natural, GLP, Gasoil y Otros\"}]', 'Modelo G1', NULL, 0, '2019-10-09 20:05:09', '2019-10-17 19:33:46'),
(3, 1, NULL, NULL, 'aa', '{\"i\":\"files\\/productos\\/44.pdf\",\"e\":\"pdf\",\"n\":\"44\",\"d\":null}', NULL, '[{\"key\":\"Conexi\\u00f3n\",\"value\":\"3\\/8\\\" a 3\\/4\\\" Roscada BSP (NPT Opcional).\"},{\"key\":\"Orificio de Pasaje\",\"value\":\"13 a 19 mm.\"},{\"key\":\"Presi\\u00f3n M\\u00e1xima\",\"value\":\"0,1 a 10 bar\"},{\"key\":\"Temperatura M\\u00e1xima\",\"value\":\"Hasta 150\\u00b0C (Seg\\u00fan Guarnici\\u00f3n)\"},{\"key\":\"Cuerpo\",\"value\":\"Lat\\u00f3n Forjado\"},{\"key\":\"Accionamiento\",\"value\":\"2 V\\u00edas a Diafragma - Normal Cerrada o Abierta.\"},{\"key\":\"Aplicaci\\u00f3n\",\"value\":\"Agua, Aire, Vac\\u00edo, Aceites Livianos y Otros\"}]', 'Modelo F1 de 3/8\" a 3/4\"', NULL, 0, '2019-10-17 15:14:21', '2019-10-17 15:14:21'),
(4, 1, NULL, NULL, 'bb', '{\"i\":\"files\\/productos\\/41.pdf\",\"e\":\"pdf\",\"n\":\"41\",\"d\":null}', NULL, '[{\"key\":\"Conexi\\u00f3n\",\"value\":\"1\\/2\\\" y 3\\/4\\\" BSP\"},{\"key\":\"Orificio de Pasaje\",\"value\":\"13 a 19 mm\"},{\"key\":\"Presi\\u00f3n M\\u00e1xima\",\"value\":\"0,1 a 10 bar\"},{\"key\":\"Temperatura M\\u00e1xima\",\"value\":\"70\\u00b0C\"},{\"key\":\"Cuerpo\",\"value\":\"Nylon 6.6. de Alto Impacto\"},{\"key\":\"Accionamiento\",\"value\":\"2 V\\u00edas a Diafragma - Normal Cerrada\"},{\"key\":\"Aplicaci\\u00f3n\",\"value\":\"Agua, Aire, Aceites Livianos y Otros\"}]', 'Modelo F2', NULL, 0, '2019-10-17 15:40:23', '2019-10-17 15:40:23'),
(5, 1, NULL, NULL, 'cc', '{\"i\":\"files\\/productos\\/51.pdf\",\"e\":\"pdf\",\"n\":\"51\",\"d\":null}', NULL, '[{\"key\":\"Conexi\\u00f3n\",\"value\":\"1\\/8\\\" y 1\\/4\\\" Roscada BSP (NPT Opcional)\"},{\"key\":\"Orificio de Pasaje\",\"value\":\"1,25 a 4 mm\"},{\"key\":\"Presi\\u00f3n M\\u00e1xima\",\"value\":\"0 a 10 bar\"},{\"key\":\"Temperatura M\\u00e1xima\",\"value\":\"180\\u00b0C (Seg\\u00fan Guarnici\\u00f3n)\"},{\"key\":\"Cuerpo\",\"value\":\"Lat\\u00f3n Forjado \\u00f3 Acero Inoxidable\"},{\"key\":\"Accionamiento\",\"value\":\"2 V\\u00edas Acci\\u00f3n Directa - Normal Cerrada\"},{\"key\":\"Aplicaci\\u00f3n\",\"value\":\"Agua, Aire, Vac\\u00edo y Otros\"}]', 'Modelo K15', NULL, 0, '2019-10-17 15:42:03', '2019-10-17 15:42:03'),
(6, 1, NULL, NULL, 'dd', NULL, NULL, '[{\"key\":\"Conexi\\u00f3n\",\"value\":\"1\\/8\\\" a 3\\/8\\\" BSP (NPT Opcional)\"},{\"key\":\"Orificio de Pasaje\",\"value\":\"8 mm\"},{\"key\":\"Presi\\u00f3n M\\u00e1xima\",\"value\":\"0,1 a 10 bar\"},{\"key\":\"Temperatura M\\u00e1xima\",\"value\":\"180\\u00baC\"},{\"key\":\"Cuerpo\",\"value\":\"Bronce \\u00f3 Acero Inoxidable\"},{\"key\":\"Accionamiento\",\"value\":\"2 V\\u00edas a Servo Pist\\u00f3n - Normal Cerrada o Abierta\"},{\"key\":\"Aplicaci\\u00f3n\",\"value\":\"Agua, Aire, Vapor y Otros\"}]', 'Modelo K16', NULL, 0, '2019-10-17 15:43:24', '2019-10-17 15:43:24'),
(7, 1, NULL, NULL, 'ee', '{\"i\":\"files\\/productos\\/50.pdf\",\"e\":\"pdf\",\"n\":\"50\",\"d\":null}', NULL, '[{\"key\":\"Conexi\\u00f3n\",\"value\":\"3\\/4\\\"a 3\\\" BSP\"},{\"key\":\"Orificio de Pasaje\",\"value\":\"19 a 76 mm\"},{\"key\":\"Presi\\u00f3n M\\u00e1xima\",\"value\":\"0 a 20 bar\"},{\"key\":\"Temperatura M\\u00e1xima\",\"value\":\"180\\u00b0C\"},{\"key\":\"Cuerpo\",\"value\":\"Bronce o Acero Inoxidable\"},{\"key\":\"Accionamiento\",\"value\":\"2 V\\u00edas a Servo Pist\\u00f3n - Normal Cerrada o Abierta\"},{\"key\":\"Aplicaci\\u00f3n\",\"value\":\"Agua, Aire, Gasoil, Vapor y Otros\"}]', 'Modelo P', NULL, 0, '2019-10-17 15:44:53', '2019-10-17 15:44:53'),
(8, 1, NULL, NULL, 'ff', NULL, NULL, '[{\"key\":\"Conexi\\u00f3n\",\"value\":\"1\\/2\\\" a 1\\\" BSP\"},{\"key\":\"Orificio de Pasaje\",\"value\":\"13 a 25 mm\"},{\"key\":\"Presi\\u00f3n M\\u00e1xima\",\"value\":\"10 bar\"},{\"key\":\"Temperatura M\\u00e1xima\",\"value\":\"180\\u00b0C\"},{\"key\":\"Cuerpo\",\"value\":\"Bronce o Acero Inoxidable\"},{\"key\":\"Accionamiento\",\"value\":\"2 V\\u00edas a Servo Pist\\u00f3n - Normal Cerrada o Abierta\"},{\"key\":\"Aplicaci\\u00f3n\",\"value\":\"Agua, Aire, Vapor y Otros\"}]', 'Modulo PG', NULL, 0, '2019-10-17 15:49:16', '2019-10-17 15:49:16'),
(9, 2, NULL, NULL, 'bb', NULL, NULL, '[{\"key\":\"Conexi\\u00f3n\",\"value\":\"1\\/2\\\" y 3\\/4\\\" Roscada BSP\"},{\"key\":\"Orificio de Pasaje\",\"value\":\"13 - 19 mm\"},{\"key\":\"Presi\\u00f3n M\\u00e1xima\",\"value\":\"200 mbar\"},{\"key\":\"Temperatura M\\u00e1xima\",\"value\":\"80\\u00baC\"},{\"key\":\"Cuerpo\",\"value\":\"Aluminio\"},{\"key\":\"Accionamiento\",\"value\":\"2 Vias Acci\\u00f3n Directa - Normal Cerrada\"},{\"key\":\"Aplicaci\\u00f3n\",\"value\":\"Gas Natural\"}]', 'Modelo G2', NULL, 0, '2019-10-17 15:59:34', '2019-10-17 15:59:47'),
(10, 2, NULL, NULL, 'cc', NULL, NULL, '[{\"key\":\"Conexi\\u00f3n\",\"value\":\"1\\/2\\\" a 1\\\" Roscada BSP (NPT Opcional)\"},{\"key\":\"Orificio de Pasaje\",\"value\":\"5 a 1 mm\"},{\"key\":\"Presi\\u00f3n M\\u00e1xima\",\"value\":\"0 a 20 bar\"},{\"key\":\"Temperatura M\\u00e1xima\",\"value\":\"180\\u00baC\"},{\"key\":\"Cuerpo\",\"value\":\"Bronce o Acero Inoxidable\"},{\"key\":\"Accionamiento\",\"value\":\"2 V\\u00edas Accion Directa - Normal Cerrada\"},{\"key\":\"Aplicaci\\u00f3n\",\"value\":\"Flu\\u00eddos Viscosos, Petr\\u00f3leo y Otros\"}]', 'Modelo KP', NULL, 0, '2019-10-17 16:01:06', '2019-10-17 16:01:06'),
(11, 2, NULL, NULL, 'DD', NULL, NULL, '[{\"key\":\"Conexi\\u00f3n\",\"value\":\"1\\/8\\\" y 1\\/4\\\" Roscada BSP (NPT Opcional)\"},{\"key\":\"Orificio de Pasaje\",\"value\":\"1,25 a 4 mm\"},{\"key\":\"Presi\\u00f3n M\\u00e1xima\",\"value\":\"0 a 25 bar\"},{\"key\":\"Temperatura M\\u00e1xima\",\"value\":\"80\\u00baC\"},{\"key\":\"Cuerpo\",\"value\":\"Lat\\u00f3n Forjado o Acero Inoxidable\"},{\"key\":\"Accionamiento\",\"value\":\"2 V\\u00edas Acci\\u00f3n Directa - Normal Cerrada\"},{\"key\":\"Aplicaci\\u00f3n\",\"value\":\"Gas Natural, GLP, Gasoil y Otros\"}]', 'Modelo K15', NULL, 0, '2019-10-17 16:11:27', '2019-10-17 16:11:27'),
(12, 2, NULL, NULL, 'ee', NULL, NULL, '[{\"key\":\"Conexi\\u00f3n\",\"value\":\"3\\/8\\\" a 3\\/4\\\" Roscada BSP (NPT Opcional)\"},{\"key\":\"Orificio de Pasaje\",\"value\":\"13 a 19 mm\"},{\"key\":\"Presi\\u00f3n M\\u00e1xima\",\"value\":\"0,02 a 10 bar\"},{\"key\":\"Temperatura M\\u00e1xima\",\"value\":\"80\\u00baC\"},{\"key\":\"Cuerpo\",\"value\":\"Lat\\u00f3n Forjado\"},{\"key\":\"Accionamiento\",\"value\":\"2 V\\u00edas a Diafragma - Normal Cerrada o Abierta\"},{\"key\":\"Aplicaci\\u00f3n\",\"value\":\"Gas Natural, GLP, Gasoil y Otros\"}]', 'Modelo F1', NULL, 0, '2019-10-17 16:12:49', '2019-10-17 16:12:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `section` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `elim` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `order`, `image`, `section`, `content`, `elim`, `created_at`, `updated_at`) VALUES
(1, 'aa', '{\"i\":\"images\\/sliders\\/1570456425_image.jpg\",\"e\":\"jpg\",\"n\":\"1570456425_image\",\"d\":{\"0\":864,\"1\":403,\"2\":2,\"3\":\"width=\\\"864\\\" height=\\\"403\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 'home', NULL, 0, '2019-10-07 16:53:45', '2019-10-07 17:03:12'),
(2, 'aa', '{\"i\":\"images\\/sliders\\/1570458884_image.jpg\",\"e\":\"jpg\",\"n\":\"1570458884_image\",\"d\":{\"0\":1350,\"1\":214,\"2\":2,\"3\":\"width=\\\"1350\\\" height=\\\"214\\\"\",\"bits\":8,\"channels\":3,\"mime\":\"image\\/jpeg\"}}', 'empresa', NULL, 0, '2019-10-07 17:34:44', '2019-10-07 17:34:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pablo Cabañuz', 'pablo', '$2y$10$llbhXpyrxWl2eM88D5uEKubKOKKMdfmAa50PzuKvztQ37.uC/o.Pq', 1, NULL, '2019-10-07 15:07:51', '2019-10-16 16:31:42'),
(2, 'José Podesta', 'jose', '$2y$10$eCc06GbY4qqrfM.b4BGkdelkV1eYxR7eIwGW..4Nc5oP1kaymI5jS', 1, NULL, '2019-10-16 16:28:54', '2019-10-16 16:30:36');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentaciones`
--
ALTER TABLE `documentaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familias`
--
ALTER TABLE `familias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `productoimages`
--
ALTER TABLE `productoimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoimages_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_familia_id_foreign` (`familia_id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contenidos`
--
ALTER TABLE `contenidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `documentaciones`
--
ALTER TABLE `documentaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `familias`
--
ALTER TABLE `familias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `productoimages`
--
ALTER TABLE `productoimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productoimages`
--
ALTER TABLE `productoimages`
  ADD CONSTRAINT `productoimages_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_familia_id_foreign` FOREIGN KEY (`familia_id`) REFERENCES `familias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
