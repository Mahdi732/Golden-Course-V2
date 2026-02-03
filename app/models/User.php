<?php

class User {
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function save($nom, $prenom, $email, $password, $role) {
        $firstName = trim($nom);
        $lastName = trim($prenom);
        $cleanEmail = filter_var(trim($email), FILTER_VALIDATE_EMAIL);

        if (empty($firstName) || empty($lastName) || empty($cleanEmail) || empty($password) || empty($role)) {
            return ['success' => false, 'error' => 'Missing required registration fields.'];
        }

        try {
            // Block duplicate accounts by email
            $this->db->query("SELECT user_id FROM users WHERE email = :email LIMIT 1");
            $this->db->bind(':email', $cleanEmail);
            if ($this->db->single()) {
                return ['success' => false, 'error' => 'Email already registered.'];
            }

            $this->db->query("
                INSERT INTO users (username, email, password_hash, role, is_active)
                VALUES (:username, :email, :password, :role, :is_active)
            ");

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $username = trim($firstName . ' ' . $lastName);
            $isActive = ($role === 'Enseignant') ? 0 : 1;

            $this->db->bind(':username', $username);
            $this->db->bind(':email', $cleanEmail);
            $this->db->bind(':password', $passwordHash);
            $this->db->bind(':role', $role);
            $this->db->bind(':is_active', $isActive);

            $this->db->execute();
            return ['success' => true, 'user_id' => $this->db->lastInsertId()];
        } catch (PDOException $e) {
            error_log('User save failed: ' . $e->getMessage());
            return ['success' => false, 'error' => 'Unable to create account right now.'];
        }
    }

    public function login($email, $password) {
        $cleanEmail = filter_var(trim($email), FILTER_VALIDATE_EMAIL);
        if (empty($cleanEmail) || empty($password)) {
            return ['success' => false, 'error' => 'Invalid credentials supplied.'];
        }

        try {
            $this->db->query("SELECT user_id, username, email, password_hash, role, is_active FROM users WHERE email = :email LIMIT 1");
            $this->db->bind(':email', $cleanEmail);
            $user = $this->db->single();

            if (!$user || !password_verify($password, $user->password_hash)) {
                return ['success' => false, 'error' => 'Invalid email or password.'];
            }

            return ['success' => true, 'user' => $user];
        } catch (PDOException $e) {
            error_log('Login failed: ' . $e->getMessage());
            return ['success' => false, 'error' => 'Authentication failed.'];
        }
    }

    public function getallusers() {
        try {
            $this->db->query("SELECT * FROM users");
            return $this->db->resultSet();
        } catch (PDOException $e) {
            error_log('getallusers failed: ' . $e->getMessage());
            return [];
        }
    }

}