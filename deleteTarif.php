<?php

require_once('includes/initialize.php');

header('Content-Type: application/json; charset=UTF-8');

$response = array();


if (isset($_POST['ID'])){

    $tarif_ID = $_POST['ID'];


    $result = $api->deleteTarif($tarif_ID);

    if($result){
        $response['status'] = "00";
        $response['message'] = "Одно значение из таблицы 'tarifs' было успешно удалено!";
    }else{
        $response['status'] = "06";
        $response['message'] = "Ошибка при удаление одного значения из таблицы 'tarifs' .";
    }

    echo json_encode($response);
}else {
    $response['status'] = "99";
    $response['message'] = "Необходимые параметры при удалении отсутсвуют! (tarifs).";

    echo json_encode($response);
}

?>