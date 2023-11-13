<?php

class Categories extends Controller {
    
    public function __construct(){
        isLoggedIn();
        onlyRoleAllowed('admin');
        $this->categoryModel = $this->model('Category');
        $this->user = userDetails();
    }

    public function index(){
        $categories = $this->categoryModel->getCategories() ?? [];
        $data = [
            'title' => 'All Categories',
            'description' => 'All informational pages of the website',
            'user' => $this->user,
            'categories' => $categories,
        ];
        $this->view('categories/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // make slug from the cate name
            $name = trim($_POST['name']);
            $slug = str_replace(' ', '-', strtolower($name));

            $data = [
                'title' => 'Add Categories',
                'description' => 'All informational pages of the website',
                'user' => $this->user,
                'name' => $name,
                'slug' => $slug,
                'cate_img' => $_FILES['cate_img'],
                'about_cate' => trim($_POST['body']),
            ];

            // check if category name or slug is already exists
            if(!$this->categoryModel->getCategoryBySlug($slug)){

                // check for image
                $isValidImage = uploadImage($data['cate_img'], MAX_IMAGE_SIZE_SUPPORT, CATEGORY_DIRECTORY);

                if($isValidImage){
                    // change cate_img value with valid image name
                    $data["cate_img"] = $isValidImage;

                        if($this->categoryModel->addCategory($data)){
                            echo 'category added successfully';
                        }else{
                            echo 'something went wrong';
                        }
                    
                }else{
                    echo 'image size or type is not valid';
                }

            }else{
                echo 'category already exits';
            }
        

            $this->view('categories/add', $data);

        }else{

            $data = [
                'title' => 'Add Categories',
                'description' => 'All informational pages of the website',
                'user' => $this->user,
            ];

            $this->view('categories/add', $data);

        }
    }

    public function edit($id){
        $category = $this->categoryModel->getCategory($id);
        if($category){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                // make slug from the cate name
                $name = trim($_POST['name']);
                $slug = str_replace(' ', '-', strtolower($name));
    
                $data = [
                    'title' => 'Add Categories',
                    'description' => 'All informational pages of the website',
                    'user' => $this->user,
                    'category' => $category,
                    'name' => $name,
                    'slug' => $slug,
                    'cate_img' => $_FILES['cate_img'],
                    'about_cate' => trim($_POST['body']),
                ];

                // check if category name or slug is already exists
                if(!$this->categoryModel->findCategorySlug($slug, $id)){

                    if($_FILES['cate_img']['name']){
                        // check for image
                        $isValidImage = uploadImage($data['cate_img'], MAX_IMAGE_SIZE_SUPPORT, CATEGORY_DIRECTORY);
        
                        if($isValidImage){
                            // change cate_img value with valid image name
                            $data["cate_img"] = $isValidImage;
        
                                if($this->categoryModel->updateCategoryById($data, $id)){
                                    echo 'category updated';
                                }else{
                                    echo 'something went wrong';
                                }
                            
                        }else{
                            echo 'image size or type is not valid';
                        }
                    }else{
                        // change cate_img value with old image name
                        $data['cate_img'] = $category->cate_img;
                        if($this->categoryModel->updateCategoryById($data, $id)){
                            echo 'category updated';
                        }else{
                            echo 'something went wrong';
                        }
                    }    
                    
                }else{
                    echo 'category already exits';
                }
    
                $this->view('categories/edit', $data);
    
            }else{
    
                $data = [
                    'title' => 'Add Categories',
                    'description' => 'All informational pages of the website',
                    'user' => $this->user,
                    'category' => $category,
                ];
    
                $this->view('categories/edit', $data);
    
            }
        }else{
            redirect('categories');
        }
        
    }

    public function delete($id){
        if($this->categoryModel->deleteCategory($id)){
            redirect('categories/index');
        } else {
            die('Something went wrong');
        }
    }
}