<?php

namespace app\models;

use app\classes\Bind;

abstract class Model {

    protected $connection;

    public function __construct() {
        $this->connection = Bind::getConn('connection');
    }

    public function getAll() {
        $sql  = "select * from {$this->table}";
        $stmt = $this->connection->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function find($field, $value) {
        $sql  = "select * from {$this->table} where {$field} = :value";
        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':value', $value);
        $stmt->execute();

        return $stmt->fetch();
    }
}