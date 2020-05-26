# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.7.29-0ubuntu0.18.04.1)
# Схема: webinar
# Время создания: 2020-05-26 19:22:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы directions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `directions`;

CREATE TABLE `directions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `direction_faculties_fk` FOREIGN KEY (`id`) REFERENCES `faculties` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `directions` WRITE;
/*!40000 ALTER TABLE `directions` DISABLE KEYS */;

INSERT INTO `directions` (`id`, `code`, `name`, `faculty_id`)
VALUES
	(1,'09.03.01','Информатика и вычислительная техника',1);

/*!40000 ALTER TABLE `directions` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы faculties
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faculties`;

CREATE TABLE `faculties` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `faculties` WRITE;
/*!40000 ALTER TABLE `faculties` DISABLE KEYS */;

INSERT INTO `faculties` (`id`, `name`)
VALUES
	(1,'Факультет информационных технологий'),
	(3,'Факультет машиностроения'),
	(4,'Факультет химических технологий и биотехнологий'),
	(5,'Тестовый факультет');

/*!40000 ALTER TABLE `faculties` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `runame` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;

INSERT INTO `status` (`id`, `name`, `runame`)
VALUES
	(1,'administrator','Администратор'),
	(2,'dispetcher','Диспетчер'),
	(3,'dekan','Декан'),
	(4,'kadrovic','Кадровик');

/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `password` varchar(128) NOT NULL,
  `salt` varchar(45) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `fathername` varchar(25) DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `auth_token` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`,`status_id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_status1_idx` (`status_id`),
  CONSTRAINT `fk_users_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `email`, `password`, `salt`, `name`, `surname`, `fathername`, `status_id`, `auth_token`)
VALUES
	(7,'admin@admin.ru','2db9a2cd5d3cdab76651c22b6d60df58992ab5c140899a320d017dda3c763cf0c60eee24cb80e306f9038d986c5b259b3cae6b6d6abf9d79deb376298daa2c9d','LHNNREGOQIMJMXQASMNOFWOBIFJHXQVNZUKYZXWKHIRBW','Admin','Admin','Admin',1,''),
	(8,'user@user.ru','69e6317283b4439b4dcc38a5438aaa40e4dfbeb4f432b393f04e1cd34608f7172ca8f852c6a98fc94d52270f5ae56f5a50bd4a57c22e28142a918b249f82c71b','NROSTHLSPLSQNALSMBGOJJTSICIXCLMMMYDZZYYJIHIMP','user','user','user',2,''),
	(9,'dekan@dekan.ru','9b4360211c4e81b4c748e2c41dedca0846ddb45d722245f99a76925be0973e3f32ce5359e8b0e8af4d94f58cc3d2efdd3d3a1d474ddef1a48d42392552ccab86','TSICJZNLMMSMNHCANUDURLMMFEGCTQKJATVSXXHIFLTFB','dekan','dekan','dekan',3,'89b108c5b901220af48aa2f35c5f5ef45007abdb39f4dcb140e8504dc450c929');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
