<?php
require_once __DIR__ . '/../db/DbConnect.php';

class Leyenda {
    private $db;
    private $conn;

    public function __construct()
    {
        $db = new DbConnect();
        $this->db = $db->getConnection();
    }

    public function getAllLeyendas() {
        $query = "SELECT * FROM leyenda";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLeyendaById($id) {
        $query = "SELECT * FROM leyenda WHERE id_leyenda = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarLeyendaPorNombre($nombre) {
        $query = "SELECT * FROM leyenda WHERE nombre LIKE :nombre";
        $stmt = $this->db->prepare($query);
        $nombre = '%' . $nombre . '%';
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createLeyenda($data) {
        $query = "INSERT INTO leyenda (nombre, descripcion, imagen_url, fecha, categoria_id, provincia_id, canton_id, distrito_id)
                  VALUES (:nombre, :descripcion, :imagen_url, :fecha, :categoria_id, :provincia_id, :canton_id, :distrito_id)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
        $stmt->bindParam(':imagen_url', $data['imagen_url'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $data['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(':categoria_id', $data['categoria_id'], PDO::PARAM_INT);
        $stmt->bindParam(':provincia_id', $data['provincia_id'], PDO::PARAM_INT);
        $stmt->bindParam(':canton_id', $data['canton_id'], PDO::PARAM_INT);
        $stmt->bindParam(':distrito_id', $data['distrito_id'], PDO::PARAM_INT);
        $stmt->execute();
    }

    public function updateLeyenda($id, $data) {
        try {
            $query = "UPDATE leyenda 
                      SET nombre = :nombre, descripcion = :descripcion, imagen_url = :imagen_url, fecha = :fecha, 
                          categoria_id = :categoria_id, provincia_id = :provincia_id, canton_id = :canton_id, distrito_id = :distrito_id
                      WHERE id_leyenda = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':descripcion', $data['descripcion'], PDO::PARAM_STR);
            $stmt->bindParam(':imagen_url', $data['imagen_url'], PDO::PARAM_STR);
            $stmt->bindParam(':fecha', $data['fecha'], PDO::PARAM_STR);
            $stmt->bindParam(':categoria_id', $data['categoria_id'], PDO::PARAM_INT);
            $stmt->bindParam(':provincia_id', $data['provincia_id'], PDO::PARAM_INT);
            $stmt->bindParam(':canton_id', $data['canton_id'], PDO::PARAM_INT);
            $stmt->bindParam(':distrito_id', $data['distrito_id'], PDO::PARAM_INT);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return ["success" => true, "message" => "Leyenda actualizada exitosamente"];
            } else {
                return ["success" => false, "message" => "No se pudo actualizar la leyenda"];
            }
        } catch (PDOException $e) {
            return ["success" => false, "message" => $e->getMessage()];
        }
    }

    public function deleteLeyenda($id) {
        $query = "DELETE FROM leyenda WHERE id_leyenda = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
