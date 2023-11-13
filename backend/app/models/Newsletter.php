<?php 

class Newsletter {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all newsletters
    public function getNewsletters(){
        $this->db->query('SELECT * FROM newsletters');
        $row = $this->db->resultSet();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Get newsletter by email
    public function getNewsletterByEmail($email){
        $this->db->query('SELECT * FROM newsletters WHERE email = :email');
        $this->db->bind(':email', $email);
        $result = $this->db->single();
        
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    // Get newsletter by id
    public function getNewsletter($id){
        $this->db->query('SELECT * FROM newsletters WHERE id = :id');
        $this->db->bind(':id', $id);
        $result = $this->db->single();
        
        if($result){
            return $result;
        }else{
            return false;
        }
    }

    // Add new newsletter
    public function addNewsletter($data){
        $this->db->query('INSERT INTO newsletters(email) VALUES(:email)');
        $this->db->bind(':email', $data['email']);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Update newsletter by id
    public function updateNewsletterById($data, $id){
        $this->db->query('UPDATE newsletters SET email = :email WHERE id = :id');
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':id', $id);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Delete newsletter by Id
    public function deleteNewsletter($id){
        $this->db->query('DELETE FROM newsletters WHERE id = :id');
        $this->db->bind(':id', $id);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}