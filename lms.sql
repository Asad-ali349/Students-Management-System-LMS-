-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 07:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `street` varchar(500) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `phone`, `image`, `street`, `city`, `state`, `zip`, `country`, `created_at`, `updated_at`) VALUES
(1, 'kashif', 'asad@gmail.com', '$2y$10$BPkCqQkuZQUj2hpY4wpUhuICy/ke4X/W99K9KOlVyEjA52LnzOsNy', '316 7429529', 'admin/cMCxhvexd9HPNeQ4vNU0FS0GEPAQDlixWMpdotLd.jpg', 'st#18', 'city', 'state', '1230', 'country', '2022-06-06 09:04:38', '2022-06-19 14:10:47');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `class_no` varchar(255) DEFAULT NULL,
  `course_fee` decimal(10,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `class_no`, `course_fee`, `status`, `created_at`, `updated_at`) VALUES
(3, 'English', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Delectus enim provident nostrum consequuntur, asperiores quae, aliquid nisi ducimus est porro similique sequi alias sunt quis tenetur. Voluptatum unde quas porro.', '10', '1500.00', 1, '2022-06-06 14:12:05', '2022-06-09 09:15:41'),
(4, 'Urdu', 'bac', '9', '2000.00', 1, '2022-06-07 18:00:02', '2022-06-09 14:05:34'),
(5, 'bio', 'bac', '9', '2000.00', 1, '2022-06-07 18:00:03', '2022-06-09 14:05:38'),
(6, 'math', 'bac', '9', '2000.00', 1, '2022-06-07 18:00:03', '2022-06-09 14:05:40'),
(7, 'physics', 'bac', '9', '2000.00', 1, '2022-06-07 18:00:03', '2022-06-09 14:05:42'),
(8, 'chem', 'bac', '9', '2000.00', 1, '2022-06-07 18:00:03', '2022-06-09 14:05:28'),
(9, 'Computer Science', 'Computer Science is great subject', '10', '2000.00', 1, '2022-06-09 09:06:37', '2022-06-09 09:06:37'),
(10, 'Bio', 'biology ius', '10', '2000.00', 1, '2022-06-09 11:05:27', '2022-06-09 11:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `course_enrollment`
--

CREATE TABLE `course_enrollment` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_enrollment`
--

INSERT INTO `course_enrollment` (`id`, `student_id`, `course_id`, `created_at`, `updated_at`) VALUES
(28, 13, 3, '2022-06-08 14:24:28', '2022-06-08 14:24:28'),
(29, 13, 5, '2022-06-08 14:24:28', '2022-06-20 17:10:36'),
(30, 13, 9, '2022-06-08 14:24:28', '2022-06-14 15:29:37'),
(35, 17, 3, '2022-06-19 14:12:41', '2022-06-19 14:12:41'),
(36, 17, 10, '2022-06-19 14:12:41', '2022-06-20 17:10:59'),
(37, 17, 5, '2022-06-19 14:12:41', '2022-06-19 14:12:41'),
(38, 17, 8, '2022-06-19 14:16:14', '2022-06-19 14:16:14'),
(45, 24, 4, '2022-06-20 11:36:32', '2022-06-20 11:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `helping_material`
--

CREATE TABLE `helping_material` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `helping_material`
--

INSERT INTO `helping_material` (`id`, `course_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'description', '2022-06-16 10:50:21', '2022-06-16 15:52:16'),
(3, 10, 'slkjdhskjhdksjdkh', '2022-06-16 16:35:58', '2022-06-16 16:35:58'),
(5, 3, 'kjhkjhkj j', '2022-06-17 11:08:12', '2022-06-17 11:08:12'),
(7, 4, 'gfdhdh', '2022-06-18 14:12:26', '2022-06-18 14:12:26'),
(8, 3, 'this your helping m,material arelated to english', '2022-06-19 14:24:51', '2022-06-19 14:24:51'),
(9, 4, 'dskdjljskdsd', '2022-06-20 12:19:17', '2022-06-20 12:19:17'),
(10, 4, 'dskdjljskdsd', '2022-06-20 12:23:09', '2022-06-20 12:23:09'),
(11, 4, ',sahhakkhd', '2022-06-20 12:26:53', '2022-06-20 12:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `helping_material_docs`
--

CREATE TABLE `helping_material_docs` (
  `id` int(11) NOT NULL,
  `helping_material_id` int(11) NOT NULL,
  `document` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `helping_material_docs`
--

INSERT INTO `helping_material_docs` (`id`, `helping_material_id`, `document`, `created_at`, `updated_at`) VALUES
(6, 5, 'Helping_material_docs/qjOH9MhOsmCAhRCzWUMVgntI2slvg2ZyOopt4rxf.xlsx', '2022-06-17 11:08:12', '2022-06-17 11:08:12'),
(7, 5, 'Helping_material_docs/DGoGYGXT2ZCSVWPxshTErU2hWtQpSTxjkof6WEsh.jpg', '2022-06-17 11:08:12', '2022-06-17 11:08:12'),
(9, 1, 'Helping_material_docs/R7PcG2yrAWIZun3LztqymtD6ZsFJmSyXwBzXo41u.jpg', '2022-06-17 12:01:54', '2022-06-17 12:01:54'),
(11, 7, 'Helping_material_docs/xSZCoiI9nhY36kyvNwW6uORfAUbvPNYEzJGz0gPF.jpg', '2022-06-18 14:12:26', '2022-06-18 14:12:26'),
(12, 8, 'Helping_material_docs/6DdMYqGLGA363yn8PTZlNASz4q4zQtgec4Djt8Z6.pdf', '2022-06-19 14:24:51', '2022-06-19 14:24:51'),
(14, 9, 'Helping_material_docs/tekVzRKZJHRKqMkBhrNlnistCI2nzGNCT0sRhZHQ.jpg', '2022-06-20 12:19:17', '2022-06-20 12:19:17'),
(15, 10, 'Helping_material_docs/7ftx54vEWJx5pQNk8hMVzRa0gaP12IvrxO4A3DrJ.jpg', '2022-06-20 12:23:09', '2022-06-20 12:23:09'),
(16, 11, 'Helping_material_docs/7KQk0KEAO8Gp913GkUY0EsmEOuM66bYysEVrDDYz.jpg', '2022-06-20 12:26:53', '2022-06-20 12:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `total_fee` varchar(255) DEFAULT NULL,
  `due_date` varchar(255) DEFAULT NULL,
  `paid_date` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `student_id`, `total_fee`, `due_date`, `paid_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, '5500.00', '2022-06-22', '2022-06-18', 1, '2022-05-18 12:26:09', '2022-06-20 06:58:19'),
(3, 13, '5500.00', '2022-06-23', '2022-06-18', 1, '2022-05-18 12:43:28', '2022-06-20 06:58:27'),
(4, 13, '5500.00', '2022-06-23', NULL, 0, '2022-06-18 12:44:19', '2022-06-18 12:44:19'),
(5, 13, '5500.00', '2022-06-23', NULL, 0, '2022-06-18 12:44:50', '2022-06-18 12:44:50'),
(6, 13, '5500.00', '2022-06-23', NULL, 0, '2022-06-18 12:45:27', '2022-06-18 12:45:27'),
(7, 13, '5500.00', '2022-06-23', NULL, 0, '2022-06-18 12:46:46', '2022-06-18 12:46:46'),
(8, 13, '5500.00', '2022-06-23', NULL, 0, '2022-06-18 12:48:33', '2022-06-18 12:48:33'),
(9, 13, '5500.00', '2022-06-23', NULL, 0, '2022-06-18 12:57:04', '2022-06-18 12:57:04'),
(10, 13, '5500.00', '2022-06-23', '2022-06-19', 1, '2022-06-18 13:29:24', '2022-06-19 04:56:11'),
(11, 13, NULL, NULL, NULL, 0, '2022-06-19 14:28:21', '2022-06-19 14:28:21'),
(12, 17, NULL, NULL, '2022-06-19', 1, '2022-06-19 14:28:21', '2022-06-19 14:29:13'),
(13, 13, NULL, NULL, NULL, 0, '2022-06-19 14:49:35', '2022-06-19 14:49:35'),
(14, 17, NULL, NULL, NULL, 0, '2022-06-19 14:49:35', '2022-06-19 14:49:35'),
(15, 13, '5500.00', '2022-06-24', NULL, 0, '2022-06-19 14:51:34', '2022-06-19 14:51:34'),
(16, 17, '7500.00', '2022-06-24', NULL, 0, '2022-06-19 14:51:34', '2022-06-19 14:51:34'),
(17, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 01:34:31', '2022-06-20 01:34:31'),
(18, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 01:35:25', '2022-06-20 01:35:25'),
(19, 13, '5500.00', '2022-06-25', NULL, 0, '2022-07-20 01:36:23', '2022-06-20 06:58:11'),
(20, 13, '5500.00', '2022-06-25', NULL, 0, '2022-07-20 01:50:48', '2022-06-20 06:58:03'),
(21, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 03:49:31', '2022-06-20 03:49:31'),
(22, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 07:15:41', '2022-06-20 07:15:41'),
(23, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 07:17:30', '2022-06-20 07:17:30'),
(24, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 07:18:47', '2022-06-20 07:18:47'),
(25, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 07:24:30', '2022-06-20 07:24:30'),
(26, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 07:27:46', '2022-06-20 07:27:46'),
(27, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 07:29:09', '2022-06-20 07:29:09'),
(28, 17, '7500.00', '2022-06-25', NULL, 0, '2022-06-20 07:29:15', '2022-06-20 07:29:15'),
(29, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 07:30:12', '2022-06-20 07:30:12'),
(30, 17, '7500.00', '2022-06-25', NULL, 0, '2022-06-20 07:30:17', '2022-06-20 07:30:17'),
(31, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 09:57:33', '2022-06-20 09:57:33'),
(32, 17, '7500.00', '2022-06-25', NULL, 0, '2022-06-20 09:57:40', '2022-06-20 09:57:40'),
(33, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 09:59:23', '2022-06-20 09:59:23'),
(34, 17, '7500.00', '2022-06-25', NULL, 0, '2022-06-20 09:59:28', '2022-06-20 09:59:28'),
(35, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 10:02:54', '2022-06-20 10:02:54'),
(36, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 10:03:43', '2022-06-20 10:03:43'),
(37, 17, '7500.00', '2022-06-25', NULL, 0, '2022-06-20 10:03:47', '2022-06-20 10:03:47'),
(38, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 10:22:19', '2022-06-20 10:22:19'),
(39, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 10:22:52', '2022-06-20 10:22:52'),
(40, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 10:23:42', '2022-06-20 10:23:42'),
(41, 17, '7500.00', '2022-06-25', NULL, 0, '2022-06-20 10:23:46', '2022-06-20 10:23:46'),
(42, 13, '5500.00', '2022-06-25', NULL, 0, '2022-06-20 10:24:09', '2022-06-20 10:24:09'),
(43, 17, '7500.00', '2022-06-25', NULL, 0, '2022-06-20 10:24:12', '2022-06-20 10:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `question_document` varchar(255) DEFAULT NULL,
  `total_marks` varchar(255) DEFAULT NULL,
  `total_time` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `name`, `description`, `course_id`, `question_document`, `total_marks`, `total_time`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 'kldshdjhskd', 3, NULL, '100', '2022-06-17T22:29', 0, '2022-06-17 12:26:12', '2022-06-17 12:29:48'),
(2, 'English Chapter 6', 'attepmt all question', 3, NULL, '100', '2022-06-20T00:22', 0, '2022-06-19 14:19:13', '2022-06-19 14:19:13'),
(3, 'math ch6', 'sdf,hslc', 6, NULL, '50', '2022-06-20T14:32', 0, '2022-06-20 03:33:07', '2022-06-20 03:33:07'),
(4, 'global', 'ldkjhsljkdl', 4, NULL, '100', '2022-06-20T12:11', 0, '2022-06-20 12:11:40', '2022-06-20 12:11:40'),
(5, 'global', 'ldkjhsljkdl', 4, NULL, '100', '2022-06-20T12:11', 0, '2022-06-20 12:12:09', '2022-06-20 12:12:09'),
(6, 'global', 'ldkjhsljkdl', 4, NULL, '100', '2022-06-20T12:11', 0, '2022-06-20 12:15:59', '2022-06-20 12:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_docs`
--

CREATE TABLE `quiz_docs` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `document` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_docs`
--

INSERT INTO `quiz_docs` (`id`, `quiz_id`, `document`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quiz_docs/EYQzwQrE1LoODVlPulrJpybDFXX9vCCthGNlz1nW.jpg', '2022-06-17 12:26:12', '2022-06-17 12:26:12'),
(2, 1, 'Quiz_docs/IxW491YlfDtpdXzxlm96aZiOysvgfAH2ULZf66SS.png', '2022-06-17 12:26:12', '2022-06-17 12:26:12'),
(3, 2, 'Quiz_docs/vpraSvkexZJPimzYueg3RXIX2d7vKnK98mRTLUk5.png', '2022-06-19 14:19:14', '2022-06-19 14:19:14'),
(5, 3, 'Quiz_docs/3WG65F592SEyAkfwF684a07nPewDnQXmcZoxXL0R.jpg', '2022-06-20 03:33:07', '2022-06-20 03:33:07'),
(6, 4, 'Quiz_docs/QcGaOTs8G3Ak07vapPx2BKZtH0m5u8li9bm4QJxH.svg', '2022-06-20 12:11:41', '2022-06-20 12:11:41'),
(7, 5, 'Quiz_docs/6Oibe1tylPvZW0bH0pTuNy8zRJFPwNyJytx5KM1C.png', '2022-06-20 12:12:09', '2022-06-20 12:12:09'),
(8, 6, 'Quiz_docs/YzMTYNmpu9WTU01lPX6C67pqwPsmdWKNIfJ1HCgM.jpg', '2022-06-20 12:15:59', '2022-06-20 12:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_responses`
--

CREATE TABLE `quiz_responses` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `total_marks` varchar(255) DEFAULT NULL,
  `obtain_marks` varchar(255) DEFAULT NULL,
  `answer_file` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_responses`
--

INSERT INTO `quiz_responses` (`id`, `quiz_id`, `student_id`, `total_marks`, `obtain_marks`, `answer_file`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 13, '100', '80', NULL, 2, '2022-06-17 12:26:13', '2022-06-17 12:28:14'),
(2, 2, 13, '100', NULL, NULL, 0, '2022-06-19 14:19:14', '2022-06-19 14:19:14'),
(3, 2, 17, '100', '90', NULL, 2, '2022-06-19 14:19:14', '2022-06-19 14:22:17'),
(4, 4, 24, '100', NULL, NULL, 0, '2022-06-20 12:11:41', '2022-06-20 12:11:41'),
(5, 5, 24, '100', NULL, NULL, 0, '2022-06-20 12:12:09', '2022-06-20 12:12:09'),
(6, 6, 24, '100', NULL, NULL, 0, '2022-06-20 12:15:59', '2022-06-20 12:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `response_docs`
--

CREATE TABLE `response_docs` (
  `id` int(11) NOT NULL,
  `response_id` int(11) DEFAULT NULL,
  `document` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `response_docs`
--

INSERT INTO `response_docs` (`id`, `response_id`, `document`, `created_at`, `updated_at`) VALUES
(1, 1, 'Quiz_Response_Docs/Q5ZkY9dqHcpgjtm4UgRoArSbUW09CU54EPjjzCPT.jpg', '2022-06-17 12:27:23', '2022-06-17 12:27:23'),
(2, 1, 'Quiz_Response_Docs/eluMmW9tMod0V4gX2D4ysdmSniSjcblpHKIsKE1l.svg', '2022-06-17 12:27:23', '2022-06-17 12:27:23'),
(3, 3, 'Quiz_Response_Docs/LDpiVJrcvZj7r4kBJJshcmAOma51ZdVDnribewMI.jpg', '2022-06-19 14:21:13', '2022-06-19 14:21:13'),
(4, 3, 'Quiz_Response_Docs/4MgtrL5ap2KXp7imSS3mKZblGwbv2gNK9x27UIct.png', '2022-06-19 14:21:13', '2022-06-19 14:21:13'),
(5, 3, 'Quiz_Response_Docs/HdfnRD7KfT8rHKSGfdYNgais5McV2BngKGYNIWtk.png', '2022-06-19 14:21:13', '2022-06-19 14:21:13'),
(6, 3, 'Quiz_Response_Docs/kyxYOWPVufd1RvOiMPlus6PLge94ayLTTjMazFdY.png', '2022-06-19 14:21:13', '2022-06-19 14:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `father_phone` varchar(255) DEFAULT NULL,
  `class_no` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `total_fee` decimal(10,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `father_name`, `father_phone`, `class_no`, `phone`, `address`, `total_fee`, `status`, `created_at`, `updated_at`) VALUES
(13, 'Asad', 'asad@gmail.com', '$2y$10$zDs5ChiBle3G3vtNLkWLDeoi/Fq9ogWVUyKbxnx4gh7S82QMuiWA2', 'ali', '12346879', '4', '345456', 'address', '5500.00', 1, '2022-06-07 13:52:33', '2022-06-19 07:12:46'),
(17, 'ali', 'ahmad@gmail.com', '$2y$10$SNaQabKuuhYGR.5IfPg7seq7iFeSjIV7M1QSp2KqNmYjp41XUVT.W', 'ahmad', '132546879', '10', '123456789', 'street address,city', '7500.00', 1, '2022-06-19 14:12:40', '2022-06-19 14:30:27'),
(24, 'asad', 'asadking066@gmail.com', '$2y$10$oLU65cyUTJoMLmtccGpyLuRPCyUqqXGk/9lG24LzJ5u4HU0aKhwui', 'ali', '12346879', '4', '345456', 'asasaaaaaaaaaa', '2000.00', 1, '2022-06-20 11:36:32', '2022-06-20 11:36:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_enrollment`
--
ALTER TABLE `course_enrollment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_enrollment_ibfk_2` (`course_id`);

--
-- Indexes for table `helping_material`
--
ALTER TABLE `helping_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `helping_material_docs`
--
ALTER TABLE `helping_material_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `helping_material_docs_ibfk_1` (`helping_material_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_ibfk_1` (`student_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_ibfk_1` (`course_id`);

--
-- Indexes for table `quiz_docs`
--
ALTER TABLE `quiz_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz_responses`
--
ALTER TABLE `quiz_responses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quiz_responses_ibfk_1` (`quiz_id`),
  ADD KEY `quiz_responses_ibfk_2` (`student_id`);

--
-- Indexes for table `response_docs`
--
ALTER TABLE `response_docs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `response_docs_ibfk_1` (`response_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course_enrollment`
--
ALTER TABLE `course_enrollment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `helping_material`
--
ALTER TABLE `helping_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `helping_material_docs`
--
ALTER TABLE `helping_material_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quiz_docs`
--
ALTER TABLE `quiz_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quiz_responses`
--
ALTER TABLE `quiz_responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `response_docs`
--
ALTER TABLE `response_docs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_enrollment`
--
ALTER TABLE `course_enrollment`
  ADD CONSTRAINT `course_enrollment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_enrollment_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `helping_material`
--
ALTER TABLE `helping_material`
  ADD CONSTRAINT `helping_material_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `helping_material_docs`
--
ALTER TABLE `helping_material_docs`
  ADD CONSTRAINT `helping_material_docs_ibfk_1` FOREIGN KEY (`helping_material_id`) REFERENCES `helping_material` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_docs`
--
ALTER TABLE `quiz_docs`
  ADD CONSTRAINT `quiz_docs_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_responses`
--
ALTER TABLE `quiz_responses`
  ADD CONSTRAINT `quiz_responses_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quiz_responses_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `response_docs`
--
ALTER TABLE `response_docs`
  ADD CONSTRAINT `response_docs_ibfk_1` FOREIGN KEY (`response_id`) REFERENCES `quiz_responses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
