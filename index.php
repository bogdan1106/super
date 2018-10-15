<?php

//Функция распечатки ошибок
function debug($arr){
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

// Front Controller

// 1. Общие настройки (вкл. ошибки)

ini_set('display_errors', 1);
error_reporting(E_ALL);


// подключение базы данных



// 2. Подключение файлов системы

define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');

// Запуск приложения
$router = new Router();

$router->run();


