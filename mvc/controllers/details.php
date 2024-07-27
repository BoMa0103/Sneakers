<?php

    require_once('mvc/model/sneakers.php');

    $params['id'] = $_GET['id'] ?? null;

    if(!$params['id']){
        exit();
    }

    $sneaker = getSneakerById($params);
    $sneakerImages = getSneakerImagesById($params);
    $season = getSneakerSeason($params);
    $brand = getBrand($params);

    require('mvc/view/details.php');

?>
