CREATE TABLE IF NOT EXISTS `visits` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `uniquekey` varchar(100) NOT NULL,
  `conntime` int(40) NOT NULL,
  `connday` varchar(40) NOT NULL,
  `url` varchar(100) NOT NULL,
  `useragent` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;