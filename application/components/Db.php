<?php

class Db
{

    public static function getConnection()
    {
        $paramsPath = ROOT . '/application/config/db_params.php';
        $params = include($paramsPath);
            $db = new PDO("mysql:host={$params['host']};dbname=mvc_for_kids", $params['user'], $params['password']);
            // set the PDO error mode to exception



        return $db;
    }
}