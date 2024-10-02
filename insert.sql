-- Inserindo 5 clientes (pessoas físicas)
INSERT INTO tb_cliente (nome, endereco, telefone) VALUES
('João Silva', 'Rua A, 123', 123456789),
('Maria Oliveira', 'Rua B, 456', 987654321),
('Carlos Souza', 'Rua C, 789', 123123123),
('Ana Santos', 'Rua D, 101', 321321321),
('Pedro Alves', 'Rua E, 202', 456456456);

-- Inserindo 5 pessoas físicas
INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES
('12345678901', 1),
('98765432100', 2),
('12312312312', 3),
('32132132132', 4),
('45645645645', 5);

-- Inserindo 5 empresas
INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES
('12345678000101', 1),
('98765432000100', 2),
('12312312000112', 3),
('32132132000132', 4),
('45645645000145', 5);

-- Inserindo 5 funcionários
INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES
('Lucas Ferreira', '12345678910', 'lucas.ferreira@email.com', 998877665),
('Gabriel Lima', '98765432111', 'gabriel.lima@email.com', 997766554),
('Fernanda Costa', '12312312313', 'fernanda.costa@email.com', 996655443),
('Juliana Mendes', '32132132133', 'juliana.mendes@email.com', 995544332),
('Ricardo Pereira', '45645645646', 'ricardo.pereira@email.com', 994433221);

-- Inserindo 5 veículos
INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo, status) VALUES
('Civic', 'Honda', 2020, 'Carro', 'ABC1234', '5 passageiros', 1, 1, '500L', 1, 1, 10000.00, 'Disponível'),
('Corolla', 'Toyota', 2021, 'Carro', 'DEF5678', '5 passageiros', 1, 1, '470L', 1, 1, 15000.00, 'Disponível'),
('Tucson', 'Hyundai', 2019, 'Carro', 'GHI9012', '5 passageiros', 1, 1, '600L', 1, 0, 20000.00, 'Disponível'),
('Hornet', 'Honda', 2022, 'Moto', 'JKL3456', '2 passageiros', 0, 0, '900L', 0, 0, 8000.00, 'Disponível'),
('XJ6', 'Yamaha', 2020, 'Moto', 'MNO7890', '2 passageiros', 0, 0, '432L', 0, 0, 12000.00, 'Disponível');
