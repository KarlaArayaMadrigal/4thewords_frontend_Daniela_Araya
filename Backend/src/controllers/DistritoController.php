<?php
require_once __DIR__ . '/../models/Distrito.php';

class DistritoController {
    private $model;

    public function __construct() {
        $this->model = new Distrito();
    }

    public function index() {
        echo json_encode($this->model->getAllDistritos());
    }

    public function getById($id) {
        echo json_encode($this->model->getDistritoById($id));
    }

    public function create() {
        $body = json_decode(file_get_contents('php://input'), true);
        $this->model->createDistrito($body['nombre'], $body['canton_id']);
        echo json_encode(['message' => 'Distrito creado']);
    }

    public function update($id, $data) {
        $this->model->deleteDistrito($id); // Asumiendo que no existe update en modelo
        $this->model->createDistrito($data['nombre'], $data['canton_id']);
        echo json_encode(['message' => 'Distrito actualizado']);
    }

    public function delete($id) {
        $this->model->deleteDistrito($id);
        echo json_encode(['message' => 'Distrito eliminado']);
    }
}
