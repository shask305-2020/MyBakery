<?php
class dbconnect {
    //Переменная для хранения ссылки на базу данных
    private $conn;

    //Конструктор класса
    function __construct() { }

    //Метод для подключения к базе данных
    function connect() {
        //Подключаем файл constants.php
        include_once dirname(__FILE__) . '/constants.php';

        // подключаемся к серверу
        $this->conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
        echo "Установлено подключение к базе данных";
        if($conn->connect_error){
            die("Ошибка: " . $conn->connect_error);
            return null;
        }
        echo "Подключение успешно установлено";
        return $this->conn;
    }

}

?>