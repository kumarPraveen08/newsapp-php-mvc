<?php

class Comment {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get comment row count
    public function getPostCommentsRowCount($post_id){
        $this->db->query('SELECT * FROM comments WHERE post_id = :post_id');
        $this->db->bind(':post_id', $post_id);
        return $this->db->rowCount();
    }

    // Get all comments by post id
    public function getCommentsByPostId($post_id){
        $this->db->query('SELECT *, 
                        comments.id AS commentId,
                        comments.created_at AS commentCreated,
                        users.id AS userId, 
                        users.created_at AS userCreated
                        FROM comments 
                        INNER JOIN users ON comments.user_id = users.id
                        WHERE post_id = :post_id
                        ORDER BY comments.created_at DESC');
        $this->db->bind(':post_id', $post_id);
        return $this->db->resultSet();
    }

    // Get single comment by id
    public function getComment($id){
        $this->db->query('SELECT * FROM categories WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Add new comment
    public function addComment($data){
        $this->db->query('INSERT INTO comments(comment, user_id, post_id) VALUES(:comment, :user_id, :post_id)');

        $this->db->bind(':comment', $data['comment']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':post_id', $data['post_id']);

        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
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