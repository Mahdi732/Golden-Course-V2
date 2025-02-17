<?php

class User {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function save($nom, $prenom, $email, $password, $role) {
        try {

            $this->db->query("
            INSERT INTO users (username, email, password_hash, role, is_active)
            VALUES (:username, :email, :password, :role, :is_active)
            ");

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $username = $nom . " " . $prenom;
            $isActive = ($role === 'Enseignant') ? 0 : 1;

            $this->db->bind(':username', $username);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $passwordHash);
            $this->db->bind(':role', $role);
            $this->db->bind(':is_active', $isActive);
            $this->db->execute();

            header('Location: /golden-course-mvc/Pages/login');
            exit;
        } catch (PDOException $e) {
            error_log("Database error: " . $e->getMessage());
            $_SESSION['error_message'] = "An error occurred while saving the user. Please try again.";
            exit;
        }
    }

    public function login($email, $password) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        $this->db->execute();
        $user = $this->db->single();

        if ($user) {
            if (password_verify($password, $user->password_hash)) {
                $_SESSION['user'] = [
                    'id' => $user->user_id,
                    'username' => $user->username,
                    'email' => $user->email,
                    'role' => $user->role,
                    'etat' => $user->is_active
                ];
                header('Location: ../Pages/index');
            }
        }
    }

    public function getallusers() {
        $this->db->query("SELECT * FROM users");
        $this->db->execute();
        return $this->db->resultSet();
    }

}