<?php

namespace App\Support;

use \PDO as PDO;
use \PDOException as PDOException;


final class DB
{
    public static function connect()
    {
        $db_host = env('DB_HOST');
        $db_user = env('DB_USER');
        $db_pass = env('DB_PASS');
        $db_name = env('DB_NAME');

        try {
            $conn = new PDO(
                "mysql:host=" . $db_host .
                ";dbname=" . $db_name,
                $db_user,
                $db_pass,
            );

            $conn->exec('set names utf8');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;

        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        return false;
    }
}
