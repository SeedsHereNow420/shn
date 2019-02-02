/**
* 2010-2017 Webkul.
*
* NOTICE OF LICENSE
*
* All right is reserved,
* Please go through this link for complete license : https://store.webkul.com/license.html
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade this module to newer
* versions in the future. If you wish to customize this module for your
* needs please refer to https://store.webkul.com/customisation-guidelines/ for more information.
*
*  @author    Webkul IN <support@webkul.com>
*  @copyright 2010-2017 Webkul IN
*  @license   https://store.webkul.com/license.html
*/
CREATE TABLE IF NOT EXISTS `PREFIX_wk_news_ticker` (
	`id_news_ticker` int(10) NOT NULL AUTO_INCREMENT,
	`position` int(10) NOT NULL,
	`color` varchar(30),
	`active` tinyint(1) NOT NULL,
	`date_add` datetime NOT NULL,
	`date_upd` datetime NOT NULL,
	PRIMARY KEY (`id_news_ticker`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `PREFIX_wk_news_ticker_lang` (
	`id_news_ticker` int(10) NOT NULL,
	`id_lang` int(10) NOT NULL,
	`message` varchar(200) NOT NULL,
	`anchor_link` varchar(150),
	PRIMARY KEY (`id_news_ticker`, `id_lang`)
) ENGINE=ENGINE_TYPE DEFAULT CHARSET=utf8;