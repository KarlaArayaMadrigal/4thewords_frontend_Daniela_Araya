<?php
require_once __DIR__ . '/../db/DbConnect.php';

class Distrito {
    private $db;

    public function __construct()
    {
        $db = new DbConnect();
        $this->db = $db->getConnection();
    }

    public function getAllDistritos() {
        $query = "SELECT * FROM distrito";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDistritoById($id) {
        $query = "SELECT * FROM distrito WHERE id_distrito = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getDistritosByCanton($canton_id) {
        $query = "SELECT * FROM distrito WHERE canton_id = :canton_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':canton_id', $canton_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createDistrito($nombre, $canton_id) {
        $query = "INSERT INTO distrito (nombre, canton_id) VALUES (:nombre, :canton_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':canton_id', $canton_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function deleteDistrito($id) {
        $query = "DELETE FROM distrito WHERE id_distrito = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
