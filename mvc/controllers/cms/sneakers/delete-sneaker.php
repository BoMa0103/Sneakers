<?php
    require_once('mvc/model/sneakers.php');

    require_once('mvc/controllers/auth.php');

    $params['id'] = $_GET['id'] ?? null;

    deleteSneakerById($params);

    require_once('mvc/controllers/cms/sneakers/sneakers.php');

?>