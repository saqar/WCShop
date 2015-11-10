/*
**
** Developed by www.wowcore.com.br
**
*/

CREATE DATABASE `wcshop` DEFAULT CHARACTER SET utf8;
USE `wcshop`;

DROP TABLE IF EXISTS `account_data`;
CREATE TABLE `account_data` (
  `account_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `dp` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`account_id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;
INSERT INTO `wcshop`.`account_data` SELECT id, '0' FROM `auth`.`account`;

DROP TABLE IF EXISTS `item_category`;
CREATE TABLE `item_category` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;
INSERT INTO `item_category` (`id`, `name`) VALUES('1','Example');

DROP TABLE IF EXISTS `item_store`;
CREATE TABLE `item_store` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `category` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `price` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `category` (`category`),
  CONSTRAINT `category` FOREIGN KEY (`category`) REFERENCES `item_category` (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;
INSERT INTO `item_store` (`id`, `item`, `category`, `price`) VALUES('1','17','1','10');

DROP TABLE IF EXISTS `purchase_log`;
CREATE TABLE `purchase_log` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `account` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `item` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `price` INT(10) UNSIGNED NOT NULL DEFAULT '0',
  `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=INNODB DEFAULT CHARSET=utf8;
