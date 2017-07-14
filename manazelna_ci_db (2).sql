-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2017 at 12:50 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manazelna_ci_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `title`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'Balcony', 'شرفة', NULL, NULL),
(2, 'Built in Kitchen', 'مطبخ داخلى', NULL, NULL),
(4, 'Built in Wardrobes', 'خزانة ملابس', NULL, NULL),
(5, 'Central A/C & heating', 'تدفئة مركزية', NULL, NULL),
(6, 'Covered Parking', '', NULL, NULL),
(7, 'Maids Room', '', NULL, NULL),
(8, 'Pets Allowed', '', NULL, NULL),
(9, 'Private Garden', '', NULL, NULL),
(10, 'Private Gym', '', NULL, NULL),
(11, 'Private Jacuzzi', '', NULL, NULL),
(12, 'Private Pool', '', NULL, NULL),
(13, 'Security', '', NULL, NULL),
(14, 'Shared Gym', '', NULL, NULL),
(15, 'Shared Pool', '', NULL, NULL),
(16, 'Shared Spa', '', NULL, NULL),
(17, 'Study', '', NULL, NULL),
(18, 'Walk-in Closet', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  `active_en` tinyint(4) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `title`, `position`, `image`, `content`, `active`, `active_en`, `order`) VALUES
(28, 'اسم', 'منصب', '66', '', 1, 0, 0),
(27, 'اسم', 'منصب', '66', '', 1, 0, 0),
(29, 'اسم', 'منصب', '66', '', 1, 0, 0),
(30, 'اسم', 'منصب', '66', '', 1, 0, 2),
(31, 'اسم', 'منصب', '66', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `join_date` varchar(20) NOT NULL,
  `visits` int(11) NOT NULL,
  `remember_me_token` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `password`, `email`, `join_date`, `visits`, `remember_me_token`) VALUES
(1, 'noureldin fawzy', '202cb962ac59075b964b07152d234b70', 'noureldin.fawzy@outlook.com', '1492705425', 11, '14932197875900b9cbb0d3a'),
(2, 'noureldin fawzy', 'e10adc3949ba59abbe56e057f20f883e', 'noureldin.fawzy@outlook9.com', '1492705758', 0, ''),
(3, 'islam', '827ccb0eea8a706c4c34a16891f84e7b', 'islam@mail.com', '1494082044', 5, ''),
(4, 'اسلام', '827ccb0eea8a706c4c34a16891f84e7b', 'islam@gmail.com', '1495205871', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_status` tinyint(1) NOT NULL,
  `metakey` varchar(255) NOT NULL,
  `metadesc` varchar(255) NOT NULL,
  `close_msg` text NOT NULL,
  `admin_note` text NOT NULL,
  `site_phone` varchar(255) NOT NULL,
  `site_mob` varchar(255) NOT NULL,
  `site_fax` varchar(255) NOT NULL,
  `site_address` text NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `site_logo` text NOT NULL,
  `gmap` longtext NOT NULL,
  `contact_page` longtext NOT NULL,
  `contact_page_en` longtext NOT NULL,
  `visitors` varchar(255) NOT NULL,
  `site_name_en` text NOT NULL,
  `metakey_en` text NOT NULL,
  `metadesc_en` text NOT NULL,
  `close_msg_en` text NOT NULL,
  `site_address_en` text NOT NULL,
  `meta_tags` text NOT NULL,
  `meta_tags_en` text NOT NULL,
  `current` int(11) NOT NULL,
  `slider` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `site_name`, `site_status`, `metakey`, `metadesc`, `close_msg`, `admin_note`, `site_phone`, `site_mob`, `site_fax`, `site_address`, `site_email`, `site_logo`, `gmap`, `contact_page`, `contact_page_en`, `visitors`, `site_name_en`, `metakey_en`, `metadesc_en`, `close_msg_en`, `site_address_en`, `meta_tags`, `meta_tags_en`, `current`, `slider`) VALUES
(1, 'منازلنا للتسويق العقارى', 1, 'keywords', 'description', '<h1 style=\"text-align: center;\">\r\n <strong>الموقع في الصيانة </strong></h1>\r\n', '<p>admin note here</p>\r\n', '002 01098573728', '', '002123456789', 'القاهرة - جمهورية مصر العربية - العباسية', 'noureldin.fawzy@outlook.com', 'upload/config/f7b11a19f8df01ab411e9e58f62a9162.jpg', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d55275.192072303675!2d31.15462373412866!3d30.016783664328525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458469235579697:0x4e91d61f9878fc52!2sGiza,+Al+Omraneyah,+Giza+Governorate!5e0!3m2!1sen!2seg!4v1487425738187\" width=\"100%\" height=\"450px\" frameborder=\"0\" style=\"border:0\" allowfullscreen&gt;&lt;/iframe>', '', '', '', 'Manazina For Real State Marketing & investment', 'Manazina For Real State Marketing & investment', 'Manazina For Real State Marketing & investment', '<h1 style=\"text-align: center;\">\r\n <strong>Under Updating </strong></h1>\r\n', 'Cairo - Egypt -Abassia', '                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ', 'Manazina For Real State Marketing & investment\r\n', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact_inbox`
--

CREATE TABLE `contact_inbox` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `message` text NOT NULL,
  `send_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `offer_cat` text NOT NULL,
  `package` text NOT NULL,
  `contact_type` int(11) NOT NULL DEFAULT '0',
  `phone` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contact_page`
--

CREATE TABLE `contact_page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `content_en` text NOT NULL,
  `meta_key` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_key_en` text NOT NULL,
  `meta_desc_en` text NOT NULL,
  `meta_tags` text NOT NULL,
  `meta_tags_en` text NOT NULL,
  `gmap` text NOT NULL,
  `image` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_page`
--

INSERT INTO `contact_page` (`id`, `title`, `content`, `title_en`, `content_en`, `meta_key`, `meta_desc`, `meta_key_en`, `meta_desc_en`, `meta_tags`, `meta_tags_en`, `gmap`, `image`) VALUES
(1, 'الجنات للتنمية والاستثمار العقارى', '<p dir=\"rtl\">\r\n هدفنا هو إنجاز التصاميم جيدا، والوظيفية، ويمكن البناء عليها التي تلبي المواصفات الخا صة بك، وهي جاهزة للتنفيذ. هدفنا هو إنجاز التصاميم جيدا، والوظيفية، ويمكن البناء عليها التي تلبي المواصفات الخا صة بك، وهي جاهزة للتنفيذ.</p>\r\n', 'Al Jannat For Development & Real State Invesment', '<div>\r\n Search engine optimization (SEO) is a modern technique to increase visibility of today’s websites using the organic search methods like Google, Yahoo, Bing with a mix between technical and digital marketing strategies to improve both traffic and performance.</div>\r\n', 'الكلمات المفتاحيه ', 'وصف الصفحة', 'Meta  keywords', 'Meta Description', '&lt;meta tags arabic  /&gt;', '&lt;meta tags english /&gt;', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d475308.82136459055!2d39.21128220000001!3d21.454772799999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59:0xe059579737b118db!2z2KzYr9ipINin2YTZhdmF2YTZg9ipINin2YTYudix2KjZitipINin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1418431014613\" width=\"100%\" height=\"450\" frameborder=\"0\" style=\"border:0\"&gt;&lt;/iframe>', 10);

-- --------------------------------------------------------

--
-- Table structure for table `finish_types`
--

CREATE TABLE `finish_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finish_types`
--

INSERT INTO `finish_types` (`id`, `title`, `title_ar`, `created_at`, `updated_at`) VALUES
(1, 'LUX', 'لوكس', '2017-03-27 16:02:51', '2017-03-27 16:02:51'),
(2, 'Super lux', 'سوبر لوكس', '2017-03-27 16:03:45', '2017-03-27 16:03:45'),
(3, 'Extra Super Lux', 'اكسترا سوبر لوكس', '2017-03-27 16:04:52', '2017-03-27 16:04:52'),
(4, 'Semi-Finished', 'نصف تشطيب', '2017-03-27 16:05:09', '2017-03-27 16:05:09'),
(5, 'Without finish', 'بدون تشطيب', '2017-03-27 16:05:50', '2017-03-27 16:05:50'),
(6, 'Furnished', 'تشطيب كامل', '2017-03-27 16:06:07', '2017-03-27 16:06:07'),
(7, 'Duplex', 'دوبلكس', '2017-03-27 16:48:32', '2017-03-27 16:48:32');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `thumb` text NOT NULL,
  `catid` tinyint(4) DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `sub_catid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `thumb`, `catid`, `active`, `sub_catid`) VALUES
(198, 'upload/537170671.jpg', '', NULL, 0, NULL),
(199, 'upload/537170672.jpg', '', NULL, 0, NULL),
(200, 'upload/537170673.jpg', '', NULL, 0, NULL),
(201, 'upload/537170674.jpg', '', NULL, 0, NULL),
(202, 'upload/537170675.jpg', '', NULL, 0, NULL),
(203, 'upload/537170676.jpg', '', NULL, 0, NULL),
(204, 'upload/537170677.jpg', '', NULL, 0, NULL),
(205, 'upload/537170678.jpg', '', NULL, 0, NULL),
(217, 'upload/823384268.jpg', '', NULL, 0, NULL),
(218, 'upload/739434043.jpg', '', NULL, 0, NULL),
(212, 'upload/5371706713.jpg', '', NULL, 0, NULL),
(213, 'upload/5371706714.jpg', '', NULL, 0, NULL),
(214, 'upload/5371706715.jpg', '', NULL, 0, NULL),
(215, 'upload/5371706716.jpg', '', NULL, 0, NULL),
(216, 'upload/5371706717.jpg', '', NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_cats`
--

CREATE TABLE `gallery_cats` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_cats`
--

INSERT INTO `gallery_cats` (`id`, `title`, `catid`, `active`) VALUES
(1, 'our-clients', 0, 1),
(2, 'projects-images', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` text NOT NULL,
  `browser_title` text NOT NULL,
  `browser_title_en` text NOT NULL,
  `alias` varchar(255) NOT NULL,
  `alias_en` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `link_en` varchar(255) NOT NULL,
  `parent` varchar(11) NOT NULL,
  `parent_cat` int(11) NOT NULL,
  `ordering` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `active_en` tinyint(4) NOT NULL,
  `sub` tinyint(4) NOT NULL,
  `menu` int(11) NOT NULL,
  `pos1` tinyint(4) NOT NULL,
  `pos2` tinyint(4) NOT NULL,
  `pos1_en` tinyint(2) NOT NULL,
  `pos2_en` tinyint(2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `meta_key` text NOT NULL,
  `meta_key_en` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_desc_en` text NOT NULL,
  `meta_tags` text NOT NULL,
  `meta_tags_en` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `title`, `title_en`, `browser_title`, `browser_title_en`, `alias`, `alias_en`, `link`, `link_en`, `parent`, `parent_cat`, `ordering`, `active`, `active_en`, `sub`, `menu`, `pos1`, `pos2`, `pos1_en`, `pos2_en`, `image`, `meta_key`, `meta_key_en`, `meta_desc`, `meta_desc_en`, `meta_tags`, `meta_tags_en`) VALUES
(48, 'نبذه عن المجلة', 'About', 'نبذه عن المجلة', 'About', 'about', '', 'about', '', '83', 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', ''),
(49, 'قواعد النشر', 'About', 'قواعد النشر', 'About', 'rule', '', 'rule', '', '81', 0, 2, 1, 1, 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', ''),
(50, 'رئيس التحرير', 'About', 'رئيس التحرير', 'About', 'editor', '', 'editor', '', '84', 0, 3, 1, 1, 0, 0, 0, 0, 0, 0, '0', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu_collapse`
--

CREATE TABLE `menu_collapse` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `title_en` text NOT NULL,
  `content_en` text NOT NULL,
  `image` int(10) NOT NULL,
  `active` int(2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `title_en`, `content_en`, `image`, `active`, `created_at`) VALUES
(3, 'عنوان الخبر 1 عنوان الخبر 1', 'محتوى الخبر 1 محتوى الخبر 1 محتوى الخبر 1 محتوى الخبر 1 محتوى الخبر 1 محتوى الخبر 1 محتوى الخبر 1 محتوى الخبر 1 محتوى الخبر 1 محتوى الخبر 1 محتوى الخبر 1 محتوى الخبر 1 محتوى الخبر 1 محتوى الخبر 1 ', 'Great deals on our anniversary', 'Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary ', 198, 1, '2017-05-20 07:35:23'),
(2, 'عنوان خبر 2 عنوان خبر 2 ', 'محتوى خبر 2 محتوى خبر 2 محتوى خبر 2 محتوى خبر 2 محتوى خبر 2 محتوى خبر 2 محتوى خبر 2 محتوى خبر 2 محتوى خبر 2 محتوى خبر 2 محتوى خبر 2', 'Great deals on our anniversary', 'Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary ', 218, 1, '2017-05-19 16:49:31'),
(4, 'عنوان الخبر 3 عنوان الخبر 3', 'محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 محتوى الخبر 3 ', 'Great deals on our anniversary', 'Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary ', 216, 1, '2017-05-20 07:51:25'),
(5, 'عنوان الخبر 4 عنوان الخبر 4', 'محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 محتوى الخبر 4 ', 'Great deals on our anniversary ', 'Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary Great deals on our anniversary ', 214, 1, '2017-05-20 07:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_mails`
--

CREATE TABLE `newsletter_mails` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text,
  `unit` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter_mails`
--

INSERT INTO `newsletter_mails` (`id`, `email`, `fullname`, `phone`, `address`, `unit`, `active`, `time`) VALUES
(1, 'noureldin.fawzy@outlook.com', NULL, NULL, NULL, NULL, 1, '2017-04-25 14:50:05'),
(2, 'admin@admin.com', NULL, NULL, NULL, NULL, 1, '2017-04-26 12:05:08'),
(3, 'islam@mail.com', NULL, NULL, NULL, NULL, 1, '2017-05-19 14:58:44'),
(4, 'islam.fawzi99@gmail.com', NULL, NULL, NULL, NULL, 1, '2017-05-20 08:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_messages`
--

CREATE TABLE `newsletter_messages` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `mails` text NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `newsletter_messages`
--

INSERT INTO `newsletter_messages` (`id`, `title`, `message`, `mails`, `last_updated`) VALUES
(1, 'عرض منازلنا', 'عرض منازلنا عرض منازلنا عرض منازلنا عرض منازلنا عرض منازلنا عرض منازلنا عرض منازلنا عرض منازلنا عرض منازلنا عرض منازلنا عرض منازلنا عرض منازلنا عرض منازلنا عرض منازلنا ', 'islam.fawzi99@gmail.com,islam@mail.com,admin@admin.com,noureldin.fawzy@outlook.com', '2017-05-20 10:52:36');

-- --------------------------------------------------------

--
-- Table structure for table `offers_cats`
--

CREATE TABLE `offers_cats` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `active` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `catid` int(11) NOT NULL,
  `active` tinyint(2) NOT NULL,
  `thnx` text NOT NULL,
  `thnx_en` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `browser_title` text NOT NULL,
  `browser_title_en` text NOT NULL,
  `content` longtext NOT NULL,
  `content_en` longtext NOT NULL,
  `active` int(5) NOT NULL,
  `active_en` tinyint(4) NOT NULL,
  `image` text NOT NULL,
  `fb_image` varchar(255) NOT NULL,
  `catid` varchar(11) NOT NULL,
  `catid_en` varchar(11) NOT NULL,
  `sub_catid` int(11) NOT NULL,
  `sub_catid_en` int(11) NOT NULL,
  `type` int(4) NOT NULL DEFAULT '1',
  `type_en` int(11) NOT NULL,
  `sub_type` int(4) NOT NULL,
  `sub_type_en` int(4) NOT NULL,
  `meta_key` text NOT NULL,
  `meta_desc` text NOT NULL,
  `meta_tags` longtext NOT NULL,
  `meta_key_en` text NOT NULL,
  `meta_desc_en` text NOT NULL,
  `meta_tags_en` text NOT NULL,
  `fet` tinyint(4) NOT NULL,
  `fet_subType` tinyint(4) NOT NULL,
  `cat_FK` int(11) NOT NULL,
  `fet_en` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `page_banner`
--

CREATE TABLE `page_banner` (
  `id` varchar(10) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_banner`
--

INSERT INTO `page_banner` (`id`, `img`) VALUES
('about', 'upload/slider/183f3e83d9cf700ceb645a12ea99a78b.gif'),
('clients', 'upload/slider/318cc2bbe0033f5d78bee18a3f0c23b4.gif'),
('contact', 'upload/slider/4f526cfd7f8139f9cee59bb6cc90d3c5.gif'),
('pro', 'upload/slider/c7348f0d7c6b8e2b45169995f3c05863.png');

-- --------------------------------------------------------

--
-- Table structure for table `page_cats`
--

CREATE TABLE `page_cats` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_en` text NOT NULL,
  `catid` varchar(11) DEFAULT '0',
  `sub_catid` int(11) DEFAULT '0',
  `active` tinyint(4) NOT NULL,
  `active_en` tinyint(4) NOT NULL,
  `fet` tinyint(4) NOT NULL,
  `fet_en` tinyint(4) NOT NULL,
  `link` text,
  `link_en` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `title_en`, `image`, `content`, `content_en`, `catid`, `sub_catid`, `active`, `active_en`, `fet`, `fet_en`, `link`, `link_en`, `create_date`) VALUES
(11, 'منتج 1', 'product 1', '61,60', '<p>\n لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\n', '\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n', '4', 1, 1, 1, 1, 1, NULL, NULL, '2016-10-12 08:52:01'),
(12, 'منتج 2', 'product 2', '61', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم. ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '4', 2, 1, 1, 1, 0, NULL, NULL, '2016-10-12 08:55:21'),
(13, 'منتج 3', 'product 1', '60', '<p>\r\n لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '4', 1, 1, 1, 1, 0, NULL, NULL, '2016-10-12 08:52:01'),
(14, 'منتج 4', 'product 1', '60', '<p>\r\n لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '4', 1, 1, 1, 1, 0, NULL, NULL, '2016-10-12 08:52:01'),
(15, 'منتج 5', 'product 1', '60', '<p>\r\n لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '4', 1, 1, 1, 1, 1, NULL, NULL, '2016-10-12 08:52:01'),
(16, 'منتج 1', 'product 1', '60', '<p>\r\n لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '4', 1, 1, 1, 0, 1, NULL, NULL, '2016-10-12 08:52:01'),
(17, 'منتج 1', 'product 1', '60', '<p>\r\n لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '4', 1, 1, 1, 0, 1, NULL, NULL, '2016-10-12 08:52:01'),
(18, 'منتج 1', 'product 1', '60,61', '<p>\r\n لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n', '\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n', '4', 1, 1, 1, 0, 1, NULL, NULL, '2016-10-12 08:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_cats`
--

CREATE TABLE `portfolio_cats` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio_cats`
--

INSERT INTO `portfolio_cats` (`id`, `title`, `title_en`, `active`, `image`) VALUES
(4, 'قسم 1', 'category 1', 1, '60'),
(5, 'قسم 2', 'category 2', 1, '61');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_subcats`
--

CREATE TABLE `portfolio_subcats` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `cat_FK` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `image` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio_subcats`
--

INSERT INTO `portfolio_subcats` (`id`, `title`, `title_en`, `cat_FK`, `active`, `image`) VALUES
(1, 'قسم فرعى 1', 'subCategory 1', 4, 1, 61),
(2, 'قسم فرعى 2', 'subCategory 2', 4, 1, 60),
(3, 'قسم فرعى 3', 'subCategory 3', 5, 1, 0),
(4, 'قسم فرعى 4', 'subCategory 4', 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `catid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_ar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(4) NOT NULL,
  `price` double NOT NULL,
  `year` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sulg` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` tinyint(4) NOT NULL,
  `soled` tinyint(4) NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `property_type` int(11) NOT NULL,
  `amenities` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finish_types` int(11) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `baths` int(11) DEFAULT NULL,
  `area` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `land_area` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone3` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `ref` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `catid`, `title`, `description`, `title_ar`, `description_ar`, `address_ar`, `address`, `active`, `price`, `year`, `tags`, `sulg`, `video`, `purpose`, `soled`, `feature`, `role`, `property_type`, `amenities`, `finish_types`, `rooms`, `floor`, `baths`, `area`, `land_area`, `meta_title`, `meta_keywords`, `meta_description`, `phone1`, `phone2`, `phone3`, `email`, `location`, `image`, `created_at`, `updated_at`, `rate`, `ref`, `longitude`, `latitude`) VALUES
(1, 9, 'test', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'تجربه', '<p>\r\n لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n', 'القاهرة مصر', '33019 , New York, US', 0, 50000, 'Wednesday 12 April 2017', 'tags', 'slug', '', 0, 0, 0, 1, 2, 'null', 1, 4, 9, 8, '250', '', 'title', 'meta', 'meta', '01234567890', '01234567890', '012345678990', 'noureldin.fawzy@outlook.com', '(28.97920943521319, 31.856703375000052)', '216,215,214,213', '2017-04-08 08:57:36', '2017-04-08 08:57:36', 0, '1', '31.857', '28.979'),
(2, 9, 'property 2', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'd;flkjg', '<p>\r\n لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n', 'القاهرة مصر', '33019 , New York, US', 1, 50000, 'Wednesday 12 April 2017', 'tags', 'slug', '', 0, 1, 1, 1, 3, 'null', 0, 6, 0, 3, '500', '', 'title', 'meta', 'meta', '0111', '', '', 'noureldin.fawzy@outlook.com', '(29.267130550538123, 31.175551031250052)', '218', '2017-04-08 08:57:36', '2017-04-08 08:57:36', 0, '2', '31.176', '29.267'),
(3, 11, 'property 3', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'd;flkjg', '<p>\r\n لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n', 'القاهرة مصر', '33019 , New York, US', 1, 50000, 'Wednesday 12 April 2017', 'tags', 'slug', '', 1, 0, 1, 1, 3, 'null', 0, 0, 0, 0, '250', '', 'title', 'meta', 'meta', '0111', '', '', 'noureldin.fawzy@outlook.com', '(27.683424223501632, 31.043715093750052)', '216', '2017-04-08 08:57:36', '2017-04-08 08:57:36', 0, '3', '31.044', '27.683'),
(4, 10, 'slkfj', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 'd;flkjg', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n', 'القاهرة مصر', '33019 , New York, US', 1, 50000, 'Wednesday 12 April 2017', 'tags', 'slug', '', 1, 0, 1, 1, 3, '0', 0, 0, 0, 0, '250', '', 'title', 'meta', 'meta', '0111', '', '', 'noureldin.fawzy@outlook.com', '123', '216', '2017-04-08 08:57:36', '2017-04-08 08:57:36', 0, '4', '0', '0'),
(5, 9, 'slkfj', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 'd;flkjg', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n', 'القاهرة مصر', '33019 , New York, US', 1, 200, 'Wednesday 12 April 2017', 'tags', 'slug', '', 1, 0, 1, 1, 3, '0', 0, 7, 2, 4, '300', '', 'title', 'meta', 'meta', '0111', '', '', 'noureldin.fawzy@outlook.com', '123', '215', '2017-04-08 09:02:54', '2017-04-08 09:02:54', 0, '5', '0', '0'),
(6, 0, 'title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 'عنوان', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n', 'القاهرة مصر', '33019 , New York, US', 0, 1000000, 'Saturday 08 April 2017', 'tags', 'slug', '', 1, 0, 1, 1, 2, NULL, NULL, NULL, NULL, NULL, '250', 'land area', 'meta title', 'meta keywords', 'meta description', '0123456789', NULL, NULL, 'noureldin.fawzy@outlook.com', '123456789', '', '2017-04-08 09:09:51', '2017-04-08 09:09:51', 0, '6', '0', '0'),
(7, 9, 'title', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', '\'kj\'lkhn', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n', 'القاهرة مصر', '33019 , New York, US', 1, 200, 'Saturday 08 April 2017', 'tags', 'slug', '', 0, 1, 0, 0, 2, '0', 0, 0, 0, 0, '250', '', 'title', 'kewords', 'description', '123456789', '', '', 'noureldin.fawzy@outlook.com', '123456', '216', '2017-04-08 10:20:16', '2017-04-08 10:20:16', 0, '7', '0', '0'),
(8, 9, 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 'تجربه', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n', 'القاهرة مصر', '33019 , New York, US', 1, 50000, 'Wednesday 12 April 2017', 'tags', 'slug', '', 0, 0, 0, 1, 2, '1', 1, 4, 9, 8, '250', '', 'title', 'meta', 'meta', '01234567890', '01234567890', '012345678990', 'noureldin.fawzy@outlook.com', '123', '216,215,214,213', '2017-04-08 08:57:36', '2017-04-08 08:57:36', 0, '8', '0', '0'),
(9, 9, 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 'تجربه', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n', 'القاهرة مصر', '33019 , New York, US', 1, 50000, 'Wednesday 12 April 2017', 'tags', 'slug', '', 0, 0, 0, 1, 2, '1', 1, 4, 9, 8, '100', '', 'title', 'meta', 'meta', '01234567890', '01234567890', '012345678990', 'noureldin.fawzy@outlook.com', '123', '216,215,214,213', '2017-04-08 08:57:36', '2017-04-08 08:57:36', 0, '9', '0', '0'),
(10, 9, 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 'تجربه', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n', 'القاهرة مصر', '33019 , New York, US', 1, 50000, 'Wednesday 12 April 2017', 'tags', 'slug', '', 0, 0, 0, 1, 2, '1', 1, 4, 9, 8, '100', '', 'title', 'meta', 'meta', '01234567890', '01234567890', '012345678990', 'noureldin.fawzy@outlook.com', '123', '216,215,214,213', '2017-04-08 08:57:36', '2017-04-08 08:57:36', 0, '10', '0', '0'),
(11, 9, 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 'تجربه', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n', 'القاهرة مصر', '33019 , New York, US', 1, 50000, 'Wednesday 12 April 2017', 'tags', 'slug', '', 0, 0, 0, 1, 2, '1', 1, 4, 9, 8, '100', '', 'title', 'meta', 'meta', '01234567890', '01234567890', '012345678990', 'noureldin.fawzy@outlook.com', '123', '216,215,214,213', '2017-04-08 08:57:36', '2017-04-08 08:57:36', 0, '11', '0', '0'),
(12, 9, 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 'تجربه', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n', 'القاهرة مصر', '33019 , New York, US', 1, 50000, 'Wednesday 12 April 2017', 'tags', 'slug', '', 0, 0, 0, 1, 2, '1', 1, 4, 9, 8, '100', '', 'title', 'meta', 'meta', '01234567890', '01234567890', '012345678990', 'noureldin.fawzy@outlook.com', '123', '216,215,214,213', '2017-04-08 08:57:36', '2017-04-08 08:57:36', 0, '12', '0', '0'),
(13, 9, 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 'تجربه', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n', 'القاهرة مصر', '33019 , New York, US', 1, 50000, 'Wednesday 12 April 2017', 'tags', 'slug', '', 0, 0, 0, 1, 2, '1', 1, 4, 9, 8, '150', '', 'title', 'meta', 'meta', '01234567890', '01234567890', '012345678990', 'noureldin.fawzy@outlook.com', '123', '216,215,214,213', '2017-04-08 08:57:36', '2017-04-08 08:57:36', 0, '13', '0', '0'),
(14, 9, 'test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 'تجربه', 'لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.\r\n', 'القاهرة مصر', '33019 , New York, US', 1, 50000, 'Wednesday 12 April 2017', 'tags', 'slug', '', 0, 0, 0, 1, 2, '1', 1, 4, 9, 8, '150', '', 'title', 'meta', 'meta', '01234567890', '01234567890', '012345678990', 'noureldin.fawzy@outlook.com', '123', '216,215,214,213', '2017-04-08 08:57:36', '2017-04-08 08:57:36', 0, '14', '0', '0'),
(15, 9, 'platforme platforme platforme', '<p>\r\n Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'شقه', '<p>\r\n لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</p>\r\n', 'القاهرة مصر', 'cairo egypt', 1, 200, 'Wednesday 12 April 2017', '', '', '', 0, 0, 1, 0, 5, '[\"1\",\"2\"]', 2, 3, 3, 2, '300', '', 'meta title', 'meta key wordds', 'meta description                                                                              ', '01234567890', '', '', 'noureldin.fawzy@outlook.com', '(25.918191305132382, 32.604031249999935)', '216,218,215', NULL, NULL, 4, '15', '32.604', '25.918');

-- --------------------------------------------------------

--
-- Table structure for table `projects_cats`
--

CREATE TABLE `projects_cats` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `image` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects_cats`
--

INSERT INTO `projects_cats` (`id`, `title`, `title_en`, `active`, `image`) VALUES
(10, 'قسم 2', 'category 2', 1, 0),
(9, 'قسم 1', 'category 1', 1, 0),
(11, 'قسم 2', 'category 2', 1, 0),
(12, 'قسم 1', 'category 1', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects_subcats`
--

CREATE TABLE `projects_subcats` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `cat_FK` int(11) NOT NULL,
  `active` tinyint(4) NOT NULL,
  `image` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `projects_subcats`
--

INSERT INTO `projects_subcats` (`id`, `title`, `title_en`, `cat_FK`, `active`, `image`) VALUES
(7, 'مدنى', '', 0, 1, 0),
(8, 'دولى عام', '', 0, 1, 0),
(9, 'جزائى', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `title`, `title_ar`, `created_at`, `updated_at`) VALUES
(2, 'Duplex', 'دوبلكس', '2017-03-27 16:51:11', '2017-03-27 16:51:11'),
(3, 'Town House', 'تاون هاوس', '2017-03-27 16:52:08', '2017-03-27 16:52:08'),
(4, 'Twin house', 'توين هاوس', '2017-03-27 16:52:28', '2017-03-27 16:52:28'),
(5, 'Apartment', 'شقة', '2017-03-27 17:04:06', '2017-03-27 17:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `search_results`
--

CREATE TABLE `search_results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `search_query` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `search_results`
--

INSERT INTO `search_results` (`id`, `user_id`, `search_query`, `created_date`, `count`) VALUES
(1, 3, 'query=&address=&purpose=1&submit=1', '2017-05-19 01:17:51', 3),
(2, 3, 'price[from]=&price[to]=&area[from]=&area[to]=&purpose=1&submit=1', '2017-05-19 01:28:06', 3),
(3, 3, 'purpose=0&submit=1', '2017-05-19 02:23:21', 10),
(4, 4, 'query=&category=11&address=&purpose=1&submit=1', '2017-05-19 03:03:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_users`
--

CREATE TABLE `site_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `active` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_users`
--

INSERT INTO `site_users` (`id`, `username`, `password`, `email`, `fullname`, `active`, `phone`) VALUES
(1, 'islam', '827ccb0eea8a706c4c34a16891f84e7b', 'islam@vadecom.net', 'Islam Fawzi', '1', NULL),
(3, 'vadecom', '827ccb0eea8a706c4c34a16891f84e7b', 'test@mail.com', 'vadecom', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_word`
--

CREATE TABLE `site_word` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(4) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `content_en` text NOT NULL,
  `active_en` int(1) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_word`
--

INSERT INTO `site_word` (`id`, `title`, `content`, `active`, `title_en`, `content_en`, `active_en`, `image`) VALUES
(1, 'من نحن ؟', '<div>\r\n  </div>\r\n<div>\r\n لوريم إيبسوم(Lorem Ipsum) هو ببساطة نص شكلي (بمعنى أن الغاية هي الشكل وليس المحتوى) ويُستخدم في صناعات المطابع ودور النشر. كان لوريم إيبسوم ولايزال المعيار للنص الشكلي منذ القرن الخامس عشر عندما قامت مطبعة مجهولة برص مجموعة من الأحرف بشكل عشوائي أخذتها من نص، لتكوّن كتيّب بمثابة دليل أو مرجع شكلي لهذه الأحرف. خمسة قرون من الزمن لم تقضي على هذا النص، بل انه حتى صار مستخدماً وبشكله الأصلي في الطباعة والتنضيد الإلكتروني. انتشر بشكل كبير في ستينيّات هذا القرن مع إصدار رقائق \"ليتراسيت\" (Letraset) البلاستيكية تحوي مقاطع من هذا النص، وعاد لينتشر مرة أخرى مؤخراَ مع ظهور برامج النشر الإلكتروني مثل \"ألدوس بايج مايكر\" (Aldus PageMaker) والتي حوت أيضاً على نسخ من نص لوريم إيبسوم.</div>\r\n<div>\r\n  </div>\r\n', 1, 'what we do ?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n', 1, '68');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `ordering` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `title_en` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `description_en` text NOT NULL,
  `link` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `active`, `ordering`, `title`, `title_en`, `description`, `description_en`, `link`) VALUES
(42, 'upload/slider/eb5f1bf0c9fe474a56206e1d14cf220b.jpg', 1, 0, '', '', '', '', ''),
(43, 'upload/slider/7c8d513dcff6f0a2d4954e0fc8b5da6a.jpg', 1, 0, '', '', '', '', ''),
(44, 'upload/slider/8db8c2aaab7ef50ca68520ca3548c88b.jpg', 1, 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `gplus` text NOT NULL,
  `instagram` text NOT NULL,
  `utube` text NOT NULL,
  `linkedin` text NOT NULL,
  `pinterest` text NOT NULL,
  `tumblr` text NOT NULL,
  `vimeo` text NOT NULL,
  `index_video` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `facebook`, `twitter`, `gplus`, `instagram`, `utube`, `linkedin`, `pinterest`, `tumblr`, `vimeo`, `index_video`) VALUES
(1, 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://plus.google.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', 'https://www.linkedin.com/', 'https://www.pinterest.com/', 'https://www.tumblr.com/', 'https://www.vimeo.com/', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` int(11) DEFAULT '1',
  `lastvisit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(4) NOT NULL DEFAULT '1',
  `logged` tinyint(4) NOT NULL,
  `mac` varchar(255) NOT NULL,
  `privacy` varchar(255) NOT NULL DEFAULT '1,2,3,4,5,6,7,8,10,9,999'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `user_type`, `lastvisit`, `active`, `logged`, `mac`, `privacy`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '', 1, '2017-07-01 08:45:31', 1, 1, '0', '1,2,3,4,5,6,7,8,9,999');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_inbox`
--
ALTER TABLE `contact_inbox`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_page`
--
ALTER TABLE `contact_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finish_types`
--
ALTER TABLE `finish_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_cats`
--
ALTER TABLE `gallery_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_collapse`
--
ALTER TABLE `menu_collapse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_mails`
--
ALTER TABLE `newsletter_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_messages`
--
ALTER TABLE `newsletter_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_cats`
--
ALTER TABLE `offers_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_banner`
--
ALTER TABLE `page_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_cats`
--
ALTER TABLE `page_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_cats`
--
ALTER TABLE `portfolio_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_subcats`
--
ALTER TABLE `portfolio_subcats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ref` (`ref`);

--
-- Indexes for table `projects_cats`
--
ALTER TABLE `projects_cats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects_subcats`
--
ALTER TABLE `projects_subcats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `search_results`
--
ALTER TABLE `search_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_users`
--
ALTER TABLE `site_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_word`
--
ALTER TABLE `site_word`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contact_inbox`
--
ALTER TABLE `contact_inbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `contact_page`
--
ALTER TABLE `contact_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `finish_types`
--
ALTER TABLE `finish_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;
--
-- AUTO_INCREMENT for table `gallery_cats`
--
ALTER TABLE `gallery_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `menu_collapse`
--
ALTER TABLE `menu_collapse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `newsletter_mails`
--
ALTER TABLE `newsletter_mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `newsletter_messages`
--
ALTER TABLE `newsletter_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `offers_cats`
--
ALTER TABLE `offers_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `page_cats`
--
ALTER TABLE `page_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `portfolio_cats`
--
ALTER TABLE `portfolio_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `portfolio_subcats`
--
ALTER TABLE `portfolio_subcats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `projects_cats`
--
ALTER TABLE `projects_cats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `projects_subcats`
--
ALTER TABLE `projects_subcats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `search_results`
--
ALTER TABLE `search_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `site_users`
--
ALTER TABLE `site_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `site_word`
--
ALTER TABLE `site_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
