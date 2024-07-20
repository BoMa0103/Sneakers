<?php 

    require_once('mvc/core/db.php');

    define("TABLE_NAME", 'articles');
    define("CATEGORY_COLUMN", 'category');
    define("ID_COLUMN", 'article_id');

    function getAllArticles() : array {
        $sql = "SELECT * FROM " . TABLE_NAME;
        $query = dbQuery($sql);
        return $query->fetchAll();
    }

    function getArticlesByCategory(array $params = []) : array {
        $sql = "SELECT * FROM " . TABLE_NAME . " WHERE " . CATEGORY_COLUMN . " = :category";
        $query = dbQuery($sql, $params);
        return $query->fetchAll();
    }

    function getArticleById(array $params = []) : array{
        $sql = "SELECT * FROM " . TABLE_NAME . " WHERE " . ID_COLUMN . " = :articleId";
        $query = dbQuery($sql, $params);
        return $query->fetch();
    }

?>