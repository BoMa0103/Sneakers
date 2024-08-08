<?php
    require_once('mvc/model/brands.php');

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: /');
        exit;
    }

    $name = $_POST['name'];
    $priority = $_POST['priority'];

    addBrand([
        'name' => $name,
        'priority' => $priority,
    ]);

    header('Location: /sneakers/?c=cms/brands/add-brand');
    exit;
?>