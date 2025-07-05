<?php
require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController {
    private $model;

    public function __construct() {
        $this->model = new Categoria();
    }

    public function index() {
        echo json_encode($this->model->getAllCategorias());
    }

    public function getById($id) {
        echo json_encode($this->model->getCategoriaById($id));
    }

    public function create() {
        $body = json_decode(file_get_contents('php://input'), true);
        $this->model->createCategoria($body['nombreCategoria']);
        echo json_encode(['message' => 'Categoría creada']);
    }

    public function update($id, $data) {
        $this->model->updateCategoria($id, $data['nombreCategoria']);
        echo json_encode(['message' => 'Categoría actualizada']);
    }

    public function delete($id) {
        $this->model->deleteCategoria($id);
        echo json_encode(['message' => 'Categoría eliminada']);
    }
}
