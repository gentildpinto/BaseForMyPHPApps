<?php

namespace app\models;

use Throwable;
use Closure;

class Transaction extends Model {
    
    public function model($model) {
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

    // public function _get($name) {
    //     if(!property_exists($this, $name)) {
    //         $model = __NAMESPACE__.'\\'.ucfirst($name);
    //         return new $model();
    //     }
    // }
}