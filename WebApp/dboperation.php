<?php

class dboperation {
    private $con;

    function __construct()
    {
        require_once dirname(__FILE__) . '/dbconnect.php';
        $db = new dbconnect();
        $this->con = $db->connect();
    }

    // Добавление нового клинта
    public function createClient($name) {
        echo "операция дошла до сюда";
        $stmt = $this->con->prepare("INSERT INTO `clients` (`client_name`) VALUES (?)");
        $stmt->bind_param("ss", $name);

        if($stmt->execute())
        {
            echo "операция выполнена";
            return true;
        }
        return false;
    }

    //Добавление записи в базу данных
    public function createArtist($name, $genre){
        $stmt = $this->con->prepare("INSERT INTO artists (name, genre) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $genre);
        if($stmt->execute())
            return true;
        return false;
    }

    //Удалить запись из базы данных
    public function delArtist($id){
        $stmt = $this->con->prepare("DELETE FROM artists WHERE id='$id'");
        $stmt->bind_param("ss", $id);
        if($stmt->execute())
            return true;
        return false;
    }

    // Обновить запись в базе данных
    public function updArtist($id, $name, $genre){
        $stmt = $this->con->prepare("UPDATE artists SET name = '$name', genre = '$genre' WHERE id = '$id'");
        $stmt->bind_param("ss", $name, $genre);
        if($stmt->execute())
            return true;
        return false;
    }

    //Извлечение всех записей из базы данных
    public function getArtists(){
        $stmt = $this->con->prepare("SELECT id, name, genre FROM artists");
        $stmt->bind_result($id, $name, $genre);
        $stmt->execute();
        $artists = array();

        while($stmt->fetch()){
            $temp = array();
            $temp['id'] = $id;
            $temp['name'] = $name;
            $temp['genre'] = $genre;
            array_push($artists, $temp);
        }
        return $artists;
    }
}