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
  `user_id` int(20) unsigned DEFAULT NULL,
  `ip_address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `ideas`
--


CREATE TABLE `ideas` (
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'idea name',
  `desc` varchar(240) COLLATE utf8_unicode_ci NOT NULL COMMENT 'the grab',
  `type` enum('social','tech','scientific','other') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'other' COMMENT 'type of biz',
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `problem` varchar(240) COLLATE utf8_unicode_ci DEFAULT NULL,
  `solution` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `market` varchar(480) COLLATE utf8_unicode_ci NOT NULL,
  `competition` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `model` enum('notforprofit','nonprofit','enterpriseb2b','b2c','subscription','freemium','retail','ecommerce','community','advocacy','other') COLLATE utf8_unicode_ci NOT NULL COMMENT 'biz model',
  `promise` varchar(240) COLLATE utf8_unicode_ci NOT NULL,
  `submitted` tinyint(1) NOT NULL DEFAULT '0',
  `date_created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_modified` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `up_votes` int(10) unsigned NOT NULL DEFAULT '0',
  `total_votes` int(11) unsigned NOT NULL DEFAULT '0',
  `down_votes` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `tier_level` tinyint(3) unsigned DEFAULT NULL COMMENT 'can be 0,1,2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `settings`
  ADD COLUMN `Accelerator.tier_2_votes` BIGINT UNSIGNED NOT NULL AFTER `created`,
  ADD COLUMN `Accelerator.tier_3_votes` BIGINT UNSIGNED NOT NULL AFTER `Accelerator.tier_2_votes`;

INSERT IGNORE INTO `settings` (`id`, `key`, `value`, `title`, `description`, `input_type`, `editable`, `weight`, `params`) VALUES
(NULL, 'Accelerator.tier_2_votes', 20, 'Tier 2 Total Vote Requirements', 'Required amount of votes to reach tier 2', '', 1, 1, ''),
(NULL, 'Accelerator.tier_3_votes', 20, 'Tier 3 Total Vote Requirements', 'Required amount of votes to reach tier 3', '', 1, 1, '');

INSERT INTO `acos` (`parent_id`, `alias`, `lft`, `rght`) VALUES ('171', 'email_list', '410', '411');

-- ALTER TABLE IF EXISTS `users` 
-- ADD COLUMN `facebook_id` BIGINT UNSIGNED NOT NULL AFTER `created`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
