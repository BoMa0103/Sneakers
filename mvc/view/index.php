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
                <span class="header-title">SHEAKERS</span>
            </div>
            <div class="site-logo">
                <img src="/sneakers/resources/static/images/logo.png" alt="Picture" style="max-width: 120px;">
            </div>
            <div class="header-right">
                <span class="header-title">SHOP</span>
            </div>
        </div>
    </div>
</header>

<!-- header end -->

<!-- Hero area start -->
<section class="hero-area bg_img" data-background="/sneakers/resources/static/images/background01.jpg">
    <div class="container">
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
                    <?php foreach($seasons as $season): ?>
                        <option value="<?=$season['id']?>" <?= $selectedSeason == $season['id'] ? 'selected' : '' ?>><?=$season['name']?></option>
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
            <div style="display: flex;">
                <?php foreach($sneakers as $sneaker): ?>
                    <div class="product-card">
                        <a href="?c=details&id=<?= $sneaker['id'] ?>">
                            <div class="product-image">
                                <img src="/sneakers/resources/data/images/sneakers/<?= $sneaker['previewImage'] ?>.jpg"
                                     alt="<?= $sneaker['previewImage'] ?>">
                            </div>
                            <div class="product-details">
                                <h2 class="product-name"><?= $sneaker['name'] ?></h2>
                                <p class="product-size">Size: <?= $sneaker['size'] ?></p>
                                <span class="price"><?= $sneaker['price'] ?>₴</span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<!-- Hero area end -->

<!-- footer start -->
<footer class="site-footer pt-100 pb-10">
    <div class="container">
        <div class="col-12 align-items-center">
            <div class="footer-widget col-12">
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
</script>
</body>
</html>