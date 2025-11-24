<?php

require __DIR__ . '/../vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Carbon\Carbon;

$log = new Logger("main");
$log->pushHandler(new StreamHandler("app.log"));

dump("varDumper працює!");

$log->info("Сторінка запущена");

echo "Зараз: " . Carbon::now();
