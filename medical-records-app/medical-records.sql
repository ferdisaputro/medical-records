-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 02:57 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medical-records`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prsc_number` bigint(20) UNSIGNED NOT NULL,
  `medicine_code` bigint(20) UNSIGNED NOT NULL,
  `dose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pcs` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `prsc_number`, `medicine_code`, `dose`, `pcs`, `sub_total`, `created_at`, `updated_at`) VALUES
(1, 1003, 1003, '4/d', 5, 127417, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(2, 1001, 1004, '4/d', 1, 71133, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(3, 1003, 1000, '4/d', 1, 63686, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(4, 1001, 1003, '2/d', 3, 195506, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(5, 1001, 1001, '1/d', 2, 150207, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(6, 1004, 1000, '1/d', 1, 119852, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(7, 1050, 1048, '1/d', 2, 96656, '2023-02-06 08:25:44', '2023-02-06 08:25:44'),
(8, 1050, 1049, '3/d', 1, 99611, '2023-02-06 09:05:44', '2023-02-06 09:05:44'),
(9, 1051, 1034, '2/d', 2, 46130, '2023-02-07 01:33:52', '2023-02-07 01:33:52'),
(10, 1051, 1031, '1/d', 1, 89050, '2023-02-07 01:33:52', '2023-02-07 01:33:52'),
(11, 1051, 1002, '3/d', 1, 48461, '2023-02-07 01:33:52', '2023-02-07 01:33:52'),
(12, 1051, 1004, '2/d', 1, 64638, '2023-02-07 01:33:52', '2023-02-07 01:33:52'),
(13, 1051, 1000, '2/d', 1, 7859, '2023-02-07 01:33:52', '2023-02-07 01:33:52'),
(14, 1051, 1046, '2/d', 1, 94940, '2023-02-07 01:39:08', '2023-02-07 01:39:08'),
(15, 1053, 1049, '1/d', 1, 99611, '2023-02-07 06:55:13', '2023-02-07 06:55:13'),
(16, 1054, 1050, '1/d', 1, 8000, '2023-02-08 01:56:36', '2023-02-08 01:56:36'),
(17, 1054, 1047, '2/d', 1, 86597, '2023-02-08 01:56:36', '2023-02-08 01:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_code` bigint(20) UNSIGNED NOT NULL,
  `doctor_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poly_code` bigint(20) UNSIGNED DEFAULT NULL,
  `fee` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_code`, `doctor_name`, `specialist`, `doctor_address`, `doctor_number`, `poly_code`, `fee`, `created_at`, `updated_at`) VALUES
(1000, 'Dr.rozali', 'gigi', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum temporibus quisquam nihil voluptate enim eveniet quas, dolore ut ratione sit.', '081234541235', 1000, 30000, '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1001, 'Dr.risa', 'gigi', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum temporibus quisquam nihil voluptate enim eveniet quas, dolore ut ratione sit.', '081234541235', 1000, 30000, '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1002, 'mayang ', 'umum', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum temporibus quisquam nihil voluptate enim eveniet quas, dolore ut ratione sit.', '081234541235', 1001, 30000, '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1003, 'munkar', 'umum', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum temporibus quisquam nihil voluptate enim eveniet quas, dolore ut ratione sit.', '081234541235', 1001, 30000, '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1004, 'rozak', 'mata', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum temporibus quisquam nihil voluptate enim eveniet quas, dolore ut ratione sit.', '081234541235', 1002, 30000, '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1005, 'Dr. mamank', 'mata', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum temporibus quisquam nihil voluptate enim eveniet quas, dolore ut ratione sit.', '081234541235', 1002, 30000, '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1006, 'Drs hadi purnomo', 'kulit dan kelamin', 'Wedoro candi', '081235123561', 1003, 30000, '2023-02-07 01:25:22', '2023-02-07 01:25:22'),
(1007, 'bambang wijaya', 'kulit dan kelamin', 'Wedoro candi', '012348215671', 1003, 40000, '2023-02-08 00:45:22', '2023-02-08 00:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `medicine_code` bigint(20) UNSIGNED NOT NULL,
  `medicine_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medicine_price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`medicine_code`, `medicine_name`, `medicine_type`, `category`, `medicine_price`, `stock`, `created_at`, `updated_at`) VALUES
(1000, 'ex sint et', 'drops', 'herbs', 7859, 112, '2023-02-06 07:35:57', '2023-02-07 01:41:11'),
(1001, 'soluta autem ut', 'pil', 'herbs', 29351, 34, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1002, 'modi dicta esse', 'syrup', 'free medicine', 48461, 57, '2023-02-06 07:35:57', '2023-02-07 01:41:11'),
(1003, 'quos minima amet', 'cream', 'limited free', 86858, 20, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1004, 'voluptatem et quam', 'tablet', 'drugs', 64638, 38, '2023-02-06 07:35:57', '2023-02-07 01:41:11'),
(1005, 'quia sint voluptas', 'capsule', 'limited free', 91519, 99, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1006, 'dolor ducimus quisquam', 'cream', 'free medicine', 32177, 58, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1007, 'aut ut atque', 'ointment', 'limited free', 8504, 48, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1008, 'quaerat quo fuga', 'tablet', 'drugs', 68918, 34, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1009, 'aut ducimus sint', 'supositoria', 'herbs', 66194, 4, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1010, 'ut enim suscipit', 'drops', 'drugs', 77688, 79, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1011, 'accusantium molestiae molestiae', 'capsule', 'free medicine', 16345, 92, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1012, 'velit a voluptas', 'tablet', 'free medicine', 82167, 80, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1013, 'doloremque asperiores amet', 'ointment', 'free medicine', 17980, 125, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1014, 'nostrum laboriosam ea', 'tablet', 'drugs', 14687, 7, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1015, 'voluptatibus adipisci nam', 'tablet', 'drugs', 18223, 57, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1016, 'assumenda enim eaque', 'caplet', 'free medicine', 49409, 133, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1017, 'voluptatibus eaque omnis', 'ointment', 'drugs', 18933, 87, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1018, 'commodi recusandae sit', 'pil', 'herbs', 63297, 97, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1019, 'velit qui esse', 'pil', 'free medicine', 42969, 88, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1020, 'qui et quaerat', 'capsule', 'free medicine', 95492, 25, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1021, 'magni perferendis quia', 'cream', 'drugs', 35610, 81, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1022, 'aliquam accusamus quis', 'cream', 'drugs', 5416, 36, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1023, 'nisi non cum', 'ointment', 'drugs', 42752, 16, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1024, 'doloribus quo magni', 'caplet', 'free medicine', 6587, 58, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1025, 'in delectus et', 'tablet', 'herbs', 61317, 8, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1026, 'numquam eaque a', 'cream', 'free medicine', 92799, 24, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1027, 'voluptatibus reprehenderit quos', 'ointment', 'limited free', 99218, 131, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1028, 'placeat aut maiores', 'tablet', 'herbs', 27039, 115, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1029, 'natus voluptatum consequatur', 'ointment', 'drugs', 52365, 112, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1030, 'voluptatum et inventore', 'pil', 'drugs', 95384, 129, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1031, 'laboriosam dolor quam', 'caplet', 'free medicine', 89050, 94, '2023-02-06 07:35:57', '2023-02-07 01:41:11'),
(1032, 'veritatis harum maxime', 'supositoria', 'drugs', 93483, 8, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1033, 'dolor laboriosam itaque', 'ointment', 'drugs', 36812, 119, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1034, 'dolor sed rerum', 'syrup', 'limited free', 23065, 56, '2023-02-06 07:35:57', '2023-02-07 01:41:11'),
(1035, 'ex corporis dolorum', 'caplet', 'free medicine', 37250, 66, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1036, 'quia velit sapiente', 'supositoria', 'limited free', 25613, 129, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1037, 'aut dolorum numquam', 'drops', 'limited free', 50409, 63, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1038, 'ab quidem sed', 'cream', 'drugs', 98898, 101, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1039, 'consectetur voluptas et', 'drops', 'herbs', 73151, 25, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1040, 'molestiae fuga quos', 'syrup', 'free medicine', 50777, 29, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1041, 'nesciunt sit temporibus', 'tablet', 'limited free', 51311, 6, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1042, 'quam distinctio vitae', 'pil', 'drugs', 8803, 55, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1043, 'hic nesciunt vel', 'syrup', 'limited free', 94585, 116, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1044, 'sit deleniti temporibus', 'caplet', 'herbs', 69618, 48, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1045, 'iste a et', 'pil', 'herbs', 5900, 35, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1046, 'accusantium inventore earum', 'syrup', 'drugs', 94940, 6, '2023-02-06 07:35:57', '2023-02-07 01:41:11'),
(1047, 'aut sit iste', 'caplet', 'herbs', 86597, 59, '2023-02-06 07:35:57', '2023-02-08 01:56:43'),
(1048, 'nobis molestiae omnis', 'capsule', 'free medicine', 48328, 113, '2023-02-06 07:35:57', '2023-02-06 10:01:14'),
(1049, 'velit consequatur quia', 'pil', 'herbs', 99611, 56, '2023-02-06 07:35:57', '2023-02-07 06:59:25'),
(1050, 'paracetamol', 'tablet', 'free medicine', 8000, 49, '2023-02-08 00:46:32', '2023-02-08 01:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_11_11_115659_create_details_table', 1),
(4, '2022_11_11_115759_create_prescriptions_table', 1),
(5, '2022_11_11_115851_create_doctors_table', 1),
(6, '2022_11_11_115946_create_registrations_table', 1),
(7, '2022_11_11_120034_create_medicines_table', 1),
(8, '2022_11_11_120119_create_patients_table', 1),
(9, '2022_11_11_120200_create_payments_table', 1),
(10, '2022_11_11_120215_create_polies_table', 1),
(11, '2022_11_11_122631_create_schedules_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_code` bigint(20) UNSIGNED NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_age` int(11) NOT NULL,
  `patient_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_code`, `patient_name`, `patient_address`, `patient_gender`, `patient_age`, `patient_number`, `patient_status`, `created_at`, `updated_at`) VALUES
(1000, 'Jakayla Smith', 'Qui officiis accusamus deleniti ut facere aut repudiandae. Voluptatem earum deleniti est non occaecati non.', 'male', 29, '085831772417', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1001, 'Lorenzo Thompson V', 'Inventore temporibus magni reprehenderit laudantium exercitationem ut sit. Et nostrum explicabo possimus adipisci animi doloremque corrupti. Assumenda necessitatibus tenetur unde laudantium iure aut aliquam.', 'female', 50, '085502770232', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1002, 'Caden Jaskolski', 'Est aut adipisci eligendi. Aut facere expedita voluptatem excepturi voluptatem. Quia fuga praesentium totam inventore.', 'female', 15, '083084470753', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1003, 'Giovanny Schuster', 'Asperiores quis perspiciatis odit rerum enim voluptatem. Ducimus quos fuga repellendus voluptatum quam et. Soluta qui distinctio vel asperiores laboriosam.', 'female', 29, '081966374899', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1004, 'Kacie Altenwerth MD', 'Tempore quo perferendis omnis quia. Qui vel molestiae nulla excepturi et eum consectetur. Voluptatem placeat molestiae quos sed et minus repellendus laboriosam.', 'female', 28, '087628881692', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1005, 'Miss Karina Herzog MD', 'Voluptatem cumque explicabo vel consequuntur cupiditate. Recusandae fugit autem amet qui dolores reiciendis. Officiis sed dolor quaerat aut quaerat omnis omnis. Itaque temporibus facere voluptas nobis qui suscipit aliquid.', 'female', 12, '085750621441', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1006, 'Verlie Carroll', 'Omnis perspiciatis aut est laborum sunt reiciendis soluta. Architecto temporibus dolores et blanditiis nam deleniti. Culpa reprehenderit et sapiente rerum dolorem architecto tenetur.', 'male', 49, '083119322228', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1007, 'Colleen Braun MD', 'Consectetur vel nostrum quo vel dolor non. Et velit quo aut qui quia ipsam velit. Aut eveniet atque eaque doloremque qui reprehenderit autem.', 'female', 26, '084112434721', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1008, 'Alda Johns III', 'Qui excepturi veritatis dolorem laudantium. Libero inventore alias aliquam et corrupti qui est. Quas accusantium veniam quis aut.', 'female', 58, '084395052035', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1009, 'Leonel Eichmann', 'Quisquam sit ea at facere. Cumque vel aut quia. Qui aut molestiae praesentium cum molestiae impedit.', 'male', 21, '087049980443', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1010, 'Gretchen Kassulke', 'Facilis cumque est hic fugiat. Consequatur eum omnis aut necessitatibus modi sapiente. Voluptatem dignissimos dolor et nobis velit omnis.', 'female', 51, '083159277937', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1011, 'Mr. Bryon Quigley', 'Voluptas consequatur et atque nemo eum voluptatibus. Illum perspiciatis laboriosam doloremque. Aut similique eum excepturi necessitatibus voluptatem saepe neque magni.', 'male', 28, '084728133124', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1012, 'Cyril Raynor', 'Omnis molestiae provident aut autem totam. Exercitationem dolores ducimus unde. Asperiores asperiores doloremque est expedita quo dolores.', 'female', 17, '088325873755', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1013, 'Letitia Witting', 'Harum optio sit numquam possimus similique tenetur ipsa. Vel et aut labore perspiciatis impedit. Est labore veniam distinctio. Illum cupiditate sint sunt sed.', 'female', 25, '085337310820', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1014, 'Dr. Bettie Trantow Jr.', 'Eos cum aut aliquam aspernatur qui ut. Facere rerum quos consequatur omnis enim. Autem culpa quibusdam et consequuntur qui.', 'male', 40, '088544770438', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1015, 'Hannah Padberg', 'Accusantium incidunt labore sed omnis repudiandae quia provident et. Voluptatum hic modi commodi id unde quos. In voluptas omnis velit aut voluptatum perferendis illum aspernatur.', 'female', 18, '083787809573', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1016, 'Lonzo Blick', 'Atque reprehenderit ad et suscipit. Ex dolorem in quam fugiat. Debitis temporibus sunt ullam tempore accusamus. Mollitia et sit in debitis et exercitationem.', 'female', 25, '086906861112', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1017, 'Camron Lubowitz', 'Et dignissimos non consequatur molestias dolores voluptatem. Dolorem ut consequatur itaque quisquam ipsum quia dolorum. Sapiente qui omnis placeat sunt qui. Exercitationem vero quaerat ratione molestias quos assumenda recusandae.', 'male', 55, '080554975224', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1018, 'Miss Laurine Wuckert', 'Cupiditate dolores et rerum ipsam deleniti. Quis cupiditate quia et voluptatem est distinctio autem sint. Velit sequi consequatur asperiores qui aliquam in sit. Ducimus nisi ad voluptatem nobis eos voluptatum. Labore et et voluptatum quibusdam omnis et.', 'male', 16, '086476667965', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1019, 'Lavada Kutch', 'Aut eveniet inventore architecto aut totam dicta. Nihil cum ea perferendis omnis natus amet quia dolorem. Magnam sapiente nemo est harum.', 'male', 51, '081144167631', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1020, 'Devante Blick', 'Velit vero laboriosam corrupti sed magnam molestiae id voluptatibus. Et quidem maxime veritatis. At ut aspernatur qui amet et sit fuga. Id et laboriosam molestiae quibusdam doloremque modi. Quia qui natus vero.', 'female', 27, '082925118374', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1021, 'Kameron Tromp', 'In rerum eum itaque temporibus non voluptatem. Cupiditate excepturi qui tempora. Earum dolores dolores modi iusto laborum.', 'male', 44, '089034076082', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1022, 'Brett Wisoky Jr.', 'Distinctio inventore officia adipisci nobis assumenda dolorem. Nisi eos architecto iusto corrupti. Deserunt voluptate cum iste vel quae et eaque. Enim odit quia accusamus ut. Et minus dolorem et illum voluptatem quia quia itaque.', 'male', 29, '087921448565', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1023, 'Prof. Lindsey Medhurst', 'Et animi aut minus iusto. Perspiciatis qui nulla maxime magni placeat ipsam. Voluptate dolores omnis non quis voluptatem consequuntur incidunt. Omnis voluptas deserunt ratione.', 'male', 29, '081172036514', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1024, 'Esperanza Schaden', 'Quod provident labore dolor ea delectus qui. Quasi quo eveniet reiciendis aut et nemo exercitationem. Aut inventore consequatur itaque ut expedita. Omnis tempora doloremque qui animi quo animi.', 'female', 51, '082518597694', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1025, 'Ms. Madisyn Becker DVM', 'Neque et et sunt totam distinctio voluptas. Consectetur sunt facere nulla mollitia veniam. Et expedita et perspiciatis porro. Labore quis quis voluptatem omnis ut harum reiciendis vero.', 'male', 24, '087345675117', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1026, 'Kade Gorczany', 'Atque perspiciatis consequatur necessitatibus sit qui molestiae fugiat. Quo et dolorem aut odit magni quo animi mollitia. Consequatur voluptatibus quas atque magnam.', 'female', 37, '088263718781', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1027, 'Willie Harvey', 'Dolor beatae fugit vero veritatis. Facilis aut dolore non aut. Quia aspernatur voluptas in delectus ipsum ut neque. Ut provident ex tempore ducimus praesentium sapiente. Et sunt doloremque rerum ipsa facilis soluta quis.', 'male', 38, '088570204435', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1028, 'Mrs. Yazmin Wyman DDS', 'Id nulla deserunt perferendis magnam dolorum sed. Voluptatibus tenetur quibusdam sint quis cupiditate et est. Sit vero facilis eveniet nihil sed quia. Facilis eveniet occaecati perspiciatis laboriosam sed.', 'female', 53, '085704673391', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1029, 'Mckayla Simonis Jr.', 'Quaerat consequatur possimus vitae recusandae. Quod eos quia hic laboriosam nisi aut. Magni quo id corporis reiciendis occaecati tempore eaque.', 'male', 38, '085005541908', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1030, 'Pearlie Waelchi', 'Corporis quia quia magni explicabo possimus et autem eum. Soluta cum magni enim reprehenderit neque tempora ipsa. Consectetur et perspiciatis aut.', 'male', 56, '082832650719', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1031, 'Prof. Elian Walker Sr.', 'Ut a ut doloribus soluta. Molestiae rerum odit quo. Quisquam quasi est laborum eum quam. Eum est reiciendis enim.', 'female', 30, '089745402231', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1032, 'Miss Haylee Donnelly', 'Quia recusandae omnis ut sed. Officia repellat perferendis velit repudiandae. Suscipit aut eum excepturi voluptatibus quaerat ullam dolores. Incidunt quia neque deserunt voluptas non animi delectus.', 'female', 46, '087492257931', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1033, 'Dejah Kuhlman', 'Earum dolores officia saepe similique quae. Rerum ab ut doloremque et libero qui quia adipisci. Eos iure magni sit harum. Illo est amet delectus et quos minus porro. Minus commodi ex voluptas inventore nulla at officiis est.', 'male', 40, '089656879030', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1034, 'Olin Gislason V', 'Praesentium quia sunt omnis accusamus rerum. Occaecati veritatis rerum quia eius atque. Quia explicabo adipisci delectus dolorem. Praesentium sed ex et earum cumque sed alias. Iste qui labore expedita laudantium voluptatum libero aut temporibus.', 'male', 22, '084338999709', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1035, 'Mrs. Kamille Spinka', 'Optio excepturi est numquam non rem dolor dolore. Aut et nulla reprehenderit et. Culpa sapiente sunt voluptas aliquid rerum amet voluptatum reprehenderit.', 'female', 28, '082975084949', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1036, 'Alaina Connelly', 'Nostrum consequuntur et qui. Architecto est pariatur quo quia est natus tempore. Sint quos qui voluptas sunt tempora ut non iste.', 'female', 19, '081044017912', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1037, 'Molly Russel', 'Aut quo adipisci ut dolore. Rerum quidem eos sunt amet iusto adipisci doloremque. Voluptas dolores eaque beatae quod aspernatur.', 'female', 24, '080854330777', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1038, 'Miller Reichel', 'Aut ut eligendi consequuntur qui unde error. Maxime a nam necessitatibus minima quaerat alias. Illo fugit et beatae consequatur deserunt est. Soluta iusto commodi sed qui molestias. Et hic quos maiores.', 'female', 42, '081906185491', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1039, 'Benedict Mills', 'Est adipisci doloremque ut perferendis eos ad. Optio qui neque voluptatum. Velit saepe ratione et voluptatem sit modi. Ipsum voluptatem quia eum et tenetur fugiat vitae.', 'male', 44, '082106544339', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1040, 'Gilbert Bauch', 'Occaecati aut quis optio et culpa et aut eveniet. Similique qui ullam dolore necessitatibus. Similique ut officia quibusdam doloremque reiciendis.', 'male', 54, '081733523548', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1041, 'Jermain Daniel', 'Repudiandae dignissimos consequatur culpa hic reprehenderit corrupti. Deserunt facere iste animi iure sit ut. Dolor facere sapiente recusandae saepe necessitatibus ex ullam. Repellat enim accusantium laborum id.', 'male', 29, '088120464690', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1042, 'Isaiah Jacobson', 'Facilis soluta et voluptas reiciendis maxime. Omnis enim et et. Aut repellat eos aut non dolores. In qui labore pariatur eius alias autem. Molestiae sit possimus tenetur facere.', 'female', 52, '086878188348', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1043, 'Mrs. Jazlyn McKenzie Sr.', 'Minima eum a assumenda facilis. Architecto et quos et sint totam consequatur quos. Cum ut autem ut illum totam.', 'male', 53, '082946818722', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1044, 'Ahmad Jacobson', 'Et sit est natus laudantium qui fuga incidunt. Voluptates quia vel ut sint.', 'male', 43, '083951742285', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1045, 'Ludie Bergnaum Sr.', 'Quo labore sed sed incidunt omnis et doloribus placeat. A dicta aut a placeat aliquid id omnis.', 'male', 17, '083298083191', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1046, 'Miss Valentina Kemmer Jr.', 'Voluptates sint qui non sed. Quidem repudiandae earum cumque corrupti et aperiam est. Non commodi vitae architecto sint illum mollitia quis. Doloribus cupiditate veritatis ipsum voluptates non.', 'male', 27, '084158437741', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1047, 'Sage Armstrong', 'Hic facilis quo ad explicabo nihil cumque modi. Nisi rerum dolorem laborum dicta eos. Eos voluptas doloremque in culpa aut consequatur cupiditate.', 'female', 15, '082140622926', 'finished', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1048, 'Willy Simonis DVM', 'Placeat cumque laborum praesentium voluptatem quis. Aut ut non minus voluptatem. Est adipisci nihil laboriosam minima est vel modi aut.', 'male', 29, '089023417447', 'waiting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1049, 'Mossie Stamm', 'Odit ut veniam nisi dignissimos. Ab laboriosam modi dolorem libero praesentium rerum eum. Est rerum voluptatem deserunt.', 'female', 17, '089980774272', 'consulting', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1050, 'admin', 'Wedoro candi', 'male', 33, '087820649490', 'finished', '2023-02-06 08:14:05', '2023-02-08 00:53:12'),
(1051, 'garox', 'Belahan', 'female', 15, '081231251', 'finished', '2023-02-08 01:55:31', '2023-02-08 01:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_number` bigint(20) UNSIGNED NOT NULL,
  `prsc_number` bigint(20) UNSIGNED NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `total_payment` bigint(20) DEFAULT NULL,
  `cash` bigint(20) DEFAULT NULL,
  `change` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_number`, `prsc_number`, `payment_date`, `total_payment`, `cash`, `change`, `created_at`, `updated_at`) VALUES
(10000, 1000, '2023-02-06 14:35:57', 78020, 78020, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10001, 1001, '2023-02-06 14:35:57', 176603, 176603, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10002, 1002, '2023-02-06 14:35:57', 121325, 121325, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10003, 1003, '2023-02-06 14:35:57', 130052, 130052, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10004, 1004, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10005, 1005, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10006, 1006, '2023-02-06 14:35:57', 102484, 102484, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10007, 1007, '2023-02-06 14:35:57', 58870, 58870, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10008, 1008, '2023-02-06 14:35:57', 134711, 134711, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10009, 1009, '2023-02-06 14:35:57', 85481, 85481, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10010, 1010, '2023-02-06 14:35:57', 156216, 156216, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10011, 1011, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10012, 1012, '2023-02-06 14:35:57', 79401, 79401, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10013, 1013, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10014, 1014, '2023-02-06 14:35:57', 149002, 149002, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10015, 1015, '2023-02-06 14:35:57', 181436, 181436, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10016, 1016, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10017, 1017, '2023-02-06 14:35:57', 84932, 84932, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10018, 1018, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10019, 1019, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10020, 1020, '2023-02-06 14:35:57', 109648, 109648, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10021, 1021, '2023-02-06 14:35:57', 47314, 47314, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10022, 1022, '2023-02-06 14:35:57', 154283, 154283, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10023, 1023, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10024, 1024, '2023-02-06 14:35:57', 94576, 94576, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10025, 1025, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10026, 1026, '2023-02-06 14:35:57', 187128, 187128, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10027, 1027, '2023-02-06 14:35:57', 132326, 132326, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10028, 1028, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10029, 1029, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10030, 1030, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10032, 1032, '2023-02-06 14:35:57', 158213, 158213, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10034, 1034, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10035, 1035, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10036, 1036, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10037, 1037, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10038, 1038, '2023-02-06 14:35:57', 186283, 186283, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10039, 1039, '2023-02-06 14:35:57', 57385, 57385, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10040, 1040, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10041, 1041, '2023-02-06 14:35:57', 184532, 184532, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10042, 1042, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10043, 1043, '2023-02-06 14:35:57', 57005, 57005, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10044, 1044, '2023-02-06 14:35:57', 37757, 37757, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10045, 1045, '2023-02-06 14:35:57', 123766, 123766, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10046, 1046, '2023-02-06 14:35:57', 106856, 106856, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10047, 1047, '2023-02-06 14:35:57', 63813, 63813, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10048, 1048, '2023-02-06 14:35:57', 0, 0, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10049, 1049, '2023-02-06 14:35:57', 160115, 160115, 0, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10050, 1050, NULL, 231267, 240000, 8733, '2023-02-06 08:15:36', '2023-02-06 10:01:14'),
(10053, 1053, NULL, 134611, 140000, 5389, '2023-02-07 06:50:21', '2023-02-07 06:59:25'),
(10054, 1054, NULL, 129597, 130000, 403, '2023-02-08 01:55:55', '2023-02-08 01:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `polies`
--

CREATE TABLE `polies` (
  `poly_code` bigint(20) UNSIGNED NOT NULL,
  `poly_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `polies`
--

INSERT INTO `polies` (`poly_code`, `poly_name`, `created_at`, `updated_at`) VALUES
(1000, 'poli gigi', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1001, 'poli umum', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1002, 'poli mata', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1003, 'Poli kulit', '2023-02-07 01:24:15', '2023-02-07 01:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `prsc_number` bigint(20) UNSIGNED NOT NULL,
  `prsc_date` date DEFAULT NULL,
  `doctor_code` bigint(20) UNSIGNED NOT NULL,
  `patient_code` bigint(20) UNSIGNED NOT NULL,
  `poly_code` bigint(20) UNSIGNED NOT NULL,
  `user_code` bigint(20) UNSIGNED NOT NULL,
  `consult_result` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_payment` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`prsc_number`, `prsc_date`, `doctor_code`, `patient_code`, `poly_code`, `user_code`, `consult_result`, `total_payment`, `created_at`, `updated_at`) VALUES
(1000, '2023-02-06', 1005, 1000, 1001, 1004, NULL, 316969, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1001, '2023-02-06', 1005, 1001, 1002, 1005, NULL, 215490, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1002, '2023-02-06', 1000, 1002, 1001, 1000, NULL, 170855, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1003, '2023-02-06', 1002, 1003, 1001, 1001, NULL, 137595, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1004, '2023-02-06', 1000, 1004, 1001, 1001, NULL, 169857, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1005, '2023-02-06', 1005, 1005, 1002, 1005, NULL, 245147, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1006, '2023-02-06', 1002, 1006, 1001, 1004, NULL, 316913, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1007, '2023-02-06', 1005, 1007, 1001, 1005, NULL, 183887, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1008, '2023-02-06', 1001, 1008, 1000, 1001, NULL, 165730, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1009, '2023-02-06', 1000, 1009, 1002, 1001, NULL, 93426, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1010, '2023-02-06', 1005, 1010, 1001, 1005, NULL, 194123, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1011, '2023-02-06', 1004, 1011, 1001, 1003, NULL, 248284, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1012, '2023-02-06', 1004, 1012, 1002, 1005, NULL, 56672, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1013, '2023-02-06', 1003, 1013, 1002, 1004, NULL, 177806, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1014, '2023-02-06', 1003, 1014, 1001, 1003, NULL, 229571, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1015, '2023-02-06', 1002, 1015, 1001, 1001, NULL, 390939, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1016, '2023-02-06', 1001, 1016, 1002, 1005, NULL, 314632, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1017, '2023-02-06', 1001, 1017, 1000, 1005, NULL, 48160, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1018, '2023-02-06', 1003, 1018, 1000, 1003, NULL, 264931, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1019, '2023-02-06', 1002, 1019, 1001, 1004, NULL, 362979, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1020, '2023-02-06', 1004, 1020, 1000, 1000, NULL, 313735, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1021, '2023-02-06', 1000, 1021, 1001, 1004, NULL, 162182, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1022, '2023-02-06', 1003, 1022, 1000, 1000, NULL, 391752, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1023, '2023-02-06', 1001, 1023, 1000, 1002, NULL, 205561, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1024, '2023-02-06', 1003, 1024, 1000, 1000, NULL, 398296, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1025, '2023-02-06', 1001, 1025, 1000, 1001, NULL, 72272, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1026, '2023-02-06', 1005, 1026, 1001, 1002, NULL, 160554, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1027, '2023-02-06', 1003, 1027, 1002, 1005, NULL, 229166, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1028, '2023-02-06', 1004, 1028, 1002, 1004, NULL, 53320, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1029, '2023-02-06', 1004, 1029, 1001, 1005, NULL, 317631, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1030, '2023-02-06', 1005, 1030, 1000, 1003, NULL, 111514, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1032, '2023-02-06', 1003, 1032, 1001, 1003, NULL, 54908, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1034, '2023-02-06', 1005, 1034, 1001, 1003, NULL, 186226, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1035, '2023-02-06', 1003, 1035, 1001, 1004, NULL, 261938, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1036, '2023-02-06', 1004, 1036, 1001, 1000, NULL, 164783, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1037, '2023-02-06', 1000, 1037, 1000, 1006, NULL, 114065, '2023-02-06 07:35:57', '2023-02-08 01:32:34'),
(1038, '2023-02-06', 1003, 1038, 1000, 1005, NULL, 77652, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1039, '2023-02-06', 1000, 1039, 1002, 1002, NULL, 202759, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1040, '2023-02-06', 1003, 1040, 1002, 1000, NULL, 254572, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1041, '2023-02-06', 1004, 1041, 1001, 1005, NULL, 331658, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1042, '2023-02-06', 1003, 1042, 1001, 1003, NULL, 318550, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1043, '2023-02-06', 1002, 1043, 1002, 1005, NULL, 134020, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1044, '2023-02-06', 1004, 1044, 1001, 1002, NULL, 272762, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1045, '2023-02-06', 1004, 1045, 1002, 1004, NULL, 197875, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1046, '2023-02-06', 1000, 1046, 1001, 1003, NULL, 174206, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1047, '2023-02-06', 1002, 1047, 1002, 1001, NULL, 191523, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1048, '2023-02-06', 1000, 1048, 1002, 1003, NULL, 120366, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1049, '2023-02-06', 1005, 1049, 1000, 1001, NULL, 73126, '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(1050, '2023-02-06', 1000, 1050, 1000, 1006, 'Banyak minum air putih', 196267, '2023-02-06 08:15:36', '2023-02-06 09:05:44'),
(1053, '2023-02-07', 1006, 1050, 1003, 1006, NULL, 99611, '2023-02-07 06:50:21', '2023-02-07 06:55:13'),
(1054, '2023-02-08', 1003, 1051, 1001, 1006, 'Minum banyak banyak', 94597, '2023-02-08 01:55:55', '2023-02-08 01:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `registration_number` bigint(20) UNSIGNED NOT NULL,
  `prsc_number` bigint(20) UNSIGNED NOT NULL,
  `doctor_code` bigint(20) UNSIGNED NOT NULL,
  `patient_code` bigint(20) UNSIGNED NOT NULL,
  `poly_code` bigint(20) UNSIGNED NOT NULL,
  `user_code` bigint(20) UNSIGNED NOT NULL,
  `fee` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`registration_number`, `prsc_number`, `doctor_code`, `patient_code`, `poly_code`, `user_code`, `fee`, `description`, `created_at`, `updated_at`) VALUES
(10000, 1000, 1002, 1000, 1001, 1002, 5000, 'Qui nobis est occaecati accusamus cum beatae unde. Voluptates et necessitatibus nostrum quae et. Omnis sapiente sed ut. Ipsum mollitia voluptate enim debitis nisi et nesciunt molestiae. Vel praesentium deleniti alias adipisci nihil. Qui impedit rerum ut aliquam. Harum vitae consectetur culpa dicta consectetur dolores aliquid.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10001, 1001, 1004, 1001, 1000, 1003, 5000, 'Sint ut rem incidunt provident architecto quia maxime. Consequuntur veritatis quis quaerat voluptatem minus qui. Quibusdam rerum rerum dicta quod est voluptatem. Incidunt necessitatibus asperiores dicta qui sed soluta provident velit. Maxime itaque qui quia. Debitis libero optio magni nihil.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10002, 1002, 1005, 1002, 1000, 1002, 5000, 'Error sapiente quae eius velit voluptatibus facilis dolorem. Veniam quasi porro reiciendis qui aliquid sed. Est unde maxime natus qui blanditiis quis blanditiis. Eum sunt nihil aut facilis. Quia cum maiores nesciunt dolor expedita. Ipsa ab est soluta et.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10003, 1003, 1004, 1003, 1001, 1003, 5000, 'Sed voluptas velit sint. Architecto optio autem est. Nostrum reprehenderit iure asperiores deserunt. Fugit ea magnam exercitationem consequatur modi eius. Ut pariatur tenetur et repudiandae omnis rerum optio. Ut fuga animi laudantium ut suscipit minus. Debitis et soluta dolores sapiente sit quasi.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10004, 1004, 1002, 1004, 1000, 1003, 5000, 'Dolorum ab voluptatem dignissimos. Sunt aliquam voluptatibus eum ullam facere cum. Omnis dignissimos laborum perspiciatis eius beatae. Et quaerat commodi omnis aliquam quia.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10005, 1005, 1003, 1005, 1002, 1004, 5000, 'Quis odit in consequatur quisquam. Mollitia qui esse soluta labore et ex. Et consectetur voluptatem consequatur natus aut. Totam molestiae totam laborum dignissimos dolores distinctio omnis. Blanditiis possimus numquam nesciunt aperiam facilis excepturi quibusdam. Qui voluptatem asperiores illum aliquam qui ullam. Ex et qui ea repellat cumque corrupti.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10006, 1006, 1002, 1006, 1000, 1003, 5000, 'Nobis corrupti et inventore doloremque quidem omnis ullam. Aliquam eum sapiente assumenda dolor. Cum beatae vitae vel dolores. Sapiente maxime labore quod. Voluptas illo nam pariatur repudiandae ea sed.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10007, 1007, 1002, 1007, 1001, 1005, 5000, 'Esse aut ducimus alias qui. Velit temporibus et reiciendis deserunt sapiente voluptatem tenetur. Quo beatae tempora debitis doloribus perferendis quo eos. Consequuntur eius tempora recusandae sint debitis id. Quia ea molestias rem excepturi enim eius sunt nisi. Qui et nihil est repellendus vel dignissimos.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10008, 1008, 1000, 1008, 1002, 1002, 5000, 'Rem veniam quia omnis odio magni dolorum eum. Quia excepturi atque atque in cumque voluptatibus nihil. Cumque aperiam excepturi ut quia eum dolor reprehenderit. Saepe harum aut nam omnis vitae possimus optio consequatur.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10009, 1009, 1003, 1009, 1001, 1005, 5000, 'Est similique error maiores voluptatibus voluptatem ut ullam. Cum beatae est expedita sed veritatis ipsam qui maiores. Minima modi saepe qui fugiat doloribus quisquam laudantium. Rerum ut consequuntur iste voluptatem velit doloremque. Odit cupiditate nisi ullam sed molestiae deserunt.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10010, 1010, 1003, 1010, 1000, 1002, 5000, 'Molestiae doloremque similique et amet. Ratione accusamus laudantium eos praesentium consequatur. Pariatur fuga praesentium vitae pariatur nostrum exercitationem odit. Quia et inventore cumque. Quo incidunt sequi et neque. Optio qui et et aut.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10011, 1011, 1002, 1011, 1002, 1004, 5000, 'Ipsum suscipit quisquam voluptatem est possimus expedita. Sit dolorum impedit unde recusandae id perspiciatis atque sint. Sed magnam qui temporibus non nam debitis. Repellendus qui voluptates et esse. Nihil quod ut minus at praesentium et qui. Consequatur nihil sunt ex neque dolorem aut architecto.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10012, 1012, 1002, 1012, 1002, 1002, 5000, 'Est soluta quae eligendi eos perspiciatis occaecati iusto. Nemo et quae recusandae neque iusto rerum voluptatum. Ipsa quo rerum enim molestias ea et. Molestiae ea velit perferendis nulla eos enim nostrum dolores. Architecto eaque cum odit reprehenderit sit est repudiandae. Voluptas minima nam et voluptatem corporis at et alias.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10013, 1013, 1005, 1013, 1000, 1004, 5000, 'Sapiente dignissimos maxime et quis. Ut possimus atque nihil velit autem. Aperiam et doloremque modi iusto iusto et vitae. Cumque qui perferendis dolores est.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10014, 1014, 1002, 1014, 1001, 1005, 5000, 'Ullam aut dolores ullam saepe voluptas officia. Dolor qui alias deserunt et laudantium illum. Cumque soluta sunt tenetur commodi modi. Quia eius odit quo magni. Ut quis eius est non voluptatem occaecati vel. Delectus praesentium officiis debitis sed dignissimos minima.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10015, 1015, 1003, 1015, 1000, 1004, 5000, 'Est eos et cum magnam qui. Voluptas et vitae quaerat doloremque doloribus. Cupiditate recusandae quo voluptates rem. Rem qui iste voluptatem eum perspiciatis repellendus. Laudantium doloribus facilis error sit et.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10016, 1016, 1005, 1016, 1000, 1002, 5000, 'Impedit dignissimos nemo et non tempore voluptas. Deleniti voluptas placeat et et consequatur quod ipsum. Aperiam sit sed soluta autem. Aut illum in rerum. Dolorem similique quam ratione eos facere aliquid.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10017, 1017, 1003, 1017, 1002, 1001, 5000, 'Ex soluta aspernatur voluptas eveniet impedit illum aspernatur. Non delectus nihil ullam tempore ut. Recusandae maxime non sunt aut nam. Dolore dicta at incidunt dolores amet ut.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10018, 1018, 1004, 1018, 1001, 1000, 5000, 'Iste aut voluptatem nulla optio quos amet. Cumque est autem enim asperiores numquam. Laboriosam id enim fuga aut voluptate sunt voluptate. Voluptate numquam cumque et reiciendis vero itaque est facere. Voluptas molestiae quidem quisquam. Reprehenderit provident dolore veniam numquam enim quo.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10019, 1019, 1000, 1019, 1002, 1004, 5000, 'Facilis harum qui ea atque. Saepe unde sunt libero esse. Non officiis necessitatibus error. Blanditiis quas ipsa aut et minus necessitatibus consectetur.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10020, 1020, 1005, 1020, 1002, 1003, 5000, 'Excepturi qui dicta ipsum in. Labore magnam sit consectetur ullam consequatur perferendis. Enim nihil aperiam repellat iusto cumque autem. Maxime enim deserunt rerum id aut laborum et. Explicabo id facilis praesentium qui repudiandae.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10021, 1021, 1001, 1021, 1001, 1001, 5000, 'Et quasi eum et. Voluptatum autem laborum similique minima delectus optio voluptatem. Et qui harum ex asperiores. Provident fuga velit laudantium nihil dignissimos totam. Vel qui nulla perspiciatis ex deserunt sequi earum sed. Iure dignissimos voluptatum quam excepturi dolor.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10022, 1022, 1003, 1022, 1002, 1004, 5000, 'Fugit voluptatem vel error totam consequatur sit. Illum odio non deleniti quia qui enim. Sit deleniti maiores at consequuntur. Vel rerum et nam pariatur eius dolor qui. Ea repellat suscipit accusamus eligendi quidem. Animi est blanditiis quas sit voluptate eius atque.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10023, 1023, 1004, 1023, 1001, 1005, 5000, 'Ut vel in voluptas. Omnis non doloribus tempora explicabo aliquid tempore consectetur. Qui labore rerum exercitationem architecto ab consequatur dolorum id. Rerum aliquid explicabo accusamus quaerat nostrum dolor aut. Tempore non non eaque sint.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10024, 1024, 1003, 1024, 1000, 1004, 5000, 'Illum aperiam veritatis enim possimus rerum. Illum velit perferendis quisquam perspiciatis ratione. Error velit eveniet officiis quibusdam beatae. Alias praesentium sed ut id inventore suscipit. Doloribus necessitatibus voluptate nulla ratione placeat in deserunt. Magni accusamus odit ipsum non assumenda. Ducimus porro at est dolor et repellendus. Ea odit cumque incidunt placeat quos ea.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10025, 1025, 1000, 1025, 1002, 1001, 5000, 'Voluptatem ut harum rem non. Aut est eveniet sed esse aut explicabo dignissimos. Ea et blanditiis est rem reiciendis libero. Qui consequatur et delectus eius doloribus sed quidem. Quia tenetur totam aperiam corporis. Est est amet perspiciatis ut odio illo cum.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10026, 1026, 1004, 1026, 1000, 1003, 5000, 'Atque tempore illo laudantium voluptatem debitis porro autem. Dolorem omnis earum vero consequatur distinctio labore. Et distinctio soluta deserunt fugiat harum ad incidunt reiciendis. Eius consequatur id molestias provident ullam vitae sed. Aut consequuntur et reiciendis illo occaecati. Cupiditate doloribus blanditiis aut corporis beatae magni rerum. Perferendis qui et veniam pariatur voluptatem quod possimus.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10027, 1027, 1002, 1027, 1002, 1004, 5000, 'Minima iste id repellendus sit repellat exercitationem quas itaque. Et ea perspiciatis animi nostrum non explicabo eos exercitationem. Quam dignissimos accusamus nisi ipsum repellat. Laborum temporibus aut dolorem non repudiandae asperiores pariatur.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10028, 1028, 1001, 1028, 1002, 1001, 5000, 'Sapiente quas perspiciatis aut hic et voluptas. Eos similique praesentium eos ex vel. Voluptatum nulla minus impedit et ea. Repellat nulla voluptas ut nulla. Quas omnis voluptates veritatis sunt eius. Aliquid sed aut qui quo libero. Qui illum sit nemo ea qui aut eius.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10029, 1029, 1003, 1029, 1000, 1001, 5000, 'Ea iste unde dolorum sapiente id dolores. Quasi ut voluptates fugit et et numquam reiciendis. Reiciendis natus nesciunt optio harum fugit incidunt et. Cupiditate sed iusto voluptatem consectetur nihil. Omnis in maiores incidunt aliquam autem. Qui dolores blanditiis velit aut.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10030, 1030, 1000, 1030, 1001, 1004, 5000, 'Odio beatae quidem est recusandae aliquam. Possimus delectus enim et ex. Et ut tenetur et est qui. Occaecati et omnis ducimus nemo quo molestias necessitatibus et.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10032, 1032, 1004, 1032, 1001, 1003, 5000, 'Molestiae consequuntur voluptatem eius dolor. Dolor autem consequuntur dolores omnis qui. Ipsam at qui neque. Accusantium iusto qui et itaque.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10034, 1034, 1003, 1034, 1001, 1001, 5000, 'Tenetur aut consequuntur accusantium. Officia assumenda esse iste est. Consequatur cupiditate esse accusantium explicabo. Modi voluptate sunt praesentium voluptas et soluta ratione.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10035, 1035, 1000, 1035, 1000, 1002, 5000, 'Et quia debitis reprehenderit quaerat placeat. Quaerat quas tempore iste sint id. Reprehenderit est dignissimos omnis consequuntur. Eius nisi et veritatis reiciendis. Reiciendis qui consequatur quo eius quia dolorum voluptate. Consequuntur ad adipisci voluptate.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10036, 1036, 1004, 1036, 1001, 1005, 5000, 'Dolorem facilis et deserunt cum dolorem ut. Accusamus autem alias earum architecto. Doloribus esse eligendi consequuntur ea fuga beatae itaque. Assumenda vel enim in natus quisquam.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10037, 1037, 1003, 1037, 1000, 1005, 5000, 'Sakit gigii', '2023-02-06 07:35:57', '2023-02-08 01:32:34'),
(10038, 1038, 1002, 1038, 1000, 1005, 5000, 'Officiis unde vel voluptatem porro architecto. Quia animi incidunt blanditiis. Porro porro voluptatibus est velit id. Ea itaque repellat possimus qui. Et non explicabo ratione illo aperiam. Aperiam at aut nihil. Sapiente dolores earum dignissimos velit commodi porro.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10039, 1039, 1004, 1039, 1002, 1001, 5000, 'Ut est odio non et iste ut. Ratione vitae numquam dolor quaerat. Libero reprehenderit eaque nihil assumenda qui. Corporis aut non repellendus et magni est. Voluptatem maxime reiciendis molestiae sit eos dicta voluptatem. Quia amet dolorem similique consequatur.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10040, 1040, 1005, 1040, 1001, 1000, 5000, 'Illo voluptatem autem est consequatur. Eos ducimus delectus beatae. Qui minima cum consequuntur facere dolore velit. Illo esse at eum et. Placeat ea ex nisi quia id. Sint molestiae quae quasi rerum delectus earum.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10041, 1041, 1002, 1041, 1001, 1001, 5000, 'Enim deserunt optio et sint. Doloremque dolor repudiandae nihil. Voluptatem sapiente a omnis unde. Nobis tenetur fugit porro commodi maxime aperiam pariatur. Quaerat voluptatum ut ab esse nobis ratione qui sunt.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10042, 1042, 1003, 1042, 1002, 1004, 5000, 'Amet et aut dolorem est sit tempora esse. Labore minus ad dolor eos. Totam perferendis velit itaque eveniet. Temporibus ut incidunt esse tempore vel ut. Odit ipsum ut non saepe ut.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10043, 1043, 1002, 1043, 1002, 1002, 5000, 'Quis quia est tempore est autem recusandae. Nostrum quia fugiat dolorum placeat. Eos est iusto laborum libero accusamus modi reprehenderit id. Error quas cupiditate quod labore amet occaecati explicabo.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10044, 1044, 1004, 1044, 1002, 1003, 5000, 'Ratione rerum tenetur hic est aut quos modi placeat. Ea nulla facere expedita qui sed provident nulla. Illo quidem soluta libero in maiores qui. Voluptas nostrum rem neque et eius harum quidem quam. Quam aut quo nemo et. Consequatur cum qui distinctio itaque vitae quod.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10045, 1045, 1005, 1045, 1000, 1004, 5000, 'Ad incidunt quia quidem nihil et neque iusto voluptatem. Ut et et aliquam voluptatibus. Nostrum dolorem voluptatem aliquam provident ipsa accusantium. Explicabo tempore omnis enim quos.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10046, 1046, 1002, 1046, 1000, 1003, 5000, 'Quos perspiciatis voluptate quos velit. Voluptatem necessitatibus consequatur non qui veritatis tempore. Quis nesciunt excepturi repellendus eos ea voluptates nemo. Fuga possimus sit quis sed non. Illum quibusdam magnam nihil ipsa minima non. Ducimus veritatis sit accusamus nihil. Aut vel ipsum quam possimus reiciendis quibusdam.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10047, 1047, 1003, 1047, 1001, 1002, 5000, 'Exercitationem est labore sequi iure. Ut consequatur soluta earum repellat et doloremque et officiis. Ad exercitationem labore est nostrum sed ducimus nostrum. Quia nemo id ut doloremque culpa est eligendi. Sit mollitia dolorum consequuntur. Labore reprehenderit minima rerum consectetur corporis ullam debitis.', '2023-02-06 07:35:57', '2023-02-06 07:35:57'),
(10048, 1048, 1004, 1048, 1002, 1005, 5000, 'Soluta natus maxime nobis ex. Et officiis ut optio ut consequuntur et. Impedit natus sit nulla et fugit. Vel ad unde temporibus aut sunt culpa rerum.', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(10049, 1049, 1000, 1049, 1001, 1002, 5000, 'Laborum quae ipsam ipsum quibusdam. Quia rerum odio odio commodi officiis. Nostrum aut consequatur cum quo. Fugit vel voluptates nemo aliquam eos rerum praesentium sed. Voluptatem eaque sed assumenda nihil et ipsa pariatur. Deleniti magnam laborum consequatur et. Sint animi quisquam natus ut blanditiis autem est doloremque.', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(10050, 1050, 1000, 1050, 1000, 1006, 5000, NULL, '2023-02-06 08:15:36', '2023-02-06 08:15:36'),
(10053, 1053, 1006, 1050, 1003, 1006, 5000, 'Sakit kepala', '2023-02-07 06:50:21', '2023-02-08 01:36:31'),
(10054, 1054, 1003, 1051, 1001, 1006, 5000, NULL, '2023-02-08 01:55:55', '2023-02-08 01:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_code` bigint(20) UNSIGNED NOT NULL,
  `poly_code` bigint(20) UNSIGNED NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `doctor_code`, `poly_code`, `day`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 1000, 1000, 'Monday', '07:00:00', '15:00:00', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(2, 1001, 1000, 'Monday', '15:00:00', '23:00:00', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(3, 1002, 1001, 'Monday', '07:00:00', '15:00:00', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(4, 1003, 1001, 'Monday', '07:00:00', '15:00:00', '2023-02-06 07:35:58', '2023-02-06 07:35:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_code` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_code`, `username`, `user_status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1000, 'elbert54', 'mangang', '$2y$10$T632A5Gywg5ApkiWeLP08.bbHEACnBLjokrk4bz4KsLU9Z8mBTLYy', 'dsJRKn6Txn', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1001, 'lyla.prosacco', 'pegawai tetap', '$2y$10$dy2MM/l/BN3eQk8lWFlvVeYBrkUOSSLuRV/RpRcydMlLF0yBSpezi', 'VwwKZD69ed', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1002, 'qpredovic', 'mangang', '$2y$10$zTNP9K2ahQp65efmJu1Km.e6yMsrAe95zJfMOQDR.ZARXai/B2b9e', 'u9QMr45FmR', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1003, 'xlarson', 'mangang', '$2y$10$dDROLKyLP8upZqyKkte0FeFkqbxXzVMq3MjwGf.CB7TE/Vv.2Ced2', 'BugRk2Ly3p', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1004, 'violet.boehm', 'pegawai tetap', '$2y$10$5ncPjitxAahn3PEtlpxihuwZNnyYSrb0EzhaAV6oOU2T5r30wGkSy', 'TWybAPBvmi', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1005, 'ehagenes', 'mangang', '$2y$10$3VPl7tD2lBCW9.J3DmQMvuqjaNsQl4EQsMecEFKKwp7aFCMak5Ufm', 'v7HtOHfO9P', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1006, 'admin', 'pegawai tetap', '$2y$10$Ys17.yeS6RAU87AsenoW1.k0/Dx4v1QIIsZS9QKNZMaxlwv0vJTX6', 'Ik64jBP23d9jQgSiPA5bnMK6reYBKu32nqAWEO4CoHbRCyjuqIv3nVzJbgWP', '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1007, 'mamank', 'magang', '$2y$10$LdN0TSfEdjUjpe2OXvzwAeNtXCDaZCR69giLPFpREh7xOsUbZ0sjK', NULL, '2023-02-06 07:35:58', '2023-02-06 07:35:58'),
(1008, 'garox', 'pegawai tetap', '$2y$10$rq0pdzQLxbHrRHAa5NWEKeFxCVa7M3MG18lBUKqEqoLXUKR0fGKyy', 'PhYUxnduWCiyoElraynLlHezsGcd8g0gJjzcnWtRdJA4xy3b93wCvNcTOFss', '2023-02-07 01:56:01', '2023-02-07 01:56:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_code`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`medicine_code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_code`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_number`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `polies`
--
ALTER TABLE `polies`
  ADD PRIMARY KEY (`poly_code`),
  ADD UNIQUE KEY `polies_poly_name_unique` (`poly_name`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`prsc_number`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`registration_number`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_code`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_code` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1008;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `medicine_code` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1051;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_code` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1052;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_number` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10055;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polies`
--
ALTER TABLE `polies`
  MODIFY `poly_code` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `prsc_number` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1055;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `registration_number` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10055;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_code` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
