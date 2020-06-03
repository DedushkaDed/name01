<?php

require_once('includes/initialize.php');

header('Content-Type: application/json; charset=UTF-8');

$response = array();


if (isset($_POST['title']) && isset($_POST['price']) && isset($_POST['link']) && isset($_POST['speed']) && isset($_POST['pay_period']) && isset($_POST['tarif_group_id'])){
    $tarif_title = $_POST['title'];
    $tarif_price = $_POST['price'];
    $tarif_link = $_POST['link'];
    $tarif_speed = $_POST['speed'];
    $tarif_pay_period = $_POST['pay_period'];
    $tarif_group_id = $_POST['tarif_group_id'];


    $result = $api->addTarif($tarif_title, $tarif_price, $tarif_link, $tarif_speed, $tarif_pay_period, $tarif_group_id);

    if($result){
        $response['status'] = "00";
        $response['message'] = "В таблицу 'tarifs' успешно добавлены файлы.";
    }else{
        $response['status'] = "06";
        $response['message'] = "Ошибка добавление новых файлов в таблицу 'tarifs'.";
    }

    echo json_encode($response);
} else {
    $response['status'] = "99";
    $response['message'] = "Необходимые параметры отсутсвуют! 'tarifs'.";

    echo json_encode($response);
}

?>