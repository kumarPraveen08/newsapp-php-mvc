<?php

class Page {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get pages by post type
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

    // Get all pages
    public function getPagesWithLimit($limit, $offset){
        $this->db->query('SELECT *, 
                        pages.id AS pageId, 
                        pages.created_at AS pageCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated
                        FROM pages 
                        INNER JOIN users ON pages.user_id = users.id
                        ORDER BY pages.created_at DESC
                        LIMIT :limit OFFSET :offset');
        $this->db->bind(':limit', $limit);
        $this->db->bind(':offset', $offset);
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