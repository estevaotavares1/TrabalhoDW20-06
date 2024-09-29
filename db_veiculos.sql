-- MySQL Script generated by MySQL Workbench
-- Sun Sep 29 13:25:58 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema veiculosbd
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `veiculosbd` ;

-- -----------------------------------------------------
-- Schema veiculosbd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `veiculosbd` ;
USE `veiculosbd` ;

-- -----------------------------------------------------
-- Table `veiculosbd`.`tb_aluguel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `veiculosbd`.`tb_aluguel` ;

CREATE TABLE IF NOT EXISTS `veiculosbd`.`tb_aluguel` (
  `id_aluguel` INT NOT NULL AUTO_INCREMENT,
  `datainicial_aluguel` DATE NOT NULL,
  `datafinal_aluguel` DATE NOT NULL,
  `tb_cliente_id_cliente` INT NOT NULL,
  `tb_funcionario_id_funcionario` INT NOT NULL,
  PRIMARY KEY (`id_aluguel`),
  INDEX `fk_tb_aluguel_tb_cliente1_idx` (`tb_cliente_id_cliente` ASC) VISIBLE,
  INDEX `fk_tb_aluguel_tb_funcionario1_idx` (`tb_funcionario_id_funcionario` ASC) VISIBLE,
  CONSTRAINT `fk_tb_aluguel_tb_cliente1`
    FOREIGN KEY (`tb_cliente_id_cliente`)
    REFERENCES `veiculosbd`.`tb_cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_aluguel_tb_funcionario1`
    FOREIGN KEY (`tb_funcionario_id_funcionario`)
    REFERENCES `veiculosbd`.`tb_funcionario` (`id_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `veiculosbd`.`tb_aluguel_has_tb_veiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `veiculosbd`.`tb_aluguel_has_tb_veiculo` ;

CREATE TABLE IF NOT EXISTS `veiculosbd`.`tb_aluguel_has_tb_veiculo` (
  `tb_aluguel_id_aluguel` INT NOT NULL,
  `tb_veiculo_id_veiculo` INT NOT NULL,
  `km_inicial` DECIMAL(10,2) NULL,
  `km_final` DECIMAL(10,2) NULL,
  PRIMARY KEY (`tb_aluguel_id_aluguel`, `tb_veiculo_id_veiculo`),
  INDEX `fk_tb_aluguel_has_tb_veiculo_tb_veiculo1_idx` (`tb_veiculo_id_veiculo` ASC) VISIBLE,
  INDEX `fk_tb_aluguel_has_tb_veiculo_tb_aluguel1_idx` (`tb_aluguel_id_aluguel` ASC) VISIBLE,
  CONSTRAINT `fk_tb_aluguel_has_tb_veiculo_tb_aluguel1`
    FOREIGN KEY (`tb_aluguel_id_aluguel`)
    REFERENCES `veiculosbd`.`tb_aluguel` (`id_aluguel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_aluguel_has_tb_veiculo_tb_veiculo1`
    FOREIGN KEY (`tb_veiculo_id_veiculo`)
    REFERENCES `veiculosbd`.`tb_veiculo` (`id_veiculo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `veiculosbd`.`tb_cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `veiculosbd`.`tb_cliente` ;

CREATE TABLE IF NOT EXISTS `veiculosbd`.`tb_cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `endereco` VARCHAR(45) NOT NULL,
  `telefone` INT(11) NOT NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `veiculosbd`.`tb_empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `veiculosbd`.`tb_empresa` ;

CREATE TABLE IF NOT EXISTS `veiculosbd`.`tb_empresa` (
  `id_empresa` INT NOT NULL AUTO_INCREMENT,
  `cnpj_empresa` VARCHAR(15) NOT NULL,
  `tb_cliente_id_cliente` INT NOT NULL,
  PRIMARY KEY (`id_empresa`),
  INDEX `fk_tb_empresa_tb_cliente1_idx` (`tb_cliente_id_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_tb_empresa_tb_cliente1`
    FOREIGN KEY (`tb_cliente_id_cliente`)
    REFERENCES `veiculosbd`.`tb_cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `veiculosbd`.`tb_funcionario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `veiculosbd`.`tb_funcionario` ;

CREATE TABLE IF NOT EXISTS `veiculosbd`.`tb_funcionario` (
  `id_funcionario` INT NOT NULL AUTO_INCREMENT,
  `nome_funcionario` VARCHAR(100) NOT NULL,
  `cpf_funcionario` VARCHAR(11) NOT NULL,
  `email_funcionario` VARCHAR(100) NOT NULL,
  `telefone_funcionario` INT(11) NOT NULL,
  PRIMARY KEY (`id_funcionario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `veiculosbd`.`tb_pagamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `veiculosbd`.`tb_pagamento` ;

CREATE TABLE IF NOT EXISTS `veiculosbd`.`tb_pagamento` (
  `id_pagamento` INT NOT NULL AUTO_INCREMENT,
  `valor` DECIMAL(10,2) NOT NULL,
  `preco_por_km` DECIMAL(10,2) NOT NULL,
  `data_pagamento` DATE NOT NULL,
  `metodo` VARCHAR(45) NOT NULL,
  `tb_aluguel_id_aluguel` INT NOT NULL,
  PRIMARY KEY (`id_pagamento`),
  INDEX `fk_tb_pagamento_tb_aluguel1_idx` (`tb_aluguel_id_aluguel` ASC) VISIBLE,
  CONSTRAINT `fk_tb_pagamento_tb_aluguel1`
    FOREIGN KEY (`tb_aluguel_id_aluguel`)
    REFERENCES `veiculosbd`.`tb_aluguel` (`id_aluguel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `veiculosbd`.`tb_pessoafisica`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `veiculosbd`.`tb_pessoafisica` ;

CREATE TABLE IF NOT EXISTS `veiculosbd`.`tb_pessoafisica` (
  `id_pessoa` INT NOT NULL AUTO_INCREMENT,
  `cpf_pessoa` VARCHAR(11) NOT NULL,
  `tb_cliente_id_cliente` INT NOT NULL,
  PRIMARY KEY (`id_pessoa`),
  INDEX `fk_tb_pessoafisica_tb_cliente1_idx` (`tb_cliente_id_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_tb_pessoafisica_tb_cliente1`
    FOREIGN KEY (`tb_cliente_id_cliente`)
    REFERENCES `veiculosbd`.`tb_cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `veiculosbd`.`tb_veiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `veiculosbd`.`tb_veiculo` ;

CREATE TABLE IF NOT EXISTS `veiculosbd`.`tb_veiculo` (
  `id_veiculo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `marca` VARCHAR(45) NOT NULL,
  `ano` INT(20) NOT NULL,
  `tipo_veiculo` VARCHAR(45) BINARY NOT NULL,
  `placa_veiculo` VARCHAR(15) NOT NULL,
  `capacidade_veiculo` VARCHAR(45) NOT NULL,
  `vidroeletrico_veiculo` TINYINT(1) NOT NULL,
  `airbag_veiculo` TINYINT(1) NOT NULL,
  `capacidaportamala_veiculo` VARCHAR(45) NOT NULL,
  `arcondicionado_veiculo` TINYINT(1) NOT NULL,
  `automatico_veiculo` TINYINT(1) NOT NULL,
  `km_veiculo` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id_veiculo`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
