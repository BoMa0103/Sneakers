<!DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title></title>
  </head>
  <body>
    <div class="menu">
        <a href="index.php">Головна</a>
        <a href="index.php?c=articles&category=Ukraine">Допомога в Україні</a>
        <a href="index.php?c=articles&category=World">Допомога в Світі</a>
        <a href="index.php?c=articles&category=Chernihiv">Допомога в Чернігові</a>
        <a href="index.php?c=articles&category=Selfhelp">Самопоміч</a>
    </div>  

    <? foreach($articles as $article): ?>
        <div class="article">
            <h2><?=$article['title']?></h2>
            <a href="index.php?c=articleInfo&articleid=<?=$article['article_id']?>">Детальніше</a> 
        </div>        
    <? endforeach; ?>
  </body>
</html>