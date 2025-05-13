<?php
// Подключение к БД (замените параметры на свои)
$host = 'mysql-8.2';
$db   = 'larec';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

// Получаем товары, сгруппированные по категориям
$stmt = $pdo->query("
    SELECT 
        c.name AS category,
        p.id,
        p.name,
        p.description,
        p.price,
        p.image
    FROM products p
    JOIN categories c ON p.category_id = c.id
    ORDER BY c.name, p.name
");

$productsByCategory = [];
while ($row = $stmt->fetch()) {
    $productsByCategory[$row['category']][] = $row;
}
?>

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

    <body class="main-content">
        <div class="top-section">
            <h1>Каталог продуктов</h1>
            <p>Выберите категорию и наслаждайтесь свежими продуктами!</p>
        </div>

        <div class="container">
            <?php foreach ($productsByCategory as $category => $products): ?>
                <div class="catalog-section">
                    <h2><?= htmlspecialchars($category) ?></h2>
                    <div class="row">
                        <?php foreach ($products as $product): ?>
                            <div class="col-md-4 mb-4">
                                <div class="product-card">
                                    <img src="<?= htmlspecialchars($product['image']) ?>"
                                        alt="<?= htmlspecialchars($product['name']) ?>"
                                        class="img-fluid">
                                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                                    <p><?= htmlspecialchars($product['description']) ?></p>
                                    <p class="price"><?= number_format($product['price'], 0) ?> руб/кг</p>
                                    <button class="add-to-cart"
                                        onclick="addToCart('<?= htmlspecialchars($product['name']) ?>', <?= $product['price'] ?>)">
                                        Добавить в корзину
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <footer class="footer">
            <div class="map" style="width: 80%;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d37430.81583846662!2d54.35025607314836!3d54.101651914380604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0JfQvdCw0LzQtdC90LrQsCDQnNC40LvQuNGG0LXQudGB0LrQsNGPINGD0LvQuNGG0LAsIDHQkA!5e0!3m2!1sru!2sru!4v1740774060960!5m2!1sru!2sru" width="1400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
    </body>

</html>