<?php

require_once('mvc/core/db.php');

function getSneakers(array $filters = []) : array {
    $sql = "SELECT * FROM sneakers";
    if ($filters['brand']) {
        $sql .= " WHERE brand = " .$filters['brand'];
    }
    if ($filters['season']) {
        $sql .= " WHERE season = " .$filters['season'];
    }
    if ($filters['sort']) {
        switch ($filters['sort']) {
            case 'low-to-high': $sql .= " ORDER BY price"; break;
            case 'high-to-low': $sql .= " ORDER BY price DESC"; break;
        }
    }
    $query = dbQuery($sql);
    return $query->fetchAll();
}

function getSneakerById(array $params = []): array {
    $sql = "SELECT * FROM sneakers WHERE id " . " = :id";
    $query = dbQuery($sql, $params);
    return $query->fetch();
}

function getSneakerImagesById(array $params = []): array {
    $sql = "SELECT * FROM images WHERE sneakers_id " . " = :id";
    $query = dbQuery($sql, $params);
    return $query->fetchAll();
}

function getSizes(): array {
    $sql = "SELECT DISTINCT size FROM sneakers ORDER BY size";
    $query = dbQuery($sql);
    return $query->fetchAll();
}

function getSeasons(): array {
    $sql = "SELECT * FROM seasons";
    $query = dbQuery($sql);
    return $query->fetchAll();
}

?>