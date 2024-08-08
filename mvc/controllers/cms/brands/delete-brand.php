<?php
    require_once('mvc/model/brands.php');

    require_once('mvc/controllers/auth.php');

    $params['id'] = $_GET['id'] ?? null;

    deleteBrandById($params);

    require_once('mvc/controllers/cms/brands/brands.php');

?>