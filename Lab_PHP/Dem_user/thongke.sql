
CREATE TABLE `user_online` (
`id` VARCHAR( 50 ) NOT NULL ,
`lastvisit` INT( 14 ) NOT NULL,
`user` VARCHAR( 100 ) NULL
);

CREATE TABLE `counter` (
  `cnt` int(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `counter` VALUES (0);
