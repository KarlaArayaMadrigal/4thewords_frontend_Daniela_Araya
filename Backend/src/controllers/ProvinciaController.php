<?php
require_once __DIR__ . '/../models/Provincia.php';

class ProvinciaController {
    private $model;

    public function __construct() {
        $this->model = new Provincia();
    }

    public function index() {
        echo json_encode($this->model->getAllProvincias());
    }

    public function getById($id) {
        echo json_encode($this->model->getProvinciaById($id));
    }

    public function create() {
        $body = json_decode(file_get_contents('php://input'), true);
        $this->model->createProvincia($body['nombre']);
        echo json_encode(['message' => 'Provincia creada']);
    }

    public function update($id, $data) {
        $this->model->updateProvincia($id, $data['nombre']);
        echo json_encode(['message' => 'Provincia actualizada']);
    }

    public function delete($id) {
        $this->model->deleteProvincia($id);
        echo json_encode(['message' => 'Provincia eliminada']);
    }
}

