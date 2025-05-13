<?php
session_start(); // Начинаем сессию

// Параметры подключения к базе данных
$servername = "mysql-8.2";
$username = "root"; // Замените на Ваше имя пользователя
$password = ""; // Замените на Ваш пароль, если он есть
$dbname = "larec"; // Имя Вашей базы данных

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == 'admin' && $password == 'admin') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['user_id'] = true;
        header("Location: admin.php"); // Страница пользователя
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.php"); // Страница пользователя
            exit(); // Завершаем скрипт после перенаправления
        } else {
            echo "Неверный логин или пароль";
        }
    } else {
        echo "Неверный логин или пароль";
    }
}
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Вход</title>
</head>

<body>
    <?php require_once './components/header.php' ?>

    <lol class="page-wrapper">
        <div class="login-form">
            <h1>Вход</h1>
            <form class="input_form" id="loginForm" action="login.php" method="POST">
                <input class="input-main" id="username" name="username" placeholder="Логин" required>
                <input type="password" class="input-main" id="password" name="password" placeholder="Пароль" required>
                <button class="input_button" type="submit">Войти</button>
            </form>

            <p>Нет аккаунта? <a href="register.php">Зарегистрироваться</a></p>
        </div>
    </lol>
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
</body>

</html>