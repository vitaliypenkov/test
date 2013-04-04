DROP TABLE IF EXISTS `projects`;
CREATE TABLE  `cv`.`projects` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`user_id` INT NOT NULL ,
`name` VARCHAR( 64 ) NULL ,
`workload` VARCHAR( 255 ) NULL ,
`responsibilities` VARCHAR( 255 ) NULL ,
`role` VARCHAR( 24 ) NULL ,
`technologies` VARCHAR( 255 ) NULL
) ENGINE = INNODB;
