<?php

require_once('includes/initialize.php');

header('Content-Type: application/json; charset=UTF-8');

$response = array();

$result = $api->getTask1();

if(count($result) > 0){
    $response['status'] = "00";
    $response['message'] = "Операция успешно выполнена.";
    $response['tarifs'] = $result;
}else{
    $response['status'] = "06";
    $response['message'] = "Ошибка. Нет доступных данных по данному запросу.'";
}

echo json_encode($response);


?>