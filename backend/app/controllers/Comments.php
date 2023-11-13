<?php

class Comments extends Controller {
    public function __construct(){
        isLoggedIn();
        onlyRoleAllowed('admin');
        $this->commentModel = $this->model('Comment');
        $this->userModel = $this->model('User');
        $this->postModel = $this->model('Post');
        $this->user = userDetails();
    }

    public function index(){
        $comments = $this->commentModel->getComments() ?? [];
        
        $data = [
            'title' => 'All Comments',
            'description' => 'All informational pages of the website',
            'user' => $this->user,
            'comments' => $comments,
        ];
        $this->view('comments/index', $data);
    }

    public function add(){
        $users = $this->userModel->getUsersByRole('user');
        $posts = $this->postModel->getPosts();

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'All Comments',
                'description' => 'All informational pages of the website',
                'user' => $this->user,
                'user_id' => trim($_POST['user_id']),
                'post_id' => trim($_POST['post_id']),
                'message' => trim($_POST['message']),
                'users' => $users,
                'posts' => $posts,
            ];

            // add new comment
            if($this->commentModel->addComment($data)){
                echo 'comment added successfully';
            }else{
                echo 'something went wrong';
            }

            $this->view('comments/add', $data);

        }else{

            $data = [
                'title' => 'All Comments',
                'description' => 'All informational pages of the website',
                'user' => $this->user,
                'users' => $users,
                'posts' => $posts,
            ];
            
            $this->view('comments/add', $data);

        }
    }

    public function edit($id){
        $users = $this->userModel->getUsersByRole('user');
        $posts = $this->postModel->getPosts();
        $comment = $this->commentModel->getComment($id);
        if($comment){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST
                $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data = [
                    'title' => 'All Comments',
                    'description' => 'All informational pages of the website',
                    'user' => $this->user,
                    'user_id' => trim($_POST['user_id']),
                    'post_id' => trim($_POST['post_id']),
                    'message' => trim($_POST['message']),
                    'comment' => $comment,
                    'users' => $users,
                    'posts' => $posts,
                ];
    
                // add new comment
                if($this->commentModel->updateCommentById($data, $id)){
                    echo 'comment updated';
                }else{
                    echo 'something went wrong';
                }
    
                $this->view('comments/edit', $data);
    
            }else{
    
                $data = [
                    'title' => 'All Comments',
                    'description' => 'All informational pages of the website',
                    'user' => $this->user,
                    'comment' => $comment,
                    'users' => $users,
                    'posts' => $posts,
                ];

                $this->view('comments/edit', $data);
    
            }
        }else{
            redirect('comments');
        }
    }

    public function delete($id){
        if($this->commentModel->deleteComment($id)){
            redirect('comments/index');
        } else {
            die('Something went wrong');
        }
    }
}