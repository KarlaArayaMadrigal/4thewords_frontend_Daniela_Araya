<?php
require_once __DIR__ . '/../models/Usuario.php';

class UsuarioController {
    private $model;

    public function __construct() {
        $this->model = new Usuario();
    }

    public function index() {
        echo json_encode($this->model->getAllUsuarios());
    }

    public function getById($id) {
        echo json_encode($this->model->getUsuarioById($id));
    }

    public function create() {
        $body = json_decode(file_get_contents('php://input'), true);
        $this->model->createUsuario($body['correo'], $body['contraseña']);
        echo json_encode(['message' => 'Usuario creado']);
    }

    public function update($id, $data) {
        // Si quieres agregar update, deberías implementarlo en el modelo
        echo json_encode(['error' => 'Función update no implementada']);
    }

    public function delete($id) {
        $this->model->deleteUsuario($id);
        echo json_encode(['message' => 'Usuario eliminado']);
    }
}
