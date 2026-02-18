<?php 

require "funciones.php";
require "config/database.php";
require __DIR__ . "/../vendor/autoload.php";

// Cargar variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Conectar a la base de datos
$db = conectarDB();

use Model\ActiveRecord;

ActiveRecord::setDB($db);

