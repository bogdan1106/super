<?php


function __autoload($class_name)
{

    // Массив папок, в которых могут находиться необходимые классы

    $arrayPaths = [
        '/models/',
        '/components/',
        '/controllers/',
    ];

    // Проходим по массиву папок

    foreach ($arrayPaths as $path){
        // Формируем имя и путь к файлу с классом
        $path = ROOT .$path . $class_name . '.php';

        // Если такой файл существует, подключаем его
        if(is_file($path)) include_once $path;

    }

}