<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$method = $_SERVER['REQUEST_METHOD'];
$requestUri = basename($_SERVER['REQUEST_URI']);

require_once __DIR__ . '/src/db/DbConnect.php';
require_once __DIR__ . '/src/controllers/CategoriaController.php';
require_once __DIR__ . '/src/controllers/DistritoController.php';
require_once __DIR__ . '/src/controllers/LeyendaController.php';
require_once __DIR__ . '/src/controllers/ProvinciaController.php';
require_once __DIR__ . '/src/controllers/UsuarioController.php';

switch ($requestUri) {

    case 'categoria':
        $controller = new CategoriaController();
        if ($method === 'GET') {
            if (isset($_GET['id_categoria'])) {
                $controller->getById($_GET['id_categoria']);
            } else {
                $controller->index();
            }
        } elseif ($method === 'POST') {
            $controller->create();
        } elseif ($method === 'PUT') {
            parse_str(file_get_contents("php://input"), $putData);
            if (isset($putData['id_categoria'])) {
                $controller->update($putData['id_categoria'], $putData);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID de categoria requerido']);
            }
        } elseif ($method === 'DELETE') {
            if (isset($_GET['id_categoria'])) {
                $controller->delete($_GET['id_categoria']);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID de categoria requerido']);
            }
        }
        break;

    case 'distrito':
        $controller = new DistritoController();
        if ($method === 'GET') {
            if (isset($_GET['id_distrito'])) {
                $controller->getById($_GET['id_distrito']);
            } else {
                $controller->index();
            }
        } elseif ($method === 'POST') {
            $controller->create();
        } elseif ($method === 'PUT') {
            parse_str(file_get_contents("php://input"), $putData);
            if (isset($putData['id_distrito'])) {
                $controller->update($putData['id_distrito'], $putData);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID de distrito requerido']);
            }
        } elseif ($method === 'DELETE') {
            if (isset($_GET['id_distrito'])) {
                $controller->delete($_GET['id_distrito']);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID de distrito requerido']);
            }
        }
        break;

    case 'leyenda':
        $controller = new LeyendaController();
        if ($method === 'GET') {
            if (isset($_GET['id_leyenda'])) {
                $controller->getById($_GET['id_leyenda']);
            } else {
                $controller->index();
            }
        } elseif ($method === 'POST') {
            $controller->create();
        } elseif ($method === 'PUT') {
            parse_str(file_get_contents("php://input"), $putData);
            if (isset($putData['id_leyenda'])) {
                $controller->update($putData['id_leyenda'], $putData);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID de leyenda requerido']);
            }
        } elseif ($method === 'DELETE') {
            if (isset($_GET['id_leyenda'])) {
                $controller->delete($_GET['id_leyenda']);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID de leyenda requerido']);
            }
        }
        break;

    case 'provincia':
        $controller = new ProvinciaController();
        if ($method === 'GET') {
            if (isset($_GET['id_provincia'])) {
                $controller->getById($_GET['id_provincia']);
            } else {
                $controller->index();
            }
        } elseif ($method === 'POST') {
            $controller->create();
        } elseif ($method === 'PUT') {
            parse_str(file_get_contents("php://input"), $putData);
            if (isset($putData['id_provincia'])) {
                $controller->update($putData['id_provincia'], $putData);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID de provincia requerido']);
            }
        } elseif ($method === 'DELETE') {
            if (isset($_GET['id_provincia'])) {
                $controller->delete($_GET['id_provincia']);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID de provincia requerido']);
            }
        }
        break;

    case 'usuario':
        $controller = new UsuarioController();
        if ($method === 'GET') {
            if (isset($_GET['id_usuario'])) {
                $controller->getById($_GET['id_usuario']);
            } else {
                $controller->index();
            }
        } elseif ($method === 'POST') {
            $controller->create();
        } elseif ($method === 'PUT') {
            parse_str(file_get_contents("php://input"), $putData);
            if (isset($putData['id_usuario'])) {
                $controller->update($putData['id_usuario'], $putData);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID de usuario requerido']);
            }
        } elseif ($method === 'DELETE') {
            if (isset($_GET['id_usuario'])) {
                $controller->delete($_GET['id_usuario']);
            } else {
                http_response_code(400);
                echo json_encode(['error' => 'ID de usuario requerido']);
            }
        }
        break;
}
