<!DOCTYPE html>
<html lang="ru">

<?php require_once './components/head.php' ?>


<body>
    <?php require_once './components/header.php' ?>

    <!-- Главный слайдер -->
    <section class="main-slider">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#mainCarousel" data-bs-slide-to="3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/слайдер.jpg" class="d-block w-100" alt="Акции">
                    <div class="carousel-caption d-none d-md-block animate__animated animate__fadeIn">
                        <h5>Сезонные скидки до 50%</h5>
                        <p>Только этой неделе на все фрукты и овощи</p>
                        <a href="katal.html" class="btn btn-primary btn-lg">Смотреть акции</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/optimize-_2_.jpg" class="d-block w-100" alt="Новинки">
                    <div class="carousel-caption d-none d-md-block animate__animated animate__fadeIn">
                        <h5>Новые поступления</h5>
                        <p>Свежие продукты от местных фермеров</p>
                        <a href="katal.html" class="btn btn-primary btn-lg">В каталог</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/слайдер2.jpg" class="d-block w-100" alt="Доставка">
                    <div class="carousel-caption d-none d-md-block animate__animated animate__fadeIn">
                        <h5>Бесплатная доставка</h5>
                        <p>При заказе от 2000 рублей</p>
                        <a href="katal.html" class="btn btn-primary btn-lg">Заказать</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="img/слайдер3.jpg" class="d-block w-100" alt="Качество">
                    <div class="carousel-caption d-none d-md-block animate__animated animate__fadeIn">
                        <h5>Гарантия качества</h5>
                        <p>Только свежие и натуральные продукты</p>
                        <a href="katal.html" class="btn btn-primary btn-lg">Подробнее</a>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <!-- Категории товаров -->
    <section class="categories py-5 bg-light">
        <div class="container">
            <h2 class="section-title text-center mb-5">Категории товаров</h2>
            <div class="row g-4">
                <div class="col-6 col-md-3">
                    <a href="#" class="category-card animate__animated animate__fadeInUp">
                        <div class="category-icon">
                            <i class="fas fa-apple-alt"></i>
                        </div>
                        <h3>Фрукты и овощи</h3>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="category-card animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="category-icon">
                            <i class="fas fa-drumstick-bite"></i>
                        </div>
                        <h3>Мясо и птица</h3>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="category-card animate__animated animate__fadeInUp animate__delay-2s">
                        <div class="category-icon">
                            <i class="fas fa-cheese"></i>
                        </div>
                        <h3>Молочные продукты</h3>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="category-card animate__animated animate__fadeInUp animate__delay-3s">
                        <div class="category-icon">
                            <i class="fas fa-fish"></i>
                        </div>
                        <h3>Рыба и морепродукты</h3>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="category-card animate__animated animate__fadeInUp">
                        <div class="category-icon">
                            <i class="fas fa-bread-slice"></i>
                        </div>
                        <h3>Хлеб и выпечка</h3>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="category-card animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="category-icon">
                            <i class="fas fa-wine-bottle"></i>
                        </div>
                        <h3>Напитки</h3>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="category-card animate__animated animate__fadeInUp animate__delay-2s">
                        <div class="category-icon">
                            <i class="fas fa-ice-cream"></i>
                        </div>
                        <h3>Замороженные продукты</h3>
                    </a>
                </div>
                <div class="col-6 col-md-3">
                    <a href="#" class="category-card animate__animated animate__fadeInUp animate__delay-3s">
                        <div class="category-icon">
                            <i class="fas fa-spa"></i>
                        </div>
                        <h3>Бакалея</h3>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
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

    </div> -->

    <?php require_once './components/footer.php' ?>
    
    <script src="js/add.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>