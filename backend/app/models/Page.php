<?php

class Page {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get pages count
    public function getPagesRowCount(){
        $this->db->query('SELECT * FROM pages');
        return $this->db->rowCount();
    }

    // Get all pages
    public function getPages(){
        $this->db->query('SELECT *, 
                        pages.id AS pageId, 
                        pages.created_at AS pageCreated,
                        users.id AS userId,
                        users.created_at AS userCreated
                        FROM pages 
                        INNER JOIN users ON pages.user_id = users.id
                        ORDER BY pages.created_at DESC');
        return $this->db->resultSet();
    }

    // Get single page by id
    public function getPage($id){
        $this->db->query('SELECT * FROM pages WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Get single page by slug
    public function getPageBySlug($slug){
        $this->db->query('SELECT * FROM pages WHERE slug = :slug');
        $this->db->bind(':slug', $slug);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Get single page by slug
    public function findPageSlug($slug, $current_id){
        $this->db->query('SELECT * FROM pages WHERE id != :current_id AND slug = :slug');
        $this->db->bind(':slug', $slug);
        $this->db->bind(':current_id', $current_id);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Add new page
    public function addPage($data){
        $this->db->query('INSERT INTO pages(title, body, user_id, meta, slug) VALUES(:title, :body, :user_id, :meta, :slug)');

        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':meta', $data['meta']);
        $this->db->bind(':slug', $data['slug']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Update page by ID
    public function updatePage($data, $id){
        $this->db->query('UPDATE pages SET title = :title, body = :body, user_id = :user_id, meta = :meta, slug = :slug WHERE id = :id');

        $this->db->bind(':id', $id);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':meta', $data['meta']);
        $this->db->bind(':slug', $data['slug']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Delete page by Id
    public function deletePage($id){
        $this->db->query('DELETE FROM pages WHERE id = :id');
        $this->db->bind(':id', $id);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}