-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2021 a las 04:40:06
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
(4, 1, 'Vegetación', NULL, NULL),
(5, 1, 'Plaza comercial', NULL, NULL),
(6, 2, '2 estrellas', NULL, NULL),
(7, 2, '5 estrellas', NULL, NULL);

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
(1, 1, 1, 'Este es un buen comentario', 0, 'Active', NULL, NULL),
(2, 1, 1, 'Este es un buen comentario 2', 3, 'Active', NULL, NULL),
(3, 1, 2, 'Este es un buen comentario 3', 0, 'Active', NULL, NULL),
(4, 2, 3, 'Este es un buen comentario 4', 0, 'Inactive', NULL, NULL);

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
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 1, 3, NULL, NULL);

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
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 4, 2, NULL, NULL),
(6, 2, 1, NULL, NULL),
(7, 3, 1, NULL, NULL),
(8, 5, 4, NULL, NULL),
(9, 6, 2, NULL, NULL);

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
(1, 1, 1, 5, NULL, NULL),
(2, 1, 2, 3, NULL, NULL),
(3, 2, 3, 5, NULL, NULL),
(4, 3, 1, 5, NULL, NULL);

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
(5, 'Restaurantes', 'Restaurantes.jpg', NULL, NULL);

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
  `userId` int(10) UNSIGNED NOT NULL,
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
(1, 1, 1, 1, 'Descripcion para un lugar turistico', 'Hostoria si es que tiene', 'Plaza 14 de Septiembre', 'mainImage.jpg', '/src/common/places/1/main.VGA', 'Avenida Ayacucho entre lanza y sanmartin', -17.3783261, -66.1521979, '07:00 AM - 19:00 PM', 'place', NULL, NULL, NULL, NULL),
(2, 2, 1, 1, 'Descripcion para un lugar turistico2', 'Hostoria si es que tiene2', 'Hotel Cochabamba', 'mainImage.jpg', '/src/common/places/1/main.VGA', 'Pase boulevard', -17.3926829, -66.1571253, '07:00 AM - 19:00 PM', 'place', NULL, NULL, NULL, NULL),
(3, 3, 1, 1, 'Descripcion para un lugar turistico3', 'Hostoria si es que tiene', 'Iglesia de Cala Cala', 'mainImage.jpg', '/src/common/places/1/main.VGA', 'Avenida Ayacucho entre lanza y sanmartin', -17.3783261, -66.1571253, '07:00 AM - 19:00 PM', 'place', NULL, NULL, NULL, NULL),
(4, 4, 1, 1, 'Descripcion para un lugar turistico', 'Hostoria si es que tiene', 'Plaza principal', 'mainImage.jpg', '/src/common/places/1/main.VGA', 'Avenida Ayacucho entre lanza y sanmartin', -17.3783261, -66.1571253, '07:00 AM - 19:00 PM', 'place', NULL, NULL, NULL, NULL),
(5, 4, 1, 1, 'Descripcion para un lugar turistico', 'Hostoria si es que tiene', 'Evento Plaza principal', 'mainImage.jpg', '/src/common/places/1/main.VGA', 'Avenida Ayacucho entre lanza y sanmartin', -17.3783261, -66.1571253, '07:00 AM - 19:00 PM', 'event', '2020-10-02', '2019-11-02', NULL, NULL),
(6, 4, 1, 1, 'Descripcion para un lugar turistico', 'Hostoria si es que tiene', 'Feria Plaza principal', 'mainImage.jpg', '/src/common/places/1/main.VGA', 'Avenida Ayacucho entre lanza y sanmartin', -17.3783261, -66.1571253, '07:00 AM - 19:00 PM', 'event', '2020-11-02', '2019-11-05', NULL, NULL);

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
(1, 1, 1, 'Sergio', 'Fernandez', '72224078', 'sergiocep2010@gmail.com', NULL, '$2y$10$sL3Ecl0PeY.ZtaIMHkv3Pe/3b/M1INpnnuqIdRrrxo903q/4Uknl.', NULL, NULL, NULL, NULL),
(2, 2, 2, 'Roland', 'munoz', '72224071', 'test1@gmail.com', NULL, '$2y$10$vEbdF2P3kJPA1LoT8qu.MOzr07cVk6i27CkN1kr5y8EpOypxZBOaq', NULL, NULL, NULL, NULL),
(3, 3, 3, 'Bryan', 'Chavez', '72224072', 'test2@gmail.com', NULL, '$2y$10$Wl9iPi1aH3KMcIHyAhiDruNtM/QfA5w0InAwpim0LX764N8/o.rkC', NULL, NULL, NULL, NULL),
(4, 4, 4, 'Rosa', 'Mela', '72224073', 'test3@gmail.com', NULL, '$2y$10$LJ34MYJIgkIOjh8rWQZE/uRwFA.571U3UyryevJwTLV6H9Na6FOVC', NULL, NULL, NULL, NULL);

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
(3, 'Pasante', NULL, NULL),
(4, 'Moderador', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `videoId` int(10) UNSIGNED NOT NULL,
  `galleryId` int(10) UNSIGNED NOT NULL,
  `videoName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `videoPath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainVideo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`videoId`, `galleryId`, `videoName`, `videoPath`, `mainVideo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Video de presentacion', '/src/common/videos/1', 'true', NULL, NULL),
(2, 1, 'Video de presentacion 2', '/src/common/videos/2', 'false', NULL, NULL),
(3, 3, 'Video de presentacion 3', '/src/common/videos/3', 'false', NULL, NULL),
(4, 4, 'Video de presentacion 4', '/src/common/videos/4', 'true', NULL, NULL);

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
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`videoId`),
  ADD KEY `videos_galleryid_foreign` (`galleryId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `commentary`
--
ALTER TABLE `commentary`
  MODIFY `commentaryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favorite`
--
ALTER TABLE `favorite`
  MODIFY `favoriteId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gallery`
--
ALTER TABLE `gallery`
  MODIFY `galleryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `placecategory`
--
ALTER TABLE `placecategory`
  MODIFY `placeCategoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `placetag`
--
ALTER TABLE `placetag`
  MODIFY `placeTagId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `province`
--
ALTER TABLE `province`
  MODIFY `provinceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rate`
--
ALTER TABLE `rate`
  MODIFY `rateId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `statusId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `tagId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `test_models`
--
ALTER TABLE `test_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `touristicplace`
--
ALTER TABLE `touristicplace`
  MODIFY `touristicPlaceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usertype`
--
ALTER TABLE `usertype`
  MODIFY `increments` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `videoId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- Filtros para la tabla `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_galleryid_foreign` FOREIGN KEY (`galleryId`) REFERENCES `gallery` (`galleryId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
