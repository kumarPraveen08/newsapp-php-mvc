<?php

class Post {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    // Get posts count
    public function getPostsRowCount(){
        $this->db->query('SELECT * FROM posts');
        return $this->db->rowCount();
    }

    // Get user posts count
    public function getUserPostsRowCount($user_id){
        $this->db->query('SELECT * FROM posts WHERE user_id = :user_id');
        $this->db->bind(':user_id', $user_id);
        return $this->db->rowCount();
    }

    // Get all posts
    public function getPosts(){
        $this->db->query('SELECT *, 
                        posts.id AS postId, 
                        posts.created_at AS postCreated, 
                        posts.slug AS postSlug, 
                        users.id AS userId,
                        users.created_at AS userCreated,
                        categories.id AS categoryId,
                        categories.created_at AS categoryCreated,
                        categories.slug AS categorySlug
                        FROM posts 
                        INNER JOIN users ON posts.user_id = users.id
                        INNER JOIN categories ON posts.category_id = categories.id
                        ORDER BY posts.created_at DESC');
        return $this->db->resultSet();
    }

    // Get single post by id
    public function getPost($id){
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Get single post by slug
    public function getPostBySlug($slug){
        $this->db->query('SELECT * FROM posts WHERE slug = :slug');
        $this->db->bind(':slug', $slug);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Find if other post has the same slug apart from the current one
    public function findPostSlug($slug, $current_post_id){
        $this->db->query('SELECT * FROM posts WHERE id != :current_post_id AND slug = :slug');
        $this->db->bind(':slug', $slug);
        $this->db->bind(':current_post_id', $current_post_id);
        $row = $this->db->single();

        if($row){
            return $row;
        } else {
            return false;
        }
    }

    // Add new post
    public function addPost($data){
        $this->db->query('INSERT INTO posts(title, body, thumbnail, user_id, category_id, views, meta, is_video, yt_url_id, featured, slug) VALUES(:title, :body, :thumbnail, :user_id, :category_id, :views, :meta, :is_video, :yt_url_id, :featured, :slug)');

        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':thumbnail', $data['thumbnail']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':category_id', $data['cate_id']);
        $this->db->bind(':views', $data['views']);
        $this->db->bind(':meta', $data['meta']);
        $this->db->bind(':is_video', $data['type']);
        $this->db->bind(':yt_url_id', $data['ytid']);
        $this->db->bind(':featured', $data['featured']);
        $this->db->bind(':slug', $data['slug']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Update post by ID
    public function updatePost($data, $id){
        $this->db->query('UPDATE posts SET title = :title, body = :body, thumbnail = :thumbnail, user_id = :user_id, category_id = :category_id, views = :views, meta = :meta, is_video = :is_video, yt_url_id = :yt_url_id, featured = :featured, slug = :slug WHERE id = :id');

        $this->db->bind(':id', $id);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':thumbnail', $data['thumbnail']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':category_id', $data['cate_id']);
        $this->db->bind(':views', $data['views']);
        $this->db->bind(':meta', $data['meta']);
        $this->db->bind(':is_video', $data['type']);
        $this->db->bind(':yt_url_id', $data['ytid']);
        $this->db->bind(':featured', $data['featured']);
        $this->db->bind(':slug', $data['slug']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Delete post by Id
    public function deletePost($id){
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}