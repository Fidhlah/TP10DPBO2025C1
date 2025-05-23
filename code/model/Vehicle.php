<?php
class Vehicle {
    private $conn;
    private $table = "vehicles";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllVehicles() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVehicleById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addVehicle($plate_number, $brand, $model, $year, $owner_name, $owner_phone) {
        $query = "INSERT INTO " . $this->table . " (plate_number, brand, model, year, owner_name, owner_phone) 
                 VALUES (:plate_number, :brand, :model, :year, :owner_name, :owner_phone)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':plate_number', $plate_number);
        $stmt->bindParam(':brand', $brand);
        $stmt->bindParam(':model', $model);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':owner_name', $owner_name);
        $stmt->bindParam(':owner_phone', $owner_phone);
        return $stmt->execute();
    }

    public function updateVehicle($id, $plate_number, $brand, $model, $year, $owner_name, $owner_phone) {
        $query = "UPDATE " . $this->table . " 
                 SET plate_number = :plate_number, brand = :brand, model = :model, 
                     year = :year, owner_name = :owner_name, owner_phone = :owner_phone 
                 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':plate_number', $plate_number);
        $stmt->bindParam(':brand', $brand);
        $stmt->bindParam(':model', $model);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':owner_name', $owner_name);
        $stmt->bindParam(':owner_phone', $owner_phone);
        return $stmt->execute();
    }

    public function deleteVehicle($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
