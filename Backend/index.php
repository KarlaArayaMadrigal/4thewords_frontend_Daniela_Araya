<?php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}
require_once __DIR__ . '/src/controllers/CategoriaController.php';
require_once __DIR__ . '/src/controllers/DistritoController.php';
require_once __DIR__ . '/src/controllers/LeyendaController.php';
require_once __DIR__ . '/src/controllers/ProvinciaController.php';
require_once __DIR__ . '/src/controllers/UsuarioController.php';

$method = $_SERVER['REQUEST_METHOD'];
$url = str_replace('/4thewords_frontend_Daniela_Araya/Backend/index.php', '', $_SERVER['REQUEST_URI']);

$CategoriaController = new CategoriaController();
$DistritoController = new DistritoController();
$LeyendaController = new LeyendaController();
$ProvinciaController = new ProvinciaController();
$UsuarioController = new UsuarioController();

//Endpoints de Categoria
if ($method === 'GET' && $url === '/categoria') {
    $ventaController->index();
} elseif ($method === 'GET' && preg_match('/^\/categoria\/([0-9]+)$/', $url, $matches)) {
    $ventaController->getById($matches[1]);
} elseif ($method === 'POST' && $url === '/categoria') {
    $ventaController->create();
} elseif ($method === 'PUT' && preg_match('/^\/categoria\/([0-9]+)$/', $url, $matches)) {
    $data = json_decode(file_get_contents("php://input"), true);
    $ventaController->update($matches[1], $data);
} elseif ($method === 'DELETE' && preg_match('/^\/categoria\/([0-9]+)$/', $url, $matches)) {
    $ventaController->delete($matches[1]);
}

//Endpoints de Distrito
if ($method === 'GET' && $url === '/distrito') {
    $ventaController->index();
} elseif ($method === 'GET' && preg_match('/^\/distrito\/([0-9]+)$/', $url, $matches)) {
    $ventaController->getById($matches[1]);
} elseif ($method === 'POST' && $url === '/distrito') {
    $ventaController->create();
} elseif ($method === 'PUT' && preg_match('/^\/distrito\/([0-9]+)$/', $url, $matches)) {
    $data = json_decode(file_get_contents("php://input"), true);
    $ventaController->update($matches[1], $data);
} elseif ($method === 'DELETE' && preg_match('/^\/distrito\/([0-9]+)$/', $url, $matches)) {
    $ventaController->delete($matches[1]);
}

//Endpoints de Leyenda
if ($method === 'GET' && $url === '/leyenda') {
    $ventaController->index();
} elseif ($method === 'GET' && preg_match('/^\/leyenda\/([0-9]+)$/', $url, $matches)) {
    $ventaController->getById($matches[1]);
} elseif ($method === 'POST' && $url === '/leyenda') {
    $ventaController->create();
} elseif ($method === 'PUT' && preg_match('/^\/leyenda\/([0-9]+)$/', $url, $matches)) {
    $data = json_decode(file_get_contents("php://input"), true);
    $ventaController->update($matches[1], $data);
} elseif ($method === 'DELETE' && preg_match('/^\/leyenda\/([0-9]+)$/', $url, $matches)) {
    $ventaController->delete($matches[1]);
}

//Endpoints de Provincia
if ($method === 'GET' && $url === '/provincia') {
    $ventaController->index();
} elseif ($method === 'GET' && preg_match('/^\/provincia\/([0-9]+)$/', $url, $matches)) {
    $ventaController->getById($matches[1]);
} elseif ($method === 'POST' && $url === '/provincia') {
    $ventaController->create();
} elseif ($method === 'PUT' && preg_match('/^\/provincia\/([0-9]+)$/', $url, $matches)) {
    $data = json_decode(file_get_contents("php://input"), true);
    $ventaController->update($matches[1], $data);
} elseif ($method === 'DELETE' && preg_match('/^\/provincia\/([0-9]+)$/', $url, $matches)) {
    $ventaController->delete($matches[1]);
}

//Endpoints de Usuario

if ($method === 'GET' && $url === '/usuario') {
    $ventaController->index();
} elseif ($method === 'GET' && preg_match('/^\/usuario\/([0-9]+)$/', $url, $matches)) {
    $ventaController->getById($matches[1]);
} elseif ($method === 'POST' && $url === '/usuario') {
    $ventaController->create();
} elseif ($method === 'PUT' && preg_match('/^\/usuario\/([0-9]+)$/', $url, $matches)) {
    $data = json_decode(file_get_contents("php://input"), true);
    $ventaController->update($matches[1], $data);
} elseif ($method === 'DELETE' && preg_match('/^\/usuario\/([0-9]+)$/', $url, $matches)) {
    $ventaController->delete($matches[1]);
}

