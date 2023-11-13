<?php

class Auth extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
    }

    public function index(){
        $data = [
            'title' => 'All Posts',
            'description' => 'All informational pages of the website',
        ];
        $this->view('posts/index', $data);
    }

    public function register(){
        $this->isLoggedIn();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Register',
                'description' => 'All informational pages of the website',
                'username' => trim($_POST['username']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['psd']),
                'repassword' => trim($_POST['repsd']),
            ];

            // check if the user exists with same email
            if(!$this->userModel->findUserByEmail($data['email'])){
                // check if the password and repassword is match and length of the password should be more 5 characters
                if($data['password'] === $data['repassword'] && strlen($data['password']) > 5){
                    // hash user password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    // register new user
                    if($this->userModel->register($data)){
                        // send mail for verification - TODO
                        echo 'user registered successfully, please login now';
                    }else{
                        echo 'Something went wrong';
                    }
                }else{
                    echo 'Both password should match and password should be longer than 6 characters';
                }
            }else{
                echo 'User is already exits';
            }

            $this->view('auth/register', $data);
        }else{
            $data = [
                'title' => 'Register',
                'description' => 'All informational pages of the website',
            ];
            $this->view('auth/register', $data);
        }
    }

    public function login(){
        $this->isLoggedIn();
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => 'Login',
                'description' => 'All informational pages of the website',
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
            ];

            // get user by email
            $user = $this->userModel->getUserByEmail($data['email']);

            if($user){
                $isPasswordValid = password_verify($data['password'], $user->password);
                if($isPasswordValid){
                    // create user session and redirect to dashboard
                    createUserSession($user);
                    redirect();
                }else{
                    echo 'Email or Password is not valid';
                }
            }else{
                echo 'Bad request, User not found!';
            }

            $this->view('auth/login', $data);
        }else{
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => 'Login',
                'description' => 'All informational pages of the website',
            ];
            $this->view('auth/login', $data);
        }
    }

    public function forgotpassword(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Forgot Password',
                'description' => 'All informational pages of the website',
                'email' => trim($_POST['email']),
            ];

            // find if the user is registered with the email or not
            if($this->userModel->findUserByEmail($data['email'])){
                // send mail for verfication
                $token = 
                $url = URLROOT.'/auth/verify';
                $subject = 'Reset You Password';
                $message = 'You or Someone has request mail for reseting the password, please click the below link to reset password or report this on site if you have not requested reset password';
            }else{
                echo 'Bad request, you are not authorized to access this route';
            }

            $this->view('auth/forgot-password', $data);
        }else{
            $data = [
                'title' => 'Forgot Password',
                'description' => 'All informational pages of the website',
            ];
            $this->view('auth/forgot-password', $data);
        }
    }

    public function resetpassword(){
        $data = [
            'title' => 'Reset Password',
            'description' => 'All informational pages of the website',
        ];
        $this->view('auth/reset-password', $data);
    }

    public function isLoggedIn() {
        if(isset($_SESSION['user_id'])){
            redirect();
        }
    }
}