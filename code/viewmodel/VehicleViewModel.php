<?php
require_once 'model/Vehicle.php';

class VehicleViewModel {
    private $model;

    public function __construct() {
        $this->model = new Vehicle();
    }

    public function getVehicleList() {
        return $this->model->getAllVehicles();
    }

    public function getVehicleById($id) {
        return $this->model->getVehicleById($id);
    }

    public function addVehicle($plate_number, $brand, $model, $year, $owner_name, $owner_phone) {
        return $this->model->addVehicle($plate_number, $brand, $model, $year, $owner_name, $owner_phone);
    }

    public function updateVehicle($id, $plate_number, $brand, $model, $year, $owner_name, $owner_phone) {
        return $this->model->updateVehicle($id, $plate_number, $brand, $model, $year, $owner_name, $owner_phone);
    }

    public function deleteVehicle($id) {
        return $this->model->deleteVehicle($id);
    }
}
