-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-01-2021 a las 14:38:12
-- Versión del servidor: 10.0.38-MariaDB-0+deb8u1
-- Versión de PHP: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `edifica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` bigint(20) NOT NULL,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `id_category` bigint(20) DEFAULT NULL,
  `image` text,
  `article` longtext,
  `sm_title` text,
  `sm_description` text,
  `sm_image` text,
  `tags` text,
  `status` set('draft','published','unpublished','removed') NOT NULL DEFAULT 'published',
  `publication_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `url`, `title`, `id_category`, `image`, `article`, `sm_title`, `sm_description`, `sm_image`, `tags`, `status`, `publication_date`, `author`) VALUES
(1, 'Hello-world', 'a:1:{s:2:\"es\";s:11:\"Hello world\";}', NULL, '1_VR1dh5_eGjIQC7zhGTyCGA_rl2M2D.png', '{\"es\":\"<p>&iexcl;Hola mundo!<\\/p>\"}', 'a:1:{s:2:\"es\";N;}', 'a:1:{s:2:\"es\";N;}', NULL, NULL, 'published', '2020-06-29 16:32:04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) NOT NULL,
  `category` text NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `category`, `description`) VALUES
(1, 'a:1:{s:2:\"es\";s:12:\"Categoría 1\";}', 'a:1:{s:2:\"es\";s:31:\"Descripción de la categoría 1\";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `levels`
--

CREATE TABLE `levels` (
  `id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `title` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `levels`
--

INSERT INTO `levels` (`id`, `code`, `title`) VALUES
(1, '{sysadmin}', 'Administrador de sistemas'),
(2, '{administrator}', 'Administrador'),
(11, '{customer}', 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` bigint(20) NOT NULL,
  `id_key` bigint(20) DEFAULT NULL,
  `table` varchar(20) DEFAULT NULL,
  `mime` varchar(20) DEFAULT NULL,
  `var_key` varchar(20) DEFAULT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `media`
--

INSERT INTO `media` (`id`, `id_key`, `table`, `mime`, `var_key`, `value`) VALUES
(1, 1, 'projects', 'image/jpeg', 'image_cover', 'Render 1 Post 2_C0ElueO9.jpg'),
(2, 1, 'projects', 'image/png', 'project_logotype', 'FORESTES_D4BUgexv_1krIkJB4.png'),
(3, 1, 'projects', 'image/png', 'image_content', 'Departamentos Forestes1_eUN9J7k9.png'),
(4, 1, 'projects', 'image/jpeg', 'project_croquis', 'image-map_qFzC5qLA_mbGPxoay.png'),
(12, 2, 'projects', 'image/jpeg', 'image_cover', 'Serena_smwUYhZq.jpg'),
(13, 2, 'projects', 'image/png', 'project_logotype', 'serena_drT1Ovnr_7tcTT1RS.png'),
(14, 2, 'projects', 'image/jpeg', 'image_content', '02. FACHADA TRASERA_ilU9u4Sn.jpg'),
(20, 3, 'projects', 'image/jpeg', 'image_cover', 'Bellavista Dzitya - 12_in32RFlX.jpg'),
(21, 3, 'projects', 'image/jpeg', 'gallery', 'Bellavista Dzitya - 1_RjoyijLK.jpg'),
(22, 3, 'projects', 'image/jpeg', 'gallery', 'Bellavista Dzitya - 2_eYZb4SNe.jpg'),
(23, 3, 'projects', 'image/jpeg', 'gallery', 'Bellavista Dzitya - 3_I9z8fM2Z.jpg'),
(24, 3, 'projects', 'image/jpeg', 'gallery', 'Bellavista Dzitya - 4_QhUgzwE9.jpg'),
(25, 3, 'projects', 'image/jpeg', 'gallery', 'Bellavista Dzitya - 5_bWc7pUmv.jpg'),
(26, 3, 'projects', 'image/jpeg', 'gallery', 'Bellavista Dzitya - 6_gzJCv8R1.jpg'),
(27, 3, 'projects', 'image/jpeg', 'gallery', 'Bellavista Dzitya - 7_Y3I7n8vQ.jpg'),
(28, 3, 'projects', 'image/jpeg', 'gallery', 'Bellavista Dzitya - 8_IOSLrkDf.jpg'),
(29, 3, 'projects', 'image/jpeg', 'gallery', 'Bellavista Dzitya - 9_pkDkqrzh.jpg'),
(30, 3, 'projects', 'image/jpeg', 'gallery', 'Bellavista Dzitya - 10_PVTwrdfV.jpg'),
(31, 3, 'projects', 'image/jpeg', 'gallery', 'Bellavista Dzitya - 11_BuhBVhrw.jpg'),
(32, 4, 'projects', 'image/jpeg', 'image_cover', 'Casa Montecristo - 2_6V50XQ7a.jpg'),
(33, 4, 'projects', 'image/jpeg', 'gallery', 'Casa Montecristo - 1_I7JYIxvW.jpg'),
(34, 4, 'projects', 'image/jpeg', 'gallery', 'Casa Montecristo - 3_56Gqytg0.jpg'),
(35, 4, 'projects', 'image/jpeg', 'gallery', 'Casa Montecristo - 4_MfBqZgTw.jpg'),
(36, 4, 'projects', 'image/jpeg', 'gallery', 'Casa Montecristo - 5_8q9SKhjN.jpg'),
(37, 4, 'projects', 'image/jpeg', 'gallery', 'Casa Montecristo - 6_5Vhrx6i1.jpg'),
(38, 4, 'projects', 'image/jpeg', 'gallery', 'Casa Montecristo - 7_auAILW51.jpg'),
(39, 4, 'projects', 'image/jpeg', 'gallery', 'Casa Montecristo - 8_bQbtkpv9.jpg'),
(40, 4, 'projects', 'image/jpeg', 'gallery', 'Casa Montecristo - 9_hypxiwSq.jpg'),
(41, 4, 'projects', 'image/jpeg', 'gallery', 'Casa Montecristo - 10_jMAik8XS.jpg'),
(42, 5, 'projects', 'image/jpeg', 'image_cover', 'NATUUR MONTEBELLO_Apiron-5_VrikyAmm.jpg'),
(51, 6, 'projects', 'image/jpeg', 'image_cover', 'CASA NORTEMERIDA_Edifica 67-17_KQGJjD1i.jpg'),
(63, 7, 'projects', 'image/jpeg', 'image_cover', 'IMG_8641_edhJKZbh.jpg'),
(83, 1, 'projects', 'application/pdf', 'brochure', 'aaaa_FSn6XphS.pdf'),
(84, 2, 'projects', 'application/pdf', 'brochure', 'aaaa_Z2mnYKyy.pdf'),
(92, 2, 'projects', NULL, 'project_croquis', NULL),
(104, 8, 'projects', 'image/jpeg', 'image_cover', '01-SOLUNAANTUANFINALES_6kYLv7hD.jpg'),
(112, 1, 'projects', 'image/png', 'gallery', 'Render 3 Post 2C_PijV9beG_nPtiMBJD.png'),
(113, 1, 'projects', 'image/jpeg', 'gallery', 'Render 2 Post 2_35Z0KonC_f9CSULT8.png'),
(114, 1, 'projects', 'image/png', 'gallery', 'DEPTO NPT3.40 A_tIrYd94p_QVwkJ4bu.png'),
(115, 1, 'projects', 'image/png', 'gallery', 'DEPTO NPT 0.30_LysuBaJA_zQlgSXpo.png'),
(116, 1, 'projects', 'image/jpeg', 'gallery', 'GUARUMO_pYFcfccT_KbK6GVnh.png'),
(117, 1, 'projects', 'image/png', 'gallery', 'ANDADOR NPT +3.40.JPG_hDjKhVPr_DwxxPZgb.png'),
(118, 1, 'projects', 'image/png', 'gallery', 'ROOF GARDEN_46Qs4UuZ_v5m6RNmo.jpg'),
(119, 2, 'projects', 'image/jpeg', 'gallery', '04-SALA COMEDOR_et87TrgG.jpg'),
(120, 2, 'projects', 'image/jpeg', 'gallery', '06-RECAMARA PPAL_NX5y9zKT.jpg'),
(121, 2, 'projects', 'image/jpeg', 'gallery', '3.COCINA_wm22H3t2.jpg'),
(124, 8, 'projects', 'image/jpeg', 'gallery', '04-SOLUNAANTUANFINALES_bgbp8Oin.jpg'),
(126, 8, 'projects', 'image/jpeg', 'gallery', '02-SOLUNAANTUANFINALES_IqMij34t.jpg'),
(129, 8, 'projects', 'image/jpeg', 'gallery', '03-SOLUNAANTUANFINALES_vcSJu7pq.jpg'),
(130, 9, 'projects', 'image/jpeg', 'image_cover', '1. FACHADA_K3WC5FAv.jpg'),
(131, 9, 'projects', 'image/jpeg', 'gallery', '2. SALA DE T.V_V7vCtnYy.jpg'),
(132, 9, 'projects', 'image/jpeg', 'gallery', '3. RECÁMARA_VXQO5ry6.jpg'),
(134, 10, 'projects', 'image/jpeg', 'image_cover', '10.CT. Fachada Principal_LHtAQ4gm.jpg'),
(135, 10, 'projects', 'image/jpeg', 'gallery', '01 CT. Sala_7ZClZjsQ.jpg'),
(147, 9, 'projects', 'image/jpeg', 'gallery', '2. SALA DE T.V_6dXc3so8.jpg'),
(148, 10, 'projects', 'image/jpeg', 'gallery', '01 CT. Sala_Ds2obhvd.jpg'),
(149, 10, 'projects', 'image/jpeg', 'gallery', '02 CT. Comedor - Cocina_hiL97FgG.jpg'),
(150, 10, 'projects', 'image/jpeg', 'gallery', '03 CT. Cocina_wL0wpNFz.jpg'),
(151, 10, 'projects', 'image/jpeg', 'gallery', '04 CT. Recamara Visita_8wXzxXTl.jpg'),
(152, 10, 'projects', 'image/jpeg', 'gallery', '05 CT. Recamara Principal_AOijbFmk.jpg'),
(153, 10, 'projects', 'image/jpeg', 'gallery', '06 CT. Closet Rec Principal_B9hEk3hB.jpg'),
(154, 10, 'projects', 'image/jpeg', 'gallery', '07 CT. Baño Rec Principal_TvET7esV.jpg'),
(155, 10, 'projects', 'image/jpeg', 'gallery', '08. CT. Recamara Doble_HiuTQ7rP.jpg'),
(156, 10, 'projects', 'image/jpeg', 'gallery', '09. CT. Fachada Posterior_ksp3oKT1.jpg'),
(157, 10, 'projects', 'image/jpeg', 'gallery', '12 .CT. Vista Alberca_eVQRO4tT.jpg'),
(158, 11, 'projects', 'image/jpeg', 'image_cover', 'WhatsApp Image 2021-01-17 at 6.11.46 PM_E8Mys048.jpeg'),
(159, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.37 PM_j7gKMqJ3.jpeg'),
(160, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.36 PM (1)_xcwofOlr.jpeg'),
(161, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.38 PM_YRFmc49m.jpeg'),
(162, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.47 PM_40SQ1Obd.jpeg'),
(163, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.34 PM (1)_1FmSHN9a.jpeg'),
(164, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.26 PM_95HvU87d.jpeg'),
(165, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.26 PM (1)_tfUjpTPh.jpeg'),
(166, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.27 PM (3)_sa96cQs3.jpeg'),
(167, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.27 PM (2)_tW0N2qWF.jpeg'),
(168, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.26 PM (3)_Olbmp1HG.jpeg'),
(169, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.33 PM (1)_uDTAvJD6.jpeg'),
(170, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.33 PM_gP0JcGry.jpeg'),
(171, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.30 PM (2)_zfGwbqsV.jpeg'),
(172, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.31 PM_pPRAAHMv.jpeg'),
(173, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.27 PM (1)_FFxoAXNw.jpeg'),
(174, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.27 PM_HMD7mMya.jpeg'),
(175, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.30 PM_AgZnmhhB.jpeg'),
(176, 11, 'projects', 'image/jpeg', 'gallery', 'WhatsApp Image 2021-01-17 at 6.11.32 PM (1)_cZg5WQe1.jpeg'),
(177, 11, 'projects', 'directory', 'gallery', NULL),
(178, 12, 'projects', 'image/jpeg', 'image_cover', '05-TPG. Fachada Posterior_OTIyyh80.jpg'),
(179, 12, 'projects', 'image/jpeg', 'gallery', '03-TPG. Fachada Principal Dia_BdZJJpjY.jpg'),
(180, 12, 'projects', 'image/jpeg', 'gallery', '05-TPG. Fachada Posterior_PDoxcBSJ.jpg'),
(181, 12, 'projects', 'image/jpeg', 'gallery', '06-TPG. Fachada Posterior 2_DB89TGRU.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `title` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `code`, `title`) VALUES
(1, '{users_read}', 'Ver los usuarios.'),
(2, '{users_create}', 'Crear usuarios.'),
(3, '{users_update}', 'Modificar usuarios.'),
(4, '{users_delete}', 'Eliminar usuarios.'),
(5, '{permissions_read}', 'Ver los permisos de usuario.'),
(6, '{permissions_create}', 'Crear permisos de usuario.'),
(7, '{permissions_delete}', 'Eliminar permisos de usuario.'),
(8, '{blog_read}', 'Ver el blog'),
(9, '{blog_create}', 'Crear articulos en el blog'),
(10, '{blog_update}', 'Editar artículos en el blog'),
(11, '{blog_delete}', 'Eliminar artículos en el blog'),
(12, '{categories_blog_read}', 'Ver las categorías del blog'),
(13, '{categories_blog_create}', 'Crear categorías en el blog'),
(14, '{categories_blog_delete}', 'Eliminar categorías del blog'),
(15, '{help_development}', 'Ayuda para desarrolladores'),
(17, '{projects}', 'Crear, editar y eliminar proyectos de construcción.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) NOT NULL,
  `url` text,
  `type` text,
  `data` longtext NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` set('available','disabled') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`id`, `url`, `type`, `data`, `registration_date`, `status`) VALUES
(1, 'forestes', 'sale', 'a:9:{s:4:\"name\";s:8:\"Forestes\";s:5:\"title\";s:18:\"Departamentos 2020\";s:5:\"price\";d:1565000;s:10:\"price_text\";s:25:\"16 Departamentos en venta\";s:7:\"map_lat\";s:10:\"21.0278455\";s:8:\"map_long\";s:11:\"-89.6014838\";s:10:\"slide_home\";s:1:\"1\";s:15:\"slide_portfolio\";s:1:\"1\";s:11:\"description\";s:523:\"<p>Capital del estado de Yucat&aacute;n, es el coraz&oacute;n del Sureste, una de las <strong>entidades con mayores &iacute;ndices de seguridad y calidad de vida en M&eacute;xico</strong>, donde invertir es una excelente decisi&oacute;n.</p>\r\n<p><strong>Montebello</strong> es hoy en d&iacute;a una de las zonas con mayor plusval&iacute;a y desarrollo, es la puerta de acceso a los m&aacute;s exclusivos servicios y a una gran variedad de opciones de entretenimiento. Justo aqu&iacute;, crece <strong>Forestes</strong>.</p>\";}', '2021-01-14 00:56:42', 'available'),
(2, 'serena', 'sale', 'a:9:{s:4:\"name\";s:6:\"Serena\";s:5:\"title\";s:16:\"Residencial 2020\";s:5:\"price\";d:3300000;s:10:\"price_text\";s:25:\"Proyecto 3 casas preventa\";s:7:\"map_lat\";s:10:\"21.0628052\";s:8:\"map_long\";s:11:\"-89.6685562\";s:10:\"slide_home\";s:1:\"2\";s:15:\"slide_portfolio\";s:1:\"2\";s:11:\"description\";s:574:\"<h3>CARACTER&Iacute;STICAS</h3>\r\n<ul class=\"m-0\">\r\n<li>\r\n<p class=\"text-muted\">3 Cuartos con Ba&ntilde;o</p>\r\n</li>\r\n<li>\r\n<p class=\"text-muted\">Terraza Techada</p>\r\n</li>\r\n<li>\r\n<p class=\"text-muted\">Cocina con isla</p>\r\n</li>\r\n<li>\r\n<p class=\"text-muted\">Piscina de 3 x 5 mts</p>\r\n</li>\r\n<li>\r\n<p class=\"text-muted\">&Aacute;rea de Lavado con tendedero</p>\r\n</li>\r\n<li>\r\n<p class=\"text-muted\">Cuarto de Servicio con Ba&ntilde;o</p>\r\n</li>\r\n<li>\r\n<p class=\"text-muted\">Garage para 2 coches</p>\r\n</li>\r\n<li>\r\n<p class=\"text-muted m-0\">Jard&iacute;n interior</p>\r\n</li>\r\n</ul>\";}', '2021-01-14 01:13:42', 'available'),
(3, NULL, 'under_construction', 'a:4:{s:4:\"name\";s:17:\"Bellavista Dzitya\";s:5:\"title\";s:16:\"Residencial 2020\";s:10:\"slide_home\";N;s:15:\"slide_portfolio\";s:1:\"3\";}', '2021-01-14 01:17:12', 'available'),
(4, NULL, 'under_construction', 'a:4:{s:4:\"name\";s:16:\"Casa Montecristo\";s:5:\"title\";s:16:\"Residencial 2020\";s:10:\"slide_home\";N;s:15:\"slide_portfolio\";s:1:\"4\";}', '2021-01-14 01:19:44', 'available'),
(5, NULL, 'finished', 'a:4:{s:4:\"name\";s:6:\"Natuur\";s:5:\"title\";s:16:\"Residencial 2020\";s:10:\"slide_home\";N;s:15:\"slide_portfolio\";s:1:\"7\";}', '2021-01-14 01:23:51', 'available'),
(6, NULL, 'finished', 'a:4:{s:4:\"name\";s:21:\"Casa SG Norte Mérida\";s:5:\"title\";s:16:\"Residencial 2020\";s:10:\"slide_home\";N;s:15:\"slide_portfolio\";s:1:\"5\";}', '2021-01-14 01:29:51', 'available'),
(7, NULL, 'finished', 'a:4:{s:4:\"name\";s:7:\"El Muro\";s:5:\"title\";s:15:\"Desarrollo 2020\";s:10:\"slide_home\";N;s:15:\"slide_portfolio\";s:1:\"6\";}', '2021-01-14 01:32:14', 'available'),
(8, NULL, 'under_construction', 'a:4:{s:4:\"name\";s:11:\"Casa Soluna\";s:5:\"title\";s:16:\"Residencial 2020\";s:10:\"slide_home\";N;s:15:\"slide_portfolio\";s:1:\"5\";}', '2021-01-18 19:18:35', 'available'),
(9, NULL, 'under_construction', 'a:4:{s:4:\"name\";s:11:\"Casa Uyauya\";s:5:\"title\";s:16:\"Residencial 2021\";s:10:\"slide_home\";N;s:15:\"slide_portfolio\";s:1:\"6\";}', '2021-01-20 15:52:03', 'available'),
(10, NULL, 'under_construction', 'a:4:{s:4:\"name\";s:12:\"Casa Telchac\";s:5:\"title\";s:16:\"Residencial 2021\";s:10:\"slide_home\";N;s:15:\"slide_portfolio\";s:1:\"7\";}', '2021-01-20 15:59:22', 'available'),
(11, NULL, 'finished', 'a:4:{s:4:\"name\";s:13:\"Casa Serena 1\";s:5:\"title\";s:16:\"Residencial 2021\";s:10:\"slide_home\";N;s:15:\"slide_portfolio\";s:1:\"1\";}', '2021-01-20 16:36:29', 'available'),
(12, NULL, 'under_construction', 'a:4:{s:4:\"name\";s:16:\"Villa Montebello\";s:5:\"title\";s:16:\"Residencial 2021\";s:10:\"slide_home\";N;s:15:\"slide_portfolio\";s:1:\"6\";}', '2021-01-21 19:20:08', 'available');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `token` longtext NOT NULL,
  `login_date` datetime DEFAULT NULL,
  `logout_date` datetime DEFAULT NULL,
  `connection` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `id_user`, `token`, `login_date`, `logout_date`, `connection`) VALUES
(1, 1, '3YCFJDpLzGJKIPpiW5WvtMYj0EF9mqh3fCp6o3WRUfiohLxze9aHdvQtWolziRz6gODfkWt52Tk9boFnRlqbWOOWe0bdgKdzXVuxR5sTK9aNUS9n0akUVhSvxBvsRqOu', '2020-11-09 16:45:31', '2020-11-09 16:46:36', 'a:5:{s:2:\"ip\";s:9:\"127.0.0.1\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36\";}'),
(2, 1, '7MGZ4zWWF3iqLLJ5B3HRu3SRBueCHbYESwVyF7ozz4ZkQ3hFGJlRwHneiyUX7s6hgwbGH5uzwfYWQ79frDtmMafOjKv8L4HI3LBye8jq06pQ2qEU3ZeJmPNwspsGv6ZR', '2020-11-13 12:10:57', '2020-12-03 17:10:38', 'a:5:{s:2:\"ip\";s:9:\"127.0.0.1\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.193 Safari/537.36\";}'),
(3, 1, 'WTERIfkcddm9C0DOtc9B6CPegPEZpXXcKX9MNhnXN8IUYV1L44rYE3Wi5ThxxoF9NuWysOVEJ6niOdYrZ7S4KxgTXLupLac3KEsgHbtHR2qnTERfI4rwQNyQqFaUIo2s', '2020-12-03 17:10:41', '2020-12-04 17:10:19', 'a:5:{s:2:\"ip\";s:9:\"127.0.0.1\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36\";}'),
(4, 1, 'PBmcdnN38NCPpY5JFrtg40feURIuFj3mUszAzL5Ah9FZ9kb4AtFakp4rsAJKM7Px7Gns2stPJw6s2amndUwNkON02BhBlfhswhtDBLWfL60zNb0mqO6M5UsOvlNDrx9k', '2020-12-04 17:10:21', '2020-12-04 17:13:24', 'a:5:{s:2:\"ip\";s:9:\"127.0.0.1\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36\";}'),
(5, 1, 'ykTZ2k8wrxI69NtOxeIzUdKrWyI6EndvvRm5uZDwDQO0OZbKRrKRBUY7ihYFDz7TeQDYZ9TEHIFyel9zCI7HkPQ4txp6m87JtF61HBgfBLjry9xJIp8yui4Roq2bDWxj', '2020-12-04 17:13:26', NULL, 'a:5:{s:2:\"ip\";s:9:\"127.0.0.1\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36\";}'),
(6, 1, 'ejlZicYDc9QcGZfKn0SWj4PHUsQyB4SmvBOCVHXj7gj5ZS7vzprlJzNlNPyRLA1nEBrkochEXcghrGZGDKDdQPH9T7SNvrmx7an1rzTaSMGpxJEJbwmCVJVggo7G9A7X', '2021-01-07 14:25:22', '2021-01-07 14:31:18', 'a:5:{s:2:\"ip\";s:13:\"187.189.50.14\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36\";}'),
(7, NULL, 'SMKn2yonglKqh5pLH19Yr17rPVLVoAAiwwwmUgkWGnAOit6fIuQVWe8qG7CknAqipINao3QvXIjiJBpvqm8yezcC3xfCP0E51355UM0k31DhrzO9b7usDQGk7cLkENoB', '2021-01-07 14:31:30', '2021-01-07 14:33:08', 'a:5:{s:2:\"ip\";s:13:\"187.189.50.14\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36\";}'),
(8, NULL, 'FmrrCYiPPWYj73ivAC1PfS9wj1oMaELCwNUZH3CuCDTxKj3wuugiBBwdTS6OKAJar6Zx51805FVu0qXODRcQVxQXXNodWexrv0mEEGAtSaR43yWx4h76TWjieQiU12Mg', '2021-01-07 14:33:08', '2021-01-07 14:34:50', 'a:5:{s:2:\"ip\";s:14:\"187.150.77.234\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36\";}'),
(9, 1, 'qMPuW05B8ikE5orXl5QJ9Z9raQTECfgBiuhsTZkVHo0okcBbuFFiSINGp4wMUVb8fPNqswXKPXhD3dLeHCTlAwKq9n9UXoHVey4FFD2l4ATMmgTEJut0dhp5MJZNMGi6', '2021-01-07 14:33:10', '2021-01-07 14:37:10', 'a:5:{s:2:\"ip\";s:13:\"187.189.50.14\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36\";}'),
(10, NULL, 'WV9l3Ft48hoZcaLMRozLLEaNFiJQdNwKjWv7GeTVsrLFMbrfCoSB4WxMvOTmAfDqTxEvHTe4bbSfI3sPin0OkwC69Koq7DqxWXhthuVIp565yw627n5zi1FGsmtwla0Y', '2021-01-07 14:34:54', NULL, 'a:5:{s:2:\"ip\";s:14:\"187.150.77.234\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36\";}'),
(11, 2, 'TmHIjnL3l92CBDehwVKfjlGGXGHtvvqjCoMjo2fb76S2S7dm7FSsmyspRy9BT0bmeFeeQ7ydFuflq0I9gsdKw1cFsoPehzodOxlmEE2zyfXKMqtG28pqqueiSXWKyjUs', '2021-01-07 14:42:52', '2021-01-09 15:57:35', 'a:5:{s:2:\"ip\";s:14:\"187.150.77.234\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36\";}'),
(12, 3, 'y46TJMcAtPOmixyWYP0HH05twgk6eocmsotI2dd63WwdS4kvpv9RRvOp81H9QiKpGrhHUlSwV7mwqphiJ03VYqmuNICpXBiPriRhsRbqYvYWBIns2cCU9aBwsWRgv4gz', '2021-01-07 16:15:17', NULL, 'a:5:{s:2:\"ip\";s:12:\"186.96.21.39\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:113:\"Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36\";}'),
(13, 3, 'WAANGuNAkmTI9Fh6O9nIirHFj2d29yhhsP0smqrl0ATZWcNVsS1hdbsRryEXn8sJhNdapmgwrnt8FCAGwUbSZ3drAYaP9mJDfcl6q1zcTyNKuFeLxedLr9gcei7x9KwZ', '2021-01-09 15:57:39', '2021-01-10 23:28:16', 'a:5:{s:2:\"ip\";s:15:\"187.190.174.173\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36\";}'),
(14, 1, 'VEO7ACqEBrqmuFutwdJLtv6KWdcbOOb6ACn9rEEzN08efmz2AOQgJ8aRBnSOuDdY23H21aRgGmXHsQUJGSwscN51cCfmbJ8ShhZGvJCDCfP6tjBTwSA1KQQLrsA5NAqe', '2021-01-09 16:50:38', NULL, 'a:5:{s:2:\"ip\";s:13:\"187.189.50.14\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36\";}'),
(15, 3, 'Lw4yDtYeRp13sb71GBhe06NdjxW00lLvFnxgDhaZXicConE6kZvvKwwbIiBmuizSAzq9SzMBNetYeRiglCARO3fJeXshsGFrAjyVnd2zbgJBWshSssH6XuUKQA8oVSta', '2021-01-10 20:41:35', NULL, 'a:5:{s:2:\"ip\";s:9:\"127.0.0.1\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36\";}'),
(16, 3, 'AKyDVpC9QgtESFMOAhsYFfiOBVxGTX6dSwLuaKoSm91EfZsSTWR9AlK4Pm5vODTc99lxlpLCMgndySVyl9LPIlyu63xNMmf7JB0jZh3QHON57by5cT9IYgojDzXqRWIT', '2021-01-11 10:27:05', NULL, 'a:5:{s:2:\"ip\";s:15:\"187.190.174.173\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36\";}'),
(17, 3, 'd1W8O7WQVWY6biHjU1Zk7cMoJVaXUgzfrhU3fbUJYIDXm2RYPspDU1JIkfRRm1yu2rMj3kEjlNQFtH8F8W33AbyQnnLQq0ntiF5wO8sZMVb47gY88NyeFVsCqBq5Zxpx', '2021-01-11 17:19:24', NULL, 'a:5:{s:2:\"ip\";s:12:\"186.96.21.17\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36\";}'),
(18, 3, 'wx8n0H6J34lZuutj5GK4agGYaOiUis3gkxsRqI33tRnWrxVGI249QaTszcgRY8vTsAqLDZVBHmFMbO2HOswMNpMRlADlm1RfUf5EkjBrHKd9Px2xBOO3coo8Gj3xScyk', '2021-01-13 21:42:01', NULL, 'a:5:{s:2:\"ip\";s:15:\"187.190.174.173\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36\";}'),
(19, 1, 'XAvK3Kc3M9RcFF4xSf16zPDURuTjdqRljD8Nab2VEstlNyud64yE0vr0wJpjczLHXlqO9KutWVdB02DEI4MVH4NFCFd9EjSt37rF4tpEBNNjcgtJASxfBOMLO9pv4jjN', '2021-01-13 21:56:29', NULL, 'a:5:{s:2:\"ip\";s:13:\"187.189.49.14\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:6:\"Mobile\";s:2:\"so\";s:7:\"Android\";s:15:\"HTTP_USER_AGENT\";s:133:\"Mozilla/5.0 (Linux; Android 10; motorola one action) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Mobile Safari/537.36\";}'),
(20, 3, 'owUw7PsDm9qXQWpbwe6l1AJcHEvZdvTOIlBiIUuEnQNJ96CjAzwGyJ8nQDazlgHPcXYpq6eIxKdBXGvsDCew57vDAywPWsqhe1GizKVqa156zLJs2p0IzoxAblMLomUI', '2021-01-21 14:15:33', NULL, 'a:5:{s:2:\"ip\";s:12:\"186.96.21.17\";s:7:\"browser\";s:6:\"CHROME\";s:6:\"device\";s:7:\"Desktop\";s:2:\"so\";s:3:\"WIN\";s:15:\"HTTP_USER_AGENT\";s:115:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.141 Safari/537.36\";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slideshows`
--

CREATE TABLE `slideshows` (
  `id` int(11) NOT NULL,
  `id_key` bigint(20) DEFAULT NULL,
  `table` varchar(20) DEFAULT NULL,
  `pos_home` int(11) DEFAULT NULL,
  `pos_portfolio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `slideshows`
--

INSERT INTO `slideshows` (`id`, `id_key`, `table`, `pos_home`, `pos_portfolio`) VALUES
(1, 1, 'projects', 1, 1),
(2, 2, 'projects', 2, 2),
(3, 3, 'projects', NULL, 3),
(4, 4, 'projects', NULL, 4),
(5, 5, 'projects', NULL, 7),
(6, 6, 'projects', NULL, 5),
(7, 7, 'projects', NULL, 6),
(8, 8, 'projects', NULL, 5),
(9, 9, 'projects', NULL, 6),
(10, 10, 'projects', NULL, 7),
(11, 11, 'projects', NULL, 1),
(12, 12, 'projects', NULL, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` text NOT NULL,
  `name` text,
  `email` text NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `password` text NOT NULL,
  `id_level` bigint(20) DEFAULT NULL,
  `permissions` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `phone`, `password`, `id_level`, `permissions`) VALUES
(1, 'dgomez', 'David Miguel Gómez Macías', 'davidgomezmacias@gmail.com', 529982904203, '02feac4b4ae299d19bd66f1e21fe4847778dccd2:LzeeVvoO00VKhaZYPVCYz0mZHR3CPauyInDV8bpHnILYZnN9jFUJKuKRXsyKton3', 1, 'a:16:{i:0;s:12:\"{users_read}\";i:1;s:14:\"{users_create}\";i:2;s:14:\"{users_update}\";i:3;s:14:\"{users_delete}\";i:4;s:18:\"{permissions_read}\";i:5;s:20:\"{permissions_create}\";i:6;s:20:\"{permissions_delete}\";i:7;s:11:\"{blog_read}\";i:8;s:13:\"{blog_create}\";i:9;s:13:\"{blog_update}\";i:10;s:13:\"{blog_delete}\";i:11;s:22:\"{categories_blog_read}\";i:12;s:24:\"{categories_blog_create}\";i:13;s:24:\"{categories_blog_delete}\";i:14;s:18:\"{help_development}\";i:15;s:10:\"{projects}\";}'),
(2, 'ggomez', 'Gersón Gómez Macías', 'ggomez@codemonkey.com.mx', 52, 'af1fe7ae6a27786ee012d3f00f864f4ce4651e0f:A5Qhl6cxexzOlcb69cl7hs0TG7e2TaTmILJXbFfPJyEpt0CJuzua2m5UVWH6snMR', 1, 'a:16:{i:0;s:12:\"{users_read}\";i:1;s:14:\"{users_create}\";i:2;s:14:\"{users_update}\";i:3;s:14:\"{users_delete}\";i:4;s:18:\"{permissions_read}\";i:5;s:20:\"{permissions_create}\";i:6;s:20:\"{permissions_delete}\";i:7;s:11:\"{blog_read}\";i:8;s:13:\"{blog_create}\";i:9;s:13:\"{blog_update}\";i:10;s:13:\"{blog_delete}\";i:11;s:22:\"{categories_blog_read}\";i:12;s:24:\"{categories_blog_create}\";i:13;s:24:\"{categories_blog_delete}\";i:14;s:18:\"{help_development}\";i:15;s:10:\"{projects}\";}'),
(3, 'admin', 'Edifica', 'admin@edifica67.mx', 52, 'b85b046f7714b25f15d6f0853ebf11fa60c93678:vCVqFHJ1bGVVxrkiiDh04TnTT6RpkE4wL5P4mxWKQCsUPKfYpaiLWbggizbZYlqu', 2, 'a:1:{i:0;s:10:\"{projects}\";}');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`id_level`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `levels`
--
ALTER TABLE `levels`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`author`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `blog_categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `levels` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
