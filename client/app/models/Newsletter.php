<?php

class Newsletter {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Find newsletter email in table
    public function findNewsletterEmail($email){
        $this->db->query('SELECT * FROM newsletters WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if($row){
            return true;
        } else {
            return false;
        }
    }

    // Add new page
    public function addNewsletterEmail($email){
        $this->db->query('INSERT INTO newsletters(email) VALUES(:email)');

        $this->db->bind(':email', $email);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}