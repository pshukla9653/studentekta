-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 24, 2022 at 12:12 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentektadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

DROP TABLE IF EXISTS `boards`;
CREATE TABLE IF NOT EXISTS `boards` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'UPSE', '1', '2022-11-21 22:01:55', '2022-11-21 22:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `castes`
--

DROP TABLE IF EXISTS `castes`;
CREATE TABLE IF NOT EXISTS `castes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `castes`
--

INSERT INTO `castes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mushlim', '1', '2022-11-21 22:04:21', '2022-11-21 22:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `subject_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `subject_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'First Chapter', 1, '1', '2022-11-23 00:47:52', '2022-11-23 00:47:52'),
(3, 'A Book', 1, '1', '2022-11-23 13:14:58', '2022-11-23 13:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `state_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'fgreer', 150, 2, '1', '2022-11-23 14:12:49', '2022-11-23 14:21:07'),
(2, 'xyzz', 150, 2, '1', '2022-11-23 14:49:02', '2022-11-23 14:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

DROP TABLE IF EXISTS `colleges`;
CREATE TABLE IF NOT EXISTS `colleges` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `university_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `name`, `country_id`, `state_id`, `city_id`, `university_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asd4', 150, 2, 2, 1, '0', '2022-11-23 17:08:34', '2022-11-23 17:13:25');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_code_3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isd_code` int NOT NULL,
  `address_format` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode_required` tinyint(1) DEFAULT NULL,
  `tel_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone_diff` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'USD',
  `flag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `countries_iso_code_2_index` (`iso_code_2`(250))
) ENGINE=MyISAM AUTO_INCREMENT=249 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `iso_code_2`, `iso_code_3`, `isd_code`, `address_format`, `postcode_required`, `tel_code`, `region`, `timezone`, `timezone_diff`, `currency`, `flag`, `additional`, `status`, `created_at`, `updated_at`) VALUES
(1, 'South Sudan', 'SS', 'SSD', 211, '', 1, '211', 'Africa', 'Africa/South Sudan', 'UTC+03:00', 'ssp', 'https://flagcdn.com/w320/ss.png', NULL, 1, '2022-06-16 02:09:58', '2022-06-16 02:09:58'),
(2, 'Serbia', 'RS', 'SRB', 381, '', 1, '381', 'Europe', 'Europe/Serbia', 'UTC+01:00', 'rsd', 'https://flagcdn.com/w320/rs.png', NULL, 1, '2022-06-16 02:09:59', '2022-06-16 02:09:59'),
(3, 'St Martin (French part)', 'MF', 'MAF', 590, '', 1, '590', 'Americas', 'Americas/Saint Martin', 'UTC-04:00', 'eur', 'https://flagcdn.com/w320/mf.png', NULL, 1, '2022-06-16 02:10:00', '2022-06-16 02:10:00'),
(4, 'Montenegro', 'ME', 'MNE', 382, '', 1, '382', 'Europe', 'Europe/Montenegro', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/me.png', NULL, 1, '2022-06-16 02:10:00', '2022-06-16 02:10:00'),
(5, 'Jersey', 'JE', 'JEY', 44, '', 1, '+44-1534', 'Europe', 'Europe/Jersey', 'UTC+01:00', 'gbp', 'https://flagcdn.com/w320/je.png', NULL, 1, '2022-06-16 02:10:01', '2022-06-16 02:10:01'),
(6, 'Isle of Man', 'IM', 'IMN', 44, '', 1, '+44-1624', 'Europe', 'Europe/Isle of Man', 'UTC+00:00', 'gbp', 'https://flagcdn.com/w320/im.png', NULL, 1, '2022-06-16 02:10:01', '2022-06-16 02:10:01'),
(7, 'Guernsey', 'GG', 'GGY', 44, '', 1, '+44-1481', 'Europe', 'Europe/Guernsey', 'UTC+00:00', 'gbp', 'https://flagcdn.com/w320/gg.png', NULL, 1, '2022-06-16 02:10:01', '2022-06-16 02:10:01'),
(8, 'St Barthelemy', 'BL', 'BLM', 590, '', 1, '590', 'Americas', 'Americas/Saint Barthélemy', 'UTC-04:00', 'eur', 'https://flagcdn.com/w320/bl.png', NULL, 1, '2022-06-16 02:10:01', '2022-06-16 02:10:01'),
(9, 'Aland Islands', 'AX', 'ALA', 358, '', 1, '+358-18', 'Europe', 'Europe/Åland Islands', 'UTC+02:00', 'eur', 'https://flagcdn.com/w320/ax.png', NULL, 1, '2022-06-16 02:10:01', '2022-06-16 02:10:01'),
(10, 'Zimbabwe', 'ZW', 'ZWE', 263, '', 0, '263', 'Africa', 'Africa/Zimbabwe', 'UTC+02:00', 'zwl', 'https://flagcdn.com/w320/zw.png', NULL, 1, '2022-06-16 02:10:01', '2022-06-16 02:10:01'),
(11, 'Zambia', 'ZM', 'ZMB', 260, '', 1, '260', 'Africa', 'Africa/Zambia', 'UTC+02:00', 'zmw', 'https://flagcdn.com/w320/zm.png', NULL, 1, '2022-06-16 02:10:01', '2022-06-16 02:10:01'),
(12, 'Democratic Republic of Congo', 'CD', 'COD', 243, '', 0, '243', 'Africa', 'Africa/DR Congo', 'UTC+01:00', 'cdf', 'https://flagcdn.com/w320/cd.png', NULL, 1, '2022-06-16 02:10:02', '2022-06-16 02:10:02'),
(13, 'Yugoslavia', 'YU', 'YUG', 38, '', 0, '', '', '', '', '', '', NULL, 1, '2022-06-16 02:10:03', '2022-06-16 02:10:03'),
(14, 'Yemen', 'YE', 'YEM', 967, '', 0, '967', 'Asia', 'Asia/Yemen', 'UTC+03:00', 'yer', 'https://flagcdn.com/w320/ye.png', NULL, 1, '2022-06-16 02:10:03', '2022-06-16 02:10:03'),
(15, 'Western Sahara', 'EH', 'ESH', 212, '', 1, '212', 'Africa', 'Africa/Western Sahara', 'UTC+00:00', 'dzd', 'https://flagcdn.com/w320/eh.png', NULL, 1, '2022-06-16 02:10:04', '2022-06-16 02:10:04'),
(16, 'Wallis and Futuna Islands', 'WF', 'WLF', 681, '', 1, '681', 'Oceania', 'Oceania/Wallis and Futuna', 'UTC+12:00', 'xpf', 'https://flagcdn.com/w320/wf.png', NULL, 1, '2022-06-16 02:10:04', '2022-06-16 02:10:04'),
(17, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1, '', 1, '+1-340', 'Americas', 'Americas/United States Virgin Islands', 'UTC-04:00', 'usd', 'https://flagcdn.com/w320/vi.png', NULL, 1, '2022-06-16 02:10:04', '2022-06-16 02:10:04'),
(18, 'Virgin Islands (British)', 'VG', 'VGB', 1, '', 1, '+1-284', 'Americas', 'Americas/British Virgin Islands', 'UTC-04:00', 'usd', 'https://flagcdn.com/w320/vg.png', NULL, 1, '2022-06-16 02:10:04', '2022-06-16 02:10:04'),
(19, 'Viet Nam', 'VN', 'VNM', 84, '', 1, '84', 'Asia', 'Asia/Vietnam', 'UTC+07:00', 'vnd', 'https://flagcdn.com/w320/vn.png', NULL, 1, '2022-06-16 02:10:04', '2022-06-16 02:10:04'),
(20, 'Venezuela', 'VE', 'VEN', 58, '', 1, '58', 'Americas', 'Americas/Venezuela', 'UTC-04:00', 'ves', 'https://flagcdn.com/w320/ve.png', NULL, 1, '2022-06-16 02:10:06', '2022-06-16 02:10:06'),
(21, 'Vatican City State (Holy See)', 'VA', 'VAT', 379, '', 1, '379', 'Europe', 'Europe/Vatican City', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/va.png', NULL, 1, '2022-06-16 02:10:07', '2022-06-16 02:10:07'),
(22, 'Vanuatu', 'VU', 'VUT', 678, '', 0, '678', 'Oceania', 'Oceania/Vanuatu', 'UTC+11:00', 'vuv', 'https://flagcdn.com/w320/vu.png', NULL, 1, '2022-06-16 02:10:07', '2022-06-16 02:10:07'),
(23, 'Uzbekistan', 'UZ', 'UZB', 998, '', 1, '998', 'Asia', 'Asia/Uzbekistan', 'UTC+05:00', 'uzs', 'https://flagcdn.com/w320/uz.png', NULL, 1, '2022-06-16 02:10:07', '2022-06-16 02:10:07'),
(24, 'Uruguay', 'UY', 'URY', 598, '', 1, '598', 'Americas', 'Americas/Uruguay', 'UTC-03:00', 'uyu', 'https://flagcdn.com/w320/uy.png', NULL, 1, '2022-06-16 02:10:08', '2022-06-16 02:10:08'),
(25, 'United States Minor Outlying Islands', 'UM', 'UMI', 699, '', 0, '1', 'Americas', 'Americas/United States Minor Outlying Islands', 'UTC-11:00', 'usd', 'https://flagcdn.com/w320/um.png', NULL, 1, '2022-06-16 02:10:09', '2022-06-16 02:10:09'),
(26, 'United States', 'US', 'USA', 1, '{firstname} {lastname}\n    									   {company}\n    									   {address_1}\n    									   {address_2}\n    									   {city}, {zone} {postcode}\n    									   {country}', 1, '1', 'Americas', 'Americas/United States', 'UTC-12:00', 'usd', 'https://flagcdn.com/w320/us.png', NULL, 1, '2022-06-16 02:10:09', '2022-06-16 02:10:09'),
(27, 'United Kingdom', 'GB', 'GBR', 44, '', 1, '44', 'Europe', 'Europe/United Kingdom', 'UTC-08:00', 'gbp', 'https://flagcdn.com/w320/gb.png', NULL, 1, '2022-06-16 02:10:13', '2022-06-16 02:10:13'),
(28, 'United Arab Emirates', 'AE', 'ARE', 971, '', 0, '971', 'Asia', 'Asia/United Arab Emirates', 'UTC+04:00', 'aed', 'https://flagcdn.com/w320/ae.png', NULL, 1, '2022-06-16 02:10:23', '2022-06-16 02:10:23'),
(29, 'Ukraine', 'UA', 'UKR', 380, '', 1, '380', 'Europe', 'Europe/Ukraine', 'UTC+02:00', 'uah', 'https://flagcdn.com/w320/ua.png', NULL, 1, '2022-06-16 02:10:24', '2022-06-16 02:10:24'),
(30, 'Uganda', 'UG', 'UGA', 256, '', 0, '256', 'Africa', 'Africa/Uganda', 'UTC+03:00', 'ugx', 'https://flagcdn.com/w320/ug.png', NULL, 1, '2022-06-16 02:10:25', '2022-06-16 02:10:25'),
(31, 'Tuvalu', 'TV', 'TUV', 688, '', 0, '688', 'Oceania', 'Oceania/Tuvalu', 'UTC+12:00', 'aud', 'https://flagcdn.com/w320/tv.png', NULL, 1, '2022-06-16 02:10:30', '2022-06-16 02:10:30'),
(32, 'Turks and Caicos Islands', 'TC', 'TCA', 1, '', 1, '+1-649', 'Americas', 'Americas/Turks and Caicos Islands', 'UTC-04:00', 'usd', 'https://flagcdn.com/w320/tc.png', NULL, 1, '2022-06-16 02:10:31', '2022-06-16 02:10:31'),
(33, 'Turkmenistan', 'TM', 'TKM', 993, '', 1, '993', 'Asia', 'Asia/Turkmenistan', 'UTC+05:00', 'tmt', 'https://flagcdn.com/w320/tm.png', NULL, 1, '2022-06-16 02:10:31', '2022-06-16 02:10:31'),
(34, 'Turkey', 'TR', 'TUR', 90, '', 1, '90', 'Asia', 'Asia/Turkey', 'UTC+03:00', 'try', 'https://flagcdn.com/w320/tr.png', NULL, 1, '2022-06-16 02:10:31', '2022-06-16 02:10:31'),
(35, 'Tunisia', 'TN', 'TUN', 216, '', 1, '216', 'Africa', 'Africa/Tunisia', 'UTC+01:00', 'tnd', 'https://flagcdn.com/w320/tn.png', NULL, 1, '2022-06-16 02:10:35', '2022-06-16 02:10:35'),
(36, 'Trinidad and Tobago', 'TT', 'TTO', 1, '', 1, '+1-868', 'Americas', 'Americas/Trinidad and Tobago', 'UTC-04:00', 'ttd', 'https://flagcdn.com/w320/tt.png', NULL, 1, '2022-06-16 02:10:36', '2022-06-16 02:10:36'),
(37, 'Tonga', 'TO', 'TON', 676, '', 0, '676', 'Oceania', 'Oceania/Tonga', 'UTC+13:00', 'top', 'https://flagcdn.com/w320/to.png', NULL, 1, '2022-06-16 02:10:36', '2022-06-16 02:10:36'),
(38, 'Tokelau', 'TK', 'TKL', 690, '', 0, '690', 'Oceania', 'Oceania/Tokelau', 'UTC+13:00', 'nzd', 'https://flagcdn.com/w320/tk.png', NULL, 1, '2022-06-16 02:10:36', '2022-06-16 02:10:36'),
(39, 'Togo', 'TG', 'TGO', 228, '', 1, '228', 'Africa', 'Africa/Togo', 'UTC', 'xof', 'https://flagcdn.com/w320/tg.png', NULL, 1, '2022-06-16 02:10:36', '2022-06-16 02:10:36'),
(40, 'Thailand', 'TH', 'THA', 66, '', 1, '66', 'Asia', 'Asia/Thailand', 'UTC+07:00', 'thb', 'https://flagcdn.com/w320/th.png', NULL, 1, '2022-06-16 02:10:36', '2022-06-16 02:10:36'),
(41, 'Tanzania, United Republic of', 'TZ', 'TZA', 255, '', 1, '255', 'Africa', 'Africa/Tanzania', 'UTC+03:00', 'tzs', 'https://flagcdn.com/w320/tz.png', NULL, 1, '2022-06-16 02:10:39', '2022-06-16 02:10:39'),
(42, 'Tajikistan', 'TJ', 'TJK', 992, '', 1, '992', 'Asia', 'Asia/Tajikistan', 'UTC+05:00', 'tjs', 'https://flagcdn.com/w320/tj.png', NULL, 1, '2022-06-16 02:10:40', '2022-06-16 02:10:40'),
(43, 'Taiwan', 'TW', 'TWN', 886, '', 1, '886', 'Asia', 'Asia/Taiwan', 'UTC+08:00', 'twd', 'https://flagcdn.com/w320/tw.png', NULL, 1, '2022-06-16 02:10:41', '2022-06-16 02:10:41'),
(44, 'Syrian Arab Republic', 'SY', 'SYR', 963, '', 0, '963', 'Asia', 'Asia/Syria', 'UTC+02:00', 'syp', 'https://flagcdn.com/w320/sy.png', NULL, 1, '2022-06-16 02:10:41', '2022-06-16 02:10:41'),
(45, 'Switzerland', 'CH', 'CHE', 41, '', 1, '41', 'Europe', 'Europe/Switzerland', 'UTC+01:00', 'chf', 'https://flagcdn.com/w320/ch.png', NULL, 1, '2022-06-16 02:10:42', '2022-06-16 02:10:42'),
(46, 'Sweden', 'SE', 'SWE', 46, '', 1, '46', 'Europe', 'Europe/Sweden', 'UTC+01:00', 'sek', 'https://flagcdn.com/w320/se.png', NULL, 1, '2022-06-16 02:10:43', '2022-06-16 02:10:43'),
(47, 'Swaziland', 'SZ', 'SWZ', 268, '', 1, '268', 'Africa', 'Africa/Eswatini', 'UTC+02:00', 'szl', 'https://flagcdn.com/w320/sz.png', NULL, 1, '2022-06-16 02:10:44', '2022-06-16 02:10:44'),
(48, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 47, '', 1, '47', 'Europe', 'Europe/Svalbard and Jan Mayen', 'UTC+01:00', 'nok', 'https://flagcdn.com/w320/sj.png', NULL, 1, '2022-06-16 02:10:44', '2022-06-16 02:10:44'),
(49, 'Suriname', 'SR', 'SUR', 597, '', 0, '597', 'Americas', 'Americas/Suriname', 'UTC-03:00', 'srd', 'https://flagcdn.com/w320/sr.png', NULL, 1, '2022-06-16 02:10:44', '2022-06-16 02:10:44'),
(50, 'Sudan', 'SD', 'SDN', 249, '', 1, '249', 'Africa', 'Africa/Sudan', 'UTC+03:00', 'sdg', 'https://flagcdn.com/w320/sd.png', NULL, 1, '2022-06-16 02:10:45', '2022-06-16 02:10:45'),
(51, 'St. Pierre and Miquelon', 'PM', 'SPM', 508, '', 1, '508', 'Americas', 'Americas/Saint Pierre and Miquelon', 'UTC-03:00', 'eur', 'https://flagcdn.com/w320/pm.png', NULL, 1, '2022-06-16 02:10:45', '2022-06-16 02:10:45'),
(52, 'St. Helena', 'SH', 'SHN', 290, '', 1, '290', 'Africa', 'Africa/Saint Helena, Ascension and Tristan da Cunha', 'UTC+00:00', 'gbp', 'https://flagcdn.com/w320/sh.png', NULL, 1, '2022-06-16 02:10:46', '2022-06-16 02:10:46'),
(53, 'Sri Lanka', 'LK', 'LKA', 94, '', 1, '94', 'Asia', 'Asia/Sri Lanka', 'UTC+05:30', 'lkr', 'https://flagcdn.com/w320/lk.png', NULL, 1, '2022-06-16 02:10:46', '2022-06-16 02:10:46'),
(54, 'Spain', 'ES', 'ESP', 34, '', 1, '34', 'Europe', 'Europe/Spain', 'UTC', 'eur', 'https://flagcdn.com/w320/es.png', NULL, 1, '2022-06-16 02:10:47', '2022-06-16 02:10:47'),
(55, 'South Georgia &amp; South Sandwich Islands', 'GS', 'SGS', 500, '', 1, '', 'Antarctic', 'Antarctic/South Georgia', 'UTC-02:00', 'shp', 'https://flagcdn.com/w320/gs.png', NULL, 1, '2022-06-16 02:10:48', '2022-06-16 02:10:48'),
(56, 'South Africa', 'ZA', 'ZAF', 27, '', 1, '27', 'Africa', 'Africa/South Africa', 'UTC+02:00', 'zar', 'https://flagcdn.com/w320/za.png', NULL, 1, '2022-06-16 02:10:48', '2022-06-16 02:10:48'),
(57, 'Somalia', 'SO', 'SOM', 252, '', 1, '252', 'Africa', 'Africa/Somalia', 'UTC+03:00', 'sos', 'https://flagcdn.com/w320/so.png', NULL, 1, '2022-06-16 02:10:49', '2022-06-16 02:10:49'),
(58, 'Solomon Islands', 'SB', 'SLB', 677, '', 0, '677', 'Oceania', 'Oceania/Solomon Islands', 'UTC+11:00', 'sbd', 'https://flagcdn.com/w320/sb.png', NULL, 1, '2022-06-16 02:10:50', '2022-06-16 02:10:50'),
(59, 'Slovenia', 'SI', 'SVN', 386, '', 1, '386', 'Europe', 'Europe/Slovenia', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/si.png', NULL, 1, '2022-06-16 02:10:50', '2022-06-16 02:10:50'),
(60, 'Slovak Republic', 'SK', 'SVK', 421, '{firstname} {lastname}\n    									 {company}\n    									 {address_1}\n    									 {address_2}\n    									 {city} {postcode}\n    									 {zone}\n    									 {country}', 1, '421', 'Europe', 'Europe/Slovakia', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/sk.png', NULL, 1, '2022-06-16 02:10:58', '2022-06-16 02:10:58'),
(61, 'Singapore', 'SG', 'SGP', 65, '', 1, '65', 'Asia', 'Asia/Singapore', 'UTC+08:00', 'sgd', 'https://flagcdn.com/w320/sg.png', NULL, 1, '2022-06-16 02:10:58', '2022-06-16 02:10:58'),
(62, 'Sierra Leone', 'SL', 'SLE', 232, '', 0, '232', 'Africa', 'Africa/Sierra Leone', 'UTC', 'sll', 'https://flagcdn.com/w320/sl.png', NULL, 1, '2022-06-16 02:10:58', '2022-06-16 02:10:58'),
(63, 'Seychelles', 'SC', 'SYC', 248, '', 0, '248', 'Africa', 'Africa/Seychelles', 'UTC+04:00', 'scr', 'https://flagcdn.com/w320/sc.png', NULL, 1, '2022-06-16 02:10:58', '2022-06-16 02:10:58'),
(64, 'Senegal', 'SN', 'SEN', 221, '', 1, '221', 'Africa', 'Africa/Senegal', 'UTC', 'xof', 'https://flagcdn.com/w320/sn.png', NULL, 1, '2022-06-16 02:11:00', '2022-06-16 02:11:00'),
(65, 'Saudi Arabia', 'SA', 'SAU', 966, '', 1, '966', 'Asia', 'Asia/Saudi Arabia', 'UTC+03:00', 'sar', 'https://flagcdn.com/w320/sa.png', NULL, 1, '2022-06-16 02:11:01', '2022-06-16 02:11:01'),
(66, 'Sao Tome and Principe', 'ST', 'STP', 239, '', 0, '239', 'Africa', 'Africa/São Tomé and Príncipe', 'UTC', 'stn', 'https://flagcdn.com/w320/st.png', NULL, 1, '2022-06-16 02:11:01', '2022-06-16 02:11:01'),
(67, 'San Marino', 'SM', 'SMR', 378, '', 1, '378', 'Europe', 'Europe/San Marino', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/sm.png', NULL, 1, '2022-06-16 02:11:01', '2022-06-16 02:11:01'),
(68, 'Samoa', 'WS', 'WSM', 685, '', 1, '685', 'Oceania', 'Oceania/Samoa', 'UTC+13:00', 'wst', 'https://flagcdn.com/w320/ws.png', NULL, 1, '2022-06-16 02:11:02', '2022-06-16 02:11:02'),
(69, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1, '', 1, '+1-784', 'Americas', 'Americas/Saint Vincent and the Grenadines', 'UTC-04:00', 'xcd', 'https://flagcdn.com/w320/vc.png', NULL, 1, '2022-06-16 02:11:02', '2022-06-16 02:11:02'),
(70, 'Saint Lucia', 'LC', 'LCA', 1, '', 1, '+1-758', 'Americas', 'Americas/Saint Lucia', 'UTC-04:00', 'xcd', 'https://flagcdn.com/w320/lc.png', NULL, 1, '2022-06-16 02:11:02', '2022-06-16 02:11:02'),
(71, 'Saint Kitts and Nevis', 'KN', 'KNA', 1, '', 1, '+1-869', 'Americas', 'Americas/Saint Kitts and Nevis', 'UTC-04:00', 'xcd', 'https://flagcdn.com/w320/kn.png', NULL, 1, '2022-06-16 02:11:03', '2022-06-16 02:11:03'),
(72, 'Rwanda', 'RW', 'RWA', 250, '', 0, '250', 'Africa', 'Africa/Rwanda', 'UTC+02:00', 'rwf', 'https://flagcdn.com/w320/rw.png', NULL, 1, '2022-06-16 02:11:04', '2022-06-16 02:11:04'),
(73, 'Russian Federation', 'RU', 'RUS', 7, '', 1, '7', 'Europe', 'Europe/Russia', 'UTC+03:00', 'rub', 'https://flagcdn.com/w320/ru.png', NULL, 1, '2022-06-16 02:11:04', '2022-06-16 02:11:04'),
(74, 'Romania', 'RO', 'ROM', 40, '', 1, '40', 'Europe', 'Europe/Romania', 'UTC+02:00', 'ron', 'https://flagcdn.com/w320/ro.png', NULL, 1, '2022-06-16 02:11:07', '2022-06-16 02:11:07'),
(75, 'Reunion', 'RE', 'REU', 262, '', 1, '262', 'Africa', 'Africa/Réunion', 'UTC+04:00', 'eur', 'https://flagcdn.com/w320/re.png', NULL, 1, '2022-06-16 02:11:09', '2022-06-16 02:11:09'),
(76, 'Qatar', 'QA', 'QAT', 974, '', 0, '974', 'Asia', 'Asia/Qatar', 'UTC+03:00', 'qar', 'https://flagcdn.com/w320/qa.png', NULL, 1, '2022-06-16 02:11:09', '2022-06-16 02:11:09'),
(77, 'Puerto Rico', 'PR', 'PRI', 1, '', 1, '+1-787 and 1-939', 'Americas', 'Americas/Puerto Rico', 'UTC-04:00', 'usd', 'https://flagcdn.com/w320/pr.png', NULL, 1, '2022-06-16 02:11:09', '2022-06-16 02:11:09'),
(78, 'Portugal', 'PT', 'PRT', 351, '', 1, '351', 'Europe', 'Europe/Portugal', 'UTC-01:00', 'eur', 'https://flagcdn.com/w320/pt.png', NULL, 1, '2022-06-16 02:11:09', '2022-06-16 02:11:09'),
(79, 'Poland', 'PL', 'POL', 48, '', 1, '48', 'Europe', 'Europe/Poland', 'UTC+01:00', 'pln', 'https://flagcdn.com/w320/pl.png', NULL, 1, '2022-06-16 02:11:11', '2022-06-16 02:11:11'),
(80, 'Pitcairn', 'PN', 'PCN', 872, '', 1, '870', 'Oceania', 'Oceania/Pitcairn Islands', 'UTC-08:00', 'nzd', 'https://flagcdn.com/w320/pn.png', NULL, 1, '2022-06-16 02:11:12', '2022-06-16 02:11:12'),
(81, 'Philippines', 'PH', 'PHL', 63, '', 1, '63', 'Asia', 'Asia/Philippines', 'UTC+08:00', 'php', 'https://flagcdn.com/w320/ph.png', NULL, 1, '2022-06-16 02:11:12', '2022-06-16 02:11:12'),
(82, 'Peru', 'PE', 'PER', 51, '', 1, '51', 'Americas', 'Americas/Peru', 'UTC-05:00', 'pen', 'https://flagcdn.com/w320/pe.png', NULL, 1, '2022-06-16 02:11:16', '2022-06-16 02:11:16'),
(83, 'Paraguay', 'PY', 'PRY', 595, '', 1, '595', 'Americas', 'Americas/Paraguay', 'UTC-04:00', 'pyg', 'https://flagcdn.com/w320/py.png', NULL, 1, '2022-06-16 02:11:17', '2022-06-16 02:11:17'),
(84, 'Papua New Guinea', 'PG', 'PNG', 675, '', 1, '675', 'Oceania', 'Oceania/Papua New Guinea', 'UTC+10:00', 'pgk', 'https://flagcdn.com/w320/pg.png', NULL, 1, '2022-06-16 02:11:18', '2022-06-16 02:11:18'),
(85, 'Panama', 'PA', 'PAN', 507, '', 1, '507', 'Americas', 'Americas/Panama', 'UTC-05:00', 'pab', 'https://flagcdn.com/w320/pa.png', NULL, 1, '2022-06-16 02:11:19', '2022-06-16 02:11:19'),
(86, 'Palau', 'PW', 'PLW', 680, '', 1, '680', 'Oceania', 'Oceania/Palau', 'UTC+09:00', 'usd', 'https://flagcdn.com/w320/pw.png', NULL, 1, '2022-06-16 02:11:20', '2022-06-16 02:11:20'),
(87, 'Pakistan', 'PK', 'PAK', 92, '', 1, '92', 'Asia', 'Asia/Pakistan', 'UTC+05:00', 'pkr', 'https://flagcdn.com/w320/pk.png', NULL, 1, '2022-06-16 02:11:21', '2022-06-16 02:11:21'),
(88, 'Oman', 'OM', 'OMN', 968, '', 1, '968', 'Asia', 'Asia/Oman', 'UTC+04:00', 'omr', 'https://flagcdn.com/w320/om.png', NULL, 1, '2022-06-16 02:11:21', '2022-06-16 02:11:21'),
(89, 'Norway', 'NO', 'NOR', 47, '', 1, '47', 'Europe', 'Europe/Norway', 'UTC+01:00', 'nok', 'https://flagcdn.com/w320/no.png', NULL, 1, '2022-06-16 02:11:22', '2022-06-16 02:11:22'),
(90, 'Northern Mariana Islands', 'MP', 'MNP', 1, '', 1, '+1-670', 'Oceania', 'Oceania/Northern Mariana Islands', 'UTC+10:00', 'usd', 'https://flagcdn.com/w320/mp.png', NULL, 1, '2022-06-16 02:11:23', '2022-06-16 02:11:23'),
(91, 'Norfolk Island', 'NF', 'NFK', 672, '', 1, '672', 'Oceania', 'Oceania/Norfolk Island', 'UTC+11:30', 'aud', 'https://flagcdn.com/w320/nf.png', NULL, 1, '2022-06-16 02:11:23', '2022-06-16 02:11:23'),
(92, 'Niue', 'NU', 'NIU', 683, '', 1, '683', 'Oceania', 'Oceania/Niue', 'UTC-11:00', 'nzd', 'https://flagcdn.com/w320/nu.png', NULL, 1, '2022-06-16 02:11:23', '2022-06-16 02:11:23'),
(93, 'Nigeria', 'NG', 'NGA', 234, '', 1, '234', 'Africa', 'Africa/Nigeria', 'UTC+01:00', 'ngn', 'https://flagcdn.com/w320/ng.png', NULL, 1, '2022-06-16 02:11:23', '2022-06-16 02:11:23'),
(94, 'Niger', 'NE', 'NER', 227, '', 1, '227', 'Africa', 'Africa/Niger', 'UTC+01:00', 'xof', 'https://flagcdn.com/w320/ne.png', NULL, 1, '2022-06-16 02:11:25', '2022-06-16 02:11:25'),
(95, 'Nicaragua', 'NI', 'NIC', 505, '', 1, '505', 'Americas', 'Americas/Nicaragua', 'UTC-06:00', 'nio', 'https://flagcdn.com/w320/ni.png', NULL, 1, '2022-06-16 02:11:26', '2022-06-16 02:11:26'),
(96, 'New Zealand', 'NZ', 'NZL', 64, '', 1, '64', 'Oceania', 'Oceania/New Zealand', 'UTC-11:00', 'nzd', 'https://flagcdn.com/w320/nz.png', NULL, 1, '2022-06-16 02:11:26', '2022-06-16 02:11:26'),
(97, 'New Caledonia', 'NC', 'NCL', 687, '', 1, '687', 'Oceania', 'Oceania/New Caledonia', 'UTC+11:00', 'xpf', 'https://flagcdn.com/w320/nc.png', NULL, 1, '2022-06-16 02:11:27', '2022-06-16 02:11:27'),
(98, 'Netherlands Antilles', 'AN', 'ANT', 599, '', 0, '', '', '', '', '', '', NULL, 1, '2022-06-16 02:11:27', '2022-06-16 02:11:27'),
(99, 'Netherlands', 'NL', 'NLD', 31, '', 1, '31', 'Europe', 'Europe/Netherlands', 'UTC-04:00', 'eur', 'https://flagcdn.com/w320/nl.png', NULL, 1, '2022-06-16 02:11:27', '2022-06-16 02:11:27'),
(100, 'Nepal', 'NP', 'NPL', 977, '', 1, '977', 'Asia', 'Asia/Nepal', 'UTC+05:45', 'npr', 'https://flagcdn.com/w320/np.png', NULL, 1, '2022-06-16 02:11:29', '2022-06-16 02:11:29'),
(101, 'Nauru', 'NR', 'NRU', 674, '', 1, '674', 'Oceania', 'Oceania/Nauru', 'UTC+12:00', 'aud', 'https://flagcdn.com/w320/nr.png', NULL, 1, '2022-06-16 02:11:29', '2022-06-16 02:11:29'),
(102, 'Namibia', 'NA', 'NAM', 264, '', 1, '264', 'Africa', 'Africa/Namibia', 'UTC+01:00', 'nad', 'https://flagcdn.com/w320/na.png', NULL, 1, '2022-06-16 02:11:30', '2022-06-16 02:11:30'),
(103, 'Myanmar', 'MM', 'MMR', 95, '', 1, '95', 'Asia', 'Asia/Myanmar', 'UTC+06:30', 'mmk', 'https://flagcdn.com/w320/mm.png', NULL, 1, '2022-06-16 02:11:31', '2022-06-16 02:11:31'),
(104, 'Mozambique', 'MZ', 'MOZ', 258, '', 1, '258', 'Africa', 'Africa/Mozambique', 'UTC+02:00', 'mzn', 'https://flagcdn.com/w320/mz.png', NULL, 1, '2022-06-16 02:11:32', '2022-06-16 02:11:32'),
(105, 'Morocco', 'MA', 'MAR', 212, '', 1, '212', 'Africa', 'Africa/Morocco', 'UTC', 'mad', 'https://flagcdn.com/w320/ma.png', NULL, 1, '2022-06-16 02:11:32', '2022-06-16 02:11:32'),
(106, 'Montserrat', 'MS', 'MSR', 1, '', 1, '+1-664', 'Americas', 'Americas/Montserrat', 'UTC-04:00', 'xcd', 'https://flagcdn.com/w320/ms.png', NULL, 1, '2022-06-16 02:11:37', '2022-06-16 02:11:37'),
(107, 'Mongolia', 'MN', 'MNG', 976, '', 1, '976', 'Asia', 'Asia/Mongolia', 'UTC+07:00', 'mnt', 'https://flagcdn.com/w320/mn.png', NULL, 1, '2022-06-16 02:11:37', '2022-06-16 02:11:37'),
(108, 'Monaco', 'MC', 'MCO', 377, '', 1, '377', 'Europe', 'Europe/Monaco', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/mc.png', NULL, 1, '2022-06-16 02:11:37', '2022-06-16 02:11:37'),
(109, 'Moldova, Republic of', 'MD', 'MDA', 373, '', 1, '373', 'Europe', 'Europe/Moldova', 'UTC+02:00', 'mdl', 'https://flagcdn.com/w320/md.png', NULL, 1, '2022-06-16 02:11:38', '2022-06-16 02:11:38'),
(110, 'Micronesia, Federated States of', 'FM', 'FSM', 691, '', 1, '691', 'Oceania', 'Oceania/Micronesia', 'UTC+10:00', 'usd', 'https://flagcdn.com/w320/fm.png', NULL, 1, '2022-06-16 02:11:40', '2022-06-16 02:11:40'),
(111, 'Mexico', 'MX', 'MEX', 52, '', 1, '52', 'Americas', 'Americas/Mexico', 'UTC-08:00', 'mxn', 'https://flagcdn.com/w320/mx.png', NULL, 1, '2022-06-16 02:11:40', '2022-06-16 02:11:40'),
(112, 'Mayotte', 'YT', 'MYT', 269, '', 1, '262', 'Africa', 'Africa/Mayotte', 'UTC+03:00', 'eur', 'https://flagcdn.com/w320/yt.png', NULL, 1, '2022-06-16 02:11:42', '2022-06-16 02:11:42'),
(113, 'Mauritius', 'MU', 'MUS', 230, '', 1, '230', 'Africa', 'Africa/Mauritius', 'UTC+04:00', 'mur', 'https://flagcdn.com/w320/mu.png', NULL, 1, '2022-06-16 02:11:42', '2022-06-16 02:11:42'),
(114, 'Mauritania', 'MR', 'MRT', 222, '', 0, '222', 'Africa', 'Africa/Mauritania', 'UTC', 'mru', 'https://flagcdn.com/w320/mr.png', NULL, 1, '2022-06-16 02:11:43', '2022-06-16 02:11:43'),
(115, 'Martinique', 'MQ', 'MTQ', 596, '', 1, '596', 'Americas', 'Americas/Martinique', 'UTC-04:00', 'eur', 'https://flagcdn.com/w320/mq.png', NULL, 1, '2022-06-16 02:11:43', '2022-06-16 02:11:43'),
(116, 'Marshall Islands', 'MH', 'MHL', 692, '', 1, '692', 'Oceania', 'Oceania/Marshall Islands', 'UTC+12:00', 'usd', 'https://flagcdn.com/w320/mh.png', NULL, 1, '2022-06-16 02:11:43', '2022-06-16 02:11:43'),
(117, 'Malta', 'MT', 'MLT', 356, '', 1, '356', 'Europe', 'Europe/Malta', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/mt.png', NULL, 1, '2022-06-16 02:11:43', '2022-06-16 02:11:43'),
(118, 'Mali', 'ML', 'MLI', 223, '', 0, '223', 'Africa', 'Africa/Mali', 'UTC', 'xof', 'https://flagcdn.com/w320/ml.png', NULL, 1, '2022-06-16 02:11:47', '2022-06-16 02:11:47'),
(119, 'Maldives', 'MV', 'MDV', 960, '', 1, '960', 'Asia', 'Asia/Maldives', 'UTC+05:00', 'mvr', 'https://flagcdn.com/w320/mv.png', NULL, 1, '2022-06-16 02:11:47', '2022-06-16 02:11:47'),
(120, 'Malaysia', 'MY', 'MYS', 60, '', 1, '60', 'Asia', 'Asia/Malaysia', 'UTC+08:00', 'myr', 'https://flagcdn.com/w320/my.png', NULL, 1, '2022-06-16 02:11:48', '2022-06-16 02:11:48'),
(121, 'Malawi', 'MW', 'MWI', 265, '', 1, '265', 'Africa', 'Africa/Malawi', 'UTC+02:00', 'mwk', 'https://flagcdn.com/w320/mw.png', NULL, 1, '2022-06-16 02:11:49', '2022-06-16 02:11:49'),
(122, 'Madagascar', 'MG', 'MDG', 261, '', 1, '261', 'Africa', 'Africa/Madagascar', 'UTC+03:00', 'mga', 'https://flagcdn.com/w320/mg.png', NULL, 1, '2022-06-16 02:11:50', '2022-06-16 02:11:50'),
(123, 'Macedonia', 'MK', 'MKD', 389, '', 1, '389', 'Europe', 'Europe/North Macedonia', 'UTC+01:00', 'mkd', 'https://flagcdn.com/w320/mk.png', NULL, 1, '2022-06-16 02:11:51', '2022-06-16 02:11:51'),
(124, 'Macau', 'MO', 'MAC', 853, '', 0, '853', 'Asia', 'Asia/Macau', 'UTC+08:00', 'mop', 'https://flagcdn.com/w320/mo.png', NULL, 1, '2022-06-16 02:11:54', '2022-06-16 02:11:54'),
(125, 'Luxembourg', 'LU', 'LUX', 352, '', 1, '352', 'Europe', 'Europe/Luxembourg', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/lu.png', NULL, 1, '2022-06-16 02:11:55', '2022-06-16 02:11:55'),
(126, 'Lithuania', 'LT', 'LTU', 370, '', 1, '370', 'Europe', 'Europe/Lithuania', 'UTC+02:00', 'eur', 'https://flagcdn.com/w320/lt.png', NULL, 1, '2022-06-16 02:11:55', '2022-06-16 02:11:55'),
(127, 'Liechtenstein', 'LI', 'LIE', 423, '', 1, '423', 'Europe', 'Europe/Liechtenstein', 'UTC+01:00', 'chf', 'https://flagcdn.com/w320/li.png', NULL, 1, '2022-06-16 02:11:57', '2022-06-16 02:11:57'),
(128, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 218, '', 1, '218', 'Africa', 'Africa/Libya', 'UTC+01:00', 'lyd', 'https://flagcdn.com/w320/ly.png', NULL, 1, '2022-06-16 02:11:58', '2022-06-16 02:11:58'),
(129, 'Liberia', 'LR', 'LBR', 231, '', 1, '231', 'Africa', 'Africa/Liberia', 'UTC', 'lrd', 'https://flagcdn.com/w320/lr.png', NULL, 1, '2022-06-16 02:11:59', '2022-06-16 02:11:59'),
(130, 'Lesotho', 'LS', 'LSO', 266, '', 1, '266', 'Africa', 'Africa/Lesotho', 'UTC+02:00', 'lsl', 'https://flagcdn.com/w320/ls.png', NULL, 1, '2022-06-16 02:12:00', '2022-06-16 02:12:00'),
(131, 'Lebanon', 'LB', 'LBN', 961, '', 1, '961', 'Asia', 'Asia/Lebanon', 'UTC+02:00', 'lbp', 'https://flagcdn.com/w320/lb.png', NULL, 1, '2022-06-16 02:12:00', '2022-06-16 02:12:00'),
(132, 'Latvia', 'LV', 'LVA', 371, '', 1, '371', 'Europe', 'Europe/Latvia', 'UTC+02:00', 'eur', 'https://flagcdn.com/w320/lv.png', NULL, 1, '2022-06-16 02:12:00', '2022-06-16 02:12:00'),
(133, 'Lao People\'s Democratic Republic', 'LA', 'LAO', 856, '', 1, '856', 'Asia', 'Asia/Laos', 'UTC+07:00', 'lak', 'https://flagcdn.com/w320/la.png', NULL, 1, '2022-06-16 02:12:06', '2022-06-16 02:12:06'),
(134, 'Kyrgyzstan', 'KG', 'KGZ', 996, '', 1, '996', 'Asia', 'Asia/Kyrgyzstan', 'UTC+06:00', 'kgs', 'https://flagcdn.com/w320/kg.png', NULL, 1, '2022-06-16 02:12:07', '2022-06-16 02:12:07'),
(135, 'Kuwait', 'KW', 'KWT', 965, '', 1, '965', 'Asia', 'Asia/Kuwait', 'UTC+03:00', 'kwd', 'https://flagcdn.com/w320/kw.png', NULL, 1, '2022-06-16 02:12:07', '2022-06-16 02:12:07'),
(136, 'Korea, Republic of', 'KR', 'KOR', 82, '', 1, '82', 'Asia', 'Asia/South Korea', 'UTC+09:00', 'krw', 'https://flagcdn.com/w320/kr.png', NULL, 1, '2022-06-16 02:12:07', '2022-06-16 02:12:07'),
(137, 'North Korea', 'KP', 'PRK', 850, '', 0, '850', 'Asia', 'Asia/North Korea', 'UTC+09:00', 'kpw', 'https://flagcdn.com/w320/kp.png', NULL, 1, '2022-06-16 02:12:08', '2022-06-16 02:12:08'),
(138, 'Kiribati', 'KI', 'KIR', 686, '', 0, '686', 'Oceania', 'Oceania/Kiribati', 'UTC+12:00', 'aud', 'https://flagcdn.com/w320/ki.png', NULL, 1, '2022-06-16 02:12:09', '2022-06-16 02:12:09'),
(139, 'Kenya', 'KE', 'KEN', 254, '', 1, '254', 'Africa', 'Africa/Kenya', 'UTC+03:00', 'kes', 'https://flagcdn.com/w320/ke.png', NULL, 1, '2022-06-16 02:12:09', '2022-06-16 02:12:09'),
(140, 'Kazakhstan', 'KZ', 'KAZ', 7, '', 1, '7', 'Asia', 'Asia/Kazakhstan', 'UTC+05:00', 'kzt', 'https://flagcdn.com/w320/kz.png', NULL, 1, '2022-06-16 02:12:11', '2022-06-16 02:12:11'),
(141, 'Jordan', 'JO', 'JOR', 962, '', 1, '962', 'Asia', 'Asia/Jordan', 'UTC+03:00', 'jod', 'https://flagcdn.com/w320/jo.png', NULL, 1, '2022-06-16 02:12:12', '2022-06-16 02:12:12'),
(142, 'Japan', 'JP', 'JPN', 81, '', 1, '81', 'Asia', 'Asia/Japan', 'UTC+09:00', 'jpy', 'https://flagcdn.com/w320/jp.png', NULL, 1, '2022-06-16 02:12:12', '2022-06-16 02:12:12'),
(143, 'Jamaica', 'JM', 'JAM', 1, '', 1, '+1-876', 'Americas', 'Americas/Jamaica', 'UTC-05:00', 'jmd', 'https://flagcdn.com/w320/jm.png', NULL, 1, '2022-06-16 02:12:14', '2022-06-16 02:12:14'),
(144, 'Italy', 'IT', 'ITA', 39, '', 1, '39', 'Europe', 'Europe/Italy', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/it.png', NULL, 1, '2022-06-16 02:12:15', '2022-06-16 02:12:15'),
(145, 'Israel', 'IL', 'ISR', 972, '', 1, '972', 'Asia', 'Asia/Israel', 'UTC+02:00', 'ils', 'https://flagcdn.com/w320/il.png', NULL, 1, '2022-06-16 02:12:21', '2022-06-16 02:12:21'),
(146, 'Ireland', 'IE', 'IRL', 353, '', 1, '353', 'Europe', 'Europe/Ireland', 'UTC', 'eur', 'https://flagcdn.com/w320/ie.png', NULL, 1, '2022-06-16 02:12:21', '2022-06-16 02:12:21'),
(147, 'Iraq', 'IQ', 'IRQ', 964, '', 1, '964', 'Asia', 'Asia/Iraq', 'UTC+03:00', 'iqd', 'https://flagcdn.com/w320/iq.png', NULL, 1, '2022-06-16 02:12:22', '2022-06-16 02:12:22'),
(148, 'Iran (Islamic Republic of)', 'IR', 'IRN', 98, '', 1, '98', 'Asia', 'Asia/Iran', 'UTC+03:30', 'irr', 'https://flagcdn.com/w320/ir.png', NULL, 1, '2022-06-16 02:12:24', '2022-06-16 02:12:24'),
(149, 'Indonesia', 'ID', 'IDN', 62, '', 1, '62', 'Asia', 'Asia/Indonesia', 'UTC+07:00', 'idr', 'https://flagcdn.com/w320/id.png', NULL, 1, '2022-06-16 02:12:25', '2022-06-16 02:12:25'),
(150, 'India', 'IN', 'IND', 91, '', 1, '91', 'Asia', 'Asia/India', 'UTC+05:30', 'inr', 'https://flagcdn.com/w320/in.png', NULL, 1, '2022-06-16 02:12:27', '2022-06-16 02:12:27'),
(151, 'Iceland', 'IS', 'ISL', 354, '', 1, '354', 'Europe', 'Europe/Iceland', 'UTC', 'isk', 'https://flagcdn.com/w320/is.png', NULL, 1, '2022-06-16 02:12:29', '2022-06-16 02:12:29'),
(152, 'Hungary', 'HU', 'HUN', 36, '', 1, '36', 'Europe', 'Europe/Hungary', 'UTC+01:00', 'huf', 'https://flagcdn.com/w320/hu.png', NULL, 1, '2022-06-16 02:12:30', '2022-06-16 02:12:30'),
(153, 'Hong Kong', 'HK', 'HKG', 852, '', 0, '852', 'Asia', 'Asia/Hong Kong', 'UTC+08:00', 'hkd', 'https://flagcdn.com/w320/hk.png', NULL, 1, '2022-06-16 02:12:31', '2022-06-16 02:12:31'),
(154, 'Honduras', 'HN', 'HND', 504, '', 1, '504', 'Americas', 'Americas/Honduras', 'UTC-06:00', 'hnl', 'https://flagcdn.com/w320/hn.png', NULL, 1, '2022-06-16 02:12:32', '2022-06-16 02:12:32'),
(155, 'Heard and Mc Donald Islands', 'HM', 'HMD', 672, '', 1, ' ', 'Antarctic', 'Antarctic/Heard Island and McDonald Islands', 'UTC+05:00', 'usd', 'https://flagcdn.com/w320/hm.png', NULL, 1, '2022-06-16 02:12:33', '2022-06-16 02:12:33'),
(156, 'Haiti', 'HT', 'HTI', 509, '', 1, '509', 'Americas', 'Americas/Haiti', 'UTC-05:00', 'htg', 'https://flagcdn.com/w320/ht.png', NULL, 1, '2022-06-16 02:12:33', '2022-06-16 02:12:33'),
(157, 'Guyana', 'GY', 'GUY', 592, '', 0, '592', 'Americas', 'Americas/Guyana', 'UTC-04:00', 'gyd', 'https://flagcdn.com/w320/gy.png', NULL, 1, '2022-06-16 02:12:34', '2022-06-16 02:12:34'),
(158, 'Guinea-bissau', 'GW', 'GNB', 245, '', 1, '245', 'Africa', 'Africa/Guinea-Bissau', 'UTC', 'xof', 'https://flagcdn.com/w320/gw.png', NULL, 1, '2022-06-16 02:12:34', '2022-06-16 02:12:34'),
(159, 'Guinea', 'GN', 'GIN', 224, '', 1, '224', 'Africa', 'Africa/Guinea', 'UTC', 'gnf', 'https://flagcdn.com/w320/gn.png', NULL, 1, '2022-06-16 02:12:35', '2022-06-16 02:12:35'),
(160, 'Guatemala', 'GT', 'GTM', 502, '', 1, '502', 'Americas', 'Americas/Guatemala', 'UTC-06:00', 'gtq', 'https://flagcdn.com/w320/gt.png', NULL, 1, '2022-06-16 02:12:36', '2022-06-16 02:12:36'),
(161, 'Guam', 'GU', 'GUM', 1, '', 1, '+1-671', 'Oceania', 'Oceania/Guam', 'UTC+10:00', 'usd', 'https://flagcdn.com/w320/gu.png', NULL, 1, '2022-06-16 02:12:37', '2022-06-16 02:12:37'),
(162, 'Guadeloupe', 'GP', 'GLP', 590, '', 1, '590', 'Americas', 'Americas/Guadeloupe', 'UTC-04:00', 'eur', 'https://flagcdn.com/w320/gp.png', NULL, 1, '2022-06-16 02:12:37', '2022-06-16 02:12:37'),
(163, 'Grenada', 'GD', 'GRD', 1, '', 0, '+1-473', 'Americas', 'Americas/Grenada', 'UTC-04:00', 'xcd', 'https://flagcdn.com/w320/gd.png', NULL, 1, '2022-06-16 02:12:37', '2022-06-16 02:12:37'),
(164, 'Greenland', 'GL', 'GRL', 299, '', 1, '299', 'Americas', 'Americas/Greenland', 'UTC-04:00', 'dkk', 'https://flagcdn.com/w320/gl.png', NULL, 1, '2022-06-16 02:12:37', '2022-06-16 02:12:37'),
(165, 'Greece', 'GR', 'GRC', 30, '', 1, '30', 'Europe', 'Europe/Greece', 'UTC+02:00', 'eur', 'https://flagcdn.com/w320/gr.png', NULL, 1, '2022-06-16 02:12:37', '2022-06-16 02:12:37'),
(166, 'Gibraltar', 'GI', 'GIB', 350, '', 1, '350', 'Europe', 'Europe/Gibraltar', 'UTC+01:00', 'gip', 'https://flagcdn.com/w320/gi.png', NULL, 1, '2022-06-16 02:12:39', '2022-06-16 02:12:39'),
(167, 'Ghana', 'GH', 'GHA', 233, '', 0, '233', 'Africa', 'Africa/Ghana', 'UTC', 'ghs', 'https://flagcdn.com/w320/gh.png', NULL, 1, '2022-06-16 02:12:39', '2022-06-16 02:12:39'),
(168, 'Germany', 'DE', 'DEU', 49, '{company}\n    									 {firstname} {lastname}\n    									 {address_1}\n    									 {address_2}\n    									 {postcode} {city}\n    									 {country}', 1, '49', 'Europe', 'Europe/Germany', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/de.png', NULL, 1, '2022-06-16 02:12:39', '2022-06-16 02:12:39'),
(169, 'Georgia', 'GE', 'GEO', 995, '', 1, '995', 'Asia', 'Asia/Georgia', 'UTC-04:00', 'gel', 'https://flagcdn.com/w320/ge.png', NULL, 1, '2022-06-16 02:12:40', '2022-06-16 02:12:40'),
(170, 'Gambia', 'GM', 'GMB', 220, '', 0, '220', 'Africa', 'Africa/Gambia', 'UTC+00:00', 'gmd', 'https://flagcdn.com/w320/gm.png', NULL, 1, '2022-06-16 02:12:41', '2022-06-16 02:12:41'),
(171, 'Gabon', 'GA', 'GAB', 241, '', 1, '241', 'Africa', 'Africa/Gabon', 'UTC+01:00', 'xaf', 'https://flagcdn.com/w320/ga.png', NULL, 1, '2022-06-16 02:12:41', '2022-06-16 02:12:41'),
(172, 'French Southern Territories', 'TF', 'ATF', 262, '', 0, '', 'Antarctic', 'Antarctic/French Southern and Antarctic Lands', 'UTC+05:00', 'eur', 'https://flagcdn.com/w320/tf.png', NULL, 1, '2022-06-16 02:12:42', '2022-06-16 02:12:42'),
(173, 'French Polynesia', 'PF', 'PYF', 689, '', 1, '689', 'Oceania', 'Oceania/French Polynesia', 'UTC-10:00', 'xpf', 'https://flagcdn.com/w320/pf.png', NULL, 1, '2022-06-16 02:12:42', '2022-06-16 02:12:42'),
(174, 'French Guiana', 'GF', 'GUF', 594, '', 1, '594', 'Americas', 'Americas/French Guiana', 'UTC-03:00', 'eur', 'https://flagcdn.com/w320/gf.png', NULL, 1, '2022-06-16 02:12:42', '2022-06-16 02:12:42'),
(175, 'France, Metropolitan', 'FX', 'FXX', 33, '', 0, '', '', '', '', '', '', NULL, 1, '2022-06-16 02:12:42', '2022-06-16 02:12:42'),
(176, 'France', 'FR', 'FRA', 33, '', 1, '33', 'Europe', 'Europe/France', 'UTC-10:00', 'eur', 'https://flagcdn.com/w320/fr.png', NULL, 1, '2022-06-16 02:12:42', '2022-06-16 02:12:42'),
(177, 'Finland', 'FI', 'FIN', 358, '', 1, '358', 'Europe', 'Europe/Finland', 'UTC+02:00', 'eur', 'https://flagcdn.com/w320/fi.png', NULL, 1, '2022-06-16 02:12:47', '2022-06-16 02:12:47'),
(178, 'Fiji', 'FJ', 'FJI', 679, '', 0, '679', 'Oceania', 'Oceania/Fiji', 'UTC+12:00', 'fjd', 'https://flagcdn.com/w320/fj.png', NULL, 1, '2022-06-16 02:12:49', '2022-06-16 02:12:49'),
(179, 'Faroe Islands', 'FO', 'FRO', 298, '', 1, '298', 'Europe', 'Europe/Faroe Islands', 'UTC+00:00', 'dkk', 'https://flagcdn.com/w320/fo.png', NULL, 1, '2022-06-16 02:12:49', '2022-06-16 02:12:49'),
(180, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 500, '', 1, '500', 'Americas', 'Americas/Falkland Islands', 'UTC-04:00', 'fkp', 'https://flagcdn.com/w320/fk.png', NULL, 1, '2022-06-16 02:12:49', '2022-06-16 02:12:49'),
(181, 'Ethiopia', 'ET', 'ETH', 251, '', 1, '251', 'Africa', 'Africa/Ethiopia', 'UTC+03:00', 'etb', 'https://flagcdn.com/w320/et.png', NULL, 1, '2022-06-16 02:12:49', '2022-06-16 02:12:49'),
(182, 'Estonia', 'EE', 'EST', 372, '', 1, '372', 'Europe', 'Europe/Estonia', 'UTC+02:00', 'eur', 'https://flagcdn.com/w320/ee.png', NULL, 1, '2022-06-16 02:12:50', '2022-06-16 02:12:50'),
(183, 'Eritrea', 'ER', 'ERI', 291, '', 0, '291', 'Africa', 'Africa/Eritrea', 'UTC+03:00', 'ern', 'https://flagcdn.com/w320/er.png', NULL, 1, '2022-06-16 02:12:52', '2022-06-16 02:12:52'),
(184, 'Equatorial Guinea', 'GQ', 'GNQ', 240, '', 0, '240', 'Africa', 'Africa/Equatorial Guinea', 'UTC+01:00', 'xaf', 'https://flagcdn.com/w320/gq.png', NULL, 1, '2022-06-16 02:12:52', '2022-06-16 02:12:52'),
(185, 'El Salvador', 'SV', 'SLV', 503, '', 1, '503', 'Americas', 'Americas/El Salvador', 'UTC-06:00', 'usd', 'https://flagcdn.com/w320/sv.png', NULL, 1, '2022-06-16 02:12:53', '2022-06-16 02:12:53'),
(186, 'Egypt', 'EG', 'EGY', 20, '', 1, '20', 'Africa', 'Africa/Egypt', 'UTC+02:00', 'egp', 'https://flagcdn.com/w320/eg.png', NULL, 1, '2022-06-16 02:12:53', '2022-06-16 02:12:53'),
(187, 'Ecuador', 'EC', 'ECU', 593, '', 1, '593', 'Americas', 'Americas/Ecuador', 'UTC-06:00', 'usd', 'https://flagcdn.com/w320/ec.png', NULL, 1, '2022-06-16 02:12:55', '2022-06-16 02:12:55'),
(188, 'East Timor', 'TP', 'TMP', 670, '', 0, '', '', '', '', '', '', NULL, 1, '2022-06-16 02:12:56', '2022-06-16 02:12:56'),
(189, 'Dominican Republic', 'DO', 'DOM', 1, '', 1, '+1-809 and 1-829', 'Americas', 'Americas/Dominican Republic', 'UTC-04:00', 'dop', 'https://flagcdn.com/w320/do.png', NULL, 1, '2022-06-16 02:12:56', '2022-06-16 02:12:56'),
(190, 'Dominica', 'DM', 'DMA', 1, '', 0, '+1-767', 'Americas', 'Americas/Dominica', 'UTC-04:00', 'xcd', 'https://flagcdn.com/w320/dm.png', NULL, 1, '2022-06-16 02:12:59', '2022-06-16 02:12:59'),
(191, 'Djibouti', 'DJ', 'DJI', 253, '', 0, '253', 'Africa', 'Africa/Djibouti', 'UTC+03:00', 'djf', 'https://flagcdn.com/w320/dj.png', NULL, 1, '2022-06-16 02:12:59', '2022-06-16 02:12:59'),
(192, 'Denmark', 'DK', 'DNK', 45, '', 1, '45', 'Europe', 'Europe/Denmark', 'UTC-04:00', 'dkk', 'https://flagcdn.com/w320/dk.png', NULL, 1, '2022-06-16 02:13:00', '2022-06-16 02:13:00'),
(193, 'Czech Republic', 'CZ', 'CZE', 420, '', 1, '420', 'Europe', 'Europe/Czechia', 'UTC+01:00', 'czk', 'https://flagcdn.com/w320/cz.png', NULL, 1, '2022-06-16 02:13:01', '2022-06-16 02:13:01'),
(194, 'Cyprus', 'CY', 'CYP', 357, '', 1, '357', 'Europe', 'Europe/Cyprus', 'UTC+02:00', 'eur', 'https://flagcdn.com/w320/cy.png', NULL, 1, '2022-06-16 02:13:05', '2022-06-16 02:13:05'),
(195, 'Cuba', 'CU', 'CUB', 53, '', 1, '53', 'Americas', 'Americas/Cuba', 'UTC-05:00', 'cuc', 'https://flagcdn.com/w320/cu.png', NULL, 1, '2022-06-16 02:13:06', '2022-06-16 02:13:06'),
(196, 'Croatia', 'HR', 'HRV', 385, '', 1, '385', 'Europe', 'Europe/Croatia', 'UTC+01:00', 'hrk', 'https://flagcdn.com/w320/hr.png', NULL, 1, '2022-06-16 02:13:06', '2022-06-16 02:13:06'),
(197, 'Cote D\'Ivoire', 'CI', 'CIV', 225, '', 0, '225', 'Africa', 'Africa/Ivory Coast', 'UTC', 'xof', 'https://flagcdn.com/w320/ci.png', NULL, 1, '2022-06-16 02:13:07', '2022-06-16 02:13:07'),
(198, 'Costa Rica', 'CR', 'CRI', 506, '', 1, '506', 'Americas', 'Americas/Costa Rica', 'UTC-06:00', 'crc', 'https://flagcdn.com/w320/cr.png', NULL, 1, '2022-06-16 02:13:08', '2022-06-16 02:13:08'),
(199, 'Cook Islands', 'CK', 'COK', 682, '', 0, '682', 'Oceania', 'Oceania/Cook Islands', 'UTC-10:00', 'ckd', 'https://flagcdn.com/w320/ck.png', NULL, 1, '2022-06-16 02:13:10', '2022-06-16 02:13:10'),
(200, 'Congo', 'CG', 'COG', 242, '', 0, '242', 'Africa', 'Africa/Republic of the Congo', 'UTC+01:00', 'xaf', 'https://flagcdn.com/w320/cg.png', NULL, 1, '2022-06-16 02:13:10', '2022-06-16 02:13:10'),
(201, 'Comoros', 'KM', 'COM', 269, '', 0, '269', 'Africa', 'Africa/Comoros', 'UTC+03:00', 'kmf', 'https://flagcdn.com/w320/km.png', NULL, 1, '2022-06-16 02:13:11', '2022-06-16 02:13:11'),
(202, 'Colombia', 'CO', 'COL', 57, '', 1, '57', 'Americas', 'Americas/Colombia', 'UTC-05:00', 'cop', 'https://flagcdn.com/w320/co.png', NULL, 1, '2022-06-16 02:13:11', '2022-06-16 02:13:11'),
(203, 'Cocos (Keeling) Islands', 'CC', 'CCK', 61, '', 1, '61', 'Oceania', 'Oceania/Cocos (Keeling) Islands', 'UTC+06:30', 'aud', 'https://flagcdn.com/w320/cc.png', NULL, 1, '2022-06-16 02:13:12', '2022-06-16 02:13:12'),
(204, 'Christmas Island', 'CX', 'CXR', 61, '', 1, '61', 'Oceania', 'Oceania/Christmas Island', 'UTC+07:00', 'aud', 'https://flagcdn.com/w320/cx.png', NULL, 1, '2022-06-16 02:13:12', '2022-06-16 02:13:12'),
(205, 'China', 'CN', 'CHN', 86, '', 1, '86', 'Asia', 'Asia/China', 'UTC+08:00', 'cny', 'https://flagcdn.com/w320/cn.png', NULL, 1, '2022-06-16 02:13:12', '2022-06-16 02:13:12'),
(206, 'Chile', 'CL', 'CHL', 56, '', 1, '56', 'Americas', 'Americas/Chile', 'UTC-06:00', 'clp', 'https://flagcdn.com/w320/cl.png', NULL, 1, '2022-06-16 02:13:18', '2022-06-16 02:13:18'),
(207, 'Chad', 'TD', 'TCD', 235, '', 1, '235', 'Africa', 'Africa/Chad', 'UTC+01:00', 'xaf', 'https://flagcdn.com/w320/td.png', NULL, 1, '2022-06-16 02:13:18', '2022-06-16 02:13:18'),
(208, 'Central African Republic', 'CF', 'CAF', 236, '', 0, '236', 'Africa', 'Africa/Central African Republic', 'UTC+01:00', 'xaf', 'https://flagcdn.com/w320/cf.png', NULL, 1, '2022-06-16 02:13:21', '2022-06-16 02:13:21'),
(209, 'Cayman Islands', 'KY', 'CYM', 1, '', 1, '+1-345', 'Americas', 'Americas/Cayman Islands', 'UTC-05:00', 'kyd', 'https://flagcdn.com/w320/ky.png', NULL, 1, '2022-06-16 02:13:22', '2022-06-16 02:13:22'),
(210, 'Cape Verde', 'CV', 'CPV', 238, '', 1, '238', 'Africa', 'Africa/Cape Verde', 'UTC-01:00', 'cve', 'https://flagcdn.com/w320/cv.png', NULL, 1, '2022-06-16 02:13:22', '2022-06-16 02:13:22'),
(211, 'Canada', 'CA', 'CAN', 1, '', 1, '1', 'Americas', 'Americas/Canada', 'UTC-08:00', 'cad', 'https://flagcdn.com/w320/ca.png', NULL, 1, '2022-06-16 02:13:23', '2022-06-16 02:13:23'),
(212, 'Cameroon', 'CM', 'CMR', 237, '', 0, '237', 'Africa', 'Africa/Cameroon', 'UTC+01:00', 'xaf', 'https://flagcdn.com/w320/cm.png', NULL, 1, '2022-06-16 02:13:23', '2022-06-16 02:13:23'),
(213, 'Cambodia', 'KH', 'KHM', 855, '', 1, '855', 'Asia', 'Asia/Cambodia', 'UTC+07:00', 'khr', 'https://flagcdn.com/w320/kh.png', NULL, 1, '2022-06-16 02:13:24', '2022-06-16 02:13:24'),
(214, 'Burundi', 'BI', 'BDI', 257, '', 0, '257', 'Africa', 'Africa/Burundi', 'UTC+02:00', 'bif', 'https://flagcdn.com/w320/bi.png', NULL, 1, '2022-06-16 02:13:26', '2022-06-16 02:13:26'),
(215, 'Burkina Faso', 'BF', 'BFA', 226, '', 0, '226', 'Africa', 'Africa/Burkina Faso', 'UTC', 'xof', 'https://flagcdn.com/w320/bf.png', NULL, 1, '2022-06-16 02:13:26', '2022-06-16 02:13:26'),
(216, 'Bulgaria', 'BG', 'BGR', 359, '', 1, '359', 'Europe', 'Europe/Bulgaria', 'UTC+02:00', 'bgn', 'https://flagcdn.com/w320/bg.png', NULL, 1, '2022-06-16 02:13:28', '2022-06-16 02:13:28'),
(217, 'Brunei Darussalam', 'BN', 'BRN', 673, '', 1, '673', 'Asia', 'Asia/Brunei', 'UTC+08:00', 'bnd', 'https://flagcdn.com/w320/bn.png', NULL, 1, '2022-06-16 02:13:30', '2022-06-16 02:13:30'),
(218, 'British Indian Ocean Territory', 'IO', 'IOT', 246, '', 1, '246', 'Africa', 'Africa/British Indian Ocean Territory', 'UTC+06:00', 'usd', 'https://flagcdn.com/w320/io.png', NULL, 1, '2022-06-16 02:13:30', '2022-06-16 02:13:30'),
(219, 'Brazil', 'BR', 'BRA', 55, '', 1, '55', 'Americas', 'Americas/Brazil', 'UTC-05:00', 'brl', 'https://flagcdn.com/w320/br.png', NULL, 1, '2022-06-16 02:13:30', '2022-06-16 02:13:30'),
(220, 'Bouvet Island', 'BV', 'BVT', 55, '', 1, '', 'Antarctic', 'Antarctic/Bouvet Island', 'UTC+01:00', 'usd', 'https://flagcdn.com/w320/bv.png', NULL, 1, '2022-06-16 02:13:31', '2022-06-16 02:13:31'),
(221, 'Botswana', 'BW', 'BWA', 267, '', 0, '267', 'Africa', 'Africa/Botswana', 'UTC+02:00', 'bwp', 'https://flagcdn.com/w320/bw.png', NULL, 1, '2022-06-16 02:13:31', '2022-06-16 02:13:31'),
(222, 'Bosnia and Herzegowina', 'BA', 'BIH', 387, '', 1, '387', 'Europe', 'Europe/Bosnia and Herzegovina', 'UTC+01:00', 'bam', 'https://flagcdn.com/w320/ba.png', NULL, 1, '2022-06-16 02:13:32', '2022-06-16 02:13:32'),
(223, 'Bolivia', 'BO', 'BOL', 591, '', 1, '591', 'Americas', 'Americas/Bolivia', 'UTC-04:00', 'bob', 'https://flagcdn.com/w320/bo.png', NULL, 1, '2022-06-16 02:13:32', '2022-06-16 02:13:32'),
(224, 'Bhutan', 'BT', 'BTN', 975, '', 1, '975', 'Asia', 'Asia/Bhutan', 'UTC+06:00', 'btn', 'https://flagcdn.com/w320/bt.png', NULL, 1, '2022-06-16 02:13:32', '2022-06-16 02:13:32'),
(225, 'Bermuda', 'BM', 'BMU', 1, '', 1, '+1-441', 'Americas', 'Americas/Bermuda', 'UTC-04:00', 'bmd', 'https://flagcdn.com/w320/bm.png', NULL, 1, '2022-06-16 02:13:33', '2022-06-16 02:13:33'),
(226, 'Benin', 'BJ', 'BEN', 229, '', 0, '229', 'Africa', 'Africa/Benin', 'UTC+01:00', 'xof', 'https://flagcdn.com/w320/bj.png', NULL, 1, '2022-06-16 02:13:34', '2022-06-16 02:13:34'),
(227, 'Belize', 'BZ', 'BLZ', 501, '', 0, '501', 'Americas', 'Americas/Belize', 'UTC-06:00', 'bzd', 'https://flagcdn.com/w320/bz.png', NULL, 1, '2022-06-16 02:13:34', '2022-06-16 02:13:34'),
(228, 'Belgium', 'BE', 'BEL', 32, '', 1, '32', 'Europe', 'Europe/Belgium', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/be.png', NULL, 1, '2022-06-16 02:13:35', '2022-06-16 02:13:35'),
(229, 'Belarus', 'BY', 'BLR', 375, '', 1, '375', 'Europe', 'Europe/Belarus', 'UTC+03:00', 'byn', 'https://flagcdn.com/w320/by.png', NULL, 1, '2022-06-16 02:13:35', '2022-06-16 02:13:35'),
(230, 'Barbados', 'BB', 'BRB', 1, '', 1, '+1-246', 'Americas', 'Americas/Barbados', 'UTC-04:00', 'bbd', 'https://flagcdn.com/w320/bb.png', NULL, 1, '2022-06-16 02:13:36', '2022-06-16 02:13:36'),
(231, 'Bangladesh', 'BD', 'BGD', 880, '', 1, '880', 'Asia', 'Asia/Bangladesh', 'UTC+06:00', 'bdt', 'https://flagcdn.com/w320/bd.png', NULL, 1, '2022-06-16 02:13:36', '2022-06-16 02:13:36'),
(232, 'Bahrain', 'BH', 'BHR', 973, '', 1, '973', 'Asia', 'Asia/Bahrain', 'UTC+03:00', 'bhd', 'https://flagcdn.com/w320/bh.png', NULL, 1, '2022-06-16 02:13:40', '2022-06-16 02:13:40'),
(233, 'Bahamas', 'BS', 'BHS', 1, '', 0, '+1-242', 'Americas', 'Americas/Bahamas', 'UTC-05:00', 'bsd', 'https://flagcdn.com/w320/bs.png', NULL, 1, '2022-06-16 02:13:40', '2022-06-16 02:13:40'),
(234, 'Azerbaijan', 'AZ', 'AZE', 994, '', 1, '994', 'Asia', 'Asia/Azerbaijan', 'UTC+04:00', 'azn', 'https://flagcdn.com/w320/az.png', NULL, 1, '2022-06-16 02:13:42', '2022-06-16 02:13:42'),
(235, 'Austria', 'AT', 'AUT', 43, '', 1, '43', 'Europe', 'Europe/Austria', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/at.png', NULL, 1, '2022-06-16 02:13:45', '2022-06-16 02:13:45'),
(236, 'Australia', 'AU', 'AUS', 61, '', 1, '61', 'Oceania', 'Oceania/Australia', 'UTC+05:00', 'aud', 'https://flagcdn.com/w320/au.png', NULL, 1, '2022-06-16 02:13:46', '2022-06-16 02:13:46'),
(237, 'Aruba', 'AW', 'ABW', 297, '', 0, '297', 'Americas', 'Americas/Aruba', 'UTC-04:00', 'awg', 'https://flagcdn.com/w320/aw.png', NULL, 1, '2022-06-16 02:13:46', '2022-06-16 02:13:46'),
(238, 'Armenia', 'AM', 'ARM', 374, '', 1, '374', 'Asia', 'Asia/Armenia', 'UTC+04:00', 'amd', 'https://flagcdn.com/w320/am.png', NULL, 1, '2022-06-16 02:13:46', '2022-06-16 02:13:46'),
(239, 'Argentina', 'AR', 'ARG', 54, '', 1, '54', 'Americas', 'Americas/Argentina', 'UTC-03:00', 'ars', 'https://flagcdn.com/w320/ar.png', NULL, 1, '2022-06-16 02:13:47', '2022-06-16 02:13:47'),
(240, 'Antigua and Barbuda', 'AG', 'ATG', 1, '', 0, '+1-268', 'Americas', 'Americas/Antigua and Barbuda', 'UTC-04:00', 'xcd', 'https://flagcdn.com/w320/ag.png', NULL, 1, '2022-06-16 02:13:48', '2022-06-16 02:13:48'),
(241, 'Antarctica', 'AQ', 'ATA', 672, '', 1, '', 'Antarctic', 'Antarctic/Antarctica', 'UTC-03:00', 'usd', 'https://flagcdn.com/w320/aq.png', NULL, 1, '2022-06-16 02:13:48', '2022-06-16 02:13:48'),
(242, 'Anguilla', 'AI', 'AIA', 1, '', 1, '+1-264', 'Americas', 'Americas/Anguilla', 'UTC-04:00', 'xcd', 'https://flagcdn.com/w320/ai.png', NULL, 1, '2022-06-16 02:13:48', '2022-06-16 02:13:48'),
(243, 'Angola', 'AO', 'AGO', 244, '', 0, '244', 'Africa', 'Africa/Angola', 'UTC+01:00', 'aoa', 'https://flagcdn.com/w320/ao.png', NULL, 1, '2022-06-16 02:13:48', '2022-06-16 02:13:48'),
(244, 'Andorra', 'AD', 'AND', 376, '', 1, '376', 'Europe', 'Europe/Andorra', 'UTC+01:00', 'eur', 'https://flagcdn.com/w320/ad.png', NULL, 1, '2022-06-16 02:13:49', '2022-06-16 02:13:49'),
(245, 'American Samoa', 'AS', 'ASM', 1, '', 1, '+1-684', 'Oceania', 'Oceania/American Samoa', 'UTC-11:00', 'usd', 'https://flagcdn.com/w320/as.png', NULL, 1, '2022-06-16 02:13:49', '2022-06-16 02:13:49'),
(246, 'Algeria', 'DZ', 'DZA', 213, '', 1, '213', 'Africa', 'Africa/Algeria', 'UTC+01:00', 'dzd', 'https://flagcdn.com/w320/dz.png', NULL, 1, '2022-06-16 02:13:49', '2022-06-16 02:13:49'),
(247, 'Albania', 'AL', 'ALB', 355, '', 1, '355', 'Europe', 'Europe/Albania', 'UTC+01:00', 'all', 'https://flagcdn.com/w320/al.png', NULL, 1, '2022-06-16 02:13:51', '2022-06-16 02:13:51'),
(248, 'Afghanistan', 'AF', 'AFG', 93, '', 1, '93', 'Asia', 'Asia/Afghanistan', 'UTC+04:30', 'afn', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_the_Taliban.svg/320px-Flag_of_the_Taliban.svg.png', NULL, 1, '2022-06-16 02:13:53', '2022-06-16 02:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NEET', '1', '2022-11-21 22:03:18', '2022-11-21 22:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `eobjects`
--

DROP TABLE IF EXISTS `eobjects`;
CREATE TABLE IF NOT EXISTS `eobjects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eobjects`
--

INSERT INTO `eobjects` (`id`, `name`, `country_id`, `state_id`, `city_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ddwfet545', 150, 1, 1, '0', '2022-11-23 17:32:15', '2022-11-23 17:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
CREATE TABLE IF NOT EXISTS `exams` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NEET', '1', '2022-11-23 18:30:40', '2022-11-23 18:30:40'),
(2, 'JEEE', '1', '2022-11-23 18:30:55', '2022-11-23 18:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_09_135640_create_permission_tables', 1),
(5, '2022_11_21_170910_create_stclasses_table', 1),
(6, '2022_11_21_171406_create_courses_table', 1),
(7, '2022_11_21_171446_create_exams_table', 1),
(8, '2022_11_21_171530_create_boards_table', 1),
(9, '2022_11_21_171618_create_subjects_table', 1),
(10, '2022_11_21_171659_create_castes_table', 1),
(11, '2022_11_21_171807_create_mother_toungues_table', 1),
(12, '2022_11_21_171849_create_study_years_table', 1),
(13, '2022_11_21_171927_create_semesters_table', 1),
(14, '2022_11_21_172020_create_passout_years_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mother_toungues`
--

DROP TABLE IF EXISTS `mother_toungues`;
CREATE TABLE IF NOT EXISTS `mother_toungues` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mother_toungues`
--

INSERT INTO `mother_toungues` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hindi', '1', '2022-11-21 22:05:32', '2022-11-21 22:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `passout_years`
--

DROP TABLE IF EXISTS `passout_years`;
CREATE TABLE IF NOT EXISTS `passout_years` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `passout_years`
--

INSERT INTO `passout_years` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '2012', '1', '2022-11-21 22:06:41', '2022-11-21 22:06:41');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-11-21 21:57:46', '2022-11-21 21:57:46'),
(2, 'role-create', 'web', '2022-11-21 21:57:46', '2022-11-21 21:57:46'),
(3, 'role-edit', 'web', '2022-11-21 21:57:46', '2022-11-21 21:57:46'),
(4, 'role-delete', 'web', '2022-11-21 21:57:46', '2022-11-21 21:57:46'),
(5, 'user-list', 'web', '2022-11-21 21:57:46', '2022-11-21 21:57:46'),
(6, 'user-create', 'web', '2022-11-21 21:57:46', '2022-11-21 21:57:46'),
(7, 'user-edit', 'web', '2022-11-21 21:57:47', '2022-11-21 21:57:47'),
(8, 'user-delete', 'web', '2022-11-21 21:57:47', '2022-11-21 21:57:47'),
(9, 'country-list', 'web', '2022-11-21 21:57:47', '2022-11-21 21:57:47'),
(10, 'country-create', 'web', '2022-11-21 21:57:47', '2022-11-21 21:57:47'),
(11, 'country-edit', 'web', '2022-11-21 21:57:47', '2022-11-21 21:57:47'),
(12, 'country-delete', 'web', '2022-11-21 21:57:48', '2022-11-21 21:57:48'),
(13, 'course-list', 'web', '2022-11-21 21:57:48', '2022-11-21 21:57:48'),
(14, 'course-create', 'web', '2022-11-21 21:57:48', '2022-11-21 21:57:48'),
(15, 'course-edit', 'web', '2022-11-21 21:57:48', '2022-11-21 21:57:48'),
(16, 'course-delete', 'web', '2022-11-21 21:57:48', '2022-11-21 21:57:48'),
(17, 'board-list', 'web', '2022-11-21 21:57:48', '2022-11-21 21:57:48'),
(18, 'board-create', 'web', '2022-11-21 21:57:48', '2022-11-21 21:57:48'),
(19, 'board-edit', 'web', '2022-11-21 21:57:48', '2022-11-21 21:57:48'),
(20, 'board-delete', 'web', '2022-11-21 21:57:48', '2022-11-21 21:57:48'),
(21, 'caste-list', 'web', '2022-11-21 21:57:48', '2022-11-21 21:57:48'),
(22, 'caste-create', 'web', '2022-11-21 21:57:48', '2022-11-21 21:57:48'),
(23, 'caste-edit', 'web', '2022-11-21 21:57:48', '2022-11-21 21:57:48'),
(24, 'caste-delete', 'web', '2022-11-21 21:57:49', '2022-11-21 21:57:49'),
(25, 'exam-list', 'web', '2022-11-21 21:57:49', '2022-11-21 21:57:49'),
(26, 'exam-create', 'web', '2022-11-21 21:57:49', '2022-11-21 21:57:49'),
(27, 'exam-edit', 'web', '2022-11-21 21:57:49', '2022-11-21 21:57:49'),
(28, 'exam-delete', 'web', '2022-11-21 21:57:49', '2022-11-21 21:57:49'),
(29, 'toungue-list', 'web', '2022-11-21 21:57:49', '2022-11-21 21:57:49'),
(30, 'toungue-create', 'web', '2022-11-21 21:57:49', '2022-11-21 21:57:49'),
(31, 'toungue-edit', 'web', '2022-11-21 21:57:49', '2022-11-21 21:57:49'),
(32, 'toungue-delete', 'web', '2022-11-21 21:57:49', '2022-11-21 21:57:49'),
(33, 'passout-list', 'web', '2022-11-21 21:57:50', '2022-11-21 21:57:50'),
(34, 'passout-create', 'web', '2022-11-21 21:57:50', '2022-11-21 21:57:50'),
(35, 'passout-edit', 'web', '2022-11-21 21:57:50', '2022-11-21 21:57:50'),
(36, 'passout-delete', 'web', '2022-11-21 21:57:50', '2022-11-21 21:57:50'),
(37, 'subject-list', 'web', '2022-11-21 21:57:50', '2022-11-21 21:57:50'),
(38, 'subject-create', 'web', '2022-11-21 21:57:50', '2022-11-21 21:57:50'),
(39, 'subject-edit', 'web', '2022-11-21 21:57:50', '2022-11-21 21:57:50'),
(40, 'subject-delete', 'web', '2022-11-21 21:57:50', '2022-11-21 21:57:50'),
(41, 'semester-list', 'web', '2022-11-21 21:57:50', '2022-11-21 21:57:50'),
(42, 'semester-create', 'web', '2022-11-21 21:57:50', '2022-11-21 21:57:50'),
(43, 'semester-edit', 'web', '2022-11-21 21:57:50', '2022-11-21 21:57:50'),
(44, 'semester-delete', 'web', '2022-11-21 21:57:51', '2022-11-21 21:57:51'),
(45, 'class-list', 'web', '2022-11-21 21:57:51', '2022-11-21 21:57:51'),
(46, 'class-create', 'web', '2022-11-21 21:57:51', '2022-11-21 21:57:51'),
(47, 'class-edit', 'web', '2022-11-21 21:57:51', '2022-11-21 21:57:51'),
(48, 'class-delete', 'web', '2022-11-21 21:57:51', '2022-11-21 21:57:51'),
(49, 'study-list', 'web', '2022-11-21 21:57:51', '2022-11-21 21:57:51'),
(50, 'study-create', 'web', '2022-11-21 21:57:51', '2022-11-21 21:57:51'),
(51, 'study-edit', 'web', '2022-11-21 21:57:51', '2022-11-21 21:57:51'),
(52, 'study-delete', 'web', '2022-11-21 21:57:51', '2022-11-21 21:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `professions`
--

DROP TABLE IF EXISTS `professions`;
CREATE TABLE IF NOT EXISTS `professions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `professions`
--

INSERT INTO `professions` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Website Developer', '0', '2022-11-21 22:33:41', '2022-11-23 17:46:13'),
(2, 'Software Developer', '1', '2022-11-23 17:45:43', '2022-11-23 17:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2022-11-21 21:58:00', '2022-11-21 21:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE IF NOT EXISTS `schools` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `board_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `country_id`, `state_id`, `city_id`, `board_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DPS2', 150, 2, 2, 1, '0', '2022-11-23 16:22:13', '2022-11-23 16:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

DROP TABLE IF EXISTS `semesters`;
CREATE TABLE IF NOT EXISTS `semesters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'First', '1', '2022-11-21 22:33:41', '2022-11-21 22:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asam', 150, '1', '2022-11-22 23:59:04', '2022-11-22 23:59:04'),
(2, 'Arunachal Pradesh', 150, '1', '2022-11-23 00:03:14', '2022-11-23 00:03:14'),
(4, 'Xyz', 150, '1', '2022-11-23 14:01:02', '2022-11-23 14:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `stclasses`
--

DROP TABLE IF EXISTS `stclasses`;
CREATE TABLE IF NOT EXISTS `stclasses` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stclasses`
--

INSERT INTO `stclasses` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KG', '1', '2022-11-21 22:37:00', '2022-11-21 22:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `study_years`
--

DROP TABLE IF EXISTS `study_years`;
CREATE TABLE IF NOT EXISTS `study_years` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `study_years`
--

INSERT INTO `study_years` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '2012', '1', '2022-11-21 22:28:33', '2022-11-21 22:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hindi', '1', '2022-11-21 22:09:27', '2022-11-21 22:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `subobjects`
--

DROP TABLE IF EXISTS `subobjects`;
CREATE TABLE IF NOT EXISTS `subobjects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `board_id` bigint UNSIGNED NOT NULL,
  `exam_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `profession_id` bigint UNSIGNED NOT NULL,
  `stclass_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subobjects`
--

INSERT INTO `subobjects` (`id`, `name`, `country_id`, `state_id`, `city_id`, `board_id`, `exam_id`, `course_id`, `profession_id`, `stclass_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Coching', 150, 2, 2, 1, 2, 1, 1, 1, '1', '2022-11-23 18:31:59', '2022-11-23 18:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

DROP TABLE IF EXISTS `universities`;
CREATE TABLE IF NOT EXISTS `universities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `country_id`, `state_id`, `course_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'rttrtryy', 150, 1, 1, '0', '2022-11-23 15:39:50', '2022-11-23 15:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prashant Shukla', 'admin@gmail.com', NULL, '$2y$10$U9V2JyuLMu2U15s8cknj0uH9igovQcAUoducf3RQdB3Nl9x59Zbwq', NULL, '2022-11-21 21:58:00', '2022-11-21 21:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `villages`
--

DROP TABLE IF EXISTS `villages`;
CREATE TABLE IF NOT EXISTS `villages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `state_id` bigint UNSIGNED NOT NULL,
  `city_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `villages`
--

INSERT INTO `villages` (`id`, `name`, `country_id`, `state_id`, `city_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'bbv', 150, 2, 2, '0', '2022-11-23 14:52:36', '2022-11-23 15:08:41');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
