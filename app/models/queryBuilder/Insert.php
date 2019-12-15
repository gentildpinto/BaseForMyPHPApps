<?php

namespace app\models\queryBuilder;

class Insert {

    public static function query($table, $attributes) {
        $sql = "insert into {$table}(".implode(',', array_keys($attributes))
               .") values(:".implode(', :', array_keys($attributes)).")";
        return $sql;
    }
}