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

<!-- Hero area start -->
<section class="hero-area bg_img" style="background-color: rgba(100, 128, 128, 0.3);">
    <div class="back-button-div">
        <button class="back-button" onclick="window.history.back()">&#10094;&#10094;&#10094;&#10094;</button>
    </div>
    <div class="product-container">
        <div class="slider-container">
            <div class="slider">
                <div class="slides">
                    <?php foreach ($sneakerImages as $sneakerImage): ?>
                        <div class="slide">
                            <img src="/sneakers/resources/data/images/sneakers/<?= $sneakerImage['name'] ?>"
                                 alt="<?= $sneakerImage['name'] ?>">
                        </div>
                    <?php endforeach; ?>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <div class="dot-container">
                <?php for ($i = 0; $i < count($sneakerImages); $i++): ?>
                    <span class="dot" onclick="currentSlide(<?= $i + 1 ?>)"></span>
                <?php endfor; ?>
            </div>
        </div>

        <div class="details-container">
            <div class="product-info-details">
                <h2 class="product-name"><?= $sneaker['name'] ?></h2>
                <p class="product-size">Розмір: <?= $sneaker['size'] ?></p>
                <span class="price"><?= $sneaker['price'] ?>₴</span>
            </div>
            <div class="product-description">
                <h2 class="product-name">Щоб замовити скористайся наступними каналами зв'язвку:</h2>
                <div class="social-links">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-telegram"></i></a>
                </div>
            </div>
            <div class="payment-section">
                <form action="?c=payments/plata-by-mono/process-payment" method="POST">
                    <input type="hidden" name="amount" value=<?= $sneaker['price'] ?>>
                    <button type="submit" class="btn btn-primary">
                        Оплатити онлайн
                    </button>
                </form>
            </div>
            <div class="product-description">
                <p>Сезон - <?= $seasons[$sneaker['season']] ?></p>
                <p>Бренд - <?= $brand['name'] ?></p>
                <p><?= $sneaker['description'] ?></p>
            </div>
        </div>
    </div>
</section>
<!-- Hero area end -->

<!-- footer start -->
<footer class="site-footer pt-100 pb-10">
    <div class="container">
        <div class="col-12 align-items-center" id="contacts">
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
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("slide");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) { slideIndex = 1 }
        if (n < 1) { slideIndex = slides.length }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "grid";
        dots[slideIndex - 1].className += " active";
    }
</script>
</body>
</html>