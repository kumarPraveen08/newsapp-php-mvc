<?php

class Posts extends Controller {
    public function __construct(){
        isLoggedIn();
        $this->postModel = $this->model('Post');
        $this->categoryModel = $this->model('Category');
        $this->user = userDetails();
    }

    public function index(){
        $posts = $this->postModel->getPosts() ?? [];
        $data = [
            'id' => 1,
            'title' => 'All Posts',
            'description' => 'All informational pages of the website',
            'user' => $this->user,
            'posts' => $posts,
        ];
        $this->view('posts/index', $data);
    }

    public function add(){
        $categories = $this->categoryModel->getCategories();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST - but not in this because of html data
            // $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $title = trim($_POST['title']);
            $slug = str_replace(' ', '-', strtolower($title));

            $data = [
                'title' => 'Add Posts',
                'description' => 'All informational pages of the website',
                'user' => $this->user,
                'categories' => $categories,
                'title' => $title,
                'slug' => $slug,
                'body' => $_POST['body'],
                'meta' => trim($_POST['meta']),
                'thumbnail' => $_FILES['thumbnail'],
                'cate_id' => $_POST['cate_id'],
                'type' => $_POST['type'],
                'ytid' => trim($_POST['ytid']),
                'featured' => $_POST['featured'],
                'views' => 1,
                'user_id' => $this->user['id'],
            ];

            // check if the same slug post is already exists
            if(!$this->postModel->getPostBySlug($slug)){
                // check if image is valid
                $isValidImage = uploadImage($data['thumbnail'], MAX_IMAGE_SIZE_SUPPORT, POST_DIRECTORY);
                if($isValidImage){
                    $data['thumbnail'] = $isValidImage;
                    if($this->postModel->addPost($data)){
                        echo 'post added successfully';
                    }else{
                        echo 'something went wrong';
                    }
                }else{
                    echo 'image type or size is not valid';
                }
            }else{
                echo 'post is already exists with same slug';
            }

            $this->view('posts/add', $data);

        }else{

            $data = [
                'title' => 'Add Posts',
                'description' => 'All informational pages of the website',
                'user' => $this->user,
                'categories' => $categories,
            ];

            $this->view('posts/add', $data);

        }
    }

    public function edit($id){
        $categories = $this->categoryModel->getCategories();
        $post = $this->postModel->getPost($id);
        
        if($post){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Sanitize POST - but not in this because of html data
                // $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $title = trim($_POST['title']);
                $slug = str_replace(' ', '-', strtolower($title));
    
                $data = [
                    'title' => 'Add Posts',
                    'description' => 'All informational pages of the website',
                    'user' => $this->user,
                    'categories' => $categories,
                    'post' => $post,
                    'title' => $title,
                    'slug' => $slug,
                    'body' => trim($_POST['body']),
                    'meta' => trim($_POST['meta']),
                    'thumbnail' => $_FILES['thumbnail'],
                    'cate_id' => $_POST['cate_id'],
                    'type' => $_POST['type'],
                    'ytid' => trim($_POST['ytid']),
                    'featured' => $_POST['featured'],
                    'views' => 1,
                    'user_id' => $this->user['id'],
                ];
    
                // check if the same slug post is already exists
                if(!$this->postModel->findPostSlug($slug, $id)){
                    if($_FILES['thumbnail']['name']){
                        // check if image is valid
                        $isValidImage = uploadImage($data['thumbnail'], MAX_IMAGE_SIZE_SUPPORT, POST_DIRECTORY);
                        if($isValidImage){
                            $data['thumbnail'] = $isValidImage;
                            if($this->postModel->updatePost($data, $id)){
                                echo 'post updated';
                            }else{
                                echo 'something went wrong';
                            }
                        }else{
                            echo 'image type or size is not valid';
                        }
                    }else{
                        $data['thumbnail'] = $post->thumbnail;
                        if($this->postModel->updatePost($data, $id)){
                            echo 'post updated';
                        }else{
                            echo 'something went wrong';
                        }
                    }
                }else{
                    echo 'post is already exists with same slug';
                }
    
                $this->view('posts/edit', $data);
    
            }else{
    
                $data = [
                    'title' => 'Add Posts',
                    'description' => 'All informational pages of the website',
                    'user' => $this->user,
                    'categories' => $categories,
                    'post' => $post,
                ];
    
                $this->view('posts/edit', $data);
    
            }
        }
    }

    public function delete($id){
        if($this->postModel->deletePost($id)){
            redirect('posts/index');
        } else {
            die('Something went wrong');
        }
    }
}