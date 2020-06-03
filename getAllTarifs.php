<?php

require_once('includes/initialize.php');

header('Content-Type: application/json; charset=UTF-8');

$response = array();

$result = $api->getAllTarifs();

if(count($result) > 0){
    $response['status'] = "00";
    $response['message'] = "Операция успешно выполнена.";
    $response['tarifs'] = $result;
}else{
    $response['status'] = "06";
    $response['message'] = "Нет доступных 'tarifs'";
}

echo json_encode($response);



?>