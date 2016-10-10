-- MySQL
CREATE DATABASE glitter;

USE glitter;

CREATE TABLE usuarios (
    id          INTEGER       NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome        VARCHAR(50)   NOT NULL,
    usuario     VARCHAR(50)   NOT NULL UNIQUE,
    senha       VARCHAR(50)   NOT NULL
);

INSERT INTO usuarios VALUES (DEFAULT, 'João Silva', 'joao', 'silva');

CREATE TABLE posts (
    titulo  VARCHAR(50)  NOT NULL,
    texto   VARCHAR(500) NOT NULL
);
