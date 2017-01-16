DROP TABLE IF EXISTS `busrajs`;
CREATE TABLE IF NOT EXISTS `busrajs` (
  `bus_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `departure_time` varchar(500) DEFAULT NULL,
  `arrival_time` varchar(500) DEFAULT NULL,
  `departure_place` varchar(500) DEFAULT NULL,
  `arrival_place` varchar(500) DEFAULT NULL,
  `bus_type` varchar(500) DEFAULT NULL,
  `total_seat` varchar(500) DEFAULT NULL,
  `seat_fare` varchar(500) DEFAULT NULL,
  `facility` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `BusrajCode` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`bus_id`),
  FULLTEXT KEY `idx_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;