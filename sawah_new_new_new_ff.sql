-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2025 at 12:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sawah_new_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'admin@example.com', '$2y$12$65BLbJnwTPvNrimmW6CK/O22FYDK6ghMmLYOucw.VRc2B7pYlRV.S', '2025-08-02 15:27:14', '2025-08-02 15:27:14'),
(2, 'R', 'R@gmail.com', '1234', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'بانتظار المراجعة',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `trip_id`, `message`, `status`, `created_at`, `updated_at`, `phone`, `notes`, `name`, `email`) VALUES
(1, 1, 4, 'حجز تلقائي عبر زر احجز الآن', 'pending', '2025-08-02 16:21:09', '2025-08-02 16:21:09', NULL, NULL, 'manar', 'manar@gmail.com'),
(2, 2, 3, 'تم الحجز السريع', 'pending', '2025-08-02 16:40:07', '2025-08-02 16:40:07', '1234567890', NULL, NULL, NULL),
(3, 2, 3, 'حجز تلقائي عبر زر احجز الآن', 'pending', '2025-08-02 16:50:13', '2025-08-02 16:50:13', '1234567890', NULL, NULL, NULL),
(17, 11, 3, NULL, 'accepted', '2025-08-03 16:25:42', '2025-08-03 16:26:25', NULL, NULL, NULL, NULL),
(18, 12, 4, NULL, 'pending', '2025-08-03 16:45:09', '2025-08-03 16:46:29', NULL, NULL, NULL, NULL),
(19, 12, 5, NULL, 'rejected', '2025-08-03 16:45:18', '2025-08-03 16:46:27', NULL, NULL, NULL, NULL),
(28, 14, 11, NULL, 'accepted', '2025-08-06 11:22:45', '2025-08-06 11:23:28', NULL, NULL, NULL, NULL),
(29, 14, 3, NULL, 'بانتظار المراجعة', '2025-08-06 15:12:29', '2025-08-06 15:12:29', NULL, NULL, NULL, NULL),
(30, 15, 3, NULL, 'بانتظار المراجعة', '2025-08-06 16:37:07', '2025-08-06 16:37:07', NULL, NULL, NULL, NULL),
(31, 15, 8, NULL, 'بانتظار المراجعة', '2025-08-06 16:38:21', '2025-08-06 16:38:21', NULL, NULL, NULL, NULL),
(32, 15, 14, NULL, 'بانتظار المراجعة', '2025-08-06 16:38:52', '2025-08-06 16:38:52', NULL, NULL, NULL, NULL),
(33, 15, 14, NULL, 'بانتظار المراجعة', '2025-08-06 16:39:48', '2025-08-06 16:39:48', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(18, '0001_01_01_000000_create_users_table', 1),
(19, '0001_01_01_000001_create_cache_table', 1),
(20, '0001_01_01_000002_create_jobs_table', 1),
(21, '2025_07_31_183242_create_trips_table', 1),
(22, '2025_07_31_183243_create_bookings_table', 1),
(23, '2025_07_31_183244_create_messages_table', 1),
(24, '2025_07_31_183245_create_recommendations_table', 1),
(25, '2025_07_31_183246_create_trip_images_table', 1),
(26, '2025_08_02_145850_create_admins_table', 1),
(27, '2025_08_02_153935_add_email_verified_at_to_users_table', 1),
(28, '2025_08_02_172758_update_bookings_table_add_columns', 1),
(29, '2025_08_02_173321_add_contact_fields_to_bookings_table', 1),
(30, '2025_08_02_174744_add_phone_to_users_table', 1),
(31, '2025_08_02_180016_add_phone_to_users_table', 1),
(32, '2025_08_02_185510_add_user_info_to_bookings_table', 2),
(33, '2025_08_03_140051_create_suggestions_table', 3),
(34, '2025_08_03_142509_modify_status_column_in_bookings_table', 4),
(35, '2025_08_03_184552_add_user_id_to_suggestions_table', 5),
(36, '2025_08_03_184901_add_title_to_suggestions_table', 6),
(37, '2025_08_03_185222_add_message_to_suggestions_table', 7),
(38, '2025_08_05_165645_add_background_image_to_trips_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommendations`
--

CREATE TABLE `recommendations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('YNuPLrf5D9RASnWjEszCy1ye00jqxxxnqkYpWwvA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTjVIUnNRRU1zYWV2UXZIU3dKNHVSRHc1UkJJM3RrVk9ZbnlUOXNCVyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob21lIjt9fQ==', 1754518404);

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suggestions`
--

INSERT INTO `suggestions` (`id`, `user_id`, `title`, `message`, `created_at`, `updated_at`) VALUES
(2, 11, 'مكه', 'اضافة مدينة مكه', '2025-08-03 16:25:20', '2025-08-03 16:25:20'),
(3, 12, 'لندن', 'اضافة مدينة لندن', '2025-08-03 16:48:09', '2025-08-03 16:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `location` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `title`, `description`, `price`, `location`, `image`, `background_image`, `created_at`, `updated_at`) VALUES
(3, 'رحلة الى جزيرة شيبارة', 'جزيرة شيباره تعانق البحر بحنان، بمياهها الصافية التي تكشف أعماقها بكل وضوح. الرمال البيضاء كأنها لوح نقيّ مرسوم بعناية، والهواء محمّل برائحة البحر المنعشة. الغوص هنا تجربة سحرية، حيث الأسماك الملونة تسبح حولك دون خوف، وتضاريس الشعب المرجانية تخلق مشهدًا بديعًا لا يُنسى. الهدوء التام يغمرك وكأن العالم اختفى من حولك.', 7000.00, 'السعودية - تبوك', 'places/جزيرة شيبارة.jpg', NULL, '2025-08-02 15:27:14', '2025-08-02 15:27:14'),
(4, 'رحلة الى جزيرة فرسان', 'فرسان هي الجمال الخالص، بمياهها الفيروزية النقية وشواطئها البيضاء الممتدة. الشعاب المرجانية تنبض بالحياة تحت سطح البحر، والأصداف تنتشر على الرمال كأنها هدايا الطبيعة. البيوت الأثرية تعكس عراقة المجتمع البحري، وسكون البحر يمنح الروح راحة لا تُقارن. ألوان الغروب على الجزيرة تذيب القلب وتترك في النفس سلامًا عميقًا.', 1500.00, 'السعودية - جازان', 'places/جزيرة فرسان.jpg', NULL, '2025-08-02 15:27:14', '2025-08-02 15:27:14'),
(5, 'رحلة الى الرياض', 'في قلب المملكة، تنبض الرياض بالحياة والحداثة، حيث تلتقي ناطحات السحاب بروح الصحراء الأصيلة. برج المملكة يعانق السماء، والأسواق القديمة تفوح منها رائحة التاريخ. في بوليفارد الرياض تنتشر الفعاليات الترفيهية والمطاعم العالمية، وحديقة الملك عبدالله تتلألأ مساءً بأضوائها الساحرة. شوارع الرياض تمزج بين الفخامة والعراقة، والمباني تروي قصة مدينة تتجدد باستمرار.', 3000.00, 'السعودية - الرياض', 'places/الرياض.jpg', NULL, '2025-08-02 15:27:14', '2025-08-02 15:27:14'),
(8, 'رحلة الى جبال فيفا', 'جبال فيفا تحتضن الغيوم في قممها، وتتدلى منها مدرجات خضراء كأنها لوحات مرسومة. النباتات تنمو بغزارة، والأزهار البرية تملأ المكان بعطرها. البيوت معلّقة على الجبال كأنها تحدّثك عن أهلها وتاريخها. نسيم الجبل منعش، والمشهد العام يغذي الروح بجمال طبيعي لا يُضاهى. هنا تنبع الحياة من الأرض، وتستيقظ المشاعر في كل خطوة.', 1200.00, 'السعودية - جازان', 'places/جبال فيفا.jpg', NULL, NULL, NULL),
(11, 'رحلة الى مكة المكرمة و المدينة المنورة', 'في مكة، تخفق القلوب مع كل خطوة في الحرم المكي، والكعبة المشرفة تحيطها هيبة لا يمكن وصفها بالكلمات. وفي المدينة، يملأ السكون أرجاء المسجد النبوي، وتغمر الطمأنينة الزائر من اللحظة الأولى. المآذن البيضاء تعانق السماء، والأرض تفوح منها روحانية خالدة. المشاعر هنا لا تكتب، بل تُحس وتُسكب دموعًا صامتة.', 2000.00, 'السعودية - مكة المكرمة المدينة المنورة', 'places/مكة.jpg', 'backgrounds/مكة المدينة.jpg', NULL, '2025-08-06 14:16:33'),
(12, 'رحلة الى العلا', 'في العلا، تتحدث الصخور، وتروي الأرض حكايات حضارات مضت. مدائن صالح تقف شامخة بأعمدتها ونقوشها، وصخرة الفيل تُدهش الناظر بجمال تكوينها. الكثبان الرملية تتلوّن مع الشمس، والسماء تتّسع بلا نهاية. المشي بين الأودية يشبه التجوال في كتابٍ مفتوح من التاريخ، وكل زاوية هنا تنبض بعظمة الماضي ودهشة الحاضر.', 5000.00, 'السعودية-العلا', 'places/ZGSkRpdACO4UjmNjiFuHOHM66uLyl36g7xKTrhxs.png', 'backgrounds/QeN2ZlOhMB4Lk3XeVxZutiqGAH4DGV3NGQBfluYB.jpg', '2025-08-06 14:54:30', '2025-08-06 14:54:30'),
(13, 'رحلة الى ابها', 'أبها تتوشح بالضباب في الصباح، وتتلوّن في المساء بألوان الغروب على قمم الجبال. الأشجار الكثيفة تملأ الجبال، والهواء نقيّ كأنك تتنفس من السماء. المباني التراثية تزيّن الأحياء، والأنشطة الترفيهية تنبض بالحياة في وسط المدينة. منحدرات السودة الشاهقة تطل على مشاهد تأسر العين، والجو اللطيف يلامس القلب بفرح هادئ.', 1500.00, 'السعودية - أبها', 'places/tnblR7AGVAcjACPIVxxj6ExbhaNShA2nkDp5scUF.jpg', 'backgrounds/CY2RLKuZkUqYLpWiwjbiBozO1EIUkemITi3upwcJ.jpg', '2025-08-06 14:59:09', '2025-08-06 14:59:09'),
(14, 'رحلة الى جزيرة بياضه', 'رمال جزيرة بياضة بيضاء كأنها لم تُمس، والمياه المحيطة بها بلون فيروزي نقيّ يسرّ العين. القوارب تنساب على سطح البحر بهدوء، والغوص في الشعاب المرجانية يكشف عالماً سريًا مليئًا بالألوان. الجزيرة صغيرة لكن تأثيرها كبير على القلب؛ بساطتها تجذبك، وسكونها يمنحك سلامًا قلّ نظيره.', 1200.00, 'السعودية - جده', 'places/E1jiZ3MpMhYY49ZaXyhzZeSAAduIurkARl3jnnnQ.jpg', 'backgrounds/1wefe4aSoWYVd1oneygydzNjxS3AATvZvi6cIXKj.jpg', '2025-08-06 15:05:04', '2025-08-06 15:05:04'),
(15, 'رحلة الى القصيم', 'في قلب نجد، تحتضن القصيم تنوعًا ساحرًا بين الحداثة والأصالة.\nفي بريدة، تصدح أسواق التمور كل صباح بنداء الباعة وعطر الرُطَب الطازج، ويقف برج بريدة شامخًا بجوار الحدائق النابضة بالحياة.\nأما عنيزة، فهي هدوءٌ جميلٌ يتغلغل في النفس، بأسواقها الشعبية مثل المسوكف، وأزقتها القديمة التي تروي قصص التجار والعشاق والعابرين.\nوفي الرس، تتفتح المساحات الرحبة للأنشطة والمهرجانات، حيث الساحات والحدائق الممتدة، وروح المدينة الودودة التي تشعّ دفئًا في كل زاوية.\nالسماء صافية، والنخيل يشهد على الكرم، والبيوت القديمة تُشعرك وكأنك عدت إلى زمنٍ أصيل، لا يُنسى.', 1000.00, 'السعودية - القصيم', 'places/NkxIuvSvNkRobiP3KaFYwJb4mDtw5fFs9hXhjpKA.jpg', 'backgrounds/kamqZQ139dKvU37b508xw0Ml8BRQAzsIGj9zy2K5.jpg', '2025-08-06 16:00:33', '2025-08-06 16:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `trip_images`
--

CREATE TABLE `trip_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trip_images`
--

INSERT INTO `trip_images` (`id`, `trip_id`, `image_url`, `created_at`, `updated_at`) VALUES
(11, 11, 'photo/مكه4.jpg', '2025-08-06 14:16:33', '2025-08-06 14:16:33'),
(12, 11, 'photo/مكه3.jpg', '2025-08-06 14:16:33', '2025-08-06 14:16:33'),
(13, 11, 'photo/مكه2.jpg', '2025-08-06 14:16:33', '2025-08-06 14:16:33'),
(14, 11, 'photo/مكه1.jpg', '2025-08-06 14:16:33', '2025-08-06 14:16:33'),
(15, 3, 'photo/شيباره4.jpg', '2025-08-06 14:22:49', '2025-08-06 14:22:49'),
(16, 3, 'photo/شيباره3.jpg', '2025-08-06 14:22:49', '2025-08-06 14:22:49'),
(17, 3, 'photo/شيباره2.jpg', '2025-08-06 14:22:49', '2025-08-06 14:22:49'),
(18, 3, 'photo/شيباره1.jpg', '2025-08-06 14:22:49', '2025-08-06 14:22:49'),
(19, 4, 'photo/فرسان4.jpg', '2025-08-06 14:32:01', '2025-08-06 14:32:01'),
(20, 4, 'photo/فرسان3.jpg', '2025-08-06 14:32:01', '2025-08-06 14:32:01'),
(21, 4, 'photo/فرسان2.jpg', '2025-08-06 14:32:01', '2025-08-06 14:32:01'),
(22, 4, 'photo/فرسان1.jpg', '2025-08-06 14:32:01', '2025-08-06 14:32:01'),
(23, 8, 'photo/فيفا4.jpg', '2025-08-06 14:35:58', '2025-08-06 14:35:58'),
(24, 8, 'photo/فيفا3.jpg', '2025-08-06 14:35:58', '2025-08-06 14:35:58'),
(25, 8, 'photo/فيفا2.jpg', '2025-08-06 14:35:58', '2025-08-06 14:35:58'),
(26, 8, 'photo/فيفا1.jpg', '2025-08-06 14:35:58', '2025-08-06 14:35:58'),
(27, 12, 'photo/العلا4.jpg', '2025-08-06 14:54:30', '2025-08-06 14:54:30'),
(28, 12, 'photo/العلا3.jpg', '2025-08-06 14:54:30', '2025-08-06 14:54:30'),
(29, 12, 'photo/العلا2.jpg', '2025-08-06 14:54:30', '2025-08-06 14:54:30'),
(30, 12, 'photo/العلا1.jpg', '2025-08-06 14:54:30', '2025-08-06 14:54:30'),
(31, 13, 'photo/ابها4.jpg', '2025-08-06 14:59:09', '2025-08-06 14:59:09'),
(32, 13, 'photo/ابها3.jpg', '2025-08-06 14:59:09', '2025-08-06 14:59:09'),
(33, 13, 'photo/ابها2.jpg', '2025-08-06 14:59:09', '2025-08-06 14:59:09'),
(34, 13, 'photo/ابها1.jpg', '2025-08-06 14:59:09', '2025-08-06 14:59:09'),
(35, 5, 'photo/الرياض4.jpg', '2025-08-06 15:02:10', '2025-08-06 15:02:10'),
(36, 5, 'photo/الرياض3.jpg', '2025-08-06 15:02:10', '2025-08-06 15:02:10'),
(37, 5, 'photo/الرياض2.jpg', '2025-08-06 15:02:10', '2025-08-06 15:02:10'),
(38, 5, 'photo/الرياض1.jpg', '2025-08-06 15:02:10', '2025-08-06 15:02:10'),
(39, 14, 'photo/بياضه4.jpg', '2025-08-06 15:05:04', '2025-08-06 15:05:04'),
(40, 14, 'photo/بياضه3.jpg', '2025-08-06 15:05:04', '2025-08-06 15:05:04'),
(41, 14, 'photo/بياضه2.jpg', '2025-08-06 15:05:04', '2025-08-06 15:05:04'),
(42, 14, 'photo/بياضه1.jpg', '2025-08-06 15:05:04', '2025-08-06 15:05:04'),
(43, 15, 'photo/القصيم66.jpg', '2025-08-06 16:00:33', '2025-08-06 16:00:33'),
(44, 15, 'photo/القصيم55.jpg', '2025-08-06 16:00:33', '2025-08-06 16:00:33'),
(45, 15, 'photo/القصيم44.jpg', '2025-08-06 16:00:33', '2025-08-06 16:00:33'),
(46, 15, 'photo/القصيم33.jpg', '2025-08-06 16:00:33', '2025-08-06 16:00:33'),
(47, 15, 'photo/القصيم22.jpg', '2025-08-06 16:00:33', '2025-08-06 16:00:33'),
(48, 15, 'photo/القصيم11.jpg', '2025-08-06 16:00:33', '2025-08-06 16:00:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`) VALUES
(1, 'manar', 'manar@gmail.com', NULL, '$2y$12$43Da5AphDiBSIPzhPQSehueRYtOSl0IK2Ti82xpGzLsLQa8RVYw6a', 'member', NULL, '2025-08-02 16:20:59', '2025-08-02 16:20:59', NULL),
(2, 'aa', 'jjjjj@ghjkl.com', '1234567890', '$2y$12$wfcqNszsGRxTuGgen12FD.3zM91rCjbfO2x6vdRfc0TDFe6N5hQNq', 'member', NULL, '2025-08-02 16:39:56', '2025-08-02 16:39:56', NULL),
(3, 'jjjjj', 'gggggggg@ssss.com', '1234567890', '$2y$12$tH1VKwk9EqVsIGOVFM/ypusYR3B1NVZXqoAcrL.NP58Pihs7IoUgi', 'member', NULL, '2025-08-02 17:03:12', '2025-08-02 17:03:12', NULL),
(4, 'gg', 'aa@aaaaa.com', '1234567890', '$2y$12$pu4sKGwY4klEky08N1gs5e8zaocglSB44DfIJeADe6MToIuc.vq.2', 'member', NULL, '2025-08-03 09:15:11', '2025-08-03 09:15:11', NULL),
(5, 'gg', 'hhh@gmailcom', '1234567890', '$2y$12$mfIAfmQvBc1qwAPrtN7Vvu5WLYSpzxIwh1WCNb7rgVokvFVbXa9mS', 'member', NULL, '2025-08-03 10:39:20', '2025-08-03 10:39:20', NULL),
(6, 'manar', 'manar@example.com', '1234567890', '$2y$12$nmtposRY9c7P2G0LDijXXOC4/F1bMEipU209g..VljAkhXmd8ONRi', 'member', NULL, '2025-08-03 12:18:56', '2025-08-03 12:18:56', NULL),
(7, 'a', 'a@aaa.com', '1234567890', '$2y$12$mmPok7OMO2B5/47YoFSzyOiOHNLm6kDwnkTWMRb8y1iOVs94kLpkC', 'member', NULL, '2025-08-03 12:24:02', '2025-08-03 12:24:02', NULL),
(8, 'nada', 'nada@gmail.com', '0555555555', '$2y$12$wsO3.djAZYM0Y8KOwSobmulclAdEu6cABQ7/OA2swqUROXdWC1fsO', 'member', NULL, '2025-08-03 14:03:45', '2025-08-03 14:03:45', NULL),
(9, 'aseel', 'aseel@gmail.com', '0555555555', '$2y$12$ZSHrwSWRd9vp49jShRJlW.nics9MKKwNkQUPip10D.jixi8vz94Wy', 'member', NULL, '2025-08-03 15:33:47', '2025-08-03 15:33:47', NULL),
(10, 'nada9', 'nada99@gmail.com', '0555555555', '$2y$12$m6DJHdZhGI0qdZnK6iM4cONZrZZ5iVPSV/AYZJ8/dNKNAGWkOMGB2', 'member', NULL, '2025-08-03 16:03:29', '2025-08-03 16:03:29', NULL),
(11, 'raghad', 'raghad@gmail.com', '0555555555', '$2y$12$GIvQ2lM/PfLpaeBI5uEeGO/g/Clzze.eEOMk6PJgF4urLIcG39rKK', 'member', NULL, '2025-08-03 16:24:54', '2025-08-03 16:24:54', NULL),
(12, 'ahmad', 'ahmad@gmail.com', '0555555555', '$2y$12$ijfDS6vCMkZ.ZBxmivURwOcK/gId.nWD9lOgqEU.PcPT3I/GSREFK', 'member', NULL, '2025-08-03 16:45:01', '2025-08-03 16:45:01', NULL),
(13, 'Remaz', 'rimazrimaz900@gmail.com', '0395837625', '$2y$12$VwfbeJkbA8iCwoPt3g54aOKxKB67fuwXustnXg./EooS4XhOSI8TK', 'member', NULL, '2025-08-03 20:20:57', '2025-08-03 20:20:57', NULL),
(14, 'nn', 'nn@gmail.com', '0555555555', '$2y$12$ZHv0cAfwxfquFnknYXXeueCU./t5JeSjFH0TyVmJfahJ6rL6kn6Bq', 'member', NULL, '2025-08-06 11:21:32', '2025-08-06 11:21:32', NULL),
(15, 'manar', 'manar12@gmail.com', '0512367894', '$2y$12$fv9gTcXkpDWwB05tJb6LPunJ2uFf0UeWYjVPYj8f2a1h6nnljgHjy', 'member', NULL, '2025-08-06 16:36:32', '2025-08-06 16:36:32', NULL),
(16, 'maram', 'maram@gmail.com', '0512367894', '$2y$12$fcKL3odl.cNUgA5alHmPReaAQgdfYnNqjKNU80WEVu13mwoj8wuGy', 'member', NULL, '2025-08-06 17:18:37', '2025-08-06 17:18:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recommendations_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suggestions_user_id_foreign` (`user_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_images`
--
ALTER TABLE `trip_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trip_images_trip_id_foreign` (`trip_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `recommendations`
--
ALTER TABLE `recommendations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `trip_images`
--
ALTER TABLE `trip_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recommendations`
--
ALTER TABLE `recommendations`
  ADD CONSTRAINT `recommendations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD CONSTRAINT `suggestions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trip_images`
--
ALTER TABLE `trip_images`
  ADD CONSTRAINT `trip_images_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
