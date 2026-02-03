<?php

class UserController extends Controller {

    private $userModel;

    public function __construct(){
        $this->userModel = $this->model("User");
    }

    public function RegisterEtudient(){
        $this->handleRegistration();
    }

    public function RegisterTeacher(){
        $this->handleRegistration();
    }

    public function loginWhitExistenceAccount(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            header('Location: /golden-course-mvc/Pages/login');
            exit;
        }

        $email = $_POST['login-email'] ?? '';
        $password = $_POST['login-password'] ?? '';

        $result = $this->userModel->login($email, $password);
        if($result['success'] ?? false){
            $user = $result['user'];
            $_SESSION['user'] = [
                'id' => $user->user_id,
                'username' => $user->username,
                'email' => $user->email,
                'role' => $user->role,
                'etat' => $user->is_active
            ];
            $_SESSION['session_success'] = 'login success';
            header('Location: /golden-course-mvc/Pages/index');
            exit;
        }

        $_SESSION['session_error'] = $result['error'] ?? 'login error';
        header('Location: /golden-course-mvc/Pages/login');
        exit;
    }

    private function handleRegistration(){
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            header('Location: /golden-course-mvc/Pages/register');
            exit;
        }

        $firstName = $_POST['first-name'] ?? '';
        $lastName = $_POST['last-name'] ?? '';
        $email = $_POST['signup-email'] ?? '';
        $password = $_POST['confirm-password'] ?? '';
        $role = $_POST['role'] ?? '';

        $result = $this->userModel->save($firstName, $lastName, $email, $password, $role);

        if($result['success'] ?? false){
            $_SESSION['session_success'] = 'Registration successful. Please log in.';
            header('Location: /golden-course-mvc/Pages/login');
            exit;
        }

        $_SESSION['session_error'] = $result['error'] ?? 'Registration failed.';
        header('Location: /golden-course-mvc/Pages/register');
        exit;
    }
}