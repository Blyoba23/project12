<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Database.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    if (Database::register($username, $password)) {
        $message = "Реєстрація успішна!";
    } else {
        $message = "Такий користувач вже існує.";
    }
}
?>

<h1>Реєстрація</h1>

<form method="POST">
    <input type="text" name="username" placeholder="Логін" required><br><br>
    <input type="password" name="password" placeholder="Пароль" required><br><br>
    <button type="submit">Зареєструватися</button>
</form>

<p><?= $message ?></p>

<a href="/login.php">Увійти</a>
