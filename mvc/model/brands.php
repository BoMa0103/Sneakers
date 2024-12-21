<?php

    require_once('mvc/core/db.php');

    function addBrand(array $data) {
        $sql = "INSERT INTO brands (name, priority)" .
            "VALUES (:name, :priority)";

        dbQuery($sql, $data);
    }

    function editBrand(array $data) {
        $sql = "UPDATE brands SET name = :name, priority = :priority WHERE id = :id";
        dbQuery($sql, $data);
    }

    function getBrands() : array {
        $sql = "SELECT * FROM brands";
        $query = dbQuery($sql);
        return $query->fetchAll();
    }

    function getBrandById(array $data) {
        $sql = "SELECT * FROM brands WHERE id = :id";
        $query = dbQuery($sql, $data);
        return $query->fetch();
    }

    function deleteBrandById(array $data) {
        $sql = "DELETE FROM brands WHERE id = :id";
        dbQuery($sql, $data);
    }

?>