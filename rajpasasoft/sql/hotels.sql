DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `bus_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `address` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `phone` varchar(500) DEFAULT NULL,
  `hotel_name` varchar(500) DEFAULT NULL,
  `total_room` varchar(500) DEFAULT NULL,
  `check_in` varchar(500) DEFAULT NULL,
  `check_out` varchar(500) DEFAULT NULL,
  `facility` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `BusrajCode` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`bus_id`),
  FULLTEXT KEY `idx_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;