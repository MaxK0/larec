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

<?php require_once './components/head.php' ?>

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

        <?php require_once './components/footer.php' ?>

        <script src="js/add.js"></script>
    </body>

</html>