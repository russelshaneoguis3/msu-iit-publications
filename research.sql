-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 09:02 AM
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documentation`
--

INSERT INTO `documentation` (`d_id`, `d_user_id`, `title`, `description`, `d_file_path`, `d_link`, `created_at`, `updated_at`) VALUES
(1, 16, 'Test Docus', 'Test Docus', 'files/Print Grade Form_KelhZVa5vt.pdf', 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-10-29 07:18:48', '2024-10-29 07:19:49'),
(2, 16, 'Test Docu2', 'Test Docu2', 'files/variables_3KyMgKZx4s.xlsx', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js', '2024-10-29 07:32:57', '2024-10-29 07:34:17');

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
(72, 16, 1, 'INSERT', 'publications', '2024-10-29 06:31:15'),
(73, 16, 2, 'INSERT', 'publications', '2024-10-29 06:38:00'),
(74, 16, 3, 'INSERT', 'publications', '2024-10-29 06:39:52'),
(75, 16, 3, 'UPDATE', 'publications', '2024-10-29 06:40:57'),
(76, 16, 2, 'UPDATE', 'publications', '2024-10-29 06:41:12'),
(77, 16, 1, 'INSERT', 'research', '2024-10-29 06:46:01'),
(78, 16, 1, 'INSERT', 'presentation', '2024-10-29 06:50:10'),
(79, 16, 1, 'INSERT', 'documentation', '2024-10-29 07:18:48'),
(80, 16, 1, 'UPDATE', 'documentation', '2024-10-29 07:19:49'),
(81, 16, 2, 'INSERT', 'documentation', '2024-10-29 07:32:57'),
(82, 16, 2, 'UPDATE', 'documentation', '2024-10-29 07:34:17');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`pr_id`, `pr_user_id`, `title`, `description`, `pr_file_path`, `pr_link`, `created_at`, `updated_at`) VALUES
(1, 16, 'Test Presentation', 'Test Presentation', NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-10-29 06:50:10', '2024-10-29 06:50:10');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`p_id`, `p_user_id`, `title`, `description`, `p_file_path`, `p_link`, `created_at`, `updated_at`) VALUES
(1, 16, 'Test Pub', 'Test Pub', 'files/Print Grade Form_hVMiVd5TlO.pdf', 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-10-28 22:31:15', '2024-10-28 22:31:15'),
(2, 16, 'Test pub 2', 'Test pub 2s', NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-10-29 06:38:00', '2024-10-29 06:41:12'),
(3, 16, 'Test pub 3', 'Test Pub 3s', NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-10-29 06:39:52', '2024-10-29 06:40:57');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`r_id`, `r_user_id`, `title`, `description`, `r_file_path`, `r_link`, `created_at`, `updated_at`) VALUES
(1, 16, 'Test Res', 'Test res', NULL, 'https://www.w3schools.com/w3css/w3css_modal.asp', '2024-10-29 06:46:01', '2024-10-29 06:46:01');

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
(22, 'ss@g.msuiit.edu.ph', '$2y$12$aBJVhq3hQzfT1/hnPjX5yuUBKOw4HtDR47zWvPVpng9SeYpPPFJ8O', 'ss', 'ss', '2024-10-20 23:16:50', 'wcyLPDRPuiif2fLcElqmlRT4ohF059IxXwVHtDItljngYOF3vtpsCf2AQwzo', 'no'),
(23, 'aa@g.msuiit.edu.ph', '$2y$12$FG6EwiRjvrrs3ljoy4nSmulon.V5Dm.R9P5ijdlyJMC/1IAnoVham', 'aaa', 'AAA', '2024-10-27 22:41:28', 'FNmM9OVhJ7tKFfq08fWLZCcpAaioFMFeq26LgxrPLTak1H9tr7MDoEUgiWvI', 'no');

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
(3, 1, 21, 'UPDATE', 'users', '2024-10-24 03:17:16'),
(4, 23, 23, 'INSERT', 'users', '2024-10-28 06:41:28');

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
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doc_logs`
--
ALTER TABLE `doc_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
