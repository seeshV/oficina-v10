-- create_db.sql
CREATE DATABASE IF NOT EXISTS oficina CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE oficina;

CREATE TABLE IF NOT EXISTS usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario VARCHAR(100) NOT NULL UNIQUE,
  senha_hash VARCHAR(255) NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS veiculos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  placa VARCHAR(15) NOT NULL,
  modelo VARCHAR(100) NOT NULL,
  marca VARCHAR(100) NOT NULL,
  ano INT,
  problema_reclamado TEXT,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS servicos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_veiculo INT NOT NULL,
  descricao_servico TEXT NOT NULL,
  valor DECIMAL(10,2) DEFAULT NULL,
  data_servico DATE DEFAULT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_veiculo) REFERENCES veiculos(id) ON DELETE CASCADE
);

-- Optional: insert an admin user with password 'senha123' (replace hash if you want):
-- password_hash('senha123', PASSWORD_DEFAULT) => you can generate on PHP CLI or use the provided hash below
INSERT IGNORE INTO usuarios (usuario, senha_hash) VALUES
('admin', '$2y$10$HVJYgKiB2Pj9RRRNrBdMt.l/r7aN1IAhd.fqky65Sk7S2IBXKpsK2');

-- Sample vehicle and service
INSERT IGNORE INTO veiculos (placa, modelo, marca, ano, problema_reclamado) VALUES
('ABC-1234','Civic','Honda',2010,'Vibração na parte traseira');
INSERT IGNORE INTO servicos (id_veiculo, descricao_servico, valor, data_servico) VALUES
(1,'Troca de pastilhas de freio',250.00,CURDATE());
