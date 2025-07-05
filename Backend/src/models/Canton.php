<?php
require_once __DIR__ . '/../db/DbConnect.php';

class Canton {
    private $db;

    public function __construct()
    {
        $db = new DbConnect();
        $this->db = $db->getConnection();
    }

    public function getAllCantones() {
        $query = "SELECT * FROM canton";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCantonById($id) {
        $query = "SELECT * FROM canton WHERE id_canton = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCantonesByProvincia($provincia_id) {
        $query = "SELECT * FROM canton WHERE provincia_id = :provincia_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':provincia_id', $provincia_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createCanton($nombre, $provincia_id) {
        $query = "INSERT INTO canton (nombre, provincia_id) VALUES (:nombre, :provincia_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':provincia_id', $provincia_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteCanton($id) {
        $query = "DELETE FROM canton WHERE id_canton = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
