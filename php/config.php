<?php
//loading dependencies
require __DIR__ . '/../vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$envs = (new josegonzalez\Dotenv\Loader('../../.env'))
    ->parse()
    ->skipExisting() //Skip any environment variables that are already present
    ->toEnv();


//db connection config
$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_ENV['MYSQL_HOST'],
    'database' => $_ENV['MYSQL_DB'],
    'username' => $_ENV['MYSQL_USER'],
    'password' => $_ENV['MYSQL_PASS'],
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);
$capsule->setAsGlobal();