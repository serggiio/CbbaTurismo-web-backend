-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2021 a las 05:45:25
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `turismo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `categoryId` int(10) UNSIGNED NOT NULL,
  `tagId` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`categoryId`, `tagId`, `categoryName`, `created_at`, `updated_at`) VALUES
(1, 5, 'Hamburguesas', NULL, NULL),
(2, 5, 'Comida mexicana', NULL, NULL),
(3, 5, 'Pastas', NULL, NULL),
(4, 1, 'Vegetacion', NULL, '2021-04-26 06:40:55'),
(5, 1, 'Plaza comercial', NULL, NULL),
(6, 2, '2 estrellass', NULL, '2021-03-11 08:10:20'),
(7, 2, '5 estrellas', NULL, NULL),
(9, 5, 'Trancapechos', '2021-03-11 08:07:54', '2021-03-23 08:25:26'),
(10, 6, 'Iglesias', '2021-03-23 08:22:06', '2021-03-23 08:22:06'),
(11, 6, 'Catedrales', '2021-03-23 08:22:17', '2021-03-23 08:22:17'),
(12, 4, 'Monumentos', '2021-03-23 08:26:22', '2021-03-23 08:26:22'),
(13, 7, 'Motel', '2021-03-23 08:29:42', '2021-03-23 08:29:42'),
(14, 7, 'Pension', '2021-03-23 08:30:23', '2021-03-23 08:30:23'),
(15, 7, 'Hostal', '2021-03-23 08:30:43', '2021-03-23 08:30:43'),
(16, 7, 'Casa privada', '2021-03-23 08:31:26', '2021-03-23 08:31:26'),
(17, 8, 'pub', '2021-03-23 09:30:58', '2021-03-23 09:30:58'),
(18, 8, 'Bar tradicional', '2021-03-23 09:31:14', '2021-03-23 09:31:14'),
(19, 8, 'Bar terraza', '2021-03-23 09:32:08', '2021-03-23 09:32:08'),
(20, 9, 'Discotecas', '2021-03-23 09:33:09', '2021-03-23 09:33:09'),
(21, 9, 'Salon de baile', '2021-03-23 09:33:31', '2021-03-23 09:33:31'),
(22, 9, 'karaoke', '2021-03-23 09:34:10', '2021-03-23 09:34:10'),
(23, 5, 'Pollo frito', '2021-04-26 07:06:34', '2021-04-26 07:06:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentary`
--

CREATE TABLE `commentary` (
  `commentaryId` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `touristicPlaceId` int(10) UNSIGNED NOT NULL,
  `commentaryDesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reports` int(11) NOT NULL,
  `commentaryStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `commentary`
--

INSERT INTO `commentary` (`commentaryId`, `userId`, `touristicPlaceId`, `commentaryDesc`, `reports`, `commentaryStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 'comentario', 0, 'Active', '2021-03-23 19:10:35', '2021-03-23 19:10:35'),
(6, 2, 10, 'asjdbfjas jhsadbfjhbas najnda!', 0, 'Active', '2021-03-17 04:00:00', NULL),
(7, 4, 10, 'Lorem ipsum!', 0, 'Active', '2021-03-01 04:00:00', NULL),
(8, 2, 10, 'asfdbh askjdfbfsakb sadfhbasdf', 0, 'Active', '2021-03-01 04:00:00', NULL),
(9, 5, 10, 'Lorem ipsum', 0, 'Active', '2021-04-01 04:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorite`
--

CREATE TABLE `favorite` (
  `favoriteId` bigint(20) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `touristicPlaceId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `favorite`
--

INSERT INTO `favorite` (`favoriteId`, `userId`, `touristicPlaceId`, `created_at`, `updated_at`) VALUES
(1, 1, 10, '2021-03-23 19:10:14', '2021-03-23 19:10:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallery`
--

CREATE TABLE `gallery` (
  `galleryId` int(10) UNSIGNED NOT NULL,
  `touristicPlaceId` int(10) UNSIGNED NOT NULL,
  `galleryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `galleryPath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `gallery`
--

INSERT INTO `gallery` (`galleryId`, `touristicPlaceId`, `galleryName`, `galleryPath`, `created_at`, `updated_at`) VALUES
(10, 8, 'Aguas danzantes', 'images/places/8/galleries/10', '2021-03-18 09:12:35', '2021-03-18 09:12:35'),
(12, 10, 'Imagenes plaza 14 de septiembre', 'images/places/10/galleries/12', '2021-03-18 09:34:36', '2021-03-18 09:34:36'),
(13, 11, 'Galería el pueblito', 'images/places/11/galleries/13', '2021-03-18 09:39:19', '2021-03-18 09:39:19'),
(14, 12, 'Galeria jardin', 'images/places/12/galleries/14', '2021-03-18 09:45:35', '2021-03-18 09:45:35'),
(15, 13, 'Galeria catedral', 'images/places/13/galleries/15', '2021-03-18 09:48:52', '2021-03-18 09:48:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `imageId` int(10) UNSIGNED NOT NULL,
  `galleryId` int(10) UNSIGNED NOT NULL,
  `imagePath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`imageId`, `galleryId`, `imagePath`, `created_at`, `updated_at`) VALUES
(35, 10, '7bdce1a9ad0130ec61d0b10d6e5cde56.jpg101616058755.jpg', '2021-03-18 09:12:35', '2021-03-18 09:12:35'),
(36, 10, 'd136912f19cdb088b6bd9b0232d8691b.jpg101616058755.jpg', '2021-03-18 09:12:35', '2021-03-18 09:12:35'),
(51, 12, 'plaza_principal2.jpg121616060076.jpg', '2021-03-18 09:34:36', '2021-03-18 09:34:36'),
(52, 12, 'plaza_principal.jpg121616060076.jpg', '2021-03-18 09:34:36', '2021-03-18 09:34:36'),
(53, 12, 'plaza_principaljpg.jpg121616060076.jpg', '2021-03-18 09:34:36', '2021-03-18 09:34:36'),
(54, 12, 'plaza_principal1.jpg121616060076.jpg', '2021-03-18 09:34:36', '2021-03-18 09:34:36'),
(55, 13, 'pueblito4.jpg131616060359.jpg', '2021-03-18 09:39:19', '2021-03-18 09:39:19'),
(56, 13, 'pueblito2jpg.jpg131616060359.jpg', '2021-03-18 09:39:19', '2021-03-18 09:39:19'),
(57, 13, 'pueblito.jpg131616060359.jpg', '2021-03-18 09:39:19', '2021-03-18 09:39:19'),
(58, 13, 'pueblito3.jpg131616060359.jpg', '2021-03-18 09:39:19', '2021-03-18 09:39:19'),
(59, 13, 'pueblito1.jpg131616060359.jpg', '2021-03-18 09:39:19', '2021-03-18 09:39:19'),
(60, 14, 'botanico.jpg141616060735.jpg', '2021-03-18 09:45:35', '2021-03-18 09:45:35'),
(61, 14, 'botanico1.jpg141616060735.jpg', '2021-03-18 09:45:35', '2021-03-18 09:45:35'),
(62, 14, 'botanico2.jpg141616060735.jpg', '2021-03-18 09:45:35', '2021-03-18 09:45:35'),
(63, 14, 'botanico4.jpg141616060735.jpg', '2021-03-18 09:45:35', '2021-03-18 09:45:35'),
(64, 14, 'botanico5.jpg141616060735.jpg', '2021-03-18 09:45:35', '2021-03-18 09:45:35'),
(65, 14, 'botanico6.jpg141616060735.jpg', '2021-03-18 09:45:35', '2021-03-18 09:45:35'),
(66, 15, 'catedral.jpg151616060932.jpg', '2021-03-18 09:48:52', '2021-03-18 09:48:52'),
(67, 15, 'catedral2.jpg151616060932.jpg', '2021-03-18 09:48:52', '2021-03-18 09:48:52'),
(68, 15, 'catedral3.jpg151616060932.jpg', '2021-03-18 09:48:52', '2021-03-18 09:48:52');

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2014_10_12_100001_create_estado_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_17_022637_create_tag_table', 1),
(5, '2020_02_17_022816_create_provincia_table', 1),
(6, '2020_02_17_022850_create_tipo_usuario_table', 1),
(7, '2020_02_17_022851_create_users_table', 1),
(8, '2020_02_17_022852_create_user_tables_table', 1),
(9, '2020_02_17_023409_create_lugar_turistico_table', 1),
(10, '2020_02_17_023432_create_lugar_tag_table', 1),
(11, '2020_02_17_023636_create_rate_table', 1),
(12, '2020_02_17_023653_create_comentarios_table', 1),
(13, '2020_02_17_025713_create_galeria_table', 1),
(14, '2020_02_17_025732_create_imagenes_table', 1),
(15, '2020_02_17_025747_create_videos_table', 1),
(16, '2020_09_04_034034_create_test_models_table', 1),
(17, '2020_11_16_045811_create_favorite_table', 1),
(18, '2021_02_06_234911_create_category_table', 1),
(19, '2021_02_07_070844_create_lugar_categoria_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `placecategory`
--

CREATE TABLE `placecategory` (
  `placeCategoryId` int(10) UNSIGNED NOT NULL,
  `touristicPlaceId` int(10) UNSIGNED NOT NULL,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `placecategory`
--

INSERT INTO `placecategory` (`placeCategoryId`, `touristicPlaceId`, `categoryId`, `created_at`, `updated_at`) VALUES
(4, 10, 4, NULL, NULL),
(5, 12, 4, NULL, NULL),
(6, 13, 4, NULL, NULL),
(7, 8, 4, NULL, NULL),
(8, 10, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `placetag`
--

CREATE TABLE `placetag` (
  `placeTagId` int(10) UNSIGNED NOT NULL,
  `touristicPlaceId` int(10) UNSIGNED NOT NULL,
  `tagId` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `placetag`
--

INSERT INTO `placetag` (`placeTagId`, `touristicPlaceId`, `tagId`, `created_at`, `updated_at`) VALUES
(11, 8, 3, NULL, NULL),
(13, 10, 1, NULL, NULL),
(14, 10, 4, NULL, NULL),
(15, 11, 4, NULL, NULL),
(16, 12, 1, NULL, NULL),
(17, 12, 3, NULL, NULL),
(18, 13, 1, NULL, NULL),
(19, 14, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `province`
--

CREATE TABLE `province` (
  `provinceId` int(10) UNSIGNED NOT NULL,
  `provinceName` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `province`
--

INSERT INTO `province` (`provinceId`, `provinceName`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 'Cercado', -17.3697351, -66.1653224, NULL, NULL),
(2, 'Cochabamba', -17.3697351, -66.1653224, NULL, NULL),
(3, 'Tarata', -17.6091383, -66.0255368, NULL, NULL),
(4, 'Sacaba', -17.4057139, -66.0430242, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rate`
--

CREATE TABLE `rate` (
  `rateId` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `touristicPlaceId` int(10) UNSIGNED NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rate`
--

INSERT INTO `rate` (`rateId`, `userId`, `touristicPlaceId`, `puntuacion`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 5, '2021-03-29 06:53:49', '2021-03-29 06:53:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `statusId` int(10) UNSIGNED NOT NULL,
  `statusName` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`statusId`, `statusName`, `created_at`, `updated_at`) VALUES
(1, 'INACTIVO', NULL, NULL),
(2, 'ACTIVO', NULL, NULL),
(3, 'BLOQUEADO', NULL, NULL),
(4, 'REVISION', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `tagId` int(10) UNSIGNED NOT NULL,
  `tagName` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tagFile` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`tagId`, `tagName`, `tagFile`, `created_at`, `updated_at`) VALUES
(1, 'Plazas', 'Plazas.jpg', NULL, NULL),
(2, 'Hoteles', 'Hoteles.jpg', NULL, NULL),
(3, 'Parques', 'Parques.jpg', NULL, NULL),
(4, 'Lugar historico', 'Lugar historico.jpg', NULL, NULL),
(5, 'Restaurantes', 'Restaurantes.jpg', NULL, NULL),
(6, 'religion', 'relogion.png', '2021-03-23 08:21:36', '2021-03-23 08:21:48'),
(7, 'Alojamientos', 'Alojamientos.JPG', '2021-03-23 08:29:10', '2021-03-23 08:29:10'),
(8, 'bares', 'bares.png', '2021-03-23 09:30:31', '2021-03-23 09:30:31'),
(9, 'Centro nocturno', 'Centro nocturno.jpg', '2021-03-23 09:32:53', '2021-03-23 09:32:53'),
(10, 'Centro educativo', 'Centro educativo.jpeg', '2021-04-26 07:05:40', '2021-04-26 07:05:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test_models`
--

CREATE TABLE `test_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `touristicplace`
--

CREATE TABLE `touristicplace` (
  `touristicPlaceId` int(10) UNSIGNED NOT NULL,
  `provinceId` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED DEFAULT NULL,
  `placeStatusId` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `history` text COLLATE utf8mb4_unicode_ci,
  `placeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainVideo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streets` text COLLATE utf8mb4_unicode_ci,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `businessHours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `touristicplace`
--

INSERT INTO `touristicplace` (`touristicPlaceId`, `provinceId`, `userId`, `placeStatusId`, `description`, `history`, `placeName`, `mainImage`, `mainVideo`, `streets`, `latitude`, `longitude`, `businessHours`, `type`, `startDate`, `endDate`, `created_at`, `updated_at`) VALUES
(8, 2, 4, 2, NULL, '', 'Parque de aguas danzantes', 'mainImage.jpg', '', NULL, -17.38822381191786, -66.16552893009413, '', 'place', NULL, NULL, '2021-03-18 09:11:57', '2021-03-23 19:24:44'),
(10, 2, 1, 2, NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio debitis, odio ducimus magni at consequatur atque itaque dolorum unde, neque nam sapiente aperiam quasi quos libero molestiae, aspernatur voluptate deserunt?\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Optio debitis, odio ducimus magni at consequatur atque itaque dolorum unde, neque nam sapiente aperiam quasi quos libero molestiae, aspernatur voluptate deserunt?\r\n\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Optio debitis, odio ducimus magni at consequatur atque itaque dolorum unde, neque nam sapiente aperiam quasi quos libero molestiae, aspernatur voluptate deserunt?\r\n\r\n\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Optio debitis, odio ducimus magni at consequatur atque itaque dolorum unde, neque nam sapiente aperiam quasi quos libero molestiae, aspernatur voluptate deserunt?', 'Plaza 14 de septiembre', 'mainImage.jpg', '', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio debitis, odio ducimus magni at consequatur atque itaque dolorum unde, neque nam sapiente aperiam quasi quos libero molestiae, aspernatur voluptate deserunt?', -17.393773323527824, -66.15713934267255, '', 'place', NULL, NULL, '2021-03-18 09:34:02', '2021-03-18 09:34:02'),
(11, 2, 1, 2, NULL, NULL, 'El pueblito', 'mainImage.jpg', '', NULL, -17.375024656025975, -66.1419345818037, '', 'place', NULL, NULL, '2021-03-18 09:38:53', '2021-03-18 09:38:53'),
(12, 2, 1, 2, NULL, NULL, 'Jardin Botanico', 'mainImage.jpg', '', NULL, -17.37853657809384, -66.14175070745593, '', 'place', NULL, NULL, '2021-03-18 09:45:12', '2021-03-18 09:45:12'),
(13, 2, 1, 2, NULL, NULL, 'Catedral metropolitana', 'mainImage.jpg', '', NULL, -17.394334041510756, -66.1564308470325, '', 'place', NULL, NULL, '2021-03-18 09:48:29', '2021-03-18 09:48:29'),
(14, 2, 5, 2, NULL, NULL, 'Panchita', 'mainImage.png', '', 'Avenia amertiva y villarroel', -17.37250058695166, -66.15968436362516, '', 'place', NULL, NULL, '2021-04-26 07:02:14', '2021-04-26 07:04:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userId` int(10) UNSIGNED NOT NULL,
  `typeId` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `email` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usertable`
--

CREATE TABLE `usertable` (
  `userId` int(10) UNSIGNED NOT NULL,
  `statusId` int(10) UNSIGNED DEFAULT NULL,
  `typeId` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(140) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(140) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verificationCode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usertable`
--

INSERT INTO `usertable` (`userId`, `statusId`, `typeId`, `name`, `lastName`, `phoneNumber`, `email`, `email_verified_at`, `password`, `verificationCode`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Sergiooa', 'Fernandez', '72224078', 'sergiocep2010@gmail.com', NULL, '$2y$10$jD4zL/69D54I7SFKCPXxGuJTkRZOH/zuIzYbnFXVWvULESmFtWt9i', NULL, NULL, NULL, '2021-03-11 05:53:28'),
(2, 2, 2, 'Usuario', 'Prueba', '72224071', 'test1@gmail.com', NULL, '$2y$10$xIHd407t/cRHSKx6eLyAzejr4fj4nieFTs.HjKS3vN46bxBZ5wuTS', NULL, NULL, NULL, '2021-03-23 09:25:53'),
(4, 2, 3, 'Juan', 'Perez', '72224073', 'sergioss21er@gmail.comm', NULL, '$2y$10$jD4zL/69D54I7SFKCPXxGuJTkRZOH/zuIzYbnFXVWvULESmFtWt9i', NULL, NULL, NULL, '2021-03-23 09:15:05'),
(5, 4, 3, '', '', NULL, 'sergioss21errr@gmail.com', NULL, '$2y$10$jD4zL/69D54I7SFKCPXxGuJTkRZOH/zuIzYbnFXVWvULESmFtWt9i', NULL, NULL, '2021-03-23 19:24:10', '2021-03-23 19:24:10'),
(6, 1, 1, 'juan', 'perez', NULL, 'sergioss21err@gmail.com', NULL, '$2y$10$PpCsUSOM0Kbc5W4qp169GeKUFq.kq2KkTk5W/5TEytFys8OsiW.TC', '0xf5qs', NULL, '2021-04-04 21:52:47', '2021-04-04 21:52:47'),
(7, 2, 2, 'test', 'test', NULL, 'sergioss21er@gmail.com', NULL, '$2y$10$mDdHeu4p3aQ2AqTHcveHD.6YYgI4eb/AFREjGg1aSSPsUteFGO9TS', NULL, NULL, '2021-04-04 22:07:56', '2021-04-04 22:08:14'),
(8, 4, 2, 'juan', 'perez', NULL, 'jprezjuan@maill.com', NULL, '$2y$10$yT2KX0b8Zb7gqkz/hRCjt./d.GKipghJIZ4mTjrDWSU8R2ZGgMSYG', 'wk9vc1', NULL, '2021-04-26 06:47:41', '2021-04-26 06:47:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usertype`
--

CREATE TABLE `usertype` (
  `increments` int(10) UNSIGNED NOT NULL,
  `nameType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usertype`
--

INSERT INTO `usertype` (`increments`, `nameType`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, NULL),
(2, 'Usuario', NULL, NULL),
(3, 'Agente', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD UNIQUE KEY `category_categoryname_unique` (`categoryName`),
  ADD KEY `category_tagid_foreign` (`tagId`);

--
-- Indices de la tabla `commentary`
--
ALTER TABLE `commentary`
  ADD PRIMARY KEY (`commentaryId`),
  ADD KEY `commentary_userid_foreign` (`userId`),
  ADD KEY `commentary_touristicplaceid_foreign` (`touristicPlaceId`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`favoriteId`),
  ADD KEY `favorite_userid_foreign` (`userId`),
  ADD KEY `favorite_touristicplaceid_foreign` (`touristicPlaceId`);

--
-- Indices de la tabla `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`galleryId`),
  ADD KEY `gallery_touristicplaceid_foreign` (`touristicPlaceId`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imageId`),
  ADD KEY `images_galleryid_foreign` (`galleryId`);

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
-- Indices de la tabla `placecategory`
--
ALTER TABLE `placecategory`
  ADD PRIMARY KEY (`placeCategoryId`),
  ADD KEY `placecategory_touristicplaceid_foreign` (`touristicPlaceId`),
  ADD KEY `placecategory_categoryid_foreign` (`categoryId`);

--
-- Indices de la tabla `placetag`
--
ALTER TABLE `placetag`
  ADD PRIMARY KEY (`placeTagId`),
  ADD KEY `placetag_touristicplaceid_foreign` (`touristicPlaceId`),
  ADD KEY `placetag_tagid_foreign` (`tagId`);

--
-- Indices de la tabla `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`provinceId`),
  ADD UNIQUE KEY `province_provincename_unique` (`provinceName`);

--
-- Indices de la tabla `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rateId`),
  ADD KEY `rate_userid_foreign` (`userId`),
  ADD KEY `rate_touristicplaceid_foreign` (`touristicPlaceId`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusId`),
  ADD UNIQUE KEY `status_statusname_unique` (`statusName`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tagId`),
  ADD UNIQUE KEY `tag_tagname_unique` (`tagName`),
  ADD UNIQUE KEY `tag_tagfile_unique` (`tagFile`);

--
-- Indices de la tabla `test_models`
--
ALTER TABLE `test_models`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `touristicplace`
--
ALTER TABLE `touristicplace`
  ADD PRIMARY KEY (`touristicPlaceId`),
  ADD KEY `touristicplace_provinceid_foreign` (`provinceId`),
  ADD KEY `touristicplace_placestatusid_foreign` (`placeStatusId`),
  ADD KEY `touristicplace_userid_foreign` (`userId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `users_phonenumber_unique` (`phoneNumber`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_typeid_foreign` (`typeId`);

--
-- Indices de la tabla `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `usertable_email_unique` (`email`),
  ADD KEY `usertable_typeid_foreign` (`typeId`),
  ADD KEY `usertable_statusid_foreign` (`statusId`);

--
-- Indices de la tabla `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`increments`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `commentary`
--
ALTER TABLE `commentary`
  MODIFY `commentaryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favorite`
--
ALTER TABLE `favorite`
  MODIFY `favoriteId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `gallery`
--
ALTER TABLE `gallery`
  MODIFY `galleryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `placecategory`
--
ALTER TABLE `placecategory`
  MODIFY `placeCategoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `placetag`
--
ALTER TABLE `placetag`
  MODIFY `placeTagId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `province`
--
ALTER TABLE `province`
  MODIFY `provinceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rate`
--
ALTER TABLE `rate`
  MODIFY `rateId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `statusId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `tagId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `test_models`
--
ALTER TABLE `test_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `touristicplace`
--
ALTER TABLE `touristicplace`
  MODIFY `touristicPlaceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usertype`
--
ALTER TABLE `usertype`
  MODIFY `increments` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_tagid_foreign` FOREIGN KEY (`tagId`) REFERENCES `tag` (`tagId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `commentary`
--
ALTER TABLE `commentary`
  ADD CONSTRAINT `commentary_touristicplaceid_foreign` FOREIGN KEY (`touristicPlaceId`) REFERENCES `touristicplace` (`touristicPlaceId`) ON DELETE CASCADE,
  ADD CONSTRAINT `commentary_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `usertable` (`userId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_touristicplaceid_foreign` FOREIGN KEY (`touristicPlaceId`) REFERENCES `touristicplace` (`touristicPlaceId`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `usertable` (`userId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_touristicplaceid_foreign` FOREIGN KEY (`touristicPlaceId`) REFERENCES `touristicplace` (`touristicPlaceId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_galleryid_foreign` FOREIGN KEY (`galleryId`) REFERENCES `gallery` (`galleryId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `placecategory`
--
ALTER TABLE `placecategory`
  ADD CONSTRAINT `placecategory_categoryid_foreign` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE,
  ADD CONSTRAINT `placecategory_touristicplaceid_foreign` FOREIGN KEY (`touristicPlaceId`) REFERENCES `touristicplace` (`touristicPlaceId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `placetag`
--
ALTER TABLE `placetag`
  ADD CONSTRAINT `placetag_tagid_foreign` FOREIGN KEY (`tagId`) REFERENCES `tag` (`tagId`) ON DELETE CASCADE,
  ADD CONSTRAINT `placetag_touristicplaceid_foreign` FOREIGN KEY (`touristicPlaceId`) REFERENCES `touristicplace` (`touristicPlaceId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_touristicplaceid_foreign` FOREIGN KEY (`touristicPlaceId`) REFERENCES `touristicplace` (`touristicPlaceId`) ON DELETE CASCADE,
  ADD CONSTRAINT `rate_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `usertable` (`userId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `touristicplace`
--
ALTER TABLE `touristicplace`
  ADD CONSTRAINT `touristicplace_placestatusid_foreign` FOREIGN KEY (`placeStatusId`) REFERENCES `status` (`statusId`) ON DELETE CASCADE,
  ADD CONSTRAINT `touristicplace_provinceid_foreign` FOREIGN KEY (`provinceId`) REFERENCES `province` (`provinceId`) ON DELETE CASCADE,
  ADD CONSTRAINT `touristicplace_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `usertable` (`userId`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_typeid_foreign` FOREIGN KEY (`typeId`) REFERENCES `usertype` (`increments`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usertable`
--
ALTER TABLE `usertable`
  ADD CONSTRAINT `usertable_statusid_foreign` FOREIGN KEY (`statusId`) REFERENCES `status` (`statusId`) ON DELETE CASCADE,
  ADD CONSTRAINT `usertable_typeid_foreign` FOREIGN KEY (`typeId`) REFERENCES `usertype` (`increments`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
