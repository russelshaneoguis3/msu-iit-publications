-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2024 at 08:36 AM
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
-- Database: `research`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `a_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`a_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'General Cleaning-CSM', 'Euphoria (/juːˈfɔːriə/ ⓘ yoo-FOR-ee-ə) is the experience (or affect) of pleasure or excitement and intense feelings of well-being and happiness.[1][2] Certain natural rewards and social activities, such as aerobic exercise, laughter, listening to or making music and dancing, can induce a state of euphoria.[3][4] Euphoria is also a symptom of certain neurological or neuropsychiatric disorders, such as mania.[5] Romantic love and components of the human sexual response cycle are also associated with the induction of euphoria.[6][7][8] Certain drugs, many of which are addictive, can cause euphoria, which at least partially motivates their recreational use.[9]\n\nHedonic hotspots – i.e., the pleasure centers of the brain – are functionally linked. Activation of one hotspot results in the recruitment of the others. Inhibition of one hotspot results in the blunting of the effects of activating another hotspot.[10][11] Therefore, the simultaneous activation of every hedonic hotspot within the reward system is believed to be necessary for generating the sensation of an intense euphoria.[12]', '2024-11-12 07:46:52', '2024-11-12 07:46:52'),
(2, 'General Cleaning-CCSd', 'This is a sample description, which means wala ni pulos HEHE', '2024-11-12 07:46:52', '2024-11-15 09:15:10'),
(3, 'General Cleanings-COEsa', 'This is a sample description, which means wala ni pulos HEHEs', '2024-11-12 07:46:52', '2024-11-15 09:15:37'),
(4, 'Ali mo magluto tag biko', 'Ali mo karung nobemeber 32 kay magluto tag biko. Dala lang mo lubi or camay, ako na bahala sa sugnod natosd', '2024-11-15 09:32:53', '2024-11-15 09:33:12'),
(5, 'assdasd', 'asdasdasdadasdsdadasdsad HAHA', '2024-11-18 07:54:44', '2024-11-21 00:22:23'),
(6, 'Add', 'Testings', '2024-11-21 00:22:41', '2024-11-21 02:22:32'),
(7, 'Annual Meeting', 'Magmeeting ta ugma', '2024-11-26 08:29:00', '2024-11-26 08:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `cid` int(10) UNSIGNED NOT NULL,
  `c_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`cid`, `c_name`, `created_at`, `updated_at`) VALUES
(100, 'Marine Biodiversity Laboratory', '2024-11-06 01:04:23', NULL),
(101, 'Terrestrial and Freshwater Biodiversity Laboratory', '2024-11-06 01:04:23', NULL),
(102, 'Center for Advanced Functional Materials and Nanotechnology', '2024-11-06 01:10:45', NULL),
(103, 'Oceanography Laboratory', '2024-11-06 01:10:45', NULL),
(104, 'Flora Biodiversity laboratory', '2024-11-06 01:10:45', NULL),
(105, 'Mindanao Center for High Performance Computing', '2024-11-06 01:10:45', NULL),
(106, 'Climate Change Laboratory', '2024-11-06 01:10:45', NULL),
(107, 'Animal Ecology Laboratory', '2024-11-06 01:10:45', NULL),
(108, 'Microbial Culture Collection (Room 1)', '2024-11-06 01:10:45', NULL),
(109, 'Microbial Culture Collection (Room 2)', '2024-11-06 01:10:45', NULL),
(110, 'Decontamination Room', '2024-11-06 01:10:45', NULL),
(111, 'Genomics and Proteomics Laboratory', '2024-11-06 01:10:45', NULL),
(112, 'Molecular Ecology and Physiology Laboratory', '2024-11-06 01:10:45', NULL),
(113, 'Mindanao Radiation Physics Center', '2024-11-06 01:10:45', NULL),
(114, 'PV Cells Testing Laboratory', '2024-11-06 01:10:45', NULL),
(115, 'Thermal Spray and Condensed Matter Laboratory', '2024-11-06 01:10:45', NULL),
(116, 'Materials Characterization Laboratory', '2024-11-06 01:10:45', NULL),
(117, 'Microscopy Biological Room', '2024-11-06 01:10:45', NULL),
(118, 'Soft Matter Synthesis and Testing Laboratory', '2024-11-06 01:10:45', NULL),
(119, 'Biological Physics Laboratory', '2024-11-06 01:10:45', NULL),
(120, 'Product Testing and Instrumentation Laboratory', '2024-11-06 01:10:45', NULL),
(121, 'Organic Nanomaterials Processing Laboratory', '2024-11-06 01:10:45', NULL),
(122, 'Inorganic Nanomaterials Processing Laboratory', '2024-11-06 01:10:45', NULL),
(123, 'Spectroscopy Laboratory 1', '2024-11-06 01:10:45', NULL),
(124, 'Spectroscopy Laboratory 2', '2024-11-06 01:10:45', NULL),
(125, 'Chromatography Laboratory', '2024-11-06 01:10:45', NULL),
(126, 'Cell Culture and Cell-Based Assay Laboratory', '2024-11-06 01:10:45', NULL),
(127, 'Natural Products and Related Researches Laboratory', '2024-11-06 01:10:45', NULL),
(128, 'Drug Design and Development Related Researches Laboratory', '2024-11-06 01:10:45', NULL),
(129, 'Bio-inorganic and Related Researches Laboratory', '2024-11-06 01:10:45', NULL),
(130, 'Electroanalytical and Thermal Researches Laboratory', '2024-11-06 01:10:45', NULL),
(131, 'Center for Computational Analytics and Modelling', '2024-11-06 01:10:45', NULL),
(132, 'Center for Graph Theory, Algera and Analysis', '2024-11-06 01:10:45', NULL),
(133, 'Laboratory of Theoritical and Computational Chemistry', '2024-11-06 01:10:45', NULL),
(139, 'Center for cats', '2024-11-26 08:23:12', '2024-11-26 08:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `documentation`
--

CREATE TABLE `documentation` (
  `d_id` int(11) NOT NULL,
  `d_user_id` int(10) UNSIGNED DEFAULT NULL,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `d_file_path` text DEFAULT NULL,
  `d_link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documentation`
--

INSERT INTO `documentation` (`d_id`, `d_user_id`, `title`, `description`, `d_file_path`, `d_link`, `created_at`, `updated_at`) VALUES
(5, 1, 'adasd', 'asdasd', NULL, 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', '2024-11-14 08:26:13', '2024-11-14 08:26:13'),
(6, 1, 'Data set nako', 'pa ra ni sadaijmdquh3123asd', 'files/variables_oGh5ueqCd9.xlsx', 'https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/', '2024-11-14 08:29:54', '2024-11-15 01:19:49'),
(7, 1, 'adasdsssssssssssssss', 'asdasdasdssssss', 'files/ICNS2024_Presentation-Matrix_1KIEf9XDFu.pdf', NULL, '2024-11-21 00:28:41', '2024-11-21 00:32:35'),
(8, 1, 'asdasd', 'asdasdasd', 'files/7_oTY1NHo2Ta.png', NULL, '2024-11-21 00:30:52', '2024-11-21 00:31:31'),
(9, 1, 'sdsad', 'sadasdasd', 'files/ICNS2024_Presentation-Matrix_SvexzhBSZl.pdf', NULL, '2024-11-21 00:33:01', '2024-11-21 00:33:01'),
(10, 1, 'Test Add', NULL, 'files/Diagram_d9YxTq8LhV.jpg', 'https://www.facebook.com', '2024-11-21 00:34:00', '2024-11-21 00:35:26'),
(11, 1, 'asdsadsas', NULL, NULL, 'https://www.facebook.com', '2024-11-21 00:35:41', '2024-11-21 00:35:41'),
(12, 1, 'test gyapon ni', NULL, 'files/ICNS2024_Presentation-Matrix_zcZTlgeAJF.pdf', NULL, '2024-11-21 00:36:26', '2024-11-21 00:36:26'),
(14, 42, 'sadasdawe', NULL, NULL, 'https://www.google.com/search?q=nba+score&oq=nba+score&gs_lcrp=EgZjaHJvbWUqBggAEEUYOzIGCAAQRRg7MhQIARBFGDsYQxiDARixAxiABBiKBTINCAIQABiDARixAxiABDINCAMQABiDARixAxiABDINCAQQABiDARixAxiABDINCAUQABiDARixAxiABDIHCAYQABiABDINCAcQABiDARixAxiABDINCAgQABiDARixAxiABDINCAkQABiDARixAxiABNIBBzgzOWowajeoAgCwAgA&sourceid=chrome&ie=UTF-8#sie=lg;/g/11y43tsvgm;3;/m/05jvx;mt;fp;1;;;', '2024-11-21 02:19:22', '2024-11-21 02:19:22');

--
-- Triggers `documentation`
--
DELIMITER $$
CREATE TRIGGER `log_documentation_delete` AFTER DELETE ON `documentation` FOR EACH ROW BEGIN
  INSERT INTO doc_logs (l_user_id, affected_doc, activity, table_name)
  VALUES (OLD.d_user_id, OLD.d_id, 'DELETE', 'documentation');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_documentation_insert` AFTER INSERT ON `documentation` FOR EACH ROW BEGIN
  INSERT INTO doc_logs (l_user_id, affected_doc, activity, table_name)
  VALUES (NEW.d_user_id, NEW.d_id, 'INSERT', 'documentation');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_documentation_update` AFTER UPDATE ON `documentation` FOR EACH ROW BEGIN
  INSERT INTO doc_logs (l_user_id, affected_doc, activity, table_name)
  VALUES (NEW.d_user_id, NEW.d_id, 'UPDATE', 'documentation');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `doc_logs`
--

CREATE TABLE `doc_logs` (
  `log_id` int(11) NOT NULL,
  `l_user_id` int(10) UNSIGNED DEFAULT NULL,
  `affected_doc` int(10) UNSIGNED DEFAULT NULL,
  `activity` text NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc_logs`
--

INSERT INTO `doc_logs` (`log_id`, `l_user_id`, `affected_doc`, `activity`, `table_name`, `log_time`) VALUES
(98, 42, 1, 'INSERT', 'publications', '2024-11-07 05:44:20'),
(99, 42, 2, 'INSERT', 'publications', '2024-11-07 05:54:11'),
(100, 42, 1, 'UPDATE', 'publications', '2024-11-07 05:54:19'),
(101, 42, 3, 'INSERT', 'publications', '2024-11-07 06:02:34'),
(102, 42, 4, 'INSERT', 'publications', '2024-11-07 06:04:26'),
(103, 42, 4, 'UPDATE', 'publications', '2024-11-07 06:06:01'),
(104, 42, 5, 'INSERT', 'publications', '2024-11-07 06:10:39'),
(105, 42, 5, 'UPDATE', 'publications', '2024-11-07 06:21:55'),
(106, 42, 6, 'INSERT', 'publications', '2024-11-07 06:22:29'),
(107, 42, 4, 'UPDATE', 'publications', '2024-11-07 08:16:18'),
(108, 42, 4, 'UPDATE', 'publications', '2024-11-07 08:22:58'),
(109, 42, 7, 'INSERT', 'publications', '2024-11-07 08:29:36'),
(110, 42, 7, 'UPDATE', 'publications', '2024-11-07 08:29:44'),
(111, 49, 8, 'INSERT', 'publications', '2024-11-08 00:39:26'),
(112, 42, 1, 'INSERT', 'research', '2024-11-08 03:41:04'),
(113, 42, 2, 'INSERT', 'research', '2024-11-08 03:42:49'),
(114, 42, 4, 'UPDATE', 'publications', '2024-11-08 03:47:26'),
(115, 42, 4, 'UPDATE', 'publications', '2024-11-08 03:48:01'),
(116, 42, 2, 'UPDATE', 'research', '2024-11-08 06:04:32'),
(117, 42, 2, 'UPDATE', 'research', '2024-11-08 06:06:10'),
(118, 42, 1, 'UPDATE', 'research', '2024-11-08 06:09:01'),
(119, 51, 9, 'INSERT', 'publications', '2024-11-11 03:18:14'),
(120, 51, 3, 'INSERT', 'research', '2024-11-11 03:20:37'),
(121, 51, 3, 'UPDATE', 'research', '2024-11-11 03:21:01'),
(132, 42, 1, 'UPDATE', 'publications', '2024-11-12 07:17:49'),
(133, 42, 2, 'UPDATE', 'publications', '2024-11-12 07:18:01'),
(134, 42, 6, 'UPDATE', 'publications', '2024-11-12 07:18:13'),
(135, 42, 7, 'UPDATE', 'publications', '2024-11-12 07:18:23'),
(136, 51, 3, 'UPDATE', 'research', '2024-11-12 07:18:41'),
(137, 1, 10, 'INSERT', 'publications', '2024-11-13 05:55:21'),
(138, 1, 11, 'INSERT', 'publications', '2024-11-13 06:01:41'),
(139, 1, 12, 'INSERT', 'publications', '2024-11-13 06:03:40'),
(140, 1, 12, 'UPDATE', 'publications', '2024-11-13 06:04:28'),
(141, 1, 12, 'UPDATE', 'publications', '2024-11-13 06:04:42'),
(142, 1, 11, 'UPDATE', 'publications', '2024-11-13 06:04:51'),
(143, 1, 11, 'UPDATE', 'publications', '2024-11-13 06:06:43'),
(144, 1, 11, 'UPDATE', 'publications', '2024-11-13 06:07:06'),
(145, 1, 4, 'INSERT', 'research', '2024-11-14 01:58:26'),
(146, 1, 5, 'INSERT', 'research', '2024-11-14 02:04:08'),
(147, 1, 5, 'UPDATE', 'research', '2024-11-14 02:06:32'),
(148, 1, 5, 'UPDATE', 'research', '2024-11-14 02:07:37'),
(149, 1, 11, 'UPDATE', 'publications', '2024-11-14 02:23:51'),
(150, 1, 13, 'INSERT', 'publications', '2024-11-14 02:24:01'),
(151, 1, 5, 'UPDATE', 'research', '2024-11-14 02:24:45'),
(152, 1, 5, 'UPDATE', 'research', '2024-11-14 02:25:15'),
(153, 1, 13, 'UPDATE', 'publications', '2024-11-14 02:27:05'),
(154, 1, 6, 'INSERT', 'research', '2024-11-14 02:28:31'),
(155, 1, 7, 'INSERT', 'research', '2024-11-14 02:29:31'),
(169, 1, 12, 'INSERT', 'research', '2024-11-14 03:10:36'),
(170, 49, 13, 'INSERT', 'research', '2024-11-14 03:13:42'),
(171, 49, 13, 'UPDATE', 'research', '2024-11-14 03:13:56'),
(172, 49, 17, 'INSERT', 'publications', '2024-11-14 03:14:22'),
(173, 49, 17, 'UPDATE', 'publications', '2024-11-14 03:14:36'),
(174, 1, 14, 'INSERT', 'research', '2024-11-14 03:16:56'),
(175, 1, 14, 'UPDATE', 'research', '2024-11-14 03:17:13'),
(176, 1, 18, 'INSERT', 'publications', '2024-11-14 03:17:30'),
(177, 1, 18, 'UPDATE', 'publications', '2024-11-14 03:17:41'),
(178, 1, 18, 'UPDATE', 'publications', '2024-11-14 03:19:51'),
(179, 1, 4, 'INSERT', 'presentation', '2024-11-14 07:34:42'),
(180, 1, 5, 'INSERT', 'presentation', '2024-11-14 07:35:11'),
(181, 1, 5, 'UPDATE', 'presentation', '2024-11-14 07:35:48'),
(182, 1, 11, 'UPDATE', 'publications', '2024-11-14 07:47:24'),
(183, 1, 6, 'INSERT', 'presentation', '2024-11-14 08:07:30'),
(184, 1, 6, 'UPDATE', 'presentation', '2024-11-14 08:07:37'),
(185, 1, 5, 'INSERT', 'documentation', '2024-11-14 08:26:13'),
(186, 1, 6, 'INSERT', 'documentation', '2024-11-14 08:29:54'),
(187, 49, 13, 'UPDATE', 'research', '2024-11-14 08:32:29'),
(188, 1, 6, 'UPDATE', 'documentation', '2024-11-15 01:19:49'),
(189, 1, 6, 'UPDATE', 'presentation', '2024-11-15 01:31:03'),
(190, 1, 6, 'UPDATE', 'presentation', '2024-11-15 01:31:38'),
(191, 1, 18, 'UPDATE', 'publications', '2024-11-15 01:33:25'),
(192, 1, 14, 'UPDATE', 'research', '2024-11-15 01:35:20'),
(193, 1, 12, 'UPDATE', 'research', '2024-11-15 01:37:21'),
(199, 42, 3, 'UPDATE', 'publications', '2024-11-15 02:05:37'),
(200, 42, 4, 'UPDATE', 'publications', '2024-11-15 02:05:41'),
(201, 42, 5, 'UPDATE', 'publications', '2024-11-15 02:05:50'),
(202, 49, 8, 'UPDATE', 'publications', '2024-11-15 02:05:54'),
(203, 51, 9, 'UPDATE', 'publications', '2024-11-15 02:05:57'),
(204, 1, 10, 'UPDATE', 'publications', '2024-11-15 02:05:59'),
(205, 1, 11, 'UPDATE', 'publications', '2024-11-15 02:06:03'),
(209, 49, 17, 'UPDATE', 'publications', '2024-11-15 02:06:15'),
(210, 1, 18, 'UPDATE', 'publications', '2024-11-15 02:06:18'),
(211, 1, 12, 'UPDATE', 'publications', '2024-11-15 02:07:10'),
(214, 1, 15, 'INSERT', 'research', '2024-11-18 07:55:11'),
(215, 1, 15, 'UPDATE', 'research', '2024-11-18 07:55:19'),
(216, 1, 20, 'INSERT', 'publications', '2024-11-18 07:55:43'),
(217, 1, 20, 'UPDATE', 'publications', '2024-11-18 07:55:51'),
(219, 1, 7, 'INSERT', 'presentation', '2024-11-21 00:13:43'),
(220, 1, 7, 'UPDATE', 'presentation', '2024-11-21 00:13:56'),
(221, 1, 8, 'INSERT', 'presentation', '2024-11-21 00:14:09'),
(222, 1, 8, 'UPDATE', 'presentation', '2024-11-21 00:14:29'),
(223, 1, 7, 'UPDATE', 'presentation', '2024-11-21 00:15:18'),
(224, 1, 11, 'UPDATE', 'publications', '2024-11-21 00:19:28'),
(225, 1, 21, 'INSERT', 'publications', '2024-11-21 00:24:48'),
(226, 1, 21, 'UPDATE', 'publications', '2024-11-21 00:25:09'),
(227, 1, 16, 'INSERT', 'research', '2024-11-21 00:27:56'),
(228, 1, 7, 'INSERT', 'documentation', '2024-11-21 00:28:41'),
(229, 1, 7, 'UPDATE', 'documentation', '2024-11-21 00:28:52'),
(230, 1, 8, 'INSERT', 'documentation', '2024-11-21 00:30:52'),
(231, 1, 8, 'UPDATE', 'documentation', '2024-11-21 00:31:31'),
(232, 1, 7, 'UPDATE', 'documentation', '2024-11-21 00:32:35'),
(233, 1, 9, 'INSERT', 'documentation', '2024-11-21 00:33:01'),
(234, 1, 10, 'INSERT', 'documentation', '2024-11-21 00:34:00'),
(235, 1, 10, 'UPDATE', 'documentation', '2024-11-21 00:35:26'),
(236, 1, 11, 'INSERT', 'documentation', '2024-11-21 00:35:41'),
(237, 1, 12, 'INSERT', 'documentation', '2024-11-21 00:36:26'),
(238, 1, 21, 'UPDATE', 'publications', '2024-11-21 00:56:21'),
(239, 1, 15, 'UPDATE', 'research', '2024-11-21 00:56:42'),
(240, 49, 17, 'UPDATE', 'publications', '2024-11-21 01:18:54'),
(241, 49, 13, 'UPDATE', 'research', '2024-11-21 01:22:55'),
(242, 49, 9, 'INSERT', 'presentation', '2024-11-21 01:26:18'),
(243, 49, 9, 'UPDATE', 'presentation', '2024-11-21 01:28:35'),
(245, 49, 10, 'INSERT', 'presentation', '2024-11-21 01:41:50'),
(246, 49, 17, 'INSERT', 'research', '2024-11-21 01:48:43'),
(247, 49, 17, 'UPDATE', 'research', '2024-11-21 01:49:30'),
(248, 49, 22, 'INSERT', 'publications', '2024-11-21 01:50:13'),
(249, 49, 22, 'UPDATE', 'publications', '2024-11-21 01:50:45'),
(250, 42, 23, 'INSERT', 'publications', '2024-11-21 01:53:23'),
(251, 42, 23, 'UPDATE', 'publications', '2024-11-21 01:53:49'),
(252, 42, 11, 'INSERT', 'presentation', '2024-11-21 01:55:33'),
(253, 42, 11, 'UPDATE', 'presentation', '2024-11-21 01:55:49'),
(254, 42, 18, 'INSERT', 'research', '2024-11-21 01:56:17'),
(255, 42, 18, 'UPDATE', 'research', '2024-11-21 01:56:32'),
(256, 42, 19, 'INSERT', 'research', '2024-11-21 02:02:35'),
(257, 42, 20, 'INSERT', 'research', '2024-11-21 02:07:52'),
(258, 42, 20, 'UPDATE', 'research', '2024-11-21 02:08:09'),
(259, 42, 24, 'INSERT', 'publications', '2024-11-21 02:09:40'),
(260, 42, 24, 'UPDATE', 'publications', '2024-11-21 02:09:53'),
(261, 42, 12, 'INSERT', 'presentation', '2024-11-21 02:10:51'),
(262, 42, 12, 'UPDATE', 'presentation', '2024-11-21 02:11:16'),
(263, 42, 21, 'INSERT', 'research', '2024-11-21 02:13:01'),
(264, 42, 21, 'UPDATE', 'research', '2024-11-21 02:13:22'),
(265, 42, 13, 'INSERT', 'presentation', '2024-11-21 02:15:21'),
(266, 42, 13, 'UPDATE', 'presentation', '2024-11-21 02:15:49'),
(267, 42, 25, 'INSERT', 'publications', '2024-11-21 02:16:18'),
(268, 42, 21, 'UPDATE', 'research', '2024-11-21 02:18:47'),
(269, 42, 25, 'UPDATE', 'publications', '2024-11-21 02:18:55'),
(270, 42, 14, 'INSERT', 'documentation', '2024-11-21 02:19:22'),
(271, 1, 16, 'UPDATE', 'research', '2024-11-21 02:22:39'),
(272, 54, 22, 'INSERT', 'research', '2024-11-21 03:47:45'),
(273, 54, 22, 'UPDATE', 'research', '2024-11-21 03:47:55'),
(274, 54, 26, 'INSERT', 'publications', '2024-11-21 03:49:10'),
(275, 54, 26, 'UPDATE', 'publications', '2024-11-21 03:49:37'),
(276, 54, 14, 'INSERT', 'presentation', '2024-11-21 03:50:17'),
(277, 54, 14, 'UPDATE', 'presentation', '2024-11-21 03:50:42'),
(280, 49, 23, 'INSERT', 'research', '2024-11-22 00:13:52'),
(281, 49, 23, 'UPDATE', 'research', '2024-11-22 00:14:57'),
(282, 49, 24, 'INSERT', 'research', '2024-11-22 00:16:08'),
(283, 49, 24, 'UPDATE', 'research', '2024-11-22 00:17:06'),
(286, 1, 10, 'DELETE', 'publications', '2024-11-22 07:21:52'),
(287, 1, 11, 'DELETE', 'publications', '2024-11-22 07:21:54'),
(288, 1, 12, 'DELETE', 'publications', '2024-11-22 07:21:57'),
(289, 1, 13, 'DELETE', 'publications', '2024-11-22 07:22:00'),
(290, 1, 18, 'DELETE', 'publications', '2024-11-22 07:22:07'),
(291, 1, 20, 'DELETE', 'publications', '2024-11-22 07:22:10'),
(292, 1, 21, 'DELETE', 'publications', '2024-11-22 07:22:13'),
(293, 1, 28, 'INSERT', 'publications', '2024-11-22 07:29:48'),
(294, 1, 4, 'DELETE', 'presentation', '2024-11-22 07:31:36'),
(295, 1, 5, 'DELETE', 'presentation', '2024-11-22 07:31:39'),
(296, 1, 6, 'DELETE', 'presentation', '2024-11-22 07:31:41'),
(297, 1, 7, 'DELETE', 'presentation', '2024-11-22 07:31:43'),
(298, 1, 8, 'DELETE', 'presentation', '2024-11-22 07:31:46'),
(299, 1, 16, 'INSERT', 'presentation', '2024-11-22 07:40:22'),
(300, 1, 16, 'UPDATE', 'presentation', '2024-11-22 07:41:57'),
(301, 1, 16, 'UPDATE', 'presentation', '2024-11-22 07:42:09'),
(304, 42, 29, 'INSERT', 'publications', '2024-11-26 08:33:20'),
(305, 1, 16, 'UPDATE', 'research', '2024-11-27 03:29:41'),
(307, 1, 16, 'UPDATE', 'presentation', '2024-11-28 05:44:04'),
(308, 1, 16, 'UPDATE', 'presentation', '2024-11-28 05:44:09'),
(309, 1, 4, 'UPDATE', 'research', '2024-11-28 07:04:30'),
(310, 1, 16, 'UPDATE', 'research', '2024-11-28 08:09:37'),
(311, 1, 25, 'INSERT', 'research', '2024-11-28 08:09:55'),
(312, 1, 16, 'UPDATE', 'presentation', '2024-11-28 08:16:53'),
(313, 1, 16, 'UPDATE', 'presentation', '2024-11-28 08:16:57'),
(314, 1, 16, 'UPDATE', 'presentation', '2024-11-29 01:43:54'),
(315, 1, 30, 'INSERT', 'publications', '2024-11-29 03:14:17'),
(316, 1, 30, 'UPDATE', 'publications', '2024-11-29 03:15:30'),
(317, 1, 30, 'UPDATE', 'publications', '2024-11-29 03:17:12'),
(318, 1, 28, 'UPDATE', 'publications', '2024-11-29 03:20:54'),
(325, 1, 30, 'UPDATE', 'publications', '2024-11-29 06:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE `presentation` (
  `pr_id` int(11) NOT NULL,
  `pr_user_id` int(10) UNSIGNED DEFAULT NULL,
  `research_title` text NOT NULL,
  `research_project_title` text DEFAULT NULL,
  `fund` varchar(50) DEFAULT NULL,
  `research_type` varchar(20) DEFAULT NULL,
  `so_no` varchar(50) DEFAULT NULL,
  `researcher_name` text DEFAULT NULL,
  `presenter_name` text DEFAULT NULL,
  `date_duration` varchar(50) DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `funding_source` varchar(100) DEFAULT NULL,
  `presentation_type` varchar(10) DEFAULT NULL,
  `conference_type` varchar(100) DEFAULT NULL,
  `conference_title` text DEFAULT NULL,
  `venue` text DEFAULT NULL,
  `conference_date` date DEFAULT NULL,
  `organizer` text DEFAULT NULL,
  `article_title` text DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `journal_title` text DEFAULT NULL,
  `editor` text DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `vol_issue_no` varchar(100) DEFAULT NULL,
  `page_no` varchar(100) DEFAULT NULL,
  `publication_type` varchar(50) DEFAULT NULL,
  `indexing` varchar(50) DEFAULT NULL,
  `pr_file_path` text DEFAULT NULL,
  `pr_link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`pr_id`, `pr_user_id`, `research_title`, `research_project_title`, `fund`, `research_type`, `so_no`, `researcher_name`, `presenter_name`, `date_duration`, `date_started`, `date_completed`, `cost`, `funding_source`, `presentation_type`, `conference_type`, `conference_title`, `venue`, `conference_date`, `organizer`, `article_title`, `publication_date`, `journal_title`, `editor`, `publisher`, `vol_issue_no`, `page_no`, `publication_type`, `indexing`, `pr_file_path`, `pr_link`, `created_at`, `updated_at`) VALUES
(9, 49, 'asdsadd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-21 01:26:18', '2024-11-21 01:28:35'),
(10, 49, 'asdasdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com', '2024-11-21 01:41:50', '2024-11-21 01:41:50'),
(11, 42, 'asdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-21 01:55:33', '2024-11-21 01:55:49'),
(12, 42, 'adasdasdsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-21 02:10:51', '2024-11-21 02:11:16'),
(13, 42, 'asdasdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com', '2024-11-21 02:15:21', '2024-11-21 02:15:49'),
(14, 54, 'Test Titles', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-21 03:50:17', '2024-11-21 03:50:42'),
(16, 1, 'Advancing Modeling Techniques for Count Time Series and  Lifetime Data', 'Development of an Ingarchx Model for Dengue Cases', 'Internally funded', 'Project', 'SO No. 00133-2022', 'Daisy Lou L. Polestico; Michael L. Ayala', 'Daisy Lou L. Polestico (faculty)', '6 months', '2022-01-22', '2022-06-30', '60800.00', 'OPF-Research/DR', 'Oral', 'International', 'The 5th International Congress on Natural Sciences with Sisterhood  Universities', 'Niigata University, Japan', '2024-09-26', 'ICNS International Organizing Committee (ICNS iOC) headed by  Prof. Norikazu Ohtori, Niigata University, Japan (Congress & IOC  Chairman)', 'Modeling COVID-19 cases using NB-INGARCH and ARIMA  models: A case study in Iligan City, Philippines', '2024-04-29', 'PROCEDIA COMPUTER SCIENCE', 'Farahwahida Mohd; Xiaojun Zeng', 'Elsevier Publications', '234', 'pp. 262-269', 'International', 'Scopus', NULL, 'https://doi.org/10.1016/j.procs.2024.03.012', '2024-11-22 07:40:22', '2024-11-29 01:43:54');

--
-- Triggers `presentation`
--
DELIMITER $$
CREATE TRIGGER `log_presentation_delete` AFTER DELETE ON `presentation` FOR EACH ROW BEGIN
  INSERT INTO doc_logs (l_user_id, affected_doc, activity, table_name)
  VALUES (OLD.pr_user_id, OLD.pr_id, 'DELETE', 'presentation');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_presentation_insert` AFTER INSERT ON `presentation` FOR EACH ROW BEGIN
  INSERT INTO doc_logs (l_user_id, affected_doc, activity, table_name)
  VALUES (NEW.pr_user_id, NEW.pr_id, 'INSERT', 'presentation');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_presentation_update` AFTER UPDATE ON `presentation` FOR EACH ROW BEGIN
  INSERT INTO doc_logs (l_user_id, affected_doc, activity, table_name)
  VALUES (NEW.pr_user_id, NEW.pr_id, 'UPDATE', 'presentation');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `p_id` int(11) NOT NULL,
  `p_user_id` int(10) UNSIGNED DEFAULT NULL,
  `research_title` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `research_type` varchar(100) DEFAULT NULL,
  `authors` text DEFAULT NULL,
  `coauthors` text DEFAULT NULL,
  `objectives` text DEFAULT NULL,
  `beneficiaries` text DEFAULT NULL,
  `date_duration` varchar(50) DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `funding_source` varchar(100) DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `publication_title` text DEFAULT NULL,
  `editors` text DEFAULT NULL,
  `publisher` varchar(150) DEFAULT NULL,
  `vol_issue_no` varchar(250) DEFAULT NULL,
  `no_pages` int(11) DEFAULT NULL,
  `publication_type` varchar(100) DEFAULT NULL,
  `issn_isbn` varchar(150) DEFAULT NULL,
  `press_release` text DEFAULT NULL,
  `p_file_path` text DEFAULT NULL,
  `p_link` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`p_id`, `p_user_id`, `research_title`, `keywords`, `research_type`, `authors`, `coauthors`, `objectives`, `beneficiaries`, `date_duration`, `date_started`, `date_completed`, `cost`, `funding_source`, `publication_date`, `publication_title`, `editors`, `publisher`, `vol_issue_no`, `no_pages`, `publication_type`, `issn_isbn`, `press_release`, `p_file_path`, `p_link`, `created_at`, `updated_at`) VALUES
(1, 42, 'Test Titles', 'asdasd', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '2023-11-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-07 05:44:20', '2024-11-07 05:54:19'),
(2, 42, 'Test Title', 'asdasd', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '2022-12-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-07 05:54:11', '2024-11-07 05:54:11'),
(3, 42, 'Test Title 1', 'asdasd', 'Article', 'adam', 'adam; russel', NULL, '', NULL, '2024-08-07', '2024-11-22', '10000', 'DOST-ASTHRDP', '2024-11-06', 'Test Pub title', 'shane', 'New York Business Global', 'e.g. Vol No. 17, No. 2, pp. 790-809', 22, 'International – SCOPUS indexed', '1307-5543', NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-07 06:02:34', '2024-11-07 06:02:34'),
(4, 42, 'Test Title 2s', 'I.e. stands for the Latin id est, or \'that is,\' and is used to introduce a word or phrase that restates what has been said previously. What follows the i.e. is meant to clarify the earlier statement:\r\n\r\nResearch at three British zoos suggests that meerkats \"showed increased positive interactions\" (i.e. they were happier) when human visitors returned than they were during the visitorless lockdown.\r\n— Peter Rhodes, Shropshire Star (Telford, England), 5 Mar. 2021\r\n\r\nI.e. is similarly useful for defining or explaining a term or concept whose meaning readers might not know:\r\n\r\nTake butterflied — i.e. deboned — whole fish, sprinkle it with lime and orange juices, and sumac, and then bake for about 10 minutes.\r\n— Emily Weinstein, The New York Times, 10 June 2022\r\n\r\nIf your home has “hard water” (i.e., a high mineral content), your sinks, showers, and tubs no doubt bear white or yellow buildup as a result. — Melissa Reddigari, BobVila.com, 22 Aug. 2019\r\n\r\nWhile i.e. is often set off by brackets or parentheses, it can also sometimes follow a comma or e', 'Article', 'russels', 'adam', NULL, '', '10 months', '2024-11-04', '2024-11-06', '₱ 10000', 'DOST-ASTHRDP', '2024-11-06', 'Test Pub title', 'shane', 'New York Business Global', 'e.g. Vol No. 17, No. 2, pp. 790-809', 23, 'International – SCOPUS indexed', '1307-5543', NULL, 'files/Revised-TAS-Justification-1-2.docxcmQE4pkZwQ.pdf', NULL, '2024-11-07 06:04:26', '2024-11-08 03:48:01'),
(5, 42, 'b', 'b', 'Study', 'b', 'b', NULL, '', 'b', '2024-10-03', '2024-10-05', '2', 'b', '2024-01-01', 'b', 'b', 'b', 'b', 2, 'b', 'b', NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-07 06:10:39', '2024-11-07 06:21:55'),
(6, 42, 'c', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '2021-05-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-07 06:22:29', '2024-11-07 06:22:29'),
(7, 42, 'Last test', 'last testss', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '2020-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-07 08:29:36', '2024-11-07 08:29:44'),
(8, 49, 'Test ni maam dinah', 'Basically, the key to writing a great \"good morning\" text is to let it come from the heart. Don’t put too much pressure on yourself and let the words flow. Though, if you’re still struggling to find exactly where to start, we’ve rounded up some of the best lines and phrases that range from deep and touching to cute and inspirational.\r\n\r\nThere’s truly nothing like a morning pick me up. So what are you waiting for? Type in one of these messages and hit send.', 'Article', 'asdasdasd; adass', NULL, NULL, '', '10 months', '2024-07-01', '2024-11-06', '10000', 'DOST-ASTHRDP', '2024-11-05', 'Test Pub title ni maam Dinah', 'asd', 'New York Business Global', 'e.g. Vol No. 12, No. 2, pp. 790-809', 23, 'International – SCOPUS indexed', '1307-5543', NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-08 00:39:26', '2024-11-08 00:39:26'),
(9, 51, 'Test Title', 'asdasdasdqwe', 'Project', 'adam', 'russel', NULL, '', '10 months', '2024-08-06', '2024-11-04', '10000', 'DOST-ASTHRDP', '2024-11-06', 'a', 'shane', 'b', NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-11 03:18:14', '2024-11-11 03:18:14'),
(17, 49, 'Dinah pub', NULL, 'Article', NULL, NULL, NULL, '', '24 months', NULL, NULL, NULL, NULL, '2024-11-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com', '2024-11-14 03:14:22', '2024-11-21 01:18:54'),
(22, 49, 'asdsad', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '2024-11-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', '2024-11-21 01:50:13', '2024-11-21 01:50:45'),
(23, 42, 'asdasd', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '2024-11-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-11-21 01:53:23', '2024-11-21 01:53:49'),
(24, 42, 'adasdsad', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '2024-11-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com', '2024-11-21 02:09:40', '2024-11-21 02:09:53'),
(25, 42, 'Test walay publi date', 'sadasdasdasd', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com', '2024-11-21 02:16:18', '2024-11-21 02:18:55'),
(26, 54, 'test ni nakels', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, '2024-11-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com', '2024-11-21 03:49:10', '2024-11-21 03:49:37'),
(28, 1, 'On the Bivariate Extension of the extended Standard U-quadratic Distribution', 'Standard U-quadratic distribution, Kumaraswamy distribution, \r\nbivariate distribution, bivariate pseudo family, bathtub shape \r\ndistribution', 'Article', 'Idzhar A. lakibul; Daisy Lou L. Polestico; Arnulfo P. Supe', NULL, 'To develop a bivariate version of the extended standard Uquadratic (eSU) distribution and compare with the Bivariate \r\nCubic Transmuted Uniform distribution.', 'Researchers, academe, modelers', '10 months', '2023-08-01', '2024-06-01', 'none', 'DOST-ASTHRDP', '2024-04-30', 'European Journal of Pure and Applied Mathematic', 'Eyüp Çetin; Baris Kiremitc', 'New York Business Global', 'Vol No. 17, No. 2, pp. 790-809', 20, 'International – SCOPUS indexed', '1307-5543', 'Researchers have introduced the bivariate extended standard Uquadratic (eSU) distribution, a significant advancement in \r\nstatistical distribution that employs the compounding method. \r\nThis new distribution can generate bivariate shape distributions \r\nwith unique properties, including both X and Y variables \r\nexhibiting bathtub shapes, and features comprehensive \r\nproperties such as marginal and conditional distributions, \r\nvarious moments, Pearson correlation coefficient, and the stressstrength parameter. Utilizing maximum likelihood estimation \r\nand a simulation study for parameter estimation, the Bivariate \r\neSU distribution has shown a superior fit compared to the \r\nBivariate Cubic Transmuted Uniform (CTU) distribution. This \r\ndevelopment holds substantial implications for sectors reliant on \r\nadvanced data analysis, such as healthcare, finance, engineering, \r\nand environmental science, offering enhanced accuracy in \r\nmodeling complex bivariate relationships and ultimately \r\nbenefiting the broader community through improved decisionmaking and analysis capabilities.', NULL, 'https://doi.org/10.29020/nybg.ejpam.v17i2.5136', '2024-11-22 07:29:48', '2024-11-29 03:20:54'),
(29, 42, 'asdasd', 'asdasdasd', 'Project', 'Andrei', 'Adam', NULL, '', '2 months', '2023-10-02', '2024-11-26', '100000', 'DOST-ASTHRDP', '2024-11-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'https://www.nimh.nih.gov/health/topics/autism-spectrum-disorders-asd', '2024-11-26 08:33:20', '2024-11-26 08:33:20'),
(30, 1, 'Test Title', 'test keywords', 'Project', 'asdasdasd; adass', 'adam; russel', 'assdasdasdasdasdasdadasd', 'test bene', '15 months', NULL, NULL, '10000', 'DOST-ASTHRDP', NULL, 'Test admin Pub', 'shane', 'test publisher', 'e.g. Vol No. 12, No. 2, pp. 790-809', 23, 'International – SCOPUS indexed', '1307-5543', 'press release', NULL, 'https://www.w3schools.com/w3css/w3css_modal.asdasdads.assdasdasdsad.asdasdasdasp', '2024-11-29 03:14:17', '2024-11-29 06:56:50');

--
-- Triggers `publications`
--
DELIMITER $$
CREATE TRIGGER `log_publications_delete` AFTER DELETE ON `publications` FOR EACH ROW BEGIN
  INSERT INTO doc_logs (l_user_id, affected_doc, activity, table_name)
  VALUES (OLD.p_user_id, OLD.p_id, 'DELETE', 'publications');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_publications_insert` AFTER INSERT ON `publications` FOR EACH ROW BEGIN
  INSERT INTO doc_logs (l_user_id, affected_doc, activity, table_name)
  VALUES (NEW.p_user_id, NEW.p_id, 'INSERT', 'publications');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_publications_update` AFTER UPDATE ON `publications` FOR EACH ROW BEGIN
  INSERT INTO doc_logs (l_user_id, affected_doc, activity, table_name)
  VALUES (NEW.p_user_id, NEW.p_id, 'UPDATE', 'publications');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `r_id` int(11) NOT NULL,
  `r_user_id` int(10) UNSIGNED DEFAULT NULL,
  `research_title` text NOT NULL,
  `description` text DEFAULT NULL,
  `leaders` text DEFAULT NULL,
  `members` text DEFAULT NULL,
  `research_type` varchar(20) DEFAULT NULL,
  `so_no` varchar(50) DEFAULT NULL,
  `r_link` text DEFAULT NULL,
  `date_duration` varchar(50) DEFAULT NULL,
  `date_started` date DEFAULT NULL,
  `date_completed` date DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `funding_source` varchar(100) DEFAULT NULL,
  `r_file_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`r_id`, `r_user_id`, `research_title`, `description`, `leaders`, `members`, `research_type`, `so_no`, `r_link`, `date_duration`, `date_started`, `date_completed`, `cost`, `funding_source`, `r_file_path`, `created_at`, `updated_at`) VALUES
(1, 42, 'Test Research', 'Research is defined as the creation of new knowledge and/or the use of existing knowledge in a new and creative way so as to generate new concepts, methodologies and understandings. This could include synthesis and analysis of previous research to the extent that it leads to new and creative outcomes.', 'Daisy Lou Polestico; Johniel Babiera', 'Adam Oguis; Andrei Adlawan', 'Basic', 'SO No. 00001-2024', NULL, '10 months', '2024-08-06', '2024-11-05', '10000', 'DOST-OPF', 'files/Publication-Matrix_Lakibul_Polestico_Supe_IdjMNujyHj.pdf', '2024-11-08 03:41:04', '2024-11-08 06:09:01'),
(2, 42, 'Test Research 2', 'Research is a process of systematic inquiry that entails collection of data; documentation of critical information; and analysis and interpretation of that data/information, in accordance with suitable methodologies set by specific professional fields and academic disciplinesx.', 'Daisy Lou Polestico; Johniel Babiera', 'Adam Oguis; Andrei Adlawan', 'Applied', 'SO No. 00001-2024', 'https://www.w3schools.com/w3css/w3css_modal.asp', '10 months', '2024-05-07', '2024-11-04', '10000', 'DOST-OPF', 'files/5136Znnad3lucR.pdf', '2024-11-08 03:42:49', '2024-11-08 06:06:10'),
(3, 51, 'asdasda', 'asdasdasd ssss', NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-01', NULL, NULL, NULL, 'files/Print Grade Form_9gi90QVj7v.pdf', '2024-11-11 03:20:37', '2024-11-11 03:21:01'),
(4, 1, 'Test Res Admin', 'Beauty is no quality in things themselves: It exists merely in the mind which contemplates them; and each mind perceives a different beauty. One person may even perceive deformity, where another is sensible of beauty; and every individual ought to acquiesce in his own sentiment, without pretending to regulate those of others. (Hume 1757, 136)', 'Test Res Admin', 'Test Res Admin', NULL, 'Test Res Admin', 'https://www.facebook.com', '10 months', '2022-02-16', '2022-12-07', '10000', 'Test Res Admin', NULL, '2024-11-14 01:58:26', '2024-11-28 07:04:30'),
(5, 1, 'asdasddd', 'asdasd sd ssd sd', 'adad', 'asdasd', 'asdasd', NULL, 'https://www.facebook.com', 'asdasd', NULL, NULL, NULL, NULL, NULL, '2024-11-14 02:04:08', '2024-11-14 02:25:15'),
(6, 1, 'Test Titles', 'adasd', NULL, NULL, NULL, NULL, 'https://www.facebook.com', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-14 02:28:31', '2024-11-14 02:28:31'),
(7, 1, 'Tesadasd', NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-14 02:29:31', '2024-11-14 02:29:31'),
(12, 1, 'asdasdasdasdasd', 'sd', NULL, NULL, 'Others', NULL, 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-14 03:10:36', '2024-11-15 01:37:21'),
(13, 49, 'Dinah Reseachs', NULL, NULL, NULL, 'Applied', NULL, 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', '5 months', '2024-11-13', NULL, '100000', NULL, NULL, '2024-11-14 03:13:42', '2024-11-21 01:22:55'),
(14, 1, 'adasds', 'asdasd', NULL, NULL, 'Basic', NULL, 'https://www.facebook.com', '14 months', NULL, NULL, NULL, NULL, NULL, '2024-11-14 03:16:56', '2024-11-15 01:35:20'),
(15, 1, 'test', 'asdasdasd sasass', NULL, NULL, NULL, NULL, 'https://www.facebook.com', NULL, '2024-11-05', NULL, NULL, NULL, NULL, '2024-11-18 07:55:11', '2024-11-21 00:56:42'),
(16, 1, 'Test Adds', 'asdasd d sdad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'files/Print Grade Form_luCyj6Q0Og.pdf', '2024-11-21 00:27:56', '2024-11-28 08:09:37'),
(17, 49, 'asdsadsad', NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', NULL, '2024-11-11', NULL, NULL, NULL, NULL, '2024-11-21 01:48:43', '2024-11-21 01:49:30'),
(18, 42, 'asdasd', NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com', NULL, '2024-11-06', NULL, NULL, NULL, NULL, '2024-11-21 01:56:17', '2024-11-21 01:56:32'),
(19, 42, 'asdasd', NULL, NULL, NULL, NULL, NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-21 02:02:35', '2024-11-21 02:02:35'),
(20, 42, 'asdasdasdasdd', NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com', NULL, '2024-11-13', NULL, NULL, NULL, NULL, '2024-11-21 02:07:52', '2024-11-21 02:08:09'),
(21, 42, 'asdasd', 'asdasdasdasd', NULL, NULL, NULL, NULL, 'https://www.facebook.com', NULL, '2024-11-03', NULL, NULL, NULL, NULL, '2024-11-21 02:13:01', '2024-11-21 02:18:47'),
(22, 54, 'test ni angkol', NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com', NULL, '2024-11-06', NULL, NULL, NULL, NULL, '2024-11-21 03:47:45', '2024-11-21 03:47:55'),
(23, 49, 'test', NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com', NULL, '2021-06-15', NULL, NULL, NULL, NULL, '2024-11-22 00:13:52', '2024-11-22 00:14:57'),
(24, 49, 'tes', NULL, NULL, NULL, NULL, NULL, 'https://www.facebook.com', NULL, '2021-06-15', NULL, NULL, NULL, NULL, '2024-11-22 00:16:08', '2024-11-22 00:17:06'),
(25, 1, 'asdasds', 'asdasdsadasdsdasadasdsad', NULL, NULL, NULL, NULL, 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-28 08:09:55', '2024-11-28 08:09:55');

--
-- Triggers `research`
--
DELIMITER $$
CREATE TRIGGER `log_research_delete` AFTER DELETE ON `research` FOR EACH ROW BEGIN
  INSERT INTO doc_logs (l_user_id, affected_doc, activity, table_name)
  VALUES (OLD.r_user_id, OLD.r_id, 'DELETE', 'research');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_research_insert` AFTER INSERT ON `research` FOR EACH ROW BEGIN
  INSERT INTO doc_logs (l_user_id, affected_doc, activity, table_name)
  VALUES (NEW.r_user_id, NEW.r_id, 'INSERT', 'research');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_research_update` AFTER UPDATE ON `research` FOR EACH ROW BEGIN
  INSERT INTO doc_logs (l_user_id, affected_doc, activity, table_name)
  VALUES (NEW.r_user_id, NEW.r_id, 'UPDATE', 'research');
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `centerlab` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` text DEFAULT NULL,
  `email_status` enum('no','yes') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `password`, `first_name`, `last_name`, `centerlab`, `created_at`, `updated_at`, `token`, `email_status`) VALUES
(1, 'daisylou.polestico@g.msuiit.edu.ph', '$2y$10$s9F/RkME5JQXa2rOSFNVLejJfo.HXC6dcvcLzQvvnmKRB7TBNU2N2', 'Daisy Lou', 'Polestico', 131, '2024-10-13 20:57:17', '2024-11-27 06:42:44', NULL, 'yes'),
(42, 'andreigabrielle.adlawan@g.msuiit.edu.ph', '$2y$12$ucot5EXqQeEmThNtnN4rReb1pSepOgbFXPzxfG/0Q47ULLb7FSPGS', 'Andrei Gabrielle', 'Adlawan', 131, '2024-11-05 04:50:44', '2024-11-21 02:20:12', NULL, 'yes'),
(43, 'Inday@g.msuiit.edu.ph', '$2y$12$MHvefd/2lzAOMvvxrstNf.RTisEovyjhbHVfdmCHIGEFAElGdxf9W', 'Inday', 'Ligaya', 131, '2024-11-05 05:24:23', NULL, NULL, 'yes'),
(44, 'Dodong@g.msuiit.edu.ph', '$2y$12$k0z7mhwVinWPZI6QJeMHa.l9iQPJAzdIoZjCm2enHeGp9878V1.9G', 'Dodong', 'Pogi', 133, '2024-11-05 05:24:55', NULL, NULL, 'yes'),
(45, 'Jan@g.msuiit.edu.ph', '$2y$12$MfAZZ/I.5V4poAp3QgN5SeyVaav5sDiQti5p7WjKuipnnbnhovYM.', 'Jan', 'Paran', 130, '2024-11-05 05:26:53', NULL, NULL, 'yes'),
(47, 'ss@g.msuiit.edu.ph', '$2y$12$LibMo3qg.SpDxQLqs61ReeupFcHGlivC6Wn6PISpNp41dPB7rFDt2', 'ss', 'ss', 130, '2024-11-06 01:49:21', NULL, NULL, 'yes'),
(48, 'aa@g.msuiit.edu.ph', '$2y$12$AIamcMeIT1O8dOVYQH9gO.pdNL2PmOB5.N7EPO2aH5BXCx1Zpf8AK', 'Aa', 'Aa', NULL, '2024-11-06 01:49:51', NULL, NULL, 'yes'),
(49, 'dinah.dumaguing@g.msuiit.edu.ph', '$2y$12$diIBBAmRsTRFR0o1zA99cuGirIcCgAHWk6BXUaKsdLl7vR3tPYNf.', 'Dinah', 'Dumaguing', 131, '2024-11-06 03:12:27', '2024-11-21 02:26:12', NULL, 'yes'),
(50, 'sss@g.msuiit.edu.ph', '$2y$12$DtjNkNMkL6rYs9uWPaVwr.Rw4mQKAb8r4rBVcBt/imVa/c0TW8tmK', 'ss', 'sss', NULL, '2024-11-06 03:13:37', NULL, NULL, 'yes'),
(51, 'test@g.msuiit.edu.ph', '$2y$12$ZmaohdafRx/e3V9K4XHNbuX89N560n9RBDlJseTwAOFe0OlrSkewO', 'Test', 'Test', NULL, '2024-11-11 03:15:37', NULL, NULL, 'yes'),
(52, 'adasd@g.msuiit.edu.ph', '$2y$12$4b9H9CLfKxrRoJC0kCiSIODf3MrQqhGzketpjsWX03sqEInzMdtHO', 'asasd', 'asdasdasd', NULL, '2024-11-18 03:28:08', NULL, NULL, 'yes'),
(54, 'angkol@g.msuiit.edu.ph', '$2y$12$4Y4ARXTTmOgot7JBnGelbemz99d4AVDJbFbbPq01r2ajnILEteL5C', 'Angkol', 'Nako', 129, '2024-11-21 03:18:54', NULL, NULL, 'yes'),
(55, 'qwerty@g.msuiit.edu.ph', '$2y$12$Qy1IAfbyN0CAkFRB3O6ZqeM0zvrehx9xtNHB1lwk07uHQY3pREiaa', 'qwertry', 'qwerty', 115, '2024-11-26 06:36:05', NULL, NULL, 'yes'),
(56, 'qwertyy@g.msuiit.edu.ph', '$2y$12$1IFXaXJL7Jvj/EHyGvSI8u7VeTZEiSX2UAMzbA7Ox7t4/gsBrOxcy', 'qwertyyy', 'qwertyyy', 131, '2024-11-26 08:19:57', NULL, NULL, 'yes'),
(68, 'adamrusselshane.oguis@g.msuiit.edu.ph', '$2y$12$RVLVyzlLQ5dJ0991JGqSceM6ZoXKOaSnXLDYguXqXVMriOV/u2uk.', 'Adam', 'Oguis', 113, '2024-11-29 07:25:26', NULL, '1V9ZHE1oTbqNwXLmw3nMmpQlXsCJkGI6o44vHVtzrk7X3meQdEQy7Tr5y4ec', 'no');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `assign_user_role` AFTER INSERT ON `users` FOR EACH ROW BEGIN
  INSERT INTO user_roles (u_role_id, user_id)
  VALUES (2, NEW.uid);  -- Assuming `2` is the role_id for regular users
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_user_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
  INSERT INTO user_logs (l_user_id, affected_user_id, activity, table_name)
  VALUES (NEW.uid, NEW.uid, 'INSERT', 'users');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_user_update` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
  INSERT INTO user_logs (l_user_id, affected_user_id, activity, table_name)
  VALUES (NEW.uid, NEW.uid, 'UPDATE', 'users');  
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `log_id` int(11) NOT NULL,
  `l_user_id` int(10) UNSIGNED DEFAULT NULL,
  `affected_user_id` int(10) UNSIGNED DEFAULT NULL,
  `activity` text NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`log_id`, `l_user_id`, `affected_user_id`, `activity`, `table_name`, `log_time`) VALUES
(60, 49, 49, 'UPDATE', 'users', '2024-11-06 03:40:54'),
(61, 49, 49, 'UPDATE', 'users', '2024-11-06 03:41:19'),
(63, 42, 42, 'UPDATE', 'users', '2024-11-07 04:00:11'),
(64, 42, 42, 'UPDATE', 'users', '2024-11-08 06:23:31'),
(65, 51, 51, 'INSERT', 'users', '2024-11-11 03:15:37'),
(66, 51, 51, 'UPDATE', 'users', '2024-11-11 03:16:30'),
(67, 51, 51, 'UPDATE', 'users', '2024-11-11 03:16:34'),
(68, 42, 42, 'UPDATE', 'users', '2024-11-13 03:14:07'),
(69, 42, 42, 'UPDATE', 'users', '2024-11-13 03:17:31'),
(70, 42, 42, 'UPDATE', 'users', '2024-11-13 03:17:36'),
(71, 42, 42, 'UPDATE', 'users', '2024-11-13 03:17:41'),
(72, 42, 42, 'UPDATE', 'users', '2024-11-13 03:17:46'),
(73, 42, 42, 'UPDATE', 'users', '2024-11-13 03:18:05'),
(74, 42, 42, 'UPDATE', 'users', '2024-11-13 03:37:26'),
(75, 42, 42, 'UPDATE', 'users', '2024-11-13 03:37:41'),
(79, 47, 47, 'UPDATE', 'users', '2024-11-18 03:20:30'),
(80, 51, 51, 'UPDATE', 'users', '2024-11-18 03:27:12'),
(81, 52, 52, 'INSERT', 'users', '2024-11-18 03:28:08'),
(84, 42, 42, 'UPDATE', 'users', '2024-11-21 02:20:08'),
(85, 42, 42, 'UPDATE', 'users', '2024-11-21 02:20:12'),
(86, 49, 49, 'UPDATE', 'users', '2024-11-21 02:26:09'),
(87, 49, 49, 'UPDATE', 'users', '2024-11-21 02:26:12'),
(88, 47, 47, 'UPDATE', 'users', '2024-11-21 02:45:24'),
(89, 52, 52, 'UPDATE', 'users', '2024-11-21 02:46:14'),
(90, 48, 48, 'UPDATE', 'users', '2024-11-21 02:49:00'),
(92, 54, 54, 'INSERT', 'users', '2024-11-21 03:18:54'),
(93, 54, 54, 'UPDATE', 'users', '2024-11-21 03:42:34'),
(96, 55, 55, 'INSERT', 'users', '2024-11-26 06:36:05'),
(97, 55, 55, 'UPDATE', 'users', '2024-11-26 06:43:02'),
(98, 56, 56, 'INSERT', 'users', '2024-11-26 08:19:57'),
(99, 56, 56, 'UPDATE', 'users', '2024-11-26 08:46:45'),
(100, 1, 1, 'UPDATE', 'users', '2024-11-27 06:37:13'),
(101, 1, 1, 'UPDATE', 'users', '2024-11-27 06:38:04'),
(102, 1, 1, 'UPDATE', 'users', '2024-11-27 06:38:45'),
(103, 1, 1, 'UPDATE', 'users', '2024-11-27 06:41:08'),
(104, 50, 50, 'UPDATE', 'users', '2024-11-27 06:41:21'),
(109, 1, 1, 'UPDATE', 'users', '2024-11-27 06:42:36'),
(110, 1, 1, 'UPDATE', 'users', '2024-11-27 06:42:44'),
(127, 68, 68, 'INSERT', 'users', '2024-11-29 07:25:26');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `u_role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`u_role_id`, `user_id`) VALUES
(1, 1),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 54),
(2, 55),
(2, 56),
(2, 68);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `documentation`
--
ALTER TABLE `documentation`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `d_user_id` (`d_user_id`);

--
-- Indexes for table `doc_logs`
--
ALTER TABLE `doc_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `l_user_id` (`l_user_id`);

--
-- Indexes for table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`pr_id`),
  ADD KEY `pr_user_id` (`pr_user_id`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_user_id` (`p_user_id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `r_user_id` (`r_user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_users_center` (`centerlab`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `l_user_id` (`l_user_id`),
  ADD KEY `affected_user_id` (`affected_user_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`u_role_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `documentation`
--
ALTER TABLE `documentation`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doc_logs`
--
ALTER TABLE `doc_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documentation`
--
ALTER TABLE `documentation`
  ADD CONSTRAINT `documentation_ibfk_1` FOREIGN KEY (`d_user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `doc_logs`
--
ALTER TABLE `doc_logs`
  ADD CONSTRAINT `doc_logs_ibfk_1` FOREIGN KEY (`l_user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presentation`
--
ALTER TABLE `presentation`
  ADD CONSTRAINT `presentation_ibfk_1` FOREIGN KEY (`pr_user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`p_user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `research`
--
ALTER TABLE `research`
  ADD CONSTRAINT `research_ibfk_1` FOREIGN KEY (`r_user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_center` FOREIGN KEY (`centerlab`) REFERENCES `center` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD CONSTRAINT `user_logs_ibfk_1` FOREIGN KEY (`l_user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_logs_ibfk_2` FOREIGN KEY (`affected_user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`u_role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
