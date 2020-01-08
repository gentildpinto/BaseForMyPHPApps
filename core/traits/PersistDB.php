<?php

namespace Core\traits;

use Core\queryBuilders\Insert;
use Core\queryBuilders\Update;
use Throwable;

trait PersistDB {

    public function insert($attributes) {
        $this->connection->beginTransaction();

        try {
            $attributes = (array) $attributes;
            $query      = Insert::query($this->table, $attributes);
            $stmt       = $this->connection->prepare($query);

            $result = $stmt->execute($attributes);

            $stmt->closeCursor();
            $this->connection->commit();

            return $result;
        }catch(Throwable $err) {
            $this->connection->rollback();
            dd($err->getMessage());
        }
    }

    public function update($where, $attributes) {
        $this->connection->beginTransaction();

        try {
            $attributes = (array) $attributes;
            $query      = (new Update)->where($where)->query($this->table, $attributes);
            $stmt       = $this->connection->prepare($query);

            $result = $stmt->execute($attributes);

            $stmt->closeCursor();
            $this->connection->commit();

            return $result;
        } catch(Throwable $err) {
            $this->connection->rollback();
            dd($err->getMessage());
        }
    }
}