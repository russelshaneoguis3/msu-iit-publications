-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 09:28 AM
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(18, 'ads@g.msuiit.edu.ph', '$2y$12$LXoOn01x/Jxg4m3lAYPO8OS6uJMncH52RCcX.fXAt82ZTkVh8lCy.', 'ads', 'asd', '2024-10-15 21:15:24', 'OXRbsokWQU1seJTeHVB8xa6LmLgw7hRByh3uZcXuB2y1FQBLsOtunT7aNAZF', 'no'),
(19, 'sad@g.msuiit.edu.ph', '$2y$12$QLUQl0/QN9pqdhAjp/CCaOHfAU7QVCVaAJHbGvdXsgBueIfuuFQJO', 'sad', 'sad', '2024-10-15 21:16:08', NULL, 'yes'),
(20, 'dam@g.msuiit.edu.ph', '$2y$12$RL4JAGf0EHGDXH7ByVvroeRfvFW0lUlfK8WpWJdDTYpPse19bkeRi', 'dam', 'dam', '2024-10-15 21:16:41', NULL, 'yes'),
(21, 'sadsad@g.msuiit.edu.ph', '$2y$12$AKJlGE5e/eGt0WTdtYWUL.IHV5L.YrLMX1W5k2X6J9y9VYjIYbjGm', 'Adam', 'asdasd', '2024-10-16 21:16:07', NULL, 'yes'),
(22, 'ss@g.msuiit.edu.ph', '$2y$12$aBJVhq3hQzfT1/hnPjX5yuUBKOw4HtDR47zWvPVpng9SeYpPPFJ8O', 'ss', 'ss', '2024-10-20 23:16:50', 'wcyLPDRPuiif2fLcElqmlRT4ohF059IxXwVHtDItljngYOF3vtpsCf2AQwzo', 'no');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `after_user_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    -- Insert the new user into the user_roles table with role_id 2 (users role)
    INSERT INTO user_roles (u_role_id, user_id) 
    VALUES (2, NEW.uid);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_user_delete` AFTER DELETE ON `users` FOR EACH ROW BEGIN
  INSERT INTO user_logs (l_user_id, activity, table_name)
  VALUES (OLD.uid, 'DELETE', 'users');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_user_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
  INSERT INTO user_logs (l_user_id, activity, table_name)
  VALUES (NEW.uid, 'INSERT', 'users');
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `log_user_update` AFTER UPDATE ON `users` FOR EACH ROW BEGIN
  INSERT INTO user_logs (l_user_id, activity, table_name)
  VALUES (NEW.uid, 'UPDATE', 'users');
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
  `activity` text NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`log_id`, `l_user_id`, `activity`, `table_name`, `log_time`) VALUES
(1, 21, 'UPDATE', 'users', '2024-10-22 07:07:36');

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
  ADD KEY `l_user_id` (`l_user_id`);

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
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `documentation`
--
ALTER TABLE `documentation`
  ADD CONSTRAINT `documentation_ibfk_1` FOREIGN KEY (`d_user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `user_logs_ibfk_1` FOREIGN KEY (`l_user_id`) REFERENCES `users` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
