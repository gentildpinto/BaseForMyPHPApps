<?php

namespace Core;

use stdClass;

abstract class BaseController {
    protected $viewContent;
    private $viewPath;
    private $mainLayoutPath;
    private $pageTitle = null;

    public function __construct() {
        $this->viewContent = new stdClass;
    }

    protected function RenderView($viewPath, $mainLayoutPath = null) {
        $this->viewPath       = $viewPath;
        $this->mainLayoutPath = $mainLayoutPath;
        if($mainLayoutPath) {
            $this->MainLayout();
        } else {
            $this->Content();
        }
    }

    protected function Content() {
        if(file_exists(__DIR__."/../app/views/{$this->viewPath}.php")) {
            require __DIR__."/../app/views/{$this->viewPath}.php";
        } else {
            echo "<h1>Error: View Not Found</h1>";
        }
    }

    protected function MainLayout() {
        if(file_exists(__DIR__."/../app/views/{$this->mainLayoutPath}.php")) {
            require __DIR__."/../app/views/{$this->mainLayoutPath}.php";
        } else {
            echo "<h1>Error: Layout Not Found</h1>";
        }
    }

    protected function SetPageTitle($title = "Page") {
        $this->pageTitle = $title;
    }

    protected function GetPageTitle($separator = null) {
        if($separator) {
            echo "{$this->pageTitle} {$separator} ";
        } else {
            echo $this->pageTitle;
        }
    }
}
