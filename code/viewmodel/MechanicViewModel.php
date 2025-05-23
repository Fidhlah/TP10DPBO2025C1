<?php
require_once 'model/Mechanic.php';

class MechanicViewModel {
    private $model;

    public function __construct() {
        $this->model = new Mechanic();
    }

    public function getMechanicList() {
        return $this->model->getAllMechanics();
    }

    public function getMechanicById($id) {
        return $this->model->getMechanicById($id);
    }

    public function addMechanic($name, $specialization, $phone, $experience_years) {
        return $this->model->addMechanic($name, $specialization, $phone, $experience_years);
    }

    public function updateMechanic($id, $name, $specialization, $phone, $experience_years) {
        return $this->model->updateMechanic($id, $name, $specialization, $phone, $experience_years);
    }

    public function deleteMechanic($id) {
        return $this->model->deleteMechanic($id);
    }
}
