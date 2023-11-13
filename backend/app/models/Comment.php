<?php 

class Comment {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get comments count
    public function getCommentsRowCount(){
        $this->db->query('SELECT * FROM comments');
        return $this->db->rowCount();
    }

    // Get all comments
    public function getComments(){
        $this->db->query('SELECT *, 
                        comments.id AS commentId, 
                        comments.created_at AS commentCreated,
                        posts.id AS postId, 
                        posts.created_at AS postCreated, 
                        users.id AS userId,
                        users.created_at AS userCreated
                        FROM comments 
                        INNER JOIN users ON comments.user_id = users.id
                        INNER JOIN posts ON comments.post_id = posts.id
                        ORDER BY comments.created_at DESC');

        $row = $this->db->resultSet();
        return $row;
    }

    // Get comment by id
    public function getComment($id){
        $this->db->query('SELECT * FROM comments WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        
        if($row){
            return $row;
        }else{
            return false;
        }
    }

    // Add new comment
    public function addComment($data){
        $this->db->query('INSERT INTO comments(user_id, post_id, comment) VALUES(:user_id, :post_id, :comment)');
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':comment', $data['message']);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Update comment by id
    public function updateCommentById($data, $id){
        $this->db->query('UPDATE comments SET user_id = :user_id, post_id = :post_id, comment = :comment WHERE id = :id');
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':post_id', $data['post_id']);
        $this->db->bind(':comment', $data['message']);
        $this->db->bind(':id', $id);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Delete comment by Id
    public function deleteComment($id){
        $this->db->query('DELETE FROM comments WHERE id = :id');
        $this->db->bind(':id', $id);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}