-- MySQL
CREATE DATABASE glitter;

USE glitter;

CREATE TABLE usuarios (
    id    INTEGER            NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome  VARCHAR(50)        NOT NULL UNIQUE,
    senha VARCHAR(50)        NOT NULL,
    quem_sou_eu VARCHAR(1500)
);

INSERT INTO usuarios VALUES (DEFAULT, 'farinha', 'farinha', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat');

INSERT INTO usuarios VALUES (DEFAULT, 'pimenta', 'pimenta', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat');

CREATE TABLE mural (
    id       INTEGER      NOT NULL,
    mensagem VARCHAR(500)
);
