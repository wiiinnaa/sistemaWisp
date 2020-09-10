-- MySQL Script generated by MySQL Workbench
-- Sun Sep  6 11:59:02 2020
-- Model: Sakila Full    Version: 2.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema bdwisp
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bdwisp` ;

-- -----------------------------------------------------
-- Schema bdwisp
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bdwisp` ;
USE `bdwisp` ;

-- -----------------------------------------------------
-- Table `bdwisp`.`tarifa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdwisp`.`tarifa` ;

CREATE TABLE IF NOT EXISTS `bdwisp`.`tarifa` (
  `idTarifa` INT NOT NULL AUTO_INCREMENT,
  `nombreTarifa` VARCHAR(45) NOT NULL,
  `descargarTarifa` VARCHAR(45) NULL,
  `subidaTarifa` VARCHAR(45) NULL,
  `precioTarifa` DECIMAL(7,2) NULL,
  PRIMARY KEY (`idTarifa`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwisp`.`cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdwisp`.`cliente` ;

CREATE TABLE IF NOT EXISTS `bdwisp`.`cliente` (
  `idCliente` INT NOT NULL AUTO_INCREMENT,
  `nombreCliente` VARCHAR(45) NOT NULL,
  `apellidoCliente` VARCHAR(45) NULL,
  `telefonoCliente` INT(9) NULL,
  `provinciaCliente` VARCHAR(45) NULL,
  `distritoCliente` VARCHAR(45) NULL,
  `direccionCliente` VARCHAR(45) NULL,
  `rucCliente` INT(11) NULL,
  `razonSocialCliente` VARCHAR(45) NULL,
  `fechInicPerioCliente` DATE NULL,
  `fechFinPerioCliente` DATE NULL,
  `diasPendientes` INT NULL,
  `comentarioCliente` TEXT(100) NULL,
  `apCliente` VARCHAR(45) NULL,
  `tarifa_idTarifa` INT NOT NULL,
  PRIMARY KEY (`idCliente`),
  INDEX `fk_cliente_tarifa1_idx` (`tarifa_idTarifa` ASC),
  CONSTRAINT `fk_cliente_tarifa1`
    FOREIGN KEY (`tarifa_idTarifa`)
    REFERENCES `bdwisp`.`tarifa` (`idTarifa`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwisp`.`antena`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdwisp`.`antena` ;

CREATE TABLE IF NOT EXISTS `bdwisp`.`antena` (
  `idAntena` INT NOT NULL AUTO_INCREMENT,
  `nombreAntena` VARCHAR(45) NOT NULL,
  `modeloAntena` VARCHAR(45) NULL,
  `modoAntena` VARCHAR(45) NULL,
  `ipAntena` VARCHAR(20) NOT NULL,
  `usuarioAntena` VARCHAR(45) NULL,
  `claveAntena` VARCHAR(45) NULL,
  `macAntena` VARCHAR(17) NULL,
  `ubicacionAntena` VARCHAR(45) NULL,
  `cliente_idCliente` INT NOT NULL,
  PRIMARY KEY (`idAntena`),
  UNIQUE INDEX `idAntena_UNIQUE` (`idAntena` ASC),
  INDEX `fk_antena_cliente_idx` (`cliente_idCliente` ASC),
  CONSTRAINT `fk_antena_cliente`
    FOREIGN KEY (`cliente_idCliente`)
    REFERENCES `bdwisp`.`cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwisp`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdwisp`.`usuario` ;

CREATE TABLE IF NOT EXISTS `bdwisp`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `usuarioUsuario` VARCHAR(45) NOT NULL,
  `claveUsuario` VARCHAR(45) NOT NULL,
  `nombreUsuario` VARCHAR(45) NOT NULL,
  `apellidoUsuario` VARCHAR(45) NULL,
  `telefonoUsuario` INT(9) NULL,
  `cargoUsuario` VARCHAR(45) NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdwisp`.`comprobante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bdwisp`.`comprobante` ;

CREATE TABLE IF NOT EXISTS `bdwisp`.`comprobante` (
  `idComprobante` INT NOT NULL AUTO_INCREMENT,
  `fechaComprobante` DATETIME NOT NULL,
  `periodoComprobante` VARCHAR(45) NULL,
  `montoComprobante` DECIMAL(7,2) NULL,
  `saldoComprobante` DECIMAL(7,2) NULL,
  `usuario_idUsuario` INT NOT NULL,
  `cliente_idCliente` INT NOT NULL,
  `usuario_idUsuario1` INT NOT NULL,
  PRIMARY KEY (`idComprobante`),
  INDEX `fk_comprobante_cliente1_idx` (`cliente_idCliente` ASC),
  INDEX `fk_comprobante_usuario1_idx` (`usuario_idUsuario1` ASC),
  CONSTRAINT `fk_comprobante_cliente1`
    FOREIGN KEY (`cliente_idCliente`)
    REFERENCES `bdwisp`.`cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comprobante_usuario1`
    FOREIGN KEY (`usuario_idUsuario1`)
    REFERENCES `bdwisp`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
