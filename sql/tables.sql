delimiter $$

CREATE TABLE `slk_logs` (
  `idx` int(11) NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `referer` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `query` text,
  `regdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='SLK Logs'$$

CREATE TABLE `slk_redirects` (
  `code` varchar(15) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `register` int(11) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='SLK Redirect list'$$

CREATE TABLE `slk_register` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(30) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `regdate` datetime DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='SLK Register list.'$$
