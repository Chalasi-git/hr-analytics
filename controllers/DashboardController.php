<?php
require_once 'models/EmployeeModel.php';
require_once 'config/Database.php';

class DashboardController {
    public function index() {
        $database = new Database();
        $db = $database->getConnection();

        $employeeModel = new EmployeeModel($db);
        $stats = $employeeModel->getAttritionStats();

        // View එකට දත්ත යැවීම
        include 'views/dashboard.php';
    }
}
?>