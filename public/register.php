<?php
require __DIR__ . '/../src/Database.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // XSS-фільтр
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    if (Database::register($username, $password)) {
        $message = "Реєстрація успішна!";
    } else {
        $message = "Такий користувач вже існує.";
    }
}

// Екранування повідомлення
$safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
?>

<h1>Реєстрація</h1>

<form method="POST">
    <input type="text" name="username" placeholder="Логін" required><br><br>
    <input type="password" name="password" placeholder="Пароль" required><br><br>
    <button type="submit">Зареєструватися</button>
</form>

<p><?= $safeMessage ?></p>

<a href="/login.php">Увійти</a>
