<?php
    require_once('mvc/model/sneakers.php');

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: /');
        exit;
    }

    $id = $_GET['id'] ?? null;

    if (! $id) {
        exit;
    }

    $name = $_POST['name'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $brand_id = $_POST['brand_id'];
    $season = $_POST['season'];
    $sex = $_POST['sex'];
    $basePrice = $_POST['basePrice'];
    $price = $_POST['price'];
    $published = $_POST['published'] ?? 0;
    $previewImage = $_FILES['previewImage'];

    if (isset($_FILES['previewImage']) && $_FILES['previewImage']['error'] == 0) {
        $image_name = uniqid($_FILES['previewImage']['name']) . $_FILES['previewImage']['name'];
        $target_dir = "resources/data/images/sneakers/";
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES['previewImage']['tmp_name'], $target_file)) {
            updateSneaker([
                'id' => $id,
                'name' => $name,
                'description' => $description,
                'size' => $size,
                'brand' => $brand_id,
                'season' => $season,
                'sex' => $sex,
                'basePrice' => $basePrice,
                'price' => $price,
                'published' => $published ? 1 : 0,
                'previewImage' => $image_name,
            ]);
        } else {
            echo "Помилка при завантаженні зображення.";
        }
    } else {
        echo "Помилка завантаження зображення або зображення не було завантажене.";
    }

    header('Location: /sneakers/?c=cms/sneakers/edit-sneaker&id=' . $id);
    exit;
?>