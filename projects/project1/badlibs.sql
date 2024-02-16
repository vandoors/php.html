-- Adminer 4.8.1 MySQL 8.0.36-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `badlibs`;
CREATE TABLE `badlibs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `noun` varchar(255) DEFAULT NULL,
  `verb` varchar(255) DEFAULT NULL,
  `adjective` varchar(255) DEFAULT NULL,
  `adverb` varchar(255) DEFAULT NULL,
  `constructed_story` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `badlibs` (`id`, `noun`, `verb`, `adjective`, `adverb`, `constructed_story`) VALUES
(9,	'poet',	'sang',	'swift',	'famously',	'There once was a poet who famously sang — some say they were swift.'),
(10,	'duck',	'waddled',	'lost',	'slowly',	'There once was a duck who slowly waddled — some say they were lost.'),
(11,	'cat',	'leaped',	'fluffy',	'expertly',	'There once was a cat who expertly leaped — some say they were fluffy.'),
(12,	'rabbit',	'hopped',	'nice',	'quickly',	'There once was a rabbit who quickly hopped — some say they were nice.');

-- 2024-02-16 00:11:23
