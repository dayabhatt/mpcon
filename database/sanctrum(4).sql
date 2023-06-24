-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 09:29 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanctrum`
--

-- --------------------------------------------------------

--
-- Table structure for table `appraise`
--

CREATE TABLE `appraise` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `present_place_of_posting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appraisal_for_the_period` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_plan_target` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_plan_achievement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_reports_consultancy` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `edp_sdp_trainings_conducted_handled` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialized_trainings_capacity` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reasons_for_achievement_annual_plan_target` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_responsibilities_handled` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `areas_of_interest_of_work` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `areas_undergo_training` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appraise_Officer_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `integrity_honesty_ranking` int(11) DEFAULT 1,
  `integrity_honesty_comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `behaviour_colleagues_ranking` int(11) DEFAULT 1,
  `behaviour_colleagues_comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discipline_observance_ranking` int(11) DEFAULT 1,
  `discipline_observance_comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quality_of_work_ranking` int(11) DEFAULT 1,
  `quality_of_work_comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initiative_dependability_ranking` int(11) DEFAULT 1,
  `initiative_dependability_comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `analytical_skills_ranking` int(11) DEFAULT 1,
  `analytical_skills_comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `writing_drafting_ranking` int(11) DEFAULT 1,
  `writing_drafting_comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annual_plan_achievement_ranking` int(11) DEFAULT 1,
  `annual_plan_achievement_comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comments_by_reporting_officer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recommendation_reporting_officer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `areas_improvement` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suggestions_managing_director` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporting_Officer_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `managing_director_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_responsibilities_supporting_staff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `areas_of_interest_supporting_staff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `undergo_training_supporting_staff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporting_officer_date_supporting_staff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quality_of_work_ranking_s_staff` int(11) DEFAULT 1,
  `quality_of_work_comments_s_staff` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volum_of_work_ranking` int(11) DEFAULT 1,
  `volum_of_work_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dependability_ranking` int(11) DEFAULT 1,
  `dependability_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initiative_ranking` int(11) DEFAULT 1,
  `initiative_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_knowledge_ranking` int(11) DEFAULT 1,
  `job_knowledge_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `communication_oral_ranking` int(11) DEFAULT 1,
  `communication_oral_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `communication_writing_ranking` int(11) DEFAULT 1,
  `communication_writing_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attitude_ranking` int(11) DEFAULT 1,
  `attitude_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regularity_ranking` int(11) DEFAULT 1,
  `regularity_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_knowledge_computer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_comment_ss` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suggestions_md_ss` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporting_officer_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporting_officer_designation` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporting_officer_date_ss` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key_responsibilities_supporting_staff_last` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filled_reporting_officer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regularity_punctuality_ranking` int(11) DEFAULT 1,
  `regularity_punctuality_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trust_worthiness_ranking` int(11) DEFAULT 1,
  `trust_worthiness_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courtesy_ranking` int(11) DEFAULT 1,
  `courtesy_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diligence_ranking` int(11) DEFAULT 1,
  `diligence_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `willingness_ranking` int(11) DEFAULT 1,
  `willingness_comments` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_rofficer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `needs_improvement` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_reporting_officer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation_reporting_officer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `md_suggestion` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `md_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `send_to_reporting_officer` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appraise`
--

INSERT INTO `appraise` (`id`, `employee_id`, `present_place_of_posting`, `appraisal_for_the_period`, `annual_plan_target`, `annual_plan_achievement`, `project_reports_consultancy`, `edp_sdp_trainings_conducted_handled`, `specialized_trainings_capacity`, `reasons_for_achievement_annual_plan_target`, `other_responsibilities_handled`, `areas_of_interest_of_work`, `areas_undergo_training`, `appraise_Officer_date`, `integrity_honesty_ranking`, `integrity_honesty_comments`, `behaviour_colleagues_ranking`, `behaviour_colleagues_comments`, `discipline_observance_ranking`, `discipline_observance_comments`, `quality_of_work_ranking`, `quality_of_work_comments`, `initiative_dependability_ranking`, `initiative_dependability_comments`, `analytical_skills_ranking`, `analytical_skills_comments`, `writing_drafting_ranking`, `writing_drafting_comments`, `annual_plan_achievement_ranking`, `annual_plan_achievement_comments`, `comments_by_reporting_officer`, `recommendation_reporting_officer`, `areas_improvement`, `suggestions_managing_director`, `reporting_Officer_date`, `managing_director_date`, `key_responsibilities_supporting_staff`, `areas_of_interest_supporting_staff`, `undergo_training_supporting_staff`, `reporting_officer_date_supporting_staff`, `quality_of_work_ranking_s_staff`, `quality_of_work_comments_s_staff`, `volum_of_work_ranking`, `volum_of_work_comments`, `dependability_ranking`, `dependability_comments`, `initiative_ranking`, `initiative_comments`, `job_knowledge_ranking`, `job_knowledge_comments`, `communication_oral_ranking`, `communication_oral_comments`, `communication_writing_ranking`, `communication_writing_comments`, `attitude_ranking`, `attitude_comments`, `regularity_ranking`, `regularity_comments`, `working_knowledge_computer`, `other_comment_ss`, `suggestions_md_ss`, `reporting_officer_name`, `reporting_officer_designation`, `reporting_officer_date_ss`, `key_responsibilities_supporting_staff_last`, `filled_reporting_officer`, `regularity_punctuality_ranking`, `regularity_punctuality_comments`, `trust_worthiness_ranking`, `trust_worthiness_comments`, `courtesy_ranking`, `courtesy_comments`, `diligence_ranking`, `diligence_comments`, `willingness_ranking`, `willingness_comments`, `comment_rofficer`, `needs_improvement`, `name_reporting_officer`, `designation_reporting_officer`, `md_suggestion`, `md_date`, `send_to_reporting_officer`, `created_at`, `updated_at`) VALUES
(1, 5, 'Indore', 'jan-2024', '2024-25', '2500000', 'Project Reports', 'EDPs', 'Specialized Trainings', 'Reasons for Achievement', 'Other Responsibilities handled', 'A2 Please indicate your areas', 'A3 Please indicate your areas', '24/06/2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24/06/2023', '24/06/2023', NULL, NULL, NULL, '24/06/2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24/06/2023', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24/06/2023', 1, '2023-06-23 08:20:36', '2023-06-24 00:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employeetype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_parent_id` int(11) DEFAULT 0,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `joining_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `educational_qualification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employeetype`, `employee_parent_id`, `first_name`, `last_name`, `designation`, `joining_date`, `dob`, `email`, `phone`, `address`, `city`, `state`, `employee_status`, `educational_qualification`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Professional', 0, 'Manoj1', 'Mishra', 'MD', '21/06/2023', '01/06/2023', 'manoj@gmail.com', '1234567890', 'vidisha', 'vidisha', 'mp', 'Active', NULL, 9, '2023-06-21 02:59:25', '2023-06-22 01:21:17'),
(3, 'Supporting Staff', 2, 'Pawan', 'Tiwari', 'Manager', '22/06/2023', '01/06/2023', 'pawan@gmail.com', '1478523690', 'Bhopal', 'bhopal city', 'mp', 'Active', 'M.sc,MBA', 11, '2023-06-22 05:06:09', '2023-06-22 05:06:37'),
(4, 'Supporting Staff2', 2, 'Dhanraj', 'Staff2', 'Supporting', '23/06/2023', '01/06/2023', 'dhanraj@gmail.com', '7894561230', 'Bhopal', 'Bhopal', 'mp', 'Active', 'BE', 12, '2023-06-23 04:47:19', '2023-06-23 04:47:20'),
(5, 'Professional', 2, 'Daya', 'Bhatt', 'Accountant', '23/06/2023', '01/06/2023', 'daya@gmail.com', '1234567890', 'vidisha', 'vidisha', 'mp', 'Active', 'M.sc,MBA', 13, '2023-06-23 08:11:04', '2023-06-23 08:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2023_06_19_075303_create_table_employee', 2),
(24, '2023_06_21_102310_create_table_appraise', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$Yk6UODetdNNhXewXV0VRlu9NHnk0A4NNIP7zAcP4qqkEWujkru.WS', NULL, 1, '2023-06-16 03:12:05', '2023-06-16 03:12:05'),
(2, 'User', 'user@gmail.com', NULL, '$2y$10$rmRnP538VHhYrfPacMz0FOvbcFRh5Xfo051Pnmvcdz3XtLZ7kYPNu', NULL, 0, '2023-06-16 03:12:06', '2023-06-16 03:12:06'),
(9, 'ManojMishra', 'manoj@gmail.com', NULL, '$2y$10$FhpL2CFLUcSytEq8mChCeuHK3EWQdIpnAD3OiqQMjkFHHhzpM2psa', NULL, 0, '2023-06-21 02:59:26', '2023-06-21 02:59:26'),
(10, 'test', 'test@gmail.com', NULL, '$2y$10$k2J/ebqTUZmJMAUaBAb8C.d0hZQajsgcJw087sQCkuCa.RoIgbS6i', NULL, 0, '2023-06-21 03:25:58', '2023-06-21 03:25:58'),
(11, 'PawanTiwari', 'pawan@gmail.com', NULL, '$2y$10$g7dJYRNetiG4GV3bKn8JkuEDipUs08nzkULQbrMmK6LCi5XXQMH3G', NULL, 0, '2023-06-22 05:06:10', '2023-06-22 05:06:10'),
(12, 'DhanrajStaff2', 'dhanraj@gmail.com', NULL, '$2y$10$DaZYmJEqHz5mJH7wso.1A.ul5KhaHHLlLzsahH7Ln2Uy6826SNW3S', NULL, 0, '2023-06-23 04:47:20', '2023-06-23 04:47:20'),
(13, 'DayaBhatt', 'daya@gmail.com', NULL, '$2y$10$ljd6Q9qWEelFnWQsfm/Ix.Oqj4kCDiMY3s05oZ1ogetn3hPnI5K52', NULL, 0, '2023-06-23 08:11:05', '2023-06-23 08:11:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appraise`
--
ALTER TABLE `appraise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appraise`
--
ALTER TABLE `appraise`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
