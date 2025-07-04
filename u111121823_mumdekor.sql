-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 04 Tem 2025, 12:49:58
-- Sunucu sürümü: 10.11.10-MariaDB
-- PHP Sürümü: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `u111121823_mumdekor`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ac_login_logs`
--

CREATE TABLE `ac_login_logs` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `proccess` enum('login','logout') NOT NULL,
  `ip` varchar(255) NOT NULL,
  `proccess_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `ac_login_logs`
--

INSERT INTO `ac_login_logs` (`id`, `user_name`, `proccess`, `ip`, `proccess_time`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'login', '::1', '2025-06-14 18:27:42', '2025-06-14 18:27:42', '2025-06-14 18:27:42'),
(2, 'admin', 'login', '::1', '2025-06-15 14:26:10', '2025-06-15 14:26:10', '2025-06-15 14:26:10'),
(3, 'admin', 'login', '::1', '2025-06-15 15:08:25', '2025-06-15 15:08:25', '2025-06-15 15:08:25'),
(4, 'admin', 'login', '::1', '2025-06-15 17:05:46', '2025-06-15 17:05:46', '2025-06-15 17:05:46'),
(5, 'admin', 'login', '::1', '2025-06-15 18:50:31', '2025-06-15 18:50:31', '2025-06-15 18:50:31'),
(6, 'admin', 'login', '::1', '2025-06-15 19:16:38', '2025-06-15 19:16:38', '2025-06-15 19:16:38'),
(7, 'admin', 'login', '::1', '2025-06-15 19:24:57', '2025-06-15 19:24:57', '2025-06-15 19:24:57'),
(8, 'admin', 'login', '::1', '2025-06-15 22:27:13', '2025-06-15 22:27:13', '2025-06-15 22:27:13'),
(9, 'admin', 'login', '::1', '2025-06-17 07:01:24', '2025-06-17 07:01:24', '2025-06-17 07:01:24'),
(10, 'admin', 'login', '::1', '2025-06-17 08:03:35', '2025-06-17 08:03:35', '2025-06-17 08:03:35'),
(11, 'admin', 'login', '::1', '2025-06-17 08:58:12', '2025-06-17 08:58:12', '2025-06-17 08:58:12'),
(12, 'admin', 'login', '::1', '2025-06-17 12:43:28', '2025-06-17 12:43:28', '2025-06-17 12:43:28'),
(13, 'admin', 'login', '::1', '2025-06-17 13:45:06', '2025-06-17 13:45:06', '2025-06-17 13:45:06'),
(14, 'admin', 'login', '::1', '2025-06-17 14:22:31', '2025-06-17 14:22:31', '2025-06-17 14:22:31'),
(15, 'admin', 'login', '::1', '2025-06-17 15:43:30', '2025-06-17 15:43:30', '2025-06-17 15:43:30'),
(16, 'admin', 'login', '::1', '2025-06-17 16:54:45', '2025-06-17 16:54:45', '2025-06-17 16:54:45'),
(17, 'admin', 'login', '::1', '2025-06-17 17:31:15', '2025-06-17 17:31:15', '2025-06-17 17:31:15'),
(18, 'admin', 'login', '::1', '2025-06-18 05:43:01', '2025-06-18 05:43:01', '2025-06-18 05:43:01'),
(19, 'admin', 'login', '::1', '2025-06-18 09:41:38', '2025-06-18 09:41:38', '2025-06-18 09:41:38'),
(20, 'admin', 'login', '::1', '2025-06-18 15:45:55', '2025-06-18 15:45:55', '2025-06-18 15:45:55'),
(21, 'admin', 'login', '::1', '2025-06-19 09:51:04', '2025-06-19 09:51:04', '2025-06-19 09:51:04'),
(22, 'admin', 'login', '::1', '2025-06-19 10:27:48', '2025-06-19 10:27:48', '2025-06-19 10:27:48'),
(23, 'admin', 'login', '::1', '2025-06-19 11:18:21', '2025-06-19 11:18:21', '2025-06-19 11:18:21'),
(24, 'admin', 'login', '::1', '2025-06-19 11:58:03', '2025-06-19 11:58:03', '2025-06-19 11:58:03'),
(25, 'admin', 'login', '::1', '2025-06-19 14:40:15', '2025-06-19 14:40:15', '2025-06-19 14:40:15'),
(26, 'admin', 'login', '::1', '2025-06-19 17:17:18', '2025-06-19 17:17:18', '2025-06-19 17:17:18'),
(27, 'admin', 'login', '::1', '2025-06-19 18:38:19', '2025-06-19 18:38:19', '2025-06-19 18:38:19'),
(28, 'admin', 'login', '::1', '2025-06-19 20:06:53', '2025-06-19 20:06:53', '2025-06-19 20:06:53'),
(29, 'admin', 'login', '::1', '2025-06-20 09:52:14', '2025-06-20 09:52:14', '2025-06-20 09:52:14'),
(30, 'admin', 'login', '::1', '2025-06-20 12:01:44', '2025-06-20 12:01:44', '2025-06-20 12:01:44'),
(31, 'admin', 'login', '::1', '2025-06-20 15:43:15', '2025-06-20 15:43:15', '2025-06-20 15:43:15'),
(32, 'admin', 'login', '::1', '2025-06-20 16:48:42', '2025-06-20 16:48:42', '2025-06-20 16:48:42'),
(33, 'admin', 'login', '::1', '2025-06-20 20:51:43', '2025-06-20 20:51:43', '2025-06-20 20:51:43'),
(34, 'admin', 'login', '::1', '2025-06-21 18:27:16', '2025-06-21 18:27:16', '2025-06-21 18:27:16'),
(35, 'admin', 'login', '::1', '2025-06-22 13:03:06', '2025-06-22 13:03:06', '2025-06-22 13:03:06'),
(36, 'admin', 'login', '::1', '2025-06-22 15:15:00', '2025-06-22 15:15:00', '2025-06-22 15:15:00'),
(37, 'admin', 'login', '::1', '2025-06-22 16:16:07', '2025-06-22 16:16:07', '2025-06-22 16:16:07'),
(38, 'admin', 'login', '::1', '2025-06-22 16:45:19', '2025-06-22 16:45:19', '2025-06-22 16:45:19'),
(39, 'admin', 'login', '::1', '2025-06-22 18:47:12', '2025-06-22 18:47:12', '2025-06-22 18:47:12'),
(40, 'admin', 'login', '::1', '2025-06-22 19:44:16', '2025-06-22 19:44:16', '2025-06-22 19:44:16'),
(41, 'admin', 'login', '::1', '2025-06-26 16:35:59', '2025-06-26 16:35:59', '2025-06-26 16:35:59'),
(42, 'admin', 'login', '::1', '2025-06-26 17:04:24', '2025-06-26 17:04:24', '2025-06-26 17:04:24'),
(43, 'admin', 'login', '::1', '2025-06-26 18:01:46', '2025-06-26 18:01:46', '2025-06-26 18:01:46'),
(44, 'admin', 'login', '::1', '2025-06-27 10:23:33', '2025-06-27 10:23:33', '2025-06-27 10:23:33'),
(45, 'admin', 'login', '::1', '2025-06-27 11:22:24', '2025-06-27 11:22:24', '2025-06-27 11:22:24'),
(46, 'admin', 'login', '::1', '2025-06-27 12:39:30', '2025-06-27 12:39:30', '2025-06-27 12:39:30'),
(47, 'admin', 'login', '::1', '2025-06-28 01:13:31', '2025-06-28 01:13:31', '2025-06-28 01:13:31'),
(48, 'admin', 'login', '::1', '2025-06-29 09:26:42', '2025-06-29 09:26:42', '2025-06-29 09:26:42'),
(49, 'admin', 'login', '::1', '2025-06-29 09:53:18', '2025-06-29 09:53:18', '2025-06-29 09:53:18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ac_users`
--

CREATE TABLE `ac_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `ac_users`
--

INSERT INTO `ac_users` (`id`, `username`, `password`, `user_token`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$4ZkZDOLkYyiPaDomzr4R9.j0k4t4McSfv.6rgcjbmf3xjE7QL/IV.', 'c3461af7f1aa55a1fea108de4d1c11f6c779b87bc5ab7fbf2c106f62a02da103', '2025-06-29 09:26:54', '2025-06-14 18:27:38', '2025-06-29 09:26:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) NOT NULL,
  `campaign_title` varchar(255) NOT NULL,
  `campaign_subtitle` varchar(255) NOT NULL,
  `campaign_description` text NOT NULL,
  `campaign_image` varchar(255) NOT NULL,
  `valid_until` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`products`)),
  `seo_description` varchar(255) NOT NULL,
  `isActive` bit(1) NOT NULL DEFAULT b'0',
  `seo_title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `campaigns`
--

INSERT INTO `campaigns` (`id`, `campaign_title`, `campaign_subtitle`, `campaign_description`, `campaign_image`, `valid_until`, `products`, `seo_description`, `isActive`, `seo_title`, `created_at`, `updated_at`) VALUES
(3, 'Nişan Paketi', 'Seçilen Ürünlerde %20 İndirim', 'açıklama', 'kampanya1750619263.jpg', '2025-06-25 00:00:00', '[\"13\",\"12\"]', '', b'1', '', '2025-06-22 19:07:43', '2025-06-22 19:07:43'),
(4, 'baslik', 'baslik', 'dfsdşflksşlk', 'kampanya1750621780.jpg', '2025-06-22 00:00:00', '[\"13\",\"12\"]', 'seo aciklama', b'1', 'denem', '2025-06-22 19:49:40', '2025-06-22 19:49:40'),
(5, 'Bu aya özel Nişan Paketi', 'Paket için %20 indirim', '25 adet kokulu mum\r\n25 adet bileklik', 'kampanya1751381332.jpg', '2025-07-31 00:00:00', '[\"14\"]', 'nişan paktei , indirmli ,el yapımı', b'1', 'Nişan Paketi', '2025-07-01 14:48:52', '2025-07-01 14:48:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cargo_companies`
--

CREATE TABLE `cargo_companies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `tracking_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `cargo_companies`
--

INSERT INTO `cargo_companies` (`id`, `name`, `phone`, `website`, `tracking_url`, `created_at`, `updated_at`) VALUES
(1, 'Yurtiçi Kargo', '444 99 99', 'https://www.yurticikargo.com', 'https://www.yurticikargo.com/tr/online-servisler/gonderi-sorgula', '2025-06-27 17:40:05', '2025-06-27 17:40:05'),
(2, 'Aras Kargo', '444 25 52', 'https://www.araskargo.com.tr', 'https://www.araskargo.com.tr/tr/online-servisler/gonderi-takip', '2025-06-27 17:40:05', '2025-06-27 17:40:05'),
(3, 'Sürat Kargo', '0850 202 02 02', 'https://www.suratkargo.com.tr', 'https://www.suratkargo.com.tr/kargo-takip', '2025-06-27 17:40:05', '2025-06-27 17:40:05'),
(4, 'MNG Kargo', '0850 222 06 06', 'https://www.mngkargo.com.tr', 'https://www.mngkargo.com.tr/kargo-takip', '2025-06-27 17:40:05', '2025-06-27 17:40:05'),
(5, 'PTT Kargo', '444 1 788', 'https://www.ptt.gov.tr', 'https://gonderitakip.ptt.gov.tr', '2025-06-27 17:40:05', '2025-06-27 17:40:05'),
(6, 'UPS Türkiye', '0850 255 00 66', 'https://www.ups.com/tr/tr', 'https://www.ups.com/tr/tr/Home.page', '2025-06-27 17:40:05', '2025-06-27 17:40:05'),
(7, 'TNT Express', '0850 222 36 36', 'https://www.tnt.com/express/tr_tr/site/home.html', 'https://www.tnt.com/express/tr_tr/site/shipping-tools/tracking.html', '2025-06-27 17:40:05', '2025-06-27 17:40:05'),
(8, 'DHL Express Türkiye', '444 00 40', 'https://www.dhl.com/tr-tr/home.html', 'https://www.dhl.com/tr-tr/home/tracking.html', '2025-06-27 17:40:05', '2025-06-27 17:57:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_page_image` varchar(255) NOT NULL,
  `category_sub_description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isPopuler` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `category_page_image`, `category_sub_description`, `created_at`, `updated_at`, `isPopuler`) VALUES
(9, 'El Yapımı Mum', 'cat_1751380899.jpg', 'catpage_1751380899.webp', 'Özel Günler İçin El yapımı mumlar', '2025-07-01 14:41:39', '2025-07-01 14:41:39', 0),
(10, 'Teraryum', 'cat_1751380948.jpg', 'catpage_1751380948.webp', 'Hediyelik Teraryum', '2025-07-01 14:42:28', '2025-07-01 14:42:28', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `color`
--

INSERT INTO `color` (`id`, `title`, `color_code`, `created_at`, `updated_at`) VALUES
(1, 'dsf', '#000000', '2025-06-19 18:14:41', '2025-06-19 18:14:41'),
(2, 'g', '#be5b5b', '2025-06-19 18:17:56', '2025-06-20 12:28:16'),
(3, 'mavi', '#235bcd', '2025-06-19 18:38:37', '2025-06-19 18:38:37'),
(5, 'cırtlak', '#e4afaf', '2025-06-20 14:30:03', '2025-06-20 14:30:03'),
(6, 'r', '#000000', '2025-06-20 14:39:49', '2025-06-20 14:39:49'),
(7, 'Renkli', '#fba2a2', '2025-06-20 16:59:00', '2025-06-20 16:59:00'),
(8, 'b', '#000000', '2025-06-30 15:14:17', '2025-06-30 15:14:17'),
(9, 'ö', '#000000', '2025-06-30 15:15:29', '2025-06-30 15:15:29'),
(10, 'Mavi', '#000000', '2025-07-01 14:45:13', '2025-07-01 14:45:13');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL DEFAULT 'bi bi-bag',
  `notification_type` varchar(255) NOT NULL,
  `isRead` tinyint(1) NOT NULL DEFAULT 0,
  `detay` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`detay`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `icon`, `notification_type`, `isRead`, `detay`, `created_at`, `updated_at`) VALUES
(17, 'Yeni Siparişiniz Var : #ORD#SMD#7749', 'bi-whatsapp', 'order', 1, '{\"order_id\": 16, \"order_uniq_id\": \"SMD#7749\", \"customer\": \"Kaan Türkoğlu\", \"phone\": \"0545 903 95 84\"}', '2025-06-30 15:16:15', '2025-07-01 14:55:05'),
(18, 'Yeni Siparişiniz Var : #ORD#SMD#5443', 'bi-whatsapp', 'order', 1, '{\"order_id\": 17, \"order_uniq_id\": \"SMD#5443\", \"customer\": \"Kaan Türkoğlu\", \"phone\": \"0545 903 95 84\"}', '2025-07-01 14:51:54', '2025-07-01 14:55:06'),
(19, 'MüşteriyeÖdeme Onaylandı Bilgilendirme Maili Gönderilidi', 'Ödeme Onaylandı', 'info', 1, '{\"siparis_bilgisi\":{\"id\":17,\"customer_name\":\"Kaan\",\"customer_surname\":\"T\\u00fcrko\\u011flu\",\"customer_phone\":\"0545 903 95 84\",\"customer_email\":\"kaantrrkoglu@gmail.com\",\"customer_address\":\"Turkiye\\nHatay\\/D\\u00f6rtyol\",\"order_note\":\"Abucuk gugucuk ni\\u015fan\\u0131m var cok acil yalvar\\u0131m yeti\\u015fr \",\"subtotal\":\"250.00\",\"shipping_cost\":\"150.00\",\"total_amount\":\"400.00\",\"payment_method\":\"\",\"order_status\":\"confirmed\",\"sended_message_with_whatsapp\":1,\"order_uniq_id\":\"SMD#5443\",\"sended_info_mail\":0,\"created_at\":\"2025-07-01 14:51:54\",\"updated_at\":\"2025-07-01 14:52:57\"},\"urun_listesi\":[]}', '2025-07-01 14:52:58', '2025-07-01 14:55:06'),
(20, 'Kullanıcıyıa Kargo Bilgileri Mail Gönderildi', 'bi bi-truck', 'cargo', 1, '{\"eklenen_bilgiler\":{\"order_id\":\"17\",\"order_uniq_id\":\"SMD#5443\",\"cargo_company\":\"5\",\"tarcking_number\":\"321364654mn\",\"cargo_price\":\"0\"},\"kargofirmas\":\"PTT Kargo\",\"mail_gonderilen_musteri\":\"kaantrrkoglu@gmail.com\"}', '2025-07-01 14:53:33', '2025-07-01 14:54:46'),
(21, 'Yeni Siparişiniz Var : #ORD#SMD#6682', 'bi-whatsapp', 'order', 1, '{\"order_id\": 18, \"order_uniq_id\": \"SMD#6682\", \"customer\": \"Kaan Türkoğlu\", \"phone\": \"0545 903 95 84\"}', '2025-07-01 14:54:08', '2025-07-01 14:55:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_surname` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `order_note` text NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `shipping_cost` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_method` enum('Kredi Karti','EFT/HAVALE') NOT NULL DEFAULT 'EFT/HAVALE',
  `order_status` enum('pending','confirmed','cancaled') NOT NULL,
  `sended_message_with_whatsapp` bit(1) NOT NULL DEFAULT b'0',
  `order_uniq_id` varchar(255) NOT NULL,
  `sended_info_mail` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_surname`, `customer_phone`, `customer_email`, `customer_address`, `order_note`, `subtotal`, `shipping_cost`, `total_amount`, `payment_method`, `order_status`, `sended_message_with_whatsapp`, `order_uniq_id`, `sended_info_mail`, `created_at`, `updated_at`) VALUES
(1, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', 'not', 960.00, 150.00, 1110.00, 'EFT/HAVALE', 'confirmed', b'1', 'SMD#4612', 1, '2025-06-21 18:25:01', '2025-06-28 01:12:44'),
(3, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', '56465465', 450.00, 150.00, 600.00, 'EFT/HAVALE', 'pending', b'0', 'SMD#9242', 0, '2025-06-21 19:17:38', '2025-06-27 10:38:18'),
(4, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', '654', 240.00, 150.00, 390.00, 'EFT/HAVALE', 'pending', b'0', 'SMD#3849', 1, '2025-06-21 19:54:42', '2025-06-28 01:12:46'),
(6, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', '444', 240.00, 150.00, 390.00, 'EFT/HAVALE', 'pending', b'0', 'SMD#6542', 1, '2025-06-21 19:56:58', '2025-06-28 01:12:47'),
(7, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', 'ı', 240.00, 150.00, 390.00, 'Kredi Karti', 'pending', b'0', 'SMD#8593', 1, '2025-06-27 10:41:22', '2025-06-28 01:12:48'),
(8, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', '5', 240.00, 150.00, 390.00, 'Kredi Karti', 'pending', b'0', 'SMD#4147', 1, '2025-06-27 10:41:31', '2025-06-28 01:12:50'),
(9, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', '654654', 240.00, 150.00, 390.00, '', 'pending', b'0', 'SMD#9315', 1, '2025-06-28 00:24:14', '2025-06-28 01:12:51'),
(10, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', '654654', 240.00, 150.00, 390.00, '', 'pending', b'0', 'SMD#2615', 1, '2025-06-28 00:24:19', '2025-06-28 01:12:53'),
(11, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', '654', 240.00, 150.00, 390.00, '', 'pending', b'0', 'SMD#4237', 1, '2025-06-28 00:24:44', '2025-06-28 01:12:54'),
(12, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', '444', 240.00, 150.00, 390.00, '', 'pending', b'0', 'SMD#3676', 0, '2025-06-28 00:25:22', '2025-06-28 00:25:22'),
(13, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', '46546', 690.00, 150.00, 840.00, '', 'pending', b'1', 'SMD#1484', 1, '2025-06-28 00:28:44', '2025-06-28 01:12:55'),
(14, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', '654', 240.00, 150.00, 390.00, '', 'pending', b'1', 'SMD#2201', 1, '2025-06-28 00:57:29', '2025-06-28 01:12:58'),
(15, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', '444', 450.00, 150.00, 600.00, '', 'pending', b'1', 'SMD#3168', 1, '2025-06-28 00:59:57', '2025-06-28 01:13:02'),
(16, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', 'k', 480.00, 150.00, 630.00, '', 'pending', b'1', 'SMD#7749', 0, '2025-06-30 15:16:15', '2025-06-30 15:16:15'),
(17, 'Kaan', 'Türkoğlu', '0545 903 95 84', 'kaantrrkoglu@gmail.com', 'Turkiye\nHatay/Dörtyol', 'Abucuk gugucuk nişanım var cok acil yalvarım yetişr ', 250.00, 150.00, 400.00, '', 'confirmed', b'1', 'SMD#5443', 0, '2025-07-01 14:51:54', '2025-07-01 14:52:57');

--
-- Tetikleyiciler `orders`
--
DELIMITER $$
CREATE TRIGGER `after_whatsapp_sent_notification` AFTER INSERT ON `orders` FOR EACH ROW BEGIN
    -- Sadece sended_message_with_whatsapp sütunu 0'dan 1'e geçtiğinde tetiklenir
    
        INSERT INTO notifications (title, icon, notification_type, isRead, detay)
        VALUES (
            CONCAT('Yeni Siparişiniz Var : #ORD#', NEW.order_uniq_id),
            'bi-whatsapp',
            'order',
            0,
            JSON_OBJECT(
                'order_id', NEW.id,
                'order_uniq_id', NEW.order_uniq_id,
                'customer', CONCAT(NEW.customer_name, ' ', NEW.customer_surname),
                'phone', NEW.customer_phone
            )
        );
   
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_cargos`
--

CREATE TABLE `order_cargos` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_uniq_id` varchar(255) NOT NULL,
  `cargo_company` int(11) NOT NULL,
  `cargo_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `tarcking_number` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `order_cargos`
--

INSERT INTO `order_cargos` (`id`, `order_id`, `order_uniq_id`, `cargo_company`, `cargo_price`, `tarcking_number`, `created_at`, `updated_at`) VALUES
(7, 1, 'SMD#4612', 8, 0.00, '321364654mn', '2025-06-28 00:17:25', '2025-06-28 00:17:25'),
(8, 17, 'SMD#5443', 5, 0.00, '321364654mn', '2025-07-01 14:53:32', '2025-07-01 14:53:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_uniq_id` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `order_uniq_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 4, 'SMD#4612', 240.00, '2025-06-21 18:25:01', '2025-06-21 18:25:01'),
(4, 1, 12, 1, 'SMD#9242', 450.00, '2025-06-21 19:17:38', '2025-06-27 22:19:25'),
(5, 4, 11, 1, 'SMD#3849', 240.00, '2025-06-21 19:54:42', '2025-06-21 19:54:42'),
(7, 6, 11, 1, 'SMD#6542', 240.00, '2025-06-21 19:56:58', '2025-06-21 19:56:58'),
(8, 7, 11, 1, 'SMD#8593', 240.00, '2025-06-27 10:41:22', '2025-06-27 10:41:22'),
(9, 8, 11, 1, 'SMD#4147', 240.00, '2025-06-27 10:41:31', '2025-06-27 10:41:31'),
(10, 9, 11, 1, 'SMD#9315', 240.00, '2025-06-28 00:24:14', '2025-06-28 00:24:14'),
(11, 10, 11, 1, 'SMD#2615', 240.00, '2025-06-28 00:24:19', '2025-06-28 00:24:19'),
(12, 11, 11, 1, 'SMD#4237', 240.00, '2025-06-28 00:24:44', '2025-06-28 00:24:44'),
(13, 13, 11, 1, 'SMD#3676', 240.00, '2025-06-28 00:25:22', '2025-06-28 00:49:27'),
(14, 13, 11, 1, 'SMD#1484', 240.00, '2025-06-28 00:28:44', '2025-06-28 00:28:44'),
(15, 13, 12, 1, 'SMD#1484', 450.00, '2025-06-28 00:28:44', '2025-06-28 00:28:44'),
(16, 14, 11, 1, 'SMD#2201', 240.00, '2025-06-28 00:57:29', '2025-06-28 00:57:29'),
(17, 15, 12, 1, 'SMD#3168', 450.00, '2025-06-28 00:59:57', '2025-06-28 00:59:57'),
(18, 16, 11, 2, 'SMD#7749', 240.00, '2025-06-30 15:16:15', '2025-06-30 15:16:15'),
(19, 17, 14, 1, 'SMD#5443', 250.00, '2025-07-01 14:51:54', '2025-07-01 14:51:54');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pages_content`
--

CREATE TABLE `pages_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `seo_title` varchar(255) NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `pages_content`
--

INSERT INTO `pages_content` (`id`, `title`, `sub_title`, `image`, `page_name`, `seo_title`, `seo_description`, `created_at`, `updated_at`) VALUES
(1, 'Ürünlerimiz', 'El yapımı mumlar veHediyelik Eşyalar', '6863ef7ec6f6e_1751379838.webp', 'urunler', 'Urunlerimiz', 'size özel ürünler , özel gün ürünleri , hediyelik ürünler , el yapımı hediyeler', '2025-06-17 12:46:41', '2025-07-01 14:23:58'),
(2, 'Hakkımızda , Neden Biz ?', 'Mumdekor, 2024 yılında el yapımı mum tutkusunu sizlerle buluşturmak amacıyla kuruldu. Her biri özenle tasarlanmış ürünlerimiz, sadece birer mum değil; yaşam alanlarınıza estetik, huzur ve sıcaklık katacak dekoratif objelerdir.  Doğal içerikler, sürdürülebilir malzemeler ve el emeği ile hazırlanan Mumdekor ürünleri; doğaya saygılı, sağlığa zararsız ve benzersizdir. Koleksiyonlarımızda kokulu mumlardan, özel günler için tematik tasarımlara kadar birçok seçenek sunuyoruz.  Amacımız; her evde, her masada, her özel anınızda size eşlik edecek özgün mumlar üretmek. Kaliteden ödün vermeden, el işçiliğinin ruhunu koruyarak sizlere farklı bir deneyim sunmak için çalışıyoruz.  Siz de Mumdekor ile tanışın; yaşamınıza anlam, evinize ruh katın.', '6863efb6e0751_1751379894.jpg', 'hakkimizda', 'Hakkımızda', 'mumdekor , biz kimiz ? neden biz filan', '2025-06-17 12:50:38', '2025-07-01 14:25:44'),
(3, 'İletişim', 'Sorularınız için bize ulaşın', '6863f035aeeb6_1751380021.webp', 'iletisim', 'Mumdekor İletişim Sayfası', 'Mumdekor ile iletişime geçin. Siparişleriniz, iş birlikleri veya merak ettikleriniz için bize kolayca ulaşabilirsiniz. El yapımı mumlarımız hakkında tüm sorularınız için buradayız.', '2025-06-17 13:44:21', '2025-07-01 14:27:01'),
(4, 'Kampanyalarımız', 'Özel Günler İçin Kampanyalar', '6863ef45b5ace_1751379781.jpg', 'kampanyalar', 'Kampanyalarımız  <3', 'mumdekor kampanyalar , indirimli ürünler, kokulu mumlar ,elyapımı mumlar   ,düğün hediye,nişan hediyesi     ,hediyelik', '2025-06-26 16:37:54', '2025-07-01 14:23:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 1,
  `category` int(11) NOT NULL,
  `old_price` decimal(10,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `new_price` decimal(10,2) NOT NULL,
  `long_description` text NOT NULL,
  `features` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`features`)),
  `cargo` decimal(10,2) NOT NULL,
  `images` varchar(255) NOT NULL,
  `sub_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`sub_images`)),
  `color` varchar(255) NOT NULL,
  `smell` int(11) NOT NULL,
  `seotitle` varchar(255) NOT NULL,
  `seodescription` varchar(255) NOT NULL,
  `metarial` varchar(255) NOT NULL,
  `isFeatured` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `description`, `stok`, `category`, `old_price`, `discount`, `new_price`, `long_description`, `features`, `cargo`, `images`, `sub_images`, `color`, `smell`, `seotitle`, `seodescription`, `metarial`, `isFeatured`, `created_at`, `updated_at`) VALUES
(14, 'Çicek Desenli Kokulu Mum', 250.00, 'ürün acıklma', 15, 9, 0.00, 0, 0.00, '<p>mor renkli</p>\r\n\r\n<p>fena bişe&nbsp;</p>\r\n\r\n<p>g&uuml;ze lbişe&nbsp;</p>\r\n\r\n<ol>\r\n	<li>a</li>\r\n	<li>b</li>\r\n	<li>&nbsp;c</li>\r\n	<li>d</li>\r\n</ol>\r\n\r\n<p><strong>kljlkjlkjklj </strong><em>kljklj</em></p>', '{\"1\":\"Do\\u011fal Lavanta \\u00d6z\\u00fc\",\"2\":\"yeni \\u00f6z\"}', 150.00, 'mainimage_1751381129.jpg', '[\"subimage_0_1751381129.jpg\",\"subimage_1_1751381129.jpg\",\"subimage_2_1751381129.jpg\",\"subimage_3_1751381129.jpg\"]', '10', 10, 'Lavanta Kokulu Mum', 'Özel günler için , el yapımı ,hediyelik', '', 0, '2025-07-01 14:45:29', '2025-07-01 14:45:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products_properties`
--

CREATE TABLE `products_properties` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `products_properties`
--

INSERT INTO `products_properties` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Doğal soya mumu', '2025-06-18 16:08:52', '2025-06-18 16:08:52'),
(2, 'Gerçek lavanta esansı', '2025-06-18 16:09:11', '2025-06-18 16:09:11'),
(3, 'El Yapımı', '2025-06-18 16:15:01', '2025-06-18 16:15:01'),
(4, 'Doğal Lavanta Özü', '2025-06-19 14:52:13', '2025-06-19 14:52:13'),
(5, 'Gül Kokulu', '2025-06-19 14:53:12', '2025-06-19 14:53:12'),
(6, 'Doğal Limon Özü', '2025-06-19 14:54:38', '2025-06-19 14:54:38'),
(7, 'Doğal Kiraz Çiceği', '2025-06-19 14:57:08', '2025-06-19 14:57:08'),
(8, 'Doğal Portakal Çiceği', '2025-06-19 15:03:03', '2025-06-19 15:03:03'),
(9, 'n', '2025-06-30 15:14:12', '2025-06-30 15:14:12'),
(12, 'v', '2025-07-01 14:40:37', '2025-07-01 14:40:37'),
(13, 'yeni öz', '2025-07-01 14:44:36', '2025-07-01 14:44:36');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `page_name` varchar(255) NOT NULL DEFAULT 'all',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `questions`
--

INSERT INTO `questions` (`id`, `title`, `description`, `page_name`, `created_at`, `updated_at`) VALUES
(5, 'Siparişlerim ne zaman teslim edilecek?', 'Siparişleriniz, ödeme onayından sonra 1-2 iş günü içinde kargoya verilir. Teslimat süresi, bulunduğunuz bölgeye göre 1-3 iş günü arasında değişmektedir.', 'all', '2025-06-18 06:19:30', '2025-06-18 06:19:30'),
(6, 'İade ve değişim politikası nedir?', 'Ürünlerimizi teslim aldığınız tarihten itibaren 14 gün içinde iade edebilir veya değiştirebilirsiniz. Ürünün orijinal ambalajında ve kullanılmamış olması gerekmektedir.', 'all', '2025-06-18 06:19:40', '2025-06-18 06:19:40'),
(7, 'Ödeme seçenekleri nelerdir?', 'Kredi kartı, banka kartı, havale/EFT ve kapıda ödeme seçeneklerimiz mevcuttur. Tüm ödemeleriniz 256-bit SSL sertifikası ile güvence altındadır.', 'all', '2025-06-18 06:19:48', '2025-06-18 06:19:48'),
(8, 'Nasil Sipariş Verebilirim ?', 'Sepetinizi Oluşturduktan sonra whatsap üzerinden size tanımlanan kod ile sipariş geçebilrsiniz', 'urunler', '2025-06-18 06:25:52', '2025-06-18 06:26:09'),
(10, 'Nasil eklerim ?', 'dşfksdşfksdlfkds', 'all', '2025-07-01 14:15:27', '2025-07-01 14:15:59');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(255) NOT NULL,
  `site_description` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `site_mail` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `calisma_saatleri` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `footer_desc` text NOT NULL,
  `whatsapp_number` varchar(255) NOT NULL,
  `ucretsiz_kargo_limiti` int(11) NOT NULL DEFAULT 1000,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `google_map` varchar(512) NOT NULL,
  `favicon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `site_description`, `facebook`, `instagram`, `site_mail`, `adress`, `calisma_saatleri`, `phone`, `logo`, `footer_desc`, `whatsapp_number`, `ucretsiz_kargo_limiti`, `created_at`, `updated_at`, `google_map`, `favicon`) VALUES
(1, 'Mum Dekor', 'el yapımı mum , özel gün mum , kokulu mum , mum malzemeleri', 'https://www.facebook.com/?locale=tr_TR', 'https://www.instagram.com/teraryum_agca/', 'kaantrrkoglu@gmail.coom', 'Adres adres', '09.00 - 18:00', '05459039584', 'logo1750229027.png', 'orem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa commodi asperiores fugiat doloribus dicta aliquam vel illo labore dolores obcaecati?', '905459039584', 1000, '2025-06-14 18:20:34', '2025-07-01 14:30:17', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d474.6763914511306!2d36.22764948352066!3d36.836981508497054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152f3faa32bc26a1%3A0xe51a1b6675794b72!2zw5xsa8O8IEtpdGFiZXZp!5e0!3m2!1str!2str!4v1750179456365!5m2!1str!2str', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_sub_title` varchar(255) NOT NULL,
  `button_first_title` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `button_first_visible` tinyint(1) NOT NULL DEFAULT 1,
  `button_first_target` varchar(255) NOT NULL,
  `button_second_title` varchar(255) NOT NULL,
  `button_second_visible` tinyint(1) NOT NULL DEFAULT 1,
  `button_second_target` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `slider_sub_title`, `button_first_title`, `slider_image`, `button_first_visible`, `button_first_target`, `button_second_title`, `button_second_visible`, `button_second_target`, `created_at`, `updated_at`) VALUES
(14, 'Yeni Slider11', 'Yeni alt baslik211', 'Katalog2', '1751378493_banyolarda-mum-zamani-1.jpg', 1, 'katalog.php', 'Kampanya2', 0, 'kampanyalar.php', '2025-07-01 14:01:33', '2025-07-01 14:05:34');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `smell`
--

CREATE TABLE `smell` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `smell`
--

INSERT INTO `smell` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Lavanta', '2025-06-19 16:09:59', '2025-06-19 16:09:59'),
(2, 'Limon', '2025-06-19 16:10:07', '2025-06-19 16:10:07'),
(3, 'Mavi', '2025-06-19 17:37:57', '2025-06-19 17:37:57'),
(5, 'Lavanta2', '2025-06-20 13:38:38', '2025-06-20 13:38:38'),
(6, 'mavi koku', '2025-06-20 14:29:53', '2025-07-01 14:35:30'),
(10, 'Kiraz Çiceği', '2025-07-01 14:45:25', '2025-07-01 14:45:25');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ac_login_logs`
--
ALTER TABLE `ac_login_logs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ac_users`
--
ALTER TABLE `ac_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Tablo için indeksler `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `cargo_companies`
--
ALTER TABLE `cargo_companies`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `order_cargos`
--
ALTER TABLE `order_cargos`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `pages_content`
--
ALTER TABLE `pages_content`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products_properties`
--
ALTER TABLE `products_properties`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `smell`
--
ALTER TABLE `smell`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ac_login_logs`
--
ALTER TABLE `ac_login_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Tablo için AUTO_INCREMENT değeri `ac_users`
--
ALTER TABLE `ac_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `cargo_companies`
--
ALTER TABLE `cargo_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `order_cargos`
--
ALTER TABLE `order_cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `pages_content`
--
ALTER TABLE `pages_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `products_properties`
--
ALTER TABLE `products_properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `smell`
--
ALTER TABLE `smell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
