CREATE TABLE `db_vila`.`tb_reg_ponto` ( 
	`id_rp` INT NOT NULL AUTO_INCREMENT , 
	`id_usuario` INT NOT NULL , 
	`tipo` INT NOT NULL , 
	`reg` DATETIME NOT NULL , 
	PRIMARY KEY (`id_rp`)
) ENGINE = InnoDB;

ALTER TABLE `tb_usuario` ADD `empresa` INT NOT NULL AFTER `ativo_usuario`;

ALTER TABLE `tb_usuario` ADD `cargo` VARCHAR(200) NOT NULL AFTER `empresa`, ADD `n_registro` VARCHAR(100) NOT NULL AFTER `cargo`, ADD `ctps` VARCHAR(100) NOT NULL AFTER `n_registro`, ADD `admissao` DATE NOT NULL AFTER `ctps`;