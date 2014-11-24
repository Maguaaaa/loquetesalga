CREATE TABLE `loquetesalga`.`comentarios` (
`id` int( 100 ) NOT NULL AUTO_INCREMENT ,
`nombre` varchar( 100 ) NOT NULL ,
`email` varchar( 100 ) NOT NULL ,
`comentario` varchar( 1000 ) NOT NULL ,
`comentarioip` varchar( 100 ) NOT NULL ,
`hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
`padre` int( 10 ) NOT NULL DEFAULT '0',
`bien` int( 10 ) NOT NULL ,
`bienip` varchar( 100 ) NOT NULL ,
`mal` int( 10 ) NOT NULL ,
`malip` varchar( 100 ) NOT NULL ,
KEY `id` ( `id` )
) ENGINE = MYISAM DEFAULT CHARSET = latin1;