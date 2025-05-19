<?php
session_start();
// Проверка авторизации админа
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: login.php');
    exit;
}

// Подключение к БД
require_once 'config/db.php'; // Файл с настройками БД

// Обработка действий
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_product'])) {
        // Добавление товара
        $stmt = $pdo->prepare("INSERT INTO products (name, description, price, category_id, image) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([
            $_POST['name'],
            $_POST['description'],
            $_POST['price'],
            $_POST['category_id'],
            uploadImage($_FILES['image'])
        ]);
    } elseif (isset($_POST['delete_product'])) {
        // Удаление товара
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$_POST['product_id']]);
    }
}

// Загрузка изображения
function uploadImage($file)
{
    $targetDir = "uploads/";

    // Создаем папку, если она не существует
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Генерируем уникальное имя файла
    $fileName = uniqid() . '_' . basename($file["name"]);
    $targetFile = $targetDir . $fileName;

    // Проверяем тип файла (опционально)
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

    if (!in_array($imageFileType, $allowedTypes)) {
        return null;
    }

    // Пытаемся загрузить файл
    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        return $targetFile;
    } else {
        // Логируем ошибку
        error_log("Failed to upload file: " . $file["name"]);
        return null;
    }
}

// Получение категорий
$categories = $pdo->query("SELECT * FROM categories")->fetchAll();

// Получение всех товаров
$products = $pdo->query("
    SELECT p.*, c.name as category_name 
    FROM products p 
    LEFT JOIN categories c ON p.category_id = c.id
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="ru">

<?php require_once './components/head.php' ?>

<body>
    <?php require_once './components/header.php' ?>

    <main class="container mt-4">
        <h1 class="mb-4">Админ панель</h1>

        <!-- Форма добавления товара -->
        <div class="card mb-4">
            <div class="card-body admin-card">
                <form class="admin-form" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="name" class="form-control mb-2" placeholder="Название" required>
                        </div>
                        <div class="col-md-4">
                            <input type="number" name="price" class="form-control mb-2" placeholder="Цена" step="0.01" required>
                        </div>
                        <div class="col-md-4">
                            <select name="category_id" class="form-control mb-2" required>
                                <option value="">Выберите категорию</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>"><?= htmlspecialchars($category['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <textarea name="description" class="form-control mb-2" placeholder="Описание"></textarea>

                    <div class="custom-file mb-3">
                        <input type="file" name="image" class="custom-file-input" id="imageUpload" required>
                        <label class="custom-file-label" for="imageUpload">Загрузить изображение</label>
                    </div>

                    <button type="submit" name="add_product" class="btn btn-primary">Добавить товар</button>
                </form>
            </div>
        </div>

        <!-- Список товаров -->
        <div class="card">
            <div class="card-body">
                <h2 class="mb-3">Список товаров</h2>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Изображение</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Категория</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td>
                                        <img src="<?= $product['image'] ?>"
                                            alt="<?= htmlspecialchars($product['name']) ?>"
                                            style="width: 80px; height: auto;">
                                    </td>
                                    <td><?= htmlspecialchars($product['name']) ?></td>
                                    <td><?= number_format($product['price'], 2) ?> руб</td>
                                    <td><?= htmlspecialchars($product['category_name']) ?></td>
                                    <td>
                                        <form method="POST" class="d-inline">
                                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                            <button type="submit" name="delete_product"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Удалить товар?')">
                                                Удалить
                                            </button>
                                        </form>
                                        <!-- <button class="btn btn-primary btn-sm edit-product"
                                            data-id="<?= $product['id'] ?>">
                                            Редактировать
                                        </button> -->
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- Модальное окно редактирования -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Редактирование товара</h5>
                </div>
                <div class="modal-body">
                    <!-- Форма редактирования будет загружена через AJAX -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // AJAX редактирование
        $(document).on('click', '.edit-product', function() {
            let productId = $(this).data('id');
            $.get('edit_product.php?id=' + productId, function(data) {
                $('#editModal .modal-body').html(data);
                $('#editModal').modal('show');
            });
        });
    </script>
</body>

</html>