-- Adminer 4.8.1 MySQL 8.0.36-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `exercise_log`;
CREATE TABLE `exercise_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` date NOT NULL,
  `exercise_type` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `time_in_minutes` smallint NOT NULL,
  `heartrate` smallint NOT NULL,
  `calories` smallint NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `exercise_log_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `exercise_user` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `exercise_log` (`id`, `user_id`, `date`, `exercise_type`, `time_in_minutes`, `heartrate`, `calories`) VALUES
(9,	6,	'2024-04-10',	'Walking',	15,	141,	135),
(10,	7,	'2020-02-05',	'Yoga',	90,	155,	1080);

DROP TABLE IF EXISTS `exercise_user`;
CREATE TABLE `exercise_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(24) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sh_password` varbinary(256) NOT NULL,
  `first_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `birthdate` date NOT NULL,
  `gender` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `weight` smallint NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `exercise_user` (`id`, `username`, `sh_password`, `first_name`, `last_name`, `birthdate`, `gender`, `weight`) VALUES
(6,	'taylorswift13',	UNHEX('24327924313024564E347A51725A4A7846332E4F37774176677333767534554B564D6469635750465048366A4B625650542E31494736545152512F47'),	'T',	'Swizzle',	'1989-12-13',	'F',	129),
(7,	'student',	UNHEX('243279243130242E332F4F6E4949693358522F7A6C6E38536F30396D754F385A516B3543566B696257785159585970566C775154432E6144626F424B'),	'student',	'student',	'2000-01-01',	'N',	100);

-- 2024-04-11 01:53:19
