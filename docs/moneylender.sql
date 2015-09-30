-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2015 at 10:24 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneylender`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE IF NOT EXISTS `login_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `duration` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_tokens`
--

INSERT INTO `login_tokens` (`id`, `user_id`, `token`, `duration`, `used`, `created`, `expires`) VALUES
(34, 2, 'd3ac285ed661f9aa7e828139bd793147', '2 weeks', 0, '2015-09-30 10:37:00', '2015-10-14 10:37:00'),
(35, 2, '39dd22814bd7ef53cf68601f8002a707', '2 weeks', 0, '2015-09-30 11:29:00', '2015-10-14 11:29:00'),
(33, 2, '8a997916d3b42857f58da8275527a295', '2 weeks', 0, '2015-09-30 10:36:05', '2015-10-14 10:36:05'),
(32, 2, 'a52aafdbbc9345f34ca0cfa7e2f7c59a', '2 weeks', 0, '2015-09-30 10:30:53', '2015-10-14 10:30:53'),
(31, 2, '71e09cb5f2e11953c1e4448991d7b10f', '2 weeks', 0, '2015-09-30 10:28:23', '2015-10-14 10:28:23'),
(30, 2, 'e211ccf7ae6b7008cc7a7da6f055c938', '2 weeks', 0, '2015-09-29 16:52:59', '2015-10-13 16:52:59'),
(27, 1, '678c724c28682003dc192f838b3523da', '2 weeks', 0, '2015-09-29 16:33:35', '2015-10-13 16:33:35');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `transaction_type` enum('Receipt','Payment') DEFAULT NULL,
  `is_interest` tinyint(1) NOT NULL DEFAULT '0',
  `remarks` text NOT NULL,
  `transaction_date` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

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
(10, 3, 2500.00, 'Receipt', 1, 'given interest', '2015-09-17 09:09:20', '2015-09-17 08:42:47', '2015-09-17 09:09:20'),
(11, 4, 12300.00, 'Payment', 0, 'given to vikram', NULL, '2015-09-30 10:47:31', '2015-09-30 10:47:31'),
(13, 2, 1200.00, 'Receipt', 1, 'remark', NULL, '2015-09-30 11:24:30', '2015-09-30 11:24:30'),
(14, 4, 100.00, 'Receipt', 1, '122', NULL, '2015-09-30 11:25:29', '2015-09-30 11:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
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
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_group_id`, `username`, `password`, `salt`, `email`, `first_name`, `last_name`, `email_verified`, `active`, `ip_address`, `created`, `modified`) VALUES
(1, 1, 'admin', 'c4f4034b0f46ac051b7205474c9fcdd4', '78cac7d15615de0fc7ce15d0f29d731e', 'narola.ashish@gmail.com', 'Ashish', 'Narola', 1, 1, '', '2015-09-16 12:08:00', '2015-09-29 16:31:51'),
(2, 4, 'dalsukhbhai', '492ad9a697c1689e967e495b711405ad', 'e74b332a32d2dc076eaf87a104f20240', 'daksukh.narola@gmail.com', 'Dalsukhbhai', 'Narola', 1, 1, NULL, '2015-09-16 03:07:46', '2015-09-29 16:52:39'),
(3, 2, 'dipak', '3ce3be1a49bfa7d6bd1a0c8736c87afa', '7215186ddf6427e13f994602121f8504', 'dipak.narola@gmail.com', 'Dipak', 'Narola', 1, 0, NULL, '2015-09-16 04:01:06', '2015-09-16 04:19:39'),
(4, 2, 'vikram', 'fa4ba85310c2e6c7c9935f3c7f5457fc', 'e46b31d67ca72876688146491c06cb96', 'viks.patel@gmail.com', 'vikram', 'patel', 1, 1, NULL, '2015-09-16 09:54:24', '2015-09-16 10:10:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `allowRegistration` int(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
  `id` int(10) unsigned NOT NULL,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `allowed` tinyint(1) unsigned NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1;

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
(116, 1, 'Transactions', 'getAllInterestTransactionCount', 0),
(117, 2, 'Transactions', 'getAllInterestTransactionCount', 0),
(118, 3, 'Transactions', 'getAllInterestTransactionCount', 0),
(119, 4, 'Transactions', 'getAllInterestTransactionCount', 1),
(120, 1, 'Transactions', 'getMainReceiptTransactionCount', 0),
(121, 2, 'Transactions', 'getMainReceiptTransactionCount', 0),
(122, 3, 'Transactions', 'getMainReceiptTransactionCount', 0),
(123, 4, 'Transactions', 'getMainReceiptTransactionCount', 1),
(124, 1, 'Transactions', 'getMainPaymentTransactionCount', 0),
(125, 2, 'Transactions', 'getMainPaymentTransactionCount', 0),
(126, 3, 'Transactions', 'getMainPaymentTransactionCount', 0),
(127, 4, 'Transactions', 'getMainPaymentTransactionCount', 1),
(128, 1, 'Transactions', 'getAllMainTransactionCount', 0),
(129, 2, 'Transactions', 'getAllMainTransactionCount', 0),
(130, 3, 'Transactions', 'getAllMainTransactionCount', 0),
(131, 4, 'Transactions', 'getAllMainTransactionCount', 1),
(132, 1, 'Transactions', 'getInterestReceiptTransactionCount', 0),
(133, 2, 'Transactions', 'getInterestReceiptTransactionCount', 0),
(134, 3, 'Transactions', 'getInterestReceiptTransactionCount', 0),
(135, 4, 'Transactions', 'getInterestReceiptTransactionCount', 1),
(136, 1, 'Transactions', 'getInterestPaymentTransactionCount', 0),
(137, 2, 'Transactions', 'getInterestPaymentTransactionCount', 0),
(138, 3, 'Transactions', 'getInterestPaymentTransactionCount', 0),
(139, 4, 'Transactions', 'getInterestPaymentTransactionCount', 1),
(140, 1, 'Transactions', 'getAllTransactionCount', 0),
(141, 2, 'Transactions', 'getAllTransactionCount', 0),
(142, 3, 'Transactions', 'getAllTransactionCount', 0),
(143, 4, 'Transactions', 'getAllTransactionCount', 1),
(144, 1, 'Transactions', 'getPaymentTransactionCount', 0),
(145, 2, 'Transactions', 'getPaymentTransactionCount', 0),
(146, 3, 'Transactions', 'getPaymentTransactionCount', 0),
(147, 4, 'Transactions', 'getPaymentTransactionCount', 1),
(148, 1, 'Transactions', 'getReceiptTransactionCount', 0),
(149, 2, 'Transactions', 'getReceiptTransactionCount', 0),
(150, 3, 'Transactions', 'getReceiptTransactionCount', 0),
(151, 4, 'Transactions', 'getReceiptTransactionCount', 1),
(152, 1, 'Transactions', 'userTransactions', 0),
(153, 2, 'Transactions', 'userTransactions', 0),
(154, 3, 'Transactions', 'userTransactions', 0),
(155, 4, 'Transactions', 'userTransactions', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`username`),
  ADD KEY `mail` (`email`),
  ADD KEY `users_FKIndex1` (`user_group_id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_group_permissions`
--
ALTER TABLE `user_group_permissions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=156;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
