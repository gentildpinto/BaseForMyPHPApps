<?php

namespace app\traits;

use app\models\queryBuilder\Insert;
use app\models\queryBuilder\Update;

trait PersistDB {

    public function insert($attributes) {
        $attributes = (array) $attributes;
        $sql        = Insert::query($this->table, $attributes);
        $stmt       = $this->connection->prepare($sql);
        return $stmt->execute($attributes);
    }

    public function update($where, $attributes) {
        $attributes = (array) $attributes;
        $sql        = (new Update)->where($where)->query($this->table, $attributes);
        $stmt       = $this->connection->prepare($sql);
        return $stmt->execute($attributes);
    }
}