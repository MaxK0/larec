<?php
require_once 'config/db.php';

$product = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$product->execute([$_GET['id']]);
$product = $product->fetch();

$categories = $pdo->query("SELECT * FROM categories")->fetchAll();
?>

<form method="POST" action="update_product.php">
    <input type="hidden" name="id" value="<?= $product['id'] ?>">
    
    <div class="form-group">
        <label>Название</label>
        <input type="text" name="name" class="form-control" 
               value="<?= htmlspecialchars($product['name']) ?>" required>
    </div>
    
    <!-- Остальные поля аналогично -->
    
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>