<?php

namespace Core;

use PDO;
use Throwable;

class Connection {

    public static function connect() {
        $config = require __DIR__."/../app/database.php";

        if($config['driver'] == 'sqlite') {
            $sqlite    = __DIR__."/../storage/database/".$config['sqlite']['host'];
            $sqlite    = "sqlite:" . $sqlite;

            try {
                $pdo = new PDO($sqlite);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                return $pdo;
            } catch(Throwable $err) {
                echo $err->getMessage();
            }
        } elseif ($config['driver'] == 'mysql') {
            $host      = $config['mysql']['host'];
            $db        = $config['mysql']['dbname'];
            $user      = $config['mysql']['user'];
            $pass      = $config['mysql']['password'];
            $charset   = $config['mysql']['charset'];
            $collation = $config['mysql']['collation'];

            try {
                $pdo = new PDO("mysql:host={$host};dbname={$db};charset={$charset}", $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES '$charset' COLLATE '$collation'");
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                return $pdo;
            } catch(Throwable $err) {
                #echo $err->getMessage();
                #Container::serverError();
                return false;
            }
        }
    }
}