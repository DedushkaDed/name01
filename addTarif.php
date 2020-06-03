<?php

require_once('includes/initialize.php');

header('Content-Type: application/json; charset=UTF-8');

$response = array();


/* if (isset($_POST['title']) && isset($_POST['price']) && isset($_POST['link']) 
&& isset($_POST['speed']) && isset($_POST['payPeriod']) && isset($_POST['groupId'])) */

if (isset($_POST['title']) && isset($_POST['speed']) && isset($_POST['link'])){
    $tarif_title = $_POST['title'];
    $tarif_speed = $_POST['speed'];
    $tarif_link = $_POST['link'];
    // $speed = $_POST['speed'];
    // $payPeriod = $_POST['payPeriod'];
    // $groupId = $_POST['groupId'];

    // $result = $api->addTarif($title, $price, $link, $speed, $payPeriod, $groupId);
    $result = $api->addTarif($tarif_title, $tarif_speed, $tarif_link);

    if($result){
        $response['status'] = "00";
        $response['message'] = "В таблицу tarifs успешно добавлены файлы.";
    }else{
        $response['status'] = "06";
        $response['message'] = "Ошибка добавление новых файлов в таблицу tarifs.";
    }

    echo json_encode($response);
}else {
    $response['status'] = "99";
    $response['message'] = "Необходимые параметры отсутсвуют! (tarifs).";

    echo json_encode($response);
}

?>