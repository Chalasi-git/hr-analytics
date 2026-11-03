<?php
class EmployeeModel {
    private $conn;
    private $table_name = "wa_fn_usec__hr_employee_attrition";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Attrition දත්ත ලබා ගැනීම
    public function getAttritionStats() {
        $query = "SELECT `COL 2` AS Attrition, COUNT(*) AS count
                  FROM `" . $this->table_name . "`
                  WHERE `COL 2` IN ('Yes', 'No')
                  GROUP BY `COL 2`";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>