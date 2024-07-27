<?php

require_once('mvc/core/db.php');

function getSneakers(array $filters = []) : array {
    $sql = "SELECT * FROM sneakers WHERE published = 1";
    if ($filters['search']) {
        $sql .= " AND name LIKE '%" .$filters['search']. "%'";
        $query = dbQuery($sql);
        return $query->fetchAll();
    }
    if ($filters['brand']) {
        $sql .= " AND brand = " .$filters['brand'];
    }
    if ($filters['season']) {
        $sql .=  " AND season = " .$filters['season'];
    }
    if ($filters['size']) {
        $sql .=  " AND size = " .$filters['size'];
    }
    if ($filters['sex']) {
        $sql .=  " AND sex = '" .$filters['sex']."'";
    }
    if ($filters['sort']) {
        switch ($filters['sort']) {
            case 'low-to-high': $sql .= " ORDER BY price"; break;
            case 'high-to-low': $sql .= " ORDER BY price DESC"; break;
            default: $sql .= " ORDER BY id DESC"; break;
        }
    } else {
        $sql .= " ORDER BY id DESC";
    }
    if ($filters['limit']) {
        $sql .= " LIMIT ". $filters['limit'];
    }
    if ($filters['offset']) {
        $sql .= " OFFSET ". $filters['offset'];
    }
    $query = dbQuery($sql);
    return $query->fetchAll();
}

function getSneakerById(array $params = []): array {
    $sql = "SELECT * FROM sneakers WHERE published = 1 AND id " . " = :id";
    $query = dbQuery($sql, $params);
    return $query->fetch();
}

function getSneakerImagesById(array $params = []): array {
    $sql = "SELECT * FROM images WHERE sneakers_id " . " = :id ORDER BY priority DESC";
    $query = dbQuery($sql, $params);
    return $query->fetchAll();
}

function getSneakerSeason(array $params = []): array {
    $sql = "SELECT seasons.* FROM seasons JOIN sneakers WHERE sneakers.season = seasons.id AND sneakers.id " . " = :id";
    $query = dbQuery($sql, $params);
    return $query->fetch();
}

function getBrand(array $params = []): array {
    $sql = "SELECT brands.* FROM brands JOIN sneakers WHERE sneakers.brand = brands.id AND sneakers.id " . " = :id";
    $query = dbQuery($sql, $params);
    return $query->fetch();
}

function getSizes(): array {
    $sql = "SELECT DISTINCT size FROM sneakers WHERE published = 1 ORDER BY size";
    $query = dbQuery($sql);
    return $query->fetchAll();
}

function getSeasons(): array {
    $sql = "SELECT * FROM seasons";
    $query = dbQuery($sql);
    return $query->fetchAll();
}

function getSneakersCount(): int {
    $sql = "SELECT COUNT(id) AS total FROM sneakers WHERE published = 1";
    $query = dbQuery($sql);
    $result = $query->fetch();
    return (int) $result['total'];
}

?>