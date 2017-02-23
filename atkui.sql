/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MariaDB
 Source Server Version : 100118
 Source Host           : localhost
 Source Database       : atkui

 Target Server Type    : MariaDB
 Target Server Version : 100118
 File Encoding         : utf-8

 Date: 02/23/2017 21:57:15 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `contact`
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `qsp_detail`
-- ----------------------------
DROP TABLE IF EXISTS `qsp_detail`;
CREATE TABLE `qsp_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `qsp_master_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `tax_percentage` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `qsp_master`
-- ----------------------------
DROP TABLE IF EXISTS `qsp_master`;
CREATE TABLE `qsp_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `nominal_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;
