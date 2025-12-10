
CREATE DATABASE IF NOT EXISTS sistema_cadastro;
USE sistema_cadastro;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(150) NOT NULL
);

CREATE TABLE IF NOT EXISTS fornecedores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(150) NOT NULL,
    cnpj VARCHAR(30),
    endereco VARCHAR(255),
    telefone VARCHAR(50),
    email VARCHAR(150),
    observacoes TEXT
);

CREATE TABLE IF NOT EXISTS produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_produto VARCHAR(150) NOT NULL,
    descricao TEXT,
    quantidade INT DEFAULT 0,
    preco DECIMAL(10,2) DEFAULT 0.00,
    fornecedor_id INT,
    imagem VARCHAR(255),
    FOREIGN KEY (fornecedor_id) REFERENCES fornecedores(id) ON DELETE CASCADE
);