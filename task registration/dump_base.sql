-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.41-log - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных city
CREATE DATABASE IF NOT EXISTS `city` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `city`;


-- Дамп структуры для таблица city.cities
CREATE TABLE IF NOT EXISTS `cities` (
  `id_city` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_country` tinyint(4) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_city`),
  KEY `FK_cities_countries` (`id_country`),
  CONSTRAINT `FK_cities_countries` FOREIGN KEY (`id_country`) REFERENCES `countries` (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы city.cities: ~10 rows (приблизительно)
DELETE FROM `cities`;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` (`id_city`, `id_country`, `city_name`) VALUES
	(1, 1, 'Kharkiv'),
	(2, 1, 'Kiev'),
	(3, 3, 'Paris'),
	(4, 2, 'Krakov'),
	(5, 2, 'Lublin'),
	(6, 4, 'London'),
	(7, 2, 'Tourin'),
	(8, 1, 'Odessa'),
	(9, 3, 'Lille'),
	(10, 3, 'Lyon');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;


-- Дамп структуры для таблица city.countries
CREATE TABLE IF NOT EXISTS `countries` (
  `id_country` tinyint(4) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы city.countries: ~4 rows (приблизительно)
DELETE FROM `countries`;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` (`id_country`, `country_name`) VALUES
	(1, 'Ukraine'),
	(2, 'Poland'),
	(3, 'France'),
	(4, 'England');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;


-- Дамп структуры для таблица city.invites
CREATE TABLE IF NOT EXISTS `invites` (
  `invite` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_status` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`invite`)
) ENGINE=InnoDB AUTO_INCREMENT=100026 DEFAULT CHARSET=utf8 MAX_ROWS=100000;

-- Дамп данных таблицы city.invites: ~14 rows (приблизительно)
DELETE FROM `invites`;
/*!40000 ALTER TABLE `invites` DISABLE KEYS */;
INSERT INTO `invites` (`invite`, `status`, `date_status`) VALUES
	(100000, 0, '2015-08-12 21:02:21'),
	(100001, 0, '2015-08-12 21:02:23'),
	(100002, 0, '2014-10-12 13:02:30'),
	(100003, 0, '2015-08-12 21:02:31'),
	(100004, 1, '2015-08-12 19:04:43'),
	(100005, 0, '2015-08-12 21:02:33'),
	(100006, 0, '2014-01-01 18:01:18'),
	(100007, 1, '2015-08-12 22:27:29'),
	(100008, 0, '2015-08-12 21:02:38'),
	(100009, 0, '2015-08-12 21:02:39'),
	(100010, 1, '2015-08-12 19:06:14'),
	(100012, 1, '2015-08-12 19:06:55'),
	(100013, 1, '2015-08-12 19:45:17'),
	(100015, 1, '2015-08-12 21:31:37');
/*!40000 ALTER TABLE `invites` ENABLE KEYS */;


-- Дамп структуры для таблица city.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` tinyint(4) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `id_city` tinyint(4) DEFAULT NULL,
  `invite` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`),
  KEY `FK_users_cities` (`id_city`),
  KEY `FK_users_invites` (`invite`),
  CONSTRAINT `FK_users_invites` FOREIGN KEY (`invite`) REFERENCES `invites` (`invite`),
  CONSTRAINT `FK_users_cities` FOREIGN KEY (`id_city`) REFERENCES `cities` (`id_city`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы city.users: ~6 rows (приблизительно)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `login`, `password`, `phone`, `id_city`, `invite`) VALUES
	(1, 'artem1', 'd8406e8445cc99a16ab984cc28f6931615c766fc', '0950539898', 5, 100004),
	(2, 'artem2', '6b05e14df7b86cefd47ec43d900a0e03e122cc6e', '380982343423', 6, 100010),
	(3, 'andrey', 'e9f3c674ec905103bead21b636c7e5b6f70f92af', '2342333223', NULL, 100012),
	(4, 'ANDREY', '909b29a84c6710434d9321287038f3ee3dadbb4b', '0983899828', 3, 100013),
	(6, 'Andrey', '909b29a84c6710434d9321287038f3ee3dadbb4b', '380929808998', 4, 100015),
	(21, 'Andrey1', '909b29a84c6710434d9321287038f3ee3dadbb4b', '0952342323', 6, 100007);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
