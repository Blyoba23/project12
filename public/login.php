<?php
require __DIR__ . '/../src/Database.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // XSS-фільтр на вхідні дані
    $username = htmlspecialchars($_POST["username"], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST["password"], ENT_QUOTES, 'UTF-8');

    $user = Database::login($username, $password);

    if ($user) {
        $message = "Ви успішно увійшли, " . htmlspecialchars($user["username"], ENT_QUOTES, 'UTF-8');
    } else {
        $message = "Невірний логін або пароль.";
    }
}

// Екранування повідомлення
$safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
?>

<h1>Логін</h1>

<form method="POST">
    <input type="text" name="username" placeholder="Логін" required><br><br>
    <input type="password" name="password" placeholder="Пароль" required><br><br>
    <button type="submit">Увійти</button>
</form>

<p><?= $safeMessage ?></p>

<a href="/register.php">Реєстрація</a>
