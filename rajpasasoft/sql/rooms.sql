DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `bus_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `room_no` varchar(500) DEFAULT NULL,
  `total_bed` varchar(500) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `room_type` varchar(500) DEFAULT NULL,
  `room_type2` varchar(500) DEFAULT NULL,
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