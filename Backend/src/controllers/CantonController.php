<?php
require_once './src/models/Canton.php';

class CantonController {
    private $model;

    public function __construct() {
        $this->model = new Canton();
    }

    public function obtenerTodos() {
        echo json_encode($this->model->getAllCantones());
    }

    public function obtenerPorProvincia($provincia_id) {
        echo json_encode($this->model->getCantonesByProvincia($provincia_id));
    }

    public function crear() {
        $body = json_decode(file_get_contents('php://input'), true);
        $this->model->createCanton($body['nombre'], $body['provincia_id']);
        echo json_encode(['message' => 'Cantón creado']);
    }

    public function eliminar($id) {
        $this->model->deleteCanton($id);
        echo json_encode(['message' => 'Cantón eliminado']);
    }
}
