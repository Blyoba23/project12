<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/Database.php';

echo "<h1>My PHP project works!</h1>";

$db = Database::connect();

Database::register("test", "1234");

$user = Database::login("test", "1234");

dump($user);
