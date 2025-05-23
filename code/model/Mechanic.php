<?php
require_once 'config/Database.php';

class Mechanic {    
    private $conn;
    private $table = "mechanics";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllMechanics() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMechanicById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addMechanic($name, $specialization, $phone, $experience_years) {
        $query = "INSERT INTO " . $this->table . " (name, specialization, phone, experience_years) 
                 VALUES (:name, :specialization, :phone, :experience_years)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':specialization', $specialization);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':experience_years', $experience_years);
        return $stmt->execute();
    }

    public function updateMechanic($id, $name, $specialization, $phone, $experience_years) {
        $query = "UPDATE " . $this->table . " 
                 SET name = :name, specialization = :specialization, 
                     phone = :phone, experience_years = :experience_years 
                 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':specialization', $specialization);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':experience_years', $experience_years);
        return $stmt->execute();
    }

    public function deleteMechanic($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
