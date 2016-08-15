-- MySQL
CREATE DATABASE acad;
USE acad;
CREATE TABLE usuarios (nome VARCHAR(50), senha VARCHAR(50));
CREATE TABLE alunos (id_aluno INT NOT NULL PRIMARY KEY AUTO_INCREMENT, nome VARCHAR(50), nota NUMERIC(5,2));
INSERT INTO alunos(nome) VALUES ('patricia'), ('flavia'), ('silvia');
INSERT INTO usuarios VALUES ('admin', 'admin');
