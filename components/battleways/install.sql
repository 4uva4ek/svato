CREATE TABLE IF NOT EXISTS `#__battleways` (
  `id` int(11) NOT NULL auto_increment,
  `datetime` datetime NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `user` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `color` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


CREATE TABLE IF NOT EXISTS `#__battleways_color` (
  `id` int(11) NOT NULL auto_increment,
  `color` varchar(50) NOT NULL,
  `published` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `font_color_title` varchar(200) NOT NULL,
  `font_color` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
