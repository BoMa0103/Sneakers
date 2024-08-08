<?php
    require_once('mvc/model/brands.php');

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: /');
        exit;
    }


    $id = $_GET['id'] ?? null;

    if (! $id) {
        exit;
    }

    $name = $_POST['name'];
    $priority = $_POST['priority'];

    editBrand([
        'id' => $id,
        'name' => $name,
        'priority' => $priority,
    ]);

    header('Location: /sneakers/?c=cms/brands/edit-brand&id=' . $id);
    exit;
?>