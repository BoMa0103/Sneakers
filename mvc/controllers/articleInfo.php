<?php 

    require_once('mvc/model/articles.php');

    $params['articleId'] = (int)$_GET['articleid'] ?? null;

    if(!$params['articleId']){
        exit();
    }

    $article = getArticleById($params);

    require('mvc/view/articleInfo.php');

?>