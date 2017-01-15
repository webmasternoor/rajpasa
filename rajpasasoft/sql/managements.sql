DROP TABLE IF EXISTS `managements`;
CREATE TABLE IF NOT EXISTS `managements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `ManagementCode` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `manager_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `password` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `idx_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;