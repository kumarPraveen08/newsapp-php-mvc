<?php

class Newsletters extends Controller {
    
    public function __construct(){
        isLoggedIn();
        onlyRoleAllowed('admin');
        $this->newsletterModel = $this->model('Newsletter');
        $this->user = userDetails();
    }

    public function index(){
        $newsletters = $this->newsletterModel->getNewsletters();
        $data = [
            'title' => 'All Newsletters',
            'description' => 'All informational pages of the website',
            'user' => $this->user,
            'newsletters' => $newsletters,
        ];
        $this->view('newsletters/index', $data);
    }

    public function delete($id){
        if($this->newsletterModel->deleteNewsletter($id)){
            redirect('newsletters/index');
        } else {
            die('Something went wrong');
        }
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => 'All Newsletters',
                'description' => 'All informational pages of the website',
                'user' => $this->user,
                'email' => trim($_POST['email']),
            ];

            // check if the newsletter already exists
            if(!$this->newsletterModel->getNewsletterByEmail($data['email'])){
                if($this->newsletterModel->addNewsletter($data)){
                    echo 'newsletter has been added';
                }else{
                    echo 'something went wrong';
                }
            }else{
                echo 'email already exits';
            }
            

            $this->view('newsletters/add', $data);
        }else{

            $data = [
                'title' => 'All Newsletters',
                'description' => 'All informational pages of the website',
                'user' => $this->user,
            ];
            $this->view('newsletters/add', $data);
        }
    }

    public function edit($id){
        $newsletter = $this->newsletterModel->getNewsletter($id);
        if($newsletter){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Sanitize POST
                $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'title' => 'All Newsletters',
                    'description' => 'All informational pages of the website',
                    'user' => $this->user,
                    'newsletter' => $newsletter,
                    'email' => trim($_POST['email']),
                ];

                // update newsletter
                if($this->newsletterModel->updateNewsletterById($data, $newsletter->id)){
                    echo 'updated successfully';
                }else{
                    echo 'something went wrong';
                }

                $this->view('newsletters/edit', $data);

            }else{

                $data = [
                    'title' => 'All Newsletters',
                    'description' => 'All informational pages of the website',
                    'user' => $this->user,
                    'newsletter' => $newsletter,
                ];

                $this->view('newsletters/edit', $data);
            }

        }else{

            redirect('newsletters');

        }
    }
}