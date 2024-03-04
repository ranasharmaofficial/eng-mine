-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 08:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloudware_db`
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `type`, `category_id`, `title`, `description`, `blog_image`, `tags`, `country`, `slug`, `total_like`, `total_comment`, `total_view`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'blog', 11, 'Testing Blog', '<div>\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n<div>&nbsp;</div>', 'uploads/blog/blog-1690275273.jpg', '[\"blogs\",\"testblogs\",\"sports\",\"delhi\",\"india\"]', 100, 'testing-blog', 0, 0, 1, 'Testing Blog', 'Testing Blog', 'Testing Blog', 1, 1, NULL, '2023-07-25 03:24:33', '2023-07-25 03:24:50'),
(2, 'blog', 12, 'Handflul Of Model Structures', '<div class=\"base-header2 mb-4 mt-4\">\r\n<p>A new promising chapter for the protection of the natural environment started in Rhodes with the beginning of cooperation for the alternative management of waste from excavations, constructions and demolitions, between the Dodecanese Recycling and Esperia Group.</p>\r\n</div>\r\n<div>\r\n<div class=\"article-sec2 d-flex g-3 justify-content-between\">&nbsp;</div>\r\n<div class=\"article-sec2 d-flex g-3 justify-content-between\">\r\n<div class=\"base-header2 mb-4 mt-4\">\r\n<p>A new promising chapter for the protection of the natural environment started in Rhodes with the beginning of cooperation for the alternative management of waste from excavations, constructions and demolitions, between the Dodecanese Recycling and Esperia Group.</p>\r\n</div>\r\n<div>\r\n<div class=\"article-sec2 d-flex g-3 justify-content-between\">&nbsp;</div>\r\n<div class=\"article-sec2 d-flex g-3 justify-content-between\">\r\n<div class=\"base-header2 mb-4 mt-4\">\r\n<p>A new promising chapter for the protection of the natural environment started in Rhodes with the beginning of cooperation for the alternative management of waste from excavations, constructions and demolitions, between the Dodecanese Recycling and Esperia Group.</p>\r\n</div>\r\n<div>\r\n<div class=\"article-sec2 d-flex g-3 justify-content-between\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>', 'uploads/blog/blog-1690281634.png', '[\"sports\"]', 19, 'handflul-of-model-structures', 0, 0, 0, 'Handflul Of Model Structures', 'Handflul Of Model Structures', 'Handflul Of Model Structures', 1, 1, 1, '2023-07-25 05:10:34', '2023-07-25 05:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint(20) NOT NULL,
  `blog_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `comment` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `user_id`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 13, 'Test', 1, '2023-05-30 02:17:17', '2023-05-30 07:47:33'),
(2, 1, 13, 'testing', 1, '2023-05-30 02:17:47', '2023-05-30 07:47:54');

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
(25, 1, '::1', '2023-07-25');

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
(1, 'social_media', 'facebook', 'facebook.com1', 1, '2023-04-26 03:51:10', '2023-04-26 07:12:49'),
(2, 'social_media', 'twitter', 'twitter.com1', 1, '2023-04-26 03:51:10', '2023-04-26 07:12:49'),
(3, 'social_media', 'linkedin', 'linkedin.com1', 1, '2023-04-26 03:51:10', '2023-04-26 07:12:49'),
(4, 'social_media', 'skype', 'skype.com1', 1, '2023-04-26 03:51:10', '2023-04-26 07:12:49'),
(5, 'social_media', 'instagram', 'instagram.com 1231', 1, '2023-04-26 03:51:32', '2023-04-26 07:12:49'),
(6, 'header_setup', 'customer_support_number', '011-223344', 1, '2023-04-26 06:07:49', '2023-07-07 01:21:29'),
(7, 'header_setup', 'sales_number', '+91-9876543210', 1, '2023-04-26 06:07:49', '2023-07-07 01:21:29'),
(9, 'header_setup', 'header_logo', 'uploads/logo/logo-1689063816.svg', 1, '2023-04-26 06:14:53', '2023-07-11 02:53:36'),
(10, 'footer_setup', 'footer_description', NULL, 1, '2023-04-27 00:16:16', '2023-07-07 01:22:30'),
(11, 'footer_setup', 'copyright_widget', '©2022-2023 All Rights Reserved by <a class=\"link-secondary\" href=\"https://orrish.com\">Cloudware Technologies Private Limited</a>.', 1, '2023-04-27 00:16:17', '2023-07-11 05:34:49'),
(12, 'footer_setup', 'contact_address', 'Unit No 304-305, 3rd Floor, Tower B4, Spaze I Tech Park, Sohna Road, Sector 49 Gurugram, Haryana, 122018', 1, '2023-04-27 00:41:17', '2023-07-15 04:20:10'),
(13, 'footer_setup', 'contact_phone', '0124 4286 901', 1, '2023-04-27 00:41:17', '2023-07-15 04:20:10'),
(14, 'footer_setup', 'contact_email', 'info@cloudwareindia.com </br> support@cloudwareindia.com', 1, '2023-04-27 00:41:17', '2023-07-15 04:20:10'),
(15, 'footer_setup', 'contact_working_hr', 'Monday To Saturday: 09.30am To 18.30pm\r\nSunday : Closed', 1, '2023-04-27 00:41:17', '2023-07-15 04:20:10'),
(17, 'footer_setup', 'footer_logo', 'uploads/logo/logo-1682576072.png', 1, '2023-04-27 00:44:32', '2023-04-27 00:44:32'),
(31, 'footer_widget_one_lable', 'widget_one_name', 'ABOUT BUSSINESS ONLINE SERVICE', 1, '2023-04-27 06:26:23', '2023-07-07 02:34:56'),
(32, 'footer_widget_one_links', '[\"Flight Booking\",\"Lable 2\"]', '[\"https:\\/\\/orrish.net\\/bos\\/public\\/service-details\\/flight-booking-service\",\"Link 2\"]', 1, '2023-04-27 06:26:23', '2023-07-07 02:34:56'),
(33, 'footer_widget_two_lable', 'widget_two_name', 'Quick Links', 1, '2023-04-27 06:56:34', '2023-04-27 06:56:34'),
(34, 'footer_widget_two_links', '[\"test lable\"]', '[\"test link\"]', 1, '2023-04-27 06:56:34', '2023-04-27 06:58:11'),
(35, 'footer_widget_three_lable', 'widget_three_name', 'NAVIGATION', 1, '2023-04-27 06:57:25', '2023-07-05 06:27:20'),
(36, 'footer_widget_three_links', '[\"About Us\",\"Blog\",\"Contact Us\",\"Gallery\",\"News\",\"Testimonial\"]', '[\"#\",\"#\",\"#\",\"#\",\"#\",\"#\"]', 1, '2023-04-27 06:57:25', '2023-07-07 01:24:21'),
(37, 'corporate_office_contact', '[\"office1@gmail.com1\",\"office2@gmail.com2\",\"gdfgd\"]', '[\"98765432101\",\"98765432112\",\"gfdgdf\"]', 1, '2023-05-23 06:16:45', '2023-05-23 06:41:45'),
(38, 'corporate_office_address', '[\"Milap Nager, Uttam Nager, 1100591\",\"Milap Nager, Uttam Nager, 1100601\",\"fdgdfg\"]', '[\"Monday\",\"regre1\",\"gdfgdfgd\"]', 1, '2023-05-23 06:18:06', '2023-05-23 06:41:45'),
(39, 'global_office_contact', '[\"testglobal@gmail.com\"]', '[\"7896541230\"]', 1, '2023-05-23 06:47:41', '2023-05-23 06:47:41'),
(40, 'global_office_address', '[\"test address\"]', '[\"test timing\"]', 1, '2023-05-23 06:47:41', '2023-05-23 06:47:41'),
(41, 'footer_setup', 'corporate_address', 'Unit No 304-305, 3rd Floor, Tower B4, Spaze I Tech Park, Sohna Road, Sector 49 Gurugram, Haryana, 122018', 1, '2023-04-27 00:41:17', '2023-07-11 05:20:07'),
(42, 'footer_setup', 'leads_uk_address', 'Suite 2, High Street House, Yeadon, Leeds - LS19 7PP', 1, '2023-04-27 00:41:17', '2023-07-11 05:20:07'),
(43, 'footer_setup', 'registered_address', '42nd Floor, SCO No 8, Sector 10 A, Gurgaon, Haryana, 122001', 1, '2023-04-27 00:41:17', '2023-07-11 05:20:07'),
(44, 'footer_setup', 'registered_address_phone', '+91-0124 4286 901', 1, '2023-04-27 00:41:17', '2023-07-11 05:20:07'),
(45, 'footer_setup', 'leads_uk_address_phone', '+44-9994443211, 9994443211', 1, '2023-04-27 00:41:17', '2023-07-11 05:20:07'),
(46, 'footer_setup', 'corporate_address_phone', '+91 9994443211', 1, '2023-04-27 00:41:17', '2023-07-11 05:20:07'),
(47, 'footer_setup', 'registered_address_email', 'support@cloudwareindia.com', 1, '2023-04-27 00:41:17', '2023-07-15 04:15:20'),
(48, 'footer_setup', 'corporate_address_email', 'info@cloudwareindia.com', 1, '2023-04-27 00:41:17', '2023-07-15 04:15:20'),
(49, 'footer_setup', 'skype', 'cloudwareindia', 1, '2023-04-27 00:41:17', '2023-07-15 07:14:13'),
(50, 'footer_setup', 'telegram', 'info@cloudwareindia.com', 1, '2023-04-27 00:41:17', '2023-07-15 07:23:25'),
(51, 'footer_setup', 'whatsapp', '+91-0124-4286-901', 1, '2023-04-27 00:41:17', '2023-07-15 07:23:25');

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type`, `parent_id`, `title`, `icon`, `slug`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'blog', 0, 'The Stories Behind Blog1', NULL, 'the-stories-behind-blog1', 1, 1, 1, '2023-05-09 00:16:40', '2023-05-09 00:26:05'),
(2, 'blog', 0, 'The Stories Behind Blog2', NULL, 'the-stories-behind-blog2', 1, 1, 1, '2023-05-09 00:16:50', '2023-05-09 00:24:44'),
(3, 'news', 0, 'The Stories Behind News1', NULL, 'the-stories-behind-news1', 1, 1, NULL, '2023-05-09 00:26:20', '2023-05-09 00:26:20'),
(4, 'news', 0, 'The Stories Behind News2', NULL, 'the-stories-behind-news2', 1, 1, NULL, '2023-05-09 00:26:33', '2023-05-09 00:26:33'),
(5, 'event', 0, 'The Stories Behind Event1', NULL, 'the-stories-behind-event1', 1, 1, NULL, '2023-05-09 00:26:54', '2023-05-09 00:26:54'),
(6, 'event', 0, 'The Stories Behind Event2', NULL, 'the-stories-behind-event2', 1, 1, NULL, '2023-05-09 00:27:06', '2023-05-09 00:27:06'),
(7, 'case_study', 0, 'Enterprise', NULL, 'enterprise', 1, 1, NULL, '2023-05-25 01:26:28', '2023-05-25 01:26:28'),
(8, 'case_study', 0, 'Insurance', NULL, 'insurance', 0, 1, 1, '2023-05-25 01:26:57', '2023-07-07 02:21:33'),
(9, 'case_study', 0, 'Manufacturing', NULL, 'manufacturing', 0, 1, 1, '2023-05-25 01:27:36', '2023-07-07 02:21:27'),
(10, 'blog', 0, 'The Stories Behind Blog3', NULL, 'the-stories-behind-blog3', 1, 1, NULL, '2023-07-05 05:36:59', '2023-07-05 05:36:59'),
(11, 'blog', 0, 'Blog Category 4', NULL, 'blog-category-4', 1, 1, NULL, '2023-07-07 02:22:41', '2023-07-07 02:22:41'),
(12, 'blog', 0, 'Sports', NULL, 'sports', 1, 1, NULL, '2023-07-25 04:58:50', '2023-07-25 04:58:50');

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

INSERT INTO `cms_pages` (`id`, `parent_id`, `title`, `page_url`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Home', 'index', 'Home', 'Home', 'Home', 1, 1, NULL, '2023-07-15 03:32:28', '2023-07-15 03:32:28'),
(2, 0, 'About Us', 'about-us', 'About Us', 'About Us', 'About Us', 1, 1, NULL, '2023-07-15 03:32:48', '2023-07-15 03:32:48'),
(3, 0, 'Contact Us', 'contact-us', 'Contact Us', 'Contact Us', 'Contact Us', 1, 1, NULL, '2023-07-15 03:33:06', '2023-07-15 03:33:06'),
(4, 0, 'Common', 'common', 'Common', 'Common', 'Common', 1, 1, NULL, '2023-07-24 07:13:14', '2023-07-24 07:13:14');

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

--
-- Dumping data for table `customer_leads`
--

INSERT INTO `customer_leads` (`id`, `name`, `email`, `contact`, `budget`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Diesel', 'iamranasharma@gmail.com', '9199758612', NULL, 'We recently helped a small business grow from break-even to over $1m profit in less than 2 years. Please find below contact details and contact us today', 1, '2023-07-15 05:13:47', '2023-07-15 05:13:47'),
(2, 'Diesel', 'iamranasharma@gmail.com', '9199758612', NULL, 'We recently helped a small business grow from break-even to over $1m profit in less than 2 years. Please find below contact details and contact us today', 1, '2023-07-15 05:14:22', '2023-07-15 05:14:22'),
(3, 'Rana', 'aaron1234@gmail.com', '9199758612', NULL, 'qwqfqwf', 1, '2023-07-15 05:17:13', '2023-07-15 05:17:13'),
(4, 'Avinash Singh', 'avinash@orrish.com', '8677833069', NULL, 'Test message', 1, '2023-07-15 07:27:09', '2023-07-15 07:27:09'),
(5, 'Diesel', 'aaron1234@gmail.com', '9199758612', NULL, 'cas', 1, '2023-07-15 07:28:51', '2023-07-15 07:28:51');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `faq_type`, `faq_category`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'How Do I Ensure That My Business Stays Ahead Of My Competition In Online Visibility ?', '<p>Our mission is to exceed the expectations of our Partners and maintain the highest respect in our industry by providing customized, responsive, and on-time services that add value to our Sponsor efforts to discover, develop, and enhance products in regulated international environments. We excel as a high performance, high quality organization because of our scientific knowledge and experience, integrity, trust, teamwork, and dedication to strong and enduring Sponsor relationships to our clients in the pharmaceutical, biotechnology, and medical device industries by providing high-quality consulting, solutions and services for the development of life science products.</p>', 1, '2023-07-22 05:26:54', '2023-07-22 05:26:54'),
(2, 1, 1, 'Do We Need To Meet In Person?', '<div class=\"accordion-item  bg-light-green rounded overflow-hidden py-0 mb-2 mt-1 px-2\">\r\n<div id=\"collapse2e\" class=\"accordion-collapse px-2 collapse show\" data-bs-parent=\"#vsaccordion\">\r\n<div class=\"accordion-body px-0\">\r\n<p class=\"h-150 overflow-y scrollbar-width mb-0\">Our vision is to continuously strive to raise the standard of excellence through accuracy, efficiency, and innovation in the pharmaceutical industry to simplify business challenges, maximize human potential to deliver high quality output to get our client&rsquo;s drug or medical product approved faster and to contribute to a safer and better world.</p>\r\n</div>\r\n</div>\r\n</div>', 1, '2023-07-22 05:27:30', '2023-07-22 05:27:30');

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
(1, 1, 'General Enquiry', 1, '2023-07-22 03:40:26', '2023-07-22 03:40:26'),
(2, 1, 'Shared Hosting', 1, '2023-07-22 03:41:24', '2023-07-22 09:11:48'),
(3, 1, 'VPS Hosting', 1, '2023-07-22 03:42:01', '2023-07-22 04:25:10'),
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
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `category_id`, `description`, `image`, `icon`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(7, 1, '<p><strong>Data Center ie Fullful Needs</strong></p>\n<p><span style=\"font-size: 18pt; color: rgb(224, 62, 45);\"><strong>Enterprise Hosting</strong></span></p>\n<p><span style=\"font-size: 12pt; color: rgb(0, 0, 0);\">Cheap dedicated server in india... Best platform to buy un-managed, cloud linux, highly scalable, secured, high speed performance provider. Cost effective and more reliable Linux dedicated server in India.</span></p>', 'uploads/all/all-1689074717.png', NULL, 1, 1, NULL, '2023-07-11 05:55:17', '2023-07-11 11:40:37'),
(8, 1, '<p>Data Center ie Fullful Needs.</p>\n<p><span style=\"color: rgb(224, 62, 45);\"><strong><span style=\"font-size: 18pt;\">Dedicated Server</span></strong></span></p>\n<p><span style=\"color: rgb(224, 62, 45); font-size: 12pt;\"><span style=\"color: rgb(0, 0, 0);\">Cheap dedicated server in india... Best platform to buy un-managed, cloud linux, highly scalable, secured, high speed performance provider. Cost effective and &lt;br&gt;more reliable Linux dedicated server in India.</span></span></p>', 'uploads/all/all-1689075008.png', NULL, 1, 1, NULL, '2023-07-11 06:00:08', '2023-07-11 11:40:21'),
(9, 1, '<p><span style=\"color: rgb(236, 240, 241);\">Data Center ie Fullful Needs.</span></p>\n<p><span style=\"\"><strong><span style=\"color: rgb(255, 255, 255);font-size: 18pt;\">Hosting Solutions</span></strong></span></p>\n<p><span style=\"color: rgb(236, 240, 241); font-size: 12pt;\">Cheap dedicated server in india... Best platform to buy un-managed, cloud linux, highly scalable, secured, high speed performance provider. Cost effective and more reliable Linux dedicated server in India.</span></p>', 'uploads/all/all-1689075091.png', NULL, 1, 1, 1, '2023-07-11 06:01:31', '2023-07-11 11:41:48'),
(10, 3, '<p>NA</p>', 'uploads/all/all-1689940183.png', NULL, 1, 1, NULL, '2023-07-21 06:19:43', '2023-07-21 06:19:43'),
(11, 3, '<p>NA</p>', 'uploads/all/all-1689940218.jpg', NULL, 1, 1, NULL, '2023-07-21 06:20:19', '2023-07-21 06:20:19'),
(12, 3, '<p>NA</p>', 'uploads/all/all-1689940232.jpg', NULL, 1, 1, NULL, '2023-07-21 06:20:32', '2023-07-21 06:20:32'),
(13, 4, '<p>a</p>', 'uploads/all/all-1689943849.jpg', NULL, 1, 1, NULL, '2023-07-21 07:20:49', '2023-07-21 07:20:49'),
(14, 4, '<p>a</p>', 'uploads/all/all-1689943862.jpg', NULL, 1, 1, NULL, '2023-07-21 07:21:02', '2023-07-21 07:21:02'),
(15, 4, '<p>a</p>', 'uploads/all/all-1689943871.jpg', NULL, 1, 1, NULL, '2023-07-21 07:21:11', '2023-07-21 07:21:11'),
(16, 4, '<p>a</p>', 'uploads/all/all-1689943881.jpg', NULL, 1, 1, NULL, '2023-07-21 07:21:21', '2023-07-21 07:21:21'),
(17, 5, '<p>a</p>', 'uploads/all/all-1689943894.png', NULL, 1, 1, NULL, '2023-07-21 07:21:34', '2023-07-21 07:21:34'),
(18, 5, '<p>a</p>', 'uploads/all/all-1689943909.png', NULL, 1, 1, NULL, '2023-07-21 07:21:49', '2023-07-21 07:21:49'),
(19, 1, '<h2>Welcome to Cloudware</h2>', 'uploads/all/all-1690283630.png', NULL, 1, 1, NULL, '2023-07-25 05:43:50', '2023-07-25 05:43:50');

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image_categories`
--

INSERT INTO `image_categories` (`id`, `parent_id`, `title`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Home Banners', 1, 1, 1, '2023-05-02 03:33:26', '2023-06-19 00:50:00'),
(2, 0, 'Gallery', 1, 1, NULL, '2023-06-13 03:31:10', '2023-06-13 03:31:10'),
(3, 0, 'Partners', 1, 1, NULL, '2023-07-21 05:58:05', '2023-07-21 05:58:05'),
(4, 0, 'Clients', 1, 1, NULL, '2023-07-21 05:58:15', '2023-07-21 05:58:15'),
(5, 0, 'Affiliations', 1, 1, NULL, '2023-07-21 05:58:27', '2023-07-21 05:58:27');

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
-- Table structure for table `master_products`
--

CREATE TABLE `master_products` (
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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_products`
--

INSERT INTO `master_products` (`id`, `parent_id`, `title`, `slug`, `icon`, `banner`, `other_icon`, `page_url`, `image`, `short_description`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Private Cloud', 'private-cloud', 'uploads/cms/cms-1690198532.png', 'uploads/cms/cms-1689676794.png', '<i class=\"bi bi-cloud-arrow-down fs-14 text-black fa-sharp fa-solid\"></i>', NULL, 'uploads/cms/cms-1690215108.jpg', NULL, 'Private Cloud', 'Private Cloud', 'Private Cloud', 1, 1, 1, '2023-07-18 05:09:54', '2023-07-24 10:41:48'),
(2, 0, 'Bare-Metal Server', 'bare-metal-server', 'uploads/cms/cms-1690215615.png', 'uploads/cms/cms-1689927619.png', '<i class=\"bi bi-pc-display-horizontal fs-14 text-black fa-sharp fa-solid\"></i>', 'bare-metal-server', 'uploads/cms/cms-1690215453.png', '<h6 class=\"fs-16 mt-3 mb-2 fw-bold text-capitalize text-sky  lsp-5px white-space\">Bare-Metal Server</h6>\r\n<p class=\"\">The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy.</p>', 'Bare-Metal Server', 'Bare-Metal Server', 'Bare-Metal Server', 1, 1, 1, '2023-07-21 02:50:19', '2023-07-24 10:50:15'),
(3, 0, 'Cloud Server', 'cloud-server', 'uploads/cms/cms-1690215834.png', 'uploads/cms/cms-1689928221.png', '<i class=\"bi bi-cloud-check fs-14 text-black fa-sharp fa-solid\"></i>', NULL, 'uploads/cms/cms-1690215694.png', '<h6 class=\"fs-16 mt-3 mb-2 fw-bold text-capitalize text-sky  lsp-5px white-space\">Cloud Server</h6>\r\n<p class=\"\">The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy.</p>', 'Cloud Server', 'Cloud Server', 'Cloud Server', 1, 1, 1, '2023-07-21 03:00:21', '2023-07-24 10:57:20'),
(4, 0, 'Storage & Backup', 'storage-backup', 'uploads/cms/cms-1690215819.png', 'uploads/cms/cms-1689928313.png', '<i class=\"bi bi-cloud-plus fs-14 text-black fa-sharp fa-solid\"></i>', NULL, 'uploads/cms/cms-1690215784.png', '<h6 class=\"fs-16 mt-3 mb-2 fw-bold text-capitalize text-sky  lsp-5px white-space\">Storage &amp; Backup</h6>\r\n<p class=\"\">The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy.</p>', 'Storage & Backup', 'Storage & Backup', 'Storage & Backup', 1, 1, 1, '2023-07-21 03:01:53', '2023-07-24 10:53:39'),
(5, 0, 'VPS Hosting', 'vps-hosting', 'uploads/cms/cms-1690216091.png', 'uploads/cms/cms-1689928368.png', '<i class=\"bi bi-globe-americas fs-14 text-black fa-sharp fa-solid\"></i>', NULL, 'uploads/cms/cms-1690215867.png', '<h6 class=\"fs-16 mt-3 mb-2 fw-bold text-capitalize text-sky  lsp-5px white-space\">VPS Hosting</h6>\r\n<p class=\"\">The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy.</p>', 'VPS Hosting', 'VPS Hosting', 'VPS Hosting', 1, 1, 1, '2023-07-21 03:02:48', '2023-07-24 10:58:11'),
(6, 0, 'Networking', 'networking', 'uploads/cms/cms-1690216074.png', 'uploads/cms/cms-1689928415.png', '<i class=\"bi bi-card-image fs-14 text-black fa-sharp fa-solid\"></i>', NULL, 'uploads/cms/cms-1690215914.png', '<h6 class=\"fs-16 mt-3 mb-2 fw-bold text-capitalize text-sky  lsp-5px white-space\">Networking</h6>\r\n<p class=\"\">The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy.</p>', 'Networking', 'Networking', 'Networking', 1, 1, 1, '2023-07-21 03:03:35', '2023-07-24 10:57:54'),
(7, 1, 'Microsoft Hyper-V', 'microsoft-hyper-v', 'uploads/cms/cms-1689929271.png', 'uploads/cms/cms-1689928587.png', NULL, NULL, NULL, NULL, 'Microsoft Hyper-V', 'Microsoft Hyper-V', 'Microsoft Hyper-V', 1, 1, 1, '2023-07-21 03:06:27', '2023-07-21 03:17:51'),
(8, 1, 'Vmware  Private cloud', 'vmware-private-cloud', 'uploads/cms/cms-1689932123.png', 'uploads/cms/cms-1689932112.png', NULL, NULL, NULL, NULL, 'Vmware  Private cloud', 'Vmware  Private cloud', 'Vmware  Private cloud', 1, 1, 1, '2023-07-21 04:05:12', '2023-07-21 04:05:23'),
(9, 1, 'Openstack Private cloud', 'openstack-private-cloud', 'uploads/cms/cms-1689932637.png', 'uploads/cms/cms-1689932626.png', NULL, NULL, NULL, NULL, 'Openstack Private cloud', 'Openstack Private cloud', 'Openstack Private cloud', 1, 1, 1, '2023-07-21 04:13:46', '2023-07-21 04:13:57'),
(10, 0, 'Cloud Servers', 'cloud-servers', 'uploads/cms/cms-1690281858.png', 'uploads/cms/cms-1690281858.png', NULL, 'cloud-servers', 'uploads/cms/cms-1690281858.png', '<p>A Private Cloud is a model of cloud computing where the infrastructure is dedicated to a single user organization. A private cloud can be hosted either at an organization&rsquo;s own data center, at a third-party colocation facility, or via a private cloud provider who offers private cloud hosting services and may or may not also offer traditional public shared multi-tenant cloud infrastructure. Typically, the end-user organization is responsible for the operation of a private cloud as if it were a traditional on-premises infrastructure, which includes ongoing maintenance, upgrades, OS patches, middleware, and application software management. Private Cloud Solutions offer organizations more control over and better security of private cloud servers, although it does require a much higher level of IT expertise than utilizing a public cloud.</p>', 'Cloud Servers', 'Cloud Servers', 'Cloud Servers', 1, 1, NULL, '2023-07-25 05:14:18', '2023-07-25 05:14:18'),
(11, 2, 'Windows Dedicated Sercer', 'windows-dedicated-sercer', 'uploads/cms/cms-1690281935.png', 'uploads/cms/cms-1690281935.png', NULL, 'windows', 'uploads/cms/cms-1690281935.png', '<p class=\"mb-0\">A Private Cloud is a model of cloud computing where the infrastructure is dedicated to a single user organization. A private cloud can be hosted either at an organization&rsquo;s own data center, at a third-party colocation facility, or via a private cloud provider who offers private cloud hosting services and may or may not also offer traditional public shared multi-tenant cloud infrastructure. Typically, the end-user organization is responsible for the operation of a private cloud as if it were a traditional on-premises infrastructure, which includes ongoing maintenance, upgrades, OS patches, middleware, and application software management. Private Cloud Solutions offer organizations more control over and better security of private cloud servers, although it does require a much higher level of IT expertise than utilizing a public cloud.</p>\r\n<h3 class=\"fs-18 fw-bold my-2\">Why use Private Clouds?</h3>\r\n<p>Private Clouds offer the same control and security as traditional on-premises infrastructure. Here are some reasons why organizations opt for private cloud computing:</p>', NULL, NULL, NULL, 1, 1, NULL, '2023-07-25 05:15:35', '2023-07-25 05:15:35');

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_services`
--

INSERT INTO `master_services` (`id`, `parent_id`, `title`, `slug`, `icon`, `banner`, `other_icon`, `page_url`, `image`, `short_description`, `meta_tag`, `meta_title`, `meta_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(12, 0, 'Cloud Migration Service', 'cloud-migration-service', 'uploads/cms/cms-1690365806.png', 'uploads/cms/cms-1690365714.jpg', NULL, 'Cloud-Migration-Service', 'uploads/cms/cms-1690365714.png', '<p>Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods</p>', 'Cloud Migration Service', 'Cloud Migration Service', 'Cloud Migration Service', 1, 1, 1, '2023-07-26 04:31:54', '2023-07-26 04:33:26');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_sections`
--

INSERT INTO `page_sections` (`id`, `page_id`, `section_name`, `title`, `description`, `image`, `banner_image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'contact_us_section1', 'Get In Touch', '<p>We recently helped a small business grow from break-even to over $1m profit in less than 2 years. Please find below contact details and contact us today!</p>', NULL, NULL, 1, 1, NULL, '2023-07-15 03:45:01', '2023-07-15 03:45:01'),
(2, 3, 'contact_us_section2', 'Send Us A Message', '<div class=\"base-header2 w-100 mt-3\">\r\n<p class=\"fs-13 lsp-5 text-white lh-base text-center\">We recently helped a small business grow from break-even to over $1m profit in less than 2 years. Please find below contact details and contact us today!</p>\r\n</div>', NULL, NULL, 1, 1, NULL, '2023-07-15 03:48:47', '2023-07-15 04:00:56'),
(3, 1, 'section_1', 'After Slider', NULL, NULL, NULL, 1, 1, NULL, '2023-07-24 05:29:42', '2023-07-24 05:29:42'),
(4, 1, 'section_2', 'Our Core Feature', '<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p class=\"fs-13 lsp-5 text-white lh-base text-center mx-auto\">We want to be more than your hosting provider, we want to be your hosting partner. Our team, the Most Helpful Humans in Hosting&reg;, are here for you when you need it. Helping is part of our DNA.</p>\r\n</div>', 'uploads/cms/cms-1690199974.png', NULL, 1, 1, NULL, '2023-07-24 06:29:34', '2023-07-24 06:29:34'),
(5, 4, 'common_client_section', 'Our Prestigious Clientele', '<p>They Trust Us. Now You Can Too.</p>', NULL, NULL, 1, 1, NULL, '2023-07-24 07:14:05', '2023-07-24 07:14:05'),
(6, 4, 'common_testimonial_section', 'Clients Are & Says', '<section class=\"py-5 testimonials bg-white mt-3\">\r\n<div class=\"container  position-relative z-index-1\">\r\n<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p class=\"fs-13 lsp-5  lh-base text-center mx-auto text-muted\">Our Experts have been helping businesses overcome their It challenges since 1995. Our Experts have been helping businesses overcome their It challenges since 1995.</p>\r\n</div>\r\n</div>\r\n</section>', NULL, NULL, 1, 1, NULL, '2023-07-24 07:15:41', '2023-07-24 07:15:41'),
(7, 1, 'section_3', 'India\'s Best Web Hosting Company With A Decade Of Expertise', '<p>We are an award-winning web hosting provider based in India. Since our establishment in 2012, we have focused on offering customers reliable and super-fast hosting services to customers worldwide.</p>', NULL, NULL, 1, 1, NULL, '2023-07-24 10:59:35', '2023-07-24 10:59:35'),
(8, 1, 'section_4', 'About Us', '<p><span style=\"color: rgb(255, 255, 255);\">Launched in the year 2019. We &ldquo;Cloudware Technologies Private Limited &ldquo; rapidly established ourselves as a frontrunner among Cloud hosting and System Integration service providers in India. By streamlining the process of deploying infrastructure in the cloud, the company\'s suite of products and services helps developers and organizations thrive. We offer a wide range of Cloud services including Virtual Machines, Physical bare metal servers, storage, load balancers, databases, GPU servers, and Backup as a Service at a competitive cost.</span><br><br><span style=\"color: rgb(255, 255, 255);\">We have built a solid reputation (over the years as a reputable company) within this short span of time with customer first approach. At Cloudware, we strive to provide our esteemed customers with a fast and reliable hosting experience and datacenter services.</span></p>', NULL, NULL, 1, 1, NULL, '2023-07-24 11:26:00', '2023-07-25 01:37:28'),
(9, 1, 'section_5', 'FAST, SECURE, HASSLE-FREE', '<div class=\"col-md-12 col-lg-6 \">\r\n<div class=\"cover py-2 rounded px-5  bg-light mb-lg-0 mb-4\">\r\n<div class=\"header-content ps-0 pb-5 pt-5 ms-0\">\r\n<h2 class=\"text-black fs-40 fw-bold mb-3 text-uppercase lsp-3px\"><span class=\"text-sky fs-40\">FULLY MANAGED&nbsp;</span>WEB HOSTING SOLUTIONS</h2>\r\n<h3 class=\"text-black slide-3 fw-normal lsp-5 lh-24 mb-4\">We provide you with an unrivaled hosting experience, delivering 99.999% uptime &amp; 24/7 access to the Most Helpful &nbsp;in Hosting.&nbsp;</h3>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, 1, 1, NULL, '2023-07-24 11:43:11', '2023-07-25 02:26:18'),
(10, 1, 'section_6', 'System Integeration', '<div class=\"col-md-12 col-lg-6 \">\r\n<div class=\"cover py-2 rounded px-5  bg-light mb-lg-0 mb-4\">\r\n<div class=\"header-content ps-0 pb-5 pt-5 ms-0\">\r\n<p class=\"fs-13 lsp-5 text-black2 lh-base text-left mx-auto\">Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here</p>\r\n</div>\r\n</div>\r\n</div>', NULL, NULL, 1, 1, NULL, '2023-07-24 11:44:02', '2023-07-24 11:44:02'),
(11, 4, 'common_why_choose_section', 'Choose Us Because We Are', '<div class=\"base-header2 mb-0 pb-2\">\r\n<p class=\"fs-13 lsp-5 text-white lh-base text-left mx-auto\">Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here</p>\r\n</div>\r\n<div class=\"about-content about-content2 \">\r\n<div id=\"aboutTab\" class=\"tab-content bg-transparent border-top pt-3 mt--1\">\r\n<div id=\"menu1\" class=\"tab-pane fade show active\" role=\"tabpanel\" aria-labelledby=\"menu1-tab\"></div>\r\n</div>\r\n</div>', 'uploads/cms/cms-1690275378.png', NULL, 1, 1, NULL, '2023-07-25 03:26:18', '2023-07-25 03:26:18');

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
-- Table structure for table `pricings`
--

CREATE TABLE `pricings` (
  `id` int(11) NOT NULL,
  `common` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `type_id` varchar(255) NOT NULL,
  `cpu` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `storage` varchar(255) NOT NULL,
  `network` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricings`
--

INSERT INTO `pricings` (`id`, `common`, `product_id`, `type_id`, `cpu`, `ram`, `storage`, `network`, `location`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, '0', '2', '5', 'rana', '16GB DDR3', '2x2TB SATA', '1Gbps30 TB', 'Montreal Same-Day', '€42.00', 1, '2023-07-24 00:16:19', '2023-07-24 00:16:19'),
(2, '0', '2', '5', '1 x Intel Quad-Core Xeon E3-1230 HP DL120 G7 - 4 C /8 T @ 3.20 Ghz', '16GB DDR3', '4x3TB SATA', '2Gbps30 TB', 'Amsterdam Same-Day', '€44.40', 1, '2023-07-24 00:16:19', '2023-07-24 00:16:19'),
(3, '0', '2', '5', '1 x Intel Xeon E3-1230 HP DL120G7 - 4 C /8 T @ 3.20 Ghz', '16GB DDR3', '4x1TB SATA', '3Gbps30 TB', 'Frankfurt Same-Day', '€44.40', 1, '2023-07-24 00:16:19', '2023-07-24 00:16:19'),
(4, '0', '2', '1', 'avinash', '26GB DDR3', '2x2TB SATA', '4Gbps30 TB', 'Montreal Same-Day', '€42.00', 1, '2023-07-24 00:16:19', '2023-07-24 00:16:19'),
(5, '0', '2', '1', '1 x Intel Quad-Core Xeon E3-1230 HP DL120 G7 - 4 C /8 T @ 3.20 Ghz', '36GB DDR3', '4x3TB SATA', '5Gbps30 TB', 'Amsterdam Same-Day', '€44.40', 1, '2023-07-24 00:16:19', '2023-07-24 00:16:19'),
(6, '0', '2', '1', '1 x Intel Xeon E3-1230 HP DL120G7 - 4 C /8 T @ 3.20 Ghz', '20GB DDR3', '4x1TB SATA', '6Gbps30 TB', 'Frankfurt Same-Day', '€44.40', 1, '2023-07-24 00:16:19', '2023-07-24 00:16:19');

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
(5, 'Database Dedicated Server', 'uploads/all/all-1690175001.png', 1, '2023-07-23 23:33:21', '2023-07-23 23:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
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
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `page_id`, `banner_img1`, `banner_img2`, `banner_heading`, `banner_description`, `title`, `description`, `advantage`, `short_description`, `image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 13, 'uploads/products/products-1687421886.jpg', 'uploads/products/products-1687418699.png', 'NBFC SOFTWARES', 'BOS offers NBFC software for non-banking financial companies. The software allows for efficient management of financial operations such as loan disbursement, customer management, and reporting.', 'NBFC SOFTWARES', '<div class=\"article mb-3\">\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">Business Online Solution (BOS) offers a comprehensive NBFC software solution that assists in managing all financial and operational activities of an NBFC. Our NBFC software is designed to cater to the needs of both small and large NBFCs. Our NBFC software covers all aspects of operations, including customer management, loan processing, disbursement, recovery, accounting, and reporting. It is a highly secure, scalable, and customizable software solution that can be easily integrated with other third-party systems. Our NBFC software has a user-friendly interface that is easy to navigate and helps NBFCs to streamline their operations. With our software, NBFCs can manage their customers\' data, loan accounts, EMI schedules, and repayments in a centralized system. Our software also supports online loan application and processing, which makes the loan application process hassle-free and efficient.</p>\r\n<p class=\"fs-14 lsp-5 text-muted lh-24 mb-3\">Our NBFC software provides real-time data analysis, which helps NBFCs to make informed decisions based on the data insights. It also enables NBFCs to keep track of their financial performance and generate reports to comply with regulatory requirements. Our software supports multiple languages, which makes it easy for NBFCs to operate in a multilingual environment. Our NBFC software is highly customizable and can be tailored to meet the specific needs of an NBFC. We understand that each NBFC operates differently and has unique requirements, and we strive to provide a software solution that meets those requirements. With our NBFC software, NBFCs can automate their processes, reduce manual intervention, and improve efficiency. Our software also helps NBFCs to comply with regulatory requirements and reduce the risk of errors.</p>\r\n</div>\r\n<h2 class=\"fs-18 lsp-5 my-3 pb-0 text-dark text-uppercase  \">NBFC&nbsp;<span class=\"fs-18 lsp-5 text-orange\">SOFTWARE</span></h2>\r\n<ul class=\"list-style-none p-0 m-0 lsp-5 fs-14 lh-24 d-flow-root w-100\">\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Efficient loan management and processing.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Robust customer management features.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Advanced risk management tools.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Real-time monitoring of financial operations..</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Automated accounting and reporting.</li>\r\n<li class=\"float-start me-2 py-2   border-bottom-dashed w-100\">&nbsp;Secure data protection and compliance management.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">ADVANTAGES</h3>\r\n<ul class=\"listwRp list-style-none text-start p-0 m-0 d-flow-root mb-3\">\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Helps manage loan portfolios efficiently and accurately.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">Streamlines loan processing and disbursement.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Provides comprehensive financial reporting and analysis.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">Provides comprehensive financial reporting and analysis.</li>\r\n<li class=\"float-none me-2 py-2   border-bottom-dashed w-100\">&nbsp;Enhances customer experience with user-friendly interfaces and mobile access.</li>\r\n</ul>', '<h3 class=\"fs-18 lh-24 text-start text-uppercase lsp-5 text-orange mb-2\">NBFC SOFTWARE</h3>\r\n<p class=\"fw-normal fs-14 lsp-5 text-muted lh-24\">NBFC software is an all-in-one solution for managing the financial and operational activities of an NBFC. It is a scalable and secure software solution that can help NBFCs to streamline their processes and improve their overall efficiency.</p>', 'uploads/products/products-1687418699.jpg', 1, 1, 1, '2023-06-22 01:54:59', '2023-07-07 02:18:23');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_sections`
--

INSERT INTO `product_sections` (`id`, `page_id`, `section_name`, `title`, `description`, `image`, `banner_image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'section_1', '<h2 class=\"pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-start mb-2\">What Is A&nbsp;<span class=\"text-sky   fs-25 \"><span style=\"color: rgb(253, 150, 11);\">Private Cloud</span>?</span></h2>', '<p class=\"mb-0\">A Private Cloud is a model of cloud computing where the infrastructure is dedicated to a single user organization. A private cloud can be hosted either at an organization&rsquo;s own data center, at a third-party colocation facility, or via a private cloud provider who offers private cloud hosting services and may or may not also offer traditional public shared multi-tenant cloud infrastructure. Typically, the end-user organization is responsible for the operation of a private cloud as if it were a traditional on-premises infrastructure, which includes ongoing maintenance, upgrades, OS patches, middleware, and application software management. Private Cloud Solutions offer organizations more control over and better security of private cloud servers, although it does require a much higher level of IT expertise than utilizing a public cloud.</p>\r\n<h3 class=\"fs-18 fw-bold my-2\">Why use Private Clouds?</h3>\r\n<p>Private Clouds offer the same control and security as traditional on-premises infrastructure. Here are some reasons why organizations opt for private cloud computing:</p>', 'uploads/cms/cms-1689685081.png', NULL, 1, 1, NULL, '2023-07-18 07:28:01', '2023-07-18 07:28:01'),
(2, 1, 'section_2', '<h2><span style=\"color: rgb(255, 255, 255);\">Our Supported</span>&nbsp;<span class=\"text-sky   fs-25 \" style=\"color: rgb(253, 150, 11);\">Private Cloud Solutions</span></h2>', '<section class=\"py-5  bg-dark position-relative \">\r\n<div class=\"container \">\r\n<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p class=\"fs-13 lsp-5  lh-base text-center text-white mx-auto\">Unlock superior performance, total control, and ultimate security with our Bare Metal Server Hosting. Tailored solutions designed to meet your applications&rsquo; demanding needs.</p>\r\n</div>\r\n<div class=\"owl-carousel owl-theme owl-carousel4a position-relative w-100 z-index-0 px-3 owl-loaded owl-drag\">\r\n<div class=\"owl-stage-outer\">\r\n<div class=\"owl-stage\">\r\n<div class=\"owl-item cloned\">\r\n<div class=\"item position-relative p-1\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', NULL, NULL, 1, 1, NULL, '2023-07-20 10:23:57', '2023-07-20 10:28:47'),
(3, 1, 'section_3', '<h2>Private&nbsp;<span class=\"text-sky   fs-25 \">Cloud</span></h2>', '<p>We want to be more than your hosting provider, we want to be your hosting partner. Our team, the Most Helpful Humans in Hosting&reg;, are here for you when you need it. Helping is part of our DNA.</p>', NULL, NULL, 1, 1, NULL, '2023-07-20 12:03:52', '2023-07-20 12:03:52'),
(4, 1, 'section_4', '<h3 class=\" pb-0 fs-25 fw-bold lsp-5 text-white text-capitalize text-center\">Simple Private Cloud&nbsp;<span class=\"text-sky   fs-25 \" style=\"color: rgb(253, 150, 11);\">Solutions For Your Big Ideas!</span></h3>', '<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p class=\"fs-13 lsp-5 text-white lh-base text-center mx-auto\">Let Us Know Who You Are and Where You Want to Go, and We&rsquo;ll Get You There.</p>\r\n</div>', NULL, NULL, 1, 1, NULL, '2023-07-20 12:38:10', '2023-07-20 12:38:10'),
(5, 1, 'section_5', '<h3>Our&nbsp;<span class=\"text-sky   fs-25 \" style=\"color: rgb(253, 150, 11);\">Features</span></h3>', '<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p class=\"fs-13 lsp-5  lh-base text-center mx-auto\">Cloudware Technologies Private Limited is one of the finest blockchain development companies located in Jaipur, India. Outsource Cloudware Technologies Private Limited and its blockchain development services and enjoy the unmatched quality of solutions, including dedicated teams, total transparency, quality assurance, up-to-date development standards, timely delivery, and outstanding support.</p>\r\n</div>', NULL, NULL, 1, 1, NULL, '2023-07-20 12:40:58', '2023-07-20 12:40:58'),
(6, 1, 'section_6', '<h3><strong>Our Prestigious&nbsp;<span class=\"text-sky   fs-25 \">Clients</span></strong></h3>', '<p>They Trust Us. Now You Can Too.</p>', NULL, NULL, 1, 1, NULL, '2023-07-21 05:52:03', '2023-07-21 05:57:38'),
(7, 1, 'section_7', '<h3><span style=\"color: rgb(253, 150, 11);\">Choose Us&nbsp;<span class=\"text-sky   fs-25 \">Because We Are</span></span></h3>', '<div class=\"base-header2 mb-0 pb-2\">\r\n<p class=\"fs-13 lsp-5 text-white lh-base text-left mx-auto\">Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here</p>\r\n</div>\r\n<div class=\"about-content about-content2 \">\r\n<div id=\"aboutTab\" class=\"tab-content bg-transparent border-top pt-3 mt--1\">\r\n<div id=\"menu1\" class=\"tab-pane fade show active\" role=\"tabpanel\" aria-labelledby=\"menu1-tab\"></div>\r\n</div>\r\n</div>', 'uploads/cms/cms-1690002051.png', NULL, 1, 1, NULL, '2023-07-21 23:30:52', '2023-07-21 23:30:52'),
(8, 2, 'section_1', '<h2 class=\"pb-0 fs-25 fw-bold lsp-5 text-black text-capitalize text-start mb-2\">Bare Metal&nbsp;<span class=\"text-sky   fs-25 \">Server</span></h2>', '<p class=\"mb-0\">Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>', 'uploads/cms/cms-1690182188.png', NULL, 1, 1, NULL, '2023-07-18 07:28:01', '2023-07-24 01:33:08'),
(9, 2, 'section_2', '<h2><span style=\"color: rgb(255, 255, 255);\">Our Supported</span>&nbsp;<span class=\"text-sky   fs-25 \" style=\"color: rgb(253, 150, 11);\">Private Cloud Solutions</span></h2>', '<section class=\"py-5  bg-dark position-relative \">\r\n<div class=\"container \">\r\n<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p class=\"fs-13 lsp-5  lh-base text-center text-white mx-auto\">Unlock superior performance, total control, and ultimate security with our Bare Metal Server Hosting. Tailored solutions designed to meet your applications&rsquo; demanding needs.</p>\r\n</div>\r\n<div class=\"owl-carousel owl-theme owl-carousel4a position-relative w-100 z-index-0 px-3 owl-loaded owl-drag\">\r\n<div class=\"owl-stage-outer\">\r\n<div class=\"owl-stage\">\r\n<div class=\"owl-item cloned\">\r\n<div class=\"item position-relative p-1\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', NULL, NULL, 1, 1, NULL, '2023-07-20 10:23:57', '2023-07-20 10:28:47'),
(10, 2, 'section_3', '<h2>Private&nbsp;<span class=\"text-sky   fs-25 \">Cloud</span></h2>', '<p>We want to be more than your hosting provider, we want to be your hosting partner. Our team, the Most Helpful Humans in Hosting&reg;, are here for you when you need it. Helping is part of our DNA.</p>', NULL, NULL, 1, 1, NULL, '2023-07-20 12:03:52', '2023-07-20 12:03:52'),
(11, 2, 'section_4', '<h3 class=\" pb-0 fs-25 fw-bold lsp-5 text-white text-capitalize text-center\">Simple Private Cloud&nbsp;<span class=\"text-sky   fs-25 \" style=\"color: rgb(253, 150, 11);\">Solutions For Your Big Ideas!</span></h3>', '<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p class=\"fs-13 lsp-5 text-white lh-base text-center mx-auto\">Let Us Know Who You Are and Where You Want to Go, and We&rsquo;ll Get You There.</p>\r\n</div>', NULL, NULL, 1, 1, NULL, '2023-07-20 12:38:10', '2023-07-20 12:38:10'),
(12, 2, 'section_5', '<h3>Our&nbsp;<span class=\"text-sky   fs-25 \" style=\"color: rgb(253, 150, 11);\">Features</span></h3>', '<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p class=\"fs-13 lsp-5  lh-base text-center mx-auto\">Cloudware Technologies Private Limited is one of the finest blockchain development companies located in Jaipur, India. Outsource Cloudware Technologies Private Limited and its blockchain development services and enjoy the unmatched quality of solutions, including dedicated teams, total transparency, quality assurance, up-to-date development standards, timely delivery, and outstanding support.</p>\r\n</div>', NULL, NULL, 1, 1, NULL, '2023-07-20 12:40:58', '2023-07-20 12:40:58'),
(13, 2, 'section_6', '<h3><strong>Our Prestigious&nbsp;<span class=\"text-sky   fs-25 \">Clients</span></strong></h3>', '<p>They Trust Us. Now You Can Too.</p>', NULL, NULL, 1, 1, NULL, '2023-07-21 05:52:03', '2023-07-21 05:57:38'),
(14, 2, 'section_7', '<h3><span style=\"color: rgb(253, 150, 11);\">Choose Us&nbsp;<span class=\"text-sky   fs-25 \">Because We Are</span></span></h3>', '<div class=\"base-header2 mb-0 pb-2\">\r\n<p class=\"fs-13 lsp-5 text-white lh-base text-left mx-auto\">Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here</p>\r\n</div>\r\n<div class=\"about-content about-content2 \">\r\n<div id=\"aboutTab\" class=\"tab-content bg-transparent border-top pt-3 mt--1\">\r\n<div id=\"menu1\" class=\"tab-pane fade show active\" role=\"tabpanel\" aria-labelledby=\"menu1-tab\"></div>\r\n</div>\r\n</div>', 'uploads/cms/cms-1690002051.png', NULL, 1, 1, NULL, '2023-07-21 23:30:52', '2023-07-21 23:30:52'),
(15, 10, 'section_1', '<p>Cloud&nbsp;<span class=\"text-sky   fs-25 \">Server</span></p>', '<section class=\"about-wrapper py-5 dedocatopd bg-light-green position-relative overflow-hidden\">\r\n<div class=\"container position-relative z-index-99\">\r\n<div class=\"row flex-row-reverse align-items-center\">\r\n<div class=\"col-lg-7 align-self-center\">\r\n<div class=\"about-content mb-0\">\r\n<div class=\"base-header2 mb-0 pb-0\">\r\n<div class=\" pt-2\">\r\n<p class=\"mb-0\">Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"py-5  bg-dark position-relative \">\r\n<div class=\"container \">\r\n<div class=\"base-header2 w-75 mx-auto mb-3\">&nbsp;</div>\r\n</div>\r\n</section>', 'uploads/cms/cms-1690282185.png', NULL, 1, 1, NULL, '2023-07-25 05:19:45', '2023-07-25 05:19:45'),
(16, 10, 'section_2', '<p>Solutions Built For Enterprises On&nbsp;<span class=\"text-sky   fs-25 \">Cloud Server</span></p>', '<section class=\"py-5  bg-dark position-relative \">\r\n<div class=\"container \">\r\n<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p class=\"fs-13 lsp-5  lh-base text-center text-white mx-auto\">Unlock superior performance, total control, and ultimate security with our Bare Metal Server Hosting. Tailored solutions designed to meet your applications&rsquo; demanding needs.</p>\r\n</div>\r\n</div>\r\n</section>', NULL, NULL, 1, 1, NULL, '2023-07-25 05:21:26', '2023-07-25 05:21:26');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_section_datas`
--

INSERT INTO `product_section_datas` (`id`, `page_id`, `section_id`, `title`, `description`, `img`, `order_number`, `other`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Security', '<p>Private cloud security is enhanced since traffic to a private cloud is typically limited to the organization&rsquo;s own transactions. Public cloud providers must handle traffic from millions of users and transactions simultaneously, thus opening a greater chance for malicious traffic. Since private clouds consist of dedicated physical infrastructure, the organization has better control over the server, network, and application security.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-07-20 07:36:35', '2023-07-20 07:36:35'),
(2, 1, 1, 'Predictable Performance', '<p>Because the hardware is dedicated rather than multi-tenant, workload performance is predictable and unaffected by other organizations sharing infrastructure or bandwidth.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-07-20 07:45:26', '2023-07-20 07:45:26'),
(3, 1, 1, 'Long-Term Savings', '<p>While it can be expensive to set up the infrastructure to support a private cloud, it can pay off in the long term. If an organization already has the hardware and network required for hosting, a private cloud can be much more cost-effective over time compared to paying monthly fees to use someone else&rsquo;s servers on the public cloud.</p>', NULL, 1, NULL, 1, 1, 1, '2023-07-20 07:46:39', '2023-07-20 10:03:38'),
(4, 1, 1, 'Regulatory Governance', '<p>Regulations such as the EU\'s GDPR may dictate where data resides and where computing occurs. In those regions where public cloud providers cannot offer service, a private cloud may be required. Additionally, organizations with sensitive data such as financial or legal firms may opt for private cloud storage to ensure they have complete control over personally identifiable or sensitive information.</p>', NULL, 1, NULL, 1, 1, 1, '2023-07-20 07:47:11', '2023-07-20 10:03:11'),
(5, 1, 1, 'Predictable Costs', '<p>Public cloud costs can be very unpredictable based on usage, storage charges, and data egress charges. Private cloud costs are the same each month, regardless of the workloads, an organization is running or how much data is moved.</p>', NULL, 1, NULL, 1, 1, NULL, '2023-07-20 07:47:33', '2023-07-20 07:47:33'),
(6, 1, 2, 'Vmware', NULL, 'uploads/cms/cms-1689868849.png', 1, NULL, 1, 1, NULL, '2023-07-20 10:30:49', '2023-07-20 10:30:49'),
(7, 1, 2, 'Open Stack', NULL, 'uploads/cms/cms-1689868875.png', 1, NULL, 1, 1, NULL, '2023-07-20 10:31:15', '2023-07-20 10:31:15'),
(8, 1, 2, 'Cloud Stack', NULL, 'uploads/cms/cms-1689868904.png', 1, NULL, 1, 1, NULL, '2023-07-20 10:31:44', '2023-07-20 10:31:44'),
(9, 1, 2, 'Proxmox', NULL, 'uploads/cms/cms-1689868926.png', 1, NULL, 1, 1, NULL, '2023-07-20 10:32:06', '2023-07-20 10:32:06'),
(10, 1, 2, 'Open Nebula', NULL, 'uploads/cms/cms-1689868955.png', 1, NULL, 1, 1, NULL, '2023-07-20 10:32:35', '2023-07-20 10:32:35'),
(13, 1, 3, 'Microsoft Hyper-V', '<p>The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy. Gone are the days when the entire responsibility of running your business website was taken care of by an internal team. With the world steadily moving up to the strategy of concentrating on your core business specialties and leaving the rest to us, who specialize in dedicated server hosting in india, you would be best served as we manage your website &amp; applications! We expertize in dedicated hosting services in india and have engaged 1000+ clientele for specialized dedicated servers.</p>', 'uploads/cms/cms-1689875583.png', 1, 'uploads/cms/cms-1689875433.png', 1, 1, 1, '2023-07-20 12:20:33', '2023-07-20 12:23:03'),
(14, 1, 3, 'Vmware Private Cloud', '<div class=\"info w-60 mt-2 p-4  \">\r\n<p class=\"text-muted  text-justify mb-0 pt-2\">The cloud can seem intimidating, but it doesn&rsquo;t have to be. At Cloud Server, we&rsquo;ve made it easy. Gone are the days when the entire responsibility of running your business website was taken care of by an internal team. With the world steadily moving up to the strategy of concentrating on your core business specialties and leaving the rest to us, who specialize in dedicated server hosting in india, you would be best served as we manage your website &amp; applications! We expertize in dedicated hosting services in india and have engaged 1000+ clientele for specialized dedicated servers.</p>\r\n</div>', 'uploads/cms/cms-1689876148.png', 1, 'uploads/cms/cms-1689876128.png', 1, 1, 1, '2023-07-20 12:32:08', '2023-07-20 12:32:28'),
(15, 1, 4, 'Fixed Cost With No Hidden Charges', '<p><span style=\"color: rgb(255, 255, 255);\">Enjoy our premium bare metal servers without worrying about increasing costs or hidden charges. Get a single invoice every month</span></p>', NULL, 1, 'uploads/cms/cms-1689876532.png', 1, 1, 1, '2023-07-20 12:38:52', '2023-07-20 12:56:43'),
(16, 1, 4, 'Private Cloud Dedicated Servers', '<p><span style=\"color: rgb(255, 255, 255);\">Rest assured, businesses enjoy the optimal performance when choosing RedSwitches for bare metal servers since all the resources are allocated</span></p>', NULL, 1, 'uploads/cms/cms-1689876573.png', 1, 1, 1, '2023-07-20 12:39:33', '2023-07-20 12:56:32'),
(17, 1, 5, 'Standard DDoS Protection', '<p>Get real-time monitoring to mitigate threats and shield your website and server</p>', NULL, 1, 'uploads/cms/cms-1689877880.png', 1, 1, NULL, '2023-07-20 13:01:20', '2023-07-20 13:01:20'),
(18, 1, 5, 'Cloudflare CDN', '<p>Speed up your website by serving site content from worldwide servers located</p>', NULL, 1, 'uploads/cms/cms-1689877916.png', 1, 1, NULL, '2023-07-20 13:01:56', '2023-07-20 13:01:56'),
(19, 1, 7, '<i class=\"bi bi-database fs-5\"></i> Tier 4 Datacenter', '<section class=\"vs-accordion-wrapper space pt-5 pb-5 bg-dark-green\">\r\n<div class=\"container\">\r\n<div class=\"row align-items-center\">\r\n<div class=\" col-lg-7 col-xl-7 pb-10 pb-xl-0 mb-50 mb-xl-0\">\r\n<div class=\"about-content about-content2 \">\r\n<div id=\"aboutTab\" class=\"tab-content bg-transparent border-top pt-3 mt--1\">\r\n<div id=\"menu1\" class=\"tab-pane fade show active\" role=\"tabpanel\" aria-labelledby=\"menu1-tab\">\r\n<p class=\"fs-13 lsp-5  lh-base text-left text-white mx-auto\">Best Powerful Server Proactively revolutionize granular customer service after pandemic internal or customer service after pandemic internal or \"organic\" sources. Distinctively impact proactively.</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\">Asia&rsquo;s Largest Rated 4 Datacenter</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\">Mission Critical 9 Zone Security Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\">Uninterrupted Power Power Supply Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\">Industry Best Uptime SLA Of 99.995%</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\">Zero-Downtime Since Inception</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\">24X7 Customer Support</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\">Carrier Neutrality &amp; Unmatched Peering Network</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\">Trusted By Bank</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"py-5 testimonials bg-white mt-3\">\r\n<div class=\"container  position-relative z-index-1\">\r\n<div class=\"base-header2 w-75 mx-auto mb-3\">&nbsp;</div>\r\n</div>\r\n</section>', NULL, 1, NULL, 1, 1, 1, '2023-07-21 23:32:15', '2023-07-22 01:09:04'),
(20, 1, 7, '<i class=\"bi bi-globe fs-5\"></i> Enterprises Hardware', '<p class=\"fs-13 lsp-5  lh-base  text-white text-left mx-auto\">ggggFull Satisfaction platform Proactively revolutionize granular customer service after pandemic internal or \"organic\" sources. Distinctively impact proactive</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/data1.png\" alt=\"Orrish\"></span>Asia&rsquo;s Largest Rated 4 Datacenter</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/data-protection1.png\" alt=\"Orrish\"></span>Mission Critical 9 Zone Security Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/Support-comparison11.png\" alt=\"Orrish\"></span>Uninterrupted Power Power Supply Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"../../../cloud-server-fs10july/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>Industry Best Uptime SLA Of 99.995%</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/performance11.png\" alt=\"Orrish\"></span>Zero-Downtime Since Inception</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/support1.png\" alt=\"Orrish\"></span>24X7 Customer Support</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/domain-servers1.png\" alt=\"Orrish\"></span>Carrier Neutrality &amp; Unmatched Peering Network</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/invest-trust1.png\" alt=\"Orrish\"></span>Trusted By Bank</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, 1, '2023-07-22 01:11:16', '2023-07-22 01:34:22'),
(21, 1, 7, '<i class=\"bi bi-cloud-check-fill fs-5\"></i> Predictable Billing', '<p class=\"fs-13 lsp-5  lh-base text-white text-left mx-auto\">Full Satisfaction platform Proactively revolutionize granular customer service after pandemic internal or \"organic\" sources. Distinctively impact proactive</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/data1.png\" alt=\"Orrish\"></span>Asia&rsquo;s Largest Rated 4 Datacenter</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/data-protection1.png\" alt=\"Orrish\"></span>Mission Critical 9 Zone Security Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/Support-comparison11.png\" alt=\"Orrish\"></span>Uninterrupted Power Power Supply Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"../../../cloud-server-fs10july/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>Industry Best Uptime SLA Of 99.995%</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/performance11.png\" alt=\"Orrish\"></span>Zero-Downtime Since Inception</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/support1.png\" alt=\"Orrish\"></span>24X7 Customer Support</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/domain-servers1.png\" alt=\"Orrish\"></span>Carrier Neutrality &amp; Unmatched Peering Network</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloud-server-fs10july/img/invest-trust1.png\" alt=\"Orrish\"></span>Trusted By Bank</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, NULL, '2023-07-22 01:52:05', '2023-07-22 01:52:05'),
(22, 10, 16, 'Video Streaming', '<p>Video StreamingVideo StreamingVideo StreamingVideo StreamingVideo StreamingVideo StreamingVideo StreamingVideo Streaming</p>', 'uploads/cms/cms-1690282432.png', 1, 'uploads/cms/cms-1690282432.png', 1, 1, NULL, '2023-07-25 05:23:52', '2023-07-25 05:23:52');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section_datas`
--

INSERT INTO `section_datas` (`id`, `page_id`, `section_id`, `title`, `description`, `img`, `order_number`, `other`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Data Security', NULL, 'uploads/cms/cms-1690196421.png', 1, NULL, 1, 1, NULL, '2023-07-24 05:30:21', '2023-07-24 05:30:21'),
(2, 1, 3, 'Technical Support', NULL, 'uploads/cms/cms-1690196452.png', 1, NULL, 1, 1, NULL, '2023-07-24 05:30:52', '2023-07-24 05:30:52'),
(3, 1, 3, 'Dedicated Hosting', NULL, 'uploads/cms/cms-1690196480.png', 1, NULL, 1, 1, NULL, '2023-07-24 05:31:20', '2023-07-24 05:31:20'),
(4, 1, 3, 'Web Hosting', NULL, 'uploads/cms/cms-1690196504.png', 1, NULL, 1, 1, NULL, '2023-07-24 05:31:44', '2023-07-24 05:31:44'),
(5, 1, 3, 'Advance Storage', NULL, 'uploads/cms/cms-1690196527.png', 1, NULL, 1, 1, NULL, '2023-07-24 05:32:07', '2023-07-24 05:32:07'),
(6, 1, 4, 'Latest Intel Scalable & AMD Servers', NULL, 'uploads/cms/cms-1690200007.png', 1, NULL, 1, 1, NULL, '2023-07-24 06:30:07', '2023-07-24 06:30:07'),
(7, 1, 4, 'Enterprise Grade Pcie Gen 4.0 NVME Drive Which Deliver Up To 8000 MB/S Speed', NULL, 'uploads/cms/cms-1690200036.png', 1, NULL, 1, 1, NULL, '2023-07-24 06:30:36', '2023-07-24 06:30:36'),
(8, 1, 4, 'Transparant & Fixed Pricing', NULL, 'uploads/cms/cms-1690200058.png', 1, NULL, 1, 1, NULL, '2023-07-24 06:30:58', '2023-07-24 06:30:58'),
(9, 1, 4, 'Uptime SLAs 99.99', NULL, 'uploads/cms/cms-1690200097.png', 1, NULL, 1, 1, NULL, '2023-07-24 06:31:37', '2023-07-24 06:31:37'),
(10, 1, 4, '10Gpbs Inter Connectivity', NULL, 'uploads/cms/cms-1690200142.png', 1, NULL, 1, 1, NULL, '2023-07-24 06:32:22', '2023-07-24 06:32:22'),
(11, 1, 4, 'No Locking Period', NULL, 'uploads/cms/cms-1690200167.png', 1, NULL, 1, 1, NULL, '2023-07-24 06:32:47', '2023-07-24 06:32:47'),
(12, 1, 4, 'Multi-Level DDoS Protection', NULL, 'uploads/cms/cms-1690200196.png', 1, NULL, 1, 1, NULL, '2023-07-24 06:33:16', '2023-07-24 06:33:16'),
(13, 1, 4, 'Multilocation Datacenter', NULL, 'uploads/cms/cms-1690200237.png', 1, NULL, 1, 1, NULL, '2023-07-24 06:33:57', '2023-07-24 06:33:57'),
(14, 1, 7, 'Years of Experience', '<p>We have been in the hosting business since 2012. We have served 40000+ clients worldwide. With over a decade of experience, we have won a reputation for excellence and for offering the best web hosting services.</p>', 'uploads/cms/cms-1690216271.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:01:11', '2023-07-24 11:01:11'),
(15, 1, 7, 'Local Web Hosting Company', '<p>We are a web hosting provider headquartered in India. We are the ones who understand the requirements of every client. Being a local, yet top-rated web host, we offer everything you need for a smooth hosting experience.</p>', 'uploads/cms/cms-1690217409.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:20:09', '2023-07-24 11:20:09'),
(16, 1, 7, 'Support in Local Languages', '<p>Customer support is at the heart of everything we do. Our support team is renowned for being multi-skilled, proficient and helpful. You are free to communicate with our award-winning support team in English, Hindi, or Marathi.</p>', 'uploads/cms/cms-1690217471.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:21:11', '2023-07-24 11:21:11'),
(17, 1, 7, 'Server Security', '<p>Get peace of mind knowing your server is secured from inbound spam and viruses. At MilesWeb, we take security very seriously! We have a Tier-4 data center in India architected for resilience, 24x7 security and top-notch speed.</p>', 'uploads/cms/cms-1690217521.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:22:01', '2023-07-24 11:22:01'),
(18, 1, 7, 'Latest technologies', '<p>At MilesWeb, we strive to make websites run 10x faster by blending the latest technologies. Our customers can take advantage of the newest PHP versions, or cutting-edge protocols and compression algorithms like Brotli and HTTP/2.</p>', 'uploads/cms/cms-1690217566.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:22:46', '2023-07-24 11:22:46'),
(19, 1, 7, 'Easy Website Migration', '<p>With no data loss and zero downtime risk! Our migration experts can be your saviour. Preserve all your folders, files, emails and other data exactly as it is. Transfer your website to us at no additional cost.</p>', 'uploads/cms/cms-1690217608.png', 1, NULL, 1, 1, 1, '2023-07-24 11:23:28', '2023-07-24 11:25:12'),
(20, 1, 8, 'Cloud Migration Service', NULL, 'uploads/cms/cms-1690217832.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:27:12', '2023-07-24 11:27:12'),
(21, 1, 8, 'System Integeration', NULL, 'uploads/cms/cms-1690218212.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:33:32', '2023-07-24 11:33:32'),
(22, 1, 8, 'Managed Services', NULL, 'uploads/cms/cms-1690218256.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:34:16', '2023-07-24 11:34:16'),
(23, 1, 8, 'Device On Opex Modal', NULL, 'uploads/cms/cms-1690218294.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:34:54', '2023-07-24 11:34:54'),
(24, 1, 8, 'Cost Optimization Services', NULL, 'uploads/cms/cms-1690218351.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:35:51', '2023-07-24 11:35:51'),
(25, 1, 8, 'SAP Migration Services', NULL, 'uploads/cms/cms-1690218382.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:36:22', '2023-07-24 11:36:22'),
(26, 1, 10, 'Asia’s Largest Rated 4 Datacenter', NULL, 'uploads/cms/cms-1690218868.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:44:28', '2023-07-24 11:44:28'),
(27, 1, 10, 'Uninterrupted Power Power Supply Ensured', NULL, 'uploads/cms/cms-1690218892.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:44:52', '2023-07-24 11:44:52'),
(28, 1, 10, 'Zero-Downtime Since Inception', NULL, 'uploads/cms/cms-1690218916.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:45:16', '2023-07-24 11:45:16'),
(29, 1, 10, 'Carrier Neutrality & Unmatched Peering Network', NULL, 'uploads/cms/cms-1690218952.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:45:52', '2023-07-24 11:45:52'),
(30, 1, 10, 'Mission Critical 9 Zone Security Ensured', NULL, 'uploads/cms/cms-1690218972.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:46:12', '2023-07-24 11:46:12'),
(31, 1, 10, 'Industry Best Uptime SLA Of 99.995%', NULL, 'uploads/cms/cms-1690219046.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:47:26', '2023-07-24 11:47:26'),
(32, 1, 10, '24X7 Customer Support', NULL, 'uploads/cms/cms-1690219069.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:47:49', '2023-07-24 11:47:49'),
(33, 1, 10, 'Trusted By Bank', NULL, 'uploads/cms/cms-1690219091.png', 1, NULL, 1, 1, NULL, '2023-07-24 11:48:11', '2023-07-24 11:48:11'),
(34, 1, 9, 'System Integeration', '<p class=\"fs-13 lsp-5 text-black2 lh-base text-left mx-auto\">Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted h-50px\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../../cloudware_html/img/data1.png\" alt=\"Orrish\"></span>Asia&rsquo;s Largest Rated 4 Datacenter</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted h-50px\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../../cloudware_html/img/data-protection1.png\" alt=\"Orrish\"></span>Mission Critical 9 Zone Security Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted h-50px\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../../cloudware_html/img/Support-comparison11.png\" alt=\"Orrish\"></span>Uninterrupted Power Power Supply Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted h-50px\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"../../../../cloudware_html/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>Industry Best Uptime SLA Of 99.995%</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted h-50px\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../../cloudware_html/img/performance11.png\" alt=\"Orrish\"></span>Zero-Downtime Since Inception</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted h-50px\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../../cloudware_html/img/support1.png\" alt=\"Orrish\"></span>24X7 Customer Support</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted h-50px\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../../cloudware_html/img/domain-servers1.png\" alt=\"Orrish\"></span>Carrier Neutrality &amp; Unmatched Peering Network</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"my-1 fs-13 lsp-5 d-flex align-items-center text-muted h-50px\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../../cloudware_html/img/invest-trust1.png\" alt=\"Orrish\"></span>Trusted By Bank</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, 1, '2023-07-25 02:48:02', '2023-07-25 02:51:05'),
(35, 4, 11, '<i class=\"bi bi-database fs-5\"></i> Tier 4 Datacenter', '<p class=\"fs-13 lsp-5  lh-base text-left text-white mx-auto\">Best Powerful Server Proactively revolutionize granular customer service after pandemic internal or customer service after pandemic internal or \"organic\" sources. Distinctively impact proactive.</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data1.png\" alt=\"Orrish\"></span>Asia&rsquo;s Largest Rated 4 Datacenter</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data-protection1.png\" alt=\"Orrish\"></span>Mission Critical 9 Zone Security Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/Support-comparison11.png\" alt=\"Orrish\"></span>Uninterrupted Power Power Supply Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"../../../cloudware_html/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>Industry Best Uptime SLA Of 99.995%</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/performance11.png\" alt=\"Orrish\"></span>Zero-Downtime Since Inception</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/support1.png\" alt=\"Orrish\"></span>24X7 Customer Support</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/domain-servers1.png\" alt=\"Orrish\"></span>Carrier Neutrality &amp; Unmatched Peering Network</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/invest-trust1.png\" alt=\"Orrish\"></span>Trusted By Bank</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, NULL, '2023-07-25 03:27:24', '2023-07-25 03:27:24');

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_sections`
--

INSERT INTO `service_sections` (`id`, `page_id`, `section_name`, `title`, `description`, `image`, `banner_image`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(17, 12, 'section_1', '<p>Cloud Migration&nbsp;<span class=\"text-sky   fs-25 \">Service</span></p>', '<section class=\"about-wrapper  py-5 dedocatopd bg-light-green position-relative overflow-hidden\">\r\n<div class=\"container position-relative z-index-99\">\r\n<div class=\"row flex-row-reverse align-items-center\">\r\n<div class=\"col-lg-7 align-self-center\">\r\n<div class=\"about-content mb-0\">\r\n<div class=\"base-header2 mb-0 pb-0\">\r\n<div class=\"  pt-2\">\r\n<p class=\"mb-0\">Regulatory Affairs (RA) also called Government Affairs, is a profession within regulated industries, such as pharmaceuticals, medical devices, Import, Export and Cosmetics. Regulatory Affairs also has a very specific meaning within the healthcare industries (pharmaceuticals, medical devices, Biologics and functional foods). Biologics and functional foods .<br><br>Most companies, whether they are major multinational pharmaceutical corporations or small, innovative biotechnology companies, have specialist departments of Regulatory Affairs professionals. The success of regulatory strategy is less dependent on the regulations than on how they are interpreted, applied, and communicated within companies and to outside constituents. Regulatory Affairs plays a crucial role in the pharmaceutical industry an Regulatory Affairs plays a crucial role in the pharmaceutical industry and is involved in all stages of drug development and also after drug approval and marketing.<br><br>The drug development process is a lengthy, complex and extremely costly albeit necessary process. Pharmaceutical companies use all the data accumulated during discovery and development stages in order to register the drug and thus market the drug. Throughout the development stages, pharmaceutical companies have to abide by an array of strict rules and guidelines in order to ensure safety and efficacy of the drug in humans.</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section class=\"approach approach-images company-core-value py-5 bg-dark\">\r\n<div class=\"container  position-relative  \">\r\n<div class=\"rowfff\">\r\n<div class=\"base-header2 w-75 mx-auto mb-3\">&nbsp;</div>\r\n</div>\r\n</div>\r\n</section>', 'uploads/cms/cms-1690368693.png', NULL, 1, 1, NULL, '2023-07-26 05:21:33', '2023-07-26 05:21:33'),
(18, 12, 'section_2', '<h2 class=\" pb-0 fs-25 fw-bold lsp-5 text-white text-capitalize text-center\"><span style=\"color: rgb(255, 255, 255);\">Simple Cloud Migration&nbsp;<span class=\"text-sky   fs-25 \">Service For Your Big Ideas!</span></span></h2>', '<p>Let Us Know Who You Are and Where You Want to Go, and We&rsquo;ll Get You There.</p>', NULL, NULL, 1, 1, NULL, '2023-07-26 05:35:22', '2023-07-26 05:35:22'),
(19, 12, 'section_3', '<h2>Our&nbsp;<span class=\"text-sky   fs-25 \">Features</span></h2>', '<div class=\"base-header2 w-75 mx-auto mb-3\">\r\n<p class=\"fs-13 lsp-5  lh-base text-center mx-auto\">Cloudware Technologies Private Limited is one of the finest blockchain development companies located in Jaipur, India. Outsource Cloudware Technologies Private Limited and its blockchain development services and enjoy the unmatched quality of solutions, including dedicated teams, total transparency, quality assurance, up-to-date development standards, timely delivery, and outstanding support.</p>\r\n</div>', NULL, NULL, 1, 1, NULL, '2023-07-26 05:43:56', '2023-07-26 05:43:56'),
(20, 12, 'section_4', '<h2><span style=\"color: rgb(255, 255, 255);\">Choose Us&nbsp;<span class=\"text-sky   fs-25 \">Because We Are</span></span></h2>', '<p>Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here Best Powerful Server &amp; platform In Here</p>', 'uploads/cms/cms-1690370915.png', NULL, 1, 1, NULL, '2023-07-26 05:58:35', '2023-07-26 05:58:35');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_section_datas`
--

INSERT INTO `service_section_datas` (`id`, `page_id`, `section_id`, `title`, `description`, `img`, `order_number`, `other`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(23, 12, 18, 'Fixed Cost With No Hidden Charges', '<p><span style=\"color: rgb(255, 255, 255);\">Enjoy our premium bare metal servers without worrying about increasing costs or hidden charges. Get a single invoice every month</span></p>', 'uploads/cms/cms-1690369565.png', 1, NULL, 1, 1, 1, '2023-07-26 05:36:05', '2023-07-27 00:27:20'),
(24, 12, 18, 'Private Cloud Dedicated Servers', '<p><span style=\"color: rgb(255, 255, 255);\">Rest assured, businesses enjoy the optimal performance when choosing RedSwitches for bare metal servers since all the resources are allocated</span></p>', 'uploads/cms/cms-1690369604.png', 1, NULL, 1, 1, 1, '2023-07-26 05:36:44', '2023-07-27 00:27:49'),
(25, 12, 18, 'Scalability', '<p><span style=\"color: rgb(255, 255, 255);\">With RedSwitches, you don&rsquo;t have to worry about scalability. Our team ensures that the bare metal servers scale with your business&rsquo;s growing</span></p>', 'uploads/cms/cms-1690369659.png', 1, NULL, 1, 1, 1, '2023-07-26 05:37:39', '2023-07-27 00:27:58'),
(26, 12, 18, 'Optimal Support', '<p><span style=\"color: rgb(255, 255, 255);\">Issues can arise at any time of the day. That&rsquo;s why our support team is available 24 hours a day and 7 days a week. We can be contacted through</span></p>', 'uploads/cms/cms-1690369695.png', 1, NULL, 1, 1, 1, '2023-07-26 05:38:15', '2023-07-27 00:28:07'),
(27, 12, 19, 'Standard DDoS Protection sss', '<p>Get real-time monitoring to mitigate threats and shield your website and server</p>', 'uploads/cms/cms-1690370381.png', 1, NULL, 1, 1, 1, '2023-07-26 05:49:41', '2023-07-27 00:33:40'),
(28, 12, 19, 'Cloudflare CDN', '<p>Speed up your website by serving site content from worldwide servers located</p>', 'uploads/cms/cms-1690370405.png', 1, NULL, 1, 1, NULL, '2023-07-26 05:50:05', '2023-07-26 05:50:05'),
(29, 12, 19, 'Backup Drive', '<p>All Liquid Web dedicated servers come standard with a secondary drive pre-</p>', 'uploads/cms/cms-1690370441.png', 1, NULL, 1, 1, NULL, '2023-07-26 05:50:41', '2023-07-26 05:50:41'),
(30, 12, 19, 'Server Secure Advanced Security', '<p>Optimize security settings with exclusive ServerSecure protection</p>', 'uploads/cms/cms-1690370469.png', 1, NULL, 1, 1, NULL, '2023-07-26 05:51:09', '2023-07-26 05:51:09'),
(31, 12, 19, 'Interworx, Plesk, Or CPanel Available', '<p>Get centralized hosting management and system-level control for all of your</p>', 'uploads/cms/cms-1690370520.png', 1, NULL, 1, 1, NULL, '2023-07-26 05:52:00', '2023-07-26 05:52:00'),
(32, 12, 19, 'IPMI Access', '<p>Monitor and manage your Linux or dedicated Windows server remotely</p>', 'uploads/cms/cms-1690370638.png', 1, NULL, 1, 1, NULL, '2023-07-26 05:53:58', '2023-07-26 05:53:58'),
(33, 12, 19, 'Root Access', '<p>Take full control of your server with root-level access for complete</p>', 'uploads/cms/cms-1690370666.png', 1, NULL, 1, 1, NULL, '2023-07-26 05:54:26', '2023-07-26 05:54:26'),
(34, 12, 19, 'Dedicated IP Address', '<p>Enhance security and the accessibility of your server with a dedicated IP</p>', 'uploads/cms/cms-1690370720.png', 1, NULL, 1, 1, NULL, '2023-07-26 05:55:20', '2023-07-26 05:55:20'),
(35, 12, 19, 'Business-Grade SSD Storage', '<p>Kick up the pace of server performance with solid-state drives to handle</p>', 'uploads/cms/cms-1690370742.png', 1, NULL, 1, 1, NULL, '2023-07-26 05:55:42', '2023-07-26 05:55:42'),
(36, 12, 19, '100% Network And Power Uptime SLAs', '<p>Uptime is critical, so we guarantee your dedicated server will have power and</p>', 'uploads/cms/cms-1690370762.png', 1, NULL, 1, 1, NULL, '2023-07-26 05:56:02', '2023-07-26 05:56:02'),
(37, 12, 20, 'Tier 4 Datacenter', '<p class=\"fs-13 lsp-5  lh-base text-left text-white mx-auto\">Best Powerful Server Proactively revolutionize granular customer service after pandemic internal or customer service after pandemic internal or \"organic\" sources. Distinctively impact proactive.</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data1.png\" alt=\"Orrish\"></span>Asia&rsquo;s Largest Rated 4 Datacenter</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data-protection1.png\" alt=\"Orrish\"></span>Mission Critical 9 Zone Security Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/Support-comparison11.png\" alt=\"Orrish\"></span>Uninterrupted Power Power Supply Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"../../../cloudware_html/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>Industry Best Uptime SLA Of 99.995%</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/performance11.png\" alt=\"Orrish\"></span>Zero-Downtime Since Inception</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/support1.png\" alt=\"Orrish\"></span>24X7 Customer Support</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/domain-servers1.png\" alt=\"Orrish\"></span>Carrier Neutrality &amp; Unmatched Peering Network</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/invest-trust1.png\" alt=\"Orrish\"></span>Trusted By Ban</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, NULL, '2023-07-26 05:59:44', '2023-07-26 05:59:44'),
(38, 12, 20, 'Enterprises Hardware', '<p class=\"fs-13 lsp-5  lh-base  text-white text-left mx-auto\">Full Satisfaction platform Proactively revolutionize granular customer service after pandemic internal or \"organic\" sources. Distinctively impact proactive</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data1.png\" alt=\"Orrish\"></span>Asia&rsquo;s Largest Rated 4 Datacenter</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data-protection1.png\" alt=\"Orrish\"></span>Mission Critical 9 Zone Security Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/Support-comparison11.png\" alt=\"Orrish\"></span>Uninterrupted Power Power Supply Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"../../../cloudware_html/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>Industry Best Uptime SLA Of 99.995%</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/performance11.png\" alt=\"Orrish\"></span>Zero-Downtime Since Inception</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/support1.png\" alt=\"Orrish\"></span>24X7 Customer Support</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/domain-servers1.png\" alt=\"Orrish\"></span>Carrier Neutrality &amp; Unmatched Peering Network</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/invest-trust1.png\" alt=\"Orrish\"></span>Trusted By Bank</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, NULL, '2023-07-26 06:00:24', '2023-07-26 06:00:24'),
(39, 12, 20, 'Predectiable Billing', '<p class=\"fs-13 lsp-5  lh-base text-white text-left mx-auto\">Full Satisfaction platform Proactively revolutionize granular customer service after pandemic internal or \"organic\" sources. Distinctively impact proactive</p>\r\n<div class=\"row pt-1\">\r\n<div class=\"col-sm-12 align-self-center\">\r\n<ul class=\"about-list list-unstyled bg-transparent text-title fs-13 lsp-5 text-muted2mb-0 d-flow-root\">\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data1.png\" alt=\"Orrish\"></span>Asia&rsquo;s Largest Rated 4 Datacenter</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/data-protection1.png\" alt=\"Orrish\"></span>Mission Critical 9 Zone Security Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/Support-comparison11.png\" alt=\"Orrish\"></span>Uninterrupted Power Power Supply Ensured</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px   p-1 \" src=\"../../../cloudware_html/img/Managed-WordPress11.png\" alt=\"Orrish\"></span>Industry Best Uptime SLA Of 99.995%</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/performance11.png\" alt=\"Orrish\"></span>Zero-Downtime Since Inception</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/support1.png\" alt=\"Orrish\"></span>24X7 Customer Support</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/domain-servers1.png\" alt=\"Orrish\"></span>Carrier Neutrality &amp; Unmatched Peering Network</p>\r\n</li>\r\n<li class=\"bg-transparent rounded px-0 mb-0 d-block w-48 justify-content-between align-items-center align-items-center float-start\">\r\n<p class=\"h-50px my-1 fs-13 lsp-5 d-flex align-items-center text-white\"><span class=\"border-dashed rounded-circle p-1 me-2\"><img class=\"w-30px h-30px    p-1 \" src=\"../../../cloudware_html/img/invest-trust1.png\" alt=\"Orrish\"></span>Trusted By Bank</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>', NULL, 1, NULL, 1, 1, NULL, '2023-07-26 06:00:55', '2023-07-26 06:00:55');

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
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `type`, `name`, `designation`, `profile_pic`, `facebook_id`, `twitter_id`, `linkedin_id`, `description`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Main Staff', 'Rishi Kumar Malhotra', 'CEO & Founder', 'C:\\xampp\\tmp\\phpB7A7.tmp', 'facebbok.co', 'twitter.com', 'likedin.com', NULL, 1, NULL, '2023-05-07 23:29:50', '2023-05-29 11:17:40'),
(2, 'Main Staff', 'dsefsw', 'efwf', 'C:\\xampp\\tmp\\phpBD3C.tmp', 'wefegfe', NULL, NULL, NULL, 1, NULL, '2023-05-07 23:32:03', '2023-05-07 23:32:03'),
(3, 'Main Staff', 'nvcn', 'gfjngfdnjf', 'C:\\xampp\\tmp\\php4C18.tmp', 'fghfgh', 'hggfhf', NULL, NULL, 1, NULL, '2023-05-07 23:34:50', '2023-05-07 23:34:50'),
(4, 'Main Staff', 'jghjkhg', 'jhgjkhg', 'uploads/staff/staff-1683523045.jpg', 'hgjgh', 'jghjgh', 'jhgj', NULL, 1, 1, '2023-05-07 23:47:25', '2023-05-29 11:17:44'),
(5, 'Team', 'Sudarshan', 'Designation', 'uploads/staff/staff-1685360431.jpg', NULL, NULL, 'testlinkedin', NULL, 1, 1, '2023-05-29 06:10:31', '2023-05-29 06:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'avinash@gmail.com', '2023-05-30 03:58:23', '2023-05-30 03:58:23'),
(2, 'avinash.orrish@gmail.com', '2023-05-30 03:59:01', '2023-05-30 03:59:01'),
(3, 'hosting.octa@gmail.com', '2023-05-30 04:02:28', '2023-05-30 04:02:28'),
(4, 'rohan008smazzkart@gmail.com', '2023-07-15 06:10:23', '2023-07-15 06:10:23'),
(5, 'sdvsdv@gmail.com', '2023-07-24 07:30:42', '2023-07-24 07:30:42');

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
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `img`, `designation`, `message`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'test name 1', 'https://res.cloudinary.com/avi-blog/image/upload/v1679981407/cx2v6yvx2c6bnabwqjlu.jpg', 'test designation', 'Test Message 1', 1, 1, 1, '2023-03-28 00:00:08', '2023-03-28 05:27:32'),
(2, 'Saul Goodman', 'https://res.cloudinary.com/avi-blog/image/upload/v1680001020/il9boqjwlnvg7jq2gmmf.jpg', 'Ceo Founder', 'Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.', 1, 1, 1, '2023-03-28 05:27:01', '2023-04-08 00:56:51'),
(3, 'Avinash Singh Test', 'uploads/all/all-1688716802.png', 'Testimonials test', 'this is a simple testing for testimonials', 1, 1, NULL, '2023-07-07 02:30:02', '2023-07-07 02:30:02');

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

INSERT INTO `users` (`id`, `user_type_id`, `user_designation_id`, `first_name`, `last_name`, `mobile`, `email`, `gender`, `email_verified_at`, `address`, `country`, `state`, `city`, `pincode`, `status`, `ip_address`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Admin', 'Admin', '8825171386', 'admin@gmail.com', 'Male', NULL, 'Srinagar', NULL, 0, 0, '85431', 1, NULL, NULL, 0, NULL, '2023-03-14 15:43:46', '2023-03-14 17:38:19'),
(3, 3, 2, 'Avinash', 'Singh', '9876543210', 'avinash@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-03-29 06:09:48', '2023-03-29 06:09:48'),
(7, 3, 2, 'Customer', 'Singh', '9874125630', 'admin@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-03-29 23:38:31', '2023-03-29 23:38:31'),
(9, 3, 2, 'test', 'ip', '9988776655', 'test@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '2023-04-08 01:48:40', '2023-04-08 01:48:40'),
(10, 3, 2, 'test', 'ip2', '1234565432', 'test1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '::1', NULL, NULL, NULL, '2023-04-08 01:50:08', '2023-04-08 06:18:04'),
(12, 3, 2, 'test2', NULL, '9988998877', 'test2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '::1', NULL, NULL, NULL, '2023-04-08 01:56:26', '2023-04-08 06:17:30'),
(13, 3, 2, 'Avinash', 'Singh', '7210840621', 'avinash@gmail.commm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '::1', NULL, NULL, NULL, '2023-05-30 01:38:35', '2023-05-30 01:38:35');

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
(1, 1, 1, 'admin@gmail.com', '123456', 1, '2023-03-15 09:12:22', '2023-03-14 22:12:22', '2023-04-08 11:52:22'),
(2, 7, 3, 'admin@example.com', '123456', 1, NULL, '2023-03-29 23:38:31', '2023-03-30 05:36:36'),
(3, 8, 3, 'fd@fdg.com', '444444', 1, NULL, '2023-04-08 01:47:27', '2023-04-08 07:22:44'),
(4, 9, 3, 'test@gmail.com', '123456', 1, NULL, '2023-04-08 01:48:40', '2023-04-08 07:22:41'),
(5, 10, 3, 'test1@gmail.com', '123456', 0, NULL, '2023-04-08 01:50:08', '2023-04-08 06:18:04'),
(7, 12, 3, 'test2@gmail.com', '123456', 0, NULL, '2023-04-08 01:56:26', '2023-04-08 06:17:30'),
(8, 13, 3, 'avinash@gmail.commm', '123456', 1, NULL, '2023-05-30 01:38:35', '2023-05-30 01:38:35');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `link`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'test', 'https://www.youtube.com/embed/wwQk8yrPjs0', 1, 1, 0, '2023-06-30 01:50:30', '2023-06-30 01:50:30'),
(2, 'test1', 'https://www.youtube.com/embed/wwQk8yrPjs0', 1, 1, 1, '2023-06-30 01:51:02', '2023-06-30 01:51:58'),
(3, 'Video testimonial', 'https://www.youtube.com/embed/wwQk8yrPjs0', 1, 1, 1, '2023-07-07 02:30:53', '2023-07-07 02:31:23');

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
-- Indexes for table `master_designations`
--
ALTER TABLE `master_designations`
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
-- Indexes for table `pricings`
--
ALTER TABLE `pricings`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_likes`
--
ALTER TABLE `blog_likes`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_views`
--
ALTER TABLE `blog_views`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `business_settings`
--
ALTER TABLE `business_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `customer_leads`
--
ALTER TABLE `customer_leads`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `image_categories`
--
ALTER TABLE `image_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_designations`
--
ALTER TABLE `master_designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_products`
--
ALTER TABLE `master_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `master_services`
--
ALTER TABLE `master_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `page_sections`
--
ALTER TABLE `page_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pricings`
--
ALTER TABLE `pricings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pricing_types`
--
ALTER TABLE `pricing_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_sections`
--
ALTER TABLE `product_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_section_datas`
--
ALTER TABLE `product_section_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `section_datas`
--
ALTER TABLE `section_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `service_pages`
--
ALTER TABLE `service_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_sections`
--
ALTER TABLE `service_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `service_section_datas`
--
ALTER TABLE `service_section_datas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_designations`
--
ALTER TABLE `user_designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_logins`
--
ALTER TABLE `user_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
