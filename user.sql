CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(60) NULLABLE,
  `auth_token` varchar(128) DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
)
PRIMARY KEY (`id`);
ENGINE=InnoDB
DEFAULT CHARSET=utf8;
