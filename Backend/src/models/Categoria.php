<?php
require_once __DIR__ . '/../db/DbConnect.php';

class Categoria {
    private $db;

    public function __construct() {
        $conn = new DbConnect();
        $this->db = $conn->getConnection();
    }

    public function getAllCategorias() {
        $stmt = $this->db->prepare("SELECT * FROM categoria");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategoriaById($id) {
        $stmt = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createCategoria($nombreCategoria) {
        $stmt = $this->db->prepare("INSERT INTO categoria (nombreCategoria) VALUES (:nombre)");
        $stmt->bindParam(':nombre', $nombreCategoria, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updateCategoria($id, $nombreCategoria) {
        $stmt = $this->db->prepare("UPDATE categoria SET nombreCategoria = :nombre WHERE id_categoria = :id");
        $stmt->bindParam(':nombre', $nombreCategoria, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteCategoria($id) {
        $stmt = $this->db->prepare("DELETE FROM categoria WHERE id_categoria = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
