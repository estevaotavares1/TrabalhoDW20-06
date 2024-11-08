USE `veiculosbd` ;

-- Inserindo 5 funcionários
INSERT INTO tb_funcionario (nome_funcionario, cpf_funcionario, email_funcionario, telefone_funcionario, senha_funcionario) VALUES
('Lucas Ferreira', '12345678910', 'lucas.ferreira@email.com', 998877665, 'lucasps123'),
('Gabriel Lima', '98765432111', 'gabriel.lima@email.com', 997766554, 'limagabriel7'),
('Fernanda Costa', '12312312313', 'fernanda.costa@email.com', 996655443, 'fernanda12costa'),
('Juliana Mendes', '32132132133', 'juliana.mendes@email.com', 995544332, 'mendes7juliana'),
('Ana Paula', '45678912300', 'ana.paula@email.com', 994433221, 'anapaula22'),
('Carlos Eduardo', '78945612322', 'carlos.eduardo@email.com', 993322110, 'eduardocarl15'),
('Mariana Oliveira', '12365478999', 'mariana.oliveira@email.com', 992211009, 'marioliveira01'),
('Thiago Souza', '32198765444', 'thiago.souza@email.com', 991100998, 'tsouza78'),
('Patrícia Gomes', '65432198755', 'patricia.gomes@email.com', 990009887, 'patriciagomes33'),
('Renato Alves', '98712365466', 'renato.alves@email.com', 989898776, 'ralves20'),
('Larissa Pereira', '45632178977', 'larissa.pereira@email.com', 988787665, 'laripe89'),
('Douglas Ribeiro', '78912345688', 'douglas.ribeiro@email.com', 987676554, 'douglasri22'),
('Tatiane Rocha', '32165498799', 'tatiane.rocha@email.com', 986565443, 'trocha18'),
('Felipe Martins', '65498732110', 'felipe.martins@email.com', 985454332, 'fmartins21'),
('Julia Cardoso', '12345678922', 'julia.cardoso@email.com', 984343221, 'juliacard45'),
('Bruno Nunes', '98765432133', 'bruno.nunes@email.com', 983232110, 'bnunes56'),
('Aline Silva', '45678912344', 'aline.silva@email.com', 982121009, 'asilva34'),
('Roberto Farias', '78932165455', 'roberto.farias@email.com', 981010998, 'rfarias19'),
('Camila Teixeira', '32145698766', 'camila.teixeira@email.com', 980909887, 'camila.t99'),
('Ricardo Pereira', '45645645646', 'ricardo.pereira@email.com', 994433221, 'ricar23do');

-- Inserindo 5 veículos
INSERT INTO tb_veiculo (nome, marca, ano, placa_veiculo, capacidade_veiculo, vidroeletrico_veiculo, airbag_veiculo, capacidaportamala_veiculo, arcondicionado_veiculo, automatico_veiculo, km_veiculo, status) VALUES
('Civic', 'Honda', 2020, 'ABC1234', '5 passageiros', 1, 1, '500L', 1, 1, 10000.00, 'Disponível'),
('Corolla', 'Toyota', 2021, 'DEF5678', '5 passageiros', 1, 1, '470L', 1, 1, 15000.00, 'Disponível'),
('Tucson', 'Hyundai', 2019, 'GHI9012', '5 passageiros', 1, 1, '600L', 1, 0, 20000.00, 'Disponível'),
('Hornet', 'Honda', 2022, 'JKL3456', '2 passageiros', 0, 0, '900L', 0, 0, 8000.00, 'Disponível'),
('Fiesta', 'Ford', 2020, 'MNO1234', '4 passageiros', 1, 0, '350L', 1, 1, 12000.00, 'Disponível'),
('Kwid', 'Renault', 2021, 'PQR5678', '4 passageiros', 1, 1, '290L', 1, 0, 9000.00, 'Disponível'),
('Sandero', 'Renault', 2019, 'STU9012', '5 passageiros', 1, 0, '320L', 0, 1, 11000.00, 'Disponível'),
('Gol', 'Volkswagen', 2022, 'VWX3456', '5 passageiros', 1, 1, '300L', 1, 1, 13500.00, 'Disponível'),
('Palio', 'Fiat', 2021, 'YZA1234', '5 passageiros', 1, 1, '280L', 0, 0, 9500.00, 'Disponível'),
('Onix', 'Chevrolet', 2020, 'BCD5678', '5 passageiros', 1, 1, '280L', 1, 1, 10000.00, 'Disponível'),
('Argo', 'Fiat', 2021, 'EFG9012', '5 passageiros', 1, 1, '350L', 1, 0, 11500.00, 'Disponível'),
('Renegade', 'Jeep', 2020, 'HIJ3456', '5 passageiros', 1, 0, '500L', 0, 1, 16000.00, 'Disponível'),
('HR-V', 'Honda', 2021, 'KLM1234', '5 passageiros', 1, 1, '400L', 1, 1, 18000.00, 'Disponível'),
('X1', 'BMW', 2022, 'NOP5678', '5 passageiros', 1, 1, '500L', 1, 1, 25000.00, 'Disponível'),
('Q3', 'Audi', 2021, 'QRS9012', '5 passageiros', 1, 1, '600L', 1, 0, 23000.00, 'Disponível'),
('Compass', 'Jeep', 2020, 'TUV3456', '5 passageiros', 1, 1, '450L', 1, 1, 21000.00, 'Disponível'),
('Tiguan', 'Volkswagen', 2021, 'WXY1234', '5 passageiros', 1, 0, '550L', 1, 1, 24000.00, 'Disponível'),
('Cherokee', 'Jeep', 2020, 'ZAB5678', '5 passageiros', 1, 1, '600L', 1, 0, 22000.00, 'Disponível'),
('C4 Cactus', 'Citroën', 2021, 'CDE9012', '5 passageiros', 1, 0, '400L', 1, 1, 17000.00, 'Disponível'),
('XJ6', 'Yamaha', 2020, 'MNO7890', '2 passageiros', 0, 0, '432L', 0, 0, 12000.00, 'Disponível');
