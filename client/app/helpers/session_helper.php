<?php
session_start();

// Flash message helper
function flash($name = '', $message = '', $class = 'alert alert-success'){
  if(!empty($name)){
    //No message, create it
    if(!empty($message) && empty($_SESSION[$name])){
      if(!empty( $_SESSION[$name])){
          unset( $_SESSION[$name]);
      }
      if(!empty( $_SESSION[$name.'_class'])){
          unset( $_SESSION[$name.'_class']);
      }
      $_SESSION[$name] = $message;
      $_SESSION[$name.'_class'] = $class;
    }
    //Message exists, display it
    elseif(!empty($_SESSION[$name]) && empty($message)){
      $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : 'success';
      echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
      unset($_SESSION[$name]);
      unset($_SESSION[$name.'_class']);
    }
  }
}

function createUserSession($user){
  $_SESSION['user_id'] = $user->id;
  $_SESSION['user_email'] = $user->email;
  $_SESSION['user_name'] = $user->username;
  $_SESSION['user_profile_img'] = $user->profile_img;
  $_SESSION['user_role'] = $user->role;
}

// Check if the user is logged in or not
function isLoggedIn(){
  if(isset($_SESSION['user_id'])){
      if($_SESSION['user_role'] === 'admin' || $_SESSION['user_role'] === 'author'){
        
      }else{
        echo header('Location: '.SITEURL);
      }
  }else{
    echo redirect('auth/login');
  }
}

function userDetails() {
  return [
    "id" => $_SESSION['user_id'],
    "name" => $_SESSION['user_name'],
    "email" => $_SESSION['user_email'],
    "profile_img" => URLROOT.'/img/users/'.$_SESSION['user_profile_img'],
    "role" => $_SESSION['user_role'],
  ];
}