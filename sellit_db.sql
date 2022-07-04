-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 01:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_name`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`admin_id`, `user_name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'PIZZA', 'nilankajayashan9@gmail.com', '$2y$10$rrbgoTWVa3sf1yMPaOf0ZOFoJGrmRlpYGMX/2OJUuxZxt.D67p68u', '[\"view_ads\",\"add_ads\",\"edit_ads\",\"delete_ads\",\"reject_ads\",\"approve_ads\",\"view_filters\",\"add_filters\",\"edit_filters\",\"delete_filters\",\"view_users\",\"add_users\",\"edit_users\",\"delete_users\",\"view_guests\",\"add_guests\",\"edit_guests\",\"delete_guests\",\"view_admins\",\"add_admins\",\"edit_admins\",\"delete_admins\"]', NULL, NULL, '2022-05-27 03:59:43'),
(4, 'nilanka2', 'nilankajayashan8@gmail.com', '$2y$10$U8YkhVBbjktjsBqqPlPm/OKv/ecJ3BRtqcoMX3N7bZ9WFKjJRaIZS', '[\"view_ads\",\"add_ads\",\"edit_ads\",\"delete_ads\",\"reject_ads\",\"approve_ads\"]', NULL, '2022-05-27 04:37:43', '2022-05-27 04:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `tittle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `town` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` int(11) NOT NULL DEFAULT 0,
  `ad_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `reject` int(11) NOT NULL DEFAULT 0,
  `reject_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_option` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'failed',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`ad_id`, `user_id`, `user_type`, `category_id`, `tittle`, `description`, `price`, `city`, `town`, `images`, `main_image`, `ad_info`, `status`, `reject`, `reject_reason`, `ad_option`, `payment_status`, `created_at`, `updated_at`) VALUES
(21, 15, 'registered', 58, 'new lenovo tablet test', 'test', 49990, 'Mannar', 'Mannar', '[\"165435475521.png\",\"165435475598.png\",\"165435475570.png\",\"165435475514.png\"]', 2, '{\"file\":[]}', 1, 0, NULL, '[\"highlighted\",\"priority\",\"urgent\"]', 'success', '2022-06-04 14:59:15', '2022-06-04 14:59:34'),
(22, 7, 'registered', 22, 'new lenovo tablet', 'new lenovo tablet', 20000, 'Kegalle', 'Mawanella', '[\"165435808879.jpg\",\"16543580886.jpg\",\"165435808851.jpg\",\"165435808883.jpg\"]', 2, '{\"file\":[]}', 1, 0, NULL, '[\"highlighted\",\"priority\",\"urgent\"]', 'success', '2022-06-04 15:54:48', '2022-06-04 15:55:10'),
(23, 15, 'registered', 2, 'New Lambogini', 'Lamborghini is Italy’s answer to the German domination of manufacturing racing cars. Founded in 1963 by Ferruccio Lamborghini, an Italian magnate, the Lamborghini competes with the established racing car manufacturers, including Ferrari. The Miura sports coupe, one of the first of all Lamborghini models gained instant recognition for innovative engineering initiatives like the rear mid-engine and the rear wheel drive. It became the standard feature of the high-performance cars during that era.\r\n\r\nThe first decade saw the company attaining great heights, but the 1973 worldwide financial meltdown and oil crisis pushed its sales figures back considerably. The ownership of the company, Automobili Lamborghini S.p.A, changed hands three times before the Volkswagen Group took over in 1998. Since then, Lamborghini is manufacturing high-quality sports cars and V12 engines for offshore powerboat racing. The Urus, Huracan and the Aventador are the showpiece Lamborghini car models.', 19995550, 'Colombo', 'Colombo 15', '[\"165454800427.jpg\",\"165454800487.jpg\",\"165454800468.jpg\",\"165454800421.jpg\"]', 2, '{\"make\":\"Lamborghini\",\"model\":\"Countach\",\"body_style\":\"Kit Car\",\"year\":\"2022\",\"mileage\":\"250\",\"transmission\":\"Automatic\",\"fuel\":\"Hybrid\",\"doors\":\"4\",\"color\":\"Yellow\",\"condition\":\"New\",\"features\":\"4-Wheel Drive,Electronic Stability Program (ESP),Safety Belt Pretensioners,Alloy Wheels,Tuning,Cruise Control,Power-assisted Steering (PAS),Sunroof,Alarm,Safety Belt Pretensioners,Air Conditioning\",\"file\":[]}', 1, 0, NULL, '[\"highlighted\",\"priority\",\"urgent\"]', 'success', '2022-06-06 20:40:04', '2022-06-06 20:40:17'),
(24, 7, 'guest', 2, 'brand new blue color car for sale', 'brand new blue color car for sale', 123, 'Kegalle', 'Mawanella', '[\"165455054168.jpg\"]', 0, '{\"body_style\":null,\"year\":null,\"mileage\":null,\"transmission\":null,\"fuel\":null,\"doors\":null,\"color\":null,\"condition\":null,\"features\":null,\"file\":[]}', 1, 0, NULL, '[]', 'success', '2022-06-06 21:22:21', '2022-06-06 21:29:18'),
(25, 15, 'registered', 2, 'brand new car', 'brand new car', 250000, 'Colombo', 'Colombo 15', '[\"165455054168.jpg\"]', 0, '{\"body_style\":null,\"year\":null,\"mileage\":null,\"transmission\":null,\"fuel\":null,\"doors\":null,\"color\":null,\"condition\":null,\"features\":null,\"file\":[]}', 1, 0, NULL, '[\"highlighted\",\"priority\",\"urgent\"]', 'success', '2022-06-06 21:37:10', '2022-06-06 21:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'common',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `parent_id`, `icon`, `form_name`, `created_at`, `updated_at`) VALUES
(1, 'vehicle', 0, 'fa-car', 'common', NULL, NULL),
(2, 'car', 1, NULL, 'car', NULL, NULL),
(3, 'Motorbikes_and_Scooters', 1, NULL, 'motorbikes_and_scooters', NULL, NULL),
(4, 'vans_and_busses', 1, NULL, 'vans_and_busses', NULL, NULL),
(5, 'three_wheelers', 1, NULL, 'three_wheelers', NULL, NULL),
(6, 'commercial_trucks_and_lorries', 1, NULL, 'commercial_trucks_and_lorries', NULL, NULL),
(7, 'boats_and_water_transport', 1, NULL, 'boats_and_water_transport', NULL, NULL),
(8, 'parts_and_accessories', 1, NULL, 'parts_and_accessories', NULL, NULL),
(9, 'other_vehicles', 1, NULL, 'other_vehicles', NULL, NULL),
(10, 'property', 0, 'fa-home', 'property', NULL, NULL),
(11, 'homes_for_sale', 10, NULL, 'homes_for_sale', NULL, NULL),
(12, 'homes_for_rent', 10, NULL, 'homes_for_rent', NULL, NULL),
(13, 'vacation_rentals', 10, NULL, 'vacation_rentals', NULL, NULL),
(14, 'office_and_commercial', 10, NULL, 'office_and_commercial', NULL, NULL),
(15, 'housing_exchange', 10, NULL, 'housing_exchange', NULL, NULL),
(16, 'housing_wanted', 10, NULL, 'housing_wanted', NULL, NULL),
(17, 'rooms_and_roommates', 10, NULL, 'rooms_and_roommates', NULL, NULL),
(18, 'land', 10, NULL, 'land', NULL, NULL),
(19, 'agents_and_services', 10, NULL, 'agents_and_services', NULL, NULL),
(20, 'electronics', 0, 'fa-laptop', 'common', NULL, NULL),
(21, 'mobile_phones', 20, NULL, 'common', NULL, NULL),
(22, 'computers_and_tablets', 20, NULL, 'common', NULL, NULL),
(23, 'tvs', 20, NULL, 'common', NULL, NULL),
(24, 'cameras_and_camcorders', 20, NULL, 'common', NULL, NULL),
(25, 'audio_electronics', 20, NULL, 'common', NULL, NULL),
(26, 'video_games_and_consoles', 20, NULL, 'common', NULL, NULL),
(27, 'tv_and_video_accessories', 20, NULL, 'common', NULL, NULL),
(29, 'mobile_phone_accessories', 20, NULL, 'common', NULL, NULL),
(30, 'computer_Accessories', 20, NULL, 'common', NULL, NULL),
(31, 'other_electronics', 20, NULL, 'common', NULL, NULL),
(32, 'jobs', 0, 'fa-briefcase', 'common', NULL, NULL),
(33, 'accounting_and_finance', 32, NULL, 'common', NULL, NULL),
(34, 'advertising', 32, NULL, 'common\n\n', NULL, NULL),
(35, 'art_and_design_and_media', 32, NULL, 'common', NULL, NULL),
(36, 'business_and_management', 32, NULL, 'common', NULL, NULL),
(37, 'cleaning', 32, NULL, 'common', NULL, NULL),
(38, 'construction', 32, NULL, 'common', NULL, NULL),
(39, 'customer_service', 32, NULL, 'common', NULL, NULL),
(40, 'education', 32, NULL, 'common', NULL, NULL),
(41, 'everything_else', 32, NULL, 'common', NULL, NULL),
(42, 'fashion', 32, NULL, 'common', NULL, NULL),
(43, 'healthcare', 32, NULL, 'common', NULL, NULL),
(44, 'internet_engineering', 32, NULL, 'common', NULL, NULL),
(45, 'legal', 32, NULL, 'common', NULL, NULL),
(46, 'manual_labor', 32, NULL, 'common', NULL, NULL),
(47, 'marketing', 32, NULL, 'common', NULL, NULL),
(48, 'real_estate', 32, NULL, 'common', NULL, NULL),
(49, 'retail', 32, NULL, 'common', NULL, NULL),
(50, 'sales', 32, NULL, 'common', NULL, NULL),
(51, 'technology', 32, NULL, 'common', NULL, NULL),
(52, 'telecommunications', 32, NULL, 'common', NULL, NULL),
(53, 'transportation_and_Travel', 32, NULL, 'common', NULL, NULL),
(54, 'work_at_home', 32, NULL, 'common', NULL, NULL),
(55, 'home_and_personal_items\r\n', 0, 'fa-wrench', 'common', NULL, NULL),
(56, 'clothes,_footwear_and_accessories', 55, NULL, 'common', NULL, NULL),
(57, 'kitchenware_items', 55, NULL, 'common', NULL, NULL),
(58, 'light_fittings', 55, NULL, 'common', NULL, NULL),
(59, 'bathroom_fittings_and_AC', 55, NULL, 'common', NULL, NULL),
(60, 'health_and_beauty', 55, NULL, 'common', NULL, NULL),
(61, 'art_and_antiques', 55, NULL, 'common', NULL, NULL),
(62, 'ornaments,_carpets_and_decos', 55, NULL, 'common', NULL, NULL),
(63, 'children\'s_items', 55, NULL, 'common', NULL, NULL),
(64, 'garden_items_and_tools', 55, NULL, 'common', NULL, NULL),
(65, 'other_home_and_personal_items', 55, NULL, 'common', NULL, NULL),
(66, 'furniture', 0, 'fa-futbol', 'common', NULL, NULL),
(67, 'chairs_and_tables', 66, NULL, 'common', NULL, NULL),
(68, 'living_room_furniture', 66, NULL, 'common', NULL, NULL),
(69, 'bedroom_furniture', 66, NULL, 'common', NULL, NULL),
(70, 'shelves_and_storage', 66, NULL, 'common', NULL, NULL),
(71, 'TV_and_stereo_furniture', 66, NULL, 'common', NULL, NULL),
(72, 'other_furniture', 66, '', 'common', NULL, NULL),
(73, 'leisure,_sport_and_hobby', 0, 'fa-futbol', 'common', NULL, NULL),
(74, 'musical_instruments', 73, NULL, 'common', NULL, NULL),
(75, 'sports_equipment', 73, NULL, 'common', NULL, NULL),
(76, 'movies,_books_and_magazines', 73, NULL, 'common', NULL, NULL),
(77, 'event_tickets_and_vouchers', 73, NULL, 'common', NULL, NULL),
(78, 'other_leisure,_sport_and_hobby', 73, NULL, 'common', NULL, NULL),
(79, 'education', 0, 'fa-graduation-cap', 'common', NULL, NULL),
(80, 'books', 79, NULL, 'common', NULL, NULL),
(81, 'other_education', 79, NULL, 'common', NULL, NULL),
(82, 'services', 0, 'fa-ship', 'common', NULL, NULL),
(83, 'auto', 82, NULL, 'common', NULL, NULL),
(84, 'child_and_elder_care', 82, NULL, 'common', NULL, NULL),
(85, 'cleaning_services', 82, NULL, 'common', NULL, NULL),
(86, 'computer_services', 82, NULL, 'common', NULL, NULL),
(87, 'creative_and_printing', 82, NULL, 'common', NULL, NULL),
(88, 'everything_else', 82, NULL, 'common', NULL, NULL),
(89, 'financial', 82, NULL, 'common', NULL, NULL),
(90, 'food_and_restaurants', 82, NULL, 'common', NULL, NULL),
(91, 'health_and_beauty', 82, NULL, 'common', NULL, NULL),
(92, 'household', 82, NULL, 'common', NULL, NULL),
(93, 'landscaping', 82, NULL, 'common', NULL, NULL),
(94, 'lessons', 82, NULL, 'common', NULL, NULL),
(95, 'translation', 82, NULL, 'common', NULL, NULL),
(96, 'moving_or_removals', 82, NULL, 'common', NULL, NULL),
(97, 'food_and_agriculture', 0, 'fa-coffee', 'common', NULL, NULL),
(98, 'crops,_seeds_and_plants', 97, NULL, 'common', NULL, NULL),
(99, 'fish_and_meat', 97, NULL, 'common', NULL, NULL),
(100, 'fruits', 97, NULL, 'common', NULL, NULL),
(101, 'vegetables', 97, NULL, 'common', NULL, NULL),
(102, 'other_food_and_agriculture', 97, NULL, 'common', NULL, NULL),
(105, 'other_items', -1, NULL, 'common', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guest_users`
--

CREATE TABLE `guest_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guest_users`
--

INSERT INTO `guest_users` (`user_id`, `user_name`, `contact_name`, `email`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'nilanka', 'nilanka', 'nilankajayashan9@gmail.com', '0711308100', NULL, '2022-06-06 21:22:21', '2022-06-06 21:22:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_18_044306_create_admin_users_table', 1),
(6, '2022_01_19_105209_create_categories_table', 1),
(15, '2022_03_19_103539_create_guest_users_table', 3),
(16, '2022_03_07_094445_create_ads_table', 4),
(18, '2022_04_19_132403_create_sub_filters_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_filters`
--

CREATE TABLE `sub_filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filter_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `steps` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_filters`
--

INSERT INTO `sub_filters` (`id`, `category_id`, `category_name`, `filter`, `filter_list`, `additional_text`, `steps`, `created_at`, `updated_at`) VALUES
(1, 2, 'car', 'body_style', '[\"Hatchback\",\"Saloon\",\"Estate\",\"Convertible\",\"People Carrier\",\"Coupe\",\"4x4 - Jeeps\",\"Cabrio\",\"Pickup\",\"MPV\",\"Kit Car\",\"Others\"]', NULL, 0, NULL, NULL),
(2, 2, 'car', 'transmission', '[\"Manual\",\"Automatic\",\"Semi-Automatic\",\"Other\"]', NULL, 0, NULL, NULL),
(3, 2, 'car', 'fuel', '[\"Petrol\",\"Diesel\",\"Hybrid\",\"Electric\",\"LPG\",\"Other\"]', NULL, 0, NULL, NULL),
(4, 2, 'car', 'doors', '[2,3,4,5,\"Other\"]', NULL, 0, NULL, NULL),
(5, 2, 'car', 'color', '[\"Beige\",\"Black\",\"Blue\",\"Brown\",\"Burgundy| Maroon\",\"Cream| Pearl\",\"Gold\",\"Green\",\"Grey\",\"Orange\",\"Purple\",\"Red\",\"Silver\",\"Turquoise| Teal\",\"White\",\"Yellow\",\"Other\"]\n\n', NULL, 0, NULL, NULL),
(6, 2, 'car', 'condition', '[\"New\",\"used\",\"others\"]', NULL, 0, NULL, NULL),
(7, 7, 'boats_and_water_transport', 'fuel', '[\"Petrol\",\"Diesel\",\"Hybrid\",\"Electric\",\"LPG\",\"others\"]', NULL, 0, NULL, NULL),
(8, 7, 'boats_and_water_transport', 'condition', '[\"New\",\"Used\",\"Certified Pre-Owned\",\"others\"]', NULL, 0, NULL, NULL),
(9, 7, 'boats_and_water_transport', 'type', '[\"Power Boats\",\"Sail Boats\",\"Fishing Boats\",\"House Boats\",\"Motor Yachts\",\"Speed Boats\",\"Personal Watercraft\",\"Boat Accessories\",\"Others\"]', NULL, 0, NULL, NULL),
(10, 7, 'boats_and_water_transport', 'hull_type', '[\"Aluminum\",\"Ferro-Cement\",\"Fiberglass|Composite\",\"Fiberglass Reinforced\",\"Hypalon\",\"Inflatable\",\"PVC\",\"Plastic\",\"Rigid Inflatable\",\"Steel\",\"Wood\",\"Others\"]', NULL, 0, NULL, NULL),
(11, 7, 'boats_and_water_transport', 'hull_type', '[\"Aluminum\",\"Ferro-Cement\",\"Fiberglass|Composite\",\"Fiberglass Reinforced\",\"Hypalon\",\"Inflatable\",\"PVC\",\"Plastic\",\"Rigid Inflatable\",\"Steel\",\"Wood\",\"Others\"]', NULL, 0, NULL, NULL),
(12, 6, 'commercial_trucks_and_lorries', 'transmission', '[\"Manual\",\"Automatic\",\"Semi-Automatic\",\"Others\"]', NULL, 0, NULL, NULL),
(13, 6, 'commercial_trucks_and_lorries', 'fuel', '[\"Petrol\",\"Diesel\",\"Hybrid\",\"Electric\",\"LPG\",\"others\"]', NULL, 0, NULL, NULL),
(14, 6, 'commercial_trucks_and_lorries', 'color', '[\"Beige\",\"Black\",\"Blue\",\"Brown\",\"Burgundy| Maroon\",\"Cream| Pearl\",\"Gold\",\"Green\",\"Grey\",\"Orange\",\"Purple\",\"Red\",\"Silver\",\"Turquoise| Teal\",\"White\",\"Yellow\",\"others\"]', NULL, 0, NULL, NULL),
(15, 6, 'commercial_trucks_and_lorries', 'condition', '[\"New\",\"Used\",\"Certified Pre-Owned\",\"others\"]', NULL, 0, NULL, NULL),
(16, 3, 'Motorbikes_and_Scooters', 'transmission', '[\"Manual\",\"Automatic\",\"Semi-Automatic\",\"others\"]', NULL, 0, NULL, NULL),
(17, 3, 'Motorbikes_and_Scooters', 'fuel', '[\"Petrol\",\"Diesel\",\"Hybrid\",\"Electric\",\"LPG\",\"others\"]', NULL, 0, NULL, NULL),
(18, 3, 'Motorbikes_and_Scooters', 'condition', '[\"New\",\"Used\",\"Certified Pre-Owned\",\"others\"]', NULL, 0, NULL, NULL),
(19, 9, 'other_vehicles', 'fuel', '[\"Petrol\",\"Diesel\",\"Hybrid\",\"Electric\",\"LPG\",\"others\"]', NULL, 0, NULL, NULL),
(20, 9, 'other_vehicles', 'condition', '[\"New\",\"Used\",\"Certified Pre-Owned\",\"others\"]', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remove_state` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `contact_name`, `email`, `address`, `phone`, `password`, `remove_state`, `remember_token`, `created_at`, `updated_at`) VALUES
(15, 'nilankajayashan9@gmail.com', 'nilanka', 'nilankajayashan9@gmail.com', 'okay', '0711308100', '$2y$10$dZ8xz0uHX1QDAgfD/AiwU.jhNqnZ4ok9Elub.g63mukpksbEabKny', 0, NULL, '2022-05-23 06:16:11', '2022-05-23 06:16:11'),
(16, 'nilanka', 'nilanka', 'nilankajayashan@gmail.com', 'okay', '0711308100', '$2y$10$Ba8A4eg7Mi.Lbh7902V2furakJRD45c6F3STRcLnScWmS5FIs/XKe', 0, NULL, '2022-06-04 15:04:47', '2022-06-04 16:55:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_users_email_unique` (`email`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guest_users`
--
ALTER TABLE `guest_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `guest_users_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sub_filters`
--
ALTER TABLE `sub_filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guest_users`
--
ALTER TABLE `guest_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_filters`
--
ALTER TABLE `sub_filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
