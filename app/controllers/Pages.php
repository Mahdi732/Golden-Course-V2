<?php
class Pages extends  Controller{

    private $userModel;
    private $adminModel;

    public function __construct(){
        $this->userModel = $this->model("User");
        $this->adminModel = $this->model("Admin");
    }
    public function index(){
        $this->view('pages/index');
    }

    public function login(){
        $this->view('pages/login');
    }
    public function register(){
        $this->view('pages/register');
    }

    public function client(){
        $this->view('pages/client');
    }

    public function test(){
        $data = $this->userModel->getallusers();
        $test = ['test' => $data];
        $this->view('pages/test', $test);
    }

    public function teacher(){
        $this->view('pages/teacher');
    }

    public function admin(){
        $stat = $this->adminModel->getAllStatistique();
        $data = ['stat' => $stat];
        $this->view('pages/admin', $data);
    }
}