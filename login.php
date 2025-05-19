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

<?php require_once './components/head.php' ?>

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
    
    <?php require_once './components/footer.php' ?>
    
</body>

</html>