-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2016 at 02:26 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset_categories`
--

CREATE TABLE IF NOT EXISTS `asset_categories` (
  `asset_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_class` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`asset_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `asset_categories`
--

INSERT INTO `asset_categories` (`asset_category_id`, `asset_class`, `description`) VALUES
(1, 'Class A', 'Vehicles'),
(2, 'Class B', 'Computer equipment'),
(3, 'Class C', 'Furniture'),
(4, 'Class D', 'IT Hardware'),
(5, 'Class E', 'Land'),
(6, 'Class E2', 'Office');

-- --------------------------------------------------------

--
-- Table structure for table `asset_conditions`
--

CREATE TABLE IF NOT EXISTS `asset_conditions` (
  `condition_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`condition_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `asset_conditions`
--

INSERT INTO `asset_conditions` (`condition_id`, `description`) VALUES
(1, 'Poor'),
(2, 'Fair'),
(3, 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `asset_manufacturers`
--

CREATE TABLE IF NOT EXISTS `asset_manufacturers` (
  `manufacturer_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`manufacturer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `asset_service_periods`
--

CREATE TABLE IF NOT EXISTS `asset_service_periods` (
  `asset_service_period_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`asset_service_period_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `asset_service_periods`
--

INSERT INTO `asset_service_periods` (`asset_service_period_id`, `description`) VALUES
(1, 'Annually'),
(2, 'Quarterly'),
(3, 'Monthly');

-- --------------------------------------------------------

--
-- Table structure for table `asset_status`
--

CREATE TABLE IF NOT EXISTS `asset_status` (
  `asset_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`asset_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `asset_status`
--

INSERT INTO `asset_status` (`asset_status_id`, `description`) VALUES
(1, 'Active'),
(2, 'Inactive'),
(3, 'Proposed');

-- --------------------------------------------------------

--
-- Table structure for table `asset_types`
--

CREATE TABLE IF NOT EXISTS `asset_types` (
  `asset_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_category_id` int(11) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`asset_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `asset_types`
--

INSERT INTO `asset_types` (`asset_type_id`, `asset_category_id`, `description`) VALUES
(1, 1, 'Asset Type A1'),
(2, 1, 'Asset Type A2'),
(3, 2, 'Asset Type B1'),
(4, 2, 'Asset Type B1');

-- --------------------------------------------------------

--
-- Table structure for table `asset_units`
--

CREATE TABLE IF NOT EXISTS `asset_units` (
  `asset_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_category_id` int(11) DEFAULT NULL,
  `asset_type_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `condition_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `assigned` enum('Y','N') NOT NULL,
  `purchase_cost` double(11,2) NOT NULL,
  `purchase_date` timestamp NOT NULL,
  `date_entered` timestamp NOT NULL,
  `placed_in_service` timestamp NOT NULL,
  `last_serviced_date` timestamp NOT NULL,
  `serviced_period` int(11) NOT NULL,
  `disposal_date` timestamp NOT NULL,
  `notes` text NOT NULL,
  `depreciation` varchar(50) NOT NULL,
  `lifespan` double(11,2) NOT NULL,
  `salvage_value` double(11,2) NOT NULL,
  `serial_no` varchar(50) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `location` text NOT NULL,
  PRIMARY KEY (`asset_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `asset_units`
--

INSERT INTO `asset_units` (`asset_id`, `asset_category_id`, `asset_type_id`, `property_id`, `condition_id`, `status_id`, `assigned`, `purchase_cost`, `purchase_date`, `date_entered`, `placed_in_service`, `last_serviced_date`, `serviced_period`, `disposal_date`, `notes`, `depreciation`, `lifespan`, `salvage_value`, `serial_no`, `manufacturer_id`, `supplier_id`, `barcode`, `location`) VALUES
(1, 1, 1, 1, 1, 2, 'Y', 100.00, '2016-01-25 13:14:45', '2016-01-25 13:14:45', '2016-01-25 13:14:45', '0000-00-00 00:00:00', 0, '2016-01-25 13:14:45', '', '', 0.00, 0.00, '', 0, 0, '', ''),
(2, 2, 3, 2, 2, 1, 'Y', 200.00, '2016-01-25 13:16:02', '2016-01-25 13:16:02', '2016-01-25 13:16:02', '2016-01-25 13:16:02', 0, '2016-01-25 13:16:02', '', '', 0.00, 0.00, '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `asset_unit_files`
--

CREATE TABLE IF NOT EXISTS `asset_unit_files` (
  `asset_unit_document_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `type` enum('Image','Document') NOT NULL COMMENT 'Image or Document',
  `size` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`asset_unit_document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `asset_unit_history`
--

CREATE TABLE IF NOT EXISTS `asset_unit_history` (
  `asset_unit_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `asset_unit_id` int(11) DEFAULT NULL,
  `property_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` text,
  PRIMARY KEY (`asset_unit_history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
