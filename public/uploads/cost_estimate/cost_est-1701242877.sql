-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2023 at 02:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flycare_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '[]',
  `country` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_like` int(11) NOT NULL DEFAULT 0,
  `total_comment` int(11) NOT NULL DEFAULT 0,
  `total_view` int(11) NOT NULL DEFAULT 0,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `type`, `category_id`, `title`, `description`, `blog_image`, `tags`, `country`, `slug`, `total_like`, `total_comment`, `total_view`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'blog', 1, 'Yoga and Menstruation', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>', 'uploads/blog/blog-20231115071138-9605.jpg', '[\"blogs\",\"testblogs\",\"sports\",\"delhi\",\"india\"]', 100, 'testing-blog', 0, 0, 3, 'Testing Blog', 'Testing Blog', 'Testing Blog', 1, 1, 1, '2023-08-24 03:24:33', '2023-11-15 01:54:59', NULL),
(2, 'blog', 12, 'Can I play Holi on my Periods ?', '<p>&nbsp; &nbsp;&nbsp;</p>', 'uploads/blog/blog-20231115073319-9050.jpg', '[\"sports\"]', 19, 'handflul-of-model-structures', 0, 0, 2, 'Handflul Of Model Structures', 'Handflul Of Model Structures', 'Handflul Of Model Structures', 1, 1, 1, '2023-07-25 05:10:34', '2023-11-15 02:03:19', NULL),
(3, 'blog', 1, '9 ways to deal with period cramps', '<p>&nbsp; &nbsp; &nbsp; &nbsp;</p>', 'uploads/blog/blog-20231115073115-2028.jpg', '[\"blog\",\"blogs\"]', 17, 'testiing-blog', 0, 0, 3, NULL, 'Testiing Blog', NULL, 1, 1, 1, '2023-07-29 05:45:53', '2023-11-15 02:01:15', NULL),
(4, 'blog', 11, 'Home Remedies for Menstrual Cramp', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>', 'uploads/blog/blog-20231115072335-247.jpg', '[\"Private Cloud Solutions\"]', NULL, 'cloudware-private-cloud-solutions', 0, 0, 5, 'Private Cloud Solutions', 'Cloudware Private Cloud Solutions', 'Private Cloud Solutions', 1, 1, 1, '2023-07-30 00:37:16', '2023-11-15 01:53:35', NULL),
(5, 'news', 3, 'Can I play Holi on my Periods ?', '<p>&nbsp; &nbsp; &nbsp; &nbsp;</p>', 'uploads/news/news-20231115083924-9825.jpg', '[\"Staffing Solution\",\"staffing\"]', 18, 'staffing-solution', 0, 0, 6, 'Staffing Solution', 'Staffing Solution', 'Staffing Solution', 1, 1, 1, '2023-08-03 02:51:42', '2023-11-15 03:09:24', NULL),
(6, 'case_study', 7, 'Repeat Predefined Chunks', '<h3 class=\"text-start lsp-5 lh-base text-uppercase fs-18 text-sky fw-bold lsp-5px pt-3\">NORTH DALLAS MOVING AND STORAGE</h3>\r\n<p class=\"text-start text-muted lsp-5\">North Dallas Moving &amp; Storage is a full-service Moving and Storage company and an agent for United Van Lines. NDMS had been in business for fifty years and they were very active in the Dallas and surrounding communities. NDMS approached Denali &amp; Associates in 2015 to create a new website that would enhance brand awareness, increase online traffic, and generate high-quality leads via an effective interactive marketing strategy.</p>', 'uploads/case_study/case_study-20230803112804-621.png', '[\"c\",\"sd\",\"fff\",\"fffff\",\"ww\",\"wee\",\"rtb\",\"dfbdfb\",\"dfb\",\"fdb\",\"f\",\"fqqq\",\"www\",\"e\",\"rt\",\"y\",\"u\",\"i\",\"x\",\"cv\",\"bg\",\"sdV\",\"SDV\",\"QWD\",\"BD\"]', 2, 'repeat-predefined-chunks', 0, 0, 5, NULL, NULL, NULL, 1, 1, NULL, '2023-08-03 05:58:05', '2023-08-25 21:16:15', NULL),
(7, 'news', 3, '9 common period myths', '<p>&nbsp;&nbsp;</p>', 'uploads/news/news-20231115084126-7258.jpg', '[\"Staffing Solution\",\"Staffing\"]', NULL, '9-common-period-myths', 0, 0, 0, 'Staffing Solution', 'Staffing Solution', 'Staffing Solution', 1, 1, 1, '2023-11-15 03:02:42', '2023-11-15 03:11:26', NULL),
(8, 'news', 3, 'Yoga and Menstration', '<p>&nbsp; &nbsp; &nbsp; &nbsp;</p>', 'uploads/news/news-20231115084033-7139.jpg', '[\"Staffing and Solution\"]', NULL, 'yoga-and-menstration', 0, 0, 0, 'Staffing and Solution', 'Staffing and Solution', 'Stafffing and Solution', 1, 1, 1, '2023-11-15 03:08:35', '2023-11-15 03:10:33', NULL),
(9, 'news', 3, '9 common period myths', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>', 'uploads/news/news-20231115084323-1232.jpg', '[\"Staffing solution\"]', NULL, '9-common-period-myths-2', 0, 0, 0, 'Staffing Solution', 'Staffing Solution', 'Staffing Solution', 1, 1, NULL, '2023-11-15 03:13:23', '2023-11-22 04:06:36', '2023-11-22 04:06:36');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `blog_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `comment` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `name`, `email`, `blog_id`, `user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 'General Enquiry', 'iamranashar@gmail.com', 4, NULL, 'asc', 1, '2023-08-02 02:16:29', '2023-08-02 09:36:04'),
(2, 'VPS Hosting', 'asasc@gmail.com', 4, NULL, 'Launched in the year 2019. We “Cloudware Technologies Private Limited “ rapidly established ourselves as a frontrunner among Cloud hosting and System Integration service providers in India. By streamlining the process of deploying infrastructure in the cloud, the company\'s suite of products and services helps developers and organizations thrive. We offer a wide range of Cloud services including Virtual Machines, Physical bare metal servers, storage, load balancers, databases, GPU servers, and Backup as a Service at a competitive cost.', 1, '2023-08-02 03:46:50', '2023-08-02 04:13:45'),
(3, 'Deepak', 'deepak@gmail.com', 4, NULL, 'Deepak testing', 0, '2023-08-05 00:55:14', '2023-08-05 00:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `blog_likes`
--

CREATE TABLE `blog_likes` (
  `id` bigint(20) NOT NULL,
  `blog_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_likes`
--

INSERT INTO `blog_likes` (`id`, `blog_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 10, 2, 1, '2023-04-05 01:12:27', '2023-04-05 04:52:42'),
(2, 11, 2, 1, '2023-04-05 01:20:28', '2023-04-05 04:54:06'),
(4, 14, 2, 1, '2023-04-05 04:29:18', '2023-04-05 05:18:25'),
(5, 15, 2, 1, '2023-04-05 04:33:42', '2023-04-05 04:33:42'),
(6, 17, 2, 1, '2023-04-05 04:54:16', '2023-04-05 05:18:27'),
(7, 13, 7, 1, '2023-04-06 00:34:39', '2023-04-06 00:35:12'),
(8, 10, 7, 0, '2023-04-07 04:56:55', '2023-04-07 05:22:09'),
(9, 11, 7, 1, '2023-04-07 05:20:55', '2023-04-07 05:20:55'),
(10, 14, 7, 1, '2023-04-07 05:21:01', '2023-04-07 05:55:42'),
(11, 17, 7, 1, '2023-04-07 05:21:05', '2023-04-07 05:21:05'),
(12, 15, 7, 0, '2023-04-07 05:32:02', '2023-04-07 06:12:07'),
(13, 18, 9, 1, '2023-04-08 03:48:46', '2023-04-08 03:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `blog_views`
--

CREATE TABLE `blog_views` (
  `id` bigint(20) NOT NULL,
  `blog_id` bigint(20) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_views`
--

INSERT INTO `blog_views` (`id`, `blog_id`, `ip_address`, `date`) VALUES
(2, 19, '::1', '2023-04-08'),
(3, 18, '::1', '2023-04-08'),
(4, 2, '::1', '2023-05-09'),
(5, 1, '::1', '2023-05-09'),
(6, 2, '::1', '2023-05-10'),
(7, 3, '::1', '2023-05-10'),
(8, 4, '::1', '2023-05-25'),
(9, 2, '::1', '2023-05-25'),
(10, 3, '::1', '2023-05-25'),
(11, 1, '::1', '2023-05-25'),
(12, 2, '::1', '2023-05-29'),
(13, 1, '::1', '2023-05-30'),
(14, 2, '::1', '2023-05-30'),
(15, 1, '::1', '2023-06-13'),
(16, 1, '::1', '2023-06-19'),
(17, 1, '::1', '2023-06-24'),
(18, 2, '::1', '2023-06-30'),
(19, 1, '::1', '2023-07-01'),
(20, 1, '103.211.55.60', '2023-07-05'),
(21, 2, '103.211.55.60', '2023-07-05'),
(22, 5, '152.58.130.226', '2023-07-07'),
(23, 6, '152.58.130.226', '2023-07-07'),
(24, 7, '152.58.130.226', '2023-07-07'),
(25, 1, '::1', '2023-07-25'),
(26, 3, '103.211.55.235', '2023-08-01'),
(27, 2, '103.211.55.235', '2023-08-01'),
(28, 4, '103.211.55.235', '2023-08-01'),
(29, 4, '117.215.13.53', '2023-08-01'),
(30, 1, '103.211.55.235', '2023-08-01'),
(31, 4, '::1', '2023-08-02'),
(32, 5, '::1', '2023-08-03'),
(33, 6, '::1', '2023-08-03'),
(34, 4, '103.211.55.142', '2023-08-05'),
(35, 3, '103.211.55.142', '2023-08-05'),
(36, 2, '103.211.55.142', '2023-08-05'),
(37, 5, '103.211.55.142', '2023-08-05'),
(38, 1, '223.177.143.177', '2023-08-05'),
(39, 6, '103.211.55.142', '2023-08-05'),
(40, 5, '::1', '2023-08-21'),
(41, 6, '::1', '2023-08-21'),
(42, 5, '::1', '2023-08-24'),
(43, 6, '::1', '2023-08-25'),
(44, 5, '::1', '2023-08-26'),
(45, 6, '::1', '2023-08-26'),
(46, 5, '::1', '2023-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dotfree', 'dotfree', 'uploads/brands/brands-20230828083823-3704.png', 1, '2023-08-28 02:00:42', '2023-08-28 03:08:23', NULL),
(2, 'Fly Dayz', 'fly-dayz', 'uploads/brands/brands-20230828083750-1670.png', 1, '2023-08-28 02:01:01', '2023-08-28 03:07:50', NULL),
(3, 'Kaynaat', 'kaynaat', 'uploads/brands/brands-20230828083728-5099.png', 1, '2023-08-28 02:01:19', '2023-08-28 03:07:28', NULL),
(4, 'Kottony', 'kottony', 'uploads/brands/brands-20230828083610-3093.png', 1, '2023-08-28 02:01:30', '2023-08-28 03:06:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_settings`
--

CREATE TABLE `business_settings` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `field_name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_settings`
--

INSERT INTO `business_settings` (`id`, `type`, `field_name`, `value`, `status`, `created_at`, `updated_at`) VALUES
(1, 'social_media', 'facebook', 'facebook.com112345656', 1, '2023-04-26 03:51:10', '2023-08-05 01:19:26'),
(2, 'social_media', 'twitter', 'twitter.com1', 1, '2023-04-26 03:51:10', '2023-04-26 07:12:49'),
(3, 'social_media', 'linkedin', 'linkedin.com1', 1, '2023-04-26 03:51:10', '2023-04-26 07:12:49'),
(4, 'social_media', 'skype', NULL, 1, '2023-04-26 03:51:10', '2023-07-31 04:44:47'),
(5, 'social_media', 'instagram', 'instagram.com 1231', 1, '2023-04-26 03:51:32', '2023-04-26 07:12:49'),
(6, 'header_setup', 'customer_support_number', '0124 428 6901', 1, '2023-04-26 06:07:49', '2023-08-07 06:37:26'),
(7, 'header_setup', 'sales_number', '+91-9876543210', 1, '2023-04-26 06:07:49', '2023-07-07 01:21:29'),
(9, 'header_setup', 'header_logo', 'uploads/logo/logo-20231119062535-9754.png', 1, '2023-04-26 06:14:53', '2023-11-19 00:55:35'),
(10, 'footer_setup', 'footer_description', NULL, 1, '2023-04-27 00:16:16', '2023-07-07 01:22:30'),
(11, 'footer_setup', 'copyright_widget', 'Copyright © 2022-2023 <a class=\"link-secondary\" href=\"https://orrish.com\"> My Fly Care.</a>  All rights reserved.', 1, '2023-04-27 00:16:17', '2023-08-23 03:22:57'),
(12, 'footer_setup', 'contact_address', 'F-122, GF, Utsav Apartment, Sector 18, Rohini Delhi - 110089', 1, '2023-04-27 00:41:17', '2023-08-23 03:27:39'),
(13, 'footer_setup', 'contact_phone', '+91-7209770033', 1, '2023-04-27 00:41:17', '2023-08-23 03:27:39'),
(14, 'footer_setup', 'contact_email', 'contact@Myflycare.Com', 1, '2023-04-27 00:41:17', '2023-08-23 03:27:39'),
(15, 'footer_setup', 'contact_working_hr', NULL, 1, '2023-04-27 00:41:17', '2023-08-23 03:27:39'),
(17, 'footer_setup', 'footer_logo', 'uploads/logo/logo-20230823085015-5899.png', 1, '2023-04-27 00:44:32', '2023-08-23 03:20:15'),
(31, 'footer_widget_one_lable', 'widget_one_name', 'ABOUT BUSSINESS ONLINE SERVICE', 1, '2023-04-27 06:26:23', '2023-07-07 02:34:56'),
(32, 'footer_widget_one_links', '[\"Booking\",\"Lable 2\"]', '[\"link 1\",\"Link 2\"]', 1, '2023-04-27 06:26:23', '2023-08-01 05:20:02'),
(33, 'footer_widget_two_lable', 'widget_two_name', 'Quick Links', 1, '2023-04-27 06:56:34', '2023-04-27 06:56:34'),
(34, 'footer_widget_two_links', '[\"test lable\"]', '[\"test link\"]', 1, '2023-04-27 06:56:34', '2023-04-27 06:58:11'),
(35, 'footer_widget_three_lable', 'widget_three_name', 'NAVIGATION', 1, '2023-04-27 06:57:25', '2023-07-05 06:27:20'),
(36, 'footer_widget_three_links', '[\"About Us\",\"Blog\",\"Contact Us\",\"Gallery\",\"News\",\"Testimonial\"]', '[\"#\",\"#\",\"#\",\"#\",\"#\",\"#\"]', 1, '2023-04-27 06:57:25', '2023-07-07 01:24:21'),
(37, 'corporate_office_contact', '[\"office1@gmail.com1\",\"office2@gmail.com2\",\"gdfgd\"]', '[\"98765432101\",\"98765432112\",\"gfdgdf\"]', 1, '2023-05-23 06:16:45', '2023-05-23 06:41:45'),
(38, 'corporate_office_address', '[\"Milap Nager, Uttam Nager, 1100591\",\"Milap Nager, Uttam Nager, 1100601\",\"fdgdfg\"]', '[\"Monday\",\"regre1\",\"gdfgdfgd\"]', 1, '2023-05-23 06:18:06', '2023-05-23 06:41:45'),
(39, 'global_office_contact', '[\"testglobal@gmail.com\"]', '[\"7896541230\"]', 1, '2023-05-23 06:47:41', '2023-05-23 06:47:41'),
(40, 'global_office_address', '[\"test address\"]', '[\"test timing\"]', 1, '2023-05-23 06:47:41', '2023-05-23 06:47:41'),
(41, 'footer_setup', 'corporate_address', NULL, 1, '2023-04-27 00:41:17', '2023-08-23 03:27:39'),
(42, 'footer_setup', 'leads_uk_address', NULL, 1, '2023-04-27 00:41:17', '2023-08-05 01:22:14'),
(43, 'footer_setup', 'registered_address', NULL, 1, '2023-04-27 00:41:17', '2023-08-23 03:27:39'),
(44, 'footer_setup', 'registered_address_phone', NULL, 1, '2023-04-27 00:41:17', '2023-08-23 03:27:39'),
(45, 'footer_setup', 'leads_uk_address_phone', NULL, 1, '2023-04-27 00:41:17', '2023-08-05 01:22:14'),
(46, 'footer_setup', 'corporate_address_phone', NULL, 1, '2023-04-27 00:41:17', '2023-08-23 03:27:39'),
(47, 'footer_setup', 'registered_address_email', NULL, 1, '2023-04-27 00:41:17', '2023-08-23 03:27:39'),
(48, 'footer_setup', 'corporate_address_email', NULL, 1, '2023-04-27 00:41:17', '2023-08-23 03:27:39'),
(49, 'footer_setup', 'skype', 'flycare', 1, '2023-04-27 00:41:17', '2023-08-23 03:27:39'),
(50, 'footer_setup', 'telegram', 'info@ flycare .com', 1, '2023-04-27 00:41:17', '2023-08-23 03:27:39'),
(51, 'footer_setup', 'whatsapp', '+91-0124-4286-901', 1, '2023-04-27 00:41:17', '2023-07-15 07:23:25'),
(52, 'header_setup', 'header_phone', '0124 428 6901', 1, '2023-08-09 03:06:15', '2023-08-09 04:15:01'),
(53, 'header_setup', 'header_email', 'support@cloudwareindia.com', 1, '2023-08-09 03:06:15', '2023-08-09 04:15:01'),
(54, 'header_setup', 'whatsapp', '0124 428 6901', 1, '2023-08-09 03:06:15', '2023-08-09 04:15:01'),
(55, 'header_setup', 'skype', '#', 1, '2023-08-09 03:06:15', '2023-08-09 04:15:01'),
(56, 'header_setup', 'header_address', '99', 1, '2023-08-09 03:06:15', '2023-08-09 03:06:15'),
(57, 'header_setup', 'header_website', '99', 1, '2023-08-09 03:06:15', '2023-08-09 03:06:15'),
(58, 'header_setup', 'header_hr', '99', 1, '2023-08-09 03:06:15', '2023-08-09 03:06:15'),
(59, 'footer_setup', 'tollfree', '+91-7209770035', 1, '2023-08-23 03:34:32', '2023-08-23 03:43:43'),
(60, 'footer_setup', 'local', '+91-7209770033', 1, '2023-08-23 03:34:32', '2023-08-23 03:34:32');

-- --------------------------------------------------------

--
-- Table structure for table `business_solutions`
--

CREATE TABLE `business_solutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `banner_img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advantage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `business_solutions`
--

INSERT INTO `business_solutions` (`id`, `page_id`, `banner_img1`, `banner_img2`, `banner_heading`, `banner_description`, `title`, `description`, `advantage`, `short_description`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 73, 'uploads/business/business-1688533982.jpg', 'uploads/business/business-1688533956.png', 'AGENT MODULE', 'The Business Online Solutions B2B agent module is an efficient and cost-effective solution for businesses to manage their sales force and increase their revenue.', 'AGENT MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">BOS\'s B2B agent module is a top-tier travel agent software created by industry professionals. It provides customizable features for travel agencies, online travel agencies (OTA\'s), and startups that can help reduce operating costs and increase profit margins for every booking. The platform offers a comprehensive range of components for creating unique travel products, such as flights, hotels, transfers, and more. It is easy to use and customizable to meet the needs of each travel business, and it can be integrated with an online booking engine for travel agents. BOS\'s B2B agent module is capable of managing every aspect of a travel business, from customer search to availability response, product information, payment options, voucher generation, invoicing, and amendments. All admin tasks can be managed through the platform.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">BOS\'s agent module offers a CRM solution that allows for easy connection and communication with suppliers, customers, and partners. It provides both automated and account-specific communication for branch visitors, customers, agents, and suppliers. The platform automates the entire search and booking flow, allowing travel agents to focus on providing excellent customer care and adding upgrades or ancillaries to bookings. It also offers a complete travel management package, including automated search and book features for agents, customisable travel product listings, booking management tools, invoices, and analytics.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">AGENT&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MODULE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS Agent Module can integrate with an online booking engine for travel agents.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS Agent Module is a software solution for travel agents and agencies.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The software offers integration with accounting systems and payment gateways.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The platform supports multiple supplier APIs and allows for dynamic pricing configuration.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The software provides a simple and powerful system to track profit for each booking and understand cash flow.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;It offers a comprehensive suite of features to manage various aspects of a travel business.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS Agent Module is customisable, rich in features, and flexible, allowing businesses to increase staff productivity and reduce human error.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The platform supports multiple supplier APIs and allows for dynamic pricing configuration.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS Agent Module offers an intuitive reservation management system, tour itinerary creation, and group package creation.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The platform allows businesses to manage pricing, including customer and supplier prices, cancellation rules, special promotions, child policies, cancellation costs, markup/margin percentages, and commissions.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">AGENT MODULE</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">Benefits of using BOS\'s agent module include increased staff productivity, reduced human error, online booking journeys, intuitive reservation management, accounting system integration, payment gateway integration, multiple supplier APIs, dynamic pricing configuration, automatic markup calculation, centralized management of customer, supplier, payment, currency, and booking details, comprehensive reporting system, strong contracting module for growing direct product, and multi-currency and multilingual capabilities to expand into new markets.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688533956.jpg', 1, 1, 1, '2023-06-22 06:46:25', '2023-07-04 23:43:02'),
(2, 72, 'uploads/business/business-1688533671.jpg', 'uploads/business/business-1688533652.png', 'BILLING AND RECHARGE API', 'BOS billings and recharges solutions enable businesses to offer prepaid services to their customers. These solutions support multiple payment methods and allow customers to recharge their accounts quickly and easily.', 'BILLING AND RECHARGE API SERVICE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">Business Online Solutions (BOS) Provides an easy and quick API Solution for Billing and Mobile Recharge. We support all DTH, mobile and information card recharges in single API. So Data Card recharge, DTH recharge, and all mobile recharge will operate with a single Mobile recharge API. With our enterprise solution you can get the free services of Recharge API integration. We provide master Billing and Mobile Recharge API Development solution in India. Any company can start its own API business in India if our API development was required by any mobile recharge company using a master API. Multiple API\'s can be integrated into system and API administrator can switch these API between operators.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">You can get various kinds of Billing and Recharge bundles. We offer the all types of billings and recharge solutions offered in the current day. We make your billing and recharge options valuable, in addition to extremely economical and at the same time making no compromises on efficacy. We put all efforts for introducing the latest technological trends which makes our all types of billing and recharge API solutions above level. Our billing and recharge API solutions offer you basically two types of billing and recharge choices; one is termed as Basic recharge solutions and the other is the Company billing and recharge solutions.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">BILLING AND RECHARGE API&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MANAGEMENT</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS API automates the billing and recharge process, reducing manual intervention and increasing efficiency.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS API can handle a large number of transactions simultaneously, making it ideal for businesses of all sizes.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;This API can be customized to meet the unique needs of each business, including branding, pricing, and payment options.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Using BOS API can be more cost-effective than developing a billing and recharge system in-house, as it eliminates the need for additional staff and infrastructure.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS API provides a seamless and user-friendly experience for customers while making payments or recharges, which enhances customer engagement and loyalty.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Our API solutions automate the billing and recharge process, reducing the need for manual intervention and increasing efficiency.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;These solutions can handle a large number of transactions simultaneously, making them ideal for businesses of all sizes.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Our Billing and recharge APIs can be integrated with other business applications, allowing for a seamless user experience.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;These solutions can be customized to meet the unique needs of each business, including branding, pricing, and payment options.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;API solutions ensure that sensitive customer data is stored and transmitted securely, minimizing the risk of data breaches or fraud.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">BILLING AND RECHARGE API</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">We always keep in mind the client needs and budget. So, we provide all type of billings and recharges API development solution. It includes different API solution like DTH, Data Card, mobile recharge, Gas, electricity, postpaid and insurance etc. Our API solution help you a lot to make your own recharge portal for mobile recharge, white label application, and B2B and B2C recharge software etc.</p>', 'uploads/business/business-1688533652.jpg', 1, 1, 1, '2023-06-22 06:47:19', '2023-07-04 23:37:51'),
(3, 26, 'uploads/business/business-1688533319.jpg', 'uploads/business/business-1688533278.png', 'PAYMENT GATEWAY API', 'The BOS Booking API service is mobile-compatible, allowing businesses and their customers to access the system from any device, including smartphones and tablets', 'PAYMENT GATEWAY API', '<div class=\"article mb-3\">\r\n<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">The BOS Booking API service provides a user-friendly interface for businesses and their customers. Customers can easily search for available services, view pricing and availability, and book their desired services. Businesses can easily manage their bookings, view their schedules and availability, and communicate with their customers. BOS Booking API service provides seamless payment integration, allowing businesses to accept payments online. The system supports multiple payment methods, including credit cards, debit cards, and online wallets. This integration helps businesses to improve their cash flow and reduce the risk of payment fraud.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">BOS Booking API service provides a comprehensive solution for managing online bookings. The service offers a range of features that enable businesses to streamline their operations, enhance customer experience, and optimize their performance. The service is customizable, user-friendly, and supports multiple languages and devices. Businesses can integrate the service with other business applications, providing them with a single platform for managing all their operations.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">BOOKING API&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MANAGEMENT</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS Booking API offers seamless integration with third-party applications, making it easy for developers to add booking functionality to their existing systems.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;This allows businesses to expand their reach and provide customers with a more convenient booking experience</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;With the BOS Booking API, businesses can offer their customers multiple booking channels, including their website, mobile app, and social media platforms</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;This provides customers with greater flexibility and convenience when booking their travel arrangements</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS Booking API offers real-time availability of rooms, flights, and other travel-related services</li>\r\n</ul>\r\n</div>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS Booking API offers secure payment processing, ensuring that customer data is protected throughout the transaction process. This can include the integration of popular payment gateways, such as PayPal or Stripe.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS Booking API can be integrated with other systems, such as property management systems (PMS), revenue management systems (RMS), and customer relationship management (CRM) tools. This provides businesses with a comprehensive view of their operations and helps streamline processes.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS offers responsive customer support to assist developers and businesses with any questions or issues related to the BOS Booking API. This can include technical support, training, and onboarding.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS Booking API is scalable, meaning it can support the needs of businesses of all sizes. This allows businesses to start small and scale up as their needs evolve.</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">BOOKING API SERVICES</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">BOS Booking API service can be integrated with a wide range of business applications, such as customer relationship management (CRM) systems, enterprise resource planning (ERP) systems, and accounting software. This integration provides businesses with a single platform for managing all their operations, enabling them to save time and improve efficiency. Business Online Solutions (BOS) provides a comprehensive Booking API service that allows businesses to manage their online bookings with ease. The service includes a range of features that enable businesses to streamline their booking processes, enhance customer experience and optimize their operations.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688533278.jpg', 1, 1, 1, '2023-06-23 03:49:59', '2023-07-07 02:20:03'),
(4, 74, 'uploads/business/business-1688534174.jpg', 'uploads/business/business-1688534231.png', 'DISTRIBUTOR MODULE', 'The distributor-module developed by Boss Company is a cutting-edge innovation that revolutionizes the distribution process.', 'DISTRIBUTOR MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">With its advanced features and state-of-the-art technology, this module ensures efficient and seamless operations for distributors. Designed to streamline inventory management, order processing, and logistics, it empowers distributors to optimize their supply chain and meet customer demands with precision.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">At the heart of the distributor-module lies a robust software system that integrates all key functions into a unified platform. This enables distributors to monitor inventory levels in real-time, track product movements, and generate comprehensive reports for analysis. The module\'s intuitive interface makes it easy for users to navigate through various tasks, providing a user-friendly experience.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">ADMIN&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MODULE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">The Distributor-module by Boss Company is a cutting-edge solution designed to streamline distribution operations and improve efficiency.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">It offers advanced inventory management features, allowing distributors to accurately track stock levels, monitor product movement, and optimize order fulfillment.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">With its robust reporting and analytics capabilities, distributors can gain valuable insights into sales trends, customer preferences, and profitability, empowering data-driven decision-making.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The Distributor-module by Boss Company includes a user-friendly interface that simplifies daily tasks such as order processing, invoicing, and shipment tracking.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;It incorporates intelligent forecasting algorithms to help distributors optimize inventory levels, reduce stockouts, and minimize carrying costs.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">The Distributor-module offers seamless integration with logistics providers, automating shipping processes, and ensuring timely deliveries.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">The distributor-module by Boss Company helps optimize the supply chain by efficiently distributing products to various locations, reducing logistical complexities.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">With a wide network of distributors, Boss Company can penetrate new markets and reach customers in remote areas, increasing overall sales and market share.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">Distributors are well-versed in the local market dynamics, cultural nuances, and customer preferences, allowing Boss Company to tailor its strategies and offerings to specific regions.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;By utilizing distributors, Boss Company can minimize the need for establishing and maintaining its own physical presence in every market, reducing operational costs and financial investments.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">Distributors act as a local point of contact, providing prompt customer support, addressing queries, and resolving issues quickly, leading to higher customer satisfaction.</li>\r\n</ul>', '<p>The distributor-module developed by Boss Company is a game-changer for distributors. With its advanced software system, intelligent order processing, and powerful analytics, it empowers distributors to streamline their operations, enhance efficiency, and ultimately drive business growth.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688534174.png', 1, 1, 1, '2023-07-04 23:46:14', '2023-07-04 23:47:12'),
(5, 75, 'uploads/business/business-1688534576.jpg', 'uploads/business/business-1688534598.png', 'MD MODULE', 'The MD-Module developed by Boss Company is a groundbreaking innovation that revolutionizes the way businesses manage their operations.', 'MD MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">With the MD-Module, businesses can experience a significant boost in productivity and efficiency. The module integrates seamlessly with existing software systems, allowing for real-time data synchronization and analysis. This enables companies to make informed decisions based on accurate and up-to-date information, leading to better resource allocation and improved performance across the board.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">One of the key advantages of the MD-Module is its versatility. It can be customized to meet the specific needs of different industries and sectors, making it a valuable asset for companies operating in various domains. Whether it\'s inventory management, supply chain optimization, or customer relationship management, the MD-Module offers comprehensive solutions that address complex business challenges.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">ADMIN&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MODULE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">The module developed by Boss Company aims to streamline workflow processes.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;It integrates seamlessly with existing systems and software.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">The module provides real-time data analytics for better decision-making.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;It automates repetitive tasks, saving time and reducing human error.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">Users can customize the module to meet their specific needs and preferences.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">It enhances collaboration among team members by providing a centralized platform.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">It offers secure data storage and protects sensitive information.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The module facilitates effective communication through built-in messaging and notification features.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">The module supports remote work by allowing access from anywhere with an internet connection.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">It offers scalable solutions to accommodate the growth of the organization.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">It has a dedicated customer support team to address any issues or questions.</li>\r\n</ul>', '<p>The MD-Module by Boss Company is a game-changer for businesses seeking to enhance their operational efficiency, streamline processes, and achieve sustainable growth. With its advanced technology, customization options, and scalability, the MD-Module empowers companies to stay ahead of the competition and drive success in today\'s dynamic business landscape.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688534576.png', 1, 1, 1, '2023-07-04 23:52:56', '2023-07-04 23:53:18'),
(6, 76, 'uploads/business/business-1688534825.jpg', 'uploads/business/business-1688534792.png', 'ADMIN MODULE', 'At Business Online Solutions, we offer a user-friendly B2B Admin Module that allows customers to browse through a wide range of products added by the administrator', 'ADMIN MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">The BOS\'s B2B Admin Module is a platform that facilitates direct transactions between an organization and its customers. This online portal allows customers to browse through a range of products and place orders for the items they want. Once a customer places an order, the seller is notified via email or through their dashboard. After confirming the order, the seller dispatches the goods to the buyer\'s delivery address. In today\'s digital age, most companies that sell goods directly to end-users are considered B2B companies. With the increasing demand for online shopping, it is essential for B2B stores to have an online portal to provide customers with a hassle-free shopping experience.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">At Business Online Solutions, we offer a user-friendly B2B Admin Module that allows customers to browse through a wide range of products added by the administrator. Our platform is enabled with advanced technology, including an AI-based system that not only helps customers choose the right products but also streamlines the ordering process, saving them valuable time. With our platform, customers can use the advanced search filters to find the products they want quickly and easily. They can choose from various categories or perform custom searches to locate specific items. Additionally, customers can make payments through various modes such as credit cards, debit cards, or COD (if allowed by the seller).</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">ADMIN&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MODULE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS allows the admin to create, manage and assign roles to users for accessing different parts of the system.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS provides the ability to create and manage invoices, handle payments, and set payment terms and methods.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;This module enables the admin to create, send and track quotes to customers, and negotiate prices.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Provides the ability to manage customer data, view customer history, and set up custom pricing and discounts for different customers.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Enables the admin to manage pricing rules and discounts for different products, customers, and suppliers.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Provides the ability to generate reports and analytics on sales data, customer data, and inventory data.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The B2B Admin Module of Business Online Solutions is a comprehensive system that streamlines B2B operations.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;It manages products, catalogs, customers, suppliers, orders, invoices, and payments, and provides tools for inventory management, pricing management, contract management, and reporting and analytics.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The module also offers customizable dashboards, security and compliance, and 24/7 technical support</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;With B2B Admin Module, businesses can efficiently manage their B2B operations, increase productivity, and improve customer satisfaction.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADMIN MODULE</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">The B2B Admin Module is a must-have for any organization that sells goods directly to end-users. With the increasing demand for online shopping, it is essential for businesses to have an online portal that provides customers with a hassle-free shopping experience. At BOS , we offer an advanced B2B Admin Module that is equipped with cutting-edge technology, making it easy for customers to find and order the products they want quickly and efficiently.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688534792.jpg', 1, 1, 1, '2023-07-04 23:56:32', '2023-07-04 23:57:05'),
(7, 77, 'uploads/business/business-1688535051.jpg', 'uploads/business/business-1688535095.png', 'RESELLER MODULE', 'The Reseller Module offered by Boss Company revolutionizes the way businesses operate in the reseller market.', 'RESELLER MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">The Reseller Module offered by Boss Company revolutionizes the way businesses operate in the reseller market. This innovative platform empowers resellers with a comprehensive suite of tools and features to streamline their operations and maximize profitability. With the Reseller Module, resellers can effortlessly manage their inventory, track sales, and communicate with customers, all from a centralized and user-friendly interface.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">One of the standout features of the Reseller Module is its inventory management system. Resellers can easily add, edit, and organize their products, ensuring accurate stock levels and timely updates. The system also enables seamless integration with various e-commerce platforms, allowing resellers to effortlessly synchronize their inventory across multiple channels. The admin module has many built-in features that make it easy to manage your app. For example, you can add and remove users, reset passwords, and define which users have access to the admin module. You can also create user groups and define which user groups have which permissions to access which models. Moreover, you can view all the database objects that you have created and add or remove them individually.</p>\r\n</div>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">The Reseller Module offered by Boss Company provides resellers with an opportunity to earn additional income by selling their products or services at a markup price.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;By partnering with Boss Company as a reseller, businesses can benefit from the established brand reputation and recognition of Boss Company, leading to increased customer trust and loyalty.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Resellers gain access to a range of high-quality products or services offered by Boss Company, which are carefully designed and developed to meet customer needs and preferences.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">Boss Company provides marketing support to resellers, including promotional materials, marketing campaigns, and assistance in creating effective marketing strategies.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;This helps resellers to effectively reach their target audience and drive sales.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The reseller module offered by Boss Company allows resellers to purchase products at discounted rates.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">Resellers can easily source a wide range of high-quality products from Boss Company.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">The reseller module provides a user-friendly interface that allows resellers to efficiently manage their orders, track shipments, and handle customer inquiries,</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;By partnering with Boss Company as a reseller, businesses can leverage the company\'s established brand reputation and benefit from increased customer trust and recognition.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">This Company offers training and educational resources to resellers, equipping them with product knowledge, sales techniques, and business strategies to enhance their success in selling the company\'s products.</li>\r\n</ul>', '<p>Moreover, the Reseller Module facilitates effective communication with customers. Resellers can effortlessly engage with their clients, respond to inquiries, and provide updates on orders. The platform also supports automated notifications, ensuring customers are kept informed throughout the buying process.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688535051.png', 1, 1, 1, '2023-07-05 00:00:51', '2023-07-05 00:01:35'),
(8, 78, 'uploads/business/business-1688535356.jpg', 'uploads/business/business-1688535333.png', 'BUS MODULE', 'We integrate our core bus booking platform and ancillary services like hotels, transfers, and sightseeing into the bus operators\' websites.', 'BUS MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">Simplify your tasks with BOS, B2B bus booking software. This internet-based software assists bus operators in efficiently booking and managing seats. With just an internet connection, users have complete control over the system at all times. Our extensive B2B bus booking software allows bus operators to have a quick and clear view of the fleet size and inventory. Our B2B bus software provides reliable and adaptable solutions to all bus operators. Reduce your bus expenses with our B2B bus booking software, which enables customers to easily book bus tickets online through our web portal. Our online booking engine is equipped with an API that helps users find the best deals available for their chosen destination. Once the user has selected their city, the engine will redirect them to the payment gateway integration. This is an internet-based application that puts complete control of the business in the hands of the user. All that is needed is an internet connection.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">BOS offers a comprehensive bus reservation system that includes a supplier interface, an extranet for bus operators, route scheduling, seat mapping, seat selection by travelers, price and availability management, IBE and more. Our cutting-edge technology enables bus agencies of all sizes to take their business online. The CRS-based bus reservation system features an online bus booking software designed to automate search, ticketing, amendments, cancellations, and refunds.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">BUS&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MODULE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Innovative software for bus operators to book and manage seats effectively.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS provides Web-based application with full control available to the user at all times with just an internet connection.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Comprehensive software that provides a clear picture of the fleet size and inventory.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Reliable and scalable solutions for bus operators of all sizes.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Simplifies the process of bus booking and management for operators.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS provides user-friendly interface for easy booking and management of seats.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Enables bus operators to offer their services online and reach a wider audience.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS Bus Module provides a secure and efficient way for bus operators to manage their business.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Includes features such as route scheduling, seat mapping, and price and availability management.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Our software provides detailed reports and analytics to help bus operators make informed decisions.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">BUS MODULE</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">As an award-winning bus reservation software development company, BOS work with India\'s bus operators, aggregators, and fleet owners. We integrate our core bus booking platform and ancillary services like hotels, transfers, and sightseeing into the bus operators\' websites Reduce your bus expenses with our B2B bus booking software, which enables customers to easily book bus tickets online through our web portal.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688535333.jpg', 1, 1, 1, '2023-07-05 00:05:33', '2023-07-05 00:05:56'),
(9, 79, 'uploads/business/business-1688535715.jpg', 'uploads/business/business-1688535685.png', 'HOTEL MODULE', 'At our company, we are committed to providing our customers with a comprehensive, reliable, and visually appealing B2B hotel booking module platform that meets their needs and helps them grow their business', 'HOTEL MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">BOS hotel module are in high demand as the travel industry continues to grow. At our company, we have been in the industry for years and have seen the need for a comprehensive hotel booking module. Our goal is to provide a platform that serves our customers more efficiently, with a focus on delivering a function-rich, profitable, and high-availability booking engine that is also visually appealing. At BOS we understand the need for a reliable and efficient B2B hotel booking module. Our platform offers a comprehensive database of hotels across the globe, enabling our customers to find the perfect accommodations for their clients. We also offer instant booking and confirmation in a single interface, ensuring a seamless booking experience.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">BOS, hotel module is designed to be function-rich and profitable, allowing our customers to earn commissions on every booking made through our platform. We also understand the importance of visual appeal and have incorporated eye-catching designs into our booking engine to enhance the user experience. Our company\'s top priority is to deliver a B2B hotel booking module platform that meets the growing demands of the travel industry. We strive to offer our customers a comprehensive and visually appealing platform that is not only reliable but also helps them expand their business. We are passionate about delivering a function-rich and profitable B2B booking engine that is always available to our clients. Our team is dedicated to designing an eye-catching platform that can cater to the requirements of the modern-day traveler.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">HOTEL&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MODULE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS hotel module provides a unique login for partners to manage contracts and conditions in one online booking engine</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS hotel module is a web application system that can be accessed with an internet connection, providing full control of the business</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The module allows hotels to set sales strategies according to their needs and requirements.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;It is a state-of-the-art solution crafted by Business Online Solutions to make hotel booking hassle-free for customers.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS\'s B2B hotel module can help enhance conversion rates, increase revenue per online booking, and improve cross-selling.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS hotel module helps manage activities such as rate tariffs, room allotment, reservations, cancellations, and changes efficiently</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Hotels can set different conditions and rates based on their partner portfolio and handle all communications in a single step</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Payment options can be customized to increase conversion rates, and allotments can be managed per profile, channel, or partner centrally without any issues</li>\r\n</ul>\r\n<p>&nbsp;</p>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">HOTEL MODULE</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">We understand the importance of providing our customers with a reliable and comprehensive platform that caters to their needs. With our B2B hotel booking module platform, we aim to provide our customers with a tool that helps them expand their business and meet the growing demand of the travel industry.</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688535685.jpg', 1, 1, 1, '2023-07-05 00:11:25', '2023-07-05 00:11:55'),
(10, 80, 'uploads/business/business-1688535876.jpg', 'uploads/business/business-1688535861.png', 'FLIGHT BOOKING MODULE', 'Business Online Solutions (BOS) develops strong B2B travel or flight booking portals with a flexible content management system and unique back-office features to automate all booking functionalities.', 'FLIGHT BOOKING MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">Business Online Solutions (BOS) portal for booking flights is crucial for travel business providers, especially for those that only sell flight tickets. This portal enables travel agents and tour operators to make instant purchases and book bulk flight seats at the cheapest rates. A fully integrated flight B2B Airline booking engine streamlines the entire booking process and provides instant tickets and booking confirmation. Business Online Solutions (BOS) provides a web-based travel booking engine designed for all travel agencies, travel management companies, and travel consolidators. This portal is a search-based system that simplifies the business procedure and enables travel agents and tour operators to select flights, choose the number of seats, and select a payment method from multiple options.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">Flight booking portals developed by Business Online Solutions (BOS) are completely customized, responsive, and integrated with global APIs to provide access to thousands of flight providers using one single platform. The portal comes with several features such as real-time inventory, multiple payment gateways, proper agent reports, auto booking confirmation emails, and more. Using the BOS flight booking module saves a lot of time and money, enables travel agents to add air tickets to various travel packages, and includes customer margin rates to flight tickets according to the market. Flight booking module also provide the ability to change or make cancellations, send automatic follow-up emails, track sold tickets and passengers, and make last-minute bookings. Business Online Solutions (BOS) offers affordable flight reservation systems with an easy back-office module and a comprehensive booking management system that can be integrated with over 1000 flight service providers.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">FLIGHT&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MANAGEMENT</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS provides Simplifies the end-to-end booking process for travel agents, allowing for instant ticket purchases and booking confirmations.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Helps travel providers purchase bulk flight seats at the cheapest rates.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Allows travel agents and tour operators to search for flights, select the number of seats, and choose a payment method from multiple options.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Offers real-time inventory and covers the cheapest rates for a wide range of flights.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Provides a responsive and user-friendly portal design with easy booking management features</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;elps create engaging reports and updates about business profits by tracking sold tickets and the list of passengers.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS offers a flexible content management system, unique back-office, and automated booking functionalities.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Provides an affordable flight reservation system with an easy back-office module.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Allows for cancellations and modifications with automatic follow-up emails.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Offers per-person account or profile settings for easy management.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Includes customer margin rates to set flight ticket rates according to the market</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">FLIGHT BOOKING MODULES</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">Flight booking portals developed by Business Online Solutions (BOS) are completely customized, responsive, and integrated with global APIs to provide access to thousands of flight providers using one single platform. The portal comes with several features such as real-time inventory, multiple payment gateways, proper agent reports, auto booking confirmation emails, and more. Using the flight booking system saves a lot of time and money, enables travel agents to add air tickets to various travel packages, and includes customer margin rates to flight tickets according to the market. Flight booking systems also provide the ability to change or make cancellations, send automatic follow-up emails, track sold tickets and passengers, and make last-minute bookings.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688535861.jpg', 1, 1, 1, '2023-07-05 00:14:21', '2023-07-05 00:14:36');
INSERT INTO `business_solutions` (`id`, `page_id`, `banner_img1`, `banner_img2`, `banner_heading`, `banner_description`, `title`, `description`, `advantage`, `short_description`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(11, 81, 'uploads/business/business-1688536719.jpg', 'uploads/business/business-1688536742.png', 'BANKING MODULE', 'The banking module developed by Boss Company is a cutting-edge solution designed to enhance business-to-business (B2B) operations in the financial sector.', 'BANKING MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">With seamless integration into existing banking systems, the module streamlines the entire B2B process, from account management to fund transfers. It provides real-time data analytics and reporting, enabling banks to make informed decisions and optimize their financial operations. The module automates repetitive tasks, reducing manual errors and improving efficiency.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">One of the key features of the banking module is its secure data handling capabilities. It ensures that sensitive information, such as customer data and transaction details, are stored and transmitted securely, adhering to the highest industry standards. Additionally, the module offers robust authentication and encryption mechanisms to protect against unauthorized access.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">ADMIN&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MODULE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">The banking-module B2B by Boss Company is a comprehensive software solution designed specifically for businesses in the banking sector.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">It offers a wide range of features and functionalities to streamline and automate various banking processes.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The module enables seamless integration with existing banking systems, ensuring smooth data flow and compatibility.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">It provides a secure and robust platform for conducting B2B transactions between banks and other business entities.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">The software supports multi-currency transactions, allowing businesses to operate on a global scale.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;It includes advanced security measures such as encryption and authentication protocols to safeguard sensitive financial information.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">The module facilitates electronic fund transfers, enabling swift and efficient payment processing between banks and businesses.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">It offers real-time transaction monitoring and reporting, giving businesses access to up-to-date financial data and analytics.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">The software supports automated reconciliation processes, reducing manual effort and improving accuracy.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">It provides a user-friendly interface with intuitive navigation, making it easy for users to access and utilize its features.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">The software offers comprehensive technical support and regular updates to ensure optimal performance and functionality.</li>\r\n</ul>', '<p>The banking module by Boss Company empowers banks to optimize their B2B operations, streamline processes, and strengthen relationships with their partners. It not only improves efficiency but also enhances security and compliance, making it a valuable asset for banks in today\'s rapidly evolving financial landscape.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688536719.png', 1, 1, 1, '2023-07-05 00:28:39', '2023-07-05 00:29:02'),
(12, 82, 'uploads/business/business-1688536899.jpg', 'uploads/business/business-1688536858.png', 'CUSTOMER MODULE', 'BOS Customer Module provides to a Having diversified pool of software solutions allows sales and marketing operations to leverage the strengths of individual products and optimize their processes accordingly.', 'CUSTOMER MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">The process of managing customer relationships is complex and involves multiple stages, starting with marketing and sales and continuing through pre-sales support, conversion, and post-purchase customer success and retention. There are many components involved in this process, including website design, conversion funnels, website modules like forms and meeting schedulers, email marketing, and customer support processes, with different departments involved throughout the buyer journey. Business Online Solutions (BOS) Customer Module software attempts to provide all of these components within a single platform, they may not offer the same level of functionality as dedicated software solutions. This can result in higher costs, inferior 1st party modules, or a lack of flexibility due to being tied to the CRM company\'s proprietary ecosystem.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">This is where Business Online Solutions (BOS) Customer modules come in. These applications connect with your Customer Module and provide additional functionality to enhance the value you generate from your Customer Module software. Customer Module modules can be standalone applications or ones designed specifically to work with a particular Customer Module platform. Customer Module software tries to provide a one-size-fits-all solution, it may not offer the same level of functionality as dedicated software solutions. BOS provide a way to enhance the value of your Customer Module software by connecting with it and providing additional features and capabilities. Using a diversified pool of software applications can help businesses optimize their sales and marketing operations and improve their customer relationships.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">CUSTOMER&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MODULE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The customer module in (BOS) is a tool that helps businesses manage their interactions with customers.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;It includes features like customer profiles, contact information, and communication history.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The module may also include tools for managing sales, marketing, and customer support.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;It can also help businesses personalize their marketing and communication efforts and provide better customer support.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;CMany customer modules are designed to integrate with other business software tools, like email marketing software or accounting software</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;This integration can help businesses streamline their workflows and improve data accuracy.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The customer module can also provide valuable insights into customer behavior and preferences, which can inform business strategy and decision-making.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The customer module can help businesses improve customer retention and loyalty by providing personalized experiences and targeted marketing campaigns.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Many customer modules are designed to integrate with other business software tools, like email marketing software or accounting software.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">CUSTOMER MODULE</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">BOS provide a way to enhance the value of your Customer Module software by connecting with it and providing additional features and capabilities. Using a diversified pool of software applications can help businesses optimize their sales and marketing operations and improve their customer relationships.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688536858.jpg', 1, 1, 1, '2023-07-05 00:30:58', '2023-07-05 00:31:39'),
(13, 83, 'uploads/business/business-1688537105.jpg', 'uploads/business/business-1688537008.png', 'ADMIN MODULE1', 'The BOS admin panel is an excellent tool for app owners who want complete control over their apps. It is easy to use, and it offers a range of features that make it easy to manage your app\'s backend.', 'ADMIN MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">The BOS (Business Online Solutions) comes with an admin module that can be accessed through the app dashboard. The purpose of the admin module is to provide app owners with complete control over their apps once they are built. It is designed to help you manage your app\'s backend data models, APIs, and admin interfaces. One of the key benefits of the BOS admin module is that you can create your backend data models, admin, and APIs without needing any development experience. This means that even if you are not a developer, you can build the entire backend in just an hour or two if you have already planned out your app. You can simply click in data entry to add your models, and then deploy the app.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">Once your backend models are uploaded, you can access the app\'s admin module, where you can manage all of your models. It is worth noting that your credentials will be sent to you via email, but you can change them once you access the admin panel. The admin module offers three key features: an admin panel containing all the models you created, basic web views for all the models you created, and APIs for each model you created. The admin module has many built-in features that make it easy to manage your app. For example, you can add and remove users, reset passwords, and define which users have access to the admin module. You can also create user groups and define which user groups have which permissions to access which models. Moreover, you can view all the database objects that you have created and add or remove them individually.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">ADMIN&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MODULE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The admin panel is designed to provide app owners with complete control over their apps once they are built.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS (Business Online Solutions) comes with an admin panel that can be accessed through the app dashboard.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Once your backend models are uploaded, you can access the app\'s admin panel, where you can manage all of your models.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS admin panel is an essential tool for any app owner who wants complete control over their app\'s backend.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS admin panel provides you with a wide range of features to manage your app\'s backend.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS can easily add or remove users, reset passwords, and determine who has access to the admin panel.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The admin panel has many built-in features that make it easy to manage your app, such as adding and removing users, resetting passwords, and defining which users have access to the admin panel.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Additionally, you can view all of the database objects that you have created and add or remove them as needed.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;With these tools at your disposal, you have complete control over your app\'s backend operations.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Once your backend models are uploaded, you can access the app\'s admin module, where you can manage all of your models.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;You can also create user groups and define which user groups have which permissions to access which models.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADMIN MODULE</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">BOS Center introduces travelers to the best flight booking experience there is. Every day, thousands of businesspersons and tourists book domestic and international flight tickets through our desktop site, mobile site, Android and iOS apps. Unbelievably cheap flights and a seamless air ticket booking process make travels merrier than ever.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688537008.jpg', 1, 1, 1, '2023-07-05 00:33:28', '2023-07-05 00:50:54'),
(14, 85, 'uploads/business/business-1688540143.jpg', 'uploads/business/business-1688538792.png', 'FLIGHT MODULE', 'BOS provides a complete B2C Travel Portal solution for travel agents and tour operators that enable them to develop their travel business online and sell travel products directly to customers', 'FLIGHT BOOKING MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">Business Online Solutions (BOS) is a company that provides B2C Travel Portal, Flight Ticket Booking Portal services to travel agencies, tour operators, and travel companies globally. Their B2C travel portal is an online booking engine that integrates modules for flights, hotels, transfers, sightseeing, and packages. It offers real-time inventory, payment gateways, third-party integration service, dynamic packaging systems, weather tools for travelers, and more. The BOS travel portal provided by BOS is a web application system that offers fully integrated solutions to customers. It provides an interactive portal for end customers and a back-office system for managing rates and B2B partners. BOS also provides suppliers and integrated CRM, graphical reporting, multi-language support, markup options, and API and GDS integrations. The company\'s online B2C Booking System offers the right tools that make the booking process faster and simpler for all kinds of customers - corporate or end-customers.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">BOS Flight Booking Portal refers to a Business to Customer service where customers can directly deal with travel companies. The customers can access their own brand where they can book online flight services through a flight booking app. BOS provides a complete BOS Travel Portal solution for travel agents and tour operators to develop their travel business online and sell travel products directly to customers. The BOS end customer can check their booking and payment history and send requests for cancellations at any time from anywhere by logging into the customer dashboard. This enables customers and guests to book directly without the intervention of tour operators.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">FLIGHT&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MODULE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS flight module provides access to a comprehensive database of flight schedules, pricing, and availability from multiple airlines, ensuring that customers have access to up-to-date and accurate flight information.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS flight module includes an online booking engine that helps customers to search and book flights online.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS reducing the need for manual bookings and improving the customer experience.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS provides real-time inventory updates, ensuring that the availability of flights is accurately reflected in the system.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS flight module supports multiple languages, making it accessible to a wider audience of customers worldwide.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS supports multiple payment gateways, making it easy for customers to make secure payments for their flight bookings.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS includes a markup option that allows travel agencies to set their own prices for flights, thereby increasing revenue and profit margins.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The module includes graphical reporting tools that provide insights into sales, bookings, and revenue, making it easier for travel customers to monitor and optimize their trip performance.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The BOS allowing travel agencies to integrate with other systems and services for a seamless customer experience.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">FLIGHT MODULE</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">With different rates and availability, Business Online Solutions (BOS) travel portal system reacts directly to boost turnover through an integrated travel solution. The portal facilitates travel agents, tour operators, web portals, and consolidators to sell, run, and collaborate with their B2C clients and B2B partners.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688538792.jpg', 1, 1, 1, '2023-07-05 01:03:12', '2023-07-05 01:25:43'),
(15, 86, 'uploads/business/business-1688540306.jpg', 'uploads/business/business-1688540271.png', 'HOTEL BOOKING MODULE', 'If you are interested in the BOS hotel booking system, you can request a demo to see its features in action. The system offers several features, including', 'HOTEL BOOKING MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">The Business Online Solutions (BOS) online hotel booking system offers a user-friendly web application that provides available hotel information to customers. It acts as an interface between the user and the hotel web services, covering the presentation and booking process of all types of web services, regardless of which web service you subscribe to. The sales management panel of the BOS hotel online booking system offers flexible settings, comprehensive reporting and monitoring facilities, and customer support modules. It also integrates with various world-class web services, such as Hotels Beds and Hotelspro, allowing your website users to book those hotels or rooms defined by you in the Inventory Management module.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">The BOS reservation system helps increase productivity by selling a large number of hotels without adding staff. Due to its high accuracy and detailed architecture, personnel at any level can perform their duties with minimal training. This reduces costs, as you do not need to hire more staff for hotel reservations. The system provides access to many hotels worldwide through the implementation of important third-party hotel providers and hotel channel management. Even if you do not have access to a hotel provider, you can easily share hotels from BOS consolidators/aggregators.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">HOTEL&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MANAGEMENT</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS company\'s hotel modules can help hotel managers efficiently manage room bookings, availability, and pricing, allowing them to save time and streamline their operations.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS company\'s hotel modules can offer upsell opportunities, such as room upgrades and add-ons, leading to increased revenue for the hotel.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS company\'s hotel modules can provide guests with a seamless booking experience, quick confirmation, and easy access to information, leading to a better guest experience.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;BOS company\'s hotel modules can help hotels increase their online visibility, by integrating with various online travel agencies and booking platforms, and reaching a wider audience.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;With a hotel booking module, customers can quickly and easily book a room online without the need to call or visit the hotel in person.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;World Best 24 your Support.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;By integrating with third-party booking platforms, hotel modules can increase the visibility of the hotel and attract more bookings from a wider audience.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Hotel modules can help reduce costs by automating many of the manual processes associated with booking management, such as data entry, reservation confirmation, and billing.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;By providing real-time availability and pricing information, hotel modules can improve customer service by allowing customers to make informed decisions and avoid overbooking or other issues.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">HOTEL BOOKING MODULES</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">The system provides access to many hotels worldwide through the implementation of important third-party hotel providers and hotel channel management. Even if you do not have access to a hotel provider, you can easily share hotels from BOS consolidators/aggregators.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688540271.jpg', 1, 1, 1, '2023-07-05 01:27:51', '2023-07-05 01:28:27'),
(16, 87, 'uploads/business/business-1688540471.jpg', 'uploads/business/business-1688540418.png', 'BUS MODULE', 'Our software is customizable to meet your specific needs, and can be integrated with your existing systems for a seamless transition. With real-time data and reporting, you can make informed decisions to optimize your operations and increase your profitability.', 'BUS BOOKING MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">BOS provides Public transportation and carpooling can be unreliable for large groups, so trust us to provide a charter bus for your corporate events. Simply send us your itinerary and we\'ll handle parking and navigation. With over 5 years of experience, we\'re proud to be one of Indian\'s largest bus companies. We cater to a variety of clients, from local schools to corporate clients and international tourists on trips throughout India. Our fleet of buses is extensive and we invite you to explore it on our website. We strive to offer you the best prices available for your trip.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">We place a high priority on your comfort and safety, which is why we only hire professional tour experts and drivers. Our staff is carefully selected based on their knowledge of Indian cities to help you plan your trip if needed. During your trip, our drivers can also recommend must-see places. Our main strength is our extensive catalogue of India tours. You can start your trip in one place and end it in another without any worries. Our services are available to both individuals and companies. Visit our website to discover all of our services and capabilities</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">BUS&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MODULE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;It is a customizable solution that can be tailored to meet the specific needs of each bus company</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The software is secure and compliant with industry standards and regulations.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The Bus Module is a comprehensive software solution offered by a Business Online Solutions (BOS) for bus operators and transportation companies.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;It features real-time GPS tracking and automatic route optimization to ensure efficient use of resources and on-time arrivals.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Bus operators can use the Bus Module to streamline operations, reduce costs, and increase customer satisfaction.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The Bus Module is highly customizable to meet the specific needs of each bus operator or transportation company.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The Bus Module is a software solution offered by a Business Online Solutions (BOS)</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;It is designed to help bus companies manage their operations more efficiently</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The module includes features such as ticketing, fleet management, and scheduling</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;The Bus Module is user-friendly and can be accessed from any device with an internet connection</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">BUS MODULE</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">Our Bus Module is a comprehensive software solution designed for bus companies looking to streamline their operations and improve their efficiency. With our easy-to-use platform, you can manage everything from ticket sales to route planning, driver scheduling, maintenance tracking, and more.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688540451.jpg', 1, 1, 1, '2023-07-05 01:30:18', '2023-07-05 01:31:12'),
(17, 88, 'uploads/business/business-1688541028.jpg', 'uploads/business/business-1688541058.png', 'BANKING MODULE', 'The banking-module B2C developed by Boss Company is a revolutionary solution that has transformed the way customers engage with their financial institutions.', 'BANKING MODULE', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">One of the key highlights of the B2C module is its user-friendly interface, designed to cater to the needs and preferences of modern-day consumers. Customers can easily navigate through the intuitive menus, access their account information, and perform a wide range of banking transactions with just a few clicks. Whether it\'s transferring funds, paying bills, or managing investments, the module provides a hassle-free experience that puts the power of banking at customers\' fingertips.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">Another noteworthy aspect of the banking-module B2C is its seamless integration with other digital platforms and services. Customers can effortlessly link their bank accounts to third-party applications, enabling them to track their expenses, create personalized budgets, and gain insights into their financial health. This integration fosters a comprehensive financial ecosystem that empowers customers to make informed decisions and effectively manage their finances.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">ADMIN&nbsp;<span class=\"fs-18 lsp-5 text-orange\">MODULE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">The banking module B2C offered by Boss Company provides a user-friendly interface for customers to access their banking services.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">Customers can easily manage their accounts, view balances, and perform transactions through the module.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">The module supports various banking services such as fund transfers, bill payments, and account statements.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">Customers can set up recurring payments and schedule transactions for convenience.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">The module incorporates strong security measures to ensure the safety of customer data and transactions.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">Customers can link multiple accounts from different banks and manage them all within the module.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">The module offers personalized financial insights and recommendations to help customers make informed decisions.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">Customers can apply for loans, credit cards, and other financial products through the module.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">The module provides real-time notifications for account activities, ensuring customers stay updated.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">Customers can access customer support services directly through the module, enabling quick resolutions to any issues.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">Customers can set up savings goals and track their progress through the module\'s financial planning features.</li>\r\n</ul>', '<p>The banking-module B2C developed by Boss Company has revolutionized the banking experience for customers. Its user-friendly interface, robust security measures, and seamless integration capabilities make it a standout solution in the industry. By leveraging this module, customers can enjoy a convenient, secure, and empowered banking experience.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688541028.png', 1, 1, 1, '2023-07-05 01:40:28', '2023-07-05 01:40:58'),
(18, 89, 'uploads/business/business-1688541667.jpg', 'uploads/business/business-1688541598.png', 'NIDHI COMPANY', 'Nidhi Companies are regulated by the Reserve Bank of India (RBI) and are often used by small businesses and individuals who are unable to access traditional banking services.', 'NIDHI COMPANY', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">If you need a software solution for your Nidhi company that is innovative, customized and sustainable, BOS offers a range of options. Their expert project teams have the skills required to provide tailored solutions, including project management, analysis, design, development, quality assurance and deployment. Their Nidhi software is designed to support the core banking operations of Nidhi companies, including fixed deposits, recurring deposits, loans to customers, monthly income schemes and dividend declarations. It has a centralized database that can manage various accounts, such as savings, current, fixed deposit, recurring deposit, and DDS. It also offers multiple banking features like daily cash account, saving accounts, and loan accounts.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">Online Business software can handle multiple branches, users\' entry and reporting operations, and is fully customizable. They also provide a Double Entry Accounts Module to benefit Nidhi companies during audits. They are continuously updating their software to provide the latest features and modules.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">NIDHI&nbsp;<span class=\"fs-18 lsp-5 text-orange\">COMPANY</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;A Nidhi Company is a type of non-banking financial company (NBFC) in India that primarily deals with borrowing and lending money among its members.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;It is governed by the Ministry of Corporate Affairs and regulated by the Reserve Bank of India (RBI).</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;The name \"Nidhi\" means \"treasure,\" and these companies were originally created to build a fund of savings to benefit their members.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Nidhi Companies are often used by small businesses and individuals who are unable to access traditional banking services.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;It is governed by the Ministry of Corporate Affairs and regulated by the Reserve Bank of India (RBI).</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Nidhi Companies are categorized as mutual benefit societies, and their main objective is to encourage savings and provide financial assistance to their members.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Best Service For Nidhi Companys.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;World Best 24 your Support.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Maxmize Earning on your Nidhi Companys</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">NIDHI COMPANYS</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">Our user-friendly software is designed to assist any Nidhi-related business, providing them with customizable tools to streamline their operations. We offer a comprehensive list of features and modules that cater to the specific needs of our clients. Additionally, we update our software every month with the latest modules and features to ensure we stay up-to-date with industry trends. Our dedicated R&amp;D team is constantly working to provide our clients with the most up-to-date solutions.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688541598.jpg', 1, 1, 1, '2023-07-05 01:49:58', '2023-07-05 01:51:07'),
(19, 90, 'uploads/business/business-1688541862.jpg', 'uploads/business/business-1688541836.png', 'MICRO FINANCE COMPANY', 'Microfinance refers to financial services, such as loans, savings, and insurance, offered to poor entrepreneurs and small business owners who lack collateral and do not qualify for traditional bank loans.', 'MICRO FINANCE COMPANY', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">BOS is a India-based company that provides software services for microfinance with high levels of security. We specialize in providing reliable services to small and medium-sized microfinance institutions and other sectors for over five years. Our microfinance solution covers all branch-level activities and comes with options for concurrent remote monitoring. It also allows for easy tracking of loans and interest rate calculations. With our integrated Microfinance Management System, you can take your business to the next level.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">Microfinance refers to financial services, such as loans, savings, and insurance, offered to poor entrepreneurs and small business owners who lack collateral and do not qualify for traditional bank loans. Our microfinance software is flexible and easy to use, helping you manage client data, including loans, grants, and investors. Microfinance plays a crucial role in bridging the gap between formal financial institutions and rural poor communities. Our software provides smart banking functionalities that allow you to focus on other areas of your business. At BOS, we believe that technology alone cannot achieve business value. Our human-centered approach to technology ensures that we understand your individual business objectives and develop solutions that meet your requirements.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">MICRO FINANCE&nbsp;<span class=\"fs-18 lsp-5 text-orange\">COMPANY</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Empowerment of women and marginalized communities by providing them with financial independence and opportunities for entrepreneurship</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Availability of flexible loan options that can be customized to meet individual needs</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Creation of employment opportunities through the growth of small businesses and entrepreneurship</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Encouragement of savings habits and investment in the future</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Reduction of dependency on informal lenders who may charge exorbitant interest rates and fees.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Access to financial services for individuals and small businesses who do not have collateral and would not qualify for traditional bank loans</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Ability to support economic development and growth in underdeveloped and rural areas by providing access to credit and financial services</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Availability of flexible loan options that can be customized to meet individual needs</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Ability to foster financial literacy and education by providing financial training and resources to clients</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Creation of employment opportunities through the growth of small businesses and entrepreneurship</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">MICRO FINANCE COMPANY</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">The cost of microfinance software typically ranges between minimum cost rupees and depends on factors such as customer requirements, software quality, and modifications. However, as a reputable software company in India, we offer cost-effective microfinance software that is 100% user-friendly and meets all our clients\' requirements.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688541836.jpg', 1, 1, 1, '2023-07-05 01:53:56', '2023-07-05 01:54:22'),
(20, 91, 'uploads/business/business-1688542175.jpg', 'uploads/business/business-1688542152.png', 'NBFC COMPANY', 'BOS Center introduces travelers to the best NBFC Company experience there is. Every day, thousands of businesspersons and tourists book domestic and international NBFC Company through our desktop site.', 'NBFC COMPANY', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">Business Online Solution is a leading software company based in India that provides customized solutions to manage the entire loan life cycle. We specialize in upgrading or integrating NBFC Software into your business panel to automate corporate operations and improve overall operational efficiency. Our NBFC Software is specifically designed for NBFC startups, reducing manual intermediation and improving workflow by reducing operational risks. Consumers have the option to initiate and filter loan applications across mobile and internet channels using our omni-channel Loan Management Solution. We have over a decade of experience in the same domain, making us a trusted NBFC software provider.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">The cost of our NBFC Software depends on its features, software service and support, software customization, and the company profile of the software provider. As a trusted brand in India, we offer full-featured software along with a mobile application at a reasonable price. You can request a demo or trial to experience our software firsthand, which is valid for one year. NBFCs play a crucial role in promoting financial inclusion and managing all loan-related activities for non-banking financial companies. Our NBFC Software is designed exclusively for NBFIs, trusted by leading non-banking financial companies worldwide, and offers a complete lending solution. NBFCs have become an integral part of the financial landscape in developing countries, offering credit to the unbanked sections of society, including micro, small, and medium-sized enterprises (MSMEs).</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">NBFC&nbsp;<span class=\"fs-18 lsp-5 text-orange\">COMPANY</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Ability to provide financial services in remote and underdeveloped areas, which can help in promoting financial inclusion and development</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Ability to act as a complement to traditional banking services, providing an additional layer of financial support to individuals and businesses.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Ability to offer higher returns on investments compared to traditional banking products</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Flexibility in operations and faster decision-making processes</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Ability to provide customized financial products and services to cater to specific customer needs</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Availability of credit to individuals and small businesses who may not have access to traditional banking services</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Flexibility in operations and faster decision-making processes</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Availability of credit to individuals and small businesses who may not have access to traditional banking services</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Ability to operate in niche markets and provide specialized financial services such as leasing, factoring, and hire-purchase</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Ability to provide financial services with less stringent regulatory requirements compared to banks, which can lead to quicker expansion and growth</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Ability to offer higher returns on investments compared to traditional banking products</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">NBFC COMPANY</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">Although the NBFC sector has grown significantly over the last decade, it has faced temporary setbacks due to operational inefficiencies. To overcome this, NBFCs require a thorough understanding of their customer\'s profile and credit to customize their products and stay ahead of the competition. This can be achieved through the advanced technology of NBFC software.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688542152.jpg', 1, 1, 1, '2023-07-05 01:59:12', '2023-07-05 01:59:35');
INSERT INTO `business_solutions` (`id`, `page_id`, `banner_img1`, `banner_img2`, `banner_heading`, `banner_description`, `title`, `description`, `advantage`, `short_description`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(21, 92, 'uploads/business/business-1688542359.jpg', 'uploads/business/business-1688542359.png', 'RD/FD MANAGEMENT COMPANY', 'RD/FD is a type of investment where customers can deposit money either regularly or in a lump sum and earn interest on it over a fixed period of time. RD/FD investments are considered safe and reliable because they are backed by the reputation and stability of the financial institution offering them.', 'RD/FD MANAGEMENT COMPANY', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">When investing in RD/FD with BOS Company, customers have the option to choose between a recurring deposit and a fixed deposit. In a recurring deposit, customers can deposit a fixed amount of money on a monthly basis for a fixed period of time. At the end of the period, the customer receives the total amount deposited along with the accumulated interest. BOS Company offers competitive interest rates on both recurring deposits and fixed deposits. The interest rate may vary depending on the amount invested and the duration of the investment. The interest is calculated on a monthly basis and paid out at the end of the investment period.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">One of the benefits of investing in RD/FD with BOS Company is that it provides a regular and stable source of income. The interest earned on the investment can be reinvested or used for other financial goals. Additionally, BOS Company offers flexible investment options, allowing customers to choose the investment duration and amount according to their financial goals and requirements. In conclusion, RD/FD offered by BOS Company is a reliable and safe investment option that provides customers with a regular and stable source of income. The investment options are flexible and the interest rates are competitive, making it a popular choice among investors looking to grow their wealth over time.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">RD/FD MANAGEMENT&nbsp;<span class=\"fs-18 lsp-5 text-orange\">COMPANY</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Safe and secure investment option</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Fixed and reliable returns on investment</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Higher interest rates compared to savings accounts</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Flexible investment options to suit individual financial goals</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Easy to understand and invest in, even for first-time investors</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Can be used as collateral for loans or other financial needs</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;No risk of market fluctuations or economic downturns affecting returns</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Tax benefits on investment and interest earned, depending on the investment duration and amount</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Can be easily managed and tracked through online banking or mobile applications.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">RD/FD MANAGEMENT COMPANY</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">RD/FD is a type of investment where customers can deposit money either regularly or in a lump sum and earn interest on it over a fixed period of time. RD/FD investments are considered safe and reliable because they are backed by the reputation and stability of the financial institution offering them.</p>\r\n<p>&nbsp;</p>', 'uploads/business/business-1688542359.jpg', 1, 1, 1, '2023-07-05 02:02:39', '2023-07-05 03:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `parent_id`, `title`, `icon`, `slug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'blog', 0, 'The Stories Behind Blog1', NULL, 'the-stories-behind-blog1', 1, 1, 1, '2023-05-09 00:16:40', '2023-05-09 00:26:05', NULL),
(2, 'blog', 0, 'The Stories Behind Blog2', NULL, 'the-stories-behind-blog2', 1, 1, 1, '2023-05-09 00:16:50', '2023-05-09 00:24:44', NULL),
(3, 'news', 0, 'The Stories Behind News1', NULL, 'the-stories-behind-news1', 1, 1, NULL, '2023-05-09 00:26:20', '2023-05-09 00:26:20', NULL),
(4, 'news', 0, 'The Stories Behind News2', NULL, 'the-stories-behind-news2', 1, 1, NULL, '2023-05-09 00:26:33', '2023-05-09 00:26:33', NULL),
(5, 'event', 0, 'The Stories Behind Event1', NULL, 'the-stories-behind-event1', 1, 1, NULL, '2023-05-09 00:26:54', '2023-05-09 00:26:54', NULL),
(6, 'event', 0, 'The Stories Behind Event2', NULL, 'the-stories-behind-event2', 1, 1, NULL, '2023-05-09 00:27:06', '2023-05-09 00:27:06', NULL),
(7, 'case_study', 0, 'Enterprise', NULL, 'enterprise', 1, 1, NULL, '2023-05-25 01:26:28', '2023-05-25 01:26:28', NULL),
(8, 'case_study', 0, 'Insurance', NULL, 'insurance', 0, 1, 1, '2023-05-25 01:26:57', '2023-07-07 02:21:33', NULL),
(9, 'case_study', 0, 'Manufacturing', NULL, 'manufacturing', 0, 1, 1, '2023-05-25 01:27:36', '2023-07-07 02:21:27', NULL),
(10, 'blog', 0, 'The Stories Behind Blog3', NULL, 'the-stories-behind-blog3', 1, 1, NULL, '2023-07-05 05:36:59', '2023-07-05 05:36:59', NULL),
(11, 'blog', 0, 'Blog Category 4', NULL, 'blog-category-4', 1, 1, NULL, '2023-07-07 02:22:41', '2023-07-07 02:22:41', NULL),
(12, 'blog', 0, 'Sports', NULL, 'sports', 1, 1, NULL, '2023-07-25 04:58:50', '2023-07-25 04:58:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `image`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'uploads/all/all-1689423733.png', 'Icon', 1, '2023-07-15 06:52:13', '2023-07-15 06:52:13'),
(2, 'uploads/all/all-1689423809.png', 'Icon', 1, '2023-07-15 06:53:29', '2023-07-15 06:53:29'),
(3, 'uploads/all/all-1689423816.png', 'Icon 2', 1, '2023-07-15 06:53:36', '2023-07-15 06:53:36'),
(4, 'uploads/all/all-1689423823.png', 'Icon 1', 1, '2023-07-15 06:53:43', '2023-07-15 06:53:43'),
(5, 'uploads/all/all-1689423829.png', 'Icon 8', 1, '2023-07-15 06:53:49', '2023-07-15 06:53:49'),
(6, 'uploads/all/all-1689423837.png', 'Icon 7', 1, '2023-07-15 06:53:57', '2023-07-15 06:53:57'),
(7, 'uploads/all/all-1689423914.png', 'Icon 4', 1, '2023-07-15 06:55:14', '2023-07-15 06:55:14'),
(8, 'uploads/all/all-1689423923.png', 'Icon 6', 1, '2023-07-15 06:55:23', '2023-07-15 06:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_banner` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `parent_id`, `title`, `page_url`, `short_description`, `banner_description`, `page_banner`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Home', 'index', NULL, NULL, NULL, 'Home', 'Home', 'Home', 1, 1, NULL, '2023-07-15 03:32:28', '2023-07-15 03:32:28'),
(2, 0, 'About Us', 'about-us', '<p>About Us Short Description</p>', '<h2 class=\"text-light text-capitalize\"><span class=\" display-3 fw-bold \">100+&nbsp;</span>Website Built<br>That Get Result</h2>\r\n<p class=\"text-light pb-3\">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laboriosam suscipit<br>porro a mollitia ipsa maxime iure amet consequuntur.</p>', 'uploads/cms/cms-20231127090014-647.jpg', 'About Us', 'About Us', 'About Us', 1, 1, 1, '2023-07-15 03:32:48', '2023-11-27 03:30:14'),
(3, 0, 'Contact Us', 'contact-us', '<p>Contact Us Short Description</p>', NULL, 'uploads/cms/cms-20231127071638-211.jfif', 'Contact Us', 'Contact Us', 'Contact Us', 1, 1, 1, '2023-07-15 03:33:06', '2023-11-27 01:46:38'),
(4, 0, 'Common', 'common', '<p>Common Short Description</p>', NULL, NULL, 'Common', 'Common', 'Common', 1, 1, 1, '2023-07-24 07:13:14', '2023-08-23 23:22:46'),
(5, 0, 'Case Study', 'case-study', '<p>Case Study short description</p>', NULL, 'uploads/cms/cms-20231124092743-6355.jpg', 'Case Study', 'Case Study', 'Case Study', 1, 1, 1, '2023-08-03 05:22:53', '2023-11-24 03:57:43'),
(6, 0, 'Testimonials', 'testimonial', '<p>Testimonial description</p>', NULL, 'uploads/cms/cms-20231124090355-7165.jpg', 'Testimonials', 'Testimonials', 'Testimonials', 1, 1, 1, '2023-08-03 06:27:38', '2023-11-24 03:33:55'),
(7, 0, 'Our Team', 'team', '<p>Our team short description</p>', NULL, 'uploads/cms/cms-20231121090045-4818.jpg', 'Our Team', 'Our Team', 'Our Team', 1, 1, 1, '2023-08-03 06:39:51', '2023-11-21 03:30:45'),
(8, 0, 'News', 'news', '<p>My Fly Care Is Working Towards A Litter-Free And Greener Environment Through The Production Of Biodegradable Sanitary Napkins. This Sustainable Solution Is Not Only Affordable But Also Enables Women To Effectively Manage Their Menstrual Cycles Without Compromising Their Health And Overall Well-Being news.</p>', NULL, 'uploads/cms/cms-20231121090437-8404.jpg', 'News', 'News', 'News', 1, 1, 1, '2023-08-23 22:11:20', '2023-11-21 03:34:37'),
(9, 0, 'Clients & Partners', 'clients-and-partners', '<p>My Fly Care Is Working Towards A Litter-Free And Greener Environment Through The Production Of Biodegradable Sanitary Napkins. This Sustainable Solution Is Not Only Affordable But Also Enables Women To Effectively Manage Their Menstrual Cycles Without Compromising Their Health And Overall Well-Being. Clients &amp; Partners</p>', NULL, 'uploads/cms/cms-20231122103719-1972.jpg', 'Clients & Partners', 'Clients & Partners', 'Clients & Partners', 1, 1, 1, '2023-08-23 22:25:29', '2023-11-22 05:07:19'),
(10, 0, 'Awards & Certification', 'awards-and-certification', '<p>My Fly Care Is Working Towards A Litter-Free And Greener Environment Through The Production Of Biodegradable Sanitary Napkins. Awards &amp; Certification</p>', NULL, 'uploads/cms/cms-20231122103845-6126.jpg', 'Awards & Certification', 'Awards & Certification', 'Awards & Certification', 1, 1, 1, '2023-08-23 22:28:10', '2023-11-22 05:08:46'),
(11, 0, 'Blogs', 'blogs', '<p>My Fly Care Is Working Towards A Litter-Free And Greener Environment Through The Production Of Biodegradable Sanitary Napkins. Blogs</p>', NULL, 'uploads/cms/cms-20231124104803-956.jpg', 'Blogs', 'Blogs', 'Blogs', 1, 1, 1, '2023-08-23 22:52:02', '2023-11-24 05:18:03'),
(12, 0, 'Career', 'career', '<p>Career</p>', NULL, 'uploads/cms/cms-20231122103647-2168.jpg', 'Career', 'Career', 'Career', 1, 1, 1, '2023-08-23 22:57:31', '2023-11-22 05:06:47'),
(13, 0, 'Our Tips', NULL, '<p>Our Tips</p>', '<p>Our Tips</p>', NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-08-26 02:16:50', '2023-08-26 02:16:50'),
(14, 13, 'For Teenagers', 'for-teenagers', '<p>My Fly Care Is Working Towards A Litter-Free And Greener Environment Through The Production Of Biodegradable Sanitary Napkins. This Sustainable Solution Is Not Only Affordable But Also Enables Women To Effectively Manage Their Menstrual Cycles Without Compromising Their Health And Overall Well-Being. Teen agers</p>', '<p>For Teenagers</p>', 'uploads/cms/cms-20231127070322-3895.jpg', 'For Teenagers', 'For Teenagers', 'For Teenagers', 1, 1, 1, '2023-08-26 02:18:02', '2023-11-27 01:33:22'),
(15, 13, 'FOR ALL OF US', 'for-all-of-us', '<p>My Fly Care Is Working Towards A Litter-Free And Greener Environment Through The Production Of Biodegradable Sanitary Napkins. This Sustainable Solution Is Not Only Affordable But Also Enables Women To Effectively Manage Their Menstrual Cycles Without Compromising Their Health And Overall Well-Being.</p>', NULL, 'uploads/cms/cms-20230826080043-3849.jpg', 'FOR ALL OF US', 'FOR ALL OF US', 'FOR ALL OF US', 1, 1, NULL, '2023-08-26 02:30:43', '2023-08-26 02:30:43'),
(16, 13, 'IN MENOPAUSE', 'in-menopause', '<p>My Fly Care Is Working Towards A Litter-Free And Greener Environment Through The Production Of Biodegradable Sanitary Napkins. This Sustainable Solution Is Not Only Affordable But Also Enables Women To Effectively Manage Their Menstrual Cycles Without Compromising Their Health And Overall Well-Being.</p>', NULL, 'uploads/cms/cms-20231124102721-6152.jpg', 'IN MENOPAUSE', 'IN MENOPAUSE', 'IN MENOPAUSE', 1, 1, 1, '2023-08-26 02:32:45', '2023-11-24 04:57:21'),
(17, 0, 'Product Portfolio', 'product-portfolio', '<p>My Fly Care Is Working Towards A Litter-Free And Greener Environment Through The Production Of Biodegradable Sanitary Napkins. This Sustainable Solution Is Not Only Affordable But Also Enables Women To Effectively Manage Their Menstrual Cycles Without Compromising Their Health And Overall Well-Being.</p>', NULL, 'uploads/cms/cms-20231124091409-955.jpg', 'Product Portfolio', 'Product Portfolio', 'Product Portfolio', 1, 1, 1, '2023-08-31 23:29:26', '2023-11-24 03:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Eswatini'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `customer_leads`
--

CREATE TABLE `customer_leads` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(11) NOT NULL,
  `faq_type` int(11) DEFAULT NULL,
  `faq_category` int(11) DEFAULT NULL,
  `question` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_type`, `faq_category`, `question`, `answer`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 'How Do I Ensure That My Business Stays Ahead Of My Competition In Online Visibility ?', '<p>Our mission is to exceed the expectations of our Partners and maintain the highest respect in our industry by providing customized, responsive, and on-time services that add value to our Sponsor efforts to discover, develop, and enhance products in regulated international environments. We excel as a high performance, high quality organization because of our scientific knowledge and experience, integrity, trust, teamwork, and dedication to strong and enduring Sponsor relationships to our clients in the pharmaceutical, biotechnology, and medical device industries by providing high-quality consulting, solutions and services for the development of life science products.</p>', 1, '2023-07-22 05:26:54', '2023-08-19 11:47:16', NULL),
(2, 1, 0, 'Do We Need To Meet In Person?', '<div class=\"accordion-item  bg-light-green rounded overflow-hidden py-0 mb-2 mt-1 px-2\">\r\n<div id=\"collapse2e\" class=\"accordion-collapse px-2 collapse show\" data-bs-parent=\"#vsaccordion\">\r\n<div class=\"accordion-body px-0\">\r\n<p class=\"h-150 overflow-y scrollbar-width mb-0\">Our vision is to continuously strive to raise the standard of excellence through accuracy, efficiency, and innovation in the pharmaceutical industry to simplify business challenges, maximize human potential to deliver high quality output to get our client&rsquo;s drug or medical product approved faster and to contribute to a safer and better world.</p>\r\n</div>\r\n</div>\r\n</div>', 1, '2023-07-22 05:27:30', '2023-08-19 11:47:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq_categories`
--

CREATE TABLE `faq_categories` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0-Common,1-Product,2-Service',
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_categories`
--

INSERT INTO `faq_categories` (`id`, `type`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'General Enquiry', 1, '2023-07-22 03:40:26', '2023-08-19 11:47:42'),
(2, 0, 'Shared Hosting', 1, '2023-07-22 03:41:24', '2023-08-19 11:47:45'),
(3, 0, 'VPS Hosting', 1, '2023-07-22 03:42:01', '2023-08-19 11:47:50'),
(4, 2, 'General Enquiry', 1, '2023-07-27 00:37:10', '2023-07-27 00:37:10'),
(5, 2, 'Shared Hosting', 1, '2023-07-27 00:37:24', '2023-07-27 00:37:24'),
(6, 2, 'VPS Hosting', 1, '2023-07-27 00:37:36', '2023-07-27 00:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `category_id`, `description`, `image`, `icon`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 1, '<h6><span style=\"color: rgb(236, 240, 241);\">Data Center ie Fullful Needs</span></h6>\r\n<h2><span style=\"color: rgb(236, 240, 241);\">Enterprise</span> <span style=\"color: rgb(248, 85, 8);\">Hosting</span></h2>\r\n<p><span style=\"color: rgb(236, 240, 241);\">Cheap dedicated server in india... Best platform to buy un-managed, cloud linux, highly scalable, secured, high speed performance provider. Cost effective and more reliable Linux dedicated server in India.</span></p>', 'uploads/all/all-20231114120035-332.jpg', NULL, 1, 1, 1, '2023-07-11 05:55:17', '2023-11-14 06:30:35', NULL),
(8, 1, '<h6>&nbsp;</h6>\r\n<p>&nbsp;</p>', 'uploads/all/all-20231114115222-7431.jpg', NULL, 1, 1, 1, '2023-07-11 06:00:08', '2023-11-14 06:46:03', NULL),
(9, 1, '<h6><span style=\"color: rgb(236, 240, 241);\">Data Center ie Fullful Needs.</span></h6>\r\n<h2><span style=\"color: rgb(236, 240, 241);\">Hosting</span> <span style=\"color: rgb(248, 85, 8);\">Solutions</span></h2>\r\n<p><span style=\"color: rgb(236, 240, 241);\">Cheap dedicated server in india... Best platform to buy un-managed, cloud linux, highly scalable, secured, high speed performance provider. Cost effective and more reliable Linux dedicated server in India.</span></p>', 'uploads/all/all-20230805075958-4625.png', NULL, 2, 1, 1, '2023-07-11 06:01:31', '2023-08-22 03:28:05', '2023-08-22 03:28:05'),
(10, 3, '<p>NA</p>', 'uploads/all/all-1689940183.png', NULL, 1, 1, NULL, '2023-07-21 06:19:43', '2023-07-21 06:19:43', NULL),
(11, 3, '<p>NA</p>', 'uploads/all/all-1689940218.jpg', NULL, 1, 1, NULL, '2023-07-21 06:20:19', '2023-07-21 06:20:19', NULL),
(12, 3, '<p>NA</p>', 'uploads/all/all-1689940232.jpg', NULL, 1, 1, NULL, '2023-07-21 06:20:32', '2023-07-21 06:20:32', NULL),
(13, 4, '<p>a</p>', 'uploads/all/all-1689943849.jpg', NULL, 1, 1, NULL, '2023-07-21 07:20:49', '2023-07-21 07:20:49', NULL),
(14, 4, '<p>a</p>', 'uploads/all/all-1689943862.jpg', NULL, 1, 1, NULL, '2023-07-21 07:21:02', '2023-07-21 07:21:02', NULL),
(15, 4, '<p>a</p>', 'uploads/all/all-1689943871.jpg', NULL, 1, 1, NULL, '2023-07-21 07:21:11', '2023-07-21 07:21:11', NULL),
(16, 4, '<p>a</p>', 'uploads/all/all-1689943881.jpg', NULL, 1, 1, NULL, '2023-07-21 07:21:21', '2023-07-21 07:21:21', NULL),
(17, 5, '<p>a</p>', 'uploads/all/all-1689943894.png', NULL, 1, 1, NULL, '2023-07-21 07:21:34', '2023-07-21 07:21:34', NULL),
(18, 5, '<p>a</p>', 'uploads/all/all-1689943909.png', NULL, 1, 1, NULL, '2023-07-21 07:21:49', '2023-07-21 07:21:49', NULL),
(19, 1, '<h6 dir=\"ltr\"><span style=\"color: rgb(249, 119, 57);\"><s>Cut off</s></span> Your cloud cost</h6>\r\n<h3 dir=\"ltr\">without compromising on the quality of infrastructure</h3>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"color: rgb(236, 240, 241);\">NVMe SSD Hight IOPS Drives</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"color: rgb(236, 240, 241);\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"color: rgb(236, 240, 241);\">Latest AMD and intel Based Processor</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"color: rgb(236, 240, 241);\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"color: rgb(236, 240, 241);\">10G internetwork connectivity</span></p>\r\n</li>\r\n<li dir=\"ltr\" style=\"color: rgb(236, 240, 241);\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\"><span style=\"color: rgb(236, 240, 241);\">Secured with NextGen Firewall</span></p>\r\n</li>\r\n</ul>', 'uploads/all/all-20231114115713-1453.jpg', NULL, 2, 1, 1, '2023-07-25 05:43:50', '2023-11-14 06:27:13', NULL),
(20, 3, '<p>partner</p>', 'uploads/all/all-20230801105621-8646.png', NULL, 1, 1, NULL, '2023-08-01 05:26:21', '2023-08-01 05:26:21', NULL),
(21, 3, '<p>partner</p>', 'uploads/all/all-20230801105633-4890.jpg', NULL, 1, 1, NULL, '2023-08-01 05:26:33', '2023-08-01 05:26:33', NULL),
(22, 3, '<p>partner</p>', 'uploads/all/all-20230801105657-4113.jpg', NULL, 1, 1, NULL, '2023-08-01 05:26:57', '2023-08-01 05:26:57', NULL),
(23, 3, '<p>partner</p>', 'uploads/all/all-20230801105709-613.png', NULL, 1, 1, NULL, '2023-08-01 05:27:09', '2023-08-01 05:27:09', NULL),
(24, 3, '<p>partner</p>', 'uploads/all/all-20230801105721-5111.png', NULL, 1, 1, NULL, '2023-08-01 05:27:21', '2023-08-01 05:27:21', NULL),
(25, 3, '<p>partner</p>', 'uploads/all/all-20230801105736-8937.jpg', NULL, 1, 1, NULL, '2023-08-01 05:27:36', '2023-08-01 05:27:36', NULL),
(26, 3, '<p>Partner</p>', 'uploads/all/all-20230801110030-1411.png', NULL, 1, 1, NULL, '2023-08-01 05:30:30', '2023-08-01 05:30:30', NULL),
(27, 3, '<p>Partner</p>', 'uploads/all/all-20230801110044-1857.jpg', NULL, 1, 1, NULL, '2023-08-01 05:30:44', '2023-08-01 05:30:44', NULL),
(28, 3, '<p>Partner</p>', 'uploads/all/all-20230801110100-9382.jpg', NULL, 1, 1, NULL, '2023-08-01 05:31:00', '2023-08-01 05:31:00', NULL),
(29, 3, '<p>Partner</p>', 'uploads/all/all-20230801110113-569.png', NULL, 1, 1, NULL, '2023-08-01 05:31:13', '2023-08-01 05:31:13', NULL),
(30, 3, '<p>Partner</p>', 'uploads/all/all-20230801110142-7675.png', NULL, 1, 1, NULL, '2023-08-01 05:31:42', '2023-08-01 05:31:42', NULL),
(31, 3, '<p>Partner</p>', 'uploads/all/all-20230801110153-50.jpg', NULL, 1, 1, NULL, '2023-08-01 05:31:53', '2023-08-01 05:31:53', NULL),
(32, 4, '<p>Clients</p>', 'uploads/all/all-20230801110236-8066.jpg', NULL, 1, 1, NULL, '2023-08-01 05:32:36', '2023-08-01 05:32:36', NULL),
(33, 4, '<p>Clients</p>', 'uploads/all/all-20230801110247-7521.jpg', NULL, 1, 1, NULL, '2023-08-01 05:32:47', '2023-08-01 05:32:47', NULL),
(34, 4, '<p>Clients</p>', 'uploads/all/all-20230801110258-6212.png', NULL, 1, 1, NULL, '2023-08-01 05:32:58', '2023-08-01 05:32:58', NULL),
(35, 3, '<p>Clients</p>', 'uploads/all/all-20230801110310-155.png', NULL, 1, 1, NULL, '2023-08-01 05:33:10', '2023-08-01 05:33:10', NULL),
(36, 4, '<p>Clients</p>', 'uploads/all/all-20230801110323-4617.jpg', NULL, 1, 1, NULL, '2023-08-01 05:33:23', '2023-08-01 05:33:23', NULL),
(37, 4, '<p>Clients</p>', 'uploads/all/all-20230801110338-3573.png', NULL, 1, 1, NULL, '2023-08-01 05:33:39', '2023-08-01 05:33:39', NULL),
(38, 3, '<p>Clients</p>', 'uploads/all/all-20230801110352-3052.jpg', NULL, 1, 1, NULL, '2023-08-01 05:33:52', '2023-08-09 03:08:52', '2023-08-09 03:08:52'),
(39, 4, '<p>Clients</p>', 'uploads/all/all-20230801110442-2148.jpg', NULL, 1, 1, NULL, '2023-08-01 05:34:42', '2023-08-01 05:34:42', NULL),
(40, 4, '<p>Clients</p>', 'uploads/all/all-20230801110455-79.png', NULL, 1, 1, NULL, '2023-08-01 05:34:55', '2023-08-01 05:34:55', NULL),
(41, 4, '<p>Clients</p>', 'uploads/all/all-20230801110506-2057.png', NULL, 1, 1, NULL, '2023-08-01 05:35:06', '2023-08-01 05:35:06', NULL),
(42, 4, '<p>Clients</p>', 'uploads/all/all-20230801110529-4529.jpg', NULL, 1, 1, NULL, '2023-08-01 05:35:29', '2023-08-01 05:35:29', NULL),
(43, 4, '<p>Clients</p>', 'uploads/all/all-20230801110539-5226.jpg', NULL, 1, 1, NULL, '2023-08-01 05:35:39', '2023-08-01 05:35:39', NULL),
(44, 4, '<p>Clients</p>', 'uploads/all/all-20230801110554-2791.png', NULL, 1, 1, NULL, '2023-08-01 05:35:54', '2023-08-01 05:35:54', NULL),
(45, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801110634-7621.png', NULL, 1, 1, NULL, '2023-08-01 05:36:34', '2023-08-01 05:36:34', NULL),
(46, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801110720-2665.jpg', NULL, 1, 1, NULL, '2023-08-01 05:37:20', '2023-08-01 05:37:20', NULL),
(47, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801110732-2162.jpg', NULL, 1, 1, NULL, '2023-08-01 05:37:32', '2023-08-01 05:37:32', NULL),
(48, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801110745-8612.png', NULL, 1, 1, NULL, '2023-08-01 05:37:45', '2023-08-01 05:37:45', NULL),
(49, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801110838-7906.png', NULL, 1, 1, NULL, '2023-08-01 05:38:38', '2023-08-01 05:38:38', NULL),
(50, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801110851-2787.png', NULL, 1, 1, NULL, '2023-08-01 05:38:51', '2023-08-01 05:38:51', NULL),
(51, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801110901-6222.png', NULL, 1, 1, NULL, '2023-08-01 05:39:01', '2023-08-01 05:39:01', NULL),
(52, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801110912-682.jpg', NULL, 1, 1, NULL, '2023-08-01 05:39:12', '2023-08-01 05:39:12', NULL),
(53, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801110935-5754.jpg', NULL, 1, 1, NULL, '2023-08-01 05:39:35', '2023-08-01 05:39:35', NULL),
(54, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801110949-1149.png', NULL, 1, 1, NULL, '2023-08-01 05:39:49', '2023-08-01 05:39:49', NULL),
(55, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801111002-6100.jpg', NULL, 1, 1, NULL, '2023-08-01 05:40:02', '2023-08-01 05:40:02', NULL),
(56, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801111016-5464.png', NULL, 1, 1, NULL, '2023-08-01 05:40:16', '2023-08-01 05:40:16', NULL),
(57, 5, '<p>Affiliations</p>', 'uploads/all/all-20230801111042-1209.jpg', NULL, 1, 1, NULL, '2023-08-01 05:40:42', '2023-08-01 05:40:42', NULL),
(58, 6, '<p>Awards</p>', 'uploads/all/all-20230804085615-6558.png', NULL, 1, 1, NULL, '2023-08-04 03:26:15', '2023-08-04 03:26:15', NULL),
(59, 6, '<p>Awards</p>', 'uploads/all/all-20230804085622-4624.png', NULL, 1, 1, NULL, '2023-08-04 03:26:22', '2023-08-04 03:26:22', NULL),
(60, 6, '<p>Awards</p>', 'uploads/all/all-20230804085627-6139.png', NULL, 1, 1, NULL, '2023-08-04 03:26:27', '2023-08-04 03:26:27', NULL),
(61, 7, '<p>Certificate</p>', 'uploads/all/all-20231122072156-5118.png', NULL, 1, 1, 1, '2023-08-04 03:26:58', '2023-11-22 01:51:56', NULL),
(62, 7, '<p>Certificate</p>', 'uploads/all/all-20230804085706-4652.png', NULL, 1, 1, NULL, '2023-08-04 03:27:06', '2023-08-09 03:29:02', '2023-08-09 03:29:02'),
(63, 7, '<p>Certificate</p>\r\n<p>&nbsp;</p>', 'uploads/all/all-20231122073205-256.png', NULL, 1, 1, 1, '2023-08-04 03:27:27', '2023-11-22 02:38:23', NULL),
(64, 7, '<p>Certificate</p>', 'uploads/all/all-20231122080604-2434.png', NULL, 1, 1, 1, '2023-08-04 03:27:37', '2023-11-22 02:36:04', NULL),
(65, 1, '<h4 dir=\"ltr\">&nbsp;</h4>\r\n<p>&nbsp;</p>', 'uploads/all/all-20231114115425-3473.jpg', NULL, 1, 1, 1, '2023-08-05 01:10:45', '2023-11-14 06:43:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image_categories`
--

CREATE TABLE `image_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_categories`
--

INSERT INTO `image_categories` (`id`, `parent_id`, `title`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Home Banners', 1, 1, 1, '2023-05-02 03:33:26', '2023-06-19 00:50:00', NULL),
(2, 0, 'Gallery', 1, 1, NULL, '2023-06-13 03:31:10', '2023-06-13 03:31:10', NULL),
(3, 0, 'Partners', 1, 1, NULL, '2023-07-21 05:58:05', '2023-07-21 05:58:05', NULL),
(4, 0, 'Clients', 1, 1, NULL, '2023-07-21 05:58:15', '2023-07-21 05:58:15', NULL),
(5, 0, 'Affiliations', 1, 1, NULL, '2023-07-21 05:58:27', '2023-07-21 05:58:27', NULL),
(6, 0, 'Awards', 1, 1, NULL, '2023-08-04 03:24:18', '2023-08-04 03:24:18', NULL),
(7, 0, 'Certificate', 1, 1, NULL, '2023-08-04 03:24:31', '2023-08-04 03:24:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `industry_cms_pages`
--

CREATE TABLE `industry_cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `industry_cms_pages`
--

INSERT INTO `industry_cms_pages` (`id`, `parent_id`, `title`, `page_url`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Industries', 'industries', 'Industries', 'Industries', 'Industries', 1, 1, 1, '2023-08-07 05:53:26', '2023-08-07 06:00:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `industry_page_sections`
--

CREATE TABLE `industry_page_sections` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `section_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `industry_page_sections`
--

INSERT INTO `industry_page_sections` (`id`, `page_id`, `section_name`, `title`, `description`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'industry_best_support', 'Industry\'s Best Support', '<p>We are an award-winning web hosting provider based in India. Since our establishment in 2012, we have focused on offering customers reliable and super-fast hosting services to customers worldwide.</p>', 'uploads/cms/cms-20230807112651-2434.png', 1, 1, NULL, '2023-08-07 05:56:51', '2023-08-07 06:05:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `industry_section_datas`
--

CREATE TABLE `industry_section_datas` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_number` int(3) NOT NULL DEFAULT 1,
  `other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `industry_section_datas`
--

INSERT INTO `industry_section_datas` (`id`, `page_id`, `section_id`, `title`, `description`, `img`, `order_number`, `other`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Business Owners', '<p>We have been in the hosting business since 2012. We have served 40000+ clients worldwide. With over a decade</p>', 'uploads/cms/cms-20230807113645-9039.png', 1, NULL, 1, 1, 1, '2023-08-07 05:57:30', '2023-08-07 06:06:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_enquiries`
--

CREATE TABLE `job_enquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resume` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employment_type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job_enquiries`
--

INSERT INTO `job_enquiries` (`id`, `name`, `phone`, `email`, `skype`, `gender`, `resume`, `message`, `city`, `state`, `address`, `post`, `employment_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vikash Kumar', '8825171386', 'sagarbaazar@gmail.com', NULL, NULL, 'uploads/resume/resume-20230826072433-1392.docx', 'sdvvvvvvvvvvvvvv', 'Katihar', 'bihar', 'Purnia Bihar', 'Management (Director)', 'Management (Director)', 1, '2023-08-26 01:54:33', '2023-08-26 01:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `master_designations`
--

CREATE TABLE `master_designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_designations`
--

INSERT INTO `master_designations` (`id`, `name`, `body`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'HOD', '', 1, 1, NULL, '2023-03-14 15:41:42', '2023-03-16 18:11:02'),
(2, 'User', NULL, 1, 1, NULL, '2023-03-27 02:03:10', '2023-03-29 11:29:21'),
(3, 'Test', NULL, 1, 1, NULL, '2023-03-31 23:49:18', '2023-03-31 23:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `master_partners`
--

CREATE TABLE `master_partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_fields` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_partners`
--

INSERT INTO `master_partners` (`id`, `parent_id`, `title`, `slug`, `icon`, `banner`, `other_icon`, `page_url`, `image`, `short_description`, `table_fields`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'Partner + Program', 'partner-program', 'uploads/cms/cms-20230805115037-6683.png', 'uploads/cms/cms-20230805115037-405.webp', 'NA', NULL, NULL, '<p>NA</p>', '[\"NA\"]', 'Partner + Program', 'Partner + Program', 'Partner + Program', 1, 1, 1, '2023-08-05 06:20:37', '2023-08-05 06:21:10', NULL),
(2, 0, 'Testing', 'testing', 'uploads/cms/cms-20230809083947-3358.png', 'uploads/cms/cms-20230809083947-9736.webp', NULL, NULL, 'uploads/cms/cms-20230809083947-7849.png', '<p>Testing</p>', '[\"NA\"]', 'Testing', 'Testing', 'Testing', 1, 1, NULL, '2023-08-09 03:09:47', '2023-08-09 03:09:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_products`
--

CREATE TABLE `master_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order_no` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_fields` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_products`
--

INSERT INTO `master_products` (`id`, `parent_id`, `order_no`, `title`, `slug`, `icon`, `banner`, `other_icon`, `page_url`, `image`, `short_description`, `table_fields`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, NULL, 'Private Cloud', 'private-cloud', 'uploads/cms/cms-1690198532.png', 'uploads/cms/cms-20230805120847-1786.png', '<i class=\"bi bi-cloud-arrow-down fs-14 text-black fa-sharp fa-solid\"></i>', NULL, 'uploads/cms/cms-1690215108.jpg', NULL, '[\"test\"]', 'Private Cloud', 'Private Cloud', 'Private Cloud', 2, 1, 1, '2023-07-18 05:09:54', '2023-08-06 00:51:46', NULL),
(2, 0, NULL, 'Bare-Metal Server', 'bare-metal-server', 'uploads/cms/cms-1690215615.png', 'uploads/cms/cms-1689927619.png', '<i class=\"bi bi-pc-display-horizontal fs-14 text-black fa-sharp fa-solid\"></i>', 'bare-metal-server', 'uploads/cms/cms-1690215453.png', '<h6 class=\"fs-16 mt-3 mb-2 fw-bold text-capitalize text-sky  lsp-5px white-space\">Bare-Metal Server</h6>\r\n<p class=\"\">The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy.</p>', '[\"Processor\",\"Total Core\",\"RAM DDR4\",\"SSD\\/NVMe\",\"Raid Type\",\"Network Port\"]', 'Bare-Metal Server', 'Bare-Metal Server', 'Bare-Metal Server', 2, 1, 1, '2023-07-21 02:50:19', '2023-08-06 00:50:31', NULL),
(3, 0, NULL, 'Cloud Server', 'cloud-server', 'uploads/cms/cms-1690215834.png', 'uploads/cms/cms-1689928221.png', '<i class=\"bi bi-cloud-check fs-14 text-black fa-sharp fa-solid\"></i>', NULL, 'uploads/cms/cms-1690215694.png', '<h6 class=\"fs-16 mt-3 mb-2 fw-bold text-capitalize text-sky  lsp-5px white-space\">Cloud Server</h6>\r\n<p class=\"\">The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy.</p>', '[\"CPU\"]', 'Cloud Server', 'Cloud Server', 'Cloud Server', 2, 1, 1, '2023-07-21 03:00:21', '2023-08-06 00:50:17', NULL),
(4, 0, NULL, 'Storage & Backup', 'storage-backup', 'uploads/cms/cms-1690215819.png', 'uploads/cms/cms-1689928313.png', '<i class=\"bi bi-cloud-plus fs-14 text-black fa-sharp fa-solid\"></i>', NULL, 'uploads/cms/cms-20230805111737-5916.png', '<h6 class=\"fs-16 mt-3 mb-2 fw-bold text-capitalize text-sky  lsp-5px white-space\">Storage &amp; Backup</h6>\r\n<p class=\"\">The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy.</p>', '[\"Processor\",\"Total Core\",\"RAM DDR4\",\"SSD\\/NVMe\",\"Raid Type\",\"Network Port\"]', 'Storage & Backup', 'Storage & Backup', 'Storage & Backup', 2, 1, 1, '2023-07-21 03:01:53', '2023-08-06 00:49:25', NULL),
(5, 0, NULL, 'VPS Hosting', 'vps-hosting', 'uploads/cms/cms-1690216091.png', 'uploads/cms/cms-20230805070048-226.png', '<i class=\"bi bi-globe-americas fs-14 text-black fa-sharp fa-solid\"></i>', NULL, 'uploads/cms/cms-1690784456.jpeg', '<p dir=\"ltr\">Our VPS hosting infrastructure is powered by the latest hardware and software. We use SSD drives for fast performance and offer a variety of CPU and RAM options to meet your needs. Our servers are located in different - different data centers.</p>', '[\"S.No.\",\"Processor\",\"Total Core\",\"RAM DDR4\",\"SSD\\/NVMe\",\"Raid Type\",\"Network Port\",\"Price \\/ Month\"]', 'VPS Hosting', 'VPS Hosting', 'VPS Hosting', 2, 1, 1, '2023-07-21 03:02:48', '2023-08-06 00:48:52', NULL),
(6, 0, NULL, 'Networking', 'networking', 'uploads/cms/cms-1690216074.png', 'uploads/cms/cms-1689928415.png', '<i class=\"bi bi-card-image fs-14 text-black fa-sharp fa-solid\"></i>', NULL, 'uploads/cms/cms-1690215914.png', '<h6 class=\"fs-16 mt-3 mb-2 fw-bold text-capitalize text-sky  lsp-5px white-space\">Networking</h6>\r\n<p class=\"\">The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy.</p>', '[\"CPU\",\"Ram\",\"Storage\",\"Network\",\"Location\"]', 'Networking', 'Networking', 'Networking', 2, 1, 1, '2023-07-21 03:03:35', '2023-08-06 00:32:29', NULL),
(7, 1, NULL, 'Microsoft Hyper-V Test', 'microsoft-hyper-v', 'uploads/cms/cms-1689929271.png', 'uploads/cms/cms-1689928587.png', NULL, NULL, NULL, NULL, '[\"test\"]', 'Microsoft Hyper-V', 'Microsoft Hyper-V', 'Microsoft Hyper-V', 2, 1, 1, '2023-07-21 03:06:27', '2023-08-05 02:40:00', NULL),
(8, 1, NULL, 'Vmware  Private cloud', 'vmware-private-cloud', 'uploads/cms/cms-1689932123.png', 'uploads/cms/cms-1689932112.png', NULL, NULL, NULL, NULL, '[\"10\"]', 'Vmware  Private cloud', 'Vmware  Private cloud', 'Vmware  Private cloud', 2, 1, 1, '2023-07-21 04:05:12', '2023-08-06 00:48:08', NULL),
(9, 1, NULL, 'Openstack Private cloud', 'openstack-private-cloud', 'uploads/cms/cms-1689932637.png', 'uploads/cms/cms-1689932626.png', NULL, NULL, NULL, NULL, '[\"Swap\"]', 'Openstack Private cloud', 'Openstack Private cloud', 'Openstack Private cloud', 2, 1, 1, '2023-07-21 04:13:46', '2023-08-06 00:29:59', NULL),
(10, 0, NULL, 'Cloud Servers', 'cloud-servers', 'uploads/cms/cms-1690623341.png', 'uploads/cms/cms-1690623341.jpeg', NULL, 'cloud-servers', 'uploads/cms/cms-1690623341.png', '<p>A Private Cloud is a model of cloud computing where the infrastructure is dedicated to a single-user organization.</p>', '[\"CPU\",\"Ram\",\"Storage\",\"Network\",\"Location\"]', 'Cloud Servers', 'Cloud Servers', 'Cloud Servers', 2, 1, 1, '2023-07-25 05:14:18', '2023-07-31 05:31:32', NULL),
(11, 2, NULL, 'Windows Dedicated Server', 'windows-dedicated-sercer', 'uploads/cms/cms-1690798594.png', 'uploads/cms/cms-1690798594.webp', NULL, 'windows', 'uploads/cms/cms-1690798594.png', '<p class=\"mb-0\">A Private Cloud is a model of cloud computing where the infrastructure is dedicated to a single user organization. A private cloud can be hosted either at an organization&rsquo;s own data center, at a third-party colocation facility, or via a private cloud provider who offers private cloud hosting services and may or may not also offer traditional public shared multi-tenant cloud infrastructure. Typically, the end-user organization is responsible for the operation of a private cloud as if it were a traditional on-premises infrastructure, which includes ongoing maintenance, upgrades, OS patches, middleware, and application software management. Private Cloud Solutions offer organizations more control over and better security of private cloud servers, although it does require a much higher level of IT expertise than utilizing a public cloud.</p>\r\n<h3 class=\"fs-18 fw-bold my-2\">Why use Private Clouds?</h3>\r\n<p>Private Clouds offer the same control and security as traditional on-premises infrastructure. Here are some reasons why organizations opt for private cloud computing:</p>', '[\"CPU\",\"Ram\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-25 05:15:35', '2023-08-06 00:26:23', NULL),
(12, 0, NULL, 'ngfng', 'ngfng', NULL, NULL, 'ngfngf', NULL, NULL, '<p>gvcnfg</p>', '[\"CPU\",\"Ram\",\"test\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-27 06:59:54', '2023-07-31 03:11:50', NULL),
(13, 2, NULL, 'Linux Dedicated Server', 'windows-bare-metal', 'uploads/cms/cms-1690798711.png', 'uploads/cms/cms-1690798711.webp', NULL, NULL, 'uploads/cms/cms-1690798711.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"Cpu\",\"Ram\"]', 'Windows Bare Metal', 'Windows Bare Metal', 'Windows Bare Metal', 2, 1, 1, '2023-07-29 05:24:38', '2023-08-06 00:26:12', NULL),
(14, 4, NULL, 'Object Storage', 'storage', 'uploads/cms/cms-1690799713.png', 'uploads/cms/cms-1690799713.webp', NULL, 'Storage', 'uploads/cms/cms-1690799713.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"CPU\",\"Ram\"]', 'Storage', 'Storage', 'Storage', 2, 1, 1, '2023-07-29 05:26:03', '2023-08-06 00:26:00', NULL),
(15, 0, NULL, 'VPS Hosting Testing 30 Jul', 'vps-hosting-testing-30-jul', 'uploads/cms/cms-1690781637.png', NULL, NULL, NULL, 'uploads/cms/cms-1690781637.png', '<h1 dir=\"ltr\">Unleash the Power of VPS Hosting</h1>\r\n<p dir=\"ltr\">VPS hosting is a type of web hosting that gives you more control over your server environment than shared hosting.</p>\r\n<p dir=\"ltr\">Experience the power of a powerful VPS server at a competitive price.</p>\r\n<p dir=\"ltr\">More control, more flexibility, and more scalability.</p>\r\n<p dir=\"ltr\">Sign up today and start growing your business.</p>\r\n<h2 dir=\"ltr\">Advantages of using Cloudware&rsquo;s VPS Hosting Service</h2>\r\n<p dir=\"ltr\">Our VPS Server hosting offers numerous benefits, some are as follows:</p>\r\n<p dir=\"ltr\">Unlimited bandwidth: With Cloudware VPS, you get unlimited bandwidth, so you can worry less about how much data your website or application is using.</p>\r\n<p dir=\"ltr\">99.9% uptime guarantee: Cloudware VPS guarantees 99.9% uptime, so you can be confident that your website or application will be up and running when your users need it.</p>\r\n<p dir=\"ltr\">24/7 support: We offer 24/7 technical support to solve all kinds of technical issues and your queries. So you can get help whenever you need it.</p>\r\n<h2 dir=\"ltr\">Our VPS Hosting Infrastructure</h2>\r\n<p dir=\"ltr\">Our VPS hosting infrastructure is powered by the latest hardware and software. We use SSD drives for fast performance and offer a variety of CPU and RAM options to meet your needs. Our servers are located in different - different data centers, so your website will be available to your users no matter where they are.</p>', '[\"Processor\",\"Total Core\",\"RAM DDR4\",\"SSD\\/NVMe\",\"Raid Type\",\"Network Port\",\"Price \\/ Month\"]', NULL, 'Unleash the Power of VPS Hosting', 'Unleash the Power of VPS Hosting', 2, 1, 1, '2023-07-31 00:03:57', '2023-07-31 03:14:13', NULL),
(16, 5, NULL, 'Managed VPS Hosting', 'managed-vps-hosting', 'uploads/cms/cms-1690799879.png', 'uploads/cms/cms-1690799879.webp', NULL, NULL, 'uploads/cms/cms-1690783954.png', '<h2 dir=\"ltr\">Our VPS Hosting Infrastructure</h2>\r\n<p dir=\"ltr\">Our VPS hosting infrastructure is powered by the latest hardware and software. We use SSD drives for fast performance and offer a variety of CPU and RAM options to meet your needs. Our servers are located in different - different data centers, so your website will be available to your users no matter where they are.</p>\r\n<p>&nbsp;</p>', '[\"S.No.\",\"Processor\",\"Total Core\",\"RAM DDR4\",\"SSD\\/NVMe\",\"Raid Type\",\"Network Port\",\"Price \\/ Month\"]', 'Managed VPS Hosting', 'Managed VPS Hosting', 'Managed VPS Hosting', 2, 1, 1, '2023-07-31 00:42:34', '2023-08-06 00:25:47', NULL),
(17, 0, NULL, 'GPU Server', 'gpu-server', 'uploads/cms/cms-1690785342.png', NULL, NULL, NULL, 'uploads/cms/cms-1690785342.png', '<p dir=\"ltr\">Our VPS hosting infrastructure is powered by the latest hardware and software. We use SSD drives for fast performance and offer a variety of CPU and RAM options to meet your needs.</p>', '[\"GPU Modal\",\"GPU Specifications\",\"Processor\",\"Total Core\",\"RAM DDR4\",\"SSD\\/NVMe\",\"Raid Type\",\"Network Port\"]', NULL, 'GPU Server', 'GPU Server', 2, 1, 1, '2023-07-31 01:05:42', '2023-07-31 05:32:07', NULL),
(18, 6, NULL, 'Cloud Firewall', 'cloud-firewall', 'uploads/cms/cms-1690797385.png', 'uploads/cms/cms-1690803565.webp', NULL, 'Cloud Firewall', NULL, '<p>Testing</p>', '[\"CPU\",\"Storage\",\"Ram\",\"Network\",\"Location\"]', 'Cloud Firewall', 'Cloud Firewall', 'Cloud Firewall', 2, 1, 1, '2023-07-31 04:26:25', '2023-08-06 00:24:46', NULL),
(19, 3, NULL, 'General Purpose', 'general-purpose', 'uploads/cms/cms-1690797893.png', 'uploads/cms/cms-1690797893.webp', NULL, 'General-Purpose', NULL, '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\",\"ram\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 04:34:53', '2023-08-06 00:24:31', NULL),
(20, 3, NULL, 'CPU Optimized', 'cpu-optimized', 'uploads/cms/cms-1690798261.png', 'uploads/cms/cms-1690798099.webp', NULL, 'CPU-Optimized', 'uploads/cms/cms-1690798099.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\",\"ram\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 04:38:19', '2023-08-06 00:24:14', NULL),
(21, 3, NULL, 'Memory Optimized', 'memory-optimized', 'uploads/cms/cms-1690798249.png', 'uploads/cms/cms-1690798216.webp', NULL, 'Memory-Optimized', 'uploads/cms/cms-1690798216.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\",\"ram\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 04:40:16', '2023-08-06 00:24:02', NULL),
(22, 3, NULL, 'Storage Optimized', 'storage-optimized', 'uploads/cms/cms-1690798348.png', 'uploads/cms/cms-1690798348.webp', NULL, 'Storage-Optimized', 'uploads/cms/cms-1690798348.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\",\"ram\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 04:42:28', '2023-08-06 00:23:16', NULL),
(23, 3, NULL, 'GPU Server', 'gpu-server-2', 'uploads/cms/cms-1690799082.png', 'uploads/cms/cms-1690799082.webp', NULL, 'GPU-Server', 'uploads/cms/cms-1690799082.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 04:54:42', '2023-08-06 00:23:06', NULL),
(24, 2, NULL, 'Clustered Server(HA)', 'clustered-serverha', 'uploads/cms/cms-1690799174.png', 'uploads/cms/cms-1690799174.webp', NULL, 'Clustered-Server(HA)', 'uploads/cms/cms-1690799174.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 04:56:14', '2023-08-06 00:22:48', NULL),
(25, 2, NULL, 'Database Dedicated Server', 'database-dedicated-server', 'uploads/cms/cms-1690799291.png', 'uploads/cms/cms-1690799291.webp', NULL, 'Database-Dedicated-Server', 'uploads/cms/cms-1690799291.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 04:58:11', '2023-08-06 00:22:57', NULL),
(26, 1, NULL, 'Apache Cloudstick', 'apache-cloudstick', 'uploads/cms/cms-1690799415.png', 'uploads/cms/cms-1690799415.webp', NULL, 'Apache-Cloudstick', 'uploads/cms/cms-1690799415.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 05:00:15', '2023-08-06 00:22:22', NULL),
(27, 1, NULL, 'Apiculous Private Cloud', 'apiculous-private-cloud', NULL, 'uploads/cms/cms-1690799491.webp', NULL, 'Apiculous-Private-Cloud', 'uploads/cms/cms-1690799491.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 05:01:31', '2023-08-06 00:22:11', NULL),
(28, 4, NULL, 'Block Storage', 'block-storage', 'uploads/cms/cms-1690799639.png', 'uploads/cms/cms-1690799639.webp', NULL, 'Block-Storage', 'uploads/cms/cms-1690799639.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 05:03:59', '2023-08-06 00:21:59', NULL),
(29, 4, NULL, 'Archive Storage', 'archive-storage', 'uploads/cms/cms-1690799787.png', 'uploads/cms/cms-1690799787.webp', NULL, 'Archive-Storage', 'uploads/cms/cms-1690799787.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 05:06:27', '2023-08-06 00:21:37', NULL),
(30, 5, NULL, 'Unmanaged VPS Hosting', 'unmanaged-vps-hosting', 'uploads/cms/cms-1690799961.png', 'uploads/cms/cms-1690799961.webp', NULL, 'Unmanaged-VPS-Hosting', 'uploads/cms/cms-1690799961.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 05:09:21', '2023-08-06 00:21:22', NULL),
(31, 5, NULL, 'Linux VPS Hosting', 'linux-vps-hosting', 'uploads/cms/cms-1690800081.png', 'uploads/cms/cms-1690800081.webp', NULL, 'Linux-VPS-Hosting', 'uploads/cms/cms-1690800081.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 05:11:21', '2023-08-06 00:20:49', NULL),
(32, 5, NULL, 'Windows VPS Hosting', 'windows-vps-hosting', 'uploads/cms/cms-1690800229.png', 'uploads/cms/cms-1690800229.webp', NULL, 'Windows-VPS-Hosting', 'uploads/cms/cms-1690800229.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 05:13:49', '2023-08-06 00:20:38', NULL),
(33, 6, NULL, 'DDos Protection', 'ddos-protection', 'uploads/cms/cms-1690800314.png', 'uploads/cms/cms-1690800314.webp', NULL, 'DDos-Protection', 'uploads/cms/cms-1690800314.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 05:15:14', '2023-08-06 00:20:28', NULL),
(34, 6, NULL, 'Load Balancer', 'load-balancer', 'uploads/cms/cms-1690800397.png', 'uploads/cms/cms-1690800397.webp', NULL, 'Load-Balancer', 'uploads/cms/cms-1690800397.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 05:16:37', '2023-08-06 00:20:18', NULL),
(35, 6, NULL, 'NAT Gateway', 'nat-gateway', 'uploads/cms/cms-1690800480.png', 'uploads/cms/cms-1690800480.webp', NULL, 'NAT-Gateway', 'uploads/cms/cms-1690800480.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', '[\"cpu\"]', NULL, NULL, NULL, 2, 1, 1, '2023-07-31 05:18:00', '2023-08-06 00:18:47', NULL),
(36, 0, NULL, 'Test', 'test', NULL, NULL, NULL, NULL, NULL, '<p>ac</p>', '[\"asc\"]', NULL, NULL, NULL, 2, 1, 1, '2023-08-06 02:22:25', '2023-08-06 02:22:43', NULL),
(37, 0, NULL, 'Bare Metal Server', 'sdv', 'uploads/cms/cms-20230806075323-7204.png', NULL, NULL, NULL, NULL, '<p>fdbfdbfbd</p>', '[\"fdb\"]', 'fdb', 'dfb', 'fdb', 2, 1, 1, '2023-08-06 02:23:23', '2023-08-06 02:48:08', NULL),
(38, 0, NULL, 'Bare Metal Sever', 'bare-metal-sever', NULL, NULL, NULL, NULL, NULL, '<p>asc</p>', '[\"asc\"]', NULL, NULL, NULL, 2, 1, 1, '2023-08-06 02:24:47', '2023-08-06 02:50:58', NULL),
(39, 0, NULL, 'Private cloud', 'private-cloud-2', 'uploads/cms/cms-20230808071349-2751.png', 'uploads/cms/cms-20230806095258-9398.jpeg', NULL, NULL, 'uploads/cms/cms-20230806095258-6826.png', '<p class=\"mb-0\">A Private Cloud is a model of cloud computing where the infrastructure is dedicated to a single-user organization.</p>', '[\"Number of Nodes\",\"Configuration\",\"Shared SAN Storage\"]', 'asc', 'asc', 'asc', 1, 1, 1, '2023-08-06 02:25:14', '2023-08-08 01:43:49', NULL),
(40, 0, NULL, 'Bare Metal Server', 'bare-metal-server-2', 'uploads/cms/cms-20230806075743-9356.png', 'uploads/cms/cms-20230806082223-1968.jpeg', NULL, NULL, 'uploads/cms/cms-20230808102623-6223.png', '<p>A&nbsp;<strong>Bare Metal Server</strong> offers dedicated hardware resources to a single user, providing optimal performance, reliability, and security.&nbsp;</p>', '[\"Processor\",\"Total Core\",\"RAM\",\"SSD\\/NVME\",\"Network Port\",\"OS\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 02:27:43', '2023-08-08 04:56:23', NULL),
(41, 0, NULL, 'VPS Server', 'vps-server', 'uploads/cms/cms-20230808071545-557.png', 'uploads/cms/cms-20230807110724-3699.png', NULL, NULL, 'uploads/cms/cms-20230808103240-2710.png', '<p>Discover a dynamic hosting solution that bridges the gap between shared hosting and dedicated servers &ndash; <strong>VPS Hosting</strong>.&nbsp;</p>', '[\"Processor\",\"Total Core\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 03:11:15', '2023-08-08 05:02:40', NULL),
(42, 0, NULL, 'Cluster Server', 'cluster-server', 'uploads/cms/cms-20230808071510-9675.png', 'uploads/cms/cms-20230808073541-5658.png', NULL, NULL, 'uploads/cms/cms-20230806112827-5760.png', '<p>Welcome to our revolutionary Cluster Hosting to unlock your website performance and reliability.&nbsp;</p>', '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 04:04:15', '2023-08-08 04:58:06', NULL),
(43, 0, NULL, 'GPU Server', 'gpu-server-3', 'uploads/cms/cms-20230808071431-8692.png', 'uploads/cms/cms-20230806101241-3611.png', NULL, NULL, 'uploads/cms/cms-20230808102936-907.png', '<p>A GPU server is also known as a Graphics Processing Unit server. It is a high-performance computing..</p>', '[\"GPU Configuration\",\"Core\",\"RAM\",\"SSD\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 04:42:41', '2023-08-08 04:59:36', NULL),
(44, 40, NULL, 'General Purpose', 'general-purpose-2', 'uploads/cms/cms-20230807073124-1536.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 05:18:53', '2023-08-07 02:01:24', NULL),
(45, 40, NULL, 'CPU Optimized', 'cpu-optimized-2', 'uploads/cms/cms-20230807073255-5135.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\",\"RAM\",\"SSD\\/NVMe\",\"Network\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 05:47:00', '2023-08-07 02:02:55', NULL),
(46, 40, NULL, 'Memory Optmized', 'memory-optmized', 'uploads/cms/cms-20230807073238-6832.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 09:50:14', '2023-08-07 02:02:38', NULL),
(47, 40, NULL, 'Storage Server', 'storage-server', 'uploads/cms/cms-20230807073152-5335.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 09:50:57', '2023-08-07 02:01:52', NULL),
(48, 40, NULL, 'Managed Bare Metal Server', 'managed-bare-metal-server', 'uploads/cms/cms-20230807073103-6346.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 09:51:36', '2023-08-07 02:01:04', NULL),
(49, 39, NULL, 'Apiculus CloudStack', 'apiculus-cloudstack', 'uploads/cms/cms-20230807073048-1885.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 09:57:26', '2023-08-07 02:00:48', NULL),
(50, 39, NULL, 'Vmware Private Cloud', NULL, 'uploads/cms/cms-20230807073024-5683.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 09:59:51', '2023-08-07 02:00:24', NULL),
(51, 39, NULL, 'Vmware Private Cloud', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 2, 1, 1, '2023-08-06 09:59:59', '2023-08-07 01:53:47', NULL),
(52, 39, NULL, 'Vmware Private Cloud', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 2, 1, 1, '2023-08-06 10:00:29', '2023-08-07 01:53:36', NULL),
(53, 39, NULL, 'VMware Private Cloud', 'vmware', NULL, NULL, NULL, NULL, NULL, NULL, '[\"Processor1\"]', NULL, NULL, NULL, 2, 1, 1, '2023-08-06 10:02:11', '2023-08-06 23:08:49', NULL),
(56, 52, NULL, 'Vmware Private Cloud', 'vmware-private-cloud-2', NULL, NULL, NULL, NULL, NULL, NULL, '[\"s\"]', NULL, NULL, NULL, 2, 1, 1, '2023-08-06 10:35:55', '2023-08-06 23:08:35', NULL),
(57, 41, NULL, 'General Purpose', 'general-purpose-3', 'uploads/cms/cms-20230807072950-7465.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 23:02:40', '2023-08-07 01:59:50', NULL),
(58, 41, NULL, 'CPU Optimized', 'cpu-optimized-3', 'uploads/cms/cms-20230807072937-9950.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 23:03:10', '2023-08-07 01:59:37', NULL),
(59, 41, NULL, 'Memory Optimized', 'memory-optimized-2', 'uploads/cms/cms-20230807072924-4436.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 23:03:31', '2023-08-07 01:59:24', NULL),
(60, 41, NULL, 'VPS with cPanel', 'vps-with-cpanel', 'uploads/cms/cms-20230807072911-5100.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 23:04:22', '2023-08-07 01:59:11', NULL),
(61, 42, NULL, '2-Node Cluster Server', '2-node-cluster-server', 'uploads/cms/cms-20230807072838-2552.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 23:05:05', '2023-08-07 01:58:38', NULL),
(62, 42, NULL, '3-Node Cluster Server', '3-node-cluster-server', 'uploads/cms/cms-20230807072824-8904.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 23:05:20', '2023-08-07 01:58:24', NULL),
(63, 42, NULL, '4-Node Cluster Server', '4-node-cluster-server', 'uploads/cms/cms-20230807072653-7548.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 23:05:37', '2023-08-07 01:56:53', NULL),
(64, 43, NULL, 'GPU-A40', 'gpu-a40', 'uploads/cms/cms-20230807072718-8352.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 23:06:08', '2023-08-07 01:57:18', NULL);
INSERT INTO `master_products` (`id`, `parent_id`, `order_no`, `title`, `slug`, `icon`, `banner`, `other_icon`, `page_url`, `image`, `short_description`, `table_fields`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(65, 43, NULL, 'GPU-A100', 'gpu-a100', 'uploads/cms/cms-20230807072603-6339.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 23:06:41', '2023-08-07 01:56:03', NULL),
(66, 43, NULL, 'GPU-P1000', 'gpu-p1000', 'uploads/cms/cms-20230807072548-616.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 23:06:56', '2023-08-07 01:55:48', NULL),
(67, 43, NULL, 'GPU-P6000', 'gpu-p6000', 'uploads/cms/cms-20230807072533-6888.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-06 23:07:14', '2023-08-07 01:55:33', NULL),
(68, 0, NULL, 'Storage', NULL, 'uploads/cms/cms-20230807072505-5170.png', 'uploads/cms/cms-20230807095915-4422.png', NULL, NULL, 'uploads/cms/cms-20230807093822-4840.png', '<p>Unlock the power of seamless data protection with our Storage &amp; Backup as a Service.</p>', '[\"Processor\"]', 'Storage', 'Storage', 'Storage', 2, 1, 1, '2023-08-06 23:10:38', '2023-08-09 03:15:26', '2023-08-09 03:15:26'),
(69, 0, NULL, 'Storage', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 2, 1, 1, '2023-08-06 23:10:56', '2023-08-09 03:15:35', '2023-08-09 03:15:35'),
(70, 0, NULL, 'Storage', NULL, NULL, NULL, NULL, NULL, NULL, '<p><span data-sheets-value=\"{\" data-sheets-userformat=\"{\">Storage</span></p>', '[\"Processor\"]', NULL, NULL, NULL, 2, 1, 1, '2023-08-06 23:11:18', '2023-08-09 03:15:21', '2023-08-09 03:15:21'),
(71, 0, NULL, 'test', 'test-2', NULL, NULL, NULL, NULL, NULL, NULL, '[\"test\"]', NULL, NULL, NULL, 2, 1, 1, '2023-08-07 00:02:34', '2023-08-09 03:15:40', '2023-08-09 03:15:40'),
(72, 68, NULL, 'Block Storage', 'block-storage-2', 'uploads/cms/cms-20230807071323-1407.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-07 00:03:50', '2023-08-07 01:43:23', NULL),
(73, 68, NULL, 'Backup Storage', 'backup-storage', 'uploads/cms/cms-20230807071015-8585.png', 'uploads/cms/cms-20230807095525-6026.png', NULL, NULL, 'uploads/cms/cms-20230807095717-5061.png', '<p>Unlock the power of seamless data protection with our Storage &amp; Backup as a Service. This is a simple and affordable way to protect your data from unwanted threats.</p>', '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-07 00:04:14', '2023-08-07 04:27:17', NULL),
(74, 68, NULL, 'Archival Storage', 'archival-storage', 'uploads/cms/cms-20230807070546-5962.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-07 00:04:52', '2023-08-07 01:35:46', NULL),
(75, 0, NULL, 'Network & Security', 'network-security', 'uploads/cms/cms-20230807091820-2600.png', 'uploads/cms/cms-20230807091702-2210.png', NULL, NULL, 'uploads/cms/cms-20230808103035-2948.png', '<p dir=\"ltr\">Secure your network from unwanted threats with Couldware Technologies\'s integrated network security solutions</p>', '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-07 00:05:16', '2023-08-08 05:00:35', NULL),
(76, 75, NULL, 'Load Balancer', 'load-balancer-2', 'uploads/cms/cms-20230807070200-5824.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-07 00:05:43', '2023-08-07 01:32:00', NULL),
(77, 75, NULL, 'DDos', 'ddos', 'uploads/cms/cms-20230807070132-7168.png', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-07 00:06:01', '2023-08-07 01:31:32', NULL),
(78, 0, NULL, 'SAP Server', 'sap-server', 'uploads/cms/cms-20230807070056-4020.png', 'uploads/cms/cms-20230807091729-241.png', NULL, NULL, 'uploads/cms/cms-20230807111648-9704.png', NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-07 00:06:30', '2023-08-07 05:46:48', NULL),
(79, 39, NULL, 'Apiclus Cloudstack', 'apiclus-cloudstack', 'uploads/cms/cms-20230807072233-9708.jpg', NULL, NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-07 01:50:45', '2023-08-07 01:52:33', NULL),
(80, 40, NULL, 'Memory Optimized', 'memory-optimized-3', NULL, NULL, NULL, NULL, NULL, NULL, '[\"Processor\",\"Total Core\",\"RAM\",\"Disk SSD\\/NVMe\",\"Network Port\",\"OS\",\"Price \\/ Month\"]', NULL, NULL, NULL, 2, 1, 1, '2023-08-07 08:15:20', '2023-08-09 03:11:36', '2023-08-09 03:11:36'),
(81, 0, NULL, 'Storage', NULL, 'uploads/cms/cms-20230808042942-9729.png', 'uploads/cms/cms-20230808042942-9384.png', NULL, NULL, 'uploads/cms/cms-20230808042942-3723.png', '<p>Unlock scalable and secure data storage with our advanced Cloud Storage solution. Seamlessly manage and access your files anytime, anywhere.</p>', '[\"Processor\"]', 'Cloud Storage solution', 'Cloud Storage solution', 'Cloud Storage solution', 2, 1, 1, '2023-08-07 22:59:42', '2023-08-09 03:11:42', '2023-08-09 03:11:42'),
(82, 0, NULL, 'Storage', NULL, 'uploads/cms/cms-20230808043733-7175.png', 'uploads/cms/cms-20230808043733-1306.png', NULL, NULL, 'uploads/cms/cms-20230808043733-7476.png', '<p>Unlock scalable and secure data storage with our advanced Cloud Storage solution. Seamlessly manage and access your files anytime, anywhere.</p>', '[\"Processor\"]', 'Cloud Storage solution', 'Cloud Storage solution', 'Cloud Storage solution', 2, 1, 1, '2023-08-07 23:07:33', '2023-08-09 03:11:23', '2023-08-09 03:11:23'),
(83, 0, NULL, 'Storage', 'storage', NULL, 'uploads/cms/cms-20230808094301-7847.png', NULL, NULL, NULL, NULL, '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-08 04:13:01', '2023-08-09 03:52:30', '2023-08-09 03:52:30'),
(84, 0, 1, 'Storage', 'storage', 'uploads/cms/cms-20230809092204-4773.png', 'uploads/cms/cms-20230809092204-6570.png', NULL, NULL, 'uploads/cms/cms-20230809092204-9429.png', '<p dir=\"ltr\">Unlock the power of seamless data protection with our Storage &amp; Backup as a Service.</p>', '[\"Processor\"]', NULL, NULL, NULL, 1, 1, 1, '2023-08-09 03:52:04', '2023-08-20 21:54:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_services`
--

CREATE TABLE `master_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_services`
--

INSERT INTO `master_services` (`id`, `parent_id`, `title`, `slug`, `icon`, `banner`, `other_icon`, `page_url`, `image`, `short_description`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(12, 0, 'Cloud Migration Service', 'cloud-migration-service', 'uploads/cms/cms-1690365806.png', 'uploads/cms/cms-1690365714.jpg', NULL, 'Cloud-Migration-Service', 'uploads/cms/cms-1690365714.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods</p>', 'Cloud Migration Service', 'Cloud Migration Service', 'Cloud Migration Service', 1, 1, 1, '2023-07-26 04:31:54', '2023-07-26 04:33:26', NULL),
(13, 0, 'Test Service', 'test-service', NULL, NULL, NULL, 'test-service', NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2023-08-05 01:25:17', '2023-08-05 01:25:17', NULL),
(14, 0, 'System Integration Services', 'system-integration-services', 'uploads/cms/cms-20230808095308-9238.png', 'uploads/cms/cms-20230808095137-3133.png', NULL, 'system-integration-services', 'uploads/cms/cms-20230808095253-9097.png', NULL, 'System Integration Services', 'System Integration Services', 'System Integration Services', 1, 1, 1, '2023-08-08 04:21:37', '2023-08-08 04:23:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_solutions`
--

CREATE TABLE `master_solutions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_solutions`
--

INSERT INTO `master_solutions` (`id`, `parent_id`, `title`, `slug`, `icon`, `banner`, `other_icon`, `page_url`, `image`, `short_description`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'sdsdvsdv', 'sdsdvsdv', 'uploads/cms/cms-20230808080723-4839.png', NULL, NULL, 'sdvsdvsd--------ssssssssssss', NULL, '<p>sdv</p>', 'sdv', 'sdv', 'sdv', 1, 1, 1, '2023-08-08 02:37:23', '2023-08-08 04:26:37', NULL),
(2, 0, 'wcqwqcw', 'wcqwqcw', 'uploads/cms/cms-20230819124157-7878.png', 'uploads/cms/cms-20230819124157-8020.png', 's', 'wwww', 'uploads/cms/cms-20230819124157-2159.png', '<p>s</p>', 's', 's', 's', 1, 1, NULL, '2023-08-19 07:11:57', '2023-08-19 07:11:57', NULL);

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
(5, '2023_03_16_104443_create_master_designations_table', 1),
(6, '2023_03_16_113407_create_user_designations_table', 1),
(7, '2023_03_16_113856_create_user_logins_table', 1),
(8, '2023_03_16_114715_create_user_types_table', 1),
(9, '2023_03_16_120608_create_categories_table', 1),
(10, '2023_03_16_120725_create_blogs_table', 1),
(11, '2023_03_16_120808_create_countries_table', 1),
(12, '2023_03_22_043216_create_image_categories_table', 1),
(13, '2023_03_22_052225_create_galleries_table', 1),
(38, '2023_03_16_120826_create_states_table', 1),
(39, '2023_03_16_120841_create_cities_table', 1),
(42, '2014_10_12_000000_create_users_table', 2),
(43, '2014_10_12_100000_create_password_resets_table', 2),
(44, '2019_08_19_000000_create_failed_jobs_table', 2),
(45, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(46, '2023_03_16_104443_create_master_designations_table', 2),
(47, '2023_03_16_113407_create_user_designations_table', 2),
(48, '2023_03_16_113856_create_user_logins_table', 2),
(49, '2023_03_16_114715_create_user_types_table', 2),
(50, '2023_03_16_120608_create_categories_table', 2),
(51, '2023_03_16_120725_create_blogs_table', 2),
(52, '2023_03_16_120808_create_countries_table', 2),
(53, '2023_03_22_043216_create_image_categories_table', 2),
(54, '2023_03_22_052225_create_galleries_table', 2),
(55, '2023_03_22_102335_create_menus_table', 3),
(56, '2023_03_22_103138_create_cms_pages_table', 3),
(57, '2023_03_28_044047_create_testimonials_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `page_sections`
--

CREATE TABLE `page_sections` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `section_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_sections`
--

INSERT INTO `page_sections` (`id`, `page_id`, `section_name`, `title`, `description`, `image`, `banner_image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'who_we_are_section', 'WHO WE ARE', '<h3>WELCOME TO MY FLY CARE</h3>', NULL, NULL, 1, 1, NULL, '2023-08-24 23:56:40', '2023-08-25 05:27:20', NULL),
(2, 2, 'about_section', '<p>MY FLY CARE</p>', '<p>My Fly Care by the vision of making beauty and styling accessible to all, an aspiration that was earlier restricted only to the privileged, FMCG giant Cavinkare launched a first-of-its-kind professional, unisex salonchain &ldquo;My Fly Care&rdquo;.</p>\r\n<p><br>My Fly Care transformed the landscape of salons and made beauty and styling aspirations a reality for all. With a vast network of 375+ salons, My Fly Care delivers its vision of accessible beautyand styling services to the far-reaching corners of the country with its presence across 50+ cities. With scientifically designed services using world-class products delivered by certified skin and hair experts,My Fly Care caters to one&rsquo;s head-to-toe grooming, beauty and styling needs at exceptional value. far-reaching corners of the country with its presence across 50+ cities. With scientifically designed services using world-class products delivered by certified skin and hair experts,My Fly Care caters to one&rsquo;s head-to-toe grooming, beauty and styling needs at exceptional value.</p>\r\n<p><br>A strong proponent of the philosophy that beauty and style is unique to each, My Fly Care&rsquo; experience is built on the pillarof a &lsquo;culture of consultation&rsquo; where our certified experts hand-pick products and recommend salon services best suited for every individual customer. Continuous innovation of the service offering and meticulousfocus on salon experience has lead to My Fly Care enjoying a large and loyal customer base of over 20 lac customers which is ever growing.</p>', 'uploads/cms/cms-20231121071222-6699.jpg', NULL, 1, 1, NULL, '2023-08-25 00:51:13', '2023-11-21 01:42:22', NULL),
(3, 2, 'journey_and_milestone', '<h3 class=\"    padding-bottom: 15px;\"><small>OUR JOURNEY &amp; MILESTONES</small></h3><h3 class=\"    padding-bottom: 15px;\">ACHIEVE GREATER HEIGHTS</h3>', '<p><span style=\"color: rgb(255, 255, 255);\">Interested in any of our products? Talk to our experts today. And enable us to create the unthinkable and deliver the unimaginable</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-25 01:11:26', '2023-08-25 01:13:35', NULL),
(4, 2, 'counter_section', '<p>Counter Section</p>', '<p>Counter Section</p>', NULL, NULL, 1, 1, NULL, '2023-08-25 01:40:08', '2023-08-25 01:40:08', NULL),
(5, 4, 'why_choose_us', '<h3 class=\"text-white\"><small class=\"text-white\">CHOOSE USs</small></h3><h3 class=\"text-white\">REASONS TO CHOOSE MY FLY CARE</h3>', '<p><span style=\"color: rgb(255, 255, 255);\">Step in to look great! We have the best services and offers waiting for you! Step in to look great! We have the best services and offers waiting for you! Step in to look great! We have the best services and offers waiting for you!</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-25 02:13:19', '2023-08-25 02:22:44', NULL),
(6, 4, 'why_choose_us_bottom', '<p><span class=\"title20\">Dotfree</span></p>\r\n<h2>BENIFIT*</h2>', '<h3 class=\"fs-18 mt-3\">Anywhere in India</h3>', NULL, NULL, 1, 1, NULL, '2023-08-25 02:39:25', '2023-08-25 02:39:25', NULL),
(7, 2, 'mission_section', '<h3 class=\"    padding-bottom: 15px;\"><small>MISSION</small></h3>\r\n<h3 class=\"    padding-bottom: 15px;\">GET GREAT WORK FOR YOUR BUDGET</h3>', '<p>We are courteous with our client. We use doctrine of honesty &amp; hassle-free service. We are best for our qualitative results. We are transparent &amp; trustworthy. We like to create positive vibe &amp; client friendly.</p>', 'uploads/cms/cms-20231121073947-7469.jpg', NULL, 1, 1, NULL, '2023-08-25 03:16:19', '2023-11-21 02:09:47', NULL),
(8, 4, 'team_section', '<h3><small>TEAM</small></h3>\r\n<h3>OUR TEAM MEMBER</h3>', '<p>Step in to look great! We have the best services and offers waiting for you! Step in to look great! We have the best services and offers waiting for you! Step in to look great! We have the best services and offers waiting for you!</p>', NULL, NULL, 1, 1, NULL, '2023-08-25 03:42:41', '2023-08-25 03:42:41', NULL),
(9, 5, 'about_section', '<h3 class=\"    padding-bottom: 15px;\"><small>STUDY</small></h3>\r\n<h3 class=\"    padding-bottom: 15px;\">CASE STUDY</h3>', '<p>Get specialized protection where you need it most</p>', NULL, NULL, 1, 1, NULL, '2023-08-25 06:22:38', '2023-08-25 06:22:38', NULL),
(10, 6, 'about_section', '<h3 class=\"    padding-bottom: 15px;\"><small>TESTIMONIALS</small></h3>\r\n<h3 class=\"    padding-bottom: 15px;\">CLIENTS OUR SAYS</h3>', '<p>I have received excellent service from this firm. They respond to emails the very next day, answer questions very clearly.</p>', NULL, NULL, 1, 1, NULL, '2023-08-25 12:20:06', '2023-08-25 12:20:06', NULL),
(11, 11, 'about_section', '<h3 class=\"    padding-bottom: 15px;\"><small>BLOGS</small></h3>\r\n<h3 class=\"    padding-bottom: 15px;\">LATEST BLOGS</h3>', '<p>Get specialized protection where you need it most</p>', NULL, NULL, 1, 1, NULL, '2023-08-25 12:28:52', '2023-08-25 12:28:52', NULL),
(12, 8, 'about_section', '<h3 class=\"    padding-bottom: 15px;\"><small>NEWS</small></h3>\r\n<h3 class=\"    padding-bottom: 15px;\">LATEST NEWS</h3>', '<p>Get specialized protection where you need it most</p>', NULL, NULL, 1, 1, NULL, '2023-08-25 12:29:40', '2023-08-25 12:29:40', NULL),
(13, 9, 'about_section', '<h3 class=\"text-center lsp-5 lh-base text-uppercase fs-30 text-black fw-bold lsp-5px pb-0 \">CLIENTS<br>OUR CLIENTS &amp; PARTNER</h3>', '<p>We recently helped a small business grow from break-even to over $1m profit in less than 2 years. Please find below contact details and contact us today!</p>', NULL, NULL, 1, 1, NULL, '2023-08-25 12:33:45', '2023-08-25 12:33:45', NULL),
(14, 12, 'about_section', '<h3 class=\"text-center lsp-5 lh-base text-uppercase fs-30 text-black fw-bold lsp-5px pb-0 \">FILL FORM<br>LIFE @CARRER</h3>', '<p>We value our employees the most and we believe in their complete well-being. Hence we have instituted several initiatives and programs that we run to ensure a healthy and happy workforce as part of our mission to work in an exciting and vibrant environment</p>', NULL, NULL, 1, 1, NULL, '2023-08-25 12:34:30', '2023-08-25 12:34:30', NULL),
(15, 7, 'about_section', '<h3>TEAM<br>OUR TEAM MEMBER</h3>', '<p>Step in to look great! We have the best services and offers waiting for you! Step in to look great! We have the best services and offers waiting for you! Step in to look great! We have the best services and offers waiting for you!</p>', NULL, NULL, 1, 1, NULL, '2023-08-25 12:56:43', '2023-08-25 12:57:23', NULL),
(16, 10, 'about_section', '<h3>CERTIFICATION<br>OUR AWARD &amp; CERTIFICATION</h3>', '<p>We recently helped a small business grow from break-even to over $1m profit in less than 2 years. Please find below contact details and contact us today!</p>', NULL, NULL, 1, 1, NULL, '2023-08-25 21:37:01', '2023-08-25 21:37:01', NULL),
(17, 14, 'about_section', '<h3>TIPS<br>FOR TEENAGERS</h3>', '<p>Get specialized protection where you need it most</p>', NULL, NULL, 1, 1, NULL, '2023-08-26 05:23:20', '2023-08-26 05:23:20', NULL),
(18, 17, 'about_section', '<h3 class=\"    padding-bottom: 15px;\"><small>GALLERY</small></h3>\r\n<h3 class=\"    padding-bottom: 15px;\">PRODUCT PORTFOLIO</h3>', '<p>Get specialized protection where you need it most</p>', NULL, NULL, 1, 1, NULL, '2023-08-31 23:33:25', '2023-08-31 23:33:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `partner_sections`
--

CREATE TABLE `partner_sections` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `section_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partner_sections`
--

INSERT INTO `partner_sections` (`id`, `page_id`, `section_name`, `title`, `description`, `image`, `banner_image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(13, 1, 'about_section', 'Let’s Build Something Great Together', '<p>Developing and launching world-class online projects requires a competent hosting partner. For over two decades, Cloudware Technologies Private Limited and our family of brands have provided fully managed cloud &amp; dedicated hosting platforms for designers, developers, software companies, and digital agencies.</p>\r\n<p>We understand that managing the \"hosting\" part of your business may not be your specialty. That&rsquo;s okay, because we&rsquo;re hosting experts. By partnering with us, we&rsquo;ll act as a direct extension of your team, ensuring your hosted systems are up-to-date, secure, and always online.</p>\r\n<p>Let&rsquo;s build your next project together, side-by-side.</p>', 'uploads/cms/cms-20230805115308-1188.png', NULL, 1, 1, NULL, '2023-08-05 06:23:08', '2023-08-05 06:23:42'),
(14, 1, 'key_points_section_1', 'You’ll Feel The Difference', '<p>Let Us Know Who You Are and Where You Want to Go, and We&rsquo;ll Get You There.</p>', NULL, NULL, 1, 1, NULL, '2023-08-05 07:12:17', '2023-08-05 07:12:17'),
(15, 1, 'benefits_section', 'One Program, Multiple Brands', '<p>As a partner, you&rsquo;ll have access to both the Cloudware Technologies Private Limited and Nexcess brands and their full product suites. Whether you need lightning-fast infrastructure, or the most robust, fully managed WordPress on the market, we have you covered.</p>', NULL, NULL, 1, 1, NULL, '2023-08-07 01:16:08', '2023-08-07 06:56:21'),
(16, 1, 'feature_section', 'FAST, SECURE, HASSLE-FREE', '<h2><span style=\"color: rgb(255, 255, 255);\">FULLY MANAGED WEB HOSTING SOLUTIONS</span></h2>\r\n<p><span style=\"color: rgb(255, 255, 255);\">We provide you with an unrivaled hosting experience, delivering 99.999%</span><br><span style=\"color: rgb(255, 255, 255);\">uptime &amp; 24/7 access to the Most Helpful Humans in Hosting.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-07 02:31:55', '2023-08-07 02:38:29'),
(17, 1, 'about_section_2', 'Dedicated Hosting', '<p>\"When a client needs to scale...it&rsquo;s easy to upgrade them. When NameHero needs to add Private VPS Parents, it&rsquo;s also easy to migrate VPS instances to the new server. The long-term partnership is important to us, and it starts with trust.</p>\r\n<p>You cannot go wrong with Cloudware Technologies Private Limited ...they provide premium infrastructure and a network that stays online...it&rsquo;s the people behind Cloudware Technologies Private Limited that make it a long-term partner.&rdquo;</p>\r\n<p>-Ryan Gray, Owner, NameHero</p>', 'uploads/cms/cms-20230807082757-4792.jpg', NULL, 1, 1, NULL, '2023-08-07 02:57:57', '2023-08-07 02:57:57'),
(18, 1, 'key_points_section_2', 'Reseller Hosting Features', '<p><span style=\"color: rgb(255, 255, 255);\">If you use WHMCS, then download our WHMCS Plugin for Cloud Products and start provisioning and selling Cloud VPS and Cloud Dedicated products.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-07 03:38:02', '2023-08-07 03:38:02'),
(19, 1, 'about_section_3', 'Managed Hosting By Cloudware Technologies Private Limited', '<p>We&rsquo;ve built a company with the sole focus of making sure our customer service scores are the highest in the industry. And they are. We&rsquo;re your team. Monitoring your servers, mitigating risk, optimizing performance. And if you need support, don&rsquo;t worry about a thing.<br><br>Work with one of our 250+ Windows and Linux Certified technicians quickly and on your first contact. Let us worry about infrastructure so you can build and grow your digital business!</p>', 'uploads/cms/cms-20230807090832-8397.jpg', NULL, 1, 1, NULL, '2023-08-07 03:38:32', '2023-08-07 03:38:32');

-- --------------------------------------------------------

--
-- Table structure for table `partner_section_datas`
--

CREATE TABLE `partner_section_datas` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_number` int(3) NOT NULL DEFAULT 1,
  `other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `partner_section_datas`
--

INSERT INTO `partner_section_datas` (`id`, `page_id`, `section_id`, `title`, `description`, `img`, `order_number`, `other`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(32, 1, 13, 'Your Own Personal Partner Manager', '<h6 class=\"fs-16 mt-3 mb-2 text-capitalize fw-bold  text-sky lsp-5px\">Your Own Personal Partner Manager</h6>', 'uploads/cms/cms-20230805115857-9971.png', 1, NULL, 1, 1, NULL, '2023-08-05 06:28:57', '2023-08-05 06:28:57'),
(33, 1, 15, 'Fully Managed WordPress, Magento And WooCommerce Hosting For Agencies', '<p class=\"fs-13 lsp-5 text-black2 lh-base text-left mx-auto\">Fully managed infrastructure has been the backbone of Cloudware Technologies Private Limited since 1997. Our performance-tuned servers and cloud platform are deployed in our own data centers, allowing us to provide you the highest levels of speed, security, and peace of mind. From single dedicated servers to highly available, redundant Private Cloud powered by VMware, we have a solution to fit your project.</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data1.png\" alt=\"Orrish\"></span>Cloud VPS</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data-protection1.png\" alt=\"Orrish\"></span>VMware Private Cloud</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/Support-comparison11.png\" alt=\"Orrish\"></span>Dedicated servers</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"../../../cloudware_html/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>Server clusters</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/performance11.png\" alt=\"Orrish\"></span>HIPAA compliant hosting</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/performance11.png\" alt=\"Orrish\"></span>Enterprise hosting</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, NULL, '2023-08-07 01:46:35', '2023-08-07 01:46:35'),
(34, 1, 15, 'Fully Managed WordPress, Magento And WooCommerce Hosting For Agencies', '<p class=\"fs-13 lsp-5 text-black2 lh-base text-left mx-auto\">For 20+ years, Nexcess has provided superior speed, security, support and scalability for headless ecommerce. Deliver easy-to-use managed applications, including WordPress, Magento and WooCommerce, with the industry&rsquo;s best performance tools built-in.</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2 mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data1.png\" alt=\"Orrish\"></span>Plugin Performance Monitor</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/Support-comparison11.png\" alt=\"Orrish\"></span>WooCommerce Automated Testing</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data-protection1.png\" alt=\"Orrish\"></span>Sales Performance Monitor</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"../../../cloudware_html/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>WordPress plugins by StellarWP</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/performance11.png\" alt=\"Orrish\"></span>StoreBuilder, a WordPress store creator</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, NULL, '2023-08-07 01:47:00', '2023-08-07 01:47:00'),
(35, 1, 14, 'Your Own Personal Partner Manager', '<p>You&rsquo;ll work directly with a partner manager who will take time to learn your business and your needs.</p>', 'uploads/cms/cms-20230807083534-518.png', 1, NULL, 1, 1, NULL, '2023-08-07 03:05:34', '2023-08-07 03:05:34'),
(36, 1, 18, 'All the essentials', '<p>Manage everything from one single dashboard (cPanel). Quickly set up Content Management Systems (WordPress, Joomla, Magento, etc.) using the Softaculous script installer. Create your own private nameservers.&nbsp;</p>', 'uploads/cms/cms-20230807090936-791.png', 1, NULL, 1, 1, NULL, '2023-08-07 03:39:36', '2023-08-07 03:39:36');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_galleries`
--

CREATE TABLE `portfolio_galleries` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `images` text NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio_galleries`
--

INSERT INTO `portfolio_galleries` (`id`, `brand_id`, `images`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, '169322557719.brand1.png', 1, '2023-08-28 12:26:17', NULL, NULL),
(2, 4, '169322557749.brand2.png', 1, '2023-08-28 12:26:17', NULL, NULL),
(3, 4, '169322557712.brand3.png', 1, '2023-08-28 12:26:17', '2023-08-28 07:09:05', NULL),
(4, 1, '169322566131.fbanner (1).jpg', 1, '2023-08-28 12:27:41', NULL, NULL),
(5, 1, '169322566130.fbanner.jpg', 1, '2023-08-28 12:27:41', NULL, NULL),
(6, 1, '170064154416.169322566130.fbanner.jpg', 1, '2023-11-22 08:25:44', NULL, NULL),
(7, 2, '17006416829.169322566130.fbanner.jpg', 1, '2023-11-22 08:28:02', NULL, NULL),
(8, 2, '170064176194.169322566130.fbanner.jpg', 1, '2023-11-22 08:29:21', NULL, NULL),
(9, 2, '170064241923.169322566130.fbanner.jpg', 1, '2023-11-22 08:40:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pricings`
--

CREATE TABLE `pricings` (
  `id` int(11) NOT NULL,
  `common` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `type_id` varchar(255) NOT NULL,
  `fields` text DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricings`
--

INSERT INTO `pricings` (`id`, `common`, `product_id`, `type_id`, `fields`, `price`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '0', '40', '44', '[\"Test\",\"4\",\"8GB\",\"256GB\",\"Network prot 4\",\"windows\"]', '1999', 1, '2023-08-09 04:07:15', '2023-08-09 04:07:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pricing_enqs`
--

CREATE TABLE `pricing_enqs` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `pricing_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `price` varchar(100) DEFAULT NULL,
  `full_entry` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricing_enqs`
--

INSERT INTO `pricing_enqs` (`id`, `name`, `phone`, `email`, `skype`, `pricing_id`, `message`, `price`, `full_entry`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Rana Sharma', '8825171386', 'iamranasharma@gmail.com', 'iamranasharma@gmail.com', 1, 'Test', '1999', '[\"Test\",\"4\",\"8GB\",\"256GB\",\"Network prot 4\",\"windows\"]', 1, '2023-08-09 04:26:31', '2023-08-09 04:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_types`
--

CREATE TABLE `pricing_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricing_types`
--

INSERT INTO `pricing_types` (`id`, `name`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Windows Dedicated Server', 'uploads/all/all-1690174891.png', 1, '2023-07-23 23:31:31', '2023-07-23 23:31:31'),
(2, 'Linux Dedicated Server', 'uploads/all/all-1690174922.png', 1, '2023-07-23 23:32:02', '2023-07-23 23:32:02'),
(3, 'Clustered Server (HA)', 'uploads/all/all-1690174959.png', 1, '2023-07-23 23:32:39', '2023-07-23 23:32:39'),
(4, 'GPU Server', 'uploads/all/all-1690174978.png', 1, '2023-07-23 23:32:58', '2023-07-23 23:32:58'),
(5, 'Database Dedicated Server', 'uploads/all/all-1690175001.png', 1, '2023-07-23 23:33:21', '2023-07-23 23:33:21'),
(6, 'Bare Mtl', 'uploads/all/all-1690636606.png', 1, '2023-07-29 07:46:46', '2023-07-29 07:46:46'),
(7, 'Bare-Metal Server', 'uploads/all/all-1690709781.png', 1, '2023-07-30 04:06:21', '2023-07-30 04:06:21'),
(8, 'VPS Hosting', 'uploads/all/all-1690781711.png', 1, '2023-07-31 00:05:11', '2023-07-31 00:05:11'),
(9, 'VPS Hosting', 'uploads/all/all-1690781749.png', 1, '2023-07-31 00:05:50', '2023-07-31 00:05:50'),
(10, 'Bare-Metal Server', 'uploads/all/all-1690782003.png', 1, '2023-07-31 00:10:03', '2023-07-31 00:10:03'),
(11, 'Bare-Metal Server', 'uploads/all/all-1690782535.png', 1, '2023-07-31 00:18:55', '2023-07-31 00:18:55'),
(12, 'Clustered Server (HA)', 'uploads/all/all-1690783152.png', 1, '2023-07-31 00:29:12', '2023-07-31 00:29:12'),
(13, 'Managed VPS Hosting', 'uploads/all/all-1690784187.jpg', 1, '2023-07-31 00:46:27', '2023-07-31 00:46:27'),
(14, 'Linux VPS Hosting', 'uploads/all/all-1690784836.png', 1, '2023-07-31 00:57:16', '2023-07-31 00:57:16'),
(15, 'Windows VPS Hosting', 'uploads/all/all-1690784950.jpg', 1, '2023-07-31 00:59:10', '2023-07-31 00:59:10'),
(16, 'Unmanaged VPS Hosting', 'uploads/all/all-1690785068.png', 1, '2023-07-31 01:01:08', '2023-07-31 01:01:08'),
(17, 'test', 'uploads/all/all-20230805072836-6051.png', 1, '2023-08-05 01:58:36', '2023-08-05 01:58:36'),
(18, 'Object Storage', 'uploads/all/all-20230805121515-3502.png', 1, '2023-08-05 06:45:15', '2023-08-05 06:45:15'),
(19, 'General Purpose', 'uploads/all/all-20230806105457-4000.png', 1, '2023-08-06 05:24:57', '2023-08-06 05:24:57'),
(20, 'CPU Optimized', 'uploads/all/all-20230806111812-9158.png', 1, '2023-08-06 05:48:12', '2023-08-06 05:48:12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `gallery` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `item_code` varchar(100) DEFAULT NULL,
  `pack` varchar(100) DEFAULT NULL,
  `product_description` text DEFAULT NULL,
  `overview` text DEFAULT NULL,
  `warranty` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `slug` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_tag` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `banner`, `gallery`, `short_description`, `category_id`, `brand_id`, `item_code`, `pack`, `product_description`, `overview`, `warranty`, `status`, `slug`, `meta_title`, `meta_tag`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ultra Thin Sanitary Napkins', 'uploads/cms/cms-20231115050628-861.jpg', 'uploads/cms/cms-20230919110417-2060.webp', '[\"gallery-image-16935657499255.png\",\"gallery-image-16935657494691.png\",\"gallery-image-16935657499714.png\",\"gallery-image-16935657492899.jpg\"]', '<p>Ultra Thin Sanitary Napkins withs</p>', 1, 3, '555666', 'Economy Packsss', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', 1, 'ultra-thin-sanitary-napkins-with', 'Ultra Thin Sanitary Napkins withs', 'Ultra Thin Sanitary Napkins with s', NULL, '2023-09-01 05:25:49', '2023-11-17 00:59:09', NULL),
(2, 'Ultra Thin Sanitary Napkins', 'uploads/cms/cms-20231115050812-7562.jpg', NULL, '[\"gallery-image-16935657499255.png\",\"gallery-image-16935657494691.png\",\"gallery-image-16935657499714.png\",\"gallery-image-16935657492899.jpg\"]', '<p>Ultra Thin Sanitary Napkins withs</p>', 1, 2, '555666', 'Economy Packsss', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', 1, 'ultra-thin-sanitary-napkins-with', 'Ultra Thin Sanitary Napkins withs', 'Ultra Thin Sanitary Napkins with s', NULL, '2023-09-01 05:25:49', '2023-11-14 23:38:12', NULL),
(3, 'Ultra Thin Napkins', 'uploads/cms/cms-20231115050827-1222.jpg', NULL, '[\"gallery-image-16935657499255.png\",\"gallery-image-16935657494691.png\",\"gallery-image-16935657499714.png\",\"gallery-image-16935657492899.jpg\"]', '<p>Ultra Thin Sanitary Napkins withs</p>', 1, 2, '555666', 'Economy Packsss', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', 1, 'ultra-thin-sanitary-napkins-with', 'Ultra Thin Sanitary Napkins withs', 'Ultra Thin Sanitary Napkins with s', NULL, '2023-09-01 05:25:49', '2023-11-14 23:38:27', NULL),
(4, 'Ultraaa', 'uploads/cms/cms-20231115050847-9455.jpg', NULL, '[\"gallery-image-16935657499255.png\",\"gallery-image-16935657494691.png\",\"gallery-image-16935657499714.png\",\"gallery-image-16935657492899.jpg\"]', '<p>Ultra Thin Sanitary Napkins withs</p>', 1, 2, '555666', 'Economy Packsss', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', 1, 'ultra-thin-sanitary-napkins-with', 'Ultra Thin Sanitary Napkins withs', 'Ultra Thin Sanitary Napkins with s', NULL, '2023-09-01 05:25:49', '2023-11-14 23:38:47', NULL),
(5, 'Ultra Thin Sanitary Napkins fly', 'uploads/cms/cms-20231115051001-550.jpg', NULL, '[\"gallery-image-16935657499255.png\",\"gallery-image-16935657494691.png\",\"gallery-image-16935657499714.png\",\"gallery-image-16935657492899.jpg\"]', '<p>Ultra Thin Sanitary Napkins withs</p>', 2, 2, '555666', 'Economy Packsss', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', 1, 'ultra-thin-sanitary-napkins-with', 'Ultra Thin Sanitary Napkins withs', 'Ultra Thin Sanitary Napkins with s', NULL, '2023-09-01 05:25:49', '2023-11-14 23:40:02', NULL),
(6, 'Ultra Thin Sanitary Napkins fly', 'uploads/cms/cms-20231115051047-3419.jpg', NULL, '[\"gallery-image-16935657499255.png\",\"gallery-image-16935657494691.png\",\"gallery-image-16935657499714.png\",\"gallery-image-16935657492899.jpg\"]', '<p>Ultra Thin Sanitary Napkins withs</p>', 2, 2, '555666', 'Economy Packsss', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', 1, 'ultra-thin-sanitary-napkins-with', 'Ultra Thin Sanitary Napkins withs', 'Ultra Thin Sanitary Napkins with s', NULL, '2023-09-01 05:25:49', '2023-11-14 23:40:47', NULL),
(7, 'Ultra Thin Sanitary Napkins fly', 'uploads/cms/cms-20231115051125-5952.jpg', NULL, '[\"gallery-image-16935657499255.png\",\"gallery-image-16935657494691.png\",\"gallery-image-16935657499714.png\",\"gallery-image-16935657492899.jpg\"]', '<p>Ultra Thin Sanitary Napkins withs</p>', 2, 2, '555666', 'Economy Packsss', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', 1, 'ultra-thin-sanitary-napkins-with', 'Ultra Thin Sanitary Napkins withs', 'Ultra Thin Sanitary Napkins with s', NULL, '2023-09-01 05:25:49', '2023-11-14 23:41:25', NULL),
(8, 'Ultra Thin Sanitary Napkins fly', 'uploads/cms/cms-20231115051142-2545.jpg', NULL, '[\"gallery-image-16935657499255.png\",\"gallery-image-16935657494691.png\",\"gallery-image-16935657499714.png\",\"gallery-image-16935657492899.jpg\"]', '<p>Ultra Thin Sanitary Napkins withs</p>', 2, 2, '555666', 'Economy Packsss', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', '<p>Ultra Thin Sanitary Napkins withs</p>', 1, 'ultra-thin-sanitary-napkins-with', 'Ultra Thin Sanitary Napkins withs', 'Ultra Thin Sanitary Napkins with s', NULL, '2023-09-01 05:25:49', '2023-11-14 23:41:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dotfree', 'dotfree', 1, '2023-08-28 02:00:42', '2023-08-28 02:00:42', NULL),
(2, 'Fly Dayz', 'fly-dayz', 1, '2023-08-28 02:01:01', '2023-08-28 02:01:01', NULL),
(3, 'Kaynaat', 'kaynaat', 1, '2023-08-28 02:01:19', '2023-08-28 02:01:19', NULL),
(4, 'Kottony', 'kottony', 1, '2023-08-28 02:01:30', '2023-08-28 02:04:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_sections`
--

CREATE TABLE `product_sections` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `section_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_sections`
--

INSERT INTO `product_sections` (`id`, `page_id`, `section_name`, `title`, `description`, `image`, `banner_image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 'about_section', 'What Is A Private Cloud?', '<p class=\"mb-0\">A Private Cloud is a model of cloud computing where the infrastructure is dedicated to a single user organization. A private cloud can be hosted either at an organization&rsquo;s own data center, at a third-party colocation facility, or via a private cloud provider who offers private cloud hosting services and may or may not also offer traditional public shared multi-tenant cloud infrastructure. Typically, the end-user organization is responsible for the operation of a private cloud as if it were a traditional on-premises infrastructure, which includes ongoing maintenance, upgrades, OS patches, middleware, and application software management. Private Cloud Solutions offer organizations more control over and better security of private cloud servers, although it does require a much higher level of IT expertise than utilizing a public cloud.</p>\r\n<h6 dir=\"ltr\">Advantages of modern private cloud solutions for businesses:</h6>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Move from a CapEX (Capital Expenditure) cost model to an OpEX (operational expenditure) model with consumption-based pricing</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">It provides flex transaction capacity within a few minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Relocate from on-premises data centers to explore new possibilities to keep your applications and data nearby</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Whatever your rejuvenation goals, Cloudware Technology\'s private cloud solution can help you to meet your needs. If you have any special requirements, we also offer custom options from colocation to bare metal.</p>\r\n<h3 class=\"fs-18 fw-bold my-2\">&nbsp;</h3>', 'uploads/cms/cms-1690783341.png', NULL, 1, 1, NULL, '2023-07-31 00:32:21', '2023-08-07 04:34:36', NULL),
(3, 1, 'our_supported_section', 'Our Supported Private Cloud Solutions', '<p>Unlock superior performance, total control, and ultimate security with our Bare Metal Server Hosting. Tailored solutions designed to meet your applications&rsquo; demanding needs.</p>', NULL, NULL, 1, 1, NULL, '2023-07-31 00:58:51', '2023-07-31 00:58:51', NULL),
(4, 1, 'private_cloud_section', 'Private Cloud', '<p>We want to be more than your hosting provider, we want to be your hosting partner. Our team, the Most Helpful Humans in Hosting&reg;, are here for you when you need it. Helping is part of our DNA.</p>', NULL, NULL, 1, 1, NULL, '2023-07-31 01:14:45', '2023-07-31 01:14:45', NULL),
(5, 1, 'key_points_section_1', 'Simple Private Cloud Solutions For Your Big Ideas!', '<p><span style=\"color: rgb(236, 240, 241);\">Let Us Know Who You Are and Where You Want to Go, and We&rsquo;ll Get You There.</span></p>', NULL, NULL, 1, 1, NULL, '2023-07-31 01:15:22', '2023-08-01 06:27:36', NULL),
(6, 1, 'feature_section', 'Our Features', '<p>Cloudware Technologies Private Limited is one of the finest blockchain development companies located in Jaipur, India. Outsource Cloudware Technologies Private Limited and its blockchain development services and enjoy the unmatched quality of solutions.</p>', NULL, NULL, 1, 1, NULL, '2023-07-31 01:16:08', '2023-08-01 06:26:40', NULL),
(7, 1, 'choose_section', 'Choose Us Because We Are', '<p><span style=\"color: rgb(236, 240, 241);\">Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here</span></p>', 'uploads/cms/cms-1690786005.png', NULL, 1, 1, NULL, '2023-07-31 01:16:45', '2023-08-01 06:26:12', NULL),
(9, 2, 'about_section', 'Bare Metal Server', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>\r\n<p>&nbsp;</p>', 'uploads/cms/cms-20230801102119-6886.png', NULL, 1, 1, NULL, '2023-08-01 04:51:19', '2023-08-05 01:43:58', NULL),
(10, 2, 'solution_section', 'Solutions Built For Enterprises On Bare Metal Server', '<p><span style=\"color: rgb(255, 255, 255);\">Unlock superior performance, total control, and ultimate security with our Bare Metal Server Hosting. Tailored solutions designed to meet your applications&rsquo; demanding needs.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-01 04:57:59', '2023-08-01 04:57:59', NULL),
(11, 2, 'key_points_section_1', 'Simple Private Cloud Solutions For Your Big Ideas!', '<p><span style=\"color: rgb(255, 255, 255);\">Let Us Know Who You Are and Where You Want to Go, and We&rsquo;ll Get You There.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-01 05:05:43', '2023-08-01 05:21:28', NULL),
(12, 2, 'pricing_section', 'Pricing Options', '<p>Have a custom request? No Worries. We can help!</p>', NULL, NULL, 1, 1, NULL, '2023-08-01 05:09:43', '2023-08-01 05:09:43', NULL),
(13, 11, 'pricing_section', 'Pricing Section', '<p>Pricing Section</p>', NULL, NULL, 1, 1, NULL, '2023-08-05 01:52:42', '2023-08-05 01:52:42', NULL),
(14, 4, 'about_section', 'Storage & Backup as a Service', '<p>Unlock the power of seamless data protection with our Storage &amp; Backup as a Service. This is a simple and affordable way to protect your data from unwanted threats. There are no upfront costs or complicated installation procedures. You simply sign up for a plan, and your data is automatically backed up to the cloud.</p>\r\n<p><strong>Data breaches are becoming more common</strong>: In 2021, there were over 150,000 data breaches reported worldwide. This means that businesses are at an increased risk of having their data stolen or lost.</p>\r\n<p><strong>The cost of data breaches is rising</strong>: The average cost of a data breach is now over $3.8 million. This means that businesses can no longer afford to ignore the importance of data protection.</p>\r\n<p><strong>The cloud is the future of data storage</strong>: Nowadays almost every business is moving towards it. This is because the cloud offers a number of advantages over traditional on-premises storage, such as scalability, flexibility, and cost-effectiveness.</p>\r\n<p>If you are not using Storage &amp; Backup Service, you are risking your business. Contact Cloudware Technologies today and get expert advice about how we can help you to protect your data and keep your business safe.</p>', 'uploads/cms/cms-20230805112905-3632.png', NULL, 1, 1, NULL, '2023-08-05 05:59:05', '2023-08-05 05:59:05', NULL),
(15, 4, 'solution_section', 'Solutions Built For Enterprises On Storage & Backup', '<p>Unlock superior performance, total control, and ultimate security with our Bare Metal Server Hosting. Tailored solutions designed to meet your applications&rsquo; demanding needs.</p>', NULL, NULL, 1, 1, NULL, '2023-08-05 06:06:52', '2023-08-05 06:06:52', NULL),
(16, 4, 'pricing_section', 'Pricing Options', '<p>Have a custom request? No Worries. We can help!</p>', NULL, NULL, 1, 1, NULL, '2023-08-05 06:26:41', '2023-08-05 06:26:41', NULL),
(17, 4, 'our_supported_section', 'Storage & Backup For Your Big Ideas!', '<p><span style=\"color: rgb(236, 240, 241);\">Safeguard your data with reliable Storage &amp; Backup solutions for seamless business continuity.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-05 06:50:25', '2023-08-05 06:50:25', NULL),
(18, 40, 'about_section', 'Bare Metal Server as a Service', '<p dir=\"ltr\">A <strong>Bare Metal Server</strong> offers dedicated hardware resources to a single user, providing optimal performance, reliability, and security. In this server, clients get complete control over the server\'s configuration, and businesses can adjust it to their specific needs, making it an ideal choice for demanding workloads and applications.</p>\r\n<p dir=\"ltr\">In <strong>Bare Metal Servers</strong> as a service, we provide unmatched performance and reliability with dedicated hardware resources at the lowest cost. It will help you to experience optimal security, complete control over server configuration, and seamless scalability for demanding workloads. It helps you to maximize productivity with affordable bare metal servers.</p>\r\n<p>The benefits of Bare Metal are enhanced processing speeds, reduced latency, and consistent performance, resulting in faster application response times and improved user experiences. Additionally, Bare Metal Servers offer robust security, as the isolated environment minimizes the risk of data breaches and unauthorized access. Moreover, these servers provide the flexibility to run resource-intensive applications without contention, ensuring smooth and reliable operations.</p>', 'uploads/cms/cms-20230806102458-4571.png', NULL, 1, 1, NULL, '2023-08-06 04:54:58', '2023-08-07 04:59:27', NULL),
(19, 40, 'pricing_section', 'Best Prices- No Compromising in Quality', '<p>Cost effective solutions without Compormisiong in Qulaity of Infrastructure&nbsp;</p>\r\n<p>&nbsp;</p>', NULL, NULL, 1, 1, NULL, '2023-08-06 05:13:53', '2023-08-06 05:13:53', NULL),
(20, 40, 'solution_section', 'Best Solutions For Enterprises On Bare Metal Server', '<p class=\"MsoNormal\" style=\"text-align: center;\" align=\"center\"><span lang=\"EN\" style=\"color: rgb(236, 240, 241);\">Unlock superior performance, total control, and ultimate security with our Bare Metal Server Hosting. This service is specially designed for businesses to meet their applications demanding needs.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-06 06:02:28', '2023-08-07 05:00:37', NULL),
(21, 39, 'about_section', NULL, '<h6 class=\"pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-start mb-2\">What Is A&nbsp;<span class=\"text-sky   fs-25 \">Private Cloud?</span></h6>\r\n<p class=\"mb-0\">A Private Cloud is a model of cloud computing where the infrastructure is dedicated to a single-user organization. A private cloud can be hosted either at an organization&rsquo;s own data center, at a third-party colocation facility, or via a private cloud provider that offers private cloud hosting services and may or may not also offer traditional public shared multi-tenant cloud infrastructure. Typically, the end-user organization is responsible for the operation of a private cloud as if it were a traditional on-premises infrastructure, which includes ongoing maintenance, upgrades, OS patches, middleware, and application software management. Private Cloud Solutions offer organizations more control over and better security of private cloud servers, although it does require a much higher level of IT expertise than utilizing a public cloud.</p>\r\n<h3 class=\"fs-18 fw-bold my-2\">Why use Private Clouds?</h3>\r\n<p>Private Clouds offer the same control and security as traditional on-premises infrastructure. Here are some reasons why organizations opt for private cloud computing:</p>', 'uploads/cms/cms-20230807055046-1456.png', NULL, 1, 1, NULL, '2023-08-07 00:20:46', '2023-08-08 00:21:56', NULL),
(22, 39, 'solution_section', 'Our Supported Private Cloud Solutions', '<p style=\"text-align: center;\">Unlock superior performance, total control, and ultimate security with our Bare Metal Server Hosting. Tailored solutions designed to meet your applications&rsquo; demanding needs.</p>', NULL, NULL, 1, 1, NULL, '2023-08-07 00:22:51', '2023-08-07 00:23:11', NULL),
(23, 39, 'private_cloud_section', 'Private Cloud', '<div class=\"container position-relative z-index-99\">\r\n<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p class=\"fs-13 lsp-5 text-muted lh-base text-center mx-auto\" style=\"text-align: center;\">We want to be more than your hosting provider, we want to be your hosting partner. Our team, the Most Helpful Humans in Hosting&reg;, are here for you when you need it. Helping is part of our DNA.</p>\r\n</div>\r\n</div>', NULL, NULL, 1, 1, NULL, '2023-08-07 00:47:25', '2023-08-07 00:47:25', NULL),
(24, 39, 'our_supported_section', 'Simple Private Cloud Solutions For Your Big Ideas!', '<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p class=\"fs-13 lsp-5 text-white lh-base text-center mx-auto\" style=\"text-align: center;\">Let Us Know Who You Are and Where You Want to Go, and We&rsquo;ll Get You There.</p>\r\n</div>', NULL, NULL, 2, 1, NULL, '2023-08-07 01:11:28', '2023-08-07 01:19:19', NULL),
(25, 41, 'about_section', 'What is VPS Hosting', '<p>Discover a dynamic hosting solution that bridges the gap between shared hosting and dedicated servers &ndash; <strong>Virtual Private Server (VPS) Hosting</strong>. VPS Hosting involves partitioning a physical server into multiple virtual environments, each with its dedicated resources. This innovative approach combines affordability with enhanced control and performance, making it an ideal choice for businesses and individuals seeking a balance between cost-effectiveness and robust capabilities.</p>\r\n<h2>Why Choose VPS Hosting?</h2>\r\n<p><strong>VPS Hosting Solution</strong> is the answer to growing websites and applications that require more resources and autonomy than shared hosting can provide. With a VPS, you gain greater control over your environment, including the choice of operating system and software configurations. This level of customization ensures compatibility with your specific needs, applications, and workloads. Additionally, VPS hosting ensures improved security compared to shared hosting, as each virtual environment is isolated from others on the same physical server.</p>\r\n<h2>Benefits of VPS Hosting</h2>\r\n<p>The advantages of <strong>VPS Hosting </strong>are manifold. First and foremost, you experience enhanced performance and reliability. With dedicated resources allocated to your virtual environment, you\'re shielded from the performance fluctuations that can affect shared hosting. Moreover, VPS hosting provides scalability &ndash; as your needs grow, you can easily upgrade your resources without the hassle of migrating to a new server. This flexibility ensures your hosting solution grows with your business. Finally, VPS hosting empowers you with greater control over your environment, allowing you to install and configure applications, customize settings, and optimize performance according to your unique requirements.</p>\r\n<p>Upgrade to VPS hosting today and revolutionize your web presence. Experience the benefits of increased performance, security, and customization while maintaining a cost-effective hosting solution that adapts to your evolving needs. Elevate your online experience with the power of VPS hosting.</p>', 'uploads/cms/cms-20230807083311-4771.png', NULL, 1, 1, NULL, '2023-08-07 03:03:11', '2023-08-08 00:41:17', NULL),
(26, 42, 'about_section', 'Cluster Server', '<p dir=\"ltr\">Welcome to our revolutionary Cluster Hosting to unlock your website performance and reliability. This hosting solution is designed to cater for the growing demands of modern businesses to provide a scalable and powerful hosting solution. With us, you can rely on the perfect configuration of your business needs, from 2 Node Clusters to 6 Node Clusters to manage high-traffic and resource-intensive applications.</p>\r\n<p dir=\"ltr\">Our Cluster Hosting service ensures seamless load balancing, distributing traffic efficiently across multiple nodes, resulting in lightning-fast loading times and reduced website/application downtime. it will help you to enhance your user experience. With automatic failover mechanisms in place, you can rest assured that your website will remain operational even in the face of hardware failures.</p>\r\n<p dir=\"ltr\">Now you can experience the future of hosting which benefits from improved performance, unmatched reliability, and security. Our dedicated expert support team is available 24/7 to help you with any challenge. So don\'t let your website be held back by traditional hosting solutions upgrade to Cluster Hosting Service and take your online business to new heights.</p>\r\n<p>&nbsp;</p>', 'uploads/cms/cms-20230807083947-1556.png', NULL, 1, 1, NULL, '2023-08-07 03:04:26', '2023-08-07 03:09:47', NULL),
(27, 43, 'about_section', 'Dedicated GPU Server', '<p dir=\"ltr\">A GPU server is also known as a Graphics Processing Unit server. It is a high-performance computing solution that harnesses the immense processing power of GPUs for a wide range of tasks. Unlike traditional CPU servers, GPU servers excel at handling complex calculations and data-intensive workloads.</p>\r\n<h2 dir=\"ltr\">Why Choose <span style=\"color: rgb(249, 119, 57);\">GPU Server Hosting</span>?</h2>\r\n<p dir=\"ltr\">GPU servers are the best choice for professionals and industries that demand rapid data processing, intricate simulations, and advanced graphics rendering. These servers are particularly well-suited for these tasks including AI and machine learning training, scientific research, video editing, and 3D rendering. The parallel processing capabilities of GPUs allow them to handle multiple tasks simultaneously, significantly reducing processing times and increasing overall efficiency.</p>\r\n<h2 dir=\"ltr\">Benefits of <span style=\"color: rgb(249, 119, 57);\">GPU Server Hosting</span></h2>\r\n<p dir=\"ltr\">The benefits of GPU server hosting are undeniable. With their ability to perform thousands of calculations in parallel, GPU servers accelerate tasks that would take traditional servers significantly longer. This translates to faster insights, quicker results, and enhanced productivity. GPU servers also contribute to cost efficiency, as they can accomplish more in less time, reducing the need for extensive hardware setups. Whether you\'re a data scientist, researcher, designer, or engineer, GPU server hosting empowers you to tackle complex challenges and bring your projects to fruition faster than ever before.</p>', 'uploads/cms/cms-20230808070359-3452.png', NULL, 1, 1, NULL, '2023-08-07 03:12:44', '2023-08-08 01:33:59', NULL),
(28, 68, 'about_section', 'Storage & Backup as a Service', '<p dir=\"ltr\">Unlock the power of seamless data protection with our Storage &amp; Backup as a Service. This is a simple and affordable way to protect your data from unwanted threats. There are no upfront costs or complicated installation procedures. You simply sign up for a plan, and your data is automatically backed up to the cloud.</p>\r\n<h2 dir=\"ltr\">What makes this service a must for your business</h2>\r\n<p dir=\"ltr\">Data breaches are becoming more common: In 2021, there were over 150,000 data breaches reported worldwide. This means that businesses are at an increased risk of having their data stolen or lost.</p>\r\n<p dir=\"ltr\">The cost of data breaches is rising: The average cost of a data breach is now over $3.8 million. This means that businesses can no longer afford to ignore the importance of data protection.</p>\r\n<p dir=\"ltr\">The cloud is the future of data storage: Nowadays almost every business is moving towards it. This is because the cloud offers a number of advantages over traditional on-premises storage, such as scalability, flexibility, and cost-effectiveness.</p>', 'uploads/cms/cms-20230807084552-8475.png', NULL, 1, 1, NULL, '2023-08-07 03:15:52', '2023-08-09 03:15:26', '2023-08-09 03:15:26'),
(29, 75, 'about_section', 'Network & Security', '<p dir=\"ltr\"><strong>Secure your network from unwanted threats with Couldware Technologies\'s integrated network security solutions</strong></p>\r\n<p dir=\"ltr\"><strong>Every organization needs an integrated and layered security solution that can be applied across all network &amp; user endpoints</strong></p>\r\n<p dir=\"ltr\">Welcome to the realm of Network Security Solutions, where the safety of your network is our utmost priority. At Cloudware Technologies Private Limited, we believe that every business, large or small, deserves to operate in a secure and stable environment. So that we have curated a Network Protection Solution for businesses, harnessing the power of cutting-edge technology to keep cyber threats away. That empowers you to focus on what truly matters for growing your business.</p>\r\n<p dir=\"ltr\">In today\'s digital landscape, the need for robust network security is crucial for organizations. The rise of cybercrime and the constant emergence of new threats pose significant challenges to businesses. That\'s where a network security solution comes into play. It\'s a comprehensive suite of services designed to safeguard your sensitive data, preserve your reputation, and help to ensure the continuity of your operations.</p>', 'uploads/cms/cms-20230807085946-9080.png', NULL, 1, 1, NULL, '2023-08-07 03:29:46', '2023-08-07 03:29:46', NULL),
(30, 78, 'about_section', 'SAP Server', '<p>Experience the pinnacle of enterprise resource planning with SAP Server &ndash; a sophisticated, integrated software solution that redefines the way organizations manage their operations. SAP Server provides a comprehensive platform for managing various business processes, including finance, sales, procurement, manufacturing, and more. It serves as a central hub for data and insights, facilitating informed decision-making and streamlining workflows for businesses of all sizes.</p>\r\n<h3>Why Choose SAP Server?</h3>\r\n<p>SAP Server is the cornerstone of modern business management, empowering companies to optimize processes, enhance efficiency, and gain a competitive edge. It brings together data from various departments into a unified system, eliminating data silos and promoting real-time collaboration. With its robust analytics and reporting capabilities, SAP Server provides valuable insights into your organization\'s performance, enabling you to identify opportunities for growth and areas that require improvement.</p>\r\n<h3>Benefits of SAP Server</h3>\r\n<p>The advantages of SAP Servers are boundless. First and foremost, it enhances operational efficiency by automating repetitive tasks and simplifying complex processes. This results in streamlined workflows reduced manual errors, and increased productivity. Additionally, SAP Server fosters data accuracy and consistency, ensuring that decision-makers have access to reliable information for strategic planning. Moreover, SAP Server facilitates better customer engagement by enabling personalized experiences and improved responsiveness, leading to enhanced customer satisfaction and loyalty.</p>', 'uploads/cms/cms-20230807090142-4430.png', NULL, 1, 1, NULL, '2023-08-07 03:31:42', '2023-08-07 03:54:53', NULL),
(31, 41, 'solution_section', 'Solutions Built For Enterprises On VPS Hosting', '<p style=\"text-align: center;\"><span style=\"color: rgb(236, 240, 241);\">Experience the unmatched capabilities of our enterprise-grade solutions, meticulously crafted to leverage the high-performance infrastructure of VPS hosting, ensuring your business scales with unparalleled efficiency and reliability.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-07 05:50:51', '2023-08-07 05:50:51', NULL),
(32, 41, 'key_points_section_1', 'VPS Hosting Server That Offers Higher Performance', '<p style=\"text-align: center;\"><span style=\"color: rgb(236, 240, 241);\">Experience an elevated level of performance with our VPS hosting servers, designed for optimal speed and efficiency. Unlock the full potential of your online endeavours.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-07 06:08:02', '2023-08-07 06:08:02', NULL),
(33, 42, 'solution_section', 'Solutions Built For Enterprises On Cluster Server', '<p style=\"text-align: center;\"><span style=\"color: rgb(236, 240, 241);\">Elevate your enterprise with tailored solutions harnessing the power of Cluster Server technology. Unlock unparalleled efficiency and scalability for your business needs.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-07 06:50:20', '2023-08-07 06:50:20', NULL),
(34, 43, 'solution_section', 'Solutions Built For Enterprises On GPU Server', '<p style=\"text-align: center;\"><span style=\"color: rgb(236, 240, 241);\">Empower enterprises with tailored solutions utilizing the immense power of GPU servers. Unleash unparalleled performance for complex workloads and applications.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-07 06:59:20', '2023-08-07 07:01:38', NULL),
(35, 40, 'our_supported_section', 'Why choose Cloudware for Bare Metal Servers?', '<p style=\"text-align: center;\"><span style=\"color: rgb(236, 240, 241);\">Cloudware provides high performance, customization options, dedicated resources, scalability, reliability, security, and expert support. Experience the power and reliability of our services to fulfil your business needs.</span></p>', NULL, NULL, 2, 1, NULL, '2023-08-07 23:10:54', '2023-08-07 23:14:12', NULL),
(36, 40, 'key_points_section_1', 'Why choose Cloudware for Bare Metal Servers?', '<p dir=\"ltr\" style=\"text-align: center;\"><span style=\"color: rgb(236, 240, 241);\">Cloudware provides high performance, customization options, dedicated resources, scalability, reliability, security, and expert support. Experience the power and reliability of our services to fulfil your business needs.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-07 23:15:28', '2023-08-07 23:15:28', NULL),
(37, 40, 'feature_section', 'Our Features', '<p style=\"text-align: center;\">Explore our robust array of features designed to optimize your digital experience. Discover innovation, reliability, and convenience in every aspect.</p>', NULL, NULL, 1, 1, NULL, '2023-08-07 23:25:28', '2023-08-07 23:25:28', NULL),
(38, 40, 'choose_section', 'Choose Us Because We Are', NULL, NULL, NULL, 2, 1, NULL, '2023-08-08 00:14:57', '2023-08-08 00:15:28', NULL),
(39, 41, 'feature_section', 'Our Features', '<p>We encompass unparalleled performance and security, designed to propel your online endeavours. Elevate your online presence with confidence.&nbsp; Empower your business with our distinctive key features, offering seamless scalability and comprehensive support for a superior VPS Hosting experience that fuels your success.</p>', NULL, NULL, 1, 1, NULL, '2023-08-08 01:08:47', '2023-08-08 01:08:47', NULL),
(40, 42, 'key_points_section_1', 'Discover the Power of Cluster Hosting', '<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p style=\"text-align: center;\"><span style=\"color: rgb(236, 240, 241);\">Experience an elevated level of performance with our Cluster Hosting, designed for optimal speed and efficiency. Unlock the full potential of your online endeavours.</span></p>\r\n</div>', NULL, NULL, 1, 1, NULL, '2023-08-08 02:13:58', '2023-08-08 02:13:58', NULL),
(41, 43, 'key_points_section_1', 'Key Advantages of GPU Server Hosting', '<p style=\"text-align: center;\"><span style=\"color: rgb(236, 240, 241);\">Experience unparalleled computing power with GPU Server Hosting, driving AI, graphics, and scientific breakthroughs.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-08 03:17:44', '2023-08-08 03:17:59', NULL),
(42, 75, 'solution_section', 'Offering Robust Network & Security For Enterprises', '<p style=\"text-align: center;\"><span style=\"color: rgb(236, 240, 241);\">Elevate your business against cyber threats with our advanced network infrastructure and multi-layered security protocols. Which is specially designed to meet your business\'s unique needs. Our comprehensive suite of measures, including data encryption, intrusion detection, and real-time monitoring, ensures uninterrupted operations and provides the confidence to focus on growth.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-08 03:38:31', '2023-08-08 03:38:31', NULL),
(43, 78, 'solution_section', 'Empower Your Business with Cutting-Edge SAP Server Solutions', '<p style=\"text-align: center;\"><span style=\"color: rgb(236, 240, 241);\">Experience the efficiency and innovation that SAP technology brings to your business, backed by our expert support and customized solutions tailored to your unique needs.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-08 03:53:59', '2023-08-08 03:53:59', NULL),
(44, 81, 'about_section', 'Storage & Backup as a Service', '<p dir=\"ltr\">Unlock the power of seamless data protection with our Storage &amp; Backup as a Service. This is a simple and affordable way to protect your data from unwanted threats. There are no upfront costs or complicated installation procedures. You simply sign up for a plan, and your data is automatically backed up to the cloud.</p>\r\n<h2 dir=\"ltr\">What makes this service a must for your business</h2>\r\n<p dir=\"ltr\"><strong>Data breaches are becoming more common</strong>: In 2021, there were over 150,000 data breaches reported worldwide. This means that businesses are at an increased risk of having their data stolen or lost.</p>\r\n<p dir=\"ltr\"><strong>The cost of data breaches is rising</strong>: The average cost of a data breach is now over $3.8 million. This means that businesses can no longer afford to ignore the importance of data protection.</p>\r\n<p dir=\"ltr\"><strong>The cloud is the future of data storage</strong>: Nowadays almost every business is moving towards it. This is because the cloud offers a number of advantages over traditional on-premises storage, such as scalability, flexibility, and cost-effectiveness.</p>\r\n<p dir=\"ltr\">If you are not using Storage &amp; Backup Service, you are risking your business. Contact Cloudware Technologies today and get expert advice about how we can help you to protect your data and keep your business safe.</p>\r\n<p>&nbsp;</p>', 'uploads/cms/cms-20230808094122-5379.png', NULL, 1, 1, NULL, '2023-08-08 04:11:22', '2023-08-09 03:11:42', '2023-08-09 03:11:42'),
(45, 42, 'feature_section', 'Cluster Server Hosting Key Features!', '<p style=\"text-align: center;\"><span style=\"color: rgb(0, 0, 0);\">Experience unmatched reliability and performance with our Cluster Server Hosting\'s cutting-edge key features, ensuring seamless operations and optimal scalability.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-08 05:40:58', '2023-08-08 05:54:16', NULL),
(46, 43, 'feature_section', 'Key Features of a Dedicated GPU Server Hosting!', '<p>Unlock unparalleled computational capabilities with Dedicated GPU Server Hosting. Here you will experience of lightning-fast parallel processing, high-performance graphics, and robust memory capacity for tasks ranging from AI and deep learning to complex simulations and rendering.</p>', NULL, NULL, 1, 1, NULL, '2023-08-08 05:57:43', '2023-08-08 05:57:43', NULL),
(47, 75, 'feature_section', 'Our Key Features', '<p style=\"text-align: center;\">Empower your network with advanced safeguards, including robust firewalls, real-time threat monitoring, encrypted VPNs, and multi-factor authentication for comprehensive Network &amp; Security Solutions.</p>', NULL, NULL, 1, 1, NULL, '2023-08-08 06:44:47', '2023-08-08 06:44:47', NULL),
(48, 39, 'faq_section', 'Private Cloud Frequently Asked Questions', NULL, NULL, NULL, 1, 1, NULL, '2023-08-09 00:54:26', '2023-08-09 00:54:26', NULL),
(49, 83, 'about_section', 'Storage & Backup as a Service', '<p dir=\"ltr\">Unlock the power of seamless data protection with our Storage &amp; Backup as a Service. This is a simple and affordable way to protect your data from unwanted threats. There are no upfront costs or complicated installation procedures. You simply sign up for a plan, and your data is automatically backed up to the cloud.</p>\r\n<h2>What makes this service a must for your business</h2>\r\n<p dir=\"ltr\"><strong>Data breaches are becoming more common</strong>: In 2021, there were over 150,000 data breaches reported worldwide. This means that businesses are at an increased risk of having their data stolen or lost.</p>\r\n<p dir=\"ltr\"><strong>The cost of data breaches is rising</strong>: The average cost of a data breach is now over $3.8 million. This means that businesses can no longer afford to ignore the importance of data protection.</p>\r\n<p dir=\"ltr\"><strong>The cloud is the future of data storage</strong>: Nowadays almost every business is moving towards it. This is because the cloud offers a number of advantages over traditional on-premises storage, such as scalability, flexibility, and cost-effectiveness.</p>\r\n<p dir=\"ltr\">If you are not using Storage &amp; Backup Service, you are risking your business. Contact Cloudware Technologies today and get expert advice about how we can help you to protect your data and keep your business safe.</p>', 'uploads/cms/cms-20230809085525-3191.png', NULL, 1, 1, NULL, '2023-08-09 03:25:25', '2023-08-09 03:52:30', '2023-08-09 03:52:30'),
(50, 84, 'about_section', 'Storage & Backup as a Service', '<p dir=\"ltr\">Unlock the power of seamless data protection with our Storage &amp; Backup as a Service. This is a simple and affordable way to protect your data from unwanted threats. There are no upfront costs or complicated installation procedures. You simply sign up for a plan, and your data is automatically backed up to the cloud.</p>\r\n<h2 dir=\"ltr\">What makes this service a must for your business</h2>\r\n<p dir=\"ltr\">Data breaches are becoming more common: In 2021, there were over 150,000 data breaches reported worldwide. This means that businesses are at an increased risk of having their data stolen or lost.</p>\r\n<p dir=\"ltr\">The cost of data breaches is rising: The average cost of a data breach is now over $3.8 million. This means that businesses can no longer afford to ignore the importance of data protection.</p>\r\n<p dir=\"ltr\">The cloud is the future of data storage: Nowadays almost every business is moving towards it. This is because the cloud offers a number of advantages over traditional on-premises storage, such as scalability, flexibility, and cost-effectiveness.</p>\r\n<p dir=\"ltr\">If you are not using Storage &amp; Backup Service, you are risking your business. Contact Cloudware Technologies today and get expert advice about how we can help you to protect your data and keep your business safe.</p>\r\n<p>&nbsp;</p>', 'uploads/cms/cms-20230809092351-1181.png', NULL, 1, 1, NULL, '2023-08-09 03:53:51', '2023-08-09 03:53:51', NULL),
(51, 84, 'solution_section', 'Our Solutions Built For Enterprises', '<p style=\"text-align: center;\"><span style=\"color: rgb(236, 240, 241);\">Empower your enterprise with our tailor-made solutions, designed to elevate performance, efficiency, and growth.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-09 04:00:47', '2023-08-09 04:00:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_section_datas`
--

CREATE TABLE `product_section_datas` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_number` int(3) NOT NULL DEFAULT 1,
  `other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_section_datas`
--

INSERT INTO `product_section_datas` (`id`, `page_id`, `section_id`, `title`, `description`, `img`, `order_number`, `other`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Security', '<p>Private cloud security is enhanced since traffic to a private cloud is typically limited to the organization&rsquo;s own transactions. Public cloud providers must handle traffic from millions of users and transactions simultaneously, thus opening a greater chance for malicious traffic. Since private clouds consist of dedicated physical infrastructure, the organization has better control over the server, network, and application security.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-01 01:41:54', '2023-08-01 01:41:54', NULL),
(2, 1, 1, 'Predictable Performance', '<p>Because the hardware is dedicated rather than multi-tenant, workload performance is predictable and unaffected by other organizations sharing infrastructure or bandwidth.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-01 01:43:42', '2023-08-01 01:43:42', NULL),
(3, 1, 1, 'Long Terms Savings', '<p>While it can be expensive to set up the infrastructure to support a private cloud, it can pay off in the long term. If an organization already has the hardware and network required for hosting, a private cloud can be much more cost-effective over time compared to paying monthly fees to use someone else&rsquo;s servers on the public cloud.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-01 01:44:20', '2023-08-01 01:44:20', NULL),
(4, 1, 1, 'Regulatory Governance', '<p>Regulations such as the EU\'s GDPR may dictate where data resides and where computing occurs. In those regions where public cloud providers cannot offer service, a private cloud may be required. Additionally, organizations with sensitive data such as financial or legal firms may opt for private cloud storage to ensure they have complete control over personally identifiable or sensitive information.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-01 01:45:41', '2023-08-01 01:45:41', NULL),
(5, 1, 1, 'Predictable Costs', '<p>Public cloud costs can be very unpredictable based on usage, storage charges, and data egress charges. Private cloud costs are the same each month, regardless of the workloads, an organization is running or how much data is moved.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-01 01:46:20', '2023-08-01 01:46:20', NULL),
(6, 1, 3, 'Cloud Stack', NULL, 'uploads/cms/cms-20230801073338-9120.png', 1, NULL, 1, 1, NULL, '2023-08-01 02:03:38', '2023-08-01 02:03:38', NULL),
(7, 1, 3, 'Open Stack', NULL, 'uploads/cms/cms-20230801073431-9520.png', 1, NULL, 1, 1, NULL, '2023-08-01 02:04:31', '2023-08-01 02:04:31', NULL),
(8, 1, 4, 'Microsoft Hyper-V', '<p>The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy. Gone are the days when the entire responsibility of running your business website was taken care of by an internal team. With the world steadily moving up to the strategy of concentrating on your core business specialties and leaving the rest to us, who specialize in dedicated server hosting in india, you would be best served as we manage your website &amp; applications! We expertize in dedicated hosting services in india and have engaged 1000+ clientele for specialized dedicated servers.</p>', 'uploads/cms/cms-20230801073606-4530.png', 1, 'uploads/cms/cms-20230801073606-9429.png', 1, 1, NULL, '2023-08-01 02:06:06', '2023-08-01 02:06:06', NULL),
(9, 1, 5, 'Fixed Cost With No Hidden Charges', '<p><span style=\"color: rgb(255, 255, 255);\">Enjoy our premium bare metal servers without worrying about increasing costs or hidden charges. Get a single invoice every month</span></p>', 'uploads/cms/cms-20230801073715-5443.png', 1, NULL, 1, 1, 1, '2023-08-01 02:07:15', '2023-08-01 02:08:32', NULL),
(10, 1, 5, 'Private Cloud Dedicated Servers', '<p><span style=\"color: rgb(255, 255, 255);\">Rest assured, businesses enjoy the optimal performance when choosing RedSwitches for bare metal servers since all the resources are allocated</span></p>', 'uploads/cms/cms-20230801074013-9496.png', 1, NULL, 1, 1, 1, '2023-08-01 02:10:13', '2023-08-01 02:10:36', NULL),
(11, 1, 6, 'Standard DDoS Protection', '<p>Get real-time monitoring to mitigate threats and shield your website and server</p>', 'uploads/cms/cms-20230801074148-6771.png', 1, NULL, 1, 1, NULL, '2023-08-01 02:11:48', '2023-08-01 02:11:48', NULL),
(12, 1, 7, 'Tier 4 Datacenter', '<p class=\"fs-13 lsp-5  lh-base text-left text-white mx-auto\">Best Powerful Server Proactively revolutionize granular customer service after pandemic internal or customer service after pandemic internal or \"organic\" sources. Distinctively impact proactive.</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/data1.png\" alt=\"Orrish\"></span>Asia&rsquo;s Largest Rated 4 Datacenter</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/data-protection1.png\" alt=\"Orrish\"></span>Mission Critical 9 Zone Security Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/Support-comparison11.png\" alt=\"Orrish\"></span>Uninterrupted Power Power Supply Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"https://orrish.com/cloud-ware3/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>Industry Best Uptime SLA Of 99.995%</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/performance11.png\" alt=\"Orrish\"></span>Zero-Downtime Since Inception</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/support1.png\" alt=\"Orrish\"></span>24X7 Customer Support</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/domain-servers1.png\" alt=\"Orrish\"></span>Carrier Neutrality &amp; Unmatched Peering Network</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/invest-trust1.png\" alt=\"Orrish\"></span>Trusted By Bank</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, 1, '2023-08-01 02:17:49', '2023-08-01 06:32:00', NULL),
(13, 1, 7, 'Enterprise Hardware', '<p class=\"fs-13 lsp-5  lh-base  text-white text-left mx-auto\">Full Satisfaction platform Proactively revolutionize granular customer service after pandemic internal or \"organic\" sources. Distinctively impact proactive</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/data1.png\" alt=\"Orrish\"></span>Asia&rsquo;s Largest Rated 4 Datacenter</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/data-protection1.png\" alt=\"Orrish\"></span>Mission Critical 9 Zone Security Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/Support-comparison11.png\" alt=\"Orrish\"></span>Uninterrupted Power Power Supply Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"https://orrish.com/cloud-ware3/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>Industry Best Uptime SLA Of 99.995%</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/performance11.png\" alt=\"Orrish\"></span>Zero-Downtime Since Inception</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/support1.png\" alt=\"Orrish\"></span>24X7 Customer Support</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/domain-servers1.png\" alt=\"Orrish\"></span>Carrier Neutrality &amp; Unmatched Peering Network</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/invest-trust1.png\" alt=\"Orrish\"></span>Trusted By Bank</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, 1, '2023-08-01 02:18:19', '2023-08-01 06:31:01', NULL),
(14, 1, 7, 'Predociable Billing', '<p class=\"fs-13 lsp-5  lh-base text-white text-left mx-auto\">Full Satisfaction platform Proactively revolutionize granular customer service after pandemic internal or \"organic\" sources. Distinctively impact proactive</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/data1.png\" alt=\"Orrish\"></span>Asia&rsquo;s Largest Rated 4 Datacenter</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/data-protection1.png\" alt=\"Orrish\"></span>Mission Critical 9 Zone Security Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/Support-comparison11.png\" alt=\"Orrish\"></span>Uninterrupted Power Power Supply Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"https://orrish.com/cloud-ware3/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>Industry Best Uptime SLA Of 99.995%</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/performance11.png\" alt=\"Orrish\"></span>Zero-Downtime Since Inception</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/support1.png\" alt=\"Orrish\"></span>24X7 Customer Support</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/domain-servers1.png\" alt=\"Orrish\"></span>Carrier Neutrality &amp; Unmatched Peering Network</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"https://orrish.com/cloud-ware3/img/invest-trust1.png\" alt=\"Orrish\"></span>Trusted By Bank</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, 1, '2023-08-01 02:19:02', '2023-08-01 06:31:23', NULL),
(15, 2, 10, 'CDN & VPN Hosting', '<p><span style=\"color: rgb(255, 255, 255);\">Bring your CDN &amp; VPN apps to life with our superior bare metal servers. Engineered for excellence.</span></p>', 'uploads/cms/cms-20230801102934-3964.png', 1, NULL, 1, 1, 1, '2023-08-01 04:59:34', '2023-08-01 05:01:38', NULL),
(16, 1, 5, 'Scalability', '<p><span style=\"color: rgb(236, 240, 241);\">With RedSwitches, you don&rsquo;t have to worry about scalability. Our team ensures that the bare metal servers scale with your business&rsquo;s growing</span></p>', 'uploads/cms/cms-20230801120604-3663.png', 1, 'uploads/cms/cms-20230801120604-2919.png', 1, 1, 1, '2023-08-01 06:36:04', '2023-08-01 06:38:16', NULL),
(17, 1, 5, 'Optimal Support', '<p><span style=\"color: rgb(236, 240, 241);\">Issues can arise at any time of the day. That&rsquo;s why our support team is available 24 hours a day and 7 days a week. We can be contacted through</span></p>', 'uploads/cms/cms-20230801120922-2589.png', 1, 'uploads/cms/cms-20230801120922-7717.png', 1, 1, NULL, '2023-08-01 06:39:22', '2023-08-01 06:39:22', NULL),
(18, 1, 6, 'Cloud flare CDN', '<p>Speed up your website by serving site content from worldwide servers located</p>', 'uploads/cms/cms-20230801121254-4505.png', 1, 'uploads/cms/cms-20230801121254-1231.png', 1, 1, NULL, '2023-08-01 06:42:54', '2023-08-01 06:42:54', NULL),
(19, 1, 6, 'Backup Drive', '<p>All Liquid Web dedicated servers come standard with a secondary drive pre-</p>', 'uploads/cms/cms-20230801121645-9970.png', 1, NULL, 1, 1, NULL, '2023-08-01 06:46:45', '2023-08-01 06:46:45', NULL),
(20, 1, 6, 'Server Secure Advanced Security', '<p>Optimize security settings with exclusive ServerSecure protection</p>', 'uploads/cms/cms-20230801121756-1225.png', 1, NULL, 1, 1, NULL, '2023-08-01 06:47:56', '2023-08-01 06:47:56', NULL),
(21, 1, 6, 'Interworx, Plesk, Or CPanel Available', '<p>Get centralized hosting management and system-level control for all of your</p>', 'uploads/cms/cms-20230801121843-5235.png', 1, NULL, 1, 1, NULL, '2023-08-01 06:48:43', '2023-08-01 06:48:43', NULL),
(22, 1, 6, 'IPMI Access', '<p>Monitor and manage your Linux or dedicated Windows server remotely</p>', 'uploads/cms/cms-20230801122804-8610.png', 1, NULL, 1, 1, NULL, '2023-08-01 06:58:04', '2023-08-01 06:58:04', NULL),
(23, 1, 6, 'Root Access', '<p>Take full control of your server with root-level access for complete</p>', 'uploads/cms/cms-20230801122849-3946.png', 1, NULL, 1, 1, NULL, '2023-08-01 06:58:49', '2023-08-01 06:58:49', NULL),
(24, 1, 6, 'Dedicated IP Address', '<p>Enhance security and the accessibility of your server with a dedicated IP</p>', 'uploads/cms/cms-20230801123014-2300.png', 1, NULL, 1, 1, NULL, '2023-08-01 07:00:14', '2023-08-01 07:00:14', NULL),
(25, 1, 6, 'Business-Grade SSD Storage', '<p>Kick up the pace of server performance with solid-state drives to handle</p>', 'uploads/cms/cms-20230801123109-4779.png', 1, NULL, 1, 1, NULL, '2023-08-01 07:01:09', '2023-08-01 07:01:09', NULL),
(26, 1, 6, '100% Network And Power Uptime SLAs', '<p>Uptime is critical, so we guarantee your dedicated server will have power and</p>', 'uploads/cms/cms-20230801123207-4127.png', 1, NULL, 1, 1, NULL, '2023-08-01 07:02:07', '2023-08-01 07:02:07', NULL),
(27, 1, 4, 'Vmware Private Cloud', '<p>The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy. Gone are the days when the entire responsibility of running your business website was taken care of by an internal team. With the world steadily moving up to the strategy of concentrating on your core business specialties and leaving the rest to us, who specialize in dedicated server hosting in india, you would be best served as we manage your website &amp; applications! We expertize in dedicated hosting services in india and have engaged 1000+ clientele for specialized dedicated servers.</p>', 'uploads/cms/cms-20230801123550-9299.png', 1, 'uploads/cms/cms-20230801123550-2260.png', 1, 1, NULL, '2023-08-01 07:05:50', '2023-08-01 07:05:50', NULL),
(28, 1, 4, 'Openstack Private Cloud...', '<p>The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy. Gone are the days when the entire responsibility of running your business website was taken care of by an internal team. With the world steadily moving up to the strategy of concentrating on your core business specialties and leaving the rest to us, who specialize in dedicated server hosting in india, you would be best served as we manage your website &amp; applications! We expertize in dedicated hosting services in india and have engaged 1000+ clientele for specialized dedicated servers.</p>', 'uploads/cms/cms-20230801123733-624.png', 1, 'uploads/cms/cms-20230801123733-191.png', 1, 1, NULL, '2023-08-01 07:07:33', '2023-08-01 07:07:33', NULL),
(29, 1, 4, 'Apache Cloudstack', '<p>The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy. Gone are the days when the entire responsibility of running your business website was taken care of by an internal team. With the world steadily moving up to the strategy of concentrating on your core business specialties and leaving the rest to us, who specialize in dedicated server hosting in india, you would be best served as we manage your website &amp; applications! We expertize in dedicated hosting services in india and have engaged 1000+ clientele for specialized dedicated servers.</p>', 'uploads/cms/cms-20230801123852-817.png', 1, 'uploads/cms/cms-20230801123852-4683.png', 1, 1, NULL, '2023-08-01 07:08:52', '2023-08-01 07:08:52', NULL),
(30, 1, 6, 'Apiculus Private Cloud', '<p>The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy. Gone are the days when the entire responsibility of running your business website was taken care of by an internal team. With the world steadily moving up to the strategy of concentrating on your core business specialties and leaving the rest to us, who specialize in dedicated server hosting in india, you would be best served as we manage your website &amp; applications! We expertize in dedicated hosting services in india and have engaged 1000+ clientele for specialized dedicated servers.</p>', 'uploads/cms/cms-20230801124002-7013.png', 1, 'uploads/cms/cms-20230801124002-4835.png', 2, 1, 1, '2023-08-01 07:10:02', '2023-08-01 07:13:15', NULL),
(31, 1, 4, 'Apiculus Private Cloud', '<p>The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy. Gone are the days when the entire responsibility of running your business website was taken care of by an internal team. With the world steadily moving up to the strategy of concentrating on your core business specialties and leaving the rest to us, who specialize in dedicated server hosting in india, you would be best served as we manage your website &amp; applications! We expertize in dedicated hosting services in india and have engaged 1000+ clientele for specialized dedicated servers.</p>', 'uploads/cms/cms-20230801124212-4828.png', 1, 'uploads/cms/cms-20230801124212-1316.png', 1, 1, NULL, '2023-08-01 07:12:12', '2023-08-01 07:12:12', NULL),
(32, 4, 15, 'Video Streaming', '<p><span style=\"color: rgb(236, 240, 241);\">Deliver engaging content to global audiences in real-time with seamless video streaming.</span></p>', 'uploads/cms/cms-20230805114657-6417.png', 1, NULL, 1, 1, 1, '2023-08-05 06:16:57', '2023-08-05 06:18:04', NULL),
(33, 4, 15, 'Crypto Hosting', '<p><span style=\"color: rgb(236, 240, 241);\">Securely host and manage your crypto assets with our cutting-edge Crypto Hosting services.</span></p>', 'uploads/cms/cms-20230805115116-7985.jpg', 1, NULL, 1, 1, NULL, '2023-08-05 06:21:16', '2023-08-05 06:21:16', NULL),
(34, 4, 15, 'High Availability Server', NULL, 'uploads/cms/cms-20230805115445-5993.jpg', 1, NULL, 1, 1, NULL, '2023-08-05 06:24:45', '2023-08-05 06:24:45', NULL),
(35, 4, 17, 'Fixed Cost With No Hidden Charges', '<p><span style=\"color: rgb(236, 240, 241);\">Enjoy our premium bare metal servers without worrying about increasing costs or hidden charges. Get a single invoice every month based on the amount discussed initially. Our bare metal server hosting solutions allow businesses to be 100% in control of their server&rsquo;s security &amp; performance.</span></p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-05 06:53:55', '2023-08-05 06:53:55', NULL),
(36, 40, 20, 'Video Streaming', '<p class=\"MsoNormal\"><span lang=\"EN\" style=\"color: rgb(236, 240, 241);\">Get uninterrupted and high-quality best Video &amp; IPTV Streaming Solutions for all your unique business needs.</span></p>', 'uploads/cms/cms-20230808104008-4083.png', 1, NULL, 1, 1, 1, '2023-08-06 06:04:18', '2023-08-08 05:14:38', NULL),
(37, 40, 20, 'Enterprise Hosting Solutions', '<p class=\"MsoNormal\"><span lang=\"EN\" style=\"color: rgb(236, 240, 241);\">We are empowering businesses with secure, scalable, and reliable hosting solutions for seamless operations.</span></p>', 'uploads/cms/cms-20230808104027-7329.png', 1, NULL, 1, 1, 1, '2023-08-06 06:06:44', '2023-08-08 05:10:27', NULL),
(38, 40, 20, 'CDN & VPN Hosting', '<p><span lang=\"EN\" style=\"font-size: 11pt; line-height: 115%; font-family: Arial, sans-serif; color: rgb(236, 240, 241);\">Efficiently accelerate content delivery and safeguard data with our integrated CDN &amp; VPN hosting services.</span></p>', 'uploads/cms/cms-20230808104047-6717.png', 1, NULL, 1, 1, 1, '2023-08-06 06:08:18', '2023-08-08 05:10:47', NULL),
(39, 39, 22, 'OpenStack', NULL, 'uploads/cms/cms-20230807103159-8245.png', 1, 'uploads/cms/cms-20230807101841-4743.png', 1, 1, 1, '2023-08-07 00:40:13', '2023-08-07 05:01:59', NULL),
(40, 39, 22, 'VMWare', NULL, 'uploads/cms/cms-20230807061055-678.png', 1, NULL, 1, 1, NULL, '2023-08-07 00:40:55', '2023-08-07 00:40:55', NULL),
(41, 39, 22, 'Apache CloudStack', NULL, 'uploads/cms/cms-20230807061153-5648.png', 1, NULL, 1, 1, NULL, '2023-08-07 00:41:54', '2023-08-07 00:41:54', NULL),
(42, 39, 22, 'Proxmox', NULL, 'uploads/cms/cms-20230807061545-4135.png', 1, NULL, 1, 1, NULL, '2023-08-07 00:45:45', '2023-08-07 00:45:45', NULL),
(43, 39, 22, 'OpenNebula', NULL, 'uploads/cms/cms-20230807061619-8024.png', 1, NULL, 1, 1, NULL, '2023-08-07 00:46:19', '2023-08-07 00:46:19', NULL),
(44, 39, 23, 'Microsoft Hyper-V', '<div class=\"group w-full text-token-text-primary border-b border-black/10 dark:border-gray-900/50 bg-gray-50 dark:bg-[#444654]\">\r\n<div class=\"flex p-4 gap-4 text-base md:gap-6 md:max-w-2xl lg:max-w-[38rem] xl:max-w-3xl md:py-6 lg:px-0 m-auto\">\r\n<div class=\"relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]\">\r\n<div class=\"flex flex-grow flex-col gap-3\">\r\n<div class=\"min-h-[20px] flex flex-col items-start gap-3 overflow-x-auto whitespace-pre-wrap break-words\">\r\n<div class=\"markdown prose w-full break-words dark:prose-invert light AIPRM__conversation__response\">\r\n<p>Discover the pinnacle of virtualization through Microsoft Hyper-V &ndash; an advanced hypervisor platform that revolutionizes your server infrastructure. Unleash efficient resource utilization, seamless migration, dynamic scaling, enhanced security, and high availability in a single package. Choose Hyper-V for its user-friendly interface, seamless integration with Microsoft services, and trusted performance, empowering businesses of all sizes with an agile, secure, and scalable virtualization solution.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"AIPRM__sidebar-icon\" class=\"AIPRM__p-2 AIPRM__top-12 md:AIPRM__top-2 AIPRM__p-2 AIPRM__items-center AIPRM__transition-colors AIPRM__duration-200 AIPRM__cursor-pointer AIPRM__text-sm AIPRM__rounded-md AIPRM__border AIPRM__bg-white dark:AIPRM__bg-gray-800 AIPRM__border-black/10 dark:AIPRM__border-white/20 hover:AIPRM__bg-gray-50 dark:hover:AIPRM__bg-gray-700 AIPRM__cursor-pointer AIPRM__fixed AIPRM__right-4 AIPRM__z-30\" title=\"Open AIPRM sidebar\"></div>', 'uploads/cms/cms-20230807062134-6595.png', 1, 'uploads/cms/cms-20230807101918-8833.png', 1, 1, 1, '2023-08-07 00:51:34', '2023-08-07 04:52:28', NULL),
(45, 39, 23, 'Vmware Private Cloud', '<p>Experience unparalleled control and customization with VMware Private Cloud &ndash; a premium cloud solution that delivers a dedicated and secure environment for your organization\'s workloads. Seamlessly integrate your existing infrastructure while enjoying the benefits of scalable resources, robust performance, and advanced security. VMware Private Cloud empowers your business with the flexibility to tailor resources to your specific needs, ensuring optimal efficiency and innovation. Elevate your IT strategy with VMware Private Cloud and unlock the true potential of cloud computing for your enterprise.</p>', 'uploads/cms/cms-20230807062922-4687.png', 1, 'uploads/cms/cms-20230807101821-5141.png', 1, 1, 1, '2023-08-07 00:59:22', '2023-08-07 04:48:21', NULL),
(46, 39, 23, 'Openstack Private Cloud', '<div class=\"group w-full text-token-text-primary border-b border-black/10 dark:border-gray-900/50 bg-gray-50 dark:bg-[#444654]\">\r\n<div class=\"flex p-4 gap-4 text-base md:gap-6 md:max-w-2xl lg:max-w-[38rem] xl:max-w-3xl md:py-6 lg:px-0 m-auto\">\r\n<div class=\"relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]\">\r\n<div class=\"flex flex-grow flex-col gap-3\">\r\n<div class=\"min-h-[20px] flex flex-col items-start gap-3 overflow-x-auto whitespace-pre-wrap break-words\">\r\n<div class=\"markdown prose w-full break-words dark:prose-invert light AIPRM__conversation__response\">\r\n<p>Step into the future of cloud computing with OpenStack Private Cloud &ndash; a cutting-edge solution that empowers businesses to create their own private cloud environments with unprecedented flexibility and control. Seamlessly orchestrate virtual resources, manage workloads, and optimize performance, all while maintaining the security and privacy your enterprise demands. OpenStack Private Cloud offers a powerful foundation for innovation, enabling you to design, deploy, and manage applications at your pace.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"AIPRM__sidebar-icon\" class=\"AIPRM__p-2 AIPRM__top-12 md:AIPRM__top-2 AIPRM__p-2 AIPRM__items-center AIPRM__transition-colors AIPRM__duration-200 AIPRM__cursor-pointer AIPRM__text-sm AIPRM__rounded-md AIPRM__border AIPRM__bg-white dark:AIPRM__bg-gray-800 AIPRM__border-black/10 dark:AIPRM__border-white/20 hover:AIPRM__bg-gray-50 dark:hover:AIPRM__bg-gray-700 AIPRM__cursor-pointer AIPRM__fixed AIPRM__right-4 AIPRM__z-30\" title=\"Open AIPRM sidebar\"></div>', 'uploads/cms/cms-20230807063112-225.png', 1, 'uploads/cms/cms-20230807101809-3093.png', 1, 1, 1, '2023-08-07 01:01:12', '2023-08-07 04:51:57', NULL),
(47, 39, 23, 'Apache CloudStack', '<div class=\"group w-full text-token-text-primary border-b border-black/10 dark:border-gray-900/50 bg-gray-50 dark:bg-[#444654]\">\r\n<div class=\"flex p-4 gap-4 text-base md:gap-6 md:max-w-2xl lg:max-w-[38rem] xl:max-w-3xl md:py-6 lg:px-0 m-auto\">\r\n<div class=\"relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]\">\r\n<div class=\"flex flex-grow flex-col gap-3\">\r\n<div class=\"min-h-[20px] flex flex-col items-start gap-3 overflow-x-auto whitespace-pre-wrap break-words\">\r\n<div class=\"markdown prose w-full break-words dark:prose-invert light AIPRM__conversation__response\">\r\n<p>Experience the epitome of cloud management efficiency with Apache CloudStack &ndash; a robust open-source platform that enables you to effortlessly orchestrate, deploy, and manage your cloud resources. From virtual machines to storage, networking to security, CloudStack empowers you to take full command of your cloud infrastructure while ensuring seamless scalability and optimized performance.&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"AIPRM__sidebar-icon\" class=\"AIPRM__p-2 AIPRM__top-12 md:AIPRM__top-2 AIPRM__p-2 AIPRM__items-center AIPRM__transition-colors AIPRM__duration-200 AIPRM__cursor-pointer AIPRM__text-sm AIPRM__rounded-md AIPRM__border AIPRM__bg-white dark:AIPRM__bg-gray-800 AIPRM__border-black/10 dark:AIPRM__border-white/20 hover:AIPRM__bg-gray-50 dark:hover:AIPRM__bg-gray-700 AIPRM__cursor-pointer AIPRM__fixed AIPRM__right-4 AIPRM__z-30\" title=\"Open AIPRM sidebar\"></div>', 'uploads/cms/cms-20230807063249-691.png', 1, 'uploads/cms/cms-20230807102132-8467.png', 1, 1, 1, '2023-08-07 01:02:49', '2023-08-07 04:51:32', NULL),
(48, 39, 23, 'Apache Cloudstack', '<div class=\"group w-full text-token-text-primary border-b border-black/10 dark:border-gray-900/50 bg-gray-50 dark:bg-[#444654]\">\r\n<div class=\"flex p-4 gap-4 text-base md:gap-6 md:max-w-2xl lg:max-w-[38rem] xl:max-w-3xl md:py-6 lg:px-0 m-auto\">\r\n<div class=\"relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]\">\r\n<div class=\"flex flex-grow flex-col gap-3\">\r\n<div class=\"min-h-[20px] flex flex-col items-start gap-3 overflow-x-auto whitespace-pre-wrap break-words\">\r\n<div class=\"markdown prose w-full break-words dark:prose-invert light AIPRM__conversation__response\">\r\n<div class=\"group w-full text-token-text-primary border-b border-black/10 dark:border-gray-900/50 bg-gray-50 dark:bg-[#444654]\">\r\n<div class=\"flex p-4 gap-4 text-base md:gap-6 md:max-w-2xl lg:max-w-[38rem] xl:max-w-3xl md:py-6 lg:px-0 m-auto\">\r\n<div class=\"relative flex w-[calc(100%-50px)] flex-col gap-1 md:gap-3 lg:w-[calc(100%-115px)]\">\r\n<div class=\"flex flex-grow flex-col gap-3\">\r\n<div class=\"min-h-[20px] flex flex-col items-start gap-3 overflow-x-auto whitespace-pre-wrap break-words\">\r\n<div class=\"markdown prose w-full break-words dark:prose-invert light AIPRM__conversation__response\">\r\n<p>Experience the epitome of cloud management efficiency with Apache CloudStack &ndash; a robust open-source platform that enables you to effortlessly orchestrate, deploy, and manage your cloud resources. From virtual machines to storage, networking to security, CloudStack empowers you to take full command of your cloud infrastructure while ensuring seamless scalability and optimized performance. With its user-friendly interface and comprehensive feature set, Apache CloudStack is your gateway to creating, scaling, and customizing cloud environments tailored to your unique requirements. Elevate your cloud operations with Apache CloudStack and embark on a journey of simplified cloud management and unparalleled control.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'uploads/cms/cms-20230807063418-7825.png', 1, NULL, 2, 1, 1, '2023-08-07 01:04:18', '2023-08-07 01:07:52', NULL),
(49, 39, 23, 'Apiculus Private Cloud', '<p>Unlock unparalleled possibilities for your business with Apiculus Private Cloud &ndash; an advanced, secure, and fully customizable cloud solution designed to elevate your organization\'s capabilities. Seamlessly tailor your cloud environment to your unique needs, ensuring optimal resource allocation, data security, and performance. Apiculus Private Cloud empowers you to streamline operations, scale seamlessly, and drive innovation while maintaining strict control over your data and applications.</p>', 'uploads/cms/cms-20230807101942-8963.png', 1, 'uploads/cms/cms-20230807101603-6945.png', 1, 1, 1, '2023-08-07 01:05:29', '2023-08-07 04:50:13', NULL),
(50, 39, 24, 'Fixed Cost With No Hidden Charges', '<p><span style=\"color: rgb(236, 240, 241);\">Enjoy our best Private Cloud Servers without worrying about increasing costs or hidden charges. Get a single invoice every month based on the amount discussed initially. Our Private Cloud Hosting solutions allow businesses to be 100% in control of their server&rsquo;s security &amp; performance.</span></p>', NULL, 1, NULL, 1, 1, 1, '2023-08-07 01:13:21', '2023-08-07 01:17:23', NULL),
(51, 39, 24, 'Private Cloud Dedicated Servers', '<p><span style=\"color: rgb(236, 240, 241);\">Rest assured, businesses enjoy optimal performance when choosing Cloudware for Private Cloud since all the resources are allocated to you and just you. This ensures you get the best performance since we design, assemble, and maintain these servers based on your project&rsquo;s configuration needs.</span></p>', NULL, 1, NULL, 1, 1, 1, '2023-08-07 01:15:10', '2023-08-07 01:17:09', NULL),
(52, 39, 24, 'Scalability', '<p><span style=\"color: rgb(236, 240, 241);\">With Cloudware Technologies, you don&rsquo;t have to worry about scalability. Our team of experts ensures that the Private Cloud scale with your business&rsquo;s growing needs for uncompromised performance and a lag-free experience.</span></p>', NULL, 1, NULL, 1, 1, 1, '2023-08-07 01:16:27', '2023-08-07 01:16:52', NULL),
(53, 40, 20, 'Crypto Hosting', '<p><span style=\"color: rgb(236, 240, 241);\">Enhance the security and management of your valuable crypto assets through our advanced Crypto Hosting solutions.</span></p>', 'uploads/cms/cms-20230808104106-7354.png', 1, NULL, 1, 1, 1, '2023-08-07 05:07:56', '2023-08-08 05:11:06', NULL),
(54, 41, 31, 'Video Streaming', '<p dir=\"ltr\"><span style=\"color: rgb(236, 240, 241);\">Deliver captivating video and IPTV Streaming experiences with our advanced solution, revolutionizing audience engagement.</span></p>', 'uploads/cms/cms-20230808104723-8898.png', 1, NULL, 1, 1, 1, '2023-08-07 05:53:22', '2023-08-08 05:17:23', NULL),
(55, 41, 31, 'Enterprise Hosting Solutions', '<p dir=\"ltr\"><span style=\"color: rgb(236, 240, 241);\">We are empowering businesses with secure, scalable, and reliable hosting solutions for seamless operations</span></p>', 'uploads/cms/cms-20230808104753-4403.png', 1, NULL, 1, 1, 1, '2023-08-07 05:55:48', '2023-08-08 05:17:53', NULL),
(56, 41, 31, 'CDN & VPN Hosting', '<p dir=\"ltr\"><span style=\"color: rgb(236, 240, 241);\">Efficiently accelerate content delivery and safeguard data with our integrated CDN &amp; VPN hosting services.</span></p>', 'uploads/cms/cms-20230808104812-5013.png', 1, NULL, 1, 1, 1, '2023-08-07 05:56:55', '2023-08-08 05:18:12', NULL),
(57, 41, 31, 'High Availability server', '<p><span style=\"color: rgb(236, 240, 241);\">At Cloudware, we ensure uninterrupted performance and reliability with our High Availability server solutions.</span></p>', 'uploads/cms/cms-20230808104831-3142.png', 1, NULL, 1, 1, 1, '2023-08-07 06:01:55', '2023-08-08 05:18:31', NULL),
(58, 41, 32, 'Enhanced Performance', '<p dir=\"ltr\"><span style=\"color: rgb(236, 240, 241);\">VPS hosting offers dedicated resources, ensuring consistent and high-speed performance for your website or applications.</span></p>', 'uploads/cms/cms-20230807114009-3218.png', 1, NULL, 1, 1, 1, '2023-08-07 06:10:09', '2023-08-08 00:45:07', NULL),
(59, 39, 21, 'Full Control and Flexibility', '<p dir=\"ltr\">Our VPS web hosting is powered by the latest hardware and software. So you can be sure that your website or application will perform at its best. Our servers are located in multiple data centers around the world. So your website or application will be available to your users no matter where they are.</p>', NULL, 1, NULL, 2, 1, 1, '2023-08-07 06:21:53', '2023-08-08 00:26:27', NULL),
(60, 42, 33, 'Video Streaming', '<p><span style=\"color: rgb(236, 240, 241);\">Deliver seamless video streaming experiences with our cutting-edge solution, ensuring high-quality content delivery. Revolutionize your viewers\' engagement.</span></p>', 'uploads/cms/cms-20230808104927-2075.png', 1, NULL, 1, 1, 1, '2023-08-07 06:52:27', '2023-08-08 05:19:27', NULL),
(61, 42, 33, 'Enterprise Hosting Solutions', '<p><span style=\"color: rgb(236, 240, 241);\">Empower your business with our comprehensive enterprise hosting solutions, tailored to meet your scalability and performance needs. Elevate your digital presence today.</span></p>', 'uploads/cms/cms-20230808104954-95.png', 1, NULL, 1, 1, 1, '2023-08-07 06:54:15', '2023-08-08 05:19:54', NULL),
(62, 42, 33, 'CDN & VPN Hosting', '<p><span style=\"color: rgb(236, 240, 241);\">Boost your online presence with the fusion of fast content delivery and secure data transmission through our integrated CDN &amp; VPN Hosting solution.</span></p>', 'uploads/cms/cms-20230808105140-305.png', 1, NULL, 1, 1, 1, '2023-08-07 06:55:17', '2023-08-08 05:21:40', NULL),
(63, 43, 34, 'Video Streaming', '<p><span style=\"color: rgb(236, 240, 241);\">Experience flawless video streaming with our comprehensive solutions, optimized for high-quality playback and viewer satisfaction.</span></p>', 'uploads/cms/cms-20230808085538-5835.png', 1, 'uploads/cms/cms-20230808085433-6508.png', 1, 1, 1, '2023-08-07 07:03:11', '2023-08-08 03:30:56', NULL),
(64, 43, 34, 'Enterprise Hosting Solutions', '<p><span style=\"color: rgb(236, 240, 241);\">Elevate your business with our robust enterprise hosting solutions, tailored for performance, scalability, and security. Propel your digital journey forward.</span></p>', 'uploads/cms/cms-20230808085401-9809.png', 1, NULL, 1, 1, 1, '2023-08-07 07:04:23', '2023-08-08 03:24:01', NULL),
(65, 43, 34, 'CDN & VPN Hosting', '<p><span style=\"color: rgb(236, 240, 241);\">Experience seamless content delivery and enhanced security with our integrated CDN &amp; VPN hosting solution. Elevate your online presence with speed and privacy.</span></p>', 'uploads/cms/cms-20230808085513-5151.png', 1, NULL, 1, 1, 1, '2023-08-07 07:05:41', '2023-08-08 03:25:13', NULL),
(66, 40, 35, 'High Performance', '<p><span style=\"color: rgb(236, 240, 241);\">We offer powerful servers that deliver exceptional performance, enabling you to handle resource-intensive workloads and demanding applications with ease.</span></p>', NULL, 1, 'uploads/cms/cms-20230808044323-3832.png', 1, 1, NULL, '2023-08-07 23:13:23', '2023-08-07 23:13:23', NULL),
(67, 40, 36, 'High Performance', '<p><span style=\"color: rgb(236, 240, 241);\">We offer powerful servers that deliver exceptional performance, enabling you to handle resource-intensive workloads and demanding applications with ease.</span></p>', NULL, 1, 'uploads/cms/cms-20230808045056-6887.png', 1, 1, 1, '2023-08-07 23:16:51', '2023-08-07 23:20:56', NULL),
(68, 40, 36, 'Customization Options', '<p><span style=\"color: rgb(236, 240, 241);\">We provide flexible customization options, allowing you to adjust your required configurations to meet your specific requirements.</span></p>', NULL, 1, 'uploads/cms/cms-20230808045214-8921.png', 1, 1, 1, '2023-08-07 23:18:12', '2023-08-07 23:22:14', NULL),
(69, 40, 36, 'Dedicated Resources', '<p><span style=\"color: rgb(236, 240, 241);\">We offer dedicated resources solely allocated to your business. That ensures optimal performance, security, and reliability.</span></p>', NULL, 1, 'uploads/cms/cms-20230808044944-7890.png', 1, 1, 1, '2023-08-07 23:19:44', '2023-08-07 23:23:18', NULL),
(70, 40, 36, 'Scalability', '<p><span style=\"color: rgb(236, 240, 241);\">Cloudware offers seamless scalability of the server. As your business will grow, you can easily scale your server resources up or down based on your evolving needs.</span></p>', 'uploads/cms/cms-20230808045029-5228.png', 1, NULL, 1, 1, NULL, '2023-08-07 23:20:29', '2023-08-07 23:20:29', NULL),
(71, 40, 37, 'Standard DDoS Protection', '<p>Safeguard your online presence with our robust Standard DDoS Protection, ensuring uninterrupted accessibility and security.</p>', NULL, 1, 'uploads/cms/cms-20230808045733-9550.png', 1, 1, NULL, '2023-08-07 23:27:33', '2023-08-07 23:27:33', NULL),
(72, 40, 37, 'Cloudflare CDN', '<p>Elevate your website\'s performance and security with Cloudflare CDN, delivering lightning-fast content delivery worldwide.</p>', NULL, 1, 'uploads/cms/cms-20230808045845-1392.png', 1, 1, NULL, '2023-08-07 23:28:45', '2023-08-07 23:28:45', NULL),
(73, 40, 37, 'Backup Drive', '<p>Ensure data resilience and peace of mind with our reliable Backup Drive solution, safeguarding your valuable information.</p>', NULL, 1, 'uploads/cms/cms-20230808045945-5123.png', 1, 1, NULL, '2023-08-07 23:29:45', '2023-08-07 23:29:45', NULL),
(74, 40, 37, 'Server Secure Advanced Security', '<p>Fortify your server with Server Secure Advanced Security for comprehensive protection against threats.</p>', NULL, 1, 'uploads/cms/cms-20230808050930-2399.png', 1, 1, 1, '2023-08-07 23:39:30', '2023-08-07 23:43:10', NULL),
(75, 40, 37, 'Interworx, Plesk, Or CPanel Available', '<p>Choose the control panel that suits your needs &ndash; Interworx, Plesk, or cPanel available for seamless management.</p>', NULL, 1, 'uploads/cms/cms-20230808051055-3750.png', 1, 1, NULL, '2023-08-07 23:40:55', '2023-08-07 23:40:55', NULL),
(76, 40, 37, 'IPMI Access', '<p>Gain remote control and management capabilities with IPMI Access, ensuring efficient server administration.</p>', NULL, 1, 'uploads/cms/cms-20230808051457-7220.png', 1, 1, NULL, '2023-08-07 23:44:57', '2023-08-07 23:44:57', NULL),
(77, 40, 37, 'Root Access', '<p>Empower your control with Root Access, granting you full administrative privileges for server customization.</p>', NULL, 1, 'uploads/cms/cms-20230808051608-7218.png', 1, 1, NULL, '2023-08-07 23:46:08', '2023-08-07 23:46:08', NULL),
(78, 40, 37, 'Dedicated IP Address', '<p>Secure your unique online identity with a Dedicated IP Address, essential for reliable website hosting.</p>', NULL, 1, 'uploads/cms/cms-20230808051705-6240.png', 1, 1, NULL, '2023-08-07 23:47:05', '2023-08-07 23:47:05', NULL),
(79, 40, 37, 'Business-Grade SSD Storage', '<p>Elevate performance with Business-Grade SSD Storage, ensuring lightning-fast data access and responsiveness.</p>', NULL, 1, 'uploads/cms/cms-20230808051755-2100.png', 1, 1, NULL, '2023-08-07 23:47:55', '2023-08-07 23:47:55', NULL),
(80, 40, 37, '100% Network And Power Uptime SLAs', '<p>Experience uninterrupted operations with our 100% Network and Power Uptime SLAs, ensuring constant reliability.</p>', NULL, 1, 'uploads/cms/cms-20230808051856-6046.png', 1, 1, NULL, '2023-08-07 23:48:56', '2023-08-07 23:48:56', NULL),
(81, 39, 21, 'Advantages of modern private cloud solutions for businesses', '<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Move from a CAPEX (Capital Expenditure) cost model to an OpEX (operational expenditure) model with consumption-based pricing</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">It provides flex transaction capacity within a few minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Relocate from on-premises data centers to explore new possibilities to keep your applications and data nearby</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Whatever your rejuvenation goals, Cloudware Technology\'s private cloud solution can help you to meet your needs. If you have any special requirements, we also offer custom options from colocation to bare metal.</p>', NULL, 1, NULL, 2, 1, 1, '2023-08-08 00:20:56', '2023-08-08 00:22:16', NULL),
(82, 39, 21, 'Security', '<p>Private cloud security is enhanced since traffic to a private cloud is typically limited to the organization&rsquo;s own transactions. Public cloud providers must handle traffic from millions of users and transactions simultaneously, thus opening a greater chance for malicious traffic. Since private clouds consist of dedicated physical infrastructure, the organization has better control over the server, network, and application security.</p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 00:22:55', '2023-08-08 00:28:21', NULL),
(83, 39, 21, 'Predictable Performance', '<p>Because the hardware is dedicated rather than multi-tenant, workload performance is predictable and unaffected by other organizations sharing infrastructure or bandwidth.</p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 00:23:21', '2023-08-08 00:28:58', NULL),
(84, 39, 21, 'Long-Term Savings', '<p>While it can be expensive to set up the infrastructure to support a private cloud, it can pay off in the long term. If an organization already has the hardware and network required for hosting, a private cloud can be much more cost-effective over time compared to paying monthly fees to use someone else&rsquo;s servers on the public cloud.</p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 00:23:54', '2023-08-08 00:29:28', NULL),
(85, 39, 21, 'Regulatory Governance', '<p>Regulations such as the EU\'s GDPR may dictate where data resides and where computing occurs. In those regions where public cloud providers cannot offer service, a private cloud may be required. Additionally, organizations with sensitive data such as financial or legal firms may opt for private cloud storage to ensure they have complete control over personally identifiable or sensitive information.</p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 00:24:28', '2023-08-08 00:29:53', NULL),
(86, 39, 21, 'Predictable Costs', '<p>Public cloud costs can be very unpredictable based on usage, storage charges, and data egress charges. Private cloud costs are the same each month, regardless of the workloads, an organization is running or how much data is moved.</p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 00:24:51', '2023-08-08 00:30:10', NULL);
INSERT INTO `product_section_datas` (`id`, `page_id`, `section_id`, `title`, `description`, `img`, `order_number`, `other`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(87, 39, 21, 'Advantages of modern private cloud solutions for businesses', '<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Move from a CapEX (Capital Expenditure) cost model to an OpEX (operational expenditure) model with consumption-based pricing</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">It provides flex transaction capacity within a few minutes</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Relocate from on-premises data centers to explore new possibilities to keep your applications and data nearby</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\">Whatever your rejuvenation goals, Cloudware Technology\'s private cloud solution can help you to meet your needs. If you have any special requirements, we also offer custom options from colocation to bare metal.</p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 00:25:38', '2023-08-08 00:30:31', NULL),
(88, 41, 32, 'Scalability', '<p><span style=\"color: rgb(236, 240, 241);\">You can easily adjust your resources to accommodate changing needs, allowing your VPS to grow with your business.</span></p>', NULL, 1, 'uploads/cms/cms-20230808061837-125.png', 1, 1, 1, '2023-08-08 00:48:37', '2023-08-08 00:49:04', NULL),
(89, 41, 32, 'Customization', '<p><span style=\"color: rgb(236, 240, 241);\">Enjoy the freedom to customize your server environment, including software installations and configurations.</span></p>', NULL, 1, 'uploads/cms/cms-20230808062014-1830.png', 1, 1, NULL, '2023-08-08 00:50:14', '2023-08-08 00:50:14', NULL),
(90, 41, 32, 'Isolation and Security', '<p><span style=\"color: rgb(236, 240, 241);\">Benefit from improved security and stability with your own isolated virtual server, minimizing the impact of other users\' activities.</span></p>', 'uploads/cms/cms-20230808062138-4916.png', 1, NULL, 1, 1, NULL, '2023-08-08 00:51:38', '2023-08-08 00:51:38', NULL),
(91, 41, 39, 'High-Performance Resources', '<p>VPS server hosting delivers dedicated CPU, RAM, and storage, ensuring consistently high performance.</p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 01:12:21', '2023-08-08 01:13:16', NULL),
(92, 41, 39, 'Full Root Access', '<p>Enjoy complete administrative control over your VPS Server, allowing seamless installation, configuration, and management.</p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 01:12:50', '2023-08-08 01:14:09', NULL),
(93, 41, 39, 'Scalability on Demand', '<p>Effortlessly scale your resources up or down based on traffic spikes and evolving needs, optimizing your website response.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-08 01:15:26', '2023-08-08 01:15:26', NULL),
(94, 41, 39, 'Customization', '<p>Personalize your server environment by selecting your preferred operating system, software, and configurations.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-08 01:16:37', '2023-08-08 01:16:37', NULL),
(95, 41, 39, 'Isolated Environment', '<p>It ensures a distinct and secure space, shielding your server from neighbouring user activities &amp; potential security risks.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-08 01:17:55', '2023-08-08 01:17:55', NULL),
(96, 41, 39, 'Robust Security Measures', '<p>Enhance your online defences with advanced security tools like firewalls, encryption, and intrusion detection.</p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 01:19:09', '2023-08-08 01:26:21', NULL),
(97, 41, 39, 'Automated Backup Solutions', '<p>Implement automated backup protocols to protect against data loss, enabling easy recovery.</p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 01:19:38', '2023-08-08 01:27:09', NULL),
(98, 41, 39, 'Expert Technical Support', '<p>Benefit from proficient technical support offered by VPS hosting providers, ensuring smooth operation, rapid issue resolution</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-08 01:20:18', '2023-08-08 01:20:18', NULL),
(99, 41, 39, 'Cost-Effective Scaling', '<p>It is cost-effective you only pay for the resources you need. Effortlessly scale up or down without the expense and complexity of dedicated servers.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-08 01:24:12', '2023-08-08 01:24:12', NULL),
(100, 41, 39, 'Improved Data Privacy', '<p>It offers enhanced data privacy, as your virtual server operates independently, reducing the risk of unauthorized access.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-08 01:24:42', '2023-08-08 01:24:42', NULL),
(101, 42, 40, 'Reliable Uptime', '<p><span style=\"color: rgb(236, 240, 241);\">Cluster Hosting ensures non-stop availability with workload distribution across servers, keeping your website online at all times.</span></p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 02:59:36', '2023-08-08 02:59:52', NULL),
(102, 42, 40, 'Flexible Scalability', '<p><span style=\"color: rgb(236, 240, 241);\">Easily adapt to changing demands with Cluster Hosting\'s resource scalability, guaranteeing smooth performance during traffic spikes.</span></p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-08 03:00:28', '2023-08-08 03:00:28', NULL),
(103, 42, 40, 'Blazing Fast Speed', '<p><span style=\"color: rgb(236, 240, 241);\">Enjoy lightning-fast website speed as Cluster Hosting distributes load, delivering quick responses and an exceptional user experience.</span></p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-08 03:01:29', '2023-08-08 03:01:29', NULL),
(104, 42, 40, 'Advance Security', '<p><span style=\"color: rgb(236, 240, 241);\">Safeguard your data with Cluster Hosting\'s redundancy, fortifying protection against threats and offering peace of mind.</span></p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-08 03:02:50', '2023-08-08 03:02:50', NULL),
(105, 43, 41, 'High performance', '<p><span style=\"color: rgb(236, 240, 241);\">Our GPU servers are powered by NVIDIA Tesla GPUs, which provide unmatched performance for demanding applications.</span></p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-08 03:18:39', '2023-08-08 03:18:39', NULL),
(106, 43, 41, 'Scalability', '<p><span style=\"color: rgb(236, 240, 241);\">It is scalable, so you can easily add or remove GPUs as your needs change. This makes it easy to start small and scale up as your business grows.</span></p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 03:19:08', '2023-08-08 03:20:57', NULL),
(107, 43, 41, 'Cost-effective', '<p><span style=\"color: rgb(236, 240, 241);\">Our GPU Servers Hosting is cost-effective, so you can get the performance you need without breaking the bank.</span></p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-08 03:19:41', '2023-08-08 03:19:41', NULL),
(108, 43, 41, 'Reliable', '<p><span style=\"color: rgb(236, 240, 241);\">This is a reliable hosting solution, with a high uptime record. That means your applications will be up and running most of the time.</span></p>', NULL, 1, NULL, 1, 1, 1, '2023-08-08 03:20:15', '2023-08-08 03:21:55', NULL),
(109, 43, 34, 'Crypto Hosting', '<p><span style=\"color: rgb(236, 240, 241);\">Securely manage your crypto assets with our&nbsp;<strong>Crypto Hosting Solution</strong>, providing a fortified platform for seamless transactions &amp; enhanced security.</span></p>', 'uploads/cms/cms-20230808085733-8901.png', 1, NULL, 1, 1, 1, '2023-08-08 03:27:33', '2023-08-08 03:30:06', NULL),
(110, 75, 42, 'Video & IPTV Streaming', '<p><span style=\"color: rgb(236, 240, 241);\">Deliver seamless and captivating multimedia experiences with our Best Video &amp; IPTV Streaming solution.</span></p>', 'uploads/cms/cms-20230808091112-8734.png', 1, NULL, 1, 1, 1, '2023-08-08 03:41:12', '2023-08-08 03:50:16', NULL),
(111, 75, 42, 'CDN & VPN Hosting', '<p><span style=\"color: rgb(236, 240, 241);\">Get lightning-fast content delivery and enhanced data security with our integrated CDN &amp; VPN Hosting solution.</span></p>', 'uploads/cms/cms-20230808091244-9163.png', 1, NULL, 1, 1, 1, '2023-08-08 03:42:25', '2023-08-08 03:42:44', NULL),
(112, 75, 42, 'Crypto Hosting', '<p><span style=\"color: rgb(236, 240, 241);\">Securely manage your cryptocurrency assets with our comprehensive Crypto Hosting solution.</span></p>', 'uploads/cms/cms-20230808091519-1367.png', 1, NULL, 1, 1, 1, '2023-08-08 03:45:19', '2023-08-08 03:46:18', NULL),
(113, 75, 42, 'High-Availability Clusters', '<p><span style=\"color: rgb(236, 240, 241);\">Ensure uninterrupted operations with our High-Availability Clusters, delivering seamless reliability and performance for your business.</span></p>', 'uploads/cms/cms-20230808091933-1144.png', 1, NULL, 1, 1, NULL, '2023-08-08 03:49:33', '2023-08-08 03:49:33', NULL),
(114, 78, 43, 'Crypto Hosting', '<p><span style=\"color: rgb(236, 240, 241);\">Safeguard your digital wealth with our state-of-the-art Crypto Hosting, ensuring secure management of crypto assets.</span></p>', 'uploads/cms/cms-20230808092541-27.png', 1, NULL, 1, 1, 1, '2023-08-08 03:55:41', '2023-08-08 04:04:39', NULL),
(115, 78, 43, 'Video & IPTV Streaming', '<p><span style=\"color: rgb(236, 240, 241);\">Immerse your audience in unparalleled streaming experiences with our cutting-edge Video &amp; IPTV Streaming Solution.</span></p>', 'uploads/cms/cms-20230808093149-6747.png', 1, NULL, 1, 1, NULL, '2023-08-08 04:01:49', '2023-08-08 04:01:49', NULL),
(116, 78, 43, 'CDN & VPN Hosting', '<p><span style=\"color: rgb(236, 240, 241);\">Experience enhanced online performance and privacy with our integrated CDN &amp; VPN Hosting, redefining your digital journey.</span></p>', 'uploads/cms/cms-20230808093356-4136.png', 1, NULL, 1, 1, NULL, '2023-08-08 04:03:56', '2023-08-08 04:03:56', NULL),
(117, 78, 43, 'High-Availability Clusters', '<p><span style=\"color: rgb(236, 240, 241);\">Ensure seamless operations with High-Availability Clusters, providing unmatched reliability for your critical systems.</span></p>', 'uploads/cms/cms-20230808093655-2818.png', 1, NULL, 1, 1, NULL, '2023-08-08 04:06:55', '2023-08-08 04:06:55', NULL),
(118, 42, 45, 'High Availability', '<p>Ensure non-stop operations with redundant servers, minimizing downtime and maximizing reliability.</p>', 'uploads/cms/cms-20230808111625-1930.png', 1, 'uploads/cms/cms-20230808111306-6486.png', 1, 1, 1, '2023-08-08 05:43:06', '2023-08-08 05:46:25', NULL),
(119, 42, 45, 'Load Balancing', '<p>Distribute traffic evenly across servers, optimizing performance and preventing overloads.</p>', 'uploads/cms/cms-20230808111432-3334.png', 1, NULL, 1, 1, NULL, '2023-08-08 05:44:32', '2023-08-08 05:44:32', NULL),
(120, 42, 39, 'Fault Tolerance', '<p>Maintain seamless performance even if a server fails, thanks to redundant resources and failover mechanisms.</p>', 'uploads/cms/cms-20230808111507-8608.png', 1, NULL, 1, 1, 1, '2023-08-08 05:45:07', '2023-08-08 05:52:19', NULL),
(121, 42, 45, 'Scalability', '<p>Effortlessly handle increased demands by adding servers to the cluster, accommodating growing traffic.</p>', 'uploads/cms/cms-20230808111542-8158.png', 1, 'uploads/cms/cms-20230808111600-3239.png', 1, 1, 1, '2023-08-08 05:45:42', '2023-08-08 05:46:00', NULL),
(122, 42, 45, 'Resource Optimization', '<p>Utilize resources efficiently with dynamic allocation, ensuring optimal performance and cost-effectiveness.</p>', 'uploads/cms/cms-20230808111727-7313.png', 1, 'uploads/cms/cms-20230808111711-3523.png', 1, 1, 1, '2023-08-08 05:47:11', '2023-08-08 05:47:27', NULL),
(123, 42, 45, 'Data Redundancy', '<p>Safeguard data with synchronized backups across servers, minimizing the risk of data loss.</p>', 'uploads/cms/cms-20230808111800-505.png', 1, NULL, 1, 1, NULL, '2023-08-08 05:48:00', '2023-08-08 05:48:00', NULL),
(124, 42, 45, 'Enhanced Security', '<p>Strengthen security with cluster-wide measures, protecting against cyber threats and unauthorized access.</p>', 'uploads/cms/cms-20230808111834-6998.png', 1, NULL, 1, 1, NULL, '2023-08-08 05:48:34', '2023-08-08 05:48:34', NULL),
(125, 42, 45, 'Flexible Configurations', '<p>Tailor the cluster setup to match your specific needs, from web hosting to application deployment.</p>', 'uploads/cms/cms-20230808111917-2508.png', 1, NULL, 1, 1, NULL, '2023-08-08 05:49:17', '2023-08-08 05:49:17', NULL),
(126, 42, 45, 'Improved Disaster Recovery', '<p>Facilitate quick recovery from disasters by restoring operations from backup nodes, reducing downtime.</p>', 'uploads/cms/cms-20230808111946-8413.png', 1, NULL, 1, 1, NULL, '2023-08-08 05:49:46', '2023-08-08 05:49:46', NULL),
(127, 42, 45, 'Performance Boost', '<p>Harness the combined power of multiple servers for enhanced speed and responsiveness, delivering an exceptional user experience.</p>', 'uploads/cms/cms-20230808112020-2768.png', 1, NULL, 1, 1, NULL, '2023-08-08 05:50:20', '2023-08-08 05:50:20', NULL),
(128, 42, 45, 'Fault Tolerance', '<p>Maintain seamless performance even if a server fails, thanks to redundant resources and failover mechanisms.</p>', 'uploads/cms/cms-20230808112346-6659.png', 1, NULL, 1, 1, NULL, '2023-08-08 05:53:46', '2023-08-08 05:53:46', NULL),
(129, 43, 46, 'Powerful Graphics Processing', '<p>A dedicated GPU Server is equipped with high-performance graphics processing units (GPUs).</p>', 'uploads/cms/cms-20230808112959-932.png', 1, NULL, 1, 1, 1, '2023-08-08 05:59:59', '2023-08-08 06:00:33', NULL),
(130, 43, 46, 'Parallel Processing', '<p>GPUs are optimized for parallel processing, allowing them to handle multiple tasks simultaneously.</p>', 'uploads/cms/cms-20230808113115-9913.png', 1, NULL, 1, 1, 1, '2023-08-08 06:01:15', '2023-08-08 06:01:30', NULL),
(131, 43, 46, 'High Performance', '<p>GPUs server provide significantly enhanced performance compared to integrated graphics solutions.</p>', 'uploads/cms/cms-20230808113201-8593.png', 1, NULL, 1, 1, 1, '2023-08-08 06:02:01', '2023-08-08 06:10:49', NULL),
(132, 43, 46, 'Memory Capacity', '<p>It often comes with ample dedicated video memory (VRAM), which is crucial for storing and manipulating large datasets in tasks</p>', 'uploads/cms/cms-20230808113256-853.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:02:56', '2023-08-08 06:02:56', NULL),
(133, 43, 46, 'Deep Learning Capabilities', '<p>It is commonly used for deep learning tasks, the ability to accelerate neural network training</p>', 'uploads/cms/cms-20230808114209-1407.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:12:09', '2023-08-08 06:12:09', NULL),
(134, 43, 46, 'Remote Access', '<p>It offer remote access capabilities, allowing users to access and control the server from various locations</p>', 'uploads/cms/cms-20230808114316-6621.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:13:16', '2023-08-08 06:13:16', NULL),
(135, 43, 46, 'Multiple GPU Options', '<p>Depending on the server configuration, you can choose servers with multiple GPUs</p>', 'uploads/cms/cms-20230808114635-4489.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:16:35', '2023-08-08 06:16:35', NULL),
(136, 43, 46, 'Advanced Cooling Solutions', '<p>These servers are equipped with advanced cooling mechanisms to prevent overheating during</p>', 'uploads/cms/cms-20230808115015-281.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:20:15', '2023-08-08 06:20:15', NULL),
(137, 43, 46, 'Scalability', '<p>GPU servers can be part of a larger cluster setup, enabling scalability to accommodate growing computational needs.</p>', 'uploads/cms/cms-20230808115136-7708.png', 1, NULL, 1, 1, 1, '2023-08-08 06:21:36', '2023-08-08 06:22:06', NULL),
(138, 43, 46, 'Specialized Workloads', '<p>It is designed for specialized workloads such as scientific simulations, image processing, real-time graphics rendering.</p>', 'uploads/cms/cms-20230808115315-2445.png', 1, NULL, 1, 1, 1, '2023-08-08 06:23:16', '2023-08-08 06:23:31', NULL),
(139, 75, 47, 'Firewall Protection', '<p>A robust firewall safeguards your network from unauthorized access and cyber threats.</p>', 'uploads/cms/cms-20230808121621-2989.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:46:21', '2023-08-08 06:46:21', NULL),
(140, 75, 47, 'Intrusion Detection', '<p>Real-time monitoring detects and alerts against suspicious activities or breaches.</p>', 'uploads/cms/cms-20230808121714-6653.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:47:14', '2023-08-08 06:47:14', NULL),
(141, 75, 47, 'VPN Integration', '<p>Securely connect remote users and offices through encrypted Virtual Private Network (VPN) channels.</p>', 'uploads/cms/cms-20230808121813-8371.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:48:13', '2023-08-08 06:48:13', NULL),
(142, 75, 47, 'DDoS Mitigation', '<p>Shield against Distributed Denial of Service (DDoS) attacks to maintain uninterrupted services.</p>', 'uploads/cms/cms-20230808121853-4967.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:48:53', '2023-08-08 06:48:53', NULL),
(143, 75, 47, 'Traffic Encryption', '<p>Encrypt data transmissions to prevent eavesdropping and maintain data integrity.</p>', 'uploads/cms/cms-20230808121923-8409.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:49:23', '2023-08-08 06:49:23', NULL),
(144, 75, 47, 'Access Control', '<p>Fine-tuned access permissions ensure only authorized users have network entry.</p>', 'uploads/cms/cms-20230808121956-3232.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:49:56', '2023-08-08 06:49:56', NULL),
(145, 75, 47, 'Network Segmentation', '<p>Divide the network into isolated segments for enhanced security and efficient management.</p>', 'uploads/cms/cms-20230808122024-9993.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:50:24', '2023-08-08 06:50:24', NULL),
(146, 75, 47, 'Threat Intelligence', '<p>Integration with threat databases for proactive identification and prevention of emerging threats.</p>', 'uploads/cms/cms-20230808122058-9051.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:50:58', '2023-08-08 06:50:58', NULL),
(147, 75, 47, 'Authentication Mechanisms', '<p>Implement multi-factor authentication (MFA) for robust user verification.</p>', 'uploads/cms/cms-20230808122133-914.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:51:34', '2023-08-08 06:51:34', NULL),
(148, 75, 47, 'Compliance Management', '<p>Facilitate adherence to industry regulations and data protection standards.</p>', 'uploads/cms/cms-20230808122206-3941.png', 1, NULL, 1, 1, NULL, '2023-08-08 06:52:06', '2023-08-08 06:52:06', NULL),
(149, 39, 48, 'Q. What is a private cloud?', '<p dir=\"ltr\">Ans. A private cloud is a cloud solution dedicated to a single organization. It provides exclusive access to computing resources such as servers, storage, and networking, ensuring enhanced security and control.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-09 00:55:18', '2023-08-09 00:55:18', NULL),
(150, 84, 51, 'Video & IPTV Streaming', '<p>Deliver captivating visual experiences across devices with our seamless Video &amp; IPTV Streaming solution.</p>', 'uploads/cms/cms-20230809093753-2766.png', 1, NULL, 1, 1, NULL, '2023-08-09 04:07:53', '2023-08-09 04:07:53', NULL),
(151, 84, 51, 'CDN & VPN Hosting', '<p><span style=\"color: rgb(236, 240, 241);\">Experience optimized online performance and fortified data security through our integrated CDN &amp; VPN Hosting solution.</span></p>', 'uploads/cms/cms-20230809093855-1560.png', 1, NULL, 1, 1, NULL, '2023-08-09 04:08:55', '2023-08-09 04:08:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `name`, `phone`, `email`, `skype`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vikash Kumar', '8825171386', 'sd@gmail.com', 'ssdvsdv@gmail.com', 'asc', 1, '2023-08-04 23:03:00', '2023-08-04 23:03:00'),
(2, 'Rana Sharma', '8825171386', 'iamranasharma@gmail.com', 'iamranasharma@gmail.com', 'Testing', 1, '2023-08-09 03:12:12', '2023-08-09 03:12:12');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_meetings`
--

CREATE TABLE `schedule_meetings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `skype` varchar(100) NOT NULL,
  `schedule_date` varchar(100) NOT NULL,
  `schedule_time` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_meetings`
--

INSERT INTO `schedule_meetings` (`id`, `name`, `phone`, `email`, `skype`, `schedule_date`, `schedule_time`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vikash Kumar', '8825171386', 'vikash@orrish.com', 'vikash@orrish.com', '2023-08-05', '10:34', 'Testing schedule meetings', 1, '2023-08-04 23:29:10', '2023-08-04 23:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `section_datas`
--

CREATE TABLE `section_datas` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_number` int(3) NOT NULL DEFAULT 1,
  `other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section_datas`
--

INSERT INTO `section_datas` (`id`, `page_id`, `section_id`, `title`, `description`, `img`, `order_number`, `other`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'Saniatry Pads', '<p>Our experts answer all queries with their unmatched knowledge at every step of home buying.</p>', 'uploads/cms/cms-20230825055753-3057.png', 1, NULL, 1, 1, NULL, '2023-08-25 00:27:53', '2023-08-25 00:27:53', NULL),
(2, 2, 1, 'Saniatry Napkins', '<p>Our experts answer all queries with their unmatched knowledge at every step of home buying.</p>', 'uploads/cms/cms-20230825060212-9121.png', 1, NULL, 1, 1, NULL, '2023-08-25 00:32:12', '2023-08-25 00:32:12', NULL),
(3, 2, 1, 'Pantry Liners', '<p>Our experts answer all queries with their unmatched knowledge at every step of home buying.</p>', 'uploads/cms/cms-20230825060508-6260.png', 1, NULL, 1, 1, NULL, '2023-08-25 00:35:08', '2023-08-25 00:35:08', NULL),
(4, 2, 3, '2001', '<p>Rebranding &amp;amp; re-launch of &lsquo;Greenie&rsquo; as &ldquo;green trends&rdquo;, India&rsquo;s first Professional Unisex salon</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 01:19:01', '2023-08-25 01:19:01', NULL),
(5, 2, 3, '2002', '<p>Rebranding &amp;amp; re-launch of &lsquo;Greenie&rsquo; as &ldquo;green trends&rdquo;, India&rsquo;s first Professional Unisex salon</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 01:19:31', '2023-08-25 01:19:31', NULL),
(6, 2, 3, '2004', '<p>Launch of Trends Academy, centre for excellence in salon skills</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 01:21:55', '2023-08-25 01:21:55', NULL),
(7, 2, 3, '2010', '<p>Launch of 1st Franchisee salon in Nolambur , Chennai</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 01:22:30', '2023-08-25 01:22:30', NULL),
(8, 2, 3, '2013', '<p>Launch of 100th green trends salon in Kasturi Nagar, Bangalore</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 01:23:02', '2023-08-25 01:23:02', NULL),
(9, 2, 3, '2014', '<p>Launch of 200th green trends salon in RR Nagar, Bangalore</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 01:23:34', '2023-08-25 01:23:34', NULL),
(10, 2, 4, 'Potenza Since', '<p>2010</p>', 'uploads/cms/cms-20230825071101-1201.png', 1, NULL, 1, 1, NULL, '2023-08-25 01:41:01', '2023-08-25 01:41:01', NULL),
(11, 2, 4, 'Completed Projects', '<p>3000</p>', 'uploads/cms/cms-20230825071212-6755.png', 1, NULL, 1, 1, 1, '2023-08-25 01:42:12', '2023-08-25 01:44:05', NULL),
(12, 2, 4, 'Happy Clients', '<p>1500</p>', 'uploads/cms/cms-20230825071459-3038.png', 1, NULL, 1, 1, NULL, '2023-08-25 01:44:59', '2023-08-25 01:44:59', NULL),
(13, 2, 4, 'Completed Projects', '<p>24/7</p>', 'uploads/cms/cms-20230825071544-8387.png', 1, NULL, 1, 1, NULL, '2023-08-25 01:45:44', '2023-08-25 01:45:44', NULL),
(14, 4, 5, 'Products that Care', '<p>We build large-scale campuses (64 to 150+MW) to enable our customers.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 02:23:53', '2023-08-25 02:23:53', NULL),
(15, 4, 5, 'Experts that Listen', '<p><span style=\"color: rgb(255, 255, 255);\">Proven campus models promote accelerated time-to-market, delivering</span></p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 02:33:48', '2023-08-25 02:33:48', NULL),
(16, 4, 6, 'Details', '<div class=\"col-lg-4 col-md-12 \">\r\n<ul class=\"list-group list-group-borderless list-group-icon-primary-bg\">\r\n<li class=\"list-group-item\">\r\n<p class=\"mb-0\">All major brands, under one roof.</p>\r\n</li>\r\n<li class=\"list-group-item\">\r\n<p class=\"mb-0\">Streamlined asset deployment.</p>\r\n</li>\r\n<li class=\"list-group-item\">\r\n<p class=\"mb-0\">200 branch roll-out PAN India in flat 60 days.</p>\r\n</li>\r\n<li class=\"list-group-item\">\r\n<p class=\"mb-0\">Empower your workforce with industry leading end-user devices.</p>\r\n</li>\r\n</ul>\r\n</div>\r\n<div class=\"col-lg-4 col-md-12 \">\r\n<ul class=\"list-group list-group-borderless list-group-icon-primary-bg\">\r\n<li class=\"list-group-item\">\r\n<p class=\"mb-0\">Moved client from desktop to VDI</p>\r\n</li>\r\n<li class=\"list-group-item\">\r\n<p class=\"mb-0\">Monitor your Data Center for errors</p>\r\n</li>\r\n<li class=\"list-group-item\">\r\n<p class=\"mb-0\">Transform complex connectivity into simple</p>\r\n</li>\r\n<li class=\"list-group-item\">\r\n<p class=\"mb-0\">Execute Pan India at multiple locations with 300+ multi-brand certifications.</p>\r\n</li>\r\n</ul>\r\n</div>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 02:41:32', '2023-08-25 03:08:28', '2023-08-25 03:08:28'),
(17, 4, 6, 'Details', '<p>All major brands, under one roof</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 03:08:55', '2023-08-25 03:08:55', NULL),
(18, 4, 6, 'Details', '<p>Streamlined asset deployment</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 03:09:16', '2023-08-25 03:09:16', NULL),
(19, 4, 6, 'Details', '<p>200 branch roll-out PAN India in flat 60 days</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 03:10:25', '2023-08-25 03:10:25', NULL),
(20, 4, 6, 'Details', '<p>Empower your workforce with industry leading end-user devices</p>', NULL, 1, NULL, 1, 1, NULL, '2023-08-25 03:10:55', '2023-08-25 03:10:55', NULL),
(21, 2, 7, 'Mission', '<p>This slide is 100% editable, Adapt it to your needs and capture your audience\'s attention. Interested in any of our products? Talk to our experts today. And enable us to create the unthinkable and deliver the unimaginable</p>', 'uploads/cms/cms-20230825084722-4991.png', 1, NULL, 1, 1, NULL, '2023-08-25 03:17:22', '2023-08-25 03:17:22', NULL),
(22, 2, 7, 'Vision', '<p>This slide is 100% editable, Adapt it to your needs and capture your audience\'s attention. Interested in any of our products? Talk to our experts today. And enable us to create the unthinkable and deliver the unimaginable</p>', 'uploads/cms/cms-20230825084816-6810.png', 1, NULL, 1, 1, NULL, '2023-08-25 03:18:16', '2023-08-25 03:18:16', NULL),
(23, 2, 7, 'Our Goal', '<p>This slide is 100% editable, Adapt it to your needs and capture your audience\'s attention. Interested in any of our products? Talk to our experts today. And enable us to create the unthinkable and deliver the unimaginable</p>', 'uploads/cms/cms-20230825084952-7187.png', 1, NULL, 1, 1, NULL, '2023-08-25 03:19:52', '2023-08-25 03:19:52', NULL),
(24, 2, 7, 'Our Value', '<p>This slide is 100% editable, Adapt it to your needs and capture your audience\'s attention. Interested in any of our products? Talk to our experts today. And enable us to create the unthinkable and deliver the unimaginable</p>', 'uploads/cms/cms-20230825085019-3690.png', 1, NULL, 1, 1, NULL, '2023-08-25 03:20:19', '2023-08-25 03:20:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_pages`
--

CREATE TABLE `service_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `banner_img1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_img2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `advantage` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `service_sections`
--

CREATE TABLE `service_sections` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `section_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_sections`
--

INSERT INTO `service_sections` (`id`, `page_id`, `section_name`, `title`, `description`, `image`, `banner_image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, 'about_section', 'Cloud Migration Service', '<p dir=\"ltr\"><strong>Take the first step towards unlocking your business\'s true potential</strong></p>\r\n<p dir=\"ltr\">Cloudware Technologies is a gateway to a seamless journey into cloud services! Our Cloud Migration Services are designed to empower all sizes of businesses to thrive in the digital era. With our expert team, we ensure that every step of your cloud migration will be smooth, secure, and hassle-free. Now you can leave behind the limitations of outdated infrastructure and unlock the true potential of your business with our top-notch cloud migration solutions.</p>\r\n<p dir=\"ltr\">With our Cloud Migration Service, you\'ll experience seamless and efficient transitions to a scalable and secure cloud environment. That will make it easy to use it from anywhere. So, you can say that it\'s time to bid farewell to the hassles of manual data management and costly hardware maintenance. And you can embrace the freedom to access your data anytime, anywhere, without compromising your data security. Unleash the power of the cloud and witness a significant boost in productivity and collaboration.</p>\r\n<p dir=\"ltr\">You can enhance data security, automate backups, and reduce operational costs. Our expert team will work tirelessly to ensure a smooth migration process tailored to your unique business needs. Step into a world of unparalleled flexibility, reliability, and innovation. Elevate your business to new heights with Cloudware Technologies\' Cloud Migration Service today.</p>', 'uploads/cms/cms-20230808094717-2943.png', NULL, 1, 1, NULL, '2023-08-03 00:02:55', '2023-08-08 04:17:17', NULL),
(2, 12, 'key_points_section', 'Simple Cloud Migration Service For Your Big Ideas!', '<p><span style=\"color: rgb(255, 255, 255);\">Let Us Know Who You Are and Where You Want to Go, and We&rsquo;ll Get You There</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-03 00:11:37', '2023-08-03 02:18:56', NULL),
(3, 12, 'feature_section', 'Our Features', '<p>Cloudware Technologies Private Limited is one of the finest blockchain development companies located in Jaipur, India. Outsource Cloudware Technologies Private Limited and its blockchain development services and enjoy the unmatched quality of solutions, including dedicated teams, total transparency, quality assurance, up-to-date development standards, timely delivery, and outstanding support.</p>', NULL, NULL, 1, 1, NULL, '2023-08-03 00:23:48', '2023-08-03 00:23:48', NULL),
(4, 12, 'choose_section', 'Choose Us Because We Are', '<p><span style=\"color: rgb(255, 255, 255);\">Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here</span></p>', 'uploads/cms/cms-20230803055431-1415.png', NULL, 1, 1, NULL, '2023-08-03 00:24:31', '2023-08-03 02:21:47', NULL),
(5, 14, 'about_section', 'System Integration Services - Seamless Solutions for Your Business', '<p dir=\"ltr\">System integration is a process of combining different sub-component systems into one functional system. It involves connecting and merging various physical components, such as hardware and machinery, with virtual components. It may include data, software, and applications. The main aim of system integration service is to create a functional and seamless system that operates efficiently and effectively.</p>\r\n<p dir=\"ltr\">At &lt;a href=https://www.cloudwareindia.com/&gt;Cloudware Technologies&lt;/a&gt;, our system integration service involves creating the necessary connectivity to overcome any hardware and software business challenge that may occur over time.</p>\r\n<h2 dir=\"ltr\">What is System Integration?</h2>\r\n<p dir=\"ltr\">System Integration Service refers to the process of connecting various individual subsystems, applications, and components within an organization\'s IT infrastructure into an integrated system. This integration clears the way for smooth communication, data exchange, and collaboration between different parts of the organization.</p>\r\n<p dir=\"ltr\">In today\'s business environment, companies often rely on a multitude of software applications, hardware devices, databases, and networks to manage their operations. However, these disparate systems may not always communicate effectively with each other, which may cause data silos and operational inefficiencies. System Integration solves this challenge by connecting these separate systems and creating a seamless flow of information throughout the organization.</p>', 'uploads/cms/cms-20230809095656-1317.png', NULL, 1, 1, NULL, '2023-08-09 04:26:56', '2023-08-09 04:32:37', NULL),
(6, 14, 'key_points_section', NULL, '<p style=\"text-align: center;\"><span style=\"color: rgb(236, 240, 241);\">Seamlessly unify your technology landscape with our expert System Integration Services, unlocking efficient and synchronized operations.</span></p>', NULL, NULL, 1, 1, NULL, '2023-08-09 04:35:54', '2023-08-09 04:35:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service_section_datas`
--

CREATE TABLE `service_section_datas` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_number` int(3) NOT NULL DEFAULT 1,
  `other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_section_datas`
--

INSERT INTO `service_section_datas` (`id`, `page_id`, `section_id`, `title`, `description`, `img`, `order_number`, `other`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 12, 2, 'Fixed Cost With No Hidden Charges', '<p><span style=\"color: rgb(255, 255, 255);\">Enjoy our premium bare metal servers without worrying about increasing costs or hidden charges. Get a single invoice every month based on the amount discussed initially. Our bare metal server hosting solutions allow businesses to be 100% in control of their server&rsquo;s security &amp; performance.</span></p>', 'uploads/cms/cms-20230803074048-7178.png', 1, NULL, 1, 1, NULL, '2023-08-03 02:10:48', '2023-08-03 02:10:48', NULL),
(2, 12, 3, 'Standard DDoS Protection', '<p>Get real-time monitoring to mitigate threats and shield your website and server</p>', 'uploads/cms/cms-20230803075610-5379.png', 1, NULL, 1, 1, NULL, '2023-08-03 02:26:10', '2023-08-03 02:26:10', NULL),
(3, 12, 4, 'Tier 4 Datacenter', '<p class=\"fs-13 lsp-5  lh-base text-left text-white mx-auto\">Best Powerful Server Proactively revolutionize granular customer service after pandemic internal or customer service after pandemic internal or \"organic\" sources. Distinctively impact proactive.</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data1.png\" alt=\"Orrish\"></span>Asia&rsquo;s Largest Rated 4 Datacenter</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data-protection1.png\" alt=\"Orrish\"></span>Mission Critical 9 Zone Security Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/Support-comparison11.png\" alt=\"Orrish\"></span>Uninterrupted Power Power Supply Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"../../../cloudware_html/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>Industry Best Uptime SLA Of 99.995%</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/performance11.png\" alt=\"Orrish\"></span>Zero-Downtime Since Inception</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/support1.png\" alt=\"Orrish\"></span>24X7 Customer Support</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/domain-servers1.png\" alt=\"Orrish\"></span>Carrier Neutrality &amp; Unmatched Peering Network</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/invest-trust1.png\" alt=\"Orrish\"></span>Trusted By Bank</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, NULL, '2023-08-03 02:26:43', '2023-08-03 02:26:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `solution_sections`
--

CREATE TABLE `solution_sections` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `section_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `banner_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `solution_sections`
--

INSERT INTO `solution_sections` (`id`, `page_id`, `section_name`, `title`, `description`, `image`, `banner_image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'about_section', 'rana sharma purnia', '<p>fdfd</p>', 'uploads/cms/cms-20230809052234-5900.jpg', NULL, 1, 1, NULL, '2023-08-08 23:52:34', '2023-08-08 23:57:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `solution_section_datas`
--

CREATE TABLE `solution_section_datas` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_number` int(3) NOT NULL DEFAULT 1,
  `other` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `type`, `name`, `designation`, `profile_pic`, `facebook_id`, `twitter_id`, `linkedin_id`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Main Staff', 'Rishi Kumar Malhotra', 'CEO & Founder', 'uploads/staff/staff-20231115060018-4415.png', 'facebbok.co', 'twitter.com', 'likedin.com', 1, NULL, '2023-05-07 23:29:50', '2023-11-15 00:30:19'),
(2, 'Main Staff', 'Harsh Marwah', 'CEO & MD', 'uploads/staff/staff-20231115060006-6028.png', 'wefegfe', NULL, NULL, 1, NULL, '2023-05-07 23:32:03', '2023-11-15 00:30:06'),
(3, 'Main Staff', 'James Price', 'HR Manager', 'uploads/staff/staff-20231115055955-3523.png', NULL, NULL, NULL, 1, NULL, '2023-05-07 23:34:50', '2023-11-15 00:29:55'),
(4, 'Main Staff', 'jghjkhg', 'jhgjkhg', 'uploads/staff/staff-20231115055940-1224.png', 'hgjgh', 'jghjgh', 'jhgj', 2, 1, '2023-05-07 23:47:25', '2023-11-15 00:29:40'),
(5, 'Main Staff', 'Yashpal Sharma', 'CEO/Founder', 'uploads/staff/staff-20231115055929-6819.png', NULL, NULL, 'https://www.linkedin.com/in/yashpal-sharma-976081230/', 1, 1, '2023-05-29 06:10:31', '2023-11-15 00:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `name`, `email`, `created_at`, `updated_at`) VALUES
(1, NULL, 'avinash@gmail.com', '2023-05-30 03:58:23', '2023-05-30 03:58:23'),
(2, NULL, 'avinash.orrish@gmail.com', '2023-05-30 03:59:01', '2023-05-30 03:59:01'),
(3, NULL, 'hosting.octa@gmail.com', '2023-05-30 04:02:28', '2023-05-30 04:02:28'),
(4, NULL, 'rohan008smazzkart@gmail.com', '2023-07-15 06:10:23', '2023-07-15 06:10:23'),
(5, NULL, 'sdvsdv@gmail.com', '2023-07-24 07:30:42', '2023-07-24 07:30:42'),
(6, NULL, 'casc@gmail.com', '2023-08-01 06:39:13', '2023-08-01 06:39:13'),
(7, NULL, 'ran@gmail.com', '2023-08-23 04:04:23', '2023-08-23 04:04:23'),
(8, NULL, 'avinash@orrish.com', '2023-08-23 23:57:25', '2023-08-23 23:57:25');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `img`, `designation`, `message`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Saurabh Singh', 'uploads/all/all-20230809064315-3061.jpg', 'Noida', 'I am excited to express my utmost satisfaction with the private cloud service provided by Cloudware. Their commitment to data security, seamless scalability, and personalized support has truly exceeded my expectations.', 1, 1, 1, '2023-03-28 00:00:08', '2023-08-09 01:13:38', NULL),
(2, 'Saul Goodman', 'uploads/all/all-20230809063951-8485.jpg', 'New Delhi', 'I\'m delighted to endorse Cloudware\'s bare metal servers. Their raw power and dedicated resources have transformed my computing experience. For unmatched speed and reliability, I highly recommend Cloudware\'s bare metal servers.', 1, 1, 1, '2023-03-28 05:27:01', '2023-08-09 01:16:31', NULL),
(3, 'Avinash Singh', 'uploads/all/all-20231115115959-5251.png', 'UP', 'I\'m thrilled to share my outstanding experience with Cloudware\'s GPU servers. The immense processing power and accelerated performance have revolutionized my tasks. For advanced computing capabilities, I wholeheartedly recommend Cloudware\'s GPU servers.', 1, 1, 1, '2023-07-07 02:30:02', '2023-11-15 06:29:59', NULL),
(4, 'Fatma Hasan', 'uploads/all/all-20231115115946-1218.png', 'Uttam Nagar, New Delhi', 'Our Experts have been helping businesses overcome their It challenges since 1995. Our Experts have been helping businesses overcome', 2, 1, 1, '2023-07-31 01:40:16', '2023-11-15 06:29:46', NULL),
(5, 'Pawan Sharma', 'uploads/all/all-20231115115934-3649.png', 'UP', 'I am delighted to endorse Cloudware as the premier dedicated cloud service. Their seamless integration, unmatched reliability, and exceptional customer support have made them my top choice for all my cloud needs.', 1, 1, 1, '2023-07-31 06:11:30', '2023-11-21 06:51:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tips`
--

CREATE TABLE `tips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '[]',
  `country` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_like` int(11) NOT NULL DEFAULT 0,
  `total_comment` int(11) NOT NULL DEFAULT 0,
  `total_view` int(11) NOT NULL DEFAULT 0,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tips`
--

INSERT INTO `tips` (`id`, `type`, `category_id`, `title`, `description`, `blog_image`, `tags`, `country`, `slug`, `total_like`, `total_comment`, `total_view`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, NULL, 14, 'Training For Attractive Body', '<p class=\"text-start text-muted lsp-5\">Exercises for a specific part of the body should be repeated at least 3 times a week. After 6 weeks, you should achieve a measurable effect!</p>\r\n<h3 class=\"text-start lsp-5 lh-base fs-18 text-maroon fw-bold lsp-5px pt-3\">GLUTES</h3>\r\n<ul class=\"list-group mt-0 mb-0 text-start\">\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 text-muted fw-normal d-block  \"><strong>Bridge</strong>&nbsp;&ndash; Lie down on your back with hands along your body. Bend your knees, with the feet flat on the floor. Raise your hips so that your body and thighs create a straight line. Without lowering your pelvis, straighten your right knee with the foot flexed. Count to 3, lower the right foot to the floor and slowly lower your hips. Repeat with the left knee. Do 12-15 repetitions. This exercise firms your glutes.</p>\r\n</div>\r\n</li>\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Kickback</strong>&nbsp;&ndash; Kneel down with your hands on the floor. Position your hands in one line under your shoulders, while the knees under your hips. Pull in your stomach. Straighten back your right leg to the hip level. Return slowly to the initial position. Make sure your spine does not bend. Do 15-20 repetitions in a round and change the leg. This exercise firms your glutes and the back of your thighs.</p>\r\n</div>\r\n</li>\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5  text-muted fw-normal d-block  \"><strong>Raising dumbbells</strong>&nbsp;&ndash; Kneel down with your hands on the floor. Position your hands in one line under your shoulders, while the knees under your hips. Put a dumbbell in the bend of your knee. Flexing your glutes, raise your right leg back. Stop the motion when your knee goes slightly above the hip level. Lower the leg slowly to the initial position. Do not put your knee on the floor, stop it right above it. Do 12-15 repetitions. This exercise firms your glutes.</p>\r\n</div>\r\n</li>\r\n</ul>\r\n<h3 class=\"text-start lsp-5 lh-base text-uppercase fs-18 text-maroon fw-bold lsp-5px pt-3\">ABDOMEN</h3>\r\n<ul class=\"list-group mt-0 mb-0 text-start\">\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Sit-ups</strong>&nbsp;&ndash; Lie down on your back. Bend your knees, heels on the floor, feet flexed. Rest your head on your hands. Press the heels towards the floor. Pull in your stomach and raise your head, hands and shoulder blades. Make sure you do not move your chin towards your chest. Return slowly to the initial position. Do 20 repetitions in a round. This exercise mainly firms the straight abdominal muscle</p>\r\n</div>\r\n</li>\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Sit-ups II</strong>&nbsp;&ndash; Lie down on your back, bend your hips and knees so that they form a right angle. Rest your head on your hands. Pull in your stomach. Raise your head, hands and shoulder blades. At the same time, straighten you right knee so that your right leg is at a 45&deg; angle in relation to the floor. Return slowly to the initial position. Repeat with the left leg. Do 20 repetitions in a round, straightening your knees alternately. This exercise mainly firms the straight abdominal muscle.</p>\r\n</div>\r\n</li>\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Sit-ups III</strong>&nbsp;&ndash; Take one (1-3 kg) or two (1-3 kg each) dumbbells and sit on a mat. Bend your knees, heels on the floor, feet flexed. Bring your hands with the dumbbell(s) close to your chest. Pull in your stomach, retract your shoulder blades. Slowly lower your body to the lying position, vertebra after vertebra. At the same time, press the heels towards the floor. Raise your body to the sitting position. Do 15-20 repetitions in a round. This exercise mainly firms the straight abdominal muscle.</p>\r\n</div>\r\n</li>\r\n</ul>\r\n<h3 class=\"text-start lsp-5 lh-base text-uppercase fs-18 text-maroon fw-bold lsp-5px pt-3\">ARM BACK</h3>\r\n<ul class=\"list-group mt-0 mb-0 text-start\">\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Sitting elbow extension&nbsp;</strong>&ndash; Take a dumbbell (2-4 kg) to your right hand and sit cross-legged on a mat. Raise your hand with the dumbbell vertically with the back of your hand facing outwards. Place your right hand directly below your right elbow. Bend your right elbow, lowering the dumbbell towards your shoulder blade. Without moving your right arm, straighten the elbow, raising the dumbbell. Slowly bend the elbow, returning to the initial position. Do 12-15 repetitions in a round and change the hand. This exercise firms the arm backs.</p>\r\n</div>\r\n</li>\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Elbow extension in supported kneeling&nbsp;</strong>&ndash; Take a dumbbell (2-4 kg) to your right hand and adopt the supported kneeling position. Position your left hand in one line under your shoulder, while the knees under your hips. Bend your right elbow so that it forms a right angle and press it to your waist. Position the forearm and hand holding the dumbbell vertically downwards. Straighten the elbow, raising the dumbbell backwards. Make sure that your elbow does not change its position during this exercise. Slowly bend the elbow and return to the initial position. Do 12-15 repetitions in a round and change the hand. This exercise firms the arm backs.</p>\r\n</div>\r\n</li>\r\n<li class=\"list-group-item border-0 p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Push-up</strong> &ndash; Adopt the supported kneeling position and then move your hands forward by 20-30 cm. The hands, spread to the width of your shoulders, should be in one line under the shoulders. Your fingers should face forward. In such a body position, the knee bend angle will change from a right angle to an obtuse angle. Slowly bend your elbows, keeping them as close to your body as possible. In order to do this exercise correctly, do not lower your body vertically downwards, but forward. Stop the motion when your chest is close to the mat. Slowly straighten the elbows and return to the initial position. Do 12-15 repetitions in a round. This exercise firms the arm backs.</p>\r\n</div>\r\n</li>\r\n</ul>', 'uploads//-20230826092640-6393.jpg', '[\"teenagers\"]', NULL, 'training-for-attractive-body', 0, 0, 0, 'Training For Attractive Body', 'Training For Attractive Body', 'Training For Attractive Body', 1, 1, NULL, '2023-08-26 03:56:40', '2023-08-26 03:56:40', NULL),
(8, NULL, 14, 'Stretching', '<p class=\"text-start text-muted lsp-5\">Exercises for a specific part of the body should be repeated at least 3 times a week. After 6 weeks, you should achieve a measurable effect!</p>\r\n<h3 class=\"text-start lsp-5 lh-base fs-18 text-maroon fw-bold lsp-5px pt-3\">GLUTES</h3>\r\n<ul class=\"list-group mt-0 mb-0 text-start\">\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 text-muted fw-normal d-block  \"><strong>Bridge</strong>&nbsp;&ndash; Lie down on your back with hands along your body. Bend your knees, with the feet flat on the floor. Raise your hips so that your body and thighs create a straight line. Without lowering your pelvis, straighten your right knee with the foot flexed. Count to 3, lower the right foot to the floor and slowly lower your hips. Repeat with the left knee. Do 12-15 repetitions. This exercise firms your glutes.</p>\r\n</div>\r\n</li>\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Kickback</strong>&nbsp;&ndash; Kneel down with your hands on the floor. Position your hands in one line under your shoulders, while the knees under your hips. Pull in your stomach. Straighten back your right leg to the hip level. Return slowly to the initial position. Make sure your spine does not bend. Do 15-20 repetitions in a round and change the leg. This exercise firms your glutes and the back of your thighs.</p>\r\n</div>\r\n</li>\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5  text-muted fw-normal d-block  \"><strong>Raising dumbbells</strong>&nbsp;&ndash; Kneel down with your hands on the floor. Position your hands in one line under your shoulders, while the knees under your hips. Put a dumbbell in the bend of your knee. Flexing your glutes, raise your right leg back. Stop the motion when your knee goes slightly above the hip level. Lower the leg slowly to the initial position. Do not put your knee on the floor, stop it right above it. Do 12-15 repetitions. This exercise firms your glutes.</p>\r\n</div>\r\n</li>\r\n</ul>\r\n<h3 class=\"text-start lsp-5 lh-base text-uppercase fs-18 text-maroon fw-bold lsp-5px pt-3\">ABDOMEN</h3>\r\n<ul class=\"list-group mt-0 mb-0 text-start\">\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Sit-ups</strong>&nbsp;&ndash; Lie down on your back. Bend your knees, heels on the floor, feet flexed. Rest your head on your hands. Press the heels towards the floor. Pull in your stomach and raise your head, hands and shoulder blades. Make sure you do not move your chin towards your chest. Return slowly to the initial position. Do 20 repetitions in a round. This exercise mainly firms the straight abdominal muscle</p>\r\n</div>\r\n</li>\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Sit-ups II</strong>&nbsp;&ndash; Lie down on your back, bend your hips and knees so that they form a right angle. Rest your head on your hands. Pull in your stomach. Raise your head, hands and shoulder blades. At the same time, straighten you right knee so that your right leg is at a 45&deg; angle in relation to the floor. Return slowly to the initial position. Repeat with the left leg. Do 20 repetitions in a round, straightening your knees alternately. This exercise mainly firms the straight abdominal muscle.</p>\r\n</div>\r\n</li>\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Sit-ups III</strong>&nbsp;&ndash; Take one (1-3 kg) or two (1-3 kg each) dumbbells and sit on a mat. Bend your knees, heels on the floor, feet flexed. Bring your hands with the dumbbell(s) close to your chest. Pull in your stomach, retract your shoulder blades. Slowly lower your body to the lying position, vertebra after vertebra. At the same time, press the heels towards the floor. Raise your body to the sitting position. Do 15-20 repetitions in a round. This exercise mainly firms the straight abdominal muscle.</p>\r\n</div>\r\n</li>\r\n</ul>\r\n<h3 class=\"text-start lsp-5 lh-base text-uppercase fs-18 text-maroon fw-bold lsp-5px pt-3\">ARM BACK</h3>\r\n<ul class=\"list-group mt-0 mb-0 text-start\">\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Sitting elbow extension&nbsp;</strong>&ndash; Take a dumbbell (2-4 kg) to your right hand and sit cross-legged on a mat. Raise your hand with the dumbbell vertically with the back of your hand facing outwards. Place your right hand directly below your right elbow. Bend your right elbow, lowering the dumbbell towards your shoulder blade. Without moving your right arm, straighten the elbow, raising the dumbbell. Slowly bend the elbow, returning to the initial position. Do 12-15 repetitions in a round and change the hand. This exercise firms the arm backs.</p>\r\n</div>\r\n</li>\r\n<li class=\"list-group-item border-0  p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Elbow extension in supported kneeling&nbsp;</strong>&ndash; Take a dumbbell (2-4 kg) to your right hand and adopt the supported kneeling position. Position your left hand in one line under your shoulder, while the knees under your hips. Bend your right elbow so that it forms a right angle and press it to your waist. Position the forearm and hand holding the dumbbell vertically downwards. Straighten the elbow, raising the dumbbell backwards. Make sure that your elbow does not change its position during this exercise. Slowly bend the elbow and return to the initial position. Do 12-15 repetitions in a round and change the hand. This exercise firms the arm backs.</p>\r\n</div>\r\n</li>\r\n<li class=\"list-group-item border-0 p-0 d-flex\">\r\n<div class=\" ps-2\">\r\n<p class=\"fs-13 lsp-5 text-muted fw-normal d-block  \"><strong>Push-up</strong> &ndash; Adopt the supported kneeling position and then move your hands forward by 20-30 cm. The hands, spread to the width of your shoulders, should be in one line under the shoulders. Your fingers should face forward. In such a body position, the knee bend angle will change from a right angle to an obtuse angle. Slowly bend your elbows, keeping them as close to your body as possible. In order to do this exercise correctly, do not lower your body vertically downwards, but forward. Stop the motion when your chest is close to the mat. Slowly straighten the elbows and return to the initial position. Do 12-15 repetitions in a round. This exercise firms the arm backs.</p>\r\n</div>\r\n</li>\r\n</ul>', 'uploads//-20230826093928-2038.jpg', '[\"Stretching\"]', NULL, 'stretching', 0, 0, 0, 'Stretchings', 'Stretching s', 'Stretchings', 1, 1, 1, '2023-08-26 04:09:28', '2023-08-26 04:42:04', NULL),
(9, NULL, 16, 'Stretching', '<p>Physical activity is always a good idea. Are you looking for simple exercises to do even at home? Here, you will find interesting examples. Work out to have an attractive body!</p>', 'uploads//-20231122094456-7078.jpg', '[\"Stretching\"]', NULL, 'new', 0, 0, 0, 'Stretching', 'Stretching', 'Stretching', 1, 1, 1, '2023-11-22 04:05:18', '2023-11-22 04:14:56', NULL),
(10, NULL, 16, 'Training for Attractive Body', '<p>Physical activity is always a good idea. Are you looking for simple exercises to do even at home? Here, you will find interesting examples. Work out to have an attractive body!</p>', 'uploads//-20231122094036-7489.jpg', '[\"Training for Attractive Body\"]', NULL, 'training-for-attractive-body-2', 0, 0, 0, 'Training for Attractive Body', 'Training for Attractive Body', 'Training for Attractive Body', 1, 1, NULL, '2023-11-22 04:10:36', '2023-11-22 04:10:36', NULL),
(11, NULL, 16, 'Menstrual pain', '<p>Physical activity is always a good idea. Are you looking for simple exercises to do even at home? Here, you will find interesting examples. Work out to have an attractive body!</p>', 'uploads//-20231122094734-3416.jpg', '[\"Menstrual pain\"]', NULL, 'menstrual-pain', 0, 0, 0, 'Menstrual pain', 'Menstrual pain', 'Menstrual pain', 1, 1, NULL, '2023-11-22 04:17:34', '2023-11-22 04:17:34', NULL),
(12, NULL, 16, 'Hygiene During Menstruation', '<p>Physical activity is always a good idea. Are you looking for simple exercises to do even at home? Here, you will find interesting examples. Work out to have an attractive body!</p>', 'uploads//-20231122095059-251.jpg', '[\"Hygiene During Menstruation\"]', NULL, 'hygiene-during-menstruation', 0, 0, 0, 'Hygiene During Menstruation', 'Hygiene During Menstruation', 'Hygiene During Menstruation', 1, 1, NULL, '2023-11-22 04:20:59', '2023-11-22 04:20:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type_id` bigint(20) NOT NULL,
  `user_designation_id` bigint(20) NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `pincode` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ip_address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type_id`, `user_designation_id`, `first_name`, `last_name`, `mobile`, `email`, `gender`, `profile_pic`, `email_verified_at`, `address`, `country`, `state`, `city`, `pincode`, `status`, `ip_address`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Admin', 'Admin', '8825171386', 'admin@gmail.com', 'Male', NULL, NULL, 'Srinagar', NULL, 0, 0, '85431', 1, NULL, NULL, 0, NULL, '2023-03-14 15:43:46', '2023-03-14 17:38:19'),
(3, 3, 2, 'Avinash', 'Singh', '9876543210', 'avinash@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-03-29 06:09:48', '2023-03-29 06:09:48'),
(7, 3, 2, 'Customer', 'Singh', '9874125630', 'admin@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-03-29 23:38:31', '2023-03-29 23:38:31'),
(9, 3, 2, 'test', 'ip', '9988776655', 'test@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-04-08 01:48:40', '2023-04-08 01:48:40'),
(10, 3, 2, 'test', 'ip2', '1234565432', 'test1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '::1', NULL, NULL, NULL, '2023-04-08 01:50:08', '2023-04-08 06:18:04'),
(12, 3, 2, 'test2', NULL, '9988998877', 'test2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '::1', NULL, NULL, NULL, '2023-04-08 01:56:26', '2023-04-08 06:17:30'),
(13, 3, 2, 'Avinash', 'Singh', '7210840621', 'avinash@gmail.commm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '::1', NULL, NULL, NULL, '2023-05-30 01:38:35', '2023-05-30 01:38:35'),
(15, 4, 2, 'Vikash Kumar', NULL, '7645830199', 'vikash@orrish.com', NULL, 'uploads/staff/staff-20230802060003-4371.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-07-06 20:39:20', '2023-08-02 00:30:03'),
(16, 4, 2, 'abhishek parmar', NULL, '12453698974', 'abhi@gmail.com', NULL, 'uploads/staff/staff-20230801105615-4106.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-08-01 05:26:15', '2023-08-01 05:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_designations`
--

CREATE TABLE `user_designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_designations`
--

INSERT INTO `user_designations` (`id`, `designation_id`, `user_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, 0, '2023-03-14 21:15:07', '2023-03-14 21:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_type_id` bigint(20) NOT NULL DEFAULT 1,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `last_login_time` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`id`, `user_id`, `user_type_id`, `username`, `password`, `status`, `last_login_time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'admin@gmail.com', '123456', 1, '2023-03-15 09:12:22', '2023-03-14 22:12:22', '2023-08-24 03:22:39'),
(2, 7, 3, 'admin@example.com', '123456', 1, NULL, '2023-03-29 23:38:31', '2023-03-30 05:36:36'),
(3, 8, 3, 'fd@fdg.com', '444444', 1, NULL, '2023-04-08 01:47:27', '2023-04-08 07:22:44'),
(4, 9, 3, 'test@gmail.com', '123456', 1, NULL, '2023-04-08 01:48:40', '2023-04-08 07:22:41'),
(5, 10, 3, 'test1@gmail.com', '123456', 0, NULL, '2023-04-08 01:50:08', '2023-04-08 06:18:04'),
(7, 12, 3, 'test2@gmail.com', '123456', 0, NULL, '2023-04-08 01:56:26', '2023-04-08 06:17:30'),
(8, 13, 3, 'avinash@gmail.commm', '123456', 1, NULL, '2023-05-30 01:38:35', '2023-05-30 01:38:35'),
(9, 16, 4, 'abhi@gmail.com', '123456', 1, NULL, '2023-08-01 05:26:15', '2023-08-01 05:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE `user_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 1, 1, 0, '2023-03-14 21:15:49', '2023-03-29 10:06:51'),
(2, 'Admin', 1, 1, NULL, '2023-03-29 10:06:30', '2023-03-29 10:06:54'),
(3, 'User', 1, 1, NULL, '2023-03-29 10:06:30', '2023-03-29 10:06:57');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `link`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test', 'https://www.youtube.com/embed/wwQk8yrPjs0', 1, 1, 0, '2023-06-30 01:50:30', '2023-06-30 01:50:30', NULL),
(2, 'test1', 'https://www.youtube.com/embed/wwQk8yrPjs0', 1, 1, 1, '2023-06-30 01:51:02', '2023-06-30 01:51:58', NULL),
(3, 'Video testimonial', 'https://www.youtube.com/embed/wwQk8yrPjs0', 1, 1, 1, '2023-07-07 02:30:53', '2023-07-07 02:31:23', NULL),
(4, 'Testings', 'https://www.youtube.com/embed/wwQk8yrPjs0', 1, 1, 1, '2023-08-04 05:01:43', '2023-08-04 05:02:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_likes`
--
ALTER TABLE `blog_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_views`
--
ALTER TABLE `blog_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_settings`
--
ALTER TABLE `business_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_solutions`
--
ALTER TABLE `business_solutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_leads`
--
ALTER TABLE `customer_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_categories`
--
ALTER TABLE `faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_categories`
--
ALTER TABLE `image_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry_cms_pages`
--
ALTER TABLE `industry_cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry_page_sections`
--
ALTER TABLE `industry_page_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry_section_datas`
--
ALTER TABLE `industry_section_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_enquiries`
--
ALTER TABLE `job_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_designations`
--
ALTER TABLE `master_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_partners`
--
ALTER TABLE `master_partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_products`
--
ALTER TABLE `master_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_services`
--
ALTER TABLE `master_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_solutions`
--
ALTER TABLE `master_solutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_sections`
--
ALTER TABLE `page_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_sections`
--
ALTER TABLE `partner_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_section_datas`
--
ALTER TABLE `partner_section_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portfolio_galleries`
--
ALTER TABLE `portfolio_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricings`
--
ALTER TABLE `pricings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing_enqs`
--
ALTER TABLE `pricing_enqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricing_types`
--
ALTER TABLE `pricing_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sections`
--
ALTER TABLE `product_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_section_datas`
--
ALTER TABLE `product_section_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_meetings`
--
ALTER TABLE `schedule_meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_datas`
--
ALTER TABLE `section_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_pages`
--
ALTER TABLE `service_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_sections`
--
ALTER TABLE `service_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_section_datas`
--
ALTER TABLE `service_section_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solution_sections`
--
ALTER TABLE `solution_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `solution_section_datas`
--
ALTER TABLE `solution_section_datas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_designations`
--
ALTER TABLE `user_designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog_likes`
--
ALTER TABLE `blog_likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_views`
--
ALTER TABLE `blog_views`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `business_solutions`
--
ALTER TABLE `business_solutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `customer_leads`
--
ALTER TABLE `customer_leads`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faq_categories`
--
ALTER TABLE `faq_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `image_categories`
--
ALTER TABLE `image_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `industry_cms_pages`
--
ALTER TABLE `industry_cms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industry_page_sections`
--
ALTER TABLE `industry_page_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `industry_section_datas`
--
ALTER TABLE `industry_section_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_enquiries`
--
ALTER TABLE `job_enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `master_designations`
--
ALTER TABLE `master_designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_partners`
--
ALTER TABLE `master_partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master_products`
--
ALTER TABLE `master_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `master_services`
--
ALTER TABLE `master_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `master_solutions`
--
ALTER TABLE `master_solutions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `page_sections`
--
ALTER TABLE `page_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `partner_sections`
--
ALTER TABLE `partner_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `partner_section_datas`
--
ALTER TABLE `partner_section_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio_galleries`
--
ALTER TABLE `portfolio_galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pricings`
--
ALTER TABLE `pricings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pricing_enqs`
--
ALTER TABLE `pricing_enqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pricing_types`
--
ALTER TABLE `pricing_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_sections`
--
ALTER TABLE `product_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_section_datas`
--
ALTER TABLE `product_section_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule_meetings`
--
ALTER TABLE `schedule_meetings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_datas`
--
ALTER TABLE `section_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `service_pages`
--
ALTER TABLE `service_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_sections`
--
ALTER TABLE `service_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_section_datas`
--
ALTER TABLE `service_section_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `solution_sections`
--
ALTER TABLE `solution_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `solution_section_datas`
--
ALTER TABLE `solution_section_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tips`
--
ALTER TABLE `tips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_designations`
--
ALTER TABLE `user_designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
