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

    $sneakers = getAllSneakers();

    require('mvc/view/cms/sneakers/sneakers.php');

?>