<?php

namespace App\controllers;

use App\model\Post;
use Core\Redirect;

class PostController extends Controller {

    public function index() {
        $post = new Post;

        $this->viewContent->posts = $post->All();
        $this->SetPageTitle("Blog");
        $this->RenderView("blog", "layouts/main");
    }

    public function show($id) {
        $post = new Post;

        $this->viewContent->posts = $post->FindById($id);
        $this->SetPageTitle("{$this->viewContent->posts->title}");
        $this->RenderView("post", "layouts/main");
    }

    public function create() {
        $this->SetPageTitle("New Post");
        $this->RenderView("create", "layouts/main");
    }

    public function store($request) {
        $post     = new Post;
        $data     = ['title' => $request->title, 'content' => $request->content];
        $response = $post->Insert($data);

        if($response) {
            Redirect::to("/posts");
        } else {
            echo "Error";
        }
    }

    public function edit($id) {
        $post                     = new Post;
        $this->viewContent->posts = $post->FindById($id);

        $this->SetPageTitle("Edit Post ".$this->viewContent->posts->title);
        $this->RenderView("edit", "layouts/main");
    }

    public function update($request) {
        $post     = new Post;
        $data     = ['title' => $request->title, 'content' => $request->content];
        $response = $post->Update('id', $data);

        if($response) {
            Redirect::to("/blog");
        } else {
            echo "Error";
        }
    }

    public function delete($id) {
        $post     = new Post;
        $response = $post->Delete("id", $id);

        if($response) {
            Redirect::to("/blog");
        } else {
            echo "Error";
        }
    }
}