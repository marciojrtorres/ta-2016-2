-- POSTGRESQL

CREATE DATABASE BLOG;

\C BLOG

CREATE TABLE usuarios (
    id      SERIAL      NOT NULL PRIMARY KEY,
    nome    VARCHAR(50)     NULL,
    usuario VARCHAR(50)     NULL,
    senha   VARCHAR(50)
);

INSERT INTO usuarios VALUES (DEFAULT,'Marcio Torres', 'marcio','torres');