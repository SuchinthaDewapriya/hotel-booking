-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 01:06 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `additional_items`
--

CREATE TABLE `additional_items` (
  `items_id` bigint(20) UNSIGNED NOT NULL,
  `items_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `items_price` double NOT NULL,
  `items_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `additional_packages`
--

CREATE TABLE `additional_packages` (
  `p_id` bigint(20) UNSIGNED NOT NULL,
  `p_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_price` double NOT NULL,
  `p_additional_bed` int(11) NOT NULL,
  `p_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `additional_packages`
--

INSERT INTO `additional_packages` (`p_id`, `p_name`, `p_price`, `p_additional_bed`, `p_status`, `created_at`, `updated_at`) VALUES
(1, 'dsdsdsd', 111, 22, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apps_countries`
--

CREATE TABLE `apps_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps_countries`
--

INSERT INTO `apps_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AX', 'Aland Islands'),
(3, 'AL', 'Albania'),
(4, 'DZ', 'Algeria'),
(5, 'AS', 'American Samoa'),
(6, 'AD', 'Andorra'),
(7, 'AO', 'Angola'),
(8, 'AI', 'Anguilla'),
(9, 'AQ', 'Antarctica'),
(10, 'AG', 'Antigua and Barbuda'),
(11, 'AR', 'Argentina'),
(12, 'AM', 'Armenia'),
(13, 'AW', 'Aruba'),
(14, 'AU', 'Australia'),
(15, 'AT', 'Austria'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BS', 'Bahamas'),
(18, 'BH', 'Bahrain'),
(19, 'BD', 'Bangladesh'),
(20, 'BB', 'Barbados'),
(21, 'BY', 'Belarus'),
(22, 'BE', 'Belgium'),
(23, 'BZ', 'Belize'),
(24, 'BJ', 'Benin'),
(25, 'BM', 'Bermuda'),
(26, 'BT', 'Bhutan'),
(27, 'BO', 'Bolivia'),
(28, 'BQ', 'Bonaire, Sint Eustatius and Saba'),
(29, 'BA', 'Bosnia and Herzegovina'),
(30, 'BW', 'Botswana'),
(31, 'BV', 'Bouvet Island'),
(32, 'BR', 'Brazil'),
(33, 'IO', 'British Indian Ocean Territory'),
(34, 'BN', 'Brunei Darussalam'),
(35, 'BG', 'Bulgaria'),
(36, 'BF', 'Burkina Faso'),
(37, 'BI', 'Burundi'),
(38, 'KH', 'Cambodia'),
(39, 'CM', 'Cameroon'),
(40, 'CA', 'Canada'),
(41, 'CV', 'Cape Verde'),
(42, 'KY', 'Cayman Islands'),
(43, 'CF', 'Central African Republic'),
(44, 'TD', 'Chad'),
(45, 'CL', 'Chile'),
(46, 'CN', 'China'),
(47, 'CX', 'Christmas Island'),
(48, 'CC', 'Cocos (Keeling) Islands'),
(49, 'CO', 'Colombia'),
(50, 'KM', 'Comoros'),
(51, 'CG', 'Congo'),
(52, 'CD', 'Congo, Democratic Republic of the Congo'),
(53, 'CK', 'Cook Islands'),
(54, 'CR', 'Costa Rica'),
(55, 'CI', 'Cote D\'Ivoire'),
(56, 'HR', 'Croatia'),
(57, 'CU', 'Cuba'),
(58, 'CW', 'Curacao'),
(59, 'CY', 'Cyprus'),
(60, 'CZ', 'Czech Republic'),
(61, 'DK', 'Denmark'),
(62, 'DJ', 'Djibouti'),
(63, 'DM', 'Dominica'),
(64, 'DO', 'Dominican Republic'),
(65, 'EC', 'Ecuador'),
(66, 'EG', 'Egypt'),
(67, 'SV', 'El Salvador'),
(68, 'GQ', 'Equatorial Guinea'),
(69, 'ER', 'Eritrea'),
(70, 'EE', 'Estonia'),
(71, 'ET', 'Ethiopia'),
(72, 'FK', 'Falkland Islands (Malvinas)'),
(73, 'FO', 'Faroe Islands'),
(74, 'FJ', 'Fiji'),
(75, 'FI', 'Finland'),
(76, 'FR', 'France'),
(77, 'GF', 'French Guiana'),
(78, 'PF', 'French Polynesia'),
(79, 'TF', 'French Southern Territories'),
(80, 'GA', 'Gabon'),
(81, 'GM', 'Gambia'),
(82, 'GE', 'Georgia'),
(83, 'DE', 'Germany'),
(84, 'GH', 'Ghana'),
(85, 'GI', 'Gibraltar'),
(86, 'GR', 'Greece'),
(87, 'GL', 'Greenland'),
(88, 'GD', 'Grenada'),
(89, 'GP', 'Guadeloupe'),
(90, 'GU', 'Guam'),
(91, 'GT', 'Guatemala'),
(92, 'GG', 'Guernsey'),
(93, 'GN', 'Guinea'),
(94, 'GW', 'Guinea-Bissau'),
(95, 'GY', 'Guyana'),
(96, 'HT', 'Haiti'),
(97, 'HM', 'Heard Island and Mcdonald Islands'),
(98, 'VA', 'Holy See (Vatican City State)'),
(99, 'HN', 'Honduras'),
(100, 'HK', 'Hong Kong'),
(101, 'HU', 'Hungary'),
(102, 'IS', 'Iceland'),
(103, 'IN', 'India'),
(104, 'ID', 'Indonesia'),
(105, 'IR', 'Iran, Islamic Republic of'),
(106, 'IQ', 'Iraq'),
(107, 'IE', 'Ireland'),
(108, 'IM', 'Isle of Man'),
(109, 'IL', 'Israel'),
(110, 'IT', 'Italy'),
(111, 'JM', 'Jamaica'),
(112, 'JP', 'Japan'),
(113, 'JE', 'Jersey'),
(114, 'JO', 'Jordan'),
(115, 'KZ', 'Kazakhstan'),
(116, 'KE', 'Kenya'),
(117, 'KI', 'Kiribati'),
(118, 'KP', 'Korea, Democratic People\'s Republic of'),
(119, 'KR', 'Korea, Republic of'),
(120, 'XK', 'Kosovo'),
(121, 'KW', 'Kuwait'),
(122, 'KG', 'Kyrgyzstan'),
(123, 'LA', 'Lao People\'s Democratic Republic'),
(124, 'LV', 'Latvia'),
(125, 'LB', 'Lebanon'),
(126, 'LS', 'Lesotho'),
(127, 'LR', 'Liberia'),
(128, 'LY', 'Libyan Arab Jamahiriya'),
(129, 'LI', 'Liechtenstein'),
(130, 'LT', 'Lithuania'),
(131, 'LU', 'Luxembourg'),
(132, 'MO', 'Macao'),
(133, 'MK', 'Macedonia, the Former Yugoslav Republic of'),
(134, 'MG', 'Madagascar'),
(135, 'MW', 'Malawi'),
(136, 'MY', 'Malaysia'),
(137, 'MV', 'Maldives'),
(138, 'ML', 'Mali'),
(139, 'MT', 'Malta'),
(140, 'MH', 'Marshall Islands'),
(141, 'MQ', 'Martinique'),
(142, 'MR', 'Mauritania'),
(143, 'MU', 'Mauritius'),
(144, 'YT', 'Mayotte'),
(145, 'MX', 'Mexico'),
(146, 'FM', 'Micronesia, Federated States of'),
(147, 'MD', 'Moldova, Republic of'),
(148, 'MC', 'Monaco'),
(149, 'MN', 'Mongolia'),
(150, 'ME', 'Montenegro'),
(151, 'MS', 'Montserrat'),
(152, 'MA', 'Morocco'),
(153, 'MZ', 'Mozambique'),
(154, 'MM', 'Myanmar'),
(155, 'NA', 'Namibia'),
(156, 'NR', 'Nauru'),
(157, 'NP', 'Nepal'),
(158, 'NL', 'Netherlands'),
(159, 'AN', 'Netherlands Antilles'),
(160, 'NC', 'New Caledonia'),
(161, 'NZ', 'New Zealand'),
(162, 'NI', 'Nicaragua'),
(163, 'NE', 'Niger'),
(164, 'NG', 'Nigeria'),
(165, 'NU', 'Niue'),
(166, 'NF', 'Norfolk Island'),
(167, 'MP', 'Northern Mariana Islands'),
(168, 'NO', 'Norway'),
(169, 'OM', 'Oman'),
(170, 'PK', 'Pakistan'),
(171, 'PW', 'Palau'),
(172, 'PS', 'Palestinian Territory, Occupied'),
(173, 'PA', 'Panama'),
(174, 'PG', 'Papua New Guinea'),
(175, 'PY', 'Paraguay'),
(176, 'PE', 'Peru'),
(177, 'PH', 'Philippines'),
(178, 'PN', 'Pitcairn'),
(179, 'PL', 'Poland'),
(180, 'PT', 'Portugal'),
(181, 'PR', 'Puerto Rico'),
(182, 'QA', 'Qatar'),
(183, 'RE', 'Reunion'),
(184, 'RO', 'Romania'),
(185, 'RU', 'Russian Federation'),
(186, 'RW', 'Rwanda'),
(187, 'BL', 'Saint Barthelemy'),
(188, 'SH', 'Saint Helena'),
(189, 'KN', 'Saint Kitts and Nevis'),
(190, 'LC', 'Saint Lucia'),
(191, 'MF', 'Saint Martin'),
(192, 'PM', 'Saint Pierre and Miquelon'),
(193, 'VC', 'Saint Vincent and the Grenadines'),
(194, 'WS', 'Samoa'),
(195, 'SM', 'San Marino'),
(196, 'ST', 'Sao Tome and Principe'),
(197, 'SA', 'Saudi Arabia'),
(198, 'SN', 'Senegal'),
(199, 'RS', 'Serbia'),
(200, 'CS', 'Serbia and Montenegro'),
(201, 'SC', 'Seychelles'),
(202, 'SL', 'Sierra Leone'),
(203, 'SG', 'Singapore'),
(204, 'SX', 'Sint Maarten'),
(205, 'SK', 'Slovakia'),
(206, 'SI', 'Slovenia'),
(207, 'SB', 'Solomon Islands'),
(208, 'SO', 'Somalia'),
(209, 'ZA', 'South Africa'),
(210, 'GS', 'South Georgia and the South Sandwich Islands'),
(211, 'SS', 'South Sudan'),
(212, 'ES', 'Spain'),
(213, 'LK', 'Sri Lanka'),
(214, 'SD', 'Sudan'),
(215, 'SR', 'Suriname'),
(216, 'SJ', 'Svalbard and Jan Mayen'),
(217, 'SZ', 'Swaziland'),
(218, 'SE', 'Sweden'),
(219, 'CH', 'Switzerland'),
(220, 'SY', 'Syrian Arab Republic'),
(221, 'TW', 'Taiwan, Province of China'),
(222, 'TJ', 'Tajikistan'),
(223, 'TZ', 'Tanzania, United Republic of'),
(224, 'TH', 'Thailand'),
(225, 'TL', 'Timor-Leste'),
(226, 'TG', 'Togo'),
(227, 'TK', 'Tokelau'),
(228, 'TO', 'Tonga'),
(229, 'TT', 'Trinidad and Tobago'),
(230, 'TN', 'Tunisia'),
(231, 'TR', 'Turkey'),
(232, 'TM', 'Turkmenistan'),
(233, 'TC', 'Turks and Caicos Islands'),
(234, 'TV', 'Tuvalu'),
(235, 'UG', 'Uganda'),
(236, 'UA', 'Ukraine'),
(237, 'AE', 'United Arab Emirates'),
(238, 'GB', 'United Kingdom'),
(239, 'US', 'United States'),
(240, 'UM', 'United States Minor Outlying Islands'),
(241, 'UY', 'Uruguay'),
(242, 'UZ', 'Uzbekistan'),
(243, 'VU', 'Vanuatu'),
(244, 'VE', 'Venezuela'),
(245, 'VN', 'Viet Nam'),
(246, 'VG', 'Virgin Islands, British'),
(247, 'VI', 'Virgin Islands, U.s.'),
(248, 'WF', 'Wallis and Futuna'),
(249, 'EH', 'Western Sahara'),
(250, 'YE', 'Yemen'),
(251, 'ZM', 'Zambia'),
(252, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` bigint(20) UNSIGNED NOT NULL,
  `bill_booking_id` int(11) NOT NULL,
  `bill_pro_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_pro_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_pro_price` double(8,2) NOT NULL,
  `bill_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `b_id` bigint(20) UNSIGNED NOT NULL,
  `b_rid` int(11) NOT NULL,
  `b_checkindate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_checkoutdate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_rquantity` int(11) NOT NULL,
  `b_package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `b_coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_room_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `b_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`b_id`, `b_rid`, `b_checkindate`, `b_checkoutdate`, `b_rquantity`, `b_package`, `b_coupon_name`, `b_room_note`, `b_payment_method`, `b_status`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-05-17', '2023-05-18', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(2, 1, '2023-05-17', '2023-05-18', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(3, 1, '2023-05-17', '2023-05-18', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(4, 1, '2023-05-17', '2023-05-18', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(5, 1, '2023-05-17', '2023-05-18', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(6, 1, '2023-05-17', '2023-05-18', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(7, 1, '2023-05-17', '2023-05-18', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(8, 1, '2023-05-17', '2023-05-18', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(9, 1, '2023-05-17', '2023-05-18', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(10, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(11, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(12, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(13, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(14, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(15, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(16, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(17, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(18, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(19, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(20, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(21, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(22, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(23, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(24, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(25, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(26, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(27, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(28, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(29, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 1, NULL, '2023-06-12 01:59:55'),
(30, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 1, NULL, '2023-06-12 01:58:58'),
(31, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 1, NULL, '2023-06-12 01:47:06'),
(32, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(33, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(34, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(35, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(36, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(37, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(38, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(39, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(40, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(41, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(42, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(43, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(44, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(45, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(46, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(47, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(48, 1, '2023-06-12', '2023-06-13', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(49, 1, '2023-06-18', '2023-06-19', 1, '0', NULL, NULL, NULL, 0, NULL, NULL),
(50, 1, '2023-06-19', '2023-06-21', 1, '111', NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `bd_id` bigint(20) UNSIGNED NOT NULL,
  `bd_booking_id` int(11) NOT NULL,
  `bd_additionalbed_rno` int(11) DEFAULT NULL,
  `bd_additionalbed_quantity` int(11) DEFAULT NULL,
  `bd_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`bd_id`, `bd_booking_id`, `bd_additionalbed_rno`, `bd_additionalbed_quantity`, `bd_status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, 1, '2023-05-17 06:23:51', '2023-05-17 06:23:51'),
(2, 2, NULL, 1, 1, '2023-05-17 06:31:14', '2023-05-17 06:31:14'),
(3, 3, NULL, 1, 1, '2023-05-17 06:40:08', '2023-05-17 06:40:08'),
(4, 4, NULL, 1, 1, '2023-05-17 06:41:54', '2023-05-17 06:41:54'),
(5, 5, NULL, 1, 1, '2023-05-17 07:02:31', '2023-05-17 07:02:31'),
(6, 6, NULL, 1, 1, '2023-05-17 07:03:36', '2023-05-17 07:03:36'),
(7, 7, NULL, 1, 1, '2023-05-17 07:31:05', '2023-05-17 07:31:05'),
(8, 8, NULL, 1, 1, '2023-05-17 07:32:52', '2023-05-17 07:32:52'),
(9, 9, NULL, 1, 1, '2023-05-17 07:33:54', '2023-05-17 07:33:54'),
(10, 10, NULL, 1, 1, '2023-06-11 22:46:52', '2023-06-11 22:46:52'),
(11, 11, NULL, 1, 1, '2023-06-11 22:48:51', '2023-06-11 22:48:51'),
(12, 12, NULL, 1, 1, '2023-06-11 22:51:20', '2023-06-11 22:51:20'),
(13, 13, NULL, 1, 1, '2023-06-11 23:02:57', '2023-06-11 23:02:57'),
(14, 14, NULL, 1, 1, '2023-06-11 23:03:24', '2023-06-11 23:03:24'),
(15, 15, NULL, 1, 1, '2023-06-11 23:10:58', '2023-06-11 23:10:58'),
(16, 16, NULL, 1, 1, '2023-06-11 23:13:43', '2023-06-11 23:13:43'),
(17, 17, NULL, 1, 1, '2023-06-11 23:18:46', '2023-06-11 23:18:46'),
(18, 18, NULL, 1, 1, '2023-06-11 23:22:01', '2023-06-11 23:22:01'),
(19, 19, NULL, 1, 1, '2023-06-11 23:22:28', '2023-06-11 23:22:28'),
(20, 20, NULL, 1, 1, '2023-06-11 23:24:14', '2023-06-11 23:24:14'),
(21, 21, NULL, 1, 1, '2023-06-11 23:27:44', '2023-06-11 23:27:44'),
(22, 22, NULL, 1, 1, '2023-06-11 23:27:57', '2023-06-11 23:27:57'),
(23, 23, NULL, 1, 1, '2023-06-11 23:31:46', '2023-06-11 23:31:46'),
(24, 24, NULL, 1, 1, '2023-06-11 23:32:54', '2023-06-11 23:32:54'),
(25, 25, NULL, 1, 1, '2023-06-12 00:00:00', '2023-06-12 00:00:00'),
(26, 26, NULL, 1, 1, '2023-06-12 00:00:19', '2023-06-12 00:00:19'),
(27, 27, NULL, 1, 1, '2023-06-12 00:12:27', '2023-06-12 00:12:27'),
(28, 28, NULL, 1, 1, '2023-06-12 00:25:30', '2023-06-12 00:25:30'),
(29, 29, NULL, 1, 1, '2023-06-12 00:29:32', '2023-06-12 00:29:32'),
(30, 30, NULL, 1, 1, '2023-06-12 00:31:56', '2023-06-12 00:31:56'),
(31, 31, NULL, 1, 1, '2023-06-12 00:33:07', '2023-06-12 00:33:07'),
(32, 32, NULL, 1, 1, '2023-06-12 02:39:29', '2023-06-12 02:39:29'),
(33, 33, NULL, 1, 1, '2023-06-12 02:39:32', '2023-06-12 02:39:32'),
(34, 34, NULL, 1, 1, '2023-06-12 02:41:22', '2023-06-12 02:41:22'),
(35, 35, NULL, 1, 1, '2023-06-12 02:42:42', '2023-06-12 02:42:42'),
(36, 36, NULL, 1, 1, '2023-06-12 02:46:39', '2023-06-12 02:46:39'),
(37, 37, NULL, 1, 1, '2023-06-12 02:46:53', '2023-06-12 02:46:53'),
(38, 38, NULL, 1, 1, '2023-06-12 02:50:44', '2023-06-12 02:50:44'),
(39, 39, NULL, 1, 1, '2023-06-12 02:51:02', '2023-06-12 02:51:02'),
(40, 40, NULL, 1, 1, '2023-06-12 03:13:16', '2023-06-12 03:13:16'),
(41, 41, NULL, 1, 1, '2023-06-12 03:14:01', '2023-06-12 03:14:01'),
(42, 42, NULL, 1, 1, '2023-06-12 03:15:46', '2023-06-12 03:15:46'),
(43, 43, NULL, 1, 1, '2023-06-12 03:16:40', '2023-06-12 03:16:40'),
(44, 44, NULL, 1, 1, '2023-06-12 04:52:09', '2023-06-12 04:52:09'),
(45, 45, NULL, 1, 1, '2023-06-12 04:56:11', '2023-06-12 04:56:11'),
(46, 46, NULL, 1, 1, '2023-06-12 05:03:21', '2023-06-12 05:03:21'),
(47, 47, NULL, 1, 1, '2023-06-12 05:03:26', '2023-06-12 05:03:26'),
(48, 48, NULL, 1, 1, '2023-06-12 05:04:07', '2023-06-12 05:04:07'),
(49, 49, NULL, 1, 1, '2023-06-17 05:32:45', '2023-06-17 05:32:45'),
(50, 50, NULL, 1, 1, '2023-06-17 05:35:22', '2023-06-17 05:35:22');

-- --------------------------------------------------------

--
-- Table structure for table `booking_rates`
--

CREATE TABLE `booking_rates` (
  `br_id` bigint(20) UNSIGNED NOT NULL,
  `br_bookingid` int(11) NOT NULL,
  `br_roomRate` int(11) NOT NULL,
  `br_packageRate` int(11) NOT NULL,
  `br_bedmRate` int(11) NOT NULL,
  `br_discount` int(11) NOT NULL DEFAULT 0,
  `br_totalRate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booking_rates`
--

INSERT INTO `booking_rates` (`br_id`, `br_bookingid`, `br_roomRate`, `br_packageRate`, `br_bedmRate`, `br_discount`, `br_totalRate`, `created_at`, `updated_at`) VALUES
(1, 1, 2500, 0, 500, 0, 3000, NULL, NULL),
(2, 2, 2500, 0, 500, 0, 3000, NULL, NULL),
(3, 3, 2500, 0, 500, 0, 3000, NULL, NULL),
(4, 4, 2500, 0, 500, 0, 3000, NULL, NULL),
(5, 5, 2500, 0, 500, 0, 3000, NULL, NULL),
(6, 6, 2500, 0, 500, 0, 3000, NULL, NULL),
(7, 7, 2500, 0, 500, 0, 3000, NULL, NULL),
(8, 8, 2500, 0, 500, 0, 3000, NULL, NULL),
(9, 9, 2500, 0, 500, 0, 3000, NULL, NULL),
(10, 10, 2500, 0, 500, 0, 3000, NULL, NULL),
(11, 11, 2500, 0, 500, 0, 3000, NULL, NULL),
(12, 12, 2500, 0, 500, 0, 3000, NULL, NULL),
(13, 13, 2500, 0, 500, 0, 3000, NULL, NULL),
(14, 14, 2500, 0, 500, 0, 3000, NULL, NULL),
(15, 15, 2500, 0, 500, 0, 3000, NULL, NULL),
(16, 16, 2500, 0, 500, 0, 3000, NULL, NULL),
(17, 17, 2500, 0, 500, 0, 3000, NULL, NULL),
(18, 18, 2500, 0, 500, 0, 3000, NULL, NULL),
(19, 19, 2500, 0, 500, 0, 3000, NULL, NULL),
(20, 20, 2500, 0, 500, 0, 3000, NULL, NULL),
(21, 21, 2500, 0, 500, 0, 3000, NULL, NULL),
(22, 22, 2500, 0, 500, 0, 3000, NULL, NULL),
(23, 23, 2500, 0, 500, 0, 3000, NULL, NULL),
(24, 24, 2500, 0, 500, 0, 3000, NULL, NULL),
(25, 25, 2500, 0, 500, 0, 3000, NULL, NULL),
(26, 26, 2500, 0, 500, 0, 3000, NULL, NULL),
(27, 27, 2500, 0, 500, 0, 3000, NULL, NULL),
(28, 28, 2500, 0, 500, 0, 3000, NULL, NULL),
(29, 29, 2500, 0, 500, 0, 3000, NULL, NULL),
(30, 30, 2500, 0, 500, 0, 3000, NULL, NULL),
(31, 31, 2500, 0, 500, 0, 3000, NULL, NULL),
(32, 32, 2500, 0, 500, 0, 3000, NULL, NULL),
(33, 33, 2500, 0, 500, 0, 3000, NULL, NULL),
(34, 34, 2500, 0, 500, 0, 3000, NULL, NULL),
(35, 35, 2500, 0, 500, 0, 3000, NULL, NULL),
(36, 36, 2500, 0, 500, 0, 3000, NULL, NULL),
(37, 37, 2500, 0, 500, 0, 3000, NULL, NULL),
(38, 38, 2500, 0, 500, 0, 3000, NULL, NULL),
(39, 39, 2500, 0, 500, 0, 3000, NULL, NULL),
(40, 40, 2500, 0, 500, 0, 3000, NULL, NULL),
(41, 41, 2500, 0, 500, 0, 3000, NULL, NULL),
(42, 42, 2500, 0, 500, 0, 3000, NULL, NULL),
(43, 43, 2500, 0, 500, 0, 3000, NULL, NULL),
(44, 44, 2500, 0, 500, 0, 3000, NULL, NULL),
(45, 45, 2500, 0, 500, 0, 3000, NULL, NULL),
(46, 46, 2500, 0, 500, 0, 3000, NULL, NULL),
(47, 47, 2500, 0, 500, 0, 3000, NULL, NULL),
(48, 48, 2500, 0, 500, 0, 3000, NULL, NULL),
(49, 49, 2500, 0, 500, 0, 3000, NULL, NULL),
(50, 50, 5000, 266, 1000, 0, 6266, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_id` bigint(20) UNSIGNED NOT NULL,
  `coupon_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_room` int(11) NOT NULL DEFAULT 0,
  `coupon_package` int(11) NOT NULL DEFAULT 0,
  `coupon_bed` int(11) NOT NULL DEFAULT 0,
  `coupon_total` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `cd_id` bigint(20) UNSIGNED NOT NULL,
  `cd_bookingid` int(11) NOT NULL,
  `cd_salutation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cd_first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cd_last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cd_bday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cd_nic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cd_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cd_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cd_country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cd_note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cd_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`cd_id`, `cd_bookingid`, `cd_salutation`, `cd_first_name`, `cd_last_name`, `cd_bday`, `cd_nic`, `cd_email`, `cd_phone`, `cd_country`, `cd_note`, `cd_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mrs', 'Bhagya', 'Abeysooriya', '2023-03-16', '951701076v', 'suchinthad@gmail.com', '0715235898', 'Sri Lanka', 'Deeeeewerr', '1', NULL, NULL),
(2, 2, 'Mrs', 'Bhagya', 'Abeysooriya', '2023-03-16', '951701076v', 'suchinthad@gmail.com', '0715235898', 'Sri Lanka', 'Deeeeewerr', '1', NULL, NULL),
(3, 3, 'Mrs', 'Bhagya', 'Abeysooriya', '2023-03-16', '951701076v', 'suchinthad@gmail.com', '0715235898', 'Sri Lanka', 'Deeeeewerr', '1', NULL, NULL),
(4, 4, 'Mrs', 'Bhagya', 'Abeysooriya', '2023-03-16', '951701076v', 'suchinthad@gmail.com', '0715235898', 'Sri Lanka', 'Deeeeewerr', '1', NULL, NULL),
(5, 5, 'Mrs', 'Bhagya', 'Abeysooriya', '2023-03-16', '951701076v', 'suchinthad@gmail.com', '0715235898', 'Sri Lanka', 'Deeeeewerr', '1', NULL, NULL),
(6, 6, 'Miss', 'Bhagya', 'Abeysooriya', '2023-03-16', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Bangladesh', 'eeeeeeeeee', '1', NULL, NULL),
(7, 7, 'Miss', 'Bhagya', 'Abeysooriya', '2023-03-16', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Bangladesh', 'eeeeeeeeee', '1', NULL, NULL),
(8, 8, 'Miss', 'Bhagya', 'Abeysooriya', '2023-03-16', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Bangladesh', 'eeeeeeeeee', '1', NULL, NULL),
(9, 9, 'Miss', 'Bhagya', 'Abeysooriya', '2023-03-16', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Bangladesh', 'eeeeeeeeee', '1', NULL, NULL),
(10, 10, 'Mr', 'Bhagya', 'Abeysooriya', '2023-05-31', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Bahrain', NULL, '1', NULL, NULL),
(11, 11, 'Mr', 'Bhagya', 'Abeysooriya', '2023-05-31', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Bahrain', NULL, '1', NULL, NULL),
(12, 12, 'Mr', 'Bhagya', 'Abeysooriya', '2023-05-31', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Bahrain', NULL, '1', NULL, NULL),
(13, 13, 'Mr', 'Bhagya', 'Abeysooriya', '2023-05-31', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Bahrain', NULL, '1', NULL, NULL),
(14, 14, 'Mr', 'Bhagya', 'Abeysooriya', '2023-05-31', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Bahrain', NULL, '1', NULL, NULL),
(15, 15, 'Mr', 'Atiq', 'Savani', '2023-06-13', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Bangladesh', NULL, '1', NULL, NULL),
(16, 16, 'Mr', 'Atiq', 'Savani', '2023-06-13', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Bangladesh', NULL, '1', NULL, NULL),
(17, 17, 'Mr', 'Atiq', 'Savani', '2023-06-13', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Bangladesh', NULL, '1', NULL, NULL),
(18, 18, 'Mr', 'Atiq', 'Savani', '2023-06-13', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Bangladesh', NULL, '1', NULL, NULL),
(19, 19, 'Mr', 'Atiq', 'Savani', '2023-06-13', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Bangladesh', NULL, '1', NULL, NULL),
(20, 20, 'Mr', 'Atiq', 'Savani', '2023-06-13', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Bangladesh', 'jkfdfjkdfj', '1', NULL, NULL),
(21, 21, 'Mr', 'Atiq', 'Savani', '2023-06-01', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Bangladesh', NULL, '1', NULL, NULL),
(22, 22, 'Mr', 'Atiq', 'Savani', '2023-06-01', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Bangladesh', NULL, '1', NULL, NULL),
(23, 23, 'Mr', 'Atiq', 'Savani', '2023-06-01', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Bangladesh', NULL, '1', NULL, NULL),
(24, 24, 'Mr', 'Atiq', 'Savani', '2022-04-06', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Azerbaijan', 'sdsd', '1', NULL, NULL),
(25, 25, 'Mr', 'Atiq', 'Savani', '2022-04-06', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Azerbaijan', 'sdsd', '1', NULL, NULL),
(26, 26, 'Mr', 'Atiq', 'Savani', '2022-04-06', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Azerbaijan', 'sdsd', '1', NULL, NULL),
(27, 27, 'Mr', 'Atiq', 'Savani', '2022-04-06', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Azerbaijan', 'sdsd', '1', NULL, NULL),
(28, 28, 'Mr', 'Atiq', 'Savani', '2022-04-06', '872981667V', 'suchinthad@gmail.com', '0715235898', 'Azerbaijan', 'sdsd', '1', NULL, NULL),
(29, 29, 'Mr', 'Atiq', 'Savani', '2022-04-06', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Azerbaijan', 'sdsd', '1', NULL, NULL),
(30, 30, 'Mr', 'Atiq', 'Savani', '2022-04-06', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Azerbaijan', 'sdsd', '1', NULL, NULL),
(31, 31, 'Mr', 'Bhagya', 'Abeysooriya', '2023-05-31', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Australia', NULL, '1', NULL, NULL),
(32, 32, 'Mr', 'Bhagya', 'Savani', '2023-06-01', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Albania', NULL, '1', NULL, NULL),
(33, 33, 'Mr', 'Bhagya', 'Savani', '2023-06-01', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Albania', NULL, '1', NULL, NULL),
(34, 34, 'Mr', 'Bhagya', 'Abeysooriya', '2023-06-01', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Australia', NULL, '1', NULL, NULL),
(35, 35, 'Mr', 'Bhagya', 'Abeysooriya', '2023-06-01', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Australia', NULL, '1', NULL, NULL),
(36, 36, 'Mr', 'Bhagya', 'Abeysooriya', '2023-06-01', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Australia', NULL, '1', NULL, NULL),
(37, 37, 'Mr', 'Bhagya', 'Abeysooriya', '2023-06-01', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Australia', NULL, '1', NULL, NULL),
(38, 38, 'Mr', 'Bhagya', 'Abeysooriya', '2023-06-01', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Australia', NULL, '1', NULL, NULL),
(39, 39, 'Mr', 'Bhagya', 'Abeysooriya', '2023-06-01', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Australia', NULL, '1', NULL, NULL),
(40, 40, 'Mr', 'Bhagya', 'Abeysooriya', '2023-06-01', '951701076v', 'bhagyaebaysl@gmail.com', '0715235898', 'Australia', NULL, '1', NULL, NULL),
(41, 41, 'Mr', 'Bhagya', 'Savani', '2023-06-05', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Bahrain', NULL, '1', NULL, NULL),
(42, 42, 'Mr', 'Bhagya', 'Savani', '2023-06-05', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Bahrain', NULL, '1', NULL, NULL),
(43, 43, 'Mr', 'Bhagya', 'Savani', '2023-06-05', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Bahrain', NULL, '1', NULL, NULL),
(44, 44, 'Mr', 'Bhagya', 'Savani', '2023-06-05', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Bahrain', NULL, '1', NULL, NULL),
(45, 45, 'Mr', 'Bhagya', 'Savani', '2023-05-31', '951701076v', 'websenya@gmail.com', '0715235898', 'Bangladesh', 'dsmkdsmdk', '1', NULL, NULL),
(46, 46, 'Mr', 'Bhagya', 'Savani', '2023-05-31', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Bahrain', NULL, '1', NULL, NULL),
(47, 47, 'Mr', 'Bhagya', 'Savani', '2023-05-31', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Bahrain', NULL, '1', NULL, NULL),
(48, 48, 'Mr', 'Bhagya', 'Savani', '2023-05-31', '872981667V', 'bhagyaebaysl@gmail.com', '0715235898', 'Bahrain', NULL, '1', NULL, NULL),
(49, 49, 'Mrs', 'Bhagya', 'Abeysooriya', '2023-03-16', '951701076v', 'suchinthad@gmail.com', '0715235898', 'Sri Lanka', NULL, '1', NULL, NULL),
(50, 50, 'Mrs', 'Bhagya', 'Abeysooriya', '2023-03-16', '951701076v', 'suchinthad@gmail.com', '0715235898', 'Sri Lanka', NULL, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `r_id` bigint(20) UNSIGNED NOT NULL,
  `r_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_quantity` int(11) DEFAULT NULL,
  `r_bookquantity` int(11) DEFAULT NULL,
  `r_additional_bed` int(11) DEFAULT NULL,
  `r_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`r_id`, `r_name`, `r_price`, `r_quantity`, `r_bookquantity`, `r_additional_bed`, `r_description`, `r_image`, `r_status`, `created_at`, `updated_at`) VALUES
(1, 'Fitness Niche eCommerce Brand (30 Products)', '2500', 2, 0, 500, 'By default, the cart has a default sessionKey that holds the cart data. This also serves as a cart unique identifier which you can use to bind a cart to a specific user. To override this default session Key, you will just simply call the', '1684322909DSC_0048.JPG', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_galleries`
--

CREATE TABLE `room_galleries` (
  `gallery_id` bigint(20) UNSIGNED NOT NULL,
  `gallery_Room_id` int(11) DEFAULT NULL,
  `gallery_image_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_image_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_image_3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_image_4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_image_5` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_galleries`
--

INSERT INTO `room_galleries` (`gallery_id`, `gallery_Room_id`, `gallery_image_1`, `gallery_image_2`, `gallery_image_3`, `gallery_image_4`, `gallery_image_5`, `created_at`, `updated_at`) VALUES
(1, 1, '1684322909DSC_0050.JPG', '1684322909DSC_0050.JPG', '1684322909DSC_0054.JPG', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `searchings`
--

CREATE TABLE `searchings` (
  `search_id` bigint(20) UNSIGNED NOT NULL,
  `search_rid` int(11) NOT NULL,
  `search_checkindate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `search_checkoutdate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `search_rquantity` int(11) NOT NULL,
  `search_package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `s_id` bigint(20) UNSIGNED NOT NULL,
  `s_mail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`s_id`, `s_mail`, `created_at`, `updated_at`) VALUES
(1, 'shehaninugera1212@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Manager',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test@test.com', NULL, '$2y$12$PXgznOmZkkB6wcMieKbmXe6OV02W6/OsFkFT5.XpbRMSeWTfXZVXu', 'Admin', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `additional_items`
--
ALTER TABLE `additional_items`
  ADD PRIMARY KEY (`items_id`);

--
-- Indexes for table `additional_packages`
--
ALTER TABLE `additional_packages`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `apps_countries`
--
ALTER TABLE `apps_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`bd_id`);

--
-- Indexes for table `booking_rates`
--
ALTER TABLE `booking_rates`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`cd_id`);

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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `room_galleries`
--
ALTER TABLE `room_galleries`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `searchings`
--
ALTER TABLE `searchings`
  ADD PRIMARY KEY (`search_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`s_id`);

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
-- AUTO_INCREMENT for table `additional_items`
--
ALTER TABLE `additional_items`
  MODIFY `items_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `additional_packages`
--
ALTER TABLE `additional_packages`
  MODIFY `p_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apps_countries`
--
ALTER TABLE `apps_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `b_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `bd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `booking_rates`
--
ALTER TABLE `booking_rates`
  MODIFY `br_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `cd_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `r_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room_galleries`
--
ALTER TABLE `room_galleries`
  MODIFY `gallery_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `searchings`
--
ALTER TABLE `searchings`
  MODIFY `search_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `s_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
