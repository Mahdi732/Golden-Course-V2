<?php
class Pages extends  Controller{

    public function __construct(){
        $this->postModel = $this->model("Post");
    }
    public function index(){
        $data = [
            'title' => 'Courses',
            'posts' => $this->postModel->getPosts()
        ];
        $this->view('pages/coures');
    }

    public function about(){
        $data = [
            'title' => 'About'

        ];
        $this->view('pages/index');
    }
}