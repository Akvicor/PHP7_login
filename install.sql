CREATE DATABASE IF NOT EXISTS `website`;
CREATE TABLE IF NOT EXISTS `website`.`users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique user id, if somebody has same nickname.',
  `username` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'username needs no comment.',
  `password` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'password in SHA256.',
  `mail` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Email of user',
  `key` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Backup key, if created',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='All users data.';
