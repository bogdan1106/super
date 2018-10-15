<?php

class Db
{
    public static function getConnection()
    {
        $params = include(ROOT.'/config/db_params.php');

        $dsn = "mysql:host={$params['host']}; dbname={$params['db']};charset={$params['charset']}";
        $db = new PDO($dsn, $params['user'], $params['pass']);

        return $db;
    }







}