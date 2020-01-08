<?php

namespace Core\queryBuilders;

class Insert {

    public static function query($table, $attributes) {
        $query = "insert into {$table}(".implode(',', array_keys($attributes))
               .") values(:".implode(', :', array_keys($attributes)).")";
        return $query;
    }
}