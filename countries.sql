-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table coupondeck.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=253 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table coupondeck.countries: 251 rows
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id`, `code`, `country`, `status`) VALUES
	(1, 'AF', 'Afghanistan', 0),
	(2, 'AL', 'Albania', 0),
	(3, 'DZ', 'Algeria', 0),
	(4, 'AS', 'American Samoa', 0),
	(5, 'AD', 'Andorra', 0),
	(6, 'AO', 'Angola', 0),
	(7, 'AI', 'Anguilla', 0),
	(8, 'AQ', 'Antarctica', 0),
	(9, 'AG', 'Antigua and Barbuda', 0),
	(10, 'AR', 'Argentina', 0),
	(11, 'AM', 'Armenia', 0),
	(12, 'AW', 'Aruba', 0),
	(13, 'AU', 'Australia', 0),
	(14, 'AT', 'Austria', 0),
	(15, 'AZ', 'Azerbaijan', 0),
	(16, 'BS', 'Bahamas', 0),
	(17, 'BH', 'Bahrain', 0),
	(18, 'BD', 'Bangladesh', 0),
	(19, 'BB', 'Barbados', 0),
	(20, 'BY', 'Belarus', 0),
	(21, 'BE', 'Belgium', 0),
	(22, 'BZ', 'Belize', 0),
	(23, 'BJ', 'Benin', 0),
	(24, 'BM', 'Bermuda', 0),
	(25, 'BT', 'Bhutan', 0),
	(26, 'BO', 'Bolivia', 0),
	(27, 'BA', 'Bosnia and Herzegovina', 0),
	(28, 'BW', 'Botswana', 0),
	(29, 'BV', 'Bouvet Island', 0),
	(30, 'BR', 'Brazil', 0),
	(31, 'IO', 'British Indian Ocean Territory', 0),
	(32, 'BN', 'Brunei Darussalam', 0),
	(33, 'BG', 'Bulgaria', 0),
	(34, 'BF', 'Burkina Faso', 0),
	(35, 'BI', 'Burundi', 0),
	(36, 'KH', 'Cambodia', 0),
	(37, 'CM', 'Cameroon', 0),
	(38, 'CA', 'Canada', 0),
	(39, 'CV', 'Cape Verde', 0),
	(40, 'KY', 'Cayman Islands', 0),
	(41, 'CF', 'Central African Republic', 0),
	(42, 'TD', 'Chad', 0),
	(43, 'CL', 'Chile', 0),
	(44, 'CN', 'China', 0),
	(45, 'CX', 'Christmas Island', 0),
	(46, 'CC', 'Cocos (Keeling) Islands', 0),
	(47, 'CO', 'Colombia', 0),
	(48, 'KM', 'Comoros', 0),
	(49, 'CG', 'Congo', 0),
	(50, 'CD', 'Congo, the Democratic Republic of the', 0),
	(51, 'CK', 'Cook Islands', 0),
	(52, 'CR', 'Costa Rica', 0),
	(53, 'CI', 'Cote D\'Ivoire', 0),
	(54, 'HR', 'Croatia', 0),
	(55, 'CU', 'Cuba', 0),
	(56, 'CY', 'Cyprus', 0),
	(57, 'CZ', 'Czech Republic', 0),
	(58, 'DK', 'Denmark', 0),
	(59, 'DJ', 'Djibouti', 0),
	(60, 'DM', 'Dominica', 0),
	(61, 'DO', 'Dominican Republic', 0),
	(62, 'EC', 'Ecuador', 0),
	(63, 'EG', 'Egypt', 0),
	(64, 'SV', 'El Salvador', 0),
	(65, 'GQ', 'Equatorial Guinea', 0),
	(66, 'ER', 'Eritrea', 0),
	(67, 'EE', 'Estonia', 0),
	(68, 'ET', 'Ethiopia', 0),
	(69, 'FK', 'Falkland Islands (Malvinas)', 0),
	(70, 'FO', 'Faroe Islands', 0),
	(71, 'FJ', 'Fiji', 0),
	(72, 'FI', 'Finland', 0),
	(73, 'FR', 'France', 0),
	(74, 'GF', 'French Guiana', 0),
	(75, 'PF', 'French Polynesia', 0),
	(76, 'TF', 'French Southern Territories', 0),
	(77, 'GA', 'Gabon', 0),
	(78, 'GM', 'Gambia', 0),
	(79, 'GE', 'Georgia', 0),
	(80, 'DE', 'Germany', 0),
	(81, 'GH', 'Ghana', 0),
	(82, 'GI', 'Gibraltar', 0),
	(83, 'GR', 'Greece', 0),
	(84, 'GL', 'Greenland', 0),
	(85, 'GD', 'Grenada', 0),
	(86, 'GP', 'Guadeloupe', 0),
	(87, 'GU', 'Guam', 0),
	(88, 'GT', 'Guatemala', 0),
	(89, 'GN', 'Guinea', 0),
	(90, 'GW', 'Guinea-Bissau', 0),
	(91, 'GY', 'Guyana', 0),
	(92, 'HT', 'Haiti', 0),
	(93, 'HM', 'Heard Island and Mcdonald Islands', 0),
	(94, 'VA', 'Holy See (Vatican City State)', 0),
	(95, 'HN', 'Honduras', 0),
	(96, 'HK', 'Hong Kong', 0),
	(97, 'HU', 'Hungary', 0),
	(98, 'IS', 'Iceland', 0),
	(99, 'IN', 'India', 1),
	(100, 'ID', 'Indonesia', 1),
	(101, 'IR', 'Iran, Islamic Republic of', 0),
	(102, 'IQ', 'Iraq', 0),
	(103, 'IE', 'Ireland', 0),
	(104, 'IL', 'Israel', 0),
	(105, 'IT', 'Italy', 0),
	(106, 'JM', 'Jamaica', 0),
	(107, 'JP', 'Japan', 0),
	(108, 'JO', 'Jordan', 0),
	(109, 'KZ', 'Kazakhstan', 0),
	(110, 'KE', 'Kenya', 0),
	(111, 'KI', 'Kiribati', 0),
	(112, 'KP', 'Korea, Democratic People\'s Republic of', 0),
	(113, 'KR', 'Korea, Republic of', 0),
	(114, 'KW', 'Kuwait', 0),
	(115, 'KG', 'Kyrgyzstan', 0),
	(116, 'LA', 'Lao People\'s Democratic Republic', 0),
	(117, 'LV', 'Latvia', 0),
	(118, 'LB', 'Lebanon', 0),
	(119, 'LS', 'Lesotho', 0),
	(120, 'LR', 'Liberia', 0),
	(121, 'LY', 'Libyan Arab Jamahiriya', 0),
	(122, 'LI', 'Liechtenstein', 0),
	(123, 'LT', 'Lithuania', 0),
	(124, 'LU', 'Luxembourg', 0),
	(125, 'MO', 'Macao', 0),
	(126, 'MK', 'Macedonia, the Former Yugoslav Republic of', 0),
	(127, 'MG', 'Madagascar', 0),
	(128, 'MW', 'Malawi', 0),
	(129, 'MY', 'Malaysia', 0),
	(130, 'MV', 'Maldives', 0),
	(131, 'ML', 'Mali', 0),
	(132, 'MT', 'Malta', 0),
	(133, 'MH', 'Marshall Islands', 0),
	(134, 'MQ', 'Martinique', 0),
	(135, 'MR', 'Mauritania', 0),
	(136, 'MU', 'Mauritius', 0),
	(137, 'YT', 'Mayotte', 0),
	(138, 'MX', 'Mexico', 0),
	(139, 'FM', 'Micronesia, Federated States of', 0),
	(140, 'MD', 'Moldova, Republic of', 0),
	(141, 'MC', 'Monaco', 0),
	(142, 'MN', 'Mongolia', 0),
	(143, 'MS', 'Montserrat', 0),
	(144, 'MA', 'Morocco', 0),
	(145, 'MZ', 'Mozambique', 0),
	(146, 'MM', 'Myanmar', 0),
	(147, 'NA', 'Namibia', 0),
	(148, 'NR', 'Nauru', 0),
	(149, 'NP', 'Nepal', 0),
	(150, 'NL', 'Netherlands', 0),
	(151, 'AN', 'Netherlands Antilles', 0),
	(152, 'NC', 'New Caledonia', 0),
	(153, 'NZ', 'New Zealand', 0),
	(154, 'NI', 'Nicaragua', 0),
	(155, 'NE', 'Niger', 0),
	(156, 'NG', 'Nigeria', 0),
	(157, 'NU', 'Niue', 0),
	(158, 'NF', 'Norfolk Island', 0),
	(159, 'MP', 'Northern Mariana Islands', 0),
	(160, 'NO', 'Norway', 0),
	(161, 'OM', 'Oman', 0),
	(162, 'PK', 'Pakistan', 0),
	(163, 'PW', 'Palau', 0),
	(164, 'PS', 'Palestinian Territory, Occupied', 0),
	(165, 'PA', 'Panama', 0),
	(166, 'PG', 'Papua New Guinea', 0),
	(167, 'PY', 'Paraguay', 0),
	(168, 'PE', 'Peru', 0),
	(169, 'PH', 'Philippines', 0),
	(170, 'PN', 'Pitcairn', 0),
	(171, 'PL', 'Poland', 0),
	(172, 'PT', 'Portugal', 0),
	(173, 'PR', 'Puerto Rico', 0),
	(174, 'QA', 'Qatar', 0),
	(175, 'RE', 'Reunion', 0),
	(176, 'RO', 'Romania', 0),
	(177, 'RU', 'Russian Federation', 0),
	(178, 'RW', 'Rwanda', 0),
	(179, 'SH', 'Saint Helena', 0),
	(180, 'KN', 'Saint Kitts and Nevis', 0),
	(181, 'LC', 'Saint Lucia', 0),
	(182, 'PM', 'Saint Pierre and Miquelon', 0),
	(183, 'VC', 'Saint Vincent and the Grenadines', 0),
	(184, 'WS', 'Samoa', 0),
	(185, 'SM', 'San Marino', 0),
	(186, 'ST', 'Sao Tome and Principe', 0),
	(187, 'SA', 'Saudi Arabia', 0),
	(188, 'SN', 'Senegal', 0),
	(189, 'ME', 'Montenegro', 0),
	(190, 'SC', 'Seychelles', 0),
	(191, 'SL', 'Sierra Leone', 0),
	(192, 'SG', 'Singapore', 1),
	(193, 'SK', 'Slovakia', 0),
	(194, 'SI', 'Slovenia', 0),
	(195, 'SB', 'Solomon Islands', 0),
	(196, 'SO', 'Somalia', 0),
	(197, 'ZA', 'South Africa', 0),
	(198, 'GS', 'South Georgia and the South Sandwich Islands', 0),
	(199, 'ES', 'Spain', 0),
	(200, 'LK', 'Sri Lanka', 0),
	(201, 'SD', 'Sudan', 0),
	(202, 'SR', 'Suriname', 0),
	(203, 'SJ', 'Svalbard and Jan Mayen', 0),
	(204, 'SZ', 'Swaziland', 0),
	(205, 'SE', 'Sweden', 0),
	(206, 'CH', 'Switzerland', 0),
	(207, 'SY', 'Syrian Arab Republic', 0),
	(208, 'TW', 'Taiwan, Province of China', 0),
	(209, 'TJ', 'Tajikistan', 0),
	(210, 'TZ', 'Tanzania, United Republic of', 0),
	(211, 'TH', 'Thailand', 1),
	(212, 'TL', 'Timor-Leste', 0),
	(213, 'TG', 'Togo', 0),
	(214, 'TK', 'Tokelau', 0),
	(215, 'TO', 'Tonga', 0),
	(216, 'TT', 'Trinidad and Tobago', 0),
	(217, 'TN', 'Tunisia', 0),
	(218, 'TR', 'Turkey', 0),
	(219, 'TM', 'Turkmenistan', 0),
	(220, 'TC', 'Turks and Caicos Islands', 0),
	(221, 'TV', 'Tuvalu', 0),
	(222, 'UG', 'Uganda', 0),
	(223, 'UA', 'Ukraine', 0),
	(224, 'AE', 'United Arab Emirates', 0),
	(225, 'GB', 'United Kingdom', 0),
	(226, 'US', 'United States', 0),
	(227, 'UM', 'United States Minor Outlying Islands', 0),
	(228, 'UY', 'Uruguay', 0),
	(229, 'UZ', 'Uzbekistan', 0),
	(230, 'VU', 'Vanuatu', 0),
	(231, 'VE', 'Venezuela', 0),
	(232, 'VN', 'Viet Nam', 0),
	(233, 'VG', 'Virgin Islands, British', 0),
	(234, 'VI', 'Virgin Islands, U.s.', 0),
	(235, 'WF', 'Wallis and Futuna', 0),
	(236, 'EH', 'Western Sahara', 0),
	(237, 'YE', 'Yemen', 0),
	(238, 'ZM', 'Zambia', 0),
	(239, 'ZW', 'Zimbabwe', 0),
	(240, 'RS', 'Serbia', 0),
	(241, 'EU', 'Europe Zone', 0),
	(242, 'JE', 'Jersey', 0),
	(243, 'TP', 'East Timor', 0),
	(244, 'AX', 'Aland Islands', 0),
	(245, 'GG', 'Guernsey', 0),
	(246, 'IM', 'Isle of Man', 0),
	(247, 'BL', 'Saint Barthelemy', 0),
	(248, 'MF', 'Saint Martin (French part)', 0),
	(249, 'USAF', 'US Armed Forces', 0),
	(250, 'XO', 'West African CFA Franc', 0),
	(252, 'XO', 'West Africa', 0);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
ALTER TABLE `users`
ADD `region` VARCHAR(11);
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
