<?php

    require_once('mvc/core/db.php');

    function addSneaker(array $data): int {
        $sql = "INSERT INTO sneakers (name, description, size, brand, season, sex, basePrice, price, published, previewImage)" .
           "VALUES (:name, :description, :size, :brand, :season, :sex, :basePrice, :price, :published, :previewImage)";

        dbQuery($sql, $data);

        $lastIdQuery = "SELECT LAST_INSERT_ID() AS last_id";
        $result = dbQuery($lastIdQuery);
        return $result->fetch()['last_id'];
    }

    function updateSneaker(array $data) {
        $sql = "UPDATE sneakers SET name = :name, description = :description, size = :size, brand = :brand, season = :season, sex = :sex, basePrice = :basePrice, price = :price, published = :published";

        if (!empty($data['previewImage'])) {
            $sql .= ", previewImage = :previewImage";
        }

        $sql .= " WHERE id = :id";

        dbQuery($sql, $data);
    }

    function deleteSneakerById(array $data) {
        $sql = "DELETE FROM sneakers WHERE id = :id";
        dbQuery($sql, $data);
    }

    function getAllSneakers(array $filters = []) : array {
        $sql = "SELECT * FROM sneakers";
        if (isset($filters['limit'])) {
            $sql .= " LIMIT ". $filters['limit'];
        }
        if (isset($filters['offset'])) {
            $sql .= " OFFSET ". $filters['offset'];
        }
        $query = dbQuery($sql);
        return $query->fetchAll();
    }

    function getSneakers(array $filters = []) : array {
        $sql = "SELECT * FROM sneakers WHERE published = 1";
        if (isset($filters['search'])) {
            $sql .= " AND name LIKE '%" .$filters['search']. "%'";
            $query = dbQuery($sql);
            return $query->fetchAll();
        }
        if (isset($filters['brand'])) {
            $sql .= " AND brand = " .$filters['brand'];
        }
        if (isset($filters['season'])) {
            $sql .=  " AND season LIKE '" .$filters['season']."'";
        }
        if (isset($filters['size'])) {
            $sql .=  " AND size = " .$filters['size'];
        }
        if (isset($filters['sex'])) {
            $sql .=  " AND sex = '" .$filters['sex']."'";
        }
        if (isset($filters['sort'])) {
            switch ($filters['sort']) {
                case 'low-to-high': $sql .= " ORDER BY price"; break;
                case 'high-to-low': $sql .= " ORDER BY price DESC"; break;
                default: $sql .= " ORDER BY id DESC"; break;
            }
        } else {
            $sql .= " ORDER BY id DESC";
        }
        if (isset($filters['limit'])) {
            $sql .= " LIMIT ". $filters['limit'];
        }
        if (isset($filters['offset'])) {
            $sql .= " OFFSET ". $filters['offset'];
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
        $sql = "SELECT * FROM images WHERE sneakers_id " . " = :id ORDER BY priority DESC";
        $query = dbQuery($sql, $params);
        return $query->fetchAll();
    }

    function addSneakerImage(array $data) {
        $sql = "INSERT INTO images (sneakers_id, name, priority)" .
           "VALUES (:sneakers_id, :name, :priority)";

        dbQuery($sql, $data);
    }

    function deleteSneakerImages(array $data) {
        $sql = "DELETE FROM images WHERE sneakers_id = :sneakers_id";
        dbQuery($sql, $data);
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

    function getSneakersCount(): int {
        $sql = "SELECT COUNT(id) AS total FROM sneakers WHERE published = 1";
        $query = dbQuery($sql);
        $result = $query->fetch();
        return (int) $result['total'];
    }

?>