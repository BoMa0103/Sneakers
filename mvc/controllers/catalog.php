<?php

require_once('mvc/model/brands.php');
require_once('mvc/model/sneakers.php');

$perPage = 30;

$sexOptions = [
    'M' => 'Чоловічі',
    'F' => 'Жіночі',
    'U' => 'Унісекс',
];

$seasons = [
    'S' => 'Літо',
    'W' => 'Зима',
//    'P' => 'Осінь',
//    'A' => 'Весна',
];

$selectedBrand = $_GET['brand'] ?? null;
$selectedSize = $_GET['selectedSize'] ?? null;
$selectedSeason = $_GET['selectedSeason'] ?? null;
$selectedSex = $_GET['selectedSex'] ?? null;
$sort = $_GET['sort'] ?? null;
$page = $_GET['page'] ?? 1;
$search = $_GET['search'] ?? null;

$brands = getBrands();

$offset = ($page - 1) * $perPage;

$sneakers = getSneakers([
    'brand' => $selectedBrand,
    'sort' => $sort,
    'season' => $selectedSeason,
    'size' => $selectedSize,
    'sex' => $selectedSex,
    'limit' => $perPage,
    'offset' => $offset,
    'search' => $search,
]);


$sizes = getSizes();

$totalPages = ceil(getSneakersCount() / $perPage);


require('mvc/view/catalog.php');

?>