<?php

require_once('mvc/core/db.php');

function getBrands() : array {
    $sql = "SELECT * FROM brands";
    $query = dbQuery($sql);
    return $query->fetchAll();
}

?>