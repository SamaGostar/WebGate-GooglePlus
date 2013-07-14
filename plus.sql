DROP TABLE IF EXISTS `checked`;
CREATE TABLE IF NOT EXISTS `checked` (
  `id` int(11) NOT NULL auto_increment,
  `user` text collate utf8_unicode_ci NOT NULL,
  `res` text collate utf8_unicode_ci NOT NULL,
  `item_number` text collate utf8_unicode_ci NOT NULL,
  `item_name` text collate utf8_unicode_ci NOT NULL,
  `merchant` text collate utf8_unicode_ci NOT NULL,
  `amount` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `c_pack`;
CREATE TABLE IF NOT EXISTS `c_pack` (
  `id` int(255) NOT NULL auto_increment,
  `name` varchar(255) collate utf8_unicode_ci NOT NULL,
  `coins` int(255) NOT NULL default '0',
  `price` text collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;


INSERT INTO `c_pack` (`id`, `name`, `coins`, `price`) VALUES
(12, 'Points', 200, '100'),
(13, 'Points', 100, '1000'),
(14, 'Points', 300, '3000'),
(15, 'Points', 400, '4000'),
(16, 'Points', 500, '5000'),
(17, 'Points', 1000, '10000');


DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `site_name` text NOT NULL,
  `site_description` text NOT NULL,
  `site_url` varchar(255) NOT NULL,
  `site_email` varchar(255) NOT NULL,
  `zarinpal` text NOT NULL,
  `maintenance` int(11) NOT NULL default '0',
  `m_progress` int(11) NOT NULL default '75'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `settings` VALUES ('site name', 'site description', 'site url', 'site email', 'zarinpal Merchent', 0, 75);


DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL auto_increment,
  `user` text collate utf8_unicode_ci NOT NULL,
  `points` int(11) NOT NULL default '0',
  `pack` text collate utf8_unicode_ci NOT NULL,
  `refID` text collate utf8_unicode_ci NOT NULL,
  `money` decimal(5,0) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

