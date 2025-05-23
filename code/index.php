<?php
require_once 'config/Database.php';
require_once 'viewmodel/VehicleViewModel.php';
require_once 'viewmodel/MechanicViewModel.php';
require_once 'viewmodel/ServiceViewModel.php';

$entity = isset($_GET['entity']) ? $_GET['entity'] : 'vehicle';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

if ($entity == 'vehicle') {
    $viewModel = new VehicleViewModel();
    if ($action == 'list') {
        $vehicleList = $viewModel->getVehicleList();
        require_once 'views/vehicle_list.php';
    } elseif ($action == 'add') {
        require_once 'views/vehicle_form.php';
    } elseif ($action == 'edit') {
        $vehicle = $viewModel->getVehicleById($_GET['id']);
        require_once 'views/vehicle_form.php';
    } elseif ($action == 'save') {
        $viewModel->addVehicle($_POST['plate_number'], $_POST['brand'], $_POST['model'], 
                              $_POST['year'], $_POST['owner_name'], $_POST['owner_phone']);
        header('Location: index.php?entity=vehicle');
    } elseif ($action == 'update') {
        $viewModel->updateVehicle($_GET['id'], $_POST['plate_number'], $_POST['brand'], 
                                 $_POST['model'], $_POST['year'], $_POST['owner_name'], $_POST['owner_phone']);
        header('Location: index.php?entity=vehicle');
    } elseif ($action == 'delete') {
        $viewModel->deleteVehicle($_GET['id']);
        header('Location: index.php?entity=vehicle');
    }
} elseif ($entity == 'mechanic') {
    $viewModel = new MechanicViewModel();
    if ($action == 'list') {
        $mechanicList = $viewModel->getMechanicList();
        require_once 'views/mechanic_list.php';
    } elseif ($action == 'add') {
        require_once 'views/mechanic_form.php';
    } elseif ($action == 'edit') {
        $mechanic = $viewModel->getMechanicById($_GET['id']);
        require_once 'views/mechanic_form.php';
    } elseif ($action == 'save') {
        $viewModel->addMechanic($_POST['name'], $_POST['specialization'], 
                               $_POST['phone'], $_POST['experience_years']);
        header('Location: index.php?entity=mechanic');
    } elseif ($action == 'update') {
        $viewModel->updateMechanic($_GET['id'], $_POST['name'], $_POST['specialization'], 
                                  $_POST['phone'], $_POST['experience_years']);
        header('Location: index.php?entity=mechanic');
    } elseif ($action == 'delete') {
        $viewModel->deleteMechanic($_GET['id']);
        header('Location: index.php?entity=mechanic');
    }
} elseif ($entity == 'service') {
    $viewModel = new ServiceViewModel();
    if ($action == 'list') {
        $serviceList = $viewModel->getServiceList();
        require_once 'views/service_list.php';
    } elseif ($action == 'add') {
        $vehicles = $viewModel->getVehicles();
        $mechanics = $viewModel->getMechanics();
        require_once 'views/service_form.php';
    } elseif ($action == 'edit') {
        $service = $viewModel->getServiceById($_GET['id']);
        $vehicles = $viewModel->getVehicles();
        $mechanics = $viewModel->getMechanics();
        require_once 'views/service_form.php';
    } elseif ($action == 'save') {
        $viewModel->addService($_POST['vehicle_id'], $_POST['mechanic_id'], $_POST['service_date'],
                             $_POST['description'], $_POST['cost'], $_POST['status']);
        header('Location: index.php?entity=service');
    } elseif ($action == 'update') {
        $viewModel->updateService($_GET['id'], $_POST['vehicle_id'], $_POST['mechanic_id'], 
                                $_POST['service_date'], $_POST['description'], $_POST['cost'], $_POST['status']);
        header('Location: index.php?entity=service');
    } elseif ($action == 'delete') {
        $viewModel->deleteService($_GET['id']);
        header('Location: index.php?entity=service');
    }
}
?>
