USE veiculosbd;

INSERT INTO `veiculosbd`.`tb_cliente` (nome, endereco, telefone) VALUES
('João Silva', 'Rua A, 123', 987654321),
('Maria Oliveira', 'Avenida B, 456', 987654322),
('Pedro Santos', 'Praça C, 789', 987654323);

INSERT INTO `veiculosbd`.`tb_empresa` (cnpj_empresa, tb_cliente_id_cliente) VALUES
('12345', 1),
('23456', 2),
('34567', 3);

INSERT INTO `veiculosbd`.`tb_pessoafisica` (cpf_pessoa, tb_cliente_id_cliente) VALUES
('12345678', 1),
('23456789', 2),
('34567890', 3);

INSERT INTO `veiculosbd`.`tb_funcionario` (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES
('Ana Costa', '12345678901', 'ana.costa@email.com', 987654324),
('Roberto Almeida', '23456789012', 'roberto.almeida@email.com', 987654325),
('Fernanda Lima', '34567890123', 'fernanda.lima@email.com', 987654326);

INSERT INTO `veiculosbd`.`tb_veiculo` (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo) VALUES
('Fusca', 'Volkswagen', 1980, 'Hatch', 'ABC1D23', '4', 1, 1, '300', 1, 0, 10000.00),
('Civic', 'Honda', 2020, 'Sedan', 'XYZ4E56', '5', 1, 1, '400', 1, 1, 5000.00),
('Onix', 'Chevrolet', 2019, 'Hatch', 'JKL7M89', '5', 1, 1, '350', 1, 1, 20000.00);