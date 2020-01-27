<?php

namespace App\controllers;

class HomeController extends Controller {

    public function index() {
        $this->SetPageTitle("Home");
        $this->RenderView("home", "layouts/main");
    }
}
