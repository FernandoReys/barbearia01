CREATE DATABASE barbearia;
USE barbearia;

CREATE TABLE agendamentos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  telefone VARCHAR(20),
  dia DATE,
  hora TIME,
  barbeiro ENUM('Barbeiro 1', 'Barbeiro 2')
);
