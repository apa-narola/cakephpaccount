-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2015 at 03:29 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

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
(24, 2, 'a1e40544a67b25fe8a16cf9d08d88abf', '2 weeks', 0, '2015-09-17 08:27:17', '2015-10-01 08:27:17');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `transaction_type`, `is_interest`, `remarks`, `transaction_date`, `created`, `modified`) VALUES
(1, 2, 4.00, 'Receipt', 0, 'this is remark', '2015-09-20 10:30:00', '2015-09-15 11:03:40', '2015-09-17 09:23:41'),
(2, 3, 10000.00, 'Receipt', 0, '', NULL, '2015-09-15 13:45:42', '2015-09-17 08:41:49'),
(4, 2, 100000.00, 'Payment', 0, 'This is remarks', '2015-09-10 09:30:00', '2015-09-15 15:23:11', '2015-09-17 09:23:29'),
(5, 3, 500.00, 'Receipt', 1, 'received interest from vikas', NULL, '2015-09-15 15:27:25', '2015-09-15 15:27:25'),
(6, 2, 6500.00, 'Payment', 1, 'given interesnt', '2015-09-09 09:30:00', '2015-09-15 15:31:51', '2015-09-17 09:23:18'),
(7, 4, 2300.00, 'Receipt', 1, 'interest received from akshar', NULL, '2015-09-15 15:41:26', '2015-09-17 08:40:01'),
(8, 2, 50.00, 'Receipt', 0, '', NULL, '2015-09-16 04:05:21', '2015-09-17 08:30:31'),
(9, 3, 2500.00, 'Receipt', 1, 'received', NULL, '2015-09-17 07:18:01', '2015-09-17 08:41:03'),
(10, 3, 2500.00, 'Receipt', 1, 'given interest', '2015-09-17 09:09:20', '2015-09-17 08:42:47', '2015-09-17 09:09:20');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `username`, `password`, `salt`, `email`, `first_name`, `last_name`, `email_verified`, `active`, `ip_address`, `created`, `modified`) VALUES
(1, 1, 'admin', '365caef7fccbdb1ee711f084be9317a7', '1e6d99570a4d37cc29b18c4a6b06e6ed', 'admin@admin.com', 'Admin First Name', 'Admin Last Name', 1, 1, '', '2015-09-16 12:08:00', '2015-09-17 08:02:14'),
(2, 4, 'ashish', '67f268b37978a97ee43fc6d311f3fb06', '582a1dff56a6ce4fce8d3b8ebc9ba7ba', 'narola.ashish@gmail.com', 'Ashish', 'Narola', 1, 1, NULL, '2015-09-16 03:07:46', '2015-09-16 09:53:11'),
(3, 2, 'dipak', '3ce3be1a49bfa7d6bd1a0c8736c87afa', '7215186ddf6427e13f994602121f8504', 'dipak.narola@gmail.com', 'Dipak', 'Narola', 1, 0, NULL, '2015-09-16 04:01:06', '2015-09-16 04:19:39'),
(4, 2, 'vikram', 'fa4ba85310c2e6c7c9935f3c7f5457fc', 'e46b31d67ca72876688146491c06cb96', 'viks.patel@gmail.com', 'vikram', 'patel', 1, 1, NULL, '2015-09-16 09:54:24', '2015-09-16 10:10:07');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

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
(115, 4, 'Transactions', 'index', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
