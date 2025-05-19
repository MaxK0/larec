<?php
session_start();
?>

<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="Ларец" class="logo-img">
                <span class="logo-text">ЛАРЕЦ</span>
            </a>

            <div class="search-box mx-lg-3 flex-grow-1">
                <form class="d-flex">
                    <div class="input-group">
                        <input type="search" class="form-control search-input" placeholder="Поиск продуктов..." aria-label="Search">
                        <button class="btn btn-search" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-home me-1"></i> Главная</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="katal.php"><i class="fas fa-list me-1"></i> Каталог</a>
                    </li>
                    <li class="nav-item position-relative">
                        <a class="nav-link" href="cart.php">
                            <i class="fas fa-shopping-cart me-1"></i> Корзина
                            <!-- <span class="badge bg-danger cart-counter">0</span> -->
                        </a>
                    </li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php"><i class="fas fa-user me-1"></i>Личный кабинет</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><i class="fas fa-right-from-bracket me-1"></i>Выйти</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php"><i class="fas fa-user me-1"></i>Войти</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<!--<header>-->
<!--    <nav class="navbar navbar-expand-lg navbar-light bg-light">-->
<!--        <a class="navbar-brand" href="index.php"><img src="img/logo.png" alt="" width="50"></a>-->
<!--        <!-- Поисковая строка -->-->
<!--        <form class="form-inline my-2 my-lg-0 mx-3">-->
<!--            <input class="form-control mr-sm-2" type="search" placeholder="Поиск" aria-label="Search">-->
<!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти</button>-->
<!--        </form>-->
<!--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">-->
<!--            <span class="navbar-toggler-icon"></span>-->
<!--        </button>-->
<!--        <div class="collapse navbar-collapse" id="navbarNav">-->
<!--            <ul class="navbar-nav ml-auto">-->
<!--                <li class="nav-item"><a class="nav-link" href="index.php">Главная</a></li>-->
<!--                <li class="nav-item"><a class="nav-link" href="katal.php">Каталог</a></li>-->
<!--                <li class="nav-item"><a class="nav-link" href="cart.php">Корзина</a></li>-->
<!--                --><?php //if (isset($_SESSION['user_id'])): 
                        ?>
<!--                    <li class="nav-item"><a class="nav-link" href="logout.php">Выйти</a></li>-->
<!--                --><?php //else: 
                        ?>
<!--                    <li class="nav-item"><a class="nav-link" href="login.php">Войти</a></li>-->
<!--                --><?php //endif; 
                        ?>
<!--            </ul>-->
<!--        </div>-->
<!--    </nav>-->
<!--</header>-->