<?php
    require_once('mvc/model/brands.php');
    require_once('mvc/model/sneakers.php');

    require_once('mvc/controllers/auth.php');

    $brands = getBrands();

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

    require('mvc/view/cms/sneakers/add-sneaker.php');

?>