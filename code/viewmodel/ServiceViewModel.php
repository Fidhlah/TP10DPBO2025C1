<?php
require_once 'model/Service.php';
require_once 'model/Vehicle.php';
require_once 'model/Mechanic.php';

class ServiceViewModel {
    private $model;
    private $vehicleModel;
    private $mechanicModel;

    public function __construct() {
        $this->model = new Service();
        $this->vehicleModel = new Vehicle();
        $this->mechanicModel = new Mechanic();
    }

    public function getServiceList() {
        return $this->model->getAllServices();
    }

    public function getServiceById($id) {
        return $this->model->getServiceById($id);
    }

    public function getVehicles() {
        return $this->vehicleModel->getAllVehicles();
    }

    public function getMechanics() {
        return $this->mechanicModel->getAllMechanics();
    }

    public function addService($vehicle_id, $mechanic_id, $service_date, $description, $cost, $status) {
        return $this->model->addService($vehicle_id, $mechanic_id, $service_date, $description, $cost, $status);
    }

    public function updateService($id, $vehicle_id, $mechanic_id, $service_date, $description, $cost, $status) {
        return $this->model->updateService($id, $vehicle_id, $mechanic_id, $service_date, $description, $cost, $status);
    }

    public function deleteService($id) {
        return $this->model->deleteService($id);
    }
}
