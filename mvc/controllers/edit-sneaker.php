<?php
    require_once('mvc/model/sneakers.php');

    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: /');
        exit;
    }

    $sneakers_id = $_GET['id'] ?? null;

    if (! $sneakers_id) {
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
    $images = $_FILES['images'];

    if (isset($_FILES['previewImage']) && $_FILES['previewImage']['error'] == 0) {
        // @todo delete old image
        $image_name = uniqid($_FILES['previewImage']['name']) . $_FILES['previewImage']['name'];
        $target_dir = "resources/data/images/sneakers/";
        $target_file = $target_dir . $image_name;

        if (move_uploaded_file($_FILES['previewImage']['tmp_name'], $target_file)) {
            updateSneaker([
                'id' => $sneakers_id,
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
        updateSneaker([
            'id' => $sneakers_id,
            'name' => $name,
            'description' => $description,
            'size' => $size,
            'brand' => $brand_id,
            'season' => $season,
            'sex' => $sex,
            'basePrice' => $basePrice,
            'price' => $price,
            'published' => $published ? 1 : 0,
        ]);
    }

    if (isset($_POST['imagesCleared']) && $_POST['imagesCleared'] == "1") {
        // @todo delete all images
        deleteSneakerImages([
            'sneakers_id' => $sneakers_id,
        ]);
    }

    if (! empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['name'] as $key => $image) {
            $image_name = uniqid($_FILES['images']['name'][$key]) . $_FILES['images']['name'][$key];
            $target_dir = "resources/data/images/sneakers/";
            $target_file = $target_dir . $image_name;

            if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $target_file)) {
                addSneakerImage([
                    'sneakers_id' => $sneakers_id,
                    'name' => $image_name,
                    'priority' => 1000 - $key,
                ]);
            } else {
                echo "Помилка при завантаженні зображень.";
            }
        }
    }

    header('Location: /sneakers/?c=cms/sneakers/edit-sneaker&id=' . $sneakers_id);
    exit;
?>