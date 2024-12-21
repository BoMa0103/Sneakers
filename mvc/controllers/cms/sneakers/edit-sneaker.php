<?php
    require_once('mvc/model/brands.php');
    require_once('mvc/model/sneakers.php');

    require_once('mvc/controllers/auth.php');

    $brands = getBrands();

    $params['id'] = $_GET['id'] ?? null;

    $seasons = [
        'S' => 'Літо',
        'W' => 'Зима',
        //    'P' => 'Осінь',
        //    'A' => 'Весна',
    ];

    $sexOptions = [
        'M' => 'Чоловічі',
        'F' => 'Жіночі',
        'U' => 'Унісекс',
    ];

    $sneaker = getSneakerById($params);
    $sneakerImages = getSneakerImagesById($params);
    $selectedBrand = getBrand($params);

    require('mvc/view/cms/sneakers/edit-sneaker.php');

?>