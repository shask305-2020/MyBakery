<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class dboperation {
    private $conn;

    function __construct()
    {
        require_once dirname(__FILE__) . '/dbconnect.php';
        $db = new dbconnect();
        $this->conn = $db->connect();
    }

    // Добавление нового клиента
    public function addClient($name) {
        $sql = "INSERT INTO clients (client_name) VALUES (?)";

        // определяем подготовленное заявление (prepared statement)
        $stmt = $this->conn->prepare($sql);

        // привязываем параметры к значениям
        $stmt->bind_param("s", $name);

        if($stmt->execute())
        {
            return true;
        }
        return false;
    }

    // Получение списка клиентов
    public function getClient() {
        $sql = "SELECT * FROM `clients`";
        if ($result = $this->conn->query($sql)) {
            return $result;
        }
        return $result;
    }
}

?>