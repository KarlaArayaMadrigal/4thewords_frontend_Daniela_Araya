<?php
require_once __DIR__ . '/../db/DbConnect.php';

class Usuario {
    private $db;

    public function __construct()
    {
        $db = new DbConnect();
        $this->db = $db->getConnection();
    }

    public function getAllUsuarios() {
        $query = "SELECT id_usuario, correo FROM usuario"; // No devolvemos la contraseña
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUsuarioById($id) {
        $query = "SELECT id_usuario, correo FROM usuario WHERE id_usuario = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createUsuario($correo, $contraseña) {
        $hash = password_hash($contraseña, PASSWORD_DEFAULT); // Encriptar contraseña
        $query = "INSERT INTO usuario (correo, contraseña) VALUES (:correo, :contraseña)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->bindParam(':contraseña', $hash, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function verificarCredenciales($correo, $contraseña) {
        $query = "SELECT * FROM usuario WHERE correo = :correo";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':correo', $correo, PDO::PARAM_STR);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
            return $usuario;
        } else {
            return false;
        }
    }

    public function deleteUsuario($id) {
        $query = "DELETE FROM usuario WHERE id_usuario = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
