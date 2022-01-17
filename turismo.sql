-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2022 a las 01:10:37
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `action`
--

CREATE TABLE `action` (
  `actionId` int(10) UNSIGNED NOT NULL,
  `userId` int(10) UNSIGNED NOT NULL,
  `actionName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oldData` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `newData` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `action`
--

INSERT INTO `action` (`actionId`, `userId`, `actionName`, `table`, `oldData`, `newData`, `ip`, `created_at`, `updated_at`) VALUES
(1, 1, 'Registro', 'Lugar Turistico s', '', '{\"provinceId\":3,\"userId\":\"1\",\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba log\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"businessHours\":\"\",\"streets\":null,\"latitude\":\"-17.378489925542294\",\"longitude\":\"-66.19029867905655\",\"type\":\"place\",\"updated_at\":\"2021-09-02 02:39:48\",\"created_at\":\"2021-09-02 02:39:48\",\"touristicPlaceId\":28}', NULL, '2021-09-02 06:39:48', '2021-09-02 06:39:48'),
(2, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":28,\"provinceId\":3,\"userId\":1,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba logo\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.378489925542\",\"longitude\":\"-66.190298679057\",\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-02 02:39:48\",\"updated_at\":\"2021-09-02 02:45:52\"}', '{\"touristicPlaceId\":28,\"provinceId\":3,\"userId\":1,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba logo\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.378489925542\",\"longitude\":\"-66.190298679057\",\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-02 02:39:48\",\"updated_at\":\"2021-09-02 02:45:52\"}', NULL, '2021-09-02 06:45:52', '2021-09-02 06:45:52'),
(3, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":28,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba logo\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.378489925542294,\"longitude\":-66.19029867905655,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-02 02:39:48\",\"updated_at\":\"2021-09-02 02:45:52\"}', '{\"touristicPlaceId\":28,\"provinceId\":3,\"userId\":1,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba logos\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.378489925542\",\"longitude\":\"-66.190298679057\",\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-02 02:39:48\",\"updated_at\":\"2021-09-02 02:48:16\"}', NULL, '2021-09-02 06:48:16', '2021-09-02 06:48:16'),
(4, 1, 'Registro', 'Galería', '', '{\"galleryId\":16,\"touristicPlaceId\":28,\"galleryName\":\"Galeria loggg\",\"galleryPath\":\"images\\/places\\/28\\/galleries\\/16\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\",\"images\":[{\"imageId\":70,\"galleryId\":16,\"imagePath\":\"botanico5.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":71,\"galleryId\":16,\"imagePath\":\"botanico6.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":72,\"galleryId\":16,\"imagePath\":\"catedral.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":73,\"galleryId\":16,\"imagePath\":\"catedral2.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"}]}', NULL, '2021-09-02 06:52:13', '2021-09-02 06:52:13'),
(5, 1, 'Edición', 'Galería', '{\"galleryId\":16,\"touristicPlaceId\":28,\"galleryName\":\"Galeria loggg\",\"galleryPath\":\"images\\/places\\/28\\/galleries\\/16\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"}', '{\"galleryId\":16,\"touristicPlaceId\":28,\"galleryName\":\"Galeria loooo\",\"galleryPath\":\"images\\/places\\/28\\/galleries\\/16\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:57:34\",\"images\":[{\"imageId\":70,\"galleryId\":16,\"imagePath\":\"botanico5.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":71,\"galleryId\":16,\"imagePath\":\"botanico6.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":72,\"galleryId\":16,\"imagePath\":\"catedral.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":73,\"galleryId\":16,\"imagePath\":\"catedral2.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"}]}', NULL, '2021-09-02 06:57:34', '2021-09-02 06:57:34'),
(6, 1, 'Edición', 'Galería', '{\"galleryId\":16,\"touristicPlaceId\":28,\"galleryName\":\"Galeria looooa\",\"galleryPath\":\"images\\/places\\/28\\/galleries\\/16\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:58:25\"}', '{\"galleryId\":16,\"touristicPlaceId\":28,\"galleryName\":\"Galeria looooass\",\"galleryPath\":\"images\\/places\\/28\\/galleries\\/16\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:58:48\",\"images\":[{\"imageId\":70,\"galleryId\":16,\"imagePath\":\"botanico5.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":71,\"galleryId\":16,\"imagePath\":\"botanico6.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":72,\"galleryId\":16,\"imagePath\":\"catedral.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":73,\"galleryId\":16,\"imagePath\":\"catedral2.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"}]}', NULL, '2021-09-02 06:58:48', '2021-09-02 06:58:48'),
(7, 1, 'Edición', 'Galería- Imagenes', '{\"galleryId\":16,\"touristicPlaceId\":28,\"galleryName\":\"Galeria looooass\",\"galleryPath\":\"images\\/places\\/28\\/galleries\\/16\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:58:48\"}', '{\"galleryId\":16,\"touristicPlaceId\":28,\"galleryName\":\"Galeria looooass\",\"galleryPath\":\"images\\/places\\/28\\/galleries\\/16\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:58:48\",\"images\":[{\"imageId\":70,\"galleryId\":16,\"imagePath\":\"botanico5.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":71,\"galleryId\":16,\"imagePath\":\"botanico6.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":72,\"galleryId\":16,\"imagePath\":\"catedral.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":74,\"galleryId\":16,\"imagePath\":\"notFound.png161630565958.png\",\"created_at\":\"2021-09-02 02:59:18\",\"updated_at\":\"2021-09-02 02:59:18\"}]}', NULL, '2021-09-02 06:59:18', '2021-09-02 06:59:18'),
(8, 1, 'Edición', 'Galería- Imagenes', '{\"galleryId\":16,\"touristicPlaceId\":28,\"galleryName\":\"Galeria looooass\",\"galleryPath\":\"images\\/places\\/28\\/galleries\\/16\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:58:48\",\"images\":[{\"imageId\":70,\"galleryId\":16,\"imagePath\":\"botanico5.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":71,\"galleryId\":16,\"imagePath\":\"botanico6.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":72,\"galleryId\":16,\"imagePath\":\"catedral.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":74,\"galleryId\":16,\"imagePath\":\"notFound.png161630565958.png\",\"created_at\":\"2021-09-02 02:59:18\",\"updated_at\":\"2021-09-02 02:59:18\"}]}', '{\"galleryId\":16,\"touristicPlaceId\":28,\"galleryName\":\"Galeria looooass\",\"galleryPath\":\"images\\/places\\/28\\/galleries\\/16\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:58:48\",\"images\":[{\"imageId\":70,\"galleryId\":16,\"imagePath\":\"botanico5.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":71,\"galleryId\":16,\"imagePath\":\"botanico6.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":72,\"galleryId\":16,\"imagePath\":\"catedral.jpg161630565533.jpg\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:52:13\"},{\"imageId\":74,\"galleryId\":16,\"imagePath\":\"notFound.png161630565958.png\",\"created_at\":\"2021-09-02 02:59:18\",\"updated_at\":\"2021-09-02 02:59:18\"},{\"imageId\":75,\"galleryId\":16,\"imagePath\":\"name.png161630566007.png\",\"created_at\":\"2021-09-02 03:00:07\",\"updated_at\":\"2021-09-02 03:00:07\"}]}', NULL, '2021-09-02 07:00:07', '2021-09-02 07:00:07'),
(9, 1, 'Eliminar', 'Galería - Imagen', '{\"imageId\":75,\"galleryId\":16,\"imagePath\":\"name.png161630566007.png\",\"created_at\":\"2021-09-02 03:00:07\",\"updated_at\":\"2021-09-02 03:00:07\",\"gallery\":{\"galleryId\":16,\"touristicPlaceId\":28,\"galleryName\":\"Galeria looooass\",\"galleryPath\":\"images\\/places\\/28\\/galleries\\/16\",\"created_at\":\"2021-09-02 02:52:13\",\"updated_at\":\"2021-09-02 02:58:48\",\"touristic_place\":{\"touristicPlaceId\":28,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba logos\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.378489925542294,\"longitude\":-66.19029867905655,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-02 02:39:48\",\"updated_at\":\"2021-09-02 02:48:16\"}}}', '', NULL, '2021-09-02 07:08:42', '2021-09-02 07:08:42'),
(10, 1, 'Eliminar', 'Comentario', '{\"commentaryId\":10,\"userId\":4,\"touristicPlaceId\":28,\"commentaryDesc\":\"fgdsagfds dfsg dfsgsdfsdgf\",\"reports\":0,\"commentaryStatus\":\"Active\",\"created_at\":null,\"updated_at\":null,\"user\":{\"userId\":4,\"statusId\":2,\"typeId\":3,\"name\":\"Juan\",\"lastName\":\"Perez\",\"phoneNumber\":\"72224073\",\"email\":\"sergioss21er@gmail.comm\",\"email_verified_at\":null,\"password\":\"$2y$10$jD4zL\\/69D54I7SFKCPXxGuJTkRZOH\\/zuIzYbnFXVWvULESmFtWt9i\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":null,\"updated_at\":\"2021-03-23 05:15:05\"},\"touristic_place\":{\"touristicPlaceId\":28,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba logos\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.378489925542294,\"longitude\":-66.19029867905655,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-02 02:39:48\",\"updated_at\":\"2021-09-02 02:48:16\"}}', '', NULL, '2021-09-02 07:12:33', '2021-09-02 07:12:33'),
(11, 1, 'Registro', 'Producto', '', '{\"touristicPlaceId\":28,\"productName\":\"Cateringg\",\"productDescription\":\"aaaaaa\",\"productIcon\":\"temp\",\"updated_at\":\"2021-09-02 03:15:28\",\"created_at\":\"2021-09-02 03:15:28\",\"productId\":14,\"touristic_place\":{\"touristicPlaceId\":28,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba logos\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.378489925542294,\"longitude\":-66.19029867905655,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-02 02:39:48\",\"updated_at\":\"2021-09-02 02:48:16\"}}', NULL, '2021-09-02 07:15:28', '2021-09-02 07:15:28'),
(12, 1, 'Eliminar', 'Producto', '', '{\"productId\":13,\"touristicPlaceId\":28,\"productName\":\"Entretenimiento\",\"productDescription\":\"Servicio de comidas rapidas de todo precioasdfas\",\"productIcon\":\"13.png\",\"created_at\":\"2021-09-02 03:15:05\",\"updated_at\":\"2021-09-02 03:15:05\",\"touristic_place\":{\"touristicPlaceId\":28,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba logos\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.378489925542294,\"longitude\":-66.19029867905655,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-02 02:39:48\",\"updated_at\":\"2021-09-02 02:48:16\"}}', NULL, '2021-09-02 07:17:56', '2021-09-02 07:17:56'),
(13, 1, 'Edición', 'Producto', '{\"productId\":14,\"touristicPlaceId\":28,\"productName\":\"Cateringg\",\"productDescription\":\"aaaaaa\",\"productIcon\":\"14.png\",\"created_at\":\"2021-09-02 03:15:28\",\"updated_at\":\"2021-09-02 03:15:28\",\"touristic_place\":{\"touristicPlaceId\":28,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba logos\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.378489925542294,\"longitude\":-66.19029867905655,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-02 02:39:48\",\"updated_at\":\"2021-09-02 02:48:16\"}}', '{\"productId\":14,\"touristicPlaceId\":28,\"productName\":\"Real entretenimiento\",\"productDescription\":\"aaaaaa\",\"productIcon\":\"14.png\",\"created_at\":\"2021-09-02 03:15:28\",\"updated_at\":\"2021-09-02 03:21:02\",\"touristic_place\":{\"touristicPlaceId\":28,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba logos\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.378489925542294,\"longitude\":-66.19029867905655,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-02 02:39:48\",\"updated_at\":\"2021-09-02 02:48:16\"}}', NULL, '2021-09-02 07:21:02', '2021-09-02 07:21:02'),
(14, 1, 'Registro', 'Tag', '', '{\"tagName\":\"entreten\",\"tagFile\":\"entreten.png\",\"updated_at\":\"2021-09-02 03:23:48\",\"created_at\":\"2021-09-02 03:23:48\",\"tagId\":11}', NULL, '2021-09-02 07:23:48', '2021-09-02 07:23:48'),
(15, 1, 'Edición', 'Tag', '{\"tagId\":11,\"tagName\":\"entreten\",\"tagFile\":\"entreten.png\",\"created_at\":\"2021-09-02 03:23:48\",\"updated_at\":\"2021-09-02 03:23:48\"}', '{\"tagId\":11,\"tagName\":\"entretenimi\",\"tagFile\":\"entreten.png\",\"created_at\":\"2021-09-02 03:23:48\",\"updated_at\":\"2021-09-02 03:25:24\"}', NULL, '2021-09-02 07:25:24', '2021-09-02 07:25:24'),
(16, 1, 'Eliminar', 'Tag', '{\"tagId\":11,\"tagName\":\"entretenimi\",\"tagFile\":\"entreten.png\",\"created_at\":\"2021-09-02 03:23:48\",\"updated_at\":\"2021-09-02 03:25:24\"}', '', NULL, '2021-09-02 07:30:00', '2021-09-02 07:30:00'),
(17, 1, 'Registro', 'Provincia', '', '{\"provinceName\":\"ayopaya\",\"latitude\":\"-17.791718813883193\",\"longitude\":\"-65.94762945265882\",\"updated_at\":\"2021-09-02 03:32:16\",\"created_at\":\"2021-09-02 03:32:16\",\"provinceId\":5}', NULL, '2021-09-02 07:32:16', '2021-09-02 07:32:16'),
(18, 1, 'Edición', 'Provincia', '{\"provinceId\":5,\"provinceName\":\"ayopaya\",\"latitude\":-17.791718813883193,\"longitude\":-65.94762945265882,\"created_at\":\"2021-09-02 03:32:16\",\"updated_at\":\"2021-09-02 03:32:16\"}', '{\"provinceId\":5,\"provinceName\":\"ayopayasss\",\"latitude\":\"-17.807736334846194\",\"longitude\":\"-65.93217992873323\",\"created_at\":\"2021-09-02 03:32:16\",\"updated_at\":\"2021-09-02 03:34:42\"}', NULL, '2021-09-02 07:34:42', '2021-09-02 07:34:42'),
(19, 1, 'Eliminar', 'Provincia', '{\"provinceId\":5,\"provinceName\":\"ayopayasss\",\"latitude\":-17.807736334846194,\"longitude\":-65.93217992873323,\"created_at\":\"2021-09-02 03:32:16\",\"updated_at\":\"2021-09-02 03:34:42\"}', '', NULL, '2021-09-02 07:35:49', '2021-09-02 07:35:49'),
(20, 1, 'Registro', 'Provincia', '', '{\"provinceName\":\"ayopayasss\",\"latitude\":\"-17.405913277760774\",\"longitude\":\"-66.20249200123826\",\"updated_at\":\"2021-09-02 03:36:43\",\"created_at\":\"2021-09-02 03:36:43\",\"provinceId\":6}', NULL, '2021-09-02 07:36:43', '2021-09-02 07:36:43'),
(21, 1, 'Eliminar', 'Provincia', '{\"provinceId\":6,\"provinceName\":\"ayopayasss\",\"latitude\":-17.405913277760774,\"longitude\":-66.20249200123826,\"created_at\":\"2021-09-02 03:36:43\",\"updated_at\":\"2021-09-02 03:36:43\",\"touristic_place\":[]}', '', NULL, '2021-09-02 07:36:51', '2021-09-02 07:36:51'),
(22, 1, 'Registro', 'Categoría', '', '{\"categoryName\":\"prueba\",\"tagId\":\"1\",\"updated_at\":\"2021-09-02 03:38:31\",\"created_at\":\"2021-09-02 03:38:31\",\"categoryId\":24}', NULL, '2021-09-02 07:38:31', '2021-09-02 07:38:31'),
(23, 1, 'Registro', 'Categoría', '', '{\"categoryName\":\"aaaaaa\",\"tagId\":\"8\",\"updated_at\":\"2021-09-02 03:39:49\",\"created_at\":\"2021-09-02 03:39:49\",\"categoryId\":25,\"tag\":{\"tagId\":8,\"tagName\":\"bares\",\"tagFile\":\"bares.png\",\"created_at\":\"2021-03-23 05:30:31\",\"updated_at\":\"2021-03-23 05:30:31\"}}', NULL, '2021-09-02 07:39:49', '2021-09-02 07:39:49'),
(24, 1, 'Registro', 'Categoría', '{\"categoryId\":25,\"tagId\":3,\"categoryName\":\"aaaaaaz\",\"created_at\":\"2021-09-02 03:39:49\",\"updated_at\":\"2021-09-02 03:41:37\",\"tag\":{\"tagId\":3,\"tagName\":\"Parques\",\"tagFile\":\"Parques.jpg\",\"created_at\":null,\"updated_at\":null}}', '{\"categoryId\":25,\"tagId\":\"9\",\"categoryName\":\"aaaaaaz2\",\"created_at\":\"2021-09-02 03:39:49\",\"updated_at\":\"2021-09-02 03:42:07\",\"tag\":{\"tagId\":9,\"tagName\":\"Centro nocturno\",\"tagFile\":\"Centro nocturno.jpg\",\"created_at\":\"2021-03-23 05:32:53\",\"updated_at\":\"2021-03-23 05:32:53\"}}', NULL, '2021-09-02 07:42:07', '2021-09-02 07:42:07'),
(25, 1, 'Eliminar', 'Categoría', '{\"categoryId\":25,\"tagId\":9,\"categoryName\":\"aaaaaaz2\",\"created_at\":\"2021-09-02 03:39:49\",\"updated_at\":\"2021-09-02 03:42:07\",\"tag\":{\"tagId\":9,\"tagName\":\"Centro nocturno\",\"tagFile\":\"Centro nocturno.jpg\",\"created_at\":\"2021-03-23 05:32:53\",\"updated_at\":\"2021-03-23 05:32:53\"}}', '', NULL, '2021-09-02 07:45:37', '2021-09-02 07:45:37'),
(26, 1, 'Registro', 'Usuario', '', '{\"statusId\":\"2\",\"typeId\":\"2\",\"name\":\"Eliminar\",\"lastName\":\"Eliminado\",\"email\":\"aaaa@a.com\",\"password\":\"$2y$10$5zZhsbjnSEgFvoXH59tnCe.aATjyE8o1r2l2I6YSuNfHEybMyj1F2\",\"updated_at\":\"2021-09-02 03:47:56\",\"created_at\":\"2021-09-02 03:47:56\",\"userId\":16,\"user_type\":{\"increments\":2,\"nameType\":\"Usuario\",\"created_at\":null,\"updated_at\":null}}', NULL, '2021-09-02 07:47:56', '2021-09-02 07:47:56'),
(27, 1, 'Edición', 'Usuario', '{\"userId\":16,\"statusId\":2,\"typeId\":2,\"name\":\"Eliminar\",\"lastName\":\"Eliminado\",\"phoneNumber\":null,\"email\":\"aaaa@a.com\",\"email_verified_at\":null,\"password\":\"$2y$10$5zZhsbjnSEgFvoXH59tnCe.aATjyE8o1r2l2I6YSuNfHEybMyj1F2\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-09-02 03:47:56\",\"updated_at\":\"2021-09-02 03:47:56\",\"user_type\":{\"increments\":2,\"nameType\":\"Usuario\",\"created_at\":null,\"updated_at\":null}}', '{\"userId\":16,\"statusId\":\"3\",\"typeId\":\"2\",\"name\":\"Eliminar\",\"lastName\":\"Eliminado casi\",\"phoneNumber\":null,\"email\":\"aaaa@a.com\",\"email_verified_at\":null,\"password\":\"$2y$10$5zZhsbjnSEgFvoXH59tnCe.aATjyE8o1r2l2I6YSuNfHEybMyj1F2\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-09-02 03:47:56\",\"updated_at\":\"2021-09-02 03:50:46\",\"user_type\":{\"increments\":2,\"nameType\":\"Usuario\",\"created_at\":null,\"updated_at\":null}}', NULL, '2021-09-02 07:50:46', '2021-09-02 07:50:46'),
(28, 1, 'Eliminar', 'Usuario', '{\"userId\":16,\"statusId\":3,\"typeId\":2,\"name\":\"Eliminar\",\"lastName\":\"Eliminado casi\",\"phoneNumber\":null,\"email\":\"aaaa@a.com\",\"email_verified_at\":null,\"password\":\"$2y$10$5zZhsbjnSEgFvoXH59tnCe.aATjyE8o1r2l2I6YSuNfHEybMyj1F2\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-09-02 03:47:56\",\"updated_at\":\"2021-09-02 03:50:46\",\"user_type\":{\"increments\":2,\"nameType\":\"Usuario\",\"created_at\":null,\"updated_at\":null}}', '', NULL, '2021-09-02 07:52:53', '2021-09-02 07:52:53'),
(29, 1, 'Aprobacion', 'Usuario - Turismo', '', '{\"userId\":15,\"statusId\":2,\"typeId\":3,\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21er@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$K2fqpafJjAE0zrRvOAJkQ.YeJo9QDPvKfKDLMEHvpyZQuf8Bt.z0a\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-08-31 01:28:11\",\"updated_at\":\"2021-09-05 03:15:53\",\"touristic_place\":[{\"touristicPlaceId\":27,\"provinceId\":1,\"userId\":15,\"placeStatusId\":4,\"description\":null,\"history\":null,\"placeName\":\"Prueba111\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-08-31 01:28:11\",\"updated_at\":\"2021-08-31 01:28:11\"}]}', NULL, '2021-09-05 07:15:58', '2021-09-05 07:15:58'),
(30, 1, 'Edición', 'Usuario', '{\"userId\":15,\"statusId\":2,\"typeId\":3,\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21er@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$K2fqpafJjAE0zrRvOAJkQ.YeJo9QDPvKfKDLMEHvpyZQuf8Bt.z0a\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-08-31 01:28:11\",\"updated_at\":\"2021-09-05 03:15:53\",\"user_type\":{\"increments\":3,\"nameType\":\"Agente\",\"created_at\":null,\"updated_at\":null}}', '{\"userId\":15,\"statusId\":\"4\",\"typeId\":\"3\",\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21er@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$K2fqpafJjAE0zrRvOAJkQ.YeJo9QDPvKfKDLMEHvpyZQuf8Bt.z0a\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-08-31 01:28:11\",\"updated_at\":\"2021-09-05 03:19:25\",\"user_type\":{\"increments\":3,\"nameType\":\"Agente\",\"created_at\":null,\"updated_at\":null}}', NULL, '2021-09-05 07:19:25', '2021-09-05 07:19:25'),
(31, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":27,\"provinceId\":1,\"userId\":15,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba111\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-08-31 01:28:11\",\"updated_at\":\"2021-09-05 03:24:01\"}', '{\"touristicPlaceId\":27,\"provinceId\":1,\"userId\":15,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba1112\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":\"0\",\"longitude\":\"0\",\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-08-31 01:28:11\",\"updated_at\":\"2021-09-05 03:25:13\"}', '192.168.0.10', '2021-09-05 07:25:13', '2021-09-05 07:25:13'),
(32, 4, 'Edición', 'Usuario agente', '{\"userId\":4,\"statusId\":2,\"typeId\":3,\"name\":\"Juanes\",\"lastName\":\"Perez\",\"phoneNumber\":\"72224073\",\"email\":\"sergioss21er@gmail.comm\",\"email_verified_at\":null,\"password\":\"$2y$10$jD4zL\\/69D54I7SFKCPXxGuJTkRZOH\\/zuIzYbnFXVWvULESmFtWt9i\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":null,\"updated_at\":\"2021-09-05 03:31:07\"}', '{\"userId\":4,\"statusId\":2,\"typeId\":3,\"name\":\"Juaness\",\"lastName\":\"Perez\",\"phoneNumber\":\"72224073\",\"email\":\"sergioss21er@gmail.comm\",\"email_verified_at\":null,\"password\":\"$2y$10$jD4zL\\/69D54I7SFKCPXxGuJTkRZOH\\/zuIzYbnFXVWvULESmFtWt9i\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":null,\"updated_at\":\"2021-09-05 03:31:45\"}', '192.168.0.10', '2021-09-05 07:31:45', '2021-09-05 07:31:45'),
(33, 4, 'Edición', 'Usuario agente', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":\"\",\"placeName\":\"Parque de aguas danzantes\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.38822381191786,\"longitude\":-66.16552893009413,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-03-23 15:24:44\"}', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.388223811918\",\"longitude\":\"-66.165528930094\",\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-09-05 03:33:35\"}', '192.168.0.10', '2021-09-05 07:33:35', '2021-09-05 07:33:35'),
(34, 4, 'Edición', 'Agente - galería', '', '{\"galleryId\":17,\"touristicPlaceId\":8,\"galleryName\":\"Galer\\u00eda de log\",\"galleryPath\":\"images\\/places\\/8\\/galleries\\/17\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:37:31\",\"images\":[{\"imageId\":76,\"galleryId\":17,\"imagePath\":\"name.png171630827451.png\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:37:31\"}]}', '192.168.0.10', '2021-09-05 07:37:31', '2021-09-05 07:37:31'),
(35, 4, 'Edición', 'Agente - galería', '{\"galleryId\":17,\"touristicPlaceId\":8,\"galleryName\":\"Galer\\u00eda de log\",\"galleryPath\":\"images\\/places\\/8\\/galleries\\/17\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:37:31\",\"images\":[{\"imageId\":76,\"galleryId\":17,\"imagePath\":\"name.png171630827451.png\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:37:31\"}]}', '{\"galleryId\":17,\"touristicPlaceId\":8,\"galleryName\":\"Galer\\u00eda de logs\",\"galleryPath\":\"images\\/places\\/8\\/galleries\\/17\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:39:49\",\"images\":[{\"imageId\":76,\"galleryId\":17,\"imagePath\":\"name.png171630827451.png\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:37:31\"}]}', '192.168.0.10', '2021-09-05 07:39:49', '2021-09-05 07:39:49'),
(36, 4, 'Edición', 'Agente - galería', '{\"galleryId\":17,\"touristicPlaceId\":8,\"galleryName\":\"Galer\\u00eda de logs\",\"galleryPath\":\"images\\/places\\/8\\/galleries\\/17\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:39:49\",\"images\":[{\"imageId\":76,\"galleryId\":17,\"imagePath\":\"name.png171630827451.png\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:37:31\"},{\"imageId\":77,\"galleryId\":17,\"imagePath\":\"show.png171630827610.png\",\"created_at\":\"2021-09-05 03:40:10\",\"updated_at\":\"2021-09-05 03:40:10\"}]}', '{\"galleryId\":17,\"touristicPlaceId\":8,\"galleryName\":\"Galer\\u00eda de logs\",\"galleryPath\":\"images\\/places\\/8\\/galleries\\/17\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:39:49\",\"images\":[{\"imageId\":76,\"galleryId\":17,\"imagePath\":\"name.png171630827451.png\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:37:31\"},{\"imageId\":77,\"galleryId\":17,\"imagePath\":\"show.png171630827610.png\",\"created_at\":\"2021-09-05 03:40:10\",\"updated_at\":\"2021-09-05 03:40:10\"}]}', '192.168.0.10', '2021-09-05 07:40:10', '2021-09-05 07:40:10'),
(37, 4, 'Eliminar', 'Agente - galería - Imagen', '{\"imageId\":77,\"galleryId\":17,\"imagePath\":\"show.png171630827610.png\",\"created_at\":\"2021-09-05 03:40:10\",\"updated_at\":\"2021-09-05 03:40:10\",\"gallery\":{\"galleryId\":17,\"touristicPlaceId\":8,\"galleryName\":\"Galer\\u00eda de logs\",\"galleryPath\":\"images\\/places\\/8\\/galleries\\/17\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:39:49\"}}', '', '192.168.0.10', '2021-09-05 07:42:27', '2021-09-05 07:42:27'),
(38, 4, 'Eliminar', 'Agente - galería', '{\"galleryId\":17,\"touristicPlaceId\":8,\"galleryName\":\"Galer\\u00eda de logs\",\"galleryPath\":\"images\\/places\\/8\\/galleries\\/17\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:39:49\",\"images\":[{\"imageId\":76,\"galleryId\":17,\"imagePath\":\"name.png171630827451.png\",\"created_at\":\"2021-09-05 03:37:31\",\"updated_at\":\"2021-09-05 03:37:31\"}]}', '', '192.168.0.10', '2021-09-05 07:44:02', '2021-09-05 07:44:02'),
(39, 4, 'Eliminar', 'Agente - comentario', '{\"commentaryId\":8,\"userId\":2,\"touristicPlaceId\":10,\"commentaryDesc\":\"asfdbh askjdfbfsakb sadfhbasdf\",\"reports\":0,\"commentaryStatus\":\"Active\",\"created_at\":\"2021-03-01 00:00:00\",\"updated_at\":null}', '', '192.168.0.10', '2021-09-05 07:45:25', '2021-09-05 07:45:25'),
(40, 4, 'Edición', 'Agente - turismo', '{\"productId\":3,\"touristicPlaceId\":10,\"productName\":\"Salchipapas\",\"productDescription\":\"Porciones familiares, hasta agotar stock\",\"productIcon\":\"3.jpg\",\"created_at\":\"2021-08-24 22:44:52\",\"updated_at\":\"2021-08-25 01:48:30\"}', '{\"productId\":3,\"touristicPlaceId\":10,\"productName\":\"Salchipapass\",\"productDescription\":\"Porciones familiares, hasta agotar stock\",\"productIcon\":\"3.jpg\",\"created_at\":\"2021-08-24 22:44:52\",\"updated_at\":\"2021-09-05 03:47:03\"}', '192.168.0.10', '2021-09-05 07:47:03', '2021-09-05 07:47:03'),
(41, 4, 'Edición', 'Agente - producto', '', '{\"productId\":15,\"touristicPlaceId\":10,\"productName\":\"aaaaaa\",\"productDescription\":\"aaaa\",\"productIcon\":\"15.png\",\"created_at\":\"2021-09-05 03:48:52\",\"updated_at\":\"2021-09-05 03:48:52\"}', '192.168.0.10', '2021-09-05 07:48:52', '2021-09-05 07:48:52'),
(42, 4, 'Edición', 'Agente - producto', '', '{\"productId\":15,\"touristicPlaceId\":10,\"productName\":\"aaaaaa\",\"productDescription\":\"aaaa\",\"productIcon\":\"15.png\",\"created_at\":\"2021-09-05 03:48:52\",\"updated_at\":\"2021-09-05 03:48:52\"}', '192.168.0.10', '2021-09-05 07:49:42', '2021-09-05 07:49:42'),
(43, 1, 'Registro', 'Lugar Turistico', '', '{\"provinceId\":3,\"userId\":\"1\",\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"businessHours\":\"\",\"streets\":\"vcbcxvbvcx\",\"latitude\":\"-17.37914522624544\",\"longitude\":\"-66.20746481675187\",\"type\":\"place\",\"updated_at\":\"2021-09-05 22:29:04\",\"created_at\":\"2021-09-05 22:29:04\",\"touristicPlaceId\":32}', '192.168.0.2', '2021-09-06 02:29:04', '2021-09-06 02:29:04'),
(44, 1, 'Registro', 'Lugar Turistico', '', '{\"provinceId\":3,\"userId\":\"1\",\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"businessHours\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":\"-17.38733628708993\",\"longitude\":\"-66.0828386570839\",\"type\":\"event\",\"startDate\":\"2021-09-07\",\"endDate\":\"2021-09-23\",\"updated_at\":\"2021-09-05 22:30:07\",\"created_at\":\"2021-09-05 22:30:07\",\"touristicPlaceId\":33}', '192.168.0.2', '2021-09-06 02:30:07', '2021-09-06 02:30:07'),
(45, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":-17.38733628708993,\"longitude\":-66.0828386570839,\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-09-07\",\"endDate\":\"2021-09-23\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-05 22:30:07\"}', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":\"-17.38733628709\",\"longitude\":\"-66.082838657084\",\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-09-06\",\"endDate\":\"2021-09-23\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:17:48\"}', '192.168.0.15', '2021-09-08 05:17:48', '2021-09-08 05:17:48'),
(46, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":-17.38733628708993,\"longitude\":-66.0828386570839,\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-09-06\",\"endDate\":\"2021-09-23\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:17:48\"}', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":\"-17.38733628709\",\"longitude\":\"-66.082838657084\",\"businessHours\":\"\",\"type\":\"place\",\"startDate\":\"2021-09-06\",\"endDate\":\"2021-09-23\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:18:29\"}', '192.168.0.15', '2021-09-08 05:18:29', '2021-09-08 05:18:29'),
(47, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":-17.38733628708993,\"longitude\":-66.0828386570839,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":\"2021-09-06\",\"endDate\":\"2021-09-23\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:18:29\"}', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":\"-17.38733628709\",\"longitude\":\"-66.082838657084\",\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:19:03\"}', '192.168.0.15', '2021-09-08 05:19:03', '2021-09-08 05:19:03'),
(48, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":-17.38733628708993,\"longitude\":-66.0828386570839,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:19:03\"}', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":\"-17.38733628709\",\"longitude\":\"-66.082838657084\",\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-10-09\",\"endDate\":\"2021-09-08\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:19:22\"}', '192.168.0.15', '2021-09-08 05:19:22', '2021-09-08 05:19:22'),
(49, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":-17.38733628708993,\"longitude\":-66.0828386570839,\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-10-09\",\"endDate\":\"2021-09-08\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:19:22\"}', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":\"-17.38733628709\",\"longitude\":\"-66.082838657084\",\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-09-02\",\"endDate\":\"2021-09-08\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:23:00\"}', '192.168.0.15', '2021-09-08 05:23:00', '2021-09-08 05:23:00'),
(50, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":-17.38733628708993,\"longitude\":-66.0828386570839,\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-09-02\",\"endDate\":\"2021-09-08\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:23:00\"}', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":\"-17.38733628709\",\"longitude\":\"-66.082838657084\",\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-09-08\",\"endDate\":\"2021-09-08\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:23:07\"}', '192.168.0.15', '2021-09-08 05:23:07', '2021-09-08 05:23:07'),
(51, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":-17.38733628708993,\"longitude\":-66.0828386570839,\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-09-08\",\"endDate\":\"2021-09-08\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:23:07\"}', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":\"-17.38733628709\",\"longitude\":\"-66.082838657084\",\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-09-02\",\"endDate\":\"2021-09-08\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:23:23\"}', '192.168.0.15', '2021-09-08 05:23:23', '2021-09-08 05:23:23'),
(52, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":-17.38733628708993,\"longitude\":-66.0828386570839,\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-09-02\",\"endDate\":\"2021-09-08\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:23:23\"}', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":\"-17.38733628709\",\"longitude\":\"-66.082838657084\",\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-09-02\",\"endDate\":\"2021-09-08\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:24:59\"}', '192.168.0.15', '2021-09-08 05:24:59', '2021-09-08 05:24:59'),
(53, 4, 'Edición', 'Usuario agente', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":-17.38733628708993,\"longitude\":-66.0828386570839,\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-09-02\",\"endDate\":\"2021-09-08\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:24:59\"}', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":\"-17.38733628709\",\"longitude\":\"-66.082838657084\",\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:47:52\"}', '192.168.0.15', '2021-09-08 05:47:52', '2021-09-08 05:47:52'),
(54, 4, 'Edición', 'Usuario agente', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":-17.38733628708993,\"longitude\":-66.0828386570839,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:47:52\"}', '{\"touristicPlaceId\":33,\"provinceId\":3,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Prueba fechas0\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"cvbxasdafsd\",\"latitude\":\"-17.38733628709\",\"longitude\":\"-66.082838657084\",\"businessHours\":\"\",\"type\":\"event\",\"startDate\":\"2021-07-07\",\"endDate\":\"2021-09-30\",\"created_at\":\"2021-09-05 22:30:07\",\"updated_at\":\"2021-09-08 01:48:05\"}', '192.168.0.15', '2021-09-08 05:48:05', '2021-09-08 05:48:05'),
(55, 4, 'Edición', 'Usuario agente', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.38822381191786,\"longitude\":-66.16552893009413,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-09-05 03:33:35\"}', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.388223811918\",\"longitude\":\"-66.165528930094\",\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-09-05 03:33:35\"}', '192.168.0.15', '2021-09-08 05:48:18', '2021-09-08 05:48:18'),
(56, 4, 'Edición', 'Agente - producto', '', '{\"productId\":16,\"touristicPlaceId\":8,\"productName\":\"Entretenimiento\",\"productDescription\":\"Artistas callejeros y areas recreativas\",\"productIcon\":\"16.png\",\"created_at\":\"2021-09-08 01:48:32\",\"updated_at\":\"2021-09-08 01:48:32\"}', '192.168.0.15', '2021-09-08 05:48:32', '2021-09-08 05:48:32'),
(57, 4, 'Registro', 'Turismo - solicitud', '', '{\"provinceId\":1,\"userId\":4,\"placeStatusId\":4,\"placeName\":\"prueba request 1\",\"mainImage\":\"\",\"latitude\":0,\"longitude\":0,\"type\":\"place\",\"updated_at\":\"2021-09-09 10:28:18\",\"created_at\":\"2021-09-09 10:28:18\",\"touristicPlaceId\":36}', '192.168.0.15', '2021-09-09 14:28:18', '2021-09-09 14:28:18'),
(58, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":11,\"provinceId\":2,\"userId\":1,\"placeStatusId\":2,\"description\":null,\"history\":null,\"placeName\":\"El pueblito\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.375024656025975,\"longitude\":-66.1419345818037,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAAAAABVicqIAAAABGdBTUEAALGPC\\/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA\\/4ePzL8AAARdSURBVGje7Zk9bFtFHMB\\/dmwTR1WhAqKQgjo5ogheaJEQchckXDoyJIPJRq1KkZKpEixVEMJLREUGRKUsrpQitRmSBSRE0jJmQVASU9EqEZPTpE2Eqsfw0r4QH4N9z+\\/8Pm1qq7Jz0\\/\\/z\\/vfe3f\\/rDgJHSbiODIAmhCgFzhClDaNzjMQaVfgH4GgzRiY8uFcclI0hgPWUg+E3RfVLvnUVWLsSfrUXhl3Jk5268Y\\/uKoze0z5au7uu5NuPFfTkMYeRu2cUiewNHyNn3MmX5xV0JX3o8S30+Pw+cOSz1hpZKAIZy8j6CzB2q3WxqzJePtz4wHHnlTYYeQBQ+ASItDhpNWrg2U2\\/AAdms0Z6swrjhIK98wZgxdi5HEAWSKo66hS9TiOn\\/WL7VWBfDeRci9dLTXeLM64FiP1RrpUwEvgTiL7lpDd16kuvwnARyIwDowALwOwtQFuDzdee6hEegQ0AtBTMdmMUbouRSHCfdDwC9wUQHYTyFsBgFLbKQOQ4iPuBRsThnjSyJ5oFznxgo++9p8r9bl\\/Nta8BfnUEyPO\\/SWh0SnHGYi1LKApFn5X968Hcs+gfdUdJVD7wyrgHEKkT3gfidsSLV6f3RV5BMxLYSQCZmzKvZgAS1SgMwOKoIp\\/P25sg\\/yg8PlIF1NZ2bAw46yL\\/fTXn7\\/Z3wcZvONkbIaYo\\/xVopACQAzhnEQuW44ZZ59aQg3SkADBo4UIIodevrXpvtqqSM4GXaob7\\/VvnN0EHcx7F6pvvwi93PLRu+GVG6xB9lwcoR9jrA1jQ7LJDAIXzcDUnSdqa\\/XR9Pu\\/3JSmvD03VhSPXP57qou63FucuvS+hDyUwOwvMDSp7q27uWWBkHH74Jpy9JSFELTVnTdOsOKO84bb1cOtmdVSKAyHEgsUbkLwlAHTTNL1DfdxvQVVmOYRivF17IkL15WUXPBpOvgyxYcvfeoC4hSWBqCb7pFNFQFPd0oxXSTGgR7PXUbbM+LyMwsFDU6JwJRWYDqkswIAQYqdjnXEzVH9SGarsQ4\\/+ZPN\\/db8uo677nQEuqhIz4T62JDfezYgj\\/dYfdr1t6bcd7Vws8jRn+9FJumllxokL7kpve0y26vSAVWDapU4brRUS7m9FnncyfS4Zd7gr0q8F3b6sME5MB2hO\\/t2gqQkhxIpKylq1cEkIYRiGYVSKccMwDKsWtp0FIcRjS2rKMIylRu+7krW6K+kt9RwgXKSe0ctn4RNWhQvUoJEBgFyOyttvz4AjnH88L6XyeQk1aCS+jXxgBvjJS25b5vjFdAc7Y0NDvv1GXpLIi9F6Xg1qzsiQM\\/2uygD5oB+YAtsLcaxFf+hLWO78+y6v8fNBkMTDZQVddjdyUg3DvQp20aq7Cq\\/DvZyd178CbJ8DWJHbnZdYnZFj6XAflYZ7CiGRBhYBOJVUglZ7Pb6Ndddks\\/qq4qcKdv068FVfE7VwQQjxRNd1PeOVEHRd31Fr4aY8PpHw4x61h68O8\\/j\\/AFC32qioYxdyAAAAAElFTkSuQmCC\",\"created_at\":\"2021-03-18 05:38:53\",\"updated_at\":\"2021-09-19 06:41:15\"}', '{\"touristicPlaceId\":11,\"provinceId\":2,\"userId\":1,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"placeName\":\"El pueblisho\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.375024656026\",\"longitude\":\"-66.141934581804\",\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAAAAABVicqIAAAABGdBTUEAALGPC\\/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA\\/4ePzL8AAARdSURBVGje7Zk9bFtFHMB\\/dmwTR1WhAqKQgjo5ogheaJEQchckXDoyJIPJRq1KkZKpEixVEMJLREUGRKUsrpQitRmSBSRE0jJmQVASU9EqEZPTpE2Eqsfw0r4QH4N9z+\\/8Pm1qq7Jz0\\/\\/z\\/vfe3f\\/rDgJHSbiODIAmhCgFzhClDaNzjMQaVfgH4GgzRiY8uFcclI0hgPWUg+E3RfVLvnUVWLsSfrUXhl3Jk5268Y\\/uKoze0z5au7uu5NuPFfTkMYeRu2cUiewNHyNn3MmX5xV0JX3o8S30+Pw+cOSz1hpZKAIZy8j6CzB2q3WxqzJePtz4wHHnlTYYeQBQ+ASItDhpNWrg2U2\\/AAdms0Z6swrjhIK98wZgxdi5HEAWSKo66hS9TiOn\\/WL7VWBfDeRci9dLTXeLM64FiP1RrpUwEvgTiL7lpDd16kuvwnARyIwDowALwOwtQFuDzdee6hEegQ0AtBTMdmMUbouRSHCfdDwC9wUQHYTyFsBgFLbKQOQ4iPuBRsThnjSyJ5oFznxgo++9p8r9bl\\/Nta8BfnUEyPO\\/SWh0SnHGYi1LKApFn5X968Hcs+gfdUdJVD7wyrgHEKkT3gfidsSLV6f3RV5BMxLYSQCZmzKvZgAS1SgMwOKoIp\\/P25sg\\/yg8PlIF1NZ2bAw46yL\\/fTXn7\\/Z3wcZvONkbIaYo\\/xVopACQAzhnEQuW44ZZ59aQg3SkADBo4UIIodevrXpvtqqSM4GXaob7\\/VvnN0EHcx7F6pvvwi93PLRu+GVG6xB9lwcoR9jrA1jQ7LJDAIXzcDUnSdqa\\/XR9Pu\\/3JSmvD03VhSPXP57qou63FucuvS+hDyUwOwvMDSp7q27uWWBkHH74Jpy9JSFELTVnTdOsOKO84bb1cOtmdVSKAyHEgsUbkLwlAHTTNL1DfdxvQVVmOYRivF17IkL15WUXPBpOvgyxYcvfeoC4hSWBqCb7pFNFQFPd0oxXSTGgR7PXUbbM+LyMwsFDU6JwJRWYDqkswIAQYqdjnXEzVH9SGarsQ4\\/+ZPN\\/db8uo677nQEuqhIz4T62JDfezYgj\\/dYfdr1t6bcd7Vws8jRn+9FJumllxokL7kpve0y26vSAVWDapU4brRUS7m9FnncyfS4Zd7gr0q8F3b6sME5MB2hO\\/t2gqQkhxIpKylq1cEkIYRiGYVSKccMwDKsWtp0FIcRjS2rKMIylRu+7krW6K+kt9RwgXKSe0ctn4RNWhQvUoJEBgFyOyttvz4AjnH88L6XyeQk1aCS+jXxgBvjJS25b5vjFdAc7Y0NDvv1GXpLIi9F6Xg1qzsiQM\\/2uygD5oB+YAtsLcaxFf+hLWO78+y6v8fNBkMTDZQVddjdyUg3DvQp20aq7Cq\\/DvZyd178CbJ8DWJHbnZdYnZFj6XAflYZ7CiGRBhYBOJVUglZ7Pb6Ndddks\\/qq4qcKdv068FVfE7VwQQjxRNd1PeOVEHRd31Fr4aY8PpHw4x61h68O8\\/j\\/AFC32qioYxdyAAAAAElFTkSuQmCC\",\"created_at\":\"2021-03-18 05:38:53\",\"updated_at\":\"2021-09-19 06:45:38\"}', '192.168.0.15', '2021-09-19 10:45:38', '2021-09-19 10:45:38'),
(59, 1, 'Edición', 'Usuario', '{\"userId\":13,\"statusId\":2,\"typeId\":3,\"name\":\"aaaa\",\"lastName\":\"aaa\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21er@gmail.com1111\",\"email_verified_at\":null,\"password\":\"$2y$10$5wywiZKviPlNWOZGbIHOZODPK9OmWQepi.3aZrKqPwwg.l17Jua.O\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-08-29 21:47:57\",\"updated_at\":\"2021-08-31 01:18:23\",\"user_type\":{\"increments\":3,\"nameType\":\"Agente\",\"created_at\":null,\"updated_at\":null}}', '{\"userId\":13,\"statusId\":\"2\",\"typeId\":\"2\",\"name\":\"aaaa\",\"lastName\":\"aaa\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21er@gmail.com1111\",\"email_verified_at\":null,\"password\":\"$2y$10$5wywiZKviPlNWOZGbIHOZODPK9OmWQepi.3aZrKqPwwg.l17Jua.O\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-08-29 21:47:57\",\"updated_at\":\"2021-11-07 18:45:36\",\"user_type\":{\"increments\":2,\"nameType\":\"Usuario\",\"created_at\":null,\"updated_at\":null}}', '192.168.0.19', '2021-11-07 22:45:36', '2021-11-07 22:45:36'),
(60, 1, 'Edición', 'Usuario', '{\"userId\":13,\"statusId\":2,\"typeId\":2,\"name\":\"aaaa\",\"lastName\":\"aaa\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21er@gmail.com1111\",\"email_verified_at\":null,\"password\":\"$2y$10$5wywiZKviPlNWOZGbIHOZODPK9OmWQepi.3aZrKqPwwg.l17Jua.O\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-08-29 21:47:57\",\"updated_at\":\"2021-11-07 18:45:36\",\"user_type\":{\"increments\":2,\"nameType\":\"Usuario\",\"created_at\":null,\"updated_at\":null}}', '{\"userId\":13,\"statusId\":\"2\",\"typeId\":\"3\",\"name\":\"aaaa\",\"lastName\":\"aaa\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21er@gmail.com1111\",\"email_verified_at\":null,\"password\":\"$2y$10$5wywiZKviPlNWOZGbIHOZODPK9OmWQepi.3aZrKqPwwg.l17Jua.O\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-08-29 21:47:57\",\"updated_at\":\"2021-11-07 18:45:40\",\"user_type\":{\"increments\":3,\"nameType\":\"Agente\",\"created_at\":null,\"updated_at\":null}}', '192.168.0.19', '2021-11-07 22:45:40', '2021-11-07 22:45:40');
INSERT INTO `action` (`actionId`, `userId`, `actionName`, `table`, `oldData`, `newData`, `ip`, `created_at`, `updated_at`) VALUES
(61, 1, 'Edición', 'Usuario', 'null', '{\"userId\":13,\"statusId\":\"2\",\"typeId\":\"3\",\"name\":\"aaaa\",\"lastName\":\"aaa\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21er@gmail.com111\",\"email_verified_at\":null,\"password\":\"$2y$10$5wywiZKviPlNWOZGbIHOZODPK9OmWQepi.3aZrKqPwwg.l17Jua.O\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-08-29 21:47:57\",\"updated_at\":\"2021-11-07 18:47:24\",\"user_type\":{\"increments\":3,\"nameType\":\"Agente\",\"created_at\":null,\"updated_at\":null}}', '192.168.0.19', '2021-11-07 22:47:24', '2021-11-07 22:47:24'),
(62, 1, 'Edición', 'Usuario', 'null', '{\"userId\":13,\"statusId\":\"2\",\"typeId\":\"3\",\"name\":\"aaaa\",\"lastName\":\"aaa\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21er@gmail.com11\",\"email_verified_at\":null,\"password\":\"$2y$10$5wywiZKviPlNWOZGbIHOZODPK9OmWQepi.3aZrKqPwwg.l17Jua.O\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-08-29 21:47:57\",\"updated_at\":\"2021-11-07 18:47:28\",\"user_type\":{\"increments\":3,\"nameType\":\"Agente\",\"created_at\":null,\"updated_at\":null}}', '192.168.0.19', '2021-11-07 22:47:28', '2021-11-07 22:47:28'),
(63, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":\"\",\"contact\":\"\",\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.38822381191786,\"longitude\":-66.16552893009413,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-09-25 19:39:08\"}', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"web\":null,\"contact\":null,\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.388223811918\",\"longitude\":\"-66.165528930094\",\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:19:33\"}', '192.168.0.19', '2021-11-21 23:19:33', '2021-11-21 23:19:33'),
(64, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":null,\"contact\":null,\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.38822381191786,\"longitude\":-66.16552893009413,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:19:33\"}', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"web\":\"wwww.es.com\",\"contact\":null,\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.388223811918\",\"longitude\":\"-66.165528930094\",\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:19:45\"}', '192.168.0.19', '2021-11-21 23:19:45', '2021-11-21 23:19:45'),
(65, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":\"wwww.es.com\",\"contact\":null,\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.38822381191786,\"longitude\":-66.16552893009413,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:19:45\"}', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"web\":null,\"contact\":null,\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.388223811918\",\"longitude\":\"-66.165528930094\",\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:19:52\"}', '192.168.0.19', '2021-11-21 23:19:52', '2021-11-21 23:19:52'),
(66, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":null,\"contact\":null,\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.38822381191786,\"longitude\":-66.16552893009413,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:19:52\"}', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"web\":null,\"contact\":\"72224078\",\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.388223811918\",\"longitude\":\"-66.165528930094\",\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:19:59\"}', '192.168.0.19', '2021-11-21 23:19:59', '2021-11-21 23:19:59'),
(67, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":null,\"contact\":\"72224078\",\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.38822381191786,\"longitude\":-66.16552893009413,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:19:59\"}', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"web\":null,\"contact\":\"72224078\",\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.388223811918\",\"longitude\":\"-66.165528930094\",\"businessHours\":\"08: 00 AM - 23: 00 PM\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:20:25\"}', '192.168.0.19', '2021-11-21 23:20:25', '2021-11-21 23:20:25'),
(68, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":null,\"contact\":\"72224078\",\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.38822381191786,\"longitude\":-66.16552893009413,\"businessHours\":\"08: 00 AM - 23: 00 PM\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:20:25\"}', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"web\":null,\"contact\":\"72224078\",\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.388223811918\",\"longitude\":\"-66.165528930094\",\"businessHours\":\"08: 00 AM - 23: 00 PM\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:20:25\"}', '192.168.0.19', '2021-11-21 23:39:52', '2021-11-21 23:39:52'),
(69, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":null,\"contact\":\"72224078\",\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.38822381191786,\"longitude\":-66.16552893009413,\"businessHours\":\"08: 00 AM - 23: 00 PM\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:20:25\"}', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"web\":null,\"contact\":\"72224078\",\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.388223811918\",\"longitude\":\"-66.165528930094\",\"businessHours\":\"08: 00 AM - 23: 00 PM\",\"type\":\"event\",\"startDate\":\"2021-11-21\",\"endDate\":\"2021-11-21\",\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:39:58\"}', '192.168.0.19', '2021-11-21 23:39:58', '2021-11-21 23:39:58'),
(70, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":null,\"contact\":\"72224078\",\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.38822381191786,\"longitude\":-66.16552893009413,\"businessHours\":\"08: 00 AM - 23: 00 PM\",\"type\":\"event\",\"startDate\":\"2021-11-21\",\"endDate\":\"2021-11-21\",\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:39:58\"}', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"web\":null,\"contact\":\"72224078\",\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.388223811918\",\"longitude\":\"-66.165528930094\",\"businessHours\":\"08: 00 AM - 23: 00 PM\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:40:03\"}', '192.168.0.19', '2021-11-21 23:40:03', '2021-11-21 23:40:03'),
(71, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":null,\"contact\":\"72224078\",\"placeName\":\"Parque de aguaz danzantez\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":-17.38822381191786,\"longitude\":-66.16552893009413,\"businessHours\":\"08: 00 AM - 23: 00 PM\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-11-21 19:40:03\"}', '{\"touristicPlaceId\":8,\"provinceId\":2,\"userId\":4,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"web\":null,\"contact\":\"72224078\",\"placeName\":\"Parque de aguaz danzantes\",\"mainImage\":\"mainImage.jpg\",\"mainVideo\":\"\",\"streets\":null,\"latitude\":\"-17.388223811918\",\"longitude\":\"-66.165528930094\",\"businessHours\":\"08: 00 AM - 23: 00 PM\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":\"data:image\\/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC\\/\\/9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU\\/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij\\/AOlMwkIFgw9cgAAAABJRU5ErkJggg==\",\"created_at\":\"2021-03-18 05:11:57\",\"updated_at\":\"2021-12-19 03:18:13\"}', '::1', '2021-12-19 07:18:13', '2021-12-19 07:18:13'),
(72, 1, 'Eliminar', 'Tag', 'null', '', '::1', '2021-12-19 23:52:34', '2021-12-19 23:52:34'),
(73, 1, 'Eliminar', 'Tag', 'null', '', '::1', '2021-12-19 23:53:34', '2021-12-19 23:53:34'),
(74, 1, 'Edición', 'Usuario', '{\"userId\":17,\"statusId\":4,\"typeId\":3,\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":\"72224078\",\"email\":\"test@gmail.com\",\"email_verified_at\":null,\"password\":\"\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-09-05 03:54:02\",\"updated_at\":\"2021-09-05 03:54:02\",\"user_type\":{\"increments\":3,\"nameType\":\"Agente\",\"created_at\":null,\"updated_at\":null}}', '{\"userId\":17,\"statusId\":\"4\",\"typeId\":\"3\",\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":\"72224078\",\"email\":\"test@gmail.com\",\"email_verified_at\":null,\"password\":\"\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-09-05 03:54:02\",\"updated_at\":\"2021-09-05 03:54:02\",\"user_type\":{\"increments\":3,\"nameType\":\"Agente\",\"created_at\":null,\"updated_at\":null}}', '::1', '2021-12-20 00:00:02', '2021-12-20 00:00:02'),
(75, 5, 'Edición', 'Usuario agente', '{\"userId\":5,\"statusId\":2,\"typeId\":3,\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":null,\"email\":\"sergioss21errr@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$jD4zL\\/69D54I7SFKCPXxGuJTkRZOH\\/zuIzYbnFXVWvULESmFtWt9i\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-03-23 15:24:10\",\"updated_at\":\"2021-08-31 00:19:06\"}', '{\"userId\":5,\"statusId\":2,\"typeId\":3,\"name\":\"Usuario de\",\"lastName\":\"prueba 5\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21errr@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$jD4zL\\/69D54I7SFKCPXxGuJTkRZOH\\/zuIzYbnFXVWvULESmFtWt9i\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-03-23 15:24:10\",\"updated_at\":\"2021-12-19 22:23:17\"}', '::1', '2021-12-20 02:23:18', '2021-12-20 02:23:18'),
(76, 5, 'Edición', 'Usuario agente', '{\"userId\":5,\"statusId\":2,\"typeId\":3,\"name\":\"Usuario de\",\"lastName\":\"prueba 5\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21errr@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$jD4zL\\/69D54I7SFKCPXxGuJTkRZOH\\/zuIzYbnFXVWvULESmFtWt9i\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-03-23 15:24:10\",\"updated_at\":\"2021-12-19 22:23:17\"}', '{\"userId\":5,\"statusId\":2,\"typeId\":3,\"name\":\"Usuario\",\"lastName\":\"de prueba 5\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21errr@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$jD4zL\\/69D54I7SFKCPXxGuJTkRZOH\\/zuIzYbnFXVWvULESmFtWt9i\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-03-23 15:24:10\",\"updated_at\":\"2021-12-19 22:23:31\"}', '::1', '2021-12-20 02:23:31', '2021-12-20 02:23:31'),
(77, 5, 'Registro', 'Turismo - solicitud', '', '{\"provinceId\":1,\"userId\":5,\"placeStatusId\":4,\"placeName\":\"Restaurante 404\",\"mainImage\":\"\",\"latitude\":0,\"longitude\":0,\"type\":\"place\",\"updated_at\":\"2021-12-19 22:24:04\",\"created_at\":\"2021-12-19 22:24:04\",\"touristicPlaceId\":37}', '::1', '2021-12-20 02:24:04', '2021-12-20 02:24:04'),
(78, 5, 'Registro', 'Agente - galería', '', '{\"galleryId\":18,\"touristicPlaceId\":14,\"galleryName\":\"Comidas rapidas\",\"galleryPath\":\"images\\/places\\/14\\/galleries\\/18\",\"created_at\":\"2021-12-19 22:39:25\",\"updated_at\":\"2021-12-19 22:39:25\",\"images\":[{\"imageId\":78,\"galleryId\":18,\"imagePath\":\"locationMarker.jpg181639967965.jpg\",\"created_at\":\"2021-12-19 22:39:25\",\"updated_at\":\"2021-12-19 22:39:25\"}]}', '::1', '2021-12-20 02:39:26', '2021-12-20 02:39:26'),
(79, 5, 'Edición', 'Agente - producto', '', '{\"productId\":17,\"touristicPlaceId\":14,\"productName\":\"Pollo al espiedo\",\"productDescription\":\"Receta original de panchila, combo a bs...\",\"productIcon\":\"17.jpg\",\"created_at\":\"2021-12-19 22:45:13\",\"updated_at\":\"2021-12-19 22:45:13\"}', '::1', '2021-12-20 02:45:13', '2021-12-20 02:45:13'),
(80, 5, 'Eliminar', 'Agente - producto', '', '{\"productId\":16,\"touristicPlaceId\":8,\"productName\":\"Entretenimiento\",\"productDescription\":\"Artistas callejeros y areas recreativas\",\"productIcon\":\"16.png\",\"created_at\":\"2021-09-08 01:48:32\",\"updated_at\":\"2021-09-08 01:48:32\"}', '::1', '2021-12-20 02:49:09', '2021-12-20 02:49:09'),
(81, 5, 'Eliminar', 'Agente - producto', '', '{\"productId\":17,\"touristicPlaceId\":14,\"productName\":\"Pollo al espiedo\",\"productDescription\":\"Receta original de panchila, combo a bs...\",\"productIcon\":\"17.jpg\",\"created_at\":\"2021-12-19 22:45:13\",\"updated_at\":\"2021-12-19 22:45:13\"}', '::1', '2021-12-20 02:49:17', '2021-12-20 02:49:17'),
(82, 5, 'Edición', 'Agente - producto', '', '{\"productId\":18,\"touristicPlaceId\":14,\"productName\":\"Real entretenimiento\",\"productDescription\":\"aaaaaa\",\"productIcon\":\"18.png\",\"created_at\":\"2021-12-19 22:58:43\",\"updated_at\":\"2021-12-19 22:58:43\"}', '::1', '2021-12-20 02:58:43', '2021-12-20 02:58:43'),
(83, 5, 'Eliminar', 'Agente - producto', '', '{\"productId\":18,\"touristicPlaceId\":14,\"productName\":\"Real entretenimiento\",\"productDescription\":\"aaaaaa\",\"productIcon\":\"18.png\",\"created_at\":\"2021-12-19 22:58:43\",\"updated_at\":\"2021-12-19 22:58:43\",\"touristic_place\":{\"touristicPlaceId\":14,\"provinceId\":2,\"userId\":5,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":\"\",\"contact\":\"\",\"placeName\":\"Panchita\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"Avenia amertiva y villarroel\",\"latitude\":-17.37250058695166,\"longitude\":-66.15968436362516,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2021-04-26 03:02:14\",\"updated_at\":\"2021-04-26 03:04:38\"}}', '::1', '2021-12-20 03:01:24', '2021-12-20 03:01:24'),
(84, 5, 'Edición', 'Usuario agente', '{\"userId\":5,\"statusId\":2,\"typeId\":3,\"name\":\"Usuario\",\"lastName\":\"de prueba 5\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21errr@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$jD4zL\\/69D54I7SFKCPXxGuJTkRZOH\\/zuIzYbnFXVWvULESmFtWt9i\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-03-23 15:24:10\",\"updated_at\":\"2021-12-19 22:23:31\"}', '{\"userId\":5,\"statusId\":2,\"typeId\":3,\"name\":\"Usuario\",\"lastName\":\"de prueba 5\",\"phoneNumber\":\"72224078\",\"email\":\"sergioss21errr@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$jD4zL\\/69D54I7SFKCPXxGuJTkRZOH\\/zuIzYbnFXVWvULESmFtWt9i\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-03-23 15:24:10\",\"updated_at\":\"2021-12-19 22:23:31\"}', '::1', '2021-12-20 03:06:13', '2021-12-20 03:06:13'),
(85, 5, 'Edición', 'Usuario agente', '{\"touristicPlaceId\":14,\"provinceId\":2,\"userId\":5,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":\"\",\"contact\":\"\",\"placeName\":\"Panchita\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"Avenia amertiva y villarroel\",\"latitude\":-17.37250058695166,\"longitude\":-66.15968436362516,\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2021-04-26 03:02:14\",\"updated_at\":\"2021-04-26 03:04:38\"}', '{\"touristicPlaceId\":14,\"provinceId\":2,\"userId\":5,\"placeStatusId\":\"2\",\"description\":null,\"history\":null,\"web\":\"\",\"contact\":\"\",\"placeName\":\"Panchita\",\"mainImage\":\"mainImage.png\",\"mainVideo\":\"\",\"streets\":\"Avenia amertiva y villarroel\",\"latitude\":\"-17.372500586952\",\"longitude\":\"-66.159684363625\",\"businessHours\":\"\",\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2021-04-26 03:02:14\",\"updated_at\":\"2021-04-26 03:04:38\"}', '::1', '2021-12-20 03:06:23', '2021-12-20 03:06:23'),
(86, 1, 'Eliminar', 'Tag', '{\"tagId\":3,\"tagName\":\"Parques\",\"tagFile\":\"Parques.jpg\",\"created_at\":null,\"updated_at\":null}', '', '::1', '2022-01-15 20:48:33', '2022-01-15 20:48:33'),
(87, 1, 'Edición', 'Tag', '{\"tagId\":5,\"tagName\":\"Restaurantes\",\"created_at\":null,\"updated_at\":null}', '{\"tagId\":5,\"tagName\":\"Restaurantesos\",\"created_at\":null,\"updated_at\":\"2022-01-15 17:03:12\"}', '::1', '2022-01-15 21:03:12', '2022-01-15 21:03:12'),
(88, 1, 'Edición', 'Tag', '{\"tagId\":6,\"tagName\":\"religion\",\"created_at\":\"2021-03-23 04:21:36\",\"updated_at\":\"2021-03-23 04:21:48\"}', '{\"tagId\":6,\"tagName\":\"religiones\",\"created_at\":\"2021-03-23 04:21:36\",\"updated_at\":\"2022-01-15 17:03:43\"}', '::1', '2022-01-15 21:03:43', '2022-01-15 21:03:43'),
(89, 1, 'Edición', 'Tag', '{\"tagId\":7,\"tagName\":\"Alojamientos\",\"created_at\":\"2021-03-23 04:29:10\",\"updated_at\":\"2021-03-23 04:29:10\"}', '{\"tagId\":7,\"tagName\":\"Alojamientosaaaaaa\",\"created_at\":\"2021-03-23 04:29:10\",\"updated_at\":\"2022-01-15 17:03:59\"}', '::1', '2022-01-15 21:03:59', '2022-01-15 21:03:59'),
(90, 1, 'Eliminar', 'Tag', '{\"tagId\":7,\"tagName\":\"Alojamientosaaaaaa\",\"created_at\":\"2021-03-23 04:29:10\",\"updated_at\":\"2022-01-15 17:03:59\"}', '', '::1', '2022-01-15 21:04:04', '2022-01-15 21:04:04'),
(91, 1, 'Registro', 'Tag', '', '{\"tagName\":\"No imagen\",\"updated_at\":\"2022-01-15 17:06:10\",\"created_at\":\"2022-01-15 17:06:10\",\"tagId\":12}', '::1', '2022-01-15 21:06:10', '2022-01-15 21:06:10'),
(92, 1, 'Edición', 'Tag', '{\"tagId\":12,\"tagName\":\"No imagen\",\"created_at\":\"2022-01-15 17:06:10\",\"updated_at\":\"2022-01-15 17:06:10\"}', '{\"tagId\":12,\"tagName\":\"No imagenes\",\"created_at\":\"2022-01-15 17:06:10\",\"updated_at\":\"2022-01-15 17:06:18\"}', '::1', '2022-01-15 21:06:18', '2022-01-15 21:06:18'),
(93, 1, 'Aprobacion', 'Usuario - Turismo', '', '{\"userId\":17,\"statusId\":2,\"typeId\":3,\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":\"72224078\",\"email\":\"test@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$Luce0qY9Lmx9GEKp7lOwWuJTyVOR65fdFI9fMrD5euElFomtSp\\/8u\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-09-05 03:54:02\",\"updated_at\":\"2022-01-15 17:19:14\",\"touristic_place\":[{\"touristicPlaceId\":30,\"provinceId\":1,\"userId\":17,\"placeStatusId\":4,\"description\":null,\"history\":null,\"web\":\"\",\"contact\":\"\",\"placeName\":\"Prueb333\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2021-09-05 03:54:02\",\"updated_at\":\"2021-09-05 03:54:02\"},{\"touristicPlaceId\":31,\"provinceId\":1,\"userId\":17,\"placeStatusId\":4,\"description\":null,\"history\":null,\"web\":\"\",\"contact\":\"\",\"placeName\":\"Prueba444\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2021-09-05 03:54:36\",\"updated_at\":\"2021-09-05 03:54:36\"}]}', '::1', '2022-01-15 21:19:18', '2022-01-15 21:19:18'),
(94, 1, 'Edición', 'Usuario', '{\"userId\":17,\"statusId\":2,\"typeId\":3,\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":\"72224078\",\"email\":\"test@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$Luce0qY9Lmx9GEKp7lOwWuJTyVOR65fdFI9fMrD5euElFomtSp\\/8u\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-09-05 03:54:02\",\"updated_at\":\"2022-01-15 17:19:14\",\"user_type\":{\"increments\":3,\"nameType\":\"Agente\",\"created_at\":null,\"updated_at\":null}}', '{\"userId\":17,\"statusId\":\"4\",\"typeId\":\"3\",\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":\"72224078\",\"email\":\"test@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$Luce0qY9Lmx9GEKp7lOwWuJTyVOR65fdFI9fMrD5euElFomtSp\\/8u\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-09-05 03:54:02\",\"updated_at\":\"2022-01-15 17:25:44\",\"user_type\":{\"increments\":3,\"nameType\":\"Agente\",\"created_at\":null,\"updated_at\":null}}', '::1', '2022-01-15 21:25:44', '2022-01-15 21:25:44'),
(95, 1, 'Edición', 'Lugar Turistico', '{\"touristicPlaceId\":30,\"provinceId\":1,\"userId\":17,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":\"\",\"contact\":\"\",\"placeName\":\"Prueb333\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2021-09-05 03:54:02\",\"updated_at\":\"2022-01-15 17:19:14\"}', '{\"touristicPlaceId\":30,\"provinceId\":1,\"userId\":17,\"placeStatusId\":\"1\",\"description\":null,\"history\":null,\"web\":null,\"contact\":null,\"placeName\":\"Prueb333\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":\"0\",\"longitude\":\"0\",\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2021-09-05 03:54:02\",\"updated_at\":\"2022-01-15 17:26:16\"}', '::1', '2022-01-15 21:26:16', '2022-01-15 21:26:16'),
(96, 1, 'Aprobacion', 'Usuario - Turismo', '{\"userId\":17,\"statusId\":4,\"typeId\":3,\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":\"72224078\",\"email\":\"test@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$Luce0qY9Lmx9GEKp7lOwWuJTyVOR65fdFI9fMrD5euElFomtSp\\/8u\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-09-05 03:54:02\",\"updated_at\":\"2022-01-15 17:25:44\",\"touristic_place\":[{\"touristicPlaceId\":30,\"provinceId\":1,\"userId\":17,\"placeStatusId\":1,\"description\":null,\"history\":null,\"web\":null,\"contact\":null,\"placeName\":\"Prueb333\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2021-09-05 03:54:02\",\"updated_at\":\"2022-01-15 17:26:16\"},{\"touristicPlaceId\":31,\"provinceId\":1,\"userId\":17,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":\"\",\"contact\":\"\",\"placeName\":\"Prueba444\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2021-09-05 03:54:36\",\"updated_at\":\"2022-01-15 17:19:14\"}]}', '', '::1', '2022-01-15 21:26:53', '2022-01-15 21:26:53'),
(97, 1, 'Aprobacion', 'Usuario - Turismo', '{\"userId\":17,\"statusId\":4,\"typeId\":3,\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":\"72224078\",\"email\":\"test@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$Luce0qY9Lmx9GEKp7lOwWuJTyVOR65fdFI9fMrD5euElFomtSp\\/8u\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2021-09-05 03:54:02\",\"updated_at\":\"2022-01-15 17:25:44\",\"touristic_place\":[{\"touristicPlaceId\":30,\"provinceId\":1,\"userId\":17,\"placeStatusId\":1,\"description\":null,\"history\":null,\"web\":null,\"contact\":null,\"placeName\":\"Prueb333\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2021-09-05 03:54:02\",\"updated_at\":\"2022-01-15 17:26:16\"},{\"touristicPlaceId\":31,\"provinceId\":1,\"userId\":17,\"placeStatusId\":2,\"description\":null,\"history\":null,\"web\":\"\",\"contact\":\"\",\"placeName\":\"Prueba444\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2021-09-05 03:54:36\",\"updated_at\":\"2022-01-15 17:19:14\"}]}', '', '::1', '2022-01-15 21:26:56', '2022-01-15 21:26:56'),
(98, 1, 'Aprobacion', 'Usuario - Turismo', '{\"userId\":18,\"statusId\":4,\"typeId\":3,\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":\"72224078\",\"email\":\"test@gmail.com\",\"email_verified_at\":null,\"password\":\"\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2022-01-15 17:28:08\",\"updated_at\":\"2022-01-15 17:28:08\",\"touristic_place\":[{\"touristicPlaceId\":38,\"provinceId\":1,\"userId\":18,\"placeStatusId\":4,\"description\":null,\"history\":null,\"web\":null,\"contact\":null,\"placeName\":\"prueba2\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2022-01-15 17:28:08\",\"updated_at\":\"2022-01-15 17:28:08\"},{\"touristicPlaceId\":39,\"provinceId\":1,\"userId\":18,\"placeStatusId\":4,\"description\":null,\"history\":null,\"web\":null,\"contact\":null,\"placeName\":\"pruebaaaaaaa\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2022-01-15 17:28:21\",\"updated_at\":\"2022-01-15 17:28:21\"}]}', '', '::1', '2022-01-15 21:29:08', '2022-01-15 21:29:08'),
(99, 1, 'Aprobacion', 'Usuario - Turismo', '{\"userId\":18,\"statusId\":4,\"typeId\":3,\"name\":\"\",\"lastName\":\"\",\"phoneNumber\":\"72224078\",\"email\":\"test@gmail.com\",\"email_verified_at\":null,\"password\":\"\",\"verificationCode\":null,\"remember_token\":null,\"created_at\":\"2022-01-15 17:28:08\",\"updated_at\":\"2022-01-15 17:28:08\",\"touristic_place\":[{\"touristicPlaceId\":38,\"provinceId\":1,\"userId\":18,\"placeStatusId\":4,\"description\":null,\"history\":null,\"web\":null,\"contact\":null,\"placeName\":\"prueba2\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2022-01-15 17:28:08\",\"updated_at\":\"2022-01-15 17:28:08\"},{\"touristicPlaceId\":39,\"provinceId\":1,\"userId\":18,\"placeStatusId\":4,\"description\":null,\"history\":null,\"web\":null,\"contact\":null,\"placeName\":\"pruebaaaaaaa\",\"mainImage\":\"\",\"mainVideo\":null,\"streets\":null,\"latitude\":0,\"longitude\":0,\"businessHours\":null,\"type\":\"place\",\"startDate\":null,\"endDate\":null,\"qrCode\":null,\"created_at\":\"2022-01-15 17:28:21\",\"updated_at\":\"2022-01-15 17:28:21\"}]}', '', '::1', '2022-01-15 21:29:11', '2022-01-15 21:29:11'),
(100, 4, 'Registro', 'Turismo - solicitud', '', '{\"provinceId\":1,\"userId\":4,\"placeStatusId\":4,\"placeName\":\"Ploggg\",\"mainImage\":\"\",\"latitude\":0,\"longitude\":0,\"type\":\"place\",\"updated_at\":\"2022-01-15 22:19:51\",\"created_at\":\"2022-01-15 22:19:51\",\"touristicPlaceId\":40}', '::1', '2022-01-16 02:19:51', '2022-01-16 02:19:51');
INSERT INTO `action` (`actionId`, `userId`, `actionName`, `table`, `oldData`, `newData`, `ip`, `created_at`, `updated_at`) VALUES
(101, 4, 'Edición', 'Agente - galería', '{\"galleryId\":12,\"touristicPlaceId\":10,\"galleryName\":\"Imagenes plaza 14 de septiembre\",\"galleryPath\":\"images\\/places\\/10\\/galleries\\/12\",\"created_at\":\"2021-03-18 05:34:36\",\"updated_at\":\"2021-03-18 05:34:36\",\"images\":[{\"imageId\":51,\"galleryId\":12,\"imagePath\":\"plaza_principal2.jpg121616060076.jpg\",\"created_at\":\"2021-03-18 05:34:36\",\"updated_at\":\"2021-03-18 05:34:36\"},{\"imageId\":52,\"galleryId\":12,\"imagePath\":\"plaza_principal.jpg121616060076.jpg\",\"created_at\":\"2021-03-18 05:34:36\",\"updated_at\":\"2021-03-18 05:34:36\"},{\"imageId\":53,\"galleryId\":12,\"imagePath\":\"plaza_principaljpg.jpg121616060076.jpg\",\"created_at\":\"2021-03-18 05:34:36\",\"updated_at\":\"2021-03-18 05:34:36\"},{\"imageId\":54,\"galleryId\":12,\"imagePath\":\"plaza_principal1.jpg121616060076.jpg\",\"created_at\":\"2021-03-18 05:34:36\",\"updated_at\":\"2021-03-18 05:34:36\"}]}', '{\"galleryId\":12,\"touristicPlaceId\":10,\"galleryName\":\"Imagenes plaza 14 de septiembre\",\"galleryPath\":\"images\\/places\\/10\\/galleries\\/12\",\"created_at\":\"2021-03-18 05:34:36\",\"updated_at\":\"2021-03-18 05:34:36\",\"images\":[{\"imageId\":51,\"galleryId\":12,\"imagePath\":\"plaza_principal2.jpg121616060076.jpg\",\"created_at\":\"2021-03-18 05:34:36\",\"updated_at\":\"2021-03-18 05:34:36\"},{\"imageId\":52,\"galleryId\":12,\"imagePath\":\"plaza_principal.jpg121616060076.jpg\",\"created_at\":\"2021-03-18 05:34:36\",\"updated_at\":\"2021-03-18 05:34:36\"},{\"imageId\":53,\"galleryId\":12,\"imagePath\":\"plaza_principaljpg.jpg121616060076.jpg\",\"created_at\":\"2021-03-18 05:34:36\",\"updated_at\":\"2021-03-18 05:34:36\"},{\"imageId\":54,\"galleryId\":12,\"imagePath\":\"plaza_principal1.jpg121616060076.jpg\",\"created_at\":\"2021-03-18 05:34:36\",\"updated_at\":\"2021-03-18 05:34:36\"}]}', '::1', '2022-01-16 02:21:55', '2022-01-16 02:21:55'),
(102, 1, 'Edición', 'Categoría', '{\"categoryId\":6,\"tagId\":2,\"categoryName\":\"2 estrellass\",\"created_at\":null,\"updated_at\":\"2021-03-11 04:10:20\",\"tag\":{\"tagId\":2,\"tagName\":\"Hoteles\",\"created_at\":null,\"updated_at\":null}}', '{\"categoryId\":6,\"tagId\":\"5\",\"categoryName\":\"2 estrellass\",\"created_at\":null,\"updated_at\":\"2022-01-15 22:56:55\",\"tag\":{\"tagId\":5,\"tagName\":\"Restaurantesos\",\"created_at\":null,\"updated_at\":\"2022-01-15 17:03:12\"}}', '::1', '2022-01-16 02:56:55', '2022-01-16 02:56:55');

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
(6, 5, '2 estrellass', NULL, '2022-01-16 02:56:55'),
(7, 2, '5 estrellas', NULL, NULL),
(9, 5, 'Trancapechos', '2021-03-11 08:07:54', '2021-03-23 08:25:26'),
(10, 6, 'Iglesias', '2021-03-23 08:22:06', '2021-03-23 08:22:06'),
(11, 6, 'Catedrales', '2021-03-23 08:22:17', '2021-03-23 08:22:17'),
(12, 4, 'Monumentos', '2021-03-23 08:26:22', '2021-03-23 08:26:22'),
(17, 8, 'pub', '2021-03-23 09:30:58', '2021-03-23 09:30:58'),
(18, 8, 'Bar tradicional', '2021-03-23 09:31:14', '2021-03-23 09:31:14'),
(19, 8, 'Bar terraza', '2021-03-23 09:32:08', '2021-03-23 09:32:08'),
(20, 9, 'Discotecas', '2021-03-23 09:33:09', '2021-03-23 09:33:09'),
(21, 9, 'Salon de baile', '2021-03-23 09:33:31', '2021-03-23 09:33:31'),
(22, 9, 'karaoke', '2021-03-23 09:34:10', '2021-03-23 09:34:10'),
(23, 5, 'Pollo frito', '2021-04-26 07:06:34', '2021-04-26 07:06:34'),
(24, 1, 'prueba', '2021-09-02 07:38:31', '2021-09-02 07:38:31');

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
(9, 5, 10, 'Lorem ipsum', 0, 'Active', '2021-04-01 04:00:00', NULL),
(11, 1, 28, 'tyyttyrtry sdfdsfdsfdsf', 0, 'Active', NULL, NULL);

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(15, 13, 'Galeria catedral', 'images/places/13/galleries/15', '2021-03-18 09:48:52', '2021-03-18 09:48:52'),
(16, 28, 'Galeria looooass', 'images/places/28/galleries/16', '2021-09-02 06:52:13', '2021-09-02 06:58:48'),
(18, 14, 'Comidas rapidas', 'images/places/14/galleries/18', '2021-12-20 02:39:25', '2021-12-20 02:39:25');

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
(68, 15, 'catedral3.jpg151616060932.jpg', '2021-03-18 09:48:52', '2021-03-18 09:48:52'),
(70, 16, 'botanico5.jpg161630565533.jpg', '2021-09-02 06:52:13', '2021-09-02 06:52:13'),
(71, 16, 'botanico6.jpg161630565533.jpg', '2021-09-02 06:52:13', '2021-09-02 06:52:13'),
(72, 16, 'catedral.jpg161630565533.jpg', '2021-09-02 06:52:13', '2021-09-02 06:52:13'),
(78, 18, 'locationMarker.jpg181639967965.jpg', '2021-12-20 02:39:25', '2021-12-20 02:39:25');

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
(19, '2021_02_07_070844_create_lugar_categoria_table', 1),
(20, '2020_02_17_023410_create_producto_table', 2),
(21, '2020_02_17_023411_create_accion_table', 3);

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
(13, 10, 1, NULL, NULL),
(14, 10, 4, NULL, NULL),
(15, 11, 4, NULL, NULL),
(16, 12, 1, NULL, NULL),
(18, 13, 1, NULL, NULL),
(19, 14, 5, NULL, NULL),
(23, 21, 6, NULL, NULL),
(24, 20, 5, NULL, NULL),
(28, 27, 5, NULL, NULL),
(29, 28, 6, NULL, NULL),
(33, 32, 6, NULL, NULL),
(34, 33, 9, NULL, NULL),
(41, 40, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `productId` int(10) UNSIGNED NOT NULL,
  `touristicPlaceId` int(10) UNSIGNED NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productDescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productIcon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`productId`, `touristicPlaceId`, `productName`, `productDescription`, `productIcon`, `created_at`, `updated_at`) VALUES
(3, 10, 'Salchipapass', 'Porciones familiares, hasta agotar stock', '3.jpg', '2021-08-25 02:44:52', '2021-09-05 07:47:03'),
(4, 10, 'Cateringg', 'Servicio de comidas rapidas de todo precioasdfas', '4.jpg', '2021-08-25 02:44:52', '2021-08-25 04:47:35'),
(5, 11, 'Servicio de mudanza', 'Te mudamos donde sea choquito, solo llamanos', 'images/product2.jpg', '2021-08-25 03:14:51', NULL),
(14, 28, 'Real entretenimiento', 'aaaaaa', '14.png', '2021-09-02 07:15:28', '2021-09-02 07:21:02');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`tagId`, `tagName`, `created_at`, `updated_at`) VALUES
(1, 'Plazas', NULL, NULL),
(2, 'Hoteles', NULL, NULL),
(4, 'Lugar historico', NULL, NULL),
(5, 'Restaurantesos', NULL, '2022-01-15 21:03:12'),
(6, 'religiones', '2021-03-23 08:21:36', '2022-01-15 21:03:43'),
(8, 'bares', '2021-03-23 09:30:31', '2021-03-23 09:30:31'),
(9, 'Centro nocturno', '2021-03-23 09:32:53', '2021-03-23 09:32:53'),
(10, 'Centro educativo', '2021-04-26 07:05:40', '2021-04-26 07:05:40'),
(12, 'No imagenes', '2022-01-15 21:06:10', '2022-01-15 21:06:18');

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
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `web` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `placeName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainImage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mainVideo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streets` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `businessHours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `startDate` date DEFAULT NULL,
  `endDate` date DEFAULT NULL,
  `qrCode` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `touristicplace`
--

INSERT INTO `touristicplace` (`touristicPlaceId`, `provinceId`, `userId`, `placeStatusId`, `description`, `history`, `web`, `contact`, `placeName`, `mainImage`, `mainVideo`, `streets`, `latitude`, `longitude`, `businessHours`, `type`, `startDate`, `endDate`, `qrCode`, `created_at`, `updated_at`) VALUES
(8, 2, 4, 2, NULL, NULL, NULL, '72224078', 'Parque de aguaz danzantes', 'mainImage.jpg', '', NULL, -17.38822381191786, -66.16552893009413, '08: 00 AM - 23: 00 PM', 'place', NULL, NULL, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK9SURBVO3BQW7kQAwEwUxC//9yrY88NSBI47VpRpgvrDGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVijFGuUYo1y8ZDKd0pCp9Il4Q6VLgmdyndKwhPFGqVYoxRrlIuXJeFNKidJeCIJdyThTSpvKtYoxRqlWKNcfJjKHUm4Q+WOJHQqXRLuULkjCZ9UrFGKNUqxRrn45ZJwotKpTFasUYo1SrFGufhjktCpTFKsUYo1SrFGufiwJHySykkSTpLwRBJ+kmKNUqxRijXKxctU/qckdCpdEjqVLgknKj9ZsUYp1ijFGsV84Q9R6ZIwSbFGKdYoxRrl4iGVLgmdSpeEO1ROknCicqLSJeFEpUvCiUqXhE6lS8ITxRqlWKMUaxTzhQdUnkjCm1S6JDyhckcS7lDpkvBEsUYp1ijFGuXioSR0KneodEnoVE6S8CaVJ1S6JHQqn1SsUYo1SrFGufjPktCpdEnoVDqVJ1S6JNyh8pMUa5RijVKsUcwXHlDpknCi8qYkdConSThR6ZLQqdyRhE6lS8KbijVKsUYp1ijmC7+YSpeEE5UuCU+odEnoVO5IwhPFGqVYoxRrlIuHVL5TEk5UuiScqJwkoVN5IgmdypuKNUqxRinWKBcvS8KbVE6ScKJykoRO5SQJnUqn0iXhOxVrlGKNUqxRLj5M5Y4kPKHSJaFT6VS6JJyodEnoVE5UuiS8qVijFGuUYo1y8cck4UTlDpU7kvBJxRqlWKMUa5SLX07lRKVLwkkSOpUnVO5IwhPFGqVYoxRrlIsPS8InJaFT6ZJwotIloUvCiUqXhP+pWKMUa5RijXLxMpXvpNIloVPpktAloVN5QqVLwolKl4QnijVKsUYp1ijmC2uMYo1SrFGKNUqxRinWKMUapVijFGuUYo1SrFGKNUqxRinWKMUapVij/AOlMwkIFgw9cgAAAABJRU5ErkJggg==', '2021-03-18 09:11:57', '2021-12-19 07:18:13'),
(10, 2, 4, 2, NULL, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio debitis, odio ducimus magni at consequatur atque itaque dolorum unde, neque nam sapiente aperiam quasi quos libero molestiae, aspernatur voluptate deserunt?\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Optio debitis, odio ducimus magni at consequatur atque itaque dolorum unde, neque nam sapiente aperiam quasi quos libero molestiae, aspernatur voluptate deserunt?\r\n\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Optio debitis, odio ducimus magni at consequatur atque itaque dolorum unde, neque nam sapiente aperiam quasi quos libero molestiae, aspernatur voluptate deserunt?\r\n\r\n\r\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Optio debitis, odio ducimus magni at consequatur atque itaque dolorum unde, neque nam sapiente aperiam quasi quos libero molestiae, aspernatur voluptate deserunt?', '', '', 'Plaza 14 de septiembre', 'mainImage.jpg', '', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Optio debitis, odio ducimus magni at consequatur atque itaque dolorum unde, neque nam sapiente aperiam quasi quos libero molestiae, aspernatur voluptate deserunt?', -17.393773323527824, -66.15713934267255, '', 'place', NULL, NULL, NULL, '2021-03-18 09:34:02', '2021-08-27 03:11:49'),
(11, 2, 1, 2, NULL, NULL, '', '', 'El pueblisho', 'mainImage.jpg', '', NULL, -17.375024656025975, -66.1419345818037, '', 'place', NULL, NULL, 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHQAAAB0CAYAAABUmhYnAAAAAklEQVR4AewaftIAAAK1SURBVO3BQW7sWAwEwSxC979yjpdcPUCQur+HZkT8wRqjWKMUa5RijVKsUYo1SrFGKdYoxRqlWKMUa5RijVKsUYo1SrFGKdYoFw8l4ZtU7kjCHSpdEr5J5YlijVKsUYo1ysXLVN6UhDuS0Kl0SXhC5U1JeFOxRinWKMUa5eLDknCHyh1J6FS+KQl3qHxSsUYp1ijFGuXij1HpkjBJsUYp1ijFGuVimCR0Kn9JsUYp1ijFGuXiw1S+SeUkCZ3KEyq/SbFGKdYoxRrl4mVJ+E2S0Kl0SehUTpLwmxVrlGKNUqxR4g/+x5JwovKXFGuUYo1SrFEuHkpCp9Il4U0qnUqXhJMkdConSXiTyicVa5RijVKsUS4+TOUkCZ3KSRJOVO5IQqfSqZwkoVPpknCShE7liWKNUqxRijXKxYcloVO5IwknKneodEnoktCpdEnoVE5UTlTeVKxRijVKsUa5eEilS8JJEjqVLgmdSpeEO5Jwh8odSXiTyhPFGqVYoxRrlIuXqdyRhE6lS8KbVLokdEm4Q+WJJLypWKMUa5RijXLxj6mcqJwkoVN5QuUkCV0SOpWTJHxSsUYp1ijFGuXioSR8k0qn0iXhJAmdSpeETuVEpUvCHSpvKtYoxRqlWKNcvEzlTUk4SUKn0iWhUzlRuSMJTyShU3miWKMUa5RijXLxYUm4Q+WJJHQqXRI6lZMk3KFyRxLeVKxRijVKsUa5+GNUuiR0Kp3KSRK6JJyodCpvKtYoxRqlWKNcDKPypiScqJwk4ZuKNUqxRinWKBcfpvJJKidJuCMJnUqXhC4Jncq/VKxRijVKsUa5eFkSvikJJypdEjqVLgldEk5UTlS6JHQqbyrWKMUapVijxB+sMYo1SrFGKdYoxRqlWKMUa5RijVKsUYo1SrFGKdYoxRqlWKMUa5RijfIfkYYDCK++ZlYAAAAASUVORK5CYII=', '2021-03-18 09:38:53', '2021-09-25 23:39:33'),
(12, 2, 1, 2, NULL, NULL, '', '', 'Jardin Botanico', 'mainImage.jpg', '', NULL, -17.37853657809384, -66.14175070745593, '', 'place', NULL, NULL, NULL, '2021-03-18 09:45:12', '2021-03-18 09:45:12'),
(13, 2, 1, 2, NULL, NULL, '', '', 'Catedral metropolitana', 'mainImage.jpg', '', NULL, -17.394334041510756, -66.1564308470325, '', 'place', NULL, NULL, NULL, '2021-03-18 09:48:29', '2021-03-18 09:48:29'),
(14, 2, 5, 2, NULL, NULL, '', '', 'Panchita', 'mainImage.png', '', 'Avenia amertiva y villarroel', -17.37250058695166, -66.15968436362516, '', 'place', NULL, NULL, NULL, '2021-04-26 07:02:14', '2021-04-26 07:04:38'),
(20, 1, 13, 2, NULL, NULL, '', '', 'Las islas', '', NULL, NULL, 0, 0, NULL, 'place', NULL, NULL, NULL, '2021-08-31 01:22:42', '2021-08-31 04:12:46'),
(21, 1, 13, 2, NULL, NULL, '', '', 'Iglesia de cala cala', '', NULL, NULL, 0, 0, NULL, 'place', NULL, NULL, NULL, '2021-08-31 03:28:25', '2021-08-31 04:12:46'),
(27, 1, 15, 2, NULL, NULL, '', '', 'Prueba1112', '', NULL, NULL, 0, 0, NULL, 'place', NULL, NULL, NULL, '2021-08-31 05:28:11', '2021-09-05 07:25:13'),
(28, 3, 1, 2, NULL, NULL, '', '', 'Prueba logos', 'mainImage.png', '', NULL, -17.378489925542294, -66.19029867905655, '', 'place', NULL, NULL, NULL, '2021-09-02 06:39:48', '2021-09-02 06:48:16'),
(32, 3, 1, 2, NULL, NULL, '', '', 'Prueba fechas', 'mainImage.png', '', 'vcbcxvbvcx', -17.37914522624544, -66.20746481675187, '', 'place', NULL, NULL, NULL, '2021-09-06 02:29:04', '2021-09-06 02:29:04'),
(33, 3, 4, 2, NULL, NULL, '', '', 'Prueba fechas0', 'mainImage.png', '', 'cvbxasdafsd', -17.38733628708993, -66.0828386570839, '', 'event', '2021-07-07', '2021-09-30', NULL, '2021-09-06 02:30:07', '2021-09-08 05:48:05'),
(35, 1, 4, 2, NULL, NULL, '', '', 'prueba request 0', '', NULL, NULL, 0, 0, NULL, 'place', NULL, NULL, NULL, '2021-09-09 14:26:44', '2021-09-09 15:58:32'),
(40, 1, 4, 4, NULL, NULL, NULL, NULL, 'Ploggg', '', NULL, NULL, 0, 0, NULL, 'place', NULL, NULL, NULL, '2022-01-16 02:19:51', '2022-01-16 02:19:51');

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
(1, 2, 1, 'Sergioaa', 'Fernandez', '722240780', 'sergiocep2010@gmail.com', NULL, '$2y$10$NleRjbRFK81HY7hr8JBtHuI8/xg0F9q0WOjuV2XLkt2MTFIw8yY6m', NULL, NULL, NULL, '2021-12-19 07:44:06'),
(2, 2, 2, 'Usuario', 'Prueba', '72224071', 'test1@gmail.com', NULL, '$2y$10$xIHd407t/cRHSKx6eLyAzejr4fj4nieFTs.HjKS3vN46bxBZ5wuTS', NULL, NULL, NULL, '2021-03-23 09:25:53'),
(4, 2, 3, 'Juaness', 'Perez', '72224073', 'sergioss21er@gmail.com', NULL, '$2y$10$y7EvD.43fXckpe5qb9UYVu13LHNptn5lcpAc5agqgysq83E23yFMK', NULL, NULL, NULL, '2021-12-19 07:45:03'),
(5, 2, 3, 'Usuario', 'de prueba 5', '72224078', 'sergioss21errr@gmail.com', NULL, '$2y$10$jD4zL/69D54I7SFKCPXxGuJTkRZOH/zuIzYbnFXVWvULESmFtWt9i', NULL, NULL, '2021-03-23 19:24:10', '2021-12-20 02:23:31'),
(6, 1, 1, 'juan', 'perez', NULL, 'sergioss21err@gmail.com', NULL, '$2y$10$PpCsUSOM0Kbc5W4qp169GeKUFq.kq2KkTk5W/5TEytFys8OsiW.TC', '0xf5qs', NULL, '2021-04-04 21:52:47', '2021-04-04 21:52:47'),
(7, 2, 2, 'test', 'test', NULL, 'sergioss21er@gmail.com1', NULL, '$2y$10$mDdHeu4p3aQ2AqTHcveHD.6YYgI4eb/AFREjGg1aSSPsUteFGO9TS', NULL, NULL, '2021-04-04 22:07:56', '2021-04-04 22:08:14'),
(13, 2, 3, 'aaaa', 'aaa', '72224078', 'sergioss21er@gmail.com11', NULL, '$2y$10$5wywiZKviPlNWOZGbIHOZODPK9OmWQepi.3aZrKqPwwg.l17Jua.O', NULL, NULL, '2021-08-30 01:47:57', '2021-11-07 22:47:28'),
(15, 4, 3, '', '', '72224078', 'sergioss21er@gmail.coms', NULL, '$2y$10$K2fqpafJjAE0zrRvOAJkQ.YeJo9QDPvKfKDLMEHvpyZQuf8Bt.z0a', NULL, NULL, '2021-08-31 05:28:11', '2021-09-05 07:19:25');

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
-- Indices de la tabla `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`actionId`),
  ADD KEY `action_userid_foreign` (`userId`);

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
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `product_touristicplaceid_foreign` (`touristicPlaceId`);

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
  ADD UNIQUE KEY `tag_tagname_unique` (`tagName`);

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
-- AUTO_INCREMENT de la tabla `action`
--
ALTER TABLE `action`
  MODIFY `actionId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `commentary`
--
ALTER TABLE `commentary`
  MODIFY `commentaryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `galleryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `imageId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `placecategory`
--
ALTER TABLE `placecategory`
  MODIFY `placeCategoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `placetag`
--
ALTER TABLE `placetag`
  MODIFY `placeTagId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `province`
--
ALTER TABLE `province`
  MODIFY `provinceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `tagId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `test_models`
--
ALTER TABLE `test_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `touristicplace`
--
ALTER TABLE `touristicplace`
  MODIFY `touristicPlaceId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usertable`
--
ALTER TABLE `usertable`
  MODIFY `userId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usertype`
--
ALTER TABLE `usertype`
  MODIFY `increments` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_userid_foreign` FOREIGN KEY (`userId`) REFERENCES `usertable` (`userId`) ON DELETE CASCADE;

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
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_touristicplaceid_foreign` FOREIGN KEY (`touristicPlaceId`) REFERENCES `touristicplace` (`touristicPlaceId`) ON DELETE CASCADE;

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
