DROP TABLE IF EXISTS `goal`;
CREATE TABLE  `cv`.`goal` (
`user_id` INT NOT NULL ,
`position` VARCHAR( 24 ) NULL ,
`objective` VARCHAR( 255 ) NULL ,
UNIQUE (
`user_id`
))
