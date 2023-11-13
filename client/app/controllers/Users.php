<?php 

class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');
        $this->categoryModel = $this->model('Category');
        $this->postModel = $this->model('Post');

        // some data that used on all pages
        $this->menu = $this->categoryModel->getCategories();
        $this->recentPosts = $this->postModel->getPostsWithLimit(4,0);
        $this->navTrendingPosts = $this->postModel->getTrendingPostsWithLimit(3,0);
    }

    public function index(){}

    public function register(){
        if($this->isLoggedIn()){
            redirect();
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Register',
                'description' => 'sign up for get new features',
                'type' => 'website',

                // all pages component data
                'menu' => $this->menu,
                'recentPosts' => $this->recentPosts,
                'navTrendingPosts' => $this->navTrendingPosts ?? [],

                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
            ];

            // check if the user is exists with the email
            $user = $this->userModel->findUserByEmail($data['email']);

            if(!$user){
                // check password length and both password matched
                if(strlen($data['password']) > 5){
                    if($data['password'] === $data['confirm_password']){
                        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                        // register new user
                        if($this->userModel->register($data)){
                            echo 'registered successfully, now you can login';
                        }else{
                            die('Something went wrong');
                        }
                    }else{
                        echo 'password should matched';
                    }
                }else{
                    echo 'password should be longer than 5 characters';
                }
            }else{
                echo 'user already exits';
            }

            $this->view('users/register', $data);
        }else{
            $data = [
                'title' => 'Register',
                'description' => 'sign up for get new features',
                'type' => 'webiste',

                // all pages component data
                'menu' => $this->menu,
                'recentPosts' => $this->recentPosts,
                'navTrendingPosts' => $this->navTrendingPosts ?? [],
            ];
            $this->view('users/register', $data);
        }
    }

    public function login(){

        if($this->isLoggedIn()){
            redirect();
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Login',
                'description' => 'login into your account',
                'type' => 'website',

                // all pages component data
                'menu' => $this->menu,
                'recentPosts' => $this->recentPosts,
                'navTrendingPosts' => $this->navTrendingPosts ?? [],

                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
            ];

            $user = $this->userModel->getUserByEmail($data['email']);
            if($user){
                // check password is matched
                $isPasswordMatched = password_verify($data['password'], $user->password);
                if($isPasswordMatched){
                    // create session
                    createUserSession($user);
                    redirect();
                }else{
                    echo 'Bad request, check your email or password';
                }
            } else {
                echo 'Bad request, check your email or password';
            }

            $this->view('users/login', $data);

        }else{
            $data = [
                'title' => 'Login',
                'description' => 'login into your account',
                'type' => 'website',

                // all pages component data
                'menu' => $this->menu,
                'recentPosts' => $this->recentPosts,
                'navTrendingPosts' => $this->navTrendingPosts ?? [],
            ];
            $this->view('users/login', $data);
        }
    }

    // Check Logged In
    public function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
            return true;
        } else {
            return false;
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_profile_img']);
        unset($_SESSION['user_role']);
        session_destroy();
        redirect();
    }
}