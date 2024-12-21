<!DOCTYPE html>
<html lang="uk">
<head>
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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .product-image img {
            width: 50px;
            height: auto;
        }
        .edit-button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
        }
        .edit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<header>
    <h1 style="color: #fff; padding-bottom: 10px;">Адмінка</h1>
    <nav>
        <ul>
            <li><a href="?c=cms/sneakers/add-sneaker">Додати кросівки</a></li>
            <li><a href="?c=cms/brands/add-brand">Додати бренд</a></li>
            <li><a href="?c=cms/sneakers/sneakers">Кросівки</a></li>
            <li><a href="?c=cms/brands/brands" style="color: #4EB5E6;">Бренди</a></li>
        </ul>
    </nav>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th>Назва</th>
            <th>Пріоритет</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($brands as $brand): ?>
            <tr>
                <td><?= $brand['name'] ?></td>
                <td><?= $brand['priority'] ?></td>
                <td>
                    <a href="?c=cms/brands/edit-brand&id=<?= $brand['id'] ?>" class="edit-button">Редагувати</a>
                    <a href="?c=cms/brands/delete-brand&id=<?= $brand['id'] ?>" class="edit-button" style="background-color: indianred">Видалити</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a onclick="updateURLParameter('page', <?= $page - 1 ?>)">&laquo;</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <?php if($totalPages != 1): ?>
                <a onclick="updateURLParameter('page', <?=$i?>)" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>

        <?php if ($page < $totalPages): ?>
            <a onclick="updateURLParameter('page', <?= $page + 1 ?>)">&raquo;</a>
        <?php endif; ?>
    </div>
</main>
<script>
    function updateURLParameter(param, value) {
        const url = new URL(window.location.href);
        url.searchParams.set(param, value);
        window.location.href = url.toString();
    }
</script>
</body>
</html>