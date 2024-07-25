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
<div class="product-card">
    <?php foreach($sneakerImages as $sneakerImage): ?>
        <img src="/sneakers/resources/data/images/sneakers/<?= $sneakerImage['name'] ?>.jpg"
             alt="<?= $sneakerImage['name'] ?>">
    <?php endforeach; ?>
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
        <div>
            <p><?= $sneaker['description'] ?></p>
        </div>
    </a>
</div>
<!-- Hero area end -->

<!-- footer start -->
<footer class="site-footer pt-100 pb-10">
    <div class="container">
        <div class="row">
            <div class="col-xl-18 col-lg-18">
                <div class="row">
                    <div class="col-6 align-items-center">
                        <div class="footer-widget">
                            <h4 class="widget-title">Контаки </h4>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-telegram"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text row">
                            <p class="col-6">© 2024 Sneakers. All Rights Reserved</p>
                            <p class="col-6">Created by backend developer: <span>Bohdan Mamontov</span></p>
                        </div>
                    </div>
                </div>
            </div>
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
</body>
</html>