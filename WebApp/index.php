<?php

 //Добавление операционного файла БД
 require_once dirname(__FILE__) . '/dboperation.php';

//Массив ответов
 $response = array();

 //Вызываем API если запрос GET с именем "op"
 if(isset($_GET['op'])) {

     //Переключатель значения операции
     switch($_GET['op']){

         //Если в запросе получен "addclient"
         //мы добавим клиента
         case 'addclient':


             if(isset($_POST['client']) && $_POST['client'] != "" ){
                 $db = new dboperation();
                 echo "addclient";
                 if($db->createClient($_POST['client'])){
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

         //Если в запросе получен "addartist"
         //мы добавим исполнителя
         case 'addartist':
             if(isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['genre'])){
                 $db = new dboperation();
                 if($db->createArtist($_POST['name'], $_POST['genre'])){
                     $response['error'] = false;
                     $response['message'] = 'Артист добавлен удачно.';
                 }else{
                     $response['error'] = true;
                     $response['message'] = 'Не получилось добавить артиста!!!';
                 }
             }else{
                 $response['error'] = true;
                 $response['message'] = 'Необходимые параметры отсутствуют!!!';
             }
         break;


             // Если в запросе получен "delartist" то мы удаляем
         case 'delartist':
             if(isset($_POST['id']) && $_POST['id'] != ""){
                 $db = new dboperation();
                 if($db->delArtist($_POST['id'])){
                     $response['error'] = false;
                     $response['message'] = 'Артист удален.';
                 }else{
                     $response['error'] = true;
                     $response['message'] = 'Не получилось удалить артиста!!!';
                 }
             }else{
                 $response['error'] = true;
                 $response['message'] = 'Необходимые параметры отсутствуют!!!';
             }
         break;

             // Если в запросе получен "updartist" то мы удаляем
         case 'updartist':
             if(isset($_POST['id']) && $_POST['id'] != "" && isset($_POST['name']) && $_POST['name'] != "" && isset($_POST['genre'])){
                 $db = new dboperation();
                 if($db->updArtist($_POST['id'], $_POST['name'], $_POST['genre'])){
                     $response['error'] = false;
                     $response['message'] = 'Артист обновлен.';
                 }else{
                     $response['error'] = true;
                     $response['message'] = 'Не получилось обновить артиста!!!';
                 }
             }else{
                 $response['error'] = true;
                 $response['message'] = 'Необходимые параметры отсутствуют!!!';
             }
         break;

             //Если в запросе получен "getartist" то мы извлекаем все данные
         case 'getartists':
             $db = new dboperation();
             $artists = $db->getArtists();
             if(count($artists)<=0){
                 $response['error'] = true;
                 $response['message'] = 'В базе данных ничего не найдено';
             }else{
                 $response['error'] = false;
                 $response['artists'] = $artists;
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
 echo json_encode($response);