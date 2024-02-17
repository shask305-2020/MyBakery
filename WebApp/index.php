<?php

//Добавление операционного файла БД
require_once dirname(__FILE__) . '/dboperation.php';

//Массив ответов
$response = array();

 //Вызываем API если запрос GET с именем "op"
if (isset($_GET['op'])) {
    //Переключатель значения операции
    switch($_GET['op']){

        //Если в запросе получен "addclient"
        //мы добавим клиента
        case 'addclient':
            if(isset($_POST['client']) && $_POST['client'] != "" ){
                $db = new dboperation();
                if($db->addClient($_POST['client'])){
                    $response['error'] = false;
                    $response['message'] = 'Клиент добавлен успешно.';
                }else{
                    $response['error'] = true;
                    $response['message'] = 'Не получилось добавить клиента!';
                }
            }else{
                echo "Ошибка";
                $response['error'] = true;
                $response['message'] = 'Необходимые параметры отсутствуют!!!';
            }
        break;

        case 'getclient':
            $db = new dboperation();
            if($result = $db->getClient()){
                while ($row = $result->fetch_assoc()) {
                    $response[] = $row;
                }
            }
        break;

        default:
                 $response['error'] = true;
                 $response['message'] = 'Нет операции для выполнения';
    }
}else{
    $response['error'] = false;
    $response['message'] = 'Неверный запрос';
}

//Отобразить данные в JSON
echo json_encode($response, JSON_UNESCAPED_UNICODE);