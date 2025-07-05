<?php
require_once __DIR__ . '/../models/Leyenda.php';

class LeyendaController {
    private $model;

    public function __construct() {
        $this->model = new Leyenda();
    }

    public function index() {
        echo json_encode($this->model->getAllLeyendas());
    }

    public function getById($id) {
        echo json_encode($this->model->getLeyendaById($id));
    }

    public function create() {
        $body = json_decode(file_get_contents('php://input'), true);
        $this->model->createLeyenda($body);
        echo json_encode(['message' => 'Leyenda creada']);
    }

    public function update($id, $data) {
        echo json_encode($this->model->updateLeyenda($id, $data));
    }

    public function delete($id) {
        $this->model->deleteLeyenda($id);
        echo json_encode(['message' => 'Leyenda eliminada']);
    }
}

