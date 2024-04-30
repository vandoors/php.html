-- Adminer 4.8.1 MySQL 8.0.36-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `twitter_tweet`;
CREATE TABLE `twitter_tweet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` datetime NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `twitter_tweet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `twitter_user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `twitter_tweet` (`id`, `user_id`, `date`, `content`) VALUES
(24,	1,	'2024-04-30 13:41:30',	'hello world'),
(38,	1,	'2024-04-30 14:07:33',	'php'),
(55,	8,	'2024-04-30 14:23:52',	'new album out go listen'),
(56,	8,	'2024-04-30 14:23:56',	'i like cats'),
(57,	4,	'2024-04-30 14:25:51',	'NEW SYSTEM UPDATE');

DROP TABLE IF EXISTS `twitter_user`;
CREATE TABLE `twitter_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `sh_password` varbinary(256) NOT NULL,
  `display_name` varchar(64) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `twitter_user` (`id`, `username`, `sh_password`, `display_name`, `admin`) VALUES
(1,	'student',	UNHEX('243279243130246C336C47594233725158506E336665636477396D436543504B75347466743243547737627539454A5547574449304A735758394F6D'),	'student',	0),
(4,	'admin',	UNHEX('2432792431302470755A49614A715144722F70306B6E4E483658513275346B5369576A66424E744A355A684C3131773953466A6F65474E46754F6D75'),	'admin',	1),
(8,	'taylorswift13',	UNHEX('2432792431302456763978614A6158666C7A5048474E4D4752625443656F73493871705669706F65594366584F4E5752384E304A49596B7146647636'),	'Taylor Swift',	0);

-- 2024-04-30 21:35:32
