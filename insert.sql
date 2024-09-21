USE veiculosbd;

-- Inserindo clientes
INSERT INTO tb_cliente (nome, endereco, telefone) VALUES ('pedro', 'rua1', '4547');
INSERT INTO tb_cliente (nome, endereco, telefone) VALUES ('carlos', 'rua2', '4548');
INSERT INTO tb_cliente (nome, endereco, telefone) VALUES ('debora', 'rua3', '4549');
INSERT INTO tb_cliente (nome, endereco, telefone) VALUES ('deborah', 'rua4', '4540');
INSERT INTO tb_cliente (nome, endereco, telefone) VALUES ('davi', 'rua5', '4541');
INSERT INTO tb_cliente (nome, endereco, telefone) VALUES ('luis', 'rua6', '4542');
INSERT INTO tb_cliente (nome, endereco, telefone) VALUES ('gustavo', 'rua7', '4543');
INSERT INTO tb_cliente (nome, endereco, telefone) VALUES ('lucas', 'rua8', '4544');
INSERT INTO tb_cliente (nome, endereco, telefone) VALUES ('joao', 'rua9', '4545');

-- Inserindo pessoas físicas
INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES ('53434646545', LAST_INSERT_ID());
INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES ('63434646546', LAST_INSERT_ID());
INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES ('73434646547', LAST_INSERT_ID());
INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES ('83434646548', LAST_INSERT_ID());
INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES ('93434646549', LAST_INSERT_ID());
INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES ('53434646550', LAST_INSERT_ID());
INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES ('43434646551', LAST_INSERT_ID());
INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES ('33434646552', LAST_INSERT_ID());
INSERT INTO tb_pessoafisica (cpf_pessoa, tb_cliente_id_cliente) VALUES ('23434646553', LAST_INSERT_ID());

-- Inserindo empresas
INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES ('24.567.891/0001-23', LAST_INSERT_ID());
INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES ('24.567.891/0001-24', LAST_INSERT_ID());
INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES ('34.567.891/0001-25', LAST_INSERT_ID());
INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES ('44.567.891/0001-26', LAST_INSERT_ID());
INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES ('54.567.891/0001-27', LAST_INSERT_ID());
INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES ('64.567.891/0001-28', LAST_INSERT_ID());
INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES ('74.567.891/0001-29', LAST_INSERT_ID());
INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES ('84.567.891/0001-30', LAST_INSERT_ID());
INSERT INTO tb_empresa (cnpj_empresa, tb_cliente_id_cliente) VALUES ('94.567.891/0001-31', LAST_INSERT_ID());

-- Inserindo funcionários
INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES ('João', '112151515', 'joao@gmail.com', '25265464');
INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES ('Carlos', '987654321', 'carlos@email.com', '99887766');
INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES ('Larissa', '654321987', 'larissa@email.com', '55443322');
INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES ('Fernando', '123789456', 'fernando@email.com', '66778899');
INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES ('Juliana', '456123789', 'juliana@email.com', '77665544');
INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES ('Paulo', '789456123', 'paulo@email.com', '88992233');
INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES ('Patrícia', '321456987', 'patricia@email.com', '33445566');
INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES ('Rodrigo', '654987321', 'rodrigo@email.com', '11223344');
INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario) VALUES ('Vanessa', '987321654', 'vanessa@email.com', '99887711');

-- Inserindo veículos
INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo) VALUES ('Civic', 'Honda', 2020, 'hatch', 'br451l', '5', 'sim', 'sim', '10malas', 'sim', 'sim', '450');
INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo) VALUES ('Corolla', 'Toyota', 2020, 'hatch', 'xyz9876', '5', 'sim', 'sim', '400L', 'sim', 'sim', '7000');
INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo) VALUES ('Palio', 'Fiat', 2020, 'hatch', 'uvw5432', '5', 'sim', 'não', '200L', 'sim', 'não', '4000');
INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo) VALUES ('HB20', 'Hyundai', 2020, 'hatch', 'rst7890', '5', 'sim', 'sim', '300L', 'sim', 'sim', '6000');
INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo) VALUES ('Sandero', 'Renault', 2020, 'hatch', 'pqr2468', '5', 'sim', 'não', '250L', 'sim', 'sim', '5500');
INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo) VALUES ('Prisma', 'Chevrolet', 2020, 'hatch', 'lmn1357', '5', 'sim', 'sim', '350L', 'sim', 'não', '7500');
INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo) VALUES ('Fit', 'Honda', 2020, 'hatch', 'abc2468', '5', 'sim', 'sim', '300L', 'sim', 'sim', '5000');
INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo) VALUES ('Versa', 'Nissan', 2020, 'hatch', 'def1357', '5', 'sim', 'não', '250L', 'sim', 'não', '4000');
INSERT INTO tb_veiculo (nome, marca, ano, tipo_veiculo, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo) VALUES ('EcoSport', 'Ford', 2020, 'hatch', 'ghi3691', '5', 'sim', 'sim', '350L', 'sim', 'sim', '6000');