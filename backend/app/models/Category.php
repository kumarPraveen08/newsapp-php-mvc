<?php 

class Category {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    // Get all categories
    public function getCategories(){
        $this->db->query('SELECT * FROM categories');
        return $this->db->resultSet();
    }

    // Get category by id
    public function getCategory($id){
        $this->db->query('SELECT * FROM categories WHERE id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        
        if($row){
            return $row;
        }else{
            return false;
        }
    }

    // Get category by slug
    public function getCategoryBySlug($slug){
        $this->db->query('SELECT * FROM categories WHERE slug = :slug');
        $this->db->bind(':slug', $slug);
        $row = $this->db->single();
        
        if($row){
            return $row;
        }else{
            return false;
        }
    }

    // Find category slug is already exist, don't check current one
    public function findCategorySlug($slug, $current_id){
        $this->db->query('SELECT * FROM categories WHERE id != :current_id AND slug = :slug');
        $this->db->bind(':current_id', $current_id);
        $this->db->bind(':slug', $slug);
        $row = $this->db->single();
        
        if($row){
            return $row;
        }else{
            return false;
        }
    }

    // Add new category
    public function addCategory($data){
        $this->db->query('INSERT INTO categories(name, cate_img, about_cate, slug) VALUES(:name, :cate_img, :about_cate, :slug)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':cate_img', $data['cate_img']);
        $this->db->bind(':about_cate', $data['about_cate']);
        $this->db->bind(':slug', $data['slug']);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Update category by id
    public function updateCategoryById($data, $id){
        $this->db->query('UPDATE categories SET name = :name, cate_img = :cate_img, about_cate = :about_cate, slug = :slug WHERE id = :id');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':cate_img', $data['cate_img']);
        $this->db->bind(':about_cate', $data['about_cate']);
        $this->db->bind(':slug', $data['slug']);
        $this->db->bind(':id', $id);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // Delete category by Id
    public function deleteCategory($id){
        $this->db->query('DELETE FROM categories WHERE id = :id');
        $this->db->bind(':id', $id);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}