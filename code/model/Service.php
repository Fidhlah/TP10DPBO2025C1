<?php
class Service {
    private $conn;
    private $table = "services";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllServices() {
        $query = "SELECT s.*, v.plate_number, v.brand, v.model, m.name as mechanic_name 
                 FROM " . $this->table . " s
                 JOIN vehicles v ON s.vehicle_id = v.id
                 JOIN mechanics m ON s.mechanic_id = m.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getServiceById($id) {
        $query = "SELECT s.*, v.plate_number, v.brand, v.model, m.name as mechanic_name 
                 FROM " . $this->table . " s
                 JOIN vehicles v ON s.vehicle_id = v.id
                 JOIN mechanics m ON s.mechanic_id = m.id
                 WHERE s.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addService($vehicle_id, $mechanic_id, $service_date, $description, $cost, $status) {
        $query = "INSERT INTO " . $this->table . " (vehicle_id, mechanic_id, service_date, description, cost, status) 
                 VALUES (:vehicle_id, :mechanic_id, :service_date, :description, :cost, :status)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':vehicle_id', $vehicle_id);
        $stmt->bindParam(':mechanic_id', $mechanic_id);
        $stmt->bindParam(':service_date', $service_date);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':cost', $cost);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    public function updateService($id, $vehicle_id, $mechanic_id, $service_date, $description, $cost, $status) {
        $query = "UPDATE " . $this->table . " 
                 SET vehicle_id = :vehicle_id, mechanic_id = :mechanic_id, 
                     service_date = :service_date, description = :description, 
                     cost = :cost, status = :status 
                 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':vehicle_id', $vehicle_id);
        $stmt->bindParam(':mechanic_id', $mechanic_id);
        $stmt->bindParam(':service_date', $service_date);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':cost', $cost);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    }

    public function deleteService($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
