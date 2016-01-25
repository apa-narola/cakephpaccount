-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2016 at 11:24 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE IF NOT EXISTS `login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `duration` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `user_id`, `token`, `duration`, `used`, `created`, `expires`) VALUES
(1, 1, 'ac68d8708937e86a8a048d0bc326a63d', '2 weeks', 0, '2015-09-16 02:41:43', '2015-09-30 02:41:43'),
(2, 1, '5587f0e29926352d1ca16c40454d93f5', '2 weeks', 0, '2015-09-16 02:41:51', '2015-09-30 02:41:51'),
(3, 1, '46453808117d4ec6e7cee4c1de93a3f0', '2 weeks', 0, '2015-09-16 02:42:12', '2015-09-30 02:42:12'),
(4, 1, '4f4e9a87cd837a9b3ff941448a8dca99', '2 weeks', 0, '2015-09-16 03:03:14', '2015-09-30 03:03:14'),
(5, 2, 'bb27597be9f2be656d65028d5057c528', '2 weeks', 0, '2015-09-16 03:08:25', '2015-09-30 03:08:25'),
(6, 1, 'd0b0d57ad2da22b9f3fa088254bf35a3', '2 weeks', 0, '2015-09-16 03:08:38', '2015-09-30 03:08:38'),
(7, 2, '1e91d7087623acdd9a52ab71e8295348', '2 weeks', 0, '2015-09-16 03:14:10', '2015-09-30 03:14:10'),
(8, 1, 'db674b61471cd85a5b775dfaecddcbb9', '2 weeks', 0, '2015-09-16 03:14:52', '2015-09-30 03:14:52'),
(9, 2, '89c8d8237b86e891802b50979a17314d', '2 weeks', 0, '2015-09-16 03:15:28', '2015-09-30 03:15:28'),
(10, 1, '466245ff81c0b709caebaae367416a66', '2 weeks', 1, '2015-09-16 03:37:26', '2015-09-30 03:37:26'),
(11, 1, '7bae6518722f4a6e73c2ce525c7c90ce', '2 weeks', 0, '2015-09-16 07:22:29', '2015-09-30 07:22:29'),
(12, 2, '3f657d847c7dfb27bb5ec6eae357620e', '2 weeks', 0, '2015-09-16 09:46:50', '2015-09-30 09:46:50'),
(13, 1, '1426219a7a8209820d8c7a103e5f7605', '2 weeks', 0, '2015-09-16 10:04:19', '2015-09-30 10:04:19'),
(14, 2, 'a25970eca51617535f261dfa175509c9', '2 weeks', 0, '2015-09-16 10:05:28', '2015-09-30 10:05:28'),
(15, 1, '68f9b2a1a1fbed3065be268dfa8cfc4c', '2 weeks', 0, '2015-09-17 06:46:41', '2015-10-01 06:46:41'),
(16, 1, 'b97784ff4943ca097cb25d05b042ef54', '2 weeks', 0, '2015-09-17 06:48:12', '2015-10-01 06:48:12'),
(17, 1, '82c76d0236b15a70631342e6a90c3475', '2 weeks', 0, '2015-09-17 07:02:41', '2015-10-01 07:02:41'),
(18, 2, '79d37562ad077445c6b89bcbdcaffeea', '2 weeks', 0, '2015-09-17 07:35:37', '2015-10-01 07:35:37'),
(19, 1, '2400988f1d221cb9c1351961b7f4bc70', '2 weeks', 0, '2015-09-17 07:39:39', '2015-10-01 07:39:39'),
(20, 1, '7eb92167af51f39496f72d78befcf256', '2 weeks', 0, '2015-09-17 07:39:51', '2015-10-01 07:39:51'),
(21, 1, '0ad4a77a290c289f874626a3c548ac8c', '2 weeks', 0, '2015-09-17 07:40:01', '2015-10-01 07:40:01'),
(22, 1, '4e80ffe1e088341c16b7d50a55bc4031', '2 weeks', 0, '2015-09-17 07:40:11', '2015-10-01 07:40:11'),
(23, 1, '5e944db7213aa2894d5bd16d28ca328f', '2 weeks', 0, '2015-09-17 08:18:03', '2015-10-01 08:18:03'),
(24, 2, 'a1e40544a67b25fe8a16cf9d08d88abf', '2 weeks', 1, '2015-09-17 08:27:17', '2015-10-01 08:27:17'),
(25, 2, 'de14230e9d0bd9f7f6076a92dcd63d06', '2 weeks', 0, '2015-09-18 03:09:38', '2015-10-02 03:09:38'),
(26, 2, 'c0dd9ea6dae2bf8d1ee12268ecb0ca10', '2 weeks', 0, '2015-09-18 03:09:58', '2015-10-02 03:09:58'),
(27, 1, '922d0e8faf54d75d0468a043a506f749', '2 weeks', 0, '2015-09-18 03:20:33', '2015-10-02 03:20:33'),
(28, 2, '2b8d47cc21a6ece220c2e7a6b607c9dd', '2 weeks', 1, '2015-09-18 03:20:53', '2015-10-02 03:20:53'),
(29, 2, '1b9a08fb40fc5226ad4016634b1e6079', '2 weeks', 1, '2015-09-18 09:09:59', '2015-10-02 09:09:59'),
(30, 2, '2bdf522fd9cec06fd8492cde247f995a', '2 weeks', 0, '2015-09-19 03:13:09', '2015-10-03 03:13:09'),
(31, 2, 'f5331c8cbd7b8eea504406487943b824', '2 weeks', 0, '2015-09-19 03:16:21', '2015-10-03 03:16:21'),
(32, 2, 'ce5a7beaddb018a46959202139f4710d', '2 weeks', 1, '2015-10-05 06:30:40', '2015-10-19 06:30:40'),
(33, 2, '3d772d6ffed69853092348d68f89b3f8', '2 weeks', 1, '2015-10-12 07:12:11', '2015-10-26 07:12:11'),
(34, 2, '2ab938ae0d634a69cefd50de94bad1fa', '2 weeks', 1, '2015-10-17 04:23:06', '2015-10-31 04:23:06'),
(35, 2, '527273d24849ba241a52df221ec3bcc7', '2 weeks', 0, '2015-10-19 08:12:20', '2015-11-02 08:12:20'),
(36, 2, '9f902495fb890b67a5035af8c698e3ba', '2 weeks', 0, '2015-10-19 09:13:55', '2015-11-02 09:13:55'),
(37, 1, 'dadce652725776e64a0bc03baafb1a44', '2 weeks', 0, '2015-10-19 09:14:19', '2015-11-02 09:14:19'),
(38, 2, '2e9a9b1b29136ca4350899016b97bbd8', '2 weeks', 0, '2015-10-19 09:15:07', '2015-11-02 09:15:07'),
(39, 1, '9672647bcd45f496028abbf7e616076a', '2 weeks', 0, '2015-10-19 09:22:06', '2015-11-02 09:22:06'),
(40, 2, '1ef43cc97d126393e9a618cd36a08b21', '2 weeks', 0, '2015-10-26 07:31:54', '2015-11-09 07:31:54'),
(41, 1, 'd2076d500b5f5a9a81228a5b51dea0d2', '2 weeks', 0, '2015-10-27 06:06:18', '2015-11-10 06:06:18'),
(42, 2, '5d1883eaadd9fe5620c1b298f9ecaa2d', '2 weeks', 1, '2015-10-27 07:15:00', '2015-11-10 07:15:00'),
(43, 2, '6fa648f3a4a97b3229cf5f0290ba5e2f', '2 weeks', 0, '2015-11-03 07:28:21', '2015-11-17 07:28:21'),
(44, 2, 'cd9c12030860415a71541a31a9a1c79f', '2 weeks', 0, '2015-11-03 07:28:21', '2015-11-17 07:28:21'),
(45, 1, '9ec0985c5c4ab34a0829fdf50522a31d', '2 weeks', 0, '2015-11-03 07:29:01', '2015-11-17 07:29:01'),
(46, 2, 'b82ad56bfe71baef7f606081b824a581', '2 weeks', 0, '2015-11-03 07:29:37', '2015-11-17 07:29:37'),
(47, 2, '55cbc4214f64bda69004aef7750c7457', '2 weeks', 0, '2015-11-03 07:31:49', '2015-11-17 07:31:49'),
(48, 1, 'c218e1ab02c834c3007070ac1c4a0e88', '2 weeks', 0, '2015-11-03 07:32:11', '2015-11-17 07:32:11'),
(49, 2, '6c4b14532917bb8d1a086cb5025d2d00', '2 weeks', 0, '2015-11-03 07:32:32', '2015-11-17 07:32:32'),
(50, 1, '0e5a4ccfbb1886a568c16bda0b0f8f6d', '2 weeks', 0, '2015-11-03 07:33:36', '2015-11-17 07:33:36'),
(51, 2, 'a132dbe7e32aa59f23f66a953699716b', '2 weeks', 0, '2015-12-21 07:39:59', '2016-01-04 07:39:59'),
(52, 1, '3d601ac149fdd8f75ba12ce9c2fd4af9', '2 weeks', 0, '2015-12-21 08:26:36', '2016-01-04 08:26:36'),
(53, 2, '859b637be9e6206a65f15dd51f8402b7', '2 weeks', 1, '2015-12-21 08:48:59', '2016-01-04 08:48:59'),
(54, 2, '5c6707e61324fbf3c166711a3c87370f', '2 weeks', 0, '2015-12-23 06:13:48', '2016-01-06 06:13:48'),
(55, 1, '7c609ca3898bcec5a32da9749c6bdab1', '2 weeks', 0, '2015-12-23 07:11:40', '2016-01-06 07:11:40'),
(56, 2, 'd2ed14a0c0173d2e1adf47e5ee9d1993', '2 weeks', 0, '2015-12-23 07:12:11', '2016-01-06 07:12:11'),
(57, 1, 'be3885b1dc3f8da20afc9df5879ff411', '2 weeks', 0, '2015-12-23 08:26:41', '2016-01-06 08:26:41'),
(58, 3, '7ba163e0c5491c06cab01b8113e4a1a3', '2 weeks', 0, '2015-12-23 08:27:51', '2016-01-06 08:27:51'),
(59, 2, 'a69f82e2bdb1b98618dbdf3c03c4e6b1', '2 weeks', 0, '2015-12-23 08:46:28', '2016-01-06 08:46:28'),
(60, 2, '4f73d88957f487c3b7926930983c42f5', '2 weeks', 0, '2015-12-28 07:48:59', '2016-01-11 07:48:59'),
(61, 2, '1c79452b6ae3a9c6cf555ae1ca561370', '2 weeks', 1, '2015-12-29 06:59:23', '2016-01-12 06:59:23'),
(62, 2, '46deca57d98b3dace684eb44799cd975', '2 weeks', 0, '2015-12-30 04:56:07', '2016-01-13 04:56:07'),
(63, 2, 'e2574699c0ee390ee63a67dc8181f20c', '2 weeks', 0, '2015-12-30 07:08:08', '2016-01-13 07:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `transaction_type` enum('Receipt','Payment') DEFAULT NULL,
  `is_interest` tinyint(1) NOT NULL DEFAULT '0',
  `remarks` text NOT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `transaction_type`, `is_interest`, `remarks`, `transaction_date`, `created`, `modified`) VALUES
(1, 2, 4.00, 'Receipt', 0, 'this is remark', '2015-09-20 10:30:00', '2015-09-15 11:03:40', '2015-09-17 09:23:41'),
(2, 3, 10000.00, 'Receipt', 0, '', '2015-10-21 00:00:00', '2015-09-15 13:45:42', '2015-10-12 07:37:56'),
(4, 2, 100000.00, 'Payment', 0, 'This is remarks', '2015-09-10 09:30:00', '2015-09-15 15:23:11', '2015-09-17 09:23:29'),
(5, 3, 500.00, 'Receipt', 1, 'received interest from vikas', NULL, '2015-09-15 15:27:25', '2015-09-15 15:27:25'),
(6, 2, 6500.00, 'Payment', 1, 'given interesnt', '2015-09-09 09:30:00', '2015-09-15 15:31:51', '2015-09-17 09:23:18'),
(7, 4, 2300.00, 'Receipt', 1, 'interest received from akshar', NULL, '2015-09-15 15:41:26', '2015-09-17 08:40:01'),
(8, 2, 50.00, 'Receipt', 0, '', NULL, '2015-09-16 04:05:21', '2015-09-17 08:30:31'),
(9, 3, 2500.00, 'Receipt', 1, 'received', '2015-10-14 00:00:00', '2015-09-17 07:18:01', '2015-10-26 09:11:31'),
(10, 3, 2500.00, 'Receipt', 1, 'given interest', '2015-09-25 00:00:00', '2015-09-17 08:42:47', '2015-10-26 08:35:42'),
(11, 2, 232.00, 'Receipt', 1, 'sdf', '2015-10-21 00:00:00', '2015-10-05 07:46:15', '2015-10-12 07:49:27'),
(12, 2, 232.00, 'Receipt', 0, '', '2015-09-17 00:00:00', '2015-10-05 07:47:48', '2015-10-26 09:12:10'),
(13, 2, 23.00, 'Receipt', 0, '', '2015-10-27 00:00:00', '2015-10-05 09:25:56', '2015-10-26 09:17:15'),
(14, 2, 111.00, 'Receipt', 1, 'received interest', '2015-06-10 00:00:00', '2015-10-05 09:27:30', '2015-12-30 06:43:47'),
(15, 2, 200.00, 'Receipt', 0, '', '2015-10-31 00:00:00', '2015-10-12 08:28:04', '2015-10-12 08:28:04'),
(16, 3, 255.00, 'Receipt', 0, 'this is remark', '2015-10-27 00:00:00', '2015-10-27 07:48:44', '2015-10-27 09:22:16'),
(17, 5, 12000.00, 'Payment', 0, 'given to sanjay', '2015-12-30 00:00:00', '2015-12-30 07:37:12', '2015-12-30 07:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) unsigned DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` text,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email_verified` int(1) DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`username`),
  KEY `mail` (`email`),
  KEY `users_FKIndex1` (`user_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `username`, `password`, `salt`, `email`, `first_name`, `last_name`, `email_verified`, `active`, `ip_address`, `created`, `modified`) VALUES
(1, 1, 'admin', '365caef7fccbdb1ee711f084be9317a7', '1e6d99570a4d37cc29b18c4a6b06e6ed', 'admin@admin.com', 'Admin First Name', 'Admin Last Name', 1, 1, '', '2015-09-16 12:08:00', '2015-09-17 08:02:14'),
(2, 4, 'ashish', '67f268b37978a97ee43fc6d311f3fb06', '582a1dff56a6ce4fce8d3b8ebc9ba7ba', 'narola.ashish@gmail.com', 'Ashish', 'Narola', 1, 1, NULL, '2015-09-16 03:07:46', '2015-09-16 09:53:11'),
(3, 2, 'dipak', '570051138677c5510d454effbe4e4ab3', 'dc7d61f907a7e056ea88a6fc36509328', 'dipak.narola@gmail.com', 'Dipak', 'Narola', 1, 1, NULL, '2015-09-16 04:01:06', '2015-12-23 08:27:15'),
(4, 2, 'vikram', 'fa4ba85310c2e6c7c9935f3c7f5457fc', 'e46b31d67ca72876688146491c06cb96', 'viks.patel@gmail.com', 'vikram', 'patel', 1, 1, NULL, '2015-09-16 09:54:24', '2015-09-16 10:10:07'),
(5, 2, 'sanjay', '5404a7718e99d35072e095e6be8b3491', '823ed269847e314d7cfd80aa782ea8c9', 'sanjayn@gmail.com', 'Sanjay', 'Narola', 1, 1, NULL, '2015-09-19 03:23:50', '2015-09-19 03:24:22'),
(6, 2, 'ashok', '4b21b58089fdbdcb49f9c8d87e86ee78', '27ab292a5314abe40115c253a0dc49af', 'ashok.narola@gmail.com', 'Ashok', 'Narola', 1, 1, NULL, '2015-10-27 09:26:01', '2015-10-27 09:26:01'),
(7, NULL, 'ashishn', '7942bf4303fbd587b202b3dc7b5bec14', 'cc1d6cbdc3fe570f363c0ebb5b630fdc', NULL, 'narolan', 'damnagarn', 1, 1, NULL, '2015-12-23 08:12:10', '2015-12-23 08:12:10'),
(8, 2, 'abcd', '91a74cf5e53f40dcc7078e7f47469d4b', '7c23ccdb75739dd656a0f9fa131d307a', NULL, 'efghi', 'jklmn', 1, 1, NULL, '2015-12-23 08:14:13', '2015-12-23 08:14:13'),
(9, 2, 'abcde', '4fb0e6d7d38cfff9f49c1bec6d7fdb2a', 'b3e1f9662ac9e289a6d20dea8310d360', NULL, 'test', 'df', 1, 1, NULL, '2015-12-23 08:17:13', '2015-12-23 08:17:13'),
(10, 2, 'abcdef', '8e937f83f0b22125ec8b9ed14c300887', '1861410aae718ba29e058472d3f71b25', NULL, 'aa', 'test', 1, 1, NULL, '2015-12-23 08:18:21', '2015-12-23 08:18:21'),
(11, 2, 'nayan', 'b60ae52d4a13af957e423e75ba2ea24b', 'a58e56c34832d0085b9fd4e7c3d53f3d', NULL, 'Nayan', 'Jobanputra', 1, 1, NULL, '2015-12-23 08:19:24', '2015-12-23 08:19:24'),
(12, 2, 'nayan1', 'fea2d7228068a52acb82dfa6f732716c', 'a377869a63c6dd790fc8dc2a440489c7', NULL, 'Nayan', 'Jobanputra', 1, 1, NULL, '2015-12-23 08:19:48', '2015-12-23 08:19:48'),
(13, 2, 'nayan2', 'c7bab90985405926a091312693f8f8f9', '450202dc6915361e0533022185996b1c', NULL, 'abc', 'test', 1, 1, NULL, '2015-12-23 08:22:36', '2015-12-23 08:22:36'),
(14, 2, 'nayan3', '3e2fdeb11014d769be659670cc357849', 'dc589f2a59bbd18f49a5348dbc9c1fc0', NULL, 'abc', 'test', 1, 1, NULL, '2015-12-23 08:23:16', '2015-12-23 08:23:16');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `allowRegistration` int(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `alias_name`, `allowRegistration`, `created`, `modified`) VALUES
(1, 'Admin', 'Admin', 0, '2015-09-16 12:08:00', '2015-09-16 12:08:00'),
(2, 'User', 'User', 1, '2015-09-16 12:08:00', '2015-09-16 12:08:00'),
(3, 'Guest', 'Guest', 0, '2015-09-16 12:08:00', '2015-09-16 12:08:00'),
(4, 'Money Lender', 'Money_Lender', 0, '2015-09-16 02:45:20', '2015-09-16 02:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `user_group_permissions`
--

CREATE TABLE IF NOT EXISTS `user_group_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `allowed` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=145 ;

--
-- Dumping data for table `user_group_permissions`
--

INSERT INTO `user_group_permissions` (`id`, `user_group_id`, `controller`, `action`, `allowed`) VALUES
(1, 1, 'Pages', 'display', 1),
(2, 2, 'Pages', 'display', 1),
(3, 3, 'Pages', 'display', 1),
(4, 1, 'UserGroupPermissions', 'index', 1),
(5, 2, 'UserGroupPermissions', 'index', 0),
(6, 3, 'UserGroupPermissions', 'index', 0),
(7, 1, 'UserGroupPermissions', 'update', 1),
(8, 2, 'UserGroupPermissions', 'update', 0),
(9, 3, 'UserGroupPermissions', 'update', 0),
(10, 1, 'UserGroups', 'index', 1),
(11, 2, 'UserGroups', 'index', 0),
(12, 3, 'UserGroups', 'index', 0),
(13, 1, 'UserGroups', 'addGroup', 1),
(14, 2, 'UserGroups', 'addGroup', 0),
(15, 3, 'UserGroups', 'addGroup', 0),
(16, 1, 'UserGroups', 'editGroup', 1),
(17, 2, 'UserGroups', 'editGroup', 0),
(18, 3, 'UserGroups', 'editGroup', 0),
(19, 1, 'UserGroups', 'deleteGroup', 1),
(20, 2, 'UserGroups', 'deleteGroup', 0),
(21, 3, 'UserGroups', 'deleteGroup', 0),
(22, 1, 'Users', 'index', 1),
(23, 2, 'Users', 'index', 0),
(24, 3, 'Users', 'index', 0),
(25, 1, 'Users', 'viewUser', 1),
(26, 2, 'Users', 'viewUser', 0),
(27, 3, 'Users', 'viewUser', 0),
(28, 1, 'Users', 'myprofile', 1),
(29, 2, 'Users', 'myprofile', 1),
(30, 3, 'Users', 'myprofile', 0),
(31, 1, 'Users', 'login', 1),
(32, 2, 'Users', 'login', 1),
(33, 3, 'Users', 'login', 1),
(34, 1, 'Users', 'logout', 1),
(35, 2, 'Users', 'logout', 1),
(36, 3, 'Users', 'logout', 1),
(37, 1, 'Users', 'register', 1),
(38, 2, 'Users', 'register', 1),
(39, 3, 'Users', 'register', 1),
(40, 1, 'Users', 'changePassword', 1),
(41, 2, 'Users', 'changePassword', 1),
(42, 3, 'Users', 'changePassword', 0),
(43, 1, 'Users', 'changeUserPassword', 1),
(44, 2, 'Users', 'changeUserPassword', 0),
(45, 3, 'Users', 'changeUserPassword', 0),
(46, 1, 'Users', 'addUser', 1),
(47, 2, 'Users', 'addUser', 0),
(48, 3, 'Users', 'addUser', 0),
(49, 1, 'Users', 'editUser', 1),
(50, 2, 'Users', 'editUser', 0),
(51, 3, 'Users', 'editUser', 0),
(52, 1, 'Users', 'dashboard', 1),
(53, 2, 'Users', 'dashboard', 1),
(54, 3, 'Users', 'dashboard', 0),
(55, 1, 'Users', 'deleteUser', 1),
(56, 2, 'Users', 'deleteUser', 0),
(57, 3, 'Users', 'deleteUser', 0),
(58, 1, 'Users', 'makeActive', 1),
(59, 2, 'Users', 'makeActive', 0),
(60, 3, 'Users', 'makeActive', 0),
(61, 1, 'Users', 'accessDenied', 1),
(62, 2, 'Users', 'accessDenied', 1),
(63, 3, 'Users', 'accessDenied', 1),
(64, 1, 'Users', 'userVerification', 1),
(65, 2, 'Users', 'userVerification', 1),
(66, 3, 'Users', 'userVerification', 1),
(67, 1, 'Users', 'forgotPassword', 1),
(68, 2, 'Users', 'forgotPassword', 1),
(69, 3, 'Users', 'forgotPassword', 1),
(70, 1, 'Users', 'makeActiveInactive', 1),
(71, 2, 'Users', 'makeActiveInactive', 0),
(72, 3, 'Users', 'makeActiveInactive', 0),
(73, 1, 'Users', 'verifyEmail', 1),
(74, 2, 'Users', 'verifyEmail', 0),
(75, 3, 'Users', 'verifyEmail', 0),
(76, 1, 'Users', 'activatePassword', 1),
(77, 2, 'Users', 'activatePassword', 1),
(78, 3, 'Users', 'activatePassword', 1),
(79, 4, 'Users', 'index', 1),
(80, 4, 'Users', 'viewUser', 1),
(81, 4, 'Users', 'myprofile', 1),
(82, 4, 'Users', 'login', 1),
(83, 4, 'Users', 'logout', 1),
(84, 4, 'Users', 'register', 1),
(85, 4, 'Users', 'changePassword', 1),
(86, 4, 'Users', 'changeUserPassword', 1),
(87, 4, 'Users', 'addUser', 1),
(88, 4, 'Users', 'editUser', 1),
(89, 4, 'Users', 'deleteUser', 1),
(90, 4, 'Users', 'dashboard', 1),
(91, 4, 'Users', 'makeActiveInactive', 0),
(92, 4, 'Users', 'verifyEmail', 0),
(93, 4, 'Users', 'accessDenied', 1),
(94, 4, 'Users', 'activatePassword', 1),
(95, 4, 'Users', 'forgotPassword', 1),
(96, 1, 'Transactions', 'delete', 0),
(97, 2, 'Transactions', 'delete', 0),
(98, 3, 'Transactions', 'delete', 0),
(99, 4, 'Transactions', 'delete', 1),
(100, 1, 'Transactions', 'edit', 0),
(101, 2, 'Transactions', 'edit', 0),
(102, 3, 'Transactions', 'edit', 0),
(103, 4, 'Transactions', 'edit', 1),
(104, 1, 'Transactions', 'add', 0),
(105, 2, 'Transactions', 'add', 0),
(106, 3, 'Transactions', 'add', 0),
(107, 4, 'Transactions', 'add', 1),
(108, 1, 'Transactions', 'view', 0),
(109, 2, 'Transactions', 'view', 0),
(110, 3, 'Transactions', 'view', 0),
(111, 4, 'Transactions', 'view', 1),
(112, 1, 'Transactions', 'index', 0),
(113, 2, 'Transactions', 'index', 0),
(114, 3, 'Transactions', 'index', 0),
(115, 4, 'Transactions', 'index', 1),
(116, 1, 'Transactions', 'userTransactions', 1),
(117, 2, 'Transactions', 'userTransactions', 0),
(118, 3, 'Transactions', 'userTransactions', 0),
(119, 4, 'Transactions', 'userTransactions', 1),
(120, 1, 'Pages', 'ledger', 1),
(121, 2, 'Pages', 'ledger', 1),
(122, 3, 'Pages', 'ledger', 1),
(123, 4, 'Pages', 'ledger', 1),
(124, 1, 'Pages', 'searchUser', 1),
(125, 2, 'Pages', 'searchUser', 1),
(126, 3, 'Pages', 'searchUser', 1),
(127, 4, 'Pages', 'searchUser', 1),
(128, 4, 'Pages', 'display', 1),
(129, 1, 'Pages', 'typeaheadSearch', 1),
(130, 2, 'Pages', 'typeaheadSearch', 1),
(131, 3, 'Pages', 'typeaheadSearch', 1),
(132, 4, 'Pages', 'typeaheadSearch', 1),
(133, 1, 'Transactions', 'transactionsPDF', 1),
(134, 2, 'Transactions', 'transactionsPDF', 0),
(135, 3, 'Transactions', 'transactionsPDF', 0),
(136, 4, 'Transactions', 'transactionsPDF', 0),
(137, 1, 'Transactions', 'addNewParty', 0),
(138, 2, 'Transactions', 'addNewParty', 1),
(139, 3, 'Transactions', 'addNewParty', 0),
(140, 4, 'Transactions', 'addNewParty', 1),
(141, 1, 'Ajax', 'addNewParty', 1),
(142, 2, 'Ajax', 'addNewParty', 1),
(143, 3, 'Ajax', 'addNewParty', 0),
(144, 4, 'Ajax', 'addNewParty', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
