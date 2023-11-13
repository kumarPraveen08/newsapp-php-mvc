<?php

class Profile extends Controller {
    public function __construct(){
        isLoggedIn();
        $this->user = userDetails();
        $this->userModel = $this->model('User');
        $this->postModel = $this->model('Post');
    }

    public function index(){
        $profile = $this->userModel->getUser(1);
        $postRowCoint = $this->postModel->getUserPostsRowCount($profile->id);
        $data = [
            'title' => 'My Profile',
            'description' => 'All informational pages of the website',
            'user' => $this->user,
            'profile' => $profile,
            'postRowCoint' => $postRowCoint,
        ];
        $this->view('profile/index', $data);
    }

    public function settings($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($id == $this->user['id']){
                $data = [
                    'username' => trim($_POST['username']),
                    'phone' => trim($_POST['phone']),
                    'address' => trim($_POST['address']),
                    'education' => trim($_POST['education']),
                    'skills' => trim($_POST['skills']),
                    'bio' => trim($_POST['bio']),
                ];

                // update settings
                if($this->userModel->updateSettings($data, $id)){
                    redirect('profile');
                }else{
                    die('Something went wrong');
                }
            }
        }else{
            redirect('profile');
        }
    }

    public function resetpassword($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if($id == $this->user['id']){
                $data = [
                    'old_password' => trim($_POST['opsd']),
                    'new_password' => trim($_POST['npsd']),
                ];

                // check if the old password matched to user password
                $user = $this->userModel->getUser($id);
                $oldPasswordMatched = password_verify($data['old_password'], $user->password);
                if($oldPasswordMatched){
                    // check if the old password and new password matched
                    if($data['old_password'] != $data['new_password']){
                        // Check if the new password length is longer than 5
                        if(strlen($data['new_password']) > 5){
                            // convert password in hash format
                            $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                            // update password
                            if($this->userModel->resetPassword($data['new_password'], $id)){
                                redirect('profile');
                            }else{
                                die('Something went wrong');
                            }
                        }else{
                            echo 'Password should be longer than 5 characters';
                        }
                    }else{
                        echo 'Password should be different to current password';
                    }
                }else{
                    echo 'Old Password is wrong, please forgot password to change password';
                }
            }
        }else{
            redirect('profile');
        }
    }

    public function deactivate($id){
        // deactivate account
        if($this->userModel->deactivate($id)){
            redirect('profile');
        }else{
            die('Something went wrong');
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        unset($_SESSION['user_profile_img']);
        unset($_SESSION['user_role']);
        session_destroy();
        redirect('auth/login');
    }
}