DROP TABLE IF EXISTS `companyrajs`;
CREATE TABLE IF NOT EXISTS `companyrajs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `CompanyrajCode` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `company_name` varchar(500) DEFAULT NULL,
  `company_email` varchar(500) DEFAULT NULL,
  `company_address` varchar(500) DEFAULT NULL,
  `company_license` varchar(500) DEFAULT NULL,
  `company_logo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `idx_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;