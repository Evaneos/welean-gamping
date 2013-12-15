-- --------------------------------------------------------
-- Host:                         192.168.1.8
-- Server version:               5.5.34-0ubuntu0.13.10.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2013-12-15 01:22:25
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table gamping.activity
DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` int(10) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.activity: ~2 rows (approximately)
DELETE FROM `activity`;
/*!40000 ALTER TABLE `activity` DISABLE KEYS */;
INSERT INTO `activity` (`id`, `name`, `description`) VALUES
	(1, 8, 'aze'),
	(2, 9, 'sqd');
/*!40000 ALTER TABLE `activity` ENABLE KEYS */;


-- Dumping structure for table gamping.address
DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(100) DEFAULT NULL,
  `locality` varchar(100) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.address: ~12 rows (approximately)
DELETE FROM `address`;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` (`id`, `address`, `locality`, `zip_code`, `city`) VALUES
	(1, NULL, NULL, NULL, NULL),
	(2, NULL, NULL, NULL, NULL),
	(3, NULL, NULL, NULL, NULL),
	(9, '191 avenue Daumesnil', '', '75012', 'Paris'),
	(32, 'adresse1', 'adresse2', '75012', 'Paris'),
	(64, 'qsdqsdsqd', 'adresse2', '75012', 'Paris'),
	(67, 'qsdqsdsqd', 'adresse2', '75012', 'Paris'),
	(68, 'qsdqsdsqd', 'adresse2', '75012', 'Paris'),
	(69, '191 avenue Daumesnil', '', '75012', 'Paris'),
	(71, '9 rue Elsa Morante', '', '75013', 'Paris'),
	(72, '9 rue Elsa Morante', '', '75013', 'Paris'),
	(73, '9 rue Elsa Morante', '', '75013', 'Paris');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;


-- Dumping structure for table gamping.commodity
DROP TABLE IF EXISTS `commodity`;
CREATE TABLE IF NOT EXISTS `commodity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` int(10) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.commodity: ~6 rows (approximately)
DELETE FROM `commodity`;
/*!40000 ALTER TABLE `commodity` DISABLE KEYS */;
INSERT INTO `commodity` (`id`, `name`, `description`) VALUES
	(1, 2, 'mer'),
	(2, 3, 'montagne'),
	(3, 4, 'plage'),
	(4, 5, 'barbecue'),
	(5, 6, 'piscine'),
	(6, 7, 'bitch');
/*!40000 ALTER TABLE `commodity` ENABLE KEYS */;


-- Dumping structure for table gamping.country
DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` int(10) NOT NULL,
  `computername` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.country: ~4 rows (approximately)
DELETE FROM `country`;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` (`id`, `name`, `computername`) VALUES
	(1, 1, 17),
	(2, 14, 18),
	(3, 15, 19),
	(4, 16, 20);
/*!40000 ALTER TABLE `country` ENABLE KEYS */;


-- Dumping structure for table gamping.currency
DROP TABLE IF EXISTS `currency`;
CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(3) DEFAULT NULL,
  `html` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.currency: ~2 rows (approximately)
DELETE FROM `currency`;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;
INSERT INTO `currency` (`id`, `name`, `code`, `html`) VALUES
	(1, 'Euro', 'EUR', '&euro;'),
	(2, 'Dollar', 'USD', '&#36;');
/*!40000 ALTER TABLE `currency` ENABLE KEYS */;


-- Dumping structure for table gamping.language
DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iso2` char(2) DEFAULT NULL,
  `iso3` char(3) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.language: ~3 rows (approximately)
DELETE FROM `language`;
/*!40000 ALTER TABLE `language` DISABLE KEYS */;
INSERT INTO `language` (`id`, `iso2`, `iso3`, `name`) VALUES
	(1, 'FR', 'FRA', 'Francais'),
	(2, 'EN', 'ENG', 'Anglais'),
	(3, 'ES', 'ESP', 'Espagnol');
/*!40000 ALTER TABLE `language` ENABLE KEYS */;


-- Dumping structure for table gamping.parcel
DROP TABLE IF EXISTS `parcel`;
CREATE TABLE IF NOT EXISTS `parcel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `address_id` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `currency_id` smallint(3) DEFAULT NULL,
  `description` text,
  `hosts_camping_cars` tinyint(1) DEFAULT NULL,
  `hosts_caravans` tinyint(1) DEFAULT NULL,
  `hosts_tents` tinyint(1) DEFAULT NULL,
  `latitude` varchar(32) DEFAULT NULL,
  `longitude` varchar(32) DEFAULT NULL,
  `online` tinyint(1) DEFAULT NULL,
  `price_per_adult` decimal(10,2) DEFAULT NULL,
  `price_per_extra` decimal(10,2) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `rules` text,
  `title` varchar(512) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.parcel: ~12 rows (approximately)
DELETE FROM `parcel`;
/*!40000 ALTER TABLE `parcel` DISABLE KEYS */;
INSERT INTO `parcel` (`id`, `address_id`, `capacity`, `country_id`, `created_at`, `currency_id`, `description`, `hosts_camping_cars`, `hosts_caravans`, `hosts_tents`, `latitude`, `longitude`, `online`, `price_per_adult`, `price_per_extra`, `region_id`, `rules`, `title`, `updated_at`, `user_id`) VALUES
	(7, 9, 5, 1, '2013-12-14', 1, 'c\'est rude', 1, 1, 1, '45.8401983', '1.3938587', 0, 9.00, 3.00, 0, 'azazeazazezeazae', 'chez mwa', '2013-12-14', 3),
	(32, 34, 5, 2, '2013-12-14', 2, 'description', 1, 1, 1, '40.4167754', '-3.7037902', 0, 5.00, 3.00, 0, 'regles', 'titre', '2013-12-14', 3),
	(33, 64, 5, 1, '2013-12-14', 2, 'ma description', 1, 1, 1, '48.8408083', '2.3881833', 0, 5.00, 2.00, 0, '', 'mon titre', '2013-12-14', 11),
	(36, 67, 5, 1, '2013-12-14', 2, 'ma description', 1, 1, 1, '48.8408083', '2.3881833', 0, 5.00, 2.00, 0, '', 'mon titre', '2013-12-14', 11),
	(37, 68, 5, 1, '2013-12-14', 2, 'ma description', 1, 1, 1, '48.8408083', '2.3881833', 0, 5.00, 2.00, 0, '', 'mon titre', '2013-12-14', 11),
	(38, 69, 4, 1, '2013-12-15', 2, 'azeazezeazea', 0, 0, 0, '48.8401983', '2.3938587', 0, 4.00, 1.00, 0, '', 'mon titre', '2013-12-15', 12),
	(39, 71, 6, 2, '2013-12-15', 2, 'description du terrain', 1, 1, 1, '40.8287584', '-3.65', 0, 3.00, 2.00, 0, 'regles du terrain', 'titre du terrain', '2013-12-15', 14),
	(40, 72, 6, 1, '2013-12-15', 2, 'description du terrain', 0, 1, 0, '48.8287584', '2.3817486', 0, 3.00, 2.00, 0, 'regles du terrain', 'titre du terrain', '2013-12-15', 15),
	(41, 73, 6, 1, '2013-12-15', 2, 'description du terrain', 0, 1, 0, '48.8287584', '2.3817486', 0, 3.00, 2.00, 0, 'regles du terrain', 'titre du terrain', '2013-12-15', 16);
/*!40000 ALTER TABLE `parcel` ENABLE KEYS */;


-- Dumping structure for table gamping.parcel_has_activity
DROP TABLE IF EXISTS `parcel_has_activity`;
CREATE TABLE IF NOT EXISTS `parcel_has_activity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parcel_id` int(11) unsigned DEFAULT NULL,
  `activity_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.parcel_has_activity: ~10 rows (approximately)
DELETE FROM `parcel_has_activity`;
/*!40000 ALTER TABLE `parcel_has_activity` DISABLE KEYS */;
INSERT INTO `parcel_has_activity` (`id`, `parcel_id`, `activity_id`) VALUES
	(5, 7, 1),
	(6, 7, 2),
	(31, 32, 2),
	(37, 33, 2),
	(40, 36, 2),
	(41, 37, 2),
	(42, 38, 1),
	(44, 39, 1),
	(45, 40, 1),
	(46, 41, 1);
/*!40000 ALTER TABLE `parcel_has_activity` ENABLE KEYS */;


-- Dumping structure for table gamping.parcel_has_commodity
DROP TABLE IF EXISTS `parcel_has_commodity`;
CREATE TABLE IF NOT EXISTS `parcel_has_commodity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `parcel_id` int(11) unsigned DEFAULT NULL,
  `commodity_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.parcel_has_commodity: ~22 rows (approximately)
DELETE FROM `parcel_has_commodity`;
/*!40000 ALTER TABLE `parcel_has_commodity` DISABLE KEYS */;
INSERT INTO `parcel_has_commodity` (`id`, `parcel_id`, `commodity_id`) VALUES
	(3, 7, 2),
	(4, 7, 6),
	(53, 32, 1),
	(54, 32, 6),
	(65, 33, 1),
	(66, 33, 6),
	(71, 36, 1),
	(72, 36, 6),
	(73, 37, 1),
	(74, 37, 6),
	(75, 38, 3),
	(76, 38, 4),
	(77, 38, 6),
	(81, 39, 1),
	(82, 39, 4),
	(83, 39, 6),
	(84, 40, 1),
	(85, 40, 4),
	(86, 40, 6),
	(87, 41, 1),
	(88, 41, 4),
	(89, 41, 6);
/*!40000 ALTER TABLE `parcel_has_commodity` ENABLE KEYS */;


-- Dumping structure for table gamping.parcel_has_picture
DROP TABLE IF EXISTS `parcel_has_picture`;
CREATE TABLE IF NOT EXISTS `parcel_has_picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parcel_id` int(10) unsigned NOT NULL DEFAULT '0',
  `picture_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_parcel_has_picture_parcel` (`parcel_id`),
  KEY `FK_parcel_has_picture_picture` (`picture_id`),
  CONSTRAINT `FK_parcel_has_picture_parcel` FOREIGN KEY (`parcel_id`) REFERENCES `parcel` (`id`),
  CONSTRAINT `FK_parcel_has_picture_picture` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.parcel_has_picture: ~0 rows (approximately)
DELETE FROM `parcel_has_picture`;
/*!40000 ALTER TABLE `parcel_has_picture` DISABLE KEYS */;
/*!40000 ALTER TABLE `parcel_has_picture` ENABLE KEYS */;


-- Dumping structure for table gamping.picture
DROP TABLE IF EXISTS `picture`;
CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.picture: ~1 rows (approximately)
DELETE FROM `picture`;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
INSERT INTO `picture` (`id`, `url`) VALUES
	(1, 'images/picture/gamping.jpg');
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;


-- Dumping structure for table gamping.place
DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.place: ~0 rows (approximately)
DELETE FROM `place`;
/*!40000 ALTER TABLE `place` DISABLE KEYS */;
/*!40000 ALTER TABLE `place` ENABLE KEYS */;


-- Dumping structure for table gamping.place_has_situation_geo
DROP TABLE IF EXISTS `place_has_situation_geo`;
CREATE TABLE IF NOT EXISTS `place_has_situation_geo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `place_id` int(10) unsigned NOT NULL DEFAULT '0',
  `situation_geo_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__place` (`place_id`),
  KEY `FK__situation_geo` (`situation_geo_id`),
  CONSTRAINT `FK__place` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`),
  CONSTRAINT `FK__situation_geo` FOREIGN KEY (`situation_geo_id`) REFERENCES `situation_geo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.place_has_situation_geo: ~0 rows (approximately)
DELETE FROM `place_has_situation_geo`;
/*!40000 ALTER TABLE `place_has_situation_geo` DISABLE KEYS */;
/*!40000 ALTER TABLE `place_has_situation_geo` ENABLE KEYS */;


-- Dumping structure for table gamping.region
DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__country` (`country_id`),
  CONSTRAINT `FK__country` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.region: ~1 rows (approximately)
DELETE FROM `region`;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` (`id`, `country_id`, `name`) VALUES
	(1, 1, 'PACA');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;


-- Dumping structure for table gamping.situation_geo
DROP TABLE IF EXISTS `situation_geo`;
CREATE TABLE IF NOT EXISTS `situation_geo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.situation_geo: ~4 rows (approximately)
DELETE FROM `situation_geo`;
/*!40000 ALTER TABLE `situation_geo` DISABLE KEYS */;
INSERT INTO `situation_geo` (`id`, `name`) VALUES
	(1, 10),
	(2, 11),
	(3, 12),
	(4, 13);
/*!40000 ALTER TABLE `situation_geo` ENABLE KEYS */;


-- Dumping structure for table gamping.translation
DROP TABLE IF EXISTS `translation`;
CREATE TABLE IF NOT EXISTS `translation` (
  `id` int(11) unsigned NOT NULL,
  `language_id` int(11) DEFAULT NULL,
  `name` text,
  UNIQUE KEY `id_language_id` (`id`,`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.translation: ~44 rows (approximately)
DELETE FROM `translation`;
/*!40000 ALTER TABLE `translation` DISABLE KEYS */;
INSERT INTO `translation` (`id`, `language_id`, `name`) VALUES
	(1, 1, 'France'),
	(1, 2, 'French'),
	(1, 3, 'Francia'),
	(2, 1, 'mer'),
	(2, 2, 'sea'),
	(3, 1, 'aze'),
	(3, 2, 'sdq'),
	(4, 1, 'gdf'),
	(4, 2, 'ccw'),
	(5, 1, 'gfd'),
	(5, 2, 'grtroezpe'),
	(6, 1, 'bgtbgt'),
	(6, 2, 'dsdfg'),
	(7, 1, 'bitch'),
	(7, 2, 'biiitch'),
	(8, 1, 'azezea'),
	(9, 2, 'dsffds'),
	(8, 2, 'sdwwxcw'),
	(9, 1, 'wsdfjiqshdf'),
	(10, 1, 'mer'),
	(11, 1, 'campagne'),
	(12, 1, 'ville'),
	(13, 1, 'montagne'),
	(14, 1, 'Espagne'),
	(14, 2, 'Spain'),
	(14, 3, 'Espana'),
	(15, 1, 'Italie'),
	(15, 2, 'Italy'),
	(15, 3, 'Italia'),
	(16, 1, 'Allemagne'),
	(16, 2, 'Germany'),
	(16, 3, 'Alemania'),
	(17, 1, 'france'),
	(17, 2, 'france'),
	(17, 3, 'francia'),
	(18, 1, 'espagne'),
	(18, 2, 'spain'),
	(18, 3, 'espana'),
	(19, 1, 'italie'),
	(19, 2, 'italy'),
	(19, 3, 'italia'),
	(20, 1, 'allemagne'),
	(20, 2, 'germany'),
	(20, 3, 'alemania');
/*!40000 ALTER TABLE `translation` ENABLE KEYS */;


-- Dumping structure for table gamping.translation_engine
DROP TABLE IF EXISTS `translation_engine`;
CREATE TABLE IF NOT EXISTS `translation_engine` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `md5key` varchar(32) NOT NULL,
  `lang` varchar(16) NOT NULL,
  `k` text NOT NULL,
  `val` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.translation_engine: ~199 rows (approximately)
DELETE FROM `translation_engine`;
/*!40000 ALTER TABLE `translation_engine` DISABLE KEYS */;
INSERT INTO `translation_engine` (`id`, `md5key`, `lang`, `k`, `val`) VALUES
	(1, '9b9d3705bfcae6e3af076aea3f090a68', 'fr', 'chaud', 'chaud'),
	(2, '9b9d3705bfcae6e3af076aea3f090a68', 'en', 'chaud', 'hot'),
	(3, 'da6383f8db6693fcf20b9295548793ef', 'fr', 'Trouvez un emplacement de camping.', 'Trouvez un emplacement de camping.'),
	(4, 'c8ae77c51e7a941bd7ab75edef02904d', 'fr', 'Qu\'est ce que le Gamping ?', 'Qu\'est ce le Gamping ?'),
	(5, 'd9154b731d36ea34dbd3de40f28359ea', 'fr', 'Le gamping (garden camping), c\'est rÃ©server un terrain chez un particulier partout dans le monde pour y camper. Ou gagner de l\'argent en louant votre propre terrain.', 'Le gamping (garden camping), c\'est rÃ©server un terrain chez un particulier partout dans le monde pour y camper. Ou gagner de l\'argent en louant votre propre terrain.'),
	(6, 'c26e7dbca78e4ef4a451f481cae18bf0', 'fr', 'Partir gamper', 'Partir gamper'),
	(7, 'f11617b1cb69f82df73336ed3a1ac194', 'fr', 'Pour partir gimper, faire de nouvelles rencontres et dÃ©couvrir de nouveaux horizons, c\'est facile !', 'Pour partir gimper, faire de nouvelles rencontres et dÃ©couvrir de nouveaux horizons, c\'est facile !'),
	(8, '59a4b8889443c9d733c98b033f697a48', 'fr', 'Trouvez un terrain.', 'Trouvez un terrain.'),
	(9, '958e223a316a9967965a0ae439372d85', 'fr', 'RÃ©servez-le avec l\'hÃ´te.', 'RÃ©servez-le avec l\'hÃ´te.'),
	(10, 'ec3401ed870fc8eeb1dc73c3cb626133', 'fr', 'Bon voyage !', 'Bon voyage !'),
	(11, '9b0d485d2ae36a82d157fb329db787a8', 'fr', 'Devenir hÃ´te', 'Devenir hÃ´te'),
	(12, 'a612b24d652a08ceff8b61ec31c53b64', 'fr', 'Pour devenir hÃ´te et accueillir des gampeurs contre rÃ©munÃ©ration, rien de plus facile !', 'Pour devenir hÃ´te et accueillir des gampeurs contre rÃ©munÃ©ration, rien de plus facile !'),
	(13, '4eaac9fb6abe83b6f08bdab4bc7b0328', 'fr', 'RÃ©fÃ©rencez votre terrain.', 'RÃ©fÃ©rencez votre terrain.'),
	(14, '3c6462a16313fc742f7d298caf9ff685', 'fr', 'Recevez des demandes de rÃ©servation.', 'Recevez des demandes de rÃ©servation.'),
	(15, 'b10bbda7cc114b0810254353ef7540ef', 'fr', 'Accueillez vos invitÃ©s.', 'Accueillez vos invitÃ©s.'),
	(16, 'a0085e83f33f99ec953937a194820b2f', 'fr', 'Ils vous accueillent chez eux', 'Ils vous accueillent chez eux'),
	(17, 'dac53f514539764d4a26f3452b7645dd', 'fr', 'Votre hÃ´te', 'Votre hÃ´te'),
	(18, 'dbf404092b506c0ee0d14216cc8782fd', 'fr', 'Ils ont gampÃ©', 'Ils ont gampÃ©'),
	(19, 'e9a79e7a9f18d7e5ebd0f2e429b61042', 'fr', 'TÃ©moignages de campeurs ayant trouvÃ© des hÃ´tes grace Ã  Gamping.com :', 'TÃ©moignages de campeurs ayant trouvÃ© des hÃ´tes grace Ã  Gamping.com :'),
	(20, 'ac87003b0b8c95abf0c844443f69475e', 'fr', 'Rejoignez la premiÃ¨re communautÃ© de gamping au monde !', 'Rejoignez la premiÃ¨re communautÃ© de gamping au monde !'),
	(21, 'f969516e3aaa383e77ab942819ed38bd', 'fr', 'Proposez un terrain', 'Proposez un terrain'),
	(22, '0411daa3cfcb1eda35467a997630a94d', 'fr', '9 bonnes raisons de devenir hÃ´te', '9 bonnes raisons de devenir hÃ´te'),
	(23, '62942173e4e328c59b2d1bc154a43157', 'fr', 'Faire des rencontres', 'Faire des rencontres'),
	(24, '9984e367725b9a3d111f4fd81ba50ac4', 'fr', 'Elargissez votre cercle d\'amis en accueillant des personnes du monde entier.', 'Elargissez votre cercle d\'amis en accueillant des personnes du monde entier.'),
	(25, '82e78cdbf190f8eec5d4f01f3381a911', 'fr', 'Gagner de l\'argent', 'Gagner de l\'argent'),
	(26, 'b7994c9801ea7ce66316cbf04e5cc849', 'fr', 'Accumulez un peu de sous pour vous offrir des petits extras !', 'Accumulez un peu de sous pour vous offrir des petits extras !'),
	(27, '9478cdd34fa2acb910cc279614103c7b', 'fr', 'Vivre plus confortablement', 'Vivre plus confortablement'),
	(28, '44734ac80d11be593aa8b323aef6ef5b', 'fr', 'Vous profiterez aussi des investissements rÃ©alisÃ©s pour les campeurs.', 'Vous profiterez aussi des investissements rÃ©alisÃ©s pour les campeurs.'),
	(29, 'fab5c71e3cac921111655d4a17faed38', 'fr', 'CrÃ©ez avec nous une nouvelle alternative d\'hÃ©bergement !', 'CrÃ©ez avec nous une nouvelle alternative d\'hÃ©bergement !'),
	(30, 'da6383f8db6693fcf20b9295548793ef', 'en', 'Trouvez un emplacement de camping.', 'Find a place to camp.'),
	(31, 'c8ae77c51e7a941bd7ab75edef02904d', 'en', 'Qu\'est ce que le Gamping ?', 'Qu\'est ce que le Gamping ?'),
	(32, 'd9154b731d36ea34dbd3de40f28359ea', 'en', 'Le gamping (garden camping), c\'est rÃ©server un terrain chez un particulier partout dans le monde pour y camper. Ou gagner de l\'argent en louant votre propre terrain.', 'Le gamping (garden camping), c\'est rÃ©server un terrain chez un particulier partout dans le monde pour y camper. Ou gagner de l\'argent en louant votre propre terrain.'),
	(33, 'c26e7dbca78e4ef4a451f481cae18bf0', 'en', 'Partir gamper', 'Partir gamper'),
	(34, 'f11617b1cb69f82df73336ed3a1ac194', 'en', 'Pour partir gimper, faire de nouvelles rencontres et dÃ©couvrir de nouveaux horizons, c\'est facile !', 'Pour partir gimper, faire de nouvelles rencontres et dÃ©couvrir de nouveaux horizons, c\'est facile !'),
	(35, '59a4b8889443c9d733c98b033f697a48', 'en', 'Trouvez un terrain.', 'Trouvez un terrain.'),
	(36, '958e223a316a9967965a0ae439372d85', 'en', 'RÃ©servez-le avec l\'hÃ´te.', 'RÃ©servez-le avec l\'hÃ´te.'),
	(37, 'ec3401ed870fc8eeb1dc73c3cb626133', 'en', 'Bon voyage !', 'Bon voyage !'),
	(38, '9b0d485d2ae36a82d157fb329db787a8', 'en', 'Devenir hÃ´te', 'Devenir hÃ´te'),
	(39, 'a612b24d652a08ceff8b61ec31c53b64', 'en', 'Pour devenir hÃ´te et accueillir des gampeurs contre rÃ©munÃ©ration, rien de plus facile !', 'Pour devenir hÃ´te et accueillir des gampeurs contre rÃ©munÃ©ration, rien de plus facile !'),
	(40, '4eaac9fb6abe83b6f08bdab4bc7b0328', 'en', 'RÃ©fÃ©rencez votre terrain.', 'RÃ©fÃ©rencez votre terrain.'),
	(41, '3c6462a16313fc742f7d298caf9ff685', 'en', 'Recevez des demandes de rÃ©servation.', 'Recevez des demandes de rÃ©servation.'),
	(42, 'b10bbda7cc114b0810254353ef7540ef', 'en', 'Accueillez vos invitÃ©s.', 'Accueillez vos invitÃ©s.'),
	(43, 'a0085e83f33f99ec953937a194820b2f', 'en', 'Ils vous accueillent chez eux', 'Ils vous accueillent chez eux'),
	(44, 'dac53f514539764d4a26f3452b7645dd', 'en', 'Votre hÃ´te', 'Votre hÃ´te'),
	(45, 'dbf404092b506c0ee0d14216cc8782fd', 'en', 'Ils ont gampÃ©', 'Ils ont gampÃ©'),
	(46, 'e9a79e7a9f18d7e5ebd0f2e429b61042', 'en', 'TÃ©moignages de campeurs ayant trouvÃ© des hÃ´tes grace Ã  Gamping.com :', 'TÃ©moignages de campeurs ayant trouvÃ© des hÃ´tes grace Ã  Gamping.com :'),
	(47, 'ac87003b0b8c95abf0c844443f69475e', 'en', 'Rejoignez la premiÃ¨re communautÃ© de gamping au monde !', 'Rejoignez la premiÃ¨re communautÃ© de gamping au monde !'),
	(48, 'f969516e3aaa383e77ab942819ed38bd', 'en', 'Proposez un terrain', 'Proposez un terrain'),
	(49, '0411daa3cfcb1eda35467a997630a94d', 'en', '9 bonnes raisons de devenir hÃ´te', '9 bonnes raisons de devenir hÃ´te'),
	(50, '62942173e4e328c59b2d1bc154a43157', 'en', 'Faire des rencontres', 'Faire des rencontres'),
	(51, '9984e367725b9a3d111f4fd81ba50ac4', 'en', 'Elargissez votre cercle d\'amis en accueillant des personnes du monde entier.', 'Elargissez votre cercle d\'amis en accueillant des personnes du monde entier.'),
	(52, '82e78cdbf190f8eec5d4f01f3381a911', 'en', 'Gagner de l\'argent', 'Gagner de l\'argent'),
	(53, 'b7994c9801ea7ce66316cbf04e5cc849', 'en', 'Accumulez un peu de sous pour vous offrir des petits extras !', 'Accumulez un peu de sous pour vous offrir des petits extras !'),
	(54, '9478cdd34fa2acb910cc279614103c7b', 'en', 'Vivre plus confortablement', 'Vivre plus confortablement'),
	(55, '44734ac80d11be593aa8b323aef6ef5b', 'en', 'Vous profiterez aussi des investissements rÃ©alisÃ©s pour les campeurs.', 'Vous profiterez aussi des investissements rÃ©alisÃ©s pour les campeurs.'),
	(56, 'fab5c71e3cac921111655d4a17faed38', 'en', 'CrÃ©ez avec nous une nouvelle alternative d\'hÃ©bergement !', 'CrÃ©ez avec nous une nouvelle alternative d\'hÃ©bergement !'),
	(57, 'da6383f8db6693fcf20b9295548793ef', 'es', 'Trouvez un emplacement de camping.', 'Hola que tal ?'),
	(58, 'c8ae77c51e7a941bd7ab75edef02904d', 'es', 'Qu\'est ce que le Gamping ?', 'Qu\'est ce que le Gamping ?'),
	(59, 'd9154b731d36ea34dbd3de40f28359ea', 'es', 'Le gamping (garden camping), c\'est rÃ©server un terrain chez un particulier partout dans le monde pour y camper. Ou gagner de l\'argent en louant votre propre terrain.', 'Le gamping (garden camping), c\'est rÃ©server un terrain chez un particulier partout dans le monde pour y camper. Ou gagner de l\'argent en louant votre propre terrain.'),
	(60, 'c26e7dbca78e4ef4a451f481cae18bf0', 'es', 'Partir gamper', 'Partir gamper'),
	(61, 'f11617b1cb69f82df73336ed3a1ac194', 'es', 'Pour partir gimper, faire de nouvelles rencontres et dÃ©couvrir de nouveaux horizons, c\'est facile !', 'Pour partir gimper, faire de nouvelles rencontres et dÃ©couvrir de nouveaux horizons, c\'est facile !'),
	(62, '59a4b8889443c9d733c98b033f697a48', 'es', 'Trouvez un terrain.', 'Trouvez un terrain.'),
	(63, '958e223a316a9967965a0ae439372d85', 'es', 'RÃ©servez-le avec l\'hÃ´te.', 'RÃ©servez-le avec l\'hÃ´te.'),
	(64, 'ec3401ed870fc8eeb1dc73c3cb626133', 'es', 'Bon voyage !', 'Bon voyage !'),
	(65, '9b0d485d2ae36a82d157fb329db787a8', 'es', 'Devenir hÃ´te', 'Devenir hÃ´te'),
	(66, 'a612b24d652a08ceff8b61ec31c53b64', 'es', 'Pour devenir hÃ´te et accueillir des gampeurs contre rÃ©munÃ©ration, rien de plus facile !', 'Pour devenir hÃ´te et accueillir des gampeurs contre rÃ©munÃ©ration, rien de plus facile !'),
	(67, '4eaac9fb6abe83b6f08bdab4bc7b0328', 'es', 'RÃ©fÃ©rencez votre terrain.', 'RÃ©fÃ©rencez votre terrain.'),
	(68, '3c6462a16313fc742f7d298caf9ff685', 'es', 'Recevez des demandes de rÃ©servation.', 'Recevez des demandes de rÃ©servation.'),
	(69, 'b10bbda7cc114b0810254353ef7540ef', 'es', 'Accueillez vos invitÃ©s.', 'Accueillez vos invitÃ©s.'),
	(70, 'a0085e83f33f99ec953937a194820b2f', 'es', 'Ils vous accueillent chez eux', 'Ils vous accueillent chez eux'),
	(71, 'dac53f514539764d4a26f3452b7645dd', 'es', 'Votre hÃ´te', 'Votre hÃ´te'),
	(72, 'dbf404092b506c0ee0d14216cc8782fd', 'es', 'Ils ont gampÃ©', 'Ils ont gampÃ©'),
	(73, 'e9a79e7a9f18d7e5ebd0f2e429b61042', 'es', 'TÃ©moignages de campeurs ayant trouvÃ© des hÃ´tes grace Ã  Gamping.com :', 'TÃ©moignages de campeurs ayant trouvÃ© des hÃ´tes grace Ã  Gamping.com :'),
	(74, 'ac87003b0b8c95abf0c844443f69475e', 'es', 'Rejoignez la premiÃ¨re communautÃ© de gamping au monde !', 'Rejoignez la premiÃ¨re communautÃ© de gamping au monde !'),
	(75, 'f969516e3aaa383e77ab942819ed38bd', 'es', 'Proposez un terrain', 'Proposez un terrain'),
	(76, '0411daa3cfcb1eda35467a997630a94d', 'es', '9 bonnes raisons de devenir hÃ´te', '9 bonnes raisons de devenir hÃ´te'),
	(77, '62942173e4e328c59b2d1bc154a43157', 'es', 'Faire des rencontres', 'Faire des rencontres'),
	(78, '9984e367725b9a3d111f4fd81ba50ac4', 'es', 'Elargissez votre cercle d\'amis en accueillant des personnes du monde entier.', 'Elargissez votre cercle d\'amis en accueillant des personnes du monde entier.'),
	(79, '82e78cdbf190f8eec5d4f01f3381a911', 'es', 'Gagner de l\'argent', 'Gagner de l\'argent'),
	(80, 'b7994c9801ea7ce66316cbf04e5cc849', 'es', 'Accumulez un peu de sous pour vous offrir des petits extras !', 'Accumulez un peu de sous pour vous offrir des petits extras !'),
	(81, '9478cdd34fa2acb910cc279614103c7b', 'es', 'Vivre plus confortablement', 'Vivre plus confortablement'),
	(82, '44734ac80d11be593aa8b323aef6ef5b', 'es', 'Vous profiterez aussi des investissements rÃ©alisÃ©s pour les campeurs.', 'Vous profiterez aussi des investissements rÃ©alisÃ©s pour les campeurs.'),
	(83, 'fab5c71e3cac921111655d4a17faed38', 'es', 'CrÃ©ez avec nous une nouvelle alternative d\'hÃ©bergement !', 'CrÃ©ez avec nous une nouvelle alternative d\'hÃ©bergement !'),
	(84, 'a7c4a73c05a2ca29b3ea49d14b93a28c', 'fr', 'Proposez votre terrain en 1 minute. (gratuit)', 'Proposez votre terrain en 1 minute. (gratuit)'),
	(85, 'c25dc99150b90ec343fc9b47d57546cc', 'fr', 'Qui voulez vous recevoir ?', 'Qui voulez vous recevoir ?'),
	(86, '5cc127032c60ad959a48a36636b156e1', 'fr', 'Tente', 'Tente'),
	(87, 'd7f8c7a175f2cf745cc3ff4bd05663ad', 'fr', 'Caravan', 'Caravan'),
	(88, 'e4d744df29f60d00f0ae787effe5d2f8', 'fr', 'Camping car', 'Camping car'),
	(89, 'cd77e340eaf10211cb72d4110e8eb36a', 'fr', '1 personne', '1 personne'),
	(90, '1c58f02a99d74e37f278357397e0999f', 'fr', '2 personnes', '2 personnes'),
	(91, 'e8d9fefc6d56954248e5bebf8c55a5ae', 'fr', 'Situation', 'Situation'),
	(92, '992a0f0542384f1ee5ef51b7cf4ae6c4', 'fr', 'Services', 'Services'),
	(93, 'b18fe335b4f5b8aa29c594738bfe75f7', 'fr', 'Indiquez quels services seront Ã  disposition des gampeurs durant leur sÃ©jour.', 'Indiquez quels services seront Ã  disposition des gampeurs durant leur sÃ©jour.'),
	(94, '76868c4fd05f9a4372abc60dd36479a0', 'fr', 'ActivitÃ©s', 'ActivitÃ©s'),
	(95, '11129ffd2f259512dc4204b1938a8bf8', 'fr', 'PrÃ©cisez les activitÃ©s possibles Ã  proximitÃ© de votre emplacement pour donner encore plus de visibilitÃ© Ã  votre annonce.', 'PrÃ©cisez les activitÃ©s possibles Ã  proximitÃ© de votre emplacement pour donner encore plus de visibilitÃ© Ã  votre annonce.'),
	(96, 'bc138131629e312572f811a97f506f44', 'fr', 'Prix', 'Prix'),
	(97, '395516a1a3a34a5c21c0a6c06d6fe389', 'fr', 'Ca ne va pas du tout', 'Ca ne va pas du tout'),
	(98, 'a1a6a337255f30f2108e72f6d5deb994', 'fr', 'Prix 1 emplacement + 1 adulte', 'Prix 1 emplacement + 1 adulte'),
	(99, 'f10c2230c42c963b9c3a6f581aeb6695', 'fr', 'Prix par personne suppÃ©mentaire', 'Prix par personne suppÃ©mentaire'),
	(100, 'eb45072b44abe4f1e455b91df69dd919', 'fr', 'Devise :', 'Devise :'),
	(101, 'c93b955b6e1e9aec18a454296336acd9', 'fr', 'Euros', 'Euros'),
	(102, '4ef781b1cb5e5d83fec0ebb0dd3c5761', 'fr', 'Dollar', 'Dollar'),
	(103, '50d46c2f993f4c6ab66c095555dcc401', 'fr', 'Adresse', 'Adresse'),
	(104, '06c0f2c1e3e971af8d7a9da8a738d6e9', 'fr', 'Cette adresse ne sera pas visible publiquement mais permettra de positionner approximativement votre emplacement sur des cartes ou plus tard pour permettre la recherche par gÃ©olocalisation.', 'Cette adresse ne sera pas visible publiquement mais permettra de positionner approximativement votre emplacement sur des cartes ou plus tard pour permettre la recherche par gÃ©olocalisation.'),
	(105, '9117fd5ec8e365e093407fd33a5b490f', 'fr', 'Choisir un pays', 'Choisir un pays'),
	(106, '04989c12995989f9242f8d339e7c28fd', 'fr', 'Choisir une rÃ©gion', 'Choisir une rÃ©gion'),
	(107, 'a3041ae01f950a0670d826aeacafa55f', 'fr', 'Adresse (suite - optionnel)', 'Adresse (suite - optionnel)'),
	(108, 'db17b3566c9be74a5dd2eec0852616cd', 'fr', 'Code postal', 'Code postal'),
	(109, '92e2da12c19a4943821044eb760eea09', 'fr', 'Ville', 'Ville'),
	(110, 'cab28a729670b4b1d47a19e95b2b20b7', 'fr', 'Envoyer !', 'Envoyer !'),
	(111, '8cc8053add53f71c7af207e11b59028b', 'fr', 'TÃ©moignages', 'TÃ©moignages'),
	(112, 'b148bcf24c5fac0823eb4a9f5a54b5c0', 'fr', 'Jean Marc</strong>, gamper', 'Jean Marc</strong>, gamper'),
	(113, 'aaf25f842afcf592c1801505a7a3e9d1', 'fr', 'My money\'s in that office, right? If she start giving me some bullshit about it ain\'t there, and we got to go someplace else and get it, I\'m gonna shoot you in the head then and there.', 'My money\'s in that office, right? If she start giving me some bullshit about it ain\'t there, and we got to go someplace else and get it, I\'m gonna shoot you in the head then and there.'),
	(114, '76fae4dd07e947b3ffa42db7bb091a73', 'fr', 'Quelques chiffres', 'Quelques chiffres'),
	(115, '2569811b4bb9ede62f35761b712c2c65', 'fr', 'DÃ©jÃ  plus de <strong>250 gampeurs</strong> ont Ã©tÃ© mis en relation avec un hÃ´te.', 'DÃ©jÃ  plus de <strong>250 gampeurs</strong> ont Ã©tÃ© mis en relation avec un hÃ´te.'),
	(116, 'fdf34c674e40bd9513ba91adc745335d', 'fr', 'Gamping.com, c\'est <strong>250</strong> hÃ´tes dans 11 pays !', 'Gamping.com, c\'est <strong>250</strong> hÃ´tes dans 11 pays !'),
	(117, 'f910755f3bbdfea4820e9f91e3cf629c', 'fr', 'personne', 'personne'),
	(118, 'd1da60667d0ed36800018e56c88426ac', 'fr', 'personnes', 'personnes'),
	(119, '315577e269d905c6d4eaa0e31afc67f8', 'fr', 'Parlez-nous de votre terrain.', 'Parlez-nous de votre terrain.'),
	(120, '7aeec7512243fe22d68b59daad6939c7', 'fr', 'DÃ©crivez votre terrain pour vos futurs campeurs...', 'DÃ©crivez votre terrain pour vos futurs campeurs...'),
	(121, '4ced10d567a43ea4672638cb653e6b6a', 'fr', 'Listez ici les rÃ¨gles que les campeurs devront respecter...', 'Listez ici les rÃ¨gles que les campeurs devront respecter...'),
	(122, 'a7c4a73c05a2ca29b3ea49d14b93a28c', 'en', 'Proposez votre terrain en 1 minute. (gratuit)', 'Proposez votre terrain en 1 minute. (gratuit)'),
	(123, 'c25dc99150b90ec343fc9b47d57546cc', 'en', 'Qui voulez vous recevoir ?', 'Qui voulez vous recevoir ?'),
	(124, '5cc127032c60ad959a48a36636b156e1', 'en', 'Tente', 'Tente'),
	(125, 'd7f8c7a175f2cf745cc3ff4bd05663ad', 'en', 'Caravan', 'Caravan'),
	(126, 'e4d744df29f60d00f0ae787effe5d2f8', 'en', 'Camping car', 'Camping car'),
	(127, 'f910755f3bbdfea4820e9f91e3cf629c', 'en', 'personne', 'personne'),
	(128, 'd1da60667d0ed36800018e56c88426ac', 'en', 'personnes', 'personnes'),
	(129, 'e8d9fefc6d56954248e5bebf8c55a5ae', 'en', 'Situation', 'Situation'),
	(130, '992a0f0542384f1ee5ef51b7cf4ae6c4', 'en', 'Services', 'Services'),
	(131, 'b18fe335b4f5b8aa29c594738bfe75f7', 'en', 'Indiquez quels services seront Ã  disposition des gampeurs durant leur sÃ©jour.', 'Indiquez quels services seront Ã  disposition des gampeurs durant leur sÃ©jour.'),
	(132, '76868c4fd05f9a4372abc60dd36479a0', 'en', 'ActivitÃ©s', 'ActivitÃ©s'),
	(133, '11129ffd2f259512dc4204b1938a8bf8', 'en', 'PrÃ©cisez les activitÃ©s possibles Ã  proximitÃ© de votre emplacement pour donner encore plus de visibilitÃ© Ã  votre annonce.', 'PrÃ©cisez les activitÃ©s possibles Ã  proximitÃ© de votre emplacement pour donner encore plus de visibilitÃ© Ã  votre annonce.'),
	(134, 'bc138131629e312572f811a97f506f44', 'en', 'Prix', 'Prix'),
	(135, '395516a1a3a34a5c21c0a6c06d6fe389', 'en', 'Ca ne va pas du tout', 'Ca ne va pas du tout'),
	(136, 'a1a6a337255f30f2108e72f6d5deb994', 'en', 'Prix 1 emplacement + 1 adulte', 'Prix 1 emplacement + 1 adulte'),
	(137, 'f10c2230c42c963b9c3a6f581aeb6695', 'en', 'Prix par personne suppÃ©mentaire', 'Prix par personne suppÃ©mentaire'),
	(138, 'eb45072b44abe4f1e455b91df69dd919', 'en', 'Devise :', 'Devise :'),
	(139, '315577e269d905c6d4eaa0e31afc67f8', 'en', 'Parlez-nous de votre terrain.', 'Parlez-nous de votre terrain.'),
	(140, '7aeec7512243fe22d68b59daad6939c7', 'en', 'DÃ©crivez votre terrain pour vos futurs campeurs...', 'DÃ©crivez votre terrain pour vos futurs campeurs...'),
	(141, '4ced10d567a43ea4672638cb653e6b6a', 'en', 'Listez ici les rÃ¨gles que les campeurs devront respecter...', 'Listez ici les rÃ¨gles que les campeurs devront respecter...'),
	(142, '50d46c2f993f4c6ab66c095555dcc401', 'en', 'Adresse', 'Adresse'),
	(143, '06c0f2c1e3e971af8d7a9da8a738d6e9', 'en', 'Cette adresse ne sera pas visible publiquement mais permettra de positionner approximativement votre emplacement sur des cartes ou plus tard pour permettre la recherche par gÃ©olocalisation.', 'Cette adresse ne sera pas visible publiquement mais permettra de positionner approximativement votre emplacement sur des cartes ou plus tard pour permettre la recherche par gÃ©olocalisation.'),
	(144, '9117fd5ec8e365e093407fd33a5b490f', 'en', 'Choisir un pays', 'Choisir un pays'),
	(145, '04989c12995989f9242f8d339e7c28fd', 'en', 'Choisir une rÃ©gion', 'Choisir une rÃ©gion'),
	(146, 'a3041ae01f950a0670d826aeacafa55f', 'en', 'Adresse (suite - optionnel)', 'Adresse (suite - optionnel)'),
	(147, 'db17b3566c9be74a5dd2eec0852616cd', 'en', 'Code postal', 'Code postal'),
	(148, '92e2da12c19a4943821044eb760eea09', 'en', 'Ville', 'Ville'),
	(149, 'cab28a729670b4b1d47a19e95b2b20b7', 'en', 'Envoyer !', 'Envoyer !'),
	(150, '8cc8053add53f71c7af207e11b59028b', 'en', 'TÃ©moignages', 'TÃ©moignages'),
	(151, 'b148bcf24c5fac0823eb4a9f5a54b5c0', 'en', 'Jean Marc</strong>, gamper', 'Jean Marc</strong>, gamper'),
	(152, 'aaf25f842afcf592c1801505a7a3e9d1', 'en', 'My money\'s in that office, right? If she start giving me some bullshit about it ain\'t there, and we got to go someplace else and get it, I\'m gonna shoot you in the head then and there.', 'My money\'s in that office, right? If she start giving me some bullshit about it ain\'t there, and we got to go someplace else and get it, I\'m gonna shoot you in the head then and there.'),
	(153, '76fae4dd07e947b3ffa42db7bb091a73', 'en', 'Quelques chiffres', 'Quelques chiffres'),
	(154, '2569811b4bb9ede62f35761b712c2c65', 'en', 'DÃ©jÃ  plus de <strong>250 gampeurs</strong> ont Ã©tÃ© mis en relation avec un hÃ´te.', 'DÃ©jÃ  plus de <strong>250 gampeurs</strong> ont Ã©tÃ© mis en relation avec un hÃ´te.'),
	(155, 'fdf34c674e40bd9513ba91adc745335d', 'en', 'Gamping.com, c\'est <strong>250</strong> hÃ´tes dans 11 pays !', 'Gamping.com, c\'est <strong>250</strong> hÃ´tes dans 11 pays !'),
	(156, '9cd01d7d2ee89e39f25331e85f68e7e1', 'en', 'Titre de votre annonce', 'Titre de votre annonce'),
	(157, '9cd01d7d2ee89e39f25331e85f68e7e1', 'fr', 'Titre de votre annonce', 'Titre de votre annonce'),
	(158, '6d18decb5418aa4ec1be830b3c90ff72', 'en', 'Pour vous joindre', 'Pour vous joindre'),
	(159, '2b345a63b2e9458285da5bcc8f5a2ad9', 'en', 'Indiquez les informations relatives Ã  votre compte', 'Indiquez les informations relatives Ã  votre compte'),
	(160, 'e2ee86d09416a88ce2c85cf661813647', 'en', 'Votre prÃ©nom', 'Votre prÃ©nom'),
	(161, 'e7102fd5d8349c52289cf22e60c5c48f', 'en', 'Votre nom', 'Votre nom'),
	(162, 'f6983a2eebc7003bf15c36cc6241273e', 'en', 'Votre email', 'Votre email'),
	(163, '8729ccb7f2912ff0b735782ba926b606', 'en', 'Votre mot de passe', 'Votre mot de passe'),
	(164, '6d18decb5418aa4ec1be830b3c90ff72', 'fr', 'Pour vous joindre', 'Pour vous joindre'),
	(165, '2b345a63b2e9458285da5bcc8f5a2ad9', 'fr', 'Indiquez les informations relatives Ã  votre compte', 'Indiquez les informations relatives Ã  votre compte'),
	(166, 'e2ee86d09416a88ce2c85cf661813647', 'fr', 'Votre prÃ©nom', 'Votre prÃ©nom'),
	(167, 'e7102fd5d8349c52289cf22e60c5c48f', 'fr', 'Votre nom', 'Votre nom'),
	(168, 'f6983a2eebc7003bf15c36cc6241273e', 'fr', 'Votre email', 'Votre email'),
	(169, '8729ccb7f2912ff0b735782ba926b606', 'fr', 'Votre mot de passe', 'Votre mot de passe'),
	(170, '5334a132b4970410f975d8d3dd3d0acf', 'fr', 'Il faut au moins 1 type d\'emplacement', 'Il faut au moins 1 type d\'emplacement'),
	(171, '03562171c71f9b0b33fee7d02e286533', 'fr', 'Les prix sont obligatoires', 'Les prix sont obligatoires'),
	(172, '85da6131be6d94410f89895e6d1d9cd0', 'fr', 'Le titre est obligatoire', 'Le titre est obligatoire'),
	(173, '44b5a89c24de651787af9fe2dcc04a3f', 'fr', 'La description est obligatoire', 'La description est obligatoire'),
	(174, '6fcfa53f9d4165b7a44393c0275fd76f', 'en', 'Terrain pour :', 'Terrain pour :'),
	(175, '1dea599d1d3c362174dc0eeafcd2d2ad', 'en', 'Tentes autorisÃ©es', 'Tentes autorisÃ©es'),
	(176, '5258bc32dff56bda1cd07e0fd514c0db', 'en', 'Caravanes autorisÃ©es', 'Caravanes autorisÃ©es'),
	(177, '0b1f8f32366c4c034e5d5419468a4054', 'en', 'Camping car autorisÃ©s', 'Camping car autorisÃ©s'),
	(178, '3bfe844e95129897ea428d9bc2355721', 'fr', 'Adresse incomplÃ¨te. Seul le champ adresse2 est optionnel', 'Adresse incomplÃ¨te. Seul le champ adresse2 est optionnel'),
	(179, '682386fab74d3a3e79c1ce430ca44c98', 'fr', 'Informations incomplÃ¨tes', 'Informations incomplÃ¨tes'),
	(180, 'a7c80cc12db4706c96c101d26960dad2', 'en', 'Contacter l\'hÃ´te', 'Contacter l\'hÃ´te'),
	(181, 'e7a152113a3ca0cfda0b07e9c51156d3', 'fr', 'Merci d\'avoir rempli le formulaire !', 'Merci d\'avoir rempli le formulaire !'),
	(182, '5334a132b4970410f975d8d3dd3d0acf', 'en', 'Il faut au moins 1 type d\'emplacement', 'Il faut au moins 1 type d\'emplacement'),
	(183, '03562171c71f9b0b33fee7d02e286533', 'en', 'Les prix sont obligatoires', 'Les prix sont obligatoires'),
	(184, '85da6131be6d94410f89895e6d1d9cd0', 'en', 'Le titre est obligatoire', 'Le titre est obligatoire'),
	(185, '44b5a89c24de651787af9fe2dcc04a3f', 'en', 'La description est obligatoire', 'La description est obligatoire'),
	(186, '3bfe844e95129897ea428d9bc2355721', 'en', 'Adresse incomplÃ¨te. Seul le champ adresse2 est optionnel', 'Adresse incomplÃ¨te. Seul le champ adresse2 est optionnel'),
	(187, '682386fab74d3a3e79c1ce430ca44c98', 'en', 'Informations incomplÃ¨tes', 'Informations incomplÃ¨tes'),
	(188, '0afbbf2f70d39364971ef07f8fa0790e', 'en', 'Connexion', 'Connexion'),
	(189, '848f230a24fe58d7a837ca3c1df228d0', 'en', 'Le camping chez l\'habitant', 'Le camping chez l\'habitant'),
	(190, '670d133581213d9bf0c168776f940133', 'en', 'Proposez votre terrain', 'Proposez votre terrain'),
	(191, 'abbe4e433a358bc339384826c58b7593', 'en', 'Ils en parlent', 'Ils en parlent'),
	(192, 'e7a152113a3ca0cfda0b07e9c51156d3', 'en', 'Merci d\'avoir rempli le formulaire !', 'Merci d\'avoir rempli le formulaire !'),
	(193, '6fcfa53f9d4165b7a44393c0275fd76f', 'fr', 'Terrain pour :', 'Terrain pour :'),
	(194, '1dea599d1d3c362174dc0eeafcd2d2ad', 'fr', 'Tentes autorisÃ©es', 'Tentes autorisÃ©es'),
	(195, '5258bc32dff56bda1cd07e0fd514c0db', 'fr', 'Caravanes autorisÃ©es', 'Caravanes autorisÃ©es'),
	(196, '0b1f8f32366c4c034e5d5419468a4054', 'fr', 'Camping car autorisÃ©s', 'Camping car autorisÃ©s'),
	(197, 'a7c80cc12db4706c96c101d26960dad2', 'fr', 'Contacter l\'hÃ´te', 'Contacter l\'hÃ´te'),
	(198, '8b0c868c80d1ea9f010b1eccd3bcd982', 'en', 'Les prix sont indicatifs. Contactez l\'hÃ´te mÃªme si le prix ne vous convient pas.', 'Les prix sont indicatifs. Contactez l\'hÃ´te mÃªme si le prix ne vous convient pas.'),
	(199, '8b0c868c80d1ea9f010b1eccd3bcd982', 'fr', 'Les prix sont indicatifs. Contactez l\'hÃ´te mÃªme si le prix ne vous convient pas.', 'Les prix sont indicatifs. Contactez l\'hÃ´te mÃªme si le prix ne vous convient pas.');
/*!40000 ALTER TABLE `translation_engine` ENABLE KEYS */;


-- Dumping structure for table gamping.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `description` text,
  `language` varchar(3) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_banned` tinyint(1) DEFAULT NULL,
  `picture_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table gamping.user: ~9 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `firstname`, `lastname`, `city`, `country`, `description`, `language`, `email`, `phone`, `password`, `created_at`, `updated_at`, `is_banned`, `picture_id`) VALUES
	(1, 'Olivier', 'MADRE', 'Cannes', 'France', NULL, NULL, NULL, NULL, NULL, '2013-12-14 11:12:00', '0000-00-00 00:00:00', NULL, 1),
	(3, 'Olivier', 'MADRE', '', '', '', '', 'terenas@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', NULL, '2013-12-14 23:02:24', '0000-00-00 00:00:00', 0, 1),
	(6, 'qsdqdsdsq', 'MADRE', '', '', '', '', 'terenas@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', NULL, '2013-12-14 23:12:00', '0000-00-00 00:00:00', 0, NULL),
	(9, 'qsdqdsdsq', 'MADRE', '', '', '', '', 'terenas@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', NULL, '2013-12-14 23:27:31', '0000-00-00 00:00:00', 0, NULL),
	(11, 'qsdqdsdsq', 'MADRE', '', '', '', '', 'terenas@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf', NULL, '2013-12-14 23:29:35', '0000-00-00 00:00:00', 0, NULL),
	(12, 'Olivier', 'MADRE', '', '', '', '', 'terenas@gmail.Com', '89823bb802118a5205d28d8e51950a', NULL, '2013-12-15 00:00:16', '0000-00-00 00:00:00', 0, NULL),
	(14, 'Olivier', 'MADRE', '', '', '', '', 'terenas@gmail.com', '89823bb802118a5205d28d8e51950a', NULL, '2013-12-15 00:52:31', '0000-00-00 00:00:00', 0, NULL),
	(15, 'Olivier', 'MADRE', '', '', '', '', 'terenas@gmail.com', 'd41d8cd98f00b204e9800998ecf842', NULL, '2013-12-15 00:56:13', '0000-00-00 00:00:00', 0, NULL),
	(16, 'Olivier', 'MADRE', '', '', '', '', 'terenas@gmail.com', 'd41d8cd98f00b204e9800998ecf842', NULL, '2013-12-15 00:56:25', '0000-00-00 00:00:00', 0, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
