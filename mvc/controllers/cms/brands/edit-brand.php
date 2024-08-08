<?php
    require_once('mvc/model/brands.php');

    require_once('mvc/controllers/auth.php');

    $params['id'] = $_GET['id'] ?? null;

    $brand = getBrandById($params);

    require('mvc/view/cms/brands/edit-brand.php');

?>