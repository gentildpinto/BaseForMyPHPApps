<?php

namespace app\models\queryBuilder;

class Update {

    private $where;

    public function where($where) {
        $this->where = $where;
        return $this;
    }

    public function query($table, $attributes) {
        $sql = "update {$table} set ";
        unset($attributes[array_keys($this->where)[0]]);
        foreach($attributes as $key => $value) {
            $sql .= "{$key} = :{$key}, ";
        }
        $where = array_keys($this->where);
        $sql   = rtrim($sql, ", ");
        $sql  .= " where {$where[0]} = :{$where[0]}";
        return $sql;
    }
}