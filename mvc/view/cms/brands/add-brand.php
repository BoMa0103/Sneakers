<!DOCTYPE html>
<html lang="uk">
<head>

    <!--========= Required meta tags =========-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>Sneakers</title>

    <!--====== Favicon ======-->
    <link rel="shortcut icon" href="/sneakers/resources/static/images/logo.png" type="images/x-icon"/>

    <!--====== CSS Here ======-->
    <link rel="stylesheet" href="/sneakers/resources/static/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/sneakers/resources/static/assets/css/animate.min.css">
    <link rel="stylesheet" href="/sneakers/resources/static/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/sneakers/resources/static/assets/css/lightcase.css">
    <link rel="stylesheet" href="/sneakers/resources/static/assets/css/meanmenu.css">
    <link rel="stylesheet" href="/sneakers/resources/static/assets/css/nice-select.css">
    <link rel="stylesheet" href="/sneakers/resources/static/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/sneakers/resources/static/assets/css/datepicker.min.css">
    <link rel="stylesheet" href="/sneakers/resources/static/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/sneakers/resources/static/assets/css/default.css">
    <link rel="stylesheet" href="/sneakers/resources/static/assets/css/style.css">
    <link rel="stylesheet" href="/sneakers/resources/static/assets/css/responsive.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <h1 style="color: #fff;">Адмінка</h1>
    <nav>
        <ul>
            <li><a href="?c=cms/sneakers/add-sneaker">Додати кросівки</a></li>
            <li><a href="?c=cms/brands/add-brand">Додати бренд</a></li>
            <li><a href="?c=cms/sneakers/sneakers">Кросівки</a></li>
            <li><a href="?c=cms/brands/brands">Бренди</a></li>
        </ul>
    </nav>
</header>

<main>
    <section id="add-brand">
        <h2>Додати бренд</h2>
        <form action="?c=add-brand" method="POST" enctype="multipart/form-data">
            <label for="brand-name">Назва бренду:</label>
            <input type="text" id="brand-name" name="name" required>

            <label for="sneaker-priority">Пріоритет:</label>
            <input type="number" id="sneaker-priority" name="priority" value="1" required>

            <button type="submit">Додати бренд</button>

        </form>
    </section>
</main>

<footer>
    <p>Адмінка &copy; 2024 Sneakers</p>
</footer>
</body>
</html>
