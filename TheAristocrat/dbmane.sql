create database thearistocrat;
use thearistocrat;  

CREATE TABLE Usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email varchar(100),
    cpf CHAR(11),
    senha VARCHAR(25)
);

CREATE TABLE Veiculo (
    id_veiculo INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(50),
    marca VARCHAR(50),
    ano INT,
    cor VARCHAR(20),
    quilometragem INT,
    valor float);

CREATE TABLE Compra (
    id_compra INT AUTO_INCREMENT PRIMARY KEY,
    data_compra DATE,
    valor_total float,
    forma_pagamento VARCHAR(50),
    id_usuario INT,
    id_veiculo INT,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario),
    FOREIGN KEY (id_veiculo) REFERENCES Veiculo(id_veiculo)
);

CREATE TABLE Venda (
    id_venda INT AUTO_INCREMENT PRIMARY KEY,
    data_venda DATE,
    valor_total float,
    forma_pagamento VARCHAR(50),
    id_usuario INT,
    id_veiculo INT,
    FOREIGN KEY (id_usuario) REFERENCES Usuario(id_usuario),
    FOREIGN KEY (id_veiculo) REFERENCES Veiculo(id_veiculo)
);