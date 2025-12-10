<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Database.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = Database::login($username, $password);

    if ($user) {
        $message = "Ви успішно увійшли, " . $user["username"];
    } else {
        $message = "Невірний логін або пароль.";
    }
}
?>

<h1>Логін</h1>

<form method="POST">
    <input type="text" name="username" placeholder="Логін" required><br><br>
    <input type="password" name="password" placeholder="Пароль" required><br><br>
    <button type="submit">Увійти</button>
</form>

<p><?= $message ?></p>

<a href="/register.php">Реєстрація</a>
