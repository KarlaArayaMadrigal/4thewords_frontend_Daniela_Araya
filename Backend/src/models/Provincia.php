<?php
require_once __DIR__ . '/../db/DbConnect.php';

class Provincia {
    private $db;

    public function __construct()
    {
        $db = new DbConnect();
        $this->db = $db->getConnection();
    }

    public function getAllProvincias() {
        $query = "SELECT * FROM provincia";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProvinciaById($id) {
        $query = "SELECT * FROM provincia WHERE id_provincia = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createProvincia($nombre) {
        $query = "INSERT INTO provincia (nombre) VALUES (:nombre)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function updateProvincia($id, $nombre) {
        $query = "UPDATE provincia SET nombre = :nombre WHERE id_provincia = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function deleteProvincia($id) {
        $query = "DELETE FROM provincia WHERE id_provincia = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
