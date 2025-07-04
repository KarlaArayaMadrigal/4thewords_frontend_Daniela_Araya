<?php
class DbConnect {
    private $host = 'localhost';
    private $dbName = '4thewords_prueba_daniela_araya';
    private $username = 'root';
    private $password = 'admin';
    private $conn;
    public function getConnection() {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Error de conexión: " . $e->getMessage();
                die();
            }
        }
        return $this->conn;
    }
}
