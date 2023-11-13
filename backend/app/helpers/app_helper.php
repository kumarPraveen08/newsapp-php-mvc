<?php

function navList() {
    $navList = [
        (object) ['singular' => 'Post', 'plural' => 'Posts', 'icon' => 'newspaper', 'spath' => '/posts/add', 'ppath' => '/posts', 'permission' => 'allowed'],
        (object) ['singular' => 'Page', 'plural' => 'Pages', 'icon' => 'folder', 'spath' => '/pages/add', 'ppath' => '/pages', 'permission' => 'notAllowed'],
        (object) ['singular' => 'Category', 'plural' => 'Categories', 'icon' => 'file', 'spath' => '/categories/add', 'ppath' => '/categories', 'permission' => 'notAllowed'],
        (object) ['singular' => 'Comment', 'plural' => 'Comments', 'icon' => 'comment', 'spath' => '/comments/add', 'ppath' => '/comments', 'permission' => 'notAllowed'],
        (object) ['singular' => 'Newsletter', 'plural' => 'Newsletters', 'icon' => 'envelope', 'spath' => '/newsletters/add', 'ppath' => '/newsletters', 'permission' => 'notAllowed'],
        (object) ['singular' => 'User', 'plural' => 'Users', 'icon' => 'users', 'spath' => '/users/add', 'ppath' => '/users', 'permission' => 'notAllowed'],
    ];
    return $navList;
}