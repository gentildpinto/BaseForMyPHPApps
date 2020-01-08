<?php

namespace Core;

use Throwable;
use Closure;

class Transaction extends BaseModel {
    
    public function Model($model) {
        return new $model;
    }

    public function transactions(Closure $callback) {
        $this->connection->beginTransaction();

        try {
            $callback();
            $this->connection->commit();
        }catch(Throwable $err) {
            $this->connection->rollback();
            dd($err->getMessage());
        }
    }
}