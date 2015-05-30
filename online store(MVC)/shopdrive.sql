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

-- Дамп структуры базы данных shopdrive
CREATE DATABASE IF NOT EXISTS `shopdrive` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `shopdrive`;


-- Дамп структуры для таблица shopdrive.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `anons` text NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы shopdrive.news: 11 rows
DELETE FROM `news`;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `keywords`, `description`, `anons`, `text`, `date`) VALUES
	(3, 'Скоро в продаже iPhone 5', '', '', '<p>Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5</p>', '<p>Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5</p>\r\n<p>Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5 Скоро в продаже iPhone 5</p>', '2012-10-22'),
	(1, 'Поступили в продажу новые телефоны Samsung', '', '', '<p>Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung</p>', '<p>Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung</p>\r\n<p>Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung Поступили в продажу новые телефоны Samsung</p>', '2012-10-01'),
	(2, 'Подарки всем купившим iPhone 4s', '', '', '<p>Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s</p>', '<p>Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s</p>\r\n<p>Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s Подарки всем купившим iPhone 4s</p>', '2012-10-10'),
	(4, 'Новая Nokia Lumia', 'ключевики', 'описание', '<p>\r\n	Предлагаем Вашему вниманию новую модель Nokia</p>', '<p>\r\n	Предлагаем Вашему вниманию новую модель Nokia</p>\r\n<p>\r\n	Nokia Lumia!</p>', '2013-01-24'),
	(19, 'fhgsdh', '', '', '', '', '0000-00-00'),
	(10, 'asd', 'asd', 'asd', 'ad', 'ad', '0000-00-00'),
	(16, 'ываы', 'вай', 'айцу', 'йцув', 'йвйц', '0000-00-00'),
	(18, 'sdfgdgf', '', '', '', '', '0000-00-00'),
	(22, 'gfdjhfgj', '', '', '', '', '0000-00-00'),
	(23, 'afda', '', '', '', '', '0000-00-00'),
	(27, 'ыыыыыыыыы', 'ыыыыыы', '', 'ыыыыыы', 'ыыыыыы', '0000-00-00');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Дамп структуры для таблица shopdrive.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `amount` float(10,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `FK_order_user` (`user_id`),
  CONSTRAINT `FK_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы shopdrive.order: ~14 rows (приблизительно)
DELETE FROM `order`;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` (`id`, `user_id`, `date`, `amount`) VALUES
	(1, 4, '2014-10-19', 1560.00),
	(2, 8, '2014-10-13', 6521.20),
	(3, 5, '2014-10-13', 7260.22),
	(4, 3, '2014-10-15', 4240.00),
	(5, 1, '2014-10-15', 470.54),
	(6, 10, '2014-10-15', 3180.00),
	(7, 12, '2014-10-27', 1860.66),
	(8, 5, '2015-03-15', 2500.22),
	(9, 10, '2015-02-05', 670.98),
	(10, 4, '2015-02-17', 2250.72),
	(11, 5, '2015-04-15', 300.66),
	(13, 12, '2015-01-10', 1300.22),
	(14, 13, '2015-01-25', 1600.00),
	(15, 14, '2015-04-10', 1800.00);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;


-- Дамп структуры для таблица shopdrive.order_item
CREATE TABLE IF NOT EXISTS `order_item` (
  `order_id` smallint(5) unsigned NOT NULL,
  `product_id` smallint(5) unsigned NOT NULL,
  `quantity` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `Индекс 2` (`product_id`),
  CONSTRAINT `FK_order_item_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_order_item_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы shopdrive.order_item: ~30 rows (приблизительно)
DELETE FROM `order_item`;
/*!40000 ALTER TABLE `order_item` DISABLE KEYS */;
INSERT INTO `order_item` (`order_id`, `product_id`, `quantity`) VALUES
	(1, 4, 2),
	(2, 1, 3),
	(2, 2, 5),
	(2, 5, 1),
	(2, 21, 3),
	(2, 22, 2),
	(3, 1, 7),
	(3, 2, 1),
	(3, 4, 2),
	(4, 4, 3),
	(4, 21, 2),
	(4, 22, 1),
	(5, 2, 2),
	(5, 5, 1),
	(6, 1, 3),
	(6, 4, 1),
	(7, 2, 3),
	(7, 4, 2),
	(8, 1, 3),
	(8, 2, 1),
	(9, 2, 4),
	(9, 5, 1),
	(10, 1, 1),
	(10, 2, 1),
	(10, 5, 5),
	(11, 2, 3),
	(13, 2, 1),
	(13, 25, 2),
	(14, 1, 2),
	(15, 21, 4);
/*!40000 ALTER TABLE `order_item` ENABLE KEYS */;


-- Дамп структуры для таблица shopdrive.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(250) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `img` char(100) NOT NULL DEFAULT '0',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы shopdrive.product: ~10 rows (приблизительно)
DELETE FROM `product`;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `name`, `description`, `img`, `price`, `total`) VALUES
	(1, 'Casio CO', 'Donec gravida posuere arcu. Nulla facilisi. Phasel', '1.jpg', 1.00, 800),
	(2, 'Casio Simple', 'Donec gravida posuere arcu. Nulla facilisi. Phasel', '2.jpg', 100.22, 13),
	(4, 'Asus230', 'Donec gravida posuere arcu. Nulla facilisi. Phasel', '4.jpg', 780.00, 14),
	(5, 'ToshibaPr', 'projector', '5.jpg', 270.10, 10),
	(21, 'Asus T77', 'Asus T77 Pro 1', '6.jpg', 450.00, 10),
	(22, 'GeForce 460', 'GeForce 460GTX', '7.jpg', 1000.00, 5),
	(23, 'Radeon 7790', 'Card Radeon 7790', '9.jpg', 1100.00, 10),
	(24, 'Intel core i5 3470', 'Processor Intel core i5 3470', '10.jpg', 800.00, 9),
	(25, 'Authlon II X4 630', 'Processor Authlon II X4 630', '11.jpg', 600.00, 4),
	(26, 'WD Caviar Blue 500 GB', 'Hard Disk WD Caviar Blue 500GB', '12.jpg', 450.00, 10);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;


-- Дамп структуры для таблица shopdrive.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `description` char(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Индекс 2` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы shopdrive.role: ~4 rows (приблизительно)
DELETE FROM `role`;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`id`, `name`, `description`) VALUES
	(1, 'Admin', 'Admin'),
	(3, 'AdvancedUser', 'Discount 5%'),
	(4, 'SuperUser', 'Discount 10%'),
	(5, 'SimpleUser', 'simple');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;


-- Дамп структуры для процедура shopdrive.sp_update
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update`(IN orderId INT)
BEGIN

	select `order_item`.order_id, sum(product.price * order_item.quantity) as s 
	from `order_item` join `product`
	where `order_item`.order_id = orderId
	group by `order_item`.order_id;
	
END//
DELIMITER ;


-- Дамп структуры для процедура shopdrive.sp_update_order
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_order`()
BEGIN
	update `order`, 

	(select `order_item`.order_id, sum(product.price * order_item.quantity) as s 
	from `order_item` join `product`
	on order_item.product_id = product.id
	group by order_item.order_id) as ordersSum
	
	set `amount` = s
	
	where `order`.id = ordersSum.order_id;
END//
DELIMITER ;


-- Дамп структуры для процедура shopdrive.sp_update_order_user
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_order_user`(IN orderId INT)
BEGIN
	update `order`, 

	(select `order_item`.order_id, if(`order_item`.order_id = orderId, sum(product.price * order_item.quantity), 'no') as s 
	from `order_item` join `product`
	on order_item.product_id = product.id
	group by order_item.order_id having order_item.order_id = orderId) as ordersSum
	
	set `amount` = s
	
	where `order`.id = ordersSum.order_id ;
	
END//
DELIMITER ;


-- Дамп структуры для таблица shopdrive.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `login` char(40) NOT NULL,
  `email` char(40) NOT NULL,
  `password` char(50) NOT NULL,
  `firstname` char(40) NOT NULL,
  `surename` char(40) NOT NULL,
  `lastname` char(40) NOT NULL,
  `phone` char(15) NOT NULL,
  `address` char(80) NOT NULL,
  `skills` set('PHP','Java','CSS') NOT NULL,
  `photo` char(100) NOT NULL,
  `role_id` tinyint(3) unsigned NOT NULL DEFAULT '5',
  `is_active` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Индекс 2` (`email`),
  KEY `FK_user_role` (`role_id`),
  CONSTRAINT `FK_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы shopdrive.user: ~11 rows (приблизительно)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `login`, `email`, `password`, `firstname`, `surename`, `lastname`, `phone`, `address`, `skills`, `photo`, `role_id`, `is_active`) VALUES
	(1, 'Ivanov Ivan', 'ivan@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Иван', '', 'Иванов', '', '', 'CSS', '1.gif', 1, '0'),
	(3, 'Sergeev Serge', 'serg@yandex.ru', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'Сергей', 'Сергееви', 'Сергеев', '', '', 'PHP,CSS', '2.gif', 1, '1'),
	(4, 'Alexandrov Alexandr', 'alex@yahoo.com', '', 'Александр', '', 'Александрович', '', '', 'PHP', '3.gif', 4, '0'),
	(5, 'Andreev Andrey', 'andrey@mail.ru', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Андрей', '', 'Андреев', '', '', 'CSS', '4.gif', 3, '1'),
	(8, 'Dmitry Dmitriev', 'dmitry@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Дмитрий', '', 'Дмитриев', '', '', 'CSS', '5.gif', 3, '0'),
	(10, 'Egorov Egor', 'egor1111@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Егор', '', 'Егоров', '', '', 'CSS', '6.gif', 5, '0'),
	(12, 'Mihailov Stas', 'stasik1111@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Стас', 'Михайлов', 'Михайлов', '', '', 'PHP', '7.gif', 3, '1'),
	(13, 'Kirkorov Filipp', 'kirkorov@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Филип', 'Киркоров', '', '', '', 'CSS', '8.gif', 1, '1'),
	(14, 'Novikov Mihail', 'novikov@gmail.com', '2345', '', 'Новиков', '', '', '', 'Java', '9.gif', 5, '1'),
	(15, '', 'ivan1@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '', '', '', '', '', '', '', 5, '1'),
	(18, '', 'ivan2@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '', '', '', '', '', '', '', 1, '1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
