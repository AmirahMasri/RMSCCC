-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_w`
--

-- --------------------------------------------------------

--
-- Table structure for table `anoucement`
--

CREATE TABLE `anoucement` (
  `id` int(11) NOT NULL,
  `anoucement` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anoucement`
--

INSERT INTO `anoucement` (`id`, `anoucement`, `created_at`, `updated_at`) VALUES
(1, 'This Is The Anoucement', '2022-01-31 13:15:15', '2022-02-05 19:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `application_form`
--

CREATE TABLE `application_form` (
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(101) NOT NULL DEFAULT 'Pending',
  `type` int(11) NOT NULL DEFAULT 1 COMMENT '1=New, 2=Renew',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `interview_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_form`
--

INSERT INTO `application_form` (`application_id`, `user_id`, `status`, `type`, `created_at`, `updated_at`, `interview_date`) VALUES
(2, 2, 'Pending', 2, '2022-01-26 09:56:49', '2022-02-05 21:36:46', '2022-02-06 16:00:00'),
(4, 2, 'Approve', 1, '2022-02-02 14:10:58', '2022-02-05 21:43:33', '2022-02-09 16:00:00'),
(5, 2, 'Approve', 1, '2022-02-02 14:15:43', NULL, NULL),
(10, 2, 'Pending', 1, '2022-02-02 14:15:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `application_form_detail`
--

CREATE TABLE `application_form_detail` (
  `id` int(11) NOT NULL,
  `application_id` int(11) DEFAULT NULL,
  `semester` varchar(500) DEFAULT NULL,
  `session` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `staff_matric_number` varchar(500) DEFAULT NULL,
  `m_p` varchar(500) DEFAULT NULL,
  `p_address` varchar(500) DEFAULT NULL,
  `fax` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `m_status` varchar(500) DEFAULT NULL,
  `dob` varchar(500) DEFAULT NULL,
  `tp_home` varchar(500) DEFAULT NULL,
  `tp_office` varchar(500) DEFAULT NULL,
  `tp_hp` varchar(500) DEFAULT NULL,
  `eg_p` varchar(500) DEFAULT NULL,
  `gender` varchar(500) DEFAULT NULL,
  `kdc` varchar(500) DEFAULT NULL,
  `nationality` varchar(500) DEFAULT NULL,
  `apply` varchar(500) DEFAULT NULL,
  `s_i_u_a_1` text DEFAULT NULL,
  `y_from_1` text DEFAULT NULL,
  `y_until_1` text DEFAULT NULL,
  `a_qualification_1` text DEFAULT NULL,
  `s_i_u_a_2` text DEFAULT NULL,
  `y_from_2` text DEFAULT NULL,
  `y_until_2` text DEFAULT NULL,
  `s_i_u_a_3` text DEFAULT NULL,
  `y_from_3` text DEFAULT NULL,
  `y_until_3` text DEFAULT NULL,
  `a_qualification_3` text DEFAULT NULL,
  `s_i_u_a_4` text DEFAULT NULL,
  `y_from_4` text DEFAULT NULL,
  `y_until_4` text DEFAULT NULL,
  `a_qualification_4` text DEFAULT NULL,
  `organisation_1` text DEFAULT NULL,
  `position_1` text DEFAULT NULL,
  `duration_1` text DEFAULT NULL,
  `organisation_2` text DEFAULT NULL,
  `position_2` text DEFAULT NULL,
  `duration_2` text DEFAULT NULL,
  `organisation_3` text DEFAULT NULL,
  `position_3` text DEFAULT NULL,
  `duration_3` text DEFAULT NULL,
  `organisation_4` text DEFAULT NULL,
  `position_4` text DEFAULT NULL,
  `duration_4` text DEFAULT NULL,
  `rew` longtext DEFAULT NULL,
  `wpp` longtext DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo` longtext DEFAULT NULL,
  `a_qualification_2` text DEFAULT NULL,
  `pp` varchar(101) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_form_detail`
--

INSERT INTO `application_form_detail` (`id`, `application_id`, `semester`, `session`, `name`, `staff_matric_number`, `m_p`, `p_address`, `fax`, `email`, `m_status`, `dob`, `tp_home`, `tp_office`, `tp_hp`, `eg_p`, `gender`, `kdc`, `nationality`, `apply`, `s_i_u_a_1`, `y_from_1`, `y_until_1`, `a_qualification_1`, `s_i_u_a_2`, `y_from_2`, `y_until_2`, `s_i_u_a_3`, `y_from_3`, `y_until_3`, `a_qualification_3`, `s_i_u_a_4`, `y_from_4`, `y_until_4`, `a_qualification_4`, `organisation_1`, `position_1`, `duration_1`, `organisation_2`, `position_2`, `duration_2`, `organisation_3`, `position_3`, `duration_3`, `organisation_4`, `position_4`, `duration_4`, `rew`, `wpp`, `user_id`, `photo`, `a_qualification_2`, `pp`, `created_at`, `updated_at`) VALUES
(2, 2, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26', NULL, NULL, NULL, 'Please Select', 'Please Select', NULL, NULL, 'English Debate Trainer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '1643191009.png', NULL, 'Lecturer', '2022-01-26 09:56:49', NULL),
(4, 4, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Please Select', 'Please Select', NULL, NULL, 'Parenting Lecturer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '1643811058.jpg', NULL, 'Lecturer', '2022-02-02 14:10:58', NULL),
(5, 5, '1', '1', 'Loon', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Please Select', 'Please Select', NULL, NULL, 'Taḥfīẓ Instructor', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '1643811343.jpg', NULL, 'Lecturer', '2022-02-02 14:15:43', NULL),
(8, 10, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-26', NULL, NULL, NULL, 'Please Select', 'Please Select', NULL, NULL, 'English Debate Facilitator', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '1643191009.png', NULL, 'Lecturer', '2022-01-26 09:56:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('loon@gmail.com', '$2y$10$MZnp2Qya9FE7e6Makqu02uXNUzZiWq.Ag0dbkHvJUzQ4ImZMLtcuW', '2022-02-06 00:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL COMMENT '1=Admin,2=Staff,NULL=Applicant',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(101) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contact`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 0, NULL, 1, '$2y$10$H7OGRsg3sYR55qpT0qa2leeyONSUMiua8607v6KloYn7dkHgxd37S', NULL, 'Pending', '2022-01-02 10:17:37', '2022-01-02 10:17:37'),
(2, 'user1', 'loon@gmail.com', 0, NULL, NULL, '$2y$10$gwJdU6WNJ49CfOL9Bdrv9.uG/h2gLZMlPmGytm/r6UnHtTLte/0ou', NULL, 'Pending', '2022-01-02 10:40:48', '2022-01-31 04:46:51'),
(4, 'staff', 'staff@gmail.com', 0, NULL, 2, '$2y$10$H7OGRsg3sYR55qpT0qa2leeyONSUMiua8607v6KloYn7dkHgxd37S', NULL, 'Pending', '2022-01-02 10:17:37', '2022-01-02 10:17:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anoucement`
--
ALTER TABLE `anoucement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_form`
--
ALTER TABLE `application_form`
  ADD PRIMARY KEY (`application_id`);

--
-- Indexes for table `application_form_detail`
--
ALTER TABLE `application_form_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anoucement`
--
ALTER TABLE `anoucement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_form`
--
ALTER TABLE `application_form`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `application_form_detail`
--
ALTER TABLE `application_form_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
