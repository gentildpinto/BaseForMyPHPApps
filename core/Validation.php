<?php

namespace Core;

class Validation {
    private $validate = [];

    public function validate($param) {
        foreach($param as $key => $value) {
            $this->validate[$key] = filter_var($value, FILTER_SANITIZE_STRING);
        }

        return (object) $this->validate;
    }
}