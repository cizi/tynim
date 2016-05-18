-- Adminer 4.2.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';

CREATE TABLE `slider_pic` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `path` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'Cesta k souboru',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


CREATE TABLE `slider_setting` (
  `id` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'ID položky (inputu)',
  `value` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'Uložená hodnota'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `email` varchar(255) NOT NULL COMMENT 'Přihlašovací jméno (email)',
  `password` char(255) NOT NULL COMMENT 'Heslo',
  `role` int(2) NOT NULL COMMENT 'Role v číselném vyjádření',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Je uživatel aktivní?',
  `register_timestamp` datetime NOT NULL COMMENT 'Kdy by uživatel registrován',
  `last_login` datetime NOT NULL COMMENT 'Poslední přihlášení',
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `web_config` (
  `id` varchar(255) COLLATE utf8_czech_ci NOT NULL COMMENT 'Identifikace položky (název inputu)',
  `lang` varchar(5) COLLATE utf8_czech_ci NOT NULL COMMENT 'Identifikace jazyka',
  `value` text COLLATE utf8_czech_ci NOT NULL COMMENT 'Uložená hodnota',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;


-- 2016-05-18 06:14:24
