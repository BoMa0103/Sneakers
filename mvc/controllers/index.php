<?php

    require_once('mvc/model/brands.php');
    require_once('mvc/model/sneakers.php');

    $selectedBrand = $_GET['brand'] ?? null;
    $selectedSize = $_GET['selectedSize'] ?? null;
    $selectedSeason = $_GET['selectedSeason'] ?? null;
    $sort = $_GET['sort'] ?? null;

    $brands = getBrands();

    $sneakers = getSneakers([
        'brand' => $selectedBrand,
        'sort' => $sort,
        'season' => $selectedSeason,
    ]);

    $sizes = getSizes();
    $seasons = getSeasons();

    require('mvc/view/index.php');

?>