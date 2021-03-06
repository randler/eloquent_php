-- MySQL Script generated by MySQL Workbench
-- Qua 28 Nov 2018 11:22:03 -03
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema eloquent_db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema eloquent_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `eloquent_db` DEFAULT CHARACTER SET latin1 ;
USE `eloquent_db` ;

-- -----------------------------------------------------
-- Table `eloquent_db`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eloquent_db`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `email` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `eloquent_db`.`tarefas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `eloquent_db`.`tarefas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL DEFAULT NULL,
  `descricao` VARCHAR(200) NULL DEFAULT NULL,
  `usuarios_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `usuarios_id`),
  INDEX `fk_tarefas_usuarios_idx` (`usuarios_id` ASC),
  CONSTRAINT `fk_tarefas_usuarios`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `eloquent_db`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
