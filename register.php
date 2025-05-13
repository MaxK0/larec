<?php
// Подключение к базе данных
$conn = new mysqli('mysql-8.2', 'root', '', 'larec');

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получение данных из формы
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Проверка длины пароля
    if (strlen($password) < 6) {
        echo "<p style='color: red; text-align: center;'>Пароль должен быть не менее 6 символов!</p>";
    } else {
        // Хеширование пароля
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Проверка на уникальность логина
        $check_login = $conn->query("SELECT * FROM users WHERE username='$username'");
        if ($check_login->num_rows > 0) {
            echo "<p style='color: red; text-align: center;'>Логин уже занят!</p>";
        } else {
            // Запись данных в таблицу
            $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
            if ($conn->query($sql) === TRUE) {
                echo "<p style='color: green; text-align: center;'>Регистрация прошла успешно!</p>";
                header("Location: index.php"); // Перенаправление на страницу авторизации
                exit(); // Завершаем скрипт после перенаправления
            } else {
                echo "<p style='color: red; text-align: center;'>Ошибка: " . $conn->error . "</p>";
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Регистрация</title>
</head>

<body>
    <?php require_once './components/header.php' ?>

    <div class="page-wrapper">
        <div class="register-form">
            <h1>Зарегистрироваться</h1>
            <form class="input_form" id="registerForm" action="register.php" method="POST">
                <input class="input-main" type="text" id="newUsername" name="username" placeholder="Логин" required>
                <input class="input-main" type="password" id="newPassword" name="password" placeholder="Пароль" required>
                <button type="submit">Зарегистрировать</button>
            </form>
            <p>Есть аккаунт? <a href="login.php">Войти</a></p>
        </div>
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
                <p>Электронная почта:Leonov.Chest@gmail.com <a></a></p>
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