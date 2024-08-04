<?php

    require_once('mvc/model/sneakers.php');

    $seasons = [
        'S' => 'Літо',
        'W' => 'Зима',
    //    'P' => 'Осінь',
    //    'A' => 'Весна',
    ];

    $params['id'] = $_GET['id'] ?? null;

    if(!$params['id']){
        exit();
    }

    $sneaker = getSneakerById($params);
    $sneakerImages = getSneakerImagesById($params);
    $brand = getBrand($params);

    require('mvc/view/details.php');

?>
