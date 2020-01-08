<?php

namespace Core\traits;

use Core\queryBuilders\Insert;
use Core\queryBuilders\Update;

trait PersistDB {

    public function insert($attributes) {
        $attributes = (array) $attributes;
        $query      = Insert::query($this->table, $attributes);
        $stmt       = $this->connection->prepare($query);

        $result = $stmt->execute($attributes);

        $stmt->closeCursor();
        
        return $result;
    }

    public function update($where, $attributes) {
        $attributes = (array) $attributes;
        $query      = (new Update)->where($where)->query($this->table, $attributes);
        $stmt       = $this->connection->prepare($query);

        $result = $stmt->execute($attributes);

        $stmt->closeCursor();

        return $result;
    }
}