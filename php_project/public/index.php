<?php
require_once "Router.php";

$router = new Router();

// Динамічний title
function render_page($title, $page) {
    ob_start();
    include __DIR__ . "/views/header.php";
    include __DIR__ . "/views/pages/$page.php";
    include __DIR__ . "/views/footer.php";
    return ob_get_clean();
}

// Головна
$router->add("/", function () {
    return render_page("Головна", "home");
});

// Логін
$router->add("/login", function () {
    return render_page("Логін / Реєстрація", "login");
});

// 404 автоматично в Router->run()

$router->run();
