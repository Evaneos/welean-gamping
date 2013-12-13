CREATE TABLE IF NOT EXISTS `country` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `picture` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `url` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `parcel_has_picture` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `parcel_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',
    `picture_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    INDEX `FK_parcel_has_picture_parcel` (`parcel_id`),
    INDEX `FK_parcel_has_picture_picture` (`picture_id`),
    CONSTRAINT `FK_parcel_has_picture_parcel` FOREIGN KEY (`parcel_id`) REFERENCES `parcel` (`id`),
    CONSTRAINT `FK_parcel_has_picture_picture` FOREIGN KEY (`picture_id`) REFERENCES `picture` (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `place` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `situation_geo` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `place_has_situation_geo` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `place_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',
    `situation_geo_id` INT(10) UNSIGNED NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    INDEX `FK__place` (`place_id`),
    INDEX `FK__situation_geo` (`situation_geo_id`),
    CONSTRAINT `FK__place` FOREIGN KEY (`place_id`) REFERENCES `place` (`id`),
    CONSTRAINT `FK__situation_geo` FOREIGN KEY (`situation_geo_id`) REFERENCES `situation_geo` (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `region` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT `FK__country` FOREIGN KEY (`id`) REFERENCES `country` (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB;

