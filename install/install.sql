CREATE DATABASE IF NOT EXISTS `website`;
CREATE TABLE IF NOT EXISTS `website`.`users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique user id, if somebody has same nickname.',
  `username` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'username needs no comment.',
  `user_password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'password in SHA256.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`),
  UNIQUE KEY `user_email` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='All users data.';
