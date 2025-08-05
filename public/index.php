<?php
require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../config/config.php";
session_start();

use App\Core\App;

$app = new App();
$app->run();
