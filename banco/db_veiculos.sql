-- MySQL Script generated by MySQL Workbench
-- Fri Nov  8 07:49:31 2024
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
  `telefone` VARCHAR(14) NOT NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;

INSERT INTO tb_cliente (nome, endereco, telefone) VALUES 
('Lucas Ferreira', 'Rua A, 123', '(62)99877-6665'),
('Gabriel Lima', 'Avenida B, 456', '(62)97766-5554'),
('Fernanda Costa', 'Travessa C, 789', '(62)96655-4443'),
('Juliana Mendes', 'Rua D, 101', '(62)95444-3332'),
('Roberto Farias', 'Avenida E, 202', '(62)10109-8998'),
('Camila Teixeira', 'Rua F, 303', '(62)09098-8887'),
('Marcos Silva', 'Rua G, 404', '(62)78877-6766'),
('Patrícia Almeida', 'Avenida H, 505', '(62)67665-5454'),
('Carlos Souza', 'Rua I, 606', '(62)56554-4343'),
('Amanda Oliveira', 'Rua J, 707', '(62)45443-3232'),
('Ricardo Martins', 'Avenida K, 808', '(62)34332-1221'),
('Sofia Pereira', 'Rua L, 909', '(62)23221-1010'),
('Thiago Costa', 'Avenida M, 1010', '(62)12110-9909'),
('Elisa Rocha', 'Rua N, 1111', '(62)01009-8898'),
('Vítor Almeida', 'Rua P, 1313', '(62)88887-6766'),
('Isabela Souza', 'Avenida Q, 1414', '(62)77777-5655'),
('João Santos', 'Rua R, 1515', '(62)66666-4544'),
('Letícia Silva', 'Rua S, 1616', '(62)55554-3343'),
('Fernando Lima', 'Avenida T, 1717', '(62)44443-2232'),
('José Santos', 'Rua O, 1212', '(62)99998-7787'),
('Tech Solutions', 'Rua A, 123', '(62)99877-6665'),
('Global Industries', 'Avenida B, 456', '(62)97766-5554'),
('InovaTech', 'Travessa C, 789', '(62)96655-4443'),
('Bright Future Ltda', 'Rua D, 101', '(62)95444-3332'),
('NextGen Systems', 'Avenida E, 202', '(62)10109-8998'),
('Creative Minds', 'Rua F, 303', '(62)09098-8887'),
('Green Energy Solutions', 'Rua G, 404', '(62)78877-6766'),
('ProActive Corp.', 'Avenida H, 505', '(62)67665-5454'),
('Visionary Enterprises', 'Rua I, 606', '(62)56554-4343'),
('Innovative Designs', 'Rua J, 707', '(62)45443-3232'),
('SpeedTech Inc.', 'Avenida K, 808', '(62)34332-1221'),
('Blue Sky Innovations', 'Rua L, 909', '(62)23221-1010'),
('Smart Ventures', 'Avenida M, 1010', '(62)12110-9909'),
('Alpha Technologies', 'Rua N, 1111', '(62)01009-8898'),
('Quantum Solutions', 'Rua P, 1313', '(62)88887-6766'),
('Digital Horizons', 'Avenida Q, 1414', '(62)77777-5655'),
('Evolv Technologies', 'Rua R, 1515', '(62)66666-4544'),
('SmartWorks Ltda', 'Rua S, 1616', '(62)55554-3343'),
('FutureTech Enterprises', 'Avenida T, 1717', '(62)44443-2232'),
('Prime Innovations', 'Rua O, 1212', '(62)99998-7787');

-- -----------------------------------------------------
-- Table `veiculosbd`.`tb_empresa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `veiculosbd`.`tb_empresa` ;

CREATE TABLE IF NOT EXISTS `veiculosbd`.`tb_empresa` (
  `id_empresa` INT NOT NULL AUTO_INCREMENT,
  `cnpj_empresa` VARCHAR(18) NOT NULL,
  `tb_cliente_id_cliente` INT NOT NULL,
  PRIMARY KEY (`id_empresa`),
  INDEX `fk_tb_empresa_tb_cliente1_idx` (`tb_cliente_id_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_tb_empresa_tb_cliente1`
    FOREIGN KEY (`tb_cliente_id_cliente`)
    REFERENCES `veiculosbd`.`tb_cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES
('12.345.678/0001-90', 21),
('98.765.432/0001-12', 22),
('11.223.344/0001-55', 23),
('22.334.455/0001-66', 24),
('33.445.566/0001-77', 25),
('44.556.677/0001-88', 26),
('55.667.788/0001-99', 27),
('66.778.899/0001-00', 28),
('77.889.900/0001-11', 29),
('88.990.011/0001-22', 30),
('99.001.112/0001-33', 31),
('10.111.213/0001-44', 32),
('21.223.324/0001-55', 33),
('32.334.435/0001-66', 34),
('43.445.546/0001-77', 35),
('54.556.657/0001-88', 36),
('65.667.768/0001-99', 37),
('76.778.879/0001-00', 38),
('87.889.980/0001-11', 39),
('98.990.091/0001-22', 40);

-- -----------------------------------------------------
-- Table `veiculosbd`.`tb_funcionario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `veiculosbd`.`tb_funcionario` ;

CREATE TABLE IF NOT EXISTS `veiculosbd`.`tb_funcionario` (
  `id_funcionario` INT NOT NULL AUTO_INCREMENT,
  `nome_funcionario` VARCHAR(100) NOT NULL,
  `cpf_funcionario` VARCHAR(14) NOT NULL,
  `email_funcionario` VARCHAR(100) NOT NULL,
  `telefone_funcionario` VARCHAR(14) NOT NULL,
  `senha_funcionario` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_funcionario`))
ENGINE = InnoDB;

INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario, senha_funcionario) VALUES
('Lucas Ferreira', '12345678910', 'lucas.ferreira@email.com', '(62)99877-6665', 'lucasps123'),
('Gabriel Lima', '98765432111', 'gabriel.lima@email.com', '(62)97766-5554', 'limagabriel7'),
('Fernanda Costa', '12312312313', 'fernanda.costa@email.com', '(62)96655-4443', 'fernanda12costa'),
('Juliana Mendes', '32132132133', 'juliana.mendes@email.com', '(62)95444-3332', 'mendes7juliana'),
('Ana Paula', '45678912300', 'ana.paula@email.com', '(62)94433-2210', 'anapaula22'),
('Carlos Eduardo', '78945612322', 'carlos.eduardo@email.com', '(62)93322-2110', 'eduardocarl15'),
('Mariana Oliveira', '12365478999', 'mariana.oliveira@email.com', '(62)92211-0099', 'marioliveira01'),
('Thiago Souza', '32198765444', 'thiago.souza@email.com', '(62)91100-9988', 'tsouza78'),
('Patrícia Gomes', '65432198755', 'patricia.gomes@email.com', '(62)90009-8877', 'patriciagomes33'),
('Renato Alves', '98712365466', 'renato.alves@email.com', '(62)98989-8776', 'ralves20'),
('Larissa Pereira', '45632178977', 'larissa.pereira@email.com', '(62)98878-7665', 'laripe89'),
('Douglas Ribeiro', '78912345688', 'douglas.ribeiro@email.com', '(62)98767-6554', 'douglasri22'),
('Tatiane Rocha', '32165498799', 'tatiane.rocha@email.com', '(62)98656-5443', 'trocha18'),
('Felipe Martins', '65498732110', 'felipe.martins@email.com', '(62)98545-4332', 'fmartins21'),
('Julia Cardoso', '12345678922', 'julia.cardoso@email.com', '(62)98434-3221', 'juliacard45'),
('Bruno Nunes', '98765432133', 'bruno.nunes@email.com', '(62)98323-2110', 'bnunes56'),
('Aline Silva', '45678912344', 'aline.silva@email.com', '(62)98212-1009', 'asilva34'),
('Roberto Farias', '78932165455', 'roberto.farias@email.com', '(62)98101-0998', 'rfarias19'),
('Camila Teixeira', '32145698766', 'camila.teixeira@email.com', '(62)98090-9887', 'camila.t99'),
('Ricardo Pereira', '45645645646', 'ricardo.pereira@email.com', '(62)94433-2210', 'ricar23do');


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
  `cpf_pessoa` VARCHAR(14) NOT NULL,
  `tb_cliente_id_cliente` INT NOT NULL,
  PRIMARY KEY (`id_pessoa`),
  INDEX `fk_tb_pessoafisica_tb_cliente1_idx` (`tb_cliente_id_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_tb_pessoafisica_tb_cliente1`
    FOREIGN KEY (`tb_cliente_id_cliente`)
    REFERENCES `veiculosbd`.`tb_cliente` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES 
('123.456.789-01', 1),
('987.654.321-00', 2),
('123.123.123-12', 3),
('321.321.321-32', 4),
('456.456.456-45', 5),
('789.789.789-78', 6),
('159.159.159-15', 7),
('258.258.258-25', 8),
('369.369.369-36', 9),
('951.951.951-95', 10),
('753.753.753-75', 11),
('864.864.864-86', 12),
('741.741.741-74', 13),
('852.852.852-85', 14),
('963.963.963-96', 15),
('147.147.147-14', 16),
('258.258.258-24', 17),
('369.369.369-35', 18),
('741.741.741-73', 19),
('852.852.852-84', 20);

-- -----------------------------------------------------
-- Table `veiculosbd`.`tb_veiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `veiculosbd`.`tb_veiculo` ;

CREATE TABLE IF NOT EXISTS `veiculosbd`.`tb_veiculo` (
  `id_veiculo` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `marca` VARCHAR(45) NOT NULL,
  `ano` INT(20) NOT NULL,
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

ALTER TABLE tb_veiculo 
ADD COLUMN status ENUM('Disponível', 'Indisponível') NOT NULL DEFAULT 'Disponível';

ALTER TABLE tb_aluguel 
ADD COLUMN status ENUM('Pendente', 'Pago', 'Cancelado') NOT NULL DEFAULT 'Pendente';

INSERT INTO tb_veiculo (nome, marca, ano, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo, status) VALUES
('Civic', 'Honda', 2020, 'ABC-1234', '5', 1, 1, '500L', 1, 1, 10000.00, 'Disponível'),
('Corolla', 'Toyota', 2021, 'DEF-5678', '5', 1, 1, '470L', 1, 1, 15000.00, 'Disponível'),
('Tucson', 'Hyundai', 2019, 'GHI-9012', '5', 1, 1, '600L', 1, 0, 20000.00, 'Disponível'),
('Fit', 'Honda', 2022, 'JKL-3456', '5', 1, 1, '200L', 1, 1, 8000.00, 'Disponível'), 
('Fiesta', 'Ford', 2020, 'MNO-1234', '4', 1, 0, '350L', 1, 1, 12000.00, 'Disponível'),
('Kwid', 'Renault', 2021, 'PQR-5678', '4', 1, 1, '290L', 1, 0, 9000.00, 'Disponível'),
('Sandero', 'Renault', 2019, 'STU-9012', '5', 1, 0, '320L', 0, 1, 11000.00, 'Disponível'),
('Gol', 'Volkswagen', 2022, 'VWX-3456', '5', 1, 1, '300L', 1, 1, 13500.00, 'Disponível'),
('Palio', 'Fiat', 2021, 'YZA-1234', '5', 1, 1, '280L', 0, 0, 9500.00, 'Disponível'),
('Onix', 'Chevrolet', 2020, 'BCD-5678', '5', 1, 1, '280L', 1, 1, 10000.00, 'Disponível'),
('Argo', 'Fiat', 2021, 'EFG-9012', '5', 1, 1, '350L', 1, 0, 11500.00, 'Disponível'),
('Renegade', 'Jeep', 2020, 'HIJ-3456', '5', 1, 0, '500L', 0, 1, 16000.00, 'Disponível'),
('HR-V', 'Honda', 2021, 'KLM-1234', '5', 1, 1, '400L', 1, 1, 18000.00, 'Disponível'),
('X1', 'BMW', 2022, 'NOP-5678', '5', 1, 1, '500L', 1, 1, 25000.00, 'Disponível'),
('Q3', 'Audi', 2021, 'QRS-9012', '5', 1, 1, '600L', 1, 0, 23000.00, 'Disponível'),
('Compass', 'Jeep', 2020, 'TUV-3456', '5', 1, 1, '450L', 1, 1, 21000.00, 'Disponível'),
('Tiguan', 'Volkswagen', 2021, 'WXY-1234', '5', 1, 0, '550L', 1, 1, 24000.00, 'Disponível'),
('Cherokee', 'Jeep', 2020, 'ZAB-5678', '5', 1, 1, '600L', 1, 0, 22000.00, 'Disponível'),
('C4 Cactus', 'Citroën', 2021, 'CDE-9012', '5', 1, 0, '400L', 1, 1, 17000.00, 'Disponível'),
('Figo', 'Ford', 2020, 'MNO-7890', '2', 1, 1, '150L', 1, 1, 12000.00, 'Disponível');

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;