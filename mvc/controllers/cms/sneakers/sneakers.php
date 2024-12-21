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

    $page = $_GET['page'] ?? 1;

    $perPage = 30;
    $offset = ($page - 1) * $perPage;

    $sneakers = getAllSneakers([
        'limit' => $perPage,
        'offset' => $offset,
    ]);

    $totalPages = ceil(getSneakersCount() / $perPage);


    require('mvc/view/cms/sneakers/sneakers.php');

?>