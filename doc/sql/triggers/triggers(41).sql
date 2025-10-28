USE smgyd_suimvm;	CREATE TABLE IF NOT EXISTS `smgyd_suimvm`.`suimvm_auditoria` (
			  `aud_id` int(10) unsigned NOT NULL auto_increment,
			  `accion` varchar(25)  default NULL,
			  `tabla` varchar(45)  NOT NULL,
			  `campo` varchar(45) default NULL,
			  `registro_id` int(10) unsigned default NULL,
			  `val_old` text  default NULL,
			  `val_new` text  default NULL,
			  `usuario` varchar(45)  default NULL,
			  `dir_ip` varchar(255)  default NULL,
			  `marca` datetime default NULL,
			  PRIMARY KEY  (`aud_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci AUTO_INCREMENT=1 ;