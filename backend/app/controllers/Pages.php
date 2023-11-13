<?php

class Pages extends Controller {
    public function __construct(){
        isLoggedIn();
        onlyRoleAllowed('admin');
        $this->pageModel = $this->model('Page');
        $this->user = userDetails();
    }

    public function index(){
        $pages = $this->pageModel->getPages() ?? [];
        $data = [
            'title' => 'All Pages',
            'description' => 'All informational pages of the website',
            'user' => $this->user,
            'pages' => $pages,
        ];
        $this->view('pages/index', $data);
    }

    public function page($id){
        $page = $this->pageModel->getPage($id);
        if($page){
            $data = [
                'title' => $page->title,
                'description' => $page->meta,
                'user' => $this->user,
                'page' => $page,
            ];
        }
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST
            // $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // create slug using title
            $title = trim($_POST['title']);
            $slug = str_replace(' ', '-', strtolower($title));

            $data = [
                'title' => 'Add Pages',
                'description' => 'All informational pages of the website',
                'user' => $this->user,
                'user_id' => 1,
                'title' => $title,
                'slug' => $slug,
                'body' => trim($_POST['body']),
                'meta' => trim($_POST['meta']),
            ];

            // check if the same title post is there or not
            if(!$this->pageModel->getPageBySlug($slug)){
                // add new post
                if($this->pageModel->addPage($data)){
                    echo 'page created successfully';
                }else{
                    echo 'something went wrong';
                }
            }else{
                echo 'Page with same name is already exits';
            }

            $this->view('pages/add', $data);

        }else{

            $data = [
                'title' => 'Add Pages',
                'description' => 'All informational pages of the website',
                'user' => $this->user,
            ];

            $this->view('pages/add', $data);

        }
    }

    public function edit($id){
        $page = $this->pageModel->getPage($id);
        if($page){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Sanitize POST
                // $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                // create slug using title
                $title = trim($_POST['title']);
                $slug = str_replace(' ', '-', strtolower($title));
    
                $data = [
                    'title' => 'Add Pages',
                    'description' => 'All informational pages of the website',
                    'user' => $this->user,
                    'page' => $page,
                    'user_id' => 1,
                    'title' => $title,
                    'slug' => $slug,
                    'body' => trim($_POST['body']),
                    'meta' => trim($_POST['meta']),
                ];
    
                // check if the same title post is there or not
                if(!$this->pageModel->findPageSlug($slug, $id)){
                    // add new post
                    if($this->pageModel->updatePage($data, $id)){
                        echo 'page updated';
                    }else{
                        echo 'something went wrong';
                    }
                }else{
                    echo 'post is already exits with same slug';
                }
                
                $this->view('pages/edit', $data);
    
            }else{
    
                $data = [
                    'title' => 'Add Pages',
                    'description' => 'All informational pages of the website',
                    'user' => $this->user,
                    'page' => $page,
                ];
    
                $this->view('pages/edit', $data);
    
            }
        }
    }

    public function delete($id){
        if($this->pageModel->deletePage($id)){
            redirect('pages/index');
        } else {
            die('Something went wrong');
        }
    }

    public function logout(){
        if($this->pageModel->deletePage($id)){
            redirect('pages/index');
        } else {
            die('Something went wrong');
        }
    }
}