<?php

require_once('mvc/model/sneakers.php');

if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $sneakers = getSneakers([
        'search' => $query,
    ]);
    echo json_encode($sneakers);
}

?>