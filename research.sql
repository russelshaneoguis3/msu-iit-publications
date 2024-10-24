-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 09:31 AM
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
-- Table structure for table `documentation`
--

CREATE TABLE `documentation` (
  `d_id` int(11) NOT NULL,
  `d_user_id` int(10) UNSIGNED DEFAULT NULL,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `d_file_path` text DEFAULT NULL,
  `d_link` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 16, 1, 'INSERT', 'publications', '2024-10-24 03:33:27'),
(2, 19, 2, 'INSERT', 'publications', '2024-10-24 03:34:22'),
(3, 19, 3, 'INSERT', 'publications', '2024-10-24 05:44:35'),
(4, 19, 4, 'INSERT', 'publications', '2024-10-24 05:48:06'),
(5, 16, 5, 'INSERT', 'publications', '2024-10-24 05:50:07'),
(6, 16, 6, 'INSERT', 'publications', '2024-10-24 05:52:05'),
(7, 16, 7, 'INSERT', 'publications', '2024-10-24 05:53:08'),
(8, 16, 7, 'UPDATE', 'publications', '2024-10-24 06:05:00'),
(9, 16, 7, 'UPDATE', 'publications', '2024-10-24 06:06:46'),
(10, 16, 5, 'UPDATE', 'publications', '2024-10-24 06:08:07'),
(11, 16, 7, 'UPDATE', 'publications', '2024-10-24 06:09:27'),
(12, 16, 8, 'INSERT', 'publications', '2024-10-24 06:11:20'),
(13, 16, 8, 'UPDATE', 'publications', '2024-10-24 06:16:05'),
(14, 16, 1, 'UPDATE', 'publications', '2024-10-24 06:20:47'),
(15, 16, 1, 'UPDATE', 'publications', '2024-10-24 06:25:20'),
(16, 16, 9, 'INSERT', 'publications', '2024-10-24 06:32:58'),
(17, 16, 8, 'UPDATE', 'publications', '2024-10-24 06:34:41'),
(18, 16, 8, 'UPDATE', 'publications', '2024-10-24 06:41:45'),
(19, 16, 8, 'UPDATE', 'publications', '2024-10-24 06:44:15'),
(20, 16, 8, 'UPDATE', 'publications', '2024-10-24 06:44:32'),
(21, 16, 1, 'UPDATE', 'publications', '2024-10-24 06:46:47'),
(22, 16, 1, 'UPDATE', 'publications', '2024-10-24 06:46:56'),
(23, 16, 10, 'INSERT', 'publications', '2024-10-24 07:15:51'),
(24, 16, 7, 'UPDATE', 'publications', '2024-10-24 07:18:58'),
(25, 16, 7, 'UPDATE', 'publications', '2024-10-24 07:19:06'),
(26, 16, 11, 'INSERT', 'publications', '2024-10-24 07:19:14'),
(27, 16, 1, 'UPDATE', 'publications', '2024-10-24 07:29:45'),
(28, 16, 1, 'UPDATE', 'publications', '2024-10-24 07:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE `presentation` (
  `pr_id` int(11) NOT NULL,
  `pr_user_id` int(10) UNSIGNED DEFAULT NULL,
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `pr_file_path` text DEFAULT NULL,
  `pr_link` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `p_file_path` text DEFAULT NULL,
  `p_link` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`p_id`, `p_user_id`, `title`, `description`, `p_file_path`, `p_link`, `created_at`, `updated_at`) VALUES
(1, 16, 'test', 'test', 'files/Annex-B-Data-Privacy-Consent-Form-Updated965f7cf1-4a7b-4025-81f1-5f39fa03149b.pdf', NULL, '2024-10-24 03:33:27', '2024-10-24 07:29:49'),
(2, 19, 'test2', 'test2', NULL, 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', '2024-10-24 03:34:22', '2024-10-24 03:34:22'),
(3, 19, 'test4', 'test4', 'files/MEMO-TO-ALL-OVCRE-CLUSTERSb5c8beea-3dd9-4282-8660-bdbd35fb7673.pdf', NULL, '2024-10-24 05:44:35', '2024-10-24 05:44:35'),
(4, 19, 'test5', 'test5', 'files/Revised-TAS-Justification-1-2.docxf88c35e9-6b66-4e24-ba9c-847ecd3c4295.pdf', NULL, '2024-10-24 05:48:06', '2024-10-24 05:48:06'),
(5, 16, 'test7', 'test7', 'files/Revised-TAS-Justification-1-2.docx (1)9617a456-af06-4970-8e56-fe5e455c6726.pdf', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', '2024-10-24 05:50:07', '2024-10-24 06:08:07'),
(6, 16, 'test8', 'test8', 'files/Revised-TAS-Justification-1-2.docx (2)fffb58c7-b4ae-4707-90c1-8d391d035667.pdf', NULL, '2024-10-24 05:52:05', '2024-10-24 05:52:05'),
(7, 16, 'test9', 'test9', 'files/Annex-B-Data-Privacy-Consent-Form-Updatedd7e52c83-6630-49c6-8e53-f595662044c9.pdf', NULL, '2024-10-24 05:53:08', '2024-10-24 07:19:06'),
(8, 16, 'test10', 'test10', 'files/login-logout-codes1d6cea5b-d999-41cb-8bab-bd6f3980bc83.pdf', NULL, '2024-10-24 06:11:20', '2024-10-24 06:44:32'),
(9, 16, 'test11', 'test11', 'files/Annex-B-Data-Privacy-Consent-Form-Updatedfcf09710-73cb-46e5-85cb-68d11537809d.pdf', NULL, '2024-10-24 06:32:58', '2024-10-24 06:32:58'),
(10, 16, 'Test12', 'Test', NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-10-24 07:15:51', '2024-10-24 07:15:51'),
(11, 16, 'Test13', 'Test13', NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-10-24 07:19:14', '2024-10-24 07:19:14');

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
  `title` text NOT NULL,
  `description` text DEFAULT NULL,
  `r_file_path` text DEFAULT NULL,
  `r_link` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `token` text DEFAULT NULL,
  `email_status` enum('no','yes') NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `password`, `first_name`, `last_name`, `created_at`, `token`, `email_status`) VALUES
(1, 'adamrusselshane.oguis@g.msuiit.edu.ph', '$2y$12$fE3goQcx542O2QKnKdGc.ukQSb3iG8PdzPRYALX3302TPe13gRiIK', 'Adam', 'Oguis', '2024-10-13 20:57:17', NULL, 'yes'),
(12, 'adam@g.msuiit.edu.ph', '$2y$12$6Bes7L/Up27jfCf8NsyFCejywEgDvGWBZQMZAIf.A7d8NxMds9CTW', 'Adam', 'Oguis', '2024-10-14 23:37:42', NULL, 'yes'),
(14, 'russelshaneoguis1@g.msuiit.edu.ph', '$2y$12$yswa3rsa8l.nH4dB3y96aeOOgyw5JGWyOdnL2vDxHNHe/WP8RlLE2', 'Russel', 'Shane', '2024-10-15 00:39:28', '3bHG86sCtceI2nXx8YVKf8QFl4YSElrpG5Y9yh5TVFrZMXdP7L7QlpOd6MCt', 'no'),
(15, 'shane@g.msuiit.edu.ph', '$2y$12$k/0.N3Ne7pYZrlJysBqrQO3Q8gGjWP50XTair6/YiSwUhhdXkf7dm', 'Shane', 'Shane', '2024-10-15 17:34:36', 'RbBJ0sOpkwufuzDMAOMkLLYELaFSfq3fLvHczjDnI9HfzXk88cXJMGzckeRy', 'no'),
(16, 'andreigabrielle.adlawan@g.msuiit.edu.ph', '$2y$12$12boPenQoTFNhZpMM9yauO0qFkfmbwRRXdZqlq4JtRGUaJckBn9Ci', 'Andrei', 'Adlawan', '2024-10-15 18:31:19', NULL, 'yes'),
(17, 'sheshe@g.msuiit.edu.ph', '$2y$12$q1CpTT7JeBzz34rFj.GYu.XUqb6ZXB8n2w08XKpMJqfsqYG9KZUOC', 'shehs', 'shehs', '2024-10-15 21:14:46', 'XShAZfxfOnLNohL3cPtUV0bZI78TCJZ3hM0QnMYyVzTD7EDU8wxCzl46ytZa', 'no'),
(18, 'ads@g.msuiit.edu.ph', '$2y$12$LXoOn01x/Jxg4m3lAYPO8OS6uJMncH52RCcX.fXAt82ZTkVh8lCy.', 'ads', 'asd', '2024-10-15 21:15:24', NULL, 'yes'),
(19, 'sad@g.msuiit.edu.ph', '$2y$12$QLUQl0/QN9pqdhAjp/CCaOHfAU7QVCVaAJHbGvdXsgBueIfuuFQJO', 'sad', 'sad', '2024-10-15 21:16:08', NULL, 'yes'),
(20, 'dam@g.msuiit.edu.ph', '$2y$12$RL4JAGf0EHGDXH7ByVvroeRfvFW0lUlfK8WpWJdDTYpPse19bkeRi', 'dam', 'dam', '2024-10-15 21:16:41', NULL, 'yes'),
(21, 'sadsad@g.msuiit.edu.ph', '$2y$12$AKJlGE5e/eGt0WTdtYWUL.IHV5L.YrLMX1W5k2X6J9y9VYjIYbjGm', 'Adam', 'asdasd', '2024-10-16 21:16:07', NULL, 'yes'),
(22, 'ss@g.msuiit.edu.ph', '$2y$12$aBJVhq3hQzfT1/hnPjX5yuUBKOw4HtDR47zWvPVpng9SeYpPPFJ8O', 'ss', 'ss', '2024-10-20 23:16:50', 'wcyLPDRPuiif2fLcElqmlRT4ohF059IxXwVHtDItljngYOF3vtpsCf2AQwzo', 'no');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `log_user_delete` AFTER DELETE ON `users` FOR EACH ROW BEGIN
  INSERT INTO user_logs (l_user_id, affected_user_id, activity, table_name)
  VALUES (1, OLD.uid, 'DELETE', 'users');
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
  VALUES (1, NEW.uid, 'UPDATE', 'users');  -- Assuming admin (uid = 1) makes the update
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
(3, 1, 21, 'UPDATE', 'users', '2024-10-24 03:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `u_role_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`u_role_id`, `user_id`) VALUES
(1, 1),
(2, 12),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22);

--
-- Indexes for dumped tables
--

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
  ADD UNIQUE KEY `email` (`email`);

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
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `u_role_id` (`u_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `documentation`
--
ALTER TABLE `documentation`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doc_logs`
--
ALTER TABLE `doc_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD CONSTRAINT `user_logs_ibfk_1` FOREIGN KEY (`l_user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_logs_ibfk_2` FOREIGN KEY (`affected_user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`u_role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
