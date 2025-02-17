<?php

class UserController extends Controller {

    private $userModel;

    public function __construct(){
        $this->userModel = $this->model("User");
    }

    public function RegisterEtudient(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $firstName = $_POST['first-name'];
            $lastName = $_POST['last-name'];
            $email = $_POST['signup-email'];
            $password = $_POST['confirm-password'];
            $role = $_POST['role'];
            if($this->userModel->save($firstName, $lastName, $email, $password, $role)){
                $_SESSION['session_success'] = 'login success';
                header('Location: /golden-course-mvc/Pages/index');
            }else{
                $_SESSION['session_error'] = 'login error';
            }

        }

    }

    public function RegisterTeacher(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $firstName = $_POST['first-name'];
            $lastName = $_POST['last-name'];
            $email = $_POST['signup-email'];
            $password = $_POST['confirm-password'];
            $role = $_POST['role'];
            if($this->userModel->save($firstName, $lastName, $email, $password, $role)){
                $_SESSION['session_success'] = 'login success';
                header('Location: /golden-course-mvc/Pages/index');
            }else{
                $_SESSION['session_error'] = 'login error';
            }

        }

    }

    public function loginWhitExistenceAccount(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['login-email'];
            $password = $_POST['login-password'];


        if($this->userModel->login($email, $password)){
            $_SESSION['session_success'] = 'login success';
            header('Location: /golden-course-mvc/Pages/index');
        }else{
            $_SESSION['session_error'] = 'login error';
        }

        }

    }
}