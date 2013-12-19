-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2013 at 04:00 PM
-- Server version: 5.5.28
-- PHP Version: 5.4.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `accellerator`
--

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `value` tinyint(4) NOT NULL DEFAULT '0',
  `idea_id` int(20) unsigned NOT NULL,
  `user_id` int(20) unsigned NOT NULL,
  `ip_address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `ideas`
--


CREATE TABLE IF NOT EXISTS `ideas` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'idea name',
  `desc` varchar(240) COLLATE utf8_unicode_ci NOT NULL COMMENT 'the grab',
  `type` enum('Agriculture','CommunicationsAndMedia','EducationAndTraining','Energy','Environment','FashionAndLifestyle','Health','Tourism','MobilityAndTransport','HousingAndConstruction','FinancialServices','Technology','Gastronomy','PersonalCareAndServices','Entertainment','Other') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'other' COMMENT 'type of biz',
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `problem` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `solution` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `market` varchar(480) COLLATE utf8_unicode_ci NOT NULL,
  `competition` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `model` enum('notforprofit','nonprofit','enterpriseb2b','b2c','subscription','freemium','retail','ecommerce','community','advocacy','other') COLLATE utf8_unicode_ci NOT NULL COMMENT 'biz model',
  `promise` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `submitted` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(20) NOT NULL, 
  `tier_level` TINYINT UNSIGNED NULL COMMENT 'can be 0,1,2' DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

ALTER TABLE IF EXISTS `settings` (
  ADD COLUMN `Accelerator.tier_2_votes` BIGINT UNSIGNED NOT NULL AFTER `created`,
  ADD COLUMN `Accelerator.tier_3_votes` BIGINT UNSIGNED NOT NULL AFTER `Accelerator.tier_2_votes`
);

INSERT IGNORE INTO `settings` (`id`, `key`, `value`, `title`, `description`, `input_type`, `editable`, `weight`, `params`) VALUES
(NULL, 'Accelerator.tier_2_votes', 20, 'Tier 2 Total Vote Requirements', 'Required amount of votes to reach tier 2', '', 1, 1, ''),
(NULL, 'Accelerator.tier_3_votes', 20, 'Tier 3 Total Vote Requirements', 'Required amount of votes to reach tier 3', '', 1, 1, '');

-- ALTER TABLE IF EXISTS `users` 
-- ADD COLUMN `facebook_id` BIGINT UNSIGNED NOT NULL AFTER `created`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
