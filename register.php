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

<?php require_once './components/head.php' ?>

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
    
    <?php require_once './components/footer.php' ?>
    
</body>

</html>