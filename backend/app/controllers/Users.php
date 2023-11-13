<?php

class Users extends Controller {
    
    public function __construct(){
        isLoggedIn();
        onlyRoleAllowed('admin');
        $this->userModel = $this->model('User');
        $this->user = userDetails();
    }

    public function index(){
        $users = $this->userModel->getUsers() ?? [];
        $data = [
            'title' => 'All users',
            'description' => 'All informational pages of the website',
            'user' => $this->user,
            'users' => $users,
        ];
        $this->view('users/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'title' => 'Add New User',
                'description' => 'All informational pages of the website',
                'user' => $this->user,
                'profile_img' => $_FILES['profile_img'],
                'username' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'phone' => trim($_POST['phone']),
                'address' => trim($_POST['address']),
                'bio' => trim($_POST['bio']),
                'role' => trim($_POST['role']),
                'education' => trim($_POST['education']),
                'skills' => trim($_POST['skills']),
            ];

            // check if image is valid
            $isValidImage = uploadImage($data['profile_img'], MAX_IMAGE_SIZE_SUPPORT, USER_DIRECTORY);
            if($isValidImage){
                $data['profile_img'] = $isValidImage;
                // check if the password is greater than 5 characters
                if(strlen($data['password']) > 5){
                    // change password hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    if($this->userModel->addUser($data)){
                        echo 'user added successfully';
                    }else{
                        echo 'something went wrong';
                    }
                } else{
                    echo 'password should be greater than 5 characters';
                }
            }else{
                echo 'image type or size is not valid';
            }

            $this->view('users/add', $data);

        }else{
            $data = [
                'title' => 'Add New User',
                'description' => 'All informational pages of the website',
                'user' => $this->user,
            ];
            $this->view('users/add', $data);
        }
    }

    public function edit($id){
        $user = $this->userModel->getUser($id);
        if($user){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Sanitize POST
                $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data = [
                    'title' => 'Add New User',
                    'description' => 'All informational pages of the website',
                    'user' => $this->user,
                    'editUser' => $user,
                    'profile_img' => $_FILES['profile_img'],
                    'username' => trim($_POST['name']),
                    'email' => $user->email,
                    'password' => $user->password,
                    'phone' => trim($_POST['phone']),
                    'address' => trim($_POST['address']),
                    'bio' => trim($_POST['bio']),
                    'role' => trim($_POST['role']),
                    'education' => trim($_POST['education']),
                    'skills' => trim($_POST['skills']),
                ];
    
                if($_FILES['profile_img']['name']){
                    // check if image is valid
                    $isValidImage = uploadImage($data['profile_img'], MAX_IMAGE_SIZE_SUPPORT, POST_DIRECTORY);
                    if($isValidImage){
                        $data['profile_img'] = $isValidImage;
                        if($this->userModel->updateUser($data, $id)){
                            echo 'user updated';
                        }else{
                            echo 'something went wrong';
                        }
                    }else{
                        echo 'image type or size is not valid';
                    }
                }else{
                    $data['profile_img'] = $user->profile_img;
                    if($this->userModel->updateUser($data, $id)){
                        echo 'user updated';
                    }else{
                        echo 'something went wrong';
                    }
                }
    
                $this->view('users/edit', $data);
    
            }else{
                $data = [
                    'title' => 'Add New User',
                    'description' => 'All informational pages of the website',
                    'user' => $this->user,
                    'editUser' => $user,
                ];
                $this->view('users/edit', $data);
            }
        }else{
            redirect('users');
        }
    }

    public function delete($id){
        if($this->userModel->deleteUser($id)){
            redirect('users/index');
        } else {
            die('Something went wrong');
        }
    }
}