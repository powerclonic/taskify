<?php

$caminhoBancoDeDados = __DIR__ . '/../../db.sqlite';

$pdo = new PDO('sqlite:' . $caminhoBancoDeDados);

$sql = 'CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    nome VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
);';

$pdo->query($sql);

$sql = 'CREATE TABLE IF NOT EXISTS tasks (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    id_usuario INTEGER,
    nome VARCHAR(255) NOT NULL,
    descricao VARCHAR(255) ,
    concluida BOOL DEFAULT FALSE,
    prazo DATETIME,

    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);';

$pdo->query($sql);

return $pdo;