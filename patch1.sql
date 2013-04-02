DROP TABLE IF EXISTS `goal`;
CREATE TABLE  `cv`.`goal` (
`user_id` INT NOT NULL ,
`position` VARCHAR( 24 ) NULL ,
`objective` VARCHAR( 255 ) NULL ,
UNIQUE (
`user_id`
));

DROP TABLE IF EXISTS `education`;
CREATE TABLE  `cv`.`education` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`user_id` INT NOT NULL ,
`qualification` VARCHAR( 64 ) NULL ,
`institution` VARCHAR( 64 ) NULL ,
`start_date` VARCHAR( 24 ) NULL ,
`end_date` VARCHAR( 24 ) NULL
);
