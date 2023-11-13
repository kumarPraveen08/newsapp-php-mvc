<?php

class Category {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get categories row count
    public function getCategoriesRowCount($type, $limit){
        $this->db->query('SELECT * FROM pages');
        return $this->db->rowCount();
    }

    // Get all categories
    public function getCategories(){
        $this->db->query('SELECT * FROM categories ORDER BY categories.created_at DESC');
        return $this->db->resultSet();
    }

    // Get single category by id
    public function getCategory($id){
        $this->db->query('SELECT * FROM categories WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Get single category by slug
    public function getCategoryBySlug($slug){
        $this->db->query('SELECT * FROM categories WHERE slug = :slug');
        $this->db->bind(':slug', $slug);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Add new page
    public function addPage($data){
        $this->db->query('INSERT INTO pages(title, body, user_id) VALUES(:title, :body :user_id)');

        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':user_id', $data['user_id']);

        $this->db->execute();
    }

    // Update page by ID
    public function updatePage($data){
        $this->db->query('UPDATE pages SET title = :title, body = :body, user_id = :user_id WHERE id = :id');

        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':user_id', $data['user_id']);

        $this->db->execute();
    }

    // Delete page by ID
    public function deletePage($id){
        $this->db->query('DELETE FROM pages WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();
    }
}