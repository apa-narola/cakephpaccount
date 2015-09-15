-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2015 at 03:49 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `transaction_type`, `is_interest`, `remarks`, `transaction_date`, `created`, `modified`) VALUES
(1, 1, 4.00, 'Receipt', 0, 'this is remark', '2015-09-15 11:03:00', '2015-09-15 11:03:40', '2015-09-15 11:03:40'),
(2, 1, 10000.00, 'Receipt', 0, '', '0000-00-00 00:00:00', '2015-09-15 13:45:42', '2015-09-15 13:45:42'),
(3, 2, 5000.00, 'Payment', 0, 'Paid 5000 rs. to akshar', '0000-00-00 00:00:00', '2015-09-15 14:54:28', '2015-09-15 14:54:28'),
(4, 4, 100000.00, 'Payment', 0, 'This is remarks', '0000-00-00 00:00:00', '2015-09-15 15:23:11', '2015-09-15 15:23:11'),
(5, 3, 500.00, 'Receipt', 1, 'received interest from vikas', '0000-00-00 00:00:00', '2015-09-15 15:27:25', '2015-09-15 15:27:25'),
(6, 1, 6500.00, 'Payment', 1, 'given interesnt', '0000-00-00 00:00:00', '2015-09-15 15:31:51', '2015-09-15 15:31:51'),
(7, 1, 2300.00, 'Receipt', 1, 'interest received from ashish', '0000-00-00 00:00:00', '2015-09-15 15:41:26', '2015-09-15 15:41:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`) VALUES
(1, 'Ashish', 'Narola', NULL),
(2, 'Akshar', 'Narola', NULL),
(3, 'Vikas', 'Narola', NULL),
(4, 'Shailesh', 'Narola', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
