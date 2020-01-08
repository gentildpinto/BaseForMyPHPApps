<?php

namespace App\classes;

class Layout {

    private $view;

    public function addLayout($view) {
        $this->view = $view;
    }

    public function load() {
        return "../app/views/{$this->view}.php";
    }

    public function masterLayout($view) {
        return "../app/views/{$view}.php";
    }
}