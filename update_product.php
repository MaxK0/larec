<?php
require_once 'config/db.php';

$stmt = $pdo->prepare("
    UPDATE products SET 
        name = ?,
        description = ?,
        price = ?,
        category_id = ?
    WHERE id = ?
");

$stmt->execute([
    $_POST['name'],
    $_POST['description'],
    $_POST['price'],
    $_POST['category_id'],
    $_POST['id']
]);

header('Location: admin.php');