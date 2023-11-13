<?php

class Subscribe extends Controller {
    public function __construct(){
        $this->newsletterModel = $this->model('Newsletter');
    }

    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $email = trim($_POST['newsletter']);
            if($email){
                // check if the email is already exists in database
                if(!$this->newsletterModel->findNewsletterEmail($email)){
                    // add new newsletter email
                    if($this->newsletterModel->addNewsletterEmail($email)){
                        redirect();
                    }else{
                        die('Something went wrong');
                    }
                }else{
                    redirect();
                }
            }else{
                redirect();
            }
        }
    }
}