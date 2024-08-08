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
    <section id="add-sneaker">
        <h2>Додати кросівки</h2>
        <form action="?c=add-sneaker" method="POST" enctype="multipart/form-data">
            <label for="sneaker-name">Назва:</label>
            <input type="text" id="sneaker-name" name="name" required>

            <label for="sneaker-description">Опис:</label>
            <textarea id="sneaker-description" name="description" required></textarea>

            <label for="sneaker-size">Розмір:</label>
            <input type="number" id="sneaker-size" name="size" required>

            <label for="sneaker-brand">Бренд:</label>
            <select id="sneaker-brand" name="brand_id" required>
                <?php foreach($brands as $brand): ?>
                    <option value="<?=$brand['id']?>"><?=$brand['name']?></option>
                <?php endforeach; ?>
            </select>

            <label for="sneaker-season">Сезон:</label>
            <select id="sneaker-season" name="season" required>
                <?php foreach($seasons as $seasonKey => $seasonName): ?>
                    <option value="<?=$seasonKey?>"><?=$seasonName?></option>
                <?php endforeach; ?>
            </select>

            <label for="sneaker-sex">Стать:</label>
            <select id="sneaker-sex" name="sex" required>
                <?php foreach($sexOptions as $sexKey => $sexName): ?>
                    <option value="<?=$sexKey?>"><?=$sexName?></option>
                <?php endforeach; ?>
            </select>

            <label for="sneaker-basePrice">Базова ціна:</label>
            <input type="number" id="sneaker-basePrice" name="basePrice" required>

            <label for="sneaker-price">Ціна:</label>
            <input type="number" id="sneaker-price" name="price" required>

            <label for="sneaker-published">Опубліковано:</label>
            <input type="checkbox" id="sneaker-published" name="published">

            <label for="sneaker-previewImage">Базове зображення:</label>
            <input type="file" id="sneaker-previewImage" name="previewImage" accept="image/*" required>

            <div class="image-preview" id="image-preview"></div>

            <label for="sneaker-images">Зображення:</label>
            <input type="file" id="sneaker-images" name="images" accept="image/*" multiple required>

            <div class="slider">
                <div class="slides" id="image-slider"></div>
            </div>

            <button type="submit">Додати кросівки</button>
        </form>
    </section>
</main>

<footer>
    <p>Адмінка &copy; 2024 Sneakers</p>
</footer>

<script>
    document.getElementById('sneaker-previewImage').addEventListener('change', function(event) {
        const previewContainer = document.getElementById('image-preview');
        previewContainer.innerHTML = '';

        const files = event.target.files;
        for (const file of files) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                previewContainer.appendChild(img);
            }
            reader.readAsDataURL(file);
        }
    });
</script>
</body>
</html>
