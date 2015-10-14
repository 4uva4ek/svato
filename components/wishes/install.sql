CREATE TABLE IF NOT EXISTS `#__wishes` (`id` INT( 11 ) NOT NULL AUTO_INCREMENT ,
`title` VARCHAR( 250 ) NOT NULL ,
`info` TEXT NOT NULL ,
`published` INT( 2 ) NOT NULL ,
`datetime` DATETIME NOT NULL ,
`user_id` INT( 11 ) NOT NULL ,
`rate` INT( 11 ) NOT NULL ,
`type` VARCHAR( 11 ) NOT NULL ,
`ip` VARCHAR( 50 ) NOT NULL ,
`browser` TEXT NOT NULL ,
PRIMARY KEY ( `id` ) ,
UNIQUE (
`id` 
)
) ENGINE = MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `#__wishes_cat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `descr` mediumtext NOT NULL,
  `published` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `who_create` int(11) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `class` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;