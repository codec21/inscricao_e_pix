-- MySQL Script generated by MySQL Workbench
-- Thu May 27 00:48:34 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema war_league
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema war_league
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `war_league` DEFAULT CHARACTER SET utf8 ;
USE `war_league` ;

-- -----------------------------------------------------
-- Table `war_league`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `war_league`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nome_user` VARCHAR(205) NULL,
  `nome` VARCHAR(1045) NULL,
  `sobrenome` VARCHAR(1045) NULL,
  `senha` VARCHAR(32) NULL,
  `email` VARCHAR(1045) NULL,
  `nic_name` VARCHAR(45) NULL,
  `telefone` VARCHAR(45) NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `war_league`.`user_adm`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `war_league`.`user_adm` (
  `iduser_adm` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(1045) NULL,
  `sobrenome` VARCHAR(1045) NULL,
  `nome_user` VARCHAR(205) NULL,
  `senha` VARCHAR(32) NULL,
  PRIMARY KEY (`iduser_adm`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `war_league`.`evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `war_league`.`evento` (
  `idevento` INT NOT NULL AUTO_INCREMENT,
  `nome_evento` VARCHAR(1045) NULL,
  `descricao_evento` VARCHAR(2000) NULL,
  `valor` INT NULL,
  `status` INT NULL,
  `cor` VARCHAR(10) NULL,
  `user_adm_iduser_adm` INT NOT NULL,
  PRIMARY KEY (`idevento`),
  INDEX `fk_evento_user_adm1_idx` (`user_adm_iduser_adm` ASC) ,
  CONSTRAINT `fk_evento_user_adm1`
    FOREIGN KEY (`user_adm_iduser_adm`)
    REFERENCES `war_league`.`user_adm` (`iduser_adm`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `war_league`.`inscricao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `war_league`.`inscricao` (
  `idinscricao` INT NOT NULL AUTO_INCREMENT,
  `cod_pix` VARCHAR(45) NULL,
  `nic_name` VARCHAR(45) NULL,
  `nic_name2` VARCHAR(45) NULL,
  `nic_name3` VARCHAR(45) NULL,
  `status_inscricao` INT NULL,
  `evento_idevento` INT NOT NULL,
  `usuario_idusuario` INT NOT NULL,
  PRIMARY KEY (`idinscricao`),
  INDEX `fk_inscricao_evento1_idx` (`evento_idevento` ASC) ,
  INDEX `fk_inscricao_usuario1_idx` (`usuario_idusuario` ASC) ,
  CONSTRAINT `fk_inscricao_evento1`
    FOREIGN KEY (`evento_idevento`)
    REFERENCES `war_league`.`evento` (`idevento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_inscricao_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `war_league`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
