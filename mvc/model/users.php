<?php

require_once('mvc/core/db.php');

function getUserByLogin(array $params = []): array {
    $sql = "SELECT * FROM users WHERE login LIKE :login";
    $query = dbQuery($sql, $params);

    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result ?: [];
}

?>