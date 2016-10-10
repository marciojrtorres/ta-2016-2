-- MySQL
CREATE DATABASE news;

USE news;

CREATE TABLE noticias (
    id          INTEGER       NOT NULL PRIMARY KEY AUTO_INCREMENT,
    titulo      VARCHAR(50),
    texto       TEXT(5000),
    imagem      VARCHAR(64),
    extensao    VARCHAR(4)
);

INSERT INTO noticias VALUES (DEFAULT, 'teste1', 'teste1', NULL, NULL),
                            (DEFAULT, 'teste1', 'teste1', NULL, NULL);