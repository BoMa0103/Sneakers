<!DOCTYPE html>
<html class="no-js" lang="en">

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

<!-- header start -->
<header id="sticky-header" class="site-header">
    <div class="container custom-header">
        <div class="header-content">
            <div class="header-left">
                <span class="header-title">SNEAKERS</span>
            </div>
            <div class="site-logo">
                <a href="?c=index"><img src="/sneakers/resources/static/images/logo.png" alt="Picture" style="max-width: 120px;"></a>
            </div>
            <div class="header-right">
                <span class="header-title">SHOP</span>
            </div>
            <div class="menu">
                <button class="menu-button">Меню</button>
                <div class="dropdown-content">
                    <a href="?c=catalog">Каталог</a>
                    <a href="#contacts">Контакти</a>
                    <a href="?c=about">Про нас</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->

<section class="hero-area" style="background-color: rgba(100, 128, 128, 0.3);">
    <div class="container">
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Я шукаю..." oninput="fetchSearchResults()">
            <button id="search-button" onclick="updateSearchParameter()">Знайти</button>
            <div id="search-results"></div>
        </div>
        <div class="filter-container">

            <div class="filter-price">
                <select id="sort-filter" onchange="updateURLParameter('sort', this.value)">
                    <option value="actualize" <?= $sort == 'actualize' ? 'selected' : '' ?>>За актуальністю</option>
                    <option value="low-to-high" <?= $sort == 'low-to-high' ? 'selected' : '' ?>>Від дешевих до дорогих</option>
                    <option value="high-to-low" <?= $sort == 'high-to-low' ? 'selected' : '' ?>>Від дорогих до дешевих</option>
                </select>
            </div>

            <div class="filter-price">
                <select id="size-filter" onchange="updateURLParameter('selectedSize', this.value)">
                    <option value="">Всі розміри</option>
                    <?php foreach($sizes as $size): ?>
                        <option value="<?=$size['size']?>" <?= $selectedSize == $size['size'] ? 'selected' : '' ?>><?=$size['size']?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="filter-price">
                <select id="season-filter" onchange="updateURLParameter('selectedSeason', this.value)">
                    <option value="">Всі сезони</option>
                    <?php foreach($seasons as $seasonKey => $seasonName): ?>
                        <option value="<?=$seasonKey?>" <?= $selectedSeason == $seasonKey ? 'selected' : '' ?>><?=$seasonName?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="filter-price">
                <select id="season-filter" onchange="updateURLParameter('selectedSex', this.value)">
                    <option value="">Всі</option>
                    <?php foreach($sexOptions as $sexKey => $sexName): ?>
                        <option value="<?=$sexKey?>" <?= $selectedSex == $sexKey ? 'selected' : '' ?>><?=$sexName?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="filter-brand">
            <div class="brand-options">
                <?php foreach($brands as $brand): ?>
                    <label><b><input type="checkbox"
                                     value="<?=$brand['name']?>"
                                <?php if ($brand['id'] == $selectedBrand) { ?>
                                    onclick="updateURLParameter('brand', '')"
                                <?php } else { ?>
                                    onclick="updateURLParameter('brand', <?=$brand['id']?>)"
                                <?php } ?>
                                <?= $brand['id'] == $selectedBrand ? 'checked' : '' ?>
                                     style="margin: 5px;"
                            ><?=$brand['name']?></b></label>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="sneakers-list">
            <div class="product-container">
                <?php foreach($sneakers as $sneaker): ?>
                    <a href="?c=details&id=<?= $sneaker['id'] ?>">
                        <div class="product-card">
                            <div class="product-image">
                                <img src="/sneakers/resources/data/images/sneakers/<?= $sneaker['previewImage'] ?>"
                                     alt="<?= $sneaker['previewImage'] ?>">
                            </div>
                            <div class="product-details">
                                <h2 class="product-name"><?= $sneaker['name'] ?></h2>
                                <p class="product-size">Розмір: <?= $sneaker['size'] ?></p>
                                <span class="price"><?= $sneaker['price'] ?>₴</span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

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
    </div>
</section>
<!-- Hero area end -->

<!-- footer start -->
<footer class="site-footer pt-100 pb-10">
    <div class="container">
        <div class="col-12 align-items-center">
            <div class="footer-widget col-12" id="contacts">
                <h4 class="widget-title">Контакти </h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-telegram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="copyright-text row">
                <p class="col-12">© 2024 Sneakers. All Rights Reserved</p>
            </div>
        </div>
</footer>
<!-- footer end -->

<!--========= ALL JS FORM ../assets/js Here =========-->
<script src="/sneakers/resources/static/assets/js/jquery-2.2.4.min.js"></script>
<script src="/sneakers/resources/static/assets/js/bootstrap.min.js"></script>
<script src="/sneakers/resources/static/assets/js/counterup.min.js"></script>
<script src="/sneakers/resources/static/assets/js/datepicker.min.js"></script>
<script src="/sneakers/resources/static/assets/js/datepicker.en.js"></script>
<script src="/sneakers/resources/static/assets/js/jquery-ui.min.js"></script>
<script src="/sneakers/resources/static/assets/js/jquery.nice-select.min.js"></script>
<script src="/sneakers/resources/static/assets/js/lightcase.js"></script>
<script src="/sneakers/resources/static/assets/js/owl.carousel.min.js"></script>
<script src="/sneakers/resources/static/assets/js/jquery.meanmenu.min.js"></script>
<script src="/sneakers/resources/static/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="/sneakers/resources/static/assets/js/isotope.pkgd.min.js"></script>
<script src="/sneakers/resources/static/assets/js/wow.min.js"></script>
<script src="/sneakers/resources/static/assets/js/waypoint.js"></script>
<script src="/sneakers/resources/static/assets/js/main.js"></script>
<script>
    function updateURLParameter(param, value) {
        const url = new URL(window.location.href);
        url.searchParams.set(param, value);
        window.location.href = url.toString();
    }

    function updateSearchParameter() {
        var searchInput = document.getElementById('search-input').value;
        var currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('search', searchInput);
        window.location.href = currentUrl.toString();
    }

    function fetchSearchResults() {
        var searchInput = document.getElementById('search-input').value;

        if (searchInput.length > 0) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/sneakers/?c=search&query=' + encodeURIComponent(searchInput), true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var results = JSON.parse(xhr.responseText);
                    displaySearchResults(results);
                }
            };
            xhr.send();
        } else {
            document.getElementById('search-results').style.display = 'none';
        }
    }

    function displaySearchResults(results) {
        var resultsContainer = document.getElementById('search-results');
        resultsContainer.innerHTML = '';

        if (results.length > 0) {
            results.forEach(function(result) {
                var resultItem = document.createElement('a');
                resultItem.href = '?c=details&id=' + result.id;
                resultItem.innerHTML = '<div class="result-item">' + result.name + '</div>';
                resultsContainer.appendChild(resultItem);
            });
            resultsContainer.style.display = 'block'; // Показываем результаты
        } else {
            resultsContainer.style.display = 'none'; // Скрываем результаты, если нет данных
        }
    }
</script>
</body>
</html>