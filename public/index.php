<?php

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$rota = key_exists('PATH_INFO', $_SERVER) ? $_SERVER['PATH_INFO'] : '/';

$rotas = require_once __DIR__ . '/../src/config/rotas.php';

// Rotas que para acessar, o usuário não precisa estar cadastrado
$rotasLivres = [
    '/',
    '/entrar',
    '/cadastrar',

    '/acoes/entrar',
    '/acoes/cadastrar',
];

// Se a rota acessada pelo usuário não existir
if (! key_exists($rota, $rotas)) {
    http_response_code(404);
    exit;
}

// Se a rota acessada pelo usuário necessitar autenticação mas o usuário não está autenticado
if (! key_exists('autenticado', $_SESSION) && ! in_array($rota, $rotasLivres)) {
    http_response_code(401);
    header('location: /entrar');
}

/** @var \PDO $pdo */
$pdo = require_once __DIR__ . '/../src/config/pdo.php';

try {
    $controller = new $rotas[$rota]($pdo);

    echo $controller->controla();
} catch (\PDOException $erro) {
    http_response_code(500);
    echo 'Houve um erro ao acessar o banco de dados, tente novamente mais tarde';
} catch (\InvalidArgumentException $erro) {
    http_response_code(500);
    echo $erro->getMessage();
} 
