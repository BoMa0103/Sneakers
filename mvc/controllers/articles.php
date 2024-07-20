<?php 

    require_once('mvc/model/articles.php');

    $params['category'] = $_GET['category'] ?? null;

    if(!$params['category']){
        exit();
    }

    $articles = getArticlesByCategory($params);

    require('mvc/view/articles.php');

?>