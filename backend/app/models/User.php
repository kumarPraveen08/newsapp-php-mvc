<?php 

class User {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get comments count
    public function getUsersRowCount(){
        $this->db->query('SELECT * FROM users');
        return $this->db->rowCount();
    }

    // Get all users
    public function getUsers(){
        $this->db->query('SELECT * FROM users');
        $row = $this->db->resultSet();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Get users by role
    public function getUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Get users by role
    public function getUsersByRole($role){
        $this->db->query('SELECT * FROM users WHERE role = :role');
        $this->db->bind(':role', $role);
        $row = $this->db->resultSet();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if($row){
            return true;
        } else {
            return false;
        }
    }

    // Register new user
    public function register($data){
        $this->db->query('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    // Login user
    public function login($data){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $data['email']);
        $row = $this->db->single();

        // Check user password
        if(password_verify($data['password'], $row->password)){
            return $row;
        } else {
            return false;
        }
    }

    // Get user by id
    public function getUser($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Add new user
    public function addUser($data){
        $this->db->query('INSERT INTO users(username, profile_img, bio, email, password, phone, role, address, education, skills) VALUES(:username, :profile_img, :bio, :email, :password, :phone, :role, :address, :education, :skills)');

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':profile_img', $data['profile_img']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':bio', $data['bio']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':education', $data['education']);
        $this->db->bind(':skills', $data['skills']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Update user
    public function updateUser($data, $id){
        $this->db->query('UPDATE users SET username = :username, profile_img = :profile_img, bio = :bio, email = :email, password = :password, phone = :phone, role = :role, address = :address, education = :education, skills = :skills WHERE id = :id');

        $this->db->bind(':username', $data['username']);
        $this->db->bind(':profile_img', $data['profile_img']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', $data['role']);
        $this->db->bind(':bio', $data['bio']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':education', $data['education']);
        $this->db->bind(':skills', $data['skills']);
        $this->db->bind(':id', $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Update user settings 
    public function updateSettings($data, $id){
        $this->db->query('UPDATE users SET username = :username, phone = :phone, address = :address, skills = :skills, education = :education, bio = :bio WHERE id = :id');
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':phone', $data['phone']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':skills', $data['skills']);
        $this->db->bind(':education', $data['education']);
        $this->db->bind(':bio', $data['bio']);
        $this->db->bind(':id', $id);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Update user password 
    public function resetPassword($password, $id){
        $this->db->query('UPDATE users SET password = :password WHERE id = :id');
        $this->db->bind(':password', $password);
        $this->db->bind(':id', $id);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Deactivate user account by Id
    public function deactivate($id){
        $this->db->query('UPDATE users SET status = :status WHERE id = :id');
        $this->db->bind(':status', 0);
        $this->db->bind(':id', $id);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Delete user by Id
    public function deleteUser($id){
        $this->db->query('DELETE FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}