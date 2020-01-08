<?php

#database configurations

return [
    /**
     * Driver options (mysql || sqlite)
     */

    "driver" => "mysql",
    
    "sqlite" => [
        "host"      => "database.db",
        "charset"   => "utf8",
        "collation" => "utf8_unicode_ci"
    ],
    "mysql" => [
        "host"     => "localhost",
        "dbname"   => "base",
        "charset"  => "utf8",
        "user"     => "root",
        "password" => "luffy",
        "collation" => "utf8_unicode_ci"
    ]
];