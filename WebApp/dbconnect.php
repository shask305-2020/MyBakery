<?php

class dbconnect {
    //Переменная для хранения ссылки на базу данных
    private $con;

    //Конструктор класса
    function __construct(){ }

    //Метод для подключения к базе данных
    function connect() {
        //Подключаем файл constants.php
        include_once dirname(__FILE__) . '/constants.php';

        //Подключение к базе данных mysql
        $this->con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

        //Если произошла ошибка при подключении
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            return null;
        }

        //Наконец, возвращаем ссылку подключения
        //echo $con;  // Тестовое сообщение
        return $this->con;
    }

}