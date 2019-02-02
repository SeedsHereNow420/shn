CREATE TABLE IF NOT EXISTS `PREFIX_opp_bookmarks` (
    `id_order` INT(11) NOT NULL,
    `bookmark_a` TINYINT(4) NOT NULL DEFAULT '0',
    `bookmark_b` TINYINT(4) NOT NULL DEFAULT '0',
    `notes` TEXT NULL,
    PRIMARY KEY (`id_order`),
    INDEX `bookmark_a` (`bookmark_a`),
    INDEX `bookmark_b` (`bookmark_b`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
CREATE TABLE IF NOT EXISTS `PREFIX_opp_category_filter` (
    `id_category` INT(11) NOT NULL,
    `id_shop` INT(11) NOT NULL,
    `id_employee` INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
CREATE TABLE IF NOT EXISTS `PREFIX_opp_customer_group_filter` (
    `id_customer_group` INT(11) NOT NULL,
    `id_shop` INT(11) NOT NULL,
    `id_employee` INT(11) NOT NULL,
    PRIMARY KEY (`id_shop`, `id_employee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
CREATE TABLE IF NOT EXISTS `PREFIX_opp_product_filter` (
    `id_product` INT(11),
    `name` VARCHAR(255),
    `id_shop` INT(11) NOT NULL,
    `id_employee` INT(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
CREATE TABLE IF NOT EXISTS `PREFIX_opp_exclude_categories` (
    `exclude` TINYINT(1) NOT NULL DEFAULT '0',
    `id_shop` INT(11) NOT NULL,
    `id_employee` INT(11) NOT NULL,
    PRIMARY KEY (`id_shop`, `id_employee`)
) ENGINE=InnoDB;
