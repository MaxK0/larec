<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Интернет-магазин Ларец</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php require_once './components/header.php' ?>

    </head>
    <!-- Остальной код страницы -->

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/слайдер.jpg" class="d-block w-100" alt="Слайд 1">
            </div>
            <div class="carousel-item">
                <img src="img/optimize-_2_.jpg" class="d-block w-100" alt="Слайд 3">
            </div>
            <div class="carousel-item">
                <img src="img/слайдер2.jpg" class="d-block w-100" alt="Слайд 2">
            </div>
            <div class="carousel-item">
                <img src="img/слайдер3.jpg" class="d-block w-100" alt="Слайд 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Предыдущий</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Следующий</span>
        </a>
    </div>

    <nav class="nav-menu">
        <a href="#">Все акции</a>
        <a href="#">Новинки</a>
        <a href="#">Мясо, птица, колбасы</a>
        <a href="#">Молоко, сыр, яйца</a>
        <a href="#">Фрукты и овощи</a>
        <a href="#">Рыба и морепродукты</a>
        <a href="#">Хлеб и выпечка</a>
        <a href="#">Все товары</a>
    </nav>


    <h4>Товары недели</h4>
    <div class="product-grid">
        <div class="product-card">
            <img src="img/1.png" alt="Сыр творожный ЭКОНИЛК">
            <h3>Сыр творожный ЭКОНИЛК 60%, 400г</h3>
            <div class="price">249,99P <span class="discount">309,99P</span></div>
            <button onclick="   ('Сыр творожный ЭКОНИЛК', 249.99)">Добавить в корзину</button>
        </div>
        <div class="product-card">
            <img src="img/2.png" alt="Напиток газнорезинный ЧЕРНОГОЛОВКА Лингонда">
            <h3>Напиток газнорезинный ЧЕРНОГОЛОВКА Лингонда, 2л</h3>
            <div class="price">129,99P <span class="discount">181,99P</span></div>
            <button onclick="addToCart('Напиток газнорезинный ЧЕРНОГОЛОВКА Лингонда', 129.99)">Добавить в
                корзину</button>
        </div>
        <div class="product-card">
            <img src="img/3.png" alt="Напиток газнорезинный ЧЕРНОГОЛОВКА Кола">
            <h3>Напиток газнорезинный ЧЕРНОГОЛОВКА Кола, 2л</h3>
            <div class="price">124,99P <span class="discount">175,99P</span></div>
            <button onclick="addToCart('Напиток газнорезинный ЧЕРНОГОЛОВКА Кола', 124.99)">Добавить в корзину</button>
        </div>
        <div class="product-card">
            <img src="img/4.png" alt="Мука пшеничная НАКРАФ">
            <h3>Мука пшеничная НАКРАФ высший сорт, 2кг</h3>
            <div class="price">109,99P <span class="discount">329,99P</span></div>
            <button onclick="addToCart('Мука пшеничная НАКРАФ', 109.99)">Добавить в корзину</button>
        </div>
        <div class="product-card">
            <img src="img/5.png" alt="Макароны ШЕБЕКИНСКИЕ Спирали">
            <h3>Макароны ШЕБЕКИНСКИЕ Спирали №836, 450г</h3>
            <div class="price">51,99P <span class="discount">79,99P</span></div>
            <button onclick="addToCart('Макароны ШЕБЕКИНСКИЕ Спирали', 51.99)">Добавить в корзину</button>
        </div>

    </div>


    <footer class="footer">
        <div class="map" style="width: 80%;">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d37430.81583846662!2d54.35025607314836!3d54.101651914380604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0JfQvdCw0LzQtdC90LrQsCDQnNC40LvQuNGG0LXQudGB0LrQsNGPINGD0LvQuNGG0LAsIDHQkA!5e0!3m2!1sru!2sru!4v1740774060960!5m2!1sru!2sru"
                width="1400" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="footer-container">
            <div class="footer-info">
                <h3>Контакты</h3>
                <p>Антикоррупционная горячая линия: 8 800 600-04-77</p>
                <p>Адрес: ул. Советская, д. 1, г.Знаменка, Россия</p>
                <p>Электронная почта:Leonov.Chest@gmail.com <a></a>

            </div>

            <div class="footer-socials">
                <h3>Мы в соцсетях</h3>
                <a href="https://www.facebook.com" target="_blank">Вконтакте</a>
            </div>

            <div class="footer-privacy">
                <p>Остались вопросы? Свяжитесь с нами!</p>
                <a href="confidentiality.php">Политика конфиденциальности</a>
            </div>
        </div>

    </footer>
    <script src="js/add.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>